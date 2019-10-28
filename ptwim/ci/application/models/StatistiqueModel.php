<?php
class StatistiqueModel extends CI_Model {

	public function recup_reponsetype3a5($cle) {
		$query = $this->db->query("SELECT DISTINCT labelreponse,numquestion FROM question NATURAL JOIN reponsepossible where question.cle = '$cle' and (type=3 or type=4 or type=5) Order by numquestion");
		return $query;
	}

	public function recup_questiontype3a5($cle) {
		$query = $this->db->query("SELECT DISTINCT label,numquestion FROM question NATURAL JOIN reponsepossible where question.cle = '$cle' and (type=3 or type=4 or type=5) Order by numquestion");
		return $query;
	}

	public function recup_nbrquestiontype3a5($cle) {
		$query = $this->db->query("SELECT COUNT(*) FROM question where question.cle = '$cle' and (type=3 or type=4 or type=5) Order by numquestion");
		return $query;
	}

	public function recup_nbrreponsetype3a5($cle) {
		$query = $this->db->query("SELECT COUNT(*) FROM reponsepossible Natural JOIN question where question.cle = '$cle' and (type=3 or type=4 or type=5) Order by numquestion");
		return $query;
	}

	public function recup_nbrrestype3a5($cle,$data) {
		$tabcount = array();
		if($data->num_rows() > 0) {
            foreach ($data->result() as $reponse1) { 
                $query = $this->db->query("SELECT COUNT(*) FROM reponsesave where cle = '$cle'and labelreponse='$reponse1->labelreponse'");
                foreach ($query->result_array() as $reponse2) { 
                	$tabcount[]=$reponse2;
                }
            }
        }
        return $tabcount;
	}


	public function recup_reponseautretype($cle) {
		$query = $this->db->query("SELECT labelreponse,numquestion FROM reponsesave Natural JOIN question where question.cle = '$cle' and (type=1 or type=2 or type=6) Order by numquestion");
		return $query;
	}

	public function recup_questionautretype($cle) {
		$query = $this->db->query("SELECT DISTINCT label,numquestion FROM question NATURAL JOIN reponsepossible where question.cle = '$cle' and (type=1 or type=2 or type=6) Order by numquestion");
		return $query;
	}

	public function recup_nbrquestionautretype($cle) {
		$query = $this->db->query("SELECT COUNT(*) FROM question where question.cle = '$cle' and (type=1 or type=2 or type=6) Order by numquestion");
		return $query;
	}

	public function recup_nbrreponseautretype($cle) {
		$query = $this->db->query("SELECT COUNT(*) FROM reponsesave Natural JOIN question where question.cle = '$cle' and (type=1 or type=2 or type=6) Order by numquestion");
		return $query;
	}



}
