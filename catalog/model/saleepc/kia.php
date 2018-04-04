<?php
class ModelSaleepcKia extends Model {
    protected $soap;
    protected $user;
    protected $lang;
         
    public function __construct($registry) {
    	parent::__construct($registry);
    	$this->soap = new SoapClient("http://soap.saleepc.ru/saleepc.wsdl");
    	$this->user = $this->config->get("saleepclogin");
    	switch ($this->language->get('code')){
    	    case 'ru':
    	        $this->langid = 'RU';
    	        break;
    	    default:
    	        $this->langid = 'EN';
    	}
    	
    }
    
    
    
	public function getModels(){
		return $this->soap->getData($this->user, 'kia', 'models', array());
	}
    
	public function getVin($vin){
		return $this->soap->getData($this->user, 'kia', 'vin', array('vin' => $_GET['vin']));
	}
    
	public function getModifications($model){
		return $this->soap->getData($this->user, 'kia', 'modifications', array('model' => $model, 'lang' => $this->langid));
	}
    
	public function getGroups($model, $options, $vin_id = null){
	    if ($vin_id){
            return $this->soap->getData($this->user, 'kia', 'groups', array('model' => $model, 'vin' => $options, 'vinid' => $vin_id, 'lang' => $this->langid));
	    } else {
            return $this->soap->getData($this->user, 'kia', 'groups', array('model' => $model, 'options' => $options, 'lang' => $this->langid));
	    }
	}
    
	public function getSubgroups($model, $group, $options, $vin_id = null){
	    if ($vin_id){
	        return $this->soap->getData($this->user, 'kia', 'subgroups', array('model' => $model, 'group' => $group, 'vin' => $options, 'vinid' => $vin_id, 'lang' => $this->langid));
	    } else {
    		return $this->soap->getData($this->user, 'kia', 'subgroups', array('model' => $model, 'group' => $group, 'options' => $options, 'lang' => $this->langid));
	    }
	}
    
	public function getParts($model, $subgroup, $options, $vin_id = null){
	    if ($vin_id){
	        return $this->soap->getData($this->user, 'kia', 'parts', array('model' => $model, 'subgroup' => $subgroup, 'vin' => $options, 'vinid' => $vin_id, 'lang' => $this->langid));
	    } else {
            return $this->soap->getData($this->user, 'kia', 'parts', array('model' => $model, 'subgroup' => $subgroup, 'options' => $options, 'lang' => $this->langid));
	    }
	}
    
    
    
}
?>