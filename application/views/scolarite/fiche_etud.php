<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
  <div class="container">
    <div class="col-xs-12 hl-left">

         <?php echo heading('Fiche d\'émargement','2');       
           echo form_open('scolarite/fiche_etud_element');
         ?>
       
        <div style="height: 30px;"></div>
        
       
<!--        
        <div>
                        <?php // echo heading('Programme: ','3');?>
            <br>
            <table width ="100%" style="background-color:#eee ; color: #000 ">
                           //<?php 
//        
//                                   
//        if(is_array($programme['idProgramme']))
//        {
//          
//            echo ' <select name="idProgramme" id=""> ';
//            
//            for($i=0;$i<count($programme['idProgramme']);$i++)
//            {
//                echo '<option value="'.$programme['idProgramme'][$i].'">'.$programme['nomProgramme'][$i].'</option>';
//            }
//            echo '</select>';
//        }
//                ?>
   </table>

            <br>
            
                  </div>-->
        <div>
            <table style="width: 600px;" class="table">
                <tr>
                    <td style="font-size:large"> Programme:</td>
                    <td>
                        <?php 
        
                                   
        if(is_array($programme['idProgramme']))
        {
          
            echo ' <select name="idProgramme" id="prg" class="form-control"  onchange="filiere(this.value)"> ';
            
            for($i=0;$i<count($programme['idProgramme']);$i++)
            {
                echo '<option value="'.$programme['idProgramme'][$i].'">'.$programme['nomProgramme'][$i].'</option>';
            }
            echo '</select>';
        }
                ?>
                    </td>
                </tr>
                <tr>
                    <td style="font-size: large;">Grade :</td>
                    <td>
                    <?php
                        echo ' <select name="grade" id="" class="form-control"> ';
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
                        echo ' <select name="semestre" id="sem" class="form-control"> ';
                       /* for($i=0;$i<count($semestres);$i++)
                        {
                                echo '<option value="'.$semestres[$i].'"> S'.$semestres[$i].'</option>';
                        }*/
                        echo '<optgroup id="autre">';
                             for($i=2;$i<=count($semestres);$i++)
                            //for($i=2;$i<=count($semestres);$i++)
                              {
                                echo '<option value="'.$i.'"> S'.$i.'</option>';
                                 }
                       // echo '<option value="0"> Tous</option>';
                       // echo '</div>';
                                 echo  '</optgroup>';
                               echo '<optgroup id="TC">';
                         //echo '<div id="TC">';
                                  for($i=1;$i<=1;$i++)
                        {
                                echo '<option value="'.$i.'"> S'.$i.'</option>';
                        }
                        // echo '</div>';
                        echo  '</optgroup>';
                        echo '</select>';
                    ?>
                    </td>
                </tr>
                
                <!-- -->
                <tr>
                    <td style="font-size: large;">Session :</td>
                    <td>
                    
                    <select name="session" id="" class="form-control"> 
                        <option value="N">Normale</option>
                        <option value="R">Rattrapge</option>
                    </select>
                    
                    </td>
                </tr>
                <!-- -->
                 <tr>
                    <td style="font-size: large;">Evaluation :</td>
                    <td>
                    
                    <select name="evaluation" id="" class="form-control"> 
                        <option value="cc">Moyenne de Compétences</option>
                        <option value="examen">Moyenne de Connaissance</option>
                    </select>
                    
                    </td>
                </tr>
                
             </table>
           </div>
        <div style="margin-left: 200px; position: relative;">
        </div>
        <br>
        <div class="submit">
                        <?php $pw = array('type' => 'submit', 'name' => 'submit', 'id'=>'submit5', 'value'=>'Valider','class'=>'btn btn-success'); 
                            echo form_input($pw);?>
                    </div>
        <?php echo form_close('</div>');?>
           </div>
           <div class="clear"></div>
    </div> <!--end of main content-->
    <script> 
     
   $(document).ready(function(){
     
	  $("#autre").show();
           $("#TC").hide();
        
       });
    function filiere(val){
        if(val=="TC"){
            $("#sem").val(null);
            $("#TC").show();
            $("#autre").hide();
         
            }else
            {
                $("#sem").val(null);
                $("#autre").show();
                 $("#TC").hide();
              
            }
    }
    </script>
    <?php
  include(APPPATH.'views/include/footer.php');?>


