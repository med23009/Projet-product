<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
   
    <div class="container">
    <div class="col-xs-12 hl-left">

    <div class="right_content"id="printable"> 
            
        
        <?php  echo heading('Modifier les notes <br> Module: '.$sigle.'<br> Semestre: '.$annee.'-'.$session,'2');?>

        <div>
         <?php  
         if(isset($message))
         {
                echo heading($message,'3');         
         } ?>
                   
                   
        </div>
        <div class="form">
          <?php $attributes = array('class' => 'niceform');
         
          echo form_open('scolarite/enregistrer_note',$attributes);?>
 
             
         <table id="rounded-corner">
            <thead>
                <tr>
                    <th id="col" class="rounded">Matricule</th>
                    <th id="col" class="rounded">Nom </th>
                    <th id="col" class="rounded">Prénom </th>
                    <th id="col" class="rounded">Note </th>
                    <?php 
                    if( !isset($aucunEtudiant))
                        if($noteEtudiantCote[0]['cote']!= '')
                        {
                            echo '<th id="col" class="rounded">Cote </th>';
                        }
                       
                    ?>
                </tr>
            </thead>
            <tbody id="liste des étudiants">
               <?php
               echo form_hidden('annee', $annee);
                echo form_hidden('session', $session);
                echo form_hidden('sigle', $sigle);
                echo form_hidden('matricule',$matricule);
                for($i=0;$i<sizeof($matricule) && $matricule!=null;$i++)
                {
                    
                    if(isset($disabled))
                    {
                         $input = array('type' => 'text', 'size' => '10', 'name'=>'note'.$i, 'disabled' => $disabled );
                         $input2 = array('type' => 'text', 'size' => '10', 'name'=>'cote'.$i, 'disabled' => $disabled);
                    }
                    else
                    {
                        $input = array('type' => 'text', 'size' => '10', 'name'=>'note'.$i);
                        $input2 = array('type' => 'text', 'size' => '10', 'name'=>'cote'.$i);
                        echo form_hidden('noteAncienne'.$i,$noteEtudiantCote[$i]['note']);
                        echo form_hidden('coteAncienne'.$i,$noteEtudiantCote[$i]['cote']);
                    }
                   
                    echo '<tr>
                        <td>'.$matricule[$i].'</td>
                        <td>'.$infoEtudiant[$i]["nom"].'</td>
                            <td>'.$infoEtudiant[$i]["prenom"].'</td>
                                <td>';
                    if($noteEtudiantCote[$i]['note']== -1)
                    {
                             echo form_input($input,'','');
                             echo form_error('note'.$i,'<span class="error">','</span>');
                    }
                    else
                    {
 
                        echo form_input($input,$noteEtudiantCote[$i]['note'],'');
                             echo form_error('note'.$i,'<span class="error">','</span>');
                    }
                             '</td>';
                           
                    if($noteEtudiantCote[0]['cote']!= '')
                    {
                     echo '<td>';
                        echo form_input($input2,$noteEtudiantCote[$i]['cote'],'');
                        echo form_error('cote'.$i,'<span class="error">','</span>');
                         echo '</td>';
                    }
                  echo  '</tr>';
                }       
                    
                
                ?>
            </tbody>
             
            </table>
            <table>
                <tr class="submit">
                          <td id="submit"><?php 
                          if(isset($boutton_enregistrer) && !isset($aucunEtudiant))
                          {
                             echo $boutton_enregistrer;  
                          }
                          elseif(isset($aucunEtudiant))
                          {
                                echo '<div>Aucun étudiant n\'est inscrit à ce module</div>';
                          }?>
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