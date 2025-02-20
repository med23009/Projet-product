<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>

    <div class="container">
    <div class="col-xs-12 hl-left">
        <h1><?php echo $titre;?></h1>
   <h2>Choisissez l'année et le semestre</h2>
   <?php if(validation_errors() != ''){ ?>
 <div class="error_box">
            <?php echo validation_errors();?>
        </div>
<?php } ?>

         <div class="form">
          <?php $attributes = array('class' => 'niceform');

          echo form_open('scolarite/'.$redirection,$attributes);?>  <!--à changer lors de l'implémentation des fonctionnalités-->

               <fieldset>
                <table>
                    <tr>
                        <td> Année</td>
                        <td> Semestre</td>
                    </tr>
                    <tr>
                <td>
                <?php
                echo ' <select name="annee" id=""> ';
                 echo '<option value="'.$courante['annee'][0].'">'.$courante['annee'][0].'</option>';
                for($i=0;$i<count($annee['date']);$i++)
                {
                    if($courante['annee'][0] != $annee['date'][$i])
                        echo '<option value="'.$annee['date'][$i].'">'.$annee['date'][$i].'</option>';
                }
                    

                echo '</select>';
 
                   /*
     * fonction pour convertir le code du semestre par son nom 
     * elle prend en paramètre le numéro du semestre soit(1,2,3)
     * et elle retourne le nom (Automne, ete, printemps)
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
                ?>
                </td>
                <td>
                    <select  name="semestre" id="">
                        <?php 
                         echo '<option value="'.$courante['semestre'][0].'">'.get_session_nom($courante['semestre'][0]).'</option>';
                         if($courante['semestre'][0] == '1')
                         {
                             echo '<option value="03">Automne</option>
                              <option value="02">Été</option>';
                         }
                         elseif($courante['semestre'][0] == '2')
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

            </tr>
                </table>
                   <input type="submit" value="Suivant">
                </fieldset>
         <?php echo form_close('');?>

         </div>

     </div><!-- end of right content-->


  </div>   <!--end of center content -->




    <div class="clear"></div>
    </div> <!--end of main content-->


  <?php include(APPPATH.'views/include/footer.php');?>