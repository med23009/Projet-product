<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
   
    <!-- <div class="center_content">   -->
    <div class="container">
    <div class="col-xs-12 hl-left"> 
     
             
        
   <h2>Modifier Mot de Passe</h2> 
   <div class="warning_box" >
              Le nouveau mot de passe doit contenir 8 à 10 lettres et chiffres dont au moins une lettre et un chiffre.
          </div>
         <div class="form">
          <?php $attributes = array('class' => 'niceform');
         
          echo form_open('agent/modifier_mot_de_passe',$attributes);?>
         
               <fieldset>
                     <div><?php echo $errorMessage; ?></div>
                   <table id="modifier_pass">
                    <tr>
                        <td><label>Ancien mot de Passe<span style="color:red;font-weight:bold;font-size:14px;">*</span></label></td>
                        <td><?php $input = array('type' => 'password', 'size' => '50', 'name'=>'old_password'); 
                             echo form_input($input,'','required');
                             echo form_error('pseudo','<span class="error">','</span>');?></td>
                    </tr>
                    <tr>
                        <td><label>Nouveau mot de Passe<span style="color:red;font-weight:bold;font-size:14px;">*</span></label></td>
                        <td><?php $input = array('type' => 'password', 'size' => '50', 'name'=>'new_password'); 
                             echo form_input($input,'','required');
                             echo form_error('pseudo','<span class="error">','</span>');?></td>
                    </tr>
                    <tr>
                        <td><label>Confirmer mot de passe<span style="color:red;font-weight:bold;font-size:14px;">*</span></label></td>
                        <td><?php $input = array('type' => 'password', 'size' => '50', 'name'=>'confirmed_password'); 
                             echo form_input($input,'','required');
                             echo form_error('pseudo','<span class="error">','</span>');?></td>
                    </tr>
    
                     <tr class="submit">
                         <td></td>
                         <td id="submit"><input type="submit" name="submit" id="submit" value="Valider" /></td>
                     </tr>
                     
                     
                    </table>
                </fieldset>
                
         <?php echo form_close('</div>');?>
      
     
     </div><!-- end of right content-->
            
                    
  </div>   <!--end of center content -->               
                    
                    
    
    
    <div class="clear"></div>
    </div> <!--end of main content-->
	
    
  <?php include(APPPATH.'views/include/footer.php');?>