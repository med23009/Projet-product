<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
   <div class="center_content">



    <div class="right_content">

         <?php

            echo heading($titre,'3');

          echo form_open('secretaire/enregistrer_absences');
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
                    $input = array('type' => 'text', 'id' => 'date', 'name' => 'date');
                    echo form_input($input,'','required');
                    ?>
                </td>
            </tr>
         </table>
        <div><b>Étudiants</b></div>
        
        <p style="font-size: x-large; height: 250px; overflow: auto; border: 5px solid #eee; background: #eee; color: #000; margin-bottom: 1.5em;">
         <?php
        if($etudiant!='')
        {
            for($i=0;$i<count($etudiant);$i++)
            {
                echo '<label><input type="checkbox" name="items['.$etudiant[$i]['matriculeEtudiant'].']]">'.$etudiant[$i]['matriculeEtudiant'].'</label>
                    <label>'.$etudiant[$i]['nom'].'</label> <label>'.$etudiant[$i]['prenom'].'</label><br>';
            }
            echo form_hidden('annee', $annee);
                    echo form_hidden('session', $session);
                      echo form_hidden('idGroupe', $idGroupe);
					  // echo form_hidden('idGroupe', $this->secretaire_modele->corrigerNumGroupe($idGroupe));
        }
        echo '</p>';
            
        ?>
        <div style="height: 10px;"></div>
        <table class="form" id="tableProf">
           <tr>
                <td>
                    <?php echo form_label('Période :');?>
                </td>
                <td>
                   <INPUT type= "radio" name="periode" value="AM">Matin</input>
                </td>
                <td>
                   <INPUT type= "radio" name="periode" value="PM">Après-midi</input>
                </td>
            </tr>
             <tr style="height: 10px;"></tr>
             <tr>
                <td><?php echo form_label('Durée :');?></td>
                <td style="width: 85px;"><INPUT type= "radio" name="duree" value="0">0h</input></td>
                <td style="width: 85px;"><INPUT type= "radio" name="duree" value="1">1h</input></td>
                <td style="width: 85px;"><INPUT type= "radio" name="duree" value="2">2h</input></td>
                <td style="width: 85px;"><INPUT type= "radio" name="duree" value="3">3h</input></td>
                <td style="width: 85px;"><INPUT type= "radio" name="duree" value="4">4h</input></td>
                <td style="width: 85px;"><INPUT type= "radio" name="duree" value="5">5h</input></td>
             </tr>
              <tr style="height: 10px;"></tr>
              <tr>
                  <td></td>
                  <td style="width: 85px;"><INPUT type= "radio" name="duree2" value="0.0">et 0min</input></td>
                  <td style="width: 85px;"><INPUT type= "radio" name="duree2" value="0.25">et 15min</input></td>
                  <td style="width: 85px;"><INPUT type= "radio" name="duree2" value="0.5">et 30min</input></td>
                  <td style="width: 85px;"><INPUT type= "radio" name="duree2" value="0.75">et 45min</input></td>
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


