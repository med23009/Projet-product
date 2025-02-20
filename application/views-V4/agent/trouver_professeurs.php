<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
   
 <div class="container">
    <div class="col-xs-12 hl-left">         
        
   <h2>Consulter les informations des professeurs</h2> 
   <h3>Par matricule</h3> 
   
         <div class="form">
          <?php $attributes = array('class' => 'niceform');
         
            echo form_open('connexion/login',$attributes);?>  <!--a changer lors de l'implementation des fonctionnalités-->
         
               <fieldset>
                   <table>
                       <td style="width: 100px;"><?php  echo form_label('Matricule :');?></td>
                        <td style="width: 330px;"><?php $input = array('type' => 'text', 'size' => '30', 'name'=>'Matricule'); 
                             echo form_input($input,'','required');
                             echo form_error('Matricule','<span class="error">','</span>');?></td>
                         <td></td>
                    </table>
                </fieldset>
          <?php echo form_close('');?>
          <div> <hr/></div>  
    <h3>Par Cours/Departement</h3> 
          
         <?php echo form_open('connexion/login',$attributes);?>  <!--a changer lors de l'implementation des fonctionnalités-->
         
               <fieldset>
                   <table>
                    <tr>
                        <td style="width: 100px;"><?php  echo form_label('Classe:');?></td>
                        <td style="width: 330px;"><?php  $options = array(
                                        'Cours1'  => 'Cours1',
                                        'Cours2'    => 'Cours2',
                                        'Cours3'   => 'Cours3',
                                        'Cours4' => 'Cours4',);
                        $js = 'id="classeNom" size="1"';
                        echo form_dropdown('Cours', $options, '',$js);
                        ?></td>
                        
                        <td>
                        <td><?php  echo form_label('Departement:');?></td>
                        <td ><?php  $options = array(
                                        'Département 1'  => 'Mécatronique',
                                        'Département 2'    => 'Mines',
                                        'Département 3'   => 'Préparatoire',
                                    );
                        $js = 'id="classeNom" size="1"';
                        echo form_dropdown('Departement', $options, '',$js);
                        ?>                  
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
                             echo form_error('Nom','<span class="error">','</span>');?></td>
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
                        
                    </tr>
                    </table>
                   
                     <table>
                         <tr>
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