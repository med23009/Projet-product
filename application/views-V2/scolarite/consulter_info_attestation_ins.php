<?php include(APPPATH.'views/include/header.php');
include('include/menu.php');
?>


 <div class="container">
    <div class="col-xs-12 hl-left"> 
            
<button  onClick="imprimer('printable');" style="float:right; height: 30px; background-color:#cceac4; width: 160px; margin-right:185px; margin-top:50px;"><b> Imprimer le fiche </b></button>

    
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
               <tr><td  style="font-size: 120%" align="center"><b>Fiche d'inscription pédagogique <?php echo($annee."-".($annee +1));?></b></td></tr>
                <tr><td style="font-size: 70%" align="center">LMD - Système (License - Master - Doctorat)</td></tr>
           </table>
            
          
            <br> <br>
            <table  border="0" width="100%" style="border-collapse: collapse;line-height: 8px">
                <tr>
                    <td>
                
          <table  width="100%" style="border-spacing: 4px; marign: 20px 20px 20px; border-bottom: 2px solid #E26C09;border-top: 2px solid #E26C09;font-family:Times; font-size:11.25px;line-height: 12px; " cellspacing="0"> 
              
              <tr>
                 
               <td><?php echo 'Nom de l\'Etudiant (e) :      '; ?></td>
               <td><strong><?php echo $info['nom']; ?></strong></td>
               <td><?php echo 'Prénom(s) :      '; ?></td>
               <td><strong><?php echo $info['prenom']; ?></strong></td>
               <td></td> <td></td> <td></td> <td></td>
             </tr>
             <tr>
               <td id="contenu"><?php echo 'Date et lieu de Naissance :      '; ?></td>
               <td id="contenu"><strong><?php 
               $format_date = date("d/mY", strtotime($info['dateNaissance']));
                 
               echo $format_date.' '.$info['lieuNaissance']; ?></strong></td>
               <td id="contenu"><?php echo 'Niveau :      L'.$niveau ; ?></td>
               <!--
               <td id="contenu">
                   
                   <table  border="0" style="font-family:Times; font-size:10px;line-height: 2px" cellspacing="5">
                       <tr>
                           <td id="contenu"><? php  echo 'L'.$niveau ; ?></td>
                           <td id="contenu"><? php echo 'Genre : ' ; ?></td>
                           <td id="contenu"><? php echo $info['genre'] ; ?></td>
                           <td id="contenu"><? php echo 'Date d\'inscription :      '; ?></td>
                           <td id="contenu"><? php echo $info['dateInscription']; ?></td>
                        
                       </tr>
                   </table>
                          
                  
               </td>
               -->
               
               <td id="contenu"><strong><?php  /*echo $info['niveau'] ;*/ ?></strong></td>
                           <td id="contenu"><?php echo 'Genre : ' ; ?></td>
                           <td id="contenu"><strong><?php echo $info['genre'] ; ?></strong></td>
                           <td id="contenu"><?php echo 'Date d\'inscription :      '; ?></td>
                           <td id="contenu"><strong><?php echo date("d/m/Y", strtotime($info['dateInscription'])); ?></strong></td>
             </tr>
             <tr>
               <td id="contenu"><?php echo 'Filière de spécialité :      '; ?></td>
               <td id="contenu"><strong><?php echo $info['programme']; ?></strong></td>
               <td id="contenu"><?php// echo 'Semestre   '; ?></td>
               <!--
               <td id="contenu">
                   <table  border="0" border="0" style="font-family:Times; font-size:10px;line-height: 2px"cellspacing="5">
                       <tr>
                           <td id="contenu"><?php// echo $numSem ; ?></td>
                           <td id="contenu"><?php echo 'Numero d\'inscription : ' ; ?></td>
                           <td id="contenu"><?php echo 'IUP'.$info['matriculeEtudiant'] ; ?></td>
                       </tr>
                   </table>               
               </td>
               -->
                <td id="contenu"><strong><?php //echo $numSem ; ?></strong></td>
                           <td id="contenu"><?php echo 'N° inscription : ' ; ?></td>
                           <td id="contenu"><strong><?php echo 'IUP'.$info['matriculeEtudiant'] ; ?></strong></td>
             </tr>
                    
        </table>
          </td>          
         </tr>
         </table>
            <br>
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
            <script>table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
</style></script>
            <table  class="table-striped" border="1" style="font-size:1.5em;" width="100%"><tr><th align="center">Semestres impairs</th><th align="center">Semestres pairs </th></tr>
              <!-- -->  
              <tr><td align="top"><table  class="table-striped" style="font-size:0.5em;" border="1" width="100%" >
                           <tr>
                             <td >Choix</td>
                             <td >Module</td>
                             <td  colspan="1">Element</td>
                              <td >Ects</td>
                             <td >S</td>
                             
                             
                            
                             </tr>
                             
                         
                         
                         <?php
                         
                         for ($i = 0; $i < count($moduleR_impairelist); ++$i) { ?>
                              <tr>
                                
                                    <td> <input type="checkbox"  disabled readonly checked  ></td>
        
                                   <td><?php echo $moduleR_impairelist[$i]->idModule; ?></td>
                                   <td><?php echo '['.$moduleR_impairelist[$i]->sigle .']'. $moduleR_impairelist[$i]->titre; ?></td>
                                   <td><?php echo $moduleR_impairelist[$i]->ects; ?></td>
                                   <td><?php echo $moduleR_impairelist[$i]->semestre; ?></td>
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
                                  echo '<td id="contenu" > <input type="checkbox"   ></td>' ;
                               }else{
                                   
                                     echo '<td id="contenu"> <input type="checkbox"  disabled readonly checked  ></td>' ;
                                   
                               }
                             ?>
                                   <td><?php echo $modules_a_etudies_impairelist[$i]->idModule; ?></td>
                                    <td><?php echo '['.$modules_a_etudies_impairelist[$i]->sigle .']'. $modules_a_etudies_impairelist[$i]->titre; ?></td>
                                   <td><?php echo $modules_a_etudies_impairelist[$i]->ects; ?></td>
                                <?php   echo '<td>'.$s.'</td>' ;?>
                              </tr>
                            <?php }}?>
                              <?php
                           
                           echo'</table></td>';
                          
                       ?>   
                              <td   align="top"><table  class="table-striped" style="font-size:0.5em;"  border="1"  width="100%" >
                           
                             <td >Choix</td>
                             <td >Module</td>
                             <td colspan="1">Element</td>
                              <td >Ects</td>
                             <td >S</td>
                            
                             
                             
                            
                             </tr>
                            
                             <?php for ($i = 0; $i < count($moduleR_pairelist); ++$i) { ?>
                              <tr>
                                
                                    <td> <input type="checkbox"  disabled readonly checked  ></td>
        
                                   <td><?php echo $moduleR_pairelist[$i]->idModule; ?></td>
                                    <td><?php echo '['.$moduleR_pairelist[$i]->sigle .']'. $moduleR_pairelist[$i]->titre; ?></td>
                                   <td><?php echo $moduleR_pairelist[$i]->ects; ?></td>
                                   <td><?php echo $moduleR_pairelist[$i]->semestre; ?></td>
                                <?php  // echo '<td>'.(($s+1)-2).'</td>' ;?>
                              </tr>
                         <?php } ?>
                              <?php  if($redoublant!=null){
                                  
                            }  else {
                                  
                              
                               for ($i = 0; $i < count($modules_a_etudies_pairelist); ++$i) { 
                             echo'<tr>';
                                
                                     if(($moduleR_pairelist !=null)){
                                  echo '<td id="contenu" > <input type="checkbox"   ></td>' ;
                               }else{
                                   
                                     echo '<td id="contenu"> <input type="checkbox"  disabled readonly checked  ></td>' ;
                                   
                               }
                              ?>
                                   <td><?php echo $modules_a_etudies_pairelist[$i]->idModule; ?></td>
                                    <td><?php echo '['.$modules_a_etudies_pairelist[$i]->sigle .']'. $modules_a_etudies_pairelist[$i]->titre; ?></td>
                                   <td><?php echo $modules_a_etudies_pairelist[$i]->ects; ?></td>
                                <?php   echo '<td>'.($s+1).'</td>' ;?>
                              </tr>
                         <?php }}?>
                              <?php
                           echo'</table></td></tr>';
                          
                       ?>   
            </table>
             
                    
   
            <table   border="0" align="left" width="100%" style="font-family:Times; font-size:10px;" cellspacing="10">
             <tr>
                 <td><BR><BR><BR>Signature de l'étudiant<BR> Date : <br> Le <?php echo date('d/m/Y');?></td>
                  <td align="right" ><b><br>Le Cordinateur de la filière </b></td>
              </tr>
            </table></td><td><td></tr>
            
         
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
newwin.document.write('<style>@page { size: auto;  margin: 2mm; }</style>\n')
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