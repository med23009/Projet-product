<?php
include(APPPATH.'views/include/header.php');
include('include/menu.php');
?>
<div class="container">
    <div class="col-xs-12 hl-left">

        <?php
        echo heading("Horaires du module : ".$sigle, 2);
        $attributes = array('class' => 'niceform', 'name' => 'choixType');
        echo form_open('scolarite/afficher_horaire_cours', $attributes);
        echo form_fieldset();
        ?>
        <table class="form">


            <tr>
                <td><?php echo form_label("Horaires disponibles :"); ?></td>
                <td>  
                    <?php
                    if(count($horaires_disponibles) > 0)
                    {
                    echo'<select name="date">';
                    foreach ($horaires_disponibles as $hor) {
                        echo'<option value="' . $hor['value'] . '">' . $hor['key'] . '</option>';
                    }
                    echo'</select>';
                    }
                    else
                        echo "<b>Aucun horaire disponible pour ce module !</b>"
                    ?>
                    <?php $input = array('type' => 'hidden', 'size' => '54', 'name' => 'sigle', 'value'=>$sigle);
                    echo form_input($input);
                    ?>
                </td>
            </tr>
            <br>
            <tr>  
                <td></td>
                <?php if(count($horaires_disponibles) > 0)
                    { ?>
                <td class="submit">
                         <?php $pw = array('type' => 'submit', 'name' => 'submit', 'id'=>'submit', 'value'=>'Consulter l\'horaire'); 
                             echo form_input($pw);?>
            </td>
            <?php } ?>
            </tr>
        </table>

        <?php
        echo form_fieldset_close();

        echo form_close('</div>');
        ?>
    </div>
    <div class="clear"></div>
</div> <!--end of main content-->

<?php include(APPPATH.'views/include/footer.php'); ?>


