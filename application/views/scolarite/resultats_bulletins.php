<?php include(APPPATH.'views/include/header.php');

	include('include/menu.php');

    $url_bul = base_url()."bulletins/";			// pour cliquer dessus et afficher le fichier dans le navigateur
    $url_err = base_url()."erreursBulletins/";

	
// modifs 2.2.2 début Mai-juin 2013 // cheikh 13/08
	require($_SERVER["DOCUMENT_ROOT"].'scol/application/libraries/fpdf_merge/fpdf_merge.php');
	// chemin relatif à l'emplacement de l'application (sur ordinateur local : C:/wamp/www/)

/* Rendu là, les bulletins sont créés et classifiés en erreurs, deja_calcules ou generes. 
	Il faut ici faire la liste des bulletins à concaténer (les "deja_calcules" et "generes") pour créer le fichier cumulatif. 
	Les données (les matricules, donc les noms des fichiers) sont dans $generes et $deja_calcules
	Utilisation de fpdf_merge pour créer un fichier contenant tous les bulletins à imprimer
		$merge = new FPDF_Merge();
		Note 1: dans add($fichier), il ne faut pas que $fichier soit une expression
		Note 2 : on ne peut pas cumuler des add. Il faut donc faire des add (fichier à ouvrir)-add(fichier à ajouter)-output en succession.
*/	
	$bull_a_imprimer = array_merge($generes, $deja_calcules);
	sort($bull_a_imprimer);
	$nb_a_imprimer = count($bull_a_imprimer);

		if ($nb_a_imprimer > 1) {		// au moins 2 bulletins pour créer un cumulatif
			$merge = new FPDF_Merge();
			$adr_bull_0 = $_SERVER["DOCUMENT_ROOT"].'Bulletins/Bulletin_'.$bull_a_imprimer[0].'.pdf';
			$adr_cumul = $_SERVER["DOCUMENT_ROOT"].'Bulletins/Bulletins_cumul'.'_'.$semestre.'-'.$annee.'.pdf';
			$merge->add($adr_bull_0);
			$merge->output($adr_cumul);		// fichier cumul créé pour commencer avec le bulletin #0
		}
	for ($i=1 ; $i< $nb_a_imprimer ; $i++) {	// ce for n'est pas exécuté s'il n'y a que 0 ou 1 bulletin produit.
		$merge = new FPDF_Merge();
		$adr_bull_i = $_SERVER["DOCUMENT_ROOT"].'Bulletins/Bulletin_'.$bull_a_imprimer[$i].'.pdf';
		$merge->add($adr_cumul);
		$merge->add($adr_bull_i);
		$merge->output($adr_cumul);
	}
// et pour terminer, on efface tous les bulletins temporaires (avec logo) Temp_Bulletin.$matricule.pdf
?>
<div class="container">
    <div class="col-xs-12 hl-left">
	<?php
	$sem_ann = $semestre.'-'.$annee;
    echo "<div class='right_content' id='printable'>";
        echo "<h2 style='margin-left:40px'>Résultats de la génération des bulletins";
		if ($annee != 'vide') { // valeur 'vide' si c'est pour un bulletin individuel
			echo ", semestre <b>$sem_ann</b>";
		}
		echo"</h2>";
        echo "<div class='clear'></div>";
	?>


<table id="rounded-corner">
            <thead>
                <tr>
                    <?php
					if ($nb_a_imprimer > 1) {	// au moins 2 bulletins pour avoir un fichier cumulatif
						echo "<th width='60%' style='background:lightgrey'>Le fichier pdf cumulatif des ";
						echo "$nb_a_imprimer"."  bulletins disponibles &rArr;</th>";
						echo "<th width='60%' style='background:lightgrey'>";
						echo "<A href='".$url_bul."Bulletins_cumul"."_".$sem_ann.".pdf'>Ouvrir le fichier à imprimer</A></td>";
						echo" </th>";
                echo "</tr>";
            echo "</thead>";
			echo "</table>";
           echo "<div class='clear'></div>";
				   }
				   else {
				   if ($annee != 'vide') {	// bulletin individuel si $annee = 'vide'
				   echo "<tr>";
				   echo "<th width='80%' style='foreground:lightgrey'>";
				   echo "<br><b>Aucun bulletin pour ce semestre.</b>";
				   echo "</tr>";
				   } }
				   ?>

<!-- modifs 2.2.2 fin -->

        <table id="rounded-corner">
             <caption><b><u>Les bulletins recalculés avec succès</u></b></caption>
            <thead>
                <tr>
                    <th width="50%" style="background:greenyellow">Matricule</th>
                    <th width="50%" style="background:greenyellow">Lien</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($generes as $matricule)
                {
                    echo "<tr>";
                    echo "<td><b>".$matricule."</b></td>";
                    echo"<td>";
                    echo "<A href='".$url_bul."Bulletin_".$matricule.".pdf'>Voir le bulletin</A></td>";
                    echo"</tr>";
                }
                ?>
            </tbody>
            
        </table>
           
           <div class="clear"></div>
           
       
        <table id="rounded-corner">
             <caption><b><u>Les bulletins non recalculés</u></b></caption>
            <thead>
                <tr>
                    <th width="50%" style="background:yellow">Matricule</th>
                    <th width="50%" style="background:yellow">Lien</th>
                </tr>
            </thead>
            <tbody>
                <?php
 
                foreach($deja_calcules as $matricule)
                {
                    echo "<tr>";
                    echo "<td><b>".$matricule."</b></td>";
                    echo"<td>";
                    echo "<A href='".$url_bul."Bulletin_".$matricule.".pdf'>Voir le bulletin</A></td>";
                    echo"</tr>";
                }
                ?>
            </tbody>
            
        </table>
          
           <div class="clear"></div>
           
                  
        <table id="rounded-corner">
             <caption><b><u>Les matricules problématiques</u></b></caption>
            <thead>
                <tr>
                    <th width="50%" style="background:pink">Matricule</th>
                    <th width="50%" style="background:pink">Erreur</th>
                </tr>
            </thead>
            <tbody>
                <?php
 
                foreach($erreurs as $matricule)
                {
                    echo "<tr>";
                    echo "<td><b>".$matricule."</b></td>";
                    echo"<td>";
                    echo "<A href='".$url_err.$matricule.".txt'>Voir erreurs</A></td>";
                    echo"</tr>";
                }
                ?>
            </tbody>
            
        </table>
           </div>
           <div class="clear"></div>
           
           
           
    </div> <!--end of main content-->
    </div>
    <?php
  include(APPPATH.'views/include/footer.php');?>
