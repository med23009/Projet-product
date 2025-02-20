<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

//if ( ! defined('ETUDIANT')) exit('YOU ARE NOT ALLOW TO ACCESS THIS PAGE');

class Etudiant extends CI_Controller 
{

    function __construct() 
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('date');
        $this->load->library('email');
        $this->load->library('session');
        $this->load->library('upload');
        $this->load->library('email');
     $this->load->library("Pdf");
        $this->load->helper('url');
        $this->load->helper('html');
        if (!in_array('etudiant', $this->session->userdata('profil')))
            redirect();

        $this->load->model('etudiant_modele');
       $this->clear_output();       
       $this->lang->load('iup_lang','french');
       $this->lang->load('menusLabels_lang','french');
    }
     
    function clear_output()
    {
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->output->set_header("Cache-Control: post-check=0, pre-check=0", false);
        $this->output->set_header("Pragma: no-cache"); 
    }

    public function index() 
    {
        $this->load->view('etudiant/index');
    }

    public function mot_de_passe() 
    {
        $data['errorMessage'] = '';
        $this->load->view('etudiant/modifier_mot_de_passe', $data);
    }

    function password_check($password) 
    {
        if (
                ctype_alnum($password) // numbers & digits only 
                && strlen($password) > 7 // at least 8 chars 
                && strlen($password) < 21 // at most 20 chars 
                && ((preg_match('`[a-z]`', $password) || (preg_match('`[A-Z]`', $password))) )
                && preg_match('`[0-9]`', $password) // at least one digit 
        ) {
            return TRUE;
        } 
        else 
        {
            return FALSE;
        }
    }

    public function modifier_mot_de_passe() 
    {
        if ($this->etudiant_modele->get_old_password($this->session->userdata('login')) == $this->input->post('old_password')) 
        {
            $passwordIsValid = $this->password_check($this->input->post('new_password'));
            if ($passwordIsValid == TRUE) 
            {
                if ($this->input->post('new_password') == $this->input->post('confirmed_password')) 
                {
                    $data['type'] = 'valid_box';
                    $data['message'] = 'Mot de passe modifié avec succès.';
                    $this->etudiant_modele->set_password($this->input->post('new_password'), $this->session->userdata('login'));
                    $this->load->view('etudiant/modification_confirme',$data);
                } 
                else 
                {
                    $data['errorMessage'] = '<div class="error_box">
                            Les deux nouveaux nouveaux mots de passe ne sont pas identiques.
                            </div>';
                    $this->load->view('etudiant/modifier_mot_de_passe', $data);
                }
            } 
            else 
            {
                $data['errorMessage'] = '<div class="error_box">
                       Le mot de passe doit contenir 8 à 10 lettres et chiffres dont au moins une lettre et un chiffre.
                        </div>';
                $this->load->view('etudiant/modifier_mot_de_passe', $data);
            }
        } 
        else 
        {
            $data['errorMessage'] = '<div class="error_box">
                       L\'ancien mot de passe est erroné.
                        </div>';
            $this->load->view('etudiant/modifier_mot_de_passe', $data);
        }
    }

    function modifier_info_personnelle() 
    {
        $data = $this->etudiant_modele->get_informations($this->session->userdata('login'));
        $this->load->view('etudiant/modifier_info_personnelle', $data);
    }

    function consulter_horaire() 
    {
        $periodeGroupe = NULL;
        $periodeGroupe['detailHoraire'] = NULL;
        $matriculeEtudiant = $this->etudiant_modele->get_matricule($this->session->userdata('login'));
        $dataIdGroupe = $this->etudiant_modele->get_idGroupe($matriculeEtudiant);

        if (is_array($dataIdGroupe)) 
        {
            foreach ($dataIdGroupe['idGroupe'] as $idG) 
            {
                $periodeGroupe['detailHoraire'][] = $this->etudiant_modele->get_periode_groupe($idG);
            }
        }
        $this->load->view('etudiant/consuter_horaire', $periodeGroupe);
    }

    function string_valid($str) 
    {
        if ($str == '') 
        {
            return TRUE;
        } 
        else 
        {
            if (ctype_alpha($str)) 
            {
                return TRUE;
            } 
            else 
            {
                return FALSE;
            }
        }
    }
    function stringValid($str) 
    {
        return !preg_match('/[^A-Za-z0-9.-]/', $str);
    }
        /*
     * fonction pour valider les numeros de telephone.
     */
    function valider_phone($phone)
    {
        $caractereValide = array('+', '-', '/', '\\', '(', ')', ' ','');
        
        if($phone == NULL)
        {
            return TRUE;
        }
        else
        {
            for($i=0;$i<strlen($phone);$i++)
            {
                if(!is_numeric($phone[$i])&& !in_array($phone[$i], $caractereValide))
                {
                    $this->form_validation->set_message('valider_phone', 'Le téléphone n\'est pas valide');
                    return FALSE;
                }
            }
        }
        return TRUE;
    }
    function modifier_information_personnelle() 
    {
        $this->form_validation->set_rules('email', 'email', 'valid_email');
        $this->form_validation->set_rules('ligne2', 'Ligne 2 de adresse', 'xss_clean');
        $this->form_validation->set_rules('ligne1', 'Ligne 1 de adresse ', 'xss_clean');
        $this->form_validation->set_rules('ligne3', 'Ville d\'adresse', 'xss_clean');
        $this->form_validation->set_rules('ligne_3', 'Ville des parents', 'xss_clean');
        $this->form_validation->set_rules('ligne_2', 'Ligne 2 de l\'adresse des parents', 'xss_clean');
        $this->form_validation->set_rules('ligne_1', 'Ligne 1 de l\'adresse des parents', 'xss_clean');
        $this->form_validation->set_rules('contactUrgence', 'Nom du contact d\'urgence', 'xss_clean');
        $this->form_validation->set_rules('lienParenteContactUrgence', 'Lien de parenté du contact
            d\'urgence', 'xss_clean');
        $this->form_validation->set_rules('telephoneUrgence', 'Téléphone d\'urgence', 'callback_valider_phone[telephoneUrgence]');
        $this->form_validation->set_rules('phone1', 'Téléphone 1', 'callback_valider_phone[phone1]');
        $this->form_validation->set_rules('phone2', 'Téléphone 2', 'callback_valider_phone[phone2]');
        $this->form_validation->set_rules('telephoneParents', 'Téléphone des parents', 'callback_valider_phone[telephoneParents]');
        if ($this->form_validation->run()) 
        {
            $this->etudiant_modele->modifier_info($this->session->userdata('login'), $_POST);
            $this->load->view('etudiant/valider_info_personnelle');
        } 
        else 
        {
            $data = $this->etudiant_modele->get_informations($this->session->userdata('login'));
            $this->load->view('etudiant/modifier_info_personnelle', $data);
        }
    }

    function afficher_absences()
    {
        $infoAbsences = $this->etudiant_modele->get_info_absences($this->session->userdata('login'));
        if($infoAbsences == NULL)
        {
             $data['type'] = 'valid_box';
             $data['message'] =  'Aucune absence n\'a été enregistrée à ce jour dans ce semestre. ';
            $this->load->view('etudiant/modification_confirme', $data);
        }
        else
        {
            $data['titre'] = 'Vos absences non motivées, par groupe.';
            $data['infoAbsences'] = $infoAbsences;
            $this->load->view("etudiant/afficher_absences", $data);
        }
    }
    
    function produire_bulletin() 
    {
        $query = $this->etudiant_modele->get_matricule($this->session->userdata('login'));
        $matricule = $query['matricule'];
        $bulletin = 'Bulletins\\Bulletin_' . $matricule . '.pdf';
        if (file_exists($bulletin)) 
        {
            $filename = 'Bulletin_' . $matricule . '.pdf';
            header('Content-type: application/pdf');
            header('Content-Disposition: inline; filename="' . $filename . '"');
            header('Content-Transfer-Encoding: binary');
            header('Content-Length: ' . filesize($bulletin));
            header('Accept-Ranges: bytes');
            @readfile($bulletin);
        } 
        else 
        {
            $data['titre'] = 'Afficher bulletin';
            $data['type'] = 'error_box';
            $data['message'] = 'Vous n\'avez pas de bulletin pour le moment.';
            $this->load->view("etudiant/modification_confirme", $data);
        }
    }

}
