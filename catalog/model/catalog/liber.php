<?php
class ModelCatalogLiber extends Model {

	public function getLibers() {
		$sql = "SELECT * FROM " . DB_PREFIX . "liber l LEFT JOIN " . DB_PREFIX . "liber_description ld ON (l.liber_id = ld.liber_id) WHERE ld.language_id = '" . (int) $this->config->get('config_language_id') . "' AND l.status = '1'";

		$sql .= " ORDER BY l.sort_order ASC, l.date_added DESC";

		$query = $this->db->query($sql);

		return $query->rows;
	}

	public function addLiberQuestion($data) {
		$this->db->query("INSERT INTO " . DB_PREFIX . "liber_question SET viewed = '0'");

		$liber_question_id = $this->db->getLastId();

		$this->db->query("INSERT INTO " . DB_PREFIX . "liber_description_question SET liber_question_id = '" . (int) $liber_question_id . "', language_id = '" . (int) $this->config->get('config_language_id') . "', contact = '" . $this->db->escape($data['contact']) . "', question = '" . $this->db->escape($data['question']) . "'");
	}

}

?>