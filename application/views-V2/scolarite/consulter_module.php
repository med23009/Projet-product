<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
 <div class="container">
    <div class="col-xs-12 hl-left">          
        
      <?php echo validation_errors();
       echo heading('Consulter/Evaluer un élément','3');
        $attributes = array('class' => 'niceform');
        echo form_open('scolarite/trouver_module_a_consulter', $attributes);
        echo form_fieldset();?>
        <table class="form">
            
                <tr>
                    <td><?php echo form_label("Sigle du élément :") ;?></td>
                    <td><?php $input = array('type' => 'text', 'value' => $sigle, 'disabled'=>'disabled', 'size' => '10', 'name'=>'sigle'); 
                             echo form_input($input,'','required');
                             echo form_error('name','<span class="error">','</span>');?>
                    </td>
                </tr>
      
                <tr>
                        <td><?php echo form_label("Type du élément :") ;?></td>
                        <td>
                            <select  name="typeModule" disabled="disabled">
                                    <option value="Cours-Labos" <?php if($typeModule == 'Cours-Labos'){ echo 'selected="selected"';}?> >Cours-Labos</option>
                                    <option value="Cours" <?php if($typeModule == 'Cours'){ echo 'selected="selected"';}?> >Cours</option>
                                    <option value="Labos" <?php if($typeModule == 'Labos'){ echo 'selected="selected"';}?> >Labos</option>
                                    <option value="Projet" <?php if($typeModule == 'Projet'){ echo 'selected="selected"';}?> >Projet</option>
                                    <option value="Stage" <?php if($typeModule == 'Stage'){ echo 'selected="selected"';}?> >Stage</option>                             
                                </select> 
                        </td>
                </tr>
                </table>
            <table class="form">
                <tr>
                    <td style="width: 270px;"><?php  echo form_label('Module : ');?></td>
                      <td><?php $input = array('type' => 'text', 'disabled'=>'disabled', 'size' => '40', 'name'=>'unite'); 
                             echo form_input($input,$sigleunite.':'.$titreunite,'');
                             echo form_error('prof','<span class="error">','</span>');?>
                    </td>
                </tr>
                </table>  
        
        <table class="form">
                <tr>
                    <td style="width: 270px;"><?php  echo form_label('Enseignant responsable : ');?></td>
                      <td><?php $input = array('type' => 'text', 'disabled'=>'disabled', 'size' => '40', 'name'=>'prof'); 
                             echo form_input($input,$professeurResponsable.':'.$nom.' '.$prenom,'');
                             echo form_error('prof','<span class="error">','</span>');?>
                    </td>
                </tr>
                </table>
                <table class="form">
                <tr>
                    <td><?php  echo form_label('Description d\'élément : ');?></td>
                    <td><?php $input = array( 'name'=>'description', 'disabled'=>'disabled', 'value'=>$description); 
                            echo form_textarea($input,'','required');
                            echo form_error('comments','<span class="error">','</span>');?>
                    </td>
                </tr>
                 
                </tr>
                    
                    <tr>
                        <td><?php echo form_label("Titre d\'élément :") ;?></td>
                        <td><?php $input = array('type' => 'text', 'disabled'=>'disabled', 'value'=>$titre, 'size' => '40', 'name'=>'titre'); 
                             echo form_input($input,'','required');
                             echo form_error('name','<span class="error">','</span>');?>
                        </td>
                    </tr> 
                    <tr>
                        <td><?php echo form_label("Prérequis d\'élément :") ;?></td>
                        <td><?php $input = array('type' => 'text', 'disabled'=>'disabled', 'value'=>$prerequisModule, 'size' => '10', 'name'=>'prerequisModule'); 
                             echo form_input($input,'','required');
                             echo form_error('name','<span class="error">','</span>');?>
                        </td>
                    </tr>     
                    
                    <tr>
                        <td><?php echo form_label("Corequis d\'élément :") ;?></td>
                        <td><?php $input = array('type' => 'text', 'disabled'=>'disabled', 'value'=>$corequisModule, 'size' => '10', 'name'=>'corequisModule'); 
                             echo form_input($input,'','');
                             echo form_error('name','<span class="error">','</span>');?>
                        </td>
                    </tr>  
                    <tr>
                        <td><?php echo form_label("Département responsable :") ;?></td>
                        <td>  
                            <?php     
                 
                            $index_dep = 0;
                            echo'<select name="departement" disabled="disabled">';
                            foreach($nomDep as $dep){
                                if($idDep[$index_dep]!='DPT-SRV')
                                echo'<option value="'.$idDep[$index_dep].'"';if($idDep[$index_dep] == $idDepartement){echo 'selected="selected"'; } echo '>'.$dep.'</option>';
                                $index_dep++;
                            }
                            echo'</select>';
                            ?>
                        </td>
                    </tr>
<!--                    <tr>
                        <td><?php echo form_label("Programme :") ;?></td>
                        <td><ul>  
                            <?php     
                 
                     for($j=0;$j<count($programme['idProgramme']);$j++)
                    {
                        echo '<li><b>'.
                        $programme['nomProgramme'][$j].'</b></li>';
                    }
                            ?>
                        </ul></td>
                    </tr>-->
                    <tr>
                        <td><?php echo form_label("Cycle :") ;?></td>
                        <td>             
                        <?php echo'<select name="Cycle" disabled="disabled">';
                        $index = 0;
                        foreach($nom_Cycle as $nCyc){
                            echo'<option value="'.$id_Cycle[$index].'"';if($id_Cycle[$index] == $idCycle){echo 'selected="selected"'; } echo '>'.$nCyc.'</option>';
                            $index++;
                        }
                        echo'</select>';
                        ?>
                        </td>
                    </tr> 
                <tr>
                    
                    <tr>
                        <td><?php echo form_label("Nombre de crédits :") ;?></td>
                        <td><?php $input = array('type' => 'text', 'disabled'=>'disabled', 'value'=>$nbCredits, 'size' => '10', 'name'=>'nbCredits'); 
                             echo form_input($input,'','required');
                             echo form_error('name','<span class="error">','</span>');?>
                        </td>
                    </tr>     
                     <tr>
                        <td><?php echo form_label("Coefficient :") ;?></td>
                        <td><?php $input = array('type' => 'text', 'disabled'=>'disabled', 'value'=>$coefficient, 'size' => '10', 'name'=>'nbCredits'); 
                             echo form_input($input,'','required');
                             echo form_error('name','<span class="error">','</span>');?>
                        </td>
                    </tr>  
                    <tr>
                        <td><?php echo form_label("Nombre de crédits prérequis :") ;?></td>
                        <td><?php $input = array('type' => 'text', 'disabled'=>'disabled', 'value'=>$prerequisCredits, 'size' => '10', 'name'=>'nbrCreditsPre'); 
                             echo form_input($input,'','');
                             echo form_error('name','<span class="error">','</span>');?>
                        </td>
                    </tr>
<!--                    
                    <tr>
                        <td><?php echo form_label("Heures cours :") ;?></td>
                        <td><?php $input = array('type' => 'text', 'disabled'=>'disabled', 'value'=>$hrsCours, 'size' => '10', 'name'=>'hrsCours'); 
                             echo form_input($input,'','required');
                             echo form_error('name','<span class="error">','</span>');?>
                        </td>
                    </tr>     
          
                  <tr>
                        <td><?php echo form_label("Heures TD :") ;?></td>
                        <td><?php $input = array('type' => 'text', 'disabled'=>'disabled', 'value'=>$hrsTD, 'size' => '10', 'name'=>'hrsTD'); 
                             echo form_input($input,'','required');
                             echo form_error('name','<span class="error">','</span>');?>
                        </td>
                    </tr>     
                    
                    <tr>
                        <td><?php echo form_label("Heures TP :") ;?></td>
                        <td><?php $input = array('type' => 'text', 'disabled'=>'disabled', 'value'=>$hrsTP, 'size' => '10', 'name'=>'hrsTP'); 
                             echo form_input($input,'','required');
                             echo form_error('name','<span class="error">','</span>');?>
                        </td>
                    </tr> -->
                        
                     <tr>
                        <td><?php echo form_label("Volume CM :") ;?></td>
                        <td><?php $input = array('type' => 'text', 'disabled'=>'disabled', 'value'=>$volumeCM, 'size' => '10', 'name'=>'hrsTP'); 
                             echo form_input($input,'','required');
                             echo form_error('name','<span class="error">','</span>');?>
                        </td>
                    </tr> 
                     <tr>
                        <td><?php echo form_label("Volume TD :") ;?></td>
                        <td><?php $input = array('type' => 'text', 'disabled'=>'disabled', 'value'=>$volumeTD, 'size' => '10', 'name'=>'hrsTP'); 
                             echo form_input($input,'','required');
                             echo form_error('name','<span class="error">','</span>');?>
                        </td>
                    </tr> 
                     <tr>
                        <td><?php echo form_label("Volume TP:") ;?></td>
                        <td><?php $input = array('type' => 'text', 'disabled'=>'disabled', 'value'=>$volumeTP, 'size' => '10', 'name'=>'hrsTP'); 
                             echo form_input($input,'','required');
                             echo form_error('name','<span class="error">','</span>');?>
                        </td>
                    </tr> 
                     <tr>
                        <td><?php echo form_label("Volume Projet :") ;?></td>
                        <td><?php $input = array('type' => 'text', 'disabled'=>'disabled', 'value'=>$hrsPerso, 'size' => '10', 'name'=>'hrsTP'); 
                             echo form_input($input,'','required');
                             echo form_error('name','<span class="error">','</span>');?>
                        </td>
                    </tr> 

                    <tr>
                        <td><?php echo form_label("Semestre d'activation :") ;?></td>
                        <td><?php $input = array('type' => 'text', 'disabled'=>'disabled', 'value'=>$semestreActivation, 'size' => '10', 'name'=>'semestreActivation'); 
                             echo form_input($input,'','required');
                             echo form_error('name','<span class="error">','</span>');?>
                        </td>
                    </tr>
               <tr>
                        <td><?php echo form_label("Semestre de désactivation :") ;?></td>
                        <td><?php $input = array('type' => 'text', 'value'=>$semestreDesactivation, 'size' => '10', 'name'=>'semestreDesactivation', 'disabled' =>'disabled'); 
                             echo form_input($input,'','');
                             echo form_error('name','<span class="error">','</span>');?>
                        </td>
                    </tr>
               
                     <tr>
                                           
                        <td class="submit">
                         <?php $pw = array('type' => 'submit', 'name' => 'consuler_autre', 'id'=>'consuler_autre', 'value'=>'Consulter un autre élément'); 
                             echo form_input($pw);?>
                        </td>
                        
                         
                        
                    </tr>
                </table>
                <?php echo form_fieldset_close();
                
                 echo form_close('</div>');?>
                
         </form>
        
        
       
               
   </div>  
           <div class="clear"></div>
    </div> <!--end of main content-->
	
    <?php
  include(APPPATH.'views/include/footer.php');?>

       
 