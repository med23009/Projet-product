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
    <div class="logo"><img src="<?php echo base_url();?>images/log_emim_2.png" /> </div>
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
    
    ?> | <?php echo anchor('connexion/logout', 'Déconnexion' , array('class' => 'logout'));?></div>
            </div>

            <?php
            include('include/menu.php');
            ?> 


            <div class="center_content">  

                <div class="right_content">  



                    <?php
                    echo heading($titre, 2);
                    $attributes = array('class' => 'niceform');

                    echo form_open('secretaire/afficher_horaire_cours', $attributes);
                    echo form_fieldset();
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

                        <tbody>
                            <?php
                             function EnleverGroupe ($texte){
							// $texte = "Groupe-Theorie", je veux garder seulement la fin et enlever Groupe-
							// validation d'abord
								if (strpos($texte,"-") == 0) 
								return ("Err_gr");
							$morceaux = explode("-", $texte);
							return $morceaux[1];
							}
							$index = 1;

                            for ($j = 8; $j <= 21; $j++) {
                                echo '<tr><td height=80px  style="background-color:#D9E2E1">' . $j . 'h</td>';

                                for ($i = 1; $i < 8; $i++) {
                                    echo '<td>';

                                    $index = ($i - 1) * 14 + ($j - 7);
                                    //print_r($index);                        
                                    $k = 1;
                                    
                                    if (is_array($detailHoraire)) {
                                        foreach ($detailHoraire as $detail) {

                                            // print_r($detail);
                                            // die();
                                            if (is_array($detail['idPeriode'])) {
                                                foreach ($detail['idPeriode'] as $periode) {
                                                    // print_r($periode);
                                                    // die();
                                                    //print_r($value);
                                                    if ($index == $periode) {
                                                        print_r($detail['sigle'][$k]);
                                                        echo "\n(";
                                                        print_r($detail['idLocal'][$k]);
                                                        echo ")";
                                                        // echo "\n(";
														echo "\n";
                                                        echo EnleverGroupe($detail['typeGroupe'][$k]);
														// print_r($detail['typeGroupe'][$k]);

                                                        echo "\n(";
                                                        print_r($detail['numGroupe'][$k]);
                                                        echo ")<br>";
                                                        // echo ")";
                                                        // $k++;
                                                    }
                                                }
                                            }
                                        }
                                    }

                                    // print_r($index);
                                    // $horaire = "$index.$i.$j";
                                    // print_r($horaire);
                                    // die();
                                    // echo'</select>';
                                    //echo'<input type="checkbox" name="horaire[]" id="horaire[]" value="$horaire" style="margin:30px" >';
                                    //  echo form_checkbox('horaire[]', $horaire, False);
                                    echo'</td>';
                                }
                                echo '</tr>';
                            }
                            ?>
                        </tbody>
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
