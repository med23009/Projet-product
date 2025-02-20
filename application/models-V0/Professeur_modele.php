<?php

class Professeur_modele extends CI_Model {

// RM 23 février 2013 : ajout des 3 fonctions ci-dessous our simplifier écriture des groupes.
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
     * fonction qui prends en parametre l'annee,le semestre et le idGroupe
     * afin de trouver tous les absents du groupe.
     */
    function get_info_absences($annee,$semestre,$idGroupe)
    {
        $infoAbsences = array();
        $this->db->where(array('annee' => $annee,'semestre' => $semestre,'idGroupe' => $idGroupe));
        $this->db->order_by('matricule');
        $this->db->order_by('date');
        $this->db->order_by('periode');
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
    /*
     * fonction qui retourne la datecourante,le semestre courant et l'annee courante.
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
            $date_courante['annee'] = $row['annee'];
            $date_courante['semestre'] = $row['semestre'];
        }
        return $date_courante;
    }
    /*
     * fonction qui retourne l'ancien mot de passe du professeur 
     * afin de le valider
     */
    function get_old_password($login) 
    {
        $this->db->where('login', $login);
        
        $query = $this->db->get('employe');
        if ($query->num_rows() > 0) 
        {
            $row = $query->row_array();
            return $this->decode($row['pass']);
        }
    }

    /*
     * fonction qui retourne le matricule d'un professeur d'apres son login
     */
    function get_matricule($login) 
    {
        $this->db->where('login', $login);
        $query = $this->db->get('employe');
        if ($query->num_rows() > 0) 
        {
            $row = $query->row_array();
            $data['matricule'] = $row['matriculeEmploye'];
        }
        return $data;
    }

    function get_idGroupe($matricule) 
    {
        $idGr = NULL;
        $mat = ($matricule['matricule']);
        $data_idGroupe = array();
        $query = $this->db->query("SELECT `idGroupe` FROM `Groupe` WHERE `matriculeEmploye` = '$mat'");
        if ($query->num_rows() > 0) 
        {
            foreach ($query->result_array() as $row) 
            {
                $data_idGroupe['idGroupe'][] = $row['idGroupe'];
            }
        }
          if ($data_idGroupe != NULL) {
            $idGr = $this->get_idGroupe_sessionCourante($data_idGroupe);
            return $idGr;
        }
        else
            return NULL;
       // return $data_idGroupe;
    }
    function get_idGroupe_sessionCourante($idGroupeEtudiant) {
        $idgr = array();
        $annee_Courante = NULL;
        $session_Courante = NULL;
        if ($idGroupeEtudiant != NULL) {
            $query_anne = $this->db->query("SELECT   `annee`, `semestre` FROM `SessionCourante`");
            if ($query_anne->num_rows() > 0) {
                foreach ($query_anne->result_array() as $row) {
                    $annee_Courante = $row['annee'];
                    $session_Courante = $row['semestre'];
                }
            }
            foreach ($idGroupeEtudiant['idGroupe'] as $groupe) {
                $query_idGroupe_anneeCourante = $this->db->query("SELECT `idGroupe` FROM Groupe where `semestre` = '$session_Courante' AND `annee` = '$annee_Courante'AND `idGroupe` ='$groupe' ");
                if ($query_idGroupe_anneeCourante->num_rows() > 0) {
                    foreach ($query_idGroupe_anneeCourante->result_array() as $row) {
                        $idgr['idGroupe'][] = $row['idGroupe'];
                    }
                } else {
                    $idgr['idGroupe'][] = NULL;
                }
            }
        }

        return $idgr;
    }

    function get_periode_groupe($idGroupe) 
    {
        $periode = array();
        $query = $this->db->query("SELECT `idPeriode`,`idLocal`  FROM `horaire` WHERE `idGroupe` = '$idGroupe'");
        $query2 = $this->db->query("SELECT `sigle`,`typeGroupe`, `numGroupe`   FROM `groupe` WHERE `idGroupe` = '$idGroupe'");
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $periode['idGroupe'][] = $idGroupe;
                $periode['idPeriode'][] = $row['idPeriode'];
                $periode['idLocal'][] = $row['idLocal'];

                if ($query->num_rows() > 0) {
                    foreach ($query2->result_array() as $row) {
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
     * Fonction qui récupère les informations du groupe
     * soit le sigle de module,numero de groupe et l'enseignant
     */
    
    function recuperer_info_groupe($idGroupe)
    {
        $info_module = NULL;
        $query = $this->db->query("SELECT * FROM groupe WHERE idGroupe='" . $idGroupe . "'");

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $info_module = $row;
                $info_module['sigle'] = $row['sigle'];
                $info_module['numGroupe'] = $row['numGroupe'];
                $info_module['annee'] = $row['annee'];
                $info_module['typeGroupe'] = $row['typeGroupe'];
                $this->db->where('matriculeEmploye', $row['matriculeEmploye']);
                $res = $this->db->get('employe');
                if($res->num_rows() >0)
                {
                     foreach ($res->result_array() as $row1) 
                     {
                        $info_module['nom'] = $row1['nom'];
                        $info_module['prenom'] = $row1['prenom'];
                     }
                }
                $this->db->where('sigle', $row['sigle']);
                $res = $this->db->get('module');
                if($res->num_rows() >0)
                {
                     foreach ($res->result_array() as $row1) 
                     {
                        $info_module['titre'] = $row1['titre'];
                        $info_module['nbCredits'] = $row1['nbCredits'];
                     }
                }
            }
        }
        return $info_module;
    }
    /*
     * fonction qui modifie le mot de pass
     */
    function set_password($newPassword, $login) 
    {
        $data = array(
            'pass' => $this->encode($newPassword)
        );
        $this->db->where('login', $login);

        $this->db->update('employe', $data);
    }

    //fonction qui retourne tous les etudiants inscrits dans le groupe
    function get_Etudiants($idGroupe) 
    {
        $sql = "SELECT  DISTINCT etudiant.matriculeEtudiant,etudiant.nom,etudiant.prenom 
                FROM etudiant,listeetudiants 
                WHERE (etudiant.matriculeEtudiant=listeetudiants.matriculeEtudiant) AND (idGroupe='" . $idGroupe . "')";

        $query = $this->db->query($sql);

        $data= array();
        if ($query->num_rows() > 0) 
        {
            foreach ($query->result_array() as $row) 
            {
                $data[] = $row;
            }
           
        }
         return $data;
    }
    
    // Alfa 14-02-2016
    function note_evaluation($matricule, $idEvaluation, $annee, $semestre, $sigle)
    {
 $sql="select note from notespartielles where annee=".$annee." and semestre=".$semestre. " and idEvaluation=".$idEvaluation. " and matriculeEtudiant=".$matricule ." and sigle='".$sigle."'";
 $note='';   
 $res=$this->db->query($sql);
 if ($res->num_rows() > 0)
 {
     $row=$res->row_array();
     $note=$row['note'];
 }
         
 return $note;
    }

    function recuperer_liste_etudiants($annee, $semestre, $sigle) 
    {
        $matricules = array();
        $this->db->where(array('sigle' => $sigle, 'annee' => $annee, 'semestre' => $semestre,
            'lien !=' => 'AB', 'cote !=' => 'EQ' ));
        $res = $this->db->get('planetudes');
        if ($res->num_rows() > 0) 
        {
            foreach ($res->result_array() as $row) 
            {
                $matricules[] = $row['matriculeEtudiant'];
                
            }
            
        }
       // print_r($matricules);
        return $matricules;
    }

    function recuperer_liste_etudiants_rt($annee, $semestre, $sigle) 
    {
        $matricules = array();
        $this->db->where(array('sigle' => $sigle, 'annee' => $annee, 'semestre' => $semestre,
            'lien !=' => 'AB', 'cote !=' => 'EQ' ));
        $res = $this->db->get('planetudes');

        if ($res->num_rows() > 0) 
        {
            foreach ($res->result_array() as $row) 
            {
                $noteCC=$this->note_evaluation($row['matriculeEtudiant'], 1, $annee, $semestre, $sigle);
                $noteExam=$this->note_evaluation($row['matriculeEtudiant'], 2, $annee, $semestre, $sigle);
               // echo $noteCC.' '.$noteExam.'<br>';
                $mg=0;
                if(is_numeric($noteCC) && is_numeric($noteExam)){
                $mg=0.4*$noteCC+0.6*$noteExam;
                }
                if($mg<10)
                $matricules[] = $row['matriculeEtudiant'];
                
            }
        }
        //print_r('Nombre='.count($matricules));
        return $matricules;
    }
    
    function recuperer_liste_etudiants_crypte($annee, $semestre, $sigle) 
    {
        $matricules = '';
        $this->db->where(array('sigle' => $sigle, 'annee' => $annee, 'semestre' => $semestre,
            'lien !=' => 'AB', 'cote !=' => 'EQ' ));
        $res = $this->db->get('planetudes');
        if ($res->num_rows() > 0) 
        {
            foreach ($res->result_array() as $row) 
            {
                $matricules[] = $this->encode($row['matriculeEtudiant']);
            }
        }
        return $matricules;
    }
    
    function get_name_code_etudiants($matricule) 
    {
        $courant=$this->get_session_courante();
             $semestre=$courant['semestre'][0];
             $annee=$courant['annee'][0];
             
        for ($i = 0; $i < sizeof($matricule); $i++) 
        {
            $sql="select nom, prenom, code_ex, code_rt,matriculeEtudiant from anonymat natural join etudiant where annee=".$annee. " and semestre=".$semestre. " and anonymat.matriculeEtudiant=".$matricule[$i];
           // $this->db->where('matriculeEtudiant', $matricule[$i]);
            //$query = $this->db->get('etudiant');
            //echo  $sql;
            $query=$this->db->query($sql);
            if ($query->num_rows() > 0) 
            {
                $row = $query->row_array();
                $data[$i]['nom'] = $row['nom'];
                $data[$i]['prenom'] = $row['prenom'];
                $data[$i]['code_ex'] = $row['code_ex'];
                $data[$i]['code_rt'] = $row['code_rt'];
                 $data[$i]['matriculeEtudiant'] = $row['matriculeEtudiant'];
                
            }
        }
        return $data;
    }
    
    function get_name_etudiants($matricule) 
    {
        

        for ($i = 0; $i < sizeof($matricule); $i++) 
        {
            $this->db->where('matriculeEtudiant', $matricule[$i]);
            $query = $this->db->get('etudiant');
             if ($query->num_rows() > 0) 
            {
                $row = $query->row_array();
                $data[$i]['nom'] = $row['nom'];
                $data[$i]['prenom'] = $row['prenom'];
                
                
            }
        }
        return $data;
    }

    function get_note_etudiants($matricule,$sigle,$annee,$session)
    {
         for ($i = 0; $i < sizeof($matricule); $i++) 
        {
            $this->db->where(array('matriculeEtudiant'=> $matricule[$i], 'annee' =>$annee, 'semestre' => $session,
                'sigle' => $sigle
                ));
            $query = $this->db->get('planetudes');
            if ($query->num_rows() > 0) 
            {
               
            
            
                $row = $query->row_array();
               
                $data[$i]['note'] = $row['note'];
          
            }
            else
            {
                $data[$i]['note'] = '';
            }
        }
        return $data;
    }
    
    // Alfa 19-7-2015
    function get_notes_partielles($matricule,$sigle,$annee,$session, $idEvaluation='')
    {
 $data=array();
         for ($i = 0; $i < sizeof($matricule); $i++) 
        {
            if($idEvaluation=='')
            {$this->db->where(array('matriculeEtudiant'=> $matricule[$i], 'annee' =>$annee, 'semestre' => $session,
                'sigle' => $sigle
                ));
            }
            else
            {
                $this->db->where(array('matriculeEtudiant'=> $matricule[$i], 'annee' =>$annee, 'semestre' => $session,
                'sigle' => $sigle, 'idEvaluation'=>$idEvaluation
                ));
            }
             
             $this->db->order_by('idEvaluation','asc');
            $query = $this->db->get('notespartielles');
            
            
            if ($query->num_rows() > 0) 
            {
                $rows = $query->result_array();
                $data[$i]['note'] = $rows;
               
            }
            else
            {
                $data[$i]['note'] = '';
            }
        }
        return $data;
    }
    
    function get_type_cc($sigle)
    {
        $courant=$this->get_session_courante();
             $semestre=$courant['semestre'][0];
             $annee=$courant['annee'][0];
      $q1=" SELECT detail FROM `moduleevaluation` WHERE  `sigle`='".$sigle."' and semestre=".$semestre." and annee=".$annee. " and `idEvaluation`=1 ";
        $query1 = $this->db->query($q1);
        $res=$query1->row_array();
        return $res['detail'];
        
    }
    
    function get_noms_evaluations($sigle)
    {
        $courant=$this->get_session_courante();
             $semestre=$courant['semestre'][0];
             $annee=$courant['annee'][0];
      $q1="SELECT nomEvaluation, ponderation, evaluation.idEvaluation, detail FROM  `moduleevaluation` NATURAL JOIN evaluation WHERE  `sigle`='".$sigle."' and semestre=".$semestre." and annee=".$annee." order by evaluation.idEvaluation asc";
        $query1 = $this->db->query($q1);
        $nomsEvalPond=$query1->result_array();
        // $res[0]=array('idEvaluation'=>1, 'nomEvaluation'=>'CC', 'ponderation'=>100, 'detail'=>'CC');
        
        return $nomsEvalPond;
        
    }
    function commencerRattrapage($sigle)
    {
        $courant=$this->get_session_courante();
             $semestre=$courant['semestre'][0];
             $annee=$courant['annee'][0];
 $q1=" SELECT count(*) as nbNoteExam FROM `notespartielles` WHERE  `sigle`='".$sigle."' and semestre=".$semestre." and annee=".$annee. " and `idEvaluation`=2 ". " and note<>0";
        $query1 = $this->db->query($q1);
        $res=$query1->row_array();
        return $res['nbNoteExam'];
        
    }
    
    // Alfa
    function enregistrer_notes_partielles($data,$index,$note) 
    {
      
        $sigle=$data['sigle'];
        $annee=$data['annee'];
        $semestre=$data['session'];
       // print_r($data);
     if(isset($data['detail']))
     {  
        $detail=$data['detail'];
        $sql="update moduleevaluation set detail='".$detail."' where sigle='".$sigle."' and $annee=".$annee." and $semestre=".$semestre." and idEvaluation=1";
        $this->db->query($sql);
     }  
        //echo "***". $data['matricule'][$index]." **".'<br>'
        if(isset($data['evaluationsID'])){
        $evaluationsID=(array)$data['evaluationsID'];}
        //print_r($evaluationsID);
        for($j=0; $j<sizeof($evaluationsID); $j++)
        {
         
        $this->db->where(array('matriculeEtudiant'=> $data['matricule'][$index], 'annee' =>$data['annee'], 'semestre' => $data['session'],
            'sigle' => $data['sigle'],'idEvaluation'=>$evaluationsID[$j]
            ));
        $query = $this->db->get('notespartielles');
        //Alfa Hafedh 02-03-2016 : inserer uniquement données datatable visibie
        if(isset($data['note'.$index.'-'.$j]))
        {
        $z=$data['note'.$index.'-'.$j];
        if ($query->num_rows() > 0) 
        { 
            $row = $query->row_array();
            $this->db->where(array('matriculeEtudiant'=> $data['matricule'][$index], 'annee' =>$data['annee'], 'semestre' => $data['session'],
                    'sigle' => $data['sigle'],'idEvaluation'=>$evaluationsID[$j] ));
            
            
                    $this->db->update('notespartielles',array('note' => $z));
             
                
            
        }
 else {
    $info=array('matriculeEtudiant'=> $data['matricule'][$index], 'annee' =>$data['annee'], 'semestre' => $data['session'],
            'sigle' => $data['sigle'],'idEvaluation'=>$evaluationsID[$j],'note' => $z);
    
    $this->db->insert('notespartielles',$info);
 }
        }
        }
    }
    function enregistrer_note($data,$index,$note) 
    {
     //  $note en paramètre n'est plus utile (à enlever!!)
        // requette pour modifier la note finale conformement aux changement de coef
        $q="select  sum(note*ponderation/5) as mg from notespartielles N, moduleevaluation M where N.sigle=M.sigle and N.idEvaluation=".
                "M.idEvaluation and M.semestre=N.semestre and  M.annee=N.annee and M.semestre=".$data['session']." and M.annee=".$data['annee'] .
                " and N.sigle='".$data['sigle']."' and matriculeEtudiant=".$data['matricule'][$index];
        $q = $this->db->query($q);
        $r = $q->row_array();
        $note=$r['mg'];
        
        $this->db->where(array('matriculeEtudiant'=> $data['matricule'][$index], 'annee' =>$data['annee'], 'semestre' => $data['session'],
            'sigle' => $data['sigle']
            ));
        $query = $this->db->get('planetudes');

        if ($query->num_rows() > 0) 
        { 
            $row = $query->row_array();

            if( $note!=NULL)
            {
                if($row['lien'] == 'AV')
                {
                    
                $info = array(
                    'note' => $note,
                    'lien' => 'OB'
                );
                    $this->db->where(array('matriculeEtudiant'=> $data['matricule'][$index], 'annee' =>$data['annee'], 'semestre' => $data['session'],
                    'sigle' => $data['sigle'] ));
                    $this->db->update('planetudes', $info);
                }
                elseif($row['lien'] == 'HV')
                {
                    $info = array(
                    'note' => $note,
                    'lien' => 'HP'
                );
                        $this->db->where(array('matriculeEtudiant'=> $data['matricule'][$index], 'annee' =>$data['annee'], 'semestre' => $data['session'],
                        'sigle' => $data['sigle'] ));
                $this->db->update('planetudes', $info);
                }
                else
                {
                    $info = array(
                    'note' => $note
                );
                        $this->db->where(array('matriculeEtudiant'=> $data['matricule'][$index], 'annee' =>$data['annee'], 'semestre' => $data['session'],
                        'sigle' => $data['sigle'] ));
                $this->db->update('planetudes', $info);
                }

            }   

        }
    }
    function verifier_presence_note($matricule,$sigle,$annee, $semestre)
    {
        $valide = 'false';
        for ($i = 0; $i < sizeof($matricule); $i++) 
        {
            
            $this->db->where(array('matriculeEtudiant' => $matricule[$i],
                'sigle'=>$sigle,'annee'=>$annee,'semestre' => $semestre));
            $query = $this->db->get('planetudes');
            if ($query->num_rows() > 0) 
            {
                $row = $query->row_array();
                if($row['note']!='-1')
                    $valide = 'true';
            }
            
        }
        return $valide;
    }
    /*
     * fonction pour verifier si les notes sont disponible a etre rentrer par le professeur
     */
    function verifier_acces_note($matricule,$annee,$semestre ,$sigle)
    {
        $valide = 'false';
        for ($i = 0; $i < count($matricule); $i++) 
        {
            
            $this->db->where(array('matriculeEtudiant' => $matricule[$i],
                'etatNote' => 'professeur','sigle'=>$sigle,'annee'=>$annee,
                'semestre' => $semestre));
            $query = $this->db->get('planetudes');
            if ($query->num_rows() > 0) 
            {
                $valide = 'true';
            }
        }
        return $valide;
    }
        /*
     * fonction pour verifier si les notes sont disponible a etre rentrer par le professeur
     */
    function verifier_acces_note_valide($matricule,$annee,$semestre ,$sigle)
    {
        $valide = 'false';
        $notePasEncoreEntree = -1;
        for ($i = 0; $i < count($matricule); $i++) 
        {
            
            $this->db->where(array('matriculeEtudiant' => $matricule[$i],
                'etatNote' => 'professeur','sigle'=>$sigle,'annee'=>$annee,
                'semestre' => $semestre,'note !=' =>$notePasEncoreEntree));
            
            $query = $this->db->get('planetudes');
            if ($query->num_rows() > 0) 
            {
                $valide = 'true';
            }
        }
        return $valide;
    }
/*
 * fonction pour validre les notes du professeur.
 * si tout les notes sont saisies par le professeur ou s'ils sont validees ou non.
 */
/*    function valider_note($matricule,$annee,$session ,$sigle, $notesApresRT) 
    {
       $acces = $this->verifier_acces_note($matricule,$annee,$session ,$sigle);
       if($acces == 'true')
       {
            $info = array(
                'etatNote' => 'chef_departement'
            );
            $valide = 'true';
            for ($i = 0; $i < sizeof($matricule); $i++) 
            {
                $this->db->where(array('matriculeEtudiant' => $matricule[$i],'sigle' => $sigle,'annee'=> $annee,'semestre' => $session,'note' => '-1'));
                $query = $this->db->get('planetudes');
                if ($query->num_rows() > 0) 
                {
                    $valide = 'false';
                }

            }
            
            if($valide == 'false')
            {
                return "false";
            }
            else
            {
                $noteRentree = 'true';
                for ($i = 0; $i < sizeof($matricule); $i++) 
                {
                   
                    $this->db->where(array('matriculeEtudiant' => $matricule[$i],'sigle'=>$sigle,'annee'=>$annee,'semestre' => $session));
                     $query = $this->db->get('planetudes');
                    if ($query->num_rows() == 0) 
                    {
                        $noteRentree = 'false';
                    }
                }
                if($noteRentree == 'true')
                {
                    for ($i = 0; $i < sizeof($matricule); $i++) 
                    {
                        $this->db->where(array('matriculeEtudiant' => $matricule[$i],'sigle'=>$sigle,'annee'=>$annee,'semestre' => $session));
                        $query = $this->db->get('planetudes');
                        $row = $query->row_array();
                    //    echo $notesApresRT[$i].' ';
                        if($row['note']>=$notesApresRT[$i])
                        {
                        
                            $this->db->update('planetudes', $info);
                        
                        
                        }
                        else
                        {
             
                     if($row['lien']=='OB' & $notesApresRT[$i] >=10)
                     {
                         
     $sql="update planetudes set lien='RT', note=".$notesApresRT[$i]." where matriculeEtudiant='".$matricule[$i]."' and sigle='".$sigle."'". " and annee=".$annee. " and semestre=".$session;                    
    
     $query = $this->db->query($sql);
     
                     }    
                     else
                     {
                $sql="update planetudes set  note=".$notesApresRT[$i]." where matriculeEtudiant='".$matricule[$i]."' and sigle='".$sigle."'". " and annee=".$annee. " and semestre=".$session;                    
    
                $query = $this->db->query($sql);         
                         
                     } 
                     }
                    }
                 return 'true';
                }
                else
                {
                    return 'false';
                }   
            }  
        }    
    }
*/
    
    function valider_note($matricule,$annee,$session ,$sigle, $notesApresRT) 
    {
       $acces = $this->verifier_acces_note($matricule,$annee,$session ,$sigle);
      
       if($acces == 'true')
       {
            $info = array(
                'etatNote' => 'chef_departement'
            );
            $valide = 'true';
            /*for ($i = 0; $i < sizeof($matricule); $i++) 
            {
                $this->db->where(array('matriculeEtudiant' => $matricule[$i],'sigle' => $sigle,'annee'=> $annee,'semestre' => $session,'note' => '-1'));
                $query = $this->db->get('planetudes');
                if ($query->num_rows() > 0) 
                {
                    $valide = 'false';
                }

            }*/
            $sql="update notespartielles set note=0 where annee=".$annee. " and semestre=".$session. " and sigle='".$sigle."' and idEvaluation<>4 and note=-1";
            $query=$this->db->query($sql);
            //$res=$query->row_array();
            //$nb=$res['nb'];
            $valide='true';
            //if($nb<>0)
              //  $valide='false';
            
            if($valide == 'false')
            {
                return "false";
            }
            else
            {
                $noteRentree = 'true';
                for ($i = 0; $i < sizeof($matricule); $i++) 
                {
                   
                    $this->db->where(array('matriculeEtudiant' => $matricule[$i],'sigle'=>$sigle,'annee'=>$annee,'semestre' => $session));
                     $query = $this->db->get('planetudes');
                    if ($query->num_rows() == 0) 
                    {
                        $noteRentree = 'false';
                    }
                }
                if($noteRentree == 'true')
                {
                    for ($i = 0; $i < sizeof($matricule); $i++) 
                    {
                        $this->db->where(array('matriculeEtudiant' => $matricule[$i],'sigle'=>$sigle,'annee'=>$annee,'semestre' => $session));
                        $query = $this->db->get('planetudes');
                        $row = $query->row_array();
                    //    echo $notesApresRT[$i].' ';
                        if($row['note']>=$notesApresRT[$i])
                        {
                        $this->db->where(array('matriculeEtudiant' => $matricule[$i],'sigle'=>$sigle,'annee'=>$annee,'semestre' => $session));
                            $this->db->update('planetudes', $info);
                        
                        
                        }
                        else
                        {
             
                     if($row['lien']=='OB' & $notesApresRT[$i] )
                     {
                         
     $sql="update planetudes set lien='RT', etatNote='chef_departement', note=".$notesApresRT[$i]." where matriculeEtudiant='".$matricule[$i]."' and sigle='".$sigle."'". " and annee=".$annee. " and semestre=".$session;                    
    
     $query = $this->db->query($sql);
     
                     }    
                     else
                     {
                $sql="update planetudes set  etatNote='chef_departement', note=".$notesApresRT[$i]." where matriculeEtudiant='".$matricule[$i]."' and sigle='".$sigle."'". " and annee=".$annee. " and semestre=".$session;                    
    
                $query = $this->db->query($sql);         
                         
                     } 
                     }
                    }
                 return 'true';
                }
                else
                {
                    return 'false';
                }   
            }  
        }    
    }

    
    function get_gours_a_note($annee, $session, $matriculeProfesseur) {

        $sql = "SELECT DISTINCT groupe.sigle FROM groupe JOIN module ON groupe.sigle = module.sigle
                WHERE annee = " . $annee . " AND semestre = " . $session . " AND professeurResponsable = '" . $matriculeProfesseur . "'";

        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row['sigle'];
            }


            return $data;
        }
    }

    function get_cours($prof) {
        $sql = "  SELECT DISTINCT groupe.sigle, groupe.semestre, module.typeModule, module.titre, module.idDepartement
                    FROM groupe, module, sessioncourante
                WHERE (groupe.sigle=module.sigle) AND (matriculeEmploye='" . $prof . "') AND (groupe.semestre = sessioncourante.semestre) AND (groupe.annee = sessioncourante.annee)";

        $query = $this->db->query($sql);


        if ($query->num_rows() > 0) {

            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }


            return $data;
        }
    }

    function recuperer_annee() 
    {
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

    function get_student($matriculeEtudiant) {
        $this->db->where('matriculeEtudiant', $matriculeEtudiant);
        $query = $this->db->get('etudiant');

        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            $data['matriculeEtudiant'] = $row['matriculeEtudiant'];
            $data['nom'] = $row['nom'];
            $data['prenom'] = $row['prenom'];
            return $data;
        }
    }

    function get_liste_etudiants($idGroupe) 
    {
        $this->db->where('idGroupe', $idGroupe);
        $i = 0;
        $query = $this->db->get('listeetudiants');
        foreach ($query->result() as $row) {
            $data[$i] = $this->get_student($row->matriculeEtudiant);
            $i++;
        }
        return $data;
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
                $session_courante['annee'][] = $row['annee'];
                $session_courante['semestre'][] = $row['semestre'];
            }
        }
        return $session_courante;
    }
    
    // Alfa Hafedh : 01/03/2016
    
    
    function get_semestres_courants() 
    {    
        $semestres = NULL;
        $query = $this->db->query("SELECT DISTINCT `annee`, `semestre`, `annee_univ`,`semestre_reel` FROM sessionCourante");
        if ($query->num_rows() > 0) 
        {
            foreach ($query->result_array() as $row) 
            {
                
                if($row['semestre_reel']%2 == 0) { // les semestres paiires
                    $semestres[0]= 2;
                    $semestres[1]= 4;
                    $semestres[2]= 6;
                    
                }else{ // les semestre impaires
                    $semestres[0]= 1;
                    $semestres[1]= 3;
                    $semestres[2]= 5;
                    
                }
            }
        }
        return $semestres;
    }

    
    
function get_programme() 
    {
        $programme = NULL;
        $query = $this->db->query("SELECT Distinct `idProgramme`, `nom` FROM `programme` ORDER BY `nom`");
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $programme['idProgramme'][] = $row['idProgramme'];
                $programme['nomProgramme'][] = $row['nom'];
            }
        }
        return $programme;
    }
    

    /*
     * Fonction qui retourne tous les grades qui existent.
     */
    function get_grade() {
        $grade = NULL;
        $query = $this->db->query("SELECT Distinct `idGrade` FROM `grade` order by `idGrade` ");
        if ($query->num_rows() > 0) 
        {
            foreach ($query->result_array() as $row) 
            {
                $grade['idGrade'][] = $row['idGrade'];
            }
        }
        return $grade;
    }

    function get_nom_programme($idProgramme) 
    {
        $programme = NULL;
        $query = $this->db->query("SELECT `nom` FROM `programme` where idProgramme='".$idProgramme."'");
        if ($query->num_rows() > 0) {
            $row=$query->row_array();
         $programme=$row['nom'];   
        }
        return $programme;
    }
    
     function get_nom_programme_module($sigleModule) 
    {
        $nomProgramme = NULL;
        $query = $this->db->query("SELECT `idDepartement` FROM `module` where sigle='".$sigleModule."'");
        if ($query->num_rows() > 0) {
            $row=$query->row_array();
         $idDepartement=$row['idDepartement'];   
         $nomProgramme=$this->get_nom_programme($idDepartement); 
        }
        return $nomProgramme;
    }
    
    
      //add by meden
    function recuperer_liste_etudiants_matricule($annee,$sigle,$semestre){
      $matricules=array();
      $res=$this->db->query("SELECT distinct matriculeEtudiant  FROM `planetudes` 
      where annee=$annee and semestre=$semestre and sigle='$sigle'");
        if ($res->num_rows() > 0) 
        {
            foreach ($res->result_array() as $row) 
            {
                $matricules[] = $row['matriculeEtudiant'];
                
            }
        }
       /* echo $semestre;
       echo count($matricules)."<br>";
        print_r($matricules);*/
        return $matricules;


   }
     function recuperer_liste_etudiants_anonymat($annee,$sigle,$semestre){
      $matricules=array();
      $res=$this->db->query("SELECT distinct code_ex FROM `anonymat` a join notespartielles n using(matriculeEtudiant) 
      where n.annee=$annee and n.semestre=$semestre and n.sigle='$sigle'");
        if ($res->num_rows() > 0) 
        {
            foreach ($res->result_array() as $row) 
            {
                $matricules[] = $row['code_ex'];
                
            }
        }
       /* echo $semestre;
       echo count($matricules)."<br>";
        print_r($matricules);*/
        return $matricules;


   }
   
   /* function import_notes_to_table_ratt($dataTable,$annee,$semestre,$sigle,$idEvaluation){
    
      $list='';
         for($j=0;$j<count($dataTable);$j++){
            $list.=$dataTable[$j]->matriculeEtudiant;
            $list.=',';
        }
        $list=substr($list, 0,-1);
        
        $requete1="delete from notespartielles where matriculeEtudiant in ($list) and annee=$annee and semestre=$semestre and sigle='$sigle' and idEvaluation=$idEvaluation";
       $this->db->query($requete1); 
       
           $data=array();
     $noteEx=$this->db->query("SELECT matriculeEtudiant,note FROM `notespartielles` where idEvaluation=2 and annee=$annee and semestre=1 and sigle='$sigle' and matriculeEtudiant in ($list)");
                if ($noteEx->num_rows() > 0) 
        {
            foreach ($noteEx->result_array() as $row) 
            {
                $data[]=$row['matriculeEtudiant'];
                $data[]=$row['note'];
            }
        }
        $nouvList='';
        for($i=0;$i<count($dataTable);$i++){
            for($j=0;$j<count($data);$j++){
                if($dataTable[$i]->matriculeEtudiant==$data[$j] && $dataTable[$i]->note>$data[$j+1]){
                    $nouvList[$i]->matriculeEtudiant=$data[$j];
                     $nouvList[$i]->note=$data[$j+1];
                }
            }
            
        }
        
                                        $requete="insert into `notespartielles` (`matriculeEtudiant`, `sigle`, `idEvaluation`, `note`, `semestre`, `annee`) VALUES  ";
                                        
                                       
                                        for($i=0;$i<count($dataTable);$i++){
                                            $requete.="(";
                                          
                                        $matriculeEtudiant=$nouvLst[$i]->matriculeEtudiant;
                                        $requete.="'$matriculeEtudiant','$sigle',$idEvaluation,";

                                        $note=$nouvLst[$i]->note;
                                        $requete.="'$note','$semestre','$annee'),";

                               
                                    }
                                        $requete=substr($requete, 0,strlen($requete)-1);

                            $res=$this->db->query($requete); 
                  
                            return $res;
                        
                    }
                    
                    */
    function import_notes_to_table_ratt($dataTable,$annee,$semestre,$sigle,$idEvaluation){
    
      $list='';
         for($j=0;$j<count($dataTable);$j++){
            $list.=$dataTable[$j]->matriculeEtudiant;
            $list.=',';
        }
        $list=substr($list, 0,-1);
        
        $requete1="delete from notespartielles where matriculeEtudiant in ($list) and annee=$annee and semestre=$semestre and sigle='$sigle' and idEvaluation=$idEvaluation";
       $this->db->query($requete1); 
       /*
           $data=array();
     $noteEx=$this->db->query("SELECT matriculeEtudiant,note FROM `notespartielles` where idEvaluation=2 and annee=$annee and semestre=1 and sigle='$sigle' and matriculeEtudiant in ($list)");
                if ($noteEx->num_rows() > 0) 
        {
            foreach ($noteEx->result_array() as $row) 
            {
                $data[]=$row['matriculeEtudiant'];
                $data[]=$row['note'];
            }
        }
        $nouvList=array();
        for($i=0;$i<count($dataTable);$i++){
            for($j=0;$j<count($data);$j=$j+2){
                if($dataTable[$i]->matriculeEtudiant==$data[$j] and $dataTable[$i]->note>$data[$j+1]){
                    $nouvList[$i]['matriculeEtudiant']=$dataTable[$i]->matriculeEtudiant;
                     $nouvList[$i]['note']=$dataTable[$i]->note;
                }
            }
            
        }*/
        
                                        $requete="insert into `notespartielles` (`matriculeEtudiant`, `sigle`, `idEvaluation`, `note`, `semestre`, `annee`) VALUES  ";
                                        
                                        for($i=0;$i<count($dataTable);$i++){
                                            $requete.="(";
                                          
                                        $matriculeEtudiant=$dataTable[$i]->matriculeEtudiant;//$nouvList[$i]['matriculeEtudiant'];
                                        $requete.="'$matriculeEtudiant','$sigle',$idEvaluation,";

                                        $note=$dataTable[$i]->note;//$nouvList[$i]['note'];
                                        $requete.="'$note','$semestre','$annee'),";

                               
                                    }
                                        $requete=substr($requete, 0,strlen($requete)-1);

                            $res=$this->db->query($requete); 
                  
                            return $res;
                        
                    }
               
                     function import_notes_to_table($dataTable,$annee,$semestre,$sigle,$idEvaluation){
    
      $list='';
         for($j=0;$j<count($dataTable);$j++){
            $list.=$dataTable[$j]->matriculeEtudiant;
            $list.=',';
        }
        $list=substr($list, 0,-1);
        
        $requete1="delete from notespartielles where matriculeEtudiant in ($list) and annee=$annee and semestre=$semestre and sigle='$sigle' and idEvaluation=$idEvaluation";
       $this->db->query($requete1); 
       
           
       
       
        
                                        $requete="insert into `notespartielles` (`matriculeEtudiant`, `sigle`, `idEvaluation`, `note`, `semestre`, `annee`) VALUES  ";
                                        
                                       
                                        for($i=0;$i<count($dataTable);$i++){
                                            $requete.="(";
                                          
                                        $matriculeEtudiant=$dataTable[$i]->matriculeEtudiant;
                                        $requete.="'$matriculeEtudiant','$sigle',$idEvaluation,";

                                        $note=$dataTable[$i]->noteCC;
                                        $requete.="'$note','$semestre','$annee'),";

                               
                                    }
                                        $requete=substr($requete, 0,strlen($requete)-1);

                            $res=$this->db->query($requete); 
                  
                            return $res;
                        
                    }
                    
                    
                    
                    
                    
                    
                    
                    
                     function anonymat_to_matricule($code){
      
      $res=$this->db->query("SELECT matriculeEtudiant FROM `anonymat` where code_ex='$code'");
        if ($res->num_rows() >0) 
        {
            foreach ($res->result_array() as $row) 
            {
                $matricule[] = $row['matriculeEtudiant'];
                
            }
        }
       
        return $matricule[0];


   }
   
   
   
   
   
   
   
    function get_info_etudiant_rattrapage($annee, $session, $sigle) {
        //$data = array();
        
$matricule='';
        $this->db->where(array('sigle' => $sigle, 'annee' => $annee, 'semestre' => $session, 'lien' => 'RT'));
        $res = $this->db->get('planetudes');
        if ($res->num_rows() > 0) {
            foreach ($res->result_array() as $row) {
                $matricule[] = $row['matriculeEtudiant'];
               
            }
        }

        return $matricule;
    }
    function recuperer_liste_etudiants_anonymat_rt($matricules){
        $list='';
         for($j=0;$j<count($matricules);$j++){
            $list.=$matricules[$j];
            $list.=',';
        }
        $list=substr($list, 0,-1);
      $res=$this->db->query("SELECT code_ex FROM `anonymat` where matriculeEtudiant in ($list)");
        if ($res->num_rows() > 0) 
        {
            foreach ($res->result_array() as $row) 
            {
                $matricules[] = $row['code_ex'];
                
            }
        }
       
        return $matricules;
       
   }
   
    // Alfa 19-7-2015
    function get_notes_partielles_cc_exam($matricule,$sigle,$annee,$session, $idEvaluation='')
    {
 $data=array();
         for ($i = 0; $i < sizeof($matricule); $i++) 
        {
          //  if($idEvaluation=='')
            //{   echo 'Non';
                $this->db->where(array('matriculeEtudiant'=> $matricule[$i], 'annee' =>$annee, 'semestre' => $session,
                'sigle' => $sigle
                ));
          //  }
          //  else
          //  {
          //      echo 'oui';
          //      $this->db->where(array('matriculeEtudiant'=> $matricule[$i], 'annee' =>$annee, 'semestre' => $session,
          //      'sigle' => $sigle, 'idEvaluation'=>$idEvaluation
          //      ));
           // }
             
             $this->db->order_by('idEvaluation','asc');
            $query = $this->db->get('notespartielles');
            
           
            if ($query->num_rows() > 0) 
            {  
                $rows = $query->result_array();
                $data[$i]['note'] = $rows;
               // print_r($rows);
               
            }
            else
            {  
                $data[$i]['note'] = '';
            }
        }
       
        return $data;
    }
    
    
                      function import_notes_to_table_note_cc_cp($dataTable,$annee,$semestre,$sigle){
    
      $list='';
         for($j=0;$j<count($dataTable);$j++){
            $list.=$dataTable[$j]->matriculeEtudiant;
            $list.=',';
        }
        $list=substr($list, 0,-1);
        
        $requete1="delete from notespartielles where matriculeEtudiant in ($list) and annee=$annee and semestre=$semestre and sigle='$sigle'";
       $this->db->query($requete1); 
       
           
       
       
        
                                        $requete="insert into `notespartielles` (`matriculeEtudiant`, `sigle`, `idEvaluation`, `note`, `semestre`, `annee`) VALUES  ";
                                        
                                         $requete2="insert into `notespartielles` (`matriculeEtudiant`, `sigle`, `idEvaluation`, `note`, `semestre`, `annee`) VALUES  ";
                              
                                        
                                       
                                        for($i=0;$i<count($dataTable);$i++){
                                            $matriculeEtudiant=$dataTable[$i]->matriculeEtudiant;
                                            $noteCP=$dataTable[$i]->noteCP;
                                            if(is_double($noteCP) or is_numeric($noteCP) or is_float($noteCP)){
                                            $requete.="(";
                                          
                                        
                                        $requete.="'$matriculeEtudiant','$sigle',1,";

                                        
                                        $requete.="'$noteCP','$semestre','$annee'),";
                                            }
                                        $noteCC=$dataTable[$i]->noteCC;
                                        if(is_double($noteCC) or is_numeric($noteCC) or is_float($noteCC)){
                                         $requete2.="(";
                                          
                                     //   $matriculeEtudiant=$dataTable[$i]->matriculeEtudiant;
                                        $requete2.="'$matriculeEtudiant','$sigle',2,";

                                        
                                        $requete2.="'$noteCC','$semestre','$annee'),";
                                        }
                               
                                    }
                                        $requete=substr($requete, 0,strlen($requete)-1);
                                         $requete2=substr($requete2, 0,strlen($requete2)-1);

                            $res1=$this->db->query($requete); 
                             $res=$this->db->query($requete2); 
                            
                            
                        /*     $requete2="insert into `notespartielles` (`matriculeEtudiant`, `sigle`, `idEvaluation`, `note`, `semestre`, `annee`) VALUES  ";
                                        
                                       
                                        for($i=0;$i<count($dataTable);$i++){
                                            $requete2.="(";
                                          
                                        $matriculeEtudiant=$dataTable[$i]->matriculeEtudiant;
                                        $requete2.="'$matriculeEtudiant','$sigle',2,";

                                        $noteCC=$dataTable[$i]->noteCC;
                                        $requete2.="'$noteCC','$semestre','$annee'),";

                               
                                    }
                                        $requete2=substr($requete2, 0,strlen($requete2)-1);

                            $res=$this->db->query($requete2); */
                  
                            return $requete;
                        
                    }

                    
  
    
    
     function enregistrer_notes_partielles_cc_cp($data,$index,$note,$name_val) 
    {
      
        $sigle=$data['sigle'];
        $annee=$data['annee'];
        $semestre=$data['session'];
      // print_r($name_val);
     if(isset($data['detail']))
     {  
        $detail=$data['detail'];
        $sql="update moduleevaluation set detail='".$detail."' where sigle='".$sigle."' and $annee=".$annee." and $semestre=".$semestre." and idEvaluation=1";
        $this->db->query($sql);
     }  
        //echo "***". $data['matricule'][$index]." **".'<br>'
        if(isset($data['evaluationsID'])){
        $evaluationsID=(array)$data['evaluationsID'];}
        if($name_val=="noteCC"){
            $evaluationsID=array(2);
        }else{
            $evaluationsID=array(1);
        }
       
        for($j=0; $j<sizeof($evaluationsID); $j++)
        {
         
        $this->db->where(array('matriculeEtudiant'=> $data['matricule'][$index], 'annee' =>$data['annee'], 'semestre' => $data['session'],
            'sigle' => $data['sigle'],'idEvaluation'=>$evaluationsID[$j]
            ));
        $query = $this->db->get('notespartielles');
        //Alfa Hafedh 02-03-2016 : inserer uniquement données datatable visibie
       // echo '"'.$name_val.'"'.$index.'-'.$j.'<br>';
        if(isset($data[$name_val.''.$index.'-'.$j]))
        {
        $z=$data[$name_val.''.$index.'-'.$j];
        // print_r($z);
        if ($query->num_rows() > 0) 
        { 
            $row = $query->row_array();
            $this->db->where(array('matriculeEtudiant'=> $data['matricule'][$index], 'annee' =>$data['annee'], 'semestre' => $data['session'],
                    'sigle' => $data['sigle'],'idEvaluation'=>$evaluationsID[$j] ));
            
            
                    $this->db->update('notespartielles',array('note' => $z));
             
                
            
        }
 else {
    $info=array('matriculeEtudiant'=> $data['matricule'][$index], 'annee' =>$data['annee'], 'semestre' => $data['session'],
            'sigle' => $data['sigle'],'idEvaluation'=>$evaluationsID[$j],'note' => $z);
    
    $this->db->insert('notespartielles',$info);
 }
        }
        }
    }
    
    function get_programme_ens_responsable($matriculeProfesseur) 
    {
        $programme = NULL;
    //    print_r("SELECT Distinct p.`idProgramme`, p.`nom` FROM `programme` p, employe e,Departement d where e.idDepartement=p.idDepartement and e.idDepartement=d.idDepartement and e.matriculeEmploye='".$matriculeProfesseur['matricule']."' ORDER BY `nom`");
    $query = $this->db->query("SELECT Distinct p.`idProgramme`, p.`nom` FROM `programme` p, employe e,Departement d where e.idDepartement=p.idDepartement and e.idDepartement=d.idDepartement and e.matriculeEmploye='".$matriculeProfesseur['matricule']."' ORDER BY `nom`");
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $programme['idProgramme'][] = $row['idProgramme'];
                $programme['nomProgramme'][] = $row['nom'];
            }
        }
        return $programme;
    }
}
