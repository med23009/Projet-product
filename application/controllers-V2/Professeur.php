<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

//if ( ! defined('professeur')) exit('YOU ARE NOT ALLOW TO ACCESS THIS PAGE');

class Professeur extends CI_Controller {

//Alfa Hafedh 02-03-2016
    var $passwordChef = '12';

    function __construct() {
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
        if (!in_array('professeur', $this->session->userdata('profil')))
            redirect();
        $this->load->helper('download');
        $this->load->model('professeur_modele');
          $this->load->model('scolarite_modele');
        $this->load->library('table');
        $this->load->library('Classes/PHPExcel');
        $this->load->model('search_modele');
        
        $this->clear_output();        
        $this->lang->load('iup_lang','french');
        $this->lang->load('menusLabels_lang','french');
    }

    function clear_output() {
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->output->set_header("Cache-Control: post-check=0, pre-check=0", false);
        $this->output->set_header("Pragma: no-cache");
    }

    var $skey = "SuPerEncKey2010"; // you can change it

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
    
    public function index() {
        $prof = $this->session->userdata('matriculeEmploye');

        $data['table'] = $this->professeur_modele->get_cours($prof);

        $this->load->view('professeur/index', $data);
    }

    function Afficher_Groupe() {
        $tables = array("groupe", "module");
        $join_keys = array('groupe.sigle = module.sigle');
        $db_columns = array('idGroupe', 'groupe.sigle as sigleGroupe', 'numGroupe', 'typeGroupe');
        $result_columns = array('idGroupe', 'sigleGroupe', 'numGroupe', 'typeGroupe');

        $grid_columns = array('Groupe', 'Sigle', 'Numéro Groupe', 'Type');
        $action = 'AfficherListeEtudiants';
        $id_action = 'idGroupe';
        $matriculeEmploye = $this->session->userdata('matriculeEmploye');

        $where = "WHERE matriculeEmploye ='" . $matriculeEmploye . "' OR professeurResponsable ='" . $matriculeEmploye . "'";

        $result = $this->search_modele->getSearchResult($tables, $db_columns, $grid_columns, $join_keys, $action, $id_action, $where, $result_columns);

        $titre = 'Veuillez choisir un groupe pour afficher la liste désirée';
        $controlleur = "professeur";
        $data = array('titre' => $titre, 'controlleur' => $controlleur, 'result' => $result);


        $this->load->view("recherche_parametree", $data);
    }

    function AfficherListeEtudiants($idGroupe) {
        $data['table'] = $this->professeur_modele->get_Etudiants($idGroupe);
        $data['idGroupe'] = $idGroupe;
        
        $this->load->view('professeur/listeEtudiants', $data);
    }

    /*
     * Fonction qui genere les fichiers excel pour les listes des étudiants
     */

    //-------------------test
  
    
    //------------------
    function generer_excel() {
        $nombreEtudiant = 0;
        setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
        $date = utf8_encode(strftime("%d-%B-%Y"));
        $nombreEtudiant = count($_POST['liste']);
$info_etablissement= $this->scolarite_modele->Recup_Parametre_Generaux();
        $info_groupe = $this->professeur_modele->recuperer_info_groupe($_POST['idGroupe']);
        if ($info_groupe['typeGroupe'] == 'Groupe-Theorie')
            $groupe = 'Th';
        else
            $groupe = 'TP';

        if ($info_groupe['semestre'] == 1) {
            $semestre = 'Printemps';
            $Abrege = 'P';
        } elseif ($info_groupe['semestre'] == 2) {
            $semestre = 'Été';
            $Abrege = "E";
        } else {
            $semestre = 'Automne';
            $Abrege = 'A';
        }
        $objXLS = new PHPExcel();
        $objSheet = $objXLS->setActiveSheetIndex(0);
        $objSheet->getDefaultStyle()->getFont()->setName('Courier New');

        /// formattage du Titre de la liste.
        $objSheet->setCellValue('A1', $info_etablissement[0]['nom']);
        $objSheet->getStyle('A1')->getFont()->setBold(TRUE);
        $objSheet->getStyle()->getFont()->setName('Courier New');
        $objSheet->setCellValue('A3', 'Étudiants du groupe ' .
                $info_groupe['sigle'] . '-' . $groupe .
                $info_groupe['numGroupe'] . ' au ' . $date . '.');
        $objSheet->getStyle()->getFont()->setName('Courier New');
        $objSheet->setCellValue('A4', 'Enseignant : ' . $info_groupe['nom'] . ' ' . $info_groupe['prenom']);
        $objSheet->setCellValue('A5', 'Module : ' . $info_groupe['sigle'] . ' ' . $info_groupe['titre'] .
                ' (' . $info_groupe['nbCredits'] . ' Crédits) ');


        //boucle pour faire le style pour les 3 titres dessus
        for ($i = 5; $i < 8; $i++) {
            $objSheet->getStyle('B' . $i)->getAlignment()->applyFromArray(
                    array(
                        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
                        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                        'rotation' => 0,
                        'wrap' => true,
                        'font' => array('bold' => true)
                    )
            );
            $objSheet->getStyle('C' . $i)->getAlignment()->applyFromArray(
                    array(
                        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
                        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                        'rotation' => 0,
                        'wrap' => true,
                        'font' => array('bold' => true)
                    )
            );
        }

        //Écrire les titres du tableau
        $objSheet->setCellValue('D9', 'Date :');
        $objSheet->setCellValue('B10', 'Matricule ');
        $objSheet->getStyle('B10')->getAlignment()->applyFromArray(
                array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                    'rotation' => 0,
                    'wrap' => true,
                    'font' => array('bold' => true)
                )
        );
        $objSheet->setCellValue('C10', 'Nom');
        $objSheet->getStyle('C10')->getAlignment()->applyFromArray(
                array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                    'rotation' => 0,
                    'font' => array('bold' => true),
                    'wrap' => true
                )
        );
        $objSheet->setCellValue('D10', 'Prénom');
        $objSheet->getStyle('D10')->getAlignment()->applyFromArray(
                array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                    'rotation' => 0,
                    'font' => array('bold' => true),
                    'wrap' => true
                )
        );

        ///// remplir le tableau avec le nom des etudiants 
        $index = 11; //index de header du tableau de la liste
        for ($i = 0; $i < $nombreEtudiant; $i = $i + 3) {
            $objSheet->setCellValue('B' . $index, $_POST['liste'][$i]['matriculeEtudiant']);
            $objSheet->getStyle('B' . $index)->getAlignment()->applyFromArray(
                    array(
                        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                        'rotation' => 0, 'wrap' => true));
            $objSheet->setCellValue('C' . $index, $_POST['liste'][$i + 1]['nom'] . '  ');
            $objSheet->setCellValue('D' . $index, $_POST['liste'][$i + 2]['prenom']);
            $index++;
        }
        ////////////////////////////////////////////////////////////////////////////////////////////
        //je fais une boucle sur tous les etudiants puis j ajoute 3 cases des titres(Matricule,Nom et prenom...)
        for ($i = 1; $i <= ($nombreEtudiant / 3) + 1; $i++) {
            $index = 9;
            $index = $index + $i;
            $objSheet->getStyle('B' . $index)->getBorders()->applyFromArray(
                    array(
                        'allborders' => array(
                            'style' => PHPExcel_Style_Border::BORDER_THIN,
                            'color' => array(
                                'rgb' => '808080'
                            )
                        )
                    )
            );
            $objSheet->getStyle('C' . $index)->getBorders()->applyFromArray(
                    array(
                        'allborders' => array(
                            'style' => PHPExcel_Style_Border::BORDER_THIN,
                            'color' => array(
                                'rgb' => '808080'
                            )
                        )
                    )
            );
            $objSheet->getStyle('D' . $index)->getBorders()->applyFromArray(
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
        /////////////////////////////////////////////////////////////////////////////////////////////////   
        $objXLS->getActiveSheet()->getColumnDimension("B")->setAutoSize(true);
        $objXLS->getActiveSheet()->getColumnDimension("C")->setWidth(30);
        $objXLS->getActiveSheet()->getColumnDimension("D")->setWidth(30);
        $objXLS->getActiveSheet()->setTitle('Listes groupe' . $info_groupe['numGroupe']);

        $objXLS->setActiveSheetIndex(0);
        $objWriter = PHPExcel_IOFactory::createWriter($objXLS, 'Excel5');
        header('Content-Type: application/vnd.ms-excel');

        header('Content-Disposition: attachment;filename="Etudiants-' .
                $info_groupe['sigle'] . '-' . $groupe .
                $info_groupe['numGroupe'] . "-" . $info_groupe['annee'] . "-" .
                // $info_groupe['semestre']."_".$date.'.xls"');
                $Abrege . "_" . $date . '.xls"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objXLS, 'Excel5');
        $objWriter->save('php://output');
        //$objWriter->save("Listes/Etudiants_".$info_groupe['sigle'].' '.$info_groupe['numGroupe']."_".$info_groupe['annee']."-".$info_groupe['semestre']."_".$date.".xls");
        die();
        $data['titre'] = 'Génération des listes d\'étudiants.';
        $data['type'] = 'valid_box';
        $data['informations'] = 'Fichier généré avec succès.';
        $this->load->view('professeur/modification_confirme', $data);
    }

    function recuperer_annee() {
        $annees = NULL;
        $query = $this->db->query("SELECT distinct `annee` FROM `groupe`");
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $annees['date'][] = $row['annee'];
            }
        }
        return $annees;
    }

    function choix_session() {

        $data = null;
        $this->clear_output();
        $this->form_validation->set_rules('pass', 'mot de passe', 'required');
        if (isset($_POST['pass'])){
               $pass=$_POST['pass'];
            //$this->form_validation->set_rules('pass', 'mot de passe', 'callback_verifier_chef_scolarite[' . $_POST['pass'] . ']');
        if ($pass==$this->scolarite_modele->get_old_password($this->session->userdata('login'))) {
            $data['annee'] = $this->professeur_modele->recuperer_annee();

            $data['courante'] = $this->professeur_modele->get_session_courante();
            $data['sigle'] = '';
            $data['info'] = 'saisir';

            $data['semestres'] = $this->professeur_modele->get_semestres_courants();
            $data['programme'] = $this->professeur_modele->get_programme();
            $data['grade'] = $this->professeur_modele->get_grade();


            $this->load->view("professeur/choix_session", $data);
        } else {

            $data['typeInterface'] = 'choix_session';
            $data['titre'] = 'L\'accès à ce sous-menu est réservé.<br> Entrez le mot de passe.';
            $this->load->view("professeur/chef_scolarite_pass", $data);
        }}
        else{
           $data['typeInterface'] = 'choix_session';
            $data['titre'] = 'L\'accès à ce sous-menu est réservé.<br> Entrez le mot de passe.';
            $this->load->view("professeur/chef_scolarite_pass", $data);   
        }
    }

    function choix_session_cc() {
        $data['annee'] = $this->professeur_modele->recuperer_annee();
        $data['courante'] = $this->professeur_modele->get_session_courante();
        $data['sigle'] = '';
        $data['info'] = 'saisir';
        $matriculeProfesseur = $this->professeur_modele->get_matricule($this->session->userdata('login'));
        $data['semestres'] = $this->professeur_modele->get_semestres_courants();
        $data['programme'] = $this->professeur_modele->get_programme_ens_responsable($matriculeProfesseur);
        $data['grade'] = $this->professeur_modele->get_grade();


        $this->load->view("professeur/choix_session_cc", $data);
    }

   function choix_session_exam($option = 'ex') {
        $data['annee'] = $this->professeur_modele->recuperer_annee();
        $data['courante'] = $this->professeur_modele->get_session_courante();
        $data['sigle'] = '';
        $data['info'] = 'saisir';
        $matriculeProfesseur = $this->professeur_modele->get_matricule($this->session->userdata('login'));
        $data['programme'] = $this->professeur_modele->get_programme_ens_responsable($matriculeProfesseur);
        $data['semestres'] = $this->professeur_modele->get_semestres_courants();
        //$data['programme'] = $this->professeur_modele->get_programme();
        $data['grade'] = $this->professeur_modele->get_grade();


        $data['option'] = $option;
        $this->load->view("professeur/choix_session_exam", $data);
    }

    function choix_session_valide() {
        $data['annee'] = $this->professeur_modele->recuperer_annee();
        $data['courante'] = $this->professeur_modele->get_session_courante();
        $data['isValid'] = 'valid';
        $data['info'] = 'valider';
        $this->load->view("professeur/choix_session", $data);
    }

    function consulter_horaire() {
        $periodeGroupe = array();
        $periodeGroupe['detailHoraire'] = NULL;
        $matriculeProfesseur = $this->professeur_modele->get_matricule($this->session->userdata('login'));
        // $data_horaire = $this->etudiant_modele

        $dataIdGroupe = $this->professeur_modele->get_idGroupe($matriculeProfesseur);
        // print_r( $dataIdGroupe);
        if (is_array($dataIdGroupe)) {
            foreach ($dataIdGroupe['idGroupe'] as $idG) {
                $periodeGroupe['detailHoraire'][] = $this->professeur_modele->get_periode_groupe($idG);
            }
        }
        // print_r( $periodeGroupe);
        $this->load->view('professeur/consulter_horaire_cours', $periodeGroupe);
    }

    //Alfa Hafedh 01/03/2016
    function afficher_cours() {
        $semestre = $this->input->post('semestre');
        $session = '';
        if (($semestre % 2) == 0)
            $session = 1;
        else
            $session = 3;
        $idProgramme = $this->input->post('idProgramme');
        $nomProgramme = $this->professeur_modele->get_nom_programme($idProgramme);

        $tables = array("module", "groupe", "unite");
        $join_keys = array("groupe.sigle = module.sigle ", "unite.sigle=module.sigleunite");
        $db_columns = array('groupe.sigle as sigleGroupe', 'module.titre as titreModule', 'unite.sigle as sigleUnite');
        $result_columns = array('sigleGroupe', 'titreModule', 'sigleUnite');
        $grid_columns = array('Sigle Elément', 'Titre', 'Sigle Unite');

        if (isset($_POST['valide'])) {
            $action = 'rediger_note_valide/' . $this->encode($this->input->post('annee')) . '/' . $this->encode($session);

            // $action = 'rediger_notes_partielles/' . $this->encode($this->input->post('annee')) . '/' . $this->encode($session);
        } else {
            $action = 'rediger_notes_partielles/' . $this->encode($this->input->post('annee')) . '/' . $this->encode($session);
        }
        $id_action = '';
        $matriculeProfesseur = $this->session->userdata('matriculeEmploye');


        $where = "WHERE annee = " . $this->input->post('annee') . " AND groupe.semestre = " . $session . " AND professeurResponsable = '" . $matriculeProfesseur . "'";
        $where.=" AND module.idDepartement='" . $idProgramme . "' ";
        $where.=" AND unite.semestre=" . $this->input->post('semestre') . " ";

        $result = $this->search_modele->getSearchResult($tables, $db_columns, $grid_columns, $join_keys, $action, $id_action, $where, $result_columns);
        $titre = 'Sélectionnez élément de la filière : <strong>' . $nomProgramme . ' (S' . $semestre . ')</strong>';
        $controlleur = "professeur";
        $data = array('titre' => $titre, 'controlleur' => $controlleur, 'result' => $result);

        $this->load->view("recherche_parametree", $data);
    }

    // Alfa 10-02-2016

    function afficher_cours_cc() {
        $semestre = $this->input->post('semestre');
        $session = '';
        if (($semestre % 2) == 0)
            $session = 1;
        else
            $session = 3;
        $idProgramme = $this->input->post('idProgramme');
        $nomProgramme = $this->professeur_modele->get_nom_programme($idProgramme);

        $tables = array("module",  "unite");
        $join_keys = array("unite.sigle=module.sigleunite");
        $db_columns = array('module.sigle as sigleGroupe', 'module.titre as titreModule', 'unite.sigle as sigleUnite');
        $result_columns = array('sigleGroupe', 'titreModule', 'sigleUnite');
        $grid_columns = array('Sigle Elément', 'Titre', 'Sigle Unite');

        if (isset($_POST['valide'])) {
            $action = 'rediger_note_valide/' . $this->encode($this->input->post('annee')) . '/' . $this->encode($session);

            // $action = 'rediger_notes_partielles/' . $this->encode($this->input->post('annee')) . '/' . $this->encode($session);
        } else {
            $action = 'rediger_notes_cc_exam/' . $this->encode($this->input->post('annee')) . '/' . $this->encode($session);
        }
        $id_action = '';
        $matriculeProfesseur = $this->session->userdata('matriculeEmploye');


      // $where = "WHERE annee = " . $this->input->post('annee')  ;
          $where = "WHERE  ";
          $where.="  module.professeurResponsable='" . $matriculeProfesseur . "' ";        
        $where.=" AND module.idDepartement='" . $idProgramme . "' ";
        
        $where.=" AND unite.semestre=" . $this->input->post('semestre') . " ";

        $result = $this->search_modele->getSearchResult($tables, $db_columns, $grid_columns, $join_keys, $action, $id_action, $where, $result_columns);
        $titre = 'Sélectionnez élément de la filière : <strong>' . $nomProgramme . ' (S' . $semestre . ')</strong>';
        $controlleur = "professeur";
        $data = array('titre' => $titre, 'controlleur' => $controlleur, 'result' => $result);

        $this->load->view("recherche_parametree", $data);
    }

    // $option : 'ex', 'rt'

    function afficher_cours_exam($option = 'ex') {
        $anonymat = 1;
        if (isset($_POST['option']))
            $option = $_POST['option'];
        if (isset($_POST['anonymat'])) {
            $anonymat = $_POST['anonymat'];
        } else {
            $anonymat = 1;
        }
        $semestre = $this->input->post('semestre');
        $session = '';
        if (($semestre % 2) == 0)
            $session = 1;
        else
            $session = 3;
        $idProgramme = $this->input->post('idProgramme');
        $nomProgramme = $this->professeur_modele->get_nom_programme($idProgramme);

        $tables = array("module", "groupe", "unite");
        $join_keys = array("groupe.sigle = module.sigle ", "unite.sigle=module.sigleunite");
        $db_columns = array('groupe.sigle as sigleGroupe', 'module.titre as titreModule', 'unite.sigle as sigleUnite');
        $result_columns = array('sigleGroupe', 'titreModule', 'sigleUnite');
        $grid_columns = array('Sigle Elément', 'Titre', 'Sigle Unite');

        if (isset($_POST['valide'])) {
            $action = 'rediger_note_valide/' . $this->encode($this->input->post('annee')) . '/' . $this->encode($session);

            // $action = 'rediger_notes_partielles/' . $this->encode($this->input->post('annee')) . '/' . $this->encode($session);
        } else {
            $action = 'rediger_notes_exam/' . $anonymat . '/' . $option . '/' . $this->encode($this->input->post('annee')) . '/' . $this->encode($session);
        }
        $id_action = '';
        $matriculeProfesseur = $this->session->userdata('matriculeEmploye');


        //$where = "WHERE annee = " . $this->input->post('annee') . " AND groupe.semestre = " . $session . " AND professeurResponsable = '" . $matriculeProfesseur . "'";
        $where = "WHERE annee = " . $this->input->post('annee') . " AND groupe.semestre = " . $session ;
        $where.=" AND module.idDepartement='" . $idProgramme . "' ";
        $where.=" AND unite.semestre=" . $this->input->post('semestre') . " ";

        $result = $this->search_modele->getSearchResult($tables, $db_columns, $grid_columns, $join_keys, $action, $id_action, $where, $result_columns);
        $titre = 'Sélectionnez élément de la filière : <strong>' . $nomProgramme . ' (S' . $semestre . ')</strong>';
        $controlleur = "professeur";
        $data = array('titre' => $titre, 'controlleur' => $controlleur, 'result' => $result);

        $this->load->view("recherche_parametree", $data);
    }

    function rediger_note_valide($annee, $session, $sigle) {
        $presenceNotes = '';
        $validation = '';
        $annee = $this->decode($annee);
        $session = $this->decode($session);

        $data['annee'] = $annee;
        $data['session'] = $session;
        $data['sigle'] = $sigle;
        $data['matricule'] = $this->professeur_modele->recuperer_liste_etudiants($annee, $session, $sigle);
        if ($data['matricule'] != NULL) {
            $data['infoEtudiant'] = $this->professeur_modele->get_name_etudiants($data['matricule']);

            $data['noteEtudiant'] = $this->professeur_modele->get_note_etudiants($data['matricule'], $sigle, $annee, $session);
            $data['boutton_enregistrer'] = '';
            $presenceNotes = $this->professeur_modele->verifier_presence_note($data['matricule'], $sigle, $annee, $session);
            if ($presenceNotes == 'true') {
                $validation = $this->professeur_modele->verifier_acces_note($data['matricule'], $annee, $session, $sigle);
                if ($validation == 'true') {
                    $validation2 = $this->professeur_modele->verifier_acces_note_valide($data['matricule'], $annee, $session, $sigle);
                    if ($validation2 == 'true') {
                        $data['info'] = 'Validation des notes.';
                        $data['boutton_enregistrer'] = '<input type="submit" name="submit" id="submit" value="Valider" />';
                        $data['disabled'] = 'disabled';
                        $data['valide'] = 'valide';
                        $data['sigle'] = $sigle;
                        $this->load->view('professeur/rediger_note', $data);
                    } else {
                        $data['titre'] = 'Validation des notes';
                        $data['type'] = 'warning_box';
                        $data['informations'] = 'Les notes du module <b>' . $sigle . ' </b>, semestre <b>' .
                                $this->get_session_nom($session) . ' ' . $annee . ' </b>ont déjà été validées.</br>
                        Pour les consulter, veuillez aller dans [Notes/Saisir/Modifier Notes]';
                        $this->load->view('professeur/modification_confirme', $data);
                    }
                } else {
                    $data['titre'] = 'Validation des notes';
                    $data['type'] = 'warning_box';
                    $data['informations'] = 'Les notes du module <b>' . $sigle . ' </b>, semestre <b>' .
                            $this->get_session_nom($session) . ' ' . $annee . ' </b>ont déjà été validées.</br>
                        Pour les consulter, veuillez aller dans [Notes/Saisir/Modifier Notes].';
                    $this->load->view('professeur/modification_confirme', $data);
                }
            } else {
                $data['titre'] = 'Validation des notes';
                $data['type'] = 'warning_box';
                $data['informations'] = 'Avant de valider les notes, il faut toutes les saisir.';
                $this->load->view('professeur/modification_confirme', $data);
            }
        } else {
            $data['type'] = 'error_box';
            $data['titre'] = 'Valider les notes';
            $data['informations'] = 'Aucun étudiant n\'est inscrit au module <b>' . $sigle . ' </b>au semestre <b>' . $this->get_session_nom($session) . ' ' . $annee . ' </b>';
            $this->load->view('professeur/modification_confirme', $data);
        }
    }

    function rediger_note($annee, $session, $sigle) {
        $presenceNotes = '';
        $annee = $this->decode($annee);
        $session = $this->decode($session);
        $data['matricule'] = $this->professeur_modele->recuperer_liste_etudiants($annee, $session, $sigle);
        if ($data['matricule'] != NULL) {
            $data['infoEtudiant'] = $this->professeur_modele->get_name_etudiants($data['matricule']);

            $data['noteEtudiant'] = $this->professeur_modele->get_note_etudiants($data['matricule'], $sigle, $annee, $session);
            $data['boutton_enregistrer'] = '';
            $presenceNotes = $this->professeur_modele->verifier_presence_note($data['matricule'], $sigle, $annee, $session);
            $validation = 'true';
            if ($presenceNotes == 'true') {
                $validation = $this->professeur_modele->verifier_acces_note($data['matricule'], $annee, $session, $sigle);
            }
            $data['annee'] = $annee;
            $data['session'] = $session;
            $data['sigle'] = $sigle;
            if ($validation == 'true') {
                $data['info'] = '';
                $data['sigle'] = $sigle;
                $data['boutton_enregistrer'] = '<input type="submit" name="submit" id="submit" value="Enregistrer" />';
                $this->load->view('professeur/rediger_note', $data);
            } else {
                $data['info'] = '<div class="warning_box">Les notes de cette classe ont déjà été validées.</div>';
                $data['boutton_enregistrer'] = '';
                $data['disabled'] = 'disabled';
                $data['sigle'] = $sigle;
                $this->load->view('professeur/rediger_note', $data);
            }
        } else {
            $data['type'] = 'error_box';
            $data['titre'] = 'Saisir les notes';
            $data['informations'] = 'Aucun étudiant n\'est inscrit au module <b>' . $sigle . ' </b>au semestre ' . $this->get_session_nom($session)
                    . ' ' . $annee . ' </b>';
            $this->load->view('professeur/modification_confirme', $data);
        }
    }

    // hafedh 19-7-2015
    function rediger_notes_partielles($annee, $session, $sigle) {
        $presenceNotes = '';
        $annee = $this->decode($annee);
        $session = $this->decode($session);
        $data['nomsEvaluations'] = $this->professeur_modele->get_noms_evaluations($sigle);
        $data['matricule'] = $this->professeur_modele->recuperer_liste_etudiants($annee, $session, $sigle);
        $data['nbNoteExam'] = $this->professeur_modele->commencerRattrapage($sigle);

        if ($data['matricule'] != NULL) {
            $data['infoEtudiant'] = $this->professeur_modele->get_name_etudiants($data['matricule']);

            $data['noteEtudiant'] = $this->professeur_modele->get_notes_partielles($data['matricule'], $sigle, $annee, $session);
            $data['boutton_enregistrer'] = '';
            $presenceNotes = $this->professeur_modele->verifier_presence_note($data['matricule'], $sigle, $annee, $session);
            $validation = 'true';
            if ($presenceNotes == 'true') {
                $validation = $this->professeur_modele->verifier_acces_note($data['matricule'], $annee, $session, $sigle);
            }

            $data['annee'] = $annee;
            $data['session'] = $session;
            $data['sigle'] = $sigle;
            $data['programme'] = $this->professeur_modele->get_nom_programme_module($sigle);

            //$validation = 'true';

            if ($validation == 'true') {
                $data['disabled'] = '';
                $data['info'] = '';
                $data['sigle'] = $sigle;
                $data['boutton_enregistrer'] = '<input type="submit" name="submit" id="submit" value="Enregistrer" />';
                $this->load->view('professeur/rediger_notes_partielles', $data);
            } else {
                $data['info'] = '<div class="warning_box">Les notes de cette classe ont déjà été validées.</div>';
                $data['boutton_enregistrer'] = '';
                $data['disabled'] = 'disabled';
                $data['sigle'] = $sigle;
                $this->load->view('professeur/rediger_notes_partielles', $data);
            }
        } else {
            $data['type'] = 'error_box';
            $data['titre'] = 'Saisir les notes';
            $data['informations'] = 'Aucun étudiant n\'est inscrit au module <b>' . $sigle . ' </b>au semestre ' . $this->get_session_nom($session)
                    . ' ' . $annee . ' </b>';
            $this->load->view('professeur/modification_confirme', $data);
        }
    }

 function rediger_notes_cc($annee, $session, $sigle) {
        $data['option'] = 'cc';
        $presenceNotes = '';
        $annee = $this->decode($annee);
        $session = $this->decode($session);
        //$data['nomsEvaluations']=$this->professeur_modele->get_noms_evaluations($sigle);
        $detail = $this->professeur_modele->get_type_cc($sigle);
        $data['nomsEvaluations'][0] = array('idEvaluation' => 1, 'nomEvaluation' => 'CC', 'detail' => $detail, 'ponderation' => 40);
        $data['matricule'] = $this->professeur_modele->recuperer_liste_etudiants($annee, $session, $sigle);
        $data['nbNoteExam'] = $this->professeur_modele->commencerRattrapage($sigle);

        if ($data['matricule'] != NULL) {
            $data['infoEtudiant'] = $this->professeur_modele->get_name_etudiants($data['matricule']);

            $data['noteEtudiant'] = $this->professeur_modele->get_notes_partielles($data['matricule'], $sigle, $annee, $session, 1);
            $data['boutton_enregistrer'] = '';
            $presenceNotes = $this->professeur_modele->verifier_presence_note($data['matricule'], $sigle, $annee, $session);
            $validation = 'true';
            if ($presenceNotes == 'true') {
                $validation = $this->professeur_modele->verifier_acces_note($data['matricule'], $annee, $session, $sigle);
            }

            $data['annee'] = $annee;
            $data['session'] = $session;
            $data['sigle'] = $sigle;

            //$validation = 'true';

            if ($validation == 'true') {
                $data['disabled'] = '';
                $data['info'] = '';
                $data['sigle'] = $sigle;
                $data['boutton_enregistrer'] = '<input type="submit" name="submit" id="submit" value="Enregistrer" />';
                $this->load->view('professeur/rediger_notes_cc', $data);
            } else {
                $data['info'] = '<div class="warning_box">Les notes de cette classe ont déjà été validées.</div>';
                $data['boutton_enregistrer'] = '';
                $data['disabled'] = 'disabled';
                $data['sigle'] = $sigle;
                $this->load->view('professeur/rediger_notes_cc', $data);
            }
        } else {
            $data['type'] = 'error_box';
            $data['titre'] = 'Saisir les notes';
            $data['informations'] = 'Aucun étudiant n\'est inscrit au module <b>' . $sigle . ' </b>au semestre ' . $this->get_session_nom($session)
                    . ' ' . $annee . ' </b>';
            $this->load->view('professeur/modification_confirme', $data);
        }
    }

    function rediger_notes_exam($anonymat, $option = 'ex', $annee, $session, $sigle) {

        $presenceNotes = '';
        $annee = $this->decode($annee);
        $session = $this->decode($session);
        //$data['nomsEvaluations']=$this->professeur_modele->get_noms_evaluations($sigle);
        $idEvaluation = 2;
        if ($option == 'ex') {
            $data['nomsEvaluations'][0] = array('idEvaluation' => 2, 'nomEvaluation' => 'Moyenne de connaissance', 'detail' => 'Exam', 'ponderation' => 60);
            $idEvaluation = 2;
            $data['matricule'] = $this->professeur_modele->recuperer_liste_etudiants($annee, $session, $sigle);
        }
        if ($option == 'rt') {
            $data['nomsEvaluations'][0] = array('idEvaluation' => 4, 'nomEvaluation' => 'Rattrapage', 'detail' => 'RT', 'ponderation' => 60);
            $idEvaluation = 4;
            $data['matricule'] = $this->professeur_modele->recuperer_liste_etudiants_rt($annee, $session, $sigle);
        }


        $data['option'] = $option;
        $data['anonymat'] = $anonymat;
        if($option != 'rt')
            $data['matriculeCrypte'] = $this->professeur_modele->recuperer_liste_etudiants($annee, $session, $sigle);
        else $data['matriculeCrypte'] = $this->professeur_modele->recuperer_liste_etudiants_rt($annee, $session, $sigle);

        for ($i = 0; $i < count($data['matriculeCrypte']); $i++) {
            $data['matriculeCrypte'][$i] = $this->professeur_modele->encode($data['matriculeCrypte'][$i]);
        }

        $data['nbNoteExam'] = $this->professeur_modele->commencerRattrapage($sigle);

        if ($data['matricule'] != NULL) {
//get_name_etudiants
            //$data['infoEtudiant'] = $this->professeur_modele->get_name_code_etudiants($data['matricule']);
            $data['infoEtudiant'] = $this->professeur_modele->get_name_code_etudiants_without_anonymat($data['matricule']);

//$data['infoEtudiant'] = $this->professeur_modele->get_name_etudiants($data['matricule']);
//print_R($data['infoEtudiant']);
            //$data['infoEtudiant'] = $this->professeur_modele->recuperer_liste_etudiants($data['matricule']);
            $data['noteEtudiant'] = $this->professeur_modele->get_notes_partielles($data['matricule'], $sigle, $annee, $session, $idEvaluation);
            $data['boutton_enregistrer'] = '';
            $presenceNotes = $this->professeur_modele->verifier_presence_note($data['matricule'], $sigle, $annee, $session);
            $validation = 'true';
            if ($presenceNotes == 'true') {
                $validation = $this->professeur_modele->verifier_acces_note($data['matricule'], $annee, $session, $sigle);
            }
               $data['idEvaluation']=$idEvaluation;
            $data['annee'] = $annee;
            $data['session'] = $session;
            $data['sigle'] = $sigle;
            $data['anonymat'] = $anonymat;
            //$validation = 'true';
          //echo $validation;
            if ($validation == 'true') {
                $data['disabled'] = '';
                $data['info'] = '';
                $data['sigle'] = $sigle;
                $data['boutton_enregistrer'] = '<input type="submit" name="submit" id="submit" value="Enregistrer" />';
                $this->load->view('professeur/rediger_notes_exam', $data);
            } else {
                $data['info'] = '<div class="warning_box">Les notes de cette classe ont déjà été validées.</div>';
                $data['boutton_enregistrer'] = '';
                $data['disabled'] = 'disabled';
              //  $data['disabled'] = '';
                $data['sigle'] = $sigle;
                $this->load->view('professeur/rediger_notes_exam', $data);
            }
        } else {
            $data['type'] = 'error_box';
            $data['titre'] = 'Saisir les notes';
            $data['informations'] = 'Aucun étudiant n\'est inscrit au module <b>' . $sigle . ' </b>au semestre ' . $this->get_session_nom($session)
                    . ' ' . $annee . ' </b>';
            $this->load->view('professeur/modification_confirme', $data);
        }
      //  echo 'matricules avant enregistrement : </br>';
      //print_r($data['matricule']);
    }


    function note_check($note) {
        $note = trim(str_replace(",", ".", $note)); // 2.2.1 ajout trim
        if (is_numeric($note) && $note <= 20 && $note >= 0) {
            if (strlen($note) <= 5)
                return $note;
            else
                return NULL;
        } else
            return NULL;
    }

    function enregistrer_note() {
         echo 'option : '.$_POST['option'];
        // decryptage des matricules
        if (isset($_POST['option']) && ($_POST['option'] == 'ex' || $_POST['option'] == 'rt')) {
            for ($i = 0; $i < sizeof($_POST['matricule']); $i++) {
                $_POST['matricule'][$i] = $this->professeur_modele->decode($_POST['matricule'][$i]);
            }
        }
        // echo "Detail ".$this->input->post('detail');
        $counter = 0;
        $data['informations'] = '';
        $k = 0;
        for ($i = 0; $i < sizeof($_POST['matricule']); $i++) {

            $this->professeur_modele->enregistrer_notes_partielles($_POST, $i, '');

            $data['noteValide'][$i] = 'true';
        }
       //echo 'matricules après enregistrement : </br>';
        //print_r($_POST['matricule']);
        for ($i = 0; $i < sizeof($_POST['matricule']); $i++) {
            if ($data['noteValide'][$i] == 'true') {
                $counter++;
            }
        }
        if ($counter == sizeof($_POST['matricule'])) {
            $data['type'] = 'valid_box';
            $data['titre'] = 'Enregistrement de notes';
            $data['informations'] = 'Les notes du module <b>' . $_POST['sigle'] . ' </b> au semestre <b>' .
                    $this->get_session_nom($_POST['session']) . ' ' . $_POST['annee'] . '
                   </b> sont bien enregistrées.';
            $this->load->view('professeur/modification_confirme', $data);
        }
    }

    function valider_note() {
        $data['matricule'] = $this->professeur_modele->recuperer_liste_etudiants($_POST['annee'], $_POST['session'], $_POST['sigle']);
        $validation = $this->professeur_modele->valider_note($data['matricule'], $_POST['annee'], $_POST['session'], $_POST['sigle'], $_POST['notesApresRT']);

        if ($validation == 'true') {
            $data['titre'] = 'Validation des notes';
            $data['type'] = 'valid_box';
            $data['informations'] = 'Les notes du module <b>' . $_POST['sigle'] . ' </b> ont été validées.';
            $this->load->view('professeur/modification_confirme', $data);
        } elseif ($validation == 'false') {
            $data['titre'] = 'Validation des notes';
            $data['type'] = 'error_box';
            $data['informations'] = 'Les notes du module <b>' . $_POST['sigle'] . ' </b> ne sont pas validées. 
                Veuillez entrer toutes les notes avant de valider.';
            $this->load->view('professeur/modification_confirme', $data);
        }
    }

    public function mot_de_passe() {
        $data['errorMessage'] = '';
        $this->load->view('professeur/modifier_mot_de_passe', $data);
    }

    function password_check($password) {

        if (
                ctype_alnum($password) // numbers & digits only 
                && strlen($password) > 7 // at least 8 chars 
                && strlen($password) < 11 // at most 20 chars 
                && ((preg_match('`[a-z]`', $password) || (preg_match('`[A-Z]`', $password))) ) && preg_match('`[0-9]`', $password) // at least one digit 
        ) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function modifier_mot_de_passe() {
        if ($this->professeur_modele->get_old_password($this->session->userdata('login')) == $this->input->post('old_password')) {
            $passwordIsValid = $this->password_check($this->input->post('new_password'));
            if ($passwordIsValid == TRUE) {
                if ($this->input->post('new_password') == $this->input->post('confirmed_password')) {
                    $this->professeur_modele->set_password($this->input->post('new_password'), $this->session->userdata('login'));
                    $data['type'] = 'valid_box';
                    $data['titre'] = 'Modifier Mot de passe';
                    $data['informations'] = 'Le mot de passe a été modifié avec succès.';
                    $this->load->view('professeur/modification_confirme', $data);
                } else {
                    $data['errorMessage'] = '<div class="error_box">
                            Les deux nouveaux mots de passe ne sont pas identiques.
                            </div>';
                    $this->load->view('professeur/modifier_mot_de_passe', $data);
                }
            } else {
                $data['errorMessage'] = '<div class="error_box">
                    Le mot de passe doit contenir 8 à 10 lettres et chiffres dont au moins une lettre et un chiffre.
                    </div>';
                $this->load->view('professeur/modifier_mot_de_passe', $data);
            }
        } else {
            $data['errorMessage'] = '<div class="error_box">
                        L\'ancien mot de passe est erroné.
                        </div>';
            $this->load->view('professeur/modifier_mot_de_passe', $data);
        }
    }

    function mes_cours_consultation() {
        $courante = $this->professeur_modele->get_session_courante();
        $tables = array("groupe", "module");
        $join_keys = array('groupe.sigle = module.sigle');
        $db_columns = array('idGroupe', 'typeGroupe');
        $grid_columns = array('Groupe', 'Type Groupe');
        $action = 'consulter_absences/' . $this->encode($courante['annee'][0]) .
                '/' . $this->encode($courante['semestre'][0]);
        $id_action = 'idGroupe';
        $where = "WHERE annee = " . $courante['annee'][0] . " AND semestre = " . $courante['semestre'][0]
                . " AND (matriculeEmploye = '" . $this->session->userdata('matriculeEmploye') . "'
                   OR professeurResponsable ='" . $this->session->userdata('matriculeEmploye') . "') ";
        $result = $this->search_modele->getSearchResult($tables, $db_columns, $grid_columns, $join_keys, $action, $id_action, $where);
        $titre = 'Mes groupes au semestre <b>' . $this->get_session_nom($courante['semestre'][0]) .
                ' ' . $courante['annee'][0] . ' </b>';
        $controlleur = "professeur";
        $data = array('titre' => $titre, 'controlleur' => $controlleur, 'result' => $result);
        $this->load->view("recherche_parametree", $data);
    }

    function consulter_absences($annee, $semestre, $idGroupe) {
        $annee = $this->decode($annee);
        $semestre = $this->decode($semestre);
        $infoAbsences = $this->professeur_modele->get_info_absences($annee, $semestre, $idGroupe);
        if ($infoAbsences == NULL) {
            $data['titre'] = 'Consulter Absences';
            $data['type'] = 'valid_box';
            $data['informations'] = 'Aucune absence n\'est enregistrée pour vos étudiants.';
            $this->load->view('professeur/modification_confirme', $data);
        } else {
            $this->load->view('professeur/afficher_absences', $infoAbsences);
        }
    }

    /*
     * fonction pour afficher tous les groupes qu'un professeur enseigne
     * et tous les groupes dont un professeur est responsable.
     */

    function mes_cours() {
        $sessionCourante = $this->professeur_modele->get_session_courante();
        $tables = array("groupe", "module");
        $join_keys = array('groupe.sigle = module.sigle');
        $db_columns = array('idGroupe', 'typeGroupe');
        $grid_columns = array('Groupe', 'Type Groupe');
        $action = 'entrer_absences/' . $this->encode($sessionCourante['annee'][0]) .
                '/' . $this->encode($sessionCourante['semestre'][0]);
        $id_action = 'idGroupe';
        $where = "WHERE annee = " . $sessionCourante['annee'][0] . " AND semestre = " .
                $sessionCourante['semestre'][0] . " AND (matriculeEmploye = '" .
                $this->session->userdata('matriculeEmploye') . "'
                   OR professeurResponsable ='" . $this->session->userdata('matriculeEmploye') . "')";
        $result = $this->search_modele->getSearchResult($tables, $db_columns, $grid_columns, $join_keys, $action, $id_action, $where);
        $titre = 'Mes groupes au semestre <b>' . $this->get_session_nom($sessionCourante['semestre'][0]) .
                ' ' . $sessionCourante['annee'][0] . ' </b>';
        $controlleur = "professeur";
        $data = array('titre' => $titre, 'controlleur' => $controlleur, 'result' => $result);
        $this->load->view("recherche_parametree", $data);
    }

    /*
     * fonction pour convertir le code du semestre par son nom 
     * elle prend en parametre le numero du semestre soit(1,2,3)
     * et elle retourne le nom (Automne, été, printemps)
     */
//
//    function get_session_nom($numeroSemestre) {
//        if ($numeroSemestre == 3) {
//            return 'Automne';
//        } elseif ($numeroSemestre == 2) {
//            return 'Été';
//        } else {
//            return 'Printemps';
//        }
//    }

    function get_session_nom($numeroSemestre) {
        if ($numeroSemestre == 3) {
            return 'Impaire';
        } elseif ($numeroSemestre == 2) {
            return 'Été';
        } else {
            return 'Paire';
        }
    }
    /*
     * fonction qui fait appel a la vue entrer_absences pour que le professeur entre
     * les absences des etudiants 
     */

    function entrer_absences($annee, $session, $idGroupe) {
        $annee = $this->decode($annee);
        $session = $this->decode($session);
        //tous les etudiants inscrits dans un groupe specifie
        $data['etudiant'] = $this->professeur_modele->get_Etudiants($idGroupe);
        $data['annee'] = $annee;
        $data['session'] = $session;
        $data['idGroupe'] = $idGroupe;
        // Correction RM 23 février 2013 $data['titre'] = 'Liste des étudiants du groupe '.$idGroupe.', semestre '.
        $data['titre'] = 'Liste des étudiants du groupe ' . $this->professeur_modele->corrigerNumGroupe($idGroupe) . ', semestre ' .
                $this->get_session_nom($session) . ' ' . $annee . '. 
                        Cocher le ou les étudiants absents.';
        $this->load->view('professeur/entrer_absences', $data);
    }

    /*
     * fonction pour convertir la date de DD/MM/YYYY a YYYY-MM-DD
     */

    function convert_date($date) {
        $year = '';
        $month = '';
        $day = '';

        for ($i = 0; $i < strlen($date); $i++) {
            if ($i <= 1) {
                $day .=$date[$i];
            }
            if ($i > 2 && $i < 5) {
                $month .= $date[$i];
            }
            if ($i > 5) {
                $year .= $date[$i];
            }
        }

        $datephp = $year . '-' . $month . '-' . $day;
        return $datephp;
    }

    /*
     * fonction qui convertit le type de date Atom en yyyy-mm-dd
     */

    function convert_date_ATOM($date) {
        $dateConverti = '';
        for ($i = 0; $i < 10; $i++) {
            $dateConverti .= $date[$i];
        }
        return $dateConverti;
    }

    /*
     * fonction pour enregistrer les absences entrées par le professeur
     */

    function enregistrer_absences() {
        $format = 'DATE_ATOM';
        $time = time();

        $date = $this->convert_date_ATOM(standard_date($format, $time));

        //on teste si aucun etudiant n est selectionne
        if (!isset($_POST['items'])) {
            $data['titre'] = 'Entrer Absences';
            $data['type'] = 'error_box';
            $data['informations'] = 'Erreur : il faut sélectionner au moins un étudiant.';
            $this->load->view('professeur/modification_confirme', $data);
        } else {
            if (!isset($_POST['duree']) && !isset($_POST['duree2'])) {
                $data['titre'] = 'Entrer Absences';
                $data['type'] = 'error_box';
                $data['informations'] = 'Erreur : vous avez oublié de spécifier la durée de l\'absence.';
                $this->load->view('professeur/modification_confirme', $data);
            } else {
                if (!isset($_POST['periode'])) {
                    $data['titre'] = 'Entrer Absences';
                    $data['type'] = 'error_box';
                    $data['informations'] = 'Erreur : vous avez oublié de spécifier la période de l\'absence.';
                    $this->load->view('professeur/modification_confirme', $data);
                } else {
                    $dateCourante = $this->professeur_modele->get_date_courante();
                    if ($this->convert_date($_POST['date']) < $dateCourante['debutCours'] || $this->convert_date($_POST['date']) > $dateCourante['finCours']) {
                        $data['titre'] = 'Entrer Absences';
                        $data['type'] = 'error_box';
                        $data['informations'] = 'Erreur:  La date choisie <b>' . $this->convert_date($_POST['date']) . ' </b>ne fait pas partie du semestre courant <b>' .
                                $this->get_session_nom($dateCourante['semestre']) . ' ' . $dateCourante['annee'] . '. </b>Si le semestre courant est en erreur, contactez l\'administrateur réseau.';
                        $this->load->view('professeur/modification_confirme', $data);
                    } else {
                        if ($this->convert_date($_POST['date']) > $date) {
                            $data['titre'] = 'Entrer Absences';
                            $data['type'] = 'error_box';
                            $data['informations'] = 'Erreur : on ne peut choisir une date postérieure à la date présente.';
                            $this->load->view('professeur/modification_confirme', $data);
                        } else {
                            $this->professeur_modele->enregistrer_absences($_POST);
                            $data['titre'] = 'Entrer Absences';
                            $data['type'] = 'valid_box';
                            // correction RM 23 février 2013. 2 lignes
                            // $data['informations'] = 'Les absences au groupe <b>'.$_POST['idGroupe'].'</b> ont été bien enregistrées.';
                            $group = $this->professeur_modele->corrigernumGroupe($_POST['idGroupe']);
                            $data['informations'] = 'Les absences au groupe <b>' . $group . '</b> ont bien été enregistrées.';
                            $this->load->view('professeur/modification_confirme', $data);
                        }
                    }
                }
            }
        }
    }

//Alfa 
    function verifier_chef_scolarite($pass) {
        if ($pass == $this->passwordChef)
            return true;
        else
            return false;
    }
function script_delete()
{
    
   $query= $this->db->query("SELECT distinct matriculeEtudiant from planetudes ");
    if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $etudiants[] = $row['matriculeEtudiant'];
            $query.=",(".$row['matriculeEtudiant'].",'M101',1,-1,'','AV','professeur',2020),"."(".$row['matriculeEtudiant'].",'M102',1,-1,'','AV','professeur',2020),"."(".$row['matriculeEtudiant'].",'M103',1,-1,'','AV','professeur',2020)";
                
            }
        }
        echo substr($query,1);
        
        $query="Insert into `planetudes` values ".substr($query,1);
        
//        $query.=(,'M101',1,-1,'','AV','professeur',2020)
       $query= $this->db->query($query);
//    if ($query->num_rows() > 0) {
//            foreach ($query->result_array() as $row) {
//                $etudiants[] = $row['matriculeEtudiant'];
//            }
//        } 
   
   
   
}

function verifier_notes_exportees($annee,$sigle,$semestre,$idEvaluation,$anonymat){
  // $res= $this->professeur_modele->get_info_etudiant_rattrapage($annee, $semestre, $sigle);
 //$res[]=$this->scolarite_modele->get_etudiant_planetudes_note_rattrapage($annee, $semestre, $sigle) ;
 //print_r($res);
    
       
		$titre="L'importation d'un fichier excel ";
       
		$data=array('titre'=> $titre,'annee'=>$annee,'sigle'=>$sigle,'semestre'=>$semestre,'idEvaluation'=>$idEvaluation,'anonymat'=>$anonymat);
       //print_r($data);
        $this->load->view("professeur/import_excel_notes",$data);
	
}



//ces fonction sont utilisees pour l'import des notes cc -----by meden 
function controle_fichier_notes_cc(){
    
    $annee=$_POST['annee'];
     $sigle=$_POST['sigle'];
$semestre=$_POST['semestre'];



$matricules=$this->professeur_modele->recuperer_liste_etudiants_matricule($annee, $sigle, $semestre);
    // $sheetdata=$this->scolarite_modele->lire_ficher_excel();
      $sheetdata=$this->lire_ficher_excel();
  
      
      
    $donnees=array(); 
    $lignes=count($sheetdata);
     $h=0;$k=0;$nbrErreur=0;
$information='';

$colonnes=count($sheetdata[0]);
 if($colonnes==3){
     $listMatInexistant='';
      $v= count($matricules);
           for($j=0;$j<count($matricules);$j++){
          $nonExist=0;
           
      for($i=1;$i<$lignes;$i++){
        if($matricules[$j]==$sheetdata[$i][0]){
         $nonExist++;
          $v--;
        }
      }
      if($nonExist==0){
         $listMatInexistant.=$matricules[$j].",";
         if($j==14 || $j==27 || $j==40 || $j==50)
              $listMatInexistant.="<br>";
         $nbrErreur++;
    } }
            if($v==1)
                $information.=" le matricule ".$listMatInexistant." n'est pas dans le fichier <br>";
            if($v>1) 
                $information.=$listMatInexistant." ces matricules  ne sont pas dans le fichier <br>";
        for($i=1;$i<$lignes;$i++){
    $exist=0;
	$ligne=$i+1;
    
 if(empty($sheetdata[$i][0])){ $information.="le matricule de la ligne $ligne est vide<br>";$nbrErreur++;}                                                       
else{ if(!is_double($sheetdata[$i][0])) { 
    $information.="verifier le type du matricule de la ligne $ligne <br>";$nbrErreur++;}
      else{if(!is_double($sheetdata[$i][1])) {
          $information.="verifier le type de la note de la ligne $ligne <br>";$nbrErreur++;}
		else{if($sheetdata[$i][1]>20 || $sheetdata[$i][1]<0 ){
	$information.="la note de la ligne $ligne ne correspond pas a une note";$nbrErreur++;}
					  else{
                                              
         for($j=0;$j<count($matricules);$j++){
        if($matricules[$j]==$sheetdata[$i][0]){
         $exist++;
        }
    }
    if($exist==0){
         $information.="le matricule de la ligne $ligne n'existe pas <br>";$nbrErreur++;
    } else{

                           $donnees[$h]['matriculeEtudiant']=$sheetdata[$i][0];
	          $donnees[$h]['noteCC']=$sheetdata[$i][1];
                  $donnees[$h]['noteCP']=$sheetdata[$i][2];
                                          $h++; }
					       }
                                             } 
                                        } }}
	 $this->load_view_error($information,$donnees,$nbrErreur);}
else{
$titre='';$information='verifier le nombre de colonnes(voir le fichier modele)';
$alert='';
$data=array('titre'=>$titre,'information'=>$information,'alert'=>$alert);
echo(json_encode($data));
     
     
   }
      
     
  }
  function controle_fichier_notes_exam(){
    
    $annee=$_POST['annee'];
     $sigle=$_POST['sigle'];
$semestre=$_POST['semestre'];
$anonymat=$_POST['anonymat'];
$code='';
if($anonymat==1){
    $code=" code ";
$matricules=$this->professeur_modele->recuperer_liste_etudiants_anonymat($annee, $sigle, $semestre);
    // $sheetdata=$this->scolarite_modele->lire_ficher_excel();}
}
else{
    $code=" matricule ";
    $matricules=$this->professeur_modele->recuperer_liste_etudiants_matricule($annee, $sigle, $semestre);
}
      $sheetdata=$this->lire_ficher_excel();
  
      
      
    $donnees=array(); 
    $lignes=count($sheetdata);
     $h=0;$k=0;$nbrErreur=0;
$information='';

$colonnes=count($sheetdata[0]);
 if($colonnes==2){
      $listMatInexistant='';
           for($j=0;$j<count($matricules);$j++){
          $nonExist=0;
          
      for($i=1;$i<$lignes;$i++){
        if($matricules[$j]==$sheetdata[$i][0]){
         $nonExist++;
        }
      }
      if($nonExist==0){
         $listMatInexistant.=$matricules[$j].",";
         if($j==14 || $j==27 || $j==40 || $j==50)
              $listMatInexistant.="<br>";
         $nbrErreur++;
    } }
    if(!$listMatInexistant==''){
 $information.=$listMatInexistant."  ces matricule ne sont pas dans le fichier <br>";}
for($i=1;$i<$lignes;$i++){
    $exist=0;
	$ligne=$i+1;
    
                                                        
 if(!is_double($sheetdata[$i][0])) { 
    $information.="verifier le type du $code de la ligne $ligne <br>";$nbrErreur++;}
      else{
          if(!is_double($sheetdata[$i][1])) {
          $information.="verifier le type de la note de la ligne $ligne <br>";$nbrErreur++;}
		else{if($sheetdata[$i][1]>20 || $sheetdata[$i][1]<0 ){
	$information.="la note de la ligne $ligne ne correspond pas a une note";$nbrErreur++;}
					  else{
                                              
         for($j=0;$j<count($matricules);$j++){
        if($matricules[$j]==$sheetdata[$i][0]){
         $exist++;
        }
    }
    if($exist==0){
         $information.="le $code de la ligne $ligne n'existe pas <br>";$nbrErreur++;
    } else{

                           $donnees[$h]['matriculeEtudiant']=$sheetdata[$i][0];
	          $donnees[$h]['note']=$sheetdata[$i][1];
                                          $h++; }
					       }
                                             } 
                                        } }
	 $this->load_view_error($information,$donnees,$nbrErreur);}
else{
$titre='';$information='verifier le nombre de colonnes(voir le fichier modele)';
$alert='';
$data=array('titre'=>$titre,'information'=>$information,'alert'=>$alert);
echo(json_encode($data));
     
     
   }
      
     
  }
  
  function controle_fichier_notes_rat(){
    
     $annee=$_POST['annee'];
     $sigle=$_POST['sigle'];
$semestre=$_POST['semestre'];
$anonymat=$_POST['anonymat'];
$code='';
 $matricules= $this->professeur_modele->recuperer_liste_etudiants_rt($annee,$semestre, $sigle);
if($anonymat==1){
    $code=" code ";
$matricules=$this->professeur_modele->recuperer_liste_etudiants_anonymat_rt($matricules);
    // $sheetdata=$this->scolarite_modele->lire_ficher_excel();}
}
else{
    $code=" matricule ";
     //$matricules=$this->professeur_modele->recuperer_liste_etudiants_matricule($annee, $sigle, $semestre);
   
}
      $sheetdata=$this->lire_ficher_excel();
  
     
      
      
    $donnees=array(); 
    $lignes=count($sheetdata);
     $h=0;$k=0;$nbrErreur=0;
$information='';

$colonnes=count($sheetdata[0]);

 if($colonnes==2){
  $listMatInexistant='';
           for($j=0;$j<count($matricules);$j++){
          $nonExist=0;
          
      for($i=1;$i<$lignes;$i++){
        if($matricules[$j]==$sheetdata[$i][0]){
         $nonExist++;
        }
      }
      if($nonExist==0){
         $listMatInexistant.=$matricules[$j].",";
         if($j==14 || $j==27 || $j==40 || $j==50)
              $listMatInexistant.="<br>";
         $nbrErreur++;
    } }
    if(!$listMatInexistant==''){
 $information.=$listMatInexistant."  ces matricule ne sont pas dans le fichier <br>";}
    
      
        
    
for($i=1;$i<$lignes;$i++){
    $exist=0;
	$ligne=$i+1;
    
                                                        
 if(!is_double($sheetdata[$i][0])) { 
    $information.="verifier le type du $code de la ligne $ligne <br>";$nbrErreur++;}
      else{
          if(!is_double($sheetdata[$i][1])) {
          $information.="verifier le type de la note de la ligne $ligne <br>";$nbrErreur++;}
		else{if($sheetdata[$i][1]>20 || $sheetdata[$i][1]<0 ){
	$information.="la note de la ligne $ligne ne correspond pas a une note";$nbrErreur++;}
					  else{
                                              
         for($j=0;$j<count($matricules);$j++){
        if($matricules[$j]==$sheetdata[$i][0]){
         $exist++;
        }
    }
    if($exist==0){
         $information.="le $code de la ligne $ligne n'existe pas <br>";$nbrErreur++;
    } else{

                           $donnees[$h]['matriculeEtudiant']=$sheetdata[$i][0];
	          $donnees[$h]['note']=$sheetdata[$i][1];
                                          $h++; }
					       }
                                             } 
                                        } }
	 $this->load_view_error($information,$donnees,$nbrErreur);}
else{
$titre='';$information='verifier le nombre de colonnes(voir le fichier modele)';
$alert='';
$data=array('titre'=>$titre,'information'=>$information,'alert'=>$alert);
echo(json_encode($data));
     
     
   }
  }
  
function load_view_error($information,$donnees,$nbrErreur){
if($information==''){
    $titre='';$lInser=count($donnees);
  $information="<h2>pas d'erreur cliquez  imprter </h2>";
  $data=array('titre'=>$titre,'infocorrect'=>$information,'donnees'=>$donnees,'nbErreur'=>0,'nbDonnees'=>$lInser);
  echo json_encode($data);
}
else{
    $lInser=count($donnees);
    $alert="<br><font color=blue>si vous voulez importer les lignes corrects cliquez importer</font>";
$titre='<h2 color=red> il ya des erreurs dans le ficher</h2>'; 
$data=array('titre'=>$titre,'information'=>$information
      ,'donnees'=>$donnees,'alert'=>$alert,'nbError'=>$nbrErreur,'nbDonnees'=>$lInser);
     echo json_encode($data); }
}

function lire_ficher_excel(){
	
fopen("ficher_excel_importer/".$_FILES['file']['name'],'w');
			move_uploaded_file($_FILES["file"]["tmp_name"],"ficher_excel_importer/".$_FILES['file']['name']);
			//ouverture du ficher en mode lecture
			  $inputFileType = PHPExcel_IOFactory::identify("ficher_excel_importer/".$_FILES['file']['name']);
			$objtype=PHPExcel_IOFactory::createReader($inputFileType);
			$objnamefile=$objtype->load("ficher_excel_importer/".$_FILES['file']['name']);
			$sheet = $objnamefile->getActiveSheet();
			//mettre les donnees du ficher d'un tableaux
		$sheetdata =$sheet->toArray();
			return $sheetdata;}
                        
                        
                         function import_notes_to_table(){
    
   $annee=$_POST['annee'];
    $semestre=$_POST['semestre'];
    $sigle=$_POST['sigle'];
    $idEvaluation=$_POST['idEvaluation'];
	$dataTable=json_decode($_POST['donnees']);    $anonymat=$_POST['anonymat'];

        if($anonymat==1){
           for($i=0;$i<count($dataTable);$i++){
                                            
             $dataTable[$i]->matriculeEtudiant=$this->professeur_modele->anonymat_to_matricule($code);}
           
        }
        if($idEvaluation==4)
        {
            $res=$this->professeur_modele->import_notes_to_table_ratt($dataTable,$annee,$semestre,$sigle,$idEvaluation);
	$data=array('titre'=>"<h2>l'importation avec succes</h2>",'nb'=>"$res"); 
        echo json_encode($data);
        }else{

	$res=$this->professeur_modele->import_notes_to_table($dataTable,$annee,$semestre,$sigle,$idEvaluation);
	$data=array('titre'=>"<h2>l'importation avec succes</h2>",'nb'=>"$res"); 
        echo json_encode($data);}

}

function telecharger(){
    if(isset($_POST['F'])){
header("Location: ../../notes_anonymat.xlsx");}
if(isset($_POST['f1'])){
header("Location: ../../notes_par_matricule.xlsx");}
    
}

function telecharger_rt(){
   
header("Location: ../../notes_par_matricule_rt.xlsx");}
    




 function rediger_notes_cc_exam($annee, $session, $sigle) {
        $data['option'] = 'cc';
        $presenceNotes = '';
        $annee = $this->decode($annee);
        $session = $this->decode($session);
        //$data['nomsEvaluations']=$this->professeur_modele->get_noms_evaluations($sigle);
        $detail = $this->professeur_modele->get_type_cc($sigle);
        $data['nomsEvaluations'][0] = array('idEvaluation' => 1, 'nomEvaluation' => 'CP', 'detail' => $detail, 'ponderation' => 40);
         $data['nomsEvaluations'][1] = array('idEvaluation' => 2, 'nomEvaluation' => 'CC', 'detail' => $detail, 'ponderation' => 60);
        $data['matricule'] = $this->professeur_modele->recuperer_liste_etudiants($annee, $session, $sigle);
        $data['nbNoteExam'] = $this->professeur_modele->commencerRattrapage($sigle);

        if ($data['matricule'] != NULL) {
            $data['infoEtudiant'] = $this->professeur_modele->get_name_etudiants($data['matricule']);

            $data['noteEtudiant'] = $this->professeur_modele->get_notes_partielles_cc_exam($data['matricule'], $sigle, $annee, $session, '');
            $data['boutton_enregistrer'] = '';
            $presenceNotes = $this->professeur_modele->verifier_presence_note($data['matricule'], $sigle, $annee, $session);
            $validation = 'true';
            if ($presenceNotes == 'true') {
                $validation = $this->professeur_modele->verifier_acces_note($data['matricule'], $annee, $session, $sigle);
            }

            $data['annee'] = $annee;
            $data['session'] = $session;
            $data['sigle'] = $sigle;

            //$validation = 'true';

            if ($validation == 'true') {
                $data['disabled'] = '';
                $data['info'] = '';
                $data['sigle'] = $sigle;
                $data['boutton_enregistrer'] = '<input type="submit" name="submit" id="submit" value="Enregistrer" />';
                $this->load->view('professeur/rediger_notes_cc_exam', $data);
            } else {
                $data['info'] = '<div class="warning_box">Les notes de cette classe ont déjà été validées.</div>';
                $data['boutton_enregistrer'] = '';
                $data['disabled'] = 'disabled';
                $data['sigle'] = $sigle;
                $this->load->view('professeur/rediger_notes_cc_exam', $data);
            }
        } else {
            $data['type'] = 'error_box';
            $data['titre'] = 'Saisir les notes';
            $data['informations'] = 'Aucun étudiant n\'est inscrit au module <b>' . $sigle . ' </b>au semestre ' . $this->get_session_nom($session)
                    . ' ' . $annee . ' </b>';
            $this->load->view('professeur/modification_confirme', $data);
        }
    }
    
      function import_notes_to_table_note_cc_exam(){
    
   $annee=$_POST['annee'];
    $semestre=$_POST['semestre'];
    $sigle=$_POST['sigle'];
    $idEvaluation=$_POST['idEvaluation'];
	$dataTable=json_decode($_POST['donnees']);    $anonymat=$_POST['anonymat'];

        if($anonymat==1){
           for($i=0;$i<count($dataTable);$i++){
                                            
             $dataTable[$i]->matriculeEtudiant=$this->professeur_modele->anonymat_to_matricule($code);}
           
        }
        if($idEvaluation==4)
        {
            $res=$this->professeur_modele->import_notes_to_table_ratt($dataTable,$annee,$semestre,$sigle,$idEvaluation);
	$data=array('titre'=>"<h2>l'importation avec succes</h2>",'nb'=>"$res"); 
        echo json_encode($data);
        }else{

	$res=$this->professeur_modele->import_notes_to_table_note_cc_cp($dataTable,$annee,$semestre,$sigle);
	$data=array('titre'=>"<h2>l'importation avec succes</h2>",'nb'=>"$res"); 
        echo json_encode($data);}

}

function enregistrer_note_cc_exam() {
         echo 'option : '.$_POST['option'];
        // decryptage des matricules
        if (isset($_POST['option']) && ($_POST['option'] == 'ex' || $_POST['option'] == 'rt')) {
            for ($i = 0; $i < sizeof($_POST['matricule']); $i++) {
                $_POST['matricule'][$i] = $this->professeur_modele->decode($_POST['matricule'][$i]);
            }
        }
        // echo "Detail ".$this->input->post('detail');
        $counter = 0;
        $data['informations'] = '';
        $k = 0;
       //  print_r($_POST);
        for ($i = 0; $i < sizeof($_POST['matricule']); $i++) {
            $name_val="noteCC";
            $this->professeur_modele->enregistrer_notes_partielles_cc_cp($_POST, $i, '',$name_val);
            $name_val="noteCP";
            $this->professeur_modele->enregistrer_notes_partielles_cc_cp($_POST, $i, '',$name_val);

            $data['noteValide'][$i] = 'true';
        }
       //echo 'matricules après enregistrement : </br>';
        //print_r($_POST['matricule']);
        for ($i = 0; $i < sizeof($_POST['matricule']); $i++) {
            if ($data['noteValide'][$i] == 'true') {
                $counter++;
            }
        }
        if ($counter == sizeof($_POST['matricule'])) {
            $data['type'] = 'valid_box';
            $data['titre'] = 'Enregistrement de notes';
            $data['informations'] = 'Les notes du module <b>' . $_POST['sigle'] . ' </b> au semestre <b>' .
                    $this->get_session_nom($_POST['session']) . ' ' . $_POST['annee'] . '
                   </b> sont bien enregistrées.';
            $this->load->view('professeur/modification_confirme', $data);
        }
    }
}
