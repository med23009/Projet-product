<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Connexion extends CI_Controller {

    function __construct()
    {
            parent::__construct();
            $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('date');
        $this->load->library('email');
        $this->load->library('session');
        $this->load->library('upload');
        $this->load->helper('date');
        $this->load->library('email');
     $this->load->library("Pdf");
        $this->load->helper('url');
        $this->load->helper('html');
            $this->load->model('connexion_modele');
            $this->load->model('etudiant_modele');
            $this->lang->load('iup', 'french');
        $this->lang->load('menusLabels_lang','french');
            
    }
    public function index()
    {
       
       $this->login();
    }

    function login()
    {      
        $this->form_validation->set_rules('username','username','required');
        $this->form_validation->set_rules('password','password','required');
        if($this->form_validation->run())
        {  
            $idProfil = $this->connexion_modele->check_id($this->input->post('username'),$this->input->post('password'));
			$data = array('login' =>$this->input->post('username'), 'logged'=>true);
            $this->session->set_userdata($data);

            if($idProfil === null)
            {
				$message = $this->connexion_modele->codeErrone($_POST['username']);
                $data['errorMessage'] = $message;
                    $this->load->view('connexion/index',$data);
            }
            elseif($idProfil == -1)
            {
				$data['errorMessage'] = 'Votre compte n\'est plus actif,
                    veuillez contacter le Service de la scolarité. ';
                    $this->load->view('connexion/index',$data);
            }
			elseif(count($idProfil) > 1)	// employé ayant plusieurs profils
            {
				for($i=0;$i<count($idProfil);$i++)
                {
                    if($idProfil[$i]== 'administrateur')
                    {
                        $data['profil'][] = 'Administrateur'; 
                    }
                    if($idProfil[$i] == 'scolarite')
                    {
                        $data['profil'][] = 'Service de scolarité'; 
                    }
                    if ($idProfil[$i] == 'chef_departement')
                    {
                        $data['profil'][] = 'Chef de département';
                    }
                    if ($idProfil[$i] == 'professeur')
                    {
                        $data['profil'][] = 'Enseignant';
                    }
                    if ($idProfil[$i] == 'secretaire')
                    {
                        $data['profil'][] = 'Secrétaire';
                    }
                     if ($idProfil[$i] == 'agent')
                    {
                        $data['profil'][] = 'Agent';
                    }
                      if ($idProfil[$i] == 'directeur_etudes')
                    {
                        $data['profil'][] = 'Directeur des etudes';
                    }
                }
                $data['idProfil'] = $idProfil;
				$this->connexion_modele->remisAZero($this->input->post('username'));
                $this->load->view('connexion/choix_profil',$data);
            }else
            {
                if($idProfil == 'etudiant')
                {
                    $this->connexion_modele->remisAZero($this->input->post('username'));
                    define('ETUDIANT', TRUE);
                    redirect('etudiant/index');
                }
				// Employé avec un seul profil
              //  echo '$$$$$$$$$$$$$$$$$ test </br>';
                $this->connexion_modele->remisAZero($this->input->post('username'));
                $url = $idProfil[0] . '/index';
             //   echo $url;
                define($idProfil[0], TRUE);
                
                redirect($url);
            }
        }
        else
        {
			$this->load->view('connexion/index');
        }

    }
    function logout()
    {
        $this->session->sess_destroy();
        redirect(site_url());
    }

    function choixProfil()
    {
        $data = $this->connexion_modele->check_id($this->input->post('username'),$this->input->post('password'));
        $data['profilArray']= $data;
        $this->load->view('connexion/choix_profil',$data);
    }
    function switchLang($language = "") {
        
        $language = ($language != "") ? $language : "french";
        $this->session->set_userdata('site_lang', $language);
        
        redirect($_SERVER['HTTP_REFERER']);
        
    }
	
} 

