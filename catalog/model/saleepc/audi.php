<?php

class ModelSaleepcAudi extends Model {
  protected $soap;
  protected $user;

  public function __construct($registry) {
    parent::__construct($registry);
    $this->soap = new SoapClient("http://soap.saleepc.ru/saleepc.wsdl");
    $this->user = $this->config->get("saleepclogin");

  }

  public function getModels() {
    return $this->soap->getData($this->user, 'audi', 'index', array());
  }

  public function getYears($model) {
    return $this->soap->getData($this->user, 'audi', 'years', array('model' => $model));
  }

  public function getGroups($model) {
    return $this->soap->getData($this->user, 'audi', 'groups', array('model' => $model, 'lang' => 'R'));
  }

  public function getSubgroups($model, $group) {
    return $this->soap->getData($this->user, 'audi', 'subgroups', array('model' => $model, 'group' => $group, 'lang' => 'R'));
  }

  public function getParts($model, $subgroup) {
    return $this->soap->getData($this->user, 'audi', 'parts', array('model' => $model, 'subgroup' => $subgroup, 'lang' => 'R'));
  }

}

?>