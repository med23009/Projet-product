 <?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
<div class="container">
    <div class="col-xs-12 hl-left">

         <?php echo heading('Choix du groupe de '.$sigle,'3');
           $attributes = array('class' => 'niceform');
          
                echo form_open('scolarite/'.$titre.'/'.$annee.'/'.$semestre.'/'.$session.'/'.$evaluation.'/'.$tri1.'/'.$sigle,$attributes);
                echo '<table class="form" id="tableProf">';
              
          ?>
        
            <tr>         
                               
            </tr>
            <tr>
                              <td>Groupe: </td>
                    <td>
                        
                    <?php
                        
                      
                    
                        echo ' <select name="Groupe" id=""> ';
                        
                        foreach ($Groupes as $gr)
                        {
                                echo '<option value="'.$gr.'"> '.$gr.'</option>';
                        }
                       echo '<option value=""> tous</option>';
                      
                        echo '</select>';
                   
                    
                    ?>
                    </td></tr>
        
            <!--
            <tr>
                 
                              <td>Filiere :</td>
                   
                    <td>
                

            </tr>-->
            <tr style="height: 20px;"></tr>
            <tr>
                 <td class="submit">
                 <?php $pw = array('type' => 'submit', 'name' => 'submit', 'id'=>'submit', 'value'=>'Valider');
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



