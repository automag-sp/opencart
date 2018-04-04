<?php
class ControllerInformationLiber extends Controller {

	public function index() {
		$this->document->addScript('catalog/view/javascript/jquery/colorbox/jquery.colorbox-min.js');
		$this->document->addStyle('catalog/view/javascript/jquery/colorbox/colorbox.css');
		$this->document->addScript('catalog/view/javascript/liber.js');

		$this->language->load('information/liber');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->data['breadcrumbs'] = array();

		$this->data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/home'),
			'separator' => false
		);

		$this->data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('information/liber'),
			'separator' => $this->language->get('text_separator')
		);

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

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/information/liber.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/information/liber.tpl';
		} else {
			$this->template = 'default/template/information/liber.tpl';
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

	public function write() {
		$this->language->load('information/liber');

		$this->load->model('catalog/liber');

		$json = array();

		if ($this->request->server['REQUEST_METHOD'] == 'POST') {
			if ((utf8_strlen($this->request->post['contact']) < 3) || (utf8_strlen($this->request->post['contact']) > 100)) {
				$json['error']['contact'] = $this->language->get('error_contact');
			}

			if ((utf8_strlen($this->request->post['question']) < 25) || (utf8_strlen($this->request->post['question']) > 15000)) {
				$json['error']['question'] = $this->language->get('error_question');
			}

			if (empty($this->session->data['feedback_liber_captcha']) || ($this->session->data['feedback_liber_captcha'] != $this->request->post['captcha'])) {
				$json['error']['captcha'] = $this->language->get('error_captcha');
			}

			if (!isset($json['error'])) {
				$this->model_catalog_liber->addLiberQuestion($this->request->post);

				$json['success'] = true;

				if ($this->config->get('liber_email_status')) {
					$email_subject = sprintf($this->language->get('email_subject'), '');
					$email_text = sprintf($this->language->get('text_contact'), strip_tags(html_entity_decode($this->request->post['contact'])), ENT_QUOTES, 'UTF-8') . "\n\n";
					$email_text .= sprintf($this->language->get('text_question'), strip_tags(html_entity_decode($this->request->post['question'])), ENT_QUOTES, 'UTF-8');

					$mail = new Mail();
					$mail->protocol = $this->config->get('config_mail_protocol');
					$mail->parameter = $this->config->get('config_mail_parameter');
					$mail->hostname = $this->config->get('config_smtp_host');
					$mail->username = $this->config->get('config_smtp_username');
					$mail->password = $this->config->get('config_smtp_password');
					$mail->port = $this->config->get('config_smtp_port');
					$mail->timeout = $this->config->get('config_smtp_timeout');
					$mail->setTo($this->config->get('config_email'));
					$mail->setFrom($this->config->get('config_email'));
					$mail->setSender($this->request->post['contact']);
					$mail->setSubject($email_subject);
					$mail->setText($email_text);
					$mail->send();
				}

				$json['success'] = $this->language->get('text_success');
			}
		}

		$this->response->setOutput(json_encode($json));
	}

	public function captcha() {
		$this->load->library('captcha');

		$captcha = new Captcha();

		$this->session->data['feedback_liber_captcha'] = $captcha->getCode();

		$captcha->showImage();
	}

}

?>
