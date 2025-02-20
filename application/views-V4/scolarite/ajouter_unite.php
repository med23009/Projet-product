<?php include(APPPATH.'views/include/header.php');
include('include/menu.php');?> 


<div class="container">
    <div class="col-xs-12 hl-left">



        <?php
           echo heading('Ajouter un module','3');
 echo validation_errors('<div class="error_box">', '</div>');
	if(isset($errorMessage))
             {
               echo $errorMessage;
             }
        $attributes = array('class' => 'group');

        echo form_open('scolarite/ajouter_unite_succe', $attributes);
        echo form_fieldset();
        ?>
         <?php	
			$data=array();
			$data['courante'] = $this->scolarite_modele->get_session_courante();
                        $progs = $this->scolarite_modele->recuperer_programme();
                        $data['idProg']= $progs['idProg'];
                        $data['nomProg'] = $progs['nom'];
	  ?>
        <table class="form">
            <tr>
                <td><?php echo form_label('Code'.'<span style="color:red;font-weight:bold;font-size:14px;">*</span>'); ?></td>
                <td><?php
                    $input = array('type' => 'text', 'size' => '40', 'name' => 'sigle');
                    echo form_input($input,'',''); ?>
                </td>
            </tr>

            <tr>
                <td><?php echo form_label('Intitulé'.'<span style="color:red;font-weight:bold;font-size:14px;">*</span>'); ?></td>
                <td><?php
                    $input = array('type' => 'text', 'size' => '40', 'name' => 'titre');
                    echo form_input($input,'','');?>
                </td>
            </tr>

            <tr>
                    <td><?php  echo form_label('Description du module  ');?></td>
                    <td><?php $input = array( 'name'=>'description'); 
                            echo form_textarea($input,'','');
                            echo form_error('comments','<span class="error">','</span>');?>
                    </td>
                </tr>
                  <tr>
                <td style="margin-right:30px;">Semestre d'etudes<span style="color:red;font-weight:bold;font-size:14px;">*</span></td>
                <td style="width: 300px;"><?php 
                //debut modif par MedBakar le 15-03-2020
                echo"<SELECT name='semestre' style='width:250px' >";
                for($s=1;$s<=6;$s++){
                    echo"<option value='$s'>S".$s."</option>";
                }
                echo"</SELECT>";
//                $input = array('type' => 'text', 'size' => '30', 'name'=>'semestre') ;
//                        echo form_input($input,'','');
                //fin modif MedBakar
                ?>
                </td>
            </tr>
             <tr> 
                <td style="margin-right:30px;">Crédits<span style="color:red;font-weight:bold;font-size:14px;">*</span></td>
                <td style="width: 300px;"><?php $input = array('type' => 'text', 'size' => '30', 'name'=>'credits') ;
                        echo form_input($input,'','');?>
                </td>
            </tr>
            <!---------------add by MedBakar 26-02-2020------------>
            <tr> 
                <td style="margin-right:30px;">Coefficient<span style="color:red;font-weight:bold;font-size:14px;">*</span></td>
                <td style="width: 300px;"><?php $input = array('type' => 'text', 'size' => '30', 'name'=>'coefficient') ;
                        echo form_input($input,'','');?>
                </td>
            </tr>
            <!----------------------FIN------------->
            <tr> 
             <td><?php echo form_label('Departement<span style="color:red;font-weight:bold;font-size:14px;">*</span>') ;?></td>
                        <td>  
                            <?php     
                 
                            $index_prog = 0;
                            echo'<select name="programme">';
                            for($i =0 ; $i < count($data['idProg']); $i++)
                            {
                                echo '<option value="'.$data['idProg'][$i].'">'.$data['nomProg'][$i].'</option>';
                            }
                            
                            echo'</select>';
                            ?>
                            <?php $input = array('type' => '', 'size' => '54', 'name'=>'idProgramme'); 
                        ?>
                        </td>
              </tr>
            
        </table>

        
        
        <div class="clear"></div>
            <table>
                <tr>
                      <td width="235px"><?php echo form_label('Semestre d\'activation <span style="color:red;font-weight:bold;font-size:14px;">*</span></br>
                          (Premier semestre où ce </br> module sera enseigné)') ;?>  </td>
                        
					<!-- 2.2.1 ajout options avec valeur par défaut = semestre courant -->
							<?php 
									$anneeAct = ($data['courante']['annee'][0]);
									$semestreAct =	($data['courante']['semestre'][0]);
							 // if ($semestre=="1") {print($semestre);die;}
							 ?>
						<!-- debut select semestre -->
					<td>
					<select  name="semestreAct">
                        <?php
//							echo '<option value="2"';
//                        if ($semestreAct == "2") {
//                            echo ' selected';
//                        }
//                        echo '> Été</option>' . "\n";
                       ?>
                        <?php
                        echo '<option value="3"';
                        if ($semestreAct == "3") {
                            echo ' selected';
                        }
                        //echo '> Automne</option>' . "\n";
                         echo '> Impaire</option>' . "\n";
                        ?>
                        <?php
                        echo '<option value="1"';
                        if ($semestreAct == "1") {
                            echo ' selected';
                        }
                        //echo '> Printemps</option>' . "\n";
                         echo '> Paire</option>' . "\n";
                        ?>
                    </select> 
					<!-- fin select semestre -->
					<!-- debut select année -->
					<!-- --><td>
                        <td> 
						
                            <td><select  name="anneeAct">                           
						<?php	echo '> 2011</option>'."\n";
                        ?>
                        <?php
                        echo '<option value="2011"';
                        if ($anneeAct == "2011") {
                            echo ' selected';
                        }
                        echo '> 2011</option>' . "\n";
                        ?>
                        <?php
                        echo '<option value="2012"';
                        if ($anneeAct == "2012") {
                            echo ' selected';
                        }
                        echo '> 2012</option>' . "\n";
                        ?>
                        <?php
                        echo '<option value="2013"';
                        if ($anneeAct == "2013") {
                            echo ' selected';
                        }
                        echo '> 2013</option>' . "\n";
                        ?>
                        <?php
                        echo '<option value="2014"';
                        if ($anneeAct == "2014") {
                            echo ' selected';
                        }
                        echo '> 2014</option>' . "\n";
                        ?>
                        <?php
                        echo '<option value="2015"';
                        if ($anneeAct == "2015") {
                            echo ' selected';
                        }
                        echo '> 2015</option>' . "\n";
                        ?>
                        <?php
                        echo '<option value="2016"';
                        if ($anneeAct == "2016") {
                            echo ' selected';
                        }
                        echo '> 2016</option>' . "\n";
                        ?>
                        <?php
                        echo '<option value="2017"';
                        if ($anneeAct == "2017") {
                            echo ' selected';
                        }
                        echo '> 2017</option>' . "\n";
                        ?>
                        <?php
                        echo '<option value="2018"';
                        if ($anneeAct == "2018") {
                            echo ' selected';
                        }
                        echo '> 2018</option>' . "\n";
                        ?>
                        <?php
                        echo '<option value="2019"';
                        if ($anneeAct == "2019") {
                            echo ' selected';
                        }
                        echo '> 2019</option>' . "\n";
                        ?>
                        <?php
                        echo '<option value="2020"';
                        if ($anneeAct == "2020") {
                            echo ' selected';
                        }
                        echo '> 2020</option>' . "\n";
                        ?>
                        <?php
                        echo '<option value="2021"';

                        if ($anneeAct == "2021") {
                            echo ' selected';
                        }
                        echo '> 2021</option>' . "\n";
                        ?>
                        <?php
                        echo '<option value="2022"';

                        if ($anneeAct == "2022") {
                            echo ' selected';
                        }
                        echo '> 2022</option>' . "\n";
                        ?>
                        <?php
                        echo '<option value="2023"';
                        if ($anneeAct == "2023") {
                            echo ' selected';
                        }
                        echo '> 2023</option>' . "\n";
                        ?>
                        <?php
                        echo '<option value="2024"';
                        if ($anneeAct == "2024") {
                            echo ' selected';
                        }
                        echo '> 2024</option>' . "\n";
                        ?>
                        <?php
                        echo '<option value="2025"';
                        if ($anneeAct == "2025") {
                            echo ' selected';
                        }
                        echo '> 2025</option>' . "\n";
                        ?>
                        <?php
                        echo '<option value="2026"';
                        if ($anneeAct == "2026") {
                            echo ' selected';
                        }
                        echo '> 2026</option>' . "\n";
                        ?>

                        <?php
                        echo '<option value="2027"';
                        if ($anneeAct == "2027") {
                            echo ' selected';
                        }
                        echo '> 2027</option>' . "\n";
                        ?>
                        <?php
                        echo '<option value="2028"';
                        if ($anneeAct == "2028") {
                            echo ' selected';
                        }
                        echo '> 2028</option>' . "\n";
                        ?>

                        <?php
                        echo '<option value="2029"';
                        if ($anneeAct == "2029") {
                            echo ' selected';
                        }
                        echo '> 2029</option>' . "\n";
                        ?>
                        <?php
                        echo '<option value="2030"';
                        if ($anneeAct == "2030") {
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
<table>
   <tr class="submit">
                  <td style="width: 300px;">
                         <?php $pw = array('type' => 'submit', 'name' => 'submit', 'id'=>'submit', 'value'=>'Enregistrer'); 
                           echo form_input($pw);?>
                  </td>
                  <td></td>
              </tr>  
              
</table>
        <?php echo form_close(); ?>
    </div>                      
</div>         

<div class="clear"></div>
</div> <!--end of main content-->


<?php include(APPPATH.'views/include/footer.php');
?>
