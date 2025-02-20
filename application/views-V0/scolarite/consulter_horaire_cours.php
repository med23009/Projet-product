<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="<?php echo base_url();?>css/style.css" />
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>css/niceforms-default.css" />
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>css/filtergrid.css" />
    </head>
    <?php>
        $adress = $this->lang->line('main_instituteAdresse');
        $application_name = $this->lang->line('main_application_name');
        $welcome = $this->lang->line('main_welcome');
        $logoPath=$this->config->item('$logoPath');
    ?>
    <body>

         <div class="container">
    <div class="col-xs-12 hl-left">

            <div class="header">
    <div class="logo"><img src="<?php echo base_url();?><?=$logoPath?>" /> </div>
    <div style="height: 40px;"></div>
    <div id="titreMauritanie"><?=$adress?></div>
    <div style="height: 20px;"></div>
    <div id="titreSysteme"><?=$application_name?></div>
    <div class="right_header"><?=$welcome?>: 
	<?php  $this->session->userdata('prenom'); ?> | <?php echo anchor('connexion/logout', 'Déconnexion' , array('class' => 'logout'));?></div>
            </div>

            <?php
            include('include/menu.php');
            ?> 



                    <?php  
                    echo heading($titre, 2);
                    $attributes = array('class' => 'niceform');

                    echo form_open('scolarite/consulter_horaire_cours', $attributes);
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

for ($j = 8; $j <= 21; $j++) {
    echo '<tr><td height=80px  style="background-color:#D9E2E1">' . $j . 'h</td>';

    for ($i = 1; $i < 8; $i++) {
        echo '<td>';

        $index = ($i - 1) * 14 + ($j - 7);

        if (is_array($detailHoraire)) {
			foreach ($detailHoraire as $detail) {

                if (is_array($detail['idPeriode'])) {
                    if (in_array($index, $detail['idPeriode'])) {
                        print_r($detail['sigle'][array_search($index, $detail['idPeriode'])]);
                        echo "\n(";
                        print_r($detail['idLocal'][array_search($index, $detail['idPeriode'])]);
                        echo ")";
                        // echo "\n(";
						echo "\n";
						$NUMGroupe = $detail['typeGroupe'][array_search($index, $detail['idPeriode'])];
						$z=EnleverGroupe($NUMGroupe);
						echo EnleverGroupe($NUMGroupe);
						// print_r($detail['typeGroupe'][array_search($index, $detail['idPeriode'])]);
						echo "\n(";
                        print_r($detail['numGroupe'][array_search($index, $detail['idPeriode'])]);
                        // echo ")";
                        echo ")<br>";	//séparateur pour 2 groupes à la même heure
                    }
                }
            }
        }


       
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
