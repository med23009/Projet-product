<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
    <div class="container">
    <div class="col-xs-12 hl-left">

         <?php echo heading('Transfert des notes pour  les élements non capitalisés','2');       
           echo form_open('scolarite/choix_session');
         ?>
        <!--<? php echo heading('Inscription automatique des étudiants dans les éléments ','3');?>  
       -->
        <div style="height: 30px;"></div>
        
       
                     <table>
                  <tr>
                    
                    <?php echo form_label('<td style="font-size: large;">Année <span style="color:red;font-weight:bold;font-size:14px;">*</span>'); ?> 
                </td>
                <td><select class="form-control"  name="annee">

                        
                      
                        <?php
                        echo '<option value="2019"';
                        if ($annee[0] == "2019") {
                            echo ' selected';
                        }
                        echo '> 2019</option>' . "\n";
                        ?>
                        <?php
                        echo '<option value="2020"';
                        if ($annee[0] == "2020") {
                            echo ' selected';
                        }
                        echo '> 2020</option>' . "\n";
                        ?>
                        <?php
                        echo '<option value="2021"';

                        if ($annee[0] == "2021") {
                            echo ' selected';
                        }
                        echo '> 2021</option>' . "\n";
                        ?>
                        <?php
                        echo '<option value="2022"';

                        if ($annee[0] == "2022") {
                            echo ' selected';
                        }
                        echo '> 2022</option>' . "\n";
                        ?>
                        <?php
                        echo '<option value="2023"';
                        if ($annee[0] == "2023") {
                            echo ' selected';
                        }
                        echo '> 2023</option>' . "\n";
                        ?>
                        <?php
                        echo '<option value="2024"';
                        if ($annee[0] == "2024") {
                            echo ' selected';
                        }
                        echo '> 2024</option>' . "\n";
                        ?>
                        <?php
                        echo '<option value="2025"';
                        if ($annee[0] == "2025") {
                            echo ' selected';
                        }
                        echo '> 2025</option>' . "\n";
                        ?>
                        <?php
                        echo '<option value="2026"';
                        if ($annee[0] == "2026") {
                            echo ' selected';
                        }
                        echo '> 2026</option>' . "\n";
                        ?>

                        <?php
                        echo '<option value="2027"';
                        if ($annee[0] == "2027") {
                            echo ' selected';
                        }
                        echo '> 2027</option>' . "\n";
                        ?>
                        <?php
                        echo '<option value="2028"';
                        if ($annee[0] == "2028") {
                            echo ' selected';
                        }
                        echo '> 2028</option>' . "\n";
                        ?>

                        <?php
                        echo '<option value="2029"';
                        if ($annee[0] == "2029") {
                            echo ' selected';
                        }
                        echo '> 2029</option>' . "\n";
                        ?>
                        <?php
                        echo '<option value="2030"';
                        if ($annee[0] == "2030") {
                            echo ' selected';
                        }
                        echo '> 2030</option>' . "\n";
                        ?>                           
                </td>
                </tr>
                
                <tr>
                    <td style="font-size: large;">Semestre :</td>
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
                    <tr>
                        <td style="font-size: large;">Programme :</td>
                    <td>
                        <?php 
        
                                   
        if(is_array($programme['idProgramme']))
        {
          
            echo ' <select  class="form-control" name="idProgramme" id=""> ';
            
            for($i=0;$i<count($programme['idProgramme']);$i++)
            {
                echo '<option value="'.$programme['idProgramme'][$i].'">'.$programme['nomProgramme'][$i].'</option>';
            }
            
            echo '</select>';
        }
                ?>
                    </td></tr>
                    <!--
                     <tr>
                    
                    <td><strong>Tous les élements :</strong></td><td>
              
                      <?php
                    $input = array('type' => 'checkbox', 'name' => 'choix', 'value' => '0', 'class' => 'form-control');
                    echo form_input($input,'','');
                    ?> </td></tr> --> </div>
                </div</td></tr>
             </table>
 
      
        <br>
        <div class="form-group">
            <div class="col-sm-offset-4 col-lg-8 col-sm-8 text-left">
                        <?php $pw = array('type' => 'submit', 'name' => 'submit', 'id'=>'submit', 'value'=>'Générer', 'class'=>'btn btn-primary'); 
                            echo form_input($pw);?>
                    </div>
        <?php echo form_close('</div>');?>
           </div>
           <div class="clear"></div>
    </div> <!--end of main content-->

    <?php
  include(APPPATH.'views/include/footer.php');?>


