<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
    <div class="container">
    <div class="col-xs-12 hl-left">

         <?php echo heading('Choisir semestre et filière','2');       
           echo form_open('scolarite/voir_billetin_tous');
         ?>
        <!-- <? php echo heading('Inscription automatique des étudiants dans les éléments ','3');?>  
       -->
        <div style="height: 30px;"></div>
        
<!--       
        
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
          
            echo '</select>';
        }
                ?>
   </table>

            <br>
            
                  </div>-->
        <div>
            <table style="width: 600px;" class="table">
                   <tr>
                    <td style="font-size: large;">Semestre :</td>
                    <td>
                    <?php
                        echo ' <select name="semestre" id="" class="form-control"> ';
                        for($i=1;$i<=6;$i++)
                        {
                                echo '<option value="'.$i.'"> S'.$i.'</option>';
                        }
                       // echo '<option value="0"> Tous</option>';
                        echo '</select>';
                    ?>
                    </td>
                </tr>
                <tr>
                    <td style="font-size: large;">Programme :</td>
                    <td>
                    <?php if(is_array($programme['idProgramme']))
                            {

                                echo ' <select name="idProgramme" id="" class="form-control"> ';

                                for($i=0;$i<count($programme['idProgramme']);$i++)
                                {
                                    echo '<option value="'.$programme['idProgramme'][$i].'">'.$programme['nomProgramme'][$i].'</option>';
                                }
                               // echo '<option value="0">Tous</option>';
                                echo '</select>';
                            }
                ?>
                   
                    </td>
                </tr>
                  <tr>
                    <td style="font-size: large;">Année :</td>
<!--  <td><?php echo form_label('Année <span style="color:red;font-weight:bold;font-size:14px;">*</span>'); ?> 
                </td>-->
                <td><select  name="annee" class="form-control">

                        
                        
                        <?php
                    
                     //   echo ' <select name="annee" id=""> ';
                        
                        foreach ($annee as $an)
                        {
                              $ann = $an+1 ;
                                echo '<option value="'.$an.'"> '.$an.' - '.$ann.'</option>';
                        }
                       
                      
                        echo '</select>';
                   
                    
                    ?>                     
                </td>
                </tr>
                
             
                <!--tr>
                    <td style="font-size: large;">Détail: </td><td><input type='checkbox' name="dtails" class="form-control" value=1 ></td>
                </tr-->
                
             </table>
           </div>
      
        <div style="margin-left: 200px; position: relative;">
        </div>
        <br>
        <div class="submit">
                        <?php $pw = array('type' => 'submit', 'name' => 'submit', 'id'=>'submit0', 'value'=>'Valider','class'=>'btn btn-success'); 
                            echo form_input($pw);?>
                    </div>
        <?php echo form_close('</div>');?>
           </div>
           <div class="clear"></div>
    </div> <!--end of main content-->

    <?php
  include(APPPATH.'views/include/footer.php');?>
