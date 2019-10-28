<?php
class FormulaireModel extends CI_Model {

	public function titreDispo($titre) {
		$query = $this->db->query("SELECT titre FROM formulaire WHERE titre = '$titre'");
		$isExist = $query->num_rows();
		if($isExist <= 0) {
			$query = TRUE;
		} else {
			$query = FALSE;
		}
		return $query;
	}

	public function insertFormulaire($id, $cle, $titre, $description, $statut) {
		$this->db->query("INSERT INTO formulaire VALUES ('$id', '$cle', '$titre', '$description', '$statut')");
	}

/*	public function insertQuestion($cle, $question, $aide, $type) {
		$this->db->query("INSERT INTO question VALUES ('?', $cle', '$question', '$aide', '$type')");
	} */
}