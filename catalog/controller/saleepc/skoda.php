<?php 
class ControllerSaleepcSkoda extends Controller {
    private $error = array();
    
    public function index() {
        $this->language->load('saleepc/skoda');
        $this->document->setTitle($this->language->get('heading_title'));
        $this->data['heading_title'] = $this->language->get('heading_title');
        if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/saleepc/skoda/index.tpl')) {
            $this->template = $this->config->get('config_template') . '/template/saleepc/skoda/index.tpl';
        } else {
            $this->template = 'default/template/saleepc/skoda/index.tpl';
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
            'href'      => $this->url->link('saleepc/skoda'),
            'separator' => $this->language->get('text_separator')
        );
        
        $this->load->model('saleepc/skoda');
        
        $this->data['saleepc'] = $this->model_saleepc_skoda->getModels();
          
        
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
        $this->language->load('saleepc/skoda');
        $model = (isset($this->request->get['model'])?$this->request->get['model']:null);
        $this->load->model('saleepc/skoda');
        $this->data['saleepc'] = $this->model_saleepc_skoda->getYears($model);
        $this->document->setTitle('Каталог '.$this->data['saleepc']['model']['modelname']);
        $this->data['heading_title'] = 'Каталог '.$this->data['saleepc']['model']['modelname'];
        if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/saleepc/skoda/years.tpl')) {
            $this->template = $this->config->get('config_template') . '/template/saleepc/skoda/years.tpl';
        } else {
            $this->template = 'default/template/saleepc/skoda/years.tpl';
        }
        
        $this->data['breadcrumbs'] = array();
        
        $this->data['breadcrumbs'][] = array(
            'text'      => $this->language->get('text_home'),
            'href'      => $this->url->link('common/home'),
            'separator' => false
          );
        $this->data['breadcrumbs'][] = array(
            'text'      => $this->language->get('heading_title'),
            'href'      => $this->url->link('saleepc/skoda'),
            'separator' => $this->language->get('text_separator')
        );
        $this->data['breadcrumbs'][] = array(
            'text'      => $this->data['saleepc']['model']['modelname'],
            'href'      => $this->url->link('saleepc/skoda/years&model='.$this->data['saleepc']['model']['id']),
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
        $this->language->load('saleepc/skoda');
        $model = (isset($this->request->get['model'])?$this->request->get['model']:null);
        $this->load->model('saleepc/skoda');
        $this->data['saleepc'] = $this->model_saleepc_skoda->getGroups($model);
        $this->document->setTitle('Каталог '.$this->data['saleepc']['model']['modelname'].' ['.$this->data['saleepc']['year']['yfrom'].'] ');
        $this->data['heading_title'] = 'Каталог '.$this->data['saleepc']['model']['modelname'].' ['.$this->data['saleepc']['year']['yfrom'].'] ';
        if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/saleepc/skoda/groups.tpl')) {
            $this->template = $this->config->get('config_template') . '/template/saleepc/skoda/groups.tpl';
        } else {
            $this->template = 'default/template/saleepc/skoda/groups.tpl';
        }
        
        $this->data['breadcrumbs'] = array();
        
        $this->data['breadcrumbs'][] = array(
            'text'      => $this->language->get('text_home'),
            'href'      => $this->url->link('common/home'),
            'separator' => false
          );
        $this->data['breadcrumbs'][] = array(
            'text'      => $this->language->get('heading_title'),
            'href'      => $this->url->link('saleepc/skoda'),
            'separator' => $this->language->get('text_separator')
        );
        $this->data['breadcrumbs'][] = array(
            'text'      => $this->data['saleepc']['model']['modelname'],
            'href'      => $this->url->link('saleepc/skoda/years&model='.$this->data['saleepc']['model']['id']),
            'separator' => $this->language->get('text_separator')
        );
        $this->data['breadcrumbs'][] = array(
            'text'      => '['.$this->data['saleepc']['year']['yfrom'].'] '.$this->data['saleepc']['year']['modelname'],
            'href'      => $this->url->link('saleepc/skoda/groups&model='.$this->data['saleepc']['year']['id']),
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
        $this->language->load('saleepc/skoda');
        $model = (isset($this->request->get['model'])?$this->request->get['model']:null);
        $group = (isset($this->request->get['model'])?$this->request->get['group']:null);
        $this->load->model('saleepc/skoda');
        $this->data['saleepc'] = $this->model_saleepc_skoda->getSubgroups($model, $group);
        $this->document->setTitle('Каталог '.$this->data['saleepc']['model']['modelname'].' ['.$this->data['saleepc']['year']['yfrom'].'] ');
        $this->data['heading_title'] = 'Каталог '.$this->data['saleepc']['model']['modelname'].' ['.$this->data['saleepc']['year']['yfrom'].'] ';
        if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/saleepc/skoda/subgroups.tpl')) {
            $this->template = $this->config->get('config_template') . '/template/saleepc/skoda/subgroups.tpl';
        } else {
            $this->template = 'default/template/saleepc/skoda/subgroups.tpl';
        }
        
        $this->data['breadcrumbs'] = array();
        
        $this->data['breadcrumbs'][] = array(
            'text'      => $this->language->get('text_home'),
            'href'      => $this->url->link('common/home'),
            'separator' => false
          );
        $this->data['breadcrumbs'][] = array(
            'text'      => $this->language->get('heading_title'),
            'href'      => $this->url->link('saleepc/skoda'),
            'separator' => $this->language->get('text_separator')
        );
        $this->data['breadcrumbs'][] = array(
            'text'      => $this->data['saleepc']['model']['modelname'],
            'href'      => $this->url->link('saleepc/skoda/years&model='.$this->data['saleepc']['model']['id']),
            'separator' => $this->language->get('text_separator')
        );
        $this->data['breadcrumbs'][] = array(
            'text'      => '['.$this->data['saleepc']['year']['yfrom'].'] '.$this->data['saleepc']['year']['modelname'],
            'href'      => $this->url->link('saleepc/skoda/groups&model='.$this->data['saleepc']['year']['id']),
            'separator' => $this->language->get('text_separator')
        );
        $this->data['breadcrumbs'][] = array(
            'text'      => $this->data['saleepc']['group']['tex'],
            'href'      => $this->url->link('saleepc/skoda/subgroups&model='.$this->data['saleepc']['year']['id'].'&group='.$this->data['saleepc']['group']['id']),
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
        $this->language->load('saleepc/skoda');
        $model = (isset($this->request->get['model'])?$this->request->get['model']:null);
        $subgroup = (isset($this->request->get['model'])?$this->request->get['subgroup']:null);
        $this->load->model('saleepc/skoda');
        $this->data['saleepc'] = $this->model_saleepc_skoda->getParts($model, $subgroup);
        $this->document->setTitle('Каталог '.$this->data['saleepc']['model']['modelname'].' ['.$this->data['saleepc']['year']['yfrom'].'] ');
        $this->data['heading_title'] = 'Каталог '.$this->data['saleepc']['model']['modelname'].' ['.$this->data['saleepc']['year']['yfrom'].'] ';
        if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/saleepc/skoda/parts.tpl')) {
            $this->template = $this->config->get('config_template') . '/template/saleepc/skoda/parts.tpl';
        } else {
            $this->template = 'default/template/saleepc/skoda/parts.tpl';
        }
        
        $this->data['breadcrumbs'] = array();
        
        $this->data['breadcrumbs'][] = array(
            'text'      => $this->language->get('text_home'),
            'href'      => $this->url->link('common/home'),
            'separator' => false
          );
        $this->data['breadcrumbs'][] = array(
            'text'      => $this->language->get('heading_title'),
            'href'      => $this->url->link('saleepc/skoda'),
            'separator' => $this->language->get('text_separator')
        );
        $this->data['breadcrumbs'][] = array(
            'text'      => $this->data['saleepc']['model']['modelname'],
            'href'      => $this->url->link('saleepc/skoda/years&model='.$this->data['saleepc']['model']['id']),
            'separator' => $this->language->get('text_separator')
        );
        $this->data['breadcrumbs'][] = array(
            'text'      => '['.$this->data['saleepc']['year']['yfrom'].'] '.$this->data['saleepc']['year']['modelname'],
            'href'      => $this->url->link('saleepc/skoda/groups&model='.$this->data['saleepc']['year']['id']),
            'separator' => $this->language->get('text_separator')
        );
        $this->data['breadcrumbs'][] = array(
            'text'      => $this->data['saleepc']['group']['tex'],
            'href'      => $this->url->link('saleepc/skoda/subgroups&model='.$this->data['saleepc']['year']['id'].'&group='.$this->data['saleepc']['group']['id']),
            'separator' => $this->language->get('text_separator')
        );
        $dd = unserialize($this->data['saleepc']['subgroup']['tsben'][0]['tex']);
        $this->data['breadcrumbs'][] = array(
            'text'      => implode('', $dd),
            'href'      => $this->url->link('saleepc/skoda/parts&model='.$this->data['saleepc']['year']['id'].'&group='.$this->data['saleepc']['subgroup']['id']),
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
