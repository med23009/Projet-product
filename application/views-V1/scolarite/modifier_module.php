<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
   
     <div class="container">
    <div class="col-xs-12 hl-left">          
        
      <?php  echo validation_errors('<div class="error_box">', '</div>'); 
	   echo heading('Modifier Elément','3');

               /*
     * fonction pour convertir le code du semestre par son nom 
     * elle prend en paramètre le numéro du semestre soit(1,2,3)
     * et elle retourne le nom (Automne, été, printemps)


    function get_session_nom($numeroSemestre) 
    {
        if ($numeroSemestre == 3) 
        {
            return 'Automne';
        } 
        elseif ($numeroSemestre == 2) 
        {
            return 'Été';
        } 
        else 
        {
            return 'Printemps';
        }
    }     */
           if($semestreDesactivation!= NULL)
         {
             if(isset($semestreActif))		 
			 // echo heading('Module Inactif. Semestre de désactivation : '.get_session_nom ($semestreActif['semestre']).' '.$semestreActif['anneeDes'],'3');
			  echo heading('Elément Inactif. Semestre de désactivation : '.$semestreActif['semestre'].' '.$semestreActif['anneeDes'],'3');
              echo form_open('scolarite/reactiver_module');
              echo form_hidden('sigle',$sigle);
              $pw = array('type' => 'submit', 'name' => 'submit', 'id'=>'submit', 'value'=>'Réactiver', 'style' => 'margin-left:15px;'); 
                             echo form_input($pw);
              echo form_close();
         }
		 $attributes = array('class' => ''); 
		 echo form_open('scolarite/desactiver_module', $attributes);
		 echo form_hidden('sigle',$sigle);
		 
         if(trim($semestreDesactivation) == null )
         {
            echo '<input style="color:black" type ="submit"  onclick="return confirm(\'Voulez-vous vraiment désactiver l\'élément ?\')" value="Désactiver cet élément">';
         }
        ?>
       
        
        <?php

        echo form_close();
        echo form_open('scolarite/mettre_a_jour_module', $attributes);
        echo form_fieldset();?>
        
        <table class="form">
            
                <tr>
                    <td><?php echo form_label("Code :") ;?></td>
                    <td><?php $input = array('type' => 'text', 'value' => $sigle, 'size' => '10', 'name'=>'sigle', 'disabled' =>'disabled'); 
                             echo form_input($input,'','required');
                             echo form_error('name','<span class="error">','</span>');
                             echo form_hidden('sigle',$sigle);?>
                    </td>
                </tr>

                <tr>
                        <td><?php echo form_label('Type d\'élément :<span style="color:red;font-weight:bold;font-size:14px;">*</span>') ;?></td>
                        <td>
                            <select name="typeModule" id="" <?php  if($semestreDesactivation!= NULL)  echo ' disabled="disabled"';?>>
                                    <option value="Cours-Labos" <?php if($typeModule == 'Cours-Labos'){ echo 'selected="selected"';}?> >Cours-Labos</option>
                                    <option value="Cours" <?php if($typeModule == 'Cours'){ echo 'selected="selected"';}?> >Cours</option>
                                    <option value="Labos" <?php if($typeModule == 'Labos'){ echo 'selected="selected"';}?> >Labos</option>
                                    <option value="Projet" <?php if($typeModule == 'Projet'){ echo 'selected="selected"';}?> >Projet</option>
                                    <option value="Stage" <?php if($typeModule == 'Stage'){ echo 'selected="selected"';}?> >Stage</option>                              
                                </select> 
                        </td>
                </tr>
                
                <tr>
                    <td><?php  echo form_label('Module:<span style="color:red;font-weight:bold;font-size:14px;">*</span> ');?></td>
                    <td>
                        <select name="unite" <?php  if($semestreDesactivation!= NULL)  echo ' disabled="disabled"';?>>
                            
                            <?php
                            echo '<option value ="'.$sigleunite.'">'.
                                    $sigleunite.':'.$titreunite.'</option>';
                            if(is_array($unites))
                            {
                                for($i=0;$i<count($unites['sigle']);$i++)
                                {
                                   if($unites['sigle'][$i]!=$sigleunite)
                                    echo '<option value = "'.
                                           $unites['sigle'][$i].
                                           '">'.$unites['sigle'][$i].
                                           ':'.$unites['titre'][$i].'</option>';
                                }
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                
                <tr>
                    <td><?php  echo form_label('Enseignant responsable :<span style="color:red;font-weight:bold;font-size:14px;">*</span> ');?></td>
                    <td>
                        <select name="professeurResponsable" <?php  if($semestreDesactivation!= NULL)  echo ' disabled="disabled"';?>>
                            
                            <?php
                            echo '<option value ="'.$professeurResponsable.'">'.
                                    $professeurResponsable.':'.$nom.' '.$prenom.'</option>';
                            if(is_array($professeurs))
                            {
                                for($i=0;$i<count($professeurs['matricule']);$i++)
                                {
                                   if($professeurs['matricule'][$i]!=$professeurResponsable)
                                    echo '<option value = "'.
                                           $professeurs['matricule'][$i].
                                           '">'.$professeurs['matricule'][$i].
                                           ':'.$professeurs['nom'][$i].' '.
                                           $professeurs['prenom'][$i].'</option>';
                                }
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><?php  echo form_label('Description de l\'élément :');?></td>
                    <td><?php
                          if($semestreDesactivation!= NULL)
                            $input = array( 'name'=>'description', 'value'=>$description, 'disabled'=> 'disabled'); 
                          else
                              $input = array( 'name'=>'description', 'value'=>$description);
                            echo form_textarea($input,'','');
                            echo form_error('comments','<span class="error">','</span>');?>
                    </td>
                </tr>
                 
                </tr>
                    
                    <tr>
                        <td><?php echo form_label('Intitulé :<span style="color:red;font-weight:bold;font-size:14px;">*</span>
								</br>(100 caractères max)') ;?></td>
                        <td><?php 
                        if($semestreDesactivation!= NULL)
                            $input = array('type' => 'text', 'value'=>$titre, 'size' => '35', 'name'=>'titreMod', 'disabled'=> 'disabled'); 
                        else
                            $input = array('type' => 'text', 'value'=>$titre, 'size' => '35', 'name'=>'titreMod'); 
                             echo form_input($input,'','required');
                             echo form_error('name','<span class="error">','</span>');
                             echo form_hidden('idModule',$idModule);?>
                        </td>
                    </tr> 
<!--                    <tr>
                        <td><?php echo form_label("Prérequis :") ;?></td>
                        <td><?php 
                        if($semestreDesactivation!= NULL)
                        $input = array('type' => 'text', 'value'=>$prerequisModule, 'size' => '10', 'name'=>'prerequisModule', 'disabled'=> 'disabled'); 
                        else
                             $input = array('type' => 'text', 'value'=>$prerequisModule, 'size' => '10', 'name'=>'prerequisModule');
                             echo form_input($input,'','');
                             echo form_error('prerequisModule','<span class="error">','</span>');?>
                        </td>
                    </tr>     
                    
                    <tr>
                        <td><?php echo form_label("Corequis  :") ;?></td>
                        <td><?php 
                        if($semestreDesactivation!= NULL)
                            $input = array('type' => 'text', 'value'=>$corequisModule, 'size' => '10', 'name'=>'corequisModule', 'disabled'=> 'disabled'); 
                        else
                            $input = array('type' => 'text', 'value'=>$corequisModule, 'size' => '10', 'name'=>'corequisModule');
                             echo form_input($input,'','');
                             echo form_error('name','<span class="error">','</span>');?>
                        </td>
                    </tr>  
                    -->
                    <tr>
                        <td><?php echo form_label('Département responsable :<span style="color:red;font-weight:bold;font-size:14px;">*</span>') ;?></td>
                        <td>  
                            <?php     
                 
                            $index_dep = 0;
                            if($semestreDesactivation!= NULL)
                                echo'<select name="idDepartement" disabled="disabled">';
                            else
                                echo'<select name="idDepartement">';
                            foreach($nomDep as $dep){
                                if($idDep[$index_dep]!='DPT-SRV')
                                echo'<option value="'.$idDep[$index_dep].'"'; if($idDep[$index_dep] == $idDepartement){echo 'selected="selected"';} echo '>'.$dep.'</option>';
                                $index_dep++;
                            }
                            echo'</select>';
                            ?>
                        </td>
                    </tr>
                    
                    <tr>
                        <td><?php echo form_label('Cycle :<span style="color:red;font-weight:bold;font-size:14px;">*</span>') ;?></td>
                        <td>             
                        <?php 
                        if($semestreDesactivation!= NULL)
                            echo'<select name="idCycle" disabled="disabled">';
                        else 
                            echo'<select name="idCycle">';

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
                        <td><?php echo form_label('Crédit :<span style="color:red;font-weight:bold;font-size:14px;">*</span>') ;?></td>
                        <td><?php 
                         if($semestreDesactivation!= NULL)
                            $input = array('type' => 'text', 'value'=>$nbCredits, 'size' => '10', 'name'=>'nbrCredits', 'disabled'=> 'disabled'); 
                         else
                              $input = array('type' => 'text', 'value'=>$nbCredits, 'size' => '10', 'name'=>'nbrCredits'); 
                             echo form_input($input,'','required');
                           ?>
                        </td>
                    </tr>  
                    <!----add by MEdBakar 26-02-2020------------>
                    
                    <tr>
                        <td><?php echo form_label('Coefficient :<span style="color:red;font-weight:bold;font-size:14px;">*</span>') ;?></td>
                        <td><?php 
                         if($semestreDesactivation!= NULL)
                            $input = array('type' => 'text', 'value'=>$coefficient, 'size' => '10', 'name'=>'coefficient', 'disabled'=> 'disabled'); 
                         else
                              $input = array('type' => 'text', 'value'=>$coefficient, 'size' => '10', 'name'=>'coefficient'); 
                             echo form_input($input,'','required');
                           ?>
                        </td>
                    </tr>  
                    
                    <!------------------->
<!--                    <tr>
                        <td><?php echo form_label('Crédits prérequis :') ;?></td>
                        <td><?php 
                        if($semestreDesactivation!= NULL)
                            $input = array('type' => 'text', 'value'=>$prerequisCredits, 'size' => '10', 'name'=>'prerequisCredits', 'disabled'=> 'disabled'); 
                        else
                            $input = array('type' => 'text', 'value'=>$prerequisCredits, 'size' => '10', 'name'=>'prerequisCredits'); 
                             echo form_input($input,'','');
                             ?>
                        </td>
                    </tr>
          -->
<!--                    <tr>
                        <td><?php echo form_label('Heures cours :') ;?></td>
                        <td><?php 
                        if($semestreDesactivation!= NULL)
                            $input = array('type' => 'text', 'value'=>$hrsCours, 'size' => '10', 'name'=>'hrCours', 'disabled'=> 'disabled'); 
                        else
                            $input = array('type' => 'text', 'value'=>$hrsCours, 'size' => '10', 'name'=>'hrCours'); 
                             echo form_input($input,'');
                             ?>
                        </td>
                    </tr>     
          
                  <tr>
                        <td><?php echo form_label('Heures TD :') ;?></td>
                        <td><?php 
                        if($semestreDesactivation!= NULL)
                            $input = array('type' => 'text', 'value'=>$hrsTD, 'size' => '10', 'name'=>'hrTD', 'disabled'=> 'disabled'); 
                        else 
                           $input = array('type' => 'text', 'value'=>$hrsTD, 'size' => '10', 'name'=>'hrTD'); 
                             echo form_input($input,'');
                            ?>
                        </td>
                    </tr>     
                    
                    <tr>
                        <td><?php echo form_label('Heures TP :') ;?></td>
                        <td><?php 
                         if($semestreDesactivation!= NULL)
                        $input = array('type' => 'text', 'value'=>$hrsTP, 'size' => '10', 'name'=>'hrTP', 'disabled'=> 'disabled'); 
                         else
                             $input = array('type' => 'text', 'value'=>$hrsTP, 'size' => '10', 'name'=>'hrTP'); 
                             echo form_input($input,'');
                            ?>
                        </td>
                    </tr>   -->
                    
                      <tr>
                        <td><?php echo form_label('Volume CM :') ;?></td>
                        <td><?php 
                         if($semestreDesactivation!= NULL)
                            $input = array('type' => 'text', 'value'=>$volumeCM, 'size' => '10', 'name'=>'volumeCM', 'disabled'=> 'disabled'); 
                         else
                              $input = array('type' => 'text', 'value'=>$volumeCM, 'size' => '10', 'name'=>'volumeCM'); 
                             echo form_input($input,'');
                             ?>
                        </td>
                    </tr> 
                      <tr>
                        <td><?php echo form_label('Volume TD :') ;?></td>
                        <td><?php 
                         if($semestreDesactivation!= NULL)
                            $input = array('type' => 'text', 'value'=>$volumeTD, 'size' => '10', 'name'=>'volumeTD', 'disabled'=> 'disabled'); 
                         else
                              $input = array('type' => 'text', 'value'=>$volumeTD, 'size' => '10', 'name'=>'volumeTD'); 
                             echo form_input($input,'');
                             ?>
                        </td>
                    </tr> 
                      <tr>
                        <td><?php echo form_label('Volume TP :') ;?></td>
                        <td><?php 
                         if($semestreDesactivation!= NULL)
                            $input = array('type' => 'text', 'value'=>$volumeTP, 'size' => '10', 'name'=>'volumeTP', 'disabled'=> 'disabled'); 
                         else
                              $input = array('type' => 'text', 'value'=>$volumeTP, 'size' => '10', 'name'=>'volumeTP'); 
                             echo form_input($input,'');
                             ?>
                        </td>
                    </tr> 
                      <tr>
                        <td><?php echo form_label('Volume Projet :') ;?></td>
                        <td><?php 
                         if($semestreDesactivation!= NULL)
                            $input = array('type' => 'text', 'value'=>$hrsPerso, 'size' => '10', 'name'=>'volumeProjet', 'disabled'=> 'disabled'); 
                         else
                              $input = array('type' => 'text', 'value'=>$hrsPerso, 'size' => '10', 'name'=>'volumeProjet'); 
                             echo form_input($input,'');
                             ?>
                        </td>
                    </tr> 
                    <tr>
                        <td><?php echo form_label('Semestre d\'activation :') ;?></td>
                        <td><?php $input = array('type' => 'text', 'value'=>$semestreActivation, 'size' => '10', 'name'=>'semestreActivation', 'disabled' =>'disabled'); 
                             echo form_input($input,'','');
                             ?>
                        </td>
                    </tr>
               
                    <tr>
                        <td><?php echo form_label("Semestre de désactivation :") ;?></td>
                        <td><?php $input = array('type' => 'text', 'value'=>$semestreDesactivation, 'size' => '10', 'name'=>'semestreDesactivation', 'disabled' =>'disabled'); 
                             echo form_input($input,'','');
                             echo form_error('name','<span class="error">','</span>');?>
                        </td>
                    </tr>
                    <tr style="height: 200px;">
                        <td><?php echo form_label('Programme :<span style="color:red;font-weight:bold;font-size:14px;">*</span>') ;?></td>
                        <td><ul>
            <?php
            if($semestreDesactivation!= NULL)
            {
                for($i=0;$i<count($allProgramme['idProgramme']);$i++)
                {
                    if(is_array($programme['idProgramme']))
                    {
                        if(!in_array($allProgramme['idProgramme'][$i], $programme['idProgramme']))
                        {
                                echo '<li><input type="checkbox" name="progs[]" value="'.
                                $allProgramme['idProgramme'][$i].'" disabled = "disabled"/><b>'.
                                $allProgramme['nomProgramme'][$i].'</b></li>';
                        }
                    }
                }
                for($j=0;$j<count($programme['idProgramme']);$j++)
                {
                    echo '<li><input type="checkbox" name="progs[]" value="'.
                    $allProgramme['idProgramme'][$j].'" checked = "true" disabled = "disabled"/><b>'.
                    $allProgramme['nomProgramme'][$j].'</b></li>';
                }
            }
            else
            {
                for($i=0;$i<count($allProgramme['idProgramme']);$i++)
                {
                    if(is_array($programme['idProgramme']))
                    {
                        if(!in_array($allProgramme['idProgramme'][$i], $programme['idProgramme']))
                        {
                                echo '<li><input type="checkbox" name="progs[]" value="'.
                                $allProgramme['idProgramme'][$i].'"/><b>'.
                                $allProgramme['nomProgramme'][$i].'</b></li>';
                        }
                    }
                }
                for($j=0;$j<count($programme['idProgramme']);$j++)
                {
                    echo '<li><input type="checkbox" name="progs[]" value="'.
                    $programme['idProgramme'][$j].'" checked = "true"/><b>'.
                    $programme['nomProgramme'][$j].'</b></li>';
                }
            }
                    
            ?>
                        </ul>
                        </td>
                    </tr>

                     <tr>
                                           
                        <td class="submit">
                         <?php $pw = array('type' => 'submit', 'name' => 'submit', 'id'=>'submit', 'value'=>'Modifier'); 
                             echo form_input($pw);?>
                        </td>
                    </tr>
                </table>
                <?php echo form_fieldset_close();
                 echo form_close('</div>');?>
                
         </form>
        </table>
      
   </div>  
           <div class="clear"></div>

    </div> <!--end of main content-->
	
    <?php
  include(APPPATH.'views/include/footer.php');?>

       
 