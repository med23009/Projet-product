<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Chef_departement extends CI_Controller {

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
        if( !in_array('chef_departement', $this->session->userdata('profil')))
                redirect();
        $this->load->model('chef_departement_modele');
        $this->load->model('scolarite_modele');
        $this->load->model('search_modele');
       $this->clear_output();
       $this->lang->load('iup', 'french');
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
        $this->load->view('chef_departement/index');
    }

    public function mot_de_passe() 
    {
        $data['errorMessage'] = '';
        $this->load->view('chef_departement/modifier_mot_de_passe', $data);
    }

    /*
     * Cette methode permet d'appeler la recherche des modules a valider
     *
     * @param - to_do_action: page vers laquelle aller lorsqu'on clique sur un element
     *        - id_action: specifie le parametre a envoyer apres la selection d'un element
     */

    function rechercher_modules_a_valider($to_do_action, $id_action, $titrePage, $annee, $semestre) 
    {
        $tables = array("planetudes", "module");
        $join_keys = array('planetudes.sigle = module.sigle');
        $db_columns = array('module.sigle as sigleModule', 'module.titre as titreModule');
        $db_result = array('sigleModule', 'titreModule');
        $grid_columns = array('Sigle', 'Titre');
        $action = $to_do_action;
        $idDepartementUser = $this->chef_departement_modele->get_id_departement($this->session->userdata('login'));
        $where = "where etatNote = 'chef_departement' AND annee = " . $annee . " AND semestre = " . $semestre. " AND module.idDepartement = '".$idDepartementUser['idDepartement']."'";

        $result = $this->search_modele->getSearchResult($tables, $db_columns, $grid_columns, $join_keys, $action, $id_action, $where, $db_result);

        $titre = $titrePage;
        $controlleur = "chef_departement";
        $data = array('titre' => $titre, 'controlleur' => $controlleur, 'result' => $result);

        $this->load->view("recherche_parametree", $data);
    }
    
    function selection_semestre_module_a_valider() 
    {

        $data['mode'] = array('mode' => '');
        $data['courante'] = $this->chef_departement_modele->get_session_courante();
        $data['annee'] = $this->chef_departement_modele->recuperer_annee();
        $data['redirection'] = "afficher_liste_modules_a_valider";
        $this->load->view('chef_departement/choix_periode', $data);
    }

     function selection_semestre_module_a_liberer() 
    {

        $data['mode'] = array('mode' => '');
        $data['courante'] = $this->chef_departement_modele->get_session_courante();
        $data['annee'] = $this->chef_departement_modele->recuperer_annee();
        $data['redirection'] = "afficher_liste_modules_a_liberer";
        $this->load->view('chef_departement/choix_periode', $data);
    }
    
    /*
     * Fonction appelée pour la recherche des modules a valider
     *
     */
    function afficher_liste_modules_a_valider() 
    {
        $this->session->set_userdata('annee', $this->input->post('annee'));
        $this->session->set_userdata('semestre', $this->input->post('semestre'));
        $titre = 'Liste des éléments à approuver';
        $this->rechercher_modules_a_valider("afficher_notes_module_a_valider", null, $titre, $this->session->userdata('annee'), $this->session->userdata('semestre'));
    }
    
     /*
     * Fonction appelée pour la recherche des modules a liberer
     *
     */
    function afficher_liste_modules_a_liberer() {
        $this->session->set_userdata('annee', $this->input->post('annee'));
        $this->session->set_userdata('semestre', $this->input->post('semestre'));
        $titre = 'Les éléments suivants peuvent être libérés: ';
        $this->rechercher_modules_a_valider("afficher_notes_module_a_liberer", null, $titre, $this->session->userdata('annee'), $this->session->userdata('semestre'));
    }

    /**
     * Cette fonction affiche la liste des notes du module selectionne pour validation
     */
    function afficher_notes_module_a_valider($sigle) {

        $annee = $this->session->userdata('annee');
        $semestre = $this->session->userdata('semestre');
        $data['sigle'] = $sigle;
        $data['matricules'] = $this->chef_departement_modele->recuperer_liste_etudiants_module_a_confirmer($sigle, $annee, $semestre);
        $data['resultats'] = $this->chef_departement_modele->recuperer_note_par_sigle($sigle, $data['matricules'], $annee, $semestre);
        $data['annee'] = $annee;
        $data['semestre'] = $semestre;
        $data['titre'] = 'Notes de l\'élément <b>'.$sigle.' </b>';
        $data['soustitre'] = '<div class="warning_box"> Une fois approuvées, 
            les notes sont transférées au Service de scolarité, vous ne pourrez 
            plus les libérer. </div>';
        $data['boutton'] = 'Approuver';
        $data['redirection'] = 'valider_notes_module';
        $this->load->view('chef_departement/afficher_notes', $data);
        $this->session->unset_userdata('annee');
        $this->session->unset_userdata('semestre');
    }
    
     /**
     * Cette fonction affiche la liste des notes du module selectionne pour validation
     */
    function afficher_notes_module_a_liberer($sigle) {

        $annee = $this->session->userdata('annee');
        $semestre = $this->session->userdata('semestre');
        $data['sigle'] = $sigle;
        $data['matricules'] = $this->chef_departement_modele->recuperer_liste_etudiants_module_a_confirmer($sigle, $annee, $semestre);
        $data['resultats'] = $this->chef_departement_modele->recuperer_note_par_sigle($sigle, $data['matricules'], $annee, $semestre);
        $data['annee'] = $annee;
        $data['semestre'] = $semestre;
        $data['titre'] = 'Notes de l\'élément <b>'.$sigle.' </b>';
        $data['boutton'] = 'Libérer';
        $data['soustitre'] = '<div class="warning_box"> Une fois libérées, les notes pourront être modifiées par l\'enseignant. </div>';
        $data['redirection'] = 'liberer_notes_module';
        $this->load->view('chef_departement/afficher_notes', $data);
        $this->session->unset_userdata('annee');
        $this->session->unset_userdata('semestre');
    }
    
	function SemestreTexte($semestre)
	{
		switch($semestre)
		{ case '1' :
			return "Printemps";
			break;
		case '2' :
			return "Ete";
			break;
		case '3' :
			return "Automne";
			break;
		default :
			return "??";
		}
	}
	
     /**
     * Cette fonction valide les notes et met a jour leur etat
     */
    function valider_notes_module() {
        $this->chef_departement_modele->mettre_a_jour_notes_modules('valider', $this->input->post('sigle'), $this->input->post('annee'), $this->input->post('semestre'));
        $data['titre'] = 'Approuver les notes';
        $data['type'] = 'valid_box';
        // $data['message'] = 'Les notes du module <b>'.$_POST['sigle'].'</b> du semestre <b>'.$_POST['annee'].'-'.$_POST['semestre'].'</b> ont été approuvées.';
		$data['message'] = 'Les notes de l\'élément <b>'.$_POST['sigle'].'</b> du semestre <b>'.$this->SemestreTexte($_POST['semestre']).'  '.$_POST['annee'].'</b> ont été approuvées.';
        $this->load->view('chef_departement/modification_confirme', $data);
    }
    
    /**
     * Cette fonction libere les notes et met a jour leur etat
     */
    function liberer_notes_module() {
        $this->chef_departement_modele->mettre_a_jour_notes_modules('liberer', $this->input->post('sigle'), $this->input->post('annee'), $this->input->post('semestre'));
        $data['titre'] = 'Libérer Notes';
        $data['type'] = 'valid_box';
        $data['message'] = 'Les notes de l\'élément <b>'.$_POST['sigle'].' </b> ont été libérées avec succès.';
        $this->load->view('chef_departement/modification_confirme', $data);
    }

    function selection_semestre($mode = '') 
    {
        $this->form_validation->set_rules('annee', 'Année', 'required');
        $this->form_validation->set_rules('semestre', 'Semestre', 'required');
        if ($this->form_validation->run()) 
        {
            switch ($this->input->post('mode')) 
            {
                case 'etudiant':
                    $this->consulter_note_par_classe($this->input->post('annee'), $this->input->post('semestre'), '');
                    break;
                case 'classe':
                    $this->consulter_note_par_classe($this->input->post('annee'), $this->input->post('semestre'), '');
                    break;
                default:
                   $this->load->view('chef_departement/index');
                    break;
            }
        } 
        else 
        {
            $data['mode'] = array('mode' => $mode);
            $data['annee'] = $this->chef_departement_modele->recuperer_annee();
            $data['courante'] = $this->chef_departement_modele->get_session_courante();
            $data['redirection'] = "selection_semestre";
            $this->load->view('chef_departement/choix_periode', $data);
        }
    }
    function consulter_etudiant_module()
    {
        $data['annee'] = $this->chef_departement_modele->recuperer_annee();
        $data['courante'] = $this->chef_departement_modele->get_session_courante();
        $this->load->view('chef_departement/choix_semestre', $data);
    }
    
    function lister_module()
    { 
        $idDepartement = $this->chef_departement_modele->get_idDepartement($this->session->userdata('matriculeEmploye'));
        $tables = array("groupe", "module");
        $join_keys = array('groupe.sigle = module.sigle');
        $db_columns = array('groupe.sigle as sigle', 'titre');
        $result_columns = array('sigle', 'titre');
        $grid_columns = array('Sigle', 'Titre');
        $action = 'consulter_note_par_classe/' . $_POST['annee'] . '/' . $_POST['semestre'];
        $id_action = '';
        $where = "WHERE annee = " . $_POST['annee'] . " AND semestre = " .$_POST['semestre']." AND module.idDepartement = '".$idDepartement."'";

        $titre = 'Sélectionnez Elémént :';
        $result = $this->search_modele->getSearchResult($tables, $db_columns, $grid_columns, $join_keys, $action, $id_action, $where, $result_columns);

        $controlleur = "chef_departement";
        $data = array('titre' => $titre, 'controlleur' => $controlleur, 'result' => $result);


        $this->load->view("recherche_parametree", $data);
    }
    function consulter_note_par_etudiant($annee, $semestre, $matricule) 
    {
        if ($matricule != null) 
        {
            $data['matricule'] = $matricule;
            $data['annee'] = $annee;
            if($semestre == '1')
            {
                $data['semestre'] = 'Printemps ';
            }
            elseif($semestre == '2')
            {
                $data['semestre'] = 'Été ';
            }
            elseif($semestre == '3')
            {
                $data['semestre'] = 'Automne ';
            }
            else
            {
                $data['semestre'] = $semestre;
            }
            
            
            $data['resultas'] = $this->chef_departement_modele->recuperer_note($matricule, $annee, $semestre);
            $this->load->view('chef_departement/details_notes_etudiant', $data);
        } 
        else 
        {
            $tables = array("etudiant", "listeetudiants");
            $join_keys = array('etudiant.matriculeEtudiant = listeetudiants.matriculeEtudiant');
            $db_columns = array('etudiant.matriculeEtudiant as matricule', 'nom', 'prenom');
            $result_columns = array('matricule', 'nom', 'prenom');
            $grid_columns = array('Matricule', 'Nom', 'Prénom');
            $action = 'consulter_note_par_etudiant/' . $annee . '/' . $semestre;
            $id_action = '';
            $where = "where idGroupe like '%" . $semestre . $annee . "%'";

            $result = $this->search_modele->getSearchResult($tables, $db_columns, $grid_columns, $join_keys, $action, $id_action, $where, $result_columns);

            $titre = 'Sélectionnez Étudiant: ';
            $controlleur = "chef_departement";
            $data = array('titre' => $titre, 'controlleur' => $controlleur, 'result' => $result);
        
            $this->load->view("recherche_parametree", $data);
        }
    }

    function consulter_note_par_classe($annee, $semestre, $sigle) 
    {
        if ($sigle != null) 
        {
            $data['sigle'] = $sigle;
            $data['annee'] = $annee;
            $data['semestre'] = $semestre;
            $data['matricules'] = $this->chef_departement_modele->recuperer_liste_etudiants($sigle, $annee, $semestre);
            $data['resultas'] = $this->chef_departement_modele->recuperer_note_par_classe($data['matricules'], $annee, $semestre);


            $this->load->view('chef_departement/details_notes_classe', $data);
        } 
        else 
        {
            $idDepartement = $this->chef_departement_modele->get_idDepartement($this->session->userdata('matriculeEmploye'));
           
            $tables = array("groupe", "module");
            $join_keys = array('groupe.sigle = module.sigle');
            $db_columns = array('groupe.sigle as sigle', 'titre');
            $result_columns = array('sigle', 'titre');
            $grid_columns = array('Sigle', 'Titre');
            $action = 'consulter_note_par_classe/' . $annee . '/' . $semestre;
            $id_action = '';
            $where = "WHERE annee = $annee AND semestre = $semestre AND module.idDepartement = '$idDepartement'";

            $titre = 'Sélectionner Module: ';
            $result = $this->search_modele->getSearchResult($tables, $db_columns, $grid_columns, $join_keys, $action, $id_action, $where, $result_columns);

            $controlleur = "chef_departement";
            $data = array('titre' => $titre, 'controlleur' => $controlleur, 'result' => $result);


            $this->load->view("recherche_parametree", $data);
        }
    }
    
    function trouver_module_pour_etudiant()
    {
        $idDepartement =  $this->chef_departement_modele->get_id_departement($this->session->userdata('login'));
        $tables = array("module");
        $join_keys = null;
        $db_columns = array('sigle', 'titre');
        $result_columns = array('sigle', 'titre');
        $grid_columns = array('Sigle', 'Titre de l\'élément');
        $action = 'trouver_etudiant_a_consulter';
        $id_action = 'sigle';
        $db_where = "WHERE idDepartement ='".$idDepartement['idDepartement'] ."'";
        $result = $this->search_modele->getSearchResult($tables, $db_columns, $grid_columns, $join_keys, $action, $id_action,$db_where, $result_columns);
        $titre = '<h3>Vous n\'avez accès qu\'aux étudiants inscrits à
            un module de votre département.</h3><h3> Sélectionnez un élément</h3>';
        $controlleur = "chef_departement";
        $data = array('titre' => $titre, 'controlleur' => $controlleur, 'result' => $result);

        $this->load->view("recherche_parametree", $data);
        
    }

    /*
     * Fonction appeler pour trouver l'etudiant a consulter
     *
     */

    function trouver_etudiant_a_consulter($sigle,$matricule='') 
    {
        if($sigle == 'consulter_etudiant')
        {
           redirect('chef_departement/consulter_etudiant/' . $matricule);
        }
        $tables = array("etudiant","planetudes");
        $join_keys = array('etudiant.matriculeEtudiant = planetudes.matriculeEtudiant');
        $db_columns = array('etudiant.matriculeEtudiant as matriculeE', 'nom', 'prenom', "case when actif = 1 then 'O' when actif = 0 then 'N' end as actif ");
        $grid_columns = array('Matricule', 'Nom', 'Prénom', 'Actif?');
        $result_columns = array('matriculeE', 'nom', 'prenom',"actif");
        $action = 'consulter_etudiant';
        $id_action = '';
        $db_where = "WHERE planetudes.sigle ='".$sigle."'";
        $result = $this->search_modele->getSearchResult($tables, $db_columns, $grid_columns, $join_keys, $action, $id_action,$db_where,$result_columns);    
        $titre = 'Sélectionnez un étudiant ';
        $controlleur = "chef_departement";
        $data = array('titre' => $titre, 'controlleur' => $controlleur, 'result' => $result);

        $this->load->view("recherche_parametree", $data);
    }

    /*
     * Fait appel a la vue de consultation d'un etudiant.
     * @param -id : le parametre avec lequel identifier l'etudiant selectionne
     */

    function consulter_etudiant($matriculeEtudiant) 
    {
        $informations_etudiant = $this->chef_departement_modele->get_informations($matriculeEtudiant);
        $this->load->view("chef_departement/consulter_info_personnelle_etudiant", $informations_etudiant);
    }
    /*
     * fonction pour la consutation des horaires de cours 
     */
    function consulter_horaire_cours()
    {
        $this->form_validation->set_rules('choixCours', 'choix de cours', 'required');
        if ($this->form_validation->run()) {                      
            $data['sigle'] = $this->input->post('choixCours');
            $data['horaires_disponibles'] = $this->chef_departement_modele->get_horaires_dispo($data['sigle']);
            $this->load->view('chef_departement/choix_horaire', $data);
        }
        else 
        {
            $idDepartement =  $this->chef_departement_modele->get_id_departement($this->session->userdata('login'));
            $listeCours = $this->chef_departement_modele->recuperer_cours($idDepartement);
            $this->load->view('chef_departement/choix_cours',$listeCours);
        }
    }
        /*
     * fonction pour convertir le code du semestre par son nom 
     * elle prend en parametre le numero du semestre soit(1,2,3)
     * et elle retourne le nom (Automn,ete,printemps)
     */

    function get_session_nom($numeroSemestre) 
    {
        if ($numeroSemestre == 3) 
        {
            return 'Automne';
        } 
        elseif ($numeroSemestre == 2) 
        {
            return 'Été';
        } 
        else 
        {
            return 'Printemps';
        }
    }
    function afficher_horaire_cours()
    {
        $this->form_validation->set_rules('date', 'L\'année et le semestre', 'required');
        $this->form_validation->set_rules('sigle', 'sigle', 'required');
        if ($this->form_validation->run()) {

             $date = explode("-", $this->input->post('date'));
             $sigle = $this->input->post('sigle');
             
             switch ($date[0])
             {
                  case '3':
                        $semestre = "Automne ";
                        break;
                  case '2':
                        $semestre = "Été ";
                        break;
                  case '1':
                        $semestre = "Printemps ";
                        break;
             }
             
             
            $periodeGroupe = NULL;
            $periodeGroupe['titre'] = "Horaire du module ".$sigle. " : ".  $this->get_session_nom($semestre).' '.$date[1];
            $periodeGroupe['detailHoraire'] = NULL;
            $dataIdGroupe = $this->chef_departement_modele->get_idGroupe_anneeCourante($sigle,$date[0], $date[1]);

            if (is_array($dataIdGroupe)) {
                foreach ($dataIdGroupe['idGroupe'] as $idG) {
                    $periodeGroupe['detailHoraire'][] = $this->chef_departement_modele->get_periode_groupe($idG);
                }
            }
			$this->load->view('chef_departement/consulter_horaire_cours', $periodeGroupe);

        } else {
            $this->load->view('chef_departement/index');
        }
    }

    function password_check($password)
    {

        if( 
            ctype_alnum($password) // numbers & digits only 
            && strlen($password)>7 // at least 8 chars 
            && strlen($password)<11 // at most 20 chars 
            && ((preg_match('`[a-z]`',$password)||(preg_match('`[A-Z]`',$password))) ) 
            && preg_match('`[0-9]`',$password) // at least one digit 
        )
        { 
            return TRUE;
        }
        else
        { 
            return FALSE;
        }     

    }
    public function modifier_mot_de_passe() 
    {
        if ($this->chef_departement_modele->get_old_password($this->session->userdata('login')) == $this->input->post('old_password')) 
        {
            $passwordIsValid = $this->password_check($this->input->post('new_password'));
            if($passwordIsValid == TRUE)
            {
                if ($this->input->post('new_password') == $this->input->post('confirmed_password')) 
                {
                    
                    $this->chef_departement_modele->set_password($this->input->post('new_password'), $this->session->userdata('login'));
                    $data['titre'] = 'Modifier mot de passe';
                    $data['type'] = 'valid_box';
                    $data['message'] = 'Le mot de passe a bien été modifié.'; 
                    $this->load->view('chef_departement/modification_confirme',$data);
                } 
                else 
                {
                    $data['errorMessage'] = '<div class="error_box">
                            Les deux nouveaux mots de passe ne sont pas identiques
                            </div>';
                    $this->load->view('chef_departement/modifier_mot_de_passe', $data);
                }
            }
            else 
                {
                    $data['errorMessage'] = '<div class="error_box">
                        Le mot de passe doit contenir 8 à 10 lettres et chiffres dont au moins une lettre et un chiffre.
                        </div>';
                    $this->load->view('chef_departement/modifier_mot_de_passe', $data);
                }
        } 
        else 
        {
            $data['errorMessage'] = '<div class="error_box">
                       L\'ancien mot de passe est erroné.
                        </div>';
            $this->load->view('chef_departement/modifier_mot_de_passe', $data);
        }
    }
    function trouver_etudiant_bulletin_nouveau() 
    {
        //$semestre = $_POST['semestre'];
        $idDepartement = $this->chef_departement_modele->get_idDepartement($this->session->userdata('matriculeEmploye'));
       
        $tables = array("etudiant","dossieretudiant");
        $join_keys = array("etudiant.matriculeetudiant=dossieretudiant.matriculeetudiant");
        $db_columns = array('etudiant.matriculeEtudiant as matriculeEtudiant', 'etudiant.nom as nom', 'etudiant.prenom as prenom', "case when etudiant.actif = 1 then 'O' when etudiant.actif = 0 then 'N' end as actif ");
        $result_columns = array('matriculeEtudiant', 'nom', 'prenom', "actif");
        $grid_columns = array('Matricule', 'Nom', 'Prénom', 'Actif ?');
        $action = 'choix_semestre_bulltin';
        $id_action ='';
         $where =" where dossieretudiant.idProgramme='" . $idDepartement . "' ";
       
        $result = $this->search_modele->getSearchResult($tables, $db_columns, $grid_columns, $join_keys, $action, $id_action, $where, $result_columns);
        $titre = 'Consulter le rélévé des notes d\'un étudiant ';
        $controlleur = "chef_departement";
        $data = array('titre' => $titre, 'controlleur' => $controlleur, 'result' => $result);


        $this->load->view("recherche_parametree", $data);
    }
    function choix_semestre_bulltin
	 ($matriculeEtudiant){
    $controlleur = "scolarite";
    $titre = "Choisir un semestre";
    $data = array('titre' => $titre,'controlleur' => $controlleur,'matriculeEtudiant'=>$matriculeEtudiant);
   // $this->load->view("recherche_parametree", $data);
    $this->load->view("chef_departement/choix_semestre_bulltin",$data);
}
public function voir_bulletin_nouvel() 
    {
            $matriculeEtudiant= $_POST['matriculeEtudiant'];
        $semestre =  $_POST['semestre'];
       // $annee =  $_POST['annee'];
        $annee =0;
        $min = $this->scolarite_modele->min_annee_admis($matriculeEtudiant,$semestre,$decision="Admis(e)") ;
        // echo"**************************";
       // print_r($min);
        // echo"**************************";
        
        if($min!=null){
            
                       $annee=$min;
                       $passage = $this->scolarite_modele-> get_decision_passage($annee,$matriculeEtudiant);
                      
                            if($matriculeEtudiant==13042){
                       $annee=$min+2;
                      
                }
               
                    
           }else{
            $max = $this->scolarite_modele->max_annee_ajournee($matriculeEtudiant,$semestre,$decision="Ajourné(e)");
               $passage = $this->scolarite_modele-> get_decision_passage($max-1,$matriculeEtudiant);
               
     
            if($semestre%2==1){
                       $annee=$max-1;
                       
                       if($matriculeEtudiant==11003 or $matriculeEtudiant==15280){
                       $annee=$max;
                      
                }
                }else{
                     $annee=$max;
                }
                    
            }
        /*if($semestre == null)
            $semestre = 1;
        else if($semestre ='' || $semestre <1 || $semestre > 6)*/
                //$semestre = 1;
        $infoEtudiant = $this->scolarite_modele->getInfoBulletinEtudiant($matriculeEtudiant);
        $anne=$annee;
       /* if($semestre%2==1){
            $anne=$annee;
        }else{
            $anne=$annee-1;
        }*/
        $niveau = $this->scolarite_modele->getEtudiatNiveauInscrit($matriculeEtudiant,$anne);
         $code = $this->scolarite_modele-> info_bulltin($matriculeEtudiant); 
        // print_r($code);
        $infoEtudiant['niveau']="L".$niveau;
        $dataE = $this->scolarite_modele->get_informations_etudiant($matriculeEtudiant);
        //$semRes = $this->scolarite_modele->getSemestreResult($matriculeEtudiant, $semestre);
        //$moduleRes = $this->scolarite_modele->getModulesResult($matriculeEtudiant, $semestre);
        $semRes=null;
        $moduleRes=null;
        $moduleNc=null;
         if($semestre%2==1){
            $semRes = $this->scolarite_modele->getSemestreResult_bis($matriculeEtudiant, $semestre,$annee);
            $moduleRes = $this->scolarite_modele->getModulesResult_bis_h($matriculeEtudiant, $semestre,$annee);
            //$moduleNc= $this->scolarite_modele->get_elt_nc($matriculeEtudiant,$annee,$semestre);
            // print_r($moduleNc['sigle']);
             
         }else{
            $semRes = $this->scolarite_modele->getSemestreResult_bis($matriculeEtudiant, $semestre,$annee);
            $moduleRes = $this->scolarite_modele->getModulesResult_bis_h($matriculeEtudiant, $semestre,$annee);
          //  $moduleNc= $this->scolarite_modele->get_elt_nc($matriculeEtudiant,$annee,$semestre);
            
         }
        
        $moyenne = $this->scolarite_modele-> get_moyenne_niveau($matriculeEtudiant);
        print_r($moyenne);
        //Recuperation des parametres genereaux ---Par MedBakar
             $param_generaux= $this->scolarite_modele->Recup_Parametre_Generaux();
           
        $data = array('moyenne'=>$moyenne,'passage'=>$passage,'code'=>$code,'infoE'=>$dataE,'nc' => $moduleNc,'info' => $infoEtudiant, 'semestre' => $semRes, 'modules' => $moduleRes, 'annee' => $annee,'numSem'=>$semestre,'param_generaux'=>$param_generaux);
        $this->load->view('chef_departement/bulltin', $data);
        
    }
    
     function rechercher_etudiantAtt_d($to_do_action, $id_action) 
    {
       $langue=$_POST['langue'];
          //
         $idDepartement = $this->chef_departement_modele->get_idDepartement($this->session->userdata('matriculeEmploye'));
       
        $tables = array("infoatest","dossieretudiant");
        $join_keys = array("infoatest.matriculeetudiant=dossieretudiant.matriculeetudiant");
        $db_columns = array('infoatest.matriculeEtudiant as matriculeEtudiant', 'infoatest.nom as nom', 'infoatest.nomArabe as nomArabe',  'infoatest.prenom as prenom', 'infoatest.prenomArabe as prenomArabe');
        $result_columns = array('matriculeEtudiant', 'nom','nomArabe', 'prenom', "prenomArabe");
        $grid_columns = array('matriculeEtudiant', 'nom','nomArabe', 'prenom', 'prenomArabe');
        $action = $to_do_action;
        $id_action=$id_action;
        
        
         $where =" where dossieretudiant.idProgramme='" . $idDepartement . "' ";
       
        $result = $this->search_modele->getSearchResult($tables, $db_columns, $grid_columns, $join_keys, $action, $id_action, $where, $result_columns);
        
       
        $titre = 'Consulter l\'attestation d\'un étudiant ';
        $controlleur = "chef_departement";
        $data = array('titre' => $titre, 'controlleur' => $controlleur, 'result' => $result,'langue'=>$langue);


        $this->load->view("recherche_parametree", $data);
    }
    function choix_langue_attestation_d()
    {
        $titre = 'Choix de la langue pour l\'attesation';
        $controlleur = "scolarite";
        $data = array('titre' => $titre, 'controlleur' => $controlleur);

        
        $this->load->view("chef_departement/choix_langue_attestation_d", $data);
    }
    function trouver_etudiant_pour_attestation_d() 
    {
        
        $this->rechercher_etudiantAtt_d('consulter_attestation_d/'.$_REQUEST['langue'], 'matriculeEtudiant');
    }
    function consulter_attestation_d($langue, $id) 
    {
        $informations_attest = $this->scolarite_modele->get_informationsAtt_d($id);
      // print_r($informations_attest);
        
       
        $informations_attest['langue']=$langue;
        $this->load->view("chef_departement/consulter_info_attestation_d", $informations_attest);
    } 
      function afficher_stat()
    {
        $idProgramme = $_POST['idProgramme'];
        $annee = $_POST['annee'];
        $res=$this->scolarite_modele->getStat($idProgramme, $annee);
        $data=array('annee'=>$annee, 'idProgramme'=>$idProgramme, 'data'=>$res);
        $this->load->view("chef_departement/afficher_stat", $data);       
         
    }
     function stat_param()
    {
         $data['annee'] = $this->scolarite_modele->recuperer_annee();
        $data['semestres'] = $this->scolarite_modele->get_semestres_courants();
        $data['programme'] = $this->scolarite_modele->get_programme();
        $data['grade'] = $this->scolarite_modele->get_grade();
        $this->load->view("chef_departement/stat_param", $data);       
         
    }
    function planning_exam(){
                      $data_session_courante = $this->scolarite_modele->get_session_courante();
       
                        $data = array('crenau'=>$this->scolarite_modele->get_crenau(),'planing'=>$this->scolarite_modele->get_planing(),'programme'=>$this->scolarite_modele->get_programme(),'annee' => $data_session_courante['annee'][0], 
                       'semestre' => $data_session_courante['semestre'][0]);
           $this->load->view("chef_departement/planning_exam",$data);      
       }
        function m_info_plannig_exam(){
            $groupe['data'] = $this->scolarite_modele->m_planning_exam();
       // $groupes=array('listeH'=>$listeH,'groupe'=>$groupe);
        echo(json_encode($groupe));   
       }
        function planning_examens(){
          // $data['totaux']=$this->scolarite_modele->planning_totaux($_POST['idProgramme'],$_POST['planing']);
            $data_session_courante = $this->scolarite_modele->get_session_courante();
       
                        $data = array('planningjournee'=>$this->scolarite_modele->get_planningjournee($_GET['planing']),'crenau'=>$this->scolarite_modele->get_crenau(),'idProgramme1'=>$_GET['idProgramme'],'idPlaning'=>$_GET['planing'],'planing'=>$this->scolarite_modele->get_planing(),'programme'=>$this->scolarite_modele->get_programme(),'annee' => $data_session_courante['annee'][0], 
                       'semestre' => $data_session_courante['semestre'][0]);
                           $data_session_courante = $this->scolarite_modele->get_session_courante();
       
     
           $data['planning'] = $this->scolarite_modele->planning_examens($_GET['idProgramme'],$_GET['planing']);
          // print_r($data);
            $data['totaux'] = $this->scolarite_modele->planning_totaux($_GET['idProgramme'],$_GET['planing']);
           $this->load->view("chef_departement/planning_examens",$data);      
       }
        function info_plannig_exam(){
            $groupe['data'] = $this->scolarite_modele->planning_exam();
       // $groupes=array('listeH'=>$listeH,'groupe'=>$groupe);
        echo(json_encode($groupe));   
       }
         public function emplois_du_temps() 
    {   
       // $events=null;
      //   $connection = mysqli_connect('127.0.0.1','root','','iup') or die(mysqli_error($connection));
  // set your user id settings
       
         
$datetime_string = date('c',time());    
    $result="hhhh";
      if(isset($_POST['action']) or isset($_GET['view']))
{
    if(isset($_GET['view']))
    {  header('Content-Type: application/json');
     
        
        //$start = mysqli_real_escape_string($connection,$_GET["start"]);
        //$end = mysqli_real_escape_string($connection,$_GET["end"]);
                      $start=$_GET["start"];
                      $end=$_GET["end"];
                      $result = $this->scolarite_modele->get_events1($start,$end,$s=$_GET['semestre'],$p=$_GET['idProgramme'],$chek1=$_GET["chek1"],$local=$_GET["local"],$employe1=$_GET["employe1"]);
                      $events=$result['events'];
        
        echo json_encode($events); 
        //echo json_encode($result['end']); 
       exit;
    }
    
      
      
    elseif($_POST['action'] == "add")
    {    //header('Content-Type: application/x-json; charset=utf-8');
     //  echo(json_encode($this->scolarite->get_groupe($_POST['annee'], $_POST['semestre'], $_POST['sigle'])));
        
        $p=$_POST["chekb"];
        
       if($p=="1"){
        $date_f=date('Y-m-d', strtotime($_POST["dfin"]));
      // echo date('Y-m-d',$date_f);
        // $date_d=strtotime('+7 days', strtotime($_POST["start"]) );
 

     $date1=date('Y-m-d H:i:s', strtotime($_POST["start"]) );
     $date2=date('Y-m-d H:i:s', strtotime($_POST["end"]) );
      $this->scolarite_modele->add_r_events(array(
            "start" => $date1,
            "end" => $date_f
            )
        );
      $id_repeat=$this->scolarite_modele->max_id_r_events();
    //  $this->db->insert("r_events", array('test'=>$id_repeat));
     $i=0;
        while($date1< $date_f){
         //    $date_d = strtotime('+7 days', strtotime($_GET["start"]) );
         // $date_f1 = strtotime('+7 days', strtotime($_GET["end"]) );
            $i++;
            if($i==1){
                $date1=date('Y-m-d H:i:s',strtotime('+0 days', strtotime($date1) ));
        $date2=date('Y-m-d H:i:s',strtotime('+0 days', strtotime($date2 )));
        
            }else{
        $date1=date('Y-m-d H:i:s',strtotime('+7 days', strtotime($date1) ));
        $date2=date('Y-m-d H:i:s',strtotime('+7 days', strtotime($date2 )));
            }
      //  $diff=date_diff($date1,$date2);
             
       /* mysqli_query($connection,"INSERT INTO `events` (
                    `title` ,
                    `start` ,
                    `end` ,
                     `idProgramme` ,
                      `semestre` ,
                    `id_salle`,
                    `idGroupe`,
                    `matriculeEmploye`,
                    `id_repeat`,
                    `dow`
                    
                    )
                    VALUES (
                    '".mysqli_real_escape_string($connection,$_POST["title"])."',
                    '".mysqli_real_escape_string($connection,$date1)."',
                    '".mysqli_real_escape_string($connection,$date2)."', '".$_POST["idProgramme"]."', '".$_POST["semestre"]."', '".$_POST["local"]."', '".$_POST["idGroupe"]."', '".$_POST["employe"]."', '".$id_repeat."', '".$_POST["typec"]."'
                    )");
        */
               $sql="INSERT INTO `events` (
                    `title` ,
                    `start` ,
                    `end` ,
                    `id_salle`,
                    `idGroupe`,
                    `id_repeat`,
                     `dow`
                    )
                    VALUES (
                    '".$_POST["title"] ."',
                    '".date('Y-m-d H:i:s', strtotime($date1))."',
                    '".date('Y-m-d H:i:s', strtotime($date2)  )."',  '".$_POST["local"]."', '".$_POST["idGroupe"]."', '".$id_repeat."', '".$_POST["typec"]."'
                    )";
        $this->db->query($sql);
         }
         
       // header('Content-Type: application/json');
       // echo '{"id":"'.mysqli_insert_id($connection).'"}';
        
        
         }else{
             
             
     $date1=date('Y-m-d H:i:s', strtotime($_POST["start"]) );
     $date2=date('Y-m-d H:i:s', strtotime($_POST["end"]) );
      
   $sql="INSERT INTO `events` (
                    `title` ,
                    `start` ,
                    `end` ,
                    `id_salle`,
                    `idGroupe`,
                     `dow`
                    )
                    VALUES (
                    '".$_POST["title"] ."',
                    '".date('Y-m-d H:i:s', strtotime($date1))."',
                    '".date('Y-m-d H:i:s', strtotime($date2)  )."',  '".$_POST["local"]."', '".$_POST["idGroupe"]."','".$_POST["typec"]."'
                    )";
   
      //  $diff=date_diff($date1,$date2);
             
      /*  mysqli_query($connection,"INSERT INTO `events` (
                    `title` ,
                    `start` ,
                    `end` ,
                     `idProgramme` ,
                      `semestre` ,
                    `id_salle`,
                    `idGroupe`,
                     `dow`
                    )
                    VALUES (
                    '".mysqli_real_escape_string($connection,$_POST["title"] )."',
                    '".mysqli_real_escape_string($connection,date('Y-m-d H:i:s', strtotime($_POST["start"]) ))."',
                    '".mysqli_real_escape_string($connection,date('Y-m-d H:i:s', strtotime($_POST["end"]) ) )."', '".$_POST["idProgramme"]."', '".$_POST["semestre"]."', '".$_POST["local"]."', '".$_POST["idGroupe"]."', '".$_POST["typec"]."'
                    )");
      */     
        $this->db->query($sql);
       // $this->db->insert('r_events', array('test' => $sql));
       
          // header('Content-Type: application/json');
        //echo '{"id":"'.mysqli_insert_id($connection).'"}';
         
           }
        // $this->db->insert("r_events", array('test'=>$_POST['chk1']));
           if($_POST['chk1']=="1"){
            $this->scolarite_modele->update_g_employee($matriculeEmploye=$_POST["employe"],$idGroupe=$_POST["idGroupe"]);
           }
        exit;
    }
    elseif($_POST['action'] == "update")
    {
         $date1=date('Y-m-d H:i:s',strtotime('-2 hours', strtotime($_POST["start"]) ));
     $date2=date('Y-m-d H:i:s',strtotime('-2 hours', strtotime($_POST["end"]) ));
        mysqli_query($connection,"UPDATE `events` set 
            `start` = '".mysqli_real_escape_string($connection,$date1)."', 
            `end` = '".mysqli_real_escape_string($connection,$date2)."' 
            where  id = '".mysqli_real_escape_string($connection,$_POST["id"])."'");
        exit;
    }
    elseif($_POST['action'] == "delete") 
    { 
   //     $this->db->insert("r_events", array('test'=>"hh".$_POST['rd']));
     /*   if(($_POST['rd'] == "1")){
        $this->scolarite_modele->update_events($_POST['id'] ,$type=$_POST['rd']  ) ;
    }if(($_POST['rd'] == "2")){
          $this->scolarite_modele->update_events($_POST['id'] ,$type=$_POST['rd']  ) ;
           
    } if(($_POST['rd'] == "3")){
        mysqli_query($connection,"DELETE from `events` where  id = '".mysqli_real_escape_string($connection,$_POST["id"])."'");
        if (mysqli_affected_rows($connection) > 0) {
            echo "1";
       }}*/
        $r_event=$this->scolarite_modele->r_events($id=$_POST['id']);
         $date_f=date('Y-m-d', strtotime($r_event["end"]));
         $date_s=date('Y-m-d', strtotime($r_event["start"]));
         $id_repeat=$r_event["id"];
        
         // $this->scolarite_modele->update_events($id=$_POST['id'],$rd=$_POST['rd'],$type=$_POST['type'],$type1=$_POST['type1'],$local=$_POST['local'],$start=$_POST['start'],$end=$_POST['end'],$idGroupe=$_POST['eventIDG'],$prof=$_POST['prof'],$title=$_POST['title']); 
          $this->scolarite_modele->update_g_employee($matriculeEmploye=$_POST["prof"],$idGroupe=$_POST["eventIDG"]);
          
         if($_POST['rd']=="1"){
            
          if($_POST['type']=="1"){
           
            $this->scolarite_modele->update_events($id=$_POST['id'],$rd=$_POST['rd'],$type=$_POST['type'],$type1=$_POST['type1'],$local=$_POST['local'],$start=$_POST['start'],$end=$_POST['end'],$idGroupe=$_POST['eventIDG'],$prof=$_POST['prof'],$title=$_POST['title'],$typecm=$_POST['typecm']); 
            
            } elseif($_POST['type']=="2"){
               $this->scolarite_modele-> delete_events_ulterieurs($id_r=$id_repeat,$start=$_POST['start']);
               $date1=date('Y-m-d H:i:s',strtotime($_POST["start"]));
               $date2=date('Y-m-d H:i:s',strtotime($_POST["end"]));
                $this->scolarite_modele->update_unique_event($id=$_POST['id'],$rd=$_POST['rd'],$type=$_POST['type'],$type1=$_POST['type1'],$local=$_POST['local'],$start=$_POST['start'],$end=$_POST['end'],$idGroupe=$_POST['eventIDG'],$prof=$_POST['prof'],$title=$_POST['title'],$typecm=$_POST['typecm']);
             $i=0;
            //  $this->db->insert('r_events', array('test' => $type1=$_POST['type1']));
        while($date1< $date_f){
         //    $date_d = strtotime('+7 days', strtotime($_GET["start"]) );
         // $date_f1 = strtotime('+7 days', strtotime($_GET["end"]) );
            $i++;
          
        $date1=date('Y-m-d H:i:s',strtotime('+7 days', strtotime($date1) ));
        $date2=date('Y-m-d H:i:s',strtotime('+7 days', strtotime($date2 )));
      
      //  $diff=date_diff($date1,$date2);
             $this->scolarite_modele->update_events($id=$_POST['id'],$rd=$_POST['rd'],$type=$_POST['type'],$type1=$_POST['type1'],$local=$_POST['local'],$start=$date1,$end=$date2,$idGroupe=$_POST['eventIDG'],$prof=$_POST['prof'],$title=$_POST['title'],$typecm=$_POST['typecm']); 
       
         }
         }elseif($_POST['type']=="3"){
              $date1=date('Y-m-d H:i:s', strtotime($_POST["start"]));
     $date2=date('Y-m-d H:i:s', strtotime($_POST["end"]) );
     $date3=date('Y-m-d H:i:s',strtotime($_POST["start"]));
               $date4=date('Y-m-d H:i:s',strtotime($_POST["end"]));
      $this->scolarite_modele->delete_all_events($id_r=$id_repeat);
      $this->scolarite_modele->update_unique_event($id=$_POST['id'],$rd=$_POST['rd'],$type=$_POST['type'],$type1=$_POST['type1'],$local=$_POST['local'],$start=$_POST['start'],$end=$_POST['end'],$idGroupe=$_POST['eventIDG'],$prof=$_POST['prof'],$title=$_POST['title'],$typecm=$_POST['typecm']);
          
   /*   $this->scolarite_modele->add_r_events(array(
            "start" => $date1,
            "end" => $date_f
            )
        );
      $id_repeat=$this->scolarite_modele->max_id_r_events();*/
   
     $i=0;
        while($date1< $date_f){
         //    $date_d = strtotime('+7 days', strtotime($_GET["start"]) );
         // $date_f1 = strtotime('+7 days', strtotime($_GET["end"]) );
            $i++;
          
        $date1=date('Y-m-d H:i:s',strtotime('+7 days', strtotime($date1) ));
        $date2=date('Y-m-d H:i:s',strtotime('+7 days', strtotime($date2 )));
      
      //  $diff=date_diff($date1,$date2);
             $this->scolarite_modele->update_events($id=$_POST['id'],$rd=$_POST['rd'],$type=$_POST['type'],$type1=$_POST['type1'],$local=$_POST['local'],$date1,$end=$date2,$idGroupe=$_POST['eventIDG'],$prof=$_POST['prof'],$title=$_POST['title'],$typecm=$_POST['typecm']); 
          //   $this->scolarite_modele->update_events($id=$_POST['id'],$rd=$_POST['rd'],$type=$_POST['type'],$type1=$_POST['type1'],$local=$_POST['local'],$start=$date1,$end=$date2,$idGroupe=$_POST['eventIDG'],$prof=$_POST['prof'],$title=$_POST['title'],$typecm=$_POST['typecm']); 
       
         } $j=0;
        while($date4> $date_s){
         //    $date_d = strtotime('+7 days', strtotime($_GET["start"]) );
         // $date_f1 = strtotime('+7 days', strtotime($_GET["end"]) );
            $j++;
          
        $date3=date('Y-m-d H:i:s',strtotime('-7 days', strtotime($date1) ));
        $date4=date('Y-m-d H:i:s',strtotime('-7 days', strtotime($date2 )));
      
      //  $diff=date_diff($date1,$date2);
            $this->scolarite_modele->update_events($id=$_POST['id'],$rd=$_POST['rd'],$type=$_POST['type'],$type1=$_POST['type1'],$local=$_POST['local'],$start=$date3,$end=$date4,$idGroupe=$_POST['eventIDG'],$prof=$_POST['prof'],$title=$_POST['title'],$typecm=$_POST['typecm']); 
       
     }
         }    
         }elseif($_POST['rd']=="3"){
            //  $this->db->insert("r_events", array('test'=>"hhy".$_POST['typeD']));
                   if($_POST['typeD']=="1"){
           
            $this->scolarite_modele->update_events($id=$_POST['id_D'],$rd=$_POST['rd'],$type=$_POST['typeD'],$type1=$_POST['type1'],$local=$_POST['localD'],$start=$_POST['startD'],$end=$_POST['endD'],$idGroupe=$_POST['eventIDG_D'],$prof=$_POST['profD'],$title=$_POST['titleD'],$typecm=$_POST['typecmD']); 
            
            } elseif($_POST['typeD']=="2"){
              // $this->scolarite_modele-> delete_events_ulterieurs($id_r=$id_repeat,$start=$_POST['start']);
               $date1=date('Y-m-d H:i:s',strtotime($_POST["startD"]));
               $date2=date('Y-m-d H:i:s',strtotime($_POST["endD"]));
                $this->scolarite_modele->update_events($id=$_POST['id_D'],$rd=$_POST['rd'],$type=$_POST['typeD'],$type1=$_POST['type1'],$local=$_POST['localD'],$start=$_POST['startD'],$end=$_POST['endD'],$idGroupe=$_POST['eventIDG_D'],$prof=$_POST['profD'],$title=$_POST['titleD'],$typecm=$_POST['typecmD']); 
             $i=0;
             // $this->db->insert('r_events', array('test' => $date1));
        while($date1< $date_f){
         //    $date_d = strtotime('+7 days', strtotime($_GET["start"]) );
         // $date_f1 = strtotime('+7 days', strtotime($_GET["end"]) );
            $i++;
          
        $date1=date('Y-m-d H:i:s',strtotime('+7 days', strtotime($date1) ));
        $date2=date('Y-m-d H:i:s',strtotime('+7 days', strtotime($date2 )));
      
      //  $diff=date_diff($date1,$date2);
             $this->scolarite_modele->update_events($id=$_POST['id_D'],$rd=$_POST['rd'],$type=$_POST['type'],$type1=$_POST['type1'],$local=$_POST['localD'],$start=$date1,$end=$date2,$idGroupe=$_POST['eventIDG_D'],$prof=$_POST['profD'],$title=$_POST['titleD'],$typecm=$_POST['typecmD']); 
       
         }
         }elseif($_POST['typeD']=="3"){
              $date1=date('Y-m-d H:i:s', strtotime($_POST["startD"]));
     $date2=date('Y-m-d H:i:s', strtotime($_POST["endD"]) );
     $date3=date('Y-m-d H:i:s',strtotime($_POST["startD"]));
               $date4=date('Y-m-d H:i:s',strtotime($_POST["endD"]));
     // $this->scolarite_modele->delete_all_events($id_r=$id_repeat);
   /*   $this->scolarite_modele->add_r_events(array(
            "start" => $date1,
            "end" => $date_f
            )
        );
      $id_repeat=$this->scolarite_modele->max_id_r_events();*/
   
     $i=0;
        while($date1< $date_f){
         //    $date_d = strtotime('+7 days', strtotime($_GET["start"]) );
         // $date_f1 = strtotime('+7 days', strtotime($_GET["end"]) );
            $i++;
          
        $date1=date('Y-m-d H:i:s',strtotime('+7 days', strtotime($date1) ));
        $date2=date('Y-m-d H:i:s',strtotime('+7 days', strtotime($date2 )));
      
      //  $diff=date_diff($date1,$date2);
             $this->scolarite_modele->update_events($id=$_POST['id_D'],$rd=$_POST['rd'],$type=$_POST['type'],$type1=$_POST['type1'],$local=$_POST['localD'],$start=$date1,$end=$date2,$idGroupe=$_POST['eventIDG_D'],$prof=$_POST['profD'],$title=$_POST['titleD'],$typecm=$_POST['typecmD']); 
       
         } $j=0;
        while($date1> $date_s){
         //    $date_d = strtotime('+7 days', strtotime($_GET["start"]) );
         // $date_f1 = strtotime('+7 days', strtotime($_GET["end"]) );
            $j++;
          
        $date3=date('Y-m-d H:i:s',strtotime('-7 days', strtotime($date1) ));
        $date4=date('Y-m-d H:i:s',strtotime('-7 days', strtotime($date2 )));
      
      //  $diff=date_diff($date1,$date2);
            $this->scolarite_modele->update_events($id=$_POST['id_D'],$rd=$_POST['rd'],$type=$_POST['type'],$type1=$_POST['type1'],$local=$_POST['localD'],$start=$date1,$end=$date2,$idGroupe=$_POST['eventIDG_D'],$prof=$_POST['profD'],$title=$_POST['titleD'],$typecm=$_POST['typecmD']); 
       
     }
         }
             
         }elseif($_POST["rd"]=="2"){
             if($_POST['type1']=="1"){
                 
       $this->scolarite_modele-> delete_unique_event($id=$_POST['id']);
               } elseif($_POST['type1']=="2"){
     $this->scolarite_modele-> delete_events_ulterieurs($id_r=$id_repeat,$start=$_POST['start']);
            
             } if($_POST['type1']=="3"){
     $this->scolarite_modele-> delete_all_events($id_r=$id_repeat);
         }
         }
      // echo date('Y-m-d',$date_f);
        // $date_d=strtotime('+7 days', strtotime($_POST["start"]) );
 

    
        
        header('Content-Type: application/json');
        echo '{"id":"'.$this->db->mysql_insert_id().'"}';
        
        
        exit;
    }
}//print_r($listeCours);
                     
$employe = $this->scolarite_modele->get_employee();
 $info_salle = $this->scolarite_modele->recuperer_salle();
  $data_session_courante = $this->scolarite_modele->get_session_courante_calendar();
 $data_courante = $this->scolarite_modele-> get_date_courante_calendar();
//  print_r($data_courante);
$data=array( 'employe'=>$employe,'local' => $info_salle['idLocal'],
                    
                    'annee' => $data_session_courante['annee'][0], 
                    'semestre' => $data_session_courante['semestre'][0],
                    'finCours' => $data_courante['finCours'],
                     'programme'=>$this->scolarite_modele->get_programme());
        //$this->loadData();
                       // $data=array('idProgramme'=>$idProgramme,'semestre'=>$semestre,'listeCours'=>$listeCours);
        $this->load->view("chef_departement/emplois_du_temps.php",$data);
    }
     public function emplois_du_temps_avec_date() 
    {   
              // $events=null;
        // $connection = mysqli_connect('127.0.0.1','root','','iup') or die(mysqli_error($connection));
         // set your user id settings
       
         
     $datetime_string = date('c',time());    
     $result="";
      if(isset($_POST['action']) or isset($_GET['view']))
{
    if(isset($_GET['view']))
    {  header('Content-Type: application/json');
     
        
        //$start = mysqli_real_escape_string($connection,$_GET["start"]);
        //$end = mysqli_real_escape_string($connection,$_GET["end"]);
                      $start=$_GET["start"];
                      $end=$_GET["end"];
                      $result = $this->scolarite_modele->get_events1($start,$end,$s=$_GET['semestre'],$p=$_GET['idProgramme'],$chek1=$_GET["chek1"],$local=$_GET["local"],$employe1=$_GET["employe1"]);
                      $events=$result['events'];
        
        echo json_encode($events); 
        //echo json_encode($result['end']); 
       exit;
    }
    
      
      
    elseif($_POST['action'] == "add")
    {    //header('Content-Type: application/x-json; charset=utf-8');
     //  echo(json_encode($this->scolarite->get_groupe($_POST['annee'], $_POST['semestre'], $_POST['sigle'])));
        
        $p=$_POST["chekb"];
        
       if($p=="1"){
        $date_f=date('Y-m-d', strtotime($_POST["dfin"]));
      // echo date('Y-m-d',$date_f);
        // $date_d=strtotime('+7 days', strtotime($_POST["start"]) );
 

     $date1=date('Y-m-d H:i:s', strtotime($_POST["start"]) );
     $date2=date('Y-m-d H:i:s', strtotime($_POST["end"]) );
      $this->scolarite_modele->add_r_events(array(
            "start" => $date1,
            "end" => $date_f
            )
        );
      $id_repeat=$this->scolarite_modele->max_id_r_events();
     $i=0;
        while($date1< $date_f){
         //    $date_d = strtotime('+7 days', strtotime($_GET["start"]) );
         // $date_f1 = strtotime('+7 days', strtotime($_GET["end"]) );
            $i++;
            if($i==1){
                $date1=date('Y-m-d H:i:s',strtotime('+0 days', strtotime($date1) ));
        $date2=date('Y-m-d H:i:s',strtotime('+0 days', strtotime($date2 )));
        
            }else{
        $date1=date('Y-m-d H:i:s',strtotime('+7 days', strtotime($date1) ));
        $date2=date('Y-m-d H:i:s',strtotime('+7 days', strtotime($date2 )));
            }
      //  $diff=date_diff($date1,$date2);
             
      $sql="INSERT INTO `events` (
                    `title` ,
                    `start` ,
                    `end` ,
                    `id_salle`,
                    `idGroupe`,
                     `dow`,
                     `id_repeat`
                    )
                    VALUES (
                    '".$_POST["title"] ."',
                    '".date('Y-m-d H:i:s', strtotime($date1))."',
                    '".date('Y-m-d H:i:s', strtotime($date2)  )."',  '".$_POST["local"]."', '".$_POST["idGroupe"]."', '".$_POST["typec"]."', '".$id_repeat."'
                    )";
        $this->db->query($sql);
         }
         
       // header('Content-Type: application/json');
        //echo '{"id":"'.mysqli_insert_id($connection).'"}';
        
        
         }else{
   
             
     $date1=date('Y-m-d H:i:s', strtotime($_POST["start"]) );
     $date2=date('Y-m-d H:i:s', strtotime($_POST["end"]) );
      
   $sql="INSERT INTO `events` (
                    `title` ,
                    `start` ,
                    `end` ,
                    `id_salle`,
                    `idGroupe`,
                     `dow`
                    )
                    VALUES (
                    '".$_POST["title"] ."',
                    '".date('Y-m-d H:i:s', strtotime($date1))."',
                    '".date('Y-m-d H:i:s', strtotime($date2)  )."',  '".$_POST["local"]."', '".$_POST["idGroupe"]."','".$_POST["typec"]."'
                    )";
      //  $diff=date_diff($date1,$date2);
//             
//       $sql="INSERT INTO `events` (
//                    `title` ,
//                    `start` ,
//                    `end` ,
//                    `id_salle`,
//                    `idGroupe`,
//                     `dow`
//                    )
//                    VALUES (
//                    '".$_POST["title"] ."',
//                    '".date('Y-m-d H:i:s', strtotime($_POST['start']))."',
//                    '".date('Y-m-d H:i:s', strtotime($_POST['end'])  )."',  '".$_POST["local"]."', '".$_POST["idGroupe"]."', '".$_POST["typec"]."'
//                    )";
        $this->db->query($sql);
       // $this->db->insert('r_events', array('test' => $sql));
       
         //  header('Content-Type: application/json');
       // echo '{"id":"'.mysqli_insert_id($connection).'"}';
         
           }
         $this->db->insert("r_events", array('test'=>$_POST['chk1']));
           if($_POST['chk1']=="1"){
            $this->scolarite_modele->update_g_employee($matriculeEmploye=$_POST["employe"],$idGroupe=$_POST["idGroupe"]);
           }
        exit;
    }
    elseif($_POST['action'] == "update")
    {
         $date1=date('Y-m-d H:i:s',strtotime('-2 hours', strtotime($_POST["start"]) ));
     $date2=date('Y-m-d H:i:s',strtotime('-2 hours', strtotime($_POST["end"]) ));
        mysqli_query($connection,"UPDATE `events` set 
            `start` = '".mysqli_real_escape_string($connection,$date1)."', 
            `end` = '".mysqli_real_escape_string($connection,$date2)."' 
            where  id = '".mysqli_real_escape_string($connection,$_POST["id"])."'");
        exit;
    }
    elseif($_POST['action'] == "delete") 
    { 
     /*   if(($_POST['rd'] == "1")){
        $this->scolarite_modele->update_events($_POST['id'] ,$type=$_POST['rd']  ) ;
    }if(($_POST['rd'] == "2")){
          $this->scolarite_modele->update_events($_POST['id'] ,$type=$_POST['rd']  ) ;
           
    } if(($_POST['rd'] == "3")){
        mysqli_query($connection,"DELETE from `events` where  id = '".mysqli_real_escape_string($connection,$_POST["id"])."'");
        if (mysqli_affected_rows($connection) > 0) {
            echo "1";
       }}*/
        $r_event=$this->scolarite_modele->r_events($id=$_POST['id']);
         $date_f=date('Y-m-d', strtotime($r_event["end"]));
         $date_s=date('Y-m-d', strtotime($r_event["start"]));
         $id_repeat=$r_event["id"];
        
         // $this->scolarite_modele->update_events($id=$_POST['id'],$rd=$_POST['rd'],$type=$_POST['type'],$type1=$_POST['type1'],$local=$_POST['local'],$start=$_POST['start'],$end=$_POST['end'],$idGroupe=$_POST['eventIDG'],$prof=$_POST['prof'],$title=$_POST['title']); 
          $this->scolarite_modele->update_g_employee($matriculeEmploye=$_POST["prof"],$idGroupe=$_POST["eventIDG"]);
          
         if($_POST['rd']=="1"){
            
          if($_POST['type']=="1"){
           
            $this->scolarite_modele->update_events($id=$_POST['id'],$rd=$_POST['rd'],$type=$_POST['type'],$type1=$_POST['type1'],$local=$_POST['local'],$start=$_POST['start'],$end=$_POST['end'],$idGroupe=$_POST['eventIDG'],$prof=$_POST['prof'],$title=$_POST['title']); 
            
            } elseif($_POST['type']=="2"){
               $this->scolarite_modele-> delete_events_ulterieurs($id_r=$id_repeat,$start=$_POST['start']);
               $date1=date('Y-m-d H:i:s',strtotime($_POST["start"]));
               $date2=date('Y-m-d H:i:s',strtotime($_POST["end"]));
                $this->scolarite_modele->update_unique_event($id=$_POST['id'],$rd=$_POST['rd'],$type=$_POST['type'],$type1=$_POST['type1'],$local=$_POST['local'],$start=$_POST['start'],$end=$_POST['end'],$idGroupe=$_POST['eventIDG'],$prof=$_POST['prof'],$title=$_POST['title']);
             $i=0;
              $this->db->insert('r_events', array('test' => $date1));
        while($date1< $date_f){
         //    $date_d = strtotime('+7 days', strtotime($_GET["start"]) );
         // $date_f1 = strtotime('+7 days', strtotime($_GET["end"]) );
            $i++;
          
        $date1=date('Y-m-d H:i:s',strtotime('+7 days', strtotime($date1) ));
        $date2=date('Y-m-d H:i:s',strtotime('+7 days', strtotime($date2 )));
      
      //  $diff=date_diff($date1,$date2);
             $this->scolarite_modele->update_events($id=$_POST['id'],$rd=$_POST['rd'],$type=$_POST['type'],$type1=$_POST['type1'],$local=$_POST['local'],$start=$date1,$end=$date2,$idGroupe=$_POST['eventIDG'],$prof=$_POST['prof'],$title=$_POST['title']); 
       
         }
         }elseif($_POST['type']=="3"){
              $date1=date('Y-m-d H:i:s', strtotime($_POST["start"]));
     $date2=date('Y-m-d H:i:s', strtotime($_POST["end"]) );
     $date3=date('Y-m-d H:i:s',strtotime($_POST["start"]));
               $date4=date('Y-m-d H:i:s',strtotime($_POST["end"]));
      $this->scolarite_modele->delete_all_events($id_r=$id_repeat);
   /*   $this->scolarite_modele->add_r_events(array(
            "start" => $date1,
            "end" => $date_f
            )
        );
      $id_repeat=$this->scolarite_modele->max_id_r_events();*/
   
     $i=0;
        while($date1< $date_f){
         //    $date_d = strtotime('+7 days', strtotime($_GET["start"]) );
         // $date_f1 = strtotime('+7 days', strtotime($_GET["end"]) );
            $i++;
          
        $date1=date('Y-m-d H:i:s',strtotime('+7 days', strtotime($date1) ));
        $date2=date('Y-m-d H:i:s',strtotime('+7 days', strtotime($date2 )));
      
      //  $diff=date_diff($date1,$date2);
             $this->scolarite_modele->update_events($id=$_POST['id'],$rd=$_POST['rd'],$type=$_POST['type'],$type1=$_POST['type1'],$local=$_POST['local'],$date1,$end=$date2,$idGroupe=$_POST['eventIDG'],$prof=$_POST['prof'],$title=$_POST['title']); 
       
         } $j=0;
        while($date1> $date_s){
         //    $date_d = strtotime('+7 days', strtotime($_GET["start"]) );
         // $date_f1 = strtotime('+7 days', strtotime($_GET["end"]) );
            $j++;
          
        $date3=date('Y-m-d H:i:s',strtotime('-7 days', strtotime($date1) ));
        $date4=date('Y-m-d H:i:s',strtotime('-7 days', strtotime($date2 )));
      
      //  $diff=date_diff($date1,$date2);
            $this->scolarite_modele->update_events($id=$_POST['id'],$rd=$_POST['rd'],$type=$_POST['type'],$type1=$_POST['type1'],$local=$_POST['local'],$start=$date3,$end=$date4,$idGroupe=$_POST['eventIDG'],$prof=$_POST['prof'],$title=$_POST['title']); 
       
     }
         }    
         }else{
             if($_POST['type1']=="1"){
                 
     $this->scolarite_modele-> delete_unique_event($id=$_POST['id']);
               } elseif($_POST['type1']=="2"){
     $this->scolarite_modele-> delete_events_ulterieurs($id_r=$id_repeat,$start=$_POST['start']);
            
             } if($_POST['type1']=="3"){
     $this->scolarite_modele-> delete_all_events($id_r=$id_repeat);
         }
         }
      // echo date('Y-m-d',$date_f);
        // $date_d=strtotime('+7 days', strtotime($_POST["start"]) );
 

    
        
        header('Content-Type: application/json');
        echo '{"id":"'.$this->db->mysql_insert_id().'"}';
        
        
        exit;
    }
}//print_r($listeCours);
                     
$employe = $this->scolarite_modele->get_employee();
 $info_salle = $this->scolarite_modele->recuperer_salle();
  $data_session_courante = $this->scolarite_modele->get_session_courante_calendar();
 $data_courante = $this->scolarite_modele-> get_date_courante_calendar();
//  print_r($data_courante);
$data=array( 'employe'=>$employe,'local' => $info_salle['idLocal'],
                    
                    'annee' => $data_session_courante['annee'][0], 
                    'semestre' => $data_session_courante['semestre'][0],
                    'finCours' => $data_courante['finCours'],
                     'programme'=>$this->scolarite_modele->get_programme());
        //$this->loadData();
                       // $data=array('idProgramme'=>$idProgramme,'semestre'=>$semestre,'listeCours'=>$listeCours);
        $this->load->view("chef_departement/emplois_du_temps_date.php",$data);
    }
    function selection_annee_horaire_emplois() {
		$infoDateAnnee = NULL;
        $this->form_validation->set_rules('annee', 'Numéro du groupe', 'string');
        
        if ($this->form_validation->run()) {

            $infoDateAnnee = $this->input->post();
            $this->choisir_groupe_horaire($infoDateAnnee);
        } else {
             $data_sigle_cours = $this->scolarite_modele->get_cours_actif_enseignant();
            $data_session_courante = $this->scolarite_modele->get_session_courante();
            
            $data_session_courante = $this->scolarite_modele->get_session_courante();
            $listeCours = $this->scolarite_modele->recuperer_cours();
            if ($listeCours == NULL) {
                $data['typeBox'] = 'warning_box';
                $data['informations'] = 'Veuillez créer au moins un module.';
                $this->load->view('scolarite/modification_confirme', $data);
            } else { $employe = $this->scolarite_modele->get_employee();

 $info_salle = $this->scolarite_modele->recuperer_salle();
				$data = array('sigleCours' => $data_sigle_cours['sigleCours'],
                    'titre' => $data_sigle_cours['titre'],
                    'annee' => $data_session_courante['annee'][0], 
                    'semestre' => $data_session_courante['semestre'][0],
                     'programme'=>$this->scolarite_modele->get_programme(),
                     'local' => $info_salle['idLocal'],
                     'employe'=>$employe);
                $this->load->view("chef_departement/choisir_annee_horaire_emplois", $data);
            }
        }
    }

   public function loadData()
	{
		$loadType=$_POST['loadType'];
		$loadId=$_POST['loadId'];
                $annee=$_POST['annee'];
                $semestre=$_POST['semestre'];
                $type=$_POST['type'];
                $matriculeEmploye=$_POST['matriculeEmploye'];

		$result=$this->scolarite_modele->getData($loadType,$loadId,$annee,$semestre,$type,$matriculeEmploye);
                
		$HTML="";
		if($loadType=="groupe"){
		if($result->num_rows() > 0){
			foreach($result->result() as $list){
				$HTML.="<option value='".$list->idGroupe."'>".$list->idGroupe."</option>";
			}
                }}elseif($loadType=="employe"){
                    if($result->num_rows() > 0){
			foreach($result->result() as $list){
				$HTML.="<option value='".$list->matriculeEmploye."'>".$list->nom." ".$list->prenom."</option>";
			}
                }
                }elseif($loadType=="infomodule_element"){
                     if($result->num_rows() > 0){
			foreach($result->result() as $list){
				$HTML.="<option value='".$list->sigle."'>".$list->sigle." ".$list->titre."</option>";
			}
                }}
		echo $HTML;
	}
         public function ElementsPlanning()
	{
		$loadType=$_POST['loadType'];
		$loadId=$_POST['loadId'];
                $annee=$_POST['annee'];
                $semestre=$_POST['semestre'];
                $type=$_POST['type'];
                $matriculeEmploye=$_POST['matriculeEmploye'];

		$result=$this->scolarite_modele->getInfoElements($loadType,$loadId,$annee,$semestre,$type,$matriculeEmploye);
             //   $this->db->insert("r_events", array('test'=>"SELECT distinct p.sigle,m.titre FROM `planetudes` p,module m,unite u where p.sigle=m.sigle and u.sigle=m.sigleunite and u.semestre=$semestre and u.idProgramme='".$loadId."' and p.sigle not in(select sigle from infomodule_element)  "));
              
		$HTML="";
		if($loadType=="infomodule_element"){
                     if($result->num_rows() > 0){
			foreach($result->result() as $list){
				$HTML.="<option value='".$list->sigle."'>".$list->sigle." ".$list->titre."</option>";
			}
                }}elseif($loadType=="anc_element"){
                     if($result->num_rows() > 0){
			foreach($result->result() as $list){
				$HTML.="<option value='".$list->sigle."'>".$list->sigle." ".$list->titre."</option>";
			}
                }}elseif($loadType=="tous_element"){
                     if($result->num_rows() > 0){
			foreach($result->result() as $list){
				$HTML.="<option value='".$list->sigle."'>".$list->sigle." ".$list->titre."</option>";
			}
                }}elseif($loadType=="etudiant_element"){
                      
                     if($result->num_rows() > 0){
			foreach($result->result() as $list){
				$HTML.="<option value='".$list->matriculeetudiant."'>".$list->matriculeetudiant." ".$list->nom."</option>";
			}
                }}
                
		echo $HTML;
	}
        function chevauchement(){
        $chevauchement = $this->scolarite_modele->chevauchement($startTimeM=$_GET['startTimeM'],$endTimeM=$_GET['endTimeM'],$prof=$_GET['prof'],$local2=$_GET['local2'],$id=$_GET['id']);
          
        echo(json_encode($chevauchement));
        }
         function chevauchement2(){
        $chevauchement = $this->scolarite_modele->chevauchement2($startTimeM=$_GET['startTimeM'],$endTimeM=$_GET['endTimeM'],$prof=$_GET['prof'],$local2=$_GET['local2'],$id=$_GET['id']);
          
        echo(json_encode($chevauchement));
        }
}
