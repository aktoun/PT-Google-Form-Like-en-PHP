<?php
class CompteModel extends CI_Model {

	public function changePhoto($avatar, $id) {
		$this->db->query("UPDATE membres SET photoprofil = '$avatar' WHERE id = '$id'");
	}

	public function changePseudo($newPseudo, $id) {
		$this->db->query("UPDATE membres SET pseudo = '$newPseudo' WHERE id = '$id'");
	}

	public function changeMail($newMail, $id) {
		$this->db->query("UPDATE membres SET email = '$newMail' WHERE id = '$id'");
	}

	public function changeMdp($newPasswd, $id) {
		$this->db->query("UPDATE membres SET passwd = '$newPasswd' WHERE id = '$id'");
	}
}
