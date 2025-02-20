<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
   <div class="center_content">


 <button  onClick="imprimer('printable');" style="float:right; height: 30px; background-color:#cceac4; width: 160px; margin-right:185px; margin-top:50px;"><b> Imprimer la liste </b></button>
 <div class="form-group">
            <div class="row colbox">
          
        
 
 <div class="container">
    <div class="col-xs-12 hl-left">
           
           
     <div id="printable">
         <style>     
#parallelogram {
	width: 800px;
	height: 80px;
	-webkit-transform: skew(160deg);
	   -moz-transform: skew(20deg);
	     -o-transform: skew(20deg);
	  background: #c5d9f1;
          border: 1px;
          border-color: gray;
        }
         #parallelogram1 {
	width: 80px;
	height: 80px;
        border: 1px;
	-webkit-transform: skew(160deg);
	   -moz-transform: skew(20deg);
	     -o-transform: skew(20deg);
	background: #c5d9f1;
        }</style>
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

 <table style="width: 569.1pt; border-collapse: collapse; margin-left: 4.8pt; margin-right: 4.8pt;" width="759">
<tbody>
<tr style="height: 15.0pt;">
<td style="width: 72.5pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" width="97">
<table>
<tbody>
<tr style="height: 15.0pt;">
<td style="width: 35.0pt; padding: 0cm 0cm 0cm 0cm; height: 15.0pt;" width="47"></td>
</tr>
</tbody>
</table>
</td>
<td style="width: 51.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" width="69">&nbsp;</td>
<td style="width: 35.6pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" width="47">&nbsp;</td>
<td style="width: 20.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" width="28">&nbsp;</td>
<td style="width: 59.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" width="80">&nbsp;</td>
<td style="width: 190.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" width="254">&nbsp;</td>
<td style="width: 33.2pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" width="44">&nbsp;</td>
<td style="width: 25.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" width="34">&nbsp;</td>
<td style="width: 50.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" width="67">
<table>
<tbody>
<tr style="height: 15.0pt;">
<td style="width: 43.0pt; padding: 0cm 0cm 0cm 0cm; height: 15.0pt;" width="57">&nbsp;</td>
</tr>
</tbody>
</table>
</td>
<td style="width: 28.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" width="38"></td>
</tr>
<tr style="height: 28.5pt;">
<td style="width: 72.5pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 28.5pt;" width="97"><img src="../../images/logo_iup_abra.png" height="70" width="90" ></td>
<td style="width: 51.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 28.5pt;" width="69">&nbsp;</td>
<td style="width: 307.0pt; border-top: solid #F79646 1.0pt; border-left: solid #F79646 1.0pt; border-bottom: none; border-right: none; background: #FDE9D9; padding: 0cm 3.5pt 0cm 3.5pt; height: 28.5pt;" colspan="4" width="409">
<p style="margin-bottom: .0001pt; text-indent: 22.0pt; line-height: normal;"><span style="font-size: 22.0pt; color: black;">Liste d'Emargement</span></p>
</td>

<td style="width: 800.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 28.5pt;" colspan="4"  width="200">
    <table>
        <tr style="height: 20.1pt;">

            

<td style="width: 109.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;"  width="145">
<p style="margin-bottom: .0001pt; line-height: normal;"><strong><span style="font-size: 8.0pt; color: black;">Heure Examen :  <?php if(!empty($planning)){  echo $planning[0]["heurD"]."h : 00";}?></span></strong></p>
</td>
<td style="width: 28.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" width="38">&nbsp;</td>
</tr>
<tr style="height: 20.1pt;">

<td style="width: 137.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;"  width="184">
<p style="margin-bottom: .0001pt; line-height: normal;"><strong><span style="font-size: 8.0pt; color: black;">Date Examen : <?php if(!empty($planning)){ echo $planning[0]["date"];}?></span></strong></p>
</td>
</tr></table></td>
</tr>
<tr style="height: 15.0pt;">
<td style="width: 72.5pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" width="97">&nbsp;</td>
<td style="width: 51.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" width="69">&nbsp;</td>
<td style="width: 307.0pt; border: none; border-left: solid #F79646 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" colspan="4" width="409">
<p style="margin-bottom: .0001pt; text-indent: 8.0pt; line-height: normal;"><span style="font-size: 8.0pt; color: black;">Ann&eacute;e Universitaire : 2018-2019</span></p>
</td>
<td style="width: 33.2pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" width="44">&nbsp;</td>
<td style="width: 25.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" width="34">&nbsp;</td>
<td style="width: 50.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" width="67">&nbsp;</td>
<td style="width: 28.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" width="38">&nbsp;</td>
</tr>
<tr style="height: 11.25pt;">
<td style="width: 569.1pt; border: none; border-bottom: solid windowtext 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 11.25pt;" colspan="10" width="759">
<p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 9.0pt; color: black;">&nbsp;</span></p>
</td>
</tr>
<tr style="height: 15.0pt;">
<td style="width: 124.3pt; border: solid windowtext 1.0pt; border-top: none; background: #F2F2F2; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" colspan="2" rowspan="3" width="166">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="color: black;">Fili&egrave;re et El&eacute;m&eacute;nt de Module</span></p>
</td>
<td style="width: 35.6pt; border: none; border-bottom: solid windowtext 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" width="47">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 12.0pt; color: black;">LGTR </span></p>
</td>
<td style="width: 20.8pt; border: solid windowtext 1.0pt; border-top: none; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" width="28">
<p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 12.0pt; color: black;"><?php echo 'S'.$infoLT_nb[0]["semestre"]; ?></span></p>
</td>
<td style="width: 283.8pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" colspan="3" width="378">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 8.0pt; color: black;"><?php echo '['.$infoLT_nb[0]["sigle"].']'.$infoLT_nb[0]["titre"]; ?></span></p>
</td>
<td style="width: 25.8pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" width="34">
<p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 12.0pt; color: black;"><?php echo $infoLT_nb[0]["nb"]; ?></span></p>
</td>
<td style="width: 78.8pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid black 1.0pt; background: #F2F2F2; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" colspan="2" rowspan="3" width="105">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="color: black;">Nbre Etudiant | Salle</span></p>
</td>
</tr>
<tr style="height: 15.0pt;">
<td style="width: 35.6pt; border: none; border-bottom: solid windowtext 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" width="47">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 12.0pt; color: black;">MAEF</span></p>
</td>
<td style="width: 20.8pt; border: solid windowtext 1.0pt; border-top: none; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" width="28">
<p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 12.0pt; color: black;"><?php echo 'S'.$infoMF_nb[0]["semestre"]; ?></span></p>
</td>
<td style="width: 283.8pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" colspan="3" width="378">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 8.0pt; color: black;"><?php echo '['.$infoMF_nb[0]["sigle"].']'.$infoMF_nb[0]["titre"]; ?></span></p>
</td>
<td style="width: 25.8pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" width="34">
<p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 12.0pt; color: black;"><?php echo $infoMF_nb[0]["nb"]; ?></span></p>
</td>
</tr>
<tr style="height: 15.0pt;">
<td style="width: 35.6pt; border: none; border-bottom: solid windowtext 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" width="47">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 12.0pt; color: black;">MAN</span></p>
</td>
<td style="width: 20.8pt; border: solid windowtext 1.0pt; border-top: none; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" width="28">
<p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 12.0pt; color: black;"><?php echo 'S'.$infoMN_nb[0]["semestre"]; ?></span></p>
</td>
<td style="width: 283.8pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" colspan="3" width="378">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 8.0pt; color: black;"><?php echo '['.$infoMN_nb[0]["sigle"].']'.$infoMN_nb[0]["titre"]; ?></span></p>
</td>
<td style="width: 25.8pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" width="34">
<p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 12.0pt; color: black;"><?php echo $infoMN_nb[0]["nb"]; ?></span></p>
</td>
</tr>
<tr style="height: 15.0pt;">
<td style="width: 72.5pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" width="97">&nbsp;</td>
<td style="width: 51.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" width="69">&nbsp;</td>
<td style="width: 35.6pt; border-top: none; border-left: solid windowtext 1.0pt; border-bottom: solid windowtext 1.0pt; border-right: none; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" width="47">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 12.0pt; color: black;">RXTL</span></p>
</td>
<td style="width: 20.8pt; border: solid windowtext 1.0pt; border-top: none; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" width="28">
<p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 12.0pt; color: black;"><?php echo 'S'.$infoRT_nb[0]["semestre"]; ?></span></p>
</td>
<td style="width: 283.8pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" colspan="3" width="378">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 8.0pt; color: black;"><?php echo '['.$infoRT_nb[0]["sigle"].']'.$infoRT_nb[0]["titre"]; ?></span></p>
</td>
<td style="width: 25.8pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" width="34">
<p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 12.0pt; color: black;"><?php echo $infoRT_nb[0]["nb"]; ?></span></p>
</td>
<td style="width: 50.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" width="67">&nbsp;</td>
<td style="width: 28.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" width="38">&nbsp;</td>
</tr>
<tr style="height: 8.25pt;">
<td style="width: 72.5pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 8.25pt;" width="97">&nbsp;</td>
<td style="width: 51.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 8.25pt;" width="69">&nbsp;</td>
<td style="width: 35.6pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 8.25pt;" width="47">&nbsp;</td>
<td style="width: 20.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 8.25pt;" width="28">&nbsp;</td>
<td style="width: 59.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 8.25pt;" width="80">&nbsp;</td>
<td style="width: 190.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 8.25pt;" width="254">&nbsp;</td>
<td style="width: 33.2pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 8.25pt;" width="44">&nbsp;</td>
<td style="width: 25.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 8.25pt;" width="34">&nbsp;</td>
<td style="width: 50.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 8.25pt;" width="67">&nbsp;</td>
<td style="width: 28.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 8.25pt;" width="38">&nbsp;</td>
</tr>
<tr style="height: 25.5pt;">
<td style="width: 72.5pt; border: solid windowtext 1.0pt; border-right: none; background: #F2F2F2; padding: 0cm 3.5pt 0cm 3.5pt; height: 25.5pt;" width="97">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="color: black;">Salle :</span></p>
</td>
<td style="width: 51.8pt; border-top: solid windowtext 1.0pt; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: none; background: #F2F2F2; padding: 0cm 3.5pt 0cm 3.5pt; height: 25.5pt;" width="69">
<p style="margin-bottom: .0001pt; line-height: normal;"><strong><span style="color: black;"><?php echo $infoMN_nb[0]["groupe"]; ?></span></strong></p>
</td>
<td style="width: 35.6pt; border-top: solid windowtext 1.0pt; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: none; background: #F2F2F2; padding: 0cm 3.5pt 0cm 3.5pt; height: 25.5pt;" width="47">
<p style="margin-bottom: .0001pt; line-height: normal;"><strong><span style="font-size: 12.0pt; color: black;">:</span></strong></p>
</td>
<td style="width: 80.6pt; border-top: solid windowtext 1.0pt; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: none; background: #F2F2F2; padding: 0cm 3.5pt 0cm 3.5pt; height: 25.5pt;" colspan="2" width="107">
<p style="margin-bottom: .0001pt; line-height: normal;"><strong><span style="font-size: 12.0pt; color: black;"><?php echo $salle; ?> </span></strong></p>
</td>
<td style="width: 224.0pt; border-top: solid windowtext 1.0pt; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: none; background: #F2F2F2; padding: 0cm 3.5pt 0cm 3.5pt; height: 25.5pt;" colspan="2" width="299">
<p style="margin-bottom: .0001pt; text-align: right; line-height: normal;"><span style="color: black;">Nbre Total :</span></p>
</td>
<td style="width: 25.8pt; border-top: solid windowtext 1.0pt; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: none; background: #F2F2F2; padding: 0cm 3.5pt 0cm 3.5pt; height: 25.5pt;" width="34">
<p style="margin-bottom: .0001pt; line-height: normal;"><strong><span style="color: black;"><?php echo $infoMF_nb[0]["nb"]+$infoMN_nb[0]["nb"]+$infoLT_nb[0]["nb"]+$infoRT_nb[0]["nb"]; ?></span></strong></p>
</td>
<td style="width: 78.8pt; border-top: solid windowtext 1.0pt; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid black 1.0pt; background: #F2F2F2; padding: 0cm 3.5pt 0cm 3.5pt; height: 25.5pt;" colspan="2" width="105">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="color: black;">Session :<?php echo $session; ?></span></p>
</td>
</tr>
<tr style="height: 6.75pt;">
<td style="width: 72.5pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.75pt;" width="97">&nbsp;</td>
<td style="width: 51.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.75pt;" width="69">&nbsp;</td>
<td style="width: 35.6pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.75pt;" width="47">&nbsp;</td>
<td style="width: 20.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.75pt;" width="28">&nbsp;</td>
<td style="width: 59.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.75pt;" width="80">&nbsp;</td>
<td style="width: 190.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.75pt;" width="254">&nbsp;</td>
<td style="width: 33.2pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.75pt;" width="44">&nbsp;</td>
<td style="width: 25.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.75pt;" width="34">&nbsp;</td>
<td style="width: 50.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.75pt;" width="67">&nbsp;</td>
<td style="width: 28.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.75pt;" width="38">&nbsp;</td>
</tr>
<tr style="height: 45.75pt;">
<td style="width: 72.5pt; border: solid windowtext 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 45.75pt;" width="97">
<p style="margin-bottom: .0001pt; line-height: normal;"><strong><span style="font-size: 9.0pt; color: black;">No Examen</span></strong></p>
</td>
<!--<td style="width: 51.8pt; border: solid windowtext 1.0pt; border-left: none; padding: 0cm 3.5pt 0cm 3.5pt; height: 45.75pt;" width="69">
<p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><strong><span style="font-size: 9.0pt; color: black;">Remise</span></strong></p>
</td>-->
<td style="width: 56.4pt; border-top: solid windowtext 1.0pt; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid black 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 45.75pt;" colspan="2" width="75">
<p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><strong><span style="font-size: 9.0pt; color: black;">Photo</span></strong></p>
</td>
<td style="width: 59.8pt; border: solid windowtext 1.0pt; border-left: none; padding: 0cm 3.5pt 0cm 3.5pt; height: 45.75pt;" width="80">
<p style="margin-bottom: .0001pt; line-height: normal;"><strong><span style="font-size: 9.0pt; color: black;">No Inscription</span></strong></p>
</td>
<td style="width: 190.8pt; border: solid windowtext 1.0pt; border-left: none; padding: 0cm 3.5pt 0cm 3.5pt; height: 45.75pt;" colspan="2" width="254">
<p style="margin-bottom: .0001pt; line-height: normal;"><strong><span style="font-size: 9.0pt; color: black;">Nom et Pr&eacute;nom</span></strong></p>
</td>
<td style="width: 33.2pt; border: solid windowtext 1.0pt; border-left: none; padding: 0cm 3.5pt 0cm 3.5pt; height: 45.75pt;" width="44">
<p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><strong><span style="font-size: 9.0pt; color: black;">Fili&egrave;re</span></strong></p>
</td>
<td style="width: 25.8pt; border: solid windowtext 1.0pt; border-left: none; padding: 0cm 3.5pt 0cm 3.5pt; height: 45.75pt;" width="34">
<p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><strong><span style="font-size: 9.0pt; color: black;">Niveau</span></strong></p>
</td>
<td style="width: 50.0pt; border: solid windowtext 1.0pt; border-left: none; padding: 0cm 3.5pt 0cm 3.5pt; height: 45.75pt;" width="67">
<p style="margin-bottom: .0001pt; line-height: normal;"><strong><span style="font-size: 9.0pt; color: black;">Pr&eacute;sence</span></strong></p>
</td>
<td style="width: 28.8pt; border: solid windowtext 1.0pt; border-left: none; padding: 0cm 3.5pt 0cm 3.5pt; height: 45.75pt;" width="38">
<p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><strong><span style="font-size: 9.0pt; color: black;">Nbre Copie</span></strong></p>
</td>
</tr>

<?php for($i=0;$i<count($info);$i++){ 
    if( $i==13 or $i==29 or $i==45 or $i==63 or $i==83 or $i==101 or $i==119 or $i==137 or $i==155){ //if($i>0){?>
    
  <?php//} ?>
<table>
<tr style="height: 45.75pt;">
<td style="width: 72.5pt; border: solid windowtext 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 45.75pt;" width="97">
<p style="margin-bottom: .0001pt; line-height: normal;"><strong><span style="font-size: 9.0pt; color: black;">No Examen</span></strong></p>
</td>
<!--<td style="width: 51.8pt; border: solid windowtext 1.0pt; border-left: none; padding: 0cm 3.5pt 0cm 3.5pt; height: 45.75pt;" width="69">
<p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><strong><span style="font-size: 9.0pt; color: black;">Remise</span></strong></p>
</td>-->
<td style="width: 56.4pt; border-top: solid windowtext 1.0pt; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid black 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 45.75pt;" colspan="2" width="75">
<p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><strong><span style="font-size: 9.0pt; color: black;">Photo</span></strong></p>
</td>
<td style="width: 59.8pt; border: solid windowtext 1.0pt; border-left: none; padding: 0cm 3.5pt 0cm 3.5pt; height: 45.75pt;" width="80">
<p style="margin-bottom: .0001pt; line-height: normal;"><strong><span style="font-size: 9.0pt; color: black;">No Inscription</span></strong></p>
</td>
<td colspan="2" style="width: 141.8pt; border: solid windowtext 1.0pt; border-left: none; padding: 0cm 3.5pt 0cm 3.5pt; height: 45.75pt;" width="254">
<p style="margin-bottom: .0001pt; line-height: normal;"><strong><span style="font-size: 9.0pt; color: black;">Nom et Pr&eacute;nom</span></strong></p>
</td>
<td style="width: 33.2pt; border: solid windowtext 1.0pt; border-left: none; padding: 0cm 3.5pt 0cm 3.5pt; height: 45.75pt;" width="44">
<p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><strong><span style="font-size: 9.0pt; color: black;">Fili&egrave;re</span></strong></p>
</td>
<td style="width: 25.8pt; border: solid windowtext 1.0pt; border-left: none; padding: 0cm 3.5pt 0cm 3.5pt; height: 45.75pt;" width="34">
<p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><strong><span style="font-size: 9.0pt; color: black;">Niveau</span></strong></p>
</td>
<td style="width: 50.0pt; border: solid windowtext 1.0pt; border-left: none; padding: 0cm 3.5pt 0cm 3.5pt; height: 45.75pt;" width="67">
<p style="margin-bottom: .0001pt; line-height: normal;"><strong><span style="font-size: 9.0pt; color: black;">Pr&eacute;sence</span></strong></p>
</td>
<td style="width: 28.8pt; border: solid windowtext 1.0pt; border-left: none; padding: 0cm 3.5pt 0cm 3.5pt; height: 45.75pt;" width="38">
<p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><strong><span style="font-size: 9.0pt; color: black;">Nbre Copie</span></strong></p>
</td>
</tr>
<p style="page-break-after:always;"></p>
    <?php } ?>
<tr style="height: 39.95pt;">
<td style="width: 72.5pt; border: solid windowtext 1.0pt; border-top: none; padding: 0cm 3.5pt 0cm 3.5pt; height: 39.95pt;" width="97">
<p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="color: black;"><?php echo $info[$i]['num_exam'];?></span></p>
</td>
<!--<td style="width: 51.8pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 39.95pt;" width="69">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="color: black;">&nbsp;</span></p>
</td>-->
<td style="width: 56.4pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid black 1.0pt; padding: 0cm 1.5pt 0cm 1.5pt; height: 39.95pt;" colspan="2" width="75">
<p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="color: black;"> <img  style="width: 40px; height: 50px;" src="<?php
        
        if(file_exists("C:\wamp\www\laureat\photos\IUP".$info[$i]['matriculeetudiant'].'.GIF'))
        echo "../../photos/IUP".$info[$i]['matriculeetudiant'].'.GIF';
        else echo "../../photos/IUP".$info[$i]['matriculeetudiant'].'.bmp'; 
   ?> "onerror="this.src='../../photos/default.gif';"/></span></p>
</td>
<td style="width: 59.8pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 39.95pt;" width="80">
<p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="color: black;"><?php  echo 'IUP'.$info[$i]['matriculeetudiant'];?></span></p>
</td>
<td style="width: 141.8pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 39.95pt;" colspan="2" width="254">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="color: black;"><?php  echo $info[$i]['nom_c'];?></span></p>
</td>
<td style="width: 33.2pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 39.95pt;" width="44">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="color: black;"><?php  echo $info[$i]['idProgramme'];?></span></p>
</td>
<td style="width: 25.8pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 39.95pt;" width="34">
<p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="color: black;"><?php  echo "L".$info[$i]['niveau'];?></span></p>
</td>
<td style="width: 50.0pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 39.95pt;" width="67">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="color: black;">&nbsp;</span></p>
</td>
<td style="width: 28.8pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 39.95pt;" width="38">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="color: black;">&nbsp;</span></p>
</td>
</tr>
<?php } ?>
<tr style="height: 18.75pt;">
<td style="width: 72.5pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 18.75pt;" width="97">
<table>
<tbody>
<tr style="height: 18.75pt;">
<td style="width: 35.0pt; padding: 0cm 0cm 0cm 0cm; height: 18.75pt;" width="47">&nbsp;</td>
</tr>
</tbody>
</table>
    <b>    Rémarques:</b>
</td>
<td style="width: 51.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 18.75pt;" width="69">&nbsp;</td>
<td style="width: 35.6pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 18.75pt;" width="47">&nbsp;</td>
<td style="width: 20.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 18.75pt;" width="28">&nbsp;</td>
<td style="width: 59.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 18.75pt;" width="80">&nbsp;</td>
<td style="width: 190.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 18.75pt;" width="254">&nbsp;</td>
<td style="width: 33.2pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 18.75pt;" width="44">&nbsp;</td>
<td style="width: 104.6pt; border: none; border-bottom: solid windowtext 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 18.75pt;" colspan="3" width="139">
<p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 7.0pt; color: black;">Place reserv&eacute;e au Secr&eacute;tariat :</span></p>
</td>
</tr>
<tr style="height: 20.1pt;">
<td style="width: 431.3pt; border: solid windowtext 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" colspan="6" rowspan="3" width="575">
<p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="color: black;">&nbsp;</span></p>
</td>
<td style="width: 33.2pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" width="44">&nbsp;</td>
<td style="width: 25.8pt; border-top: none; border-left: solid windowtext 1.0pt; border-bottom: solid black 1.0pt; border-right: solid windowtext 1.0pt; background: #F2F2F2; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" rowspan="4" width="34">
<p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="color: black;">BILAN</span></p>
</td>
<td style="width: 50.0pt; border: none; border-bottom: solid windowtext 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" width="67">
<p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 12.0pt; color: black;">LGTR </span></p>
</td>
<td style="width: 28.8pt; border: solid windowtext 1.0pt; border-top: none; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" width="38">
<p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="color: black;">&nbsp;</span></p>
</td>
</tr>
<tr style="height: 20.1pt;">
<td style="width: 33.2pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" width="44">&nbsp;</td>
<td style="width: 50.0pt; border: none; border-bottom: solid windowtext 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" width="67">
<p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 12.0pt; color: black;">MAEF</span></p>
</td>
<td style="width: 28.8pt; border: solid windowtext 1.0pt; border-top: none; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" width="38">
<p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="color: black;">&nbsp;</span></p>
</td>
</tr>
<tr style="height: 20.1pt;">
<td style="width: 33.2pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" width="44">&nbsp;</td>
<td style="width: 50.0pt; border: none; border-bottom: solid windowtext 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" width="67">
<p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 12.0pt; color: black;">MAN</span></p>
</td>
<td style="width: 28.8pt; border: solid windowtext 1.0pt; border-top: none; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" width="38">
<p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="color: black;">&nbsp;</span></p>
</td>
</tr>
<tr style="height: 20.1pt;">
<td style="width: 180.7pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" colspan="4" width="241">
<p style="margin-bottom: .0001pt; line-height: normal;"><strong><span style="color: black;">Signatures des surveillants :</span></strong></p>
</td>
<td style="width: 59.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" width="80">&nbsp;</td>
<td style="width: 190.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" width="254">&nbsp;</td>
<td style="width: 33.2pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" width="44">&nbsp;</td>
<td style="width: 50.0pt; border: none; border-bottom: solid windowtext 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" width="67">
<p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 12.0pt; color: black;">RXTL</span></p>
</td>
<td style="width: 28.8pt; border: solid windowtext 1.0pt; border-top: none; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" width="38">
<p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="color: black;">&nbsp;</span></p>
</td>
</tr>
<tr style="height: 20.1pt;">
<td style="width: 72.5pt; border-top: solid #BFBFBF 1.0pt; border-left: none; border-bottom: solid #BFBFBF 1.0pt; border-right: none; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" width="97">
<p style="margin-bottom: .0001pt; line-height: normal;"><strong><span style="color: black;">Nom et Pr&eacute;nom</span></strong></p>
</td>
<td style="width: 51.8pt; border: none; border-bottom: solid #BFBFBF 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" width="69">
<p style="margin-bottom: .0001pt; line-height: normal;"><strong><span style="color: black;">&nbsp;</span></strong></p>
</td>
<td style="width: 35.6pt; border: none; border-bottom: solid #BFBFBF 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" width="47">
<p style="margin-bottom: .0001pt; line-height: normal;"><strong><span style="color: black;">&nbsp;</span></strong></p>
</td>
<td style="width: 20.8pt; border: none; border-bottom: solid #BFBFBF 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" width="28">
<p style="margin-bottom: .0001pt; line-height: normal;"><strong><span style="color: black;">&nbsp;</span></strong></p>
</td>
<td style="width: 59.8pt; border: none; border-bottom: solid #BFBFBF 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" width="80">
<p style="margin-bottom: .0001pt; line-height: normal;"><strong><span style="color: black;">&nbsp;</span></strong></p>
</td>
<td style="width: 190.8pt; border: none; border-bottom: solid #BFBFBF 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" width="254">
<p style="margin-bottom: .0001pt; line-height: normal;"><strong><span style="color: black;">Signature</span></strong></p>
</td>
<td style="width: 33.2pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" width="44">&nbsp;</td>
<td style="width: 25.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" width="34">&nbsp;</td>
<td style="width: 50.0pt; border: solid windowtext 1.0pt; border-top: none; background: #F2F2F2; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" width="67">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="color: black;">TOTAL :</span></p>
</td>
<td style="width: 28.8pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; background: #F2F2F2; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" width="38">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="color: black;">&nbsp;</span></p>
</td>
</tr>
<tr style="height: 20.1pt;">
<td style="width: 240.5pt; border: none; border-bottom: solid #BFBFBF 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" colspan="5" width="321">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="color: black;">1-</span></p>
</td>
<td style="width: 190.8pt; border: none; border-bottom: solid #BFBFBF 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" width="254">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 6.0pt; color: black;">Responsable de Salle</span></p>
</td>
<td style="width: 33.2pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" width="44">&nbsp;</td>
<td style="width: 25.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" width="34">&nbsp;</td>
<td style="width: 60.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" width="60" colspan="2"><b>Visa Superviseur</b></td>
</tr>

<tr style="height: 20.1pt;">
<td style="width: 240.5pt; border: none; border-bottom: solid #BFBFBF 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" colspan="5" width="321">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="color: black;">4-</span></p>
</td>
<td style="width: 190.8pt; border: none; border-bottom: solid #BFBFBF 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" width="254">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="color: black;">&nbsp;</span></p>
</td>
<td style="width: 33.2pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" width="44">&nbsp;</td>
<td style="width: 25.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" width="34">&nbsp;</td>
<td style="width: 50.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" width="67">&nbsp;</td>
<td style="width: 28.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" width="38">&nbsp;</td>
</tr>
<tr style="height: 20.1pt;">
<td style="width: 240.5pt; border: none; border-bottom: solid #BFBFBF 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" colspan="5" width="321">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="color: black;">2-</span></p>
</td>
<td style="width: 190.8pt; border: none; border-bottom: solid #BFBFBF 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" width="254">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="color: black;">&nbsp;</span></p>
</td>
<td style="width: 109.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" colspan="3" width="145">
<p style="margin-bottom: .0001pt; line-height: normal;"><strong><span style="font-size: 8.0pt; color: black;">Heure Examen :  <?php ?></span></strong></p>
</td>
<td style="width: 28.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" width="38">&nbsp;</td>
</tr>
<tr style="height: 20.1pt;">
<td style="width: 240.5pt; border: none; border-bottom: solid #BFBFBF 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" colspan="5" width="321">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="color: black;">3-</span></p>
</td>
<td style="width: 190.8pt; border: none; border-bottom: solid #BFBFBF 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" width="254">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="color: black;">&nbsp;</span></p>
</td>
<td style="width: 137.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" colspan="4" width="184">
<p style="margin-bottom: .0001pt; line-height: normal;"><strong><span style="font-size: 8.0pt; color: black;">Date Examen : <?php ?></span></strong></p>
</td>
</tr>
</tbody>
</table>

<p style="margin-left: -2.0cm; text-indent: 21.25pt;">&nbsp;</p>


           </div><!--end of right content-->
           <div class="clear">
               
           </div>
    </div> <!--end of main content-->
    </div>
    <?php
  include(APPPATH.'views/include/footer.php');?>

<script type="text/javascript">
<!--
function imprimer(id){
str=document.getElementById(id).innerHTML
newwin=window.open('','printwin','left=100,top=100,width=400,height=400')
newwin.document.write('<HTML>\n <HEAD>\n')
newwin.document.write('<link rel="stylesheet" href="<?php echo base_url();?>css/printable.css" />\n');
newwin.document.write('<TITLE>Impression de la liste </TITLE>\n')
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
//-->
</script>

<script>
   
     $('#add').click( function () {
       
             /* setInterval( function () {
location.reload();
}, 100 );*/

        // alert("hhh");
       //  var data = table.row('.selected').data();
        // $('#planning').val(data.id);
        // window.location.href='<?php echo base_url(); ?>index.php/scolarite/form_planing_exam';
        $('#createEventModal1').modal('toggle');
     });
       $('#btn_cancel').click( function () {
       
        
        $('#createEventModal1').modal('hide');
     });
       $('#update').click( function () {
         window.location.href='<?php echo base_url(); ?>index.php/scolarite/modifier_planning_exam';
       // $('#createEventModal1').modal('toggle');
     });
     
      $('#submitButton').click( function () {
        
        $('#createEventModal1').modal('hide'); 
         if (window.XMLHttpRequest) {
                                                        // code for IE7+, Firefox, Chrome, Opera, Safari
                                                        xmlhttp = new XMLHttpRequest();
                                                    } else {
                                                        // code for IE6, IE5
                                                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                                                    }
                                                    xmlhttp.onreadystatechange = function () {
                                                        if (this.readyState == 4 && this.status == 200) {
                                                            //document.getElementById("txtHint").innerHTML = this.responseText;
                                                              //var myObj = JSON.parse(this.responseText);
                                                            //alert(myObj);
                                                           var options="";
                                                             location.reload();
                                                         
                                                        }
                                                    };
                                                    
                                               var id=     $('#planning').val();
   var sigle= $('#infomodule_element_dropdown').val(); 
    var journee=    $('#journee').val();
    var crenau=    $('#crenau').val();
      var idProgramme=    $('#idProgramme').val();
                                                    var events = "<?php echo base_url(); ?>index.php/scolarite/ajouter_planing_exam?planning=" + id +"&sigle=" + sigle +"&journee=" + journee +"&crenau=" + crenau +"&idProgramme"+idProgramme+ "";
                                                  
                                                    xmlhttp.open("GET", events, true);
                                                    xmlhttp.send(); 
                                              
     } );
   function selectModule(type) {
                                                        var annee = $("#date").val();
                                                                var semestre = $("#semestre1").val();
                                                                var idProgramme = $("#idProgramme1").val();
                                                                var matriculeEmploye = "";
                                                                if (idProgramme != "-1") {
                                                        ElementsPlanning('infomodule_element', idProgramme, annee, semestre, type=1, matriculeEmploye);
                                                        } 
                                                        }

                                                        function ElementsPlanning(loadType, loadId, annee, semestre, type, matriculeEmploye) {
                                                        var annee = $("#date").val();
                                                                var semestre = $("#semestre1").val();
                                                                var idProgramme = $("#idProgramme1").val();
                                                                var matriculeEmploye = $("#employe1").val();
                                                                var dataString = 'loadType=' + loadType + '&loadId=' + loadId + '&annee=' + annee + '&semestre=' + semestre + '&type=' + type + '&matriculeEmploye=' + matriculeEmploye;
                                                                $("#" + loadType + "_loader").show();
                                                                $("#" + loadType + "_loader").fadeIn(400).html('En cours... <img src="<?php echo base_url(); ?>images/loading.gif" />');
                                                                $.ajax({
                                                                type: "POST",
                                                                        url: "ElementsPlanning",
                                                                        data: dataString,
                                                                        cache: false,
                                                                        success: function (result) {
                                                                        $("#" + loadType + "_loader").hide();
                                                                                $("#" + loadType + "_dropdown").html("<option value='-1'>Select " + loadType + "</option>");
                                                                                $("#" + loadType + "_dropdown").append(result);
                                                                                //pour modification event
                                                                                $("#" + loadType + "_dropdownD").html("<option value='-1'>Select " + loadType + "</option>");
                                                                                $("#" + loadType + "_dropdownD").append(result);
                                                                                
                                                                                $("#eventIDG").html("<option value='-1'> Choisissez le groupe </option>");
                                                                                $("#eventIDG").append(result);
                                                                                
                                                                        }
                                                                });
                                                        }
                          function showChevauch() {
                                                var annee = $('#annee').val();
                                                var num_bac = $('#num_bac').val();


                                       // alert(annee+"ffff "+ num_bac)
                                                document.getElementById("alert").innerHTML = "";


                                                if (window.XMLHttpRequest) {
                                                    // code for IE7+, Firefox, Chrome, Opera, Safari
                                                    xmlhttp = new XMLHttpRequest();
                                                } else {
                                                    // code for IE6, IE5
                                                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                                                }
                                                xmlhttp.onreadystatechange = function () {
                                                    if (this.readyState == 4 && this.status == 200) {
                                                        var myObj = JSON.parse(this.responseText);
                                                        if (myObj == null) {
                                                            document.getElementById("alert").innerHTML = "Attention !! cet étudiant "+ num_bac +" n'est parmi les admis en Bac RIM "+annee+" ";
                                                         $('#num_bac').css("border", "1px solid red");
                                                        $('#btn_add').prop('disabled', true);
            }else{
                                                            $('#btn_add').prop('disabled', false);
                                                             $('#num_bac').css("border", "1px solid green");
                                                          document.getElementById("alert").innerHTML = " ";
                                                         
            }
                                                    }
                                                };

                                                 var events = "<?php echo base_url(); ?>index.php/scolarite/control_autorisation?num_bac=" + num_bac + "&annee=" + annee + ""
                                                xmlhttp.open("GET", events, true);
                                                xmlhttp.send();
                                            }
</script>