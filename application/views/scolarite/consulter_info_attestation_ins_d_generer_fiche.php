<?php include(APPPATH.'views/include/header.php');
include('include/menu.php');
?>
<?php
             $s=0;
       
             if($semestre==1){
             $s=1;}
            elseif($semestre==2){
                $s=3;
            }
            elseif($semestre==3){
                $s=5;
            }
            elseif($semestre==4){
                
       }?>

<script>
var sommeCreditsImp=0;
var sommeCreditsPaire=0;
</script>
 <div class="container">
    <div class="col-xs-12 hl-left"> 
            
<!--<button  onClick="imprimer('printable');" style="float:right; height: 30px; background-color:#cceac4; width: 160px; margin-right:185px; margin-top:50px;"><b> Imprimer la fiche </b></button>-->
<?php
echo heading('Genération du fichier d\'inscription',3);
echo"<hr class='mx-2 text-bold'>";
     echo form_open('scolarite/generer_fiche_new');
//                echo '<table class="form" id="tableProf">';
                 //echo form_hidden('matriculeEtudiant', $matriculeEtudiant);
                echo form_hidden('matriculeEtudiant', $info['matriculeEtudiant']);
                echo form_hidden('annee', $annee);?>
        <div id="printable">
       <table border="0" style="width: 545.25pt; margin-left: 3.5pt; border-collapse: collapse;" width="727">
<tbody>
<tr style="height: 12.0pt;">
<td style="width: 33.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.0pt;" width="44">&nbsp;</td>
<!--td rowspan="4" style="width: 44.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.0pt;" width="60">&nbsp;<img src="../../images/logo_iup_abra.png" height="70" width="90" ></td-->

<td rowspan="4" style="width: 44.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.0pt;" width="60">&nbsp;
    <img src="../../images/<?php echo $parametres['logo'] ?>" height="70" width="90" >
</td>
<td  style="width: 201.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.0pt;" colspan="8" width="268">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="color: black;"><?php /*MedBakar affichage du nom */ echo $parametres['nom_ins_parent_fr'] ?></span></p>
</td>
<td style="width: 22.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.0pt;" width="30">&nbsp;</td>
<td style="width: 63.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.0pt;" width="85">&nbsp;</td>
<td style="width: 33.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.0pt;" width="45">&nbsp;</td>
<td style="width: 19.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.0pt;" width="26">&nbsp;</td>
<td style="width: 17.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.0pt;" width="24">&nbsp;</td>
</tr>
<tr style="height: 12.0pt;">
<td style="width: 44.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.0pt;" width="60">&nbsp;</td>
<td  style="width: 175.4pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.0pt;" colspan="7" width="234">
<!--p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 10.0pt; color: black;">Institut Universitaire Professionnel</span></p-->
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 10.0pt; color: black;"><?php /*AZ affichage du nom */ echo $parametres['nom'] ?></span></p>
</td>

<td style="width: 42.85pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.0pt;" width="57">&nbsp;</td>
<td style="width: 22.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.0pt;" width="30">&nbsp;</td>
<td style="width: 63.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.0pt;" width="85">&nbsp;</td>
<td style="width: 33.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.0pt;" width="45">&nbsp;</td>
<td style="width: 19.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.0pt;" width="26">&nbsp;</td>
<td style="width: 17.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.0pt;" width="24">&nbsp;</td>
</tr>
<tr style="height: 12.0pt;">
<td style="width: 44.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.0pt;" width="60">&nbsp;</td>
<td style="width: 266.6pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.0pt;" colspan="8" width="355">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 9.0pt; color: black;"><?php echo $parametres['adresse'] ?>, Téléphone <?php echo $parametres['telephone'] ?> - <?php echo $parametres['telephone_2'] ?></span></p>
</td>

<td style="width: 22.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.0pt;" width="30">&nbsp;</td>
<td style="width: 63.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.0pt;" width="85">&nbsp;</td>
<td style="width: 33.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.0pt;" width="45">&nbsp;</td>
<td style="width: 19.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.0pt;" width="26">&nbsp;</td>
<td style="width: 17.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.0pt;" width="24">&nbsp;</td>
</tr>
<tr style="height: 12.0pt;">
<td style="width: 44.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.0pt;" width="60">&nbsp;</td>
<td style="width: 266.6pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.0pt;" colspan="8" width="355">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 9.0pt; color: black;">Email <?php echo $parametres['email'];?>, Siteweb <?php echo $parametres['siteweb'];?></span></p>
</td>
<td style="width: 22.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.0pt;" width="30">&nbsp;</td>
<td style="width: 63.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.0pt;" width="85">&nbsp;</td>
<td style="width: 33.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.0pt;" width="45">&nbsp;</td>
<td style="width: 19.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.0pt;" width="26">&nbsp;</td>
<td style="width: 17.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.0pt;" width="24">&nbsp;</td>
</tr>
<tr style="height: 9.95pt;">
<td style="width: 44.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.95pt;" width="60">&nbsp;</td>
<td style="width: 41.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.95pt;" width="56">&nbsp;</td>
<td style="width: 113.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.95pt;" width="152">&nbsp;</td>
<td style="width: 19.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.95pt;" width="26">&nbsp;</td>
<td style="width: 17.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.95pt;" width="24">&nbsp;</td>
<td style="width: 7.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.95pt;" width="10">&nbsp;</td>
<td style="width: 23.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.95pt;" width="32">&nbsp;</td>
<td style="width: 41.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.95pt;" width="56">&nbsp;</td>
<td style="width: 42.85pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.95pt;" width="57">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 8.0pt; color: black;"></span></p>
</td>
<td style="width: 22.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.95pt;" width="30">&nbsp;</td>
<td style="width: 63.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.95pt;" width="85">
<p style="margin-bottom: .0001pt; text-indent: 8.0pt; line-height: normal;"><span style="font-size: 8.0pt; font-family: 'Arial','sans-serif'; color: black;"></span></p>
</td>
<td style="width: 33.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.95pt;" width="45">&nbsp;</td>
<td style="width: 19.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.95pt;" width="26">&nbsp;</td>
<td style="width: 17.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.95pt;" width="24">&nbsp;</td>
</tr>
<tr style="height: 9.95pt;">
<td style="width: 344.4pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.95pt;" colspan="9" rowspan="3" width="459">
<p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><strong><span style="font-size: 16.0pt; font-family: 'Arial','sans-serif'; color: black;">FICHE INSCRIPTION PEDAGOGIQUE</span></strong></p>
</td>
<td style="width: 42.85pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.95pt;" width="57">
<!--<p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 8.0pt; color: black;">DOMAINE</span></p>-->
<!--<p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 8.0pt; color: black;">SPECIALITE</span></p>-->
</td>
<td style="width: 22.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.95pt;" width="30">&nbsp;</td>
<td style="width: 117.4pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.95pt;" colspan="4" width="157">
<!--<p style="margin-bottom: .0001pt; text-indent: 0pt; line-height: normal;"><span style="font-size: 8.0pt; font-family: 'Arial','sans-serif'; color: black;"><?php echo $domaine;  ?></span></p>-->
<!--<p style="margin-bottom: .0001pt; text-indent: 0pt; line-height: normal;"><span style="font-size: 8.0pt; font-family: 'Arial','sans-serif'; color: black;"><?php  echo $info['programme'];?></span></p>-->
</td>
</tr>
<tr style="height: 9.95pt;">
<td style="width: 42.85pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.95pt;" width="57">
<!--<p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 8.0pt; color: black;">MENTION</span></p>-->
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 8.0pt; color: black;">SPECIALITE</span></p>
</td>
<td style="width: 22.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.95pt;" width="30">&nbsp;</td>
<td style="width: 135.2pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.95pt;" colspan="4" width="180">
<!--<p style="margin-bottom: .0001pt; text-indent: 0pt; line-height: normal;"><span style="font-size: 8.0pt; font-family: 'Arial','sans-serif'; color: black;"><?php  echo $mension;?></span></p>-->
<p style="margin-bottom: .0001pt; text-indent: 0pt; line-height: normal;"><span style="font-size: 8.0pt; font-family: 'Arial','sans-serif'; color: black;"><?php  echo $info['programme'];?></span></p>
</td>
</tr>
<tr style="height: 9.95pt;">
<td style="width: 42.85pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.95pt;" width="57">
<!--<p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 8.0pt; color: black;">SPECIALITE</span></p>-->
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 8.0pt; color: black;">NIV.</span></p>
</td>
<td style="width: 22.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.95pt;" width="30">&nbsp;</td>
<td style="width: 117.4pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.95pt;" colspan="4" width="157">
<!--<p style="margin-bottom: .0001pt; text-indent: 0pt; line-height: normal;"><span style="font-size: 8.0pt; font-family: 'Arial','sans-serif'; color: black;"><?php echo $option;?></span></p>-->
<p style="margin-bottom: .0001pt; text-indent: 0pt; line-height: normal;"><span style="font-size: 8.0pt; font-family: 'Arial','sans-serif'; color: black;"><?php echo  "L".$niveau ;?></span></p>
</td>
</tr>
<tr style="height: 9.95pt;">
<td style="width: 344.4pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.95pt;" colspan="9" width="459">
<p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 8.0pt; color: black;">ANNEE UNIVERSITAIRE <?php echo($annee."-".($annee +1));?></span></p>
</td>
<td style="width: 65.65pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.95pt;" colspan="2" width="88">
<!--<p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 8.0pt; color: black;">NIV. </span></p>-->
</td>
<td style="width: 63.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.95pt;" width="85">
<!--<p style="margin-bottom: .0001pt; text-indent: 8.0pt; line-height: normal;"><span style="font-size: 8.0pt; font-family: 'Arial','sans-serif'; color: black;"><?php echo  "L".$niveau ;?></span></p>-->
</td>
<td style="width: 33.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.95pt;" width="45">&nbsp;</td>
<td style="width: 19.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.95pt;" width="26">&nbsp;</td>
<td style="width: 17.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.95pt;" width="24">&nbsp;</td>
</tr>
<tr style="height: 9.0pt;">
<td style="width: 33.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.0pt;" width="44">&nbsp;</td>
<td style="width: 44.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.0pt;" width="60">&nbsp;</td>
<td style="width: 41.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.0pt;" width="56">&nbsp;</td>
<td style="width: 113.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.0pt;" width="152">&nbsp;</td>
<td style="width: 19.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.0pt;" width="26">&nbsp;</td>
<td style="width: 17.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.0pt;" width="24">&nbsp;</td>
<td style="width: 7.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.0pt;" width="10">&nbsp;</td>
<td style="width: 23.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.0pt;" width="32">&nbsp;</td>
<td style="width: 41.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.0pt;" width="56">&nbsp;</td>
<td style="width: 42.85pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.0pt;" width="57">&nbsp;</td>
<td style="width: 22.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.0pt;" width="30">&nbsp;</td>
<td style="width: 63.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.0pt;" width="85">&nbsp;</td>
<td style="width: 33.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.0pt;" width="45">&nbsp;</td>
<td style="width: 19.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.0pt;" width="26">&nbsp;</td>
<td style="width: 17.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.0pt;" width="24">&nbsp;</td>
</tr>
<tr style="height: 14.1pt;">
<td style="width: 77.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 14.1pt;" colspan="2" width="104">
<p style="margin-bottom: .0001pt; text-indent: 8.0pt; line-height: normal;"><span style="font-size: 8.0pt; color: black;">Prénom :</span></p>
</td>
<td style="width: 193.2pt; padding: 0cm 3.5pt 0cm 3.5pt;border-bottom: solid #D8D8D8 1.0pt; height: 14.1pt;" colspan="4" width="258">
    <p style="margin-bottom: .0001pt; text-indent: 11.0pt; line-height: normal;font-size: 16.0pt;"><span style="color: black;"><p class="capitalize"><?php echo $info['prenom']; ?></p></span></p>
</td>
<td style="width: 7.8pt; padding: 0cm 3.5pt 0cm 3.5pt;border-bottom: solid #D8D8D8 1.0pt; height: 14.1pt;" width="10">&nbsp;</td>
<td style="width: 65.6pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 14.1pt;" colspan="2" width="87">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 8.0pt; color: black;">N&eacute;[e] le :</span></p>
</td>
<td style="width: 65.65pt; padding: 0cm 3.5pt 0cm 3.5pt;border-bottom: solid #D8D8D8 1.0pt; height: 14.1pt;" colspan="2" width="88">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 10.0pt; color: black;"><?php echo date('d/m/Y',strTotime($info['dateNaissance'])); ?></span></p>
</td>
<td style="width: 63.8pt; padding: 0cm 3.5pt 0cm 3.5pt;border-bottom: solid #D8D8D8 1.0pt; height: 14.1pt;" width="85">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 8.0pt; color: black;">&agrave; :</span></p>
</td>
<td style="width: 53.6pt; padding: 0cm 3.5pt 0cm 3.5pt;border-bottom: solid #D8D8D8 1.0pt; height: 14.1pt;" colspan="2" width="71">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 8.0pt; color: black;"><?php echo  $info['lieuNaissance']; ?></span></p>
</td>
<td style="width: 17.8pt; padding: 0cm 3.5pt 0cm 3.5pt;border-bottom: solid #D8D8D8 1.0pt; height: 14.1pt;" width="24">&nbsp;</td>
</tr>
<tr style="height: 14.1pt;">
<td style="width: 77.8pt; border-top: solid #D8D8D8 1.0pt; border-left: none; border-bottom: solid #D8D8D8 1.0pt; border-right: none; padding: 0cm 3.5pt 0cm 3.5pt; height: 14.1pt;" colspan="2" width="104">
<p style="margin-bottom: .0001pt; text-indent: 8.0pt; line-height: normal;"><span style="font-size: 8.0pt; color: black;">Pr&eacute;nom du P&egrave;re :</span></p>
</td>
<td style="width: 193.2pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 14.1pt;border-bottom: solid #D8D8D8 1.0pt;" colspan="4" width="258">
    <p style="margin-bottom: .0001pt; text-indent: 11.0pt; line-height: normal;font-size: 16.0pt;"><span style="color: black;"><p class="uppercase"><?php echo  $infoE['prenomPere']; ?></p></span></p>
</td>
<td style="width: 7.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 14.1pt;border-bottom: solid #D8D8D8 1.0pt;" width="10">&nbsp;</td>
<td style="width: 65.6pt; border-top: solid #D8D8D8 1.0pt; border-left: none; border-bottom: solid #D8D8D8 1.0pt; border-right: none; padding: 0cm 3.5pt 0cm 3.5pt; height: 14.1pt;" colspan="2" width="87">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 8.0pt; color: black;">Pays :</span></p>
</td>
<td style="width: 65.65pt; border-top: solid #D8D8D8 1.0pt; border-left: none; border-bottom: solid #D8D8D8 1.0pt; border-right: none; padding: 0cm 3.5pt 0cm 3.5pt; height: 14.1pt;" colspan="2" width="88">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 10.0pt; color: black;">Mauritanie</span></p>
</td>
<td style="width: 63.8pt; border-top: solid #D8D8D8 1.0pt; border-left: none; border-bottom: solid #D8D8D8 1.0pt; border-right: none; padding: 0cm 3.5pt 0cm 3.5pt; height: 14.1pt;" width="85">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 8.0pt; color: black;">Date d'Inscript. :</span></p>
</td>
<td style="width: 53.6pt; border-top: solid #D8D8D8 1.0pt; border-left: none; border-bottom: solid #D8D8D8 1.0pt; border-right: none; padding: 0cm 3.5pt 0cm 3.5pt; height: 14.1pt;" colspan="2" width="71">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 8.0pt; color: black;"><?php echo date("d/m/Y", strtotime($info['dateInscription'])); ?></span></p>
</td>
<td style="width: 17.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 14.1pt;" width="24">&nbsp;</td>
</tr>
<style>
p.uppercase {
    text-transform: uppercase;
}

p.lowercase {
    text-transform: lowercase;
}

p.capitalize {
    text-transform: capitalize;
}
.monTexte {
  writing-mode: vertical-rl;
  text-orientation: sideways;
}
</style>
<tr style="height: 14.1pt;">
<td style="width: 77.8pt; border: none; border-bottom: solid #D8D8D8 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 14.1pt;" colspan="2" width="104">
<p style="margin-bottom: .0001pt; text-indent: 8.0pt; line-height: normal;"><span style="font-size: 8.0pt; color: black;">Nom de Famille :</span></p>
</td>
<td style="width: 193.2pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 14.1pt;border-bottom: solid #D8D8D8 1.0pt;" colspan="4" width="258">
    <p style="margin-bottom: .0001pt; text-indent: 11.0pt; line-height: normal;font-size: 10.0pt;"><span style="color: black;"><p class="uppercase"><?php echo $info['nom']; ?></p></span></p>
</td>
<td style="width: 7.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 14.1pt;border-bottom: solid #D8D8D8 1.0pt;" width="10">&nbsp;</td>
<td style="width: 65.6pt; border: none; border-bottom: solid #D8D8D8 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 14.1pt;" colspan="2" width="87">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 8.0pt; color: black;">NNI :</span></p>
</td>
<td style="width: 65.65pt; border: none; border-bottom: solid #D8D8D8 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 14.1pt;" colspan="2" width="88">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 10.0pt; color: black;"><?php echo $infoE['nin']; ?></span></p>
</td>
<td style="width: 63.8pt; border: none; border-bottom: solid #D8D8D8 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 14.1pt;" width="85">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 8.0pt; color: black;">Genre :</span></p>
</td>
<td style="width: 53.6pt; border: none; border-bottom: solid #D8D8D8 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 14.1pt;" colspan="2" width="71">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 8.0pt; color: black;"><?php if($info['genre']=="M"){echo "MASCULIN";}else{echo"FEMININ";}?></span></p>
</td>
<td style="width: 17.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 14.1pt;" width="24">&nbsp;</td>
</tr>
<tr style="height: 14.1pt;">
<td style="width: 77.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 14.1pt;" colspan="2" width="104">
<p style="margin-bottom: .0001pt; text-indent: 8.0pt; line-height: normal;"><span style="font-size: 8.0pt; color: black;">No d'Inscription :</span></p>
</td>
<td style="width: 193.2pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 14.1pt;" colspan="4" width="258">
    <p style="margin-bottom: .0001pt; text-indent: 11.0pt; line-height: normal;"><span style="color: black;"><p class="uppercase"><?php echo  $info['matriculeEtudiant'];?></p></span></p>
</td>
<td style="width: 7.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 14.1pt;" width="10">&nbsp;</td>
<td style="width: 65.6pt; border: none; border-bottom: solid #D8D8D8 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 14.1pt;" colspan="2" width="87">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 8.0pt; color: black;">No Baccalaureat :</span></p>
</td>
<td style="width: 65.65pt; border: none; border-bottom: solid #D8D8D8 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 14.1pt;" colspan="2" width="88">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 10.0pt; color: black;"><?php echo $infoE['num_bac']; ?></span></p>
</td>
<td style="width: 63.8pt; border: none; border-bottom: solid #D8D8D8 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 14.1pt;" width="85">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 8.0pt; color: black;">S&eacute;rie :</span></p>
</td>
<td style="width: 53.6pt; border: none; border-bottom: solid #D8D8D8 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 14.1pt;" colspan="2" width="71">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 8.0pt; color: black;"><?php echo $infoE['infoBac']; ?></span></p>
</td>
<td style="width: 17.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 14.1pt;" width="24">&nbsp;</td>
</tr>
<tr style="height: 14.1pt;">
<td style="width: 271.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 14.1pt;" colspan="6" width="361">&nbsp;</td>
<td style="width: 7.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 14.1pt;" width="10">&nbsp;</td>
<td style="width: 65.6pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 14.1pt;" colspan="2" width="87">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 8.0pt; color: black;">Ann&eacute;e d'obtention :</span></p>
</td>
<td style="width: 65.65pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 14.1pt;" colspan="2" width="88">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 10.0pt; color: black;"><?php echo $infoE['anneeObtention']; ?></span></p>
</td>
<td style="width: 63.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 14.1pt;" width="85">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 8.0pt; color: black;">Pays :</span></p>
</td>
<td style="width: 53.6pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 14.1pt;" colspan="2" width="71">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 8.0pt; color: black;">Mauritanie</span></p>
</td>
<td style="width: 17.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 14.1pt;" width="24">&nbsp;</td>
</tr>
<tr style="height: 14.1pt;">
<td style="width: 33.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 14.1pt;" width="44">&nbsp;</td>
<td style="width: 44.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 14.1pt;" width="60">&nbsp;</td>
<td style="width: 41.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 14.1pt;" width="56">&nbsp;</td>
<td style="width: 113.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 14.1pt;" width="152">&nbsp;</td>
<td style="width: 19.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 14.1pt;" width="26">&nbsp;</td>
<td style="width: 17.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 14.1pt;" width="24">&nbsp;</td>
<td style="width: 7.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 14.1pt;" width="10">&nbsp;</td>
<td style="width: 23.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 14.1pt;" width="32">&nbsp;</td>
<td style="width: 41.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 14.1pt;" width="56">&nbsp;</td>
<td style="width: 42.85pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 14.1pt;" width="57">&nbsp;</td>
<td style="width: 22.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 14.1pt;" width="30">&nbsp;</td>
<td style="width: 63.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 14.1pt;" width="85">&nbsp;</td>
<td style="width: 33.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 14.1pt;" width="45">&nbsp;</td>
<td style="width: 19.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 14.1pt;" width="26">&nbsp;</td>
<td style="width: 17.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 14.1pt;" width="24">&nbsp;</td>
</tr>
<tr style="height: 20.1pt;">
   
 <td style="width: 271.0pt; border: solid #E46D0A 1.0pt; background: #FDE9D9; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" colspan="6" width="361">
<p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><strong><span style="font-size: 12.0pt; color: black;">Semestres Impaires</span></strong><strong><span style="font-size: 10.0pt; color: black;">&nbsp;&nbsp; </span></strong><span style="font-size: 12.0pt; font-family: 'Sultan Medium'; color: black;"></span></p>
</td>
<td style="width: 7.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" width="10">&nbsp;</td>
<td style="width: 266.45pt; border: solid #E46D0A 1.0pt; background: #FDE9D9; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" colspan="8" width="355">
<p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><strong><span style="font-size: 12.0pt; color: black;">Semestres Paires</span></strong><strong><span style="font-size: 10.0pt; color: black;">&nbsp;&nbsp; </span></strong><span style="font-size: 12.0pt; font-family: 'Sultan Medium'; color: black;"></span></p>
</td>
</tr>

<tr>
    <td  VALIGN="top" colspan="6">
        <table style="border-collapse: collapse; border: none;">
<tbody>
<tr style="height: 38.6pt;">
<td style="width: 27.35pt; border: solid #E36C09 1.0pt; background: #FCE9D9; padding: 0cm 0cm 0cm 0cm; height: 38.6pt;" width="36">
<p style="margin-top: .4pt;"><span style="font-size: 0pt; font-family: 'Calibri','sans-serif';">&nbsp;</span></p>
<p class="monTexte" style="margin: .05pt 0cm .0001pt 8.35pt;"><span style="font-size: 7.0pt;">CHOIX</span></p>
</td>
<td style="width: 47.55pt; border: solid #E36C09 1.0pt; border-left: none; background: #FCE9D9; padding: 0cm 0cm 0cm 0cm; height: 38.6pt;" width="63">
<p style="margin-top: .15pt;"><span style="font-size: 0pt; font-family: 'Calibri','sans-serif';">&nbsp;</span></p>
<p class="monTexte" style="text-align: center; text-indent: -.05pt; line-height: 112%; margin: .05pt 4.3pt .0001pt 4.4pt;"><span style="font-size: 7.0pt; line-height: 112%;">CODE MODULE (UE)</span></p>
</td>
<td style="width: 173.15pt; border: solid #E36C09 1.0pt; border-left: none; background: #FCE9D9; padding: 0cm 0cm 0cm 0cm; height: 38.6pt;" colspan="2" width="231">
<p><span style="font-size: 0pt; font-family: 'Calibri','sans-serif';">&nbsp;</span></p>
<p style="margin: 5.0pt 0cm .0001pt 8.95pt;"><span style="font-size: 7.0pt;">[Code El&eacute;ment] [Titre] El&eacute;ment de Module (EC)</span></p>
</td>
<td style="width: 23.4pt; border: solid #E36C09 1.0pt; border-left: none; background: #FCE9D9; padding: 0cm 0cm 0cm 0cm; height: 38.6pt;" width="31">
<p class="monTexte" style="margin: 4pt 0cm .0001pt 9.8pt;"><span style="font-size: 7.0pt;">Crédits</span></p>
</td>
<td style="width: 23.4pt; border: solid #E36C09 1.0pt; border-left: none; background: #FCE9D9; padding: 0cm 0cm 0cm 0cm; height: 38.6pt;" width="31">
<p class="monTexte" style="margin: 4pt 0cm .0001pt 9.8pt;"><span style="font-size: 7.0pt;">SEMESTRE</span></p>
</td>
</tr>
 <?php 
                         
                         for ($i = 0; $i < count($moduleR_impairelist); ++$i) { ?>
                            <tr style="height: 18.35pt;">
                                <td style="width: 27.35pt; border: solid #E36C09 1.0pt; border-top: none; padding: 0cm 0cm 0cm 0cm; height: 18.35pt;" width="36">
                                    <p style="text-align: center; margin: 2.8pt 0cm .0001pt 1.8pt;"><span style="font-size: 12.0pt; font-family: 'Wingdings 2';"><input type="checkbox"  name="imp[<?=$modules_a_etudies_impairelist[$i]->sigle?>]" onclick="sommes_Credits_imp(this.checked,'<?=$modules_a_etudies_impairelist[$i]->ects?>')" checked  ></span></p>
</td>
<td style="width: 47.55pt; border-top: none; border-left: none; border-bottom: solid #E36C09 1.0pt; border-right: solid #E36C09 1.0pt; padding: 0cm 0cm 0cm 0cm; height: 18.35pt;" width="63">
<p style="text-align: right; margin: 5.05pt 8.1pt .0001pt 0cm;"><span style="font-size: 7.0pt;"><?php echo $moduleR_impairelist[$i]->idModule; ?></span></p>
</td>
<td style="width: 52.3pt; border-top: none; border-left: none; border-bottom: solid #E36C09 1.0pt; border-right: solid #E36C09 1.0pt; padding: 0cm 0cm 0cm 0cm; height: 18.35pt;" width="70">
<p style="margin: 5.05pt 0cm .0001pt 1.4pt;"><span style="font-size: 7.0pt;"><?php echo $moduleR_impairelist[$i]->sigle; ?></span></p>
</td>
<td style="width: 120.85pt; border-top: none; border-left: none; border-bottom: solid #E36C09 1.0pt; border-right: solid #E36C09 1.0pt; padding: 0cm 0cm 0cm 0cm; height: 18.35pt;" width="161">
<p style="margin: 5.05pt 0cm .0001pt 9.0pt;"><span style="font-size: 7.0pt;"><?php echo $moduleR_impairelist[$i]->titre; ?></span></p>
</td>
<td style="width: 23.4pt; border-top: none; border-left: none; border-bottom: solid #E36C09 1.0pt; border-right: solid #E36C09 1.0pt; padding: 0cm 0cm 0cm 0cm; height: 18.35pt;" width="31">
<p style="margin-top: .25pt;"><span style="font-size: 6.0pt; font-family: 'Calibri','sans-serif';">&nbsp;</span></p>
<p style="margin-right: 7.95pt; text-align: right; line-height: 9.75pt;"><span style="font-size: 8.0pt; font-family: 'Calibri','sans-serif';"><?php echo $moduleR_impairelist[$i]->ects; ?></span></p>
</td>
<td style="width: 23.4pt; border-top: none; border-left: none; border-bottom: solid #E36C09 1.0pt; border-right: solid #E36C09 1.0pt; padding: 0cm 0cm 0cm 0cm; height: 18.35pt;" width="31">
<p style="margin-top: .25pt;"><span style="font-size: 6.0pt; font-family: 'Calibri','sans-serif';">&nbsp;</span></p>
<p style="margin-right: 7.95pt; text-align: right; line-height: 9.75pt;"><span style="font-size: 8.0pt; font-family: 'Calibri','sans-serif';"><?php echo $moduleR_impairelist[$i]->semestre; ?></span></p>
</td>


                                  
        
                                <?php   //echo '<td>'.($s-2).'</td>' ;?>
                              </tr>
                              <?php } ?>
                  
                           <?php
                          if($redoublant!=null){
                                  
                            }  else {
                                  
                           for ($i = 0; $i < count($modules_a_etudies_impairelist); ++$i) { ?>
                              <tr>
                                <?php
                                     if(($moduleR_impairelist !=null) ){
                                  echo '<td style="width: 27.35pt; border: solid #E36C09 1.0pt; border-top: none; padding: 0cm 0cm 0cm 0cm; height: 18.35pt;" width="36">
<p style="text-align: center; margin: 2.8pt 0cm .0001pt 1.8pt;"><span style="font-size: 12.0pt; font-family: "Wingdings 2";"><input type="checkbox"  name="imp['.$modules_a_etudies_impairelist[$i]->sigle.']" onclick="sommes_Credits_imp(this.checked,'.$modules_a_etudies_impairelist[$i]->ects.')" ></span></p>
</td>' ;
                               }else{
                                   
                                     echo '<td style="width: 27.35pt; border: solid #E36C09 1.0pt; border-top: none; padding: 0cm 0cm 0cm 0cm; height: 18.35pt;" width="36">
<p style="text-align: center; margin: 2.8pt 0cm .0001pt 1.8pt;"><span style="font-size: 12.0pt; font-family: "Wingdings 2";"><input type="checkbox"  name="imp['.$modules_a_etudies_impairelist[$i]->sigle.']" onclick="sommes_Credits_imp(this.checked,'.$modules_a_etudies_impairelist[$i]->ects.')" checked  ></span></p>
</td>' ;
                                   
                               }//MAB
                             ?>
  
<td style="width: 47.55pt; border-top: none; border-left: none; border-bottom: solid #E36C09 1.0pt; border-right: solid #E36C09 1.0pt; padding: 0cm 0cm 0cm 0cm; height: 18.35pt;" width="63">
<p style="text-align: right; margin: 5.05pt 8.1pt .0001pt 0cm;"><span style="font-size: 7.0pt;"><?php echo $modules_a_etudies_impairelist[$i]->idModule; ?></span></p>
</td>
<td style="width: 52.3pt; border-top: none; border-left: none; border-bottom: solid #E36C09 1.0pt; border-right: solid #E36C09 1.0pt; padding: 0cm 0cm 0cm 0cm; height: 18.35pt;" width="70">
<p style="margin: 5.05pt 0cm .0001pt 1.4pt;"><span style="font-size: 7.0pt;"><?php echo $modules_a_etudies_impairelist[$i]->sigle; ?></span></p>
</td>
<td style="width: 120.85pt; border-top: none; border-left: none; border-bottom: solid #E36C09 1.0pt; border-right: solid #E36C09 1.0pt; padding: 0cm 0cm 0cm 0cm; height: 18.35pt;" width="161">
<p style="margin: 5.05pt 0cm .0001pt 9.0pt;"><span style="font-size: 7.0pt;"><?php echo $modules_a_etudies_impairelist[$i]->titre; ?></span></p>
</td>
<td style="width: 23.4pt; border-top: none; border-left: none; border-bottom: solid #E36C09 1.0pt; border-right: solid #E36C09 1.0pt; padding: 0cm 0cm 0cm 0cm; height: 18.35pt;" width="31">
<p style="margin-top: .25pt;"><span style="font-size: 6.0pt; font-family: 'Calibri','sans-serif';">&nbsp;</span></p>
<p style="margin-right: 7.95pt; text-align: right; line-height: 9.75pt;"><span style="font-size: 8.0pt; font-family: 'Calibri','sans-serif';"><?php echo $modules_a_etudies_impairelist[$i]->ects; ?></span></p>
</td>
<td style="width: 23.4pt; border-top: none; border-left: none; border-bottom: solid #E36C09 1.0pt; border-right: solid #E36C09 1.0pt; padding: 0cm 0cm 0cm 0cm; height: 18.35pt;" width="31">
<p style="margin-top: .25pt;"><span style="font-size: 6.0pt; font-family: 'Calibri','sans-serif';">&nbsp;</span></p>
<p style="margin-right: 7.95pt; text-align: right; line-height: 9.75pt;"><span style="font-size: 8.0pt; font-family: 'Calibri','sans-serif';"><?php echo $s; ?></span></p>
</td>
                              </tr>
                              
                            <?php }}?>
                              <?php
                           
                          
                       ?>   






<tr style="height: 15.4pt;">
<td style="width: 248.05pt; border: none; border-right: solid #E36C09 1.0pt; padding: 0cm 0cm 0cm 0cm; height: 15.4pt;" colspan="4" width="331">
<p style="line-height: 12.55pt; margin: 0pt 0cm .0001pt 140pt;"><span style="font-family: 'Calibri','sans-serif';">TOTAL Crédits</span></p>
</td>
<td colspan="2" style="width: 23.4pt; border-top: none; border-left: none; border-bottom: solid #E36C09 1.0pt; border-right: solid #E36C09 1.0pt; padding: 0cm 0cm 0cm 0cm; height: 15.4pt;" width="31">
                    <p style="text-align: right; line-height: 9.7pt; margin: 4.7pt 7.95pt .0001pt 0cm;text-align: center"><span style="font-size: 8.0pt; font-family: 'Calibri','sans-serif';"><?php $ects=0; for($i=0;$i<count($modules_a_etudies_impairelist);$i++){       $ects+= $modules_a_etudies_impairelist[$i]->ects;       }echo"<script>sommeCreditsImp=".$ects.";</script>"; ?><span id="sommeCreditsImp"><script>document.write(sommeCreditsImp);</script></span></span></p>
</td>
</tr>
</tbody>
</table>
        
    </td>
<!-- -->

<td style="width: 7.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 24.75pt;" width="10">&nbsp;</td>
        <td  valign="top" colspan="8"><table>
                      <table style="border-collapse: collapse; border: none;">
<tbody>
<tr style="height: 38.6pt;">
<td style="width: 27.35pt; border: solid #E36C09 1.0pt; background: #FCE9D9; padding: 0cm 0cm 0cm 0cm; height: 38.6pt;" width="36">
<p style="margin-top: .4pt;"><span style="font-size: 0pt; font-family: 'Calibri','sans-serif';">&nbsp;</span></p>
<p class="monTexte" style="margin: .05pt 0cm .0001pt 8.35pt;"><span style="font-size: 7.0pt;">CHOIX</span></p>
</td>
<td style="width: 47.55pt; border: solid #E36C09 1.0pt; border-left: none; background: #FCE9D9; padding: 0cm 0cm 0cm 0cm; height: 38.6pt;" width="63">
<p style="margin-top: .15pt;"><span style="font-size: 0pt; font-family: 'Calibri','sans-serif';">&nbsp;</span></p>
<p class="monTexte" style="text-align: center; text-indent: -.05pt; line-height: 112%; margin: .05pt 4.3pt .0001pt 4.4pt;"><span style="font-size: 7.0pt; line-height: 112%;">CODE MODULE (UE)</span></p>
</td>
<td style="width: 173.15pt; border: solid #E36C09 1.0pt; border-left: none; background: #FCE9D9; padding: 0cm 0cm 0cm 0cm; height: 38.6pt;" colspan="2" width="231">
<p><span style="font-size: 0pt; font-family: 'Calibri','sans-serif';">&nbsp;</span></p>
<p style="margin: 5.0pt 0cm .0001pt 8.95pt;"><span style="font-size: 7.0pt;">[Code El&eacute;ment] [Titre] El&eacute;ment de Module (EC)</span></p>
</td>
<td style="width: 23.4pt; border: solid #E36C09 1.0pt; border-left: none; background: #FCE9D9; padding: 0cm 0cm 0cm 0cm; height: 38.6pt;" width="31">
<p class="monTexte" style="margin: 4pt 0cm .0001pt 9.8pt;"><span style="font-size: 7.0pt;">Crédits</span></p>
</td>
<td style="width: 23.4pt; border: solid #E36C09 1.0pt; border-left: none; background: #FCE9D9; padding: 0cm 0cm 0cm 0cm; height: 38.6pt;" width="31">
<p class="monTexte" style="margin: 4pt 0cm .0001pt 9.8pt;"><span style="font-size: 7.0pt;">SEMESTRE</span></p>
</td>
</tr>
<?php for ($i = 0; $i < count($moduleR_pairelist); ++$i) { ?>
                              <tr style="height: 18.35pt;">
<td style="width: 27.35pt; border: solid #E36C09 1.0pt; border-top: none; padding: 0cm 0cm 0cm 0cm; height: 18.35pt;" width="36">
    <p style="text-align: center; margin: 2.8pt 0cm .0001pt 1.8pt;"><span style="font-size: 12.0pt; font-family: 'Wingdings 2';"><input type="checkbox" name="paire[<?=$modules_a_etudies_pairelist[$i]->sigle?>]" onclick="sommes_Credits_paire(this.checked,'<?=$modules_a_etudies_pairelist[$i]->ects?>')" checked  ></span></p>
</td>
<td style="width: 47.55pt; border-top: none; border-left: none; border-bottom: solid #E36C09 1.0pt; border-right: solid #E36C09 1.0pt; padding: 0cm 0cm 0cm 0cm; height: 18.35pt;" width="63">
<p style="text-align: right; margin: 5.05pt 8.1pt .0001pt 0cm;"><span style="font-size: 7.0pt;"><?php echo $moduleR_pairelist[$i]->idModule; ?></span></p>
</td>
<td style="width: 52.3pt; border-top: none; border-left: none; border-bottom: solid #E36C09 1.0pt; border-right: solid #E36C09 1.0pt; padding: 0cm 0cm 0cm 0cm; height: 18.35pt;" width="70">
<p style="margin: 5.05pt 0cm .0001pt 1.4pt;"><span style="font-size: 7.0pt;"><?php echo $moduleR_pairelist[$i]->sigle ; ?></span></p>
</td>
<td style="width: 120.85pt; border-top: none; border-left: none; border-bottom: solid #E36C09 1.0pt; border-right: solid #E36C09 1.0pt; padding: 0cm 0cm 0cm 0cm; height: 18.35pt;" width="161">
<p style="margin: 5.05pt 0cm .0001pt 9.0pt;"><span style="font-size: 7.0pt;"><?php echo $moduleR_pairelist[$i]->titre; ?></span></p>
</td>
<td style="width: 23.4pt; border-top: none; border-left: none; border-bottom: solid #E36C09 1.0pt; border-right: solid #E36C09 1.0pt; padding: 0cm 0cm 0cm 0cm; height: 18.35pt;" width="31">
<p style="margin-top: .25pt;"><span style="font-size: 6.0pt; font-family: 'Calibri','sans-serif';">&nbsp;</span></p>
<p style="margin-right: 7.95pt; text-align: right; line-height: 9.75pt;"><span style="font-size: 8.0pt; font-family: 'Calibri','sans-serif';"><?php echo $moduleR_pairelist[$i]->ects; ?></span></p>
</td>
<td style="width: 23.4pt; border-top: none; border-left: none; border-bottom: solid #E36C09 1.0pt; border-right: solid #E36C09 1.0pt; padding: 0cm 0cm 0cm 0cm; height: 18.35pt;" width="31">
<p style="margin-top: .25pt;"><span style="font-size: 6.0pt; font-family: 'Calibri','sans-serif';">&nbsp;</span></p>
<p style="margin-right: 7.95pt; text-align: right; line-height: 9.75pt;"><span style="font-size: 8.0pt; font-family: 'Calibri','sans-serif';"><?php echo $moduleR_pairelist[$i]->semestre; ?></span></p>
</td>
                                  
        
                                <?php  // echo '<td>'.(($s+1)-2).'</td>' ;?>
                              </tr>
                         <?php } ?>
                              <?php  if($redoublant!=null){
                                  
                            }  else {
                             //   print_r($modules_a_etudies_pairelist);
                              
                               for ($i = 0; $i < count($modules_a_etudies_pairelist); ++$i) { 
                             echo'<tr>';
                                
                                     if(($moduleR_pairelist !=null)){
                                   echo '<td style="width: 27.35pt; border: solid #E36C09 1.0pt; border-top: none; padding: 0cm 0cm 0cm 0cm; height: 18.35pt;" width="36">
<p style="text-align: center; margin: 2.8pt 0cm .0001pt 1.8pt;"><span style="font-size: 12.0pt; font-family: "Wingdings 2";"><input type="checkbox" name="paire['.$modules_a_etudies_pairelist[$i]->sigle.']"  onclick="sommes_Credits_paire(this.checked,'.$modules_a_etudies_pairelist[$i]->ects.')" ></span></p>
</td>' ;
                               }else{
                                   
                                     echo '<td style="width: 27.35pt; border: solid #E36C09 1.0pt; border-top: none; padding: 0cm 0cm 0cm 0cm; height: 18.35pt;" width="36">
<p style="text-align: center; margin: 2.8pt 0cm .0001pt 1.8pt;"><span style="font-size: 12.0pt; font-family: "Wingdings 2";"><input type="checkbox"  name="paire['.$modules_a_etudies_pairelist[$i]->sigle.']" onclick="sommes_Credits_paire(this.checked,'.$modules_a_etudies_pairelist[$i]->ects.')" checked  ></span></p>
</td>' ;
                               }
                              ?>
                                   
<td style="width: 47.55pt; border-top: none; border-left: none; border-bottom: solid #E36C09 1.0pt; border-right: solid #E36C09 1.0pt; padding: 0cm 0cm 0cm 0cm; height: 18.35pt;" width="63">
<p style="text-align: right; margin: 5.05pt 8.1pt .0001pt 0cm;"><span style="font-size: 7.0pt;"><?php echo $modules_a_etudies_pairelist[$i]->idModule; ?></span></p>
</td>
<td style="width: 52.3pt; border-top: none; border-left: none; border-bottom: solid #E36C09 1.0pt; border-right: solid #E36C09 1.0pt; padding: 0cm 0cm 0cm 0cm; height: 18.35pt;" width="70">
<p style="margin: 5.05pt 0cm .0001pt 1.4pt;"><span style="font-size: 7.0pt;"><?php echo $modules_a_etudies_pairelist[$i]->sigle; ?></span></p>
</td>
<td style="width: 120.85pt; border-top: none; border-left: none; border-bottom: solid #E36C09 1.0pt; border-right: solid #E36C09 1.0pt; padding: 0cm 0cm 0cm 0cm; height: 18.35pt;" width="161">
<p style="margin: 5.05pt 0cm .0001pt 9.0pt;"><span style="font-size: 7.0pt;"><?php echo $modules_a_etudies_pairelist[$i]->titre; ?></span></p>
</td>
<td style="width: 23.4pt; border-top: none; border-left: none; border-bottom: solid #E36C09 1.0pt; border-right: solid #E36C09 1.0pt; padding: 0cm 0cm 0cm 0cm; height: 18.35pt;" width="31">
<p style="margin-top: .25pt;"><span style="font-size: 6.0pt; font-family: 'Calibri','sans-serif';">&nbsp;</span></p>
<p style="margin-right: 7.95pt; text-align: right; line-height: 9.75pt;"><span style="font-size: 8.0pt; font-family: 'Calibri','sans-serif';"><?php echo $modules_a_etudies_pairelist[$i]->ects; ?></span></p>
</td>
<td style="width: 23.4pt; border-top: none; border-left: none; border-bottom: solid #E36C09 1.0pt; border-right: solid #E36C09 1.0pt; padding: 0cm 0cm 0cm 0cm; height: 18.35pt;" width="31">
<p style="margin-top: .25pt;"><span style="font-size: 6.0pt; font-family: 'Calibri','sans-serif';">&nbsp;</span></p>
<p style="margin-right: 7.95pt; text-align: right; line-height: 9.75pt;"><span style="font-size: 8.0pt; font-family: 'Calibri','sans-serif';"><?php echo $s+1; ?></span></p>
</td>
                              </tr>
                         <?php }}?>
                              <?php
                          
                       ?>   






</tr>
<tr style="height: 15.4pt;">
<td style="width: 248.05pt; border: none; border-right: solid #E36C09 1.0pt; padding: 0cm 0cm 0cm 0cm; height: 15.4pt;" colspan="4" width="331">
<p style="line-height: 12.55pt; margin: 1.85pt 0cm .0001pt 161.15pt;"><span style="font-family: 'Calibri','sans-serif';">TOTAL Crédits</span></p>
</td>
<td colspan="2" style="width: 23.4pt; border-top: none; border-left: none; border-bottom: solid #E36C09 1.0pt; border-right: solid #E36C09 1.0pt; padding: 0cm 0cm 0cm 0cm; height: 15.4pt;" width="31">
<p style="text-align: right; line-height: 9.7pt; margin: 4.7pt 7.95pt .0001pt 0cm;text-align: center"><span style="font-size: 8.0pt; font-family: 'Calibri','sans-serif';"><?php $ects=0; for($i=0;$i<count($modules_a_etudies_pairelist);$i++){       $ects+= $modules_a_etudies_pairelist[$i]->ects;       }echo"<script>sommeCreditsPaire=".$ects.";</script>"; ?><span id="sommeCreditsPaire"><script>document.write(sommeCreditsPaire);</script></span></span></p>
</td>
</tr>
</tbody>
</table>
               </td>
<!--

-->
</tr>


<tr style="height: 6.75pt;">
<td style="width: 33.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.75pt;" width="44">&nbsp;</td>
<td style="width: 44.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.75pt;" width="60">&nbsp;</td>
<td style="width: 41.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.75pt;" width="56">&nbsp;</td>
<td style="width: 113.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.75pt;" width="152">&nbsp;</td>
<td style="width: 19.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.75pt;" width="26">&nbsp;</td>
<td style="width: 17.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.75pt;" width="24">&nbsp;</td>
<td style="width: 7.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.75pt;" width="10">&nbsp;</td>
<td style="width: 23.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.75pt;" width="32">&nbsp;</td>
<td style="width: 41.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.75pt;" width="56">&nbsp;</td>
<td style="width: 42.85pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.75pt;" width="57">&nbsp;</td>
<td style="width: 22.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.75pt;" width="30">&nbsp;</td>
<td style="width: 63.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.75pt;" width="85">&nbsp;</td>
<td style="width: 33.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.75pt;" width="45">&nbsp;</td>
<td style="width: 19.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.75pt;" width="26">&nbsp;</td>
<td style="width: 17.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.75pt;" width="24">&nbsp;</td>
</tr>
<tr style="height: 15.0pt;">
<td style="width: 33.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" width="44">&nbsp;</td>
<td style="width: 44.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" width="60">&nbsp;</td>
<td style="width: 41.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" width="56">&nbsp;</td>
<td style="width: 113.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" width="152">&nbsp;</td>
<td style="width: 19.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" width="26">&nbsp;</td>
<td style="width: 17.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" width="24">&nbsp;</td>
<td style="width: 7.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" width="10">&nbsp;</td>
<td style="width: 23.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" width="32">&nbsp;</td>
<td style="width: 41.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" width="56">&nbsp;</td>
<td style="width: 42.85pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" width="57">&nbsp;</td>
<td style="width: 22.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" width="30">&nbsp;</td>
<td style="width: 63.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" width="85">&nbsp;</td>
<td style="width: 33.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" width="45">&nbsp;</td>
<td style="width: 19.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" width="26">&nbsp;</td>
<td style="width: 17.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" width="24">&nbsp;</td>
</tr>
<tr style="height: 15.0pt;">
<td style="width: 33.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" width="44">&nbsp;</td>
<td style="width: 86.6pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" colspan="1" width="115">
<!--<p style="margin-bottom: .0001pt; line-height: normal;"><strong><span style="font-size:6.0pt; color: black;">Date et Signature de l'Etudiant</span></strong></p>-->
</td>
<td colspan="5" style="width: 113.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" width="152">
<p  style="margin-bottom: .0001pt; text-indent: 0pt; line-height: normal;"><strong><span style="font-size: 6.0pt; color: black;text-align: right">Visa Scolarit&eacute;</span></strong></p>
</td>

<td style="width: 129.45pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" colspan="6" width="173">
<p style="margin-bottom: .0001pt; line-height: normal;text-align: right"><strong><span style="font-size: 6.0pt; color: black;">Date et Signature  du directeur de l'institut</span></strong></p>
</td>

<td style="width: 33.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" width="44">&nbsp;</td>
</tr>
<tr style="height: 15.0pt;">
<td style="width: 33.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" width="44">&nbsp;</td>
<td style="width: 86.6pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" colspan="2" width="115">
    <p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 8.0pt; color: black;">  <?php //echo date('d/m/Y');?></span></p>
</td>
<td style="width: 151.4pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" colspan="3" width="202">
<p style="margin-bottom: .0001pt; text-indent: 0pt; line-height: normal;"><span style="font-size: 8.0pt; color: black;"></span></p>
</td>
<td style="width: 7.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" width="10">&nbsp;</td>
<td style="width: 23.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" width="32">&nbsp;</td>
<td style="width: 41.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" width="56">&nbsp;</td>
<td style="width: 129.45pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" colspan="3" width="173">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 8.0pt; color: black;"></span></p>
</td>
<td style="width: 33.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" width="45">&nbsp;</td>
<td style="width: 19.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" width="26">&nbsp;</td>
<td style="width: 17.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" width="24">&nbsp;</td>
</tr>
<tr style="height: 15.0pt;">
<td style="width: 33.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" width="44">&nbsp;</td>
<td style="width: 44.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" width="60">&nbsp;</td>
<td style="width: 41.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" width="56">&nbsp;</td>
<td style="width: 151.4pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" colspan="3" width="202">
<p style="margin-bottom: .0001pt; text-indent: 0pt; line-height: normal;"><span style="font-size: 8.0pt; color: black;"></span></p>
</td>
<td style="width: 7.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" width="10">&nbsp;</td>
<td style="width: 23.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" width="32">&nbsp;</td>
<td style="width: 41.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" width="56">&nbsp;</td>
<td style="width: 65.65pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" colspan="2" width="88">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 8.0pt; color: black;"></span></p>
</td>
<td style="width: 63.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" width="85">&nbsp;</td>
<td style="width: 33.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" width="45">&nbsp;</td>
<td style="width: 19.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" width="26">&nbsp;</td>
<td style="width: 17.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" width="24">&nbsp;</td>

</tbody>
</table>
        </div>
<input type="submit" class="btn btn-success" value="enregistrer">
<?php echo form_close('</div>')?>
        </div> <!-- end of right content-->
</div>   <!--end of center content -->               
<div class="clear"></div>
</div> <!--end of main content-->


<?php include(APPPATH.'views/include/footer.php'); ?>
<script type="text/javascript">
function imprimer(id){
str=document.getElementById(id).innerHTML
newwin=window.open('','printwin','left=100,top=100,width=400,height=400')
newwin.document.write('<HTML>\n <HEAD>\n')
// Hafedh
// Supression de l'entete lors de l'impression
newwin.document.write('<style>@page { size: auto;  margin: 4mm; }</style>\n')
newwin.document.write('<style>body {-webkit-print-color-adjust: exact;}  </style>\n')


//newwin.document.write('<link rel="stylesheet" href="<?php echo base_url();?>css/printable.css" />\n');
newwin.document.write('<TITLE></TITLE>\n')
newwin.document.write('<script>\n')
newwin.document.write('function chkstate(){\n')
newwin.document.write('if(document.readyState=="complete"){\n')
newwin.document.write('window.close()\n')
newwin.document.write('}\n')
newwin.document.write('else{\n')
newwin.document.write('setTimeout("chkstate()",2000)\n')
newwin.document.write('}\n')
newwin.document.write('}\n')
newwin.document.write('function print_win(){\n')
newwin.document.write('window.print();\n')
newwin.document.write('chkstate();\n')
newwin.document.write('}\n')
newwin.document.write('<\/script>\n')
newwin.document.write('</HEAD>\n')
newwin.document.write('<BODY onload="print_win()">\n')
newwin.document.write('<br>' + str)
newwin.document.write('</BODY>\n')
newwin.document.write('</HTML>\n')
newwin.document.close()
}

function sommes_Credits_imp(status,value){
//alert(status);
//alert(value);
if(status==true) sommeCreditsImp+=value;
else
sommeCreditsImp-=value;
document.getElementById('sommeCreditsImp').innerHTML="<span>"+sommeCreditsImp+"</span>";
//document.write(sommeCreditsImp);
}

function sommes_Credits_paire(status,value){
//alert(status);
//alert(value);
if(status==true) sommeCreditsPaire+=value;
else
sommeCreditsPaire-=value;
document.getElementById('sommeCreditsPaire').innerHTML="<span>"+sommeCreditsPaire+"</span>";
//document.write(sommeCreditsImp);
}

</script>