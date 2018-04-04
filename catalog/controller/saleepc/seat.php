<?php 
class ControllerSaleepcSeat extends Controller {
    private $error = array();
    
    public function index() {
        $this->language->load('saleepc/seat');
        $this->document->setTitle($this->language->get('heading_title'));
        $this->data['heading_title'] = $this->language->get('heading_title');
        if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/saleepc/seat/index.tpl')) {
            $this->template = $this->config->get('config_template') . '/template/saleepc/seat/index.tpl';
        } else {
            $this->template = 'default/template/saleepc/seat/index.tpl';
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
            'href'      => $this->url->link('saleepc/seat'),
            'separator' => $this->language->get('text_separator')
        );
        
        $this->load->model('saleepc/seat');
        
        $this->data['saleepc'] = $this->model_saleepc_seat->getModels();
          
        
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
        $this->language->load('saleepc/seat');
        $model = (isset($this->request->get['model'])?$this->request->get['model']:null);
        $this->load->model('saleepc/seat');
        $this->data['saleepc'] = $this->model_saleepc_seat->getYears($model);
        $this->document->setTitle('Каталог '.$this->data['saleepc']['model']['modelname']);
        $this->data['heading_title'] = 'Каталог '.$this->data['saleepc']['model']['modelname'];
        if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/saleepc/seat/years.tpl')) {
            $this->template = $this->config->get('config_template') . '/template/saleepc/seat/years.tpl';
        } else {
            $this->template = 'default/template/saleepc/seat/years.tpl';
        }
        
        $this->data['breadcrumbs'] = array();
        
        $this->data['breadcrumbs'][] = array(
            'text'      => $this->language->get('text_home'),
            'href'      => $this->url->link('common/home'),
            'separator' => false
          );
        $this->data['breadcrumbs'][] = array(
            'text'      => $this->language->get('heading_title'),
            'href'      => $this->url->link('saleepc/seat'),
            'separator' => $this->language->get('text_separator')
        );
        $this->data['breadcrumbs'][] = array(
            'text'      => $this->data['saleepc']['model']['modelname'],
            'href'      => $this->url->link('saleepc/seat/years&model='.$this->data['saleepc']['model']['id']),
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
        $this->language->load('saleepc/seat');
        $model = (isset($this->request->get['model'])?$this->request->get['model']:null);
        $this->load->model('saleepc/seat');
        $this->data['saleepc'] = $this->model_saleepc_seat->getGroups($model);
        $this->document->setTitle('Каталог '.$this->data['saleepc']['model']['modelname'].' ['.$this->data['saleepc']['year']['yfrom'].'] ');
        $this->data['heading_title'] = 'Каталог '.$this->data['saleepc']['model']['modelname'].' ['.$this->data['saleepc']['year']['yfrom'].'] ';
        if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/saleepc/seat/groups.tpl')) {
            $this->template = $this->config->get('config_template') . '/template/saleepc/seat/groups.tpl';
        } else {
            $this->template = 'default/template/saleepc/seat/groups.tpl';
        }
        
        $this->data['breadcrumbs'] = array();
        
        $this->data['breadcrumbs'][] = array(
            'text'      => $this->language->get('text_home'),
            'href'      => $this->url->link('common/home'),
            'separator' => false
          );
        $this->data['breadcrumbs'][] = array(
            'text'      => $this->language->get('heading_title'),
            'href'      => $this->url->link('saleepc/seat'),
            'separator' => $this->language->get('text_separator')
        );
        $this->data['breadcrumbs'][] = array(
            'text'      => $this->data['saleepc']['model']['modelname'],
            'href'      => $this->url->link('saleepc/seat/years&model='.$this->data['saleepc']['model']['id']),
            'separator' => $this->language->get('text_separator')
        );
        $this->data['breadcrumbs'][] = array(
            'text'      => '['.$this->data['saleepc']['year']['yfrom'].'] '.$this->data['saleepc']['year']['modelname'],
            'href'      => $this->url->link('saleepc/seat/groups&model='.$this->data['saleepc']['year']['id']),
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
        $this->language->load('saleepc/seat');
        $model = (isset($this->request->get['model'])?$this->request->get['model']:null);
        $group = (isset($this->request->get['model'])?$this->request->get['group']:null);
        $this->load->model('saleepc/seat');
        $this->data['saleepc'] = $this->model_saleepc_seat->getSubgroups($model, $group);
        $this->document->setTitle('Каталог '.$this->data['saleepc']['model']['modelname'].' ['.$this->data['saleepc']['year']['yfrom'].'] ');
        $this->data['heading_title'] = 'Каталог '.$this->data['saleepc']['model']['modelname'].' ['.$this->data['saleepc']['year']['yfrom'].'] ';
        if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/saleepc/seat/subgroups.tpl')) {
            $this->template = $this->config->get('config_template') . '/template/saleepc/seat/subgroups.tpl';
        } else {
            $this->template = 'default/template/saleepc/seat/subgroups.tpl';
        }
        
        $this->data['breadcrumbs'] = array();
        
        $this->data['breadcrumbs'][] = array(
            'text'      => $this->language->get('text_home'),
            'href'      => $this->url->link('common/home'),
            'separator' => false
          );
        $this->data['breadcrumbs'][] = array(
            'text'      => $this->language->get('heading_title'),
            'href'      => $this->url->link('saleepc/seat'),
            'separator' => $this->language->get('text_separator')
        );
        $this->data['breadcrumbs'][] = array(
            'text'      => $this->data['saleepc']['model']['modelname'],
            'href'      => $this->url->link('saleepc/seat/years&model='.$this->data['saleepc']['model']['id']),
            'separator' => $this->language->get('text_separator')
        );
        $this->data['breadcrumbs'][] = array(
            'text'      => '['.$this->data['saleepc']['year']['yfrom'].'] '.$this->data['saleepc']['year']['modelname'],
            'href'      => $this->url->link('saleepc/seat/groups&model='.$this->data['saleepc']['year']['id']),
            'separator' => $this->language->get('text_separator')
        );
        $this->data['breadcrumbs'][] = array(
            'text'      => $this->data['saleepc']['group']['tex'],
            'href'      => $this->url->link('saleepc/seat/subgroups&model='.$this->data['saleepc']['year']['id'].'&group='.$this->data['saleepc']['group']['id']),
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
        $this->language->load('saleepc/seat');
        $model = (isset($this->request->get['model'])?$this->request->get['model']:null);
        $subgroup = (isset($this->request->get['model'])?$this->request->get['subgroup']:null);
        $this->load->model('saleepc/seat');
        $this->data['saleepc'] = $this->model_saleepc_seat->getParts($model, $subgroup);
        $this->document->setTitle('Каталог '.$this->data['saleepc']['model']['modelname'].' ['.$this->data['saleepc']['year']['yfrom'].'] ');
        $this->data['heading_title'] = 'Каталог '.$this->data['saleepc']['model']['modelname'].' ['.$this->data['saleepc']['year']['yfrom'].'] ';
        if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/saleepc/seat/parts.tpl')) {
            $this->template = $this->config->get('config_template') . '/template/saleepc/seat/parts.tpl';
        } else {
            $this->template = 'default/template/saleepc/seat/parts.tpl';
        }
        
        $this->data['breadcrumbs'] = array();
        
        $this->data['breadcrumbs'][] = array(
            'text'      => $this->language->get('text_home'),
            'href'      => $this->url->link('common/home'),
            'separator' => false
          );
        $this->data['breadcrumbs'][] = array(
            'text'      => $this->language->get('heading_title'),
            'href'      => $this->url->link('saleepc/seat'),
            'separator' => $this->language->get('text_separator')
        );
        $this->data['breadcrumbs'][] = array(
            'text'      => $this->data['saleepc']['model']['modelname'],
            'href'      => $this->url->link('saleepc/seat/years&model='.$this->data['saleepc']['model']['id']),
            'separator' => $this->language->get('text_separator')
        );
        $this->data['breadcrumbs'][] = array(
            'text'      => '['.$this->data['saleepc']['year']['yfrom'].'] '.$this->data['saleepc']['year']['modelname'],
            'href'      => $this->url->link('saleepc/seat/groups&model='.$this->data['saleepc']['year']['id']),
            'separator' => $this->language->get('text_separator')
        );
        $this->data['breadcrumbs'][] = array(
            'text'      => $this->data['saleepc']['group']['tex'],
            'href'      => $this->url->link('saleepc/seat/subgroups&model='.$this->data['saleepc']['year']['id'].'&group='.$this->data['saleepc']['group']['id']),
            'separator' => $this->language->get('text_separator')
        );
        $dd = unserialize($this->data['saleepc']['subgroup']['tsben'][0]['tex']);
        $this->data['breadcrumbs'][] = array(
            'text'      => implode('', $dd),
            'href'      => $this->url->link('saleepc/seat/parts&model='.$this->data['saleepc']['year']['id'].'&group='.$this->data['saleepc']['subgroup']['id']),
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
