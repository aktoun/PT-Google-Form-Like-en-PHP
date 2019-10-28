<?php

class QuestionnaireController extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

	public function fiche() {
		$cle = $this->uri->segment(3);
		$this->load->model("QuestionnaireModel");
		$data["recup_question"] = $this->QuestionnaireModel->recup_question($cle);
		$data2["recup_reponse"] = $this->QuestionnaireModel->recup_reponse($cle);
		$this->load->view('header', $data2);
		$this->load->view('fiche', $data);
	}

	public function enregistrerRep() {
		if(isset($_POST['reponse'])) {
			$cle = $this->uri->segment(3);
			$_SESSION['cle'] = $cle;
			$this->reponse($cle);
			
			//$this->load->view('reponse', $data2);
		}
	}

	public function reponse($cle) {

		$this->load->model("QuestionnaireModel");
		$data2 = $this->QuestionnaireModel->recup_reponse($cle);
		$cle = $_SESSION['cle'];
		$label = $_POST['reponse'];
	        $tabnum=array();
	        $flag=1;
	        $compteur=0;

	        if($data2->num_rows() > 0) {
	            foreach ($data2->result() as $reponse) { 
	                foreach ($label as $value) {
	                    if($reponse->labelreponse==$value AND $flag==1){
	                        $tabnum[]=$reponse->numquestion;
	                        $flag=0;
	                    }elseif($reponse->labelreponse==NULL AND $flag==1){
	                        $tabnum[]=$reponse->numquestion;
	                        $flag=0;
	                    }
	                }
	                $flag=1;
	            }
	        }


	        foreach ($label as $value) {
	            $compteur++;
	        }
	        
	        for ($i=0; $i < $compteur; $i++) { 
	            $this->db->query("INSERT INTO reponsesave VALUES ('$label[$i]', '$tabnum[$i]', '$cle')");
	        }

	        redirect(base_url() . "UserController/profil");
	
	}


}