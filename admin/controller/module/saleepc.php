<?php
class ControllerModuleSaleepc extends Controller {
	private $error = array(); 
	
	public function index() { 
		$this->load->language("module/saleepc");

		$this->document->setTitle($this->language->get("heading_title")); 
		
		$this->load->model("setting/setting");
				
		if (($this->request->server["REQUEST_METHOD"] == "POST") && $this->validate()) {
			$this->model_setting_setting->editSetting("saleepc", $this->request->post);		
					
			$this->session->data["success"] = $this->language->get("text_success");
						
			$this->redirect($this->url->link("extension/module", "token=" . $this->session->data["token"], "SSL"));
		}
		
		$this->data["heading_title"] = $this->language->get("heading_title");
		
		//buttons
		$this->data["button_save"] = $this->language->get("button_save");
		$this->data["button_cancel"] = $this->language->get("button_cancel");
		
		//errors
		if (isset($this->error["warning"])) {
			$this->data["error_warning"] = $this->error["warning"];
		} else {
			$this->data["error_warning"] = "";
		}
		
		//breadcrumbs
		$this->data["breadcrumbs"] = array();

   		$this->data["breadcrumbs"][] = array(
       		"text"      => $this->language->get("text_home"),
			"href"      => $this->url->link("common/home", "token=" . $this->session->data["token"], "SSL"),
      		"separator" => false
   		);

   		$this->data["breadcrumbs"][] = array(
       		"text"      => $this->language->get("text_module"),
			"href"      => $this->url->link("extension/module", "token=" . $this->session->data["token"], "SSL"),
      		"separator" => " :: "
   		);
		
   		$this->data["breadcrumbs"][] = array(
       		"text"      => $this->language->get("heading_title"),
			"href"      => $this->url->link("module/saleepc", "token=" . $this->session->data["token"], "SSL"),
      		"separator" => " :: "
   		);
		
		$this->data["action"] = $this->url->link("module/saleepc", "token=" . $this->session->data["token"], "SSL");
		
		$this->data["cancel"] = $this->url->link("extension/module", "token=" . $this->session->data["token"], "SSL");
		
		//------------------------------
		//insert you data
		//------------------------------
		
		
		
		
		$this->data["saleepclogin"] = $this->config->get("saleepclogin");
		
		$this->template = "module/saleepc.tpl";
		$this->children = array(
			"common/header",
			"common/footer",
		);
		
		$this->data["token"] = $this->session->data["token"];
				
		$this->response->setOutput($this->render());
	}
	
	public function install(){
		$this->load->model("setting/setting");
		$this->model_setting_setting->editSetting("saleepc", array('saleepclogin' => 'demo'));			
	}
	
	public function uninstall(){
		$this->load->model("setting/setting");
		$this->model_setting_setting->deleteSetting("saleepc", 'saleepclogin');			
	}
	
	private function validate() {
		if (!$this->user->hasPermission("modify", "module/saleepc")) {
			$this->error["warning"] = $this->language->get("error_permission");
		}

		
		if (!$this->error) {
			return true;
		} else {
			return false;
		}	
	}
}
?>