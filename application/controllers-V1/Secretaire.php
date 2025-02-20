<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Secretaire extends CI_Controller {


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
            if( !in_array('secretaire', $this->session->userdata('profil')))
                redirect();
            $this->load->model('secretaire_modele');
            $this->load->model('search_modele');
           $this->clear_output();
            $this->load->library('Classes/PHPExcel');
           $this->lang->load('iup_lang','french');
           $this->lang->load('menusLabels_lang','french');
        }
     
        function clear_output()
        {
            $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
            $this->output->set_header("Cache-Control: post-check=0, pre-check=0", false);
            $this->output->set_header("Pragma: no-cache"); 
        }
         var $skey 	= "SuPerEncKey2010"; // you can change it
     public  function safe_b64encode($string) 
     {
 
        $data = base64_encode($string);
        $data = str_replace(array('+','/','='),array('-','_',''),$data);
        return $data;
     }
 
	public function safe_b64decode($string) {
        $data = str_replace(array('-','_'),array('+','/'),$string);
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

        public function index()
	{
            $this->load->view('secretaire/index');
	}
        
        public function mot_de_passe()
        {
            $data['errorMessage'] = '';
            $this->load->view('secretaire/modifier_mot_de_passe',$data);
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
            /*
     * fonction pour convertir le code du semestre par son nom 
     * elle prend en parametre le numero du semestre soit(1,2,3)
     * et elle retourne le nom (Automn,ete,printemps)
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
         * fonction pour modifier le mot de passe personnele de la secretaire
         */
        public function modifier_mot_de_passe()
        {
             if($this->secretaire_modele->get_old_password($this->session->userdata('login')) == $this->input->post('old_password'))
             {
                $passwordIsValid = $this->password_check($this->input->post('new_password'));
                if($passwordIsValid == TRUE)
                {
                    if( $this->input->post('new_password') == $this->input->post('confirmed_password'))
                    {
                        $this->secretaire_modele->set_password($this->input->post('new_password'),$this->session->userdata('login'));
                        $data['titre'] = 'Modifier Mot de Passe';
                        $data['type'] ='valid_box';
                        $data['informations'] = 'Le mot de passe a été modifié avec succès.';
                        $this->load->view('secretaire/modification_confirme',$data);
                    }
                    else
                    {
                        $data['errorMessage'] = '<div class="error_box">
                            Les deux nouveaux mots de passe ne sont pas identiques.
                            </div>';
                        $this->load->view('secretaire/modifier_mot_de_passe',$data);
                    }
                }
                else
                {
                    $data['errorMessage'] = '<div class="error_box">
                        Le mot de passe doit contenir 8 à 10 lettres et chiffres dont au moins une lettre et un chiffre.
                        </div>';
                    $this->load->view('secretaire/modifier_mot_de_passe', $data);
                }
             }
             else
             {
                $data['errorMessage'] = '<div class="error_box">
                       L\'ancien mot de passe est erroné.
                        </div>';
                     $this->load->view('secretaire/modifier_mot_de_passe',$data);
             }
        }

    /*
     * Fonction appeler pour trouver l'etudiant a consulter
     *
     */

    function trouver_etudiant_a_consulter() 
    {
        $tables = array("etudiant","planetudes");
        $join_keys = array('etudiant.matriculeEtudiant = planetudes.matriculeEtudiant');
        $db_columns = array('etudiant.matriculeEtudiant as matriculeE', 'nom', 'prenom', 'sexe');
        $grid_columns = array('Matricule', 'Nom', 'Prénom', 'Genre');
        $result_columns = array('matriculeE', 'nom', 'prenom','sexe');
        $action = 'consulter_etudiant';
        $id_action = '';
        $db_where = "WHERE actif ='1'";
        $result = $this->search_modele->getSearchResult($tables, $db_columns, $grid_columns,
                $join_keys, $action, $id_action,$db_where,$result_columns);    
        $titre = 'Consulter étudiant actif ';
        $controlleur = "secretaire";
        $data = array('titre' => $titre, 'controlleur' => $controlleur, 'result' => $result);

        $this->load->view("recherche_parametree", $data);
    }

    /*
     * Fait appel a la vue de consultation d'un etudiant.
     * @param -id : le parametre avec lequel identifier l'etudiant selectionne
     */

    function consulter_etudiant($matricule) 
    {
        $informations_etudiant = $this->secretaire_modele->get_informations($matricule);
        $this->load->view("secretaire/consulter_info_personnelle_etudiant", $informations_etudiant);
    }
    
    /*
     * fonction pour afficher le choix de l annee et le semestre 
     * pour consulter les absences
     */
    function choix_session_absence_consultation()
    {
        $data['annee'] = $this->secretaire_modele->recuperer_annee();
        $data['courante'] = $this->secretaire_modele->get_session_courante();
        $this->load->view("secretaire/choix_session_abs_consultation", $data);
    }
    
    function mes_cours_consultation()
    {
        $tables = array("groupe","module");
        $join_keys = array('groupe.sigle = module.sigle');
        $db_columns = array('idGroupe', 'typeGroupe');
        $grid_columns = array('Groupe', 'Type Groupe');
        $action = 'consulter_absences/'. $this->encode($this->input->post('annee')) . '/' . $this->encode($this->input->post('session'));
        $id_action = 'idGroupe';
        $where = "WHERE annee = " . $_POST['annee'] . " AND semestre = " .$_POST['session'];
        $result = $this->search_modele->getSearchResult($tables, $db_columns, $grid_columns, $join_keys, $action, $id_action,$where);
        $titre = 'Les groupes enseignés au semestre <b>'.$this->get_session_nom($_POST['session']).' '.$_POST['annee'].'</b>';
        $controlleur = "secretaire";
        $data = array('titre' => $titre, 'controlleur' => $controlleur, 'result' => $result);
		$this->load->view("recherche_parametree", $data);
    }
    
        function consulter_absences($annee,$semestre,$idGroupe)
    {
        $annee = $this->decode($annee);
        $semestre = $this->decode($semestre);
        $infoAbsences = $this->secretaire_modele->get_info_absences($annee,$semestre,$idGroupe);
        if($infoAbsences == NULL)
        {
            $data['titre'] = 'Consulter Absences';
            $data['type'] = 'valid_box';
            $data['informations'] = 'Aucune absence n\'est enregistrée.';
            $this->load->view('secretaire/modification_confirme', $data);
        }
        else
        {
            $this->load->view('secretaire/afficher_absences',$infoAbsences);
        }
    }
    /*
     * fonction pour la consutation des horaires de cours 
     */
    function consulter_horaire_cours()
    {
        $this->form_validation->set_rules('choixCours', 'choix de cours', 'required');
       
        if ($this->form_validation->run()) 
        {                      
            $data['sigle'] = $this->input->post('choixCours');
            $data['horaires_disponibles'] = $this->secretaire_modele->get_horaires_dispo($data['sigle']);
            $this->load->view('secretaire/choix_horaire', $data);
        }
        else 
        {
            $listeCours = $this->secretaire_modele->recuperer_cours();
			if($listeCours == NULL)
            {
                    $data['titre'] = 'Consulter Horaires';
                    $data['type'] ='warning_box';
                    $data['informations'] = 'Aucun groupe n\'est encore créé.';
                    $this->load->view('secretaire/modification_confirme',$data);
            }
            else
            {
                    $this->load->view('secretaire/choix_cours',$listeCours);
            }
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
            $periodeGroupe['titre'] = "Horaire du module ".$sigle. " : ".$semestre.' '.$date[1];
            $periodeGroupe['detailHoraire'] = NULL;
            $dataIdGroupe = $this->secretaire_modele->get_idGroupe_anneeCourante($sigle,$date[0], $date[1]);

            if (is_array($dataIdGroupe)) {
                foreach ($dataIdGroupe['idGroupe'] as $idG) {
                    $periodeGroupe['detailHoraire'][] = $this->secretaire_modele->get_periode_groupe($idG);
                }
            }
			$this->load->view('secretaire/consulter_horaire_cours', $periodeGroupe);

        } 
        else 
        {
            $this->load->view('secretaire/index');
        }
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
                    $this->consulter_note_par_etudiant($this->input->post('annee'), $this->input->post('semestre'), '');
                    break;
                case 'classe':
                    $this->consulter_note_par_classe($this->input->post('annee'), $this->input->post('semestre'), '');
                    break;
                default:
                   $this->load->view('secretaire/index');
                    break;
            }
        } 
        else 
        {
            $data['mode'] = array('mode' => $mode);
            $data['courante'] = $this->secretaire_modele->get_session_courante();
            $data['annee'] = $this->secretaire_modele->recuperer_annee();
            $data['redirection'] = "selection_semestre";
            $this->load->view('secretaire/choix_periode', $data);
        }
    }
    function consulter_note_par_etudiant($annee, $semestre, $matricule) 
    {
        if ($matricule != null) 
        {
            $data['matricule'] = $matricule;
            $data['annee'] = $annee;
            if($semestre == 1)
            {
                $data['semestre'] = 'Printemps ';
            }
            elseif($semestre == 2)
            {
                $data['semestre'] = 'Été ';
            }
            elseif($semestre == 3)
            {
                $data['semestre'] = 'Automne ';
            }
            else
            {
                $data['semestre'] = $semestre;
            }
            $data['resultas'] = $this->secretaire_modele->recuperer_note($matricule, $annee, $semestre);
            $this->load->view('secretaire/details_notes_etudiant', $data);
        } 
        else 
        {
            $semestre = intval($semestre);
            $tables = array("etudiant", "listeetudiants");
            $join_keys = array('etudiant.matriculeEtudiant = listeetudiants.matriculeEtudiant');
            $db_columns = array('etudiant.matriculeEtudiant as matricule', 'nom', 'prenom');
            $result_columns = array('matricule', 'nom', 'prenom');
            $grid_columns = array('Matricule', 'Nom', 'Prénom');
            $action = 'consulter_note_par_etudiant/' . $annee . '/' . $semestre;
            $id_action = '';
            $where = "where idGroupe like '%" . $annee .'0'.$semestre . "%'";
            $result = $this->search_modele->getSearchResult($tables, $db_columns, $grid_columns, $join_keys, $action, $id_action, $where, $result_columns);

            $titre = 'Consulter les notes d\'un étudiant, semestre <b>'.$this->get_session_nom($semestre)
                    .'  '.$annee.'</b><br> Sélectionner l\'étudiant';
            $controlleur = "secretaire";
            $data = array('titre' => $titre, 'controlleur' => $controlleur, 'result' => $result);


            $this->load->view("recherche_parametree", $data);
        }
    }
    function consulter_note_par_classe($annee, $semestre, $sigle) 
    {
   
        if ($sigle != null) {
            $data['sigle'] = $sigle;
            $data['annee'] = $annee;
            $data['semestre'] = $semestre;
            $data['matricules'] = $this->secretaire_modele->recuperer_liste_etudiants($sigle, $annee, $semestre);
            $data['resultas'] = $this->secretaire_modele->recuperer_note_par_classe($data['matricules'], $annee, $semestre,$sigle);
            $this->load->view('secretaire/details_note_cote_module', $data);
        } else {
            $tables = array("groupe", "module");
            $join_keys = array('groupe.sigle = module.sigle');
            $db_columns = array('groupe.sigle as sigle', 'titre');
            $result_columns = array('sigle', 'titre');
            $grid_columns = array('Sigle', 'Titre');
            $action = 'consulter_note_par_classe/' . $annee . '/' . $semestre;
            $id_action = '';
            $where = "where annee = $annee and semestre = $semestre";

            $titre = 'Sélectionner Module: ';
            $result = $this->search_modele->getSearchResult($tables, $db_columns, $grid_columns, $join_keys, $action, $id_action, $where, $result_columns);
            $controlleur = "secretaire";
            $data = array('titre' => $titre, 'controlleur' => $controlleur, 'result' => $result);


            $this->load->view("recherche_parametree", $data);
        }
    }
    
    function generer_rappor_note_module()
    {
 
        setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
        $date = utf8_encode(strftime("%d-%B-%Y"));
        $objXLS = new PHPExcel();
        $objSheet = $objXLS->setActiveSheetIndex(0);
        /// formattage du Titre de la liste.
        $objSheet->getDefaultStyle()->getFont()->setName('Courier New');
        $objSheet->setCellValue('A1', 'INSTITUT UNIVERSITAIRE PROFESSIONNEL');
        $objSheet->getStyle('A1')->getFont()->setBold(TRUE);
        
        $titreFichierExcel = 'Notes_'.$_POST['annee'].$_POST['semestre'].'_'.$_POST['sigle'];
        $objSheet->setCellValue('A3','Notes et Cotes du module ' );
        $infoModule = $this->secretaire_modele->recuperer_module($_POST['sigle']);

        $objSheet->setCellValue('A4',$_POST['sigle'].' '.$infoModule['titre'].', '.
                $infoModule['nbCredits'].' crédits.' );
        $objSheet->setCellValue('A5', 'Semestre : '.$this->get_session_nom($_POST['semestre']).' '.$_POST['annee']);
        $objSheet->setCellValue('A6', 'Enseignant responsable : '.$infoModule['nom'] .' '.$infoModule['prenom']);
        $objSheet->setCellValue('C10', 'Matricules');
        $objSheet->setCellValue('D10', 'Notes');
        $objSheet->setCellValue('E10', 'Cotes');
        $objSheet->setCellValue('F10', 'Lien');


        $objSheet->getStyle('C10')->getFont()->setBold(TRUE);
        $objSheet->getColumnDimension('C')->setAutoSize(TRUE);
        $objSheet->getStyle('D10')->getFont()->setBold(TRUE);
        $objSheet->getColumnDimension('D')->setAutoSize(TRUE);
        $objSheet->getStyle('E10')->getFont()->setBold(TRUE);
        $objSheet->getColumnDimension('E')->setAutoSize(TRUE);
        $objSheet->getStyle('F10')->getFont()->setBold(TRUE);
        $objSheet->getColumnDimension('F')->setAutoSize(TRUE);
        $nombreDesEtudiants = count($_POST['matricules']);
       
        for($i=0 ;$i<count($_POST['matricules']) ;$i++)
        {
            $objSheet->setCellValueByColumnAndRow(2,$i+11,$_POST['matricules'][$i]);
        }
        for($i=0 ;$i<count($_POST['matricules']) ;$i++)
        {
            if($_POST[$i]['note'] == '-1')
            {
                 $objSheet->setCellValueByColumnAndRow(3,$i+11,'');
                $objSheet->setCellValueByColumnAndRow(4,$i+11,$_POST[$i]['cote']);
                $objSheet->setCellValueByColumnAndRow(5,$i+11,$_POST[$i]['lien']);
            }
            else
            {
                $objSheet->setCellValueByColumnAndRow(3,$i+11,$_POST[$i]['note']);
                $objSheet->setCellValueByColumnAndRow(4,$i+11,$_POST[$i]['cote']);
                $objSheet->setCellValueByColumnAndRow(5,$i+11,$_POST[$i]['lien']);
            }
        }
        
        for($i=2;$i<6;$i++)
        {
            for($j=10 ;($j<$nombreDesEtudiants+11);$j++)
            {

                $objSheet->getStyleByColumnAndRow($i, $j)->getAlignment()->setHorizontal
                        (PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $objSheet->getStyleByColumnAndRow($i, $j)->getBorders()->applyFromArray(
                    array(
                        'allborders' => array(
                            'style' => PHPExcel_Style_Border::BORDER_THIN,
                            'color' => array(
                                'rgb' => '808080'
                            )
                        )
                    )
                );
            }
        }

        
     
 $objWriter = PHPExcel_IOFactory::createWriter($objXLS, 'Excel5');

        $objWriter = PHPExcel_IOFactory::createWriter($objXLS, 'Excel5');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $titreFichierExcel . '.xls"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($objXLS, 'Excel5');

        $objWriter->save('php://output');
    }
    function recuperer_liste_etudiants($sigle, $annee, $semestre) 
    {
        $matricules = '';

        $this->db->where(array('sigle' => $sigle, 'annee' => $annee, 'semestre' => $semestre));
        $this->db->select('matriculeEtudiant');
        $this->db->from('listeetudiants');
        $this->db->join('groupe', 'listeetudiants.idGroupe = groupe.idGroupe');

        $res = $this->db->get();

        if ($res->num_rows() > 0) {
            foreach ($res->result_array() as $row) {
                $matricules[] = $row['matriculeEtudiant'];
            }
        }
        return $matricules;
    }
    /*
     * fonction qui affiche tous les groupes qui sont offerts durant l annee courante 
     */
    function entrer_absences()
    {
        $sessionCourante = $this->secretaire_modele->get_session_courante();
        $anneeCourante =$sessionCourante['annee'];
        $semestreCourant = $sessionCourante['semestre'];
        
        $tables = array("groupe");
        $join_keys = null;
        $db_columns = array('idGroupe', 'numGroupe', 'typeGroupe', 'annee', 'semestre');
        $grid_columns = array('Groupe', 'Numéro du groupe', 'Type', "Année", 'Semestre');
        $action = 'afficher_etudiant_groupe';
        $id_action = 'idGroupe';
        $db_where = "where annee = $anneeCourante and semestre = $semestreCourant";
        $result = $this->search_modele->getSearchResult($tables, $db_columns, $grid_columns, $join_keys, $action, $id_action, $db_where);
        $titre = 'Les groupes offerts au semestre courant : <b>' . $this->get_session_nom($semestreCourant) .'  '.$anneeCourante . '</b>';
        $controlleur = "secretaire";
        $data = array('titre' => $titre, 'controlleur' => $controlleur, 'result' => $result);
        $this->load->view("recherche_parametree", $data);
    }
    
    /*
     * fonction qui affiche tous les etudiants inscrits dans un groupe precis
     */
    function afficher_etudiant_groupe($idGroupe)
    {
         $sessionCourante = $this->secretaire_modele->get_session_courante();
        $anneeCourante =$sessionCourante['annee'];
        $semestreCourant = $sessionCourante['semestre'];
         //tous les etudiants inscrits dans un groupe specifie
        $data['etudiant'] = $this->secretaire_modele->get_Etudiants($idGroupe);
        $data['annee'] = $anneeCourante;
        $data['session'] = $semestreCourant;
        $data['idGroupe'] = $idGroupe;
        // correction RM 23 février 2013
		// $data['titre'] = 'Liste des étudiants du groupe '.$idGroupe.', semestre '.
		$data['titre'] = 'Liste des étudiants du groupe '.$this->secretaire_modele->corrigerNumGroupe($idGroupe).', semestre '.
        $this->get_session_nom($semestreCourant).' '.$anneeCourante.'. 
                        Cocher le ou les étudiants absents.';
        $this->load->view('secretaire/entrer_absences',$data);
    }
    
      
        /*
     * fonction pour convertir la date de DD/MM/YYYY a YYYY-MM-DD
     */
    function convert_date($date)
    {
        $year = '';
        $month = '';
        $day = '';
      
        for($i=0;$i<strlen($date);$i++)
        {
            if($i<=1)
            {
                $day .=$date[$i];
            }
            if($i>2 && $i<5)
            {
                $month .= $date[$i];
            }
            if($i>5)
            {
                $year .= $date[$i];
            }
        }
       
        $datephp = $year.'-'.$month.'-'.$day;
        return $datephp;
    }
    /*
     * fonction qui converti le type de date Atom en yyyy-mm-dd
     */
    function convert_date_ATOM($date)
    {
        $dateConverti ='';
        for($i=0;$i<10;$i++)
        {
            $dateConverti .= $date[$i];
        }
        return $dateConverti;
    }
     /*
     * fonction pour enregistrer les absences entrer par la secretaire
     */
    function enregistrer_absences()
    {
        $format = 'DATE_ATOM';
        $time = time();

        $date = $this->convert_date_ATOM(standard_date($format, $time)); 
        //on teste si aucun etudiant n est selectionne
        if(!isset($_POST['items']))
        {
            $data['titre'] = 'Entrer Absences';
            $data['type'] = 'error_box';
            $data['informations'] = 'Erreur : il faut sélectionner au moins un étudiant.';
            $this->load->view('secretaire/confirmation_absences', $data);
        }
        else
        {
            //on teste si la duree n'est pas selectionne
            if(!isset($_POST['duree']) && !isset($_POST['duree2']))
            {
                $data['titre'] = 'Entrer Absences';
                $data['type'] = 'error_box';
                $data['informations'] = 'Erreur : vous avez oublié de spécifier la durée de l\'absence.';
                $this->load->view('secretaire/confirmation_absences', $data);
            }
            else
            {
                if(isset($_POST['duree'])&& isset($_POST['duree2']))
                {
                    if(($_POST['duree'] == 0) && ($_POST['duree2'] == 0.0))
                    {
                        $data['titre'] = 'Entrer Absences';
                        $data['type'] = 'error_box';
                        $data['informations'] = 'Erreur : 0 n\'est pas une durée valide pour une absence.';
                        $this->load->view('secretaire/confirmation_absences', $data);
                    }
                    else
                    {
                        if(!isset($_POST['periode']))
                        {
                            $data['titre'] = 'Entrer Absences';
                            $data['type'] = 'error_box';
                            $data['informations'] = 'Erreur : vous avez oublié de spécifier la période de l\'absence.';
                            $this->load->view('secretaire/confirmation_absences', $data);
                        }
                        else
                        {
                            $dateCourante = $this->secretaire_modele->get_date_courante();
                            //si la date choisis n'est pas dans l intervalle des date du debu et fin des cours
                            if($this->convert_date($_POST['date'])<$dateCourante['debutCours'] || $this->convert_date($_POST['date'])>$dateCourante['finCours'])
                            {
                                $data['titre'] = 'Entrer Absences';
                                $data['type'] = 'error_box';

                                $data['informations'] = 'Erreur : la date choisie <b>' .$this->convert_date($_POST['date']).' </b>ne fait pas partie du semestre courant  <b>'.
                                $this->get_session_nom($dateCourante['semestre']).' '. $dateCourante['annee']. ' </b>. Si le semestre courant est en erreur, contactez l\'administrateur réseau.';
                                $this->load->view('secretaire/confirmation_absences', $data);
                            }
                            else
                            {
                                //on teste si la date choisi est dans le futur
                                if($this->convert_date($_POST['date'])> $date )
                                {
                                    $data['titre'] = 'Entrer Absences';
                                    $data['type'] = 'error_box';
                                    $data['informations'] = 'Erreur : on ne peut choisir une date postérieure à la date présente.';
                                    $this->load->view('secretaire/confirmation_absences', $data);
                                }
                                else
                                {
                                    $this->secretaire_modele->enregistrer_absences($_POST);
                                    $data['titre'] = 'Entrer Absences';
                                    $data['type'] = 'valid_box';
                                    $data['informations'] = 'Les absences au groupe <b>'.$_POST['idGroupe'].'</b> ont bien été enregistrées.';
                                    $this->load->view('secretaire/confirmation_absences', $data);
                                }
                            }
                        }
                    }
                }
                else
                {
                    if(isset($_POST['duree']))
                    {
                        if($_POST['duree']==0)
                        {
                         
                        
                        $data['titre'] = 'Entrer Absences';
                        $data['type'] = 'error_box';
                        $data['informations'] = 'Erreur : 0 n\'est pas une durée valide pour une absence.';
                        $this->load->view('secretaire/confirmation_absences', $data);
                        }
                        else
                        {
                               if(!isset($_POST['periode']))
                        {
                            $data['titre'] = 'Entrer Absences';
                            $data['type'] = 'error_box';
                            $data['informations'] = 'Erreur : vous avez oublié de spécifier la période de l\'absence.';
                            $this->load->view('secretaire/confirmation_absences', $data);
                        }
                        else
                        {
                            $dateCourante = $this->secretaire_modele->get_date_courante();
                            //si la date choisis n'est pas dans l intervalle des date du debu et fin des cours
                            if($this->convert_date($_POST['date'])<$dateCourante['debutCours'] || $this->convert_date($_POST['date'])>$dateCourante['finCours'])
                            {
                                $data['titre'] = 'Entrer Absences';
                                $data['type'] = 'error_box';

                                $data['informations'] = 'Erreur :  la date choisie <b>' .$this->convert_date($_POST['date']).' </b>ne fait pas partie du semestre courant  <b>'.
                                $this->get_session_nom($dateCourante['semestre']).' '. $dateCourante['annee']. '. </b> Si le semestre courant est en erreur, contactez l\'administrateur réseau.';
                                $this->load->view('secretaire/confirmation_absences', $data);
                            }
                            else
                            {
                                //on teste si la date choisi est dans le futur
                                if($this->convert_date($_POST['date'])> $date )
                                {
                                    $data['titre'] = 'Entrer Absences';
                                    $data['type'] = 'error_box';
                                    $data['informations'] = 'Erreur : on ne peut choisir une date postérieure à la date présente.';
                                    $this->load->view('secretaire/confirmation_absences', $data);
                                }
                                else
                                {
                                    $this->secretaire_modele->enregistrer_absences($_POST);
                                    $data['titre'] = 'Entrer Absences';
                                    $data['type'] = 'valid_box';
                                    $data['informations'] = 'Les absences au groupe <b>'.$_POST['idGroupe'].'</b> ont bien été enregistrées.';
                                    $this->load->view('secretaire/confirmation_absences', $data);
                                }
                            }
                        }
                        }
                        
                    }
                    else 
                    {
                        if($_POST['duree2']==0)
                        {
                             $data['titre'] = 'Entrer Absences';
                        $data['type'] = 'error_box';
                        $data['informations'] = 'Erreur : 0 n\'est pas une durée valide pour une absence.';
                        $this->load->view('secretaire/confirmation_absences', $data);
                            
                        }
                        else
                        {
                           if(!isset($_POST['periode']))
                            {
                                $data['titre'] = 'Entrer Absences';
                                $data['type'] = 'error_box';
                                $data['informations'] = 'Erreur : vous avez oublié de spécifier la période de l\'absence.';
                                $this->load->view('secretaire/confirmation_absences', $data);
                            }
                            else
                            {
                                $dateCourante = $this->secretaire_modele->get_date_courante();
                                //si la date choisis n'est pas dans l intervalle des date du debu et fin des cours
                                if($this->convert_date($_POST['date'])<$dateCourante['debutCours'] || $this->convert_date($_POST['date'])>$dateCourante['finCours'])
                                {
                                    $data['titre'] = 'Entrer Absences';
                                    $data['type'] = 'error_box';

                                    $data['informations'] = 'Erreur :  La date choisie <b>' .$this->convert_date($_POST['date']).' </b>ne fait pas partie du semestre courant  <b>'.
                                    $this->get_session_nom($dateCourante['semestre']).' '. $dateCourante['annee']. ' </b>. Si le semestre courant est en erreur, contactez l\'administrateur réseau.';
                                    $this->load->view('secretaire/confirmation_absences', $data);
                                }
                                else
                                {
                                    //on teste si la date choisi est dans le futur
                                    if($this->convert_date($_POST['date'])> $date )
                                    {
                                        $data['titre'] = 'Entrer Absences';
                                        $data['type'] = 'error_box';
                                        $data['informations'] = 'Erreur : on ne peut choisir une date postérieure à la date présente.';
                                        $this->load->view('secretaire/confirmation_absences', $data);
                                    }
                                    else
                                    {
                                        $this->secretaire_modele->enregistrer_absences($_POST);
                                        $data['titre'] = 'Entrer Absences';
                                        $data['type'] = 'valid_box';
                                        $data['informations'] = 'Les absences au groupe <b>'.$_POST['idGroupe'].'</b> ont bien été enregistrées.';
                                        $this->load->view('secretaire/confirmation_absences', $data);
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}
