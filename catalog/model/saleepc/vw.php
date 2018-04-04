<?php

class ModelSaleepcVw extends Model {
  protected $soap;
  protected $user;

  public function __construct($registry) {
    parent::__construct($registry);
    $this->soap = new SoapClient("http://soap.saleepc.ru/saleepc.wsdl");
    $this->user = $this->config->get("saleepclogin");

  }

  public function getModels() {
    return $this->soap->getData($this->user, 'vw', 'index', array());
  }

  public function getYears($model) {
    return $this->soap->getData($this->user, 'vw', 'years', array('model' => $model));
  }

  public function getGroups($model) {
    return $this->soap->getData($this->user, 'vw', 'groups', array('model' => $model));
  }

  public function getSubgroups($model, $group) {
    return $this->soap->getData($this->user, 'vw', 'subgroups', array('model' => $model, 'group' => $group));
  }

  public function getParts($model, $subgroup) {
    return $this->soap->getData($this->user, 'vw', 'parts', array('model' => $model, 'subgroup' => $subgroup));
  }

}

?>