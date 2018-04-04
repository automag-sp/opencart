<?php
class ModelPaymentTinkoff extends Model {
    public function install() {
        $this->db->query("
			CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "tinkoff_payments` (
			  `id` int(11) NOT NULL AUTO_INCREMENT,
			  `order_id` int(11) NOT NULL,
			  `payment_id` int(11) NOT NULL,
			  `created` DATETIME NOT NULL,
			  `updated` DATETIME NOT NULL,
			  `status` VARCHAR(30) NOT NULL,
			  PRIMARY KEY (`id`)
			) ENGINE=MyISAM DEFAULT COLLATE=utf8_general_ci;");
    }

    public function uninstall() {
        $this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "tinkoff_payments`;");
    }
}
?>