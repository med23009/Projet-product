<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Administrateur extends CI_Controller 
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
        $this->load->helper('date');
        $this->load->library('email');
     $this->load->library("Pdf");
        $this->load->helper('url');
        $this->load->helper('html');
        if (!in_array('administrateur', $this->session->userdata('profil')))
            redirect();
        $this->load->model('admin_modele');
        $this->load->model('search_modele');
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

    var $skey = "SuPerEncKey2010"; // you can change it

    /*
     * fonctions pour encodage et decodage pour les annees et les semestres dans l url.
     */
    
    public function safe_b64encode($string) {

        $data = base64_encode($string);
        $data = str_replace(array('+', '/', '='), array('-', '_', ''), $data);
        return $data;
    }

    public function safe_b64decode($string) {
        $data = str_replace(array('-', '_'), array('+', '/'), $string);
        $mod4 = strlen($data) % 4;
        if ($mod4) {
            $data .= substr('====', $mod4);
        }
        return base64_decode($data);
    }

    public function encode($value) {

        if (!$value) {
            return false;
        }
        /*
        $text = $value;
        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $crypttext = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $this->skey, $text, MCRYPT_MODE_ECB, $iv);
        */
        $text = $value;
        // Store the cipher method
     $ciphering = "AES-128-CTR";
     
     // Use OpenSSl Encryption method
     $iv_length = openssl_cipher_iv_length($ciphering);
     $options = 0;
     
     // Non-NULL Initialization Vector for encryption
     $encryption_iv = '2021132014161915';//'1234567891011121';//16
     
     // Store the encryption key
     $encryption_key = "CheikhAlfa2013Dhib";//-1
     
     // Use openssl_encrypt() function to encrypt the data
     $crypttext = openssl_encrypt($text, $ciphering,
                 $encryption_key, $options, $encryption_iv);
        
        return trim($this->safe_b64encode($crypttext));
    }

    public function decode($value) {

        if (!$value) {
            return false;
        }
        $crypttext = $this->safe_b64decode($value);
        /*
        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $decrypttext = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $this->skey, $crypttext, MCRYPT_MODE_ECB, $iv);
        */
        
      
      // Non-NULL Initialization Vector for decryption
      $decryption_iv = '2021132014161915';
      $options = 0;
      // Store the decryption key
      $decryption_key = "CheikhAlfa2013Dhib";
      // Store the cipher method
     $ciphering = "AES-128-CTR";
     
      // Use openssl_decrypt() function to decrypt the data
      $decrypttext=openssl_decrypt ($crypttext, $ciphering,
              $decryption_key, $options, $decryption_iv);
     
        
        return trim($decrypttext);
    }
  
    /*
     * fonction pour loader la page par d'faut de l'administrateur 'Accueil'
     */

    public function index() {
        $this->load->view('administrateur/index');
    }

    /*
     * fonction pour loader la page pour modifier mot de passe de l'administrateur
     */

    public function mot_de_passe() 
    {
        $data['errorMessage'] = '';
        $this->load->view('administrateur/modifier_mot_de_passe', $data);
    }

    function password_check($password) {

        if (
                ctype_alnum($password) // numbers & digits only 
                && strlen($password) > 7 // at least 8 chars 
                && strlen($password) < 11 // at most 20 chars 
                && ((preg_match('`[a-z]`', $password) || (preg_match('`[A-Z]`', $password))) )
                && preg_match('`[0-9]`', $password) // at least one digit 
        ) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /*
     * fonction qui valide la modification du mot de passe de l'admin ou non
     */

    public function modifier_mot_de_passe() 
    {
        if ($this->admin_modele->get_old_password($this->session->userdata('login')) == $this->input->post('old_password')) 
        {
            $passwordIsValid = $this->password_check($this->input->post('new_password'));
            if ($passwordIsValid == TRUE) 
            {
                if ($this->input->post('new_password') == $this->input->post('confirmed_password')) 
                {
                    $data['typeBox'] = 'valid_box';
                    $data['informations'] = 'Le mot de passe a été modifié avec succès.';
                    $this->admin_modele->set_password($this->input->post('new_password'), $this->session->userdata('login'));
                    $this->load->view('administrateur/modification_confirme', $data);
                } 
                else 
                {
                    $data['errorMessage'] = '<div class="error_box">
                            Les deux nouveaux mots de passe ne sont pas identiques.
                            </div>';
                    $this->load->view('administrateur/modifier_mot_de_passe', $data);
                }
            } 
            else 
            {
                $data['errorMessage'] = '<div class="error_box">
                        Le mot de passe entré doit contenir 8 à 10 lettres et chiffres dont au moins une lettre et un chiffre.
                        </div>';
                $this->load->view('administrateur/modifier_mot_de_passe', $data);
            }
        } else {
            $data['errorMessage'] = '<div class="error_box">
                    L\'ancien mot de passe est erroné.
                        </div>';
            $this->load->view('administrateur/modifier_mot_de_passe', $data);
        }
    }

    /*
     * fonction load la vue des cycles pour les consulter 
     */

    public function get_cycle() {
        
        $data = $this->admin_modele->get_cycle_information();
        $data['cycleInfo'] = $data;
        /* $this->load->view('administrateur/get_cycle', $data); Modif 2.2.1 */
		$this->load->view('administrateur/consulter_cycles', $data);
    }

    function get_local() {
        $data['localInfo'] = '';
        $data['localInfo'] = $this->admin_modele->get_local_information();

        $this->load->view('administrateur/get_local', $data);
    }

    /*
     * fonction qui load la vue de recherche parametrée afin de modifier les cycles
     */

    public function modifier_cycle() 
    {
        $tables = array("cycle");
        $join_keys = null;
        $db_columns = array('nom', 'nbCredits', 'idCycle');
        $grid_columns = array('Nom Cycle', 'Nombre de crédits', 'IdCycle');
        $action = 'modifier_cycle_action';
        $id_action = 'idCycle';
        $result = $this->search_modele->getSearchResult($tables, $db_columns, $grid_columns, $join_keys, $action, $id_action);
        $titre = 'Modifier un cycle ';
        $controlleur = "administrateur";
        $data = array('titre' => $titre, 'controlleur' => $controlleur, 'result' => $result);
        $this->load->view("recherche_parametree", $data);
    }

    /*
     * fonction qui modifie le cycle par les valeurs POST du formulaire et redirige vers l'interface de 
     * voir tous les cycles 
     */

    public function modifier_cycle_action($idCycle) {
        $this->form_validation->set_rules('nomCycle', 'nomCycle', 'required');
        $this->form_validation->set_rules('nbCredits', 'nbCredits', 'numeric|required');
        if ($this->form_validation->run()) {
            $this->admin_modele->modifier_cycle($idCycle, $this->input->post('nomCycle'), $this->input->post('nbCredits'));
            $data['typeBox'] = 'valid_box';
            $data['informations'] = 'Le Cycle <b>'.$this->input->post('nomCycle').' </b>est bien modifié.';
            $this->load->view('administrateur/modification_confirme', $data);
        } else {
            $information = $this->admin_modele->get_cycle_information_id($idCycle);
            $data['cycleInfo'] = $information;
            $data['idCycle'] = $idCycle;
            $this->load->view("administrateur/modifier_cycle", $data);
        }
    }

    function ajouter_local() 
    {
        $data['localInfo'] = '';
        $data['localInfo'] = $this->admin_modele->get_local_information();
        $data['ajouter'] = 'ajouter';
        $this->load->view('administrateur/get_local', $data);
    }
    
    
    function ajouter_local_succe() 
    {
        $data = array();
        $this->form_validation->set_rules('sigleLocal', 'sigleLocal', 'required|max_length[10]|alpha_dash');
        $this->form_validation->set_rules('descriptions', 'description', 'required');
        if ($this->form_validation->run()) 
        {
            $data['retour'] = $this->admin_modele->ajouter_local(strtoupper($_POST['sigleLocal']), ($_POST['descriptions']));

            if ($data['retour'] == TRUE) 
            {
                $data['typeBox'] = 'valid_box';
                $data['informations'] = 'Le local <b>'.strtoupper($_POST['sigleLocal']).'</b> a été ajouté avec succès.';
                $data['local'] = 'local';
                $this->load->view('administrateur/modification_confirme', $data);
            } 
            else 
            {
                $data['typeBox'] = 'error_box';
                $data['informations'] = 'Le local <b>'.strtoupper($_POST['sigleLocal']). ' </b>existe déjà. ';
                $data['local'] = 'local';
                $this->load->view('administrateur/modification_confirme', $data);
            }
        }
        else
        {
            $this->ajouter_local();
        }
    }

    /*
     * fonction qui load la vue de formulaire pour ajouter un cycle. N'est plus utilisée depuis 2.2.1.
     */

    public function ajouter_cycle() 
    {
        $data = $this->admin_modele->get_cycle_information();
        $data['cycleInfo'] = $data;
        $this->load->view('administrateur/ajouter_cycle', $data);
    }

    /*
     * fonction qui affiche un message de succès lors de l'ajout d'un cycle dans la base de données
     N'est plus utilisée depuis 2.2.1.
	 */

    public function ajouter_cycle_succe() 
    {
        $this->form_validation->set_rules('nbreCredits', 'nombre de crédits', 'numeric|required');
        $this->form_validation->set_rules('nomCycle', 'nomCycle', 'required');
        $data = '';
        if ($this->form_validation->run()) 
        {
            $data['typeBox'] = 'valid_box';
            $data['informations'] = 'le cycle  <b>'.$this->input->post('nomCycle').'</b> a été ajouté avec succès.';
            $informations = $this->admin_modele->ajouter_cycle($this->input->post('nomCycle'), $this->input->post('nbreCredits'));
            if ($informations) 
            {
                $this->load->view('administrateur/modification_confirme', $data);
            } 
            else 
            {
                $data['typeBox'] = 'error_box';
                $data['informations'] = 'Ce cycle existe déjà. ';
                $this->load->view('administrateur/modification_confirme', $data);
            }
        } 
        else 
        {
            $this->ajouter_cycle();
        }
    }

    /*
     * fonction qui affiche la vue de tous les cycles qui existent pour les supprimer en cliquant 
      N'est plus utilisée depuis 2.2.1.
	 */

    public function supprimer_cycle() 
    {
        $tables = array("cycle");
        $join_keys = null;
        $db_columns = array('nom', 'nbCredits','idCycle');
        $grid_columns = array('Nom Cycle', 'Nombre de crédits','Id Cycle');
        $action = 'supprimer_cycle_action';
        $id_action = 'idCycle';
        $result = $this->search_modele->getSearchResult($tables, $db_columns, $grid_columns, $join_keys, $action, $id_action);
        $titre = 'Supprimer un cycle ';
        $controlleur = "administrateur";
        $confirmation = 'Êtes-vous sûr de vouloir supprimer le cycle ?';
        $data = array('titre' => $titre, 'controlleur' => $controlleur, 'result' => $result, 'confirmation' => $confirmation);
        $this->load->view("recherche_parametree", $data);
    }

    /*
     * fonction qui supprime un cycle sélectionné. N'est plus utilisée depuis 2.2.1.
     */

    public function supprimer_cycle_action($idCycle) 
    {
        $validation = $this->admin_modele->delete_cycle($idCycle);

        if (is_array($validation)) 
        {
            switch ($validation['deleted']) 
            {
                case true:
                    $typeBox = "valid_box";
                    break;
                case false:
                    $typeBox = "error_box";
                    break;
            }
        }
        $data = array('typeBox' => $typeBox, 'informations' => $validation['msg']);
        $this->load->view('administrateur/modification_confirme', $data);
    }

    /*
     * fonction qui cherche les information du département de la base de données et load la vue
     * pour afficher toutes les informations des départements
     */

    public function get_departement() 
    {
        $data = $this->admin_modele->get_departement_information();
        $data['departementInfo'] = $data;
        $this->load->view('administrateur/get_departement', $data);
    }

    /*
     * fonction qui ajoute un département
     */

    public function ajouter_departement() 
    {
        $data = $this->admin_modele->get_departement_information();
        $data['departementInfo'] = $data;
        $data['errorInfo'] = '';
        $this->load->view('administrateur/ajouter_departement', $data);
    }

    /*
     * fonction qui valide ou non l'ajout d'un département
     */

    public function ajouter_departement_succe() 
    {
        $this->form_validation->set_rules('idDepartement', 'idDepartement', 'max_length[7]|required');
        $this->form_validation->set_rules('nom', 'nom', 'required');
        $this->form_validation->set_rules('description', 'description', 'required');
        
        if ($this->form_validation->run()) 
        {
            $data['informations'] = 'Le département  <b>'.strtoupper($this->input->post('idDepartement')).' </b> a été ajouté avec succès.';
            $info = $this->admin_modele->ajouter_departement(strtoupper($this->input->post('idDepartement')), $this->input->post('nom'), $this->input->post('description'));
            if ($info == 'true') 
            {
                $data['typeBox'] = 'valid_box';
                $this->load->view('administrateur/modification_confirme', $data);
            } 
            else if ($info == 'false') 
            {
                $data = $this->admin_modele->get_departement_information();
                $data['departementInfo'] = $data;
                $data['errorInfo'] = '<div class="error_box">
                    Le nom ou le Id existe déjà.
                            </div>';
                $this->load->view('administrateur/ajouter_departement', $data);
            }
        } 
        else 
        {
            $this->ajouter_departement();
        }
    }

    /*
     * fonction qui load la vue de la recherche parametrée pour afficher le département qu'on veut modifier
     */

    public function modifier_departement() 
    {
        $tables = array("departement");
        $join_keys = null;
        $db_columns = array('idDepartement', 'nom', 'description');
        $grid_columns = array('Id Département', 'Nom du département', 'Description');
        $action = 'modifier_departement_action';
        $id_action = 'idDepartement';
        $result = $this->search_modele->getSearchResult($tables, $db_columns, $grid_columns, $join_keys, $action, $id_action);
        $titre = 'Modifier un département ';
        $controlleur = "administrateur";
        $data = array('titre' => $titre, 'controlleur' => $controlleur, 'result' => $result);
        $this->load->view("recherche_parametree", $data);
    }

    /*
     * fonction qui valide la modification des départements 
     */

    public function modifier_departement_action($idDepartement) 
    {
        $this->form_validation->set_rules('nom', 'nom', 'required');
        $this->form_validation->set_rules('description', 'description', 'required');
        if ($this->form_validation->run()) 
        {
            $this->admin_modele->modifier_departement($idDepartement, $this->input->post('nom'), $this->input->post('description'));
            $data['typeBox'] = 'valid_box';
            $data['informations'] = 'Le département a bien été modifié ';
            $this->load->view('administrateur/modification_confirme', $data);
        } 
        else 
        {
            $information = $this->admin_modele->get_departement_information_id($idDepartement);
            $data['departementInfo'] = $information;
            $data['idDepartement'] = $idDepartement;
            $this->load->view("administrateur/modifier_departement", $data);
        }
    }

    /*
     * fonction qui affiche touts les departements afin de les supprimer en cliquant 
     */

    public function supprimer_departement() 
    {
        $tables = array("departement");
        $join_keys = null;
        $db_columns = array('idDepartement', 'nom', 'description');
        $grid_columns = array('Id Département', 'Nom du département', 'Description');
        $action = 'supprimer_departement_action';
        $id_action = 'idDepartement';
        $result = $this->search_modele->getSearchResult($tables, $db_columns, $grid_columns, $join_keys, $action, $id_action);
        $titre = 'Supprimer un département ';
        $controlleur = "administrateur";
       $confirmation = 'Êtes-vous sûr de vouloir supprimer le département ?';
        $data = array('titre' => $titre, 'controlleur' => $controlleur, 'result' => $result, 'confirmation' => $confirmation);
        $this->load->view("recherche_parametree", $data);
    }

    /*
     * fonction qui supprime un département 
     */

    public function supprimer_departement_action($idDepartement) 
    {
        $validation = $this->admin_modele->delete_departement($idDepartement);

        if (is_array($validation)) {
            switch ($validation['deleted']) {
                case true:
                    $typeBox = "valid_box";
                    break;
                case false:
                    $typeBox = "error_box";
                    break;
            }
        }
        $data = array('typeBox' => $typeBox, 'informations' => $validation['msg']);
        $this->load->view('administrateur/modification_confirme', $data);
    }

    /*
     * fonction qui affiche tous les étudiant existants
     */

    public function reinitialiser_etudiant() 
    {
        $tables = array("etudiant");
        $join_keys = null;
        $db_columns = array('matriculeEtudiant', 'nom', 'prenom', 'login');
        $grid_columns = array('Matricule Étudiant', 'Nom ', 'Prénom', 'Code d\'accès');
        $action = 'reinitialiser_etudiant_action';
        $id_action = 'matriculeEtudiant';
        $where = "WHERE actif = 1";
        $result = $this->search_modele->getSearchResult($tables, $db_columns, $grid_columns, $join_keys, $action, $id_action,$where);

        $titre = 'Réinitialiser le mot de passe d\'un étudiant actif';
        $controlleur = "administrateur";
        $confirmation = 'Êtes-vous sûr de vouloir réinitialiser le mot de passe?';
        $data = array('titre' => $titre, 'controlleur' => $controlleur, 'result' => $result, 'confirmation' => $confirmation);
        $this->load->view("recherche_parametree", $data);
    }

    /*
     * fonction qui réinitialise le mot de passe d'un etudiant
     */

    public function reinitialiser_etudiant_action($matricule) 
    {
        $newPassword = $this->admin_modele->reinitialiser_password_etudiant($matricule);
        $data['typeBox'] = 'valid_box';
        $data['informations'] = 'Le mot de passe a été réinitialisé avec succès: <span style="font-size:20px;font-weight:bold;">' . $newPassword['pass'].'</span>';
        $this->load->view('administrateur/modification_confirme', $data);
    }

    /*
     * fonction qui affiche tous les employés actifs existants afin de réinitialiser leurs mot de passe .
     * 
     */

    public function reinitialiser_employe() 
    {
        $tables = array("employe");
        $join_keys = null;
        $db_columns = array('matriculeEmploye', 'nom', 'prenom', 'login');
        $grid_columns = array('Matricule Employé', 'Nom ', 'Prénom', 'Code d\'accès');
        $action = 'reinitialiser_employe_action';
        $id_action = 'matriculeEmploye';
        $where = "WHERE actif = 1";
        $result = $this->search_modele->getSearchResult($tables, $db_columns, $grid_columns, $join_keys, $action, $id_action,$where);

        $titre = 'Réinitialisation du mot de passe d\'un employé actif ';
        $controlleur = "administrateur";
        $confirmation = 'Êtes-vous sûr de vouloir réinitialiser le mot de passe?';

        $data = array('titre' => $titre, 'controlleur' => $controlleur, 'result' => $result, 'confirmation' => $confirmation);

        $this->load->view("recherche_parametree", $data);
    }

    /*
     * fonction qui réinitialise le mot de passe d'un employé
     */

    public function reinitialiser_employe_action($matricule) 
    {
        $newPassword = $this->admin_modele->reinitialiser_password_employe($matricule);
        $data['typeBox'] = 'valid_box';
        $data['informations'] = 'Le mot de passe de l\'employé <b>'.$matricule.'</b> a été réinitialisé avec succès : <span style="font-size:20px;font-weight:bold;">' . $newPassword['pass'].'</span>';
        $this->load->view('administrateur/modification_confirme', $data);
    }
                
    /*
     * fonction qui affiche tous les programme afin de les  modifier en cliquant
     */

    public function modifier_programme() 
    {
        $tables = array("programme", "cycle");
        $join_keys = array("programme.idCycle = cycle.idCycle");
        $db_columns = array('idProgramme', 'programme.nom as nomProg ', 'description', 'programme.nbCredits as nbCr', 'cycle.nom as nomCycle');
        $grid_columns = array('Id Programme', 'Nom du programme', 'Description', 'Nombre de crédits', 'Cycle');
        $result_columns = array('idProgramme', 'nomProg', 'description', 'nbCr', 'nomCycle');
        $action = 'modifier_programme_action';
        $id_action = 'idProgramme';

        $result = $this->search_modele->getSearchResult($tables, $db_columns, $grid_columns, $join_keys, $action, $id_action, '', $result_columns);

        $titre = 'Modifier un programme ';
        $controlleur = "administrateur";
        $data = array('titre' => $titre, 'controlleur' => $controlleur, 'result' => $result);


        $this->load->view("recherche_parametree", $data);
    }

    /*
     * fonction qui valide ou non la modification des programmes
     */

    public function modifier_programme_action($idProgramme) {
        $this->form_validation->set_rules('nbCredits', 'nbCredits', 'numeric|required');
        $this->form_validation->set_rules('nom', 'nom', 'required');
        $this->form_validation->set_rules('description', 'description', 'required');
        if ($this->form_validation->run()) {
            $this->admin_modele->modifier_programme($idProgramme, $this->input->post('nom'), $this->input->post('description'), $this->input->post('nbCredits'), $this->input->post('cycle'));
            $data['typeBox'] = 'valid_box';
            $data['informations'] = 'Le programme a bien été modifié.';
            $this->load->view('administrateur/modification_confirme', $data);
        } else {

            $information = $this->admin_modele->get_programme_information_id($idProgramme);
            $data['cycle'] = $this->admin_modele->get_cycle();
            $data['programmeInfo'] = $information;
            $data['idProgramme'] = $idProgramme;
            $this->load->view("administrateur/modifier_programme", $data);
        }
    }

    /*
     * fonction qui affiche tous les programmes afin de les supprimer en cliquant
     */

    public function supprimer_programme() {
        $tables = array("programme", "cycle");
        $join_keys = array("programme.idCycle = cycle.idCycle");
        $db_columns = array('idProgramme', 'programme.nom as nomProg ', 'description', 'programme.nbCredits as nbCr', 'cycle.nom as nomCycle');
        $grid_columns = array('Id Programme', 'Nom du programme', 'Description', 'Nombre de crédits', 'Cycle');
        $result_columns = array('idProgramme', 'nomProg', 'description', 'nbCr', 'nomCycle');
        $action = 'supprimer_programme_action';
        $id_action = 'idProgramme';

        $result = $this->search_modele->getSearchResult($tables, $db_columns, $grid_columns, $join_keys, $action, $id_action, '', $result_columns);

        $titre = 'Supprimer un programme ';
        $controlleur = "administrateur";
        $confirmation = 'Êtes-vous sûr de vouloir supprimer le programme ?';
        $data = array('titre' => $titre, 'controlleur' => $controlleur, 'result' => $result, 'confirmation' => $confirmation);

        $this->load->view("recherche_parametree", $data);
    }

    /*
     * fonction qui supprime un programme
     */

    public function supprimer_programme_action($idProgramme) {

        $validation = $this->admin_modele->delete_programme($idProgramme);

        if (is_array($validation)) {
            switch ($validation['deleted']) {
                case true:
                    $typeBox = "valid_box";
                    break;
                case false:
                    $typeBox = "error_box";
                    break;
            }
        }
        $data = array('typeBox' => $typeBox, 'informations' => $validation['msg']);
        $this->load->view('administrateur/modification_confirme', $data);
    }

    /*
     * fonction qui load la vue de get_programme afin d afficher tous les programmes 
     * pour que l'utilisateur ait une idee comment il doit ajouter un programme
     */

    public function get_programme() 
    {
        $data = $this->admin_modele->get_programme_information();
        $data['programmeInfo'] = $data;
        $this->load->view('administrateur/get_programme', $data);
    }

    /*
     * fonction qui ajoute un programme
     */

    public function ajouter_programme()
    {
        $data = $this->admin_modele->get_programme_information();
        $data['cycle'] = $this->admin_modele->get_cycle();

        $data['programmeInfo'] = $data;
        $data['errorInfo'] = '';
        $this->load->view('administrateur/ajouter_programme', $data);
    }

    function idIsValid($str) 
    {
     return preg_match('/[^A-Za-z0-9.-_]/', $str);
    }
    /*
     * fonction valide ou non l ajout du programme
     */

    public function ajouter_programme_succe() 
    {
        $this->form_validation->set_rules('nbreCredits', 'nombre de crédits', 'numeric|required');
        $this->form_validation->set_rules('idProgramme', 'idProgramme', 'max_length[7]|required');
        $this->form_validation->set_rules('nom', 'Nom', 'required');
        $this->form_validation->set_rules('description', 'description', 'required');
        if ($this->form_validation->run() && $this->idIsValid($_POST['idProgramme'])) 
        {
            $data['typeBox'] = 'valid_box';
            $data['informations'] = 'Le programme <b>'. strtoupper($this->input->post('idProgramme')).'</b> a été ajouté avec succès.';
            $info = $this->admin_modele->ajouter_programme($this->input->post('idProgramme'), $this->input->post('nom'), $this->input->post('description'), $this->input->post('cycle'), $this->input->post('nbreCredits'));

            if ($info == 'true') 
            {
                $this->load->view('administrateur/modification_confirme', $data);
            } 
            else if ($info == 'false') 
            {
                $data = $this->admin_modele->get_programme_information();
                $data['programmeInfo'] = $data;
                $data['cycle'] = $this->admin_modele->get_cycle();
                $data['errorInfo'] = '<div class="error_box">
                    Cet Id est déjà utilisé.
                        </div>';
                $this->load->view('administrateur/ajouter_programme', $data);
            }
        } 
        else 
        {
            $this->ajouter_programme();
        }
    }

    /*
     * fonction qui load la vue de get_grade afin d afficher tous les grades 
     * pour que l'utilisateur ait une idee comment il doit ajouter un grade
     */

    public function get_grade() 
    {
        $data = $this->admin_modele->get_grade_information();
        $data['gradeInfo'] = $data;
        $data['errorInfo'] = '<div class="error_box">
                 Cet Id est déjà utilisé.
                    </div>';
        // $this->load->view('administrateur/get_grade', $data); Modif 2.2.1
		$this->load->view('administrateur/consulter_grades', $data);
    }

    /*
     * fonction qui ajoute un grade. N'est plus utilisée depuis 2.2.1.
     */

    public function ajouter_grade() // N'est plus utilisée depuis 2.2.1.
    {
        $data = $this->admin_modele->get_grade_information();
        $data['gradeInfo'] = $data;
        $data['errorInfo'] = '';
        $this->load->view('administrateur/ajouter_grade', $data);
    }

    /*
     * fonction valide ou non l ajout du grade. N'est plus utilisée depuis 2.2.1.
     */

    public function ajouter_grade_succe() // N'est plus utilisée depuis 2.2.1.
    {

        $this->form_validation->set_rules('nbreCredits', 'le nombre de crédits', 'numeric|required');
        $this->form_validation->set_rules('idGrade', ' grade', 'required|max_length[10]|xss_clean');
        if ($this->form_validation->run() && $this->idIsValid($_POST['idGrade'])) 
        {
            $data['typeBox'] = 'valid_box';
            $data['informations'] = 'Le grade <b>'.$this->input->post('idGrade').'</b> a été ajouté avec succès.';

            $info = $this->admin_modele->ajouter_grade($this->input->post('idGrade'), $this->input->post('nbreCredits'));

            if ($info == 'true') 
            {
                $this->load->view('administrateur/modification_confirme', $data);
            } 
            else if ($info == 'false') 
            {
                $data = $this->admin_modele->get_grade_information();
                $data['departementInfo'] = $data;
                $data['errorInfo'] = '<div class="error_box">
                        Cet Id est déjà utilisé.
                            </div>';
                $this->load->view('administrateur/ajouter_grade', $data);
            }
        } 
        else 
        {
            $this->ajouter_grade();
        }
    }

    /*
     * fonction qui affiche tous les grades afin de les modifier en cliquant. N'est plus utilisée depuis 2.2.1.
     */

    public function modifier_grade() { 
        $tables = array("grade");
        $join_keys = null;
        $db_columns = array('idGrade', 'nbCredits');
        $grid_columns = array('Grade', 'Nombre de crédits');
        $action = 'modifier_grade_action';
        $id_action = 'idGrade';

        $result = $this->search_modele->getSearchResult($tables, $db_columns, $grid_columns, $join_keys, $action, $id_action);

        $titre = 'Modifier un grade ';
        $controlleur = "administrateur";
        $data = array('titre' => $titre, 'controlleur' => $controlleur, 'result' => $result);


        $this->load->view("recherche_parametree", $data);
    }

    public function modifier_grade_action($idGrade) // N'est plus utilisée depuis 2.2.1.
    {
        $this->form_validation->set_rules('nbCredits', 'nbCredits', 'numeric|required');
        if ($this->form_validation->run()) 
        {
            $this->admin_modele->modifier_grade($idGrade, $this->input->post('nbCredits'));
            $data['typeBox'] = 'valid_box';
            $data['informations'] = 'Le grade <b>'.$idGrade.'</b> a bien été modifié.';
            $this->load->view('administrateur/modification_confirme', $data);
        } 
        else 
        {
            $information = $this->admin_modele->get_grade_information_id($idGrade);
            $data['gradeInfo'] = $information;
            $data['idGrade'] = $idGrade;
            $this->load->view("administrateur/modifier_grade", $data);
        }
    }

    public function supprimer_grade() { // N'est plus utilisée depuis 2.2.1.
        $tables = array("grade");
        $join_keys = null;
        $db_columns = array('idGrade', 'nbCredits');
        $grid_columns = array('Grade', 'Nombre de crédits');
        $action = 'supprimer_grade_action';
        $id_action = 'idGrade';

        $result = $this->search_modele->getSearchResult($tables, $db_columns, $grid_columns, $join_keys, $action, $id_action);

        $titre = 'Supprimer un grade ';
        $controlleur = "administrateur";
         $confirmation = 'Êtes-vous sûr de vouloir supprimer le grade ?';
        $data = array('titre' => $titre, 'controlleur' => $controlleur, 'result' => $result, 'confirmation' => $confirmation);


        $this->load->view("recherche_parametree", $data);
    }

    public function supprimer_grade_action($idGrade) {// N'est plus utilisée depuis 2.2.1.

        $validation = $this->admin_modele->delete_grade($idGrade);

        if (is_array($validation)) {
            switch ($validation['deleted']) {
                case true:
                    $typeBox = "valid_box";
                    break;
                case false:
                    $typeBox = "error_box";
                    break;
            }
        }
        $data = array('typeBox' => $typeBox, 'informations' => $validation['msg']);
        $this->load->view('administrateur/modification_confirme', $data);
    }

    public function supprimer_local() {
        $tables = array("local");
        $join_keys = null;
        $db_columns = array('idLocal', 'description');
        $grid_columns = array('Local', 'Description');
        $action = 'supprimer_local_action';
        $id_action = 'idLocal';

        $result = $this->search_modele->getSearchResult($tables, $db_columns, $grid_columns, $join_keys, $action, $id_action);

        $titre = 'Supprimer un local ';
        $controlleur = "administrateur";
       $confirmation = 'Êtes-vous sûr de vouloir supprimer le local ?';
        $data = array('titre' => $titre, 'controlleur' => $controlleur, 'result' => $result, 'confirmation' => $confirmation);
        $this->load->view("recherche_parametree", $data);
    }

    public function supprimer_local_action($idLocal) {

        $validation = $this->admin_modele->delete_local($idLocal);

        if (is_array($validation)) {
            switch ($validation['deleted']) {
                case true:
                    $typeBox = "valid_box";
                    break;
                case false:
                    $typeBox = "error_box";
                    break;
            }
        }
        $data = array('typeBox' => $typeBox, 'informations' => $validation['msg']);
        $this->load->view('administrateur/modification_confirme', $data);
    }
    /*
     * fonction pour creer un employe
     * appelée par la vue creer_employe
     */
    public function creer_employe() 
    {
        $this->form_validation->set_rules('lastName', 'Nom', 'required');
        $this->form_validation->set_rules('firstName', 'Prénom', 'required');
        $this->form_validation->set_rules('email', 'E-mail', 'valid_email');
        if ($this->form_validation->run()) 
        { 
            //on teste si le profil n est pas choisi si c est le cas on retourne un message de retour
            if (!isset($_POST['enseignant']) && !isset($_POST['secretaire']) && !isset($_POST['chef_departement']) && !isset($_POST['administrateur']) && !isset($_POST['scolarite']) && !isset($_POST['agent'])) 
            {
                $data['bouttonRetour'] = 'retour';
                $data['typeBox'] = 'error_box';
                $data['informations'] = 'Veuillez cocher le profil du nouvel employé';
                $this->load->view('administrateur/profilsManquant', $data);
            } 
            elseif(isset($_POST['chef_departement']))
            {
                $existChef = $this->admin_modele->exist_chef_departement($_POST['departement']);
                if(!$existChef)
                {
                    $combinaison_valide = $this->valider_creation_employe($_POST['chef_departement'],
                            $_POST['departement']);
                    if($combinaison_valide != NULL)
                    {
                        $data['bouttonRetour'] = 'retour';
                        $data['typeBox'] = 'error_box';
                        $data['informations'] = $combinaison_valide;
                        $this->load->view('administrateur/profilsManquant', $data);
                    }
                    else 
                    {
                        $login = $this->admin_modele->generer_login_employe($this->input->post('firstName'), $this->input->post('lastName'));
                        $pass = $this->admin_modele->generer_mdp();
                            $idProfil='';
                        if (isset($_POST['enseignant']))
                            $idProfil .= $this->input->post('enseignant') . ",";
                        if (isset($_POST['secretaire']))
                            $idProfil .= $this->input->post('secretaire') . ",";
                        if (isset($_POST['chef_departement']))
                            $idProfil .= $this->input->post('chef_departement') . ",";
                        if (isset($_POST['administrateur']))
                            $idProfil .= $this->input->post('administrateur') . ",";
                        if (isset($_POST['scolarite']))
                            $idProfil .= $this->input->post('scolarite') . ",";
                        if (isset($_POST['agent']))
                            $idProfil .= $this->input->post('agent') . ",";

                        $idProfil = substr($idProfil, 0, strlen($idProfil) - 1);

                        $_POST['idProfil'] = $idProfil;
                        $matricule = $this->admin_modele->creer_employe($_POST,$login,$pass);
                        $data = array('login' => $login, 'password' => $pass, 'matricule' => $matricule);
                        $data['typeBox'] = 'valid_box';
                        $data['creerEmploye'] = 'true';
                        $data['informations'] = 'L\'employé a été ajouté avec succès, son matricule est  <b>'.$matricule.'</b>';
                        $this->load->view('administrateur/modification_confirme', $data);
                    }
                }
                else 
                {
                    $data['bouttonRetour'] = 'retour';
                    $data['typeBox'] = 'error_box';
                    $data['informations'] = $existChef['prenom'].' '.$existChef['nom'].' ('.$existChef['matricule'].') est déjà chef de département de '.$existChef['departement'];
                    $this->load->view('administrateur/profilsManquant', $data);
                }
                //check si un employe chef de departement existe deja
              
            }
            //si c'est bien et tout est rempli comme il faut on passe a la page 2 
            //On load la vue generer_infos (page 2) pour afficher le login genere et le mot de passe .
            else 
            {  
                $login = $this->admin_modele->generer_login_employe($this->input->post('firstName'), $this->input->post('lastName'));
                $pass = $this->admin_modele->generer_mdp();
                      $idProfil='';
                    if (isset($_POST['enseignant']))
                    {
                        $combinaison_valide = $this->valider_creation_employe($_POST['enseignant'],
                            $_POST['departement']);
                        if($combinaison_valide != NULL)
                        {
                            $data['bouttonRetour'] = 'retour';
                            $data['typeBox'] = 'error_box';
                            $data['informations'] = $combinaison_valide;
                            $this->load->view('administrateur/profilsManquant', $data);
                            return;
                        }
                        else 
                        {
                            $idProfil .= $this->input->post('enseignant') . ",";
                        }
                    }
                    if (isset($_POST['secretaire']))
                    {
                        $combinaison_valide = $this->valider_creation_employe($_POST['secretaire'],
                            $_POST['departement']);
                        if($combinaison_valide != NULL)
                        {
                            $data['bouttonRetour'] = 'retour';
                            $data['typeBox'] = 'error_box';
                            $data['informations'] = $combinaison_valide;
                            $this->load->view('administrateur/profilsManquant', $data);
                            return;
                        }
                        else 
                        {
                            $idProfil .= $this->input->post('secretaire') . ",";
                        }
                    }
                     if (isset($_POST['agent']))
                    {
                        $combinaison_valide = $this->valider_creation_employe($_POST['agent'],
                            $_POST['departement']);
                        if($combinaison_valide != NULL)
                        {
                            $data['bouttonRetour'] = 'retour';
                            $data['typeBox'] = 'error_box';
                            $data['informations'] = $combinaison_valide;
                            $this->load->view('administrateur/profilsManquant', $data);
                            return;
                        }
                        else 
                        {
                            $idProfil .= $this->input->post('agent') . ",";
                        }
                    }
                    if (isset($_POST['chef_departement']))
                        $idProfil .= $this->input->post('chef_departement') . ",";
                    if (isset($_POST['administrateur']))
                    {
                        $combinaison_valide = $this->valider_creation_employe($_POST['administrateur'],
                            $_POST['departement']);
                        if($combinaison_valide != NULL)
                        {
                            $data['bouttonRetour'] = 'retour';
                            $data['typeBox'] = 'error_box';
                            $data['informations'] = $combinaison_valide;
                            $this->load->view('administrateur/profilsManquant', $data);
                            return;
                        }
                        else 
                        {
                            $idProfil .= $this->input->post('administrateur') . ",";
                        }
                    }
                    if (isset($_POST['scolarite']))
                    {
                        $combinaison_valide = $this->valider_creation_employe($_POST['scolarite'],
                            $_POST['departement']);
                        if($combinaison_valide != NULL)
                        {
                            $data['bouttonRetour'] = 'retour';
                            $data['typeBox'] = 'error_box';
                            $data['informations'] = $combinaison_valide;
                            $this->load->view('administrateur/profilsManquant', $data);
                            return;
                        }
                        else 
                        {
                            $idProfil .= $this->input->post('scolarite') . ",";
                        }
                    }

                    $idProfil = substr($idProfil, 0, strlen($idProfil) - 1);

                    $_POST['idProfil'] = $idProfil;
                    $matricule = $this->admin_modele->creer_employe($_POST,$login,$pass);
                    $data = array('login' => $login, 'password' => $pass, 'matricule' => $matricule);
                    $data['creerEmploye'] = 'true';
                    $data['typeBox'] = 'valid_box';
                    $data['informations'] = 'L\'employé a été ajouté avec succès, son matricule est  <b>'.$matricule.'</b>';
                    $this->load->view('administrateur/modification_confirme', $data);
            }
        } 
        else 
        {
            $idDepartement = $this->admin_modele->recuperer_departements();
            $grade = $this->admin_modele->get_grade_ens();
            $data['grade']=$grade;
            $data['idDep'] = $idDepartement['idDepartement'];
            $data['nomDep'] = $idDepartement['nomDep'];
            $this->load->view("administrateur/creer_employe", $data);
        }
    }
    /*
     * fonction pour valider les departements lors de la creation des employes
     */
    function valider_creation_employe($profil,$departement)
    {
        $messageErreur ='';
        if($profil == 'administrateur'|| $profil == 'scolarite' || $profil == 'secretaire' || $profil == 'agent')
        {
            if($departement != 'DPT-SRV')
            {
                $messageErreur = 'Un employé de la Scolarité, un secrétaire
                    ou un agent ou un administrateur doit être inscrit dans
                    le Service administratif.';
            }
            
        }
        elseif($profil == 'professeur' || $profil == 'chef_departement')
        {
            if($departement == 'DPT-SRV')
            {
                $messageErreur = 'Un Enseignant ou un Chef de 
                    département doit être lié à un département d\'enseignement.';
            }
        }
        return $messageErreur;
    }
    
    /*
     * fonction qui regenere le mot de passe
     */
        function regenerer_password()
        {
            
             $pass = $this->admin_modele->generer_mdp();
             $data = array('login' => $_POST['login'] ,'password' => $pass, 'infos_perso' => $_POST);
             $this->load->view('administrateur/generer_infos', $data);
        }
        
        /*
         * fonction pour activer ou desactiver l'envoi d'email
         */

        function activer_email()
        {
            $activation = $this->admin_modele->line_exist();
            if($activation == FALSE)
            {
                 $data['typeBox'] = 'warning_box';
                 $data['informations'] = 'Il faut ajouter au moins un e-mail.';
                 $this->load->view('administrateur/modification_confirme', $data);
            }
            else
            {
                if( $this->admin_modele->isActif() == TRUE)
                    $info['isActive'] = 1;
                else
                   $info['isActive'] = 0; 
                $this->load->view('administrateur/activer_envoie_email',$info);
            }
                
        }
        function valider_activation_monitoring()
        {
            $this->admin_modele->activation_monitoring($_POST['monitoring']);
            if($_POST['monitoring'] == 'inactif')
            {
                $data['informations'] = 'Le contrôle des notes est désactivé.';
            }
            else
            {
                $data['informations'] = 'Le contrôle des notes est activé.';
            }
            $data['typeBox'] = 'valid_box';
            $this->load->view('administrateur/modification_confirme', $data);
        }
        
        function ajouter_email()
        {
            $data['personneCle'] = $this->admin_modele->get_email_personnecle();
            $this->load->view('administrateur/get_personneCle',$data);
        }
        
        function ajouter_personneCle()
        {
            $data['personneCle'] = $this->admin_modele->get_email_personnecle();
            $this->load->view('administrateur/ajouter_personneCle',$data);
        }
        function enregistrer_email()
        {
            $this->form_validation->set_rules('email', 'E-mail', 'valid_email');
            if ($this->form_validation->run()) 
            {
                if($this->admin_modele->ajouter_une_personnecle($_POST['email']))
                {
                    $data['typeBox'] = 'valid_box';
                    $data['informations'] = 'E-mail enregistré : par défaut, l\'envoi est inactif pour cette personne clé.<br>Pour l\'activer, il suffit de valider le contrôle des notes.';
                    $this->load->view('administrateur/modification_confirme', $data);
                }
                else
                {
                    $data['typeBox'] = 'error_box';
                    $data['informations'] = 'il y a déjà 10 personnes qui reçoivent des e-mails.';
                    $this->load->view('administrateur/modification_confirme', $data);
                } 
            }
            else
            {
                 $data['typeBox'] = 'error_box';
                    $data['informations'] = 'E-mail invalide.';
                    $this->load->view('administrateur/modification_confirme', $data);
            }
            
        }
        
         /*
     * fonction qui affiche la vue de tous les cycles qui existent pour les supprimer en cliquant 
     */

    function supprimer_personneCle() 
    {
       
        $data['personneCle'] = $this->admin_modele->get_email_personnecle();
         $this->load->view('administrateur/supprimer_personneCle', $data);

    }
    
	    function supprimer_personneCle_action() 
    {
        $tableEmailPersonneCle ='';
        $tableEmailPersonneCle = $this->admin_modele->get_email_personnecle();
        
        $tableAsupprimer = '';
        if (isset($_POST['items']))
        {
            $tableauEmailASupprimer = array_keys($_POST['items'], 'on');
            $counter = 0;
            for($i=0 ;$i<count($tableEmailPersonneCle);$i=$i+2)
            {
                if(in_array($i,$tableauEmailASupprimer))
                {
                    $tableAsupprimer[$counter] = $tableEmailPersonneCle[$i];
                    $counter++;
                }
            }
            $messageInformations ='';
            for($i=0 ;$i<count($tableAsupprimer);$i++)
            {
            $messageInformations .= '<b>'.$tableAsupprimer[$i].'</b></br>';
            }
            $this->admin_modele->supprimer_personneCle($tableAsupprimer);
            $data['typeBox'] = 'valid_box';
            $data['informations'] = 'Les e-mails suivants :</br>'.$messageInformations . 'ont été 
                retirés de la liste des personnes-clés.';
            $this->load->view('administrateur/modification_confirme', $data);
        }
        else
        {
            $data['typeBox'] = 'error_box';
            $data['informations'] = 'Il faut sélectionner au moins un e-mail !';
            $this->load->view('administrateur/modification_confirme', $data);
        }
    }


    function supprimer_personneCle_action_ancien() 
    {
        $tableEmailPersonneCle ='';
        $tableEmailPersonneCle = $this->admin_modele->get_email_personnecle();
        
        $tableAsupprimer = '';
        $tableauEmailASupprimer = array_keys($_POST['items'], 'on');
        
        $counter = 0;
        for($i=0 ;$i<count($tableEmailPersonneCle);$i=$i+2)
        {
            if(in_array($i,$tableauEmailASupprimer))
            {
                $tableAsupprimer[$counter] = $tableEmailPersonneCle[$i];
                $counter++;
            }
           
        }
        $messageInformations ='';
        for($i=0 ;$i<count($tableAsupprimer);$i++)
        {
           $messageInformations .= '<b>'.$tableAsupprimer[$i].'</b></br>';
           
        }
        
        $this->admin_modele->supprimer_personneCle($tableAsupprimer);
        $data['typeBox'] = 'valid_box';
        $data['informations'] = 'Les e-mails suivants :</br>'.$messageInformations . 'ont été 
            retirés de la liste des personnes-clés.';
        $this->load->view('administrateur/modification_confirme', $data);
    }
    /*
     * recherche employe
     */

    function modifier_info_personnelle() 
    {
        $tables = array("employe");
        $join_keys = null;

        $db_columns = array('matriculeEmploye', 'nom', 'prenom', "case when actif = 1 then 'O' when actif = 0 then 'N' end as actif ");
        $result_columns = array('matriculeEmploye', 'nom', 'prenom',"actif");
        $grid_columns = array('Matricule', 'Nom', 'Prénom', 'Actif ?');
        $action = 'modifier_info_perso';
        $id_action = 'matriculeEmploye';

        $result = $this->search_modele->getSearchResult($tables, $db_columns, $grid_columns, $join_keys, $action, $id_action,'',$result_columns);

        $titre = 'Modifier les informations de l\'employé ';
        $controlleur = "administrateur";
        $data = array('titre' => $titre, 'controlleur' => $controlleur, 'result' => $result);


        $this->load->view("recherche_parametree", $data);
    }
    
       /*
     * fonction pour savoir si l'annee est bissextile ou non
     * If Mod(An,400)= 0  then Bissextile = True
      else	if Mod(An,100) = 0 then Bissextile = False
      else	if Mod(An,4) = 0 then Bissextile = True
      else Bissextile = False.

     */

    function bissextile($annee) {
        $bissextile = FALSE;
        if (($annee % 400) == 0) {
            $bissextile = TRUE;
        } elseif (($annee % 100) == 0) {
            $bissextile = FALSE;
        } elseif (($annee % 4) == 0) {
            $bissextile = TRUE;
        } else {
            $bissextile = FALSE;
        }
        return $bissextile;
    }
    
    function valider_mois_jours($mois,$jour,$annee)
    {
        $messageRetour = '';
         $jourDeChaqueMois = array(31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
         if ($mois < 13) {
            if ($jour > $jourDeChaqueMois[$mois - 1]) {
                $messageRetour = 'Date invalide <b>' . $mois . '</b> est un
                    mois de <b>' . $jourDeChaqueMois[$mois - 1] . '</b> jours';
            }
        }
        if ($mois == 2 && ($this->bissextile($annee) == FALSE) && $jour > 28) {
            $messageRetour = 'Date invalide : <b>' . $annee . '</b> n\'est
                pas bissextile, il n\'y a que 28 jours en février de l\'année
                <b>' . $annee . '</b>';
        }
        
        return $messageRetour;
    }
    
    function valider_semestre_courant($annee,$semestre,$dateDebut,$dateFin)
    {
        $jourDebut = substr($dateDebut, 0, 2);
        $jourFin = substr($dateFin, 0, 2);
        $moisDebut = substr($dateDebut, 3, 2);
        $moisFin = substr($dateFin, 3,2);
        $anneeFin = substr($dateFin, 6,4);
        $anneeDebut = substr($dateDebut, 6,4);
        $validerDateDebut = $this->valider_mois_jours($moisDebut,$jourDebut,$anneeDebut);
        $validerDateFin = $this->valider_mois_jours($moisFin,$jourFin,$anneeFin);
        if($validerDateDebut == '' && $validerDateFin == '')
        {
            $moisAccepteDebutA = array(9,10,11);
            $moisAccepteDebutE = array(6,7);
            $moisAccepteDebutP = array(1,2,3);
            $moisAccepteFinA = array(1,2,3);
            $moisAccepteFinP = array(5,6,7);
            $moisAccepteFinE = array(9,10,11);
            if($semestre == 3)//automne
            {
                if(($anneeDebut == $annee) && ($anneeFin == $annee+1) && (in_array($moisDebut, $moisAccepteDebutA))
                        && (in_array($moisFin, $moisAccepteFinA)))
                {
                    return '';
                }
                else
                {
                    $messageRetour =  'Un semestre d\'automne ne peut
                        commencer qu\'en septembre, octobre ou novembre et se terminer
                        qu\'en janvier, février ou mars de l\'année suivante.';
                    return $messageRetour;
                }
            }
            elseif($semestre == 2)//ete
            {
                if(($anneeDebut == $annee) && ($anneeFin == $annee)&& 
                        (in_array($moisDebut, $moisAccepteDebutE)) && (in_array($moisFin, $moisAccepteFinE)))
                {
                    return '';
                }
                else
                {
                    $messageRetour = 'Un semestre d\'été ne peut
                        commencer qu\'en juin ou juillet et se terminer
                        en septembre, octobre ou novembre de la même année.';
                    return $messageRetour;
                }
            }
            else//printemps
            {
                if(($anneeDebut == $annee) && ($anneeFin == $annee) &&
                        in_array($moisDebut, $moisAccepteDebutP) && in_array($moisFin, $moisAccepteFinP))
                {
                    return '';
                }
                else
                {
                $messageRetour =  'Un semestre de printemps ne peut
                        commencer qu\'en janvier, février ou mars et se terminer
                        en mai, juin ou juillet de la même année.';
                return $messageRetour;
                }
            }
        }
        else
        {
           return $messageRetour = $validerDateDebut.' '.$validerDateFin;
        }
    }

    /*
     * recherche etudiant 
     */

    function modifier_info_personnelle_etudiant() {
        $tables = array("etudiant");
        $join_keys = null;
        $db_columns = array('matriculeEtudiant', 'nom', 'prenom');
        $grid_columns = array('Matricule', 'Nom', 'Prénom');
        $action = 'modifier_info_etudiant';
        $id_action = 'matriculeEtudiant';

        $result = $this->search_modele->getSearchResult($tables, $db_columns, $grid_columns, $join_keys, $action, $id_action);

        $titre = 'Modifier les informations de l\'étudiant ';
        $controlleur = "administrateur";
        $data = array('titre' => $titre, 'controlleur' => $controlleur, 'result' => $result);
        $this->load->view("recherche_parametree", $data);
    }

    /*
     * recuperer info employe par matricule
     */

    function modifier_info_perso($matricule) 
    {
        $data = $this->admin_modele->get_informations($matricule);
       // print_r($data);
        $idDepartement = $this->admin_modele->recuperer_departements();
            $grade1 = $this->admin_modele->get_grade_ens();
            $data['grade1']=$grade1;
        
        $data['nomDep'] = $this->admin_modele->recuperer_departement($data['idDep']);
        $data['departements'] = $this->admin_modele->recuperer_departements();
        $data['matricule'] = array('matricule' => $matricule);
        
        $this->load->view('administrateur/modifier_profil_employe', $data);
    }

    /*
     * modifie info personnelles de l'étudiant dans la BD  par matricule
     */

    function modifier_info_etudiant($matricule) {

        $data = $this->admin_modele->get_informations_etudiant($matricule);
        $this->load->view('administrateur/modifier_profil_etudiant', $data);
    }

    /*
     * modifie info personnelles de l'employé dans la BD 
     */

    function modifier_information_personnelle() 
    {
        $this->form_validation->set_rules('email', 'E-mail', 'valid_email');
        if ($this->form_validation->run()) 
        {
            if (!isset($_POST['enseignant']) && !isset($_POST['secretaire']) && !isset($_POST['chef_departement']) && !isset($_POST['administrateur']) && !isset($_POST['scolarite'])&& !isset($_POST['agent'])) 
            {
                $data = $this->admin_modele->get_informations($_POST['matricule']);
                $data['nomDep'] = $this->admin_modele->recuperer_departement($data['idDep']);
                $data['departements'] = $this->admin_modele->recuperer_departements();
                $data['matricule'] = array('matricule' => $_POST['matricule']);
                $data['errorMessage'] = '<div class="error_box">Veuillez cocher au moins un profil </div>';

                $this->load->view('administrateur/modifier_profil_employe', $data);
            }
            else
            {
                if(isset($_POST['chef_departement']))
                {
                    $existChef = $this->admin_modele->exist_chef_departement($_POST['departement']);
                    if(!$existChef)
                    {
                         $combinaison_valide = $this->valider_creation_employe($_POST['chef_departement'],
                            $_POST['departement']);
                        if($combinaison_valide != NULL)
                        {
                           $data['typeBox'] = 'error_box';
                            $data['informations'] = $combinaison_valide;
                            $this->load->view('administrateur/valider_info_personnelles', $data);
                        }
                        else
                        {
                            if ($this->admin_modele->modifier_info_employe($_POST))
                            {

                                $data['typeBox'] = 'valid_box';
                                $data['informations'] = 'Les informations de l\'employé <b>'.$_POST['matricule'].'</b> ont été modifiées avec succès.';
                                $this->load->view('administrateur/valider_info_personnelles', $data);
                            } 
                            else 
                            {
                                $data['typeBox'] = 'error_box';
                                $data['informations'] = 'L\'application nécessite au moins un administrateur.';
                                $this->load->view('administrateur/valider_info_personnelles', $data);
                            }
                        }
                    }
                    else
                    {
                        //on teste si l'employe modifie est le chef de departement 
                        if($_POST['matricule'] == $existChef['matricule'])
                        {
                            if ($this->admin_modele->modifier_info_employe($_POST))
                            {

                                $data['typeBox'] = 'valid_box';
                                $data['informations'] = 'Les informations de l\'employé 
                                    <b>'.$_POST['matricule'].'</b> ont été modifiées 
                                        avec succès.';
                                $this->load->view('administrateur/valider_info_personnelles', $data);
                            } 
                            else 
                            {
                                $data['typeBox'] = 'error_box';
                                $data['informations'] = 'L\'application nécessite
                                    au moins un administrateur.';
                                $this->load->view('administrateur/valider_info_personnelles', $data);
                            }
                        }
                        else
                        {
                            $data['typeBox'] = 'error_box';
                            $data['informations'] = $existChef['prenom'].' '.
                                    $existChef['nom'].' ('.$existChef['matricule'].') 
                                        est déjà chef de département de '.
                                    $existChef['departement'];
                            $this->load->view('administrateur/profilsManquant', $data);
                        }
                        
                    }
                }
                else
                {
                    if(isset($_POST['enseignant']))
                    {
                         $combinaison_valide = $this->valider_creation_employe($_POST['enseignant'],
                            $_POST['departement']);
                        if($combinaison_valide != NULL)
                        {
                           $data['typeBox'] = 'error_box';
                            $data['informations'] = $combinaison_valide;
                            $this->load->view('administrateur/valider_info_personnelles', $data);
                            return;
                        }
                    }
                    if(isset($_POST['scolarite']))
                    {
                         $combinaison_valide = $this->valider_creation_employe($_POST['scolarite'],
                            $_POST['departement']);
                        if($combinaison_valide != NULL)
                        {
                           $data['typeBox'] = 'error_box';
                            $data['informations'] = $combinaison_valide;
                            $this->load->view('administrateur/valider_info_personnelles', $data);
                            return;
                        }
                    }
                    if(isset($_POST['administrateur']))
                    {
                         $combinaison_valide = $this->valider_creation_employe($_POST['administrateur'],
                            $_POST['departement']);
                        if($combinaison_valide != NULL)
                        {
                           $data['typeBox'] = 'error_box';
                            $data['informations'] = $combinaison_valide;
                            $this->load->view('administrateur/valider_info_personnelles', $data);
                            return;
                        }
                    }
                    if(isset($_POST['secretaire']))
                    {
                         $combinaison_valide = $this->valider_creation_employe($_POST['secretaire'],
                            $_POST['departement']);
                        if($combinaison_valide != NULL)
                        {
                           $data['typeBox'] = 'error_box';
                            $data['informations'] = $combinaison_valide;
                            $this->load->view('administrateur/valider_info_personnelles', $data);
                            return;
                        }
                    }
                     if(isset($_POST['agent']))
                    {
                         $combinaison_valide = $this->valider_creation_employe($_POST['agent'],
                            $_POST['departement']);
                        if($combinaison_valide != NULL)
                        {
                           $data['typeBox'] = 'error_box';
                            $data['informations'] = $combinaison_valide;
                            $this->load->view('administrateur/valider_info_personnelles', $data);
                            return;
                        }
                    }
                    if ($this->admin_modele->modifier_info_employe($_POST))
                    {
                        $data['typeBox'] = 'valid_box';
                        $data['informations'] = 'Les informations de l\'employé <b>'.$_POST['matricule'].'</b> ont été modifiées avec succès.';
                        $this->load->view('administrateur/valider_info_personnelles', $data);
                    } 
                    else 
                    {
                        $data['typeBox'] = 'error_box';
                        $data['informations'] = 'L\'application nécessite au moins un administrateur.';
                        $this->load->view('administrateur/valider_info_personnelles', $data);
                    }
                }
                
            }
        } 
        else 
        {
            $this->modifier_info_perso($_POST['matricule']);
        }
    }
       /*
     * fonction pour convertir le code du semestre par son nom 
     * elle prend en parametre le numero du semestre soit(1,2,3)
     * et elle retourne le nom (Automne, ete, printemps)
     */
    function get_session_nom($numeroSemestre)
    {
        if($numeroSemestre == 3)
        {
            return 'Automne';
        }
        elseif($numeroSemestre == 2)
        {
            return 'Été';
        }
        else
        {
            return 'Printemps';
        }
    }
    
    /*
     * fonction pour modifier le semestre courant
     */
    
    function modifier_session_courante() 
    {
        $this->form_validation->set_rules('annee', 'Année', 'numeric|required');
        
        if ($this->form_validation->run() ) 
        {
            $validerAnnee = $this->valider_semestre_courant($_POST['annee'],$_POST['session'],
                        $_POST['dateDebut'],$_POST['dateFin']);
            if($validerAnnee == '')
            {
                $info_session = $this->input->post();
                $this->admin_modele->modifier_session_courante($info_session);
                $data['typeBox'] = 'valid_box';
                $data['sessionCourante'] = 'session Courante';
                $data['informations'] = 'Le semestre courant est maintenant <b>'.'  '.$this->get_session_nom($_POST['session']).'  '.$_POST['annee'].' </b><br><br>
                    La date du début des cours est le  <b>'.$_POST['dateDebut'].'</b> <br><br>
                        La date de fin des cours est le  <b>'.$_POST['dateFin'].'</b><br>';
                $this->load->view('administrateur/valider_info_personnelles', $data);
            }
            else
            {
                $data['typeBox'] = 'error_box';
                $data['informations'] = $validerAnnee;
                $this->load->view('administrateur/modification_confirme', $data);
            }
        } 
        else 
        {
            $session_courante = $this->admin_modele->get_session_courante();
            if ($session_courante == NULL) 
            {
                $session_courante['annee'] = 2011;
                $session_courante['semestre'] = '02';
				$session_courante['dateDebut'][0] = '';
				$session_courante['dateFin'][0] = '';
            }
            $this->load->view('administrateur/modifier_session_courante', $session_courante);
        }
    }
     function modifier_session_courante_calendar() 
    {
        $this->form_validation->set_rules('annee', 'Année', 'numeric|required');
        
        if ($this->form_validation->run() ) 
        {
            $validerAnnee = $this->valider_semestre_courant($_POST['annee'],$_POST['session'],
                        $_POST['dateDebut'],$_POST['dateFin']);
            if($validerAnnee == '')
            {
                $info_session = $this->input->post();
                $this->admin_modele->modifier_session_courante_calendar($info_session);
                $data['typeBox'] = 'valid_box';
                $data['sessionCourante'] = 'session Courante';
                $data['informations'] = 'Le semestre courant est maintenant <b>'.'  '.$this->get_session_nom($_POST['session']).'  '.$_POST['annee'].' </b><br><br>
                    La date du début des cours est le  <b>'.$_POST['dateDebut'].'</b> <br><br>
                        La date de fin des cours est le  <b>'.$_POST['dateFin'].'</b><br>';
                $this->load->view('administrateur/valider_info_personnelles', $data);
            }
            else
            {
                $data['typeBox'] = 'error_box';
                $data['informations'] = $validerAnnee;
                $this->load->view('administrateur/modification_confirme', $data);
            }
        } 
        else 
        {
            $session_courante = $this->admin_modele->get_session_courante_calendar();
            if ($session_courante == NULL) 
            {
                $session_courante['annee'] = 2011;
                $session_courante['semestre'] = '02';
				$session_courante['dateDebut'][0] = '';
				$session_courante['dateFin'][0] = '';
            }
            $this->load->view('administrateur/modifier_session_courante_calendar', $session_courante);
        }
    }
        public function creer_ou_reinitialiser_password_modification_note() 
    {
        $tables = array("employe");
        $join_keys = null;
        $db_columns = array('matriculeEmploye', 'nom', 'prenom', 'login');
        $grid_columns = array('Matricule Employé', 'Nom ', 'Prénom', 'Code d\'accès');
        $action = 'creer_ou_reinitialiser_employe_action';
        $id_action = 'matriculeEmploye';
        $where = "WHERE actif = 1";
        $result = $this->search_modele->getSearchResult($tables, $db_columns, $grid_columns, $join_keys, $action, $id_action,$where);

        $titre = 'Creation réinitialisation du mot de passe pour modification des notes ';
        $controlleur = "administrateur";
        $confirmation = 'Êtes-vous sûr de vouloir éffectuer cette  opération?';

        $data = array('titre' => $titre, 'controlleur' => $controlleur, 'result' => $result, 'confirmation' => $confirmation);

        $this->load->view("recherche_parametree", $data);
    }
    
     public function creer_ou_reinitialiser_employe_action($matricule) 
    {
        $newPassword = $this->admin_modele->crer_ou_reinitialiser_password_modification_note($matricule);
        $data['typeBox'] = 'valid_box';
        $data['informations'] = 'Le mot de passe de l\'employé <b>'.$matricule.'</b> a été réinitialisé avec succès : <span style="font-size:20px;font-weight:bold;">' . $newPassword['pass'].'</span>';
        $this->load->view('administrateur/modification_confirme', $data);
    }
    
    /*
        ajouter par: Alioune ZEYN  14/03/2019
     * affichage de l'historique des modifications des parametres generaux
     * modification des parametres generaux
     *      */
     function historique_parametres_genreaux(){
        $data['infos']=(array)$this->admin_modele->get_all_parametres_genreaux();
        $this->load->view('administrateur/historique_parametres_genreaux',$data);
    }
    public function modifier_parametres_genreaux(){
        $data["parametres"]=$this->admin_modele->get_parametres_genreaux();
        //$data["hystorique_parametres"]=(array)$this->admin_modele->get_all_parametres_genreaux();
        //print_r($data["hystorique_parametres"]);
        $this->load->view('administrateur/modifier_parametres_genreaux', $data);
    }
    function authentification_modfication_params_genr($operation){
        $data['operation']=$operation;
        if(isset($_POST['password'])){
            //employe qui peut modifier la note
            $employe=$this->session->userdata('matriculeEmploye');
            $password = $_POST['password'];
            $data['erreur']=1;
            if($this->admin_modele->validation_modification_notes_eliminatoires($employe,$password)){
                $data['erreur']=0;
                if($operation=='modification'){
                    $this->modifier_parametres_genreaux();
                }elseif($operation=='correction'){
                    $this->corriger_parametres_generaux();
                }
            }else{
                $this->load->view('administrateur/authentification_modfication_params_genr',$data);
            }    
        }else
        $this->load->view('administrateur/authentification_modfication_params_genr',$data);
        
        
    }
    public function modification_parametres_generaux(){
        if(isset($_POST['nom'])){
            $infos= $_POST;
            // verification de l'envoi de l'image(logo)
            if(isset($_FILES['logo']['name'])){
                if($_FILES['logo']['name']!=""){
                    // verification de l'existance d'un fichier ayant le meme nom
                    if(file_exists($_SERVER['DOCUMENT_ROOT']."laureat/images/".$_FILES['logo']['name'])){

                    }
                    $config['upload_path']          = './images/';
                    $config['allowed_types']        = 'gif|jpg|png';
                    $config['max_width']            = 1024;
                    $config['max_height']           = 768;

                    $this->load->library('upload', $config);
                    if ( ! $this->upload->do_upload('logo'))
                    {
                        $data['Error']='1';
                        $data['message']=$this->upload->display_errors();
                    }else{
                        $data['Error']='0';
                        $data['message']="Modification effectuée avec succès";
                    }
                } else {
                    
                    $old_logo=(array)$this->admin_modele->get_parametres_genreaux();
                    $infos['logo']=$old_logo['logo'];
                }
                
            }else{
                $old_logo=(array)$this->admin_modele->get_parametres_genreaux();
                $infos['logo']=$old_logo['logo'];
            }
            
            
            
            if(isset($_FILES['logo']['name']))
                $infos["logo"]=$_FILES['logo']['name'];
            $infos["date_fin"]=null;
            //print_r($infos);
            unset($infos['submit']);
            $this->admin_modele->update_parametres_genreaux($infos);
        }
        
        $data["parametres"]=$this->admin_modele->get_parametres_genreaux();
        $this->load->view('administrateur/modifier_parametres_genreaux', $data);
    }
                
    function corriger_parametres_generaux(){
        $data["parametres"]=$this->admin_modele->get_parametres_genreaux();
        $this->load->view('administrateur/corriger_parametres_genreaux', $data);
    }
    function correction_parametres_generaux(){
        if(isset($_POST['nom'])){
            $infos= $_POST;
            // verification de l'envoi de l'image(logo)
            if(isset($_FILES['logo']['name'])){
                if($_FILES['logo']['name']!=""){
                    // verification de l'existance d'un fichier ayant le meme nom
                    if(file_exists($_SERVER['DOCUMENT_ROOT']."laureat/images/".$_FILES['logo']['name'])){

                    }
                    $config['upload_path']          = './images/';
                    $config['allowed_types']        = 'gif|jpg|png';
                    $config['max_width']            = 1024;
                    $config['max_height']           = 768;

                    $this->load->library('upload', $config);
                    if ( ! $this->upload->do_upload('logo'))
                    {
                        $data['Error']='1';
                        $data['message']=$this->upload->display_errors();
                    }else{
                        $data['Error']='0';
                        $data['message']="Correction effectuée avec succès";
                    }
                } else {
                    
                    $old_logo=(array)$this->admin_modele->get_parametres_genreaux();
                    $infos['logo']=$old_logo['logo'];
                }
                
            }else{
                $old_logo=(array)$this->admin_modele->get_parametres_genreaux();
                $infos['logo']=$old_logo['logo'];
            }
            
            
            
            if(isset($_FILES['logo']['name']))
                $infos["logo"]=$_FILES['logo']['name'];
            $infos["date_fin"]=null;
            //print_r($infos);
            unset($infos['submit']);
            $this->admin_modele->update_parametres_genreaux($infos);
        }
        
        $data["parametres"]=$this->admin_modele->get_parametres_genreaux();
        $this->load->view('administrateur/corriger_parametres_genreaux', $data);
    }
    
    
    function authentification_modfication_reg_pass($operation){
        $data['operation']=$operation;
        if(isset($_POST['password'])){
            //employe qui peut modifier la note
            $employe=$this->session->userdata('matriculeEmploye');
            $password = $_POST['password'];
            $data['erreur']=1;
            if($this->admin_modele->validation_modification_notes_eliminatoires($employe,$password)){
                $data['erreur']=0;
                if($operation=='modification'){
                    $this->modifier_regles_passage();
                }elseif($operation=='correction'){
                    $this->corriger_regles_passage();//n'exist pas 
                }
            }else{
                $this->load->view('administrateur/authentification_modfication_reg_pass',$data);
            }    
        }else
        $this->load->view('administrateur/authentification_modfication_reg_pass',$data);
        
    }
    //mcorrection des regles de passage
    function corriger_regles_passage(){
        $data["parametres"]=$this->admin_modele->get_regle_passage_courante();
        $this->load->view('administrateur/corriger_regles_passage', $data);
    }
    function correction_regles_passage(){
        if(isset($_POST['niveau'])){
            $infos= $_POST;
            $infos["date_fin"]=null;
            //print_r($infos);
            unset($infos['submit']);
            echo"-----------------------------<br>";
        print_r($infos);
        echo"<br>-------------------------------------------";
            $this->admin_modele->correction_regles_passage($infos);
        }
        
        $this->corriger_regles_passage();
    }
    //***********************************************
    
    //modification des regles de passage
    function modifier_regles_passage(){
        $data["parametres"]=$this->admin_modele->get_regle_passage_courante();
        
        $this->load->view('administrateur/modifier_regles_passage', $data);
    }
    function modification_regles_passage(){
        if(isset($_POST['niveau'])){
            $infos= $_POST;
            $infos["date_fin"]=null;
            //print_r($infos);
            unset($infos['submit']);
           
            $this->admin_modele->update_regles_passage($infos);
        }
        
        $this->modifier_regles_passage();
    }
    
    
    //***********************************************************
    //liste des notes eliminatoires selon le cycle(licence,master)
    function liste_notes_eliminatoires($cycle){
        if($cycle=="licence"){
            $data['notes_eliminations_matiere']=$this->admin_modele->get_notes_eliminations_licence("matiere");
            $data['notes_eliminations_module']=$this->admin_modele->get_notes_eliminations_licence("module");
            $data['notes_eliminations_semestre']=$this->admin_modele->get_notes_eliminations_licence("semestre");
        }else{
            $data['notes_eliminations_matiere']=$this->admin_modele->get_notes_eliminations_master("matiere");
            $data['notes_eliminations_module']=$this->admin_modele->get_notes_eliminations_master("module");
            $data['notes_eliminations_semestre']=$this->admin_modele->get_notes_eliminations_master("semestre");
        } 
        $data['cycle']=$cycle;
        $this->load->view('administrateur/liste_notes_eliminatoires',$data);
    }
    
    //operation=(correction,modification)
//    function authentification_correction_notes_457787845($operation,$cycle){
//        $data['cycle']=$cycle;
//        $data['operation']=$operation;
//        $this->load->view('administrateur/authentification_correction_notes',$data);
//    }
    //operation= correction ou modification
    //cycle=licence ou master
    function authentification_correction_notes($operation,$cycle){ 
        $data['cycle']=$cycle;
        $data['operation']=$operation;
        if(isset($_POST['password'])){
            //employe qui peut modifier la note
            $employe="all";
            $employe=$this->session->userdata('matriculeEmploye');
            $password = $_POST['password'];
            $data['erreur']=1;
            if($this->admin_modele->validation_modification_notes_eliminatoires($employe,$password)){
                $data['erreur']=0;
                
                if($operation=="correction")
                    $this->correction_notes_eliminatoires($cycle);
                else
                    $this->modification_notes_eliminatoires($cycle);
            }else{
                $this->load->view('administrateur/authentification_correction_notes',$data);
            }    
        }else
        $this->load->view('administrateur/authentification_correction_notes',$data);
    }
    
    //cycle=licence ou master
    function correction_notes_eliminatoires($cycle){
        $data['cycle']=$cycle;
        if(isset($_POST['nouvelle_note'])){
            $infos=array();
            $infos['cycle']=$cycle;
            $infos['type']=$_POST['type_note'];
            $infos['note']=$_POST['nouvelle_note'];
            $infos['responsable']=$this->session->userdata('matriculeEmploye');
            //si la note est valide
            if(!is_numeric($infos['note']) or $infos['note']>20 or $infos['note']<0){
                unset($_POST);
                $this->correction_notes_eliminatoires($cycle);
            }else{
                //si la requete a bien ete execute
                if($this->admin_modele->correction_note_elimination($infos)){
                    $this->liste_notes_eliminatoires($cycle);
                } else {
                    unset($_POST);
                    $this->correction_notes_eliminatoires($cycle);
                } 
            }
        }else{
            if($cycle=="licence"){
                $data['note_elimination_matiere']=$this->admin_modele->get_note_elimination_licence("matiere")[0]['note'];
                $data['note_elimination_module']=$this->admin_modele->get_note_elimination_licence("module")[0]['note'];
                $data['note_elimination_semestre']=$this->admin_modele->get_note_elimination_licence("semestre")[0]['note'];
                $this->load->view('administrateur/correction_notes_eliminatoires',$data);
                
            }elseif($cycle=="master"){
                $data['note_elimination_matiere']=$this->admin_modele->get_note_elimination_master("matiere")[0]['note'];
                $data['note_elimination_module']=$this->admin_modele->get_note_elimination_master("module")[0]['note'];
                $data['note_elimination_semestre']=$this->admin_modele->get_note_elimination_master("semestre")[0]['note'];
                $this->load->view('administrateur/correction_notes_eliminatoires',$data);
            }else{
                echo "(>_<) <b>$cycle</b> n'est pas pris en charge";
            } 
        }   
    }
    
    //pour la modification de la note (c-a-d insertion) pour les deux cycles
    function modification_notes_eliminatoires($cycle){
        $data['cycle']=$cycle;
        if(isset($_POST['nouvelle_note'])){
            $infos=array();
            $infos['cycle']=$cycle;
            $infos['type']=$_POST['type_note'];
            $infos['note']=$_POST['nouvelle_note'];
            $infos['responsable']=$this->session->userdata('matriculeEmploye');
            
            //si la note est valide
            if(!is_numeric($infos['note']) or $infos['note']>20 or $infos['note']<0){
                unset($_POST);
                $this->correction_notes_eliminatoires($cycle);
            }else{
                //si la requete a bien ete execute
                if($this->admin_modele->modification_note_elimination($infos)){
                    $this->liste_notes_eliminatoires($cycle);
                } else {
                    unset($_POST);
                    $this->correction_notes_eliminatoires($cycle);
                } 
            }
            
        }else{
            if($cycle=="licence"){
                $data['note_elimination_matiere']=$this->admin_modele->get_note_elimination_licence("matiere")[0]['note'];
                $data['note_elimination_module']=$this->admin_modele->get_note_elimination_licence("module")[0]['note'];
                $data['note_elimination_semestre']=$this->admin_modele->get_note_elimination_licence("semestre")[0]['note'];
                $this->load->view('administrateur/modification_notes_eliminatoires',$data);
                
            }elseif($cycle=="master"){
                $data['note_elimination_matiere']=$this->admin_modele->get_note_elimination_master("matiere")[0]['note'];
                $data['note_elimination_module']=$this->admin_modele->get_note_elimination_master("module")[0]['note'];
                $data['note_elimination_semestre']=$this->admin_modele->get_note_elimination_master("semestre")[0]['note'];
                $this->load->view('administrateur/modification_notes_eliminatoires',$data);
            }else{
                echo "(>_<) <b>$cycle</b> n'est pas pris en charge";
            } 
        }
    }
    function historique_regles_passages(){
        $data['infos']=(array)$this->admin_modele->get_all_regles_passage();
        $this->load->view('administrateur/historique_regles_passage',$data); 
    }
    //added by fatimetou 02-01-2022
function plafon(){
$data['plafon']=$this->admin_modele->plafon_list();
    // print_r($data);
    $this->load->view("administrateur/plafon",$data);
}
}
