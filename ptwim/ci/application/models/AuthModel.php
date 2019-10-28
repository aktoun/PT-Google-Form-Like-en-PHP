<?php
class AuthModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

	public function connexion($pseudo, $password) {
		$query = $this->db->query("SELECT id FROM membres WHERE pseudo = '$pseudo' AND passwd = '$password'");
		$isExist = $query->num_rows();
		if($isExist > 0) {
			$query = TRUE;
		} else {
			$query = FALSE;
		}
		return $query;
	}

	public function infosUser($pseudo) {
		$query = $this->db->query("SELECT * FROM membres WHERE pseudo = '$pseudo'");
		$user = $query->row();
        $_SESSION['id'] = $user->id;
        $_SESSION['pseudo'] = $user->pseudo;
        $_SESSION['email'] = $user->email;
        $_SESSION['photoprofil'] = $user->photoprofil;
	}

	public function pseudoDispo($pseudo) {
		$query = $this->db->query("SELECT id FROM membres WHERE pseudo = '$pseudo'");
		$isExist = $query->num_rows();
		if($isExist <= 0) {
			$query = TRUE;
		} else {
			$query = FALSE;
		}
		return $query;
	}

	public function emailDispo($email) {
		$query = $this->db->query("SELECT id FROM membres WHERE email = '$email'");
		$isExist = $query->num_rows();
		if($isExist <= 0) {
			$query = TRUE;
		} else {
			$query = FALSE;
		}
		return $query;
	}

	public function inscription($pseudo, $email, $passwd) {
		$this->db->query("INSERT INTO membres VALUES ('?', '$pseudo', '$email', '$passwd', 'default.jpg')");
	}
}
