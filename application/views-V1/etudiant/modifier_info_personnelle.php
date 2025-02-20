<?php include(APPPATH.'views/include/header.php');
  include('include/menu.php');
  ?>
   
    <div class="center_content">  

    <div class="right_content">            
        
         <div class="form">
      
     <?php  
     
     echo heading('Modification du profil étudiant','1');
            echo validation_errors('<div class="error_box">', '</div>'); 
             if(isset($errorMessage))
             {
               echo $errorMessage;
             }
            $attributes = array('class' => 'niceform');
         
            echo form_open('etudiant/modifier_information_personnelle',$attributes);?>
         
                    <table class="form" id="info_etudiant">
                         <tr><td><br></td></tr>
                    <tr>
                        <td id="titre"><label>Nom  </label></td>
                        <td id="contenu"><label><?php echo $nom;?></label></td>
                    </tr>
                <tr><td><br></td></tr>
                    <tr>
                        <td id="titre"><label>Prénom </label></td>
                        <td id="contenu"><label><?php echo $prenom;?></label></td>
                    </tr>
                       <tr><td><br></td></tr>
                    <tr>
                        <td id="titre"><label>Surnom </label></td>
                        <td id="contenu"><label><?php echo $surnom;?></label></td>
                    </tr>
                    <tr><td><br></td></tr>
                    <tr>
                        <td id="titre"><label>Nom d'utilisateur </label></td>
                        <td id="contenu"><label><?php echo $username;?></label></td>
                    </tr>
                    <tr><td><br></td></tr>
                    <tr>
                        <td id="titre"><label>Date de naissance </label></td>
                        <td id="contenu"><label><?php echo $dateNaissance;?></label></td>
                    </tr>
                    <tr><td><br></td></tr>
                    <tr>
                        <td id="titre"><label>Genre </label></td>
                        <td id="contenu"><label><?php echo $sexe;?></label></td>
                    </tr>
                    <tr><td><br></td></tr>
                    <tr>
                        <td id="titre"><label>Numéro d'identité nationale </label></td>
                        <td id="contenu"><label><?php echo $nin;?></label></td>
                    </tr>
                    <tr><td><br></td></tr>                    
                    <tr>
                        <td><label>Nationalité </label></td>
                        <td><?php $input = array('type' => 'text', 'size' => '35', 'name'=>'nationalite','disabled' => 'disabled'); 
                             echo form_input($input,$nationalite,'');?></td>
                   </tr>
                    <tr><td><br></td></tr>
                    <tr>
                        <td id="titre"><label>E-mail </label></td>
                       <td><?php $input = array('type' => 'text', 'size' => '35', 'name'=>'email') ;
                             echo form_input($input,$email,'');?>
                        </td>
                    </tr>
                    <tr>
                        <td><label >Téléphone1 </label></td>
                        <td><?php $input = array('type' => 'text', 'size' => '35', 'name'=>'phone1') ;
                             echo form_input($input,$telephone1,'');?>
                        </td>
                    </tr>
                    <tr>
                        <td><label >Téléphone2 </label></td>
                        <td><?php $input = array('type' => 'text', 'size' => '35', 'name'=>'phone2') ;
                             echo form_input($input,$telephone2,'');?>
                        </td>
                    </tr>
                    </table>
             <div><?php echo heading('Adresse','3');?></div>
             <table class="form" id="info_etudiant">
                  
                    <tr>
                        <td style="width: 243px;"><label>Ligne 1 <span style="color:red;font-weight:bold;font-size:14px;">*</span></label></td>
                        <td><?php $input = array('type' => 'text', 'size' => '35', 'name'=>'ligne1') ;
                             echo form_input($input,$ligne1,'required');?></td>
                    </tr>
                    
                    <tr>
                        <td style="width: 243px;"><label>Ligne 2 </label></td>
                        <td><?php $input = array('type' => 'text', 'size' => '35', 'name'=>'ligne2') ;
                             echo form_input($input,$ligne2,'');?></td>
                    </tr>
                     <tr>
                        <td style="width: 243px;"><label>Ville </label></td>
                        <td><?php $input = array('type' => 'text', 'size' => '35', 'name'=>'ligne3') ;
                             echo form_input($input,$ville,'');?></td>
                    </tr>
                    <tr>
                        <td style="width: 243px;"><label>Pays <span style="color:red;font-weight:bold;font-size:14px;">*</span></label></td>
                        <td><?php 
                            echo'<select name="pays" selected="selected">';   
                            echo'
                            <option value="'.$pays.'" selected="selected">'.$pays.' </option>
                            <option value="Afghanistan">Afghanistan </option>
                            <option value="Afrique_Centrale">Afrique_Centrale </option>
                            <option value="Afrique_du_sud">Afrique_du_Sud </option>
                            <option value="Albanie">Albanie </option>
                            <option value="Algerie">Algerie </option>
                            <option value="Allemagne">Allemagne </option>
                            <option value="Andorre">Andorre </option>
                            <option value="Angola">Angola </option>
                            <option value="Anguilla">Anguilla </option>
                            <option value="Arabie_Saoudite">Arabie_Saoudite </option>
                            <option value="Argentine">Argentine </option>
                            <option value="Armenie">Armenie </option>
                            <option value="Australie">Australie </option>
                            <option value="Autriche">Autriche </option>
                            <option value="Azerbaidjan">Azerbaidjan </option>
                            <option value="Bahamas">Bahamas </option>
                            <option value="Bangladesh">Bangladesh </option>
                            <option value="Barbade">Barbade </option>
                            <option value="Bahrein">Bahrein </option>
                            <option value="Belgique">Belgique </option>
                            <option value="Belize">Belize </option>
                            <option value="Benin">Benin </option>
                            <option value="Bermudes">Bermudes </option>
                            <option value="Bielorussie">Bielorussie </option>
                            <option value="Bolivie">Bolivie </option>
                            <option value="Botswana">Botswana </option>
                            <option value="Bhoutan">Bhoutan </option>
                            <option value="Boznie_Herzegovine">Boznie_Herzegovine </option>
                            <option value="Bresil">Bresil </option>
                            <option value="Brunei">Brunei </option>
                            <option value="Bulgarie">Bulgarie </option>
                            <option value="Burkina_Faso">Burkina_Faso </option>
                            <option value="Burundi">Burundi </option>
                            <option value="Caiman">Caiman </option>
                            <option value="Cambodge">Cambodge </option>
                            <option value="Cameroun">Cameroun </option>
                            <option value="Canada">Canada </option>
                            <option value="Canaries">Canaries </option>
                            <option value="Cap_vert">Cap_Vert </option>
                            <option value="Chili">Chili </option>
                            <option value="Chine">Chine </option>
                            <option value="Chypre">Chypre </option>
                            <option value="Colombie">Colombie </option>
                            <option value="Comores">Colombie </option>
                            <option value="Congo">Congo </option>
                            <option value="Congo_democratique">Congo_democratique </option>
                            <option value="Cook">Cook </option>
                            <option value="Coree_du_Nord">Coree_du_Nord </option>
                            <option value="Coree_du_Sud">Coree_du_Sud </option>
                            <option value="Costa_Rica">Costa_Rica </option>
                            <option value="Cote_d_Ivoire">Côte_d_Ivoire </option>
                            <option value="Croatie">Croatie </option>
                            <option value="Cuba">Cuba </option>
                            <option value="Danemark">Danemark </option>
                            <option value="Djibouti">Djibouti </option>
                            <option value="Dominique">Dominique </option>
                            <option value="Egypte">Egypte </option>
                            <option value="Emirats_Arabes_Unis">Emirats_Arabes_Unis </option>
                            <option value="Equateur">Equateur </option>
                            <option value="Erythree">Erythree </option>
                            <option value="Espagne">Espagne </option>
                            <option value="Estonie">Estonie </option>
                            <option value="Etats_Unis">Etats_Unis </option>
                            <option value="Ethiopie">Ethiopie </option>
                            <option value="Falkland">Falkland </option>
                            <option value="Feroe">Feroe </option>
                            <option value="Fidji">Fidji </option>
                            <option value="Finlande">Finlande </option>
                            <option value="France">France </option>
                            <option value="Gabon">Gabon </option>
                            <option value="Gambie">Gambie </option>
                            <option value="Georgie">Georgie </option>
                            <option value="Ghana">Ghana </option>
                            <option value="Gibraltar">Gibraltar </option>
                            <option value="Grece">Grece </option>
                            <option value="Grenade">Grenade </option>
                            <option value="Groenland">Groenland </option>
                            <option value="Guadeloupe">Guadeloupe </option>
                            <option value="Guam">Guam </option>
                            <option value="Guatemala">Guatemala</option>
                            <option value="Guernesey">Guernesey </option>
                            <option value="Guinee">Guinee </option>
                            <option value="Guinee_Bissau">Guinee_Bissau </option>
                            <option value="Guinee equatoriale">Guinee_Equatoriale </option>
                            <option value="Guyana">Guyana </option>
                            <option value="Guyane_Francaise ">Guyane_Francaise </option>
                            <option value="Haiti">Haiti </option>
                            <option value="Hawaii">Hawaii </option>
                            <option value="Honduras">Honduras </option>
                            <option value="Hong_Kong">Hong_Kong </option>
                            <option value="Hongrie">Hongrie </option>
                            <option value="Inde">Inde </option>
                            <option value="Indonesie">Indonesie </option>
                            <option value="Iran">Iran </option>
                            <option value="Iraq">Iraq </option>
                            <option value="Irlande">Irlande </option>
                            <option value="Islande">Islande </option>
                            <option value="Israel">Israel </option>
                            <option value="Italie">italie </option>
                            <option value="Jamaique">Jamaique </option>
                            <option value="Jan Mayen">Jan Mayen </option>
                            <option value="Japon">Japon </option>
                            <option value="Jersey">Jersey </option>
                            <option value="Jordanie">Jordanie </option>
                            <option value="Kazakhstan">Kazakhstan </option>
                            <option value="Kenya">Kenya </option>
                            <option value="Kirghizstan">Kirghizistan </option>
                            <option value="Kiribati">Kiribati </option>
                            <option value="Koweit">Koweit </option>
                            <option value="Laos">Laos </option>
                            <option value="Lesotho">Lesotho </option>
                            <option value="Lettonie">Lettonie </option>
                            <option value="Liban">Liban </option>
                            <option value="Liberia">Liberia </option>
                            <option value="Liechtenstein">Liechtenstein </option>
                            <option value="Lituanie">Lituanie </option>
                            <option value="Luxembourg">Luxembourg </option>
                            <option value="Lybie">Lybie </option>
                            <option value="Macao">Macao </option>
                            <option value="Macedoine">Macedoine </option>
                            <option value="Madagascar">Madagascar </option>
                            <option value="Madère">Madère </option>
                            <option value="Malaisie">Malaisie </option>
                            <option value="Malawi">Malawi </option>
                            <option value="Maldives">Maldives </option>
                            <option value="Mali">Mali </option>
                            <option value="Malte">Malte </option>
                            <option value="Man">Man </option>
                            <option value="Mariannes du Nord">Mariannes du Nord </option>
                            <option value="Maroc">Maroc </option>
                            <option value="Marshall">Marshall </option>
                            <option value="Martinique">Martinique </option>
                            <option value="Maurice">Maurice </option>
                            <option value="Mauritanie" >Mauritanie </option>
                            <option value="Mayotte">Mayotte </option>
                            <option value="Mexique">Mexique </option>
                            <option value="Micronesie">Micronesie </option>
                            <option value="Midway">Midway </option>
                            <option value="Moldavie">Moldavie </option>
                            <option value="Monaco">Monaco </option>
                            <option value="Mongolie">Mongolie </option>
                            <option value="Montserrat">Montserrat </option>
                            <option value="Mozambique">Mozambique </option>
                            <option value="Namibie">Namibie </option>
                            <option value="Nauru">Nauru </option>
                            <option value="Nepal">Nepal </option>
                            <option value="Nicaragua">Nicaragua </option>
                            <option value="Niger">Niger </option>
                            <option value="Nigeria">Nigeria </option>
                            <option value="Niue">Niue </option>
                            <option value="Norfolk">Norfolk </option>
                            <option value="Norvege">Norvege </option>
                            <option value="Nouvelle_Caledonie">Nouvelle_Caledonie </option>
                            <option value="Nouvelle_Zelande">Nouvelle_Zelande </option>
                            <option value="Oman">Oman </option>
                            <option value="Ouganda">Ouganda </option>
                            <option value="Ouzbekistan">Ouzbekistan </option>
                            <option value="Pakistan">Pakistan </option>
                            <option value="Palau">Palau </option>
                            <option value="Palestine">Palestine </option>
                            <option value="Panama">Panama </option>
                            <option value="Papouasie_Nouvelle_Guinee">Papouasie_Nouvelle_Guinee </option>
                            <option value="Paraguay">Paraguay </option>
                            <option value="Pays_Bas">Pays_Bas </option>
                            <option value="Perou">Perou </option>
                            <option value="Philippines">Philippines </option>
                            <option value="Pologne">Pologne </option>
                            <option value="Polynesie">Polynesie </option>
                            <option value="Porto_Rico">Porto_Rico </option>
                            <option value="Portugal">Portugal </option>
                            <option value="Qatar">Qatar </option>
                            <option value="Republique_Dominicaine">Republique_Dominicaine </option>
                            <option value="Republique_Tcheque">Republique_Tcheque </option>
                            <option value="Reunion">Reunion </option>
                            <option value="Roumanie">Roumanie </option>
                            <option value="Royaume_Uni">Royaume_Uni </option>
                            <option value="Russie">Russie </option>
                            <option value="Rwanda">Rwanda </option>
                            <option value="Sahara Occidental">Sahara Occidental </option>
                            <option value="Sainte_Lucie">Sainte_Lucie </option>
                            <option value="Saint_Marin">Saint_Marin </option>
                            <option value="Salomon">Salomon </option>
                            <option value="Salvador">Salvador </option>
                            <option value="Samoa_Occidentales">Samoa_Occidentales</option>
                            <option value="Samoa_Americaine">Samoa_Americaine </option>
                            <option value="Sao_Tome_et_Principe">Sao_Tome_et_Principe </option>
                            <option value="Senegal">Senegal </option>
                            <option value="Seychelles">Seychelles </option>
                            <option value="Sierra Leone">Sierra Leone </option>
                            <option value="Singapour">Singapour </option>
                            <option value="Slovaquie">Slovaquie </option>
                            <option value="Slovenie">Slovenie</option>
                            <option value="Somalie">Somalie </option>
                            <option value="Soudan">Soudan </option>
                            <option value="Sri_Lanka">Sri_Lanka </option>
                            <option value="Suede">Suede </option>
                            <option value="Suisse">Suisse </option>
                            <option value="Surinam">Surinam </option>
                            <option value="Swaziland">Swaziland </option>
                            <option value="Syrie">Syrie </option>
                            <option value="Tadjikistan">Tadjikistan </option>
                            <option value="Taiwan">Taiwan </option>
                            <option value="Tonga">Tonga </option>
                            <option value="Tanzanie">Tanzanie </option>
                            <option value="Tchad">Tchad </option>
                            <option value="Thailande">Thailande </option>
                            <option value="Tibet">Tibet </option>
                            <option value="Timor_Oriental">Timor_Oriental </option>
                            <option value="Togo">Togo </option>
                            <option value="Trinite_et_Tobago">Trinite_et_Tobago </option>
                            <option value="Tristan da cunha">Tristan de cuncha </option>
                            <option value="Tunisie">Tunisie </option>
                            <option value="Turkmenistan">Turmenistan </option>
                            <option value="Turquie">Turquie </option>
                            <option value="Ukraine">Ukraine </option>
                            <option value="Uruguay">Uruguay </option>
                            <option value="Vanuatu">Vanuatu </option>
                            <option value="Vatican">Vatican </option>
                            <option value="Venezuela">Venezuela </option>
                            <option value="Vierges_Americaines">Vierges_Americaines </option>
                            <option value="Vierges_Britanniques">Vierges_Britanniques </option>
                            <option value="Vietnam">Vietnam </option>
                            <option value="Wake">Wake </option>
                            <option value="Wallis et Futuma">Wallis et Futuma </option>
                            <option value="Yemen">Yemen </option>
                            <option value="Yougoslavie">Yougoslavie </option>
                            <option value="Zambie">Zambie </option>
                            <option value="Zimbabwe">Zimbabwe </option>';
                            echo'</select>';
                             echo form_error('pays','<span class="error">','</span>');
                            ?>
                        </td>
                    </tr>
                    </table>
             
             <div><?php echo heading('Informations des parents','3');?></div>
               <table class="form" id="info_etudiant">    
                   <tr>
                        <td style="width: 243px;"><label>Nom et Prénom </label></td>
                        <td><?php $input = array('type' => 'text', 'size' => '35', 'name'=>'nomParents',
                       'disabled' => 'disabled') ;
                             echo form_input($input,$nomParents,'');?></td>
                  </tr>
                   <tr>
                        <td style="width: 243px;"><label>Ligne1 </label></td>
                        <td><?php $input = array('type' => 'text', 'size' => '35', 'name'=>'ligne_1') ;
                             echo form_input($input,$ligne_1,'');?></td>
                  </tr>
                   <tr>
                        <td style="width: 243px;"><label>Ligne2 </label></td>
                        <td><?php $input = array('type' => 'text', 'size' => '35', 'name'=>'ligne_2') ;
                             echo form_input($input,$ligne_2,'');?></td>
                  </tr>
                   <tr>
                        <td style="width: 243px;"><label>Ville </label></td>
                        <td><?php $input = array('type' => 'text', 'size' => '35', 'name'=>'ligne_3') ;
                             echo form_input($input,$ville_P,'');?></td>
                  </tr>
                  
                  
                   <tr>
                        <td style="width: 243px;"><label>Pays </label></td>
                         <td><?php 
                            echo'<select name="paysP" selected="selected">';   
                            echo'
                            <option value=" '.$paysP.' " selected="selected">'.$paysP.' </option>
                            <option value="Afghanistan">Afghanistan </option>
                            <option value="Afrique_Centrale">Afrique_Centrale </option>
                            <option value="Afrique_du_sud">Afrique_du_Sud </option>
                            <option value="Albanie">Albanie </option>
                            <option value="Algerie">Algerie </option>
                            <option value="Allemagne">Allemagne </option>
                            <option value="Andorre">Andorre </option>
                            <option value="Angola">Angola </option>
                            <option value="Anguilla">Anguilla </option>
                            <option value="Arabie_Saoudite">Arabie_Saoudite </option>
                            <option value="Argentine">Argentine </option>
                            <option value="Armenie">Armenie </option>
                            <option value="Australie">Australie </option>
                            <option value="Autriche">Autriche </option>
                            <option value="Azerbaidjan">Azerbaidjan </option>
                            <option value="Bahamas">Bahamas </option>
                            <option value="Bangladesh">Bangladesh </option>
                            <option value="Barbade">Barbade </option>
                            <option value="Bahrein">Bahrein </option>
                            <option value="Belgique">Belgique </option>
                            <option value="Belize">Belize </option>
                            <option value="Benin">Benin </option>
                            <option value="Bermudes">Bermudes </option>
                            <option value="Bielorussie">Bielorussie </option>
                            <option value="Bolivie">Bolivie </option>
                            <option value="Botswana">Botswana </option>
                            <option value="Bhoutan">Bhoutan </option>
                            <option value="Boznie_Herzegovine">Boznie_Herzegovine </option>
                            <option value="Bresil">Bresil </option>
                            <option value="Brunei">Brunei </option>
                            <option value="Bulgarie">Bulgarie </option>
                            <option value="Burkina_Faso">Burkina_Faso </option>
                            <option value="Burundi">Burundi </option>
                            <option value="Caiman">Caiman </option>
                            <option value="Cambodge">Cambodge </option>
                            <option value="Cameroun">Cameroun </option>
                            <option value="Canada">Canada </option>
                            <option value="Canaries">Canaries </option>
                            <option value="Cap_vert">Cap_Vert </option>
                            <option value="Chili">Chili </option>
                            <option value="Chine">Chine </option>
                            <option value="Chypre">Chypre </option>
                            <option value="Colombie">Colombie </option>
                            <option value="Comores">Colombie </option>
                            <option value="Congo">Congo </option>
                            <option value="Congo_democratique">Congo_democratique </option>
                            <option value="Cook">Cook </option>
                            <option value="Coree_du_Nord">Coree_du_Nord </option>
                            <option value="Coree_du_Sud">Coree_du_Sud </option>
                            <option value="Costa_Rica">Costa_Rica </option>
                            <option value="Cote_d_Ivoire">Côte_d_Ivoire </option>
                            <option value="Croatie">Croatie </option>
                            <option value="Cuba">Cuba </option>
                            <option value="Danemark">Danemark </option>
                            <option value="Djibouti">Djibouti </option>
                            <option value="Dominique">Dominique </option>
                            <option value="Egypte">Egypte </option>
                            <option value="Emirats_Arabes_Unis">Emirats_Arabes_Unis </option>
                            <option value="Equateur">Equateur </option>
                            <option value="Erythree">Erythree </option>
                            <option value="Espagne">Espagne </option>
                            <option value="Estonie">Estonie </option>
                            <option value="Etats_Unis">Etats_Unis </option>
                            <option value="Ethiopie">Ethiopie </option>
                            <option value="Falkland">Falkland </option>
                            <option value="Feroe">Feroe </option>
                            <option value="Fidji">Fidji </option>
                            <option value="Finlande">Finlande </option>
                            <option value="France">France </option>
                            <option value="Gabon">Gabon </option>
                            <option value="Gambie">Gambie </option>
                            <option value="Georgie">Georgie </option>
                            <option value="Ghana">Ghana </option>
                            <option value="Gibraltar">Gibraltar </option>
                            <option value="Grece">Grece </option>
                            <option value="Grenade">Grenade </option>
                            <option value="Groenland">Groenland </option>
                            <option value="Guadeloupe">Guadeloupe </option>
                            <option value="Guam">Guam </option>
                            <option value="Guatemala">Guatemala</option>
                            <option value="Guernesey">Guernesey </option>
                            <option value="Guinee">Guinee </option>
                            <option value="Guinee_Bissau">Guinee_Bissau </option>
                            <option value="Guinee equatoriale">Guinee_Equatoriale </option>
                            <option value="Guyana">Guyana </option>
                            <option value="Guyane_Francaise ">Guyane_Francaise </option>
                            <option value="Haiti">Haiti </option>
                            <option value="Hawaii">Hawaii </option>
                            <option value="Honduras">Honduras </option>
                            <option value="Hong_Kong">Hong_Kong </option>
                            <option value="Hongrie">Hongrie </option>
                            <option value="Inde">Inde </option>
                            <option value="Indonesie">Indonesie </option>
                            <option value="Iran">Iran </option>
                            <option value="Iraq">Iraq </option>
                            <option value="Irlande">Irlande </option>
                            <option value="Islande">Islande </option>
                            <option value="Israel">Israel </option>
                            <option value="Italie">italie </option>
                            <option value="Jamaique">Jamaique </option>
                            <option value="Jan Mayen">Jan Mayen </option>
                            <option value="Japon">Japon </option>
                            <option value="Jersey">Jersey </option>
                            <option value="Jordanie">Jordanie </option>
                            <option value="Kazakhstan">Kazakhstan </option>
                            <option value="Kenya">Kenya </option>
                            <option value="Kirghizstan">Kirghizistan </option>
                            <option value="Kiribati">Kiribati </option>
                            <option value="Koweit">Koweit </option>
                            <option value="Laos">Laos </option>
                            <option value="Lesotho">Lesotho </option>
                            <option value="Lettonie">Lettonie </option>
                            <option value="Liban">Liban </option>
                            <option value="Liberia">Liberia </option>
                            <option value="Liechtenstein">Liechtenstein </option>
                            <option value="Lituanie">Lituanie </option>
                            <option value="Luxembourg">Luxembourg </option>
                            <option value="Lybie">Lybie </option>
                            <option value="Macao">Macao </option>
                            <option value="Macedoine">Macedoine </option>
                            <option value="Madagascar">Madagascar </option>
                            <option value="Madère">Madère </option>
                            <option value="Malaisie">Malaisie </option>
                            <option value="Malawi">Malawi </option>
                            <option value="Maldives">Maldives </option>
                            <option value="Mali">Mali </option>
                            <option value="Malte">Malte </option>
                            <option value="Man">Man </option>
                            <option value="Mariannes du Nord">Mariannes du Nord </option>
                            <option value="Maroc">Maroc </option>
                            <option value="Marshall">Marshall </option>
                            <option value="Martinique">Martinique </option>
                            <option value="Maurice">Maurice </option>
                            <option value="Mauritanie" >Mauritanie </option>
                            <option value="Mayotte">Mayotte </option>
                            <option value="Mexique">Mexique </option>
                            <option value="Micronesie">Micronesie </option>
                            <option value="Midway">Midway </option>
                            <option value="Moldavie">Moldavie </option>
                            <option value="Monaco">Monaco </option>
                            <option value="Mongolie">Mongolie </option>
                            <option value="Montserrat">Montserrat </option>
                            <option value="Mozambique">Mozambique </option>
                            <option value="Namibie">Namibie </option>
                            <option value="Nauru">Nauru </option>
                            <option value="Nepal">Nepal </option>
                            <option value="Nicaragua">Nicaragua </option>
                            <option value="Niger">Niger </option>
                            <option value="Nigeria">Nigeria </option>
                            <option value="Niue">Niue </option>
                            <option value="Norfolk">Norfolk </option>
                            <option value="Norvege">Norvege </option>
                            <option value="Nouvelle_Caledonie">Nouvelle_Caledonie </option>
                            <option value="Nouvelle_Zelande">Nouvelle_Zelande </option>
                            <option value="Oman">Oman </option>
                            <option value="Ouganda">Ouganda </option>
                            <option value="Ouzbekistan">Ouzbekistan </option>
                            <option value="Pakistan">Pakistan </option>
                            <option value="Palau">Palau </option>
                            <option value="Palestine">Palestine </option>
                            <option value="Panama">Panama </option>
                            <option value="Papouasie_Nouvelle_Guinee">Papouasie_Nouvelle_Guinee </option>
                            <option value="Paraguay">Paraguay </option>
                            <option value="Pays_Bas">Pays_Bas </option>
                            <option value="Perou">Perou </option>
                            <option value="Philippines">Philippines </option>
                            <option value="Pologne">Pologne </option>
                            <option value="Polynesie">Polynesie </option>
                            <option value="Porto_Rico">Porto_Rico </option>
                            <option value="Portugal">Portugal </option>
                            <option value="Qatar">Qatar </option>
                            <option value="Republique_Dominicaine">Republique_Dominicaine </option>
                            <option value="Republique_Tcheque">Republique_Tcheque </option>
                            <option value="Reunion">Reunion </option>
                            <option value="Roumanie">Roumanie </option>
                            <option value="Royaume_Uni">Royaume_Uni </option>
                            <option value="Russie">Russie </option>
                            <option value="Rwanda">Rwanda </option>
                            <option value="Sahara Occidental">Sahara Occidental </option>
                            <option value="Sainte_Lucie">Sainte_Lucie </option>
                            <option value="Saint_Marin">Saint_Marin </option>
                            <option value="Salomon">Salomon </option>
                            <option value="Salvador">Salvador </option>
                            <option value="Samoa_Occidentales">Samoa_Occidentales</option>
                            <option value="Samoa_Americaine">Samoa_Americaine </option>
                            <option value="Sao_Tome_et_Principe">Sao_Tome_et_Principe </option>
                            <option value="Senegal">Senegal </option>
                            <option value="Seychelles">Seychelles </option>
                            <option value="Sierra Leone">Sierra Leone </option>
                            <option value="Singapour">Singapour </option>
                            <option value="Slovaquie">Slovaquie </option>
                            <option value="Slovenie">Slovenie</option>
                            <option value="Somalie">Somalie </option>
                            <option value="Soudan">Soudan </option>
                            <option value="Sri_Lanka">Sri_Lanka </option>
                            <option value="Suede">Suede </option>
                            <option value="Suisse">Suisse </option>
                            <option value="Surinam">Surinam </option>
                            <option value="Swaziland">Swaziland </option>
                            <option value="Syrie">Syrie </option>
                            <option value="Tadjikistan">Tadjikistan </option>
                            <option value="Taiwan">Taiwan </option>
                            <option value="Tonga">Tonga </option>
                            <option value="Tanzanie">Tanzanie </option>
                            <option value="Tchad">Tchad </option>
                            <option value="Thailande">Thailande </option>
                            <option value="Tibet">Tibet </option>
                            <option value="Timor_Oriental">Timor_Oriental </option>
                            <option value="Togo">Togo </option>
                            <option value="Trinite_et_Tobago">Trinite_et_Tobago </option>
                            <option value="Tristan da cunha">Tristan de cuncha </option>
                            <option value="Tunisie">Tunisie </option>
                            <option value="Turkmenistan">Turmenistan </option>
                            <option value="Turquie">Turquie </option>
                            <option value="Ukraine">Ukraine </option>
                            <option value="Uruguay">Uruguay </option>
                            <option value="Vanuatu">Vanuatu </option>
                            <option value="Vatican">Vatican </option>
                            <option value="Venezuela">Venezuela </option>
                            <option value="Vierges_Americaines">Vierges_Americaines </option>
                            <option value="Vierges_Britanniques">Vierges_Britanniques </option>
                            <option value="Vietnam">Vietnam </option>
                            <option value="Wake">Wake </option>
                            <option value="Wallis et Futuma">Wallis et Futuma </option>
                            <option value="Yemen">Yemen </option>
                            <option value="Yougoslavie">Yougoslavie </option>
                            <option value="Zambie">Zambie </option>
                            <option value="Zimbabwe">Zimbabwe </option>';
                            echo'</select>';
                             echo form_error('paysP','<span class="error">','</span>');
                            ?>
                        </td>
                  </tr>
                         
                  <tr>
                       <td style="width: 243px;"><label>Téléphone </label></td>
                        <td><?php $input = array('type' => 'text', 'size' => '35', 'name'=>'telephoneParents') ;
                             echo form_input($input,$telephoneParents,'');
                             echo form_error('telephoneParents','<span class="error">','</span>');?></td>
                  </tr>
                  </table>
              <div><?php echo heading('Contact d\'urgence','3');?></div>
               <table class="form" id="info_etudiant">
                   <tr>
                       <td style="width: 243px;"><label >Contact d'urgence </label></td>
                        <td><?php $input = array('type' => 'text', 'size' => '35', 'name'=>'contactUrgence'); 
                             echo form_input($input,$contactUrgence,'');?></td>
                    </tr>

                  
                    <tr>
                        <td style="width: 243px;"><label>Lien de parenté </label></td>
                        <td><?php $input = array('type' => 'text', 'size' => '35', 'name'=>'lienParenteContactUrgence'); 
                                echo form_input($input, $lienParenteContactUrgence,'');
                                ?></td>
                    </tr>
                  
                   <tr>
                       <td style="width: 243px;"><label>Téléphone d'urgence </label></td>
                        <td><?php $input = array('type' => 'text', 'size' => '35', 'name'=>'telephoneUrgence'); 
                             echo form_input($input, $telephoneUrgence,'');?></td>
                  </tr>
             
                  </table>
              <div><?php echo heading('Études antérieures', '3'); ?></div>
        <div class="clear"></div>
        <table class="form" id="info_etudiant">
            <tr>
                <td style="width: 243px;"><label >Baccalauréat obtenu :</label></td>
                <td><?php
                    $input = array('type' => 'text', 'disabled' => 'disabled', 'size' => '35', 'name' => 'typeDiplome');
                    echo form_input($input, $infoBac, 'required');
        ?></td>
            </tr>

            <tr>
                <td style="width: 243px;"><label>Nom de l'établissement :</label></td>
                <td><?php
                    $input = array('type' => 'text', 'disabled' => 'disabled', 'size' => '50', 'name' => 'nomEtablissement');
                    echo form_input($input, $nomEtablissement, 'required');
                    echo form_error('nom etablissement', '<span class="error">', '</span>');
        ?></td>
            </tr>

            <tr>
                <td style="width: 243px;"><label>Année d'obtention :</label></td>
                <td><?php
                    $input = array('type' => 'text', 'disabled' => 'disabled', 'size' => '35', 'name' => 'dateObtention');
                    echo form_input($input, $anneeObtention, 'required');
                    echo form_error('date d\'obtention', '<span class="error">', '</span>');
        ?></td>    </tr>
		
            <tr>

                <td style="width: 243px;"><label>Moyenne au baccalauréat :</label></td>
                <td><?php
                    $input = array('type' => 'text', 'disabled' => 'disabled', 'size' => '35', 'name' => 'mention');
                    echo form_input($input, $moyenneBac, 'required');
                    echo form_error('mention', '<span class="error">', '</span>');
        ?></td>
            </tr>
			<tr>

                <td style="width: 243px;"><label>Information de la session d'obtention :</label></td>
                <td><?php
                    $input = array('type' => 'text', 'disabled' => 'disabled', 'size' => '35', 'name' => 'sessionNormale');
                    echo form_input($input, $sessionNormale, 'required'); ?>
				</td>
            </tr>
            <tr>
                <td style="width: 243px;"><label>Autre diplôme :</label></td>
                <td><?php
                    $input = array('type' => 'text', 'disabled' => 'disabled', 'size' => '35', 'name' => 'autre diplome');
                    echo form_input($input, $autreDiplome, 'required');
                    echo form_error('autre diplome', '<span class="error">', '</span>');
        ?></td>
            </tr>
        </table>
        
        <div class="clear"></div>
        <table class="form" id="info_etudiant">
            
            <tr>
                <td><label>Programme  actuel :</label></td>
                <td><?php
                      
    
  if ($programme_etudiant[0]['idProgramme'] !=NULL )
  {
        foreach ($programme_etudiant[0]['idProgramme'] as $prog) {
           echo'<ul>
        <li>'.$prog.'</li>

        </ul>';
        }
  }
  else
  {
         echo'<ul>
        <li>Aucun programme</li>

        </ul>';
  }
        
  
        ?></td>
            </tr>
            <tr>
                <td><label>Grade actuel :</label></td>
                <td><ul><li><?php echo $grade;?></li></ul></td>
            </tr>
              <tr class="submit">
                  <td></td>
                  <td>
                         <?php $pw = array('type' => 'submit', 'name' => 'submit', 'id'=>'submit', 'value'=>'Enregistrer'); 
                             echo form_input($pw);?>
                  </td>
              </tr>
             </table>
         </form>
         </div>  
      
     
     </div><!-- end of right content-->
            
                    
  </div>   <!--end of center content -->               
                    
                    
    
    
    <div class="clear"></div>
    </div> <!--end of main content-->
	
    
  <?php include(APPPATH.'views/include/footer.php');?>