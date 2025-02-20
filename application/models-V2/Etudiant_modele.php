<?php

class Etudiant_modele extends CI_Model {

    function __construct() {
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
        $this->db->where('login', $login);

        $query = $this->db->get('etudiant');
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            return $this->decode($row['pass']);
        }
    }

    function get_matricule($login) 
    {
        $this->db->where('login', $login);
        $query = $this->db->get('etudiant');
        if ($query->num_rows() > 0) 
        {
            $row = $query->row_array();
            $data['matricule'] = $row['matriculeEtudiant'];
        }
        return $data;
    }

    function get_idGroupe($matricule) 
    {
        $mat = ($matricule['matricule']);
        $data_idGroupe = NULL;
        $query = $this->db->query("SELECT `idGroupe` FROM `listeetudiants` WHERE `matriculeEtudiant` = '$mat'");
        if ($query->num_rows() > 0) 
        {
            foreach ($query->result_array() as $row) 
            {
                $data_idGroupe['idGroupe'][] = $row['idGroupe'];
            }
        }
        if ($data_idGroupe != NULL) 
        {
            $idGr = $this->get_idGroupe_sessionCourante($data_idGroupe);
            return $idGr;
        }
        else
            return NULL;
    }

    function get_idGroupe_sessionCourante($idGroupeEtudiant) 
    {
        $idgr = NULL;
        $annee_Courante = NULL;
        $session_Courante = NULL;
        if ($idGroupeEtudiant != NULL) 
        {
            $query_anne = $this->db->query("SELECT   `annee`, `semestre` FROM `SessionCourante`");
            if ($query_anne->num_rows() > 0) 
            {
                foreach ($query_anne->result_array() as $row) 
                {
                    $annee_Courante = $row['annee'];
                    $session_Courante = $row['semestre'];
                }
            }
            foreach ($idGroupeEtudiant['idGroupe'] as $groupe) 
            {
                $query_idGroupe_anneeCourante = $this->db->query("SELECT `idGroupe` FROM Groupe where `semestre` = '$session_Courante' AND `annee` = '$annee_Courante'AND `idGroupe` ='$groupe' ");
                if ($query_idGroupe_anneeCourante->num_rows() > 0) 
                {
                    foreach ($query_idGroupe_anneeCourante->result_array() as $row) 
                    {
                        $idgr['idGroupe'][] = $row['idGroupe'];
                    }
                } 
                else 
                {
                    $idgr['idGroupe'][] = NULL;
                }
            }
        }

        return $idgr;
    }

    function get_periode_groupe($idGroupe) {
        $periode = NULL;
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

    function get_info_absences($login)
    {
        $infoAbsences = array();
        $this->db->where('login',$login);
        $query = $this->db->get('etudiant');
        $matricule = 0;
        if ($query->num_rows() > 0) 
        {
            foreach ($query->result_array() as $row) 
            {
                 $matricule = $row['matriculeEtudiant'];
            }
        }
        
        $sessionCourante = $this->get_session_courante();
        $this->db->where(array('matricule' => $matricule ,'annee' =>$sessionCourante['annee'], 'semestre' => $sessionCourante['semestre'],'absenceMotivee'=>0 ));
        $this->db->order_by('date','desc');
        $query = $this->db->get('absences');
        if ($query->num_rows() > 0) 
        {
            foreach ($query->result_array() as $row) 
            {
                $infoAbsences['date'][] = $row['date'];
                $infoAbsences['duree'][] = $row['duree'];
                $infoAbsences['periode'][] = $row['periode'];
                $infoAbsences['idGroupe'][] = $row['idGroupe']; 
                $infoAbsences['matriculeEtudiant'][] = $row['matricule']; 
                $infoAbsences['annee'][] = $row['annee']; 
                $infoAbsences['semestre'][] = $row['semestre']; 
            }
        }
        return $infoAbsences;
    }


    function set_password($newPassword, $login) {
        $data = array(
            'pass' => $this->encode($newPassword)
        );
        $this->db->where('login', $login);

        $this->db->update('etudiant', $data);
    }

      /*
     * fonction qui prend en paramètre un matricule et retourne le programme dont l'étudiant est inscrit.
     */
    function get_programme_etudiant($matricule) 
    {
        $programme_etudiant = NULL;
        $query = $this->db->query("SELECT Distinct `idProgramme` FROM `DossierEtudiant` where `matriculeEtudiant` = '$matricule'");
        if ($query->num_rows() > 0) 
        {
            foreach ($query->result_array() as $row) 
            {
                $idprog = $row['idProgramme'];
                $query2 = $this->db->query("SELECT Distinct `nom` FROM `programme` where `idProgramme` = '$idprog'");
                if ($query2->num_rows() > 0) 
                {
                    foreach ($query2->result_array() as $row) 
                    {
                        $programme_etudiant['idProgramme'][] = $row['nom'];
                    }
                }
            }
        }
        return $programme_etudiant;
    }
    
    
   function get_informations($login) 
   {
        $this->db->where('login', $login);
        // $this->db->where('actif', 1);
        $query = $this->db->get('etudiant');
        if ($query->num_rows() > 0) 
        {
            $row = $query->row_array();
            $data['matricule'] = $row['matriculeEtudiant'];
            $data['nom'] = $row['nom'];
            $data['nin'] = $row['NIN'];
            $data['actif'] = $row['actif'];
            $data['raisonInactif'] = $row['raisonInactif'];
            $data['prenom'] = $row['prenom'];
            $data['sexe'] = $row['sexe'];
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
            $data['urlPhoto'] = 'IUP'.$row['photoEtudiant'];
            if (strpos($data['urlPhoto'], "jpg") > 0) $data['urlPhoto'] = str_replace('jpg', 'bmp', $data['urlPhoto']);
            $data['nomParents'] = $row['nomParents'];
            $data['surnom'] = $row['surnom'];
            $data['lieuNaissance'] = $row['lieuNaissance'];
            $data['nomParents'] = $row['nomParents'];
            $idinfoBac = $row['infoBac'];


            $adresseE = $row['idAdresse'];
            $adresse = $row['idAdresseParent'];

            $this->db->where('idAdresse', $adresseE);
            $query = $this->db->get('adresses');
            $row = $query->row_array();
            $data['ligne1'] = $row['ligne1'];
            $data['ligne2'] = $row['ligne2'];
            $data['ville'] = $row['ligne3'];
            $data['pays'] = $row['pays'];


            $this->db->where('idAdresse', $adresse);
            $query = $this->db->get('adresses');
            $row = $query->row_array();
            $data['ligne_1'] = $row['ligne1'];
            $data['ligne_2'] = $row['ligne2'];
            $data['ville_P'] = $row['ligne3'];
            $data['paysP'] = $row['pays'];
            
            $this->db->where('idInfoBac', $idinfoBac);
            $query = $this->db->get('EtudesAnterieures');
            $row = $query->row_array();
            $data['infoBac'] = $row['infoBac'];
            $data['anneeObtention'] = $row['anneeObtention'];
            $data['moyenneBac'] = $row['moyenneBac'];
            $data['autreDiplome'] = $row['autreDiplome'];
            $data['commentaireAdmission'] = $row['commentaireAdmission'];
            $data['sessionNormale'] = $row['sessionNormale'];

            $idEtab = $row['idEtablissement'];

            $this->db->where('idEtablissement', $idEtab);
            $query = $this->db->get('etablissement');
            $row = $query->row_array();
            if ($query->num_rows() > 0)
            {
                $data['nomEtablissement'] = $row['nom'];
            }
            $data['programme_etudiant'][] = $this->get_programme_etudiant($data['matricule']);
            
            $this->db->where('matriculeEtudiant',$data['matricule']);
            $query = $this->db->get('dossieretudiant');
            $row = $query->row_array();
            if ($query->num_rows() > 0)
            {
                $data['grade'] = $row['grade'];
            }

            return $data;
        }
    }

    function modifier_info($login, $post) 
    {

        $data = array(
            'telephone' => $post['phone1'],
            'telephone2' => $post['phone2'],
            'email' => $post['email'],
            'contactUrgence' => $post['contactUrgence'],
            'telUrgence' => $post['telephoneUrgence'],
            'telParents' => $post['telephoneParents'],
            'lienParenteUrgence' => $post['lienParenteContactUrgence']
        );
        $this->db->where('login', $login);
        $this->db->update('etudiant', $data);
        $adresse = 0;
        $this->db->where(array('login' => $login));
        $query = $this->db->get('etudiant');
        $addresseEtudiant = array('ligne1' => $post['ligne1'], 'ligne2' => $post['ligne2'], 'ligne3' => $post['ligne3'], 'pays' => $post['pays']);
        $adresseParents = array('ligne1' => $post['ligne_1'], 'ligne2' => $post['ligne_2'], 'ligne3' => $post['ligne_3'], 'pays' => $post['paysP']);
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            $adresse = $row['idAdresse'];
            $adresseParent = $row['idAdresseParent'];
            $this->db->where('idAdresse', $adresse);
            $this->db->update('adresses', $addresseEtudiant);
            $this->db->where('idAdresse', $adresseParent);
            $this->db->update('adresses', $adresseParents);
        }
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

}
