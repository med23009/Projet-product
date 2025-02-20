<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
<div class="container">
    <div class="col-xs-12 hl-left">

         <?php echo heading('Rediger Note','1');


           $attributes = array('class' => 'niceform');

          echo form_open('scolarite/afficher_cours',$attributes);
            ?>
        <table class="form" id="tableProf">
            <tr>
               <th> Année</th>
                   <th> Semestre</th>
            </tr>
            <tr>
                <td>
                <?php
                echo ' <select name="annee" id=""> ';
                for($i=0;$i<sizeof($annee['date']);$i++)
                    echo '<option value="'.$annee['date'][$i].'">'.$annee['date'][$i].'</option>';

                echo '</select>';
                ?>
                </td>
                <td>
                    <select name="session" id="">
                        <option value="03">Automne</option>
                        <option value="01">Printemps</option>
                        <option value="02">Été</option>
                    </select>
                </td>
            </tr>
            <tr style="height: 20px;"></tr>
            <tr>
                 <td class="submit">
                 <?php $pw = array('type' => 'submit', 'name' => 'submit', 'id'=>'submit', 'value'=>'Suivant');
                 echo form_input($pw);?>
                 </td>
            </tr>
         </table>
        <?php echo form_close('</div>');?>
           </div>
           <div class="clear"></div>
    </div> <!--end of main content-->

    <?php
  include(APPPATH.'views/include/footer.php');?>


