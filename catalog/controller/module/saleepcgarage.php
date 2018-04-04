<?php

class ControllerModuleSaleepcgarage extends Controller {
  protected function index() {
    if (isset($this->request->cookie[LAST_CAR_COOKIE])) {
      $g11 = str_replace('&quot;', '"', $this->request->cookie[LAST_CAR_COOKIE]);
      $g11 = unserialize($g11);
      $g11 = reset($g11);
      $this->load->model('saleepc/general');
      $ci               = $this->model_saleepc_general->getCarInfo((int) $g11['modification_id'], 'pc');
      $this->data['g11'] = array(
        'mark_id'         => intval($ci['manufacturer']['MFA_ID']),
        'model_id'        => intval($ci['model']['MOD_ID']),
        'modification_id' => intval($ci['modification']['TYP_ID'])
      );
    }
    $this->data['submit_text'] = 'Просмотр';
    if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/saleepcgarage.tpl')) {
      $this->template = $this->config->get('config_template') . '/template/module/saleepcgarage.tpl';
    }
    else {
      $this->template = 'default/template/module/saleepcgarage.tpl';
    }
    $this->render();
  }
}

?>