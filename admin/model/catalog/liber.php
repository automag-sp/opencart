<?php
class ModelCatalogLiber extends Model {

	public function addLiber($data) {
		$this->db->query("INSERT INTO " . DB_PREFIX . "liber SET status = '" . (int) $data['status'] . "', date_added = '" . $this->db->escape($data['date_added']) . "', sort_order = '" . $this->db->escape($data['sort_order']) . "'");

		$liber_id = $this->db->getLastId();

		foreach ($data['liber_description'] as $language_id => $value) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "liber_description SET liber_id = '" . (int) $liber_id . "', language_id = '" . (int) $language_id . "', question = '" . $this->db->escape($value['question']) . "', answer = '" . $this->db->escape($value['answer']) . "'");
		}
	}

	public function editLiber($liber_id, $data) {
		$this->db->query("UPDATE " . DB_PREFIX . "liber SET status = '" . (int) $data['status'] . "', date_added = '" . $this->db->escape($data['date_added']) . "', sort_order = '" . $this->db->escape($data['sort_order']) . "' WHERE liber_id = '" . (int) $liber_id . "'");

		$this->db->query("DELETE FROM " . DB_PREFIX . "liber_description WHERE liber_id = '" . (int) $liber_id . "'");

		foreach ($data['liber_description'] as $language_id => $value) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "liber_description SET liber_id = '" . (int) $liber_id . "', language_id = '" . (int) $language_id . "', question = '" . $this->db->escape($value['question']) . "', answer = '" . $this->db->escape($value['answer']) . "'");
		}
	}

	public function deleteLiber($liber_id) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "liber WHERE liber_id = '" . (int) $liber_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "liber_description WHERE liber_id = '" . (int) $liber_id . "'");
	}

	public function getLiber($liber_id) {
		$query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "liber WHERE liber_id = '" . (int) $liber_id . "'");

		return $query->row;
	}

	public function getLibers($data = array()) {
		$sql = "SELECT * FROM " . DB_PREFIX . "liber l LEFT JOIN " . DB_PREFIX . "liber_description ld ON (l.liber_id = ld.liber_id) WHERE ld.language_id = '" . (int) $this->config->get('config_language_id') . "'";

		$sort_data = array(
			'ld.question',
			'ld.answer',
			'l.sort_order',
			'l.status'
		);

		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY " . $data['sort'];
		} else {
			$sql .= " ORDER BY l.sort_order";
		}

		if (isset($data['order']) && ($data['order'] == 'DESC')) {
			$sql .= " DESC";
		} else {
			$sql .= " ASC";
		}

		if (isset($data['start']) || isset($data['limit'])) {
			if ($data['start'] < 0) {
				$data['start'] = 0;
			}

			if ($data['limit'] < 1) {
				$data['limit'] = 20;
			}

			$sql .= " LIMIT " . (int) $data['start'] . "," . (int) $data['limit'];
		}

		$query = $this->db->query($sql);

		return $query->rows;
	}

	public function getLiberDescriptions($liber_id) {
		$liber_data = array();

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "liber_description WHERE liber_id = '" . (int) $liber_id . "'");

		foreach ($query->rows as $result) {
			$liber_data[$result['language_id']] = array(
				'question' => $result['question'],
				'answer' => $result['answer']
			);
		}

		return $liber_data;
	}

	public function getTotalLibers() {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "liber");

		return $query->row['total'];
	}

	public function editLiberQuestion($liber_question_id, $vieved) {
		$this->db->query("UPDATE " . DB_PREFIX . "liber_question SET viewed = '" . (int) $vieved . "' WHERE liber_question_id = '" . (int) $liber_question_id . "'");
	}

	public function deleteLiberQuestion($liber_question_id) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "liber_question WHERE liber_question_id = '" . (int) $liber_question_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "liber_description_question WHERE liber_question_id = '" . (int) $liber_question_id . "'");
	}

	public function getLiberQuestion($liber_question_id) {
		$query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "liber_question WHERE liber_question_id = '" . (int) $liber_question_id . "'");

		return $query->row['viewed'];
	}

	public function getLibersQuestion($data = array()) {
		$sql = "SELECT * FROM " . DB_PREFIX . "liber_question lq LEFT JOIN " . DB_PREFIX . "liber_description_question ldq ON (lq.liber_question_id = ldq.liber_question_id)";

		$sort_data = array(
			'ldq.contact',
			'ldq.question',
			'lq.viewed'
		);

		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY " . $data['sort'];
		} else {
			$sql .= " ORDER BY ldq.liber_question_id";
		}

		if (isset($data['order']) && ($data['order'] == 'DESC')) {
			$sql .= " DESC";
		} else {
			$sql .= " ASC";
		}

		if (isset($data['start']) || isset($data['limit'])) {
			if ($data['start'] < 0) {
				$data['start'] = 0;
			}

			if ($data['limit'] < 1) {
				$data['limit'] = 20;
			}

			$sql .= " LIMIT " . (int) $data['start'] . "," . (int) $data['limit'];
		}

		$query = $this->db->query($sql);

		return $query->rows;
	}

	public function getLiberDescriptionQuestion($liber_question_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "liber_description_question WHERE liber_question_id = '" . (int) $liber_question_id . "'");

		return $query->row;
	}

	public function getTotalLibersQuestion() {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "liber_question");

		return $query->row['total'];
	}

	public function tableExists() {
		$query = $this->db->query("SHOW TABLES LIKE '" . DB_PREFIX . "liber'");

		return $query->num_rows;
	}

	public function install() {
		$this->db->query("CREATE TABLE IF NOT EXISTS " . DB_PREFIX . "liber (
			liber_id int(11) NOT NULL AUTO_INCREMENT,
			date_added datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
			sort_order int(3) NOT NULL DEFAULT '0',
			status tinyint(1) NOT NULL DEFAULT '0',
			PRIMARY KEY (liber_id)
			) ENGINE=MyISAM DEFAULT CHARSET=utf8;");

		$this->db->query("CREATE TABLE IF NOT EXISTS " . DB_PREFIX . "liber_description (
			liber_id int(11) NOT NULL,
			language_id int(11) NOT NULL,
			question text NOT NULL,
			answer text NOT NULL,
			PRIMARY KEY (liber_id,language_id)
			) ENGINE=MyISAM DEFAULT CHARSET=utf8;");

		$this->db->query("CREATE TABLE IF NOT EXISTS " . DB_PREFIX . "liber_question (
			liber_question_id int(11) NOT NULL AUTO_INCREMENT,
			viewed tinyint(1) NOT NULL DEFAULT '0',
			PRIMARY KEY (liber_question_id)
			) ENGINE=MyISAM DEFAULT CHARSET=utf8;");

		$this->db->query("CREATE TABLE IF NOT EXISTS " . DB_PREFIX . "liber_description_question (
			liber_question_id int(11) NOT NULL,
			language_id int(11) NOT NULL,
			contact text NOT NULL,
			question text NOT NULL,
			PRIMARY KEY (liber_question_id,language_id)
			) ENGINE=MyISAM DEFAULT CHARSET=utf8;");
	}

	public function unistall() {
		$this->db->query("DROP TABLE IF EXISTS " . DB_PREFIX . "liber");
		$this->db->query("DROP TABLE IF EXISTS " . DB_PREFIX . "liber_description");
		$this->db->query("DROP TABLE IF EXISTS " . DB_PREFIX . "liber_question");
		$this->db->query("DROP TABLE IF EXISTS " . DB_PREFIX . "liber_description_question");
	}

}

?>