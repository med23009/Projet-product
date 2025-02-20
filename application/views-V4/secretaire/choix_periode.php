<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>

    <div class="center_content">
       

    <div class="right_content">

   <h2>Choisissez l'année et le semestre</h2>
   <?php if(validation_errors() != ''){ ?>
 <div class="error_box">
            <?php echo validation_errors();?>
        </div>
<?php } ?>

         <div class="form">
          <?php $attributes = array('class' => 'niceform');

          echo form_open('secretaire/'.$redirection,$attributes);
                             /*
     * fonction pour convertir le code du semestre par son nom 
     * elle prend en parametre le numero du semestre soit(1,2,3)
     * et elle retourne le nom (Automn,ete,printemps)
     */
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
          ?>  <!--a changer lors de l'implementation des fonctionnalités-->

               <fieldset>
                <table>
                    <tr>
                        <td><label> Année</label></td>
                        <td><label> Semestre</label></td>
                    </tr>
                    <tr>
                        <td>
                    <?php
                     echo ' <select name="annee" id=""> ';
                    echo '<option value="'.$courante['annee'].'">'.$courante['annee'].'</option>';
                    for($i=0;$i<count($annee['date']);$i++)
                    {
                        if($courante['annee'] != $annee['date'][$i])
                            echo '<option value="'.$annee['date'][$i].'">'.$annee['date'][$i].'</option>';
                    }
                    ?>
                   </select>
                   </td><td>
                     <select  name="semestre" id="">
                        <?php 
                         echo '<option value="'.$courante['semestre'].'">'.get_session_nom($courante['semestre']).'</option>';
                         if($courante['semestre'] == '1')
                         {
                             echo '<option value="03">Automne</option>
                              <option value="02">Été</option>';
                         }
                         elseif($courante['semestre'] == '2')
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
                </table>
                   <?php echo form_hidden($mode) ?>
                   <input type="submit" value="Suivant">
                </fieldset>
         <?php echo form_close('');?>

         </div>

     </div><!-- end of right content-->


  </div>   <!--end of center content -->




    <div class="clear"></div>
    </div> <!--end of main content-->


  <?php include(APPPATH.'views/include/footer.php');?>