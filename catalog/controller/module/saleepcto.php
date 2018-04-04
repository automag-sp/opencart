<?php

class ControllerModuleSaleepcto extends Controller {
  protected function index() {
    
    $this->data['submit_text'] = 'Просмотр';
    if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/saleepcto.tpl')) {
      $this->template = $this->config->get('config_template') . '/template/module/saleepcto.tpl';
    }
    else {
      $this->template = 'default/template/module/saleepcto.tpl';
    }
    $this->render();
  }
}

?>