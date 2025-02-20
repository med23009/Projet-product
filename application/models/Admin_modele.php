<?php

class Admin_modele extends CI_Model {

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

        $query = $this->db->get('employe');
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            return $this->decode($row['pass']);
        }
    }
    function stripAccents($string)
    {
	 $accents = array('À', '�?', 'Â', 'Ã', 'Ä', 'Å', 'Ā', 'Ą', 'Ă', 'Æ', 'Ç', 'Ć', 'Č', 'Ĉ', 'Ċ', 'Ď', '�?', 'È', 'É', 'Ê', 'Ë', 'Ē', 'Ę', 'Ě', 'Ĕ', 'Ė', 'Ĝ', 'Ğ', 'Ġ', 'Ģ', 'Ĥ', 'Ħ', 'Ì', '�?', 'Î', '�?', 'Ī', 'Ĩ', 'Ĭ', 'Į', 'İ', 'Ĳ', 'Ĵ', 'Ķ', '�?', 'Ľ', 'Ĺ', 'Ļ', 'Ŀ', 'Ñ', 'Ń', 'Ň', 'Ņ', 'Ŋ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ō', '�?', 'Ŏ', 'Œ', 'Ŕ', 'Ř', 'Ŗ', 'Ś', 'Š', 'Ş', 'Ŝ', 'Ș', 'Ť', 'Ţ', 'Ŧ', 'Ț', 'Ù', 'Ú', 'Û', 'Ü', 'Ū', 'Ů', 'Ű', 'Ŭ', 'Ũ', 'Ų', 'Ŵ', '�?', 'Ŷ', 'Ÿ', 'Ź', 'Ž', 'Ż', 'à', 'á', 'â', 'ã', 'ä', 'å', '�?', 'ą', 'ă', 'æ', 'ç', 'ć', '�?', 'ĉ', 'ċ', '�?', 'đ', 'è', 'é', 'ê', 'ë', 'ē', 'ę', 'ě', 'ĕ', 'ė', 'ƒ', '�?', 'ğ', 'ġ', 'ģ', 'ĥ', 'ħ', 'ì', 'í', 'î', 'ï', 'ī', 'ĩ', 'ĭ', 'į', 'ı', 'ĳ', 'ĵ', 'ķ', 'ĸ', 'ł', 'ľ', 'ĺ', 'ļ', 'ŀ', 'ñ', 'ń', 'ň', 'ņ', 'ŉ', 'ŋ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', '�?', 'ő', '�?', 'œ', 'ŕ', 'ř', 'ŗ', 'ś', 'š', 'ş', '�?', 'ș', 'ť', 'ţ', 'ŧ', 'ț', 'ù', 'ú', 'û', 'ü', 'ū', 'ů', 'ű', 'ŭ', 'ũ', 'ų', 'ŵ', 'ý', 'ÿ', 'ŷ', 'ž', 'ż', 'ź', 'Þ', 'þ', 'ß', 'ſ', '�?', 'ð');
$letters = array('A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'C', 'C', 'C', 'C', 'D', 'D', 'E', 'E', 'E', 'E', 'E', 'E', 'E', 'E', 'E', 'G', 'G', 'G', 'G', 'H', 'H', 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'I', 'J', 'J', 'K', 'L', 'L', 'L', 'L', 'L', 'N', 'N', 'N', 'N', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'E', 'R', 'R', 'R', 'S', 'S', 'S', 'S', 'S', 'T', 'T', 'T', 'T', 'U', 'U', 'U', 'U', 'U', 'U', 'U', 'U', 'U', 'U', 'W', 'Y', 'Y', 'Y', 'Z', 'Z', 'Z', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'e', 'c', 'c', 'c', 'c', 'c', 'd', 'd', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'f', 'g', 'g' ,'g', 'g', 'h', 'h', 'i', 'i', 'i', 'i', 'i', 'i', 'i','i', 'i', 'j', 'j', 'k', 'k', 'l', 'l', 'l', 'l' ,'l' ,'n', 'n', 'n', 'n', 'n', 'n', 'o', 'o', 'o', 'o' ,'o', 'o', 'o', 'o' ,'o', 'e', 'r' ,'r' ,'r' ,'s', 's', 's' ,'s', 's', 't' ,'t' ,'t' ,'t' ,'u' ,'u', 'u' ,'u' ,'u', 'u' ,'u' ,'u' ,'u' ,'u' ,'w', 'y', 'y', 'y', 'z', 'z', 'z', 'T', 't', 'B', 'f','D', 'd');
$string = str_replace($accents, $letters, $string);
return $string;

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
     * fonction pour convertir la date de YYYY-MM-DD a DD/MM/YYYY
     */
    function decode_date($date)
    {
      
        $year = '';
        $month = '';
        $day = '';
        for($i=0;$i<strlen($date);$i++)
        {
            if($i<4)
            {
                $year .=$date[$i];
            }
            if($i>4 && $i<7)
            {
                $month .= $date[$i];
            }
            if($i>7)
            {
                $day .= $date[$i];
            }
        }
       
        $datephp = $day.'/'.$month.'/'.$year;
          
        return $datephp;
    }
    /*
     * fonction pour modifier la session courante et la date du debut de cours et fin de cours
     */
    function modifier_session_courante($info_session) 
    {
        $data['debutCours'] = $this->convert_date($info_session['dateDebut']);
        $data['finCours'] = $this->convert_date($info_session['dateFin']);
        $data['annee'] = $info_session['annee'];
        $data['semestre'] = $info_session['session'];
        $this->db->empty_table('sessioncourante');
        $this->db->insert('sessioncourante', $data);
    }
    /*
     * fonction pour modifier le mot de passe de l utilisateur
     * appelée dans la méthode modifier_mot_de_passe
     */
    
    function set_password($newPassword, $login) 
    {
        $data = array(
            'pass' => $this->encode($newPassword)
        );
        $this->db->where('login', $login);
        $this->db->update('employe', $data);
    }

    /*
     * fonction qui retourne le nom et le nombre de crédits d'un cycle
     */
    function get_cycle_information() // modifiée mai 2013 pour 2.2.1
    {
        $data = array();
        $query = $this->db->get('cycle');
        $i = 0;
        foreach ($query->result() as $row) 
        {
            $data[$i] = $row->idCycle;  // ajout 2.2.1 
            $i++;						// ajout 2.2.1 
			$data[$i] = $row->nom;
            $i++;
            $data[$i] = $row->nbCredits;
            $i++;
        }
        return $data;
    }

    function get_local_information() 
    {
        $data = array();
        $query = $this->db->get('local');
        $i = 0;
        foreach ($query->result() as $row) {
            $data[$i] = $row->idLocal;
            $i++;
            $data[$i] = $row->description;
            $i++;
        }
        return $data;
    }

    /*
     * Fonction qui verifie si un chef de departement existe deja ou non 
     * et elle retourne le nom du chef de departement si elle le trouve,
     */
    function exist_chef_departement($idDepartement)
    {
        $infoChef =array();//les informations du chef de departement si il existe.
        $this->db->where('idDepartement', $idDepartement);
          $query = $this->db->get('employe');
         foreach ($query->result() as $row) 
         {
            if(strstr($row->idProfil, 'chef_departement'))
            {
                $infoChef['matricule'] = $row->matriculeEmploye;
                $infoChef['nom'] =  $row->nom;
                $infoChef['prenom'] = $row->prenom;
                $departement = $this->get_departement_information_id($idDepartement);
                $infoChef['departement'] = $departement['nom'];
                return $infoChef;
            }
        }
         return FALSE;
    }
    function ajouter_local($idLocal, $description) {
        $this->db->where('idLocal', $idLocal);

        $query = $this->db->get('local');
        if ($query->num_rows() > 0) {
            return false;
        } else {
            $data = array(
                'idLocal' => $idLocal,
                'description' => $description
            );
            $this->db->insert('local', $data);
            return true;
        }
    }

    function get_cycle_information_id($idCycle) {
        $data = '';
        $this->db->where('idCycle', $idCycle);

        $query = $this->db->get('cycle');
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            $data['nomCycle'] = $row['nom'];
            $data['nbreCredits'] = $row['nbCredits'];
            return $data;
        }
    }

    function ajouter_cycle($nom, $nbreCredits) {
        $this->db->where('nom', $nom);
        $query = $this->db->get('cycle');
        if ($query->num_rows() > 0) {
            return false;
        } else {
            $data = array(
                'nom' => $nom,
                'nbCredits' => $nbreCredits
            );
            $this->db->insert('cycle', $data);
            return true;
        }
    }

    function get_departement_information() {
        $data = array();
        $query = $this->db->get('departement');
        $i = 0;
        foreach ($query->result() as $row) {
            $data[$i] = $row->idDepartement;
            $i++;
            $data[$i] = $row->nom;
            $i++;
            $data[$i] = $row->Description;
            $i++;
        }
        return $data;
    }

    function get_departement_information_id($idDepartement) {
        $data = array();
        $this->db->where('idDepartement', $idDepartement);

        $query = $this->db->get('departement');
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            $data['idDepartement'] = $row['idDepartement'];
            $data['nom'] = $row['nom'];
            $data['description'] = $row['Description'];
            return $data;
        }
    }

    function modifier_cycle($idCycle, $nom, $nbreCredits) {
        $data = array(
            'nom' => $nom,
            'nbCredits' => $nbreCredits
        );
        $this->db->where('idCycle', $idCycle);

        $this->db->update('cycle', $data);
    }

    function delete_cycle($idCycle) 
    {
        $return['deleted'] = false;
        $return['msg'] = '';

        $this->db->where('idCycle', $idCycle);
        
        $query1 = $this->db->get('module');

        if ($query1->num_rows() > 0) {
            $return['msg'] = 'Le cycle ne peut être supprimé : au moins un module en fait partie !';
            return $return;
        }

        $this->db->where('idCycle', $idCycle);
        $query2 = $this->db->get('programme');

        if ($query2->num_rows() > 0) {
            $return['msg'] = 'Le cycle ne peut être supprimé : au moins un programme en fait partie !';
            return $return;
        }
        //le cycle peut être supprimé
        $this->db->where('idCycle', $idCycle);
        $queryCycle = $this->db->get('cycle');
        if ($queryCycle->num_rows() > 0) 
        {
             $row = $queryCycle->row_array();
             $nomCycle = $row['nom'];
        }
        $this->db->where('idCycle', $idCycle);
        $this->db->delete('cycle');

        $return['deleted'] = true;
        $return['msg'] = 'Le cycle <b>'.$nomCycle.'</b> a été supprimé avec succès.';
        return $return;
    }

    /*
     * fonction pour ajouter un département. Si le nom ou le Id existe déjà la fonction 
     * retourne une valeur boolean false sinon l'insertion est faite avec succès.
     */
    function ajouter_departement($idDepartement, $nom, $description) 
    {
        $data = array(
            'idDepartement' => $idDepartement,
            'nom' => $nom,
            'description' => $description
        );
        $this->db->where('idDepartement', $idDepartement);
        $this->db->or_where('nom',$nom);
        $query = $this->db->get('departement');

        if ($query->num_rows() > 0) 
        {
            return "false";
        } 
        else 
        {
            $this->db->insert('departement', $data);
            return "true";
        }
    }

    /*
     * fonction pour modifier le departement
     * Aucune vérification n'est faite.
     */
    function modifier_departement($idDepartement, $nom, $description) 
    {
        $data = array(
            'nom' => $nom,
            'description' => $description
        );
        $this->db->where('idDepartement', $idDepartement);
        $this->db->update('departement', $data);
    }
    /*
     * fonction pour supprimer les personnes-clés 
     */
    function supprimer_personneCle($personnesASupprimer)
    {
        
        for($i=0; $i < count($personnesASupprimer); $i++)
        {
            $this->db->where('email', $personnesASupprimer[$i]);
            $this->db->delete('personneCle');
        }
        
    }
    
    
    function delete_departement($idDepartement) 
    {
        $return['deleted'] = false;
        $return['msg'] = '';

        $this->db->where('idDepartement', $idDepartement);
        $query1 = $this->db->get('employe');

        if ($query1->num_rows() > 0) 
        {
            $return['msg'] = 'Le département ne peut pas être supprimé : au moins un employé en fait partie !';
            return $return;
        }

        $this->db->where('idDepartement', $idDepartement);
        $query2 = $this->db->get('module');

        if ($query2->num_rows() > 0) {
            $return['msg'] = 'Le département ne peut être pas supprimé : au moins un module en fait partie !';
            return $return;
        }
        //le département peut être supprimé
        $this->db->where('idDepartement', $idDepartement);
        $this->db->delete('departement');

        $return['deleted'] = true;
        $return['msg'] = 'Le département <b>'.$idDepartement .'</b> a été supprimé avec succès.';
        return $return;
    }

    function get_grade_information() 
    {
        $data = array();
        $query = $this->db->get('grade');
        $i = 0;
        foreach ($query->result() as $row) {
            $data[$i] = $row->idGrade;
            $i++;
            $data[$i] = $row->nbCredits;
            $i++;
        }
        return $data;
    }

    function ajouter_grade($idGrade, $nbreCredits) {
        $data = array(
            'idGrade' => $idGrade,
            'nbCredits' => $nbreCredits
        );

        $this->db->where('idGrade', $idGrade);
        $query = $this->db->get('grade');

        if ($query->num_rows() > 0) {
            return "false";
        } else {
            $this->db->insert('grade', $data);
            return "true";
        }
    }

    function delete_grade($idGrade) {

        $return['deleted'] = false;
        $return['msg'] = '';

        $this->db->where('grade', $idGrade);
        $query1 = $this->db->get('dossierEtudiant');

        if ($query1->num_rows() > 0) {
            $return['msg'] = 'Le grade ne peut être supprimé : au moins un étudiant y est inscrit !';
            return $return;
        }


        //le grade peut être supprimé
        $this->db->where('idGrade', $idGrade);
        $this->db->delete('grade');

        $return['deleted'] = true;
        $return['msg'] = 'Le grade <b>'.$idGrade.' </b>a été supprimé avec succès.';
        return $return;
    }

    function delete_local($idLocal) {

        $return['deleted'] = false;
        $return['msg'] = '';

        $this->db->where('idLocal', $idLocal);
        $query1 = $this->db->get('horaire');

        if ($query1->num_rows() > 0) {
            $return['msg'] = 'Le local ne peut pas être supprimé : il fait partie d\'un horaire !';
            return $return;
        }


        //le grade peut etre supprime
        $this->db->where('idLocal', $idLocal);
        $this->db->delete('local');

        $return['deleted'] = true;
        $return['msg'] = 'Le local <b>'.$idLocal.'</b> a été supprimé avec succès.';
        return $return;
    }
    
    function delete_personneCle($email)
    {
        $this->db->where('email',$email);
        $this->db->delete('personneCle');
    }

    function get_grade_information_id($idGrade) {
        $this->db->where('idGrade', $idGrade);

        $query = $this->db->get('grade');
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            $data['idGrade'] = $row['idGrade'];
            $data['nbCredits'] = $row['nbCredits'];
            return $data;
        }
    }

    function modifier_grade($idGrade, $nbreCredits) {
        $data = array(
            'nbCredits' => $nbreCredits
        );
        $this->db->where('idGrade', $idGrade);

        $this->db->update('grade', $data);
    }

    function get_programme_information() {
        $data = array();
        $query = $this->db->get('programme');
        $i = 0;
        foreach ($query->result() as $row) {
            $data[$i] = $row->idProgramme;
            $i++;
            $data[$i] = $row->nom;
            $i++;
            $data[$i] = $row->description;
            $i++;
            $this->db->where(array("idCycle" => $row->idCycle));
            $query_2 = $this->db->get('cycle');
            foreach ($query_2->result() as $row_2)
                $data[$i] = $row_2->nom;
            $i++;
            $data[$i] = $row->nbCredits;
            $i++;
        }
        return $data;
    }

    function get_cycle() {

        $cycle = null;
        $query = $this->db->query("SELECT Distinct `nom` FROM `cycle`");
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $cycle['nomCycle'][] = $row['nom'];
            }
        }
        return $cycle;
    }

    function ajouter_programme($idProgramme, $nom, $description, $cycle, $nbreCredits) {
        $idCycle = NULL;
        $this->db->where('nom', $cycle);

        $query = $this->db->get('cycle');
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            $idCycle = $row['idCycle'];
        }

        $data = array(
            'idProgramme' => strtoupper($idProgramme),
            'nom' => $nom,
            'description' => $description,
            'idCycle' => $idCycle,
            'nbCredits' => $nbreCredits
        );
        $this->db->where('idProgramme', strtoupper($idProgramme));
        $query = $this->db->get('programme');

        if ($query->num_rows() > 0) {
            return "false";
        } else {
            $this->db->insert('programme', $data);
            return "true";
        }
    }

    function delete_programme($idProgramme) 
    {
//$return=array();
        $return['deleted'] = false;
        $return['msg'] = '';

        $this->db->where('idProgramme', $idProgramme);
        $query1 = $this->db->get('dossierEtudiant');

        if ($query1->num_rows() > 0) {
            $return['msg'] = 'Le programme ne peut être supprimé : au moins un étudiant y est inscrit !';
            return $return;
        }

        $this->db->where('idProgramme', $idProgramme);
        $query2 = $this->db->get('modprog');

        if ($query2->num_rows() > 0) {
            $return['msg'] = 'Le programme ne peut être supprimé : au moins un module y est associé !';
            return $return;
        }
        //le cycle peut etre supprime
        $this->db->where('idProgramme', $idProgramme);
        $this->db->delete('programme');

        $return['deleted'] = true;
        $return['msg'] = 'Le programme <b>'.$idProgramme.'</b> a été supprimé avec succès.';
        return $return;
    }

    function get_programme_information_id($idProgramme) {
        $this->db->where('idProgramme', $idProgramme);

        $query = $this->db->get('programme');
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            $data['idProgramme'] = $row['idProgramme'];
            $data['nom'] = $row['nom'];
            $data['description'] = $row['description'];
            $data['idCycle'] = $row['idCycle'];
            $data['nbCredits'] = $row['nbCredits'];
            return $data;
        }
    }

    function modifier_programme($idProgramme, $nom, $description, $nbCredits, $idCycle) {
        $this->db->where('nom', $idCycle);

        $query = $this->db->get('cycle');
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            $data = array(
                'nom' => $nom,
                'description' => $description,
                'nbCredits' => $nbCredits,
                'idCycle' => $row['idCycle']
            );
        }
        $this->db->where('idProgramme', $idProgramme);

        $this->db->update('programme', $data);
    }

    function get_last_matricule() {
        $matricule = 1000;
        $this->db->select_max('matriculeEmploye');
        $query = $this->db->get('employe');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $matricule = $row->matriculeEmploye;
            }
        }
        return $matricule;
    }

    function generer_matricule() {

        $matricule = $this->get_last_matricule();
        $matricule = substr($matricule, 1);
        do {
            $matricule += 1;
            if ($matricule > 9999)
                die("Une erreur est survenue dans la génération du matricule ?!");

            $valid = $this->valider_matricule($matricule);
        }while (!$valid);
        $zero = 4 - strlen($matricule);
        $zeros = '';
        for ($i = 0; $i < $zero; $i++) {
            $zeros .='0';
        }
        $matricule = 'E' . $zeros . $matricule;
        return $matricule;
    }

    /**
     * Validation du matricule selon la formule de Luhn
     * @param type $matricule
     * @return type 
     */
    function valider_matricule($matricule) {
        $tot = 0;

        for ($i = 3; $i >= 0; $i--) {

            $temp = $i % 2;
            if ($temp == 0)
                $tot += intval(substr($matricule, $i, 1));
            else {
                $stot = intval(substr($matricule, $i, 1) * 2);
                $stot = $stot > 9 ? $stot - 9 : $stot;
                $tot += $stot;
            }
        }
        return $tot;
    }

    
    /*
     * fonction pour tester si une ligne est inserer dans la table personnecles.
     */
    function isActif()
    {
        $query = $this->db->get('personneCle');
        if ($query->num_rows() > 0) 
        {
            foreach ($query->result() as $row) 
            {
                if ($row->envoieActif == 1)
                    return TRUE;
                else
                    return FALSE;
            }  
        }
        return FALSE;
        
    }
    
    /*
     * fonction pour tester si une ligne est inserée dans la table personnecles.
     */
    function line_exist()
    {
        $query = $this->db->get('personneCle');
        if ($query->num_rows() > 0) 
        {
            return TRUE;
        }
        return FALSE;
        
    }
    
    function activation_monitoring($monitoring)
    {
        $data=array();
        //si on veut activer
        if($monitoring == 'actif')
        {
            $data['envoieActif'] = 1;
        }
        else//si on veut desactiver
        {
            $data['envoieActif'] = 0;
        }
        
        $this->db->update('personneCle', $data);
    }
    /*
     * fonction pour ajouter un email des personne cle
     */
    function ajouter_une_personnecle($email)
    {
        $donnees = array('email' => $email);
        $query = $this->db->get('personneCle');
        $rowcount = $query->num_rows();
        if($rowcount<10)
        {
            $this->db->insert('personneCle', $donnees);
            return TRUE;
        }
        else
            return FALSE;
    }
    function get_email_personnecle()
    {
        $data = '';
        $query = $this->db->get('personneCle');
        $i = 0;
        foreach ($query->result() as $row) {
            $data[$i] = $row->email;
            $i++;
            $data[$i] = $row->envoieActif;
            $i++;
        }
        return $data;
    }
    /*
     * fonction qui cree un employe et retourne son matricule genere.
     */
    function creer_employe($data,$login,$password) 
    {
        $matricule = '';
        $matricule = $this->generer_matricule();

        $donnees = array('matriculeEmploye' => $matricule, 'nom' => $data['lastName'], 'prenom' => $data['firstName'],
        'idProfil' => $data['idProfil'], 'idDepartement' => strtoupper($data['departement']), 'login' => $login,
        'pass' => $this->encode($password), 'email' => $data['email'], 'actif' => '1','nationalite' => $data['nationalite'],
            'dernierDiplome' => $data['dernierDiplome'] ,'paysDiplome' => $data['paysDiplome'],'grade' => $data['grade'],'telephone1' => $data['telephone1'],
            'telephone2' => $data['telephone2'],'compteBancaire' => $data['compteBancaire']);
        
        $this->db->insert('employe', $donnees);
        return $matricule;
    }

    /*
     * fonction qui genere le mot de passe des utilisateurs du SIGA
     */
    function generer_mdp() 
    {
        $mdp = "";
        $possible = "123456789abcdefghijlkmnopqrstuvwxyzABCDEFGHIJKLMNOPQRTUVWXYZ";
        $maxlength = 10;
        $i = 0;
        $numbers = 0;

        while (strlen($mdp) < $maxlength) {


            $char = substr($possible, mt_rand(0, strlen($possible) - 1), 1);
            if (intval($char) > 0)
                $numbers++;

            //le mot de passe doit contenir au moins un chiffre
            //si nous n'avons pas eu encore de chiffre on force le dernier caractere a etre un chiffre
            if (strlen($mdp) == 9 && $numbers == 0)
                $char = mt_rand(1, 9);

            $mdp .= $char;
        }

        return $mdp;
    }

    /*
     * fonction pour reinitialiser le mot de passe de l etudiant et retourne le nouveau mot de passe
     */
    function reinitialiser_password_etudiant($matricule) 
    {
        $this->db->where('matriculeEtudiant', $matricule);

        $this->db->get('etudiant');

        $data1['pass'] = $this->generer_mdp();
        $data2['pass'] = $this->encode($data1['pass']);
        $data2['actif'] = 1;
        $data2['nbreAcces'] = 0;
        $this->db->where('matriculeEtudiant', $matricule);
        $this->db->update('etudiant', $data2);
        return $data1;
    }

    /*
     * fonction pour reinitialiser le mot de passe de l employe et retourne le nouveau mot de passe
     */
    function reinitialiser_password_employe($matricule) {
        $this->db->where('matriculeEmploye', $matricule);

        $this->db->get('employe');

        $data1['pass'] = $this->generer_mdp();
        $data2['pass'] = $this->encode($data1['pass']);
         $data2['actif'] = 1;
        $data2['nbreAcces'] = 0;
        $this->db->where('matriculeEmploye', $matricule);
        $this->db->update('employe', $data2);
        return $data1;
    }
function genRandomString() 
    {
    $length = 5;
    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    $string ='';    
    for ($p = 0; $p < $length; $p++) {
        $string .= $characters[mt_rand(0, strlen($characters))];
    }
    return $string;
}
    /**
     * fontion qui genere un nom d'usager en combinant les 2 premieres lettres 
     * du prenom avec les 3 premieres du nom de famille. 
     * si le nom d'usager existe deja, alors on lui ajout un suffixe (nombre croissant commencant a 1)
     * @param type $firstName
     * @param type $lastName
     * @return type  
     */
    function generer_login_employe($firstName, $lastName) 
    {
        $loginTest = '';
        // enlever les espaces dans le nom et le prenom
        $lastName = str_replace(' ','',$lastName);
        $firstName = str_replace(' ','',$firstName);
        $firstName = $this->stripAccents($firstName);
        $lastName = $this->stripAccents($lastName);
        if( (strlen($firstName)+ strlen($lastName))<5)
        {
            $loginTest = $this->genRandomString();
        }
        else
        {
            $login = substr($firstName, 0, 2) . substr($lastName, 0, 3);
            $loginTest = $login;
            $valid = true;
            $suffix = 1;
            do {
                $this->db->where('login', $loginTest);
                $query = $this->db->get('employe');

                $this->db->where('login', $loginTest);
                $query2 = $this->db->get('etudiant');

                if ($query->num_rows() > 0 || $query2->num_rows() > 0) {
                    $valid = false;
                    $loginTest = $login . $suffix++;
                }
                else
                    $valid = true;
            }while (!$valid);
        }

        return $loginTest;
    }

    /*
     * fonctiion qui recupere de la bd les infos du departement
     */

    function recuperer_departements() {
        $info_departement = NULL;
        $query = $this->db->query("SELECT  DISTINCT `nom`, `idDepartement` FROM `departement`");
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $info_departement['nomDep'][] = $row['nom'];
                $info_departement['idDepartement'][] = $row['idDepartement'];
            }
        }
        return $info_departement;
    }

    /*
     * fonctiion qui recupere de la BD les informations personnelles d'un employe
     */

    function get_informations($matricule) 
    {
        $this->db->where('matriculeEmploye', $matricule);
        $query = $this->db->get('employe');
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            $data['matricule'] = $row['matriculeEmploye'];
            $data['nom'] = $row['nom'];
            $data['prenom'] = $row['prenom'];
            $data['idDep'] = $row['idDepartement'];
            // Debut Modif Cheikh 29/11/2015
            $data['dernierDiplome'] = $row['dernierDiplome'];
            $data['nationalite'] = $row['nationalite'];
            $data['paysDiplome'] = $row['paysDiplome'];
            $data['telephone1'] = $row['telephone1'];
            $data['telephone2'] = $row['telephone2'];
            $data['compteBancaire'] = $row['compteBancaire'];
            $data['grade'] = $row['grade'];
            // Fin Modif Cheikh 29/11/2015
            $profils = explode(',', $row['idProfil']);
            $checked = array('professeur' => false, 'scolarite' => false, 'secretaire' => false, 'chef_departement' => false, 'administrateur' => false, 'agent' => false);
            foreach ($profils as $profil) {
                $checked[$profil] = true;
            }
            $data['checked'] = $checked;

            $data['username'] = $row['login'];
            $data['mdp'] = $this->decode($row['pass']);
            $data['email'] = $row['email'];
            $data['actif'] = $row['actif'];
            $data['raison'] = $row['raisonInactif'];
            return $data;
        }
    }

    function recuperer_departement($idDep) {
        $data =array();
        $this->db->where('idDepartement', $idDep);
        $query_dep = $this->db->get('departement');
        if ($query_dep->num_rows() > 0) {
            $row = $query_dep->row_array();
            $data['nomDepartement'] = $row['nom'];
            $data['idDepartement'] = $row['idDepartement'];
        }
        return $data;
    }

    function is_one_admin()
    {
        $counter = 0;
        $query = $this->db->get('employe');
        if ($query->num_rows() > 0) 
        {
            foreach ($query->result_array() as $row) 
            {
                if(preg_match('/administrateur/i', $row['idProfil']))
                {
                    $counter++;
                }
                if($counter>0)
                {
                    return TRUE;
                }
                
            }
            if($counter == 0)
                 return FALSE;
        }
       
    }
    /*
     * modification des informations des employes
     */

    function modifier_info_employe($infos) 
    {
        $actif = false;
        if (isset($infos['Actif']))
            $actif = true;

        $profil = array();

        if (isset($infos['enseignant'])) {
            $profil[] = 'professeur';
        }

        if (isset($infos['scolarite'])) {
            $profil[] = 'scolarite';
        }
        if (isset($infos['chef_departement'])) {
            $profil[] = 'chef_departement';
        }
        if (isset($infos['secretaire'])) {
            $profil[] = 'secretaire';
        }
         if (isset($infos['agent'])) {
            $profil[] = 'agent';
        }
        if (isset($infos['administrateur'])) {
            $profil[] = 'administrateur';
        }

        $profils = implode(',', $profil);

        if(!$this->is_one_admin())
        {
            if(!preg_match('/administrateur/i', $profils))
            return FALSE;
        }
        if($actif == 1)
        {
            $data = array(
                'email' => $infos['email'], 'actif' => $actif, 'idProfil' => $profils,
                'idDepartement' => $infos['departement'],
                'raisonInactif' => $infos['raison'],
                'nom' => $infos['nom'],
                'prenom' => $infos['prenom'],
                'nationalite' => $infos['nationalite'],
                'dernierDiplome' => $infos['dernierDiplome'],
                'paysDiplome' => $infos['paysDiplome'],
                'grade' => $infos['grade'],
                'compteBancaire' => $infos['compteBancaire'],
                'telephone1' => $infos['telephone1'],
                'telephone2' => $infos['telephone2'],
                'nbreAcces' => 0
            );
        }
        else
        {
            $data = array(
                'email' => $infos['email'], 'actif' => $actif, 'idProfil' => $profils,
                'idDepartement' => $infos['departement'],
                'raisonInactif' => $infos['raison']
            );
        }

        $this->db->where('matriculeEmploye', $infos['matricule']);
        $this->db->update('employe', $data);
        return TRUE;
    }

    /*
     * recuperation des informations personnelles de l'étudiant
     */

    function get_informations_etudiant($matricule) 
    {
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
            $data['tel2'] = $row['telephone2'];
            $data['telephoneParents'] = $row['telParents'];
            $data['telephoneUrgence'] = $row['telUrgence'];
            $data['contactUrgence'] = $row['contactUrgence'];
            $data['lienParenteContactUrgence'] = $row['lienParenteUrgence'];
            $data['actif'] = $row['actif'];
            $data['raison'] = $row['raisonInactif'];
            
            $data['urlPhoto'] = 'IUP'.$row['photoEtudiant'];
            if (strpos($data['urlPhoto'], "jpg") > 0){
                $data['urlPhoto'] = str_replace('jpg', 'bmp', $data['urlPhoto']);
            }
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
            $data['typeDiplome'] = $row['typeDiplome'];
            $data['anneeObtention'] = $row['anneeObtention'];
            $data['mentionBac'] = $row['mentionBac'];
            $data['rangConcours'] = $row['rangConcours'];
            $data['autreDiplome'] = $row['autreDiplome'];
            $data['commentaireAdmission'] = $row['commentaireAdmission'];

            $idEtab = $row['idEtablissement'];

            $this->db->where('idEtablissement', $idEtab);
            $query = $this->db->get('Etablissement');
            $row = $query->row_array();
            $data['nomEtablissement'] = $row['nom'];
            return $data;
        }
    }

    function modifier_info_etudiant($infos) {

        $actif = false;
        if (isset($infos['Actif']))
            $actif = true;

        $data = array(
            'email' => $infos['email'],
            'nom' => $infos['nom'],
            'nin' => $infos['nin'],
            'prenom' => $infos['prenom'],
            'telephone' => $infos['telephone1'],
            'telephone2' => $infos['telephone2'],
            'contactUrgence' => $infos['contactUrgence'],
            'telUrgence' => $infos['telephoneUrgence'],
            'lienParenteUrgence' => $infos['lienParenteContactUrgence'],
            'telParents' => $infos['telephoneParents'],
            'raisonInactif' => $infos['raison'],
            'actif' => $actif,
            'nationalite' => $infos['nationalite'],
            'login' => $infos['username'],
            'sexe' => $infos['sexe'],
            
        );
        $this->db->where('matriculeEtudiant', $infos['matricule']);
        $this->db->update('etudiant', $data);
        $infoBac = NULL;
        $infos_bac = NULL;

        /** information des etudes anterieures * */
        $infos_bac = array(
            'typeDiplome' => $infos['typeDiplome'],
            'anneeObention' => $infos['yearOb'],
            'mentionBac' => $infos['mention'],
            'rangConcours' => $infos['rang'],
            'autreDiplome' => $infos['autreDip'],
            'commentaireAdmission' => $infos['commentaires']);
        $this->db->where('matriculeEtudiant', $infos['matricule']);
        $query = $this->db->get('etudiant');
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            $infoBac = $row['infoBac'];
            $this->db->where('idinfoBac', $infoBac);
            $this->db->update('etudesanterieures', $infos_bac);
        }
        // mise a jour du nom de l etablisement
        $this->db->where('idinfoBac', $infoBac);
        $query = $this->db->get('etudesAnterieures');
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            $idEtablissement = $row['idEtablissement'];
            $info_etablissement = array('idEtablissement' => $idEtablissement, 'nom' => $infos['nomEtablissement']);
            $this->db->where('idEtablissement', $idEtablissement);
            $this->db->update('etablissement', $info_etablissement);
        }



        /* mise à jour de l'adresse de l'étudiant et des parents */

        $adresse = 0;
        $this->db->where('matriculeEtudiant', $infos['matricule']);
        $query = $this->db->get('etudiant');
        $addresseEtudiant = array('ligne1' => $infos['ligne1'], 'ligne2' => $infos['ligne2'], 'ligne3' => $infos['ligne3'], 'pays' => $infos['pays']);

        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            $adresse = $row['idAdresse'];
            $this->db->where('idAdresse', $adresse);
            $this->db->update('adresses', $addresseEtudiant);
        }

        $adresseP = 0;
        $query = $this->db->get('etudiant');
        $addresseParent = array('ligne1' => $infos['ligne_1'], 'ligne2' => $infos['ligne_2'], 'ligne3' => $infos['ligne_3'], 'pays' => $infos['paysP']);

        if ($query->num_rows() > 0) {
            $adresseP = $row['idAdresseParent'];
            $this->db->where('idAdresse', $adresseP);
            $this->db->update('adresses', $addresseParent);
        }
        return true;
    }

    function get_session_courante() 
    {
        $session_courante = NULL;
        $query = $this->db->get("sessioncourante");
        if ($query->num_rows() > 0) 
        {
            foreach ($query->result_array() as $row) 
            {
                $session_courante['annee'][] = $row['annee'];
                $session_courante['semestre'][] = $row['semestre'];
                $session_courante['dateDebut'][] = $this->decode_date($row['debutCours']);
                $session_courante['dateFin'][] = $this->decode_date($row['finCours']);
				$session_courante['horaireOnOff'] = $row['horaireOnOff'];
            }
        }
		
        return $session_courante;
    }
    function get_grade_ens(){
       $sql = 'SELECT concat(s.statu,c.grade) as grade FROM `categorieenseignant` c,`enseignantstatu` s WHERE s.statu=c.statu';
               
               
        $res = $this->db->query($sql);
        $grade=null;

        if ($res->num_rows() > 0)
        {
            foreach ($res->result_array() as $row) {
                $grade[] =$row['grade'];
            }
            
        }

        return $grade;
       
}
 function modifier_session_courante_calendar($info_session) 
    {
        $data['debutCours'] = $this->convert_date($info_session['dateDebut']);
        $data['finCours'] = $this->convert_date($info_session['dateFin']);
        $data['annee'] = $info_session['annee'];
        $data['semestre'] = $info_session['session'];
        if($data['semestre']='3'){
            $data['annee_univ'] =  $data['annee']%100 +2000;
            $data['semestre_reel'] = 1;
        }else{
            $data['annee_univ'] =  $data['annee']%100-1 +2000;
            $data['semestre_reel'] = 2;
        }
        $this->db->empty_table('sessioncourante_calendar');
        $this->db->insert('sessioncourante_calendar', $data);
    }
    function get_session_courante_calendar() 
    {
        $session_courante = NULL;
        $query = $this->db->get("sessionCourante_calendar");
        if ($query->num_rows() > 0) 
        {
            foreach ($query->result_array() as $row) 
            {
                $session_courante['annee'][] = $row['annee'];
                $session_courante['semestre'][] = $row['semestre'];
                $session_courante['dateDebut'][] = $this->decode_date($row['debutCours']);
                $session_courante['dateFin'][] = $this->decode_date($row['finCours']);
				$session_courante['horaireOnOff'] = $row['horaireOnOff'];
            }
        }
		
        return $session_courante;
    }
     function crer_ou_reinitialiser_password_modification_note($matricule) {
        $data2['matriculeEmploye']=$matricule;
        $this->db->where('matriculeEmploye', $matricule);

        $query=$this->db->get('password_modification_note');
        $data1['pass'] = $this->generer_mdp();
        $data2['pass'] = $this->encode($data1['pass']);
         $data2['actif'] = 1;
        $data2['nbreAcces'] = 0;
        if ($query->num_rows() > 0) 
        {
             $this->db->where('matriculeEmploye', $matricule);
            $this->db->update('password_modification_note', $data2);
        }else{
    //         $data2['matriculeEmploye']=$matricule;
          $this->db->insert('password_modification_note', $data2);
        }
        
        // print_r("fff");
        return $data1;
    }
    /*
        ajouter par: Alioune ZEYN  14/03/2019
     *      */
    //transformation des view en code php
    function test_view_script(){
        $data['message']="bonjour";
        //$this->load->view('administrateur/test_view_script', $data);
    }
    
    /*
        ajouter par: Alioune ZEYN  14/03/2019
     *  retourn les informations 
     *      */
    public function get_parametres_genreaux(){
        $data = '';
        $query=$this->db->query('select *,DATE_FORMAT(date_debut, "%d/%m/%Y") as date_d,DATE_FORMAT(date_fin, "%d/%m/%Y") as date_f from parametres_generaux where date_fin is null');
        foreach ($query->result() as $row) {
            $data = $row;
        }
        return $data;
    }
    
    public function get_all_parametres_genreaux(){
        $data = array();
        $query=$this->db->query('select *,DATE_FORMAT(date_debut, "%d/%m/%Y") as date_d,DATE_FORMAT(date_fin, "%d/%m/%Y") as date_f from parametres_generaux ');
        $i=0;
        foreach ($query->result() as $row) {
            $data[$i] = (array)$row;
            $i++;
        }
        return $data;
    }
    
    public function update_parametres_genreaux($infos) 
    {
        //mise a jour de la date de modificaion
        $query=$this->db->query('UPDATE parametres_generaux SET date_fin = NOW() where date_fin is null');
        echo "<hr>";
        $this->db->insert('parametres_generaux', $infos);
        $query=$this->db->query('UPDATE parametres_generaux SET date_fin = null where date_debut=date_fin');
    }
    function  update_regles_passage($infos){
        //mise a jour de la date de modificaion
        $query=$this->db->query('UPDATE regles_passage SET date_fin = NOW() where date_fin is null and niveau='.$infos["niveau"].' and cycle='.$infos["cycle"]);
        $this->db->insert('regles_passage', $infos);
        $query=$this->db->query('UPDATE regles_passage SET date_fin = null where date_debut=date_fin');
    }
    //***************************
    //MedBakar 30-12-2019
    // correction (update) note_elimination selon le type (matiere,module,semestre)
 function correction_regles_passage($infos){
        $cycle;
        if($infos['cycle']=="licence"){
            $cycle="4";
        }else{
            $cycle="5";
        }
        //$where=array('niveau'=>$infos['niveau'],'cycle'=>$cycle,'date_fin'=>null);
        
         //  $this->db->where($where);
         
       //$query=$this->db->update('regles_passage', $infos);
      $query=$this->db->query("UPDATE regles_passage SET credit=".$infos['credit'].",moyenne=".$infos['moyenne'].",MGL1=".$infos['MGL1'].",ECTSL1=".$infos['ECTSL1'].",MGL2=".$infos['MGL2'].",ECTSL2=".$infos['ECTSL2']."  WHERE date_fin is null AND cycle =4 AND niveau=".$infos['niveau']);
       
        if($query)
            return true;
        else 
            return false;
    }
    //*****************************
    // les notes eliminatoires
    // cette foncion retourne la liste des notes eliminatoires selon le type=(matiere,module,semestre)
    function get_notes_eliminations_licence($type) {
        $requete = $this->db->query("SELECT *,DATE_FORMAT(date_debut,'%d/%m/%Y') as niceDateDebut,DATE_FORMAT(date_fin,'%d/%m/%Y') as niceDateFin FROM note_elimination_$type where cycle=4 ORDER BY cycle");
        $resultat = NULL;
        if ($requete->num_rows() > 0) {
            $resultat = array();
            foreach ($requete->result_array() as $row) {
                $resultat[] = $row;
            }
        }
        return $resultat;
    }
    
    //retourne la note active (niveau licence) et type=(matiere, module, semestre)
    function get_note_elimination_licence($type) {
        $requete = $this->db->query("SELECT note FROM note_elimination_$type where cycle=4 and date_fin is null ORDER BY cycle");
        $resultat = NULL;
        if ($requete->num_rows() > 0) {
            $resultat = array();
            foreach ($requete->result_array() as $row) {
                $resultat[] = $row;
            }
        }
        return $resultat;
    }
    
    function get_notes_eliminations_master($type) {
        $requete = $this->db->query("SELECT *,DATE_FORMAT(date_debut,'%d/%m/%Y') as niceDateDebut,DATE_FORMAT(date_fin,'%d/%m/%Y') as niceDateFin FROM note_elimination_$type where cycle=5 ORDER BY cycle");
        $resultat = NULL;
        if ($requete->num_rows() > 0) {
            $resultat = array();
            foreach ($requete->result_array() as $row) {
                $resultat[] = $row;
            }
        }
        return $resultat;
    }
    
    //retourne la note active (niveau master) et type=(matiere, module, semestre)
    function get_note_elimination_master($type) {
        $requete = $this->db->query("SELECT note FROM note_elimination_$type where cycle=5 and date_fin is null ORDER BY cycle");
        $resultat = NULL;
        if ($requete->num_rows() > 0) {
            $resultat = array();
            foreach ($requete->result_array() as $row) {
                $resultat[] = $row;
            }
        }
        return $resultat;
    }
    
    //verification du mot de passe pour la modification des notes
    function validation_modification_notes_eliminatoires($employe,$pass) {
        $this->db->where('matriculeEmploye',$employe);
        $this->db->where('pass like binary "' . $this->encode($pass) . '"', NULL, FALSE);
        $query = $this->db->get('employe');
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            return true;
        }
        return false;
    }
    
    // correction (update) note_elimination selon le type (matiere,module,semestre)
    function correction_note_elimination($infos){
        if($infos['cycle']=="licence"){
            $cycle="4";
        }else{
            $cycle="5";
        }
        $type=$infos['type'];
       $query=$this->db->query("UPDATE note_elimination_$type SET note=".$infos['note']." WHERE date_fin is null AND cycle = $cycle");
        if($query)
            return true;
        else 
            return false;
    }
    // modification => insertion 
    function modification_note_elimination($infos){
        if($infos['cycle']=="licence"){
            $cycle="4";
        }else{
            $cycle="5";
        }
        $type=$infos['type'];
        $query="UPDATE note_elimination_$type SET date_fin=NOW() WHERE date_fin is null AND cycle = $cycle";
       
        $query=$this->db->query($query);
        //echo '<br>';
        $query="INSERT INTO `note_elimination_$type`(`note`, `cycle`, `date_fin`, `responsable`) "
                . "VALUES"
                . " ('".$infos['note']."','".$cycle."',NULL,'".$infos['responsable']."')";
    //    echo $query;
        $query=$this->db->query($query);
       
        if($query)
            return true;
        else 
            return false;
    }
    function get_all_regles_passage(){
        $data = null;
        $query=$this->db->query('select *,DATE_FORMAT(date_debut, "%d/%m/%Y") as date_d,DATE_FORMAT(date_fin, "%d/%m/%Y") as date_f from regles_passage order by date_debut asc ');
        $i=0;
        foreach ($query->result() as $row) {
            $data[$i] = (array)$row;
            $i++;
        }
        return $data;
    }
    function get_regle_passage_courante(){
        $data = null;
        $query=$this->db->query('select *,DATE_FORMAT(date_debut, "%d/%m/%Y") as date_d,DATE_FORMAT(date_fin, "%d/%m/%Y") as date_f from regles_passage where date_fin is null order by date_debut desc');
        $i=0;
        foreach ($query->result() as $row) {
            $data[$i] = (array)$row;
            $i++;
        }
        return $data;
    }
     // added by fatimetou 04-01-2022
      function plafon_list(){
           //  $data=" ";
        $query1 = $this->db->query("SELECT * FROM `plafon`");
       // echo $query1;
       $i=0;
      $selected=" ";
    // print_r($query1->result_array());
        foreach($query1->result_array() as $row){
              //$data[] = $row;
           
        $data[$i]['id']=$row['id'];
           
            $data[$i]['note']=$row['note'];
           
          if($row['encours'] == 1){
              $selected="checked";
          }
          else{
            $selected=" ";
          } 
        $data[$i]['encours']=$selected;
     
        $data[$i]['annee_activation']=$row['annee_activation'];
           
            $data[$i]['annee_desactivation']=$row['annee_desactivation'];
              $i++;
        }
       
          return $data;
        }
}
