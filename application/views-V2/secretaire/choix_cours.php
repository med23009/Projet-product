<?php
include(APPPATH.'views/include/header.php');
include('include/menu.php');
?>
<div class="center_content">



    <div class="right_content">

        <?php
        $attributes = array('class' => 'niceform', 'name' => 'choixType');
        echo form_open('secretaire/consulter_horaire_cours', $attributes);
        echo form_fieldset();
		echo heading ('Consulter l\'horaire d\'un module <br>','2');
        ?>
        <table class="form">


            <tr>
                <td><?php echo form_label("Module :"); ?></td>
                <td>  
                    <?php
                    $index_dep = 0;
                    echo'<select name="choixCours">';
                    foreach ($sigle as $sig) {
                        echo'<option value="' . $sig . '">' . $sig . '</option>';
                    }
                    echo'</select>';
                    ?>
                    <?php $input = array('type' => '', 'size' => '54', 'name' => 'sigle');
                    ?>
                </td>
            </tr>

            <tr>  
                <td></td>
                <td class="submit">
                    <?php
                    $pw = array('type' => 'submit', 'name' => 'submit', 'id' => 'submit', 'value' => 'Consulter Horaire');
                    echo form_input($pw);
                    ?>
                </td>
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


