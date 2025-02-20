
<?php
include(APPPATH.'views/include/header.php');
include('include/menu.php');
?>
<div class="container">
     <script>
          $(document).ready(function () {
    $("#fil").toggle();
    $("#chek1").change(function () {
        $("#fil").toggle();
    });
    $("#prof").toggle();
    $("#chk2").change(function () {
        $("#prof").toggle();
    });
    $("#salle").toggle();
    $("#chk3").change(function () {
        $("#salle").toggle();
    });
    
    });</script>
    <div class="col-xs-12 hl-left">
	
		<?php
        // Ajout RM 27 février 2013
		echo heading( 'Assigner/Modifier l\'horaire d\'un groupe','2');
		$attributes = array('class' => 'niceform', 'name' => 'choixType');
        echo form_open('scolarite/emplois_du_temps');
        echo form_fieldset();
        ?>
         <label>Emplois du temps par filiére </label><input name="chek1"  value="1" type="radio" id="chek1" />
          <tr>
                                            <td>
                                                <label>Par professeur</label><input name="chek1" value="2" type="radio" id="chk2" />
                                               <!-- <input placeholder="Nom et prénom" type="text" id="txt1" />
                                                -->

                                            </td>
                                        </tr>
                                         <tr>
                                            <td>
                                                <label>Par salle</label><input name="chek1" value="3" type="radio" id="chk3" />
                                               <!-- <input placeholder="Nom et prénom" type="text" id="txt1" />
                                                -->

                                            </td>
                                        </tr>
                                                 <div id="prof">
            
                                        <?php
			if(count($employe['matriculeEmploye'])>0){
				?>
					<tr>
							<select name="matriculeEmploye" class="form-control" id="txt1" >
								<option value="-1">choisissez le professeur</option>
								<?php
								for ($i=0; $i<count($employe['matriculeEmploye']);$i++){
                        echo'<option value="' .$employe['prenom'][$i] . '">' .
                                $employe['nom'][$i] .' '.$employe['prenom'][$i]. '</option>';
                    }
                        }		?>
               
                    
							</select>
                                         <table>
        <tr>  
                
                <td></td>
                <td class="submit">
                         <?php $pw = array('type' => 'submit', 'name' => 'submit', 'id'=>'submit','class'=>"form-control", 'value'=>'Suivant'); 
                             echo form_input($pw);?>
            </td>
        </tr></table>
                                        
					
         </div>
                                         <div id="salle">
          <?php   echo '<select class="form-control" name="local" id="local">';
			  foreach ($local as $loc) {

                                        echo'<option value="' . $loc . '" ';
                                        

                                        echo '>' . $loc . '</option>';
                                    }
                                    echo'</select>';
                                    ?>
                                              <table>
        <tr>  
                
                <td></td>
                <td class="submit">
                         <?php $pw = array('type' => 'submit', 'name' => 'submit', 'id'=>'submit','class'=>"form-control", 'value'=>'Suivant'); 
                             echo form_input($pw);?>
            </td>
        </tr></table>
         </div>
        <div id="fil">
        <table class="form">


             <tr>                  
                   <td><?php echo form_label("Semestre :"); ?>  </td>
                <td>
                    <?php
                        echo ' <select class="form-control" name="semestre" id=""> ';
                        for($i=1;$i<=6;$i++)
                        {
                                echo '<option value="'.$i.'"> S'.$i.'</option>';
                        }
                        echo '</select>';
                    ?>
                    </td>

                <td>

                <tr>

               
                <td><?php echo form_label("Année :"); ?>  </td>
                <td><select class="form-control"  name="date">

                        echo '> 2011</option>'."\n";
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
               <!-- <tr>
                <td><?php echo form_label("Module :"); ?></td>
                <td>  
                    <?php
                    $index_dep = 0;
                    echo'<select class="form-control" name="choixCours">';                
                    for ($i=0; $i<count($sigleCours);$i++){
                        echo'<option value="' . $sigleCours[$i] . '">' .
                                $sigleCours[$i] .' '.$titre[$i]. '</option>';
                    }
                    echo'</select>';
                    ?>
                    
                    <?php $input = array('type' => '', 'size' => '54', 'name' => 'sigle');
                    ?>
             
                </td>-->
                </tr>
                
              
                <tr> 
                   <td><?php echo form_label("Programme :"); ?>  </td>
                <td>   
                            <?php 
        
                              
        if(is_array($programme['idProgramme']))
        {
          
            echo ' <select class="form-control" name="idProgramme" id=""> ';
            
            for($i=0;$i<count($programme['idProgramme']);$i++)
            {
                echo '<option value="'.$programme['idProgramme'][$i].'">'.$programme['nomProgramme'][$i].'</option>';
            }
            echo '<option value="0>Tous</option>';
            echo '</select>';
        }
                ?>
                </td>
                </tr>
        </table>
 <table>
        <tr>  
                
                <td></td>
                <td class="submit">
                         <?php $pw = array('type' => 'submit', 'name' => 'submit', 'id'=>'submit','class'=>"form-control", 'value'=>'Suivant'); 
                             echo form_input($pw);?>
            </td>
        </tr></table>
        </div></div></div></div>
        <div id="ff">
         <div>
             <div>
        
             <?php
        echo form_fieldset_close();

        echo form_close('</div>');
        ?>
                
             </div>
         

        
          <div class="clear"></div>
          </div>
     
 <!--end of main content-->

<?php include(APPPATH.'views/include/footer.php'); ?>


