<?php 
class ControllerSaleepcKia extends Controller {
    private $error = array();
    
    public function index() {
        $this->language->load('saleepc/kia');
        if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/saleepc/kia/index.tpl')) {
            $this->template = $this->config->get('config_template') . '/template/saleepc/kia/index.tpl';
        } else {
            $this->template = 'default/template/saleepc/kia/index.tpl';
        }
        
        
        $this->load->model('saleepc/kia');
        
        $this->data['saleepc'] = $this->model_saleepc_kia->getModels();
        
        $this->document->setTitle('Kia');
        $this->data['heading_title'] = 'kia';
        
        $this->document->addStyle('catalog/view/theme/journal2/css/saleepc.css');

        
        $this->data['breadcrumbs'] = array();
        $this->data['breadcrumbs'][] = array(
            'text'      => $this->language->get('text_home'),
            'href'      => $this->url->link('common/home'),
            'separator' => false
          );
        $this->data['breadcrumbs'][] = array(
            'text'      => 'kia',
            'href'      => $this->url->link('saleepc/kia'),
            'separator' => $this->language->get('text_separator')
        );
        
        $this->data['text_search_vin'] = $this->language->get('text_search_vin');
        $this->data['text_search'] = $this->language->get('text_search');
        $this->data['text_type'] = $this->language->get('text_type');
        $this->data['text_year'] = $this->language->get('text_year');
        $this->data['text_region'] = $this->language->get('text_region');
        $this->data['text_all'] = $this->language->get('text_all');
        
          
        
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
    
    public function vin() {
        $this->language->load('saleepc/kia');
        if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/saleepc/kia/vin.tpl')) {
            $this->template = $this->config->get('config_template') . '/template/saleepc/kia/vin.tpl';
        } else {
            $this->template = 'default/template/saleepc/kia/vin.tpl';
        }
        
        
        $this->load->model('saleepc/kia');
        
        $vin = (isset($this->request->get['vin'])?$this->request->get['vin']:null);
        
        
        $this->data['saleepc'] = $this->model_saleepc_kia->getVin($vin);
        
        $this->document->setTitle('kia VIN: '.$this->data['saleepc']['vin']);
        $this->data['heading_title'] = 'kia VIN: '.$this->data['saleepc']['vin'];
        
        $this->document->addStyle('catalog/view/theme/journal2/css/saleepc.css');
        
        $this->data['breadcrumbs'] = array();
        $this->data['breadcrumbs'][] = array(
            'text'      => $this->language->get('text_home'),
            'href'      => $this->url->link('common/home'),
            'separator' => false
          );
        $this->data['breadcrumbs'][] = array(
            'text'      => 'kia',
            'href'      => $this->url->link('saleepc/kia'),
            'separator' => $this->language->get('text_separator')
        );
        
        $this->data['breadcrumbs'][] = array(
            'text'      => 'VIN: '.$this->data['saleepc']['vin'],
            'href'      => $this->url->link('saleepc/kia/vin&vin='.$this->data['saleepc']['vin']),
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
      
    
    public function modifications() {
        $this->language->load('saleepc/kia');
        if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/saleepc/kia/modifications.tpl')) {
            $this->template = $this->config->get('config_template') . '/template/saleepc/kia/modifications.tpl';
        } else {
            $this->template = 'default/template/saleepc/kia/modifications.tpl';
        }
        
        
        $this->load->model('saleepc/kia');
        
        $model = (isset($this->request->get['model'])?$this->request->get['model']:null);
        
        
        $this->data['saleepc'] = $this->model_saleepc_kia->getModifications($model);
        
        $this->document->setTitle('Hyndai '.$this->data['saleepc']['model']['CatName']);
        $this->data['heading_title'] = 'kia '.$this->data['saleepc']['model']['CatName'];
        
        $this->document->addStyle('catalog/view/theme/journal2/css/saleepc.css');
        
        $this->data['breadcrumbs'] = array();
        $this->data['breadcrumbs'][] = array(
            'text'      => $this->language->get('text_home'),
            'href'      => $this->url->link('common/home'),
            'separator' => false
          );
        $this->data['breadcrumbs'][] = array(
            'text'      => 'kia',
            'href'      => $this->url->link('saleepc/kia'),
            'separator' => $this->language->get('text_separator')
        );
        $this->data['breadcrumbs'][] = array(
            'text'      => $this->data['saleepc']['model']['CatName'],
            'href'      => $this->url->link('saleepc/kia/modifications&model='.$this->data['saleepc']['model']['CatFolder']),
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
        $this->language->load('saleepc/kia');
        if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/saleepc/kia/groups.tpl')) {
            $this->template = $this->config->get('config_template') . '/template/saleepc/kia/groups.tpl';
        } else {
            $this->template = 'default/template/saleepc/kia/groups.tpl';
        }
        
        $this->document->addStyle('catalog/view/theme/journal2/css/saleepc.css');
        
        $this->load->model('saleepc/kia');
        
        $model = (isset($this->request->get['model'])?$this->request->get['model']:null);
        
        $this->data['breadcrumbs'] = array();
        $this->data['breadcrumbs'][] = array(
            'text'      => $this->language->get('text_home'),
            'href'      => $this->url->link('common/home'),
            'separator' => false
          );
        $this->data['breadcrumbs'][] = array(
            'text'      => 'kia',
            'href'      => $this->url->link('saleepc/kia'),
            'separator' => $this->language->get('text_separator')
        );
        
        if (isset($_GET['vin'])){
            $this->data['saleepc'] = $this->model_saleepc_kia->getGroups($model, $_GET['vin'], $_GET['vinid']);
            
            $this->data['breadcrumbs'][] = array(
                'text'      => $this->data['saleepc']['vin'].' - '.$this->data['saleepc']['model']['CatName'],
                'href'      => $this->url->link('saleepc/kia/groups&model='.$this->data['saleepc']['model']['CatFolder'].'&vin='.$this->data['saleepc']['vin'].'&vinid='.$this->data['saleepc']['vinid']),
                'separator' => $this->language->get('text_separator')
            );
            
            $this->document->setTitle('Hyndai '.$this->data['saleepc']['model']['CatName'].'. VIN: '.$this->data['saleepc']['vin']);
            $this->data['heading_title'] = 'kia '.$this->data['saleepc']['model']['CatName'].'. VIN: '.$this->data['saleepc']['vin'];
        } else {
            $options = $_GET;
            unset($options['route']);
            unset($options['model']);
            $this->data['saleepc'] = $this->model_saleepc_kia->getGroups($model, $options);
            $q = '&';
            foreach ($this->data['saleepc']['options'] as $k => $v) $q.=$k.'='.$v.'&';
            $this->data['breadcrumbs'][] = array(
                'text'      => $this->data['saleepc']['model']['CatName'],
                'href'      => $this->url->link('saleepc/kia/modifications&model='.$this->data['saleepc']['model']['CatFolder']),
                'separator' => $this->language->get('text_separator')
            );
            $this->data['breadcrumbs'][] = array(
                'text'      => 'Группы запчастей',
                'href'      => $this->url->link('saleepc/kia/groups&model='.$this->data['saleepc']['model']['CatFolder'].$q),
                'separator' => $this->language->get('text_separator')
            );
            
            $this->document->setTitle('Hyndai '.$this->data['saleepc']['model']['CatName']);
            $this->data['heading_title'] = 'kia '.$this->data['saleepc']['model']['CatName'];
            
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
      
    
    public function subgroups() {
        $this->language->load('saleepc/kia');
        if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/saleepc/kia/subgroups.tpl')) {
            $this->template = $this->config->get('config_template') . '/template/saleepc/kia/subgroups.tpl';
        } else {
            $this->template = 'default/template/saleepc/kia/subgroups.tpl';
        }
        $this->document->addStyle('catalog/view/theme/journal2/css/saleepc.css');
        $this->load->model('saleepc/kia');
        
        $model = (isset($this->request->get['model'])?$this->request->get['model']:null);
        $group = (isset($this->request->get['group'])?$this->request->get['group']:null);
        
        $this->data['breadcrumbs'] = array();
        $this->data['breadcrumbs'][] = array(
            'text'      => $this->language->get('text_home'),
            'href'      => $this->url->link('common/home'),
            'separator' => false
          );
        $this->data['breadcrumbs'][] = array(
            'text'      => 'kia',
            'href'      => $this->url->link('saleepc/kia'),
            'separator' => $this->language->get('text_separator')
        );
        
        if (isset($_GET['vin'])){
            $this->data['saleepc'] = $this->model_saleepc_kia->getSubgroups($model, $group, $_GET['vin'], $_GET['vinid']);
            
            $this->data['breadcrumbs'][] = array(
                'text'      => $this->data['saleepc']['vin'].' - '.$this->data['saleepc']['model']['CatName'],
                'href'      => $this->url->link('saleepc/kia/groups&model='.$this->data['saleepc']['model']['CatFolder'].'&vin='.$this->data['saleepc']['vin'].'&vinid='.$this->data['saleepc']['vinid']),
                'separator' => $this->language->get('text_separator')
            );
            
            $this->data['breadcrumbs'][] = array(
                'text'      => $this->data['saleepc']['group']['group_name'],
                'href'      => $this->url->link('saleepc/kia/subgroups&model='.$this->data['saleepc']['model']['CatFolder'].'&group='.$this->data['saleepc']['group']['group_id'].'&vin='.$this->data['saleepc']['vin'].'&vinid='.$this->data['saleepc']['vinid']),
                'separator' => $this->language->get('text_separator')
            );
            
            $this->document->setTitle('Hyndai '.$this->data['saleepc']['model']['CatName'].'. VIN: '.$this->data['saleepc']['vin']);
            $this->data['heading_title'] = 'kia '.$this->data['saleepc']['model']['CatName'].'. VIN: '.$this->data['saleepc']['vin'];
        } else {
            $options = $_GET;
            unset($options['route']);
            unset($options['model']);
            unset($options['group']);
            $this->data['saleepc'] = $this->model_saleepc_kia->getSubgroups($model, $group, $options);

            $this->data['breadcrumbs'][] = array(
                'text'      => $this->data['saleepc']['model']['CatName'],
                'href'      => $this->url->link('saleepc/kia/modifications&model='.$this->data['saleepc']['model']['CatFolder']),
                'separator' => $this->language->get('text_separator')
            );
    	    $q = '&';
        	foreach ($this->data['saleepc']['options'] as $k => $v) $q.=$k.'='.$v.'&';
            
            $this->data['breadcrumbs'][] = array(
                'text'      => $this->data['saleepc']['group']['group_name'],
                'href'      => $this->url->link('saleepc/kia/subgroups&model='.$this->data['saleepc']['model']['CatFolder'].'&group='.$this->data['saleepc']['group']['group_id'].$q),
                'separator' => $this->language->get('text_separator')
            );
        }
            $this->document->setTitle('Hyndai '.$this->data['saleepc']['model']['CatName']);
            $this->data['heading_title'] = 'kia '.$this->data['saleepc']['model']['CatName'];
        
        /*
        
        
        */
          
        
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
        $this->language->load('saleepc/kia');
        if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/saleepc/kia/parts.tpl')) {
            $this->template = $this->config->get('config_template') . '/template/saleepc/kia/parts.tpl';
        } else {
            $this->template = 'default/template/saleepc/kia/parts.tpl';
        }
        
        
        $this->document->addStyle('catalog/view/theme/journal2/css/saleepc.css');
        $this->load->model('saleepc/kia');
        
        $this->data['breadcrumbs'] = array();
        $this->data['breadcrumbs'][] = array(
            'text'      => $this->language->get('text_home'),
            'href'      => $this->url->link('common/home'),
            'separator' => false
          );
        $this->data['breadcrumbs'][] = array(
            'text'      => 'kia',
            'href'      => $this->url->link('saleepc/kia'),
            'separator' => $this->language->get('text_separator')
        );
        
        
        $model = (isset($this->request->get['model'])?$this->request->get['model']:null);
        $subgroup = (isset($this->request->get['subgroup'])?$this->request->get['subgroup']:null);
        

        
        if (isset($_GET['vin'])){
            $this->data['saleepc'] = $this->model_saleepc_kia->getParts($model, $subgroup, $_GET['vin'], $_GET['vinid']);
            
            $this->data['breadcrumbs'][] = array(
                'text'      => $this->data['saleepc']['vin'].' - '.$this->data['saleepc']['model']['CatName'],
                'href'      => $this->url->link('saleepc/kia/groups&model='.$this->data['saleepc']['model']['CatFolder'].'&vin='.$this->data['saleepc']['vin'].'&vinid='.$this->data['saleepc']['vinid']),
                'separator' => $this->language->get('text_separator')
            );
            
            $this->data['breadcrumbs'][] = array(
                'text'      => $this->data['saleepc']['group']['group_name'],
                'href'      => $this->url->link('saleepc/kia/subgroups&model='.$this->data['saleepc']['model']['CatFolder'].'&group='.$this->data['saleepc']['group']['group_id'].'&vin='.$this->data['saleepc']['vin'].'&vinid='.$this->data['saleepc']['vinid']),
                'separator' => $this->language->get('text_separator')
            );
            
            $this->data['breadcrumbs'][] = array(
                'text'      => $this->data['saleepc']['subgroup']['sgroup_name'],
                'href'      => $this->url->link('saleepc/kia/parts&model='.$this->data['saleepc']['model']['CatFolder'].'&subgroup='.$this->data['saleepc']['subgroup']['subgroup_id'].'&vin='.$this->data['saleepc']['vin'].'&vinid='.$this->data['saleepc']['vinid']),
                'separator' => $this->language->get('text_separator')
            );
            
            $this->document->setTitle('Hyndai '.$this->data['saleepc']['model']['CatName'].'. VIN: '.$this->data['saleepc']['vin']);
            $this->data['heading_title'] = 'kia '.$this->data['saleepc']['model']['CatName'].'. VIN: '.$this->data['saleepc']['vin'];
        } else {
            $options = $_GET;
            unset($options['route']);
            unset($options['model']);
            unset($options['group']);
            $this->data['saleepc'] = $this->model_saleepc_kia->getParts($model, $subgroup, $options);

            $this->data['breadcrumbs'][] = array(
                'text'      => $this->data['saleepc']['model']['CatName'],
                'href'      => $this->url->link('saleepc/kia/modifications&model='.$this->data['saleepc']['model']['CatFolder']),
                'separator' => $this->language->get('text_separator')
            );
    	    $q = '&';
        	foreach ($this->data['saleepc']['options'] as $k => $v) $q.=$k.'='.$v.'&';
            
            $this->data['breadcrumbs'][] = array(
                'text'      => $this->data['saleepc']['group']['group_name'],
                'href'      => $this->url->link('saleepc/kia/subgroups&model='.$this->data['saleepc']['model']['CatFolder'].'&group='.$this->data['saleepc']['group']['group_id'].$q),
                'separator' => $this->language->get('text_separator')
            );
            
            $this->data['breadcrumbs'][] = array(
                'text'      => $this->data['saleepc']['subgroup']['sgroup_name'],
                'href'      => $this->url->link('saleepc/kia/parts&model='.$this->data['saleepc']['model']['CatFolder'].'&subgroup='.$this->data['saleepc']['subgroup']['subgroup_id'].$q),
                'separator' => $this->language->get('text_separator')
            );
            
            $this->document->setTitle('Hyndai '.$this->data['saleepc']['model']['CatName']);
            $this->data['heading_title'] = 'kia '.$this->data['saleepc']['model']['CatName'];
        }
        
        
        
        
        /*
        $options = $_GET;
        unset($options['route']);
        unset($options['model']);
        unset($options['subgroup']);
        
        
        
        
        $this->document->setTitle('Hyndai '.$this->data['saleepc']['model']['CatName']);
        $this->data['heading_title'] = 'kia '.$this->data['saleepc']['model']['CatName'];
        
        $this->data['breadcrumbs'][] = array(
            'text'      => $this->data['saleepc']['model']['CatName'],
            'href'      => $this->url->link('saleepc/kia/modifications&model='.$this->data['saleepc']['model']['CatFolder']),
            'separator' => $this->language->get('text_separator')
        );
	    $q = '&';
    	foreach ($this->data['saleepc']['options'] as $k => $v) $q.=$k.'='.$v.'&';
        
        $this->data['breadcrumbs'][] = array(
            'text'      => $this->data['saleepc']['group']['group_name'],
            'href'      => $this->url->link('saleepc/kia/subgroups&model='.$this->data['saleepc']['model']['CatFolder'].'&group='.$this->data['saleepc']['group']['group_id'].$q),
            'separator' => $this->language->get('text_separator')
        );
        */
          
        
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
