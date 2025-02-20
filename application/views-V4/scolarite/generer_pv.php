<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
    <div class="container">
    <div class="col-xs-12 hl-left">

         <?php echo heading('Génération des  PV','2');       
           echo form_open('scolarite/afficher_pv');
         ?>
        <!--<? php echo heading('Inscription automatique des étudiants dans les éléments ','3');?>  
       -->
        <div style="height: 30px;"></div>
        
       
        
        <div>
                        <?php echo heading('Programme: ','3');?>
            <br>
            <table width ="100%" style="background-color:#eee ; color: #000 ">
                           <?php 
        
                                   
        if(is_array($programme['idProgramme']))
        {
          
            echo ' <select name="idProgramme" id=""> ';
            
            for($i=0;$i<count($programme['idProgramme']);$i++)
            {
                echo '<option value="'.$programme['idProgramme'][$i].'">'.$programme['nomProgramme'][$i].'</option>';
            }
            echo '<option value="0>Tous</option>';
            echo '</select>';
        }
                ?>
   </table>

            <br>
            
                  </div>
        <div>
            <table style="width: 400px;">
                  <tr>
                    
                    <td><?php echo form_label('Année <span style="color:red;font-weight:bold;font-size:14px;">*</span>'); ?> 
                </td>
                <td><select  name="annee">

                        
                        <?php
                       for($year=2011;$year<=2030;$year++){
                        echo '<option value="'.$year.'"';
                        
                        if ($annee[0] == $year) {
                            echo ' selected';
                        }
                        echo '>'.$year.'</option>' . "\n";
                       }
                        ?>
                </td>
                </tr>
                
                <tr>
                    <td style="font-size: large;">Semestre :</td>
                    <td>
                    <?php
                        echo ' <select name="semestre" id=""> ';
                        for($i=1;$i<=6;$i++)
                        {
                                echo '<option value="'.$i.'"> S'.$i.'</option>';
                        }
                        echo '<option value=0""> Tous</option>';
                        echo '</select>';
                    ?>
                    </td>
                </tr>
               
                <tr>
                    <td style="font-size: large;">Session :</td>
                    <td>
                    <?php
                        echo ' <select name="session" id=""> ';
                        echo '<option value="1'.'">'.'Session normale'.'</option>';
                        echo '<option value="2'.'">'.'Session de ratrappage'.'</option>';
                        echo '</select>';
                    ?>
                    </td>
                </tr>
                 <tr>
                    <td style="font-size: large;">Trier par :</td>
                    <td>
                    <?php
                        echo ' <select name="tri" id=""> ';
                        echo '<option value="1'.'">'.'Matricule'.'</option>';
                        echo '<option value="2'.'">'.'Anonymat'.'</option>';
                        echo '</select>';
                    ?>
                    </td>
                </tr>
             </table>
           </div>
      
        <div style="margin-left: 200px; position: relative;">
        </div>
        <br>
        <div class="submit">
                        <?php $pw = array('type' => 'submit', 'name' => 'submit', 'id'=>'submit', 'value'=>'Générer'); 
                            echo form_input($pw);?>
                    </div>
        <?php echo form_close('</div>');?>
           </div>
           <div class="clear"></div>
    </div> <!--end of main content-->

    <?php
  include(APPPATH.'views/include/footer.php');?>


