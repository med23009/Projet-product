<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
 <div class="container">
    <div class="col-xs-12 hl-left">

         <?php 
         echo heading('Rapport global pour le Conseil de classe 1/3','3');
         echo heading($titre,'3');
           $attributes = array('class' => 'niceform');
          
                echo form_open('scolarite/afficher_module_evluation',$attributes);
                echo '<table class="form" id="tableProf">';
          ?>
        
            <tr>
                <th style="text-align:left;">Année</th>
                <th style="text-align:left;">Semestre</th>
                <?php

                ?>
            </tr>
            <tr>
                <td>
                <?php
                echo ' <select name="annee" id=""> ';
                 echo '<option value="'.$courante['annee'][0].'">'.$courante['annee'][0].'</option>';
                for($i=0;$i<count($annee['date']);$i++)
                {
                    if($courante['annee'][0] != $annee['date'][$i])
                        echo '<option value="'.$annee['date'][$i].'">'.$annee['date'][$i].'</option>';
                }
                    

                echo '</select>';
 
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
                </td>
                <td>
                    <select  name="semestre" id="">
                        <?php 
                         echo '<option value="'.$courante['semestre'][0].'">'.get_session_nom($courante['semestre'][0]).'</option>';
                         if($courante['semestre'][0] == '1')
                         {
                             echo '<option value="03">Automne</option>
                              <option value="02">Été</option>';
                         }
                         elseif($courante['semestre'][0] == '2')
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
                 <?php $pw = array('type' => 'submit', 'name' => 'submit', 'id'=>'submit', 'value'=>'Choisir le module');
                 echo form_input($pw);?>
                 </td>
            </tr>
         </table>
        <?php echo form_close('</div>');?>
           </div>
           <div class="clear"></div>
    </div> <!--end of main content-->

    <?php
  include(APPPATH.'views/include/footer.php');?>


