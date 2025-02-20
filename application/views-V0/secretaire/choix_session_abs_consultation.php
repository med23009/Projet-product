<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
   <div class="center_content">



    <div class="right_content">

         <?php

            echo heading('Consulter les absences','1');
        
        echo heading('Veuillez choisir l\'année et le semestre','3');


           $attributes = array('class' => 'niceform');

          echo form_open('secretaire/mes_cours_consultation',$attributes);
            ?>
        <table class="form" id="tableProf">
            <tr>
                   <th> Année</th>
                   <th> Semestre</th>
            </tr>
            <tr>
                <td>
                <?php
                echo ' <select name="annee" id=""> ';
                echo '<option value="'.$courante['annee'].'">'.$courante['annee'].'</option>';
                for($i=0;$i<count($annee['date']);$i++)
                    if($annee['date'][$i]!= $courante['annee'])
                    echo '<option value="'.$annee['date'][$i].'">'.$annee['date'][$i].'</option>';

                echo '</select>';
                 /* fonction pour convertir le code du semestre par son nom 
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
                </td>
                <td>
                     <select  name="session" id="">
                        <?php 
                         echo '<option value="'.$courante['semestre'].'">'.get_session_nom($courante['semestre']).'</option>';
                         if($courante['semestre'] == '1')
                         {
                             echo '<option value="03">Automne</option>
                              <option value="02">Été</option>';
                         }
                         elseif($courante['semestre'] == '2')
                         {
                            echo '<option value="03">Automne</option>
                            <option value="01">Printemps</option>';
                         }
                        else 
                        {
                            echo '<option value="01">Printemps</option>
                            <option value="02">Été</option>';
                        }
                             ?>
                     </select>
                </td>
            </tr>
            <tr style="height: 20px;"></tr>
            <tr>
                 <td class="submit">
                 <?php $pw = array('type' => 'submit', 'name' => 'submit', 'id'=>'submit', 'value'=>'Suivant');
                 echo form_input($pw);?>
                 </td>
            </tr>
         </table>
        <?php 
            echo form_close('</div>');
        ?>
           </div>
           <div class="clear"></div>
    </div> <!--end of main content-->

    <?php
  include(APPPATH.'views/include/footer.php');?>

