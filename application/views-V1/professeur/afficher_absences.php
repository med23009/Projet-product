
<?php include(APPPATH.'views/include/header.php');
include('include/menu.php');
?> 


 <div class="container">
    <div class="col-xs-12 hl-left">   



        <?php
        // correction RM 23 février 2013 echo heading('Consulter les absences du groupe <b>'.$idGroupe[0].' .</b>', '3');
		echo heading('Consulter les absences du groupe <b>'.$this->professeur_modele->corrigerNumGroupe($idGroupe[0]).' .</b>', '3');
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
        ?>
        <table>
         <tr><td><br><br></td></tr>
         </table>
        <table id="rounded-corner" summary="cycle">
            
            <thead>
                <tr>
                    <th id="col" class="rounded">Matricule</th>
                    <th id="col" class="rounded">Date</th>
                    <th id="col" class="rounded">Période</th>
                    <th id="col" class="rounded">Durée</th>
                    <th id="col" class="rounded">Motivée ?</th>
                    
                </tr>
            </thead>
            <tbody id="listeClasse">
                <?php                        
                for($i=0;$i<count($idGroupe);$i++)
                {
                    if($absenceMotivee[$i] == 1)
                    {
                    echo '<tr>
                            <td>'.$matriculeEtudiant[$i].'</td>
                            <td>'.$date[$i].'</td>
                            <td>'.$periode[$i].'</td>
                            <td>'.$duree[$i].'</td>
                            <td>Oui</td>
                        </tr>';
                    }
                    else
                    {
                        echo '<tr>
                            <td>'.$matriculeEtudiant[$i].'</td>
                            <td>'.$date[$i].'</td>
                            <td>'.$periode[$i].'</td>
                            <td>'.$duree[$i].'</td>
                            <td>Non</td>
                        </tr>';
                    }
                }
                ?>
            </tbody>
        </table>
        <?php 
      
       echo form_close();
          ?>
  
    </div>                      
</div>         

<div class="clear"></div>
</div> <!--end of main content-->


<?php include(APPPATH.'views/include/footer.php');
?>
