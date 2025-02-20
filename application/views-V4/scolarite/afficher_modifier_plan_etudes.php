<?php include(APPPATH.'views/include/header.php');
include('include/menu.php');
?>
<script type="text/javascript">
    function Afficher_bouttons_modif()
    {
        document.forms[0].note.disabled=false;
        document.forms[0].cote.disabled=false;
        document.forms[0].lien.disabled=false;
        document.forms[0].Enregistrer.disabled=false;        
    }
</script>

<div class="container">
    <div class="col-xs-12 hl-left">         

        <?php
        echo validation_errors();
        echo heading("Consulter/Modifier le plan d'&eacute;tudes", '2');
        if (isset($errorMsg) && $errorMsg != NULL)
        {
            ?>
        <div class=<?php echo $class; ?> >
        <?php
            echo $errorMsg;
            ?>
    </div>
<?php        }
        
        
        if (isset($actif) && $actif != NULL && !$actif || $cote == "EQ")
        {
            $actif = false;
            ?>
        <div class="warning_box">
        <?php
        if($cote == "EQ"){
            $note = "N/A";
            echo '<b> Aucune modification permise pour une équivalence </b>';
        }
        else
            echo '<b>Cet étudiant est inactif. Aucune modification ne peut être faite.</b>';
            ?>
    </div>
<?php        }
        $attributes = array('class' => 'niceform', 'name' => 'formPlanEtude');

        echo form_open('scolarite/modifier_plan_etudes', $attributes);
        echo form_fieldset();
        echo form_hidden('nom', $nom);
        echo form_hidden('prenom', $prenom);
        echo form_hidden('actif', $actif);
        echo form_hidden('matricule', $matricule);
        echo form_hidden('annee', $annee);
        echo form_hidden('semestre', $semestre);
        echo form_hidden('sigle', $sigle);
        echo form_hidden('noteAvant', $note);
        echo form_hidden('coteAvant', $cote);
        echo form_hidden('lienAvant', $lien);
        ?>

        <table class="form">
            <tr>
                <td><?php echo form_label("Nom :"); ?></td>
                <td><?php echo $prenom . " " . $nom ?>   </td>
            </tr>    
            <tr>
                <td><?php echo form_label("Matricule :"); ?></td>
                <td><?php
                    $input = array('type' => 'text', 'value' => $matricule, 'size' => '10', 'name' => 'matricule', 'disabled' => "disabled");
                    echo form_input($input, '', 'required');
        ?>
                </td>
            </tr>

            <tr>
                <td><?php echo form_label("Sigle du module :"); ?></td>
                <td><?php
                    $input = array('type' => 'text', 'value' => $sigle, 'size' => '10', 'name' => 'sigle', 'disabled' => 'disabled');
                    echo form_input($input, '', 'required');
        ?>
                </td>
            </tr>
            <tr>
                <td><?php echo form_label("Année :"); ?></td>
                <td><?php
                    $input = array('type' => 'text', 'value' => $annee, 'size' => '10', 'name' => 'annee', 'disabled' => 'disabled');
                    echo form_input($input, '', 'required');
        ?>
                </td>
            </tr>
            <tr>
                <td><?php echo form_label("Semestre :"); ?></td>
                <td><?php
                    $input = array('type' => 'text', 'value' => $semestre, 'size' => '10', 'name' => 'semestre', 'disabled' => 'disabled');
                    echo form_input($input, '', 'required');
        ?>
                </td>
            </tr>        
            <tr>
                <td><?php echo form_label("Note :"); ?></td>
                <td><?php
                    $input = array('type' => 'text', 'value' => $note, 'size' => '10', 'name' => 'note');
                    if($disabled)
                        $input['disabled'] = "disabled";
                    echo form_input($input, '', '');
        ?>
                </td>
            </tr>
            <tr>
                <td><?php echo form_label("Cote :"); ?></td>
                <td>
                       <select  name="cote"  <?php if($disabled) echo "disabled"; ?> >
                        <option value= <?php echo $cote ?> ><?php echo $cote ?></option>
                        <option value=""></option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                        <option value="FX">FX</option>
                        <option value="F">F</option>
                        <option value="AV">AV</option>
                    </select> 
                </td>
            </tr>
            <tr>
                <td><?php echo form_label("Lien (Obs. dans le bulletin) :"); ?></td>
                <?php 
                    switch(strtoupper(trim($lien)))
                    {
                        case "OB":
                            $lien_text = "OB: Obligatoire";
                            break;
                        case "EQ":
                        case "ER":
                            $lien = "EQ";
                            $lien_text = "EQ: Équivalence";
                            break;
                        case "AB":
                        case "AR":
                            $lien = "AB";
                            $lien_text = "AB: Abandon"; 
                            break;
                        case "EC":
                            $lien_text = "EC: Échec";
                            break;
                        case "HP":
                        case "HH":
                        case "HV":
                            $lien = "HP";
                            $lien_text = "HP: Hors programme";
                            break;
                        case "HR":
                        case "HS":
                            $lien = "HR";
                            $lien_text = "HR: Hors programme après reprise";
                            break;
                        case "RP":
                            $lien_text = "RP: Repris plus tard";
                            break;
                        case "RT":
                            $lien_text = "RT: Réussi après rattrapage";
                            break;
                        case "AV":
                            $lien_text = "AV: À venir";
                            break;
                        case "":
                            $lien_text = "";
                            break;
                        default :
                            die();
                            break;
                        }
                ?>
                <td>
                    <select  name="lien" <?php if($disabled) echo "disabled";?> >
                        
                        <option value= <?php echo $lien ?> ><?php echo $lien_text ?></option>
                        <option value="OB">OB: Obligatoire</option>
                        <option value="AB">AB: Abandon</option>
                        <option value="AV">AV: À venir</option>
                        <option value="EC">EC: Échec</option> 
                        <option value="HP">HP: Hors programme</option>
                        <option value="HR">HR: Hors programme après reprise</option>
                        <!-- <option value="RP">RP: Repris plus tard</option> Retrait 2.2.1 -->
                        <option value="RT">RT: Réussi après rattrapage</option>
                    </select> 
                </td>
            </tr>
<?php if($actif)
{?>
            <tr>

                <td class="submit">
                <?php
                $pw = array('type' => 'button', 'name' => 'Modifier', 'id' => 'submit', 'value' => 'Modifier', 'OnClick' => " Afficher_bouttons_modif()");
                echo form_input($pw);
                ?>
                </td><td>
                    <?php
                    $pw = array('type' => 'submit', 'name' => 'Enregistrer', 'id' => 'submit', 'value' => 'Enregistrer');
                    if($disabled)
                        $pw['disabled'] = "disabled";
                    echo form_input($pw);
                    ?>
                </td>
            </tr>
            <?php } ?> 
            <tr>
<?php echo form_close('</div>'); ?>                   
                <td class="submit">
<?php
echo form_open('scolarite/plan_etudes', $attributes);
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


