<?php

class StatController extends CI_Controller {

	public function stat() {
		$id = $_SESSION['id'];
		$this->load->model("GestionFormModel");
		$data["fetch_data"] = $this->GestionFormModel->fetch_data2($id);
		$this->load->view('statistique', $data);
	}

	public function graphe($cle) {

		$cle = $this->uri->segment(3);
		$this->load->model("StatistiqueModel");
		$data = $this->StatistiqueModel->recup_reponsetype3a5($cle);
		$data2 = $this->StatistiqueModel->recup_questiontype3a5($cle);
		$data3 = $this->StatistiqueModel->recup_nbrquestiontype3a5($cle);
		$data4 = $this->StatistiqueModel->recup_nbrreponsetype3a5($cle);
		$data5 = $this->StatistiqueModel->recup_nbrrestype3a5($cle,$data);

		$_POST['data']=$data;
		$_POST['data2']=$data2;
		$_POST['data3']=$data3;
		$_POST['data4']=$data4;
		$_POST['data5']=$data5;

		$data6 = $this->StatistiqueModel->recup_reponseautretype($cle);
		$data7 = $this->StatistiqueModel->recup_questionautretype($cle);
		$data8 = $this->StatistiqueModel->recup_nbrquestionautretype($cle);
		$data9 = $this->StatistiqueModel->recup_nbrreponseautretype($cle);

		$_POST['data6']=$data6;
		$_POST['data7']=$data7;
		$_POST['data8']=$data8;
		$_POST['data9']=$data9;

		$this->load->view('graphe');
	    
	}

}