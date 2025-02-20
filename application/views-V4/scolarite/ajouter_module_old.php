<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
   
  <div class="container">
    <div class="col-xs-12 hl-left">         
      <?php echo validation_errors('<div class="error_box">', '</div>'); ?>
      <?php	// ajout 2.2.1
			$data='';
			$data['courante'] = $this->scolarite_modele->get_session_courante();
	  ?>
	  <?php
       echo heading('Créer un nouvel élément','3');
        $attributes = array('class' => 'niceform');
        echo form_open('scolarite/creer_module', $attributes);
        echo form_fieldset();?>
        <table class="form">
            
                <tr>
                    <td><?php echo form_label('Code de l\'élément <span style="color:red;font-weight:bold;font-size:14px;">*</span>') ;?></td>
                    
                    <td><?php $input = array('type' => 'text', 'size' => '15', 'name'=>'sigle'); 
                             echo form_input($input,'','required');
                             echo form_error('name','<span class="error">','</span>');?>
                    </td>
                </tr>
                    
                <tr>
                        <td><?php echo form_label('Type d\'élément <span style="color:red;font-weight:bold;font-size:14px;">*</span>') ;?></td>
                        <td>
                                <select  name="typeMod">
                                <option value="Cours-Labos">Cours-Labos</option>
                                <option value="Cours">Cours</option>
                                <option value="Labos">Labos</option>
                                    <option value="Projet">Projet</option>
                                    <option value="Stage">Stage</option>                              
                                </select> 
                        </td>
                </tr>
                <tr>
                    <td><?php  echo form_label('Module <span style="color:red;font-weight:bold;font-size:14px;">*</span>');?></td>
                    <td> 
                        <select name="unite">
                         <?php   
                         if(is_array($unites))
                    {
                         for($i=0;$i<count($unites['sigle']);$i++)
                        {
                             echo '<option value = "'.$unites['sigle'][$i].
                                    '">'.$unites['sigle'][$i].':'.$unites['titre'][$i].'</option>';
                        }
                        
                    }    
                    ?>
                            
                        </select>
                    </td>
                </tr>    
                <tr>
                    <td><?php  echo form_label('Enseignant responsable <span style="color:red;font-weight:bold;font-size:14px;">*</span>');?></td>
                    <td>
                        <select name="prof">
                    <?php
                    if(is_array($professeurs))
                    {
                        for($i=0;$i<count($professeurs['matricule']);$i++)
                        {
                            echo '<option value = "'.$professeurs['matricule'][$i].
                                    '">'.$professeurs['matricule'][$i].':'
                                    .$professeurs['nom'][$i].' '.$professeurs['prenom'][$i]
                                    .'</option>';
                        }
                    }
                    ?>
                        </select>
                    </td>
                </tr>
                
                
                <tr>
                    <td><?php  echo form_label('Description de l\'élément  ');?></td>
                    <td><?php $input = array( 'name'=>'description'); 
                            echo form_textarea($input,'','');
                            echo form_error('comments','<span class="error">','</span>');?>
                    </td>
                </tr>
                 
                </tr>
                    
                    <tr>
                        <td><?php echo form_label('Intitulé <span style="color:red;font-weight:bold;font-size:14px;">*</span>
								</br>(34 caractères max)') ;?></td>
                        <td><?php $input = array('type' => 'text', 'size' => '40', 'name'=>'titreMod'); 
                             echo form_input($input,'','required');
                             echo form_error('name','<span class="error">','</span>');?>
                        </td>
                    </tr> 
                                        <tr>
                        <td><?php echo form_label("Prérequis  ") ;?></td>
                        <td><?php $input = array('type' => 'text', 'size' => '40', 'name'=>'prerequis'); 
                             echo form_input($input,'','');
                             echo form_error('name','<span class="error">','</span>');?>
                        </td>
                    </tr>     
                    
                    <tr>
                        <td><?php echo form_label("Corequis ") ;?></td>
                        <td><?php $input = array('type' => 'text', 'size' => '40', 'name'=>'corequis'); 
                             echo form_input($input,'','');
                             echo form_error('name','<span class="error">','</span>');?>
                        </td>
                    </tr> 
                    
                    <tr>
                        <td><?php echo form_label('Département responsable<span style="color:red;font-weight:bold;font-size:14px;">*</span>') ;?></td>
                        <td>  
                            <?php     
                 
                            $index_dep = 0;
                            echo'<select name="departement">';
                            foreach($nomDep as $dep){
                            echo'<option value="'.$idDep[$index_dep++].'">'.$dep.'</option>';
                            }
                            echo'</select>';
                            ?>
                            <?php $input = array('type' => '', 'size' => '54', 'name'=>'idDep'); 
                        ?>
                        </td>
                    </tr>
                    
                    <tr>
                        <td><?php echo form_label('Cycle <span style="color:red;font-weight:bold;font-size:14px;">*</span>') ;?></td>
                        <td>             
                        <?php echo'<select name="Cycle">';
                        $index = 0;
                        foreach($nomCycle as $nCyc)
                        {
                            echo'<option value="'.$cycle[$index++].'">'.$nCyc.'</option>';
                        }
                        echo'</select>';
                        ?>
                        <?php $input = array('type' => '', 'size' => '54', 'name'=>'idDep'); 
                         ?>
                        </td>
                    </tr> 
                <tr>
                    
                    <tr>
                        <td><?php echo form_label('Crédit <span style="color:red;font-weight:bold;font-size:14px;">*</span>') ;?></td>
                        <td><?php $input = array('type' => 'text', 'size' => '10', 'name'=>'nbrCredits'); 
                             echo form_input($input,'','required');
                             echo form_error('name','<span class="error">','</span>');?>
                        </td>
                    </tr>     
                    
                    <tr>
                        <td><?php echo form_label('Nombre de crédits prérequis') ;?></td>
                        <td><?php $input = array('type' => 'text', 'size' => '10', 'name'=>'nbrCreditsPre'); 
                             echo form_input($input,'','');
                             echo form_error('name','<span class="error">','</span>');?>
                        </td>
                    </tr>  
          
                    <tr>
                        <td><?php echo form_label('Heures cours ') ;?></td>
                        <td><?php $input = array('type' => 'text', 'size' => '10', 'name'=>'hrCours'); 
                             echo form_input($input,'');
                             echo form_error('name','<span class="error">','</span>');?>
                        </td>
                    </tr>     
          
                  <tr>
                        <td><?php echo form_label('Heures TD ') ;?></td>
                        <td><?php $input = array('type' => 'text', 'size' => '10', 'name'=>'hrTD'); 
                             echo form_input($input,'');
                             echo form_error('name','<span class="error">','</span>');?>
                        </td>
                    </tr>     
                    
                    <tr>
                        <td><?php echo form_label('Heures TP ') ;?></td>
                        <td><?php $input = array('type' => 'text', 'size' => '10', 'name'=>'hrTP'); 
                             echo form_input($input,'');
                             echo form_error('name','<span class="error">','</span>');?>
                        </td>
                    </tr>     
               
                     <tr>
                        <td><?php echo form_label('Heures de travail personnel ') ;?></td>
                        <td><?php $input = array('type' => 'text', 'size' => '10', 'name'=>'hrPerso'); 
                             echo form_input($input,'');
                             echo form_error('name','<span class="error">','</span>');?>
                        </td>
                    </tr>  
                     <!--Debut Modif Cheikh 26/11/2015-->     
                    <tr>
                        <td><?php echo form_label('Volume CM  ') ;?></td>
                        <td><?php $input = array('type' => 'text', 'size' => '10', 'name'=>'volumeCM'); 
                             echo form_input($input,'');
                             echo form_error('name','<span class="error">','</span>');?>
                        </td>
                         
                    </tr> 
                    <tr> 
                      <td><?php echo form_label('Volume TD  ') ;?></td>
                        <td><?php $input = array('type' => 'text', 'size' => '10', 'name'=>'volumeTD'); 
                             echo form_input($input,'');
                             echo form_error('name','<span class="error">','</span>');?>
                        </td>
   
                    </tr> 
                    <tr>
                     <td><?php echo form_label('Volume TP  ') ;?></td>
                        <td><?php $input = array('type' => 'text', 'size' => '10', 'name'=>'volumeTP'); 
                             echo form_input($input,'');
                             echo form_error('name','<span class="error">','</span>');?>
                        </td>
                        </tr>
                        <!--Fin Modif Cheikh 26/11/2015-->
                       </table>
     
           <div class="clear"></div>
           <table>
                <tr>
                      <td width="235px"><?php echo form_label('Semestre d\'activation <span style="color:red;font-weight:bold;font-size:14px;">*</span></br>
                          (Premier semestre où cet </br> élément sera enseigné)') ;?>  </td>
                        <!-- 2.2.1 cette section remplacée pour que le semestre courant soit offert par défaut 
						<td>
                            <select  name="session">
                            <option value="2">Été</option>
                             <option value="3">Automne</option>
                            <option value="1">Printemps</option>
                           
                            </select> 
                        <td>
                            
                        <td>
                            <td><select  name="annee">                           
                            <option value="2011">2011</option>    
                            <option value="2012">2012</option>
                            <option value="2013">2013</option>
                            <option value="2014">2014</option>
                            <option value="2015">2015</option>
                            <option value="2016">2016</option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>
                            <option value="2027">2027</option>
                            <option value="2028">2028</option>
                            <option value="2029">2029</option>
                            <option value="2030">2030</option>
                            </select> fin 2.2.1 -->
					<!-- 2.2.1 ajout options avec valeur par défaut = semestre courant -->
							<?php 
									$annee = ($data['courante']['annee'][0]);
									$semestre =	($data['courante']['semestre'][0]);
							 // if ($semestre=="1") {print($semestre);die;}
							 ?>
						<!-- debut select semestre -->
					<td>
					<select  name="session">
                        <?php
							echo '<option value="2"';
                        if ($semestre == "2") {
                            echo ' selected';
                        }
                        echo '> Été</option>' . "\n";
                        ?>
                        <?php
                        echo '<option value="3"';
                        if ($semestre == "3") {
                            echo ' selected';
                        }
                        echo '> Automne</option>' . "\n";
                        ?>
                        <?php
                        echo '<option value="1"';
                        if ($semestre == "1") {
                            echo ' selected';
                        }
                        echo '> Printemps</option>' . "\n";
                        ?>
                    </select> 
					<!-- fin select semestre -->
					<!-- debut select année -->
					<!-- --><td>
                        <td> 
						
                            <td><select  name="annee">                           
						<?php	echo '> 2011</option>'."\n";
                        ?>
                        <?php
                        echo '<option value="2011"';
                        if ($annee == "2011") {
                            echo ' selected';
                        }
                        echo '> 2011</option>' . "\n";
                        ?>
                        <?php
                        echo '<option value="2012"';
                        if ($annee == "2012") {
                            echo ' selected';
                        }
                        echo '> 2012</option>' . "\n";
                        ?>
                        <?php
                        echo '<option value="2013"';
                        if ($annee == "2013") {
                            echo ' selected';
                        }
                        echo '> 2013</option>' . "\n";
                        ?>
                        <?php
                        echo '<option value="2014"';
                        if ($annee == "2014") {
                            echo ' selected';
                        }
                        echo '> 2014</option>' . "\n";
                        ?>
                        <?php
                        echo '<option value="2015"';
                        if ($annee == "2015") {
                            echo ' selected';
                        }
                        echo '> 2015</option>' . "\n";
                        ?>
                        <?php
                        echo '<option value="2016"';
                        if ($annee == "2016") {
                            echo ' selected';
                        }
                        echo '> 2016</option>' . "\n";
                        ?>
                        <?php
                        echo '<option value="2017"';
                        if ($annee == "2017") {
                            echo ' selected';
                        }
                        echo '> 2017</option>' . "\n";
                        ?>
                        <?php
                        echo '<option value="2018"';
                        if ($annee == "2018") {
                            echo ' selected';
                        }
                        echo '> 2018</option>' . "\n";
                        ?>
                        <?php
                        echo '<option value="2019"';
                        if ($annee == "2019") {
                            echo ' selected';
                        }
                        echo '> 2019</option>' . "\n";
                        ?>
                        <?php
                        echo '<option value="2020"';
                        if ($annee == "2020") {
                            echo ' selected';
                        }
                        echo '> 2020</option>' . "\n";
                        ?>
                        <?php
                        echo '<option value="2021"';

                        if ($annee == "2021") {
                            echo ' selected';
                        }
                        echo '> 2021</option>' . "\n";
                        ?>
                        <?php
                        echo '<option value="2022"';

                        if ($annee == "2022") {
                            echo ' selected';
                        }
                        echo '> 2022</option>' . "\n";
                        ?>
                        <?php
                        echo '<option value="2023"';
                        if ($annee == "2023") {
                            echo ' selected';
                        }
                        echo '> 2023</option>' . "\n";
                        ?>
                        <?php
                        echo '<option value="2024"';
                        if ($annee == "2024") {
                            echo ' selected';
                        }
                        echo '> 2024</option>' . "\n";
                        ?>
                        <?php
                        echo '<option value="2025"';
                        if ($annee == "2025") {
                            echo ' selected';
                        }
                        echo '> 2025</option>' . "\n";
                        ?>
                        <?php
                        echo '<option value="2026"';
                        if ($annee == "2026") {
                            echo ' selected';
                        }
                        echo '> 2026</option>' . "\n";
                        ?>

                        <?php
                        echo '<option value="2027"';
                        if ($annee == "2027") {
                            echo ' selected';
                        }
                        echo '> 2027</option>' . "\n";
                        ?>
                        <?php
                        echo '<option value="2028"';
                        if ($annee == "2028") {
                            echo ' selected';
                        }
                        echo '> 2028</option>' . "\n";
                        ?>

                        <?php
                        echo '<option value="2029"';
                        if ($annee == "2029") {
                            echo ' selected';
                        }
                        echo '> 2029</option>' . "\n";
                        ?>
                        <?php
                        echo '<option value="2030"';
                        if ($annee == "2030") {
                            echo ' selected';
                        }
                        echo '> 2030</option>' . "\n";
                        ?>                           
              </tr>                    
                <tr>                     
					<!-- fin select année -->
					</td>
                    </td>
                </tr>
                    </tr>
        </table>
     
           <div class="clear"></div>
       <br><br>
        <table>
                     <tr>
                                           
                        <td class="submit">
                         <?php $pw = array('type' => 'submit', 'name' => 'submit', 'id'=>'submit', 'value'=>'Suivant'); 
                             echo form_input($pw);?>
                        </td>
                    </tr>
                </table>
                <?php echo form_fieldset_close();
                
                 echo form_close('</div>');?>
                
         </form>
        </table>
      
   </div>  
           <div class="clear"></div>
    </div> <!--end of main content-->
	
    <?php
  include(APPPATH.'views/include/footer.php');?>

       
 