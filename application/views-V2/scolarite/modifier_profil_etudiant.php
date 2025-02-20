<?php
include(APPPATH.'views/include/header.php');
include('include/menu.php');
?>

 <div class="container">
    <div class="col-xs-12 hl-left">
    <div class="row">
        <div class="col-sm-offset-3 col-lg-6 col-sm-6 well">              
        <?php
        echo validation_errors('<div class="error_box">', '</div>'); 
        echo heading('Modification du profil étudiant', '3');
        echo heading('Informations personnelles', '3');
?> 
        <div class="col-lg-4 col-sm-12">
           <!--
                <form action="scolarite/modifier_information_perso_etudiant" method="post" enctype="multipart/form-data">
    Select image to upload:
           -->
            <?php echo form_open_multipart('scolarite/modifier_photo_etudiant/'.$matricule);?>
    <input type="file" name="fileToUpload" id="fileToUpload"  accept="image/*">
    <br>    
    <input type="submit" value="Upload" name="submit">
</form>
              
              <img  style="width: 100px; height: 100px;" src="<?php
                        if(file_exists(FCPATH."photos/". $matricule.'.GIF'))
        echo "../../../photos/".$matricule.'.GIF';
        else 
            if(file_exists(FCPATH."photos/". $matricule.'.bmp'))
               echo "../../../photos/".$matricule.'.bmp';
            else 
                if(file_exists(FCPATH."photos/". $matricule.'.jpg'))
                    echo "../../../photos/".$matricule.'.jpg';
                else 
                    echo "../../../photos/". $matricule.'.png'; 
              
              
        
       /* if(file_exists("C:\wamp\www\laureat\photos\IUP".$matricule.'.GIF'))
        echo "../../../photos/IUP".$matricule.'.GIF';
        else echo "../../../photos/IUP".$matricule.'.bmp'; */
   ?> "onerror="this.src='../../../photos/default.gif';"/>
              
                </div>
             
          <?php          
        echo form_open('scolarite/modifier_information_perso_etudiant');

        echo form_fieldset();
        ?> 
        <?php echo form_hidden('matricule',$matricule); ?>
            <div class="form-group">
            <div class="row colbox">
            
            <div class="col-lg-4 col-sm-4">  
        <label>Matricule </label>
               </div>
            <div class="col-lg-8 col-sm-8"><label><big><big><b><?php echo $matricule; ?></b></big></big></label>
            </div>
                </div>
                </div>
            <div class="form-group">
            <div class="row colbox">
            <div class="controls form-inline">
            <div class="col-lg-4 col-sm-4">
               
            <label>Code d'accès </label>
                </div>
             <div class="col-lg-4 col-sm-8">
            <label ><?php echo $username; ?></label>
            </div>
             <div class="col-lg-4 col-sm-12">
           
                
               <!--
                <img style="width: 100px; height: 100px;" src="<?php
        if($urlPhoto!='')
        echo "../../../photos/".$urlPhoto; 
        else
            echo "../../../photos/default.gif";  
        ?>" onerror="this.src='../../../photos/default.gif';"/>
               -->
                </div>
            
                </div>
                </div>
                </div>
           <div class="form-group">
            <div class="row colbox">
            
            <div class="col-lg-4 col-sm-4">  <label>Nom de Famille<span style="color:red;font-weight:bold;font-size:14px;">*</span> </label>
                 </div>
            <div class="col-lg-8 col-sm-8">
            <?php
                                $input = array('type' => 'text', 'size' => '35', 'name' => 'nom', 'class' => 'form-control');
                                echo form_input($input, $nom, 'required');
                               // echo form_error('NIN', '<span class="error">', '</span>');
?>
                </div>
                </div>
                </div>
             
            <!-- Debut Modif Cheikh 24/11/2015-->
                <div class="form-group">
            <div class="row colbox">
            
            <div class="col-lg-4 col-sm-4">  
                <label>Nom arabe </label>
                 </div>
            <div class="col-lg-8 col-sm-8">
                <?php
                                $input = array('type' => 'text', 'size' => '35', 'name' => 'nomArabe', 'class' => 'form-control');
                                echo form_input($input, $nomArabe, '');
?>
                </div>
                </div>
                </div>
            <!-- Fin Modif Cheikh 24/11/2015-->
            <div class="form-group">
            <div class="row colbox">
            
            <div class="col-lg-4 col-sm-4">  
                <label>Prénom <span style="color:red;font-weight:bold;font-size:14px;">*</span></label>
                 </div>
            <div class="col-lg-8 col-sm-8">
                 <?php
                                $input = array('type' => 'text', 'size' => '35', 'name' => 'prenom', 'class' => 'form-control');
                                echo form_input($input, $prenom, 'required');
?>
                </div>
                </div>
                </div>
             <!-- Debut Modif Cheikh 24/11/2015-->
	    <div class="form-group">
            <div class="row colbox">
            
            <div class="col-lg-4 col-sm-4">  
                <label>Prénom arabe </label>
                 </div>
            <div class="col-lg-8 col-sm-8">
                    <?php
                                $input = array('type' => 'text', 'size' => '35', 'name' => 'prenomArabe', 'class' => 'form-control');
                                echo form_input($input, ' '.' '.' '.$prenomArabe, '');
?>
               </div>
                </div>
                </div>
               <div class="form-group">
                          <div class="row colbox">
            
                          <div class="col-lg-4 col-sm-4"> 
                              <label>Prenom du pére</label>
                               </div>
                <div class="col-lg-8 col-sm-8">
                        <?php $input = array('type' => 'text', 'size' => '54', 'name'=>'prenomPere','class'=>'form-control');
                            if(isset($firstNameArabic))
				echo form_input($input,$firstNameArabic,'');
			else	
          			 echo form_input($input,$prenomPere,'');?>
                     </div>
                          </div>
                               </div>
                    <div class="form-group">
                          <div class="row colbox">
            
                          <div class="col-lg-4 col-sm-4"> 
                              <label>Prenom du pére en Arabe</label>
                               </div>
                <div class="col-lg-8 col-sm-8">
                        <?php $input = array('type' => 'text', 'size' => '54', 'name'=>'prenomPereArabic','class'=>'form-control');
                            if(isset($firstNameArabic))
				echo form_input($input,$firstNameArabic,'');
			else	
          			 echo form_input($input,$prenomPere_ar,'');?>
                     </div>
                          </div>
                               </div>
            <!-- Fin Modif Cheikh 24/11/2015-->
			<div class="form-group">
            <div class="row colbox">
            
            <div class="col-lg-4 col-sm-4">  
                <label>Surnom</label>
                  </div>
            <div class="col-lg-8 col-sm-8">
                    <?php
                                $input = array('type' => 'text', 'size' => '35', 'name' => 'surnom', 'class' => 'form-control');
                                echo form_input($input, $surnom, '');
?>
                </div>
                </div>
                </div>
            <div class="form-group">
            <div class="row colbox">
            
            <div class="col-lg-4 col-sm-4">  
                <?php echo form_label('Actif', 'actif'); ?>
                
                 </div>
            <div class="col-lg-8 col-sm-8">
                <td onclick="date_abondon();">
            <?php
            
                echo form_checkbox(array('name' => 'actif'), 'actif', $actif);
            ?>
                    </div>
                </div>
                </div>
           <div class="form-group">
            <div class="row colbox">
            
            <div class="col-lg-4 col-sm-4">  
                <?php echo form_label('Date et raison d\'abandon '); ?>
                 </div>
            <div class="col-lg-8 col-sm-8">
                    <?php
                    $input = array('type' => 'text', 'size' => '35', 'name' => 'raison', 'class' => 'form-control');
                    echo form_textarea($input, $raison, '');
                 //   echo form_error('raison', '<span class="error">', '</span>');
?>
                </div>
                </div>
                </div>
            <div class="form-group">
            <div class="row colbox">
            
            <div class="col-lg-4 col-sm-4">  
                <label>Date de naissance<span style="color:red;font-weight:bold;font-size:14px;">*</span></label>
 </div>
            <div class="col-lg-8 col-sm-8">
                <?php $dateNais = explode("-", $dateNaissance);
?>
                
                        <div class="controls form-inline">
                            <?php
                                $input = array('type' => 'text', 'size' => '4', 'name' => 'year', 'class' => 'form-control');
                                echo form_input($input, $dateNais[0], 'required');
                                //echo form_error('year', '<span class="error">', '</span>');
                                ?>-
                            <?php
                                $input = array('type' => 'text', 'size' => '2', 'name' => 'month', 'class' => 'form-control');
                                echo form_input($input, $dateNais[1], 'required');
                               // echo form_error('month', '<span class="error">', '</span>');
                                ?>-<?php
                                $input = array('type' => 'text', 'size' => '2', 'name' => 'day', 'class' => 'form-control');
                                echo form_input($input, $dateNais[2], 'required');
                                //echo form_error('day', '<span class="error">', '</span>');
                                ?>
               </div>
                    </div>
                </div>
                </div>
			  <div class="form-group">
            <div class="row colbox">
            
            <div class="col-lg-4 col-sm-4">  <label>Lieu de naissance</label>
              </div>
            <div class="col-lg-8 col-sm-8">
                <?php
                 $input = array('type' => 'text', 'size' => '35', 'name' => 'lieuNaissance', 'class' => 'form-control');
                 echo form_input($input, $lieuNaissance, '');
?>
              </div>
                </div>
                </div>
            <!-- ajout du champs lieu de naissance arabe 16/08/2018 -->
            <div class="form-group">
                    <div class="row colbox">

                        <div class="col-lg-4 col-sm-4">  <label>Lieu de naissance arabe</label></div>
                        <div class="col-lg-8 col-sm-8">
                            <?php
                             $input = array('type' => 'text', 'size' => '35', 'name' => 'lieuNaissance_ar', 'class' => 'form-control');
                             echo form_input($input, $lieuNaissance_ar, '' );
                            ?>
                        </div>
                    </div>
                </div>
             <div class="form-group">
            <div class="row colbox">
            
            <div class="col-lg-4 col-sm-4">  
                <label>Numéro Nationale d'identification  </label>
                 </div>
            <div class="col-lg-8 col-sm-8">
                    <?php
                                $input = array('type' => 'text', 'size' => '35', 'name' => 'nin', 'class' => 'form-control');
                                echo form_input($input, $nin, '');
                               // echo form_error('NIN', '<span class="error">', '</span>');
                               
?> </div> </div> </div>
             <div class="form-group">
            <div class="row colbox">
            
            <div class="col-lg-4 col-sm-4">  
                <label>Genre <span style="color:red;font-weight:bold;font-size:14px;">*</span></label>
                
                 </div>
            <div class="col-lg-8 col-sm-8">
                
               <?php
                //$input = array('type' => 'text', 'size' => '1', 'name' => 'sexe');
                           echo' <select class="form-control"  name="sexe">';
                    
                                echo '<option value="M"';
                                  
                        if ($sexe == "M") {
                            echo ' selected';
                        }
                        echo '> Homme</option>' . "\n";
                        ?>
                        <?php
                        echo '<option value="F"';
                        if ($sexe == "F") {
                            echo ' selected';
                        }
                            echo '> Femme</option>' . "\n";
                echo'</select>';?>
                 </div>
                 </div>
                  </div>
                <div class="form-group">
            <div class="row colbox">
            
            <div class="col-lg-4 col-sm-4">  
                <label>Nationalité</label></td>

                 </div>
                <div class="col-lg-8 col-sm-8"><?php
                    echo'<select class="form-control" name="nationalite">';
                    echo'
                            <option value="' . $nationalite . '"  selected="selected">' . $nationalite. ' </option>
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
                            <option value="Mauritanie">Mauritanie </option>
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
                    //echo form_error('pays', '<span class="error">', '</span>');
?> </div> </div> </div>
                 <div class="form-group">
            <div class="row colbox">
            
            <div class="col-lg-4 col-sm-4">  
                <label>E-mail </label>
                 </div>
                <div class="col-lg-8 col-sm-8">
                    <?php
                    $input = array('type' => 'text', 'size' => '35', 'name' => 'email', 'class' => 'form-control');
                    echo form_input($input, $email, '');
                   // echo form_error('email', '<span class="error">', '</span>');
?>
                     </div> </div> </div>
                 <div class="form-group">
            <div class="row colbox">
            
            <div class="col-lg-4 col-sm-4">  
                <label >Téléphone 1</label>
                 </div>
            <div class="col-lg-8 col-sm-8">
                    <?php
                    $input = array('type' => 'text', 'size' => '35', 'name' => 'telephone1', 'class' => 'form-control');
                    echo form_input($input, $telephone1, '');
                    //echo form_error('telephone1', '<span class="error">', '</span>');
?> </div> </div> </div>
              <div class="form-group">
            <div class="row colbox">
            
            <div class="col-lg-4 col-sm-4">  
                <label >Téléphone 2 </label>
                 </div>
            <div class="col-lg-8 col-sm-8">
                    <?php
                    $input = array('type' => 'text', 'size' => '35', 'name' => 'telephone2', 'class' => 'form-control');
                    echo form_input($input, $tel2, '');
                   // echo form_error('tel2', '<span class="error">', '</span>');
?>
               </div> </div> </div>
             <div class="form-group">
            <div class="row colbox">
        <div><?php echo heading('Adresse', '3'); ?></div></div>
        <div class="form-group">
            <div class="row colbox">
            
            <div class="col-lg-4 col-sm-4">  
                <label>Ligne 1<span style="color:red;font-weight:bold;font-size:14px;">*</span></label>
                 </div>
            <div class="col-lg-8 col-sm-8">
                    <?php
                    $input = array('type' => 'text', 'size' => '35', 'name' => 'ligne1', 'class' => 'form-control');
                    echo form_input($input, $ligne1, 'required');
                    echo form_error('ligne1', '<span class="error">', '</span>');
?>  </div> </div> </div><div class="form-group">
            <div class="row colbox">
            
            <div class="col-lg-4 col-sm-4">  
                <label>Ligne 2 </label>
                 </div>
            <div class="col-lg-8 col-sm-8">
                    <?php
                    $input = array('type' => 'text', 'size' => '35', 'name' => 'ligne2', 'class' => 'form-control');
                    echo form_input($input, $ligne2, '');
                    echo form_error('ligne2', '<span class="error">', '</span>');
?> </div> </div> </div>
                <div class="form-group">
            <div class="row colbox">
            
            <div class="col-lg-4 col-sm-4"> 
                <label>Ville <span style="color:red;font-weight:bold;font-size:14px;">*</span></label>
                 </div>
            <div class="col-lg-8 col-sm-8">
                <?php
                    $input = array('type' => 'text', 'size' => '35', 'name' => 'ligne3', 'class' => 'form-control', 'value' => 'Nouakchott');
                    echo form_input($input, $ligne3, 'required');
                    echo form_error('ligne3', '<span class="error">', '</span>');
?> </div> </div> </div> <div class="form-group">
            <div class="row colbox">
            
            <div class="col-lg-4 col-sm-4">  
                <label>Pays <span style="color:red;font-weight:bold;font-size:14px;">*</span></label>
                 </div>
            <div class="col-lg-8 col-sm-8">
                    <?php
                    echo'<select class="form-control"  name="pays">';
                    echo'
                            <option value="' . $pays. '"  selected="selected">' .$pays . ' </option>
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
                            <option value="Mauritanie">Mauritanie </option>
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
                    echo form_error('pays', '<span class="error">', '</span>');
?> </div> </div> </div>
              
        <div class="form-group">
            <div class="row colbox">
            <?php echo heading('Parents ou responsable légal', '3'); ?></div></div>
         <div class="form-group">
            <div class="row colbox">
            
            <div class="col-lg-4 col-sm-4">  
                <label>Nom et Prénom du tuteur </label>
                 </div>
                <div class="col-lg-8 col-sm-8">
                    <?php
                    $input = array('type' => 'text', 'size' => '35', 'name' => 'nomParents','class' => 'form-control');
                    echo form_input($input, $nomParents, '');
			?> </div> </div> </div>
                     <div class="form-group">
            <div class="row colbox">
            
            <div class="col-lg-4 col-sm-4">  
                <label>Contacts</label>
                 </div>
            <div class="col-lg-8 col-sm-8">
                <?php
                    $input = array('type' => 'text', 'size' => '35', 'name' => 'ligne_1','class' => 'form-control','readonly'=>'readonly');
                    echo form_input($input, $ligne_1, '');
                    echo form_error('ligne_1', '<span class="error">', '</span>');
                    
?>       </div> </div> </div>
                <div class="form-group">
            <div class="row colbox">
            
            <div class="col-lg-4 col-sm-4">  
                <label>Personne ressource</label>
                 </div>
            <div class="col-lg-8 col-sm-8">
                <?php
                    $input = array('type' => 'text', 'size' => '35', 'name' => 'ligne_2','class' => 'form-control','readonly'=>'readonly');
                    echo form_input($input, $ligne_2, '');
                    echo form_error('ligne_2', '<span class="error">', '</span>');
?> </div> </div> </div> <div class="form-group">
            <div class="row colbox">
            
            <div class="col-lg-4 col-sm-4">  
                <label>Ville</label>
                 </div>
            <div class="col-lg-8 col-sm-8">
                    <?php
                    $input = array('type' => 'text', 'size' => '35', 'name' => 'ligne_3','class' => 'form-control');
                    echo form_input($input, $ligne_3, '');
                    echo form_error('ligne_3', '<span class="error">', '</span>');
?>  </div> </div> </div><div class="form-group">
            <div class="row colbox">
            
            <div class="col-lg-4 col-sm-4">  
                <label>Fonction</label>
                 </div>
            <div class="col-lg-8 col-sm-8">
                    <?php
                    $input = array('type' => 'text', 'size' => '35', 'name' => 'paysP','class' => 'form-control');
                    echo form_input($input, $paysP, '');
                    echo form_error('paysP', '<span class="error">', '</span>');
?> </div> </div> </div>
                 <div class="form-group">
            <div class="row colbox">
            
            <div class="col-lg-4 col-sm-4">  
                <label>Téléphone</label>
             </div>
            <div class="col-lg-8 col-sm-8">
                <?php
                    $input = array('type' => 'text', 'size' => '35', 'name' => 'telephoneParents','class' => 'form-control');
                    echo form_input($input, $telephoneParents, '');
                    echo form_error('telephoneParents', '<span class="error">', '</span>');
?> </div> </div> </div>
            <div class="form-group">
            <div class="row colbox"> 
        <div><?php echo heading('Contact d\'urgence', '3'); ?></div></div>
         <div class="form-group">
            <div class="row colbox">
            
            <div class="col-lg-4 col-sm-4">  
                <label >Contact d'urgence</label>
                 </div>
            <div class="col-lg-8 col-sm-8">
                    <?php
                    $input = array('type' => 'text', 'size' => '35', 'name' => 'contactUrgence','class' => 'form-control');
                    echo form_input($input, $contactUrgence, '');
                    echo form_error('contactUrgence', '<span class="error">', '</span>');
?>  </div> </div> </div><div class="form-group">
            <div class="row colbox">
            
            <div class="col-lg-4 col-sm-4">  
                <label>Lien de parenté</label>
                 </div>
            <div class="col-lg-8 col-sm-8">
                    
                    <?php
                    $input = array('type' => 'text', 'size' => '35', 'name' => 'lienParenteContactUrgence','class' => 'form-control');
                    echo form_input($input, $lienParenteContactUrgence, '');
                    echo form_error('lienParenteContactUrgence', '<span class="error">', '</span>');
?>  </div> </div> </div>
        <div class="form-group">
            <div class="row colbox">
            
            <div class="col-lg-4 col-sm-4">  
                <label>Téléphone d'urgence</label>
                 </div>
            <div class="col-lg-8 col-sm-8">
                    <?php
                    $input = array('type' => 'text', 'size' => '35', 'name' => 'telephoneUrgence','class' => 'form-control');
                    echo form_input($input, $telephoneUrgence, '');
                   echo form_error('telephoneUrgence', '<span class="error">', '</span>');
?>
 </div> </div> </div>
        
           <?php echo form_hidden(array('matricule' => $matricule)); ?>         
           <div class="form-group">
            <div class="row colbox">
        <?php echo heading('Études antérieures  ', '3'); ?></div>
        <div class="clear"></div>
         <div class="form-group">
            <div class="row colbox">
            
            <div class="col-lg-4 col-sm-4">  
                <label >Baccalauréat obtenu </label>
                 </div>
            <div class="col-lg-8 col-sm-8">
                    <?php
                    $input = array('type' => 'text', 'size' => '35', 'name' => 'infoBac','class' => 'form-control');
                    echo form_input($input, $infoBac, '');
                ?> </div> </div> </div>
                     <div class="form-group">
            <div class="row colbox">
            
            <div class="col-lg-4 col-sm-4">  
                    <label>Nom de l'établissement </label>
                  </div>
            <div class="col-lg-8 col-sm-8">
                        <?php
                 $regime = ' Privé ';
                 if ($regimeEtablissements==0)
                     $regime = '  Publique  ';
                echo ' <select class="form-control" name="nomEtablissement" id=""> ';
                
                echo '<option value="'.$IDEtablissements.'">'.
                        $nomEtablissement.'('.$regime.')'.'</option>';
                for($i=0;$i<count($etablissements['idEtablissement']);$i++)
                {
                    
                    if($etablissements['idEtablissement'][$i]!= $IDEtablissements)
                    {
                        $regime = ' (Privé) ';
                        if ($etablissements['regime'][$i]==0)
                            $regime = ' ( Publique ) ';
                    echo '<option value="'.$etablissements['idEtablissement'][$i].'">'.
                            $etablissements['nomEtablissement'][$i].'('.$regime.')'.'</option>';
                    }

                }
                echo '</select>';
                    ?> </div> </div> </div>
                      <div class="form-group">
            <div class="row colbox">
            
            <div class="col-lg-4 col-sm-4">  
                <label><span style="color:blue;font-weight:bold;font-size:12px;">Définir un nouvel établissement</span></label>
                 </div>
                <div class="col-lg-8 col-sm-8">
                    <?php
                    $input = array('type' => 'text', 'size' => '35', 'name' => 'newEtablissement','class' => 'form-control');
                    echo form_input($input,'', '');
                    
                    // 08-10-2016
                    
                    ?>
                    
                    <select name="regime">
                        <option value="0">Public</option>
                        <option value="1">Privé</option>
                    </select>
                    <?php
                ?> </div> </div> </div>
                     <div class="form-group">
            <div class="row colbox">
            
            <div class="col-lg-4 col-sm-4">  
                <label>Année d'obtention </label> </div>
                <div class="col-lg-8 col-sm-8">
                    <?php
                    $input = array('type' => 'text', 'size' => '4', 'name' => 'yearOb','readonly'=>'readonly','class' => 'form-control');
                    if($anneeObtention == '0000')
                    {
                        echo form_input($input,'' , '');
                    }
                    else
                    {
                        echo form_input($input,$anneeObtention , '');
                    }
                    
                    echo form_error('year', '<span class="error">', '</span>');
                    ?> </div> </div> </div>
                   <div class="form-group">
            <div class="row colbox">
            
            <div class="col-lg-4 col-sm-4">  
                <label>Moyenne au baccalauréat </label>
                 </div>
            <div class="col-lg-8 col-sm-8">
                    <?php
$input = array('type' => 'text', 'size' => '35', 'name' => 'moyenneBac','class' => 'form-control');
echo form_input($input, $moyenneBac, '');
                    ?> </div> </div> </div>
             <!-- Debut Modif Cheikh 24/11/2015-->
		 <div class="form-group">
            <div class="row colbox">
            
            <div class="col-lg-4 col-sm-4">  	
             <label>N° bac </label>
                 </div>
                <div class="col-lg-8 col-sm-8">
                    <?php
                                $input = array('type' => 'text', 'size' => '35', 'name' => 'num_bac','readonly'=>'readonly','class' => 'form-control');
                                echo form_input($input, $num_bac, '');
?> </div> </div> </div>
                 <div class="form-group">
            <div class="row colbox">
            
            <div class="col-lg-4 col-sm-4">  
                <label>Nationalité bac</label>
                 </div>
            <div class="col-lg-8 col-sm-8">
                <?php
                    echo'<select class="form-control" name="nationalite_bac">';
                    echo'
                            <option value="' . $nationalite_bac . '"  selected="selected">' . $nationalite_bac. ' </option>
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
                            <option value="Mauritanie">Mauritanie </option>
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
                    //echo form_error('pays', '<span class="error">', '</span>');
?> </div> </div> </div>
            <!-- Fin Modif Cheikh 24/11/2015-->
		 <div class="form-group">
            <div class="row colbox">
            
            <div class="col-lg-4 col-sm-4">  
                <label>Informations de la session d'obtention </label>
                 </div>
                <div class="col-lg-8 col-sm-8">
                    <?php
                echo ' <select class="form-control" name="sessionNormale" id=""> ';
             echo '<option value="'.$sessionNormale.'">'.$sessionNormale.'</option>';
             if($sessionNormale == 'inconnue')
			 {
				echo '<option value="normale">Session normale </option>';
			   echo '<option value="rattrapage">Session rattrapage </option>';
			 }
			else if($sessionNormale == 'normale')
			{
				echo ' <option value="inconnue">inconnue </option>';
			   echo '<option value="rattrapage">Session rattrapage </option>';
			}
			else
			{
				echo ' <option value="inconnue">inconnue </option>';
               echo '<option value="normale">Session normale </option>';
			}
			  
            echo '</select>';
                    ?> </div> </div> </div>
                     <div class="form-group">
            <div class="row colbox">
            
            <div class="col-lg-4 col-sm-4">  
                <label>Autre diplôme </label>
                 </div>
                <div class="col-lg-8 col-sm-8">
                    
<?php
$input = array('type' => 'text', 'size' => '35', 'name' => 'autreDip', 'class' => 'form-control');
echo form_input($input, $autreDiplome, '');
echo form_error('autre diplome', '<span class="error">', '</span>');
                    ?>
                     </div> </div> </div>

        <div class="clear"></div>
        <div class="form-group">
            <div class="row colbox">
            
            <div class="col-lg-4 col-sm-4">  
                <label>Commentaires d'admission </label>
                 </div>
            <div class="col-lg-8 col-sm-8">
                    <?php
                $input = array('type' => 'text', 'size' => '35', 'name' => 'commentaires', 'class' => 'form-control');
                echo form_textarea($input, $commentaireAdmission, '');
                echo form_error('Commentaires', '<span class="error">', '</span>');
                    ?> </div> </div> </div>
                     <div class="form-group">
            <div class="row colbox">
            
            <div class="col-lg-4 col-sm-4">  
                    <label>Programme <span style="color:red;font-weight:bold;font-size:14px;">*</span> </label>
                 </div>
                <div class="col-lg-8 col-sm-8">
                    
<?php
                echo ' <select class="form-control" name="idProgramme" id=""> ';
             echo '<option value="'.$programme.'">'.$monProgramme['idProgramme'].'</option>';
            //for($i=0;$i<count($programmeListe['idProgramme']);$i++)
            //{
                //if($programmeListe['idProgramme'][$i]!= $programme)
                 //   echo '<option value="'.$programmeListe['idProgramme'].'">'.$programmeListe['nomProgramme'].'</option>';
           // }
            echo '</select>';
                    ?>  </div> </div> </div>
                    <div class="form-group">
            <div class="row colbox">
            
            <div class="col-lg-4 col-sm-4"> 
                <label>Grade <span style="color:red;font-weight:bold;font-size:14px;">*</span></label>
                </div>
                <div class="col-lg-8 col-sm-8">
                <?php
                echo ' <select  class="form-control"  name="idGrade" id=""> ';
             echo '<option value="'.$monGrade.'">'.$monGrade.'</option>';
            for($i=0;$i<count($gradeListe['idGrade']);$i++)
            {
                if($gradeListe['idGrade'][$i]!= $monGrade)
               echo '<option value="'.$gradeListe['idGrade'][$i].'">'.$gradeListe['idGrade'][$i].'</option>';
            }
            echo '</select>';
                    ?> </div> </div> </div>
<?php $pw = array('type' => 'submit', 'name' => 'submit', 'id' => 'submit', 'value' => 'Enregistrer','class'=>'btn btn-primary');
echo form_input($pw);
?>
            </td>
            </tr>
        </table>



    </div><!-- end of right content-->                 
</div>   <!--end of center content -->               

<div class="clear"></div>
</div> <!--end of main content-->


<?php include(APPPATH.'views/include/footer.php'); ?>
