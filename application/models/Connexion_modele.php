 <?php

class Connexion_modele extends CI_Model
{
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
     * fonction qui genere le mot de passe des utilisateurs de SIGA
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
	
	function check_id($pseudo,$pass)
	{
            
//            echo $this->encode('cheikh');
           
        
		$this->db->where('login',$pseudo);
		$this->db->where('pass like binary "'.  $this->encode($pass). '"', NULL, FALSE);
		$query = $this->db->get('employe');

		if($query->num_rows()>0)
		{
                   $row = $query->row_array();
                   if(! $row['actif'])
                       return -1;

                   $idTypes = explode(',', $row['idProfil']);
                   $connexion_ids = array('nom' => $row['nom'],
                       'prenom' => $row['prenom'],
                       'matriculeEmploye' => $row['matriculeEmploye'],
                       'profil' => $idTypes);
                   
                    $this->session->set_userdata($connexion_ids);
                    return $idTypes;             
                    
                }
                else
                {
                    $this->db->where('login',$pseudo);
                    $this->db->where('pass like binary "'.  $this->encode($pass). '"', NULL, FALSE);
                    $query = $this->db->get('etudiant');
                    if($query->num_rows()>0)
                    {
                       $row = $query->row_array();
                       if(! $row['actif'])
                        return -1;

                       $connexion_ids = array('nom' => $row['nom'],
                        'prenom' => $row['prenom'], 
                           'profil' => array('etudiant'),
                           'surnom' =>$row['surnom']); 

                        $this->session->set_userdata($connexion_ids);
                        return 'etudiant';             
                    }
                    else
                        return null;
                }
	}
        
        function remisAZero($username)
        {
            $user = array('nbreAcces' => 0);
            $this->db->where('login', $username);
            $query = $this->db->get('etudiant');
            if($query->num_rows()>0)
            {
                $this->db->where('login', $username);
                $this->db->update('etudiant', $user);
            }
            else
            {
                $this->db->where('login', $username);
                $query = $this->db->get('employe'); 
                if($query->num_rows()>0)
                {
                    $this->db->where('login', $username);
                    $this->db->update('employe', $user);
                }
            }
                
        }
        		
		 function codeErrone($pseudo)
        {
            $messageRetour ='';
            $this->db->where('login',$pseudo);
            $query = $this->db->get('etudiant');
            if($query->num_rows()>0)
            {
                $row = $query->row_array();
                $nbreAcces = $row['nbreAcces'] + 1;
                $data = array('nbreAcces' => $nbreAcces);
                $this->db->where('login', $pseudo);
                $this->db->update('etudiant', $data);
                if($nbreAcces <3)
                {
                    if($nbreAcces == 2)
                    {
                        $messageRetour .='Le mot de passe est erroné. Il vous
                        reste '.(3-$nbreAcces) .' essai.';
                    }
                    else
                    {
                        $messageRetour .='Le mot de passe est erroné. Il vous
                        reste '.(3-$nbreAcces) .' essais.';
                    }
                }
                else	// nbreAcces = 3, message simplifié
                {
                    $data1['pass'] = $this->generer_mdp();
						$data2['pass'] = $this->encode($data1['pass']);
						$data2['nbreAcces'] = 3; 
                    $this->db->where('login', $pseudo);
                    $this->db->update('etudiant', $data2);
					$messageRetour .='<b>Le compte '.$pseudo.' est bloqué : </b>
                    veuillez contacter le Service de la scolarité.';
                }
            }
            else
            {
                $this->db->where('login',$pseudo);
                $query = $this->db->get('employe');
                if($query->num_rows()>0)
                {
                    $row = $query->row_array();
                    $nbreAcce = $row['nbreAcces'] + 1;
                    $data = array('nbreAcces' => $nbreAcce);
                    $this->db->where('login', $pseudo);
                    $this->db->update('employe', $data);
                    if($nbreAcce < 3)
                    {
                        if($nbreAcce == 2)
                        {
                            $messageRetour .='Le mot de passe est erroné. Il vous
                            reste '.(3-$nbreAcce) .' essai.';
                        }
                        else
                        {
                            $messageRetour .='Le mot de passe est erroné. Il vous
                            reste '.(3-$nbreAcce) .' essais.';
                        }
                    }
                    else	// nbreAcces = 3, message simplifié
                    {
						$data1['pass'] = $this->generer_mdp();
						$data2['pass'] = $this->encode($data1['pass']);
						$data2['nbreAcces'] = 3;
                        $this->db->where('login', $pseudo);
                        $this->db->update('employe', $data2);
                        $messageRetour .='<b>Le compte '.$pseudo.' est bloqué : </b>
                        veuillez contacter le Service de la scolarité.';
                    }
                    
                }
                else
                {
                    $messageRetour .= 'Le code d\'accès <b>'.$pseudo. '</b> n\'existe pas.';
                }
            }
            return $messageRetour;
        }
        function check_id_for_pass($pseudo,$pass)
	{
        
		$this->db->where('matriculeEmploye',$pseudo);
		$this->db->where('pass like binary "'.  $this->encode($pass). '"', NULL, FALSE);
		$query = $this->db->get('password_modification_note');

		if($query->num_rows()>0)
		{
                   $row = $query->row_array();
                   if(! $row['actif'])
                       return -1;

                   
                   $connexion_ids = array(
                       'matriculeEmploye' => $row['matriculeEmploye']);
                   
                    $this->session->set_userdata($connexion_ids);
                    return $connexion_ids;             
                    
                }
                
	}
        
}
