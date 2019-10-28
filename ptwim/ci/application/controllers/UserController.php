<?php

class UserController extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if($_SESSION['user_logged'] == FALSE ) {
			$this->session->set_flashdata("error", "Merci de vous connecter afin de rejoindre cette page !");
			redirect(base_url() . "AuthController/connexion");
		}
	}

	public function profil() {
		$this->load->model("GestionFormModel");
		$data["fetch_data"] = $this->GestionFormModel->fetch_data();
		$this->load->view('profil', $data);
	}

	
	public function questionnaire() {
		redirect(base_url() . "QuestionnaireController/fiche");
	}

	public function delete_data() {
		$cle = $this->uri->segment(3);
		$this->load->model("GestionFormModel");
		$this->GestionFormModel->delete_data($cle);
		redirect(base_url() . "UserController/profil");
	}

	public function off_data() {
		$cle = $this->uri->segment(3);
		$this->load->model("GestionFormModel");
		$this->GestionFormModel->off_data($cle);
		redirect(base_url() . "UserController/profil");
	}

	public function on_data() {
		$cle = $this->uri->segment(3);
		$this->load->model("GestionFormModel");
		$this->GestionFormModel->on_data($cle);
		redirect(base_url() . "UserController/profil");
	}
}
