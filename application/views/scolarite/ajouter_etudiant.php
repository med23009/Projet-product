<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
<div class="container">
    <div class="col-xs-12 hl-left">


    <div class="row">
        <div class="col-sm-offset-3 col-lg-6 col-sm-6 well">     
        
        <?php echo validation_errors('<div class="error_box">', '</div>'); 
         if(isset($messageRetour))
          {
              echo $messageRetour;
          }
          if(isset($messageRetourNin))
          {
              echo $messageRetourNin;
          }
          if(isset($messageRetourEmergencyPhone))
          {
              echo $messageRetourEmergencyPhone;
          }
     ?>
         <?php 
         
         echo '<legend>'.heading('Ajouter un étudiant (1/4)','3').'</legend>';
          echo heading('Informations personnelles','3');
         
           
         
          echo form_open('scolarite/saisir_adresse');
         
             echo form_fieldset();?>
                <div class="form-group">
            <div class="row colbox">
            
            <div class="col-lg-4 col-sm-4">  
                        <?php  echo form_label('Nom de Famille<span style="color:red;font-weight:bold;font-size:14px;">*</span>');?>
                       </div>
                            <div class="col-lg-8 col-sm-8">
                            <?php
                            $input = array('type' => 'text', 'size' => '54', 'name'=>'lastName','value'=>$info['nom'],'class'=>'form-control');
                               
                              
                              if(isset($lastName))
                            echo form_input($input,$lastName,'required');
						else
                            echo form_input($input,'','required');
                         
                         
													
                            ?>
                       </div>
            </div>
            </div>
                
                    <!-- Modif IUP cheikh 24/11-->
                     <div class="form-group">
            <div class="row colbox">
            
            <div class="col-lg-4 col-sm-4"> 
                        <label>Nom en arabe</label>
                        </div>
                            <div class="col-lg-8 col-sm-8">
                        <?php $input = array('type' => 'text', 'size' => '54', 'name'=>'lastNameArabic','class'=>'form-control');
                         if(isset($lastNameArabic))
                            echo form_input($input,$lastNameArabic,'required');
                        else
                            echo form_input($input,'','required');
                            ?>
                                </div>
            </div>
            </div>
                       
                    <!-- Fin Modif IUP cheikh 24/11-->
                    <div class="form-group">
            <div class="row colbox">
            
            <div class="col-lg-4 col-sm-4"> 
                       <?php  echo form_label('Prénom <span style="color:red;font-weight:bold;font-size:14px;">*</span>');?>
                        </div>
                <div class="col-lg-8 col-sm-8">
                            <?php 
                        $input = array('type' => 'text', 'size' => '54', 'name'=>'firstName','value'=>$info['prenom'],'class'=>'form-control'); 
                             if(isset($firstName))
                            echo form_input($input,$firstName,'required');
                        else
                            echo form_input($input,'','required');
                            ?>
                     </div>
            </div>
            </div>
                    <!-- Modif  IUP cheikh 24/11-->
			  <div class="form-group">
                          <div class="row colbox">
            
                          <div class="col-lg-4 col-sm-4"> 
                              <label>Prenom en arabe</label>
                               </div>
                <div class="col-lg-8 col-sm-8">
                        <?php $input = array('type' => 'text', 'size' => '54', 'name'=>'firstNameArabic','class'=>'form-control');
                            if(isset($firstNameArabic))
				echo form_input($input,$firstNameArabic,'');
			else	
          			 echo form_input($input,'','');?>
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
          			 echo form_input($input,'','');?>
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
          			 echo form_input($input,'','');?>
                     </div>
                          </div>
                               </div>
                    <!-- Fin Modif IUP cheikh 24/11-->
			<div class="form-group">
                          <div class="row colbox">
            
                          <div class="col-lg-4 col-sm-4"> 
						<label>Surnom</label>
                                                 </div>
                                                <div class="col-lg-8 col-sm-8">
						<?php $input = array('type' => 'text', 'size' => '54', 'name'=>'surnom','class'=>'form-control'); 
						if(isset($surnom))
							echo form_input($input,$surnom,'');
						else	
						 echo form_input($input,'','');?>
						</div>
					</div>
                            </div>
                    
                         <br> 
                        <br> 
                        <div class="form-group">
                          <div class="row colbox">
            
                          <div class="col-lg-4 col-sm-4"> 
                            <?php  echo form_label('Genre <span style="color:red;font-weight:bold;font-size:14px;">*</span>','sexe');?>
                        </div>
            <div class="col-lg-8 col-sm-8">
                            
                            <?php 
                             $input = array('type' => 'radio', 'name'=>'sexe', 'id' => 'homme', 'value' => 'M','class'=>'checkbox-inline');
                             echo form_input($input,'','required');
                             echo form_label('Homme','homme');
                               
                             $input = array('type' => 'radio',  'name'=>'sexe', 'id' => 'femme', 'value' => 'F','class'=>'checkbox-inline');
                             echo form_input($input,'','required');
                             echo form_label('Femme','femme');
                             ?>
                      </div>
                              </div>
                           </div>
                       <div class="form-group">
                          <div class="row colbox">
            
                          <div class="col-lg-4 col-sm-4"> 
                               <?php  echo form_label('Date de naissance <span style="color:red;font-weight:bold;font-size:14px;">*</span>','birth');?>
                         </div>
            <div class="col-lg-8 col-sm-8">
                        <div class="controls form-inline">
                        <?php $input = array('type' => 'text', 'size' => '4', 'name'=>'year','class'=>'form-control'); 
                             echo form_input($input,'AAAA','required');
                            ;?>
                       
                        <td>-</td>
                        <td><?php $input = array('type' => 'text', 'size' => '2', 'name'=>'month','class'=>'form-control'); 
                             echo form_input($input,'MM','required');
                            ;?>
                        </td>
                        <td>-</td>
                        <td><?php $input = array('type' => 'text', 'size' => '2', 'name'=>'day','class'=>'form-control'); 
                             echo form_input($input,'JJ','required');
                             ;?>
                        </div>
                        </div>
                 </div>
                               </div>
                    
			<div class="form-group">
                          <div class="row colbox">
            
                          <div class="col-lg-4 col-sm-4"> <?php  echo form_label('Lieu de naissance','lieuNaissance');?>
                         </div>
            <div class="col-lg-8 col-sm-8">
                            <?php $input = array('type' => 'text', 'size' => '54', 'name'=>'lieuNaissance','class'=>'form-control'); 
                             echo form_input($input,'','');
                             ?>
					  </div>
                                </div>
                              </div>
                        <!--    AJOUT DU CHAMP Lieu de naissance arabe   L_N_A     -->
                        <div class="form-group">
                            <div class="row colbox">

                              <div class="col-lg-4 col-sm-4"> <?php  echo form_label('Lieu de naissance arabe','lieuNaissance_ar');?></div>
                              <div class="col-lg-8 col-sm-8">
                                  <?php $input = array('type' => 'text', 'size' => '54', 'name'=>'lieuNaissance_ar','class'=>'form-control'); 
                                   echo form_input($input,'','');
                                   ?>
                              </div>
                            </div>
                        </div>
                        <!--        FIN AJOUT        -->
                         <div class="form-group">
                          <div class="row colbox">
            
                          <div class="col-lg-4 col-sm-4"> 
                       <?php  echo form_label('Nationalité <span style="color:red;font-weight:bold;font-size:14px;">*</span>','citizen');?>
                          </div>
            <div class="col-lg-8 col-sm-8">     
                        <?php 
                            echo'<select name="citizen" class="form-control">';   
                            echo'
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
                            <option value="Mauritanie" selected="selected">Mauritanie </option>
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
                             echo form_error('citizen','<span class="error">','</span>');
                            ?>
            </div>
                              </div>
                             </div>
            <div class="form-group">
                          <div class="row colbox">
            
                          <div class="col-lg-4 col-sm-4"> 
                              <?php  echo form_label('Numéro Nationale d\'identification','nin');?>
                                 </div>
            <div class="col-lg-8 col-sm-8">     
                        <?php $input = array('type' => 'text', 'size' => '54', 'name'=>'nin', 'class'=>'form-control'); 
                        if(isset($nin))
                            echo form_input($input,$nin,'');
                        else
                            echo form_input($input,'','');
                             echo form_error('nin','<span class="error">','</span>');?>
            </div>
                       </div>
                   </div>
                    
                        <div class="form-group">
                          <div class="row colbox">
            
                          <div class="col-lg-4 col-sm-4"> 
                       <?php  echo form_label('E-mail ','email');?>
                               </div>
            <div class="col-lg-8 col-sm-8"> 
                        <td><?php $input = array('type' => 'text', 'size' => '54', 'name'=>'email', 'class'=>'form-control'); 
                        if(isset($email))
                            echo form_input($input,$email,'');
                        else
                            echo form_input($input,'','');
                        
                             echo form_error('email','<span class="error">','</span>');?>
                       </div>
                              </div>
                            </div>
                     
          <div class="clear"></div>
          <div class="form-group">
                          <div class="row colbox">
            
                          <div class="col-lg-4 col-sm-4"> 
                <?php echo heading('Contact d\'urgence  ','3');?>
        </div>
                            </div>
                      </div>
                           
                     
         <div class="form-group">
                          <div class="row colbox">
            
                          <div class="col-lg-4 col-sm-4"> 
                              <?php  echo form_label('Nom ');?>
                           </div>
            <div class="col-lg-8 col-sm-8">     
                       <?php $input = array('type' => 'text', 'size' => '45', 'name'=>'emergencyContact', 'class'=>'form-control'); 
                             echo form_input($input,'','');
                             echo form_error('emergencyContact','<span class="error">','</span>');?>
            </div>
                              </div>
             </div>       <div class="form-group">
                          <div class="row colbox">
            
                          <div class="col-lg-4 col-sm-4"> 
                              <?php  echo form_label('Lien de parenté ');?>
                              </div>
            <div class="col-lg-8 col-sm-8">  
                       <?php $input = array('type' => 'text', 'size' => '45', 'name'=>'emergencyLink', 'class'=>'form-control'); 
                             echo form_input($input,'','');
                             echo form_error('emergencyLink','<span class="error">','</span>');?>
                      </div>
                              </div>
                 </div>
                     <div class="form-group">
                          <div class="row colbox">
            
                          <div class="col-lg-4 col-sm-4"> 
                     <?php  echo form_label('Téléphone ');?>
                                </div>
            <div class="col-lg-8 col-sm-8">  
                        <td><?php $input = array('type' => 'text', 'size' => '45', 'name'=>'emergencyPhone', 'class'=>'form-control'); 
                             echo form_input($input,'','');
                             echo form_error('emergencyPhone','<span class="error">','</span>');?>
            </div>
                               </div>
                          </div>
                   <div class="form-group">
            <div class="col-sm-offset-4 col-lg-8 col-sm-8 text-left">
                         <?php $pw = array('type' => 'submit', 'name' => 'submit', 'id'=>'submit', 'value'=>'Suivant', 'class'=>'btn btn-primary'); 
                             echo form_input($pw);?>
            </div>
                       </div
                        <td><?php 
                         $input = array('type' => 'hidden', 'size' => '45', 'name'=>'idProgramme','value'=>$info['idProgramme'],'hidden'=>'hidden'); 
                             echo form_input($input,'','');
                          $input = array('type' => 'hidden', 'size' => '45', 'name'=>'serie','value'=>$info['serie'],'hidden'=>'hidden'); 
                             echo form_input($input,'','');
                             $input = array('type' => 'hidden', 'size' => '45', 'name'=>'num_bac','value'=>$info['num_bac'],'hidden'=>'hidden'); 
                             echo form_input($input,'','');
                             $input = array('type' => 'hidden', 'size' => '45', 'name'=>'annee','value'=>$info['annee'],'hidden'=>'hidden'); 
                             echo form_input($input,'','');
                             $input = array('type' => 'hidden', 'size' => '45', 'name'=>'personne_ressource','value'=>$info['personne_ressource'],'hidden'=>'hidden'); 
                             echo form_input($input,'','');
                             $input = array('type' => 'hidden', 'size' => '45', 'name'=>'contacts','value'=>$info['contacts'],'hidden'=>'hidden'); 
                             echo form_input($input,'','');
                                    
                             ?></td></tr>
                </table> 
                    
               <?php echo form_fieldset_close();
                
       echo form_close('</div>');
?>
           </div>  
           <div class="clear"></div>
    </div> <!--end of main content-->
	
    <?php
  include(APPPATH.'views/include/footer.php');?>

       
 