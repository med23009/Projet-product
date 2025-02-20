<?php

class Secretaire_modele extends CI_Model
{
	// ajout des 3 fonctions suivantes RM 13 février 2013
	
	function lettreSemestre($num_groupe) {
	// le numéro de groupe peut être 1 ou 01, 2 ou 02, 3 ou 03.
	// $numGroupe = intval($num_groupe);
	switch (intval($num_groupe))
	{
		case 1:
			return ("-P"); // Printemps
			break;
		case 2:
			return ("-E");	// Été
			break;
		case 3:
			return ("-A");	// Automne
			break;
		default:
			return ("Erreur conversion numéro de semestre");
			break;
	}
	}
	
	function lettre_dans_Groupe($groupe) {
	// $groupe vaut ici, par exemple, CCOM273-201301-Groupe-Theorie1
	// remplace le numéro de groupe (01 dans l'exemple) par une lettre, ce qui va donner CCOM273-P-Groupe-Theorie1
	// fait appel à la fonction lettreSemestre
		$ps = strpos($groupe, "-Groupe"); // position de -Groupe (variable car le sigle est de longueur variable)
		$debut = substr($groupe,0,$ps-2);
		$milieu = $this->lettreSemestre(substr($groupe,$ps-1, $ps+1));	// remplace 02 par -E, par exemple
		$fin = substr($groupe,$ps, strlen($groupe));
		return($debut . $milieu. $fin);	// pour affichage du résultat
	}
	
	function corrigerNumGroupe ($groupe) {
	// remplace le numéro de semestre par  -lettre
	// retire les caractères -Groupe d'un numéro de groupe, pour affichage simplifié
	// exemple :  je passe de CCOM273-201301-Groupe-Theorie1 à CCOM273-2013-P-Theorie1
		if (strpos($groupe, "-Groupe") ==0)  
			return ("Erreur-Groupe");
		$texte = $this->lettre_dans_Groupe($groupe);
		$ps = strpos($texte, "-Groupe"); // position de -Groupe (variable car le sigle est de longueur variable)
		$debut = substr($texte,0,$ps);
		$fin = substr($texte,$ps+7, strlen($texte));
		return($debut . $fin);	// pour affichage du résultat
	}
	
	
	
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
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
    
    function get_old_password($login)
        {
            $this->db->where('login',$login);

            $query = $this->db->get('employe');
            if($query->num_rows()>0)
            {
                $row = $query->row_array();
                return $this->decode($row['pass']);             
            }
        }
                
    function get_idGroupe_anneeCourante($sigleCours, $semestre, $annee) 
    {
        $idgr = NULL;
        $query2 = $this->db->query("SELECT `idGroupe` FROM Groupe where `semestre` = '$semestre' AND `annee` = '$annee' AND `sigle` = '$sigleCours'");
        if ($query2->num_rows() > 0) {
            foreach ($query2->result_array() as $row) {
                $idgr['idGroupe'][] = $row['idGroupe'];
            }
        }
        return $idgr;
    }
        /*
     * fonction qui prends en parametre l'annee,le semestre et le idGroupe
     * afin de trouver tous les absents du groupe.
     */
    function get_info_absences($annee,$semestre,$idGroupe)
    {
        $infoAbsences = array();
        $this->db->where(array('annee' => $annee,'semestre' => $semestre,'idGroupe' => $idGroupe));
        $this->db->order_by("matricule");
        $this->db->order_by('date');
        $query = $this->db->get("absences");
        if ($query->num_rows() > 0) 
        {
            foreach ($query->result_array() as $row) 
            {
                $infoAbsences['matriculeEtudiant'][] = $row['matricule'];
                $infoAbsences['semestre'][] = $row['semestre'];
                $infoAbsences['annee'][] = $row['annee'];
                $infoAbsences['date'][] = $row['date'];
                $infoAbsences['periode'][] = $row['periode'];
                $infoAbsences['idGroupe'][] = $row['idGroupe'];
                $infoAbsences['duree'][] = $row['duree'];
                $infoAbsences['absenceMotivee'][] = $row['absenceMotivee'];
            }
        }
        return $infoAbsences;
        
    }
    function get_horaires_dispo($sigle) 
    {
        $horaires_dispo = array();
        $this->db->distinct();
        $this->db->order_by('annee DESC , semestre DESC');
        $this->db->where('sigle', $sigle);
        $this->db->select('annee , semestre');
        $this->db->from('groupe');
        $this->db->join('horaire', 'groupe.idGroupe = horaire.idGroupe');
        $res = $this->db->get();
        if ($res->num_rows() > 0) {
            foreach ($res->result_array() as $row) {
                switch ($row['semestre']) {
                    case '03':
                        $semestre = "Automne  : ";
                        break;
                    case '02':
                        $semestre = "Été : ";
                        break;
                    case '01':
                        $semestre = "Printemps: ";
                        break;
                }
                $horaires_dispo[] = array('key' => $semestre . $row['annee'], 'value' => $row['semestre'] . '-' . $row['annee']);
            }
        }
        return $horaires_dispo;
    }
        
    function recuperer_annee() {
         $annees = NULL;
        $this->db->select('annee');
        $this->db->distinct();
        $this->db->order_by('annee','desc');
        $query = $this->db->get('groupe');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $annees['date'][] = $row['annee'];
            }
        }
        return $annees;
    }

        
    function recuperer_cours() 
    {
        $sigleCours = NULL;
        //$query = $this->db->query("SELECT DISTINCT `sigle`, `titre` FROM module ORDER BY `sigle`");
		$query = $this->db->query("SELECT DISTINCT `sigle` FROM module ORDER BY `sigle`");
		if ($query->num_rows() > 0) 
        {
            foreach ($query->result_array() as $row) 
            {
			$sigleCours['sigle'][] = $row['sigle']; // . " - " . $row['titre'];
            }
		}
        
        return $sigleCours;
    }
        
    function recuperer_module($sigle) 
    {
        $info_module = NULL;
        $query = $this->db->query("SELECT * FROM module WHERE sigle='" . $sigle . "'");

        if ($query->num_rows() > 0) 
        {
            foreach ($query->result_array() as $row) 
            {
                $info_module = $row;
                $info_module['titre'] = $row['titre'];
                $info_module['nbCredits'] = $row['nbCredits'];
                
                $this->db->where('matriculeEmploye', $info_module['professeurResponsable']);
                $res = $this->db->get('employe');
                if($res->num_rows() >0)
                {
                     foreach ($res->result_array() as $row1) 
                     {
                        $info_module['nom'] = $row1['nom'];
                        $info_module['prenom'] = $row1['prenom'];
                     }
                }
               
                 $this->db->where('sigle', $sigle);
                 $res = $this->db->get('modprog');
                 if($res->num_rows() >0)
                {
                     foreach ($res->result_array() as $row) 
                     {
                          $info_module['programme'] = $row['idProgramme'];
                     }
                }
            }
        }
        return $info_module;
    }
    
        
        function recuperer_liste_etudiants($sigle, $annee, $semestre) {
        $matricules = '';

        $this->db->where(array('sigle' => $sigle, 'annee' => $annee, 'semestre' => $semestre));
        $this->db->select('matriculeEtudiant');
        $this->db->distinct();
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
        function recuperer_note_par_sigle($c, $etudiants, $annee, $semestre) 
        {
        $resultat = '';
        if (is_array($etudiants)) 
        {
            foreach ($etudiants as $matricule) 
            {
                $this->db->where(array('matriculeEtudiant' => $matricule, 'annee' => $annee, 'semestre' => $semestre, 'sigle' => $c));
                $this->db->distinct();
                $res = $this->db->get('planetudes');
                if ($res->num_rows() > 0) 
                {
                    foreach ($res->result_array() as $row) 
                    {
                        $resultat[$matricule] =  $row['note'];
                    }
                }
                else
                    $resultat[$matricule] =  'N/A';
            }
        }
        return $resultat;
    }
        function recuperer_liste_sigles($etudiant, $annee, $semestre) {
        $sigles = array();

        $this->db->where(array('matriculeEtudiant' => $etudiant, 'annee' => $annee, 'semestre' => $semestre));
        $this->db->select('sigle');
        $this->db->from('listeetudiants');
        $this->db->join('groupe', 'listeetudiants.idGroupe = groupe.idGroupe');

        $res = $this->db->get();
        if ($res->num_rows() > 0) 
        {
            foreach ($res->result_array() as $row) 
            {
                $sigles[] = $row['sigle'];
            }
        }
        return $sigles;
    }
    function recuperer_liste_cours($etudiants, $annee, $semestre) {
        $cours = array();
        if (is_array($etudiants)) {
            foreach ($etudiants as $etudiant) {
                $sigles = $this->recuperer_liste_sigles($etudiant, $annee, $semestre);

                if (is_array($sigles)) {
                    foreach ($sigles as $sigle)
                        if (!in_array($sigle, $cours))
                            $cours[] = $sigle;
                }
            }
        }
        return $cours;
    }
    function recuperer_note_par_classe($matriculeEtudiant, $annee, $semestre,$sigle) 
    {
        $data = '';
        for ($i = 0; $i < count($matriculeEtudiant) && $matriculeEtudiant != null; $i++) {
            $this->db->where(array('matriculeEtudiant' => $matriculeEtudiant[$i], 'sigle' => $sigle, 'annee' => $annee, 'semestre' => $semestre));
            $query = $this->db->get('planetudes');
            if ($query->num_rows() > 0) {
                $row = $query->row_array();
                $data[$i]['note'] = $row['note'];
                $data[$i]['cote'] = $row['cote'];
                $data[$i]['lien'] = $row['lien'];
            }
        }
        return $data;
    }
            
        function recuperer_note($matricule, $annee, $semestre) 
        {
        $resultat = '';
        $this->db->where(array('matriculeEtudiant' => $matricule, 'annee' => $annee, 'semestre' => $semestre));
        $this->db->distinct();
        $res = $this->db->get('planetudes');
        if ($res->num_rows() > 0) 
        {
            foreach ($res->result_array() as $row) 
            {
                 if($row['note']== '-1')
                {
                    $resultat[] = array('sigle' => $row['sigle'], 'note' => 'AV',
                    'cote' => $row['cote'], 'lien' => $row['lien']);
                }
                else
                {
                    $resultat[] = array('sigle' => $row['sigle'], 'note' => $row['note'],
                    'cote' => $row['cote'], 'lien' => $row['lien']);
                }
            }
        }
        return $resultat;
        }
		
        function get_id_departement($login)
        { 
            $this->db->where('login',$login);       
            $query = $this->db->get('Employe');
            if($query->num_rows()>0)
            {
                $row = $query->row_array();
                $data['idDepartement'] = $row['idDepartement'];
            }
            return $data;
        }

        function set_password($newPassword,$login)
        {
            $data = array(
               'pass' => $this->encode($newPassword)
            );
            $this->db->where('login', $login);

            $this->db->update('employe', $data); 
        }
 function get_informations($matricule) {
       $this->db->where('matriculeEtudiant', $matricule);
        $query = $this->db->get('etudiant');
        if ($query->num_rows() > 0) 
        {
            $row = $query->row_array();
            $data['matricule'] = $row['matriculeEtudiant'];
            $data['nom'] = $row['nom'];
            $data['prenom'] = $row['prenom'];
            $data['sexe'] = $row['sexe'];
            $data['nin'] = $row['NIN'];
            $data['dateNaissance'] = $row['dateNaissance'];
            $data['nationalite'] = $row['nationalite'];
            $data['username'] = $row['login'];
            $data['email'] = $row['email'];
            $data['telephone1'] = $row['telephone'];
            $data['telephone2'] = $row['telephone2'];
            $data['telephoneParents'] = $row['telParents'];
            $data['telephoneUrgence'] = $row['telUrgence'];
            $data['contactUrgence'] = $row['contactUrgence'];
            $data['lienParenteContactUrgence'] = $row['lienParenteUrgence'];
            $data['actif'] = $row['actif'];
            $data['raisonInactif'] = $row['raisonInactif'];
             $data['urlPhoto'] = 'IUP'.$row['photoEtudiant'];
            if (strpos($data['urlPhoto'], "jpg") > 0) $data['urlPhoto'] = str_replace('jpg', 'bmp', $data['urlPhoto']);
            $idinfoBac = $row['infoBac'];

            $adresseE = $row['idAdresse'];
            $adresse = $row['idAdresseParent'];

            $this->db->where('idAdresse', $adresseE);
            $query = $this->db->get('adresses');
            $row = $query->row_array();
            $data['ligne1'] = $row['ligne1'];
            $data['ligne2'] = $row['ligne2'];
            $data['ligne3'] = $row['ligne3'];
            $data['pays'] = $row['pays'];


            $this->db->where('idAdresse', $adresse);
            $query = $this->db->get('adresses');
            $row = $query->row_array();
            $data['ligne_1'] = $row['ligne1'];
            $data['ligne_2'] = $row['ligne2'];
            $data['ligne_3'] = $row['ligne3'];
            $data['paysP'] = $row['pays'];

            $this->db->where('idInfoBac', $idinfoBac);
            $query = $this->db->get('EtudesAnterieures');
            $row = $query->row_array();
            $data['moyenneBac'] = $row['moyenneBac'];
            $data['anneeObtention'] = $row['anneeObtention'];
            $data['infoBac'] = $row['infoBac'];
            $data['autreDiplome'] = $row['autreDiplome'];
            $data['commentaireAdmission'] = $row['commentaireAdmission'];

            $idEtab = $row['idEtablissement'];

            $this->db->where('idEtablissement', $idEtab);
            $query = $this->db->get('Etablissement');
            $row = $query->row_array();
            $data['nomEtablissement'] = $row['nom'];
            
            $this->db->where('matriculeEtudiant', $data['matricule']);
            $query = $this->db->get('dossieretudiant');
            if ($query->num_rows() > 0) 
            {
                $row = $query->row_array();
                $data['programme_etudiant']['idProgramme'] = $row['idProgramme'];
                $data['programme_etudiant']['nomProgramme'] = $this->get_programme_name($row['idProgramme']);
                $data['grade'] = $row['grade'];
            }
            return $data;
        }
    
    }
    
    function get_programme_name($idProg)
    {
        $query2 = $this->db->query("SELECT Distinct `nom` FROM `programme` where `idProgramme` = '$idProg'");
        if ($query2->num_rows() > 0) 
        {
            foreach ($query2->result_array() as $row) 
            {
               return $row['nom'];
            }
        }
       
    }
       function get_programme_etudiant($matricule) {
        $programme_etudiant = NULL;
        $query = $this->db->query("SELECT Distinct `idProgramme` FROM `DossierEtudiant` where `matriculeEtudiant` = '$matricule'");
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $idprog = $row['idProgramme'];
                $query2 = $this->db->query("SELECT Distinct `nom` FROM `programme` where `idProgramme` = '$idprog'");
                 if ($query2->num_rows() > 0) {
                      foreach ($query2->result_array() as $row) {
                    $programme_etudiant['idProgramme'][] = $row['nom'];
                 }
                 }
            }
          
        }
        return $programme_etudiant;
    }
     function get_periode_groupe($idGroupe) 
    {
        $periode = NULL;
        $query = $this->db->query("SELECT `idPeriode`,`idLocal`  FROM `horaire` WHERE `idGroupe` = '$idGroupe'");
        $query2 = $this->db->query("SELECT `sigle`,`typeGroupe`, `numGroupe`   FROM `groupe` WHERE `idGroupe` = '$idGroupe'");
        if ($query->num_rows() > 0) 
        {
            foreach ($query->result_array() as $row) 
            {
                $periode['idGroupe'][] = $idGroupe;
                $periode['idPeriode'][] = $row['idPeriode'];
                $periode['idLocal'][] = $row['idLocal'];

                if ($query->num_rows() > 0) 
                {
                    foreach ($query2->result_array() as $row) 
                    {
                        $periode['sigle'][] = $row['sigle'];
                        $periode['typeGroupe'][] = $row['typeGroupe'];
                        $periode['numGroupe'][] = $row['numGroupe'];
                    }
                }
            }
        }
        return $periode;
    }
    
        /*
     * fonction qui retourne la session courante.
     */
    function get_session_courante() 
    {
        $session_courante = NULL;
        $query = $this->db->query("SELECT DISTINCT `annee`, `semestre` FROM sessionCourante");
        if ($query->num_rows() > 0) 
        {
            foreach ($query->result_array() as $row) 
            {
                $session_courante['annee'] = $row['annee'];
                $session_courante['semestre'] = $row['semestre'];
            }
        }
        return $session_courante;
    }
    
    
    //fonction qui retourne tous les etudiants inscrits dans le groupe
    function get_Etudiants($idGroupe) 
    {
        $sql = "SELECT  DISTINCT etudiant.matriculeEtudiant,etudiant.nom,etudiant.prenom 
                FROM etudiant,listeetudiants 
                WHERE (etudiant.matriculeEtudiant=listeetudiants.matriculeEtudiant) AND (idGroupe='" . $idGroupe . "')";

        $query = $this->db->query($sql);


        if ($query->num_rows() > 0) 
        {
            foreach ($query->result_array() as $row) 
            {
                $data[] = $row;
            }
            return $data;
        }
    }
    
    /*
     * fonction pour enregistrer les absences des etudiants 
     * le post contiient tous les informations necessaire 
     * pour remplir la table des absences.
     */
    function enregistrer_absences($post)
    {
        $tableauMatricule = array_keys($post['items'], 'on');
        
        $date = $this->convert_date($post['date']);
        if(isset($post['duree']))
        {
            if(isset($post['duree2']))
            {
                $duree = $post['duree']+$post['duree2'];
            }
            else
            {
                 $duree = $post['duree'];
            }
        }
        if(isset($post['duree2']))
        {
            if(isset($post['duree']))
            {
                $duree = $post['duree']+$post['duree2'];
            }
            else
            {
                 $duree = $post['duree2'];
            }
        }
        
       
        if($tableauMatricule!= NULL)
        {
            for($i=0;$i<count($tableauMatricule);$i++)
            {
                  $info = array(
                    'matricule' => $tableauMatricule[$i],
                    'annee' => $post['annee'],
                    'semestre' => $post['session'],
                    'date' => $date,
                    'periode' => $post['periode'],
                    'duree' => $duree,
                    'absenceMotivee' => '0',
                      'idGroupe' => $post['idGroupe']
                );
                   $this->db->insert('absences', $info);
                        
            }
        }
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
     * fonction qui retourne la datu du debut et la fin des cours
     */
    function get_date_courante()
    {
        $date_courante = NULL;
        $query = $this->db->get('sessionCourante');
        if ($query->num_rows() > 0) 
        {
            $row = $query->row_array();
            $date_courante['debutCours'] = $row['debutCours'];
            $date_courante['finCours'] = $row['finCours'];
            $date_courante['semestre'] = $row['semestre'];
            $date_courante['annee'] = $row['annee'];
        }
        return $date_courante;
    }
    
    
}
