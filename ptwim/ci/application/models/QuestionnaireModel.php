<?php
class QuestionnaireModel extends CI_Model {

	public function recup_question($cle) {
		$query = $this->db->query("SELECT * FROM question where cle = '$cle' ");
		return $query;
	}

	public function recup_reponse($cle) {
		$query2 = $this->db->query("SELECT * FROM question NATURAL JOIN reponsepossible where question.cle = '$cle' AND reponsepossible.cle= '$cle'");
		return $query2;
	}
}
