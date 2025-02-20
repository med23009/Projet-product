
<?php include(APPPATH.'views/include/header.php');
include('include/menu.php');
//print_r($info);
?>

 <div class="container">
    <div class="col-xs-12 hl-left">
            
<button  onClick="imprimer('printable');" style="float:right; height: 30px; background-color:#cceac4; width: 160px; margin-right:185px; margin-top:50px;"><b> Imprimer l'attestation </b></button>

     
        <div id="printable">
            <?php 
            $domaine="";
        if($idProgramme=="MAEF"){
            $domaine="Sciences et Technologies";
          }else if($idProgramme=="MAN"){
            $domaine="Sciences de Gestion";
          }else if($idProgramme=="LGTR"){
            $domaine="Sciences Economiques";
          }else{
            $domaine="Sciences et Technologies";
          }
          $mension="";
        if($idProgramme=="MAEF"){
            $mension="Mathématiques";
            $mension_ar="الرياضيات";
          }else if($idProgramme=="MAN"){
            $mension="Management";
             $mension_ar="التدبير";
          }else if($idProgramme=="LGTR"){
            $mension="Logistique et Transports";
             $mension_ar="اللوجستيك والنقل";
          }else{
            $mension="Statistique";
             $mension_ar="Statistique";
          }
          $option="";
        if($idProgramme=="MAEF"){
            $option="Mathématiques Appliquées à l'Economie et à la Fina...";
          }else if($idProgramme=="MAN"){
            $option="Management";
          }else if($idProgramme=="LGTR"){
            $option="Logistique et Transports";
          }else{
            $option="Statistique";
          }
          ?>
            <table  style=" border-collapse: collapse;" width="900">
<tbody>
<tr style="height: 20.1pt;">
<td style="width: 219.65pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" colspan="4" width="293">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="color: black;"><?php echo $parametres['nom_ins_parent_fr'] ?></span></p>
</td>
<td style="width: 17.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" width="10">&nbsp;</td>
<td style="width: 29.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" width="1">
<!--<table  border="1">
<tbody>
<tr style="height: 20.1pt;">
<td style="width: 22.0pt; padding: 0cm 0cm 0cm 0cm; height: 20.1pt;" width="29"> </td>
</tr>
</tbody>
</table>-->
</td>
<td style="width: 8.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" width="11">&nbsp;</td>
<td rowspan="3" style="width: 23.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" width="32">
   <img src="../../../../images/<?php echo $parametres['logo'] ?>" height="70" width="70" >
</td>
<td style="width: 44.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" width="60">&nbsp;</td>
<td style="width: 42.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" width="57">&nbsp;</td>
<td colspan="5" align="right" style="width: 22.75pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" width="30"><?php echo $parametres['nom_ins_parent_ar'] ?></td>
</tr>
<tr style="height: 20.1pt;">
<td style="width: 219.65pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" colspan="4" width="293">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 10.0pt; color: black;"><?php echo $parametres['nom'] ?></span></p>
</td>
<td style="width: 17.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" width="24">&nbsp;</td>
<td style="width: 29.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" width="39">&nbsp;</td>
<td style="width: 23.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" width="32">&nbsp;</td>
<td style="width: 44.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" width="60">&nbsp;</td>
<td  align="right" colspan="5" style="width: 40.75pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" width="40"><?php echo $parametres['nom_ar'] ?></td>
</tr>


<!--<tr style="height: 4.5pt;">
<td style="width: 23.35pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 4.5pt;" width="31">&nbsp;</td>
<td style="width: 42.95pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 4.5pt;" width="57">&nbsp;</td>
<td style="width: 47.9pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 4.5pt;" width="64">&nbsp;</td>
<td style="width: 105.45pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 4.5pt;" width="141">&nbsp;</td>
<td style="width: 17.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 4.5pt;" width="24">&nbsp;</td>
<td style="width: 29.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 4.5pt;" width="39">&nbsp;</td>
<td style="width: 8.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 4.5pt;" width="11">&nbsp;</td>
<td style="width: 23.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 4.5pt;" width="32">&nbsp;</td>
<td style="width: 44.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 4.5pt;" width="60">&nbsp;</td>
<td style="width: 71.6pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 4.5pt;" colspan="2" width="95">&nbsp;</td>
<td style="width: 63.75pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 4.5pt;" width="85">&nbsp;</td>
<td style="width: 26.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 4.5pt;" width="36">&nbsp;</td>
<td style="width: 17.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 4.5pt;" width="24">&nbsp;</td>
<td style="width: 22.75pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 4.5pt;" width="30">&nbsp;</td>
</tr>-->
<tr style="height: 1.0pt;">
<td style="width: 343.05pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.0pt;" colspan="8" rowspan="3" width="457">
<table height="" >
<tbody>
<!--<tr style="height: 1.4pt;">
<td style="width: 332.0pt; padding: 0cm 0cm 0cm 13.5pt; height: 41.4pt;" rowspan="2" width="443">
<p style="margin-bottom: .0001pt; text-align: left; text-indent: 72.0pt; line-height: normal; direction: rtl; unicode-bidi: embed;"><span style="font-size: 26.0pt; font-family: 'Times New Roman','serif'; color: black;">إفــادة تـسـجـيـل </span></p>
</td>-->
<!--<td style="height: 41.4pt; border: none;" width="0"> </td>
--></tr>

</tbody>
</table>
</td>

<td style="width: 71.6pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.0pt;"   rowspan="8" colspan=1" width="95"><img  style="width: 100px; height: 100px;" src="<?php
        
        if(file_exists(FCPATH."photos/".$matricule.'.jpg'))
        echo "../../../../photos/".$matricule.'.jpg';
        else echo "../../../../photos/".$matricule.'.png'; 
   ?> "onerror="this.src='../../../../photos/default.gif';"/></td>
<td style="width: 71.6pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.0pt;" colspan="2" width="95"></td>

<td style="width: 63.75pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.0pt;" width="85">&nbsp;</td>

<td style="width: 26.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.0pt;" width="36">&nbsp;</td>
<td style="width: 17.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.0pt;" width="24">&nbsp;</td>
<td style="width: 22.75pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.0pt;" width="30"> </td>
</tr>
<tr style="height: 9.95pt;">
<td style="width: 50.6pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.95pt;" colspan="2" width="60">
<!--<p style="margin-bottom: .0001pt; text-align: left; line-height: normal;"><span style="font-size: 8.0pt; color: black;">DOMAINE</span></p>-->
 <!--   <p style="margin-bottom: .0001pt; text-align: left; line-height: normal;"><span style="font-size: 8.0pt; color: black;">MENTION</span></p>-->
</td>
<td style="width: 131.1pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.95pt;" colspan="4" width="175">
<!--<p style="margin-bottom: .0001pt; text-indent: 0.0pt; line-height: normal;"><span style="font-size: 8.0pt; font-family: 'Arial','sans-serif'; color: black;">SCIENCES TECHNOLOGIES</span></p>-->
   <!-- <p style="margin-bottom: .0001pt; text-indent: 0.0pt; line-height: normal;"><span style="font-size: 8.0pt; font-family: 'Arial','sans-serif'; color: black;"><?php //echo $mension; ?></span></p>-->
</td>
</tr>
<tr style="height: 9.95pt;">
    <!--
<!--<td style="width: 71.6pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.95pt;" colspan="2" width="95">
<!--<p style="margin-bottom: .0001pt; text-align: left; line-height: normal; direction: rtl; unicode-bidi: embed;"><span style="font-size: 8.0pt; font-family: 'Sultan Medium'; color: black;">المجال :</span></p>-->
 <!--<p style="margin-bottom: .0001pt; text-align: left; line-height: normal; direction: rtl; unicode-bidi: embed;"><span style="font-size: 8.0pt; font-family: 'Sultan Medium'; color: black;">التخصص :</span></p>
</td>-->
<td style="width: 90.55pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.95pt;" colspan="2" width="121">
<!--<p style="margin-bottom: .0001pt; text-align: left; text-indent: 8.0pt; line-height: normal; direction: rtl; unicode-bidi: embed;"><span style="font-size: 8.0pt; font-family: 'Sultan Medium'; color: black;">علوم التكنولوجيا</span></p>-->
 <!--<p style="margin-bottom: .0001pt; text-align: left; text-indent: 8.0pt; line-height: normal; direction: rtl; unicode-bidi: embed;"><span style="font-size: 8.0pt; font-family: 'Sultan Medium'; color: black;"><?php //echo $mension_ar; ?></span></p>-->
</td>
<!--<td style="width: 17.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.95pt;" width="24">&nbsp;</td>
<td style="width: 22.75pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.95pt;" width="30">&nbsp;</td>
</tr>-->
<tr style="height: 9.95pt;">
<td style="width: 343.05pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.95pt;" colspan="9" rowspan="3" width="457">
<p style="margin-bottom: .0001pt; text-indent: 0.15pt; line-height: normal;"><strong><span style="font-size: 14.0pt; font-family: 'Century Gothic','sans-serif'; color: black;">ATTESTATION D'INSCRIPTION</span></strong></p>
</td>
<td style="width: 71.6pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.95pt;" colspan="2" width="95">
<!--<p style="margin-bottom: .0001pt; text-align: left; line-height: normal;"><span style="font-size: 8.0pt; color: black;">MENTION</span></p>-->
<p style="margin-bottom: .0001pt; text-align: left; line-height: normal;"><span style="font-size: 8.0pt; color: black;">SPECIALITE</span></p>
<p style="margin-bottom: .0001pt; text-align: left; line-height: normal; direction: rtl; unicode-bidi: embed;"><span style="font-size: 8.0pt; font-family: 'Sultan Medium'; color: black;">الاختصاص :
</td>

<td style="width: 131.1pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.95pt;" colspan="4" width="175">
<!--<p style="margin-bottom: .0001pt; text-indent: 0.0pt; line-height: normal;"><span style="font-size: 8.0pt; font-family: 'Arial','sans-serif'; color: black;"><?php //echo $mension; ?></span></p>-->
<p style="margin-bottom: .0001pt; text-indent: 0.0pt; line-height: normal;"><span style="font-size: 8.0pt; font-family: 'Arial','sans-serif'; color: black;"><?php echo $nomProg; ?></span></p>
</td>
</tr>
<!--<tr style="height: 1.95pt;">-->
<td style="width: 71.6pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.95pt;" colspan="2" width="95">
<!--<p style="margin-bottom: .0001pt; text-align: left; line-height: normal; direction: rtl; unicode-bidi: embed;"><span style="font-size: 8.0pt; font-family: 'Sultan Medium'; color: black;">التخصص :</span></p>-->
<!--<p style="margin-bottom: .0001pt; text-align: left; line-height: normal; direction: rtl; unicode-bidi: embed;"><span style="font-size: 8.0pt; font-family: 'Sultan Medium'; color: black;">الاختصاص :</span></p>
--></td>
<td style="width: 90.55pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.95pt;" colspan="2" width="121">
<!--<p style="margin-bottom: .0001pt; text-align: left; text-indent: 0.0pt; line-height: normal; direction: rtl; unicode-bidi: embed;"><span style="font-size: 8.0pt; font-family: 'Sultan Medium'; color: black;"><?php //echo $mension_ar; ?></span></p>-->
<p style="margin-bottom: .0001pt; text-align: left; text-indent: 0.0pt; line-height: normal; direction: rtl; unicode-bidi: embed;"><span style="font-size: 8.0pt; font-family: 'Sultan Medium'; color: black;"><?php echo $nomProgArabe; ?></span></p>
</td>
<!--<td style="width: 17.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.95pt;" width="24">&nbsp;</td>
<td style="width: 22.75pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.95pt;" width="30">&nbsp;</td>
--></tr>
<tr style="height: 9.95pt;">
<td style="width: 71.6pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.95pt;" colspan="2" width="95">
<!--<p style="margin-bottom: .0001pt; text-align: left; line-height: normal;"><span style="font-size: 8.0pt; color: black;">SPECIALITE</span></p>-->
<p style="margin-bottom: .0001pt; text-align: left; line-height: normal;"><span style="font-size: 8.0pt; color: black;">NIVEAU</span></p>
</td>
<td style="width: 108.35pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.95pt;" colspan="3" width="144">
<!--<p style="margin-bottom: .0001pt; text-indent: 0.0pt; line-height: normal;"><span style="font-size: 8.0pt; font-family: 'Arial','sans-serif'; color: black;"><?php echo $nomProg; ?></span></p>-->
<p style="margin-bottom: .0001pt; text-indent: 0.0pt; line-height: normal;"><span style="font-size: 8.0pt; font-family: 'Arial','sans-serif'; color: black;"><?php echo ($niveau+2).' <sup>ème</sup> année'; ?></span></p>
</td>
<td style="width: 22.75pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.95pt;" width="30">&nbsp;</td>
</tr>
<tr style="height: 9.95pt;">
<td style="width: 343.05pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.95pt;" colspan="9" rowspan="2" width="457">
<p style="margin-bottom: .0001pt; text-align: left; text-indent: 24.0pt; line-height: normal; direction: rtl; unicode-bidi: embed;"><span style="font-size: 12.0pt; font-family: 'Times New Roman','serif'; color: black;">السنة الأكادمية
        
        
        &nbsp; </span><span style="font-size: 8.0pt; font-family: 'Times New Roman','serif'; color: black;"><?php echo '    '.($anneeuniv+1).'-'.$anneeuniv; ?></label> </span><span style="font-size: 8.0pt; font-family: 'Rekaa','serif'; color: black;">Ann&eacute;e Académique </span></p>
</td>
<td style="width: 71.6pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.95pt;" colspan="2" width="95">
<!--<p style="margin-bottom: .0001pt; text-align: left; line-height: normal; direction: rtl; unicode-bidi: embed;"><span style="font-size: 8.0pt; font-family: 'Sultan Medium'; color: black;">الاختصاص :</span></p>-->
<p style="margin-bottom: .0001pt; text-align: left; line-height: normal; direction: rtl; unicode-bidi: embed;"><span style="font-size: 8.0pt; font-family: 'Sultan Medium'; color: black;">المستوى</span></p>
</td>
<!--<td style="width: 90.55pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.95pt;" colspan="2" width="121">
<!--<p style="margin-bottom: .0001pt; text-align: left; text-indent: 8.0pt; line-height: normal; direction: rtl; unicode-bidi: embed;"><span style="font-size: 8.0pt; font-family: 'Sultan Medium'; color: black;"><?php echo $nomProgArabe; ?></span></p>-->
<p style="margin-bottom: .0001pt; text-align: left; text-indent: 8.0pt; line-height: normal; direction: rtl; unicode-bidi: embed;"><span style="font-size: 8.0pt; font-family: 'Sultan Medium'; color: black;"><?php  if($niveau=="1"){echo "سنة ثالثة";}elseif ($niveau=="2") {echo "سنة رابعة";}elseif($niveau=="3"){echo "سنة خامسة";} ?></span></p>
</td>
<!--<td style="width: 17.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.95pt;" width="24">&nbsp;</td>
<td style="width: 22.75pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.95pt;" width="30">&nbsp;</td>
--></tr>

<tr style="height: 9.95pt;">
<td style="width: 71.6pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.95pt;" colspan="2" width="95">
<!--<p style="margin-bottom: .0001pt; text-align: left; line-height: normal;"><span style="font-size: 7.0pt; color: black;">NIVEAU</span></p>-->
</td>
<td style="width: 63.75pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.95pt;" width="85.0pt; line-height: normal;"><span style="font-size: ">
<!--<p style="margin-bottom: .0001pt; text-indent: 08.0pt; font-family: 'Arial','sans-serif'; color: black;"><?php echo 'L'.$niveau; ?></span></p>-->
</td>
<!--<td style="width: 26.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.95pt;" width="36">&nbsp;</td>
<td style="width: 17.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.95pt;" width="24">&nbsp;</td>
<td style="width: 22.75pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.95pt;" width="30">&nbsp;</td>
</tr>-->
<tr style="height: 9.95pt;">
<td style="width: 343.05pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.95pt;" colspan="9" width="457">&nbsp;</td>
<td style="width: 71.6pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.95pt;" colspan="2" width="95">
<!--<p style="margin-bottom: .0001pt; text-align: left; line-height: normal; direction: rtl; unicode-bidi: embed;"><span style="font-size: 8.0pt; font-family: 'Sultan Medium'; color: black;">المستوى</span></p>-->
</td>
<td style="width: 63.75pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.95pt;" width="85">
<!--    <p style="margin-bottom: .0001pt; text-align: left; text-indent: 8.0pt; line-height: normal; direction: rtl; unicode-bidi: embed;"><span style="font-size: 8.0pt; font-family: 'Sultan Medium'; color: black;"><?php  if($niveau=="1"){echo "سنة أولى";}elseif ($niveau=="2") {echo "سنة ثانية";}elseif($niveau=="3"){echo "سنة ثالثة";} ?></span></p>-->
</td>
<!--<td style="width: 26.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.95pt;" width="36">&nbsp;</td>
<td style="width: 17.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.95pt;" width="24">&nbsp;</td>
<td style="width: 22.75pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 9.95pt;" width="30">&nbsp;</td>
</tr>-->
<!--<tr style="height: 1.25pt;">
<td style="width: 23.35pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 1.25pt;" width="31">&nbsp;</td>
<td style="width: 42.95pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 1.25pt;" width="57">&nbsp;</td>
<td style="width: 47.9pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 1.25pt;" width="64">&nbsp;</td>
<td style="width: 105.45pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 1.25pt;" width="141">&nbsp;</td>
<td style="width: 17.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 1.25pt;" width="24">&nbsp;</td>
<td style="width: 29.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 1.25pt;" width="39">&nbsp;</td>
<td style="width: 8.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 1.25pt;" width="11">&nbsp;</td>
<td style="width: 23.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 1.25pt;" width="32">&nbsp;</td>
<td style="width: 44.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 1.25pt;" width="60">&nbsp;</td>
<td style="width: 42.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 1.25pt;" width="57">&nbsp;</td>
<td style="width: 28.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 1.25pt;" width="38">&nbsp;</td>
<td style="width: 63.75pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 1.25pt;" width="85">&nbsp;</td>
<td style="width: 26.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 1.25pt;" width="36">&nbsp;</td>
</tr>-->
<tr style="height: 15.0pt;">
<td style="width: 545.75pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" colspan="15" width="728">
<!--<p style="margin-bottom: .0001pt; text-align: right; text-indent: 18.0pt; line-height: normal; direction: rtl; unicode-bidi: embed;"><span style="font-size: 9.0pt; font-family: 'Sultan Medium'; color: black;">إن مسؤول الدراسة فى ا لمعهد الجامعي المهني بجامعة انواكشوط العصرية يفيد بأن الطالب(ة) مسجل(ة) في المعهد للسنة الجامعية  years حسب البيانات التالية :</span></p>-->
    <p style="margin-bottom: .0001pt; text-align: right; text-indent: 18.0pt; line-height: normal; direction: rtl; unicode-bidi: embed;"><span style="font-size: 9.0pt; font-family: 'Sultan Medium'; color: black;">إن مديرالشؤون الأكاديمية <b>ب<b><?php echo $parametres['nom_ar'].' ' ?> <?php echo (empty($parametres['nom_ins_parent_ar']))? (' '):(" ب".$parametres['nom_ins_parent_ar'].' '); ?></b> يفيد بأن الطالب(ة) المهندس(ة) مسجل(ة) للسنة الأكادمية <b><?php echo ' '.$anneeuniv.'-'.($anneeuniv+1).' '; ?></b>حسب البيانات التالية:</span></p>

</td>
</tr>
<tr style="height: 15.0pt;">
<td style="width: 545.75pt; padding: 0cm 1.5pt 0cm 1.5pt; height: 20.0pt;" colspan="15" width="728">
<p style="margin-bottom: .0001pt; text-indent: 10.0pt; line-height: normal;"><span style="font-size: 10.0pt; color: black;">Le Directeur des Affaires  Académiques de 
l' <?php echo $parametres['abreviation_nom'];?> <?php echo (empty($parametres['nom_ins_parent_fr']))? (' '):(" de l'".$parametres['nom_ins_parent_fr']); ?> atteste que l'&eacute;l&eacute;ve ingénieur(e) est  inscrit(e) &agrave; l'école pour l'ann&eacute;e Académique <?php echo ' '.$anneeuniv.'-'.($anneeuniv+1).' '; ?> sous les donn&eacute;es suivantes : </span></p>
</td>
</tr>
<tr style="height: 12.95pt;">
<td style="width: 66.3pt; border: none; border-top: solid #F79646 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.95pt;" colspan="2" width="88">
<p style="margin-bottom: .0001pt; text-align: left; line-height: normal; direction: rtl; unicode-bidi: embed;"><span style="font-size: 12.0pt; font-family: 'Sakkal Majalla'; color: black;">الاسم الشخصي :</span></p>
</td>
<td style="width: 200.15pt; border: none; border-top: solid #F79646 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.95pt;" colspan="4" width="267">
<p style="margin-bottom: .0001pt; text-align: left; text-indent: 24.0pt; line-height: normal; direction: rtl; unicode-bidi: embed;"><span style="font-size: 12.0pt; font-family: 'Sakkal Majalla'; color: black;"><?php echo $prenomArabe; ?></span></p>
</td>
<td style="width: 8.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.95pt;" width="11">&nbsp;</td>
<td style="width: 68.6pt; border: none; border-top: solid #F79646 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.95pt;" colspan="2" width="91">
<p style="margin-bottom: .0001pt; text-align: left; line-height: normal; direction: rtl; unicode-bidi: embed;"><span style="font-size: 10.0pt; font-family: 'Sakkal Majalla'; color: black;">المولود (ة) بتاريخ :</span></p>
</td>
<td style="width: 71.6pt; border-top: solid #F79646 1.0pt; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: none; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.95pt;" colspan="2" rowspan="2" width="95">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 10.0pt; color: black;"><?php echo date('d/m/Y',strTotime($dateNaissance)) ;  ?></span></p>
</td>
<td style="width: 63.75pt; border: none; border-top: solid #F79646 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.95pt;" width="85">
<p style="margin-bottom: .0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;"><span style="font-family: 'Sakkal Majalla'; color: black;">فى :</span></p>
</td>
<td style="width: 67.35pt; border: none; border-top: solid #F79646 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.95pt;" colspan="3" width="90">
<p style="margin-bottom: .0001pt; text-align: left; line-height: normal; direction: rtl; unicode-bidi: embed;"><span style="font-family: 'Sakkal Majalla'; color: black;"><?php echo $info['lieuNaissance']; ?></span></p>
</td>
</tr>
<tr style="height: 12.95pt;">
<td style="width: 66.3pt; border: none; border-bottom: solid #F79646 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.95pt;" colspan="2" width="88">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 8.0pt; color: black;">Pr&eacute;nom :</span></p>
</td>
<td style="width: 200.15pt; border: none; border-bottom: solid #F79646 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.95pt;" colspan="4" width="267">
    <p style="margin-bottom: .0001pt; text-indent: 0.0pt; line-height: normal;"><span style="color: black;"><p class="capitalize"><?php echo $prenom; ?></p></span></p>
</td>
<td style="width: 8.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.95pt;" width="11">&nbsp;</td>
<td style="width: 68.6pt; border: none; border-bottom: solid #F79646 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.95pt;" colspan="2" width="91">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 8.0pt; color: black;">N&eacute;[e] le :</span></p>
</td>
<td style="width: 63.75pt; border: none; border-bottom: solid #F79646 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.95pt;" width="85">
<p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 8.0pt; color: black;">&agrave; :</span></p>
</td>
<td style="width: 67.35pt; border: none; border-bottom: solid #F79646 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.95pt;" colspan="3" width="90">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 8.0pt; color: black;"><?php echo $info['lieuNaissance']; ?></span></p>
</td>
</tr>
<tr style="height: 12.95pt;">
<td style="width: 66.3pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.95pt;" colspan="2" width="88">
<p style="margin-bottom: .0001pt; text-align: left; line-height: normal; direction: rtl; unicode-bidi: embed;"><span style="font-size: 12.0pt; font-family: 'Sakkal Majalla'; color: black;">اسم الأب :</span></p>
</td>
<td style="width: 200.15pt; border: none; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.95pt;" colspan="4" width="267">
<p style="margin-bottom: .0001pt; text-align: left; text-indent: 24.0pt; line-height: normal; direction: rtl; unicode-bidi: embed;"><span style="font-size: 12.0pt; font-family: 'Sakkal Majalla'; color: black;"><?php echo $prenomPere_ar; ?></span></p>
</td>
<td style="width: 8.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.95pt;" width="11">&nbsp;</td>
<td style="width: 68.6pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.95pt;" colspan="2" width="91">
<p style="margin-bottom: .0001pt; text-align: left; line-height: normal; direction: rtl; unicode-bidi: embed;"><span style="font-size: 12.0pt; font-family: 'Sakkal Majalla'; color: black;">البلد :</span></p>
</td>
<td style="width: 71.6pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.95pt;" colspan="2" width="95">
<p style="margin-bottom: .0001pt; text-align: left; line-height: normal; direction: rtl; unicode-bidi: embed;"><span style="font-size: 12.0pt; font-family: 'Sakkal Majalla'; color: black;">موريتانيا</span></p>
</td>
<td style="width: 63.75pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.95pt;" width="85">
<!--<p style="margin-bottom: .0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;"><span style="font-size: 12.0pt; font-family: 'Sakkal Majalla'; color: black;">تاريخ التسجيل :</span></p>-->
</td>
<td style="width: 67.35pt; border: none; border-bottom: solid #F79646 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.95pt;" colspan="3" rowspan="2" width="90">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 8.0pt; color: black;"><?php //echo date('d/m/Y',strTotime($info['dateInscription'])); ?></span></p>
</td>
</tr>
<tr style="height: 12.95pt;">
<td style="width: 66.3pt; border: none; border-bottom: solid #F79646 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.95pt;" colspan="2" width="88">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 8.0pt; color: black;">Pr&eacute;nom du P&egrave;re :</span></p>
</td>
<td style="width: 200.15pt; border: none; border-bottom: solid #F79646 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.95pt;" colspan="4" width="267">
    <p style="margin-bottom: .0001pt; text-indent: 0.0pt; line-height: normal;"><span style="color: black;"><p class="uppercase"><?php echo $prenomPere_fr; ?></p></span></p>
</td>
<td style="width: 8.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.95pt;" width="11">&nbsp;</td>
<td style="width: 68.6pt; border: none; border-bottom: solid #F79646 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.95pt;" colspan="2" width="91">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 8.0pt; color: black;">Pays :</span></p>
</td>
<td style="width: 71.6pt; border: none; border-bottom: solid #F79646 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.95pt;" colspan="2" width="95">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 10.0pt; color: black;">Mauritanie</span></p>
</td>
<td style="width: 63.75pt; border: none; border-bottom: solid #F79646 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.95pt;" width="85">
<!--<p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 8.0pt; color: black;">Date d'Inscript. :</span></p>-->
</td>
</tr>
<tr style="height: 12.95pt;">
<td style="width: 66.3pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.95pt;" colspan="2" width="88">
<p style="margin-bottom: .0001pt; text-align: left; line-height: normal; direction: rtl; unicode-bidi: embed;"><span style="font-size: 12.0pt; font-family: 'Sakkal Majalla'; color: black;">الاسم العائلي&nbsp; :</span></p>
</td>
<td style="width: 200.15pt; border: none; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.95pt;" colspan="4" width="267">
<p style="margin-bottom: .0001pt; text-align: left; text-indent: 24.0pt; line-height: normal; direction: rtl; unicode-bidi: embed;"><span style="font-size: 12.0pt; font-family: 'Sakkal Majalla'; color: black;"><?php echo $nomArabe; ?></span></p>
</td>
<td style="width: 8.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.95pt;" width="11">&nbsp;</td>
<td style="width: 68.6pt; border: none; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.95pt;" colspan="2" width="91">
<p style="margin-bottom: .0001pt; text-align: left; line-height: normal; direction: rtl; unicode-bidi: embed;"><span style="font-size: 10.0pt; font-family: 'Sakkal Majalla'; color: black;">الرقم الوطني للتعريف :</span></p>
</td>
<td style="width: 71.6pt; border: none; border-bottom: solid #F79646 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.95pt;" colspan="2" rowspan="2" width="95">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 10.0pt; color: black;"><?php echo $info['nin']; ?></span></p>
</td>
<td style="width: 63.75pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.95pt;" width="85">
<p style="margin-bottom: .0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;"><span style="font-family: 'Sakkal Majalla'; color: black;">الجنس :</span></p>
</td>
<td style="width: 67.35pt; border: none; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.95pt;" colspan="3" width="90">
<p style="margin-bottom: .0001pt; text-align: left; line-height: normal; direction: rtl; unicode-bidi: embed;"><span style="font-family: 'Sakkal Majalla'; color: black;"><?php if($info['sexe']=="M"){echo "ذكر";}else{echo"أنثى";}?></span></p>
</td>
</tr>
<tr style="height: 12.95pt;">
<td style="width: 66.3pt; border: none; border-bottom: solid #F79646 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.95pt;" colspan="2" width="88">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 8.0pt; color: black;">Nom de Famille :</span></p>
</td>
<td style="width: 200.15pt; border: none; border-bottom: solid #F79646 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.95pt;" colspan="4" width="267">
    <p style="margin-bottom: .0001pt; text-indent: 0.0pt; line-height: normal;"><span style="color: black;"><p class="uppercase"><?php echo $nom; ?></p></span></p>
</td>
<td style="width: 8.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.95pt;" width="11">&nbsp;</td>
<td style="width: 68.6pt; border: none; border-bottom: solid #F79646 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.95pt;" colspan="2" width="91">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 8.0pt; color: black;">NNI :</span></p>
</td>
<td style="width: 63.75pt; border: none; border-bottom: solid #F79646 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.95pt;" width="85">
<p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 8.0pt; color: black;">Genre :</span></p>
</td>
<td style="width: 67.35pt; border: none; border-bottom: solid #F79646 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.95pt;" colspan="3" width="90">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 8.0pt; color: black;"><?php if($info['sexe']=="M"){echo "MASCULIN";}else{echo"FEMININ";}?></span></p>
</td>
</tr>
<tr style="height: 12.95pt;">
<td style="width: 66.3pt; border: none; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.95pt;" colspan="2" width="88">
    <p style="margin-bottom: .0001pt; text-align: left; line-height: normal; direction: rtl; unicode-bidi: embed;"><span style="font-family: 'Sakkal Majalla'; color: black;"><b>الرقم التسلسلي :</b></span></p>
</td>
<td style="width: 200.15pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.95pt;" colspan="4" rowspan="2" width="267">
<p style="margin-bottom: .0001pt; text-indent: 0.0pt; line-height: normal;"><span style="color: black;"><?php echo $matricule;  ?></span></p>
</td>
<td style="width: 8.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.95pt;" width="11">&nbsp;</td>
<td style="width: 68.6pt; border: none; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.95pt;" colspan="2" width="91">
<p style="margin-bottom: .0001pt; text-align: left; line-height: normal; direction: rtl; unicode-bidi: embed;"><span style="font-family: 'Sakkal Majalla'; color: black;">رقم الباكالوريا :</span></p>
</td>
<td style="width: 71.6pt; border: none; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.95pt;" colspan="2" rowspan="2" width="95">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 10.0pt; color: black;"><?php echo $info['num_bac']; ?></span></p>
</td>
<td style="width: 63.75pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.95pt;" width="85">
<p style="margin-bottom: .0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;"><span style="font-family: 'Sakkal Majalla';font-size:8pt; color: black;">شعبة الباكالوريا :</span></p>
</td>
<td style="width: 67.35pt; border: none; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.95pt;" colspan="3" width="90">
<p style="margin-bottom: .0001pt; text-align: left; line-height: normal; direction: rtl; unicode-bidi: embed;"><span style="font-family: 'Sakkal Majalla'; color: black;"><?php if(($info['infoBac']=='Math')or($info['infoBac']=='Mathématiques')or($info['infoBac']=='Math?ématique') or($info['infoBac']=='Mathématique')or ($info['infoBac']=='M')or ($info['infoBac']=='MA')){ echo "الرياضيات"; }elseif(($info['infoBac']=='SN')or($info['infoBac']=='Scientifique')or ($info['infoBac']=='SNA')){ echo "العلوم الطبيعية"; }elseif(($info['infoBac']=='TM')or($info['infoBac']=='Technique')or ($info['infoBac']=='TMGM')){echo "التقنى";}?></span></p>
</td>
</tr>
<tr style="height: 12.95pt;">
<td style="width: 66.3pt; border: none; border-bottom: solid #F79646 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.95pt;" colspan="2" width="88">
    <p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 8.0pt; color: black;"><b>No d'Inscription :</b></span></p>
</td>
<td style="width: 8.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.95pt;" width="11">&nbsp;</td>
<td style="width: 68.6pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.95pt;" colspan="2" width="91">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 8.0pt; color: black;">No Baccalaureat :</span></p>
</td>
<td style="width: 63.75pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.95pt;" width="85">
<p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 8.0pt; color: black;">S&eacute;rie du BAC :</span></p>
</td>
<td style="width: 67.35pt; border: none; border-bottom: solid #F79646 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.95pt;" colspan="3" width="90">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 8.0pt; color: black;"><?php if(($info['infoBac']=='Math')or($info['infoBac']=='Mathématiques')or($info['infoBac']=='Math?ématique') or($info['infoBac']=='Mathématique')or ($info['infoBac']=='M')or ($info['infoBac']=='MA')){ echo "M (Mathématique)"; }elseif(($info['infoBac']=='SN')or($info['infoBac']=='Scientifique')or ($info['infoBac']=='SNA')){ echo "SN (Sciences Nat.)"; }elseif(($info['infoBac']=='TM')or($info['infoBac']=='Technique')or ($info['infoBac']=='TMGM')){echo "TMGM (Technique)";}?></span></p>
</td>
</tr>
<tr style="height: 12.95pt;">
<td style="width: 66.3pt; border: none; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.95pt;" colspan="2" width="88">
<p style="margin-bottom: .0001pt; text-align: left; line-height: normal; direction: rtl; unicode-bidi: embed;"><span style="font-family: 'Sakkal Majalla'; color: black;">الشهادة المحضرة :</span></p>
</td>
<td style="width: 200.15pt; border: none; border-top: solid #F79646 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.95pt;" colspan="4" width="267">
<p style="margin-bottom: .0001pt; text-align: left; text-indent: 22.0pt; line-height: normal; direction: rtl; unicode-bidi: embed;"><span style="font-family: 'Sakkal Majalla'; color: black;"> مهندس</span></p>
</td>
<td style="width: 8.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.95pt;" width="11">&nbsp;</td>
<td style="width: 68.6pt; border: none; border-top: solid #F79646 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.95pt;" colspan="2" width="91">
<p style="margin-bottom: .0001pt; text-align: left; line-height: normal; direction: rtl; unicode-bidi: embed;"><span style="font-size: 12.0pt; font-family: 'Sakkal Majalla'; color: black;">سنة الباكالوريا :</span></p>
</td>
<td style="width: 71.6pt; border-top: solid #F79646 1.0pt; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: none; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.95pt;" colspan="2" rowspan="2" width="95">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 10.0pt; color: black;"><?php if(isset($info['anneeObtention'])){
    echo $info['anneeObtention']; } ?></span></p>
</td>
<td style="width: 63.75pt; border: none; border-top: solid #F79646 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.95pt;" width="85">
<p style="margin-bottom: .0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;"><span style="font-size: 12.0pt; font-family: 'Sakkal Majalla'; color: black;">البلد</span></p>
</td>
<td style="width: 67.35pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.95pt;" colspan="3" width="90">
<p style="margin-bottom: .0001pt; text-align: left; line-height: normal; direction: rtl; unicode-bidi: embed;"><span style="font-size: 12.0pt; font-family: 'Sakkal Majalla'; color: black;">موريتانيا</span></p>
</td>
</tr>
<tr style="height: 12.95pt;">
<td style="width: 66.3pt; border: none; border-bottom: solid #F79646 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.95pt;" colspan="2" width="88">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 8.0pt; color: black;">Dipl&ocirc;me pr&eacute;par&eacute; :</span></p>
</td>
<td style="width: 200.15pt; border: none; border-bottom: solid #F79646 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.95pt;" colspan="4" width="267">
<p style="margin-bottom: .0001pt; text-indent: 0pt; line-height: normal;"><span style="font-size: 8.0pt; color: black;">Ingénieur</span></p>
</td>
<td style="width: 8.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.95pt;" width="11">&nbsp;</td>
<td style="width: 68.6pt; border: none; border-bottom: solid #F79646 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.95pt;" colspan="2" width="91">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 8.0pt; color: black;">Ann&eacute;e du BAC :</span></p>
</td>
<td style="width: 63.75pt; border: none; border-bottom: solid #F79646 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.95pt;" width="85">
<p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 8.0pt; color: black;">Pays :</span></p>
</td>
<td style="width: 67.35pt; border: none; border-bottom: solid #F79646 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 12.95pt;" colspan="3" width="90">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="font-size: 8.0pt; color: black;">Mauritanie</span></p>
</td>
</tr>
<tr style="height: 6.0pt;">
<td style="width: 23.35pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.0pt;" width="31">&nbsp;</td>
<td style="width: 42.95pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.0pt;" width="57">&nbsp;</td>
<td style="width: 47.9pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.0pt;" width="64">&nbsp;</td>
<td style="width: 105.45pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.0pt;" width="141">&nbsp;</td>
<td style="width: 17.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.0pt;" width="24">&nbsp;</td>
<td style="width: 29.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.0pt;" width="39">&nbsp;</td>
<td style="width: 8.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.0pt;" width="11">&nbsp;</td>
<td style="width: 23.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.0pt;" width="32">&nbsp;</td>
<td style="width: 44.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.0pt;" width="60">&nbsp;</td>
<td style="width: 42.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.0pt;" width="57">&nbsp;</td>
<td style="width: 28.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.0pt;" width="38">&nbsp;</td>
<td style="width: 63.75pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.0pt;" width="85">&nbsp;</td>
<td style="width: 26.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.0pt;" width="36">&nbsp;</td>
<td style="width: 17.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.0pt;" width="24">&nbsp;</td>
<td style="width: 22.75pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.0pt;" width="30">&nbsp;</td>
</tr>


<tr style="height: 20.1pt;">
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
    <td   VALIGN="top" colspan="6">
    <table style=" border-collapse: collapse;" >
<tbody>
    <tr style="height: 16.5pt;">
<td style="width: 266.45pt; border-top:solid #E46D0A 1.0pt;border-left:solid #E46D0A 1.0pt; background: #FCD5B4; padding: 0cm 3.5pt 0cm 3.5pt; height: 16.5pt;" colspan="5" width="355">
<p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 10.0pt; font-family: 'Arial','sans-serif'; color: black;">Semestres Impairs&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span><span style="font-size: 10.0pt; font-family: 'Sultan Medium'; color: black;">السداسيات الفردية</span></p>
</td><td style="border-bottom: non;border-top:solid #E46D0A 1.0pt;border-right:solid #E46D0A 1.0pt;background: #FCD5B4;"></td></tr>
<tr style="height: 27.0pt;">
<td style="width: 100.0pt; border: solid #E46D0A 1.0pt; background: #F2F2F2; padding: 0cm 3.5pt 0cm 3.5pt; height: 27.0pt;" rowspan="2" width="35">
<p class="monTexte" style="text-align: center; text-autospace: ideograph-numeric ideograph-other;"><span style="font-size: 7.0pt; color: black;">CHOIX</span></p>
</td>
<td style="width: 39.0pt; border: solid #E46D0A 1.0pt; border-left: none; background: #F2F2F2; padding: 0cm 3.5pt 0cm 3.5pt; height: 27.0pt;" rowspan="2" width="52">
<p class="monTexte" style="text-align: center; text-autospace: ideograph-numeric ideograph-other;"><span style="font-size: 7.0pt; color: black;">CODE MODULE (UE)</span></p>
</td>
<td style="width: 41.0pt; border-top: solid #E46D0A 1.0pt; border-left: none; border-bottom: solid #E46D0A 1.0pt; border-right: none; background: #F2F2F2; padding: 0cm 3.5pt 0cm 3.5pt; height: 27.0pt;" rowspan="2" width="55">
<p style="text-align: center; text-autospace: ideograph-numeric ideograph-other;"><span style="font-size: 10.0pt; font-family: 'Calibri','sans-serif'; color: black;">Code El&eacute;ment </span></p>
</td>
<td style="width: 500.0pt; border: solid #E46D0A 1.0pt; border-right: none; background: #F2F2F2; padding: 0cm 3.5pt 0cm 3.5pt; height: 27.0pt;" rowspan="2" width="160">
<p style="text-align: center; text-autospace: ideograph-numeric ideograph-other;"><span style="font-size: 10.0pt; font-family: 'Calibri','sans-serif'; color: black;">Titre El&eacute;ment de Module</span></p>
</td>
<td style="width: 17.0pt; border: solid #E46D0A 1.0pt; background: #F2F2F2; padding: 0cm 3.5pt 0cm 3.5pt; height: 27.0pt;" rowspan="2" width="23">
    <p class="monTexte" style="text-align: center; text-autospace: ideograph-numeric ideograph-other;"><span style="font-size: 7.0pt; color: black;"> Crédits</span></p>
</td>
<td style="width: 22.0pt; border-top: none; border-left: none; border-bottom: solid #E46D0A 1.0pt; border-right: solid #E46D0A 1.0pt; background: #FCD5B4; padding: 0cm 3.5pt 0cm 3.5pt; height: 27.0pt;" rowspan="2" width="29">
<p class="monTexte" style="text-align: center; text-autospace: ideograph-numeric ideograph-other;"><span style="font-size: 7.0pt; color: black;">SEMESTRE</span></p>
</td>
<td style="height: 27.0pt; border: none;" width="0">&nbsp;</td>
</tr>
<tr style="height: 13.5pt;">
<td style="height: 13.5pt; border: none;" width="0">&nbsp;</td>
</tr>
<?php  
$totCredits = 0;
foreach ($maqSemImpair as $row){ 
     $totCredits += $row['nbCredits'];
    ?>
<tr style="height: 20.1pt;">
<td style="width: 26.0pt; border: solid #E46D0A 1.0pt; border-top: none; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" width="35">
    <p style="text-align: center; text-autospace: ideograph-numeric ideograph-other;"><span style="font-size: 12.0pt; font-family: 'Wingdings 2'; color: black;"><input type="checkbox" checked="yes" disabled="disabled" /></span></p>
</td>
<td style="width: 39.0pt; border-top: none; border-left: none; border-bottom: solid #E46D0A 1.0pt; border-right: solid #E46D0A 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" width="52">
<p style="text-align: center; text-autospace: ideograph-numeric ideograph-other;"><span style="font-size: 7.0pt; color: black;"><?php  echo $row['sigleUnite'];?></span></p>
</td>
<td style="width: 41.0pt; border-top: none; border-left: none; border-bottom: solid #E46D0A 1.0pt; border-right: solid #E46D0A 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" width="55">
<p style="text-autospace: ideograph-numeric ideograph-other;"><span style="font-size: 7.0pt; color: black;"><?php  echo $row['sigleModule'];?></span></p>
</td>
<td style="width: 113.0pt; border: none; border-bottom: solid #E46D0A 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" width="151">
<p style="text-indent: 7.0pt; text-autospace: ideograph-numeric ideograph-other;"><span style="font-size: 7.0pt; font-family: 'Calibri','sans-serif'; color: black;"><?php  echo $row['titreModule'];?></span></p>
</td>
<td style="width: 17.0pt; border: solid #E46D0A 1.0pt; border-top: none; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" width="23">
<p style="text-align: right; text-indent: 8.0pt; text-autospace: ideograph-numeric ideograph-other;"><span style="font-size: 8.0pt; font-family: 'Calibri','sans-serif'; color: black;"><?php  echo $row['nbCredits'];?> </span></p>
</td>
<td style="width: 22.0pt; border-top: none; border-left: none; border-bottom: solid #E46D0A 1.0pt; border-right: solid #E46D0A 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" width="29">
<p style="text-align: right; text-indent: 8.0pt; text-autospace: ideograph-numeric ideograph-other;"><span style="font-size: 8.0pt; font-family: 'Calibri','sans-serif'; color: black;"><?php  echo $row['semestre'];?></span></p>
</td>
<td style="height: 20.1pt; border: none;" width="0">&nbsp;</td>
</tr>
<?php } ?>
<tr style="height: 17.1pt;">
<td style="width: 219.0pt; border: none; border-right: solid #E46D0A 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 17.1pt;" colspan="4" width="292">
    <p style="text-indent: 0.0pt; text-autospace: ideograph-numeric ideograph-other;"><span style="font-family: 'Calibri','sans-serif'; color: black;">TOTAL  Crédits</span></p>
</td>
<td style="width: 39.0pt; border-top: none; border-left: none; border-bottom: solid #E46D0A 1.0pt; border-right: solid #E46D0A 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 17.1pt;" colspan="2" width="52">
<p style="text-align: center; text-autospace: ideograph-numeric ideograph-other;"><span style="font-size: 8.0pt; font-family: 'Calibri','sans-serif'; color: black;"><?php echo $totCredits; ?></span></p>
</td>
<td style="height: 17.1pt; border: none;" width="0">&nbsp;</td>
</tr>
</tbody>
</table></td>
<td style="width: 8.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" width="11">&nbsp;</td>
<td valign="top" colspan="8">
   <table  width="100%" style=" border-collapse: collapse;" >
<tbody>
    <tr style="height: 16.5pt;">
<td style="width: 271.3pt; border-left: solid #E46D0A 1.0pt;border-top: solid #E46D0A 1.0pt; background: #FCD5B4; padding: 0cm 3.5pt 0cm 3.5pt; height: 16.5pt;" colspan="5" width="362">
<p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 10.0pt; font-family: 'Arial','sans-serif'; color: black;">Semestres Pairs&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span><span style="font-size: 10.0pt; font-family: 'Sultan Medium'; color: black;">السداسيات الزوجية</span></p>
</td><td style="border-bottom: non;border-top:solid #E46D0A 1.0pt;border-right:solid #E46D0A 1.0pt;background: #FCD5B4;"></td>
</tr>
<tr style="height: 27.0pt;">
<td style="width: 26.0pt; border: solid #E46D0A 1.0pt; background: #F2F2F2; padding: 0cm 3.5pt 0cm 3.5pt; height: 27.0pt;" rowspan="2" width="35">
<p class="monTexte" style="text-align: center; text-autospace: ideograph-numeric ideograph-other;"><span style="font-size: 7.0pt; color: black;">CHOIX</span></p>
</td>
<td style="width: 39.0pt; border: solid #E46D0A 1.0pt; border-left: none; background: #F2F2F2; padding: 0cm 3.5pt 0cm 3.5pt; height: 27.0pt;" rowspan="2" width="52">
<p class="monTexte" style="text-align: center; text-autospace: ideograph-numeric ideograph-other;"><span style="font-size: 7.0pt; color: black;">CODE MODULE (UE)</span></p>
</td>
<td style="width: 41.0pt; border-top: solid #E46D0A 1.0pt; border-left: none; border-bottom: solid #E46D0A 1.0pt; border-right: none; background: #F2F2F2; padding: 0cm 3.5pt 0cm 3.5pt; height: 27.0pt;" rowspan="2" width="55">
<p style="text-align: center; text-autospace: ideograph-numeric ideograph-other;"><span style="font-size: 10.0pt; font-family: 'Calibri','sans-serif'; color: black;">Code El&eacute;ment </span></p>
</td>
<td style="width: 300.0pt; border: solid #E46D0A 1.0pt; border-right: none; background: #F2F2F2; padding: 0cm 3.5pt 0cm 3.5pt; height: 27.0pt;" rowspan="2" width="151">
<p style="text-align: center; text-autospace: ideograph-numeric ideograph-other;"><span style="font-size: 10.0pt; font-family: 'Calibri','sans-serif'; color: black;">Titre El&eacute;ment de Module</span></p>
</td>
<td style="width: 17.0pt; border: solid #E46D0A 1.0pt; background: #F2F2F2; padding: 0cm 3.5pt 0cm 3.5pt; height: 27.0pt;" rowspan="2" width="23">
    <p class="monTexte" style="text-align: center; text-autospace: ideograph-numeric ideograph-other;"><span style="font-size: 7.0pt; color: black;"> Crédits</span></p>
</td>
<td style="width: 22.0pt; border-top: none; border-left: none; border-bottom: solid #E46D0A 1.0pt; border-right: solid #E46D0A 1.0pt; background: #FCD5B4; padding: 0cm 3.5pt 0cm 3.5pt; height: 27.0pt;" rowspan="2" width="29">
<p class="monTexte" style="text-align: center; text-autospace: ideograph-numeric ideograph-other;"><span style="font-size: 7.0pt; color: black;">SEMESTRE</span></p>
</td>
<td style="height: 27.0pt; border: none;" width="0">&nbsp;</td>
</tr>
<tr style="height: 13.5pt;">
<td style="height: 13.5pt; border: none;" width="0">&nbsp;</td>
</tr>
<?php
$totCredits1=0;
foreach ($maqSemPair as $row){
    $totCredits1 += $row['nbCredits'];
    ?>
<tr style="height: 20.1pt;">
<td style="width: 26.0pt; border: solid #E46D0A 1.0pt; border-top: none; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" width="35">
    <p style="text-align: center; text-autospace: ideograph-numeric ideograph-other;"><span style="font-size: 12.0pt; font-family: 'Wingdings 2'; color: black;"><input type="checkbox" checked="yes" disabled="disabled" /></span></p>
</td>
<td style="width: 39.0pt; border-top: none; border-left: none; border-bottom: solid #E46D0A 1.0pt; border-right: solid #E46D0A 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" width="52">
<p style="text-align: center; text-autospace: ideograph-numeric ideograph-other;"><span style="font-size: 7.0pt; color: black;"><?php  echo $row['sigleUnite'];?></span></p>
</td>
<td style="width: 41.0pt; border-top: none; border-left: none; border-bottom: solid #E46D0A 1.0pt; border-right: solid #E46D0A 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" width="55">
<p style="text-autospace: ideograph-numeric ideograph-other;"><span style="font-size: 7.0pt; color: black;"><?php  echo $row['sigleModule'];?></span></p>
</td>
<td style="width: 113.0pt; border: none; border-bottom: solid #E46D0A 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" width="151">
<p style="text-indent: 7.0pt; text-autospace: ideograph-numeric ideograph-other;"><span style="font-size: 7.0pt; font-family: 'Calibri','sans-serif'; color: black;"><?php  echo $row['titreModule'];?></span></p>
</td>
<td style="width: 17.0pt; border: solid #E46D0A 1.0pt; border-top: none; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" width="23">
<p style="text-align: right; text-indent: 8.0pt; text-autospace: ideograph-numeric ideograph-other;"><span style="font-size: 8.0pt; font-family: 'Calibri','sans-serif'; color: black;"><?php  echo $row['nbCredits'];?> </span></p>
</td>
<td style="width: 22.0pt; border-top: none; border-left: none; border-bottom: solid #E46D0A 1.0pt; border-right: solid #E46D0A 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" width="29">
<p style="text-align: right; text-indent: 8.0pt; text-autospace: ideograph-numeric ideograph-other;"><span style="font-size: 8.0pt; font-family: 'Calibri','sans-serif'; color: black;"><?php  echo $row['semestre'];?></span></p>
</td>
<td style="height: 20.1pt; border: none;" width="0">&nbsp;</td>
</tr>
<?php  } ?>
<tr style="height: 17.1pt;">
<td style="width: 219.0pt; border: none; border-right: solid #E46D0A 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 17.1pt;" colspan="4" width="292">
<p style="text-indent: 0.0pt; text-autospace: ideograph-numeric ideograph-other;"><span style="font-family: 'Calibri','sans-serif'; color: black;">TOTAL Crédits (pôle Humanité et Entreprise (HE) + pôle Sciences et Technologies (ST)  + 12 crédits de spécialité)</span></p>
</td>
<td style="width: 39.0pt; border-top: none; border-left: none; border-bottom: solid #E46D0A 1.0pt; border-right: solid #E46D0A 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 17.1pt;" colspan="2" width="52">
<p style="text-align: center; text-autospace: ideograph-numeric ideograph-other;"><span style="font-size: 8.0pt; font-family: 'Calibri','sans-serif'; color: black;"><?php if($totCredits1<30){ echo '30';}else{echo $totCredits1;}?></span></p>
</td>
<td style="height: 17.1pt; border: none;" width="0">&nbsp;</td>
</tr>
</tbody>
</table></td>
</tr>



<tr style="height: 6.75pt;">
<td style="width: 23.35pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.75pt;" width="31">&nbsp;</td>
<td style="width: 42.95pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.75pt;" width="57">&nbsp;</td>
<td style="width: 47.9pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.75pt;" width="64">&nbsp;</td>
<td style="width: 105.45pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.75pt;" width="141">&nbsp;</td>
<td style="width: 17.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.75pt;" width="24">&nbsp;</td>
<td style="width: 29.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.75pt;" width="39">&nbsp;</td>
<td style="width: 8.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.75pt;" width="11">&nbsp;</td>
<td style="width: 23.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.75pt;" width="32">&nbsp;</td>
<td style="width: 44.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.75pt;" width="60">&nbsp;</td>
<td style="width: 42.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.75pt;" width="57">&nbsp;</td>
<td style="width: 28.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.75pt;" width="38">&nbsp;</td>
<td style="width: 63.75pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.75pt;" width="85">&nbsp;</td>
<td style="width: 26.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.75pt;" width="36">&nbsp;</td>
<td style="width: 17.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.75pt;" width="24">&nbsp;</td>
<td style="width: 22.75pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.75pt;" width="30">&nbsp;</td>
</tr>
<tr style="height: 6.75pt;">
<td style="width: 23.35pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.75pt;" width="31">&nbsp;</td>
<td style="width: 42.95pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.75pt;" width="57">&nbsp;</td>
<td style="width: 47.9pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.75pt;" width="64">&nbsp;</td>
<td style="width: 105.45pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.75pt;" width="141">&nbsp;</td>
<td style="width: 17.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.75pt;" width="24">&nbsp;</td>
<td style="width: 29.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.75pt;" width="39">&nbsp;</td>
<td style="width: 8.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.75pt;" width="11">&nbsp;</td>
<td style="width: 200.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.75pt;" width="300">&nbsp;<b></b></td>
</tr>

<tr style="height: 18.75pt;">
<td style="width: 545.75pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 18.75pt;" colspan="15" width="728"> 
<p style="margin-bottom: .0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;"><strong><span style="font-family: 'Times New Roman','serif'; color: black;">إن الطالب (ة)  المهندس(ة) لديه الحقوق التي يمنحها هذا التسجيل . كما يخضع الطالب (ة) للالتزامات التي يفرضها هذا التسجيل.</span></strong></p>
</td>
</tr>
<tr style="height: 29.25pt;">
<td style="width: 545.75pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 29.25pt;" colspan="15" width="728">
<p style="margin-bottom: .0001pt; text-indent: 10.05pt; line-height: normal;"><strong><span style="font-size: 10.0pt; color: black;">L’éléve ingénieur(e) bénéficie des droits que lui confère cette inscription .Il(Elle) est également soumis aux obligations que lui impose cette inscription.</span></strong></p>
</td>
</tr>
<tr style="height: 1.75pt;">
<td style="width: 23.35pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.75pt;" width="31">&nbsp;</td>
<td style="width: 42.95pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.75pt;" width="57">&nbsp;</td>
<td style="width: 47.9pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.75pt;" width="64">&nbsp;</td>
<td style="width: 105.45pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.75pt;" width="141">&nbsp;</td>
<td style="width: 17.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.75pt;" width="24">&nbsp;</td>
<td style="width: 29.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.75pt;" width="39">&nbsp;</td>
<td style="width: 8.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.75pt;" width="11">&nbsp;</td>
<td style="width: 23.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.75pt;" width="32">&nbsp;</td>
<td style="width: 44.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.75pt;" width="60">&nbsp;</td>
<td style="width: 42.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.75pt;" width="57">&nbsp;</td>
<td style="width: 28.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.75pt;" width="38">&nbsp;</td>
<td style="width: 63.75pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.75pt;" width="85">&nbsp;</td>
<td style="width: 26.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.75pt;" width="36">&nbsp;</td>
<td style="width: 17.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.75pt;" width="24">&nbsp;</td>
<td style="width: 22.75pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 6.75pt;" width="30">&nbsp;</td>
</tr>
<tr style="height: 15.0pt;">
<td style="width: 250.35pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" width="31">&nbsp;
<!--    <p style="margin-bottom: .0001pt; line-height: normal;"><strong><span style="color: black;">Signature de l'étudiant(e)<br>Lu et approuvé</span></strong></p>-->

</td>
<td style="width: 42.95pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" width="57">&nbsp;</td>
<td style="width: 3.9pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" width="64">&nbsp;</td>
<td style="width: 28.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" width="38">&nbsp;</td>
<td style="width: 63.75pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 15.0pt;" width="85">&nbsp;</td>
<td style="width: 26.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 1.0pt;" width="36">&nbsp;</td>
<td style="width: 17.8pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 1.0pt;" width="24">&nbsp;</td>
<td style="width: 22.75pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 1.0pt;" width="30">&nbsp;</td>
<td style="width: 271.65pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 1.0pt;" colspan="7" width="362">
<p style="margin-bottom: .0001pt; line-height: normal;"><strong><span style="color: black;">Date et Signature du Chef  Service de Scolarité</span></strong></p>
</td>


</tr>
</tbody>
</table>
            
            <!--
            <table  border="0"  align="center">
             <tr>
                 <td><img src="../../../../images/logo_iup_abra.png" height="70" width="70" ></td>
                  
                  <td> 
                      <table style="font-size:1em;"  border="0" style="line-height: 10px">
                          <tr>
                              <td align="center" style="font-size:1em;"><b>Institut Universitaire Professionnel</b></td>
                          </tr>
                          <tr>
                          <td>
                          <table style="font-size:1em;"   border="0" style="line-height: 7px">
                          <tr>
                              <td style="font-size: 50%;border-top: 1px solid black">Avenue Roi Fayçal, Téléphone : +222 45 25 04 43 Mobile : +222 43 48 64 81, Email : scolariteiup@gmail.com</td>
                          </tr>
                          <tr>
                              <td style="font-size: 50%">Boite Postale : 880, Siteweb : www.ustm.mr/iup, Nouakchott-Mauritanie</td>
                          </tr>
                          </table>
                              </td>
                          </tr>
                      </table>
                  </td> 
                   <td><!--<img src="../../images/ustm.png" height="70" width="100"></td>
             </tr>
            </table>  <br>
            <table style="font-size:1.5em;" border="0" align="center">
               <tr><td  ><b><center align="center">Attestation d'Inscription</center></b></td></tr>
               <tr><td  ><center align="center"><font size='1.5'>Administrative (IA) ou Pédagogique (IP)</font></center></td></tr>
           </table>
           
              
            
            <br/>
         <table  border='0' width='100%'>
                <div id="contenu">
                
                <tr><td align='center'>
                <p align="center" ><font size="3" >
               
                  إن مسؤول الدراسة   فى ا لمعهد الجامعي المهني  بجامعة انواكشوط العصرية يفيد بأن الطالب(ة) 
                  <b><?php //echo $prenomArabe . ' '. $nomArabe ;?></b> 
                 مسجل(ة) تحت البيانات التالية
                    </td></tr>
                <tr><td>
                <p align="center" ><font size="2" >
                    Le Responsable de la Scolarité de l'Institut Universitaire Professionnel  de l'Université de Nouakchott Al Aasriya  atteste que l'étudiant(e) : <b><?php echo $prenom . ' '. $nom ;?></b>
               est inscrit(e) régulièrement sous les données suivantes : <b>
                             
                </p>
                </div>
             
         </td>/<tr>
            </table>
            <hr width='100%' >
            <table  border="0" style="font-size:13px;">
             
             <tr>
                 <td id="contenu"><label><?php //echo '  Nom de famille :     <b> '.$nom; ?></b></label></td>
               <td></td> <td></td><td></td> 
               <td id="contenu" align="right"><label><?php //echo '   الاسم العائلي  '.'   :  <b> ' .$nomArabe; ?></b></label></td>
                <td rowspan= "6">
                   
        <img  style="width: 100px; height: 100px;" src="<?php
        
      /*  if(file_exists("C:\wamp\www\laureat\photos\IUP".$matricule.'.GIF'))
        echo "../../../../photos/IUP".$matricule.'.GIF';
        else echo "../../../../photos/IUP".$matricule.'.bmp'; 
   ?> "onerror="this.src='../../../../photos/default.gif';"/>
    
                </td>
            </tr>
            <tr>
               <td id="contenu"><label><?php echo '  Prénom :    <b>  '.$prenom; ?></b></label></td>
               <td></td><td></td><td></td> 
               <td id="contenu" align="right"><label><?php echo '  الاسم الشخصي   '.'   :  <b> ' .$prenomArabe; ?></b></label></td>
            </tr>
            <tr>
               <td id="contenu"><label><?php echo '  No d\'inscription :    <b>'.'IUP'.$matricule; ?></b></label></td>
               <td id="contenu"><label><?php echo '  :  '.'   رقم التسجيل '.'   <b> '; ?></b></label></td>
               <td id="contenu" colspan="2"><label><?php echo 'Date de naissance :    <b>  '.date('d/m/Y',strTotime($dateNaissance)) ; ?></b></label></td>
               <td id="contenu" align="right"><label><?php echo '               :  '.'   تاريخ الميلاد '.'   <b>  ' ; ?></b></label></td>
            </tr>
            <tr>
               <td id="contenu"><label><?php echo '  Filière:     <b> '.$nomProg; ?></b></label></td>
               <td></td><td></td><td></td> 
               <td id="contenu" align="right"><label><?php echo '  الشعبة'.'   : <b>  '.$nomProgArabe; ?></b></label></td>
            
            </tr>
            <tr>
              <td id="contenu"><label><?php echo '  Semestre :   <b>   '.$semestre ; ?></b></label></td>
              <td id="contenu"><label><?php echo '  :  '.'   السداسي'.'     ' ; ?></label></td>
              <td id="contenu" colspan="2"><label><?php echo 'Année universitaire :  <b>    '.$anneeuniv.'-'.($anneeuniv+1); ?></b></label></td>
              <td id="contenu" align="right"><label><?php echo '  :  '.'   السنة الجامعية'.'    ' ; ?></label></td>
            </tr>
            <tr>
            <td id="contenu" colspan="2"><label><?php echo '  Diplôme préparé :    <b>  '.'Licence Professionnelle' ; ?></b></label></td>
           <td></td>
           <td id="contenu" align="right" colspan="2"><label><?php echo '    الشهادة المحضرة '.'   : <b> الليسانس المهنية ' ; ?></b></label></td>
             </tr>
        </table>
          <hr width='100%' >
         
            <div id="contenu">
                <p align="center" ><font size="2" > 
                    وعليه فقد  تم تسليمه  هذه الإفادة للإدلاء بها  عند الحاجة
                    </font> <BR>
                <font size="2" > En foi de quoi lui est delivrée la présente attestation  pour servir et valoir ce que de droit.</font></p>
         <center><font size='1'>Maquettes des semestres de l'année en cours</font></center> </div>
           <hr width='100%' >
            <table  id="rounded-corner" border="0" align="center" >
                <tr><td align="center"><font size='1'> <?php 
                $impair = $semestre;
                if($impair %2 ==0)
                    $impair = $semestre-1;
                echo ' Semestres impairs  '.'السداسيات الفردية   '; ?></td> <td align="center">
                        <font size='1'>
                    <?php 
                     $impair = $semestre;
                     if($impair %2 ==0)
                        $impair = $semestre-1;
                    echo ' Semestres paires  '.' السداسيات الزوجية';?></font></td> </tr>  
                <tr>
                    <td>
                        <table border="1"style="font-family:Verdana; font-size:9px;">
                             <?php
                            if(!empty($statElemModImpair)) {
                            echo'<tr>
                            <td>Module</td><td>Crédits</td>
                            <td>Elément</td>
                            <td>Crédits</td>
                            <td>CM</td>
                             <td>TD</td>
                             </tr>';
                            }
                                ?>
                           <?php 
                           $totCM = 0;
                           $totTD = 0;
                           $totCredits = 0;
                             foreach ($statElemModImpair as $modImp) {
                                echo '<tr><td rowspan= "'.$modImp['nb'].'">'.$modImp['titre'].'</td>' ;
                                echo '<td rowspan= "'.$modImp['nb'].'">'.$modImp['credits'].'</td>' ;
                                $i=0;
                                foreach ($maqSemImpair as $row){
                                    if($row['sigleUnite'] == $modImp['sigleUnite']){
                                        if($i==0){
                                            echo '<td>'.$row['titreModule'].'</td>' ;
                                            echo '<td>'.$row['nbCredits'].'</td>' ;
                                            echo '<td>'.$row['volumeCM'].'</td>' ;
                                             echo '<td>'.$row['volumeTD'].'</td></tr>' ;
                                             $totCM += $row['volumeCM'];
                                             $totTD += $row['volumeTD'];
                                             $totCredits += $row['nbCredits'];
                                           $i=1;  
                                        }else{
                                            echo '<tr><td>'.$row['titreModule'].'</td>' ;
                                            echo '<td>'.$row['nbCredits'].'</td>' ;
                                            echo '<td>'.$row['volumeCM'].'</td>' ;
                                             echo '<td>'.$row['volumeTD'].'</td></tr>' ;
                                             $totCM += $row['volumeCM'];
                                             $totTD += $row['volumeTD'];
                                             $totCredits += $row['nbCredits'];
                                        }
                                    }
                                }
                             }
                             
                           if(!empty($statElemModImpair)) {
                               echo '<tr><td colspan="3" align="center">TOTAL</td>
                                 <td>'.$totCredits. '</td><td>'.$totCM. '</td>
                                 <td>'.$totTD.'</td></tr>';
                           }
                    ?>
                            
                </table>
                    </td> <!-- ici le tableau de S1 -->
                    <td>
                        <table border="1" style="font-family:Verdana; font-size:9px;">

                            <?php
                            if(!empty($statElemModPair)) {
                            echo'<tr><td>Module</td><td>Crédits</td><td>Elément</td>'.
                            '<td>Crédits</td><td>CM</td><td>TD</td></tr>';
                            }
                                ?>
                                <?php 
                           $totCM = 0;
                           $totTD = 0;
                           $totCredits = 0;
                             foreach ($statElemModPair as $modPair) {
                                echo '<tr><td rowspan= "'.$modPair['nb'].'">'.$modPair['titre'].'</td>' ;
                                echo '<td rowspan= "'.$modPair['nb'].'">'.$modPair['credits'].'</td>' ;
                                $i=0;
                                foreach ($maqSemPair as $row){
                                    if($row['sigleUnite'] == $modPair['sigleUnite']){
                                        if($i==0){
                                            echo '<td>'.$row['titreModule'].'</td>' ;
                                            echo '<td>'.$row['nbCredits'].'</td>' ;
                                            echo '<td>'.$row['volumeCM'].'</td>' ;
                                             echo '<td>'.$row['volumeTD'].'</td></tr>' ;
                                             $totCM += $row['volumeCM'];
                                             $totTD += $row['volumeTD'];
                                             $totCredits += $row['nbCredits'];
                                           $i=1;  
                                        }else{
                                            echo '<tr><td>'.$row['titreModule'].'</td>' ;
                                            echo '<td>'.$row['nbCredits'].'</td>' ;
                                            echo '<td>'.$row['volumeCM'].'</td>' ;
                                             echo '<td>'.$row['volumeTD'].'</td></tr>' ;
                                             $totCM += $row['volumeCM'];
                                             $totTD += $row['volumeTD'];
                                             $totCredits += $row['nbCredits'];
                                        }
                                    }
                                }
                             }
                             
                       if(!empty($statElemModPair)) {
                               echo '<tr><td colspan="3" align="center">TOTAL</td>
                                 <td>'.$totCredits. '</td><td>'.$totCM. '</td>
                                 <td>'.$totTD.'</td></tr>';
                           }      
               */     ?>
                            
                        </table>
                    </td> <!-- ici le tableau de S2
                </tr>
                       
            </table>
            <hr width='100%' >
                <br>
           
            <p align="center"> 
            <table  border="0" align="center">
             <tr>
                 <td ALIGN="center"><font size='1'>Fait à Nouakchott, le <?php //echo date('d/m/Y');?></font>
                      <br><br><b>Ahmed Brahim Bah</b><bR></td>
              </tr>
             </table>
            </p>
          
         
        </div>
        </div> <!-- end of right content-->
</div>   <!--end of center content -->               
<div class="clear"></div>
</div> <!--end of main content-->


<?php include(APPPATH.'views/include/footer.php'); ?>

<script type="text/javascript">
<!--
function imprimer(id){
str=document.getElementById(id).innerHTML
newwin=window.open('','printwin','left=100,top=100,width=500,height=500')
newwin.document.write('<HTML>\n <HEAD>\n')
// Hafedh
// Supression de l'entete lors de l'impression
newwin.document.write('<style>@page { size: auto;  margin: 4mm; }</style>\n')

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
//-->
</script>
