<?php   include(APPPATH.'views/include/header.php');
include('include/menu.php');
?>


    
 <div class="container">
    <div class="col-xs-12 hl-left">  
            
        <input type="button" value="Imprimer le bulletin " onClick="imprimer('printable');" style="float:right; height: 30px; background-color:#cceac4; width: 160px; margin-right:185px; margin-top:50px;"><b> </b></button>

       
        <div id="printable">
            
            <table  border="0" width="100%">
             <tr>
                 <td><img src="../../images/logo_iup_abra.png" height="70" width="90" ></td>
                  
                  <td> 
                      <table  border="0" style="line-height: 10px">
                          <tr>
                              <td align="center" style="font-size: 120%;font-family: Times;"><b>Institut Universitaire Professionnel</b></td>
                          </tr>
                          <tr>
                          <td>
                          <table  border="0" style="line-height: 7px">
                          <tr>
                              <td style="font-size: 50%;border-top: 1px solid black">Avenue Roi Fayçal, Téléphone : +222 45 25 04 43 Mobile : +222 43 48 64 81, Email : scolariteiup@gmail.com</td>
                          </tr>
                          <tr>
                              <td style="font-size: 50%">Boite Postale : 880, Siteweb : www.ustm.mr/iup, Nouakchott-Mauritanie</td>
                          </tr>
                          </table>
                              </td>
                          <tr/>
                      </table>
                  </td> 
                   <td><!--<img src="../../images/ustm.png" height="70" width="100">--></td>
             </tr>
             </table>           
           <table  border="0" width="100%">
               <tr><td  style="font-size: 120%" align="center"><b>BULLETIN DE NOTES <?php echo($annee."-".($annee +1));?></b></td></tr>
                <tr><td style="font-size: 70%" align="center">LMD - Système (License - Master - Doctorat)</td></tr>
           </table>
            
          
            <br> <br>
            <table  border="0" width="100%" style="border-collapse: collapse;line-height: 8px">
                <tr>
                    <td>
                
         <table border="0"  width="100%" style="border-spacing: 4px; marign: 20px 20px 20px; border-bottom: 2px solid #E26C09;border-top: 2px solid #E26C09;font-family:Times; font-size:11.25px;line-height: 12px; " cellspacing="0"> 
              
              <tr>
                 
               <td><?php echo 'Nom de l\'Etudiant (e) :      '; ?></td>
               <td width="30%"><strong><?php echo $info['nom']; ?></strong></td>
               <td><?php echo 'Prénom(s) :      '; ?></td>
               <td colspan="5"><strong><?php echo $info['prenom']; ?></strong></td>
               
             </tr>
             <tr>
               <td id="contenu"><?php echo 'Date et lieu de Naissance :      '; ?></td>
               <td id="contenu"><strong><?php echo date('d/m/Y',strTotime($info['dateNaissance'])).' '.$info['lieuNaissance']; ?></strong></td>
               <td id="contenu"><?php echo 'Niveau :      '; ?></td>
               <!--
               <td id="contenu">
                   
                   <table  border="0" style="font-family:Times; font-size:10px;line-height: 2px" cellspacing="5">
                       <tr>
                           <td id="contenu">< ?php  echo $info['niveau'] ; ?></td>
                           <td id="contenu">< ?php echo 'Genre : ' ; ?></td>
                           <td id="contenu">< ?php echo $info['genre'] ; ?></td>
                           <td id="contenu">< ?php echo 'Date d\'inscription :      '; ?></td>
                           <td id="contenu">< ?php echo $info['dateInscription']; ?></td>
                        
                       </tr>
                   </table>
                          
                  
               </td>
               -->
               
               <td id="contenu"><strong><?php  echo $info['niveau'] ; ?></strong></td>
                           <td id="contenu"><?php echo 'Genre : ' ; ?></td>
                           <td id="contenu"><strong><?php echo $info['genre'] ; ?></strong></td>
                           <td id="contenu"><?php echo 'Date d\'inscription :      '; ?></td>
                           <td id="contenu"><strong><?php echo date("d/mY", strtotime($info['dateInscription'])); ?></strong></td>
             </tr>
             <tr>
               <td id="contenu"><?php echo 'Filière de spécialité :      '; ?></td>
               <td id="contenu"><strong><?php if ($info['idProgramme']=='MAEF')echo 'Maths. Appliquées à l\'Eco et à la Finance'; else echo $info['programme']; ?></strong></td>
               <td id="contenu"><?php echo 'Semestre   '; ?></td>
               <!--
               <td id="contenu">
                   <table  border="0" border="0" style="font-family:Times; font-size:10px;line-height: 2px"cellspacing="5">
                       <tr>
                           <td id="contenu"><?php echo $numSem ; ?></td>
                           <td id="contenu"><?php echo 'Numero d\'inscription : ' ; ?></td>
                           <td id="contenu"><?php echo 'IUP'.$info['matriculeEtudiant'] ; ?></td>
                       </tr>
                   </table>               
               </td>
               -->
                <td id="contenu"><strong><?php echo $numSem ; ?></strong></td>
                           <td id="contenu"><?php echo 'N° inscription : ' ; ?></td>
                           <td id="contenu"><strong><?php echo 'IUP'.$info['matriculeEtudiant'] ; ?></strong></td>
             </tr>
                    
        </table>
          </td>          
         </tr>
         </table>
            <br>
            <table border="1"  width="100%" style="border-collapse: collapse;line-height: 12px">
                <tr><td>
        <table border="0"  width="100%" style="font-family:Times; font-size:10.5px;line-height: 16px ; " cellspacing="0" >
                           <?php
                           
                            echo '<tr  style="background-color:#E9E3E3">
                            <td width="4%" widt style="border-bottom: 1px solid black"><strong>Code</strong></td>
                            <td colspan="2"  style="border-bottom: 1px solid black"><strong>Intitulé du Module</strong></td>
                           
                            <td  width="1%"style="border-bottom: 1px solid black"><strong>ECTS</strong></td>
                            
                            <td style="border-bottom: 1px solid black"></td>
                            <td style="border-bottom: 1px solid black"></td>
                            <td width="1%" style="border-bottom: 1px solid black"><strong></strong></td>                           
                             <td style="border-bottom: 1px solid black"><strong>NCC</strong></td>
                             <td style="border-bottom: 1px solid black"><strong>NSN</strong></td>
                             <td style="border-bottom: 1px solid black"><strong>NSR</strong></td>
                             <td style="border-bottom: 1px solid black"><strong>NFE</strong></td>
                             <td style="border-bottom: 1px solid black"><strong>Capit</strong></td>
                             <td align="center" style="border-bottom: 1px solid black"><strong>NM</strong></td>
                             <td  align="center" style=" border-bottom: 1px solid black"><strong>Validation</strong></td>
                             </tr>';  
                          ?>  
            <tr><td  height="10" colspan=""></td></tr>
                           <?php 
                           if(isset($modules)){
                           foreach ($modules as $idModule=>$module) {
                       //   echo'td>'.       
            //'<div style="position: relative">
              //  <img src="../../images/ustm.png" style="width:2em; height:2em; border: 0; padding: 0" />
               // <span style="position: absolute; top: 50%; left: 50%; margin-top: -0.6em; margin-left: -0.3em">a</span> 
            //</div>'.  $idModule.     '</td>';
                             echo '<tr><td  style="background-color:#E26C09; border-radius: 0px 0px 0px 0px">'.$idModule.'</td>' ;
                              echo '<td colspan= "2" style="background-color:#E26C09;border-radius: 0px 0px 0px 0px">'.$module['titre'].'</td>' ;
                              echo '<td align="center" colspan= "1" style="background-color:#E26C09;border-radius: 0px 30px 0px 0px">'.$module['ects'].'</td>' ;
                              echo '<td colspan= "11" ></td></tr>';                           
                            
                              echo '<tr><td></td>'
                              . '<td width="5%" style="border-bottom: 1px solid black;">Code</td>'
                                      . '<td width="30%" style="border-bottom: 1px solid black;"> Intitulé Elément de Module </td>'
                                      //.'<td style="border-bottom: 1px solid black;"></td>'
                                      //. '<td style="border-bottom: 1px solid black;"></td> '
                                      .'<td style="border-bottom: 1px solid black;"></td>';
                              echo '<td colspan= "9" style="border-bottom: 1px solid black;"></td></tr>';
                              $i=0;
                              foreach ($module['elements'] as $sigle=>$element) {
                                  if($element['capit']=='CI' || $element['capit']=='CE' ){
                                      $element['capit']='C';
                                  }
                                  if($module['decision']=='VE' || $module['decision']=='VC'){
                                      $module['decision']='V';
                                  }
                                  if($i==0){
                                         if ($element['status']=='0') {
                                          
                                      echo '<tr><td></td><td   width="9%">'.$sigle.'</td>' ;
                                         echo '<td >'.$element['titre'].'</td>';
                                            echo '<td align="center">'.$element['ects'].'</td>' ;
                                      }
                                      /*else if(in_array($element['sigle'], $nc))  {
                                          
                                      echo '<tr><td></td><td   width="9%">'.$sigle.'  **</td>' ;
                                         echo '<td >'.$element['titre'].'</td>';
                                            echo '<td  align="center">'.$element['ects'].'</td>' ;
                                      }*/else{
                                          echo '<tr><td></td><td   width="9%">'.$sigle.'  <font color="red"> *</font></td>' ;
                                         echo '<td >'.$element['titre'].'</td>';
                                            echo '<td  align="center">'.$element['ects'].'</td>' ;
                                      }
                                      
                                              echo'<td></td>';
                                            echo'<td></td><td></td>';
                                            if(number_format($element['ncc'],2)==0){
                                            echo '<td style="border-bottom: 1px solid black;"></td>' ;;
                                            }else{
                                                 echo '<td style="border-bottom: 1px solid black;">'.number_format($element['ncc'],2).'</td>' ;;
                                            }
                                            if(number_format($element['nsn'],2)==0){
                                            echo '<td style="border-bottom: 1px solid black;"></td>' ;;
                                            }else{
                                                 echo '<td style="border-bottom: 1px solid black;">'.number_format($element['nsn'],2).'</td>' ;
                                            }
                                             if(number_format($element['nsr'],2)==0){
                                            echo '<td style="border-bottom: 1px solid black;"></td>' ;;
                                            }else{
                                                 echo '<td style="border-bottom: 1px solid black;">'.number_format($element['nsr'],2).'</td>' ;
                                            }
                                            
                                            
                                             echo '<td style="border-bottom: 1px solid black;">'.$element['nfe'].'</td>' ;
                                             echo '<td style="border-bottom: 1px solid black;">'.$element['capit'].'</td>' ;
                                             echo '<td rowspan = "'.$module['nb'].'" align="center"><strong>'.$module['nm'].'</strong></td>' ;
                                             echo '<td rowspan = "'.$module['nb'].'" align="center">'.$module['decision'].'</td></tr>' ;
                                 
                                           $i=1;  
                                  }else if($i <$module['nb']-1){
                                               if ($element['status']=='0') {
                                          
                                      echo '<tr><td></td><td   width="9%">'.$sigle.'</td>' ;
                                         echo '<td >'.$element['titre'].'</td>';
                                            echo '<td align="center">'.$element['ects'].'</td>' ;
                                      }/*
                                      else if(in_array($element['sigle'], $nc['sigle']))  {
                                          
                                      echo '<tr><td></td><td   width="9%">'.$sigle.'  **</td>' ;
                                         echo '<td >'.$element['titre'].'</td>';
                                            echo '<td  align="center">'.$element['ects'].'</td>' ;
                                      }*/else{
                                          echo '<tr><td></td><td   width="9%">'.$sigle.'  <font color="red"> *</font></td>' ;
                                         echo '<td >'.$element['titre'].'</td>';
                                            echo '<td  align="center">'.$element['ects'].'</td>' ;
                                      }
                                               echo'<td></td><td></td><td></td>';
                                           
                                             if(number_format($element['ncc'],2)==0){
                                            echo '<td style="border-bottom: 1px solid black;"></td>' ;;
                                            }else{
                                                 echo '<td style="border-bottom: 1px solid black;">'.number_format($element['ncc'],2).'</td>' ;;
                                            }
                                            if(number_format($element['nsn'],2)==0){
                                            echo '<td style="border-bottom: 1px solid black;"></td>' ;;
                                            }else{
                                                 echo '<td style="border-bottom: 1px solid black;">'.number_format($element['nsn'],2).'</td>' ;
                                            }
                                             if(number_format($element['nsr'],2)==0){
                                            echo '<td style="border-bottom: 1px solid black;"></td>' ;;
                                            }else{
                                                 echo '<td style="border-bottom: 1px solid black;">'.number_format($element['nsr'],2).'</td>' ;
                                            }
                                             echo '<td style="border-bottom: 1px solid black;">'.$element['nfe'].'</td>' ;
                                             echo '<td style="border-bottom: 1px solid black;">'.$element['capit'].'</td></tr>' ;
                                    $i=$i+1;
                                             
                                  }else{
                                          if ($element['status']=='0') {
                                          
                                      echo '<tr><td></td><td   width="9%">'.$sigle.'</td>' ;
                                         echo '<td >'.$element['titre'].'</td>';
                                            echo '<td align="center">'.$element['ects'].'</td>' ;
                                      }
                                     /* else if(in_array($element['sigle'], $nc))  {
                                          
                                      echo '<tr><td></td><td   width="9%">'.$sigle.'  **</td>' ;
                                         echo '<td >'.$element['titre'].'</td>';
                                            echo '<td  align="center">'.$element['ects'].'</td>' ;
                                      }*/else{
                                          echo '<tr><td></td><td   width="9%">'.$sigle.'  <font color="red"> *</font></td>' ;
                                         echo '<td >'.$element['titre'].'</td>';
                                            echo '<td  align="center">'.$element['ects'].'</td>' ;
                                      }
                                        // echo '<tr><td></td><td width="9%">'.$sigle.'</td>' ;
                                         
                                         
                                            echo'<td></td>';
                                            echo'<td></td>';
                                            echo'<td></td>';
                                             if(number_format($element['ncc'],2)==0){
                                            echo '<td style="border-bottom: 1px solid black;"></td>' ;;
                                            }else{
                                                 echo '<td style="border-bottom: 1px solid black;">'.number_format($element['ncc'],2).'</td>' ;;
                                            }
                                            if(number_format($element['nsn'],2)==0){
                                            echo '<td style="border-bottom: 1px solid black;"></td>' ;;
                                            }else{
                                                 echo '<td style="border-bottom: 1px solid black;">'.number_format($element['nsn'],2).'</td>' ;
                                            }
                                             if(number_format($element['nsr'],2)==0){
                                            echo '<td style="border-bottom: 1px solid black;"></td>' ;;
                                            }else{
                                                 echo '<td style="border-bottom: 1px solid black;">'.number_format($element['nsr'],2).'</td>' ;
                                            }
                                             echo '<td>'.$element['nfe'].'</td>' ;
                                             echo '<td>'.$element['capit'].'</td></tr>' ;
                                             $i=$i+1;
                                       
                                   }
                                   
                              }
                              
                           }}
                          
                       ?>     
                </table></td></tr></table>
             
             <p>   </p>
      
         <table border="0"  width="100%" style="border-radius: 0px 30px 0px 30px;font-family:Times; font-size:10px; border-collapse: collapse;background-color: #BFBEBC;" width="100%">
                    <tr><td>
                    <table border="0" width="100%" style="font-family:Times; font-size:12px;line-height: 20px" cellspacing="0">
                             <?php
                     if(isset($semestre) && $semestre['inscrit']=='OK'){
                             echo '<tr><td style="background-color: #E26C09;border-radius: 0px 0px 0px 0px;"> Total Crédits Validés : </td>' ;
                             echo '<td style="background-color: #E26C09;border-radius: 0px 0px 0px 0px;" ><strong>'.$semestre['ects'].'</strong></td>' ;
                             echo '<td style="background-color: #E26C09;border-radius: 0px 0px 0px 0px;"> Validation du Semestre </td>' ;
                             echo '<td style="background-color: #E26C09;border-radius: 0px 0px 0px 0px;"><strong>'.$semestre['validation']. '</strong></td>' ;
                             echo '<td colspan= "1" style="background-color: #E26C09;border-radius: 0px 0px 0px 0px;"> Note semestre : </td>' ;
                             echo '<td style="background-color: #E26C09;border-radius: 0px 0px 0px 0px;"><strong>'.$semestre['note']. '</strong></td>' ;
                             echo '<td style="background-color: #E26C09;border-radius: 0px 0px 0px 0px;"> Décision</td>' ;
                             echo '<td style="background-color: #E26C09;border-radius: 0px 40px 0px 0px;" ><strong>'.$semestre['decision']. '</strong></td></tr>' ;
                             //echo '<td ></td></tr>' ;
                           }
                                          
                           ?> </td></tr>
                         </table>
                    </table>
          
            <table   border="0" align="left" width="100%" style="font-family:Times; font-size:10px;" cellspacing="10">
             <tr>
                  <td>Date : <br> Le <?php echo date('d/m/Y');?></td>
                  <td align="right" ><b>P/O Directeur&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>Le Responsable de la Scolarité </b></td>
              </tr>
             </table>
            
         <br><br><br><br><br><br><br><br>
            <!--<label style="font-family:Verdana; font-size:6px;line-height: 3px">ACRONYMES :  </label><br><hr><br>-->
             <table  border="0"  align="left" width="100%" style="font-family:Times; font-size:6px; line-height: 4px">
                 <tr>
                     <td>
                 <table  border="0"  align="left" width="100%" style="font-family:Times; font-size:8px; line-height: 10px">
                     <tr>
                         <td colspan="2" style="background-color: #BFBEBC;border-radius: 0px 30px 0px 0px;width:2px;hight:20px">ACRONYMES :</td>
                     <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                     <td colspan="10"></td>
                     <tr/>
                 </table>
                     <td/>
                     <td colspan= "3"></td>
                 </tr>
                 <tr>
                  <td>NCC : Note Contrôle Continu</td>
                  <td>NSN : Note Session Noramale</td>
                   <td>NSR : Note Session de Rattrapage</td>
                   <td>VM : Validation du Module</td>
                    
              </tr>
              <tr>
                  <td>NFE : Note Finale d'Elément</td>
                  <td>C : Capitalisation</td>
                   <td>NM : Note Module</td>
                   <td>ECTS : Système Européen de Transfert de Crédits</td>
                   <td>* : Element caché</td>
                   
              </tr>
              <tr>
                  <td>NC : Non Capitalisé</td>
                  <td>NV: Non Validé</td>
                   <td></td>
                   <td></td>
                   
              </tr>
             </table>
            <br><br>   <br>  
             <table  border="0" align="center" width="100%" style="font-family:Times; font-size:10px; line-height: 12px" cellspacing="0">
             <tr>
                  <td>NB : Ce document n'est pas valable sans signature</td>
                  <td> Bulletin de notes de </td>
                  <td> <?php echo $info['prenom'].' '.$info['nom']; ?></td>                 
              </tr>
             </table>
            
                    
                    <table border="0" width="100%" style="font-family:Times; font-size:10px;line-height: 20px;border-collapse: collapse" cellspacing="0">
                   
                           <tr><td colspan= "1" style="background-color: black; height:20px"> </td>
                               <td colspan= "1" style="background-color: #BFBEBC; height:20px"> </td>
                               <td colspan= "1" style="background-color: #BFBEBC; height:20px"> </td>
                               <td colspan= "1" style="background-color: #BFBEBC; height:20px"> </td>
                               <td colspan= "1" style="background-color: #BFBEBC; height:20px"> </td>
                               <td colspan= "1" style="background-color: #BFBEBC; height:20px"> </td>
                               <td colspan= "5" style="background-color: #BFBEBC; height:20px"> </td>                          
                </tr>
                <tr><td  colspan= "11" style="border-bottom: 1px solid black;"></td></tr>
             </table>
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
</script>