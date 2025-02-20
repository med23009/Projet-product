<?php
include(APPPATH.'views/include/header.php');
include('include/menu.php');
?>
<div class="container">
    <div class="col-xs-12 hl-left">

        <?php
        $attributes = array('class' => 'niceform', 'name' => 'choixType');
        echo form_open('scolarite/consulter_horaire_cours', $attributes);
        echo form_fieldset();
        ?>
        <table class="form">


            <tr>
                <td><?php echo form_label("Module :"); ?></td>
                <td>  
                    <?php
                    $index_dep = 0;
                    echo'<select name="choixCours">';
                    
                     for ($i=0; $i<count($sigleCours);$i++){
                        echo'<option value="' . $sigleCours[$i] . '">' .
                                $sigleCours[$i] .' '.$titre[$i].'</option>';
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
                         <?php $pw = array('type' => 'submit', 'name' => 'submit', 'id'=>'submit', 'value'=>'Consulter l\'horaire'); 
                             echo form_input($pw);?>
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


