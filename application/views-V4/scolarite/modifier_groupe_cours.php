<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
   
 <div class="container">
    <div class="col-xs-12 hl-left">           
        
      
        <?php 
		// Modif RM 27 février 2013 echo heading('Modifier le groupe: '.$idGroupe,'2');
		echo heading('Modifier le groupe: '.$this->scolarite_modele->corrigerNumGroupe($idGroupe,'2'),2);
        $attributes = array('class' => 'niceform');
       
        echo form_open('scolarite/modifier_groupe_cours_action', $attributes);
        echo form_fieldset();?>
        <table class="form">
        
                <tr>
                    <td><?php echo form_label("Module :") ;?></td>
                    <td>             
                    <?php 
                        
                         
                           
                        ?>
                          <?php $input = array('type' => '', 'size' => '10', 'name'=>'sigle' , 'value' => $sigleCours, 'disabled' => 'disabled'); 
                          echo form_input($input);
                          ?>
                    </td>
                </tr> 
                
                <tr>
                    <td><?php echo form_label("Enseignant du module :") ;?></td>
                   
                    <td>             
                    <?php echo'<select name="matEmployer">';
                    $index = 0;
                    
                        foreach($matriculeEmploye as $matEmp)
                        {
                            $selected = '';
                            if($matEmp == $prof_resp)
                                $selected = "Selected";
                            
                          echo'<option value="'.$matEmp.'" '. $selected .' >'.
                                  $matEmp.': '.$nom[$index].' '.$prenom[$index].'</option>';
                          $index++;
                            }
                          echo'</select>';
                        ?>
                          <?php $input = array('type' => '', 'size' => '54', 'name'=>'idDep'); 
                    ?>
                    </td>
                </tr>
                
                <tr>
                    <td><?php echo form_label("Type du groupe :") ;?></td>
                    <td>
                            <select  name="typeGroupe" disabled="disabled">
                            <option value="Groupe-Theorie"<?php echo $type_info == "Groupe-Théorie" ? " Selected" : '';  ?>>Groupe-Théorie</option>
                            <option value="Groupe-TP" <?php echo $type_info == "Groupe-TP" ? " Selected" : '';  ?>>Groupe-TP</option>
                            <option value="Groupe-TD" <?php echo $type_info == "Groupe-TD" ? " Selected" : '';  ?>>Groupe-TD</option>
                            <option value="Groupe-Projet" <?php echo $type_info == "Groupe-Projet" ? " Selected" : '';  ?>>Groupe-Projet</option>
                            <option value="Groupe-Stage" <?php echo $type_info == "Groupe-Stage" ? " Selected" : '';  ?>>Groupe-Stage</option>
                            </select> 
                    </td>
                </tr>
                
            

                <tr>                  
                   <td><?php echo form_label("Semestre :"); ?>  </td>
                <td>
                    <select  name="session" disabled="disabled">
                        <?php
                         

                        echo '<option value="02"';

                        if ($semestre == "02") {
                            echo ' selected';
                        }
                        echo '> Été</option>' . "\n";
                        ?>
                        <?php
                        echo '<option value="03"';
                        if ($semestre == "03") {
                            echo ' selected';
                        }
                        echo '> Automne</option>' . "\n";
                        ?>
                        <?php
                        echo '<option value="01"';
                        if ($semestre == "01") {
                            echo ' selected';
                        }
                        echo '> Printemps</option>' . "\n";
                        ?>
                    </select> 

                <td>

                <tr>

               
                <td><?php echo form_label("Année :"); ?>  </td>
                <td><select  name="date" disabled="`disabled">

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
                        <?php $pw = array('type' => 'submit', 'name' => 'submit', 'id'=>'submit', 'value'=>'Modifier'); 
                            echo form_input($pw);?>
                    </td>
                </tr>                
                </table>
                <?php 
                $input = array('type' => 'hidden', 'size' => '54', 'name'=>'idGroupe', 'value'=> $idGroupe); 
                echo form_input($input);
                echo form_fieldset_close();
                echo form_close('</div>');?>      
    </div>  <!--right content-->
    <div class="clear"></div>
    </div> <!--end of main content-->
	
    <?php
    include(APPPATH.'views/include/footer.php');?>

       
 