<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
   <div class="container">
    <div class="col-xs-12 hl-left">

         <?php echo heading('Génération liste anonymat exam','2');       
           echo form_open('scolarite/generer_liste_anonymat_exam');
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
            echo '</select>';
        }
                ?>
   </table>

            <br>
            
                  </div>
        <div>
            <table style="width: 400px;">
                <tr>
                    <td style="font-size: large;">Grade :</td>
                    <td>
                    <?php
                        echo ' <select name="grade" id=""> ';
                        for($i=0;$i<count($grade['idGrade']);$i++)
                        {
                                echo '<option value="'.$grade['idGrade'][$i].'">'.$grade['idGrade'][$i].'</option>';
                        }
                        echo '</select>';
                    ?>
                    </td>
                </tr>
                <tr>
                    <td style="font-size: large;">Semestre :</td>
                    <td>
                    <?php
                        echo ' <select name="semestre" id=""> ';
                        for($i=0;$i<count($semestres);$i++)
                        {
                                echo '<option value="'.$semestres[$i].'"> S'.$semestres[$i].'</option>';
                        }
                        
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
                        <?php $pw = array('type' => 'submit', 'name' => 'submit', 'id'=>'submit', 'value'=>'Inscrire'); 
                            echo form_input($pw);?>
                    </div>
        <?php echo form_close('</div>');?>
           </div>
           <div class="clear"></div>
    </div> <!--end of main content-->

    <?php
  include(APPPATH.'views/include/footer.php');?>


