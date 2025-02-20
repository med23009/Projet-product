<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Agent extends CI_Controller {

// modifier $passwordChef = '' pour qu'aucun mot de passe ne soit demandé
    // Bien que ce ne soit pas une obligation, n'accepter que des lettres non accentuées et des chiffres, pas d'espace non plus.

    function __construct() {
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
        if (!in_array('agent', $this->session->userdata('profil')))
            redirect();
        setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
        $this->load->library('bulletin');
        $this->load->library('Classes/PHPExcel');
        $this->load->model('scolarite_modele');
        $this->load->model('admin_modele');
        $this->load->model('professeur_modele');
        $this->load->model('search_modele');
        $this->clear_output();
        $this->lang->load('iup', 'french');
        $this->lang->load('menusLabels_lang','french');
    }

    function clear_output() {
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
    function index($lang = '') {
        $this->lang->load('iup', $lang == '' ? 'french' : $lang);
        //menu

        $this->load->view('agent/index');
    }

    function verifier_chef_scolarite($pass) {
        if ($pass == $this->passwordChef)
            return true;
        else
            return false;
    }

    /*
     * Fonction isValid pour valider la note qui doit etre entre 0 et 20 et remplacer les virgules par des .
     */


    /*
     * Fonction pour ecrire les fichiers de log de chaque note modifiée.
     */

    function SemestreTexte($semestre) {
        switch (intval($semestre)) { // correction 2.2.2 : ajout intval
            case '1' :
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

    /*
     * Fonction pour ecrire les fichiers de log de chaque note modifiée.
     */


    /*
     * Fonction pour enregistrer les notes modifiees par le service de scolarite.
     */

    function valider_date_naissance($annee, $mois, $jour) {
        $messageRetour = 'valide';
        $dateAujourdhui = strftime("%Y");
        $ageAdmission = 16;
        $agelimite = 40;
        $age = $dateAujourdhui - $annee;
        $jourDeChaqueMois = array(31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
        if ($age < 14 || $age > 30) {
            $messageRetour = 'Année de naissance erronée, l\'étudiant aurait <b>' . $age . ' </b>ans  ';
        } elseif ($annee < 1950 || $annee > 2100 || $annee == 0) {
            $messageRetour = 'Date de naissance invalide : seules les années de 1950 à 2100 sont acceptées';
        } elseif ($mois > 12) {
            $messageRetour = 'Date de naissance invalide : une année n\'a pas plus de 12 mois';
        } elseif ($jour > 31) {
            $messageRetour = 'Date de naissance invalide : un mois n\'a pas plus de 31 jours';
        }
        if ($jour == 0) {
            $messageRetour = 'Date de naissance invalide : le jour de naissance est incorrect.';
            return $messageRetour;
        }
        if ($mois == 0) {
            $messageRetour = 'Date de naissance invalide : le mois de naissance est incorrect.';
            return $messageRetour;
        } else {
            if ($mois < 13) {
                if ($jour > $jourDeChaqueMois[$mois - 1]) {
                    $messageRetour = 'Date de naissance invalide : <b>' . $mois . '</b> est un mois de <b>' . $jourDeChaqueMois[$mois - 1] . '</b> jours';
                }
            }
            if ($mois == 2 && ($this->bissextile($annee) == FALSE) && $jour > 28) {
                $messageRetour = 'Date de naissance invalide : <b>' . $annee . '</b> n\'est pas bissextile, il n\'y a que 28 jours en février  <b>' . $annee . '</b>';
            }
        }

        return $messageRetour;
    }

    function valider_NIN($nin) {
        if ((is_numeric($nin) && strlen($nin) < 11) || strlen($nin) == 0) {
            $messageRetour = 'valide';
        } else {
            $messageRetour = 'nonValide';
        }
        return $messageRetour;
    }

    function GetValidDate($year = 1970, $month = 1, $day = 1) {
        //** provide a default value and convert the day of the month given. Day
        //** cannot be less than 1 or greater than 31.

        $day = min(31, max(1, intval($day)));

        //** provide a default value and convert the month number given. Month cannot
        //** be less than 1 or greater than 12.

        $month = min(12, max(1, intval($month)));

        //** provide a default value and convert the day of the year number given.

        $year = max(1970, intval($year));

        //** handle compensating for day runover if the number of days selected is
        //** greater than those allowable for the selected month.

        switch ($month) {
            //** if FEBRUARY the selected day must be corrected and a leap year must be
            //** acounted for as well.
            //** CHANGED JAN 26/2004 - corrected for leap year error.

            case 2 :
                if ($day > 28)
                    $day = ($year % 4 == 0 && ($year % 100 != 0 || $year % 400 == 0)) ? 29 : 28;
                break;

            //** only maximum of thirty days in these months.

            case 4 : //** APRIL
            case 6 : //** JUNE
            case 9 : //** SEPTEMBER
            case 11 : //** NOVEMBER

                $day = min(30, $day);
                break;
        }
        //** construct the appropriate date timestamp from the parameters provided.

        return mktime(0, 0, 0, $month, $day, $year);
    }

    function get_session_nom($numeroSemestre) {
        if ($numeroSemestre == 3) {
            return 'Automne';
        } elseif ($numeroSemestre == 2) {
            return 'Été';
        } else {
            return 'Printemps';
        }
    }

    function generer_excel_liste_enseingant() {
        $nomFichier = '';
        setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
        $date = utf8_encode(strftime("%d-%B-%Y"));
        $objXLS = new PHPExcel();
        $objSheet = $objXLS->setActiveSheetIndex(0);
        /// formatage du Titre de la liste.
        $objSheet->getDefaultStyle()->getFont()->setName('Courier New');
        $objSheet->setCellValue('A1', 'INSTITUT UNIVERSITAIRE PROFESSIONNEL');
        $objSheet->getStyle('A1')->getFont()->setBold(TRUE);

        $nomFichier = 'Enseignants_du_departement_' . $_POST['departement'] . '_' . $date;
        $objSheet->setCellValue('A3', 'Personnel actif de : ' .
                $this->scolarite_modele->get_departement_nom($_POST['departement']));
        $objSheet->setCellValue('A4', 'Liste produite le ' . $date);

        $objSheet->setCellValue('C6', 'Matricule');
        $objSheet->setCellValue('D6', 'Nom');
        $objSheet->setCellValue('E6', 'Prénom');
        $objSheet->setCellValue('F6', 'Code d\'accès');

        for ($i = 0; $i < count($_POST['matriculeEmploye']); $i++) {
            $objSheet->setCellValueByColumnAndRow(2, 7 + $i, $_POST['matriculeEmploye'][$i]);
            $objSheet->setCellValueByColumnAndRow(3, 7 + $i, $_POST['nom'][$i]);
            $objSheet->setCellValueByColumnAndRow(4, 7 + $i, $_POST['prenom'][$i]);
            $objSheet->setCellValueByColumnAndRow(5, 7 + $i, $_POST['login'][$i]);
        }
        for ($i = 2; $i < 6; $i++) {
            $objSheet->getStyleByColumnAndRow($i, 6)->getFont()->setBold(TRUE);
            for ($j = 0; $j <= count($_POST['matriculeEmploye']); $j++) {
                $objSheet->getStyleByColumnAndRow($i, $j + 6)->getBorders()->applyFromArray(
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


        /////////////////////////////////////////////////////////////////////////////////////////////////   
        $objXLS->getActiveSheet()->getColumnDimension("B")->setAutoSize(true);
        $objXLS->getActiveSheet()->getColumnDimension("C")->setAutoSize(true);
        $objXLS->getActiveSheet()->getColumnDimension("D")->setAutoSize(true);
        $objXLS->getActiveSheet()->getColumnDimension("E")->setAutoSize(true);
        $objXLS->getActiveSheet()->getColumnDimension("F")->setAutoSize(true);
        $objXLS->getActiveSheet()->setTitle('Liste_enseignants');
        $objXLS->setActiveSheetIndex(0);
        $objWriter = PHPExcel_IOFactory::createWriter($objXLS, 'Excel5');

        $objWriter = PHPExcel_IOFactory::createWriter($objXLS, 'Excel5');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $nomFichier . '.xls"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objXLS, 'Excel5');
        $objWriter->save('php://output');
    }

    function generer_excel_liste_enseingant_module() {
        $nomFichier = '';
        setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
        $date = utf8_encode(strftime("%d-%B-%Y"));
        $objXLS = new PHPExcel();
        $objSheet = $objXLS->setActiveSheetIndex(0);
        /// formattage du Titre de la liste.
        $objSheet->getDefaultStyle()->getFont()->setName('Courier New');
        $objSheet->setCellValue('A1', 'INSTITUT UNIVERSITAIRE PROFESSIONNEL');
        $objSheet->getStyle('A1')->getFont()->setBold(TRUE);


        $objSheet->setCellValue('A3', 'Liste des enseignants du module ' . $_POST['sigle'][0]);
        $objSheet->setCellValue('A4', 'Liste produite le ' . $date);

        $objSheet->setCellValue('C6', 'Matricule');
        $objSheet->setCellValue('D6', 'Nom');
        $objSheet->setCellValue('E6', 'Prénom');
        $objSheet->setCellValue('F6', 'Sigle');
        $objSheet->setCellValue('G6', 'Année');
        $objSheet->setCellValue('H6', 'Semestre');

        for ($i = 0; $i < count($_POST['matriculeEmploye']); $i++) {
            $objSheet->setCellValueByColumnAndRow(2, 7 + $i, $_POST['matriculeEmploye'][$i]);
            $objSheet->setCellValueByColumnAndRow(3, 7 + $i, $_POST['nom'][$i]);
            $objSheet->setCellValueByColumnAndRow(4, 7 + $i, $_POST['prenom'][$i]);
            $objSheet->setCellValueByColumnAndRow(5, 7 + $i, $_POST['sigle'][$i]);
            $objSheet->setCellValueByColumnAndRow(6, 7 + $i, $_POST['annee'][$i]);
            $objSheet->setCellValueByColumnAndRow(7, 7 + $i, $_POST['semestre'][$i]);
            $nomFichier = 'Enseignants_' . $_POST['sigle'][$i] . '_' . $date;
        }
        for ($i = 2; $i < 8; $i++) {
            $objSheet->getStyleByColumnAndRow($i, 6)->getFont()->setBold(TRUE);
            for ($j = 0; $j <= count($_POST['matriculeEmploye']); $j++) {
                $objSheet->getStyleByColumnAndRow($i, $j + 6)->getBorders()->applyFromArray(
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


        /////////////////////////////////////////////////////////////////////////////////////////////////   
        $objXLS->getActiveSheet()->getColumnDimension("B")->setAutoSize(true);
        $objXLS->getActiveSheet()->getColumnDimension("C")->setAutoSize(true);
        $objXLS->getActiveSheet()->getColumnDimension("D")->setAutoSize(true);
        $objXLS->getActiveSheet()->getColumnDimension("E")->setAutoSize(true);
        $objXLS->getActiveSheet()->getColumnDimension("F")->setAutoSize(true);
        $objXLS->getActiveSheet()->getColumnDimension("G")->setAutoSize(true);
        $objXLS->getActiveSheet()->setTitle('Liste_enseignants');
        $objXLS->setActiveSheetIndex(0);
        $objWriter = PHPExcel_IOFactory::createWriter($objXLS, 'Excel5');

        $objWriter = PHPExcel_IOFactory::createWriter($objXLS, 'Excel5');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $nomFichier . '.xls"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objXLS, 'Excel5');
        $objWriter->save('php://output');
    }

    /*
     * fonction qui est chargée de la consultation des horaires pour les cours 
     */

    function afficher_horaire_cours() {

        $this->form_validation->set_rules('date', 'L\'année et le semestre', 'required');
        $this->form_validation->set_rules('sigle', 'sigle', 'required');
        if ($this->form_validation->run()) {

            $date = explode("-", $this->input->post('date'));
            $sigle = $this->input->post('sigle');

            switch ($date[0]) {
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
            $periodeGroupe['titre'] = "Horaire du module " . $sigle . " : " . $semestre . $date[1];
            $periodeGroupe['detailHoraire'] = NULL;
            $dataIdGroupe = $this->scolarite_modele->get_idGroupe_anneeCourante($sigle, $date[0], $date[1]);

            if (is_array($dataIdGroupe)) {
                foreach ($dataIdGroupe['idGroupe'] as $idG) {
                    $periodeGroupe['detailHoraire'][] = $this->scolarite_modele->get_periode_groupe($idG);
                }
            }
            $this->load->view('scolarite/consulter_horaire_cours', $periodeGroupe);
        } else {
            $this->load->view('scolarite/index');
        }
    }

    /*
     * fonction pour valider les numeros de telephone.
     */

    function valider_phone($phone) {
        $caractereValide = array('+', '-', '/', '\\', '(', ')', ' ', '');
        if ($phone == NULL) {
            return TRUE;
        } else {
            for ($i = 0; $i < strlen($phone); $i++) {
                if (!is_numeric($phone[$i]) && !in_array($phone[$i], $caractereValide)) {
                    return FALSE;
                }
            }
        }
        return TRUE;
    }

    /*
     * premiere fontion pour l'ajout de l etudiant .
     * il fait appel a la vue principale pour ajouter etudiant(nom, prenom, date de naissance ...).
     */

    public function mot_de_passe() {
        $data['errorMessage'] = '';
        $this->load->view('agent/modifier_mot_de_passe', $data);
    }

    /*
     * fonction qui valide le mot de passe lors de sa modification
     */

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

    /*
     * fonction qui modifie le mot de passe et le valide 
     * en cas d erreur elle redirige vers des pages d erreurs
     */

    public function modifier_mot_de_passe() {
        if ($this->scolarite_modele->get_old_password($this->session->userdata('login')) == $this->input->post('old_password')) {
            $passwordIsValid = $this->password_check($this->input->post('new_password'));
            if ($passwordIsValid == TRUE) {
                if ($this->input->post('new_password') == $this->input->post('confirmed_password')) {
                    $this->scolarite_modele->set_password($this->input->post('new_password'), $this->session->userdata('login'));
                    $data['typeBox'] = 'valid_box';
                    $data['informations'] = 'Le mot de passe a été modifié avec succès.';
                    $this->load->view('agent/modification_confirme', $data);
                } else {
                    $data['errorMessage'] = '<div class="error_box">
                            Les deux nouveaux mots de passe ne sont pas identiques.
                            </div>';
                    $this->load->view('agent/modifier_mot_de_passe', $data);
                }
            } else {
                $data['errorMessage'] = '<div class="error_box">
                        Le mot de passe doit contenir 8 à 10 caractères dont au moins une lettre et un chiffre.
                        </div>';
                $this->load->view('agent/modifier_mot_de_passe', $data);
            }
        } else {
            $data['errorMessage'] = '<div class="error_box">
                       L\'ancien mot de passe est erroné.
                        </div>';
            $this->load->view('agent/modifier_mot_de_passe', $data);
        }
    }

    /*
     * Cette methode permet d'appeler la recherche parametrisable d'un etudiant
     *
     * @param - to_do_action: page vers laquelle aller lorsqu'on clique sur un element
     *        - id_action: specifie le parametre a envoyer apres la selection d'un element
     */

    function rechercher_professeurs() {
        $tables = array("employe", "departement");
        $join_keys = array('employe.idDepartement = departement.idDepartement');
        $db_columns = array('matriculeEmploye', 'employe.nom as nomEmploye', 'employe.prenom as prenomEmploye', 'departement.nom as nomDepartement', "case when actif = 1 then 'O' when actif = 0 then 'N' end as actif ");
        $result_columns = array('matriculeEmploye', 'nomEmploye', 'prenomEmploye', 'nomDepartement', "actif");

        $grid_columns = array('Matricule', 'Nom', 'Prénom', 'Département', 'Actif ?');
        $db_where = "order by matriculeEmploye";
        $action = '#';
        $id_action = 'matriculeEmploye';
        $result = $this->search_modele->getSearchResult($tables, $db_columns, $grid_columns, $join_keys, $action, $id_action, $db_where, $result_columns);

        $titre = 'Liste des employés ';
        $controlleur = "agent";
        $data = array('titre' => $titre, 'controlleur' => $controlleur, 'result' => $result);
        $this->load->view("recherche_parametree", $data);
    }

    function afficher_enseignant_module() {
        $infoEnseignant = '';
        $infoEnseignant['infoEnseignant'] = $this->scolarite_modele->getInfoEmployeModule($_POST['choixModule']);
        $infoEnseignant['titre'] = 'Enseignants du module <b>' . $_POST['choixModule'] . ' </b>';
        $infoEnseignant['departement'] = $_POST['choixModule'];
        $this->load->view('agent/afficher_liste_enseignant_module', $infoEnseignant);
    }

    function afficher_enseignant_departement() {
        $infoEnseignant = '';
        $infoEnseignant['infoEnseignant'] = $this->scolarite_modele->getInfoEmploye($_POST['choixDepartement']);
        if ($this->scolarite_modele->get_departement_nom($_POST['choixDepartement']) == 'Service administratif') {
            $infoEnseignant['titre'] = 'Personnel actif du <b>' .
                    $this->scolarite_modele->get_departement_nom($_POST['choixDepartement']) . ' </b>';
        } else {
            $infoEnseignant['titre'] = 'Enseignants actifs du département <b>' .
                    $this->scolarite_modele->get_departement_nom($_POST['choixDepartement']) . ' </b>';
        }

        $infoEnseignant['departement'] = $_POST['choixDepartement'];
        $this->load->view('agent/afficher_liste_enseignant', $infoEnseignant);
    }

    function afficher_enseignant_departement_ajax() {
        $infoEnseignant = '';
        $infoEnseignant['infoEnseignant'] = $this->scolarite_modele->getInfoEmploye($_GET['dept']);

        echo(json_encode($infoEnseignant));
    }

    function afficher_enseignant_modules_ajax() {
        $sessionCourante = $this->scolarite_modele->get_session_courante_calendar();
        $anneeC = $sessionCourante['annee'][0];
        $semestreC = $sessionCourante['semestre'][0];
        // $departements = $this->scolarite_modele->recuperer_departement();




        $modules['modules'] = $this->scolarite_modele->getModulesEnseignes($_GET['matriculeEmploye'], $anneeC, $semestreC);
        $modules['detailEvent'] = $this->scolarite_modele->getDetailEvent($_GET['matriculeEmploye'], $_GET['date'], $_GET['heureD']);
        // $locaux=$this->scolarite_modele->getLocaux();
        /// $allModules=$this->scolarite_modele->getAllModules($anneeC, $semestreC);
        echo(json_encode($modules));
    }

    function generer_liste_professeur() {
        $genererListe = false;
        $this->form_validation->set_rules('choixType', 'Le choix du type', 'required');
        if ($this->form_validation->run()) {
            $data['typeListe'] = 'professeur';
            switch ($this->input->post('choixType')) {
                case 'departement':
                    $data['titre'] = "Choisissez le département :";
                    $departements = $this->scolarite_modele->recuperer_departement();
                    if ($departements == NULL) {
                        $genererListe = true;
                        $info['typeBox'] = 'warning_box';
                        $info['informations'] = 'Veuillez inscrire au moins un étudiant dans un module.';
                        $this->load->view('agent/modification_confirme', $info);
                    } else {
                        $data['departements'] = $departements;
                        $this->load->view('agent/choisir_departement_pour_liste', $data);
                    }
                    break;
                case 'module':
                    $data['titre'] = "Choisissez le module :";
                    $sigles = $this->scolarite_modele->recuperer_sigle_cours();
                    if ($sigles == NULL) {
                        $genererListe = true;
                        $info['typeBox'] = 'warning_box';
                        $info['informations'] = 'Veuillez créer au moins un module.';
                        $this->load->view('agent/modification_confirme', $info);
                    } else {
                        $data['module'] = $sigles['sigleCours'];
                        $this->load->view('agent/choisir_departement_pour_liste', $data);

                        /* $data['hidden'] = array('from' => 'employe join groupe on 
                          employe.matriculeEmploye = groupe.matriculeEmploye
                          join module on groupe.sigle = module.sigle join programme',
                          'key' => 'module.sigle', 'columns' => array
                          ('employe.matriculeEmploye', 'employe.nom', 'employe.prenom'),
                          'titre' => 'Enseignants actifs du module '); */
                    }
                    break;
            }
        } else {
            $this->load->view('agent/choix_type_liste_prof');
        }
    }

    /*
     * fonction qui dirige la fonction generer liste dependemment du choix de l'utilisateur 
     * soit par annee, module, groupe ou programme.
     */

    function generer_liste_etudiant() {
        $genererListe = false;
        $this->form_validation->set_rules('choixType', 'Le choix du type', 'required');
        if ($this->form_validation->run()) {
            $data['typeListe'] = 'etudiant';
            $annees = $this->scolarite_modele->recuperer_annee();
            $courante = $this->scolarite_modele->get_date_courante();
            switch ($this->input->post('choixType')) {
                case 'annee':
                    $data['titre'] = "Choisissez le semestre";

                    if ($annees == NULL) {
                        $genererListe = true;
                        $info['typeBox'] = 'warning_box';
                        $info['informations'] = 'Veuillez inscrire au moins un étudiant dans un module !';
                        $this->load->view('scolarite/modification_confirme', $info);
                    } else {
                        $data['value'] = $annees['date'];
                        $data['option'] = $annees['date'];
                        $data['case'] = 'annee';
                        $data['courante'] = $courante;
                        $data['hidden'] = array('from' => 'etudiant join listeEtudiants
							on etudiant.matriculeEtudiant = listeEtudiants.matriculeEtudiant
							join groupe on groupe.idGroupe = listeEtudiants.idGroupe', 'key' => 'groupe.annee',
                            'columns' => array('etudiant.matriculeEtudiant', 'etudiant.nom', 'etudiant.prenom'),
                            'titre' => 'Étudiants actifs au semestre <b>');
                    }
                    break;
                case 'groupe':
                    $data['titre'] = "Choisissez le groupe";
                    $progs = $this->scolarite_modele->recuperer_sigle_groupe();
                    if ($progs == NULL) {
                        $genererListe = true;
                        $info['typeBox'] = 'warning_box';
                        $info['informations'] = 'Veuillez inscrire au moins un étudiant dans un module !';
                        $this->load->view('scolarite/modification_confirme', $info);
                    } else {
                        $data['value'] = $progs['idGroupe'];
                        $data['case'] = 'groupe';
                        $data['option'] = $progs['idGroupe'];
                        $data['hidden'] = array('from' => 'etudiant join listeEtudiants
							on etudiant.matriculeEtudiant = listeEtudiants.matriculeEtudiant', 'key' => 'listeEtudiants.idGroupe',
                            'columns' => array('etudiant.matriculeEtudiant', 'etudiant.nom', 'etudiant.prenom'),
                            'titre' => 'Étudiants du groupe ');
                    }
                    break;
                case 'module':
                    $data['titre'] = "Choisissez le module";
                    $data['case'] = 'module';
                    $sigles = $this->scolarite_modele->recuperer_sigle_cours();
                    if ($sigles == null) {
                        $genererListe = true;
                        $info['typeBox'] = 'warning_box';
                        $info['informations'] = 'Veuillez inscrire au moins un étudiant dans un module !';
                        $this->load->view('scolarite/modification_confirme', $info);
                    } else {
                        $data['annee'] = $this->scolarite_modele->recuperer_annee();
                        $data['value'] = $sigles['sigleCours'];
                        $data['option'] = $sigles['sigleCours'];
                        $data['courante'] = $courante;
                        $data['hidden'] = array('from' => 'etudiant join listeEtudiants
							on etudiant.matriculeEtudiant = listeEtudiants.matriculeEtudiant join groupe on groupe.idGroupe = listeEtudiants.idGroupe', 'key' => 'groupe.sigle',
                            'columns' => array('etudiant.matriculeEtudiant', 'etudiant.nom', 'etudiant.prenom'),
                            'titre' => 'Étudiants du module ');
                    }
                    break;

                case 'programme':
                    $data['titre'] = "Choisissez le programme";
                    $data['case'] = 'programme';
                    $data['annee'] = $this->scolarite_modele->recuperer_annee();
                    $programmes = $this->scolarite_modele->recuperer_programme();
                    $data['value'] = $programmes['idProg'];
                    $data['option'] = $programmes['nom'];
                    $data['hidden'] = array('from' => 'etudiant join dossierEtudiant
                        on etudiant.matriculeEtudiant = dossierEtudiant.matriculeEtudiant', 'key' => 'dossierEtudiant.idProgramme',
                        'columns' => array('etudiant.matriculeEtudiant', 'etudiant.nom', 'etudiant.prenom'),
                        'titre' => 'Étudiants actifs du programme ');
                    break;
            }
            //on teste si aucun etudiant n'est inscrit à un module.
            if ($genererListe == false) {
                $this->generer_liste($data);
            }
        } else {
            $this->load->view('scolarite/choix_type_liste_etudiant');
        }
    }

    /*
     * Fonction qui génère les fichiers Excel pour les listes des étudiants
     */

    function generer_excel() {

        $nombreEtudiant = 0;
        $nomFichier = '';
        setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
        $date = utf8_encode(strftime("%d-%B-%Y"));
        $objXLS = new PHPExcel();
        $objSheet = $objXLS->setActiveSheetIndex(0);
        /// formatage du Titre de la liste.
        $objSheet->getDefaultStyle()->getFont()->setName('Courier New');
        $objSheet->setCellValue('A1', 'INSTITUT UNIVERSITAIRE PROFESSIONNEL');
        $objSheet->getStyle('A1')->getFont()->setBold(TRUE);
        if ($_POST['typeListe'] == 'professeur') {
            $nombreEtudiant = count($_POST['liste']);
            $nomFichier = 'Enseignants_' . $_POST['choix'] . '_' . $date;
            $objSheet->setCellValue('A3', ' Liste des enseignants actifs (liste produite le ' . $date . ')');
        } else {
            if (strstr($_POST['choix'], 'Groupe') || (strstr($_POST['choix'], 'PROG'))) {
                $nombreEtudiant = count($_POST['liste']);
            } else {
                $nombreEtudiant = count($_POST['liste']['matriculeEtudiant']);
            }
            $objSheet->setCellValue('A3', $_POST['titre'] . ' (liste produite le ' . $date . ')');
        }

        //je teste si la liste generee est une liste de module, de groupe, d'annee ou de programme
        //et je retourne l information necessaire pour generer le header de la liste.

        if (strstr($_POST['choix'], 'PROG')) {
            $nomFichier = 'Etudiants_' . $_POST['choix'];
            $objSheet->setCellValue('B5', 'Programme :');
            $objSheet->getStyle('B5')->getAlignment()->applyFromArray(
                    array(
                        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
                        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                        'rotation' => 0,
                        'wrap' => true,
                        'font' => array('bold' => true)
                    )
            );
            $objSheet->setCellValue('C5', $this->scolarite_modele->get_programme_nom($_POST['choix']));
        } elseif (strstr($_POST['choix'], 'Groupe')) {
            $nombreEtudiant = count($_POST['liste']);
            $nomFichier = 'Etudiants_' . $_POST['choix'];
            $titre = 'au groupe ' . $_POST['choix'];
            $info_module = $this->scolarite_modele->recuperer_info_groupe($_POST['choix']);

            $objSheet->setCellValue('B5', 'Module :');
            $objSheet->getStyle('B5')->getAlignment()->applyFromArray(
                    array(
                        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
                        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                        'rotation' => 0,
                        'wrap' => true,
                        'font' => array('bold' => true)
                    )
            );
            $objSheet->setCellValue('C5', $info_module['sigle'] . ' ' . $info_module['titre'] . ' (' . $info_module['nbCredits'] . ' crédits)');
            $objSheet->setCellValue('B6', 'Groupe :');
            $objSheet->getStyle('B6')->getAlignment()->applyFromArray(
                    array(
                        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
                        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                        'rotation' => 0,
                        'wrap' => true,
                        'font' => array('bold' => true)
                    )
            );
            $objSheet->setCellValue('C6', $info_module['typeGroupe'] . ' numéro ' . $info_module['numGroupe']);
            $objSheet->setCellValue('B7', 'Enseignant :');
            $objSheet->getStyle('B7')->getAlignment()->applyFromArray(
                    array(
                        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
                        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                        'rotation' => 0,
                        'wrap' => true,
                        'font' => array('bold' => true)
                    )
            );
            $objSheet->setCellValue('C7', $info_module['prenom'] . ' ' . $info_module['nom']);
        } elseif (is_numeric($_POST['choix'])) {
            $titre = 'à l\'année ' . $_POST['choix'];
            $nomFichier = 'Etudiants_' . $_POST['semestre'] . '_' . $_POST['choix'];
        } elseif (strstr($_POST['choix'], 'DPT')) {
            $objSheet->setCellValue('B5', 'Département :');
            $objSheet->getStyle('B5')->getAlignment()->applyFromArray(
                    array(
                        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
                        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                        'rotation' => 0,
                        'wrap' => true,
                        'font' => array('bold' => true)
                    )
            );
            $objSheet->setCellValue('C5', $this->scolarite_modele->get_departement_nom($_POST['choix']));
        } elseif ($_POST['typeListe'] != 'professeur') {
            $nomFichier = 'Etudiants_' . $_POST['semestre'] . '_' . $_POST['annee'] . '_' . $_POST['choix'];
            $info_module = $this->scolarite_modele->recuperer_module($_POST['choix']);
            $objSheet->setCellValue('B6', 'Module :');
            $objSheet->getStyle('B6')->getAlignment()->applyFromArray(
                    array(
                        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
                        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                        'rotation' => 0,
                        'wrap' => true,
                        'font' => array('bold' => true))
            );
            $objSheet->setCellValue('C6', $_POST['choix'] . ' ' . $info_module['titre'] . ' (' . $info_module['nbCredits'] . ' crédits)');
            if ($_POST['typeListe'] == 'professeur') {
                $objSheet->setCellValue('B7', 'Responsable :');
            } else {
                $objSheet->setCellValue('B7', 'Enseignant responsable :');
            }
            $objSheet->getStyle('B7')->getAlignment()->applyFromArray(
                    array(
                        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
                        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                        'rotation' => 0,
                        'wrap' => true,
                        'font' => array('bold' => true)
                    )
            );
            $objSheet->setCellValue('C7', $info_module['prenom'] . ' ' . $info_module['nom']);
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
        $objSheet->setCellValue('C10', 'Nom  et Prénom');
        $objSheet->getStyle('C10')->getAlignment()->applyFromArray(
                array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY,
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                    'rotation' => 0,
                    'font' => array('bold' => true),
                    'wrap' => true
                )
        );
        $objSheet->setCellValue('D10', 'Signature');
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
        if ($_POST['typeListe'] == 'professeur' || strstr($_POST['choix'], 'Groupe') || strstr($_POST['choix'], 'PROG')) {
            for ($i = 0; $i < $nombreEtudiant; $i = $i + 3) {
                if (strstr($_POST['choix'], 'Groupe') || strstr($_POST['choix'], 'PROG')) {
                    $objSheet->setCellValue('B' . $index, $_POST['liste'][$i]['matriculeEtudiant']);
                } else {
                    $objSheet->setCellValue('B' . $index, $_POST['liste'][$i]['matriculeEmploye']);
                }
                $objSheet->getStyle('B' . $index)->getAlignment()->applyFromArray(
                        array(
                            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                            'rotation' => 0,
                            'wrap' => true)
                );
                $objSheet->setCellValue('C' . $index, $_POST['liste'][$i + 1]['nom'] .
                        ', ' . $_POST['liste'][$i + 2]['prenom']);

                $objSheet->setCellValue('D' . $index, '    ');
                $objSheet->getStyle('D' . $index)->getAlignment()->applyFromArray(
                        array(
                            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                            'rotation' => 0,
                            'wrap' => true
                        )
                );
                $index++;
            }
            ////////////////////////////////////////////////////////////////////////////////////////////
            //je fais une boucle sur tous les etudiants plus j'ajoute 3 cases des titres(Matricule,Nom et prenom...)
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
        } elseif ($_POST['typeListe'] == 'etudiant') {
            for ($i = 0; $i < $nombreEtudiant; $i++) {
                $objSheet->setCellValue('B' . $index, $_POST['liste']['matriculeEtudiant'][$i]);
                $objSheet->getStyle('B' . $index)->getAlignment()->applyFromArray(
                        array(
                            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                            'rotation' => 0,
                            'wrap' => true
                        )
                );
                $objSheet->setCellValue('C' . $index, $_POST['liste']['nom'][$i] . ', ' . $_POST['liste']['prenom'][$i]);
                $objSheet->setCellValue('D' . $index, '    ');
                $objSheet->getStyle('D' . $index)->getAlignment()->applyFromArray(
                        array(
                            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                            'rotation' => 0,
                            'wrap' => true
                        )
                );
                $index++;
            }
            ////////////////////////////////////////////////////////////////////////////////////////////
            //je fais une boucle sur tous les etudiants plus j'ajoute 3 cases des titres(Matricule,Nom et prenom...)
            for ($i = 1; $i <= $nombreEtudiant + 1; $i++) {
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
        }

        /////////////////////////////////////////////////////////////////////////////////////////////////   
        $objXLS->getActiveSheet()->getColumnDimension("B")->setAutoSize(true);
        $objXLS->getActiveSheet()->getColumnDimension("C")->setAutoSize(true);
        $objXLS->getActiveSheet()->getColumnDimension("D")->setAutoSize(true);
        $objXLS->getActiveSheet()->setTitle('Titre1');
        $objXLS->setActiveSheetIndex(0);
        $objWriter = PHPExcel_IOFactory::createWriter($objXLS, 'Excel5');

        $objWriter = PHPExcel_IOFactory::createWriter($objXLS, 'Excel5');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $nomFichier . '.xls"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objXLS, 'Excel5');
        $objWriter->save('php://output');

        $data['typeBox'] = 'valid_box';
        $data['informations'] = 'Fichier géneré avec succès.';
        $this->load->view('scolarite/modification_confirme', $data);
    }

    function generer_liste($data = '') {
        $result = NULL;
        $this->form_validation->set_rules('choix', 'choix', 'required');
        if ($this->form_validation->run()) {
            $result['choix'] = $_POST['choix'];
            $result['typeListe'] = $_POST['typeListe'];
            //en cas de module si cette variable existe alors l utilisateur veux voir une liste
            //d etudiants par module.
            if (isset($_POST['annee'])) {
                $result['table'] = $this->scolarite_modele->get_nom_prenom_etudiant($this->scolarite_modele->
                                get_etudiant_inscrit_module($_POST['choix'], $_POST['annee'], $_POST['session']));

                $result['semestre'] = $this->get_session_nom($_POST['session']);
                $result['annee'] = $_POST['annee'];
                $result['titre'] = 'Étudiants inscrits au module ' . $_POST['choix'] .
                        ' au semestre ' . $this->get_session_nom($_POST['session']) . '-' . $_POST['annee'];

                $result['module'] = 'module'; // variable pour l envoyer a la vue pour que la vue sache ce qu'elle doit afficher ou non
            }
            //le cas de l'annee n est pas identique avec les autres cas 
            elseif (isset($_POST['session'])) {
                $result['semestre'] = $this->get_session_nom($_POST['session']);
                $result['table'] = $this->scolarite_modele->get_nom_prenom_etudiant($this->scolarite_modele->recuperer_etudiants_actifs_annee($_POST['choix'], $_POST['session']));
                $result['titre'] = $this->input->post('titre') . ": " . $result['semestre'] . '-' . $this->input->post('choix');
            } else {
                $result['table'] = $this->scolarite_modele->get_liste($_POST['columns'], $_POST['from'], $_POST['key'], $_POST['choix']);
                $result['titre'] = $this->input->post('titre') . ": " . $this->input->post('choix');
            }
            if (strstr($_POST['choix'], 'PROG')) {
                $result['table'] = $this->scolarite_modele->get_liste($_POST['columns'], $_POST['from'], $_POST['key'], $_POST['choix']);
                $result['titre'] = $this->input->post('titre') . ": " . $this->input->post('choix');
            }


            if ($this->input->post('choix') == 'DPT-ADM')
                $result['titre'] = "Employés du département: " . $this->input->post('choix');

            if (!is_array($result['table'])) {

                $data['typeBox'] = 'warning_box';
                if ($_POST['typeListe'] == 'professeur') {

                    $data['informations'] = 'Le module <b>' . $_POST['choix'] . ' </b> n\'a été attribué à aucun enseignant.';
                } else {
                    //Annee
                    if (isset($_POST['session'])) {
                        // $data['informations'] = 'Aucun étudiant n\'est inscrit au semestre <b>' .
                        //correction RM 27 février 2013   $this->get_session_nom($_POST['session']) . ' - ' . $_POST['choix'] . ' </b>';
                        $data['informations'] = 'Aucun étudiant n\'est inscrit au module <b>' . $_POST['choix'] . ' </b>' .
                                'au semestre <b>' . $this->get_session_nom($_POST['session']) . ' ' . $_POST['annee'] . ' </b>.';
                        /*   au module <b>' . $_POST['choix'] . '</b>'; */
                    }
                    //Module
                    else {
                        $data['informations'] = 'Aucun étudiant n\'est inscrit au programme <b>' .
                                $this->scolarite_modele->get_programme_nom($_POST['choix']) . '</b>.'; //correction 2.2.1
                    }
                }
                $this->load->view("scolarite/modification_confirme", $data);
            } else {
                $this->load->view('scolarite/afficher_liste', $result);
            }
        } else {
            $this->load->view('scolarite/choix_type_liste', $data);
        }
    }

    /*
     * fonction qui affiche tous les groupes qui sont offerts durant l annee courante 
     */

    function ajouter_absences() {
        $sessionCourante = $this->scolarite_modele->get_session_courante();
        $anneeCourante = $sessionCourante['annee'][0];
        $semestreCourant = $sessionCourante['semestre'][0];

        $tables = array("groupe");
        $join_keys = null;
        $db_columns = array('idGroupe', 'numGroupe', 'typeGroupe', 'annee', "case when semestre = 1 then 'Printemps' when semestre = 2 then '&#201;t&#233;'
                when semestre = 3 then 'Automne' end as semestre");
        $db_result_columns = array('idGroupe', 'numGroupe', 'typeGroupe', 'annee', 'semestre');
        $grid_columns = array('Groupe', 'Numéro du groupe', 'Type', "Année", 'Semestre');
        $action = 'afficher_etudiant_groupe';
        $id_action = 'idGroupe';
        $db_where = "where annee = $anneeCourante and semestre = $semestreCourant";
        $result = $this->search_modele->getSearchResult($tables, $db_columns, $grid_columns, $join_keys, $action, $id_action, $db_where, $db_result_columns);
        $titre = 'Les groupes offerts au semestre courant : <b>' . $this->get_session_nom($semestreCourant) . '  ' . $anneeCourante . '</b>';
        $controlleur = "agent";
        $data = array('titre' => $titre, 'controlleur' => $controlleur, 'result' => $result);
        $this->load->view("recherche_parametree", $data);
    }

    /*
     * fonction qui affiche tous les etudiants inscrits dans un groupe precis
     */

    function afficher_etudiant_groupe($idGroupe) {
        $sessionCourante = $this->scolarite_modele->get_session_courante();
        $anneeCourante = $sessionCourante['annee'][0];
        $semestreCourant = $sessionCourante['semestre'][0];
        //tous les etudiants inscrits dans un groupe specifie
        $data['etudiant'] = $this->scolarite_modele->get_etudiants_groupe($idGroupe);
        $data['annee'] = $anneeCourante;
        $data['session'] = $semestreCourant;
        $data['idGroupe'] = $idGroupe;
        /* Correction 23 février 2013 RM $data['titre'] = 'Liste des étudiants du groupe ' . $idGroupe . ', semestre ' .
          $this->get_session_nom($semestreCourant) . ' ' . $anneeCourante . '
          . Cocher le ou les étudiants absents.'; */
        $data['titre'] = 'Liste des étudiants du groupe ' . $this->scolarite_modele->corrigerNumGroupe($idGroupe) . ', semestre ' .
                $this->get_session_nom($semestreCourant) . ' ' . $anneeCourante . '
						. Cocher le ou les étudiants absents.';
        $this->load->view('agent/entrer_absences', $data);
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
                $day .= $date[$i];
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
     * fonction qui converti le type de date Atom en yyyy-mm-dd
     */

    function convert_date_ATOM($date) {
        $dateConverti = '';
        for ($i = 0; $i < 10; $i++) {
            $dateConverti .= $date[$i];
        }
        return $dateConverti;
    }

    /*
     * fonction pour enregistrer les absences entrer par la secretaire
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
            $this->load->view('agent/confirmation_absences', $data);
        } else {
            //on teste si la duree n'est pas selectionne
            if (!isset($_POST['duree']) && !isset($_POST['duree2'])) {
                $data['titre'] = 'Entrer Absences';
                $data['type'] = 'error_box';
                $data['informations'] = 'Erreur : vous avez oublié de spécifier la durée de l\'absence';
                $this->load->view('agent/confirmation_absences', $data);
            } else {
                if (isset($_POST['duree']) && isset($_POST['duree2'])) {
                    if (($_POST['duree'] == 0) && ($_POST['duree2'] == 0.0)) {
                        $data['titre'] = 'Entrer Absences';
                        $data['type'] = 'error_box';
                        $data['informations'] = 'Erreur : 0 n\'est pas une durée valide pour entrer les absences.';
                        $this->load->view('agent/confirmation_absences', $data);
                    } else {
                        if (!isset($_POST['periode'])) {
                            $data['titre'] = 'Entrer Absences';
                            $data['type'] = 'error_box';
                            $data['informations'] = 'Erreur : vous avez oublié de spécifier la période de l\'absence';
                            $this->load->view('agent/confirmation_absences', $data);
                        } else {
                            $dateCourante = $this->scolarite_modele->get_date_courante();
                            //si la date choisis n'est pas dans l intervalle des date du debu et fin des cours
                            if ($this->convert_date($_POST['date']) < $dateCourante['debutCours'] || $this->convert_date($_POST['date']) > $dateCourante['finCours']) {
                                $data['titre'] = 'Entrer Absences';
                                $data['type'] = 'error_box';

                                $data['informations'] = 'Erreur:  la date choisie <b>' . $this->convert_date($_POST['date']) . ' </b>ne fait pas partie du semestre courant <b>' .
                                        $this->get_session_nom($dateCourante['semestre']) . ' ' . $dateCourante['annee'] . '. </b>Si le semestre courant est en erreur, contactez l\'administrateur réseau.';
                                $this->load->view('agent/confirmation_absences', $data);
                            } else {
                                //on teste si la date choisie est dans le futur
                                if ($this->convert_date($_POST['date']) > $date) {
                                    $data['titre'] = 'Entrer Absences';
                                    $data['type'] = 'error_box';
                                    $data['informations'] = 'Erreur : on ne peut choisir une date postérieure à la date présente.';
                                    $this->load->view('agent/confirmation_absences', $data);
                                } else {
                                    $this->scolarite_modele->enregistrer_absences($_POST);
                                    $data['titre'] = 'Entrer Absences';
                                    $data['type'] = 'valid_box';
                                    /* Corrigé 23 février 2013 RM $data['informations'] = 'Les absences au groupe <b>' . $_POST['idGroupe'] . '</b> ont bien été enregistrées.'; */
                                    $data['informations'] = 'Les absences au groupe <b>' . $this->scolarite_modele->corrigerNumGroupe($_POST['idGroupe']) . '</b> ont bien été enregistrées.';
                                    $this->load->view('agent/confirmation_absences', $data);
                                }
                            }
                        }
                    }
                } else {
                    if (isset($_POST['duree'])) {
                        if ($_POST['duree'] == 0) {


                            $data['titre'] = 'Entrer Absences';
                            $data['type'] = 'error_box';
                            $data['informations'] = 'Erreur : 0 n\'est pas une durée valide pour entrer les absences.';
                            $this->load->view('scolarite/confirmation_absences', $data);
                        } else {
                            if (!isset($_POST['periode'])) {
                                $data['titre'] = 'Entrer Absences';
                                $data['type'] = 'error_box';
                                $data['informations'] = 'Erreur : vous avez oublié de spécifier la période de l\'absence.';
                                $this->load->view('agent/confirmation_absences', $data);
                            } else {
                                $dateCourante = $this->scolarite_modele->get_date_courante();
                                //si la date choisie n'est pas dans l intervalle des dates du debut et fin des cours
                                if ($this->convert_date($_POST['date']) < $dateCourante['debutCours'] || $this->convert_date($_POST['date']) > $dateCourante['finCours']) {
                                    $data['titre'] = 'Entrer Absences';
                                    $data['type'] = 'error_box';

                                    $data['informations'] = 'Erreur:  la date choisie <b>' . $this->convert_date($_POST['date']) . ' </b>ne fait pas partie du semestre courant <b>' .
                                            $this->get_session_nom($dateCourante['semestre']) . ' ' . $dateCourante['annee'] . '. </b>Si le semestre courant est en erreur, contactez l\'administrateur réseau.';
                                    $this->load->view('agent/confirmation_absences', $data);
                                } else {
                                    //on teste si la date choisi est dans le futur
                                    if ($this->convert_date($_POST['date']) > $date) {
                                        $data['titre'] = 'Entrer Absences';
                                        $data['type'] = 'error_box';
                                        $data['informations'] = 'Erreur : on ne peut choisir une date postérieure à la date présente';
                                        $this->load->view('scolarite/confirmation_absences', $data);
                                    } else {
                                        $this->scolarite_modele->enregistrer_absences($_POST);
                                        $data['titre'] = 'Entrer Absences';
                                        $data['type'] = 'valid_box';
                                        $data['informations'] = 'Les absences au groupe <b>' . $this->scolarite_modele->corrigerNumGroupe($_POST['idGroupe']) . '</b> ont bien été enregistrées.';
                                        /* $data['informations'] = 'Les absences au groupe <b>' . $_POST['idGroupe'] . '</b> ont bien été enregistrées.'; */
                                        $this->load->view('agent/confirmation_absences', $data);
                                    }
                                }
                            }
                        }
                    } else {
                        if ($_POST['duree2'] == 0) {
                            $data['titre'] = 'Entrer Absences';
                            $data['type'] = 'error_box';
                            $data['informations'] = 'Erreur : 0 n\'est pas une durée valide pour entrer une absence.';
                            $this->load->view('agent/confirmation_absences', $data);
                        } else {
                            if (!isset($_POST['periode'])) {
                                $data['titre'] = 'Entrer Absences';
                                $data['type'] = 'error_box';
                                $data['informations'] = 'Erreur : vous avez oublié de spécifier la période de l\'absence.';
                                $this->load->view('scolarite/confirmation_absences', $data);
                            } else {
                                $dateCourante = $this->scolarite_modele->get_date_courante();
                                //si la date choisie n'est pas dans l intervalle des dates du debut et fin des cours
                                if ($this->convert_date($_POST['date']) < $dateCourante['debutCours'] || $this->convert_date($_POST['date']) > $dateCourante['finCours']) {
                                    $data['titre'] = 'Entrer Absences';
                                    $data['type'] = 'error_box';

                                    $data['informations'] = 'Erreur:  La date choisie <b>' . $this->convert_date($_POST['date']) . ' </b>ne fait pas partie du semestre courant <b>' .
                                            $this->get_session_nom($dateCourante['semestre']) . ' ' . $dateCourante['annee'] . '. </b>Si le semestre courant est en erreur, contactez l\'administrateur réseau.';
                                    $this->load->view('agent/confirmation_absences', $data);
                                } else {
                                    //on teste si la date choisi est dans le futur
                                    if ($this->convert_date($_POST['date']) > $date) {
                                        $data['titre'] = 'Entrer Absences';
                                        $data['type'] = 'error_box';
                                        $data['informations'] = 'Erreur : on ne peut choisir une date postérieure à la date présente.';
                                        $this->load->view('agent/confirmation_absences', $data);
                                    } else {
                                        $this->scolarite_modele->enregistrer_absences($_POST);
                                        $data['titre'] = 'Entrer Absences';
                                        $data['type'] = 'valid_box';
                                        $data['informations'] = 'Les absences au groupe <b>' . $this->scolarite_modele->corrigerNumGroupe($_POST['idGroupe']) . '</b> ont bien été enregistrées.';
                                        /* Correction 23 février 2013 RM $data['informations'] = 'Les absences au groupe <b>' . $_POST['idGroupe'] . '</b> ont bien été enregistrées.'; */
                                        $this->load->view('agent/confirmation_absences', $data);
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    /*
     * fonction pour supprimer l'absence en cas d'erreur ou motive une absence
     * on affiche la date et le semestre afin de trouver l'etudiant .
     */

    function retirer_absences() {
        $data = NULL;
        $data['titre'] = 'Choisir la date et le semestre';
        $data['annee'] = $this->scolarite_modele->recuperer_annee();
        $data['courante'] = $this->scolarite_modele->get_session_courante();
        $this->load->view('agent/choisir_date_absences', $data);
    }

    /*
     * fonction pour afficher les groupe ou un etudiant etait absent a une date precise
     */

    function afficher_groupe_abseces() {
$date=        $_POST['date'];
//$date = $this->convert_date($_POST['date']);
        $semestre = $_POST['session'];
        $annee = $_POST['annee'];

        $tables = array("absences", "groupe");
        $join_keys = array('absences.idGroupe = groupe.idGroupe');
        $db_columns = array('absences.idGroupe as idGroupe', 'groupe.numGroupe as numGroupe', 'groupe.typeGroupe as typeGroupe', 'absences.annee as an', 'absences.semestre as session');
        $db_result = array('idGroupe', 'numGroupe', 'typeGroupe', 'an', 'session');
        $grid_columns = array('Groupe', 'Numéro du groupe', 'Type', "Année", 'Semestre');
        $action = 'afficher_etudiant_groupe_absences/' . $this->encode($date);
        $id_action = ''; //absences.idGroupe
        $db_where = "where absences.annee = $annee and absences.semestre = $semestre and date ='$date" . "'";
        $result = $this->search_modele->getSearchResult($tables, $db_columns, $grid_columns, $join_keys, $action, $id_action, $db_where, $db_result);
       
        $titre = 'Les groupes offerts au semestre <b>' . $this->get_session_nom_paire_impaire($semestre) . ' ' . $annee .
                '</b>, pour lesquels il y a des absences le <b>' . $date . '. </b>';
        $controlleur = "agent";
        $data = array('titre' => $titre, 'controlleur' => $controlleur, 'result' => $result);
        $this->load->view("recherche_parametree", $data);
    }
    //paire_impaire add by MedBakar 14-04-2020
    function get_session_nom_paire_impaire($numeroSemestre) {
        if ($numeroSemestre == 3) {
            return 'Impaire';
        } elseif ($numeroSemestre == 2) {
            return '';
        } else {
            return 'Paire';
        }
    }
    //fonction pour afficher les etudiants absents dans un groupe
    function afficher_etudiant_groupe_absences($date, $idGroupe, $matricule = '') {
        $date = $this->decode($date);
        if (!file_exists("idGroupe.txt")) {
            $fp = fopen("idGroupe.txt", "w");
            file_put_contents("idGroupe.txt", $idGroupe);
            fclose($fp);
        }
        //important don't remove ********
        if ($idGroupe == 'afficher_absences_pour_etudiant') {
            redirect('scolarite/afficher_absences_pour_etudiant/' . $this->encode($date) .
                    '/' . $this->encode($matricule));
        }

        $tables = array("absences", "etudiant");
        $join_keys = array('absences.matricule = etudiant.matriculeEtudiant');
        $db_columns = array('absences.matricule as matricule', 'nom', 'prenom');
        $db_result = array('matricule', 'nom', 'prenom');
        $grid_columns = array('Matricule', 'Nom', 'Prénom');
        $action = 'afficher_absences_pour_etudiant/';
        $id_action = 'matricule'; //absences.idGroupe';
        $db_where = "where date =' $date' and idGroupe = '$idGroupe '";
        $result = $this->search_modele->getSearchResult($tables, $db_columns, $grid_columns, $join_keys, $action, $id_action, $db_where, $db_result);
        $titre = 'Les étudiants ayant été absents le  <b>' . $date . ' </b>';
        $controlleur = "agent";
        $data = array('titre' => $titre, 'controlleur' => $controlleur, 'result' => $result);
        $this->load->view("recherche_parametree", $data);
    }

    //fonction pour charger la vue afin et envoyer les données nécessaires envoyées par les deux fonctions en haut
    //afin d'effectuer un retrait ou une motivation d'absences pour un etudiant.
    function afficher_absences_pour_etudiant($date, $matricule) {

        if (file_exists("idGroupe.txt")) {
            $fp = fopen("idGroupe.txt", "r");
            $idGroupe = file_get_contents("idGroupe.txt");
            fclose($fp);
            unlink("idGroupe.txt");
            $date = $this->decode($date);
            $matricule = $this->decode($matricule);
            $infoAbsences = $this->scolarite_modele->get_liste_etudiants_aretirer_absents($date, $idGroupe, $matricule);
            $infoAbsences['titre'] = 'Retrait/Motivation des absences';
            $this->load->view('agent/retirer_absences', $infoAbsences);
        }
    }

    //fonction pour enregistrer soit le retrait ou la motivation d'une absence pour un étudiant.
    function retirer_absences_etudiant() {

        if (!isset($_POST['choixFonction'])) {
            $data['titre'] = 'Retirer/Motiver une absence';
            $data['type'] = 'error_box';
            $data['informations'] = 'Veuillez choisir entre les options Retrait et Motivation.';
            $this->load->view('scolarite/confirmation_absences', $data);
        } else {
            if (!isset($_POST['items'])) {
                $data['titre'] = 'Retirer/Motiver une absence';
                $data['type'] = 'error_box';
                $data['informations'] = 'Veuillez sélectionner la ou les périodes que vous désirez retirer ou motiver.';
                $this->load->view('scolarite/confirmation_absences', $data);
            } else {
                //$tableauPeriode = array_keys($_POST['items'], 'on');
                $messageRetour = $this->scolarite_modele->motivee_retiree_absences($_POST);
                $data['titre'] = 'Retirer/Motiver une absence';
                $data['type'] = 'valid_box';

                $data['informations'] = $messageRetour;
                $this->load->view('scolarite/confirmation_absences', $data);
            }
        }
    }

    /*
     * fonction qui affiche tous les étudiants qui existent dans le système
     */

    function generer_rapport_absences_etudiant() {
        $tables = array("etudiant");
        $join_keys = null;
        $db_columns = array('matriculeEtudiant', 'nom', 'prenom', "case when actif = 1 then 'O' when actif = 0 then 'N' end as actif ");
        $result_columns = array('matriculeEtudiant', 'nom', 'prenom', "actif");
        $grid_columns = array('Matricule', 'Nom', 'Prénom', 'Actif ?');
        $action = 'choisir_annee_semestre_absences';
        $id_action = 'matriculeEtudiant';

        $result = $this->search_modele->getSearchResult($tables, $db_columns, $grid_columns, $join_keys, $action, $id_action, '', $result_columns);
        $titre = 'Générer le rapport d\'absences pour un étudiant';
        $controlleur = "agent";
        $data = array('titre' => $titre, 'controlleur' => $controlleur, 'result' => $result);
        $this->load->view("recherche_parametree", $data);
    }

    /*
     * fonction pour choisir l'année et le semestre afin de filtrer les groupes dans lesquels l'étudiant est inscrit
     */

    function choisir_annee_semestre_absences($matriculeEtudiant) {
        $data = NULL;
        $data['titre'] = 'Choisir Année et semestre';
        $data['matriculeEtudiant'] = $matriculeEtudiant;
        $data['annee'] = $this->scolarite_modele->recuperer_annee();
        $data['courante'] = $this->scolarite_modele->get_session_courante();
        $this->load->view('agent/choisir_annee_semestre_absences', $data);
    }

    function afficher_absences() {
        // liste groupe contient tous les groupes dans lesquels l'étudiant a été inscrit n'importe quelle année
        $infoEtudiant = $this->scolarite_modele->recuperer_nom_etudiant($_POST['matriculeEtudiant']);
        $liste_groupe = $this->scolarite_modele->get_liste_groupe($_POST['matriculeEtudiant']);
        if (count($liste_groupe) == NULL) {
            $data['titre'] = 'Générer le rapport des absences';
            $data['type'] = 'warning_box';
            $data['informations'] = 'L\'étudiant <b>' . $_POST['matriculeEtudiant'] . ' : ' .
                    $infoEtudiant['nom'] . ',  ' . $infoEtudiant['prenom'] . '</b> n\'est  
                        inscrit dans aucun groupe.';
            $this->load->view('agent/confirmation_absences', $data);
        } else {
            $liste_groupe_etudiant = $this->scolarite_modele->get_liste_groupe_absences($liste_groupe, $_POST['annee'], $_POST['session']);
            if (count($liste_groupe_etudiant) == NULL) {
                $data['titre'] = 'Générer le rapport des absences';
                $data['type'] = 'warning_box';
                $data['informations'] = 'L\'étudiant <b>' . $_POST['matriculeEtudiant'] . ' : ' .
                        $infoEtudiant['nom'] . ',  ' . $infoEtudiant['prenom'] . '</b> n\'est  
                        inscrit dans aucun groupe durant le semestre  <b>' .
                        $this->get_session_nom($_POST['session']) . '  ' . $_POST['annee'] . ' </b> ';
                $this->load->view('agent/confirmation_absences', $data);
            } else {
                $data['infoAbsences'] = $this->scolarite_modele->get_informations_absences($liste_groupe_etudiant, $_POST['matriculeEtudiant'], $_POST['annee'], $_POST['session']);
                if (count($data['infoAbsences']) == NULL) {
                    $data['titre'] = 'Générer le rapport des absences';
                    $data['type'] = 'valid_box';
                    $data['informations'] = 'Aucune absence au semestre <b>' . $this->get_session_nom($_POST['session']) . '  ' .
                            $_POST['annee'] . ' </b> pour l\'étudiant <b>' . $_POST['matriculeEtudiant'] . ' : ' .
                            $infoEtudiant['nom'] . ',  ' . $infoEtudiant['prenom'] . '</b>';
                    $this->load->view('agent/confirmation_absences', $data);
                } else {
                    $nomPrenom = $this->scolarite_modele->recuperer_nom_etudiant($data['infoAbsences']['matriculeEtudiant'][0]);
                    $data['titre'] = 'Absences non motivées pour l\'étudiant '
                            . $data['infoAbsences']['matriculeEtudiant'][0] . ' : ' .
                            $nomPrenom['nom'] . ',  ' . $nomPrenom['prenom'] . ' au semestre  ' .
                            $this->get_session_nom($data['infoAbsences']['semestre'][0]) . '  ' . $data['infoAbsences']['annee'][0];
                    $this->load->view('agent/afficher_absences_etudiant', $data);
                }
            }
        }
    }

    /*
     * fonction qui genere un rapport d'absence d'un etudiant
     */

    /*
     * fonction pour exporter un fichier excel qui contient tous les absences d'un etudiant
     */

    function generer_rapport() {
        // $infoAbsences = $_POST['infoAbsences'];
        $nomFichier = '';
        setlocale(LC_TIME, 'fr_FR.utf8', 'fra');

        $date = utf8_encode(strftime("%d-%b-%Y"));
        $objXLS = new PHPExcel();
        $objSheet = $objXLS->setActiveSheetIndex(0);
        /// formattage du Titre de la liste.
        $objSheet->getDefaultStyle()->getFont()->setName('Courier New');
        $objSheet->setCellValue('A1', 'INSTITUT UNIVERSITAIRE PROFESSIONNEL');
        $objSheet->getStyle('A1')->getFont()->setBold(TRUE);
        $nomPrenom = $this->scolarite_modele->recuperer_nom_etudiant($_POST['infoAbsences']['matriculeEtudiant'][0]);
        $titreFichierExcel = ' Absences non motivées pour l\'étudiant ' .
                $_POST['infoAbsences']['matriculeEtudiant'][0] . ' : ' .
                $nomPrenom['nom'] . '  ' . $nomPrenom['prenom'] . ' au semestre  ' .
                $this->get_session_nom($_POST['infoAbsences']['semestre'][0]) . '  ' .
                $_POST['infoAbsences']['annee'][0];
        $objSheet->setCellValue('A3', $titreFichierExcel);
        $objSheet->setCellValue('B4', 'Date :' . $date);


        $compteurVertical = 8;
        $objSheet->getStyle('B4')->getAlignment()->applyFromArray(
                array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                    'rotation' => 0,
                    'wrap' => true,
                    'font' => array('bold' => true)
                )
        );
        $groupe = array_unique($_POST['infoAbsences']['idGroupe']); // groupe qui contient des variables de tous les groupes mais distinct
        $compteurHorizontale = 2; // 2 represente le C
        //boucle pour ecrire le titre de tout les groupes qui existent
        for ($i = 0; $i < count($_POST['infoAbsences']['idGroupe']); $i++) {
            //on teste si l'index est supprimer lors de l'appel de la fonction array_unique
            if (isset($groupe[$i])) {
                $objSheet->setCellValueByColumnAndRow($compteurHorizontale, '7', $this->abreger_nom_groupe($groupe[$i]));
                $objXLS->getActiveSheet()->getColumnDimensionByColumn($compteurHorizontale)->setAutoSize(true);
                $compteurHorizontale++;
            }
            $_POST['infoAbsences']['indexHorizontale'] [$i] = $compteurHorizontale; //tableau pour stocker les index afin de rentrer les bon duree
        }
        //boucle pour afficher les dates et la duree de chaque absences
        for ($i = 0; $i < count($_POST['infoAbsences']['date']); $i++) {
            $objSheet->setCellValue('B' . $compteurVertical, $_POST['infoAbsences']['date'][$i] . '  ' . $_POST['infoAbsences']['periode'][$i]);
            for ($j = 0; $j < count($_POST['infoAbsences']['idGroupe']); $j++) {
                if (isset($groupe[$j])) {
                    if ($groupe[$j] == $_POST['infoAbsences']['idGroupe'][$i]) {
                        $objSheet->setCellValueByColumnAndRow($_POST['infoAbsences']['indexHorizontale'][$i] - 1, $compteurVertical, $_POST['infoAbsences']['duree'][$i]);
                    }
                }
            }
            $compteurVertical++;
        }
        $objSheet->setCellValue('B' . $compteurVertical, 'Total ');
        $compteurHorizontaleTotal = 2;

        //boucle pour calculer le total des heures que l'etudaint etait absent a un groupe
        for ($i = 0; $i < count($groupe); $i++) {
            $sum = 0;
            for ($j = 8; $j < $compteurVertical; $j++) {
                $sum += $objSheet->getCellByColumnAndRow($compteurHorizontaleTotal, $j)->getValue();
            }
            $objSheet->setCellValueByColumnAndRow($compteurHorizontaleTotal, $compteurVertical, $sum);
            $compteurHorizontaleTotal++; //le compteur doit rester en dernier 
        }

        //boucle pour calculer la somme des heures que l'etudiant etait absent pour chaque journne
        $objSheet->setCellValueByColumnAndRow($compteurHorizontale, 7, 'Total');
        for ($j = 8; $j < $compteurVertical; $j++) {
            $sum = 0;
            for ($i = 2; $i < $compteurHorizontale; $i++) {
                $sum += $objSheet->getCellByColumnAndRow($i, $j)->getValue();
            }
            $objSheet->setCellValueByColumnAndRow($compteurHorizontaleTotal, $j, $sum);
        }

        //boucle pour dessiner le tableau
        for ($k = 1; $k < $compteurHorizontale + 1; $k++) {
            for ($j = 7; $j < $compteurVertical + 1; $j++) {
                if (($k == $compteurHorizontale) || ($j == 7) || ($j == $compteurVertical)) {
                    $objSheet->getStyleByColumnAndRow($k, $j)->getFont()->setBold(TRUE);
                }

                $objSheet->getStyleByColumnAndRow($k, $j)->getBorders()->applyFromArray(
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

        $objXLS->getActiveSheet()->getColumnDimension("B")->setAutoSize(true);
        $nomFichier = 'Absences_' . $_POST['infoAbsences']['matriculeEtudiant'][0] . '_' . $this->get_session_nom($_POST['infoAbsences']['semestre'][0]) . '_' .
                $_POST['infoAbsences']['annee'][0];

        $objWriter = PHPExcel_IOFactory::createWriter($objXLS, 'Excel5');

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $nomFichier . '.xls"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($objXLS, 'Excel5');

        $objWriter->save('php://output');
    }

    /*
     * fonction pour changer le groupe plus court enlever groupe et mettre juste les deux lettres
     * significatif pour le type du groupe
     */

    function abreger_nom_groupe($nomGroupe) {
        $nomAbrege = '';
        if (strpos($nomGroupe, "01-Groupe") > 0)
            $nomAbrege = str_replace('01-Groupe', '-P', $nomGroupe); // P = Printemps
        else
        if (strpos($nomGroupe, "02-Groupe") > 0)
            $nomAbrege = str_replace('02-Groupe', '-E', $nomGroupe); // E = Été
        else
            $nomAbrege = str_replace('03-Groupe', '-A', $nomGroupe); // A = Automne
        $nomAbrege = str_replace('Theorie', 'Thr', $nomAbrege);
        $nomAbrege = str_replace('Projet', 'Prj', $nomAbrege);
        $nomAbrege = str_replace('Stage', 'Stg', $nomAbrege);
        return $nomAbrege;
    }

    function generer_rapport_absences_motivees() {
        $data['titre'] = 'Générer le rapport des absences motivées pour un semestre donné .';
        $data['annee'] = $this->scolarite_modele->recuperer_annee();
        $data['courante'] = $this->scolarite_modele->get_session_courante();
        $this->load->view("agent/choisir_semestre_absence_motive", $data);
    }

    function afficher_absences_motivee() {

        $infoAbsences = $this->scolarite_modele->get_liste_absences_motivee_etudiants($_POST['annee'], $_POST['session']);
        $annee = $_POST['annee'];
        $semestre = $_POST['session'];
        if (count($infoAbsences) == NULL) {
            $data['titre'] = 'Générer le rapport des absences motivées.';
            $data['type'] = 'valid_box';
            $data['informations'] = 'Aucune absence motivée au semestre <b>' . $this->get_session_nom_paire_impaire($semestre) . '  ' . $annee;
            $this->load->view('agent/confirmation_absences', $data);
        } else {
            $absence = true;
            $this->ecrire_rapport_absences_global($infoAbsences, $absence);
        }
    }

    function generer_rapport_global_etudiant() {
        $data['titre'] = 'Générer le rapport global des absences non motivées pour le semestre';
        $data['annee'] = $this->scolarite_modele->recuperer_annee();
        $data['courante'] = $this->scolarite_modele->get_session_courante();
        $this->load->view("agent/choisir_semestre_global", $data);
    }

    function afficher_etudiant_rapport_global() {
        $session = $this->scolarite_modele->get_session_courante();
        $infoAbsences = $this->scolarite_modele->get_liste_global_etudiants_absents($_POST['annee'], $_POST['session']);
        $annee = $session['annee'][0];
        $semestre = $_POST['session'];
        if (count($infoAbsences) == NULL) {
            $data['titre'] = 'Générer le rapport des absences';
            $data['type'] = 'valid_box';
            $data['informations'] = 'Aucune absence au semestre <b>' . $this->get_session_nom($semestre) . '  ' . $annee;
            $this->load->view('scolarite/confirmation_absences', $data);
        } else {
            $absence = false;
            $this->ecrire_rapport_absences_global($infoAbsences, $absence);
        }
    }

    function ecrire_rapport_absences_global($infoAbsences, $absence) {
        //on recupere automatiquement le nom de l'institut
        $param=$this->scolarite_modele->Recup_Parametre_Generaux();
       // print_r($param);
        
        $nomFichier = '';
        setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
        $date = utf8_encode(strftime("%d %B %Y"));
        ;
        $objXLS = new PHPExcel();
        $objSheet = $objXLS->setActiveSheetIndex(0);
        /// formattage du Titre de la liste.
        $objSheet->getDefaultStyle()->getFont()->setName('Courier New');
        $objSheet->setCellValue('A1', $param[0]['nom']);
        $objSheet->getStyle('A1')->getFont()->setBold(TRUE);
        if (!$absence) {
            $objSheet->setCellValue('A3', ' Absences non motivées au semestre  ' . $this->get_session_nom_paire_impaire($infoAbsences['semestre'][0]) . '  ' . $infoAbsences['annee'][0]);
        } else {
            $objSheet->setCellValue('A3', ' Absences motivées au semestre  ' . $this->get_session_nom_paire_impaire($infoAbsences['semestre'][0]) . '  ' . $infoAbsences['annee'][0]);
        }
        $objSheet->setCellValue('B4', 'Date : ' . $date);
        $compteurVertical = 8;
        $objSheet->getStyle('B4')->getAlignment()->applyFromArray(
                array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                    'rotation' => 0,
                    'wrap' => true,
                    'font' => array('bold' => true)
                )
        );

        $matricule = array_unique($infoAbsences['matriculeEtudiant']); // groupe qui contient des variables de tous les groupes mais distinct
        sort($matricule);
        $compteurHorizontale = 2; // 2 represente le C
        //boucle pour ecrire le titre de tout les groupes qui existent
        for ($i = 0; $i < count($matricule); $i++) {

            $objSheet->setCellValueByColumnAndRow($compteurHorizontale, '7', $matricule[$i]);
            $objXLS->getActiveSheet()->getColumnDimensionByColumn($compteurHorizontale)->setAutoSize(true);
            $compteurHorizontale++;
        }

        //boucle pour afficher les dates et la duree de chaque absences
        for ($i = 0; $i < count($infoAbsences['date']); $i++) {
            $objSheet->setCellValue('B' . $compteurVertical, $infoAbsences['date'][$i] . '  ' . $infoAbsences['periode'][$i]);
            for ($j = 0; $j < count($matricule); $j++) {
                if ($matricule[$j] == $infoAbsences['matriculeEtudiant'][$i]) {
                    $objSheet->setCellValueByColumnAndRow($j + 2, $compteurVertical, $infoAbsences['duree'][$i]);
                }
            }
            $compteurVertical++;
        }

        $objSheet->setCellValue('B' . $compteurVertical, 'Total ');
        $compteurHorizontaleTotal = 2;

        //boucle pour calculer le total des heures que l'etudaint etait absent a un groupe
        for ($i = 0; $i < count($matricule); $i++) {
            $sum = 0;
            for ($j = 8; $j < $compteurVertical; $j++) {
                $sum += $objSheet->getCellByColumnAndRow($compteurHorizontaleTotal, $j)->getValue();
            }
            $objSheet->setCellValueByColumnAndRow($compteurHorizontaleTotal, $compteurVertical, $sum);
            $compteurHorizontaleTotal++; //le compteur doit rester en dernier 
        }

        //boucle pour calculer la somme des heures que l'etudiant etait absent pour chaque journne
        $objSheet->setCellValueByColumnAndRow($compteurHorizontale, 7, 'Total');
        for ($j = 8; $j < $compteurVertical; $j++) {
            $sum = 0;
            for ($i = 2; $i < $compteurHorizontale; $i++) {
                $sum += $objSheet->getCellByColumnAndRow($i, $j)->getValue();
            }
            $objSheet->setCellValueByColumnAndRow($compteurHorizontaleTotal, $j, $sum);
        }

        //boucle pour dessiner le tableau
        for ($k = 7; $k < $compteurHorizontale; $k++) {
            for ($j = 7; $j < $compteurVertical; $j++) {
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

        //boucle pour dessiner le tableau
        for ($k = 1; $k < $compteurHorizontale + 1; $k++) {
            for ($j = 7; $j < $compteurVertical + 1; $j++) {
                if (($k == $compteurHorizontale) || ($j == 7) || ($j == $compteurVertical)) {
                    $objSheet->getStyleByColumnAndRow($k, $j)->getFont()->setBold(TRUE);
                }

                $objSheet->getStyleByColumnAndRow($k, $j)->getBorders()->applyFromArray(
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
        $objXLS->getActiveSheet()->getColumnDimension("B")->setAutoSize(true);

        if (!$absence) {
            $nomFichier = 'Absences_global_' . $this->get_session_nom($infoAbsences['semestre'][0]) . '_' . $infoAbsences['annee'][0];
        } else {
            $nomFichier = 'Absences_motivees_' . $this->get_session_nom($infoAbsences['semestre'][0]) . '_' . $infoAbsences['annee'][0];
        }
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $nomFichier . '.xls"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($objXLS, 'Excel5');

        $objWriter->save('php://output');
    }

    /*
     * fonction pour afficher une vue pour que l utilisateur peut choisir l annee et le semestre 
     * pour nous aider a filtrer les groupes
     */

    function generer_rapport_absences_groupe() {
        $data['titre'] = 'Générer le rapport des absences par groupe.';
        $data['annee'] = $this->scolarite_modele->recuperer_annee();
        $data['courante'] = $this->scolarite_modele->get_session_courante();
        $this->load->view("agent/choisir_annee_session_rapport_abs", $data);
    }

    /*
     * fonction qui affiche tous les groupes qui se donnent a un semestre precis
     */

    function generer_liste_professeur_responsable() {
        $session_courante = $this->scolarite_modele->get_session_courante();
        $anneeActuel = $session_courante['annee'][0] . $session_courante['semestre'][0];
        $tables = array("module", "employe");
        $join_keys = array('matriculeEmploye = professeurResponsable');
        $db_columns = array('matriculeEmploye', 'prenom', 'nom', " case when actif = 1 
            then 'O' when actif = 0 then 'N' end as actif ", 'sigle', 'titre');
        $result_columns = array('matriculeEmploye', 'prenom', 'nom', 'actif', 'sigle', 'titre');
        $grid_columns = array('Matricule', 'Prénom', 'Nom', 'Enseignant Actif ?', 'Sigle', 'Titre');
        $action = '#';
        $id_action = '';
        $db_where = "where semestreActivation <= $anneeActuel and semestreDesactivation is Null or semestreDesactivation >= $anneeActuel";
        $result = $this->search_modele->getSearchResult($tables, $db_columns, $grid_columns, $join_keys, $action, $id_action, $db_where, $result_columns);
        $titre = 'Enseignants responsables des modules actifs ';
        $controlleur = "agent";
        $data = array('titre' => $titre, 'controlleur' => $controlleur, 'result' => $result);
        $this->load->view("recherche_parametree", $data);
    }

    function afficher_groupe_rapport() {
        $annee = $_POST['annee'];
        $semestre = $_POST['session'];
        $tables = array("groupe");
        $join_keys = null;
        $db_columns = array('idGroupe', 'numGroupe', 'typeGroupe', 'annee', "case when semestre = 1 then 'Printemps' when semestre = 2 then '&#201;t&#233;'
                when semestre = 3 then 'Automne' end as semestre");
        $db_result_columns = array('idGroupe', 'numGroupe', 'typeGroupe', 'annee', 'semestre');
        $grid_columns = array('Groupe', 'Numéro du groupe', 'Type', "Année", 'Semestre');
        $action = 'afficher_rapport_groupe_absences/' . $this->encode($annee) . '/' . $this->encode($semestre);

        $id_action = 'idGroupe';

        $db_where = "where annee = $annee and semestre = $semestre";
        $result = $this->search_modele->getSearchResult($tables, $db_columns, $grid_columns, $join_keys, $action, $id_action, $db_where, $db_result_columns);
        $titre = 'Les groupes offerts au semestre  <b>' . $this->get_session_nom($_POST['session']) . '  ' . $_POST['annee'] . '</b>';
        $controlleur = "agent";
        $data = array('titre' => $titre, 'controlleur' => $controlleur, 'result' => $result);
        $this->load->view("recherche_parametree", $data);
    }

    function afficher_rapport_groupe_absences($annee, $semestre, $idGroupe) {
        $annee = $this->decode($annee);
        $semestre = $this->decode($semestre);
        $infoAbsences = $this->scolarite_modele->get_liste_etudiants_absents($idGroupe, $annee, $semestre);
        if (count($infoAbsences) == NULL) {
            $data['titre'] = 'Générer le rapport des absences';
            $data['type'] = 'valid_box';
            $data['informations'] = 'Aucune absence au semestre <b>' . $this->get_session_nom($semestre) . '  ' .
                    $annee . ' </b> pour le groupe <b>' . $idGroupe . '</b>';
            $this->load->view('agent/confirmation_absences', $data);
        } else {
            $data['infoAbsences'] = $infoAbsences;
            /* RM modif 26 février 2013
              $data['titre'] = 'Absences non motivées au groupe <b>' . $this->abreger_nom_groupe($idGroupe)
              . ' </b> <br>au semestre <b>' . $this->get_session_nom($semestre) . ' ' . $annee . ' </b>'; */
            $data['titre'] = 'Absences non motivées au groupe <b>' . $this->scolarite_modele->corrigerNumGroupe($idGroupe)
                    . ' </b> <br>au semestre <b>' . $this->get_session_nom($semestre) . ' ' . $annee . ' </b>';
            $this->load->view("agent/afficher_rapport_groupe_absences", $data);
        }
    }

    /*
     * fonction pour ecrire le rapport en excel pour 
     * les liste d'absences par groupe.
     */

    function ecrire_rapport_absences_groupe() {

        $nomFichier = '';
        setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
        $date = utf8_encode(strftime("%d %B %Y"));
        $objXLS = new PHPExcel();
        $objSheet = $objXLS->setActiveSheetIndex(0);
        /// formatage du Titre de la liste.
        $objSheet->getDefaultStyle()->getFont()->setName('Courier New');
        $objSheet->setCellValue('A1', 'INSTITUT UNIVERSITAIRE PROFESSIONNEL');
        $objSheet->getStyle('A1')->getFont()->setBold(TRUE);
        /* Modif RM 26 février 2013
          $objSheet->setCellValue('A3', ' Absences non motivées au groupe ' . $this->abreger_nom_groupe($_POST['infoAbsences']['idGroupe'][0]) . ' au semestre  ' .
          $this->get_session_nom($_POST['infoAbsences']['semestre'][0]) . '  ' . $_POST['infoAbsences']['annee'][0]); */
        $objSheet->setCellValue('A3', ' Absences non motivées au groupe ' . $this->scolarite_modele->corrigerNumGroupe($_POST['infoAbsences']['idGroupe'][0]) . ' au semestre  ' .
                $this->get_session_nom($_POST['infoAbsences']['semestre'][0]) . '  ' . $_POST['infoAbsences']['annee'][0]);
        $objSheet->setCellValue('B4', 'Date :' . $date);
        $compteurVertical = 8;
        $objSheet->getStyle('B4')->getAlignment()->applyFromArray(
                array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                    'rotation' => 0,
                    'wrap' => true,
                    'font' => array('bold' => true)
                )
        );

        $matricule = array_unique($_POST['infoAbsences']['matriculeEtudiant']); // groupe qui contient des variable de tout les groupes mais distinct
        sort($matricule);
        $compteurHorizontale = 2; // 2 represente le C
        //boucle pour ecrire le titre de tous les groupes qui existent
        for ($i = 0; $i < count($matricule); $i++) {
            $objSheet->setCellValueByColumnAndRow($compteurHorizontale, '7', $matricule[$i]);
            $objXLS->getActiveSheet()->getColumnDimensionByColumn($compteurHorizontale)->setAutoSize(true);
            $compteurHorizontale++;
        }

        //boucle pour afficher les dates et la duree de chaque absence
        for ($i = 0; $i < count($_POST['infoAbsences']['date']); $i++) {
            $objSheet->setCellValue('B' . $compteurVertical, $_POST['infoAbsences']['date'][$i] . '  ' . $_POST['infoAbsences']['periode'][$i]);
            for ($j = 0; $j < count($matricule); $j++) {
                if ($_POST['infoAbsences']['matriculeEtudiant'][$i] == $matricule[$j]) {
                    $objSheet->setCellValueByColumnAndRow($j + 2, $compteurVertical, $_POST['infoAbsences']['duree'][$i]);
                }
            }
            $compteurVertical++;
        }


        $objSheet->setCellValue('B' . $compteurVertical, 'Total ');
        $compteurHorizontaleTotal = 2;

        //boucle pour calculer le total des heures où l'etudiant etait absent a un groupe
        for ($i = 0; $i < count($matricule); $i++) {
            $sum = 0;
            for ($j = 8; $j < $compteurVertical; $j++) {
                $sum += $objSheet->getCellByColumnAndRow($compteurHorizontaleTotal, $j)->getValue();
            }
            $objSheet->setCellValueByColumnAndRow($compteurHorizontaleTotal, $compteurVertical, $sum);
            $compteurHorizontaleTotal++; //le compteur doit rester en dernier 
        }

        //boucle pour calculer la somme des heures où l'etudiant etait absent pour chaque jour
        $objSheet->setCellValueByColumnAndRow($compteurHorizontale, 7, 'Total');
        for ($j = 8; $j < $compteurVertical; $j++) {
            $sum = 0;
            for ($i = 2; $i < $compteurHorizontale; $i++) {
                $sum += $objSheet->getCellByColumnAndRow($i, $j)->getValue();
            }
            $objSheet->setCellValueByColumnAndRow($compteurHorizontaleTotal, $j, $sum);
        }
        //boucle pour dessiner les lignes du tableau
        for ($k = 7; $k < $compteurHorizontale; $k++) {
            for ($j = 7; $j < $compteurVertical; $j++) {
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

        //boucle pour dessiner les lignes du  tableau
        for ($k = 1; $k < $compteurHorizontale + 1; $k++) {
            for ($j = 7; $j < $compteurVertical + 1; $j++) {
                if (($k == $compteurHorizontale) || ($j == 7) || ($j == $compteurVertical)) {
                    $objSheet->getStyleByColumnAndRow($k, $j)->getFont()->setBold(TRUE);
                }

                $objSheet->getStyleByColumnAndRow($k, $j)->getBorders()->applyFromArray(
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
        $objXLS->getActiveSheet()->getColumnDimension("B")->setAutoSize(true);
        $objWriter = PHPExcel_IOFactory::createWriter($objXLS, 'Excel5');
        // corriection RM 26 février 2013 $nomFichier = 'Absences_' . $this->abreger_nom_groupe($_POST['infoAbsences']['idGroupe'][0]);
        $nomFichier = 'Absences_' . $this->scolarite_modele->corrigerNumGroupe($_POST['infoAbsences']['idGroupe'][0]);
        $objWriter = PHPExcel_IOFactory::createWriter($objXLS, 'Excel5');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $nomFichier . '.xls"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($objXLS, 'Excel5');

        $objWriter->save('php://output');
    }

    public function saisir_horaire($matriculeEmploye) {

        $sessionCourante = $this->scolarite_modele->get_session_courante_calendar();
        $anneeC = $sessionCourante['annee'][0];
        $semestreC = $sessionCourante['semestre'][0];

        $modules = $this->scolarite_modele->getModulesEnseignes($matriculeEmploye, $anneeC, $semestreC);
        $locaux = $this->scolarite_modele->getLocaux();
        $allModules = $this->scolarite_modele->getAllModules($anneeC, $semestreC);

        $nomEmploye = $this->scolarite_modele->getNomEmploye($matriculeEmploye);

        $data = array('semestreC' => $semestreC, 'anneeC' => $anneeC, 'modules' => $modules, 'nomEmploye' => $nomEmploye, 'matriculeEmploye' => $matriculeEmploye, 'locaux' => $locaux, 'allModules' => $allModules);
        $this->load->view('agent/saisir_horaire', $data);
    }

    public function saisir_horaire_enseignement() {

        $sessionCourante = $this->scolarite_modele->get_session_courante_calendar();
        $anneeC = $sessionCourante['annee'][0];
        $semestreC = $sessionCourante['semestre'][0];
        $departements = $this->scolarite_modele->recuperer_departement();




        //   $modules=$this->scolarite_modele->getModulesEnseignes($matriculeEmploye, $anneeC, $semestreC);
        $locaux = $this->scolarite_modele->getLocaux();
        $allModules = $this->scolarite_modele->getAllModules($anneeC, $semestreC);

        //  $nomEmploye=$this->scolarite_modele->getNomEmploye($matriculeEmploye);
        // , 'allModules'=>$allModules ,'semestreC'=>$semestreC,'anneeC'=>$anneeC,'modules'=>$modules, 'nomEmploye'=>$nomEmploye,'matriculeEmploye'=>$matriculeEmploye,

        $data = array('departements' => $departements, 'locaux' => $locaux, 'allModules' => $allModules, 'semestreC' => $semestreC, 'anneeC' => $anneeC,);
        $this->load->view('agent/saisir_horaire_enseignement', $data);
    }

    public function saisir_horaire_module() {
        $format = 'DATE_ATOM';
        $time = time();

        $date = $this->convert_date_ATOM(standard_date($format, $time));
        //on teste si aucun etudiant n est selectionne
        //on teste si la duree n'est pas selectionne
        //on teste si la date choisie est dans le future
        //print_r($_POST);
      if($date>=date('Y-m-d', strtotime($_POST['date']))) //pour eviter d'ajouter une date dans le future--MedBakar 24-03-2020
        {
//          print_r($_POST);
          $this->db->query("UPDATE groupe set matriculeEmploye='".$_POST['matriculeEmploye']."' where idGroupe='".$_POST['groupe']."'");//add by MedBakar 28-07-2020
        $this->scolarite_modele->enregistrer_absences_horaire($_POST);
        $data['titre'] = 'Entrer Absences';
        $data['type'] = 'valid_box';
        if(!isset($_POST['matricule']))
             $informations = 'Aucune absence dans le groupe <b>'. $this->scolarite_modele->corrigerNumGroupe($_POST['groupe']) . '</b> a été enregistrée.';
        else
        $informations = 'Les absences au groupe <b>' . $this->scolarite_modele->corrigerNumGroupe($_POST['groupe']) . '</b> ont bien été enregistrées.';
        /* $data['informations'] = 'Les absences au groupe <b>' . $_POST['idGroupe'] . '</b> ont bien été enregistrées.'; */

        
        $sessionCourante = $this->scolarite_modele->get_session_courante_calendar();
        $anneeC = $sessionCourante['annee'][0];
        $semestreC = $sessionCourante['semestre'][0];

        //$anneeC=$_POST['anneeC'];
        // $semestreC=$_POST['semestreC'];
        $matriculeEmploye = $_POST['matriculeEmploye'];
        $nomEmploye = "";
        $date = date('d-m-y', strtotime($_POST['date']));
        //echo $date;
        $heureD = htmlspecialchars($_POST['heureD']);
        $duree = htmlspecialchars($_POST['duree']);
        $sigle=' ';
        if(isset($_POST['sigle']))
        $sigle =htmlspecialchars( $_POST['sigle']);
        $groupe = htmlspecialchars($_POST['groupe']);
        $commentaire = htmlspecialchars($_POST['commentaire']);
        $type = htmlspecialchars($_POST['type']);
        $idLocal = htmlspecialchars($_POST['idLocal']);
        $autreElement = '';
        if (isset($_POST['autreElement']))
            $autreElement = htmlspecialchars($_POST['autreElement']);
        if ($sigle == ' ')
            $sigle = $autreElement;
        
        // 19-03-2019 Alioune
        //on verifit si le champs element est bien  rensiege
        if($sigle==" " or $sigle=="-1") $message="champ Elément n'a pas été renseigné <br>";
        else{
            if(empty($_POST['absenceEtud'])) //add by MedBakar 24-03-2020
            $this->scolarite_modele->enregistrer_horaire($anneeC, $semestreC, "'" . $matriculeEmploye . "'", $date, $heureD, $duree, "'" . $sigle . "'", "'" . $groupe . "'", "'" . $type . "'", "'" . $idLocal . "'", "'" . $commentaire . "'");
         /*   $_nbr_heures_rest=$this->scolarite_modele->nombre_heures_enseignees_module($sigle,$type);
            //on verifit si le resultat n'est pas null | si il est null ca signifit que les infos de la bdd ne sont pas sifisantantes
            if($_nbr_heures_rest=="NULL") echo "champs volume$type de la table module est null ou vide";
            // on verifit si le rest est >0 
            elseif($_nbr_heures_rest[0]['rest']>0){
                //on execute l'insertion
                $this->scolarite_modele->enregistrer_horaire($anneeC, $semestreC, "'" . $matriculeEmploye . "'", $date, $heureD, $duree, "'" . $sigle . "'", "'" . $groupe . "'", "'" . $type . "'", "'" . $idLocal . "'", "'" . $commentaire . "'");
                //$message.="On peut inserer: _nbr_heures_rest= ".$_nbr_heures_rest[0]['rest'];
            }else{
                $message.="Opération impossible, car le volume de cet élément est déjà atteint";
            } */
        }
            
        
        
            

        $data = array('informations' => $informations, 'nomEmploye' => $nomEmploye, 'matriculeEmploye' => $matriculeEmploye, 'heureD' => $heureD, 'duree' => $duree);
        //ajout d'un attribut message [pour afficher un message d'erreur]
        if(isset($message))
            $data['message']=$message;
       }else
            $data['message']='On ne peut pas enregistrer l\'horaire pour une future date';//-add by MedBakar 24-03-2020
//        print_r($data);
       $this->load->view('agent/confirmation_saisir_horaire', $data);
    }

    function generer_heures_enseignement() {

        $listeH = $this->scolarite_modele->getListeHeuresEnseignement();


        setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
        $date = utf8_encode(strftime("%d-%B-%Y"));
        $objXLS = new PHPExcel();
        $objSheet = $objXLS->setActiveSheetIndex(0);

        $semestre = 3;
        $annee = 2015;

        //formatage du Titre de la liste.
        // $objSheet->getDefaultStyle()->getFont()->setName('Courier New');
        // $objSheet->setCellValue('A1', 'INSTITUT UNIVERSITAIRE PROFESSIONNEL');
        //  $objSheet->getStyle('A1')->getFont()->setBold(TRUE);
        // $titreFichierExcel = 'Heures d\'enseignement du semestre courant';
        // $objSheet->setCellValue('B1',$titreFichierExcel );
        //  $objSheet->setCellValue('A6', 'Semestre : ' .$semestre .' '.$annee);
        //  $objSheet->setCellValue('A4', 'Date : ' . $date);
        $objSheet->getDefaultStyle()->getFont()->setName('Arial');
        $objSheet->setCellValue('A1', 'Etat d\'avencement des cours dispensés');
        $objSheet->getStyle('A1')->getFont()->setBold(TRUE);

        $objSheet->setCellValueByColumnAndRow(0, 2, 'Matricule');
        $objSheet->setCellValueByColumnAndRow(1, 2, 'Nom et Prénom ');

        $objSheet->setCellValueByColumnAndRow(2, 2, 'Coordonnées bancaires ');
        $objSheet->setCellValueByColumnAndRow(3, 2, 'Date');
        $objSheet->setCellValueByColumnAndRow(4, 2, 'HeureDébut');
        $objSheet->setCellValueByColumnAndRow(5, 2, 'Durée');
        $objSheet->setCellValueByColumnAndRow(6, 2, 'Elément');
        $objSheet->setCellValueByColumnAndRow(7, 2, 'Semestre et Filière');
        $objSheet->setCellValueByColumnAndRow(8, 2, 'Salle');
        $objSheet->setCellValueByColumnAndRow(9, 2, 'Type');
        $objSheet->setCellValueByColumnAndRow(10, 2, 'Observation');

        $k = 3;

        for ($i = 0; $i < count($listeH); $i++) {
            $type = "";
            if ($listeH[$i]['type'] == "cours") {
                $type = "CM";
            } elseif ($listeH[$i]['type'] == "td") {
                $type = "TD";
            } elseif ($listeH[$i]['type'] == "tp") {
                $type = "TP";
            }
            $objSheet->setCellValueByColumnAndRow(0, $k, $listeH[$i]['matriculeEmploye']);
            $objSheet->setCellValueByColumnAndRow(1, $k, $listeH[$i]['nom']);
            $objSheet->setCellValueByColumnAndRow(2, $k, $listeH[$i]['compteBancaire']);
            $objSheet->setCellValueByColumnAndRow(3, $k, $listeH[$i]['date']);
            $objSheet->setCellValueByColumnAndRow(4, $k, $listeH[$i]['heureD']);
            $objSheet->setCellValueByColumnAndRow(5, $k, $listeH[$i]['duree']);
            $objSheet->setCellValueByColumnAndRow(6, $k, $listeH[$i]['sigle']);
            $objSheet->setCellValueByColumnAndRow(7, $k, $listeH[$i]['sf']);
            $objSheet->setCellValueByColumnAndRow(8, $k, $listeH[$i]['idLocal']);
            $objSheet->setCellValueByColumnAndRow(9, $k, $type);

            $objSheet->setCellValueByColumnAndRow(10, $k, $listeH[$i]['commentaire']);
            $k++;
        }



        $nomFichier = 'ListeHeures';
        $objWriter = PHPExcel_IOFactory::createwriter($objXLS, 'Excel5');
        header('Content-Type', 'application/msexcel;charset=utf-8');
        header('Content-Disposition: attachment;filename="' . $nomFichier . '.xls"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($objXLS, 'Excel5');
        ob_end_clean();

        $objWriter->save('php://output');
    }

    public function get_events() {
        // Our Stand and End Dates
        $start = $this->common->nohtml($this->input->get("start"));
        $end = $this->common->nohtml($this->input->get("end"));

        $startdt = new DateTime('now'); // setup a local datetime
        $startdt->setTimestamp($start); // Set the date based on timestamp
        $format = $startdt->format('Y-m-d H:i:s');

        $enddt = new DateTime('now'); // setup a local datetime
        $enddt->setTimestamp($end); // Set the date based on timestamp
        $format2 = $enddt->format('Y-m-d H:i:s');

        $events = $this->scolarite_modele->get_events($format, $format2);

        $data_events = array();

        foreach ($events->result() as $r) {

            $data_events[] = array(
                "id" => $r->ID,
                "title" => $r->title,
                "description" => $r->description,
                "end" => $r->end,
                "start" => $r->start
            );
        }

        echo json_encode(array("events" => $data_events));
        exit();
    }

    public function add_event() {
        /* Our calendar data */
        $name = $this->input->post("name");
        $desc = $this->input->post("description");
        $start_date = $this->input->post("start_date");
        $end_date = $this->input->post("end_date");

        if (!empty($start_date)) {
            $sd = DateTime::createFromFormat("Y/m/d H:i", $start_date);
            $start_date = $sd->format('Y-m-d H:i:s');
            $start_date_timestamp = $sd->getTimestamp();
        } else {
            $start_date = date("Y-m-d H:i:s", time());
            $start_date_timestamp = time();
        }

        if (!empty($end_date)) {
            $ed = DateTime::createFromFormat("Y/m/d H:i", $end_date);
            $end_date = $ed->format('Y-m-d H:i:s');
            $end_date_timestamp = $ed->getTimestamp();
        } else {
            $end_date = date("Y-m-d H:i:s", time());
            $end_date_timestamp = time();
        }

        $this->scolarite_modele->add_event(array(
            "title" => $name,
            "description" => $desc,
            "start" => $start_date,
            "end" => $end_date
                )
        );

        redirect(site_url("calendar"));
    }

    public function edit_event() {
        $eventid = intval($this->input->post("eventid"));
        $event = $this->scolarite_modele->get_event($eventid);
        if ($event->num_rows() == 0) {
            echo"Invalid Event";
            exit();
        }

        $event->row();

        /* Our calendar data */
        $name = $this->common->nohtml($this->input->post("name"));
        $desc = $this->common->nohtml($this->input->post("description"));
        $start_date = $this->common->nohtml($this->input->post("start_date"));
        $end_date = $this->common->nohtml($this->input->post("end_date"));
        $delete = intval($this->input->post("delete"));

        if (!$delete) {

            if (!empty($start_date)) {
                $sd = DateTime::createFromFormat("Y/m/d H:i", $start_date);
                $start_date = $sd->format('Y-m-d H:i:s');
                $start_date_timestamp = $sd->getTimestamp();
            } else {
                $start_date = date("Y-m-d H:i:s", time());
                $start_date_timestamp = time();
            }

            if (!empty($end_date)) {
                $ed = DateTime::createFromFormat("Y/m/d H:i", $end_date);
                $end_date = $ed->format('Y-m-d H:i:s');
                $end_date_timestamp = $ed->getTimestamp();
            } else {
                $end_date = date("Y-m-d H:i:s", time());
                $end_date_timestamp = time();
            }

            $this->scolarite_modele->update_event($eventid, array(
                "title" => $name,
                "description" => $desc,
                "start" => $start_date,
                "end" => $end_date,
                    )
            );
        } else {
            $this->scolarite_modele->delete_event($eventid);
        }

        redirect(site_url("calendar"));
    }

    public function emplois_du_temps() {
        // $events=null;
        $connection = mysqli_connect('127.0.0.1', 'root', '', 'iup') or die(mysqli_error($connection));
        // set your user id settings


        $datetime_string = date('c', time());
        $result = "hhhh";
        if (isset($_POST['action']) or isset($_GET['view'])) {
            if (isset($_GET['view'])) {
                header('Content-Type: application/json');


                //$start = mysqli_real_escape_string($connection,$_GET["start"]);
                //$end = mysqli_real_escape_string($connection,$_GET["end"]);
                $start = $_GET["start"];
                $end = $_GET["end"];
                $result = $this->scolarite_modele->get_events1($start, $end, $s = $_GET['semestre'], $p = $_GET['idProgramme'], $chek1 = $_GET["chek1"], $local = $_GET["local"], $employe1 = $_GET["employe1"]);
                $events = $result['events'];

                echo json_encode($events);
                //echo json_encode($result['end']); 
                exit;
            } elseif ($_POST['action'] == "add") {    //header('Content-Type: application/x-json; charset=utf-8');
                //  echo(json_encode($this->scolarite->get_groupe($_POST['annee'], $_POST['semestre'], $_POST['sigle'])));
                $p = $_POST["chekb"];

                if ($p == "1") {
                    $date_f = date('Y-m-d', strtotime($_POST["dfin"]));
                    // echo date('Y-m-d',$date_f);
                    // $date_d=strtotime('+7 days', strtotime($_POST["start"]) );


                    $date1 = date('Y-m-d H:i:s', strtotime($_POST["start"]));
                    $date2 = date('Y-m-d H:i:s', strtotime($_POST["end"]));
                    $this->scolarite_modele->add_r_events(array(
                        "start" => $date1,
                        "end" => $date_f
                            )
                    );
                    $id_repeat = $this->scolarite_modele->max_id_r_events();
                    $i = 0;
                    while ($date1 < $date_f) {
                        //    $date_d = strtotime('+7 days', strtotime($_GET["start"]) );
                        // $date_f1 = strtotime('+7 days', strtotime($_GET["end"]) );
                        $i++;
                        if ($i == 1) {
                            $date1 = date('Y-m-d H:i:s', strtotime('+0 days', strtotime($date1)));
                            $date2 = date('Y-m-d H:i:s', strtotime('+0 days', strtotime($date2)));
                        } else {
                            $date1 = date('Y-m-d H:i:s', strtotime('+7 days', strtotime($date1)));
                            $date2 = date('Y-m-d H:i:s', strtotime('+7 days', strtotime($date2)));
                        }
                        //  $diff=date_diff($date1,$date2);

                        mysqli_query($connection, "INSERT INTO `events` (
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
                    '" . mysqli_real_escape_string($connection, $_POST["title"]) . "',
                    '" . mysqli_real_escape_string($connection, $date1) . "',
                    '" . mysqli_real_escape_string($connection, $date2) . "', '" . $_POST["idProgramme"] . "', '" . $_POST["semestre"] . "', '" . $_POST["local"] . "', '" . $_POST["idGroupe"] . "', '" . $_POST["employe"] . "', '" . $id_repeat . "', '" . $_POST["typec"] . "'
                    )");
                    }

                    header('Content-Type: application/json');
                    echo '{"id":"' . mysqli_insert_id($connection) . '"}';
                } else {

                    //  $diff=date_diff($date1,$date2);

                    mysqli_query($connection, "INSERT INTO `events` (
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
                    '" . mysqli_real_escape_string($connection, $_POST["title"]) . "',
                    '" . mysqli_real_escape_string($connection, date('Y-m-d H:i:s', strtotime($_POST["start"]))) . "',
                    '" . mysqli_real_escape_string($connection, date('Y-m-d H:i:s', strtotime($_POST["end"]))) . "', '" . $_POST["idProgramme"] . "', '" . $_POST["semestre"] . "', '" . $_POST["local"] . "', '" . $_POST["idGroupe"] . "', '" . $_POST["typec"] . "'
                    )");
                    $sql = "INSERT INTO `events` (
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
                    '" . mysqli_real_escape_string($connection, $_POST["title"]) . "',
                    '" . mysqli_real_escape_string($connection, date('Y-m-d H:i:s', strtotime($_POST["start"]))) . "',
                    '" . mysqli_real_escape_string($connection, date('Y-m-d H:i:s', strtotime($_POST["end"]))) . "', '" . $_POST["idProgramme"] . "', '" . $_POST["semestre"] . "', '" . $_POST["local"] . "', '" . $_POST["idGroupe"] . "', '" . $_POST["typec"] . "'
                    )";
                    // $this->db->insert('r_events', array('test' => $sql));

                    header('Content-Type: application/json');
                    echo '{"id":"' . mysqli_insert_id($connection) . '"}';
                }
                $this->db->insert("r_events", array('test' => $_POST['chk1']));
                if ($_POST['chk1'] == "1") {
                    $this->scolarite_modele->update_g_employee($matriculeEmploye = $_POST["employe"], $idGroupe = $_POST["idGroupe"]);
                }
                exit;
            } elseif ($_POST['action'] == "update") {
                $date1 = date('Y-m-d H:i:s', strtotime('-2 hours', strtotime($_POST["start"])));
                $date2 = date('Y-m-d H:i:s', strtotime('-2 hours', strtotime($_POST["end"])));
                mysqli_query($connection, "UPDATE `events` set 
            `start` = '" . mysqli_real_escape_string($connection, $date1) . "', 
            `end` = '" . mysqli_real_escape_string($connection, $date2) . "' 
            where  id = '" . mysqli_real_escape_string($connection, $_POST["id"]) . "'");
                exit;
            } elseif ($_POST['action'] == "delete") {
                /*   if(($_POST['rd'] == "1")){
                  $this->scolarite_modele->update_events($_POST['id'] ,$type=$_POST['rd']  ) ;
                  }if(($_POST['rd'] == "2")){
                  $this->scolarite_modele->update_events($_POST['id'] ,$type=$_POST['rd']  ) ;

                  } if(($_POST['rd'] == "3")){
                  mysqli_query($connection,"DELETE from `events` where  id = '".mysqli_real_escape_string($connection,$_POST["id"])."'");
                  if (mysqli_affected_rows($connection) > 0) {
                  echo "1";
                  }} */
                $r_event = $this->scolarite_modele->r_events($id = $_POST['id']);
                $date_f = date('Y-m-d', strtotime($r_event["end"]));
                $date_s = date('Y-m-d', strtotime($r_event["start"]));
                $id_repeat = $r_event["id"];

                // $this->scolarite_modele->update_events($id=$_POST['id'],$rd=$_POST['rd'],$type=$_POST['type'],$type1=$_POST['type1'],$local=$_POST['local'],$start=$_POST['start'],$end=$_POST['end'],$idGroupe=$_POST['eventIDG'],$prof=$_POST['prof'],$title=$_POST['title']); 
                $this->scolarite_modele->update_g_employee($matriculeEmploye = $_POST["prof"], $idGroupe = $_POST["eventIDG"]);

                if ($_POST['rd'] == "1") {

                    if ($_POST['type'] == "1") {

                        $this->scolarite_modele->update_events($id = $_POST['id'], $rd = $_POST['rd'], $type = $_POST['type'], $type1 = $_POST['type1'], $local = $_POST['local'], $start = $_POST['start'], $end = $_POST['end'], $idGroupe = $_POST['eventIDG'], $prof = $_POST['prof'], $title = $_POST['title']);
                    } elseif ($_POST['type'] == "2") {
                        $this->scolarite_modele->delete_events_ulterieurs($id_r = $id_repeat, $start = $_POST['start']);
                        $date1 = date('Y-m-d H:i:s', strtotime($_POST["start"]));
                        $date2 = date('Y-m-d H:i:s', strtotime($_POST["end"]));
                        $this->scolarite_modele->update_unique_event($id = $_POST['id'], $rd = $_POST['rd'], $type = $_POST['type'], $type1 = $_POST['type1'], $local = $_POST['local'], $start = $_POST['start'], $end = $_POST['end'], $idGroupe = $_POST['eventIDG'], $prof = $_POST['prof'], $title = $_POST['title']);
                        $i = 0;
                        $this->db->insert('r_events', array('test' => $date1));
                        while ($date1 < $date_f) {
                            //    $date_d = strtotime('+7 days', strtotime($_GET["start"]) );
                            // $date_f1 = strtotime('+7 days', strtotime($_GET["end"]) );
                            $i++;

                            $date1 = date('Y-m-d H:i:s', strtotime('+7 days', strtotime($date1)));
                            $date2 = date('Y-m-d H:i:s', strtotime('+7 days', strtotime($date2)));

                            //  $diff=date_diff($date1,$date2);
                            $this->scolarite_modele->update_events($id = $_POST['id'], $rd = $_POST['rd'], $type = $_POST['type'], $type1 = $_POST['type1'], $local = $_POST['local'], $start = $date1, $end = $date2, $idGroupe = $_POST['eventIDG'], $prof = $_POST['prof'], $title = $_POST['title']);
                        }
                    } elseif ($_POST['type'] == "3") {
                        $date1 = date('Y-m-d H:i:s', strtotime($_POST["start"]));
                        $date2 = date('Y-m-d H:i:s', strtotime($_POST["end"]));
                        $date3 = date('Y-m-d H:i:s', strtotime($_POST["start"]));
                        $date4 = date('Y-m-d H:i:s', strtotime($_POST["end"]));
                        $this->scolarite_modele->delete_all_events($id_r = $id_repeat);
                        /*   $this->scolarite_modele->add_r_events(array(
                          "start" => $date1,
                          "end" => $date_f
                          )
                          );
                          $id_repeat=$this->scolarite_modele->max_id_r_events(); */

                        $i = 0;
                        while ($date1 < $date_f) {
                            //    $date_d = strtotime('+7 days', strtotime($_GET["start"]) );
                            // $date_f1 = strtotime('+7 days', strtotime($_GET["end"]) );
                            $i++;

                            $date1 = date('Y-m-d H:i:s', strtotime('+7 days', strtotime($date1)));
                            $date2 = date('Y-m-d H:i:s', strtotime('+7 days', strtotime($date2)));

                            //  $diff=date_diff($date1,$date2);
                            $this->scolarite_modele->update_events($id = $_POST['id'], $rd = $_POST['rd'], $type = $_POST['type'], $type1 = $_POST['type1'], $local = $_POST['local'], $date1, $end = $date2, $idGroupe = $_POST['eventIDG'], $prof = $_POST['prof'], $title = $_POST['title']);
                        } $j = 0;
                        while ($date1 > $date_s) {
                            //    $date_d = strtotime('+7 days', strtotime($_GET["start"]) );
                            // $date_f1 = strtotime('+7 days', strtotime($_GET["end"]) );
                            $j++;

                            $date3 = date('Y-m-d H:i:s', strtotime('-7 days', strtotime($date1)));
                            $date4 = date('Y-m-d H:i:s', strtotime('-7 days', strtotime($date2)));

                            //  $diff=date_diff($date1,$date2);
                            $this->scolarite_modele->update_events($id = $_POST['id'], $rd = $_POST['rd'], $type = $_POST['type'], $type1 = $_POST['type1'], $local = $_POST['local'], $start = $date3, $end = $date4, $idGroupe = $_POST['eventIDG'], $prof = $_POST['prof'], $title = $_POST['title']);
                        }
                    }
                } else {
                    if ($_POST['type1'] == "1") {

                        $this->scolarite_modele->delete_unique_event($id = $_POST['id']);
                    } elseif ($_POST['type1'] == "2") {
                        $this->scolarite_modele->delete_events_ulterieurs($id_r = $id_repeat, $start = $_POST['start']);
                    } if ($_POST['type1'] == "3") {
                        $this->scolarite_modele->delete_all_events($id_r = $id_repeat);
                    }
                }
                // echo date('Y-m-d',$date_f);
                // $date_d=strtotime('+7 days', strtotime($_POST["start"]) );




                header('Content-Type: application/json');
                echo '{"id":"' . $this->db->mysql_insert_id() . '"}';


                exit;
            }
        }//print_r($listeCours);

        $employe = $this->scolarite_modele->get_employee();
        $info_salle = $this->scolarite_modele->recuperer_salle();
        $data_session_courante = $this->scolarite_modele->get_session_courante();
        $data_courante = $this->scolarite_modele->get_date_courante();
//  print_r($data_courante);
        $data = array('employe' => $employe, 'local' => $info_salle['idLocal'],
            'annee' => $data_session_courante['annee'][0],
            'semestre' => $data_session_courante['semestre'][0],
            'finCours' => $data_courante['finCours'],
            'programme' => $this->scolarite_modele->get_programme());
        //$this->loadData();
        // $data=array('idProgramme'=>$idProgramme,'semestre'=>$semestre,'listeCours'=>$listeCours);
        $this->load->view("agent/emplois_du_temps.php", $data);
    }

    public function emplois_du_temps_avec_date() {
        // $events=null;
        $connection = mysqli_connect('127.0.0.1', 'root', '', 'iup') or die(mysqli_error($connection));
        // set your user id settings


        $datetime_string = date('c', time());
        $result = "hhhh";
        if (isset($_POST['action']) or isset($_GET['view'])) {
            if (isset($_GET['view'])) {
                header('Content-Type: application/json');


                //$start = mysqli_real_escape_string($connection,$_GET["start"]);
                //$end = mysqli_real_escape_string($connection,$_GET["end"]);
                $start = $_GET["start"];
                $end = $_GET["end"];
                $result = $this->scolarite_modele->get_events1($start, $end, $s = $_GET['semestre'], $p = $_GET['idProgramme'], $chek1 = $_GET["chek1"], $local = $_GET["local"], $employe1 = $_GET["employe1"]);
                $events = $result['events'];

                echo json_encode($events);
                //echo json_encode($result['end']); 
                exit;
            } elseif ($_POST['action'] == "add") {    //header('Content-Type: application/x-json; charset=utf-8');
                //  echo(json_encode($this->scolarite->get_groupe($_POST['annee'], $_POST['semestre'], $_POST['sigle'])));
                $p = $_POST["chekb"];

                if ($p == "1") {
                    $date_f = date('Y-m-d', strtotime($_POST["dfin"]));
                    // echo date('Y-m-d',$date_f);
                    // $date_d=strtotime('+7 days', strtotime($_POST["start"]) );


                    $date1 = date('Y-m-d H:i:s', strtotime($_POST["start"]));
                    $date2 = date('Y-m-d H:i:s', strtotime($_POST["end"]));
                    $this->scolarite_modele->add_r_events(array(
                        "start" => $date1,
                        "end" => $date_f
                            )
                    );
                    $id_repeat = $this->scolarite_modele->max_id_r_events();
                    $i = 0;
                    while ($date1 < $date_f) {
                        //    $date_d = strtotime('+7 days', strtotime($_GET["start"]) );
                        // $date_f1 = strtotime('+7 days', strtotime($_GET["end"]) );
                        $i++;
                        if ($i == 1) {
                            $date1 = date('Y-m-d H:i:s', strtotime('+0 days', strtotime($date1)));
                            $date2 = date('Y-m-d H:i:s', strtotime('+0 days', strtotime($date2)));
                        } else {
                            $date1 = date('Y-m-d H:i:s', strtotime('+7 days', strtotime($date1)));
                            $date2 = date('Y-m-d H:i:s', strtotime('+7 days', strtotime($date2)));
                        }
                        //  $diff=date_diff($date1,$date2);

                        mysqli_query($connection, "INSERT INTO `events` (
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
                    '" . mysqli_real_escape_string($connection, $_POST["title"]) . "',
                    '" . mysqli_real_escape_string($connection, $date1) . "',
                    '" . mysqli_real_escape_string($connection, $date2) . "', '" . $_POST["idProgramme"] . "', '" . $_POST["semestre"] . "', '" . $_POST["local"] . "', '" . $_POST["idGroupe"] . "', '" . $_POST["employe"] . "', '" . $id_repeat . "', '" . $_POST["typec"] . "'
                    )");
                    }

                    header('Content-Type: application/json');
                    echo '{"id":"' . mysqli_insert_id($connection) . '"}';
                } else {

                    //  $diff=date_diff($date1,$date2);

                    mysqli_query($connection, "INSERT INTO `events` (
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
                    '" . mysqli_real_escape_string($connection, $_POST["title"]) . "',
                    '" . mysqli_real_escape_string($connection, date('Y-m-d H:i:s', strtotime($_POST["start"]))) . "',
                    '" . mysqli_real_escape_string($connection, date('Y-m-d H:i:s', strtotime($_POST["end"]))) . "', '" . $_POST["idProgramme"] . "', '" . $_POST["semestre"] . "', '" . $_POST["local"] . "', '" . $_POST["idGroupe"] . "', '" . $_POST["typec"] . "'
                    )");
                    $sql = "INSERT INTO `events` (
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
                    '" . mysqli_real_escape_string($connection, $_POST["title"]) . "',
                    '" . mysqli_real_escape_string($connection, date('Y-m-d H:i:s', strtotime($_POST["start"]))) . "',
                    '" . mysqli_real_escape_string($connection, date('Y-m-d H:i:s', strtotime($_POST["end"]))) . "', '" . $_POST["idProgramme"] . "', '" . $_POST["semestre"] . "', '" . $_POST["local"] . "', '" . $_POST["idGroupe"] . "', '" . $_POST["typec"] . "'
                    )";
                    // $this->db->insert('r_events', array('test' => $sql));

                    header('Content-Type: application/json');
                    echo '{"id":"' . mysqli_insert_id($connection) . '"}';
                }
                $this->db->insert("r_events", array('test' => $_POST['chk1']));
                if ($_POST['chk1'] == "1") {
                    $this->scolarite_modele->update_g_employee($matriculeEmploye = $_POST["employe"], $idGroupe = $_POST["idGroupe"]);
                }
                exit;
            } elseif ($_POST['action'] == "update") {
                $date1 = date('Y-m-d H:i:s', strtotime('-2 hours', strtotime($_POST["start"])));
                $date2 = date('Y-m-d H:i:s', strtotime('-2 hours', strtotime($_POST["end"])));
                mysqli_query($connection, "UPDATE `events` set 
            `start` = '" . mysqli_real_escape_string($connection, $date1) . "', 
            `end` = '" . mysqli_real_escape_string($connection, $date2) . "' 
            where  id = '" . mysqli_real_escape_string($connection, $_POST["id"]) . "'");
                exit;
            } elseif ($_POST['action'] == "delete") {
                /*   if(($_POST['rd'] == "1")){
                  $this->scolarite_modele->update_events($_POST['id'] ,$type=$_POST['rd']  ) ;
                  }if(($_POST['rd'] == "2")){
                  $this->scolarite_modele->update_events($_POST['id'] ,$type=$_POST['rd']  ) ;

                  } if(($_POST['rd'] == "3")){
                  mysqli_query($connection,"DELETE from `events` where  id = '".mysqli_real_escape_string($connection,$_POST["id"])."'");
                  if (mysqli_affected_rows($connection) > 0) {
                  echo "1";
                  }} */
                $r_event = $this->scolarite_modele->r_events($id = $_POST['id']);
                $date_f = date('Y-m-d', strtotime($r_event["end"]));
                $date_s = date('Y-m-d', strtotime($r_event["start"]));
                $id_repeat = $r_event["id"];

                // $this->scolarite_modele->update_events($id=$_POST['id'],$rd=$_POST['rd'],$type=$_POST['type'],$type1=$_POST['type1'],$local=$_POST['local'],$start=$_POST['start'],$end=$_POST['end'],$idGroupe=$_POST['eventIDG'],$prof=$_POST['prof'],$title=$_POST['title']); 
                $this->scolarite_modele->update_g_employee($matriculeEmploye = $_POST["prof"], $idGroupe = $_POST["eventIDG"]);

                if ($_POST['rd'] == "1") {

                    if ($_POST['type'] == "1") {

                        $this->scolarite_modele->update_events($id = $_POST['id'], $rd = $_POST['rd'], $type = $_POST['type'], $type1 = $_POST['type1'], $local = $_POST['local'], $start = $_POST['start'], $end = $_POST['end'], $idGroupe = $_POST['eventIDG'], $prof = $_POST['prof'], $title = $_POST['title']);
                    } elseif ($_POST['type'] == "2") {
                        $this->scolarite_modele->delete_events_ulterieurs($id_r = $id_repeat, $start = $_POST['start']);
                        $date1 = date('Y-m-d H:i:s', strtotime($_POST["start"]));
                        $date2 = date('Y-m-d H:i:s', strtotime($_POST["end"]));
                        $this->scolarite_modele->update_unique_event($id = $_POST['id'], $rd = $_POST['rd'], $type = $_POST['type'], $type1 = $_POST['type1'], $local = $_POST['local'], $start = $_POST['start'], $end = $_POST['end'], $idGroupe = $_POST['eventIDG'], $prof = $_POST['prof'], $title = $_POST['title']);
                        $i = 0;
                        $this->db->insert('r_events', array('test' => $date1));
                        while ($date1 < $date_f) {
                            //    $date_d = strtotime('+7 days', strtotime($_GET["start"]) );
                            // $date_f1 = strtotime('+7 days', strtotime($_GET["end"]) );
                            $i++;

                            $date1 = date('Y-m-d H:i:s', strtotime('+7 days', strtotime($date1)));
                            $date2 = date('Y-m-d H:i:s', strtotime('+7 days', strtotime($date2)));

                            //  $diff=date_diff($date1,$date2);
                            $this->scolarite_modele->update_events($id = $_POST['id'], $rd = $_POST['rd'], $type = $_POST['type'], $type1 = $_POST['type1'], $local = $_POST['local'], $start = $date1, $end = $date2, $idGroupe = $_POST['eventIDG'], $prof = $_POST['prof'], $title = $_POST['title']);
                        }
                    } elseif ($_POST['type'] == "3") {
                        $date1 = date('Y-m-d H:i:s', strtotime($_POST["start"]));
                        $date2 = date('Y-m-d H:i:s', strtotime($_POST["end"]));
                        $date3 = date('Y-m-d H:i:s', strtotime($_POST["start"]));
                        $date4 = date('Y-m-d H:i:s', strtotime($_POST["end"]));
                        $this->scolarite_modele->delete_all_events($id_r = $id_repeat);
                        /*   $this->scolarite_modele->add_r_events(array(
                          "start" => $date1,
                          "end" => $date_f
                          )
                          );
                          $id_repeat=$this->scolarite_modele->max_id_r_events(); */

                        $i = 0;
                        while ($date1 < $date_f) {
                            //    $date_d = strtotime('+7 days', strtotime($_GET["start"]) );
                            // $date_f1 = strtotime('+7 days', strtotime($_GET["end"]) );
                            $i++;

                            $date1 = date('Y-m-d H:i:s', strtotime('+7 days', strtotime($date1)));
                            $date2 = date('Y-m-d H:i:s', strtotime('+7 days', strtotime($date2)));

                            //  $diff=date_diff($date1,$date2);
                            $this->scolarite_modele->update_events($id = $_POST['id'], $rd = $_POST['rd'], $type = $_POST['type'], $type1 = $_POST['type1'], $local = $_POST['local'], $date1, $end = $date2, $idGroupe = $_POST['eventIDG'], $prof = $_POST['prof'], $title = $_POST['title']);
                        } $j = 0;
                        while ($date1 > $date_s) {
                            //    $date_d = strtotime('+7 days', strtotime($_GET["start"]) );
                            // $date_f1 = strtotime('+7 days', strtotime($_GET["end"]) );
                            $j++;

                            $date3 = date('Y-m-d H:i:s', strtotime('-7 days', strtotime($date1)));
                            $date4 = date('Y-m-d H:i:s', strtotime('-7 days', strtotime($date2)));

                            //  $diff=date_diff($date1,$date2);
                            $this->scolarite_modele->update_events($id = $_POST['id'], $rd = $_POST['rd'], $type = $_POST['type'], $type1 = $_POST['type1'], $local = $_POST['local'], $start = $date3, $end = $date4, $idGroupe = $_POST['eventIDG'], $prof = $_POST['prof'], $title = $_POST['title']);
                        }
                    }
                } else {
                    if ($_POST['type1'] == "1") {

                        $this->scolarite_modele->delete_unique_event($id = $_POST['id']);
                    } elseif ($_POST['type1'] == "2") {
                        $this->scolarite_modele->delete_events_ulterieurs($id_r = $id_repeat, $start = $_POST['start']);
                    } if ($_POST['type1'] == "3") {
                        $this->scolarite_modele->delete_all_events($id_r = $id_repeat);
                    }
                }
                // echo date('Y-m-d',$date_f);
                // $date_d=strtotime('+7 days', strtotime($_POST["start"]) );




                header('Content-Type: application/json');
                echo '{"id":"' . $this->db->mysql_insert_id() . '"}';


                exit;
            }
        }//print_r($listeCours);

        $employe = $this->scolarite_modele->get_employee();
        $info_salle = $this->scolarite_modele->recuperer_salle();
        $data_session_courante = $this->scolarite_modele->get_session_courante();
        $data_courante = $this->scolarite_modele->get_date_courante();
//  print_r($data_courante);
        $data = array('employe' => $employe, 'local' => $info_salle['idLocal'],
            'annee' => $data_session_courante['annee'][0],
            'semestre' => $data_session_courante['semestre'][0],
            'finCours' => $data_courante['finCours'],
            'programme' => $this->scolarite_modele->get_programme());
        //$this->loadData();
        // $data=array('idProgramme'=>$idProgramme,'semestre'=>$semestre,'listeCours'=>$listeCours);
        $this->load->view("agent/emplois_du_temps_date.php", $data);
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
                $this->load->view('agent/modification_confirme', $data);
            } else {
                $employe = $this->scolarite_modele->get_employee();

                $info_salle = $this->scolarite_modele->recuperer_salle();
                $data = array('sigleCours' => $data_sigle_cours['sigleCours'],
                    'titre' => $data_sigle_cours['titre'],
                    'annee' => $data_session_courante['annee'][0],
                    'semestre' => $data_session_courante['semestre'][0],
                    'programme' => $this->scolarite_modele->get_programme(),
                    'local' => $info_salle['idLocal'],
                    'employe' => $employe);
                $this->load->view("agent/choisir_annee_horaire_emplois", $data);
            }
        }
    }

    public function loadData() {
        $loadType = $_POST['loadType'];
        $loadId = $_POST['loadId'];
        $annee = $_POST['annee'];
        $semestre = $_POST['semestre'];
        $type = $_POST['type'];
        $matriculeEmploye = $_POST['matriculeEmploye'];

        $result = $this->scolarite_modele->getData($loadType, $loadId, $annee, $semestre, $type, $matriculeEmploye);

        $HTML = "";
        if ($loadType == "groupe") {
            if ($result->num_rows() > 0) {
                foreach ($result->result() as $list) {
                    $HTML .= "<option value='" . $list->idGroupe . "'>" . $list->idGroupe . "</option>";
                }
            }
        } elseif ($loadType == "employe") {
            if ($result->num_rows() > 0) {
                foreach ($result->result() as $list) {
                    $HTML .= "<option value='" . $list->matriculeEmploye . "'>" . $list->nom . " " . $list->prenom . "</option>";
                }
            }
        } elseif ($loadType == "infomodule_element") {
            if ($result->num_rows() > 0) {
                foreach ($result->result() as $list) {
                    $HTML .= "<option value='" . $list->sigle . "'>" . $list->sigle . " " . $list->titre . "</option>";
                }
            }
        }
        echo $HTML;
    }

    function chevauchement() {
        $chevauchement = $this->scolarite_modele->chevauchement($startTimeM = $_GET['startTimeM'], $endTimeM = $_GET['endTimeM'], $prof = $_GET['prof'], $local2 = $_GET['local2'], $id = $_GET['id']);

        echo(json_encode($chevauchement));
    }

    function chevauchement2() {
        $chevauchement = $this->scolarite_modele->chevauchement2($startTimeM = $_GET['startTimeM'], $endTimeM = $_GET['endTimeM'], $prof = $_GET['prof'], $local2 = $_GET['local2'], $id = $_GET['id']);

        echo(json_encode($chevauchement));
    }

    function groupe_calender() {
        $sessionCourante = $this->scolarite_modele->get_session_courante_calendar();
        $anneeCourante = $sessionCourante['annee'][0];
        $semestreCourant = $sessionCourante['semestre'][0];
        $groupe = $this->scolarite_modele->get_groupe_calendar($anneeCourante, $semestreCourant, $_GET['sigle']);

        echo(json_encode($groupe));
    }

    function afficher_etudiant_groupe_ab() {
        $sessionCourante = $this->scolarite_modele->get_session_courante_calendar();
        $anneeCourante = $sessionCourante['annee'][0];
        $semestreCourant = $sessionCourante['semestre'][0];
        //tous les etudiants inscrits dans un groupe specifie
        //$data['listeH']=$this->scolarite_modele->getListeHeuresEnseignement_element($_GET['groupe'],$_GET['start'],$_GET['end']);
        $data['detail'] = $this->scolarite_modele->get_detail_groupe($_GET['groupe'], $_GET['employe']);
        //  echo $data['detail']['groupe'];
        //$data['taux_horaire']=$this->scolarite_modele->get_taux_horaire($data['detail'][0]['grade']);
        $data['etudiant'] = $this->scolarite_modele->get_etudiants_groupe($_GET['groupe']);
        $data['annee'] = $anneeCourante;
        $data['session'] = $semestreCourant;
        $data['idGroupe'] = $_GET['groupe'];
        /* Correction 23 février 2013 RM $data['titre'] = 'Liste des étudiants du groupe ' . $idGroupe . ', semestre ' .
          $this->get_session_nom($semestreCourant) . ' ' . $anneeCourante . '
          . Cocher le ou les étudiants absents.'; */
        $data['titre'] = 'Liste des étudiants du groupe ' . $this->scolarite_modele->corrigerNumGroupe($_GET['groupe']) . ', semestre ' .
                $this->get_session_nom($semestreCourant) . ' ' . $anneeCourante . '
						. Cocher le ou les étudiants absents.';
        echo(json_encode($data));
    }

    function afficher_etudiant_groupe_a() {
        $sessionCourante = $this->scolarite_modele->get_session_courante_calendar();
        $anneeCourante = $sessionCourante['annee'][0];
        $semestreCourant = $sessionCourante['semestre'][0];
        //tous les etudiants inscrits dans un groupe specifie
        $start = date('Y-m-d', strtotime('-1 days', strtotime($_GET["start"])));
        $end = date('Y-m-d', strtotime('-1 days', strtotime($_GET["end"])));
        $data['listeH'] = $this->scolarite_modele->getListeHeuresEnseignement_element($_GET['groupe'], $start, $end, $_GET['employe']);
        $data['detail'] = $this->scolarite_modele->get_detail_groupe($_GET['groupe'], $_GET['employe']);
        //  echo $data['detail']['groupe'];
        $data['taux_horaire'] = $this->scolarite_modele->get_taux_horaire($data['detail'][0]['grade']);
        $data['etudiant'] = $this->scolarite_modele->get_etudiants_groupe($_GET['groupe']);
        $data['annee'] = $anneeCourante;
        $data['session'] = $semestreCourant;
        $debutCours = $sessionCourante['debutCours'][0];
        ;
        $data['semaine'] = "Periode du  " . date('d/m/Y', strTotime($debutCours)) . " à " . date('d/m/Y', strTotime($end)) . "";
        $data['idGroupe'] = $_GET['groupe'];
        /* Correction 23 février 2013 RM $data['titre'] = 'Liste des étudiants du groupe ' . $idGroupe . ', semestre ' .
          $this->get_session_nom($semestreCourant) . ' ' . $anneeCourante . '
          . Cocher le ou les étudiants absents.'; */
        $data['titre'] = 'Liste des étudiants du groupe ' . $this->scolarite_modele->corrigerNumGroupe($_GET['groupe']) . ', semestre ' .
                $this->get_session_nom($semestreCourant) . ' ' . $anneeCourante . '
						. Cocher le ou les étudiants absents.';
        echo(json_encode($data));
    }

    function suivi_ens_etu() {
        $employe = $this->scolarite_modele->get_employee();
        $sessionCourante = $this->scolarite_modele->get_session_courante_calendar();
        $anneeCourante = $sessionCourante['annee'][0];
        $courante = $this->scolarite_modele->get_session_courante_calendar();
        // $data['annee'] = $this->scolarite_modele->recuperer_annee();
        $param_generaux= $this->scolarite_modele->Recup_Parametre_Generaux();
        $data = array('courante' => $courante, 'employe' => $employe, 'annee' => $anneeCourante,'param_generaux'=>$param_generaux);
       // print_r($data['param_generaux']);
        $this->load->view("agent/suivi_ens_etu", $data);
    }

    function groupe_d_enseignent() {
        //$sessionCourante = $this->scolarite_modele->get_session_courante();
        // $anneeCourante = $sessionCourante['annee'][0];
        $anneeCourante = $_GET['annee'];
        // $semestreCourant=3;
        // if(($anneeCourante%2)==0){
        //     $semestreCourant=1;
        // }
        //$semestreCourant = $sessionCourante['semestre'][0];
        //$listeH=$this->scolarite_modele->getListeHeuresEnseignement();
        $groupe = $this->scolarite_modele->get_groupe_ens($anneeCourante, $_GET['session'], $_GET['matricule']);
        // $groupes=array('listeH'=>$listeH,'groupe'=>$groupe);
        echo(json_encode($groupe));
    }

    function enseignement() {
        $this->load->view("agent/enseignement");
    }

    function heures_enseignement() {
        $groupe['data'] = $this->scolarite_modele->enseignement();
        // $groupes=array('listeH'=>$listeH,'groupe'=>$groupe);
        echo(json_encode($groupe));
    }

    function modifier_heure_enseignement() {
        $groupe['data'] = $this->scolarite_modele->modifier_heure_enseignement($_GET['heureD'], $_GET['date'], $_GET['duree'], $_GET['type'], $_GET['sigle'], $_GET['groupe'], $_GET['matricule'], $_GET['ancheureD'], $_GET['ancdate']);
        // $groupes=array('listeH'=>$listeH,'groupe'=>$groupe);
        //  echo(json_encode($groupe));   
    }

    function delete_heure_enseignement() {
        $groupe['data'] = $this->scolarite_modele->delete_heure_enseignement($_GET['heureD'], $_GET['date'], $_GET['duree'], $_GET['type'], $_GET['sigle'], $_GET['groupe'], $_GET['matricule']);
        // $groupes=array('listeH'=>$listeH,'groupe'=>$groupe);
        //  echo(json_encode($groupe));   
    }

    /*      function paiement_heures() 
      {
      $statut = $this->scolarite_modele->get_statut();
      $sessionCourante = $this->scolarite_modele->get_session_courante();
      $anneeCourante = $sessionCourante['annee'][0];
      $data=array( 'statut'=>$statut,'annee'=>$anneeCourante);
      $this->load->view("agent/paiement_heures", $data);
      } */

    function paiement_heures() {
        $statut = $this->scolarite_modele->get_statut();
        $sessionCourante = $this->scolarite_modele->get_session_courante();
        $anneeCourante = $sessionCourante['annee'][0];
        $data = array('statut' => $statut, 'annee' => $anneeCourante);
        $this->load->view("agent/form_paiement_heures", $data);
    }

    function generer_paiement_heures() {
        $statut = $this->scolarite_modele->get_statut();
        $sessionCourante = $this->scolarite_modele->get_session_courante();
        $anneeCourante = $sessionCourante['annee'][0];
        $data = array('statut' => $statut, 'annee' => $anneeCourante);
        $this->load->view("agent/generer_paiement_heures", $data);
    }

    /* function afficher_paiement_heures(){
      $employe= $this->scolarite_modele->get_employe_paiement($_GET['start'],$_GET['end'],$_GET['statut']);
      $paiement= $this->scolarite_modele->afficher_paiement_heures($_GET['start'],$_GET['end'],$_GET['statut']);
      $groupes=array('paiement'=>$paiement,'employe'=>$employe);
      echo(json_encode($groupes));
      } */

    function afficher_paiement_heures() {
        $employe = $this->scolarite_modele->get_employe_paiement($_POST['dateD'], $_POST['dateF'], $_POST['statut']);
        $paiement = $this->scolarite_modele->afficher_paiement_heures($_POST['dateD'], $_POST['dateF'], $_POST['statut']);
        $groupes = array('statut' => $_POST['statut'], 'end' => $_POST['dateF'], 'start' => $_POST['dateD'], 'paiement' => $paiement, 'employe' => $employe);
        $this->load->view("agent/afficher_paiement_heures", $groupes);
    }

    function generer_paiement() {
        //$employe= $this->scolarite_modele->get_employe_paiement($_POST['dateD'],$_POST['dateF'],$_POST['statut']);
        $paiement = $this->scolarite_modele->afficher_paiement_heures($_POST['dateD'], $_POST['dateF'], $_POST['statut']);
        //$groupes=array('statut'=>$_POST['statut'],'end'=>$_POST['dateF'],'start'=>$_POST['dateD'],'paiement'=>$paiement,'employe'=>$employe);
        // $this->load->view("agent/afficher_paiement_heures", $groupes); 
        setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
        $date = utf8_encode(strftime("%d-%B-%Y"));
        $objXLS = new PHPExcel();
        $objSheet = $objXLS->setActiveSheetIndex(0);


        //formatage du Titre de la liste.
        // $objSheet->getDefaultStyle()->getFont()->setName('Courier New');
        // $objSheet->setCellValue('A1', 'INSTITUT UNIVERSITAIRE PROFESSIONNEL');
        //  $objSheet->getStyle('A1')->getFont()->setBold(TRUE);
        // $titreFichierExcel = 'Heures d\'enseignement du semestre courant';
        // $objSheet->setCellValue('B1',$titreFichierExcel );
        //  $objSheet->setCellValue('A6', 'Semestre : ' .$semestre .' '.$annee);
        //  $objSheet->setCellValue('A4', 'Date : ' . $date);
        $objSheet->getDefaultStyle()->getFont()->setName('Arial');
        $objSheet->setCellValue('A1', 'Etat d\'avencement des cours dispensés');
        $objSheet->getStyle('A1')->getFont()->setBold(TRUE);

        $objSheet->setCellValueByColumnAndRow(0, 2, 'Matricule');
        $objSheet->setCellValueByColumnAndRow(1, 2, 'Nom et Prénom ');

        $objSheet->setCellValueByColumnAndRow(2, 2, 'duree CM ');
        $objSheet->setCellValueByColumnAndRow(3, 2, 'duree TD');
        $objSheet->setCellValueByColumnAndRow(4, 2, 'duree TP');
        $objSheet->setCellValueByColumnAndRow(5, 2, 'total');
        $objSheet->setCellValueByColumnAndRow(6, 2, 'taux horaire');
        $objSheet->setCellValueByColumnAndRow(7, 2, 'montant');
        $objSheet->setCellValueByColumnAndRow(8, 2, 'compteBancaire');
        $objSheet->setCellValueByColumnAndRow(9, 2, 'Banque');
        $objSheet->setCellValueByColumnAndRow(10, 2, 'NIN');

        $k = 3;
        foreach ($paiement as $matriculeEmploye => $value) {
            $objSheet->setCellValueByColumnAndRow(0, $k, $matriculeEmploye);
            $objSheet->setCellValueByColumnAndRow(1, $k, $value['nomprenom']);
            $objSheet->setCellValueByColumnAndRow(2, $k, $value['dureeCM']);
            $objSheet->setCellValueByColumnAndRow(3, $k, $value['dureeTD']);
            $objSheet->setCellValueByColumnAndRow(4, $k, $value['dureeTP']);
            $objSheet->setCellValueByColumnAndRow(5, $k, $value['total']);
            $objSheet->setCellValueByColumnAndRow(6, $k, $value['taux_horaire']);
            $objSheet->setCellValueByColumnAndRow(7, $k, $value['montant']);
            $objSheet->setCellValueByColumnAndRow(8, $k, $value['compteBancaire']);
            $objSheet->setCellValueByColumnAndRow(9, $k, $value['banque']);
            $objSheet->setCellValueByColumnAndRow(10, $k, $value['NIN']);
            $k++;
        } $nomFichier = 'ListeHeures';
        $objWriter = PHPExcel_IOFactory::createwriter($objXLS, 'Excel5');
        header('Content-Type', 'application/msexcel;charset=utf-8');
        header('Content-Disposition: attachment;filename="' . $nomFichier . '.xls"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($objXLS, 'Excel5');
        ob_end_clean();

        $objWriter->save('php://output');
    }

    function form_suivi_absence() {
        //  $employe= $this->scolarite_modele->get_employe_paiement($_POST['dateD'],$_POST['dateF'],$_POST['statut']);
        //  $paiement= $this->scolarite_modele->afficher_paiement_heures($_POST['dateD'],$_POST['dateF'],$_POST['statut']);
        // $groupes=array('statut'=>$_POST['statut'],'end'=>$_POST['dateF'],'start'=>$_POST['dateD'],'paiement'=>$paiement,'employe'=>$employe);
        $this->load->view("agent/form_suivi_absence");
    }

    /*   function suivi_absence(){
      // $employe= $this->scolarite_modele->get_employe_suivi($dateD=$_POST['dateD'],$dateF=$_POST['dateF']);
      //  $paiement= $this->scolarite_modele->afficher_paiement_heures($_POST['dateD'],$_POST['dateF'],$_POST['statut']);
      // $groupes=array('statut'=>$_POST['statut'],'end'=>$_POST['dateF'],'start'=>$_POST['dateD'],'paiement'=>$paiement,'employe'=>$employe);
      //$this->load->view("agent/form_suivi_absence");
      //  echo $_POST['dateD'];
      $date1 = date('Y-m-d',strtotime("last Sunday", strtotime($_POST['dateD'])));
      //$weekStartDate = date('Y-m-d',strtotime("last Sunday", $dateD));
      //echo $weekStartDate;
      $i=0;
      $date2 = date('Y-m-d',strtotime("last Sunday", strtotime($_POST['dateF'])));
      $date2 = date('Y-m-d',strtotime('+7 days', strtotime($date2) ));
      $sql="";
      /*     $sql = 'SELECT distinct  e.matriculeEmploye from enseignement e where  e.date>="'.$_POST['dateD'].'" and e.date<="'.$_POST['dateF'].'"';
      $res = $this->db->query($sql);
      $info=null;
      if ($res->num_rows() > 0)
      {
      foreach ($res->result_array() as $row) {

      while($date1<$date2){
      $i++;
      if($i==0){
      $date1=date('Y-m-d',strtotime('+0 days', strtotime($date1)));
      }else{
      $date1=date('Y-m-d',strtotime('+7 days', strtotime($date1)));
      }
      // echo "date 1 ".$date1;
      //$sql1 = ' SELECT e.matriculeEmploye,sum(e.duree),sum(e1.end - e1.start) from enseignement e,employe a,groupe g,events e1 where a.matriculeEmploye=e.matriculeEmploye and  g.matriculeEmploye=e.matriculeEmploye and  e1.idGroupe=g.idGroupe and e.date>="'.$date1.'" and e.date<="'.date('Y-m-d',strtotime('+7 days', strtotime($date1))).'" and e1.start>="'.$date1.'" and e1.start<="'.date('Y-m-d',strtotime('+7 days', strtotime($date1))).'" and e.matriculeEmploye="'.$row['matriculeEmploye'].'"';
      //echo $sql1;
      $sql1="insert into semainssemestre(No,start,end) values(".$i.",'".$date1."','".date('Y-m-d',strtotime('+7 days', strtotime($date1)))."')";
      $res1 = $this->db->query($sql1);
      /* if ($res1->num_rows() > 0)
      {
      foreach ($res1->result_array() as $row1) {
      $info[$row['matriculeEmploye']][]=$row1;

      }}
      }

      }}
      print_r($info);
      } */

    function suivi_absence() {
        $employe = $this->scolarite_modele->get_employe_suivi($dateD = $_POST['dateD'], $dateF = $_POST['dateF']);
        $nb = $this->scolarite_modele->get_nb_sem_suivi($dateD = $_POST['dateD'], $dateF = $_POST['dateF']);
        print_r($employe);
        $data = array('employe' => $employe, 'nb' => $nb);
        $this->load->view("agent/afficher_suivi_heures", $data);
    }

    function choix_annee_avancement() {
        $data['annee'] = $this->scolarite_modele->recuperer_annee();
        $data['courante'] = $this->scolarite_modele->get_session_courante_calendar();
        // print_r($data);
        $this->load->view("agent/choisir_annee", $data);
    }

    function avancement_enseignement() {
        $annee = $_POST['annee'];
        $session = $_POST['session'];
        $data['LGTR'] = $this->scolarite_modele->avancement_enseignement($annee, $session, $idProgramme = "LGTR");
        $data['MAN'] = $this->scolarite_modele->avancement_enseignement($annee, $session, $idProgramme = "MAN");
        $data['MAEF'] = $this->scolarite_modele->avancement_enseignement($annee, $session, $idProgramme = "MAEF");
        $data['RXTEL'] = $this->scolarite_modele->avancement_enseignement($annee, $session, $idProgramme = "RXTEL");

        // print_r($data);
        $this->load->view("agent/avancement_enseignement", $data);
    }

    function modifier_session_courante_calendar() {
        $this->form_validation->set_rules('annee', 'Année', 'numeric|required');

        if ($this->form_validation->run()) {
            $validerAnnee = $this->valider_semestre_courant($_POST['annee'], $_POST['session'], $_POST['dateDebut'], $_POST['dateFin']);
            if ($validerAnnee == '') {
                $info_session = $this->input->post();
                $this->admin_modele->modifier_session_courante_calendar($info_session);
                $data['typeBox'] = 'valid_box';
                $data['sessionCourante'] = 'session Courante';
                $data['informations'] = 'Le semestre courant est maintenant <b>' . '  ' . $this->get_session_nom($_POST['session']) . '  ' . $_POST['annee'] . ' </b><br><br>
                    La date du début des cours est le  <b>' . $_POST['dateDebut'] . '</b> <br><br>
                        La date de fin des cours est le  <b>' . $_POST['dateFin'] . '</b><br>';
                $this->load->view('agent/valider_info_personnelles', $data);
            } else {
                $data['typeBox'] = 'error_box';
                $data['informations'] = $validerAnnee;
                $this->load->view('agent/modification_confirme', $data);
            }
        } else {
            $session_courante = $this->admin_modele->get_session_courante_calendar();
            if ($session_courante == NULL) {
                $session_courante['annee'] = 2011;
                $session_courante['semestre'] = '02';
                $session_courante['dateDebut'][0] = '';
                $session_courante['dateFin'][0] = '';
            }
            $this->load->view('agent/modifier_session_courante_calendar', $session_courante);
        }
    }

    function valider_semestre_courant($annee, $semestre, $dateDebut, $dateFin) {
        $jourDebut = substr($dateDebut, 0, 2);
        $jourFin = substr($dateFin, 0, 2);
        $moisDebut = substr($dateDebut, 3, 2);
        $moisFin = substr($dateFin, 3, 2);
        $anneeFin = substr($dateFin, 6, 4);
        $anneeDebut = substr($dateDebut, 6, 4);
        $validerDateDebut = $this->valider_mois_jours($moisDebut, $jourDebut, $anneeDebut);
        $validerDateFin = $this->valider_mois_jours($moisFin, $jourFin, $anneeFin);
        if ($validerDateDebut == '' && $validerDateFin == '') {
            $moisAccepteDebutA = array(9, 10, 11);
            $moisAccepteDebutE = array(6, 7);
            $moisAccepteDebutP = array(1, 2, 3);
            $moisAccepteFinA = array(1, 2, 3);
            $moisAccepteFinP = array(5, 6, 7);
            $moisAccepteFinE = array(9, 10, 11);
            if ($semestre == 3) {//automne
                if (($anneeDebut == $annee) && ($anneeFin == $annee + 1) && (in_array($moisDebut, $moisAccepteDebutA)) && (in_array($moisFin, $moisAccepteFinA))) {
                    return '';
                } else {
                    $messageRetour = 'Un semestre d\'automne ne peut
                        commencer qu\'en septembre, octobre ou novembre et se terminer
                        qu\'en janvier, février ou mars de l\'année suivante.';
                    return $messageRetour;
                }
            } elseif ($semestre == 2) {//ete
                if (($anneeDebut == $annee) && ($anneeFin == $annee) &&
                        (in_array($moisDebut, $moisAccepteDebutE)) && (in_array($moisFin, $moisAccepteFinE))) {
                    return '';
                } else {
                    $messageRetour = 'Un semestre d\'été ne peut
                        commencer qu\'en juin ou juillet et se terminer
                        en septembre, octobre ou novembre de la même année.';
                    return $messageRetour;
                }
            } else {//printemps
                if (($anneeDebut == $annee) && ($anneeFin == $annee) &&
                        in_array($moisDebut, $moisAccepteDebutP) && in_array($moisFin, $moisAccepteFinP)) {
                    return '';
                } else {
                    $messageRetour = 'Un semestre de printemps ne peut
                        commencer qu\'en janvier, février ou mars et se terminer
                        en mai, juin ou juillet de la même année.';
                    return $messageRetour;
                }
            }
        } else {
            return $messageRetour = $validerDateDebut . ' ' . $validerDateFin;
        }
    }

    function valider_mois_jours($mois, $jour, $annee) {
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

    function form_fiches_suivi() {
        $data['semestres'] = $this->scolarite_modele->get_semestres_courants_calendar();
        $data['programme'] = $this->scolarite_modele->get_programme();
        $this->load->view("agent/form_fiches_suivi", $data);
    }

    function afficher_fiches_suivi() {  //$date=$_POST['date'];
        // $heurD=$_POST['heureD'];
        //  $dt = $date . " " . $heurD.":00:00"; 
        //$start = date('Y-m-d H:i:s', strtotime($dt));
        // echo $start;
        $idProgramme = $_POST['idProgramme'];
        $semestre = $_POST['semestre'];

        $data['infos'] = $this->scolarite_modele->afficher_fiches_suivi($idProgramme, $semestre);
        $this->load->view("agent/fiches_suivi", $data);
    }
    
    
    function groupe(){//add by MedBakar 24-03-2020 
        $sessionCourante = $this->scolarite_modele->get_session_courante();
        $annee = $sessionCourante['annee'][0];
        $semestre = $sessionCourante['semestre'][0];
        echo(json_encode($this->scolarite_modele->get_groupe($annee, $semestre, $_GET['sigle'])));
    }
}
