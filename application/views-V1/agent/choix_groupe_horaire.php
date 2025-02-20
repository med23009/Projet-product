<?php include(APPPATH.'views/include/header.php');
include('include/menu.php');
?>
<div class="container">
    <div class="col-xs-12 hl-left">

        <?php
        $attributes = array('class' => 'niceform');

        echo form_open('scolarite/choisir_groupe_horaire', $attributes);
        echo form_fieldset();
        ?>

        <?php
        echo' <td><?php echo form_label("Type groupe :") ;?></td>';
        echo'<select name="idGroupe">';
        
        foreach ($idGroupe as $idGroupe) {
            echo'<option value="' . $idGroupe . '">' . $idGroupe . '</option>';
        }
        
        echo'</select><br></br>';
        ?>
        

        </td>
            <tr>                     
                    <td class="submit">
                        <?php $pw = array('type' => 'submit', 'name' => 'submit', 'id'=>'submit', 'value'=>'suivant(2/3)'); 
                            echo form_input($pw);?>
                    </td>
                </tr> 
        <?php
        echo form_fieldset_close();

        echo form_close('</div>');
        ?>
    </div>
    <div class="clear"></div>
</div> <!--end of main content-->

<?php include(APPPATH.'views/include/footer.php'); ?>



