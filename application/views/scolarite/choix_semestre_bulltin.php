 <?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
 <div class="container">
    <div class="col-xs-12 hl-left">

         <?php echo heading($titre,'3');
           $attributes = array('class' => 'niceform');
          
                echo form_open('scolarite/voir_bulletin_nouvel',$attributes);
                echo '<table class="form" id="tableProf">';
                 //echo form_hidden('matriculeEtudiant', $matriculeEtudiant);
                echo form_hidden('matriculeEtudiant', $matriculeEtudiant)
          ?>
        
            <tr>         
                               
            </tr>
            <tr>
                              <td>Semestre :</td>
                    <td>
                        
                    <?php
                        echo ' <select name="semestre" id=""> ';
                        for($i=1;$i<=6;$i++)
                        {
                                echo '<option value="'.$i.'"> S'.$i.'</option>';
                        }
                        echo '<option value="0"> Tous</option>';
                        echo '</select>';
                    ?>
                    </td>
                

            </tr>
            <tr style="height: 20px;"></tr>
            <tr>
                 <td class="submit">
                 <?php $pw = array('type' => 'submit', 'name' => 'submit', 'id'=>'submit', 'value'=>'Choisir le semestre');
                 echo form_input($pw);?>
                 </td>
            </tr>
         </table>
          <?php
                   
                   echo form_fieldset_close();
        echo form_close('</div>');?>
           </div>
           <div class="clear"></div>
    </div> <!--end of main content-->

    <?php
  include(APPPATH.'views/include/footer.php');?>



