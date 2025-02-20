<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
   
 <div class="container">
    <div class="col-xs-12 hl-left">           
        
   <h2>Rechercher un employé</h2> 
   <h3>Par matricule</h3> 
   
 <div class="form">
          <?php $attributes = array('class' => 'niceform');
          echo form_open('connexion/login',$attributes);?>  <!--a changer lors de l'implementation des fonctionnalités-->
         
               <fieldset>
                   <table id="rechercheMatricule">
                    <tr>
                        <td><?php  echo form_label('Matricule :');?></td>
                        <td><?php $input = array('type' => 'text', 'size' => '30', 'name'=>'matricule'); 
                             echo form_input($input,'','required');
                             echo form_error('matricule','<span class="error">','</span>');?></td>
                         <td><input type="submit" name="submit" id="submit" value="Valider" /></td>
                    </tr>
                    </table>
                </fieldset>
          <?php echo form_close('');?>
          <div> <hr/></div>  
 
         
  <h3>Par Nom/Prénom</h3> 
         
        <?php echo form_open('connexion/login',$attributes);?>  <!--a changer lors de l'implementation des fonctionnalités-->
         
               <fieldset>
                   <table id="RechercheNom">
                    <tr>
                        <td><?php  echo form_label('Nom :');?></td>
                        <td><?php $input = array('type' => 'text', 'size' => '30', 'name'=>'nom'); 
                             echo form_input($input,'','required');
                             echo form_error('matricule','<span class="error">','</span>');?></td>
                         <td></td>
                    </tr>
                    <tr>
                        <td><?php  echo form_label('Prénom :');?></td>
                        <td><?php $input = array('type' => 'text', 'size' => '30', 'name'=>'prenom'); 
                             echo form_input($input,'','required');
                             echo form_error('matricule','<span class="error">','</span>');?></td>
                         <td ></td>
                     <tr>
                        <td></td>
                     <td class="submit">
                         <?php $pw = array('type' => 'submit', 'name' => 'submit', 'id'=>'submit', 'value'=>'Valider'); 
                             echo form_input($pw);?>
                     </td>
                    </tr>
                    </table>
                </fieldset>
          <?php echo form_close('</div>');?>
        
   </div><!-- end of right content-->               
  </div>   <!--end of center content -->               

    <div class="clear"></div>
    </div> <!--end of main content-->
	
    
  <?php include(APPPATH.'views/include/footer.php');?>