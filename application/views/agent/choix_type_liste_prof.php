<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
    <div class="container">
    <div class="col-xs-12 hl-left">

         <?php echo heading('Générer la liste des enseignants actifs','3');
     

           $attributes = array('class' => 'niceform', 'name' => 'formChoixType');

          echo form_open('agent/generer_liste_professeur',$attributes);
          echo form_fieldset();
  ?>
                <table class="form">

                 <tr>
                 <td>
                         <?php
                           echo form_label("Générer la liste par:") ;?>
                     </td>
                        <td>
                                <select  name="choixType">
                                    <option value="departement" >Département</option>
                                    <!--
                                    <option value="module">Module enseigné</option>
                                    !-->
                                </select>
                        </td>
                </tr>
                    
                    <tr>
                 <td class="submit">
 <?php $pw = array('type' => 'submit', 'name' => 'submit', 'id'=>'submit', 'value'=>'Suivant');
                             echo form_input($pw);?>
                     </td>
                    </tr>
                </table>

               <?php echo form_fieldset_close();

       echo form_close('</div>');
?>
           </div>
           <div class="clear"></div>
    </div> <!--end of main content-->

    <?php
  include(APPPATH.'views/include/footer.php');?>
