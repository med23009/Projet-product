
<?php include(APPPATH.'views/include/header.php');
include('include/menu.php');
?> 


<div class="container">
    <div class="col-xs-12 hl-left">



        <?php
 echo validation_errors('<div class="error_box">', '</div>');
        echo heading('Créer un module ', '3');

        $attributes = array('class' => 'niceform');

        echo form_open('scolarite/ajouter_unite_succe', $attributes);
        echo form_fieldset();
        ?>
        <div id="ajouterClasse">
        </div>
        <table id="unite" style="width: 600px;">
            <tr>
                <td>Sigle<span style="color:red;font-weight:bold;font-size:14px;">*</span></td>
                <td style="width: 300px;"><?php $input = array('type' => 'text', 'size' => '30', 'name'=>'sigle') ;
                        echo form_input($input,'','');?>
                </td>
            </tr>
            <tr>
                <td>Titre<span style="color:red;font-weight:bold;font-size:14px;">*</span></td>
                <td style="width: 300px;"><?php $input = array('type' => 'text', 'size' => '30', 'name'=>'titre') ;
                        echo form_input($input,'','');?>
                </td>
            </tr>
            <tr>
                <td>Description<span style="color:red;font-weight:bold;font-size:14px;">*</span></td>
                <td style="width: 300px;"><?php $input = array('type' => 'text', 'size' => '30', 'name'=>'description') ;
                        echo form_input($input,'','');?>
                </td>
            </tr>
            
            <tr>
                <td style="margin-right:30px;">Semestre<span style="color:red;font-weight:bold;font-size:14px;">*</span></td>
                <td style="width: 300px;"><?php $input = array('type' => 'text', 'size' => '30', 'name'=>'semestre') ;
                        echo form_input($input,'','');?>
                </td>
            </tr>
           
           
            <tr> 
                <td style="margin-right:30px;">Crédits<span style="color:red;font-weight:bold;font-size:14px;">*</span></td>
                <td style="width: 300px;"><?php $input = array('type' => 'text', 'size' => '30', 'name'=>'Crédits') ;
                        echo form_input($input,'','');?>
                </td>
            </tr>
            <tr> 
             <td><?php echo form_label('Programme<span style="color:red;font-weight:bold;font-size:14px;">*</span>') ;?></td>
                        <td>  
                            <?php     
                 
                            $index_prog = 0;
                            echo'<select name="programme">';
                            foreach($nomProgramme as $prog){
                            echo'<option value="'.$idProgramme[$index_prog++].'">'.$prog.'</option>';
                            }
                            echo'</select>';
                            ?>
                            <?php $input = array('type' => '', 'size' => '54', 'name'=>'idProgramme'); 
                        ?>
                        </td>
              </tr>
            
        </table>
        
       <?php echo form_close();?>
    </div>                      
</div>         

<div class="clear"></div>
<table>
                <tr>
                      <td width="235px"><?php echo form_label('Semestre d\'activation <span style="color:red;font-weight:bold;font-size:14px;">*</span></br>
                          (Premier semestre où ce </br> module sera enseigné)') ;?>  </td>
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
<table>
   <tr class="submit">
                  <td style="width: 300px;">
                         <?php $pw = array('type' => 'submit', 'name' => 'submit', 'id'=>'submit', 'value'=>'Enregistrer'); 
                           echo form_input($pw);?>
                  </td>
                  <td></td>
              </tr>  
              
</table>
</div> <!--end of main content-->


<?php include(APPPATH.'views/include/footer.php');
?>
