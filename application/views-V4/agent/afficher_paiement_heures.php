<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
<div class="container" >
    <div class="col-xs-12 hl-left">
            
       <script src="<?php echo base_url(); ?>js/moment.min.js"></script>
   <div class="center_content">

       <table width="100%"><tr> <!--<td>Date debut:</td><td><input type="date"  id="dateD"/></td><td>Date fin:</td><td><input type="date"  id="dateF"/></td><td>Statut:</td><td><select class="form-control" onchange="f3(this);" id="statut" >
                       <option value="-1">Choisisser le statut</option>
                                                                        <?php
                                                                        for ($i = 0; $i < count($statut['statut']); $i++) {
                                                                            echo'<option value="' . $statut['statut'][$i] . '"> <div id="DIV2">' .
                                                                            $statut['statut'][$i].'</div></option>';
                                                                        }
                                                                        ?>


                   </select> </td>--><td align="right"> <button  onClick="imprimer('printable');" ><b> Imprimer l'attestation </b></button></td></tr></table>
                                                               
                                                               	
  
                       <!-- <?php echo form_label('Groupe :');?>
                  
                    <select  name="groupe" id="groupe"   onchange="f3(this);">
                        <option></option>
                    </select>
                    </div>-->
       

 
       <div id="printable">
 
<div id="div2" >
<table id="etu3" width="100%" height="100%" style=" border-collapse: collapse; border: none;" >
<tbody><?php if($statut=="V"){?>
    <tr>
            <td colspan="10" align="center"><h4><b>Etat de paiement des héures de vacation<b><h2></td>
                                
</tr><?php }else{?>
    <tr>
            <td colspan="10" align="center"><h4><b>Etat de paiement des héures d'enseignment des des permanents <b><h2></td>
                                
</tr>
<tr><?php } ?>
    <td colspan="10"  align="center"><h5><b>Période du <?php echo date('d/m/Y',  strtotime($start)) ." à ".date('d/m/Y',  strtotime($end)); ?><b><h4></td>
                                
        </tr>
    <tr  style="height: 10.35pt;"><td style="width: 50.3pt; border: solid #F79646 1.0pt; padding: 0cm 0pt 0cm 0pt; height: 11.35pt;" rowspan="2" width="66"><p style="line-height: normal;"><span style="font-size: 14.0pt; font-family: Arial,sans-serif;">Matricule</span></p></td><td style="width: 200.9pt; border: solid #F79646 1.0pt; border-left: none; background: #FABF8F; padding: 0cm 5.4pt 0cm 5.4pt; height: 11.35pt;" rowspan="2" width="342"><p style="line-height: normal;"><span style="font-size: 14.0pt; font-family: Arial,sans-serif;">Nom et prénom</span></p></td><td style="width: 100.15pt; border: solid #F79646 1.0pt; border-left: none; padding: 0cm 5.4pt 0cm 5.4pt; height: 11.35pt;" rowspan="2" width="100"><p style="line-height: normal;"><span style="font-size: 14.0pt; font-family: Arial,sans-serif;">NNI</span></p></td><td style="width: 92.1pt; border: solid #F79646 1.0pt; border-left: none; background: #FABF8F; padding: 0cm 5.4pt 0cm 5.4pt; height: 11.35pt;" colspan="3" width="123"><p style="line-height: normal;"><span style="font-size: 14.0pt; font-family: "Arial","sans-serif";">Atome p&eacute;dagogique.</span></p></td><td style="width: 99.25pt; border: solid #F79646 1.0pt; border-left: none; padding: 0cm 5.4pt 0cm 5.4pt; height: 11.35pt;" rowspan="2" width="132"><p style="line-height: normal;"><span style="font-size: 14.0pt; font-family: "Arial","sans-serif";">Total</span></p></td><td style="width: 99.25pt; border: solid #F79646 1.0pt; border-left: none; padding: 0cm 5.4pt 0cm 5.4pt; height: 11.35pt;" rowspan="2" width="132"><p style="line-height: normal;"><span style="font-size: 14.0pt; font-family: "Arial","sans-serif";">Taux horaire</span></p></td><td style="width: 99.25pt; border: solid #F79646 1.0pt; border-left: none; padding: 0cm 5.4pt 0cm 5.4pt; height: 11.35pt;" rowspan="2" width="132"><p style="line-height: normal;"><span style="font-size: 14.0pt; font-family: "Arial","sans-serif";">Montant</span></p></td><td style="width: 99.25pt; border: solid #F79646 1.0pt; border-left: none; padding: 0cm 5.4pt 0cm 5.4pt; height: 11.35pt;" rowspan="2" width="132"><p style="line-height: normal;"><span style="font-size: 14.0pt; font-family: "Arial","sans-serif";">Compte bancaire</span></p></td><td style="width: 99.25pt; border: solid #F79646 1.0pt; border-left: none; padding: 0cm 5.4pt 0cm 5.4pt; height: 11.35pt;" rowspan="2" width="132"><p style="line-height: normal;"><span style="font-size: 14.0pt; font-family: "Arial","sans-serif";">Banque</span></p></td></tr><tr style="height: 11.35pt;"><td style="width: 1.0cm; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 11.35pt;" width="38"><p style="text-align: center; line-height: normal;"><span style="font-size: 14.0pt; font-family: "Arial","sans-serif";">CM</span></p></td><td style="width: 1.0cm; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; background: #FABF8F; padding: 0cm 5.4pt 0cm 5.4pt; height: 11.35pt;" width="38"><p style="text-align: center; line-height: normal;"><span style="font-size: 14.0pt; font-family: "Arial","sans-serif";">TD</span></p></td><td style="width: 35.4pt; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 11.35pt;" width="47"><p style="text-align: center; line-height: normal;"><span style="font-size: 14.0pt; font-family: "Arial","sans-serif";">TP</span></p></td></tr>'
    <?php 
    
    
    $cm=0;
        $td=0;
       $tp=0;
        $eq=0;
       $montant=0;
       $i=0;
        /*setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
        $date = utf8_encode(strftime("%d-%B-%Y"));
        $objXLS = new PHPExcel();
        $objSheet = $objXLS->setActiveSheetIndex(0);
        
      
                //formatage du Titre de la liste.
      // $objSheet->getDefaultStyle()->getFont()->setName('Courier New');
      // $objSheet->setCellValue('A1', 'INSTITUT UNIVERSITAIRE PROFESSIONNEL');
      //  $objSheet->getStyle('A1')->getFont()->setBold(TRUE);
        
       // $titreFichierExcel = 'Heures d\'enseignement du semestre courant';
       // $objSheet->setCellValue('B1',$titreFichierExcel );
      //  $objSheet->setCellValue('A6', 'Semestre : ' .$semestre .' '.$annee);
   
      //  $objSheet->setCellValue('A4', 'Date : ' . $date);
      $objSheet->getDefaultStyle()->getFont()->setName('Arial');
       $objSheet->setCellValue('A1', 'Etat d\'avencement des cours dispensés');
        $objSheet->getStyle('A1')->getFont()->setBold(TRUE);
       
      $objSheet->setCellValueByColumnAndRow(0,2,'Matricule');
      $objSheet->setCellValueByColumnAndRow(1,2,'Nom et Prénom ');  
      
       $objSheet->setCellValueByColumnAndRow(2,2,'Coordonnées bancaires ');
      $objSheet->setCellValueByColumnAndRow(3,2,'Date'); 
      $objSheet->setCellValueByColumnAndRow(4,2,'HeureDébut');
      $objSheet->setCellValueByColumnAndRow(5,2,'Durée');
       $objSheet->setCellValueByColumnAndRow(6,2,'Elément');
       $objSheet->setCellValueByColumnAndRow(7,2,'Semestre et Filière');
       $objSheet->setCellValueByColumnAndRow(8,2,'Salle');
      $objSheet->setCellValueByColumnAndRow(9,2,'Type');
       $objSheet->setCellValueByColumnAndRow(10,2,'Observation');
       
       $k=3;
       
      
       
     
*/
     
    
    foreach ($paiement as $matriculeEmploye=>$value) {
         $cm+=$value['dureeCM'];
         $td+=$value['dureeTD'];
         $tp+=$value['dureeTP'];
         $eq+=$value['total'];
         $montant+=$value['montant'];
         $i++;
         
     
                                                                        ?>     
<tr style="height: 19.85pt;">
<td style="width: 49.3pt; border: solid #F79646 1.0pt; border-top: none; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="66">
<p style="line-height: normal;"><span style="font-size: 6.0pt; font-family: 'Arial','sans-serif';"><?php echo $matriculeEmploye; ?></span></p>
</td>
<td style="width: 41.9pt; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="56">
<p style="line-height: normal;"><span style="font-size: 6.0pt; font-family: 'Arial','sans-serif';"><?php echo $value['nomprenom']; ?></span></p>
</td>
<td style="width: 256.15pt; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="342">
<p style="line-height: normal;"><span style="font-size: 6.0pt; font-family: 'Arial','sans-serif';"><?php echo $value['NIN']; ?></span></p>
</td>
<td style="width: 1.0cm; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="38">
<p style="line-height: normal;"><span style="font-size: 6.0pt; font-family: 'Arial','sans-serif';"><?php echo $value['dureeCM']; ?></span></p>
</td>
<td style="width: 1.0cm; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="38">
<p style="line-height: normal;"><span style="font-size: 6.0pt; font-family: 'Arial','sans-serif';"><?php echo $value['dureeTD']; ?></span></p>
</td>
<td style="width: 35.4pt; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="47">
<p style="line-height: normal;"><span style="font-size: 6.0pt; font-family: 'Arial','sans-serif';"><?php echo $value['dureeTP']; ?></span></p>
</td>
<td style="width: 99.25pt; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="132">
    <p style="line-height: normal;"><span style="font-size: 6.0pt; font-family: 'Arial','sans-serif';"><?php echo number_format($value['total'], 1) ; ?></span></p>
</td>
<td style="width: 99.25pt; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="132">
<p style="line-height: normal;"><span style="font-size: 6.0pt; font-family: 'Arial','sans-serif';"><?php echo $value['taux_horaire']; ?></span></p>
</td>
<td style="width: 99.25pt; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="132">
<p style="line-height: normal;"><span style="font-size: 6.0pt; font-family: 'Arial','sans-serif';"><?php echo number_format($value['montant'], 1) ; ?></span></p>
</td>
<td style="width: 99.25pt; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="132">
<p style="line-height: normal;"><span style="font-size: 6.0pt; font-family: 'Arial','sans-serif';"><?php echo $value['compteBancaire']; ?></span></p>
</td>
<td style="width: 99.25pt; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="132">
<p style="line-height: normal;"><span style="font-size: 6.0pt; font-family: 'Arial','sans-serif';"><?php echo $value['banque']; ?></span></p>
</td>

</tr>
    <?php    /*$objSheet->setCellValueByColumnAndRow(0,$k,$matriculeEmploye);
      $objSheet->setCellValueByColumnAndRow(1,$k,$value['nomprenom']);  
       $objSheet->setCellValueByColumnAndRow(2,$k,$value['dureeCM']);
      $objSheet->setCellValueByColumnAndRow(3,$k,$value['dureeTD']); 
      $objSheet->setCellValueByColumnAndRow(4,$k,$value['dureeTP']);
      $objSheet->setCellValueByColumnAndRow(5,$k,$value['total']);
       $objSheet->setCellValueByColumnAndRow(6,$k,$value['total']);
       $objSheet->setCellValueByColumnAndRow(7,$k,$value['total']);
       $objSheet->setCellValueByColumnAndRow(8,$k,$value['total']);
      $objSheet->setCellValueByColumnAndRow(9,$k,$value['total']);
     
       $objSheet->setCellValueByColumnAndRow(10,$k,$value['total']);
       $k++;*/
         }    /*   $nomFichier = 'ListeHeures';
        $objWriter = PHPExcel_IOFactory::createwriter($objXLS, 'Excel5');
        header('Content-Type', 'application/msexcel;charset=utf-8');
        header('Content-Disposition: attachment;filename="' . $nomFichier . '.xls"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($objXLS, 'Excel5');
ob_end_clean();

        $objWriter->save('php://output'); */   ?>     
<tr style="height: 19.85pt;">
<td colspan="3" style="width: 49.3pt; border: solid #F79646 1.0pt; border-top: none; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="66">
<p style="line-height: normal;"><span style="font-size: 6.0pt; font-family: 'Arial','sans-serif';">Totaux</span></p>
</td>
<td style="width: 1.0cm; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="38">
<p style="line-height: normal;"><span style="font-size: 6.0pt; font-family: 'Arial','sans-serif';"><?php echo $cm; ?></span></p>
</td>
<td style="width: 1.0cm; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="38">
<p style="line-height: normal;"><span style="font-size: 6.0pt; font-family: 'Arial','sans-serif';"><?php echo $td; ?></span></p>
</td>
<td style="width: 35.4pt; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="47">
<p style="line-height: normal;"><span style="font-size: 6.0pt; font-family: 'Arial','sans-serif';"><?php echo $tp; ?></span></p>
</td>
<td style="width: 99.25pt; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="132">
<p style="line-height: normal;"><span style="font-size: 6.0pt; font-family: 'Arial','sans-serif';"><?php echo number_format($eq, 1) ; ?></span></p>
</td
<td style="width: 99.25pt; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="132">
<p style="line-height: normal;"><span style="font-size: 6.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></p>
</td>
<td style="width: 99.25pt; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="132">
<p style="line-height: normal;"><span style="font-size: 6.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></p>
</td>
<td style="width: 99.25pt; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="132">
    <p style="line-height: normal;"><span style="font-size: 6.0pt; font-family: 'Arial','sans-serif';"><?php echo number_format($montant, 1) ; ?></span></p>
</td>
<td style="width: 99.25pt; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="132">
<p style="line-height: normal;"><span style="font-size: 6.0pt; font-family: 'Arial','sans-serif';">&nbsp;</span></p>
</td>
</tr>

</tbody>
</table>
</div>
<p><span style="font-family: 'Arial','sans-serif';">&nbsp;</span></p>
<p><span style="font-family: 'Arial','sans-serif';">&nbsp;</span></p>
<p><span style="font-family: 'Arial','sans-serif';">&nbsp;</span></p>
<p id="ne">&nbsp;</p>
          
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        <p>&nbsp;</p>
        <!--
<table align="center" style=" border-collapse: collapse; border: none;">
<tbody>
<tr>
<td style="width: 63.85pt; padding: 0cm 5.4pt 0cm 5.4pt;" width="85">&nbsp;<!--<img src="../../images/logo_iup_abra.png" height="70" width="90" ></td>
<td style="width: 31.35pt; padding: 0cm 5.4pt 0cm 5.4pt;" width="42">
<p style="line-height: normal;"><span style="font-size: 9.0pt; font-family: 'Arial','sans-serif';"><!--Institut Universitaire Professionnel</span></p>
</td>
<td style="width: 402.55pt; padding: 0cm 5.4pt 0cm 5.4pt;" width="537">
<p style="text-align: right; line-height: normal;"><span style="font-size: 22.0pt; font-family: 'Arial','sans-serif';">Liste des Etudiants</span></p>
<p style="text-align: right; line-height: normal;"><span style="font-size: 9.0pt; font-family: 'Arial','sans-serif';">Ann&eacute;e Universitaire&nbsp;: <?php echo $annee ?> / <?php echo ($annee+1) ?></span></p>
</td>
</tr>
</tbody>
</table>
        <!--
<p><span style="font-family: 'Arial','sans-serif';">&nbsp;</span></p>
<p><span style="font-family: 'Arial','sans-serif';">&nbsp;</span></p>
<table align="center" style="width: 552.85pt;border-collapse: collapse; border: none;" width="737">
<tbody>
<tr>
<td style="width: 283.55pt; padding: 0cm 5.4pt 0cm 5.4pt;" width="378">
<p style="margin-left: 70.8pt; line-height: normal;"><span id="infp1" style="font-size: 9.0pt; font-family: 'Arial','sans-serif';">Fili&egrave;re&nbsp;, Semestre, </span></p>
</td>
<td style="width: 269.3pt; padding: 0cm 5.4pt 0cm 5.4pt;" width="359">
<p style="margin-left: 35.4pt; line-height: normal;"><span id="infel" style="font-size: 9.0pt; font-family: 'Arial','sans-serif';">Code, Intitul&eacute; (El&eacute;ment),</span> <span style="font-size: 9.0pt; font-family: 'Arial','sans-serif';"> </span></p>
</td>
</tr>
<tr>
<td style="width: 283.55pt; padding: 0cm 5.4pt 0cm 5.4pt;" width="378">
<p style="margin-left: 70.8pt; line-height: normal;"><span id="infm" style="font-size: 9.0pt; font-family: 'Arial','sans-serif';">Code, Intitul&eacute; (Module)</span></p>
</td>
<td style="width: 269.3pt; padding: 0cm 5.4pt 0cm 5.4pt;" width="359">
<p style="margin-left: 35.4pt; line-height: normal;"><span id="infrp" style="font-size: 9.0pt; font-family: 'Arial','sans-serif';">R&eacute;partition&nbsp;: Vol CM, Vol TD, Vol TP</span></p>
</td>
</tr>
</tbody>
</table>
<p><span style="font-family: 'Arial','sans-serif';">&nbsp;</span></p>
<div id="div1">
<table align="center" style="width: 771.4pt; border-collapse: collapse; border: none;" width="771">
<tbody>
<tr style="height: 771.9pt;">
<td valign="top" style="width: 771.2pt; border: none; border-right: solid #E36C0A 0.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 556.9pt;" width="386">
<p style="line-height: normal;"><span style="font-family: 'Arial','sans-serif';">&nbsp;</span></p>
<table border="1" id="etu" align="center" style="width: 771.9pt; border-collapse: collapse; border: none;" width="771">
<tbody>
<tr style="height: 18.5pt;">
<td style="width: 35.3pt; border: solid #E36C0A 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 18.5pt;" width="47">
<p style="line-height: normal;"><span style="font-size: 8.0pt; font-family: 'Arial','sans-serif';">No</span></p>
</td>
<td style="width: 200.1pt; border: solid #E36C0A 1.0pt; border-left: none; padding: 0cm 5.4pt 0cm 5.4pt; height: 18.5pt;" width="59">
<p style="line-height: normal;"><span style="font-size: 8.0pt; font-family: 'Arial','sans-serif';">Nom et pr&eacute;nom</span></p>
</td>
<td style="width: 34.35pt; border: solid #E36C0A 1.0pt; border-left: none; padding: 0cm 5.4pt 0cm 5.4pt; height: 18.5pt;" width="46">
<p style="line-height: normal;"><span style="font-size: 8.0pt; font-family: 'Arial','sans-serif';">Sc1</span></p>
</td>
<td style="width: 23.45pt; border: solid #E36C0A 1.0pt; border-left: none; padding: 0cm 5.4pt 0cm 5.4pt; height: 18.5pt;" width="31">
<p style="line-height: normal;"><span style="font-size: 8.0pt; font-family: 'Arial','sans-serif';">Sc2</span></p>
</td>
<td style="width: 23.45pt; border: solid #E36C0A 1.0pt; border-left: none; padding: 0cm 5.4pt 0cm 5.4pt; height: 18.5pt;" width="31">
<p style="line-height: normal;"><span style="font-size: 8.0pt; font-family: 'Arial','sans-serif';">Sc3</span></p>
</td>
<td style="width: 23.45pt; border: solid #E36C0A 1.0pt; border-left: none; padding: 0cm 5.4pt 0cm 5.4pt; height: 18.5pt;" width="31">
<p style="line-height: normal;"><span style="font-size: 8.0pt; font-family: 'Arial','sans-serif';">Sc4</span></p>
</td>


</tr>

</tbody>
</table>
</td>
<!--<td style="width: 289.2pt; border: none; padding: 0cm 5.4pt 0cm 5.4pt; height: 556.9pt;" width="386">
<p style="line-height: normal;"><span style="font-family: 'Arial','sans-serif';">&nbsp;</span></p>
<table id="etu2" align="center" style="width: 263.7pt; border-collapse: collapse; border: none;" width="352">
<tbody>

</tbody>
</table>
</td>
</tr>
<tr><td colspan="6">   <div id="observations" align="center">
                    <fieldset align="center" style="border:solid 1px black; padding:20px; width:1000px; height:100px; color:midnightblue; font-family:verdana;" >
    <legend>Contenu:</legend>
    <span id="cont">
    
</span>
                      </fieldset>
<br><br>
<strong> </strong> <br>

                 <br> 
                 </div></td></tr>
</tbody>
</table>
              
<p><span style="font-family: 'Arial','sans-serif';">&nbsp;</span></p>
        <!--end of right content-->
           <div class="clear">
               
           </div>
    </div> <!--end of main content-->
       </div></div>
    <?php
  include(APPPATH.'views/include/footer.php');?>

<script type="text/javascript">
<!--
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
//-->
document.getElementById("ne").style.pageBreakAfter = "always";
        function f1(str)
{
   // document.getElementById('default').selected = 'selected';


                                         
                                        
                                          var matricule = str.value;
                                                if (matricule == "") {
                                                    document.getElementById("txtHint").innerHTML = "";
                                                    return;
                                                } else {
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
                                                              var myObj = JSON.parse(this.responseText);
                                                            //alert(myObj);
                                                           var options="";
                                                                 options =myObj;                                                                          //  echo'<option value="' . $loc . '" ';
                                                    var selectBox = document.getElementById('groupe');
                                                    $("#groupe").html("<option value='-1'>choisissez le groupe</option>");
                                                    
                                                     if(options !=""){
                                                    for (var i = 0, l = options.length; i < l; i++) {
                                                        var option = options[i];
                                                        selectBox.options.add(new Option(options[i], options[i], option.selected));
                                                    }}else{
                                                    $("#groupe").html("<option value='-'><span style='font-color='red'>Pas de groupe pour l'annee et semestre courant pour ce module</span></option>");
                                                           
                                                    }
                                                        }
                                                    };
                                                   
                                                    var events = "<?php echo base_url(); ?>index.php/scolarite/groupe_d_enseignent?matricule=" + matricule + "";
                                                  
                                                    xmlhttp.open("GET", events, true);
                                                    xmlhttp.send();
                                                }

                                       
  
}
      function f3(str)
{
   // document.getElementById('default').selected = 'selected';
var option="";


                                         
                                        
                                          var groupe = str.value;
                                           
                                                if (groupe == "") {
                                                    document.getElementById("txtHint").innerHTML = "";
                                                    return;
                                                } else {
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
                                                                                                                    var jsonData = JSON.parse(this.responseText);
//var selectBox = document.getElementById('matricule');
 option="";
                                           option= jsonData; 
                                          // var counter3 = option.employe;
                                           //alert(option.paiement.E0110['total'])
                                           //  for (j = 0, k = counter3.length; j < k; j++) {
                                           //     alert(option.employe[j]['matriculeEmploye']) 
                                           //  }
                                           // var counter = option.detail[0];
                                           
   /*                                                  if(option !=""){
                                                         for (var i = 0; i < option.etudiant.length; i++) {
    var counter = option.etudiant[i];
   alert(counter.nom);
      selectBox.options.add(new Option(counter.matriculeEtudiant+" "+counter.nom+" "+counter.prenom,counter.matriculeEtudiant , option.selected));
         alert()                                          
}*/        //alert(counter.description) ; 
            /*
            $('#cont').html(": "+counter.description);
            $('#nom').html(counter.prenom+" "+counter.nom);
             $('#infp').html(""+counter.idProgramme+" "+counter.semestre+ " "+counter.idModule+" "+counter.module);
             $('#elt').html(": "+counter.sigle+" "+counter.titre);
             $('#vol').html("R&eacute;partition&nbsp;: "+counter.hrsCours+" CM "+counter.hrsTD+" TD "+counter.hrsTP+" TP ");
            $('#titreD').html(":  "+counter.dernierDiplome+" "+counter.paysDiplome);
            var tp=parseInt(counter.hrsTP);
            var td=parseInt(counter.hrsTD);
            var cm=parseInt(counter.hrsCours);
            var v=tp + td + cm;
            $('#volume').html("Volume Horaire&nbsp;:"+v +"<b> Répartition:</b> "+counter.hrsCours+" CM "+counter.hrsTD+" TD "+counter.hrsTP+" TP ");
            $('#bq').html(": "+counter.compteBancaire);
            var stat="";
            var x = counter.grade;
             if((x.charAt(0))=="A"){
                 stat="Permanent";
             }else{
                  stat="Vacataire";
             }
            $('#statut').html(": "+stat+"   <b>Grade:</b> "+counter.grade);
            $('#grade').html(": "+counter.grade);
            
            
            $('#infp1').html("Filière: "+counter.idProgramme+" Semestre: "+counter.semestre);
            $('#infm').html("Code: "+counter.idModule+" Intitulé (Module): "+counter.module);
             $('#infrp').html("R&eacute;partition&nbsp;: "+counter.hrsCours+" CM "+counter.hrsTD+" TD "+counter.hrsTP+" TP ");
             $('#infel').html("Code: "+counter.sigle+" , Intitulé (Elément): "+counter.titre+" , Vol Horaire Total : "+counter.hrsCours+counter.hrsTD+counter.hrsTP);
            
            
            
            //dernierDiplome
           // grade paysDiplome
           
             var counter1 = option.etudiant;
              $('#etu2').html(' ');
               $('#etu').html(' ');
               $('#etu').html('<tr><td style="width: 10.3pt; border: solid #E36C0A 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 18.5pt;" width="47">No</td><td style="width: 35.3pt; border: solid #E36C0A 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 18.5pt;" width="47">Nom et prénom</td><td style="width: 35.3pt; border: solid #E36C0A 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 18.5pt;" width="47">Sc1</td><td style="width: 35.3pt; border: solid #E36C0A 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 18.5pt;" width="47">Sc2</td><td style="width: 35.3pt; border: solid #E36C0A 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 18.5pt;" width="47">Sc3</td><td style="width: 35.3pt; border: solid #E36C0A 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 18.5pt;" width="47">Sc4</td></tr>');
               $('#etu2').html('<tr><td style="width: 10.3pt; border: solid #E36C0A 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 18.5pt;" width="47">No</td><td style="width: 35.3pt; border: solid #E36C0A 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 18.5pt;" width="47">Nom et prénom</td><td style="width: 35.3pt; border: solid #E36C0A 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 18.5pt;" width="47">Sc1</td><td style="width: 35.3pt; border: solid #E36C0A 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 18.5pt;" width="47">Sc2</td><td style="width: 35.3pt; border: solid #E36C0A 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 18.5pt;" width="47">Sc3</td><td style="width: 35.3pt;t; border: solid #E36C0A 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 18.5pt;" width="47">Sc4</td</tr>');
    var tbl=$("<table/>").attr("id","etu");
    $("#div1").append(tbl);
                                                    for (var i = 0, l = counter1.length; i < l; i++) {
                                                  $('#etu').append('<tr><td style="width: 10.3pt; border: solid #E36C0A 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 18.5pt;" width="47">'+counter1[i]["matriculeEtudiant"]+'</td><td style="width: 35.3pt; border: solid #E36C0A 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 18.5pt;" width="47">'+counter1[i]["nom"]+' '+counter1[i]["prenom"]+'</td><td style="width: 35.3pt; border: solid #E36C0A 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 18.5pt;" width="47"></td><td style="width: 35.3pt; border: solid #E36C0A 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 18.5pt;" width="47"></td><td style="width: 35.3pt; border: solid #E36C0A 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 18.5pt;" width="47"></td><td style="width: 35.3pt; border: solid #E36C0A 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 18.5pt;" width="47"></td></tr>')
                                                  // }
                                          
}*/

                                                        }
                                                       /*  for(l=0;l<30;l++){
                                                $('#etu3').append('<tr style="height: 30.85pt;"><td style="width: 49.3pt; border: solid #F79646 1.0pt; border-top: none; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="66"><p style="line-height: normal;"><span style="font-size: 10.0pt; font-family: "Arial","sans-serif";"></span></p></td><td style="width: 41.9pt; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="56"><p style="line-height: normal;"><span style="font-size: 10.0pt; font-family: "Arial","sans-serif";"></span></p></td><td style="width: 256.15pt; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="342"><p style="line-height: normal;"><span style="font-size: 6.0pt; font-family: "Arial","sans-serif";"></span></p></td><td style="width: 1.0cm; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="38"><p style="line-height: normal;"><span style="font-size: 6.0pt; font-family: "Arial","sans-serif";"></span></p></td><td style="width: 1.0cm; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="38"><p style="line-height: normal;"><span style="font-size: 6.0pt; font-family: "Arial","sans-serif";"></span></p></td><td style="width: 35.4pt; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="47"><p style="line-height: normal;"><span style="font-size: 6.0pt; font-family: "Arial","sans-serif";"></span></p></td><td style="width: 99.25pt; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="132"><p style="line-height: normal;"><span style="font-size: 6.0pt; font-family: "Arial","sans-serif";">&nbsp;</span></p></td></tr>');
                                            }*/
                          var counter3 = option.employe;
                                           //alert(option.paiement.E0110['total'])
                                         
                                                         //var counter3 = option.data.cm;
                                                         //console.log(counter3);
                                                          var counter4 = option.paiement;
                                                          var counter5 = option.semaine;
                                                          $('#sem').html(counter5);
             // alert(counter3.length);
             // $("#div2").html(' ');
               $('#etu3').html(' ');
               $('#etu3').html('<tr  style="height: 10.35pt;"><td style="width: 50.3pt; border: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 11.35pt;" rowspan="2" width="66"><p style="line-height: normal;"><span style="font-size: 14.0pt; font-family: Arial,sans-serif;">Matricule</span></p></td><td style="width: 200.9pt; border: solid #F79646 1.0pt; border-left: none; background: #FABF8F; padding: 0cm 5.4pt 0cm 5.4pt; height: 11.35pt;" rowspan="2" width="342"><p style="line-height: normal;"><span style="font-size: 14.0pt; font-family: Arial,sans-serif;">Nom et prénom</span></p></td><td style="width: 100.15pt; border: solid #F79646 1.0pt; border-left: none; padding: 0cm 5.4pt 0cm 5.4pt; height: 11.35pt;" rowspan="2" width="100"><p style="line-height: normal;"><span style="font-size: 14.0pt; font-family: Arial,sans-serif;">NNI</span></p></td><td style="width: 92.1pt; border: solid #F79646 1.0pt; border-left: none; background: #FABF8F; padding: 0cm 5.4pt 0cm 5.4pt; height: 11.35pt;" colspan="3" width="123"><p style="line-height: normal;"><span style="font-size: 14.0pt; font-family: "Arial","sans-serif";">Atome p&eacute;dagogique.</span></p></td><td style="width: 99.25pt; border: solid #F79646 1.0pt; border-left: none; padding: 0cm 5.4pt 0cm 5.4pt; height: 11.35pt;" rowspan="2" width="132"><p style="line-height: normal;"><span style="font-size: 14.0pt; font-family: "Arial","sans-serif";">Total</span></p></td><td style="width: 99.25pt; border: solid #F79646 1.0pt; border-left: none; padding: 0cm 5.4pt 0cm 5.4pt; height: 11.35pt;" rowspan="2" width="132"><p style="line-height: normal;"><span style="font-size: 14.0pt; font-family: "Arial","sans-serif";">Taux horaire</span></p></td><td style="width: 99.25pt; border: solid #F79646 1.0pt; border-left: none; padding: 0cm 5.4pt 0cm 5.4pt; height: 11.35pt;" rowspan="2" width="132"><p style="line-height: normal;"><span style="font-size: 14.0pt; font-family: "Arial","sans-serif";">Montant</span></p></td><td style="width: 99.25pt; border: solid #F79646 1.0pt; border-left: none; padding: 0cm 5.4pt 0cm 5.4pt; height: 11.35pt;" rowspan="2" width="132"><p style="line-height: normal;"><span style="font-size: 14.0pt; font-family: "Arial","sans-serif";">Compte bancaire</span></p></td></tr><tr style="height: 11.35pt;"><td style="width: 1.0cm; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 11.35pt;" width="38"><p style="text-align: center; line-height: normal;"><span style="font-size: 14.0pt; font-family: "Arial","sans-serif";">CM</span></p></td><td style="width: 1.0cm; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; background: #FABF8F; padding: 0cm 5.4pt 0cm 5.4pt; height: 11.35pt;" width="38"><p style="text-align: center; line-height: normal;"><span style="font-size: 14.0pt; font-family: "Arial","sans-serif";">TD</span></p></td><td style="width: 35.4pt; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 11.35pt;" width="47"><p style="text-align: center; line-height: normal;"><span style="font-size: 14.0pt; font-family: "Arial","sans-serif";">TP</span></p></td></tr>');
             //  $('#etu3').html('<tr style="height: 11.35pt;"><td style="width: 49.3pt; border: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 11.35pt;" rowspan="2" width="66"><p style="line-height: normal;"><span style="font-size: 8.0pt; font-family: Arial,sans-serif;">Horaire</span></p></td><td style="width: 41.9pt; border: solid #F79646 1.0pt; border-left: none; background: #FABF8F; padding: 0cm 5.4pt 0cm 5.4pt; height: 11.35pt;" rowspan="2" width="56"><p style="line-height: normal;"><span style="font-size: 8.0pt; font-family: Arial,sans-serif;">Date</span></p></td><td style="width: 256.15pt; border: solid #F79646 1.0pt; border-left: none; padding: 0cm 5.4pt 0cm 5.4pt; height: 11.35pt;" rowspan="2" width="342"><p style="line-height: normal;"><span style="font-size: 8.0pt; font-family: Arial,sans-serif;">R&eacute;sum&eacute; du cours</span></p></td><td style="width: 92.1pt; border: solid #F79646 1.0pt; border-left: none; background: #FABF8F; padding: 0cm 5.4pt 0cm 5.4pt; height: 11.35pt;" colspan="3" width="123"><p style="line-height: normal;"><span style="font-size: 8.0pt; font-family: '"Arial"','"sans-serif"';">Atome p&eacute;dag.</span></p></td><td style="width: 99.25pt; border: solid #F79646 1.0pt; border-left: none; padding: 0cm 5.4pt 0cm 5.4pt; height: 11.35pt;" rowspan="2" width="132"><p style="line-height: normal;"><span style="font-size: 8.0pt; font-family: Arial,sans-serif;">Emargement</span></p></td></tr><tr style="height: 11.35pt;"><td style="width: 1.0cm; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 11.35pt;" width="38"><p style="text-align: center; line-height: normal;"><span style="font-size: 7.0pt; font-family: Arial,sans-serif;">CM</span></p></td><td style="width: 1.0cm; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; background: #FABF8F; padding: 0cm 5.4pt 0cm 5.4pt; height: 11.35pt;" width="38"><p style="text-align: center; line-height: normal;"><span style="font-size: 7.0pt; font-family: Arial,sans-serif;">TD</span></p></td><td style="width: 35.4pt; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 11.35pt;" width="47"><p style="text-align: center; line-height: normal;"><span style="font-size: 7.0pt; font-family: Arial,sans-serif;">TP</span></p></td></tr>');
                var tbl2=$("<table/>").attr("id","etu3");
               // alert(counter3);
    $("#div2").append(tbl2);
    var hcm=0;
                                                      var htd=0;
                                                      var htp=0;
                                                      var hcm=0;
                                                      var j=0;
                                                          for (j = 0, k = counter3.length; j < k; j++) {
                                                             
                                                             var emp=option.employe[j]['matriculeEmploye'];
                                                             var emp=["E0110","E0025"];
                                                //alert(option.paiement.emp['total']+" "+emp) 
                                               // alert(option.paiement.emp[0]) 
                                             }
                                                  for (j = 0, k = counter3.length; j < k; j++) {
                                                  $('#etu3').append('<tr style="height: 40.85pt;"><td style="width: 49.3pt; border: solid #F79646 1.0pt; border-top: none; padding: 0cm 5.4pt 0cm 5.4pt; height: 15.85pt;" width="66"><p style="line-height: normal;"><span style="font-size: 16.0pt; font-family: "Arial","sans-serif";">'+counter3[j]["heureD"]+'h-'+horaire+'h</span></p></td><td style="width: 60.9pt; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 10.85pt;" width="80"><p style="line-height: normal;"><span style="font-size: 16.0pt; font-family: "Arial","sans-serif";">'+date+'</span></p></td><td style="width: 256.15pt; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="342"><p style="line-height: normal;"><span style="font-size: 16.0pt; font-family: "Arial","sans-serif";">'+counter3[j]["commentaire"]+'</span></p></td><td style="width: 1.0cm; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="38"><p style="line-height: normal;"><span style="font-size: 16.0pt; font-family: "Arial","sans-serif";">'+cm1+'</span></p></td><td style="width: 1.0cm; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="38"><p style="line-height: normal;"><span style="font-size: 16.0pt; font-family: "Arial","sans-serif";">'+td1+'</span></p></td><td style="width: 35.4pt; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="47"><p style="line-height: normal;"><span style="font-size: 16.0pt; font-family: "Arial","sans-serif";">'+tp1+'</span></p></td><td style="width: 99.25pt; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="132"><p style="line-height: normal;"><span style="font-size: 16.0pt; font-family: "Arial","sans-serif";">&nbsp;</span></p></td></tr>');
                                                 
                                                }
                                              
                                            var total=hcm+(htd*(2/3))+(htp*(1/2));
                                             total=total.toFixed(2) 
                                            $('#etu3').append('<tr style="height: 40.85pt;"><td colspan="3" style="width: 49.3pt; border: solid #F79646 1.0pt; border-top: none; padding: 0cm 5.4pt 0cm 5.4pt; height: 15.85pt;" width="66"><p style="line-height: normal;"><span style="font-size: 16.0pt; font-family: "Arial","sans-serif";"></span></p></td><td style="width: 1.0cm; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 10.85pt;" width="38"><p style="line-height: normal;"><span style="font-size: 16.0pt; font-family: "Arial","sans-serif";"><b>'+hcm+'</b></span></p></td><td style="width: 1.0cm; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="38"><p style="line-height: normal;"><span style="font-size: 16.0pt; font-family: "Arial","sans-serif";">'+htd+'</span></p></td><td style="width: 35.4pt; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="47"><p style="line-height: normal;"><span style="font-size: 16.0pt; font-family: "Arial","sans-serif";">'+htp+'</span></p></td><td style="width: 99.25pt; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="132"><p style="line-height: normal;"><span style="font-size: 10.0pt; font-family: "Arial","sans-serif";">&nbsp;</span></p></td></tr>');
                                           $('#etu3').append('<tr style="height: 40.85pt;"><td colspan="3" style="width: 49.3pt; border: solid #F79646 1.0pt; border-top: none; padding: 0cm 5.4pt 0cm 5.4pt; height: 15.85pt;" width="66"><p style="line-height: normal;"><span style="font-size: 16.0pt; font-family: "Arial","sans-serif";">Heures éffectuées</span></p></td><td align="center" colspan="3" style="width: 1.0cm; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="38"><p style="line-height: normal;"><span style="font-size: 18.0pt; font-family: "Arial","sans-serif";"><b>'+total+'</b></span></p></td><td style="width: 99.25pt; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="132"><p style="line-height: normal;"><span style="font-size: 6.0pt; font-family: "Arial","sans-serif";">&nbsp;</span></p></td></tr>');
                                           var avnc=((hcm+htd+htp)/(cm+td+tp)*100);
                                           avnc=avnc.toFixed(2); 
                                           var taux=counter4.taux_horaire;
                                           //taux=taux.toFixed(2); 
                                            $('#avanc').html(":<b> "+avnc+" %</b>");
                                            $('#taux').html(":<b> "+taux+"</b> ");
                                            
                                                    };
                                                    var statut = $('#statut').val();
                                                     var start = $('#dateD').val();
                                                      var end = $('#dateF').val();
                                                     
                                               //   var start= moment().startOf('isoWeek').format('YYYY-MM-DD'); 
                                                 //  var end=moment().endOf('isoWeek').format('YYYY-MM-DD');
                                                    
                                                    var events = "<?php echo base_url(); ?>index.php/agent/afficher_paiement_heures?statut=" + statut + "&start="+start+"&end="+end+"";
                                                  
                                                    xmlhttp.open("GET", events, true);
                                                    xmlhttp.send();
                                                }

                                       
  
}
</script>