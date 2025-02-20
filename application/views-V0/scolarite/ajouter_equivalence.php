<?php include(APPPATH.'views/include/header.php');
include('include/menu.php');
?>
<div class="container">
    <div class="col-xs-12 hl-left">          

        <?php
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
        echo validation_errors();
        echo heading("Ajouter une &eacute;quivalence", '2');
        if (isset($errorMsg) && $errorMsg != NULL)
        {
            ?>
        <div class=<?php echo $class; ?> >
        <?php
            echo $errorMsg;
            ?>
    </div>
<?php        }
        
        
        if (isset($actif) && $actif != NULL && strtoupper($actif) != "O")
        {
            $actif = false;
            ?>
        <div class="warning_box">
        <?php
            echo '<b>Cet étudiant est inactif. Aucune modification ne peut être faite.</b>';
            ?>
    </div>
<?php        }

        $attributes = array('class' => 'niceform', 'name' => 'formPlanEtude');

        echo form_open('scolarite/ajouter_equivalence', $attributes);
        echo form_fieldset();
        echo form_hidden("matricule", $matricule);
        echo form_hidden("idProg", $idProg);
             ?>

        <table class="form">
            <tr>
                <td><?php echo form_label("Nom :"); ?></td>
                <!-- modif RM <td><?php echo form_label(utf8_encode($prenom) . " " . utf8_encode($nom)); ?>   </td> -->
				<td><?php echo form_label($prenom . " " . $nom); ?>   </td>
            </tr>    
            <tr>
                <td><?php echo form_label("Matricule :"); ?></td>
                <td><?php
                    $input = array('type' => 'text', 'value' => $matricule, 'size' => '10', "disabled" => "disabled");
					echo form_input($input, '', 'required');
        ?>
                </td>
            </tr>
                        <tr>
                <td><?php echo form_label("Programme :"); ?></td>
                <td><?php
                    $input = array('type' => 'text', 'value' => $idProg, 'size' => '10', 'disabled' => "disabled");
                    echo form_input($input, '', '');
        ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo form_label("Sigle : "); ?> 
                </td>
                <td>
            <select name="sigle">
                <?php
                if(isset($cours))
                {
                    if(is_array($cours['sigle']))
                    {
                        // modif RM 5 mars pour avoir par défaut un sigle vide
						echo "<option value=''> $sigle</option>";	// sigle vide
						// fin ajouts RM 5 mars
						foreach ($cours['sigle'] as $sigle) 
                        {
                            echo "<option value='$sigle'> $sigle</option>";
                        }
                    }
                }
                ?>
            </select>
                </td>
            </tr>
                
            <tr>
                <td><?php echo form_label("Cote :"); ?></td>
                <td> <?php
                       $input = array('type' => 'text', 'value' => 'EQ', 'size' => '10', 'name' => 'cote', 'disabled'=>'disabled');
                    echo form_input($input, '','');
              ?>  </td>
            </tr>
            
            <tr>
                <td><?php echo form_label("Semestre :"); ?></td>
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
            <tr>
                <td><?php echo form_label("Année :"); ?></td>
                 <td>
                <?php
                echo ' <select name="annee" id=""> ';
                 echo '<option value="'.$courante['annee'][0].'">'.$courante['annee'][0].'</option>';
                for($i=0;$i<count($annee['date']);$i++)
                {
                    if($courante['annee'][0] != $annee['date'][$i])
                        echo '<option value="'.$annee['date'][$i].'">'.$annee['date'][$i].'</option>';
                }
                    

                echo '</select></td>';
               ?>
            </tr>
<?php if($actif == true)
{?>
            <tr>

                <td class="submit">
                <?php
                    $pw = array('type' => 'submit', 'name' => 'Enregistrer', 'id' => 'submit', 'value' => 'Enregistrer');
                    echo form_input($pw);
                    ?>
                </td>
            
            <?php } ?> 
           
<?php echo form_close('</div>'); ?>                   
                <td class="submit">
<?php
echo form_open('scolarite/choix_etudiant_ajout_equivalence', $attributes);
$pw = array('type' => 'submit', 'name' => 'submit', 'id' => 'submit', 'value' => 'Retour');
echo form_input($pw);
?>
                </td>
            </tr>
        </table>
<?php echo form_fieldset_close();
echo form_close('</div>');
?>
        </form>
        </table>

    </div>  
    <div class="clear"></div>

</div> <!--end of main content-->

<?php include(APPPATH.'views/include/footer.php'); ?>


