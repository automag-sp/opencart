<?php
class ControllerCatalogLiberQuestion extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('catalog/liber');

		$this->document->setTitle($this->language->get('heading_title_question'));

		$this->load->model('catalog/liber');

		$this->getList();
	}

	public function viewed() {
		$this->load->language('catalog/liber');

		$this->document->setTitle($this->language->get('heading_title_question'));

		$this->load->model('catalog/liber');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_catalog_liber->editLiberQuestion($this->request->get['liber_question_id'], $this->request->post['viewed']);

			$this->session->data['success'] = $this->language->get('text_success_question');

			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->redirect($this->url->link('catalog/liber_question', 'token=' . $this->session->data['token'] . $url, 'SSL'));
		}

		$this->getForm();
	}

	public function delete() {
		$this->load->language('catalog/liber');

		$this->document->setTitle($this->language->get('heading_title_question'));

		$this->load->model('catalog/liber');

		if (isset($this->request->post['selected']) && $this->validate()) {
			foreach ($this->request->post['selected'] as $liber_question_id) {
				$this->model_catalog_liber->deleteLiberQuestion($liber_question_id);
			}

			$this->session->data['success'] = $this->language->get('text_success_question');

			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->redirect($this->url->link('catalog/liber_question', 'token=' . $this->session->data['token'] . $url, 'SSL'));
		}

		$this->getList();
	}

	private function getList() {
		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'ldq.liber_question_id';
		}

		if (isset($this->request->get['order'])) {
			$order = $this->request->get['order'];
		} else {
			$order = 'ASC';
		}

		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}

		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$this->data['breadcrumbs'] = array();

		$this->data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
			'separator' => false
		);

		$this->data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title_question'),
			'href' => $this->url->link('catalog/liber_question', 'token=' . $this->session->data['token'] . $url, 'SSL'),
			'separator' => ' :: '
		);

		$this->data['heading_title'] = $this->language->get('heading_title_question');

		$this->data['module_install'] = $this->model_catalog_liber->tableExists();

		if ($this->data['module_install']) {
			$this->data['delete'] = $this->url->link('catalog/liber_question/delete', 'token=' . $this->session->data['token'] . $url, 'SSL');

			$this->data['liberes'] = array();

			$data = array(
				'sort' => $sort,
				'order' => $order,
				'start' => ($page - 1) * $this->config->get('config_admin_limit'),
				'limit' => $this->config->get('config_admin_limit')
			);

			$liber_total = $this->model_catalog_liber->getTotalLibersQuestion();

			$results = $this->model_catalog_liber->getLibersQuestion($data);

			foreach ($results as $result) {
				$action = array();

				$action[] = array(
					'text' => $this->language->get('text_edit'),
					'href' => $this->url->link('catalog/liber_question/viewed', 'token=' . $this->session->data['token'] . '&liber_question_id=' . $result['liber_question_id'] . $url, 'SSL')
				);

				$this->data['liberes'][] = array(
					'liber_question_id' => $result['liber_question_id'],
					'contact' => $result['contact'],
					'question' => $this->stringResize($result['question'], 100),
					'viewed' => ($result['viewed'] ? $this->language->get('text_yes') : $this->language->get('text_no')),
					'selected' => isset($this->request->post['selected']) && in_array($result['liber_question_id'], $this->request->post['selected']),
					'action' => $action
				);
			}

			$this->data['text_no_results'] = $this->language->get('text_no_results');
			$this->data['text_enabled'] = $this->language->get('text_enabled');
			$this->data['text_disabled'] = $this->language->get('text_disabled');

			$this->data['column_contact'] = $this->language->get('column_contact');
			$this->data['column_question'] = $this->language->get('column_question');
			$this->data['column_viewed'] = $this->language->get('column_viewed');
			$this->data['column_action'] = $this->language->get('column_action');

			$this->data['button_delete'] = $this->language->get('button_delete');

			if (isset($this->error['warning'])) {
				$this->data['error_warning'] = $this->error['warning'];
			} else {
				$this->data['error_warning'] = '';
			}

			if (isset($this->session->data['success'])) {
				$this->data['success'] = $this->session->data['success'];
				unset($this->session->data['success']);
			} else {
				$this->data['success'] = '';
			}

			$url = '';

			if ($order == 'ASC') {
				$url .= '&order=DESC';
			} else {
				$url .= '&order=ASC';
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->data['sort_viewed'] = $this->url->link('catalog/liber_question', 'token=' . $this->session->data['token'] . '&sort=lq.viewed' . $url, 'SSL');
			$this->data['sort_contact'] = $this->url->link('catalog/liber_question', 'token=' . $this->session->data['token'] . '&sort=ldq.contact' . $url, 'SSL');
			$this->data['sort_question'] = $this->url->link('catalog/liber_question', 'token=' . $this->session->data['token'] . '&sort=ldq.question' . $url, 'SSL');

			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			$pagination = new Pagination();
			$pagination->total = $liber_total;
			$pagination->page = $page;
			$pagination->limit = $this->config->get('config_admin_limit');
			$pagination->text = $this->language->get('text_pagination');
			$pagination->url = $this->url->link('catalog/liber_question', 'token=' . $this->session->data['token'] . $url . '&page={page}', 'SSL');

			$this->data['pagination'] = $pagination->render();

			$this->data['sort'] = $sort;
			$this->data['order'] = $order;
		} else {
			$this->data['text_module_not_exists'] = $this->language->get('text_module_not_exists');
		}

		$this->template = 'catalog/liber_list_question.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);

		$this->response->setOutput($this->render());
	}

	private function getForm() {
		$this->data['heading_title'] = $this->language->get('heading_title_question');

		$this->data['text_enabled'] = $this->language->get('text_enabled');
		$this->data['text_disabled'] = $this->language->get('text_disabled');

		$this->data['entry_contact'] = $this->language->get('entry_contact');
		$this->data['entry_question'] = $this->language->get('entry_question');
		$this->data['entry_viewed'] = $this->language->get('entry_viewed');

		$this->data['button_import'] = $this->language->get('button_import');
		$this->data['button_save'] = $this->language->get('button_save');
		$this->data['button_cancel'] = $this->language->get('button_cancel');

		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}

		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$this->data['breadcrumbs'] = array();

		$this->data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
			'separator' => false
		);

		$this->data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title_question'),
			'href' => $this->url->link('catalog/liber_question', 'token=' . $this->session->data['token'] . $url, 'SSL'),
			'separator' => ' :: '
		);

		$this->data['action'] = $this->url->link('catalog/liber_question/viewed', 'token=' . $this->session->data['token'] . '&liber_question_id=' . $this->request->get['liber_question_id'] . $url, 'SSL');

		$this->data['import'] = $this->url->link('catalog/liber/insert', 'token=' . $this->session->data['token'] . '&liber_question_id=' . $this->request->get['liber_question_id'] . $url, 'SSL');

		$this->data['cancel'] = $this->url->link('catalog/liber_question', 'token=' . $this->session->data['token'] . $url, 'SSL');

		$this->data['token'] = $this->session->data['token'];

		$this->load->model('localisation/language');

		$this->data['viewed'] = $this->model_catalog_liber->getLiberQuestion($this->request->get['liber_question_id']);
		$this->data['liber_description_question'] = $this->model_catalog_liber->getLiberDescriptionQuestion($this->request->get['liber_question_id']);

		$this->data['language'] = $this->model_localisation_language->getLanguage($this->data['liber_description_question']['language_id']);

		$this->template = 'catalog/liber_form_question.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);

		$this->response->setOutput($this->render());
	}

	private function validate() {
		if (!$this->user->hasPermission('modify', 'catalog/liber_question')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if (!$this->error) {
			return true;
		} else {
			return false;
		}
	}

	private function stringResize($string, $length) {
		$string = strip_tags(html_entity_decode($string, ENT_QUOTES, 'UTF-8'));

		if (mb_strlen($string) > $length) {
			$string = utf8_substr($string, 0, $length);
			$string = utf8_substr($string, 0, utf8_strrpos($string, ' '));
			$string = rtrim($string, "!,.-\t\n\r ");
			$string .= '...';
		}

		return $string;
	}

}

?>