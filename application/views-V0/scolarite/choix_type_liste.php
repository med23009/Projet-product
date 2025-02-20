<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
    <div class="container">
    <div class="col-xs-12 hl-left">

         <?php echo heading($titre,'3');


           $attributes = array('class' => 'niceform', 'name' => 'choixType');

          echo form_open('scolarite/generer_liste',$attributes);
		  echo form_fieldset();
  ?>
<table class="form">

                 <tr>
                 <td>
                         <?php
                           // premier sous-titre (ajout 2.2.1)
						   switch ($case) {
							case 'annee' : $champ1='Année :';
								break;
							case 'groupe' : $champ1='';
								break;
							case 'module' : $champ1='Sigle :';
								break;
							case 'programme' : $champ1='';
								break;	
							default : $champ1='Erreur  12589:';
							break;
							}
						   
						   echo form_label($champ1) ;?>   <!-- modif 2.2.1 -->
                     </td>
                        <td>
                                <select name="choix">
                                <?php 
                                if(isset($case))
                                {
                                    if($case == 'annee')
                                    {
                                         echo '<option value="'.$courante['annee'].'">'.$courante['annee'].'</option>';
                                        for($i=0;$i<count($value);$i++)
                                        {
                                            if($courante['annee'] != $value[$i])
                                                echo '<option value="'.$value[$i].'">'.$value[$i].'</option>';
                                        }
                                    }
                                    else
                                    {
                                        for($i = 0 ; $i < count($value) ; $i++)
                                        { 

                                            ?>

                                            <option value="<?php echo $value[$i]; ?>" > <?php echo $option[$i]; ?></option>
                                            <?php
                                        }
                                    }
                                }
                                
                                 echo form_hidden('typeListe',$typeListe);
                                ?>
                                </select>
                               
                        </td>
                </tr>
                <?php 
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
                
                if(isset($case))
                {
                    if($case == 'annee' )
                    {
                    echo '<tr>
                        <td>';
                        echo form_label("Semestre :"); 
                        echo '</td>
                        <td>';
                                echo '<select name="session" id="">';
                         echo '<option value="'.$courante['semestre'].'">'.
                                 get_session_nom($courante['semestre']).'</option>';
                         if($courante['semestre'] == '1')
                         {
                             echo '<option value="3">Automne</option>
                              <option value="2">Été</option>';
                         }
                         elseif($courante['semestre'] == '2')
                         {
                            echo '<option value="3">Automne</option>
                            <option value="1">Printemps</option>';
                         }
                        else 
                        {
                            echo '<option value="1">Printemps</option>
                            <option value="2">Été</option>';
                        }
                             
                                echo '</select>';


                    echo ' </td>
                    </tr>';
                    
                    }
                    if($case == 'module'  )
                    {
                        echo '<tr>
                        <td>';
                        echo form_label("Année :"); 
                        echo '</td>
                            <td>';
                    if(is_array($annee['date']))
                    {
                        echo '<select name="annee">';
                        echo '<option value="'.$courante['annee'].'">'.$courante['annee'].'</option>';
                        for($i=0;$i<count($annee['date']);$i++)
                        {
                          if($courante['annee'] != $annee['date'][$i])
                              echo '<option value="'.$annee['date'][$i].'">'.$annee['date'][$i].'</option>';
                        }
                        echo '</select>';
                    }

                    echo '<tr>
                        <td>';
                        echo form_label("Semestre :"); 
                        echo '</td>
                        <td>';

                                echo '<select name="session" id="">';
                                    echo '<option value="'.$courante['semestre'].'">'.
                                 get_session_nom($courante['semestre']).'</option>';
                         if($courante['semestre'] == '1')
                         {
                             echo '<option value="3">Automne</option>
                              <option value="2">Été</option>';
                         }
                         elseif($courante['semestre'] == '2')
                         {
                            echo '<option value="3">Automne</option>
                            <option value="1">Printemps</option>';
                         }
                        else 
                        {
                            echo '<option value="1">Printemps</option>
                            <option value="2">Été</option>';
                        }
                        echo        '</select>';


                    echo ' </td>
                    </tr>';
                    }
                }
                ?>
                
                    <tr>
                        <?php
                        echo form_hidden($hidden);
                        
                        ?>
                 <td class="submit">
                         <?php $pw = array('type' => 'submit', 'name' => 'submit', 'id'=>'submit', 'value'=>'Générer la liste');
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


