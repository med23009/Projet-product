<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
<div class="container">
    <div class="col-xs-12 hl-left">

         <?php echo heading($titre,'3');
           $attributes = array('class' => 'niceform');
          
                echo form_open('scolarite/trouver_etudiant_pour_attestation',$attributes);
                echo '<table class="form" id="tableProf">';
          ?>
        
            <tr>
                
                
                
            </tr>
            <tr>
                     <td>
                        
                    <?php
                    
                        echo ' <select name="annee" id=""> ';
                        
                        foreach ($annee as $an)
                        {
                                echo '<option value="'.$an.'"> '.$an.'</option>';
                        }
                       
                      
                        echo '</select>';
                    ?>
                    </td>
                

            </tr>
            <tr style="height: 20px;"></tr>
            <tr>
                 <td class="submit">
                 <?php $pw = array('type' => 'submit', 'name' => 'submit', 'id'=>'submit', 'value'=>'Choisir l\'annee');
                 echo form_input($pw);?>
                 </td>
            </tr>
         </table>
        <?php echo form_close('</div>');?>
           </div>
           <div class="clear"></div>
    </div> <!--end of main content-->

    <?php
  include(APPPATH.'views/include/footer.php');?>



