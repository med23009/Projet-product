<?php include(APPPATH.'views/include/header.php');
  include('include/menu.php');
  
 
  ?>
   
    <div class="center_content">  
    
     
    
    <div class="right_content">            
        
         <div class="form">
             <h3>Consulter les informations personnelles</h3>
         <?php $attributes = array('class' => 'niceform');
         
          echo form_open('scolarite/trouver_etudiant_a_consulter',$attributes);?>
         
                    <table id="infoPersonnelles">
                    <tr>
                        <td id="titre"><label>Nom :</label></td>
                        <td id="contenu"><label><?php echo $nom;?></label></td>
                    </tr>
                    <tr>
                        <td id="titre"><label>Prénom:</label></td>
                        <td id="contenu"><label><?php echo $prenom;?></label></td>
                    </tr>
                    <tr>
                        <td id="titre"><label>E-mail:</label></td>
                       <td><?php $input = array('type' => 'text', 'disabled'=>'disabled', 'size' => '35', 'name'=>'email') ;
                             echo form_input($input,$email,'required');
                             echo form_error('email','<span class="error">','</span>');?>
                        </td>
                    </tr>
                    <tr>
                        <td id="titre"><label>Nom d'utilisateur:</label></td>
                        <td id="contenu"><label><?php echo $username;?></label></td>
                    </tr>
                    <tr>
                        <td id="titre"><label>Date de naissance:</label></td>
                        <td id="contenu"><label><?php echo date('d/m/Y',strTotime($dateNaissance));?></label></td>
                    </tr>
                    
                   <tr>
                        <td><label>Nationalite:</label></td>
                        <td><?php $input = array('type' => 'text', 'disabled'=>'disabled', 'size' => '35', 'name'=>'nationalite'); 
                             echo form_input($input,$nationalite,'required');
                             echo form_error('nationalite','<span class="error">','</span>');?></td>
                   </tr>
                   
                    <tr>
                        <td id="titre"><label>Genre:</label></td>
                        <td id="contenu"><label><?php echo $sexe;?></label></td>
                    </tr>
                    <tr>
                        <td><label >Téléphone 1 :</label></td>
                        <td><?php $input = array('type' => 'text', 'disabled'=>'disabled', 'size' => '35', 'name'=>'phone1') ;
                             echo form_input($input,$telephone1,'required');
                             echo form_error('phone1','<span class="error">','</span>');?>
                        </td>
                    </tr>

                    <tr>
                        <td id="title"><label>Adresse personnelle:</label></td>
                        <td></td>
                    </tr>
                   
                    <tr>
                        <td><label>Ligne 1:</label></td>
                        <td><?php $input = array('type' => 'text', 'disabled'=>'disabled', 'size' => '35', 'name'=>'ligne1') ;
                             echo form_input($input,'','required');
                             echo form_error('ligne1','<span class="error">','</span>');?></td>
                    </tr>
                    
                    <tr>
                        <td><label>Ligne 2:</label></td>
                        <td><?php $input = array('type' => 'text', 'disabled'=>'disabled', 'size' => '35', 'name'=>'ligne2') ;
                             echo form_input($input,'','required');
                             echo form_error('ligne2','<span class="error">','</span>');?></td>
                    </tr>
                     <tr>
                        <td><label>Ligne 3:</label></td>
                        <td><?php $input = array('type' => 'text', 'disabled'=>'disabled', 'size' => '35', 'name'=>'ligne3') ;
                             echo form_input($input,'','required');
                             echo form_error('ligne3','<span class="error">','</span>');?></td>
                    </tr>
                      <tr>
                          
                        <td id="title"><label>Informations des parents:</label></td>
                        <td></td>
                    </tr>
                  <tr>
                        <td><label>Téléphone : </label></td>
                        <td><?php echo $telephoneParents;?></td>
                  </tr>
                  
                  <tr>
                    
                        <td id="title"><label>Adresse :</label></td>
                           <td></td>
                  </tr>
                   <tr>
                        <td><label>Ligne1:</label></td>
                        <td><?php echo $ligne1;?></td>
                  </tr>
                   <tr>
                        <td><label>Ligne2:</label></td>
                        <td><?php echo $ligne2;?></td>
                  </tr>
                   <tr>
                        <td><label>Ligne3:</label></td>
                        <td><?php echo $ligne3;?></td>
                  </tr>
                  
   
                    <tr>
                        <td><label >Contact d'urgence :</label></td>
                        <td><?php $input = array('type' => 'text', 'disabled'=>'disabled', 'size' => '35', 'name'=>'contactUrgence'); 
                             echo form_input($input,$contactUrgence,'required');
                             echo form_error('contactUrgence','<span class="error">','</span>');?></td>
                    </tr>
                  
                    <tr>
                        <td><label>Lien de parenté :</label></td>
                        <td><?php $input = array('type' => 'text', 'disabled'=>'disabled', 'size' => '35', 'name'=>'lienParenteContactUrgence'); 
                                echo form_input($input, $telephoneUrgence,'required');
                                echo form_error('lienParenteContactUrgence','<span class="error">','</span>');?></td>
                    </tr>
                  
                   <tr>
                        <td><label>Téléphone d'urgences :</label></td>
                        <td><?php $input = array('type' => 'text', 'disabled'=>'disabled', 'size' => '35', 'name'=>'telephoneUrgence'); 
                             echo form_input($input, $telephoneUrgence,'required');
                             echo form_error('telephoneUrgence','<span class="error">','</span>');?></td>
                  </tr>
             
              <tr class="submit">
                  <td></td>
                  <td>
                         <?php $pw = array('type' => 'submit', 'name' => 'consulter_autre', 'id'=>'consulter_autre', 'value'=>'Consulter un autre étudiant'); 
                             echo form_input($pw);?>
                  </td>
              </tr>
             </table>
         </form>
         </div>  
      
     
     </div><!-- end of right content-->
            
                    
  </div>   <!--end of center content -->               
                    
                    
    
    
    <div class="clear"></div>
    </div> <!--end of main content-->
	
    
  <?php include(APPPATH.'views/include/footer.php');?>