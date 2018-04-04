<?php

/**
 * Class ControllerSaleepcGeneral
 */
class ControllerSaleepcGeneral extends Controller {
  /**
   * @var array
   */
  private $error = array();

  /**
   *
   */
  public function index() {
    $this->data['to_only'] = isset($this->request->get['to_only']) ? '&to_only=1' : '';
    $general               = $this->data['to_only'] ? 'general_to' : 'general';
    $this->language->load('saleepc/general');
    $this->document->setTitle($this->language->get($general));
    $this->data['heading_title'] = $this->language->get($general);
    $this->data['PC']            = $this->language->get('PC');
    $this->data['CV']            = $this->language->get('CV');
    if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/saleepc/general/index.tpl')) {
      $this->template = $this->config->get('config_template') . '/template/saleepc/general/index.tpl';
    }
    else {
      $this->template = 'default/template/saleepc/general/index.tpl';
    }

    $this->data['breadcrumbs'] = array();

    $this->data['breadcrumbs'][] = array(
      'text'      => $this->language->get('text_home'),
      'href'      => $this->url->link('common/home'),
      'separator' => FALSE
    );
    $this->data['breadcrumbs'][] = array(
      'text'      => $this->language->get($general),
      'href'      => $this->url->link('saleepc/general',$this->data['to_only']),
      'separator' => $this->language->get('text_separator')
    );

    $this->load->model('saleepc/general');

    $this->data['saleepc']['manufacturers'] = $this->model_saleepc_general->getManufacturers();


    $this->children = array(
      'common/column_left',
      'common/column_right',
      'common/content_top',
      'common/content_bottom',
      'common/footer',
      'common/header'
    );
    $this->response->setOutput($this->render());
  }


  /**
   *
   */
  public function modelsg() {

    if (isset($this->request->get['manufacturer_id'])) {
      $manufacturer_id = $this->request->get['manufacturer_id'];
    }
    else {
      $manufacturer_id = 504;
    }
    if (isset($this->request->get['cartype'])) {
      $cartype = $this->request->get['cartype'];
    }
    else {
      $cartype = 'pc';
    }
    $this->load->model('saleepc/general');
    $models = $this->model_saleepc_general->getModels($manufacturer_id, $cartype);
    $ret    = array();
    foreach ($models['models'] as $model) {
      $itm['name']      = $model['TEX_TEXT'] . '(' . $this->dt($model['MOD_PCON_START']) . ' - ' . $this->dt($model['MOD_PCON_END']) . ')'; //
      $itm['region_id'] = $model['MOD_ID'];
      $ret[]            = $itm;
    }
    $result = array('models' => $ret);
    print json_encode($result);
  }

  /**
   * @param $dt
   *
   * @return string
   */
  private function dt($dt) {
    return ($dt ? substr($dt, 4, 2) . '/' . substr($dt, 0, 4) : 'Настоящее время');
  }

  /**
   *
   */
  public function models() {
    $this->language->load('saleepc/general');
    if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/saleepc/general/modelsv2.tpl')) {
      $this->template = $this->config->get('config_template') . '/template/saleepc/general/modelsv2.tpl';
    }
    else {
      $this->template = 'default/template/saleepc/general/modelsv2.tpl';
    }

    $this->document->addStyle('catalog/view/theme/default/stylesheet/general.css');

    $this->data['to_only'] = isset($this->request->get['to_only']) ? '&to_only=1' : '';
    $general               = $this->data['to_only'] ? 'general_to' : 'general';
    $this->load->model('saleepc/general');
    if (isset($this->request->get['manufacturer_id'])) {
      $manufacturer_id = $this->request->get['manufacturer_id'];
    }
    else {
      $manufacturer_id = 0;
    }
    if (isset($this->request->get['cartype'])) {
      $cartype = $this->request->get['cartype'];
    }
    else {
      $cartype = 'pc';
    }
    $this->data['saleepc'] = $this->model_saleepc_general->getModelsv2($manufacturer_id, $cartype);
    $this->document->setTitle($this->language->get($general) . ' ' . $this->data['saleepc']['manufacturer']['MFA_BRAND']);
    $this->data['heading_title'] = $this->language->get($general) . ' ' . $this->data['saleepc']['manufacturer']['MFA_BRAND'];
    $this->data['breadcrumbs']   = array();

    $this->data['breadcrumbs'][] = array(
      'text'      => $this->language->get('text_home'),
      'href'      => $this->url->link('common/home'),
      'separator' => FALSE
    );
    $this->data['breadcrumbs'][] = array(
      'text'      => $this->language->get($general),
      'href'      => $this->url->link('saleepc/general', $this->data['to_only']),
      'separator' => $this->language->get('text_separator')
    );
    $this->data['breadcrumbs'][] = array(
      'text'      => $this->data['saleepc']['manufacturer']['MFA_BRAND'],
      'href'      => $this->url->link('saleepc/general/models&manufacturer_id=' . $manufacturer_id . '&cartype=' . $cartype . $this->data['to_only']),
      'separator' => $this->language->get('text_separator')
    );


    $this->children = array(
      'common/column_left',
      'common/column_right',
      'common/content_top',
      'common/content_bottom',
      'common/footer',
      'common/header'
    );
    $this->response->setOutput($this->render());
  }

  /**
   *
   */
  public function modificationsg() {
    if (isset($this->request->get['model_id'])) {
      $model_id = $this->request->get['model_id'];
    }
    else {
      $model_id = 0;
    }
    $this->load->model('saleepc/general');
    $mdfs = $this->model_saleepc_general->getModifications($model_id);
    //echo '<pre>'; print_r($mdfs); echo '</pre>';

    foreach ($mdfs['modifications'] as $model) {
      $itm['name']            = $model['TYP_NAME'] . '(' . $this->dt($model['TYP_PCON_START']) . ' - ' . $this->dt($model['TYP_PCON_END']) . ') ' . $model['TYP_HP'] . 'ЛС. ' . $model['TYP_CCM'] . 'ccm'; //
      $itm['modification_id'] = $model['TYP_ID'];
      $ret[]                  = $itm;
    }
    $result = array('models' => $ret);
    print json_encode($result);


  }

  /**
   *
   */
  public function modifications() {
    $this->language->load('saleepc/general');
    if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/saleepc/general/modifications.tpl')) {
      $this->template = $this->config->get('config_template') . '/template/saleepc/general/modifications.tpl';
    }
    else {
      $this->template = 'default/template/saleepc/general/modifications.tpl';
    }
    $this->load->model('saleepc/general');
    if (isset($this->request->get['model_id'])) {
      $model_id = $this->request->get['model_id'];
    }
    else {
      $model_id = 0;
    }
    $this->data['to_only'] = isset($this->request->get['to_only']) ? '&to_only=1' : '';
    $general               = $this->data['to_only'] ? 'general_to' : 'general';
    $this->data['saleepc'] = $this->model_saleepc_general->getModifications($model_id);
    $this->document->setTitle($this->language->get($general) . ' ' . $this->data['saleepc']['manufacturer']['MFA_BRAND'] . ' ' . $this->data['saleepc']['model']['TEX_TEXT']);
    $this->data['heading_title'] = $this->language->get($general) . ' ' . $this->data['saleepc']['manufacturer']['MFA_BRAND'] . ' ' . $this->data['saleepc']['model']['TEX_TEXT'];

    $this->data['breadcrumbs'] = array();

    $this->data['breadcrumbs'][] = array(
      'text'      => $this->language->get('text_home'),
      'href'      => $this->url->link('common/home'),
      'separator' => FALSE
    );
    $this->data['breadcrumbs'][] = array(
      'text'      => $this->language->get($general),
      'href'      => $this->url->link('saleepc/general', $this->data['to_only']),
      'separator' => $this->language->get('text_separator')
    );
    $this->data['breadcrumbs'][] = array(
      'text'      => $this->data['saleepc']['manufacturer']['MFA_BRAND'],
      'href'      => $this->url->link('saleepc/general/models&manufacturer_id=' . $this->data['saleepc']['manufacturer']['MFA_ID'] . '&cartype=' . $this->data['saleepc']['cartype'] . $this->data['to_only']),
      'separator' => $this->language->get('text_separator')
    );
    $this->data['breadcrumbs'][] = array(
      'text'      => $this->data['saleepc']['model']['TEX_TEXT'],
      'href'      => $this->url->link('saleepc/general/modifications&model_id=' . $model_id),
      'separator' => $this->language->get('text_separator')
    );

    $this->children = array(
      'common/column_left',
      'common/column_right',
      'common/content_top',
      'common/content_bottom',
      'common/footer',
      'common/header'
    );
    $this->response->setOutput($this->render());
  }

  /**
   *
   */
  public function partnodes() {
    $this->language->load('saleepc/general');
    if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/saleepc/general/partnodes2.tpl')) {
      $this->template = $this->config->get('config_template') . '/template/saleepc/general/partnodes2.tpl';
    }
    else {
      $this->template = 'default/template/saleepc/general/partnodes2.tpl';
    }
    $this->load->model('saleepc/general');
    if (isset($this->request->get['modification_id'])) {
      $modification_id = $this->request->get['modification_id'];
    }
    else {
      $modification_id = 0;
    }
    if (isset($this->request->get['ga'])) {
      $ga_id = $this->request->get['ga'];
    }
    else {
      $ga_id = 0;
    }

    $this->data['saleepc'] = $this->model_saleepc_general->getPartSubNodes($modification_id, $ga_id);
    $this->document->setTitle($this->language->get('general') . ' ' . $this->data['saleepc']['manufacturer']['MFA_BRAND'] . ' ' . $this->data['saleepc']['model']['TEX_TEXT'] . ' ' . $this->data['saleepc']['modification']['TYP_NAME']);
    $this->document->addStyle('catalog/view/theme/default/stylesheet/general.css');
    $this->document->addStyle('catalog/view/theme/default/stylesheet/tree.css');
    $this->document->addScript('catalog/view/javascript/jQuery.tree.js');
    $this->document->addScript('catalog/view/javascript/example.js');
    //$this->document->addScript('catalog/view/javascript/tree.js');
    $this->data['heading_title'] = $this->language->get('general') . ' ' . $this->data['saleepc']['manufacturer']['MFA_BRAND'] . ' ' . $this->data['saleepc']['model']['TEX_TEXT'] . ' ' . $this->data['saleepc']['modification']['TYP_NAME'];

    $this->data['breadcrumbs'] = array();

    $this->data['breadcrumbs'][] = array(
      'text'      => $this->language->get('text_home'),
      'href'      => $this->url->link('common/home'),
      'separator' => FALSE
    );
    $this->data['breadcrumbs'][] = array(
      'text'      => $this->language->get('general'),
      'href'      => $this->url->link('saleepc/general'),
      'separator' => $this->language->get('text_separator')
    );
    $this->data['breadcrumbs'][] = array(
      'text'      => $this->data['saleepc']['manufacturer']['MFA_BRAND'],
      'href'      => $this->url->link('saleepc/general/models&manufacturer_id=' . $this->data['saleepc']['manufacturer']['MFA_ID'] . '&cartype=' . $this->data['saleepc']['cartype']),
      'separator' => $this->language->get('text_separator')
    );
    $this->data['breadcrumbs'][] = array(
      'text'      => $this->data['saleepc']['model']['TEX_TEXT'],
      'href'      => $this->url->link('saleepc/general/modifications&model_id=' . $this->data['saleepc']['model']['MOD_ID']),
      'separator' => $this->language->get('text_separator')
    );
    $this->data['breadcrumbs'][] = array(
      'text'      => $this->data['saleepc']['modification']['TYP_NAME'],
      'href'      => $this->url->link('saleepc/general/carinfo&modification_id=' . $this->data['saleepc']['modification']['TYP_ID']),
      'separator' => $this->language->get('text_separator')
    );


    $this->children = array(
      'common/column_left',
      'common/column_right',
      'common/content_top',
      'common/content_bottom',
      'common/footer',
      'common/header'
    );
    $this->response->setOutput($this->render());
  }

  /**
   *
   */
  public function carinfo() {
    $this->language->load('saleepc/general');

    if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/saleepc/general/carinfo' . (isset($_GET['to_only']) ? '_to' : '') . '.tpl')) {
      $this->template = $this->config->get('config_template') . '/template/saleepc/general/carinfo' . (isset($_GET['to_only']) ? '_to' : '') . '.tpl';
    }
    else {
      $this->template = 'default/template/saleepc/general/carinfo.tpl';
    }
    $this->load->model('saleepc/general');
    if (isset($this->request->get['modification_id'])) {
      $modification_id = (int) $this->request->get['modification_id'];
    }
    else {
      $modification_id = 0;
    }
    $to_only = isset($_GET['to_only']) ? '&to_only=1' : '';
    $general = $to_only ? 'general_to' : 'general';
    $this->document->addStyle('catalog/view/theme/default/stylesheet/general.css');
    $this->data['add_car_text'] = '';
    if ($this->customer->isLogged()) {
      $query = $this->db->query("Select * from oc_my_cars where modification_id = $modification_id and customer_id = " . $this->customer->getId());
      if ($query->num_rows) {
        $this->data['add_car_text'] = 'Машина в гараже';
        $this->data['add_car_link'] = '/index.php?route=account/cars/cars';
      }
      else {
        $this->data['add_car_text'] = 'Добавить в гараж';
        if (isset($_GET['to_only'])) {
          $this->data['add_car_link'] = '/index.php?route=saleepc/general/save_model_to&modification_id=' . $modification_id;
        }
        else {
          $this->data['add_car_link'] = '/index.php?route=saleepc/general/save_model&modification_id=' . $modification_id;
        }
      }
    }

    $this->data['saleepc'] = $this->model_saleepc_general->getCarInfo($modification_id);
    $this->document->setTitle($this->language->get($general) . ' ' . $this->data['saleepc']['manufacturer']['MFA_BRAND'] . ' ' . $this->data['saleepc']['model']['TEX_TEXT'] . ' ' . $this->data['saleepc']['modification']['TYP_NAME']);

    $this->data['heading_title'] = $this->language->get($general) . ' ' . $this->data['saleepc']['manufacturer']['MFA_BRAND'] . ' ' . $this->data['saleepc']['model']['TEX_TEXT'] . ' ' . $this->data['saleepc']['modification']['TYP_NAME'];

    $this->document->addScript('catalog/view/javascript/jquery/tabs.js');

    $this->data['breadcrumbs'] = array();

    $this->data['breadcrumbs'][] = array(
      'text'      => $this->language->get('text_home'),
      'href'      => $this->url->link('common/home'),
      'separator' => FALSE
    );
    $this->data['breadcrumbs'][] = array(
      'text'      => $this->language->get($general),
      'href'      => $this->url->link('saleepc/general', $to_only),
      'separator' => $this->language->get('text_separator')
    );
    $this->data['breadcrumbs'][] = array(
      'text'      => $this->data['saleepc']['manufacturer']['MFA_BRAND'],
      'href'      => $this->url->link('saleepc/general/models&manufacturer_id=' . $this->data['saleepc']['manufacturer']['MFA_ID'] . '&cartype=' . $this->data['saleepc']['cartype'] . $to_only),
      'separator' => $this->language->get('text_separator')
    );
    $this->data['breadcrumbs'][] = array(
      'text'      => $this->data['saleepc']['model']['TEX_TEXT'],
      'href'      => $this->url->link('saleepc/general/modifications&model_id=' . $this->data['saleepc']['model']['MOD_ID'], $to_only),
      'separator' => $this->language->get('text_separator')
    );
    $this->data['breadcrumbs'][] = array(
      'text'      => $this->data['saleepc']['modification']['TYP_NAME'],
      'href'      => $this->url->link('saleepc/general/carinfo&modification_id=' . $this->data['saleepc']['modification']['TYP_ID']),
      'separator' => $this->language->get('text_separator')
    );


    $this->children = array(
      'common/column_left',
      'common/column_right',
      'common/content_top',
      'common/content_bottom',
      'common/footer',
      'common/header'
    );
    $this->response->setOutput($this->render());
  }

  /**
   *
   */
  public function parts() {
    $this->language->load('saleepc/general');
    if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/saleepc/general/parts.tpl')) {
      $this->template = $this->config->get('config_template') . '/template/saleepc/general/parts.tpl';
    }
    else {
      $this->template = 'default/template/saleepc/general/parts.tpl';
    }
    $this->load->model('saleepc/general');
    if (isset($this->request->get['modification_id'])) {
      $modification_id = $this->request->get['modification_id'];
    }
    else {
      $modification_id = 0;
    }
    if (isset($this->request->get['partnode_id'])) {
      $partnode_id = $this->request->get['partnode_id'];
    }
    else {
      $partnode_id = 0;
    }

    $this->data['saleepc'] = $this->model_saleepc_general->getParts($modification_id, $partnode_id);
    $this->document->setTitle($this->language->get('general') . ' ' . $this->data['saleepc']['manufacturer']['MFA_BRAND'] . ' ' . $this->data['saleepc']['model']['TEX_TEXT'] . ' ' . $this->data['saleepc']['modification']['TYP_NAME'] . ' ' . $this->data['saleepc']['parts'][0]['GA_TEXT']);
    $this->data['heading_title'] = $this->language->get('general') . ' ' . $this->data['saleepc']['manufacturer']['MFA_BRAND'] . ' ' . $this->data['saleepc']['model']['TEX_TEXT'] . ' ' . $this->data['saleepc']['modification']['TYP_NAME'] . ' ' . $this->data['saleepc']['parts'][0]['GA_TEXT'];

    $this->data['breadcrumbs'] = array();

    $this->data['breadcrumbs'][] = array(
      'text'      => $this->language->get('text_home'),
      'href'      => $this->url->link('common/home'),
      'separator' => FALSE
    );
    $this->data['breadcrumbs'][] = array(
      'text'      => $this->language->get('general'),
      'href'      => $this->url->link('saleepc/general'),
      'separator' => $this->language->get('text_separator')
    );
    $this->data['breadcrumbs'][] = array(
      'text'      => $this->data['saleepc']['manufacturer']['MFA_BRAND'],
      'href'      => $this->url->link('saleepc/general/models&manufacturer_id=' . $this->data['saleepc']['manufacturer']['MFA_ID'] . '&cartype=' . $this->data['saleepc']['cartype']),
      'separator' => $this->language->get('text_separator')
    );
    $this->data['breadcrumbs'][] = array(
      'text'      => $this->data['saleepc']['model']['TEX_TEXT'],
      'href'      => $this->url->link('saleepc/general/modifications&model_id=' . $this->data['saleepc']['model']['MOD_ID']),
      'separator' => $this->language->get('text_separator')
    );
    $this->data['breadcrumbs'][] = array(
      'text'      => $this->data['saleepc']['modification']['TYP_NAME'],
      'href'      => $this->url->link('saleepc/general/partnodes&modification_id=' . $this->data['saleepc']['modification']['TYP_ID']),
      'separator' => $this->language->get('text_separator')
    );
    $this->data['breadcrumbs'][] = array(
      'text'      => $this->data['saleepc']['parts'][0]['GA_TEXT'],
      'href'      => $this->url->link('saleepc/general/parts&modification_id=' . $this->data['saleepc']['modification']['TYP_ID'] . '&partnode_id=' . $partnode_id),
      'separator' => $this->language->get('text_separator')
    );


    $this->children = array(
      'common/column_left',
      'common/column_right',
      'common/content_top',
      'common/content_bottom',
      'common/footer',
      'common/header'
    );
    $this->response->setOutput($this->render());
  }

  /**
   *
   */
  public function search() {
    $this->language->load('saleepc/general');
    $this->document->setTitle($this->language->get('general'));
    $this->data['heading_title'] = $this->language->get('general');
    if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/saleepc/general/search.tpl')) {
      $this->template = $this->config->get('config_template') . '/template/saleepc/general/search.tpl';
    }
    else {
      $this->template = 'default/template/saleepc/general/search.tpl';
    }

    $this->data['breadcrumbs'] = array();

    $this->data['breadcrumbs'][] = array(
      'text'      => $this->language->get('text_home'),
      'href'      => $this->url->link('common/home'),
      'separator' => FALSE
    );
    $this->data['breadcrumbs'][] = array(
      'text'      => $this->language->get('general'),
      'href'      => $this->url->link('saleepc/general'),
      'separator' => $this->language->get('text_separator')
    );

    $this->load->model('saleepc/general');

    if (isset($this->request->get['nomer'])) {
      $nomer = $this->request->get['nomer'];
    }
    else {
      $nomer = 0;
    }

    $this->data['saleepc']['nomers'] = $this->model_saleepc_general->getCrosses($nomer);


    $this->children = array(
      'common/column_left',
      'common/column_right',
      'common/content_top',
      'common/content_bottom',
      'common/footer',
      'common/header'
    );
    $this->response->setOutput($this->render());
  }

  /**
   *
   */
  function save_model_to() {
    $this->save_model('&to_only=1');
  }

  /**
   * @param string $to_only
   */
  function save_model($to_only = '') {
    $this->load->model('saleepc/general');
    if (isset($this->request->post['modification_id'])) {
      $ci = $this->model_saleepc_general->getCarInfo((int) $this->request->post['modification_id'], 'pc');
    }
    elseif (isset($this->request->get['modification_id'])) {
      $ci = $this->model_saleepc_general->getCarInfo((int) $this->request->get['modification_id'], 'pc');
    }
    $items[] = array(
      'mark_id'         => intval($ci['manufacturer']['MFA_ID']),
      'model_id'        => intval($ci['model']['MOD_ID']),
      'modification_id' => intval($ci['modification']['TYP_ID'])
    );
    setcookie(LAST_CAR_COOKIE, serialize($items), time() + 3600 * 24 * 365, '/', $_SERVER['HTTP_HOST']);
    if ($this->customer->isLogged() && count($ci)) {
      $sql = 'customer_id=' . $this->customer->getId() . ',date_created = now()';
      $sql .= ",modification_name='" . $ci['modification']['TYP_NAME'] . "'";
      $sql .= ",model_name='" . $ci['model']['TEX_TEXT'] . "'";
      $sql .= ",mark_name='" . $ci['manufacturer']['MFA_BRAND'] . "'";
      $sql .= ",model_id=" . $ci['model']['MOD_ID'];
      $sql .= ",mark_id=" . $ci['manufacturer']['MFA_ID'];
      $sql .= ",modification_id=" . $ci['modification']['TYP_ID'];
      $this->db->query("Insert ignore into oc_my_cars set $sql");
    }
    $this->response->redirect('/?route=saleepc/general/carinfo&modification_id=' . $_REQUEST['modification_id']) . $to_only;
  }

  /**
   * @return bool
   */
  private function validate() {
    if (!$this->customer->login($this->request->post['email'], $this->request->post['password'])) {
      $this->error['warning'] = $this->language->get('error_login');
    }

    $customer_info = $this->model_account_customer->getCustomerByEmail($this->request->post['email']);

    if ($customer_info && !$customer_info['approved']) {
      $this->error['warning'] = $this->language->get('error_approved');
    }

    if (!$this->error) {
      return TRUE;
    }
    else {
      return FALSE;
    }
  }
}

?>
