<?php
class AuthController extends CI_Controller {

    public function home() {
        $this->load->model("GestionFormModel");
        $data["fetch_data"] = $this->GestionFormModel->fetch_data();
        $this->load->view('home', $data);
    }

    public function deconnexion() {
        unset($_SESSION);
        session_destroy();
        redirect(base_url() . "AuthController/home");
    }

    private function verifConnexion(){
            $this->form_validation->set_rules('pseudo', 'Pseudo', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
    }

    private function verifInscription(){
            $this->form_validation->set_rules('pseudo', 'Pseudo', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('confirmPassword', 'confirmPassword', 'required|matches[password]');
    }

    public function connexion() {
        if(isset($_POST['formConnexion'])) {
            $this->verifConnexion();
            if($this->input->post('formConnexion') !==  FALSE) {
                if(!empty($_POST['pseudo']) AND !empty($_POST['password'])) {
                    $pseudo = htmlspecialchars($_POST['pseudo']);
                    $password = sha1($_POST['password']);
                    $this->load->model("AuthModel");
                    if($this->AuthModel->connexion($pseudo, $password)) {
                        $_SESSION['user_logged'] = TRUE;
                        $this->AuthModel->infosUser($pseudo);
                        $this->session->set_flashdata("success", "Connecté !");
                        redirect(base_url() . "UserController/profil");
                    } else {
                        $this->session->set_flashdata("error", "Identifiants incorrectes !");
                        redirect(base_url() . "AuthController/connexion");
                    }
                } else {
                    $this->session->set_flashdata("error", "Tous les champs doivent être complétés !");
                    redirect(base_url() . "AuthController/connexion");
                }
           }
        }
        $this->load->view('connexion');
    }

    public function inscription() {
        if(isset($_POST['formInscription'])) {
            $this->verifInscription();
            if($this->input->post('formInscription') !== FALSE) {
                if(!empty($_POST['pseudo']) AND !empty($_POST['email']) AND !empty($_POST['password']) AND !empty($_POST['confirmPassword'])) {
                    $pseudo = htmlspecialchars($_POST['pseudo']);
                    $email = htmlspecialchars($_POST['email']);
                    $passwd = sha1($_POST['password']);
                    $passwdConfirm = sha1($_POST['confirmPassword']);
                    $this->load->model("AuthModel");
                    if($this->AuthModel->pseudoDispo($pseudo)) {
                        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            if($this->AuthModel->emailDispo($email)) {
                                if($passwd == $passwdConfirm) {
                                    if($this->form_validation->run() == TRUE) {
                                        $this->AuthModel->inscription($pseudo, $email, $passwd);
                                        $this->session->set_flashdata("success","Ton compte a bien été créé !");
                                        redirect(base_url() . "AuthController/inscription");
                                    }
                                } else {
                                    $this->session->set_flashdata("error", "Les mots de passes ne sont pas identiques !");
                                    redirect(base_url() . "AuthController/inscription");
                                }
                            } else {
                                $this->session->set_flashdata("error", "L'adresse e-mail existe déjà !");
                                redirect(base_url() . "AuthController/inscription");
                            }
                        } else {
                            $this->session->set_flashdata("error", "Veillez saisir une adresse e-mail valide !");
                            redirect(base_url() . "AuthController/inscription");
                        }           
                    } else {
                        $this->session->set_flashdata("error", "Pseudo indisponible !");
                        redirect(base_url() . "AuthController/inscription");
                    }
                } else {
                    $this->session->set_flashdata("error", "Tous les champs doivent être complétés !");
                    redirect(base_url() . "AuthController/inscription");
                }
            }
        }
        $this->load->view('inscription');
    }
}
