<?php include(APPPATH.'views/include/header.php');
include('include/menu.php');
?>

<style type="text/css">
.bgimg {
    background-image: url(../../../images/logo_iup_abra.png);
    opacity: 0.6;
    filter: alpha(opacity=60);
}
</style>


<button  onClick="imprimer('printable');" style="float:right; height: 30px; background-color:#cceac4; width: 160px; margin-right:185px; margin-top:50px;"><b> Imprimer l'attestation </b></button>





<div class="container" >
    <div class="col-xs-12 hl-left">
            
        <div id="printable" >
            <table width="100%" height="100%">
                <tr><td style=" background-image: url(../../../images/trans3.png);">
                    
                
           <div style=" margin-top: 30px; margin-right: 30px; margin-left: 30px;" >
         
              <table  width="100%" border="0" style="line-height: 20px">
                          <tr>
                              <td align="right" style="font-size: 120%;font-family: arial;"><b>République Islamique de Mauritanie</b></td>
                          </tr>
                           <tr>
                              <td align="right" style="font-size: 60%;font-family: arial;"> Honneur, Fraternité, Justice</b></td>
                          </tr>
                          
                           
                         
                          
                      </table>
            <table  border="0 width="100%" height="100%">
             <tr>
                 <td style="margin-right:20px"><img src="../../../images/logo_iup_abra.png" height="70" width="90" ></td>
                  
                  <td > 
                      <table  border="0" style="line-height: 20px">
                          <tr>
                              <td align="left" style="font-size: 100%;font-family: arial;">Ministère de l'Enseignement Supérieur et de la Recherche Scientifique</b></td>
                          </tr>
                           <tr>
                              <td align="left" style="font-size: 100%;font-family: arial;">Université de Nouakchott Al Aasriya</b></td>
                          </tr>
                           <tr>
                              <td align="left" style="font-size: 120%;font-family: arial;">Institut Universitaire Professionnel</b></td>
                          </tr>
                            
                         
                          
                      </table>
                  </td> 
                   <td><!--<img src="../../images/ustm.png" height="70" width="100">--></td>
             </tr>
             <tr>
                 <td style="margin-top: 20px; font-size: 75%;font-family: arial ">No:  UNA/IUP/<?php echo ''.$info['matriculeEtudiant'] ; ?></td>
             </tr>
             </table>           
              <br><br><br><br>
           <table  border="0" align="center">
               <tr><td colspan="3" style="font-size: 200%"  align="center"><b><font color="e36c0a">Attestation de diplôme</font></i></b> <?php //$annee.'-'.($annee +1);?></td></tr>
               <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td align="right"><div style="background-color: #f79646"class="cl"><font style="family:arial; size:20%;color: #ffffff">Année Universitaire &nbsp;&nbsp; </td><td style="font-size: 70%;background-color: " align="right"> <?php echo $anneeD.'-'.(($anneeD+1));?></td></tr>
           </table>
<br><br>
<div class="box-container">
     <p style="font-size:110%;font-family: arial">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Le Directeur de l’Institut Universitaire Professionnel (IUP) de l'Université de  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Nouakchott Al Aasriya (UNA), certifie que l’étudiant(e) :</p>
  <table margin-left="10px" border="0"  align="center" width="100%" margin-top="0">
      <tr><td width="6%" style=""><font style="font-size:50%;font-family: arial"><div class="cl">Prénom :</font></td><td width="20%"  ><b><font color="black" style="font-size:100%;font-family: arial"><?php echo $info['prenom']; ?></td><td width="11%" style=""><font style="font-size:50%;font-family: arial"><div class="cl">Prénom du Pére :</font></td><td width="25%"  ><b><font color="black" style="font-size:100%;font-family: arial"><?php echo $info['prenomPere']; ?></td><td  width="5%" style=""><font style="font-size:60%;font-family: arial"><div class="cl">Nom :</font></td><td style="text-transform: uppercase;font-family: arial" ><b><?php echo $info['nom']; ?></td></tr>
     <style> 
.cl {
    border-top: 1px solid;
    border-right: 1px solid;
    padding: 0px;
    border-color: #e46d0a;
    border-top-right-radius: 2em;
}
</style>
</head>
<body>


      </table>
     
     <table   cellspacing="2" cellpadding="0"  align="center" width="80%">
        
         <tr><td width="15%" style="" ><font color="black" style="font-size:60%;font-family: arial"><div class="cl">No d'Inscription</div> </font></td>
              <td align="center" style=""><b><font style="font-size:75%;" color="black" style="font-size:80%;font-family: arial"><?php echo 'IUP'.$info['matriculeEtudiant'] ; ?></font></b></td>
              
          <td a style=" "><font style="font-size:60%;font-family: arial"  color="black"><div class="cl">Date de Naissance :</div></font></td>
          <td align="center"><font style="font-size:75%;font-family: arial"  ><b><?php $format_date = date("d-m-Y", strtotime($info['dateNaissance'])); echo $format_date; ?></b></font></td>
          <td style=""><font  style="font-size:60%;font-family: arial"  color="black"><div class="cl">Lieu de Naissance :</div></font></td>
           <td align="center"  style=" "><b><font style="font-size:75%;font-family: arial" color="black"><?php echo $info['lieuNaissance'];?></font></b></td>
     
      </tr>
      
      </table>
     <br>
      <p style="font-size:110%;font-family: arial">
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  a passé avec succès les épreuves de la licence appliquée en :</br>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <b><?php echo $info['programme']; ?> - <?php echo $info['idProgramme']; ?></b></br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  à l’issue de l’année

universitaire  <?php echo $anneeD.'-'.(($anneeD+1));?>.
      </p>
      <br>
      <table margin-left="200px"    cellspacing="0" cellpadding="0"  align="center" width="50%">
           <tr><td colspan="2"></td><td  align="center" width="20%"><font style="font-size:40%;" color="black"><div class="cl">Visa Scolarité:</td></tr>
          <tr><td width="50%" style="" ><font color="black" style="font-size:60%;font-family: arial"><div class="cl">Crédits Requis :</div> </font></td>
          <td align="center"   style=""><b><font style="font-size:75%;font-family: arial" color="black" style="font-size:80%;font-family: arial">180</font></b></td>
      </tr>
      <tr ><td   style=""><font style="font-size:60%;font-family: arial"  color="black"><div class="cl">Crédits Capitalisés :</div></font></td>
          <td align="center" style=""><b><font style="font-size:75%;font-family: arial"  ><?php echo $crditVal ;?></b></font></td>
      </tr>
      <tr ><td   style=""><font style="font-size:60%;font-family: arial"  color="black"><div class="cl">Moyenne Générale (L<SUB>1</sub>, L<SUB>2</sub> et L<SUB>3</sub>) : </div></font></td>
          <td align="center" style=" "><b><font style="font-size:75%;"  >
                                                                                                                                               <font style="font-family: arial">   <?php echo number_format($moyenne,2).'' ?></b></font></td>
      </tr>
      <tr><td style=""><font  style="font-size:60%;font-family: arial"  color="black"><div class="cl">Mention :</div></font></td>
          <td align="center"  style=" "><b><font style="font-size:75%;font-family: arial" color="black"><?php echo $mension;?></font></b></td>
      </tr>
      
      </table>
      <br>
      <p style="font-size:70%;font-family: arial">
          <b>    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; En foi de quoi, cette attestation est délivrée pour servir et valoir ce que de droit.
      </p>
      <br>
      <table border="0"  align="left" width="50%" height="200px" >
          <tr><td colspan="3" ><font style="font-size:100%;font-family: arial"</td></tr>
      <tr><td colspan="3" ><font style="font-size:100%;font-family: arial"><div style="background-color: #f79646"class="cl"><font style="family:arial; size:100%;color: black">Stages et travaux de terrain : </td><td style="font-size: 70%;background-color: " aStages et traveaux de terrain</td></tr>
      <tr><td style="" ><font style="font-size:80%;font-family: arial" ><div class="cl" style="background-color: #efe6e2">Activité</font></td><td style=""  align="center"><font style="font-size:80%;font-family: arial"  align="center"><div style="background-color: #efe6e2" class="cl">Durée/semaine</font></td><td style="" align="center" ><font style="font-size:80%;font-family: arial" ><div style="background-color: #efe6e2" class="cl">Crédits</font></td></tr>
      <?php $sem=0;$ects=0; 
      if(!empty($stages_travaux))
      for($i=0;$i<=count($stages_travaux);$i++) {
          $sem=$sem+$stages_travaux['duree'][$i];
          $ects=$ects+$stages_travaux['ects'][$i];
     echo '<tr><td style="" width="180px"><font style="font-size:80%;font-family: arial" ><div class="cl">'.$stages_travaux['titre'][$i].'</td><td style=""  align="center"><font style="font-size:100%;font-family: arial">'.$stages_travaux['duree'][$i].'</td><td style=""  align="center"><font style="font-size:100%;font-family: arial">'.$stages_travaux['ects'][$i].'</td></tr>';
      }?>
     
      <tr><td style="" ><font style="font-size:70%;font-family: arial" ></font></td><td style=""  align="center"><font style="font-size:70%;font-family: arial" ><?php echo 'Total: '.$sem.' Semaines'; ?></font></td><td  align="center"style="" ><font style="font-size:70%;font-family: arial" ><?php echo 'Total: '.$ects.' Crédits'; ?></font></td></tr>
      </table>
   <table border="0"  align="right" width="40%"height="100px" >
      <tr><td ><font style="font-size:70%;font-family: arial">Fait à Nouakchott, le<mark style="background-color: dbe5f1;
                                                                                           ">  <?php echo date('d/m/Y');?></mark></font><br></td></tr>
      <tr><td style="margin-top:200px" ><b ><font style="font-family: arial" >Cheikh Ahmed ELY AHMED</font></b></td></tr>
   </table>
 </div>
 
     
<br><br><br><br>
    <br><br><br><br>
    <br>  <br>  <br>  <br>  <br><br>
        
                           <table border="0"   width="80%" margin-top="50">
      <tr><td style="border-bottom: 1px solid #f79646; "></td></tr>
      </table>
    
    <p style="font-size:60%;font-family: arial"><font  color="black">
    
       
En aucun cas, il ne sera délivré de duplicata de cette attestation dont le titulaire peut en faire établir des

copies légalisées qui lui seraient nécessaires. Cette attestation est valable pour une durée d’un an.  
       
</p>

        </div> <!-- end of right content-->
           
        </div>
   </div>
</div>   <!--end of center content -->  
 </td></tr>
            </table>
<div class="clear"></div>
</div> <!--end of main content-->


<?php include(APPPATH.'views/include/footer.php'); ?>
<script type="text/javascript">
<!--
function imprimer(id){
str=document.getElementById(id).innerHTML
newwin=window.open('','printwin','left=100,top=100,width=400,height=400')
newwin.document.write('<HTML>\n <HEAD>\n')
// Hafedh
// Supression de l'entete lors de l'impression
newwin.document.write('<style>@page { size: auto;  margin: 0mm; }</style>\n')
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
</script>

</body>
      </html>

