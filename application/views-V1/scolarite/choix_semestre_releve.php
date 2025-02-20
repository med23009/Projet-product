 <?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
  <div class="container">
    <div class="col-xs-12 hl-left">

         <?php echo heading($titre,'3');
           $attributes = array('class' => 'niceform');
          
                echo form_open('scolarite/voir_bulletin',$attributes);
                echo '<table class="form" id="tableProf">';
                 //echo form_hidden('matriculeEtudiant', $matriculeEtudiant);
                echo form_hidden('matriculeEtudiant', $matriculeEtudiant)
          ?>
        
            <tr>         
                               
            </tr>
            <tr>
                    
                    <td><?php echo form_label('Année <span style="color:red;font-weight:bold;font-size:14px;">*</span>'); ?> 
                </td>
                <td><select  name="annee">

                        echo '> 2011</option>'."\n";
                        ?>
                        <?php
                        echo '<option value="2011"';
                        if ($annee[0] == "2011") {
                            echo ' selected';
                        }
                        echo '> 2011</option>' . "\n";
                        ?>
                        <?php
                        echo '<option value="2012"';
                        if ($annee[0] == "2012") {
                            echo ' selected';
                        }
                        echo '> 2012</option>' . "\n";
                        ?>
                        <?php
                        echo '<option value="2013"';
                        if ($annee[0] == "2013") {
                            echo ' selected';
                        }
                        echo '> 2013</option>' . "\n";
                        ?>
                        <?php
                        echo '<option value="2014"';
                        if ($annee[0] == "2014") {
                            echo ' selected';
                        }
                        echo '> 2014</option>' . "\n";
                        ?>
                        <?php
                        echo '<option value="2015"';
                        if ($annee[0] == "2015") {
                            echo ' selected';
                        }
                        echo '> 2015</option>' . "\n";
                        ?>
                        <?php
                        echo '<option value="2016"';
                        if ($annee[0] == "2016") {
                            echo ' selected';
                        }
                        echo '> 2016</option>' . "\n";
                        ?>
                        <?php
                        echo '<option value="2017"';
                        if ($annee[0] == "2017") {
                            echo ' selected';
                        }
                        echo '> 2017</option>' . "\n";
                        ?>
                        <?php
                        echo '<option value="2018"';
                        if ($annee[0] == "2018") {
                            echo ' selected';
                        }
                        echo '> 2018</option>' . "\n";
                        ?>
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
                              <td>Semestre :</td>
                    <td>
                        
                    <?php
                        echo ' <select name="semestre" id=""> ';
                        for($i=1;$i<=6;$i++)
                        {
                                echo '<option value="'.$i.'"> S'.$i.'</option>';
                        }
                        echo '<option value="0"> Tous</option>';
                        echo '</select>';
                    ?>
                    </td>
                

            </tr>
            <tr style="height: 20px;"></tr>
            <tr>
                 <td class="submit">
                 <?php $pw = array('type' => 'submit', 'name' => 'submit', 'id'=>'submit', 'value'=>'Choisir le semestre');
                 echo form_input($pw);?>
                 </td>
            </tr>
         </table>
          <?php
                   
                   echo form_fieldset_close();
        echo form_close('</div>');?>
           </div>
           <div class="clear"></div>
    </div> <!--end of main content-->

    <?php
  include(APPPATH.'views/include/footer.php');?>



