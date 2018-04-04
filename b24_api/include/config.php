<?php
// session_start();

$filename = $_SERVER['DOCUMENT_ROOT'] . '/b24_api/include/connect_config.php';
if(file_exists($filename))
{
	$config = file_get_contents($filename, 'r');
}

$scope = '';
if ( !empty($config) )
{
	$config = json_decode($config, true);
	$scope = implode(',', $config['SCOPE']);

	/**
	 * client_id приложения
	 */
//define('CLIENT_ID', 'local.58242355c29a65.28284899');
	define('CLIENT_ID', $config['CLIENT_ID']);
	/**
	 * client_secret приложения
	 */
	define('CLIENT_SECRET',  $config['CLIENT_SECRET']);
	/**
	 * относительный путь приложения на сервере
	 */
	define('PATH',  $config['PATH']);
	/**
	 * полный адрес к приложения
	 */
	define('REDIRECT_URI', 'http://test.adel-omsk.ru'.PATH);
	/**
	 * scope приложения
	 */
	define('SCOPE', $scope);

	/**
	 * протокол, по которому работаем. должен быть https
	 */
	define('PROTOCOL', "https");

	define('B24_DOMAIN', $config['B24_DOMAIN']);
}


/**
 * Производит перенаправление пользователя на заданный адрес
 *
 * @param string $url адрес
 */
function redirect($url)
{
	//Header("HTTP 302 Found");
	header("Location: ".$url);
	die();
}

/**
 * Совершает запрос с заданными данными по заданному адресу. В ответ ожидается JSON
 *
 * @param string $method GET|POST
 * @param string $url адрес
 * @param array|null $data POST-данные
 *
 * @return array
 */
function query($method, $url, $data = null)
{
	$query_data = "";

	$curlOptions = array(
		CURLOPT_RETURNTRANSFER => true
	);

	if($method == "POST")
	{
		$curlOptions[CURLOPT_POST] = true;
		$curlOptions[CURLOPT_POSTFIELDS] = http_build_query($data);
	}
	elseif(!empty($data))
	{
		$url .= strpos($url, "?") > 0 ? "&" : "?";
		$url .= http_build_query($data);
	}

	$curl = curl_init($url);
	curl_setopt_array($curl, $curlOptions);
	$result = curl_exec($curl);

	return json_decode($result, 1);
}

/**
 * Вызов метода REST.
 *
 * @param string $domain портал
 * @param string $method вызываемый метод
 * @param array $params параметры вызова метода
 *
 * @return array
 */
function call($domain, $method, $params)
{
	return query("POST", PROTOCOL."://".$domain."/rest/".$method, $params);
}

function callRest($fields)
{
	//global $QUERY_DATA;
	$queryData = readAuth();
	
	$domain = $queryData['domain'];
	$method = $fields['type'];
	$params = $fields['params'];
	
	$auth = ["auth" => $queryData["access_token"]];
	$params = array_merge($auth, $params);
	
	$call = call($domain, $method, $params);

	if ( !empty($call['error']) || !empty($call['result']['result_error']) )
	{
		$filename = $_SERVER['DOCUMENT_ROOT'] . '/b24_api/include/error_call.txt';
		add2Log($call, $filename);
	}
	
	return $call;
}

function readAuth()
{
	$filename = $_SERVER['DOCUMENT_ROOT'] . '/b24_api/include/auth.php';
	if(!file_exists($filename)) return false;


	$QUERY_DATA = json_decode(file_get_contents($filename), 1);

	$timeLeft = ( $QUERY_DATA["ts"] + $QUERY_DATA["expires_in"] - time() );

	if ( $timeLeft <= 10 )
	{
		$params = array(
			"grant_type"    => "refresh_token",
			"client_id"     => CLIENT_ID,
			"client_secret" => CLIENT_SECRET,
			"redirect_uri"  => REDIRECT_URI,
			"scope"         => SCOPE,
			"refresh_token" => $QUERY_DATA["refresh_token"],
		);
	
		$path = "/oauth/token/";
	
		$query_data = query("GET", PROTOCOL . "://" . $QUERY_DATA["domain"] . $path, $params);
	
		if ( isset($query_data["access_token"]) )
		{
			$QUERY_DATA = $query_data;
			$QUERY_DATA["ts"] = time();
			
			writeTokenToFile($QUERY_DATA);
		}else
		{
			$error = "Произошла ошибка авторизации! " . print_r($query_data);
		}
	}
	
	return $QUERY_DATA;
}

function print_r_ext($fields)
{
	echo '<pre>'; print_r($fields); echo '</pre>';
}

function writeTokenToFile(array $data)
{
	$filename = $_SERVER['DOCUMENT_ROOT'] . '/b24_api/include/auth.php';
	$data = json_encode($data);
	file_put_contents($filename, $data);
}

function add2Log($data, $filename = null)
{
	$filename = $filename ? $filename : $_SERVER['DOCUMENT_ROOT'] . '/b24_api/include/log.txt';
	$mode = FILE_APPEND;
	if(filesize($filename) > (1024 * 512))
	{
		$mode = 0;
	}
	$data = print_r($data, 1);
	file_put_contents($filename, $data, $mode);
}
