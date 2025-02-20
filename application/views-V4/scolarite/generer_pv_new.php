<?php include(APPPATH.'views/include/header.php');
//echo $programme['idProgramme'][6];
    include('include/menu.php');?>
<a href="<?php echo base_url();?>index.php/scolarite/" class="button button-grey" ><button id="btn" >Retour</button></a>
    <div class="container">
    <div class="col-xs-12 hl-left">

         <?php echo heading('Génération des  PVs','2');       
           echo form_open('scolarite/afficher_pv_new');
         ?>
        <!--<?php //echo heading('Inscription automatique des étudiants dans les éléments ','3');?>  
       -->
        <div style="height: 30px;"></div>
        
<!--       
        
        <div>
                        <?php echo heading('Programme: ','3');?>
            <br>
            <table width ="100%" style="background-color:#eee ; color: #000 ">
                           <?php 
        /*
                                   
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
               */ ?>
   </table>

            <br>
            
                  </div>-->
        <div>
            <table style="width: 600px;" class="table">
                <tr>
                    <td style="font-size: large;">Programme :</td>
                    <td>
                    <?php if(is_array($programme['idProgramme']))
                            {

                                echo ' <select name="idProgramme" id="prg" class="form-control" onchange="filiere(this.value)"> ';
                                
                                for($i=0;$i<count($programme['idProgramme']);$i++)
                                {
                                  
                                    echo '<option value="'.$programme['idProgramme'][$i].'">'.$programme['nomProgramme'][$i].'</option>';
                               //echo form_open('scolarite/afficher_pv_new');    
                                }
                               // echo '<option value="0">Tous</option>';
                                echo '</select>';
                            }
                ?>
                   
                    </td>
                </tr>
                  <tr>
                    <td style="font-size: large;">Année :</td>
<!--                                        <td><?php echo form_label('Année <span style="color:red;font-weight:bold;font-size:14px;">*</span>'); ?> 
                </td>-->
                <td><select  name="annee" class="form-control">

                        
                        
                        <?php
                        
                        for( $year=2019;$year<=2030;$year++){
                        echo '<option value="'.$year.'"';
                            if ($annee[0] ==$year) {
                            echo ' selected';
                        }
                        echo '>'.$year.'-'.($year+1).'</option>' . "\n";
                        }
                        ?>                        
                </td>
                </tr>
               
                  <tr >
                    <td style="font-size: large;">Semestre :</td>
                    <td>
                    <?php
                        echo ' <select name="semestre"  class="form-control" id="sem"> ';
                       
                           echo '<optgroup id="autre">';
                             for($i=2;$i<=6;$i++)
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
              
               
                <tr>
                    <td style="font-size: large;">Session :</td>
                    <td>
                    <?php
                        echo ' <select name="session" id="" class="form-control"> ';
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
                        echo ' <select name="tri" id="" class="form-control"> ';
                        echo '<option value="1'.'">'.'Matricule'.'</option>';
                        echo '<option value="2'.'">'.'Anonymat'.'</option>';
                        echo '</select>';
                    ?>
                    </td>
                </tr>
                <tr>
                    <td style="font-size: large;">Format :</td>
                    <td>
                    <?php
                        echo ' <select name="format" id="" class="form-control"> ';
                        echo '<option value="EXCEL" selected>'.'EXCEL'.'</option>';
                        echo '<option value="PDF">'.'PDF'.'</option>';
                        echo '</select>';
                    ?>
                    </td>
                </tr>
                 <tr>
                    <td style="font-size: large;">Mise en page :</td>
                    <td>
                    <?php
                        echo ' <select name="mise" id="" class="form-control"> ';
                          echo '<option value="mise2" selected>'.'Mise en page 1'.'</option>';
                          echo '<option value="mise1" >'.'Mise en page 2'.'</option>';
                      
                        echo '</select>';
                    ?>
                    </td>
                </tr>
                <tr>
                    <td style="font-size: large;">Détail: </td><td><input type='checkbox' name="details" class="form-control" ></td>
                </tr>
                
             </table>
           </div>
      
        <div style="margin-left: 200px; position: relative;">
        </div>
        <br>
        <div class="submit">
                        <?php $pw = array('type' => 'submit', 'name' => 'submit', 'id'=>'submit0', 'value'=>'Générer','class'=>'btn btn-success'); 
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



    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
