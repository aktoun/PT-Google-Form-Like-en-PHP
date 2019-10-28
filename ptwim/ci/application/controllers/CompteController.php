<?php
class CompteController extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if($_SESSION['user_logged'] == FALSE ) {
			$this->session->set_flashdata("error", "Merci de vous connecter afin de rejoindre cette page !");
			redirect(base_url() . "AuthController/connexion");
		}
	}

	public function compte() {
		$this->load->view('compte');
		if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])) {
			$tailleMax = 2097152;
			$extensionsValides = array('jpg', 'jpeg', 'png');
			if($_FILES['avatar']['size'] <= $tailleMax) {
				$extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
				if(in_array($extensionUpload, $extensionsValides)) {
					$chemin ="./assets/membres/avatars/".$_SESSION['id'].".".$extensionUpload;
					$result = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
					if($result) {
						$avatar = $_SESSION['id'].".".$extensionUpload;
						$id = $_SESSION['id'];
						$this->load->model("CompteModel");
						$this->CompteModel->changePhoto($avatar, $id);
						$_SESSION['photoprofil'] = $avatar;
						redirect(base_url() . "CompteController/compte");
					} else {
						$this->session->set_flashdata("error", "Erreur durant l'importation de votre photo de profil !");
						redirect(base_url() . "CompteController/compte");
					}
				} else {
					$this->session->set_flashdata("error", "Votre photo de profil doit être au format 'jpg', 'jpeg' ou 'png' !");
					redirect(base_url() . "CompteController/compte");
				}
			} else {
				$this->session->set_flashdata("error", "Votre photo de profil ne doit pas dépasser 2Mo !");
				redirect(base_url() . "CompteController/compte");
			}
		}

		if(isset($_POST['formMaj'])) {
			$id = $_SESSION['id'];
			if(isset($_POST['newpseudo']) AND !empty($_POST['newpseudo']) AND $_POST['newpseudo'] != $_SESSION['pseudo']) {
				$newPseudo = htmlspecialchars($_POST['newpseudo']);
				$this->load->model("CompteModel");
				$this->CompteModel->changePseudo($newPseudo, $id);
				$_SESSION['pseudo'] = $newPseudo;
				redirect(base_url() . "CompteController/compte");
			}
			if(isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail'] != $_SESSION['email']) {
				$newMail = htmlspecialchars($_POST['newmail']);
				$this->load->model("CompteModel");
				$this->CompteModel->changeMail($newMail, $id);
				$_SESSION['email'] = $newMail;
				redirect(base_url() . "CompteController/compte");
			}
		   	if(isset($_POST['newmdp1']) AND !empty($_POST['newmdp1']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2'])) {
				$newPasswd = sha1($_POST['newmdp1']);
				$newPasswdConfirm = sha1($_POST['newmdp2']);
		      	if($newPasswd == $newPasswdConfirm) {
					$this->load->model("CompteModel");
					$this->CompteModel->changeMdp($newPasswd, $id);
					redirect(base_url() . "AuthController/deconnexion");
		      	} else {
		         	$this->session->set_flashdata("error", "Les mots de passes ne sont pas identiques !");
					redirect(base_url() . "CompteController/compte");
		      	}
		   	}
		}
	}
}
