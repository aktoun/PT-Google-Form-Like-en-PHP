<?php

class FormulaireController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if($_SESSION['user_logged'] == FALSE ) {
            $this->session->set_flashdata("error", "Merci de vous connecter afin de rejoindre cette page !");
            redirect(base_url() . "AuthController/connexion");
        }
    }

    public function index(){
        $this->load->view('formulaire');
    }

    private function verifFormulaire(){
            $this->form_validation->set_rules('titre', 'Titre', 'required');
            $this->form_validation->set_rules('description', 'Description', 'required');
            $this->form_validation->set_rules('type', 'Type', 'required');
            $this->form_validation->set_rules('question', 'Question', 'required');
    }

    public function create() {
        $alphabet = "azertyuiopqsdfghjkklmwxcvbnAZERTYUIOPLMKJHGFDSQWXCVBN1234567890";
        if(isset($_POST['ok'])) {
            $this->verifFormulaire();
            if($this->input->post('ok') !== FALSE) {
                if(!empty($_POST['titre']) AND !empty($_POST['description']) AND !empty($_POST['question']) AND !empty($_POST['addmore'])) {
                    $titre = htmlspecialchars($_POST['titre']);
                    $description = htmlspecialchars($_POST['description']);
                    $type = $_POST['type'];
                    $question = htmlspecialchars($_POST['question']);
                    $reponse = $_POST['addmore'];
                    $aide = $_POST['aide'];
                    $this->load->model("FormulaireModel");
                    if($this->FormulaireModel->titreDispo($titre)) {                              
                        if($this->form_validation->run() == TRUE) {
                            $statut = 1;
                            $id = intval($_SESSION['id']);
                            $cle = $this->createPassword(30,$alphabet);
                            $_SESSION['cle'] = $cle;

                            $this->FormulaireModel->insertFormulaire($id, $cle, $titre, $description, $statut);

                            $data = array(
                                'cle'=>$cle,
                                'label'=>$question,
                                'aide'=>$aide,
                                'type'=>$type,
                            );
                            $this->db->insert('question',$data);

                            $query = $this->db->query("SELECT numquestion FROM question where label=\"$question\"");
                            foreach ($query->result() as $row)
                            {
                                    $numquestion =$row->numquestion;
                            }
                            
                            foreach ($reponse as $value) {
                                $data = array(
                                    'numquestion'=>$numquestion,
                                    'cle'=>$cle,
                                    'labelreponse'=>$value,
                                );
                                $this->db->insert('reponsepossible',$data);
                            }

                            redirect(base_url() . "FormulaireController/indexquestion");
                        }
           
                    } else {
                        $this->session->set_flashdata("error", "Le titre n'est pas disponible !");
                        redirect(base_url() . "FormulaireController/index");
                    }


                } else {
                    $this->session->set_flashdata("error", "Tous les champs doivent être complétés !");
                    redirect(base_url() . "FormulaireController/index");
                }

            }
        } elseif(isset($_POST['quitter'])) {
            unset($_SESSION['cle']);
            redirect(base_url() . "UserController/profil");
        }
    }

    public function indexquestion() {
        $this->load->view('questionform');
    }

    public function createform() {

        if(isset($_POST['ok'])) {
            $this->form_validation->set_rules('type', 'Type', 'required');
            $this->form_validation->set_rules('question', 'Question', 'required');
           
            if($this->input->post('ok') !== FALSE) {
                $type = $_POST['type'];
                $question = htmlspecialchars($_POST['question']);
                $reponse = $_POST['addmore'];
                $aide = $_POST['aide'];

                if(!empty($question) AND !empty($reponse)) {

                                               
                        if($this->form_validation->run() == TRUE) {

                            $statut=0;
                            $id = intval($_SESSION['id']);
                            
                            echo $_SESSION['cle'];

                            $data = array(
                                'cle'=>$_SESSION['cle'],
                                'label'=>$question,
                                'aide'=>$aide,
                                'type'=>$type,
                            );
                            $this->db->insert('question',$data);

                            $query = $this->db->query("SELECT numquestion FROM question where label=\"$question\"");
                            foreach ($query->result() as $row)
                            {
                                    $numquestion =$row->numquestion;
                            }
                            
                            foreach ($reponse as $value) {
                                $data = array(
                                    'numquestion'=>$numquestion,
                                    'cle'=>$_SESSION['cle'],
                                    'labelreponse'=>$value,
                                );
                                $this->db->insert('reponsepossible',$data);
                            }

                            redirect(base_url() . "FormulaireController/indexquestion");
                        }
           
                 
                } else {
                    $this->session->set_flashdata("error", "Tous les champs doivent être complétés !");
                    redirect(base_url() . "FormulaireController/index");
                }

            }
        } elseif(isset($_POST['quitter'])) {
            unset($_SESSION['cle']);
            redirect(base_url() . "UserController/profil");
        }
    }

    private function createPassword($n,$alphabet)
    {
        $length = strlen($alphabet);
        $password = "";

        for ($i=0; $i<$n; $i++){
            $lettre=mt_rand(0,$length-1);
            $password=$password.$alphabet[$lettre];
        }

        return $password;
    }


}
