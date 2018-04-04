<?php 
class ControllerSaleepcVw extends Controller {
    private $error = array();
    
    public function index() {
        $this->language->load('saleepc/vw');
        $this->document->setTitle($this->language->get('heading_title'));
        $this->data['heading_title'] = $this->language->get('heading_title');
        if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/saleepc/vw/index.tpl')) {
            $this->template = $this->config->get('config_template') . '/template/saleepc/vw/index.tpl';
        } else {
            $this->template = 'default/template/saleepc/vw/index.tpl';
        }
        $this->document->addScript('catalog/view/javascript/jquery/tabs.js');
        
        $this->data['breadcrumbs'] = array();
        
        $this->data['breadcrumbs'][] = array(
            'text'      => $this->language->get('text_home'),
            'href'      => $this->url->link('common/home'),
            'separator' => false
          );
        $this->data['breadcrumbs'][] = array(
            'text'      => $this->language->get('heading_title'),
            'href'      => $this->url->link('saleepc/vw'),
            'separator' => $this->language->get('text_separator')
        );
        
        $this->load->model('saleepc/vw');
        
        $this->data['saleepc'] = $this->model_saleepc_vw->getModels();
          
        
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
      
    public function years() {
        $this->language->load('saleepc/vw');
        $model = (isset($this->request->get['model'])?$this->request->get['model']:null);
        $this->load->model('saleepc/vw');
        $this->data['saleepc'] = $this->model_saleepc_vw->getYears($model);
        $this->document->setTitle('Каталог '.$this->data['saleepc']['model']['modelname']);
        $this->data['heading_title'] = 'Каталог '.$this->data['saleepc']['model']['modelname'];
        if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/saleepc/vw/years.tpl')) {
            $this->template = $this->config->get('config_template') . '/template/saleepc/vw/years.tpl';
        } else {
            $this->template = 'default/template/saleepc/vw/years.tpl';
        }
        
        $this->data['breadcrumbs'] = array();
        
        $this->data['breadcrumbs'][] = array(
            'text'      => $this->language->get('text_home'),
            'href'      => $this->url->link('common/home'),
            'separator' => false
          );
        $this->data['breadcrumbs'][] = array(
            'text'      => $this->language->get('heading_title'),
            'href'      => $this->url->link('saleepc/vw'),
            'separator' => $this->language->get('text_separator')
        );
        $this->data['breadcrumbs'][] = array(
            'text'      => $this->data['saleepc']['model']['modelname'],
            'href'      => $this->url->link('saleepc/vw/years&model='.$this->data['saleepc']['model']['id']),
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
      
    public function groups() {
        $this->language->load('saleepc/vw');
        $model = (isset($this->request->get['model'])?$this->request->get['model']:null);
        $this->load->model('saleepc/vw');
        $this->data['saleepc'] = $this->model_saleepc_vw->getGroups($model);
        $this->document->setTitle('Каталог '.$this->data['saleepc']['model']['modelname'].' ['.$this->data['saleepc']['year']['yfrom'].'] ');
        $this->data['heading_title'] = 'Каталог '.$this->data['saleepc']['model']['modelname'].' ['.$this->data['saleepc']['year']['yfrom'].'] ';
        if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/saleepc/vw/groups.tpl')) {
            $this->template = $this->config->get('config_template') . '/template/saleepc/vw/groups.tpl';
        } else {
            $this->template = 'default/template/saleepc/vw/groups.tpl';
        }
        
        $this->data['breadcrumbs'] = array();
        
        $this->data['breadcrumbs'][] = array(
            'text'      => $this->language->get('text_home'),
            'href'      => $this->url->link('common/home'),
            'separator' => false
          );
        $this->data['breadcrumbs'][] = array(
            'text'      => $this->language->get('heading_title'),
            'href'      => $this->url->link('saleepc/vw'),
            'separator' => $this->language->get('text_separator')
        );
        $this->data['breadcrumbs'][] = array(
            'text'      => $this->data['saleepc']['model']['modelname'],
            'href'      => $this->url->link('saleepc/vw/years&model='.$this->data['saleepc']['model']['id']),
            'separator' => $this->language->get('text_separator')
        );
        $this->data['breadcrumbs'][] = array(
            'text'      => '['.$this->data['saleepc']['year']['yfrom'].'] '.$this->data['saleepc']['year']['modelname'],
            'href'      => $this->url->link('saleepc/vw/groups&model='.$this->data['saleepc']['year']['id']),
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
      
    public function subgroups() {
        $this->language->load('saleepc/vw');
        $model = (isset($this->request->get['model'])?$this->request->get['model']:null);
        $group = (isset($this->request->get['model'])?$this->request->get['group']:null);
        $this->load->model('saleepc/vw');
        $this->data['saleepc'] = $this->model_saleepc_vw->getSubgroups($model, $group);
        $this->document->setTitle('Каталог '.$this->data['saleepc']['model']['modelname'].' ['.$this->data['saleepc']['year']['yfrom'].'] ');
        $this->data['heading_title'] = 'Каталог '.$this->data['saleepc']['model']['modelname'].' ['.$this->data['saleepc']['year']['yfrom'].'] ';
        if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/saleepc/vw/subgroups.tpl')) {
            $this->template = $this->config->get('config_template') . '/template/saleepc/vw/subgroups.tpl';
        } else {
            $this->template = 'default/template/saleepc/vw/subgroups.tpl';
        }
        
        $this->data['breadcrumbs'] = array();
        
        $this->data['breadcrumbs'][] = array(
            'text'      => $this->language->get('text_home'),
            'href'      => $this->url->link('common/home'),
            'separator' => false
          );
        $this->data['breadcrumbs'][] = array(
            'text'      => $this->language->get('heading_title'),
            'href'      => $this->url->link('saleepc/vw'),
            'separator' => $this->language->get('text_separator')
        );
        $this->data['breadcrumbs'][] = array(
            'text'      => $this->data['saleepc']['model']['modelname'],
            'href'      => $this->url->link('saleepc/vw/years&model='.$this->data['saleepc']['model']['id']),
            'separator' => $this->language->get('text_separator')
        );
        $this->data['breadcrumbs'][] = array(
            'text'      => '['.$this->data['saleepc']['year']['yfrom'].'] '.$this->data['saleepc']['year']['modelname'],
            'href'      => $this->url->link('saleepc/vw/groups&model='.$this->data['saleepc']['year']['id']),
            'separator' => $this->language->get('text_separator')
        );
        $this->data['breadcrumbs'][] = array(
            'text'      => $this->data['saleepc']['group']['tex'],
            'href'      => $this->url->link('saleepc/vw/subgroups&model='.$this->data['saleepc']['year']['id'].'&group='.$this->data['saleepc']['group']['id']),
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
      
    public function parts() {
        $this->language->load('saleepc/vw');
        $model = (isset($this->request->get['model'])?$this->request->get['model']:null);
        $subgroup = (isset($this->request->get['model'])?$this->request->get['subgroup']:null);
        $this->load->model('saleepc/vw');
        $this->data['saleepc'] = $this->model_saleepc_vw->getParts($model, $subgroup);
        $this->document->setTitle('Каталог '.$this->data['saleepc']['model']['modelname'].' ['.$this->data['saleepc']['year']['yfrom'].'] ');
        $this->data['heading_title'] = 'Каталог '.$this->data['saleepc']['model']['modelname'].' ['.$this->data['saleepc']['year']['yfrom'].'] ';
        if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/saleepc/vw/parts.tpl')) {
            $this->template = $this->config->get('config_template') . '/template/saleepc/vw/parts.tpl';
        } else {
            $this->template = 'default/template/saleepc/vw/parts.tpl';
        }
        
        $this->data['breadcrumbs'] = array();
        
        $this->data['breadcrumbs'][] = array(
            'text'      => $this->language->get('text_home'),
            'href'      => $this->url->link('common/home'),
            'separator' => false
          );
        $this->data['breadcrumbs'][] = array(
            'text'      => $this->language->get('heading_title'),
            'href'      => $this->url->link('saleepc/vw'),
            'separator' => $this->language->get('text_separator')
        );
        $this->data['breadcrumbs'][] = array(
            'text'      => $this->data['saleepc']['model']['modelname'],
            'href'      => $this->url->link('saleepc/vw/years&model='.$this->data['saleepc']['model']['id']),
            'separator' => $this->language->get('text_separator')
        );
        $this->data['breadcrumbs'][] = array(
            'text'      => '['.$this->data['saleepc']['year']['yfrom'].'] '.$this->data['saleepc']['year']['modelname'],
            'href'      => $this->url->link('saleepc/vw/groups&model='.$this->data['saleepc']['year']['id']),
            'separator' => $this->language->get('text_separator')
        );
        $this->data['breadcrumbs'][] = array(
            'text'      => $this->data['saleepc']['group']['tex'],
            'href'      => $this->url->link('saleepc/vw/subgroups&model='.$this->data['saleepc']['year']['id'].'&group='.$this->data['saleepc']['group']['id']),
            'separator' => $this->language->get('text_separator')
        );
        $dd = unserialize($this->data['saleepc']['subgroup']['tsben'][0]['tex']);
        $this->data['breadcrumbs'][] = array(
            'text'      => implode('', $dd),
            'href'      => $this->url->link('saleepc/vw/parts&model='.$this->data['saleepc']['year']['id'].'&group='.$this->data['saleepc']['subgroup']['id']),
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
      
}
?>
