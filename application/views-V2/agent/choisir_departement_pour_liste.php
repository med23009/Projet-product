<?php
include(APPPATH.'views/include/header.php');
include('include/menu.php');
?>
<div class="container">
    <div class="col-xs-12 hl-left">
        <?php

		$attributes = array('class' => 'niceform', 'name' => 'choixType');
        if(!isset($module))
        {
			echo form_open('agent/afficher_enseignant_departement', $attributes);
		echo form_fieldset();
        }
        else 
        {
            echo form_open('agent/afficher_enseignant_module', $attributes);
        }
        print ('<h2>' . $titre . '</h2>');	// affiche "Choisissez le module:" ou "Choisissez le département:"
        ?>

        <table class="form">
             <tr>                  
                   <td><?php 
                   if(!isset($module))
                   {
                    echo form_label("Départements :");   
                    echo '</td>
                    <td>';

                            echo'<select name="choixDepartement">';

                        if(is_array($departements))
                        {
                            for($i=0;$i<count($departements['nomDep']);$i++)
                            {
                                echo'<option value="' . $departements['idDepartement'][$i] .
                                        '">' . $departements['nomDep'][$i] . '</option>';
                            }
                            echo'</select>';
                        }
                   }
                   else
                   {
                       echo form_label("Module :");   
                    echo '</td>
                    <td>';

                            echo'<select name="choixModule">';
                        if(is_array($module))
                        {
                            for($i=0;$i<count($module);$i++)
                            {
                                echo'<option value="' . $module[$i] .
                                        '">' . $module[$i] . '</option>';
                            }
                            echo'</select>';
                        }
                   }
                    ?>
                   </td>
                        
                
          
                </tr>  

            <tr>  
                <td></td>
                <td class="submit">
                         <?php $pw = array('type' => 'submit', 'name' => 'submit', 'id'=>'submit', 'value'=>'Afficher Enseignants'); 
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


