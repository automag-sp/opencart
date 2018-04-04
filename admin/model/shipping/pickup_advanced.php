<?php
class ModelShippingPickupAdvanced extends Model
{
	public function install()
	{
		$this->db->query('ALTER TABLE `' . DB_PREFIX . 'order` CHANGE `shipping_method` `shipping_method` VARCHAR(255)');
	}
}
?>
