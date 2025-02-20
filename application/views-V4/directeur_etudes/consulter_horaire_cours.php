<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>

      
 <div class="container">
    <div class="col-xs-12 hl-left">   

                    

                    <?php
                    echo heading($titre, 2);
                    
                    $attributes = array('class' => 'niceform');

                    echo form_open('directeur_etudes/consulter_horaire_cours', $attributes);
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
						echo "\n";
                        // echo "\n(";
                        $NUMGroupe = $detail['typeGroupe'][array_search($index, $detail['idPeriode'])];
						echo EnleverGroupe($NUMGroupe);
						// print_r($detail['typeGroupe'][array_search($index, $detail['idPeriode'])]);

                        echo "\n(";
                        print_r($detail['numGroupe'][array_search($index, $detail['idPeriode'])]);
                        echo ")<br>";	// pour s�parer 2 groupes m�me p�riode
                        // echo ")";
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
