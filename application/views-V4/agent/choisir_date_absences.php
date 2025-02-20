<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
<div class="container">
    <div class="col-xs-12 hl-left">

         <?php

            echo heading($titre,'3');

          echo form_open('agent/afficher_groupe_abseces');
            ?>
        <table class="form" id="tableProf">
            <tr>
                <td>
                    <?php echo form_label('Date :');?>
                </td>
                <script>
	$(function() {
		$( "#date" ).datepicker({
			showOtherMonths: true,
			selectOtherMonths: true
		});
	});     
	</script>
                 <td>
                    <?php
                    $input = array('type' => 'date', 'id' => 'date', 'name' => 'date');
                    echo form_input($input,'','required');
                    ?>
                </td>
            </tr>
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
            return 'Impaire';
        }
        elseif($numeroSemestre == 2)
        {
            return '';
        }
        else
        {
            return 'Paire';
        }
    }
                ?>
            <tr>
                <td><label>Semestre :</label></td>
                <td>
                    <select  name="session" id="">
                        <?php 
                         echo '<option value="'.$courante['semestre'][0].'">'.get_session_nom($courante['semestre'][0]).'</option>';
                         if($courante['semestre'][0] == '1')
                         {
                             echo '<option value="03">Impaire</option>';
//                              <option value="02">Été</option>
                         }
                         elseif($courante['semestre'][0] == '2')
                         {
                            echo '<option value="03">Impaire</option>
                            <option value="01">Paire</option>';
                         }
                        else 
                        {
                            echo '<option value="01">Paire</option>';
//                            <option value="02">Été</option>
                        }
                             
                        ?>
                    </select>
                </td>
               </tr>
               <tr>
                   <td><label>Année</label></td>
                   <td>
                       <?php  echo ' <select name="annee" id=""> ';
                    echo '<option value="'.$courante['annee'][0].'">'.$courante['annee'][0].'</option>';
                    for($i=0;$i<count($annee['date']);$i++)
                    {
                        if($courante['annee'][0] != $annee['date'][$i])
                            echo '<option value="'.$annee['date'][$i].'">'.$annee['date'][$i].'</option>';
                    }


                echo '</select>';
                ?>
                   </td>
               </tr>
               <tr>
                <td class="submit">
                        <?php $pw = array('type' => 'submit', 'name' => 'submit', 'id' => 'submit', 'value' => 'Valider');
                        echo form_input($pw);
                        ?>
                </td>
            </tr>   
        </table>   
        <?php echo form_close('</div>');?>
           </div>
           <div class="clear"></div>
    </div> <!--end of main content-->

    <?php
  include(APPPATH.'views/include/footer.php');?>


