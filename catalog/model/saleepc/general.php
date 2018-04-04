<?php

class ModelSaleepcGeneral extends Model{

  protected $soap;

  protected $user;

  protected $cache_ver;

  protected $cache_expire;

  public function __construct($registry){
    parent::__construct($registry);
    $this->soap = new SoapClient("http://soap.saleepc.ru/saleepc.wsdl");
    $this->user = $this->config->get("saleepclogin");
    $this->cache_ver = ':v3.2';
    $this->cache_expire = 3600 * 24 * 3;
  }

  public function getManufacturers(){

    $cache = __CLASS__ . '.' . __FUNCTION__ . '=' . 0 . $this->cache_ver;
    if ($ret = $this->cache->get($cache)) {
      return $ret;
    }
    $ret = $this->soap->getData($this->user, 'general', 'index', []);
    $this->cache->set($cache, $ret, $this->cache_expire);
    return $ret;
  }

  public function getModels($manufacturer_id, $cartype){
    $cache = __CLASS__ . '.' . __FUNCTION__ . '=' . $manufacturer_id . ':' . $cartype . ':' . $this->cache_ver;
    if ($ret = $this->cache->get($cache)) {
      return $ret;
    }
    $ret = $this->soap->getData($this->user, 'general', 'models', ['manufacturer_id' => $manufacturer_id, 'cartype' => $cartype]);
    $this->cache->set($cache, $ret, $this->cache_expire);
    return $ret;

    //return array('manufacturer_id' => $manufacturer_id, 'cartype' => $cartype);
  }

  public function getModelsv2($manufacturer_id, $cartype){
    $cache = __CLASS__ . '.' . __FUNCTION__ . '=' . $manufacturer_id . ':' . $cartype . ':' . $this->cache_ver;
    if ($ret = $this->cache->get($cache)) {
      return $ret;
    }
    $ret = $this->soap->getData($this->user, 'general', 'modelsv2', ['manufacturer_id' => $manufacturer_id, 'cartype' => $cartype]);
    $this->cache->set($cache, $ret, $this->cache_expire);
    return $ret;
    //return array('manufacturer_id' => $manufacturer_id, 'cartype' => $cartype);
  }

  public function getModifications($model_id){
    $cache = __CLASS__ . '.' . __FUNCTION__ . '=' . $model_id . $this->cache_ver;
    if ($ret = $this->cache->get($cache)) {
      return $ret;
    }
    $ret = $this->soap->getData($this->user, 'general', 'modifications', ['model_id' => $model_id]);
    $this->cache->set($cache, $ret, $this->cache_expire);
    return $ret;
  }

  public function getPartNodes($modification_id){
    $cache = __CLASS__ . '.' . __FUNCTION__ . '=' . $modification_id . $this->cache_ver;
    if ($ret = $this->cache->get($cache)) {
      return $ret;
    }
    $ret = $this->soap->getData($this->user, 'general', 'partnodes', ['modification_id' => $modification_id]);
    $this->cache->set($cache, $ret, $this->cache_expire);
    return $ret;
  }

  public function getPartSubNodes($modification_id, $ga_id){
    $cache = __CLASS__ . '.' . __FUNCTION__ . '=' . $modification_id . ':' . $ga_id . ':' . $this->cache_ver;
    if ($ret = $this->cache->get($cache)) {
      return $ret;
    }
    $ret = $this->soap->getData($this->user, 'general', 'partsubnodes', ['modification_id' => $modification_id, 'ga_id' => $ga_id]);
    $this->cache->set($cache, $ret, $this->cache_expire);
    return $ret;
  }

  public function getCarInfo($modification_id){
    $cache = __CLASS__ . '.' . __FUNCTION__ . '=' . $modification_id .':' . $this->cache_ver;
    if ($ret = $this->cache->get($cache)) {
      return $ret;
    }
    $ret = $this->soap->getData($this->user, 'general', 'carinfo', ['modification_id' => $modification_id]);
    $this->cache->set($cache, $ret, $this->cache_expire);
    return $ret;
  }

  public function getParts($modification_id, $partnode_id){
    $cache = __CLASS__ . '.' . __FUNCTION__ . '=' . $modification_id . ':' . $partnode_id . ':' . $this->cache_ver;
    if ($ret = $this->cache->get($cache)) {
      return $ret;
    }
    $ret = $this->soap->getData($this->user, 'general', 'parts', ['modification_id' => $modification_id, 'partnode_id' => $partnode_id]);
    $this->cache->set($cache, $ret, $this->cache_expire);
    return $ret;
  }
}

?>
