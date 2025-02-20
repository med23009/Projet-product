<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
   
  <div class="container">
    <div class="col-xs-12 hl-left"> 
    <div class="right_content"id="printable"> 
            
        
        <?php 
                /*
     * fonction pour convertir le code du semestre par son nom 
     * elle prend en parametre le numero du semestre soit(1,2,3)
     * et elle retourne le nom (Automn,ete,printemps)
     */
    function get_session_nom($numeroSemestre)
    {
        if($numeroSemestre == 3)
        {
            return 'Automne';
        }
        elseif($numeroSemestre == 2)
        {
            return 'Été';
        }
        else
        {
            return 'Printemps';
        }
    }
        if(isset($valide))
        {
            echo heading('Valider les notes <br> Elément: '.$sigle.'<br> Semestre: '.get_session_nom($session).'-'.$annee,'2');
        }
        else
        {
            echo heading('Saisir les notes <br> Elément: '.$sigle.'<br> Semestre: '.get_session_nom($session).'-'.$annee,'2');
        }
        
        ?>

        <div>
            <?php echo heading($info,'3');?>
        </div>
        <?php
           
         ?>
        <div class="form">
          <?php $attributes = array('class' => 'niceform');
          if(isset($valide))
          {
              echo form_open('professeur/valider_note',$attributes);
          }
          else
          {
              echo form_open('professeur/enregistrer_note',$attributes);
          }?>
             
         <table id="rounded-corner">
            <thead>
                <tr>
                    <th id="col" class="rounded">Matricule</th>
                    <th id="col" class="rounded">Nom </th>
                    <th id="col" class="rounded">Prénom </th>
                    <th id="col" class="rounded">Note </th>
                </tr>
            </thead>
            <tbody id="liste des étudiants">
                <?php
                echo form_hidden('annee', $annee);
                echo form_hidden('session', $session);
                echo form_hidden('sigle', $sigle);
                echo form_hidden('matricule',$matricule);
                for($i=0;$i<sizeof($matricule);$i=$i+1)
                {
                    if(isset($disabled))
                    {
                         $input = array('type' => 'text', 'size' => '10', 'name'=>'note'.$i, 'disabled' => $disabled );
                    }
                    else
                    {
                        $input = array('type' => 'text', 'size' => '10', 'name'=>'note'.$i);
                    }
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
                             
                             '</td>
                    </tr>';
                }
                ?>
                        
            </tbody>
             
            </table>
            <table>
                <tr class="submit">
                         <td id="submit"><?php echo $boutton_enregistrer; ?></td>
                     </tr>
            </table>
            
            </form> 
        </div>
        
     
     </div><!-- end of right content-->
            
                    
  </div>   <!--end of center content -->               
                    
                    
    
    
    <div class="clear"></div>
    </div> <!--end of main content-->
	
    
  <?php include(APPPATH.'views/include/footer.php');?>