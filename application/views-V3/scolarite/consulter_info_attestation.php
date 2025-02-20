<?php include(APPPATH.'views/include/header.php');
include('include/menu.php');
?>

 <div class="container">
    <div class="col-xs-12 hl-left">
            
<button  onClick="imprimer('printable');" style="float:right; height: 30px; background-color:#cceac4; width: 160px; margin-right:185px; margin-top:50px;"><b> Imprimer l'attestation </b></button>

     
        <div id="printable">
            
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
                   <td><!--<img src="../../images/ustm.png" height="70" width="100">--></td>
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
                  <b><?php echo $prenomArabe . ' '. $nomArabe ;?></b> 
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
                 <td id="contenu"><label><?php echo '  Nom de famille :     <b> '.$nom; ?></b></label></td>
               <td></td> <td></td><td></td> 
               <td id="contenu" align="right"><label><?php echo '   الاسم العائلي  '.'   :  <b> ' .$nomArabe; ?></b></label></td>
                <td rowspan= "6">
                   
        <img  style="width: 100px; height: 100px;" src="<?php
        
        if(file_exists("C:\wamp\www\laureat\photos\IUP".$matricule.'.GIF'))
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
                    ?>
                            
                        </table>
                    </td> <!-- ici le tableau de S2-->
                </tr>
                       
            </table>
            <hr width='100%' >
                <br>
           
            <p align="center"> 
            <table  border="0" align="center">
             <tr>
                 <td ALIGN="center"><font size='1'>Fait à Nouakchott, le <?php echo date('d/m/Y');?></font>
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
newwin=window.open('','printwin','left=100,top=100,width=400,height=400')
newwin.document.write('<HTML>\n <HEAD>\n')
// Hafedh
// Supression de l'entete lors de l'impression
newwin.document.write('<style>@page { size: auto;  margin: 2.5mm; }</style>\n')

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