<?php
class ControllerModuleB24Apipro extends Controller
{
	private $error = array();


	public function addOrder( $orderId )
	{
		$this->load->model('module/b24_order');

		$this->model_module_b24_order->addOrder($orderId);
	}

	public function editOrder($orderId)
	{
		$this->load->model('module/b24_order');

		$this->model_module_b24_order->editOrder($orderId);
	}

	public function addCustomer( $customerId )
	{
		$this->load->model('module/b24_customer');

		$this->model_module_b24_customer->addCustomer($customerId);
	}

	public function editCustomer($customerId)
	{
		$this->load->model('module/b24_customer');

		$this->model_module_b24_customer->editCustomer($customerId);
	}

	public function addAddress($addressId)
	{
		$this->load->model('module/b24_customer');
		if($this->isMainAddress($addressId))
		{
			$this->model_module_b24_customer->editCustomerAddress($addressId);
		}
	}

	public function editAddress($addressId)
	{
		$this->load->model('module/b24_customer');
		if($this->isMainAddress($addressId))
		{
			$this->model_module_b24_customer->editCustomerAddress($addressId);
		}

	}

	public function index()
	{

		$this->document->setTitle("Customer Module");
		$this->load->model('module/b24_order');
	}

	public function isMainAddress($addressId)
	{
		$this->load->model('account/customer');
		$customer = $this->model_account_customer->getCustomer($this->customer->getId());
		$currentAddressId = intval($customer['address_id']);

		return $currentAddressId === intval($addressId);
	}

}