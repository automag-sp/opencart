<?php

class ControllerVinVin extends Controller{
    function index(){

        
        if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/vin/form.tpl')) {
            $this->template = $this->config->get('config_template') . '/template/vin/form.tpl';
        }
        else {
            $this->template = 'default/template/vin/form.tpl';
        }

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
}