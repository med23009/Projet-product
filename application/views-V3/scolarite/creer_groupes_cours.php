<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
   

    <div class="container">
    <div class="col-xs-12 hl-left">          
        
      
        <?php echo heading('Créer un nouveau groupe','3');
		$attributes = array('class' => 'niceform');
		echo form_open('scolarite/cree_groupe_cours');
		echo form_fieldset();?>
        <table class="form">
                <tr>
                    <td><?php echo form_label('Sigle du module et Responsable du module<span style="color:red;font-weight:bold;font-size:14px;">*</span>') ;?></td>
                    <td>             
                        
                    <?php // print_r($sigleTitre); 
                    echo'<select class="form-control" name = sigle>';
					$counter=0;
                                       $counter1=0;
                        foreach($sigleCours as $sigle)
						{
                        /* echo'<option value="'.$sigle.'">'.$sigle.' '.$nomResponsable[$counter].' '.$prenomResponsable[$counter].'</option>'; Roger 2.1.3 */
						echo'<option value="'.$sigle.'">'.$sigle.' '.$sigleTitre[$counter1].' - '.$matriculeResponsable[$counter].': '.$nomResponsable[$counter].' '.$prenomResponsable[$counter].'</option>'; 
                          $counter++;
                           $counter1++;
                        }
                          echo'</select>';
                        ?>
                          <?php $input = array('type' => '', 'size' => '10', 'name'=>'sigle'); 
                         ?>
                    </td>
                </tr> 
                
                <tr>
                    <td><?php echo form_label('Enseignant du groupe <span style="color:red;font-weight:bold;font-size:14px;">*</span>') ;?></td>
                   
                    <td>             
                    <?php echo'<select class="form-control" name="matEmployer">';
                    $index = 0;
                        foreach($matriculeEmploye as $matEmp){
                          echo'<option value="'.$matEmp.'">'.$matEmp.': '.$nom[$index].' '.$prenom[$index].'</option>';
                          $index++;
                            }
                          echo'</select>';
                        ?>
                          <?php $input = array('type' => '', 'size' => '54', 'name'=>'idDep'); 
                    ?>
                    </td>
                </tr>
                
                <tr>
                    <td><?php echo form_label('Type du groupe <span style="color:red;font-weight:bold;font-size:14px;">*</span>') ;?></td>
                    <td>
                            <select class="form-control"  name="typeGroupe">
                            <option value="Groupe-Theorie">Groupe-Théorie</option>
                            <option value="Groupe-TP">Groupe-TP</option>
                            <option value="Groupe-TD">Groupe-TD</option>
                            <option value="Groupe-Projet">Groupe-Projet</option>
                            <option value="Groupe-Stage">Groupe-Stage</option>
                            </select> 
                    </td>
                </tr>
                
            

                <tr>                  
                   <td><?php echo form_label('Semestre <span style="color:red;font-weight:bold;font-size:14px;">*</span>'); ?>  </td>
                <td>
                    <select class="form-control"  name="session">
                        <?php
                        //  print_r($semestre);

//                        echo '<option value="02"';
//
//                        if ($semestre == "02") {
//                            echo ' selected';
//                        }
//                        echo '> Été</option>' . "\n";
//                        ?>
                        <?php
                        echo '<option value="03"';
                        if ($semestre == "03") {
                            echo ' selected';
                        }
                       // echo '> Automne</option>' . "\n";
                        echo '> Impaire</option>' . "\n";
                        ?>
                        <?php
                        echo '<option value="01"';
                        if ($semestre == "01") {
                            echo ' selected';
                        }
                        //echo '> Printemps</option>' . "\n";
                        echo '> Paire</option>' . "\n";
                        ?>
                    </select> 

                <td>

                <tr>

               
                <td><?php echo form_label('Année <span style="color:red;font-weight:bold;font-size:14px;">*</span>'); ?>  </td>
                <td><select class="form-control" name="date">

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
                <tr>                     
                    <td class="submit">
                        <?php $pw = array('class'=>'form-control','type' => 'submit', 'name' => 'submit', 'id'=>'submit', 'value'=>'Ajouter'); 
                            echo form_input($pw);?>
                    </td>
                </tr>                
                </table>
                <?php echo form_fieldset_close();
                echo form_close('</div>');?>      
    </div>  <!--right content-->
    <div class="clear"></div>
    </div> <!--end of main content-->
	
    <?php
    include(APPPATH.'views/include/footer.php');?>

       
 