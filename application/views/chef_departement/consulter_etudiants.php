<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
   

 <div class="container">
    <div class="col-xs-12 hl-left">            
        
   <h2>Consulter Profil Étudiant</h2> 
   <h3>Par matricule</h3> 
   
         <div class="form">
          <?php $attributes = array('class' => 'niceform');
         
          echo form_open('connexion/login',$attributes);?>  <!--a changer lors de l'implementation des fonctionnalités-->
         
               <fieldset>
                   <table id="classeNom">
                    <tr>
                        <td style="width: 100px;"><?php  echo form_label('Matricule :');?></td>
                        <td style="width: 330px;"><?php $input = array('type' => 'text', 'size' => '30', 'name'=>'matricule'); 
                             echo form_input($input,'','required');
                             echo form_error('matricule','<span class="error">','</span>');?></td>
                         <td id="submit"><input type="submit" name="submit" id="submit" value="Valider" /></td>
                    </tr>
                    </table>
                </fieldset>
          <?php echo form_close('');?>
          <div> <hr/></div>  
    <h3>Par classe</h3> 
          
         <?php echo form_open('connexion/login',$attributes);?>  <!--a changer lors de l'implementation des fonctionnalités-->
         
               <fieldset>
                   <table>
                    <tr>
                        <td style="width: 100px;"><?php  echo form_label('Par Classe:');?></td>
                        <td style="width: 330px;"><?php  $options = array(
                                        'classe1'  => 'Classe 1',
                                        'classe2'    => 'Classe 1000',
                                        'classe3'   => 'Classe 10000',
                                        'classe4' => 'Classe 10000',);
                        $js = 'id="classeNom" size="1"';
                        echo form_dropdown('classe', $options, '',$js);
                        
                        
                        
                        ?></td>
                         <td id="submit"><input type="submit" name="submit" id="submit" value="Valider" /></td>
                    </tr>
                    </table>
                </fieldset> 
         <?php echo form_close('');?>
  
         <div> <hr/></div> 
         
  <h3>Par Nom/Prénom</h3> 
         
        <?php echo form_open('connexion/login',$attributes);?>  <!--a changer lors de l'implementation des fonctionnalités-->
         
               <fieldset>
                   <table id="tableConsulterEtudiant">
                    <tr>
                        <td style="width: 100px;"><?php  echo form_label('Nom :');?></td>
                        <td style="width: 330px;"><?php $input = array('type' => 'text', 'size' => '30', 'name'=>'nom'); 
                             echo form_input($input,'','required');
                             echo form_error('matricule','<span class="error">','</span>');?></td>
                         <td></td>
                    </tr>
                    <tr>
                        <td style="width: 100px;"><?php  echo form_label('Prénom :');?></td>
                        <td style="width: 330px;"><?php $input = array('type' => 'text', 'size' => '30', 'name'=>'prenom'); 
                             echo form_input($input,'','required');
                             echo form_error('matricule','<span class="error">','</span>');?></td>
                         <td ></td>
                    </tr>
                    <tr>
                        <td style="width: 100px;"><?php  echo form_label('Classe :');?></td>
                        <td style="width: 330px;"><?php  $options = array(
                                        'classe1'  => 'Classe 1',
                                        'classe2'    => 'Classe 1000',
                                        'classe3'   => 'Classe 10000',
                                        'classe4' => 'Classe 10000',);
                        $js = 'id="classeNom" size="1"';
                        echo form_dropdown('classe', $options, '',$js);
                        
                        
                        
                        ?></td>
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