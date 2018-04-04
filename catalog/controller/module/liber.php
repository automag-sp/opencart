<?php
class ControllerModuleLiber extends Controller {

	public function index() {
		$this->document->addScript('catalog/view/javascript/jquery/colorbox/jquery.colorbox-min.js');
		$this->document->addStyle('catalog/view/javascript/jquery/colorbox/colorbox.css');
		$this->document->addScript('catalog/view/javascript/liber.js');

		$this->language->load('information/liber');

		$this->load->model('catalog/liber');

		$this->data['heading_title'] = $this->language->get('heading_title');
		$this->data['text_no_liberes'] = $this->language->get('text_no_liberes');

		$this->data['text_write'] = $this->language->get('text_write');
		$this->data['entry_contact'] = $this->language->get('entry_contact');
		$this->data['entry_question'] = $this->language->get('entry_question');
		$this->data['entry_captcha'] = $this->language->get('entry_captcha');
		$this->data['text_wait'] = $this->language->get('text_wait');
		$this->data['text_note'] = $this->language->get('text_note');

		$this->data['button_send'] = $this->language->get('button_send');

		$this->data['rand'] = substr(sha1(mt_rand()), 17, 6);

		$this->data['liberes'] = array();

		$results = $this->model_catalog_liber->getLibers();

		foreach ($results as $result) {
			$this->data['liberes'][] = array(
				'question' => html_entity_decode($result['question'], ENT_QUOTES, 'UTF-8'),
				'answer' => html_entity_decode($result['answer'], ENT_QUOTES, 'UTF-8')
			);
		}

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/liber.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/module/liber.tpl';
		} else {
			$this->template = 'default/template/module/liber.tpl';
		}

		$this->response->setOutput($this->render());
	}

}

?>
