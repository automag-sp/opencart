<?php

class ControllerAccountCars extends Controller {
  function cars() {
    $query              = $this->db->query('SELECT * FROM oc_my_cars WHERE customer_id = ' . $this->customer->getId() . ' ORDER BY date_created DESC');
    $this->data['cars'] = array();
    $this->load->model('saleepc/general');
    if ($query->num_rows) {
      foreach ($query->rows as $npp => $row) {
        $row['npp']               = $npp + 1;
        $row['car_info']          = $ci = $this->model_saleepc_general->getCarInfo($row['modification_id'], 'pc');
        $row['del']               = $this->url->link('account/cars/delete', 'car_id=' . $row['car_id']);
        $row['view']              = $this->url->link('saleepc/general/carinfo', 'modification_id=' . $row['modification_id']);
        $this->data['cars'][$npp] = $row;
      }
    }
    $this->language->load('account/account');
    $this->data['heading_title'] = $this->language->get('text_my_cars');
    $this->data['logged']        = $this->customer->isLogged();
    $this->document->setTitle($this->language->get('text_my_cars'));
    $this->data['breadcrumbs'][] = array(
      'text'      => $this->language->get('text_home'),
      'href'      => $this->url->link('common/home'),
      'separator' => FALSE
    );
    $this->data['breadcrumbs'][] = array(
      'text'      => $this->language->get('text_account'),
      'href'      => $this->url->link('account/account'),
      'separator' => FALSE
    );
    $this->data['breadcrumbs'][] = array(
      'text'      => $this->language->get('text_my_cars'),
      'href'      => $this->url->link('account/cars/cars'),
      'separator' => $this->language->get('text_separator')
    );
    if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/account/cars.tpl')) {
      $this->template = $this->config->get('config_template') . '/template/account/cars.tpl';
    }
    else {
      $this->template = 'default/template/account/cars.tpl';
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

  function index() {

  }

  function delete() {
    if (!$this->customer->isLogged()) {
      return NULL;
    }
    $query = $this->db->query("DELETE FROM oc_my_cars WHERE car_id=" . intval($this->request->get['car_id']) . " AND customer_id=" . $this->customer->getId());
    if (isset($this->request->get['ajx'])) {
      $ret['js']     = '$("#my_car_"+d.car_id).hide("normal");';
      $ret['car_id'] = $this->request->get['car_id'];
      $this->response->json($ret);
    }
    else {
      $this->response->redirect('/?route=account/cars/cars');
    }
  }
}