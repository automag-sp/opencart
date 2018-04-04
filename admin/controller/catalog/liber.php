<?php
class ControllerCatalogLiber extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('catalog/liber');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/liber');

		$this->getList();
	}

	public function insert() {
		$this->load->language('catalog/liber');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/liber');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_catalog_liber->addLiber($this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

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

			$this->redirect($this->url->link('catalog/liber', 'token=' . $this->session->data['token'] . $url, 'SSL'));
		}

		$this->getForm();
	}

	public function update() {
		$this->load->language('catalog/liber');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/liber');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_catalog_liber->editLiber($this->request->get['liber_id'], $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

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

			$this->redirect($this->url->link('catalog/liber', 'token=' . $this->session->data['token'] . $url, 'SSL'));
		}

		$this->getForm();
	}

	public function delete() {
		$this->load->language('catalog/liber');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/liber');

		if (isset($this->request->post['selected']) && $this->validateDelete()) {
			foreach ($this->request->post['selected'] as $liber_id) {
				$this->model_catalog_liber->deleteLiber($liber_id);
			}

			$this->session->data['success'] = $this->language->get('text_success');

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

			$this->redirect($this->url->link('catalog/liber', 'token=' . $this->session->data['token'] . $url, 'SSL'));
		}

		$this->getList();
	}

	private function getList() {
		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'l.sort_order';
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
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('catalog/liber', 'token=' . $this->session->data['token'] . $url, 'SSL'),
			'separator' => ' :: '
		);

		$this->data['heading_title'] = $this->language->get('heading_title');

		$this->data['module_install'] = $this->model_catalog_liber->tableExists();

		if ($this->data['module_install']) {
			$this->data['insert'] = $this->url->link('catalog/liber/insert', 'token=' . $this->session->data['token'] . $url, 'SSL');
			$this->data['delete'] = $this->url->link('catalog/liber/delete', 'token=' . $this->session->data['token'] . $url, 'SSL');

			$this->data['liberes'] = array();

			$data = array(
				'sort' => $sort,
				'order' => $order,
				'start' => ($page - 1) * $this->config->get('config_admin_limit'),
				'limit' => $this->config->get('config_admin_limit')
			);

			$liber_total = $this->model_catalog_liber->getTotalLibers();

			$results = $this->model_catalog_liber->getLibers($data);

			foreach ($results as $result) {
				$action = array();

				$action[] = array(
					'text' => $this->language->get('text_edit'),
					'href' => $this->url->link('catalog/liber/update', 'token=' . $this->session->data['token'] . '&liber_id=' . $result['liber_id'] . $url, 'SSL')
				);

				$this->data['liberes'][] = array(
					'liber_id' => $result['liber_id'],
					'question' => $this->stringResize($result['question'], 100),
					'answer' => $this->stringResize($result['answer'], 100),
					'sort_order' => $result['sort_order'],
					'status' => $result['status'] ? $this->language->get('text_enabled') : $this->language->get('text_disabled'),
					'selected' => isset($this->request->post['selected']) && in_array($result['liber_id'], $this->request->post['selected']),
					'action' => $action
				);
			}

			$this->data['text_no_results'] = $this->language->get('text_no_results');

			$this->data['column_question'] = $this->language->get('column_question');
			$this->data['column_answer'] = $this->language->get('column_answer');
			$this->data['column_sort_order'] = $this->language->get('column_sort_order');
			$this->data['column_status'] = $this->language->get('column_status');
			$this->data['column_action'] = $this->language->get('column_action');

			$this->data['button_insert'] = $this->language->get('button_insert');
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

			$this->data['sort_status'] = $this->url->link('catalog/liber', 'token=' . $this->session->data['token'] . '&sort=l.status' . $url, 'SSL');
			$this->data['sort_question'] = $this->url->link('catalog/liber', 'token=' . $this->session->data['token'] . '&sort=ld.question' . $url, 'SSL');
			$this->data['sort_answer'] = $this->url->link('catalog/liber', 'token=' . $this->session->data['token'] . '&sort=ld.answer' . $url, 'SSL');
			$this->data['sort_sort_order'] = $this->url->link('catalog/liber', 'token=' . $this->session->data['token'] . '&sort=l.sort_order' . $url, 'SSL');

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
			$pagination->url = $this->url->link('catalog/liber', 'token=' . $this->session->data['token'] . $url . '&page={page}', 'SSL');

			$this->data['pagination'] = $pagination->render();

			$this->data['sort'] = $sort;
			$this->data['order'] = $order;
		} else {
			$this->data['text_module_not_exists'] = $this->language->get('text_module_not_exists');
		}

		$this->template = 'catalog/liber_list.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);

		$this->response->setOutput($this->render());
	}

	private function getForm() {
		$this->data['heading_title'] = $this->language->get('heading_title');

		$this->data['text_enabled'] = $this->language->get('text_enabled');
		$this->data['text_disabled'] = $this->language->get('text_disabled');

		$this->data['entry_question'] = $this->language->get('entry_question');
		$this->data['entry_answer'] = $this->language->get('entry_answer');
		$this->data['entry_sort_order'] = $this->language->get('entry_sort_order');
		$this->data['entry_status'] = $this->language->get('entry_status');
		$this->data['entry_date_added'] = $this->language->get('entry_date_added');

		$this->data['button_save'] = $this->language->get('button_save');
		$this->data['button_cancel'] = $this->language->get('button_cancel');

		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}

		if (isset($this->error['question'])) {
			$this->data['error_question'] = $this->error['question'];
		} else {
			$this->data['error_question'] = array();
		}

		if (isset($this->error['answer'])) {
			$this->data['error_answer'] = $this->error['answer'];
		} else {
			$this->data['error_answer'] = array();
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
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('catalog/liber', 'token=' . $this->session->data['token'] . $url, 'SSL'),
			'separator' => ' :: '
		);

		if (!isset($this->request->get['liber_id'])) {
			$this->data['action'] = $this->url->link('catalog/liber/insert', 'token=' . $this->session->data['token'] . $url, 'SSL');
		} else {
			$this->data['action'] = $this->url->link('catalog/liber/update', 'token=' . $this->session->data['token'] . '&liber_id=' . $this->request->get['liber_id'] . $url, 'SSL');
		}

		$this->data['cancel'] = $this->url->link('catalog/liber', 'token=' . $this->session->data['token'] . $url, 'SSL');

		$this->data['token'] = $this->session->data['token'];

		$this->load->model('localisation/language');

		$this->data['languages'] = $this->model_localisation_language->getLanguages();

		if (isset($this->request->get['liber_question_id'])) {
			$this->load->model('catalog/liber');

			$liber_description = $this->model_catalog_liber->getLiberDescriptionQuestion($this->request->get['liber_question_id']);

			$this->data['liber_description'][$liber_description['language_id']] = array(
				'question' => $liber_description['question'],
				'answer' => ''
			);
		} elseif (isset($this->request->post['liber_description'])) {
			$this->data['liber_description'] = $this->request->post['liber_description'];
		} elseif (isset($this->request->get['liber_id'])) {
			$this->data['liber_description'] = $this->model_catalog_liber->getLiberDescriptions($this->request->get['liber_id']);
		} else {
			$this->data['liber_description'] = array();
		}

		if (isset($this->request->get['liber_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$liber_info = $this->model_catalog_liber->getLiber($this->request->get['liber_id']);
		}

		if (isset($this->request->post['status'])) {
			$this->data['status'] = $this->request->post['status'];
		} elseif (!empty($liber_info)) {
			$this->data['status'] = $liber_info['status'];
		} else {
			$this->data['status'] = 0;
		}

		if (isset($this->request->post['date_added'])) {
			$this->data['date_added'] = $this->request->post['date_added'];
		} elseif (!empty($liber_info)) {
			$this->data['date_added'] = date('Y-m-d', strtotime($liber_info['date_added']));
		} else {
			$this->data['date_added'] = date('Y-m-d', time() - 86400);
		}

		if (isset($this->request->post['sort_order'])) {
			$this->data['sort_order'] = $this->request->post['sort_order'];
		} elseif (!empty($liber_info)) {
			$this->data['sort_order'] = $liber_info['sort_order'];
		} else {
			$this->data['sort_order'] = 0;
		}

		$this->template = 'catalog/liber_form.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);

		$this->response->setOutput($this->render());
	}

	private function validateForm() {
		if (!$this->user->hasPermission('modify', 'catalog/liber')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		foreach ($this->request->post['liber_description'] as $language_id => $value) {
			if ((utf8_strlen($value['question']) < 3) || (utf8_strlen($value['question']) > 15000)) {
				$this->error['question'][$language_id] = $this->language->get('error_question');
			}

			if ((utf8_strlen($value['answer']) < 3) || (utf8_strlen($value['answer']) > 15000)) {
				$this->error['answer'][$language_id] = $this->language->get('error_answer');
			}
		}

		if (!$this->error) {
			return true;
		} else {
			return false;
		}
	}

	private function validateDelete() {
		if (!$this->user->hasPermission('modify', 'catalog/liber')) {
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