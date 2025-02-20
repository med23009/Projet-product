<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
   
     <div class="container">
    <div class="col-xs-12 hl-left"> 
            
        
        <?php  echo heading('Générer les cotes <br> Module: '.$sigle.'<br> Semestre: '.$annee.'-'.$session,'2');?>

        <div>
         <?php  
         if(isset($message))
         {
                echo heading($message,'3');         
         } ?>
                   
                   
        </div>
        <div class="form">
          <?php $attributes = array('class' => 'niceform');
         if(isset($generer_cote_button))
            {
                echo $generer_cote_button;
                 echo '<label style="color:red; font-size:12px;">Attention : les cotes doivent être générées avant la validation</label>';
                
            }
          echo form_open('scolarite/enregistrer_cote',$attributes);?>
 
             
         <table id="rounded-corner">
            <thead>
                <tr>
                    <th id="col" class="rounded">Matricule</th>
                    <th id="col" class="rounded">Nom </th>
                    <th id="col" class="rounded">Prénom </th>
                    <th id="col" class="rounded">Note </th>
                    <th id="col" class="rounded">Cote </th>
                </tr>
            </thead>
            <tbody id="liste des étudiants">
               <?php
               echo form_hidden('annee', $annee);
                echo form_hidden('session', $session);
                echo form_hidden('sigle', $sigle);
                echo form_hidden('matricule',$matricule);
                
                $notes = array();
                if(isset($noteEtudiant) && is_array($noteEtudiant))
                    foreach($noteEtudiant as $noteEt)
                        $notes[] = $noteEt['note'];
                
                echo form_hidden('note',$notes);
                for($i=0;$i<sizeof($matricule) && $matricule!=null;$i=$i+1)
                {
                   $input = array('type' => 'text', 'size' => '6', 'name'=>'note'.$i,'id'=>'note'.$i, 'disabled' => 'disabled' );
                    $input2 = array('type' => 'text', 'size' => '6','id'=> 'cote'.$i, 'name'=>'cote[]');
                    echo '<tr>
                    <td>'.$matricule[$i].'</td>
                        <td>'.$infoEtudiant[$i]["nom"].'</td>
                            <td>'.$infoEtudiant[$i]["prenom"].'</td>
                                <td>';
                     if($noteEtudiant[$i]['note']== -1)
                    {
                                echo form_input($input,'','');
                                echo form_error('note'.$i,'<span class="error">','</span>');
                    }
                    else
                    {
                        echo form_input($input,$noteEtudiant[$i]['note'],'');
                                echo form_error('note'.$i,'<span class="error">','</span>');
                    }
                                '</td>';
                                 echo '<td>';
                             if(isset($coteEtudiant))
                             {
                                  $input2 = array('type' => 'text', 'size' => '6','id'=> 'cote'.$i, 'name'=>'cote'.$i, 'disabled' => 'disabled');
                            
                                  echo form_input($input2,$coteEtudiant[$i]['cote'],'');
                             }
                             else
                             {
                                 echo form_input($input2,'','');
                             }
                             echo form_error('cote'.$i,'<span class="error">','</span>');
                             '</td>
                    </tr>';
                }
                ?>
            </tbody>
             
            </table>
            
            <table>
                <tr class="submit">
                    <td id="submit"><?php if(isset($submit_button))
                        echo $submit_button;?>
                    </td>
                    </tr>
            </table>
            
            </form> 
            <?php 
            
            
            ?>
        </div>
        
     
     </div><!-- end of right content-->
            
                    
  </div>   <!--end of center content -->               
                    
                    
    
    
    <div class="clear"></div>
    </div> <!--end of main content-->
	
    
  <?php include(APPPATH.'views/include/footer.php');?>