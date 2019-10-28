<?php
class GestionFormModel extends CI_Model {

	public function fetch_data() {
		$query = $this->db->query("SELECT * FROM formulaire ORDER BY titre ASC");
		return $query;
	}

	public function fetch_data2($id) {
		$query = $this->db->query("SELECT * FROM formulaire WHERE id = '$id' ORDER BY titre ASC");
		return $query;
	}

	public function delete_data($cle) {
		$this->db->query("DELETE FROM formulaire WHERE cle = '$cle'");
	}

	public function off_data($cle) {
		$this->db->query("UPDATE formulaire SET statut='0' WHERE cle = '$cle'");
	}

	public function on_data($cle) {
		$this->db->query("UPDATE formulaire SET statut='1' WHERE cle = '$cle'");
	}
    
}
