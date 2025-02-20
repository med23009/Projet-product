<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
   
   <div class="container">
    <div class="col-xs-12 hl-left">

    <div class="right_content"id="printable"> 
            
        
        <?php echo heading('Note de rattrapage','1');?>

        <div class="warning_box">
                 la note doit être entre 0 et 20 
                 et la cote doit être A,B,C,D,E,F,FX.</br>
                 Les lignes en gris correspondent aux étudiants qui ont déjà une note de rattrapage.
            </div>
        <div class="form">
          <?php        
          echo form_open('scolarite/enregistrer_note_rattrapage');?>
         <table style="margin-left: 100px;" border="1">
            <thead>
                <tr id="titreRattrapage">
                    <th>Matricule</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th></th>
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
                        $note ="''";
                        $cote="''";
                        $background = 'white';
                       if(count($info_etudiant_rattrapage)!=0)
                       {
                        if(is_array($info_etudiant_rattrapage['matricule']))
                        {
                            if(in_array($matricule[$i], $info_etudiant_rattrapage['matricule']))
                            {
                            $index = array_keys($info_etudiant_rattrapage['matricule'], $matricule[$i]);

                            $note = "'".$info_etudiant_rattrapage['note'][$index[0]]."'";
                            $cote = "'".$info_etudiant_rattrapage['cote'][$index[0]]."'";
                         
                            $background = 'gray';
                            }
                        }
                       }
                        echo '<tr style="background-color:'.$background.'"id="'.$i.'">
                        <td>'.$matricule[$i].'</td>
                            <td>'.$infoEtudiant[$i]["nom"].'</td>
                                <td>'.$infoEtudiant[$i]["prenom"].'</td>

                                </td>
                                <td><input type="checkbox" id="'.$matricule[$i].'" name="'.$matricule[$i].'" onClick="isRattrapage('.$matricule[$i].','.$i.','.sizeof($matricule).','.$note.','.$cote.')"> </td>
                        </tr>';
                    }
                ?>
            </tbody>
            </table>
            <table style="margin-left: 600px;">
                <tr>
                 <td>
                 <?php 
                 if(!isset($aucunEtudiant))
                 {
                     $pw = array('type' => 'submit', 'name' => 'submit', 'id'=>'submit', 'value'=>'Enregistrer');
                 echo form_input($pw);
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