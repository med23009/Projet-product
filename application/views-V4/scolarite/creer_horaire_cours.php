


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css" />
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>css/niceforms-default.css" />
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>css/filtergrid.css" />

      


    </head>
    <body>

        <div id="main_container">

            <div class="header">
                  <div class="logo"><img src="<?php echo base_url();?>images/log_emim_2.png" /></div>
<div style="height: 40px;"></div>
    <div id="titreMauritanie">INSTITUT UNIVERSITAIRE PROFESSIONNEL</div>
    <div style="height: 20px;"></div>
    <div id="titreSysteme">SYSTÈME DE GESTION DE SCOLARITE (Lauréat)</div>
                <div class="right_header">Bienvenue 
                    
                        <?php  
    if( trim($this->session->userdata('surnom')) != "")
    {
        echo " ". $this->session->userdata('surnom'); 
    }
    else
    {
        echo " ". $this->session->userdata('prenom'); 
    }
    
    ?> | <?php echo anchor('connexion/logout', 'Deconnexion', array('class' => 'logout')); ?></div>
            </div>

            <?php
            include('include/menu.php');
            ?> 


            <div class="center_content">  

                <div class="right_content">  



                    <?php
                 //  print_r($periodeCoche['detailHoraire'][0]['idLocal']);
                    $attributes = array('class' => 'niceform');

                    echo form_open('scolarite/saisir_horaire_cours', $attributes);
                    echo form_fieldset();
                    ?>

                    <?php
                    echo $information; //variable pour guider l utilisateur
                    
                    echo'<select name="idGroupe">';

                    // foreach ($sigleGroupe as $idGroupe) {
                    echo'<option value="' . $sigleGroupe . '">' . $sigleGroupe . '</option>';
                    //  }
                    echo'</select><br></br>';
                    echo form_hidden('idGroupe',$sigleGroupe);
                    ?>

                    </td>
                    <table border="2"  summary="horaire" width="800px !important" style="text-align:center">
                        <thead>
                            <tr>
                                <th id="col" class="rounded" ></th>
                                <th id="col" class="rounded"style="background-color:#D9E2E1">Dimanche</th>
                                <th id="col" class="rounded" style="background-color:#D9E2E1">Lundi</th>
                                <th id="col" class="rounded" style="background-color:#D9E2E1">Mardi</th>
                                <th id="col" class="rounded" style="background-color:#D9E2E1">Mercredi</th>
                                <th id="col" class="rounded"style="background-color:#D9E2E1">Jeudi</th>
                                <th id="col" class="rounded"style="background-color:#D9E2E1">Vendredi</th>
                                <th id="col" class="rounded"style="background-color:#D9E2E1">Samedi</th>
                            </tr>
                        </thead>

                        <?php /*

                          Array ( [0] =>
                         * Array ( [idGroupe] => Array ( [0] => inf1010022011Groupe-Theorie1 [1] => inf1010022011Groupe-Theorie1 ) 
                         * [idPeriode] => Array ( [0] => 1 [1] => 15 ) 
                         * [idLocal] => Array ( [0] => L2119 [1] => L2119 ) 
                         * [sigle] => Array ( [0] => inf1010 [1] => inf1010 ) 
                         * [typeGroupe] => Array ( [0] => Groupe-Theorie [1] => Groupe-Theorie ) 
                         * [numGroupe] => Array ( [0] => 1 [1] => 1 ) ) )  
                         */ ?>



                        <tbody>
                            <?php
                        
                            for ($j = 8; $j <= 21; $j++) {
                                echo '<tr><td height=80px  style="background-color:#D9E2E1">' . $j.'h' . '</td>';
                                for ($i = 1; $i < 8; $i++) {
                                    $checked = false;
                                    $loc_selected = '';

                                     echo '<td>';
                                     echo'<select name="locale[]" style="display:block">';

                                    $index = $i + ($j - 8) * 7;
                                    $index--;
                                    $index_bd = ($i - 1) * 14 + ($j - 7);

                                   
                                    if (is_array($periodeCoche['detailHoraire'][0]['idPeriode']))
                                        if (in_array($index_bd, $periodeCoche['detailHoraire'][0]['idPeriode'])) {
                                            $key = array_search($index_bd , $periodeCoche['detailHoraire'][0]['idPeriode']);
                                            $loc_selected = $periodeCoche['detailHoraire'][0]['idLocal'][$key];
                                            $checked = true;
                                        }


                                    foreach ($local as $loc) {

                                        echo'<option value="' . $loc . '" ';
                                        if (strtolower(trim($loc)) == strtolower(trim($loc_selected)))
                                            echo 'selected="selected"';


                                        echo '>' . $loc . '</option>';
                                    }



                                    $horaire = "$index.$i.$j";
                                    echo'</select>';
                                    echo form_checkbox('horaire[]', $horaire, $checked);
                                    echo'</td>';
                                }
                                echo '</tr>';
                            }
                            ?>
                        </tbody>
                    </table>        
                    <table id="ajotuter_horaire">

                        <tr class="submit">
                            <td></td> <td>
                                <?php
                                $pw = array('type' => 'submit', 'name' => 'submit', 'id' => 'submit', 'value' => 'Enregistrer');
                                echo form_input($pw);
                                ?>
                            </td>
                            <td></td>
                        </tr>
                    </table>
                    <?php
                    echo form_fieldset_close();
                    echo form_close('</div>');
                    ?>     


                </div>         

                <div class="clear"></div>
            </div> <!--end of main content-->


            <?php include(APPPATH.'views/include/footer.php');
            ?>
