<?php include(APPPATH.'views/include/header.php');
include('include/menu.php');
?>

<div class="container">
    <div class="col-xs-12 hl-left"> 
            
<button  onClick="imprimer('printable');" style="float:right; height: 30px; background-color:#cceac4; width: 160px; margin-right:185px; margin-top:50px;"><b> Imprimer la fiche </b></button>

  
        <div id="printable">
            
            <table style="font-size:1em;" width="100%">
                <tr><td>
             <table  border="0"  align="center">
             <tr>
                 <td><img src="../../images/logo_iup_abra.png" height="70" width="70" ></td>
                  
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
             </table>  
            <table  style="font-size:1.1em;" border="0" align="center">
               <tr><td  ><b><center align="center"> Reçu d'inscription <?php echo($annee."-".($annee +1));?></center></b></td></tr>

           </table> 
            <table   border="1" align="center"  width="90%" style="font-family:Times; font-size:10px;" cellspacing="0">
             <tr>
                 <td>Nouakchott : </td><td> Date <?php echo date('d/m/Y');?></td><td></td>
                  
              </tr>
              <tr>
                  <td colspan="2">
                      <table border="0" style="font-size:1em;" border="0"><tr><td>No d’Inscription</td><td><?php echo  'IUP'.$info['matricule']; ?></td><td rowspan="4"> <img  style="width: 80px; height: 80px;" src="<?php
        
        if(file_exists("C:\wamp\www\laureat\photos\IUP". $info['matricule'].'.GIF'))
        echo "../../photos/IUP". $info['matricule'].'.GIF';
        else echo "../../photos/IUP". $info['matricule'].'.bmp'; 
   ?> "onerror="this.src='../../photos/default.gif';"/>



              
                </td></tr><?php $type=null;
                if($info['regimeEtablissements']==0){
                    $type="Public";
                }else{
                     $type="Privé";
                    
                }
                
                ?>
                          <tr><td>Info. BAC</td><td><?php echo $info['num_bac'].' -'.$info['infoBac'].' -'.$info['nomEtablissement'].'-'.$type; ?></td></tr>
                           <tr><td>prénom :</td><td><?php echo $info['prenom']; ?></td></tr>
                           <tr><td>Prénom du Père :</td><td><?php echo  $info['prenomPere']; ?></td></tr>
                           <tr><td>Nom de Famille :</td><td><?php echo $info['nom']; ?></td></tr>
                          <tr><td>Filière de spécialité :</td><td><?php echo $infoEtud['programme']; ?></td></tr>
                         
                      </table>  
                      
                  </td>
                  
                  <td>
                       <table style="font-size:1em;"><tr><td>Système: </td><td>LMD</td></tr>
                          <tr><td>Frais Scolarité :</td><td>600 Ouguiyas</td></tr>
                          <tr><td>Année Universitaire :</td><td> <?php echo($annee."-".($annee +1));?></td></tr>
                           <tr><td>Tuteur de l'étudiant :</td><td> <?php echo $info['nomParents'].'Tél :'.$info['telephoneParents'];?></td></tr>
                      </table> 
                  </td>
                  
              </tr>
               <tr>
                  <td background="red" colspan="2">
                       <table style="font-size:1em;"><tr><td>Reçu d’Inscription No: </td><td><?php echo$infoR['num_recu'];?></td></tr>
                         
                      </table> 
                  </td>
                  
                  <td >
                       <table style="font-size:1em;"><tr><td>Saisi par</td><td>Ahmed Brahim  (Chef Service Scolarité)</td></tr>
                          <tr><td>Date Saisie</td><td><?php echo  $infoR['date_saisi'];?></td></tr>
                          
                      </table> 
                  </td>
                  
              </tr>
              <tr>
                  <td colspan="2">
                       <table style="font-size:1em;"><tr><th>Dossier d'inscription :</th></tr>
                           <tr>
                               <td><input type="checkbox" checked /> 	Quittance des Frais d'inscription </br>
                                   <input checked type="checkbox" />	Fiche d'inscription pédagogique </br>                    
               <input checked type="checkbox" />	Quatre (4) photos d’identité récentes </br>
               
              <input checked type="checkbox" />	Relevé de Note du Baccalauréat (Original) +
                Copie légalisée </br>
                 <input checked type="checkbox" />	Extrait d'acte de naissance </br>
               <input checked type="checkbox" />	Copie de CIN ou Equivalent</td></tr>
                          
                      </table> 
                  </td>
                  
                  
                  <td ROWSPAN="2">
                       <table style="font-size:1em;">
                           <tr><td> <U>Signature et Cachet</U></td></tr>
                          
                      </table> 
                  </td>
                  
              </tr>
              <tr>
              <td  colspan="2">
                       <table style="font-size:1em;"> <tr><td>Pour un montant total de</td><td>                    600</br>six cents</td></tr>
                      </table> 
              </td></tr>
            </table> </td>
                </tr>
               
                <tr><td></td></tr> 
                <tr><td></td></tr> 
                <tr><td></td></tr> 
                <tr><td></td></tr> 
                <tr><td></td></tr> 
                <tr><td></td></tr> 
                <tr><td></td></tr> 
                <tr><td></td></tr> 
                <tr><td></td></tr> 
                <tr><td></td></tr> 
                <tr><td></td></tr> 
                <tr><td></td></tr>
                <tr><td></td></tr> 
                <tr><td></td></tr> 
                <tr><td></td></tr>
                <tr><td></td></tr> 
                <tr><td></td></tr> 
                <tr><td></td></tr>
                <tr><td></td></tr> 
                <tr><td></td></tr>
                <tr>
                    <td align="center" >__ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ __ </td>
                </tr>
              <tr><td></td></tr> 
                <tr><td></td></tr> 
                <tr><td></td></tr>
                <tr><td></td></tr> 
                <tr><td></td></tr> 
                
                
               
               <tr>
                   <td>
             <table  border="0"  align="center">
             <tr>
                 <td><img src="../../images/logo_iup_abra.png" height="70" width="70" ></td>
                  
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
             </table>  
            <table style="font-size:1.1em;" border="0" align="center">
               <tr><td  ><b><center align="center"> Reçu d'inscription <?php echo($annee."-".($annee +1));?></center></b></td></tr>

           </table> 
            <table   border="1" align="center"  width="90%" style="font-family:Times; font-size:10px;" cellspacing="0">
             <tr>
                 <td>Nouakchott : </td><td> Date <?php echo date('d/m/Y');?></td><td></td>
                  
              </tr>
              <tr>
                  <td colspan="2">
                      <table border="0" style="font-size:1em;" border="0"><tr><td>No d’Inscription</td><td><?php echo  'IUP'.$info['matricule']; ?></td><td rowspan="4"> <img  style="width: 80px; height: 80px;" src="<?php
        
        if(file_exists("C:\wamp\www\laureat\photos\IUP". $info['matricule'].'.GIF'))
        echo "../../photos/IUP". $info['matricule'].'.GIF';
        else echo "../../photos/IUP". $info['matricule'].'.bmp'; 
   ?> "onerror="this.src='../../photos/default.gif';"/>



              
                </td></tr><?php $type=null;
                if($info['regimeEtablissements']==0){
                    $type="Public";
                }else{
                     $type="Privé";
                    
                }
                
                ?>
                          <tr><td>Info. BAC</td><td><?php echo $info['num_bac'].' -'.$info['infoBac'].' -'.$info['nomEtablissement'].'-'.$type; ?></td></tr>
                           <tr><td>prénom :</td><td><?php echo $info['prenom']; ?></td></tr>
                           <tr><td>Prénom du Père :</td><td><?php echo $info['prenomPere'];  ?></td></tr>
                           <tr><td>Nom de Famille :</td><td><?php echo $info['nom']; ?></td></tr>
                          <tr><td>Filière de spécialité :</td><td><?php echo $infoEtud['programme']; ?></td></tr>
                         
                      </table>  
                      
                  </td>
                  
                  <td>
                       <table style="font-size:1em;"><tr><td>Système: </td><td>LMD</td></tr>
                          <tr><td>Frais Scolarité :</td><td>600 Ouguiyas</td></tr>
                          <tr><td>Année Universitaire :</td><td> <?php echo($annee."-".($annee +1));?></td></tr>
                           <tr><td>Tuteur de l'étudiant :</td><td> <?php echo $info['nomParents'].'Tél :'.$info['telephoneParents'];?></td></tr>
                      </table> 
                  </td>
                  
              </tr>
               <tr>
                  <td background="red" colspan="2">
                       <table style="font-size:1em;"><tr><td>Reçu d’Inscription No: </td><td><?php echo$infoR['num_recu'];?></td></tr>
                         
                      </table> 
                  </td>
                  
                  <td >
                       <table style="font-size:1em;"><tr><td>Saisi par</td><td>Ahmed Brahim  (Chef Service Scolarité)</td></tr>
                          <tr><td>Date Saisie</td><td><?php echo  $infoR['date_saisi'];?></td></tr>
                          
                      </table> 
                  </td>
                  
              </tr>
              <tr>
                  <td colspan="2">
                       <table style="font-size:1em;"><tr><th>Dossier d'inscription :</th></tr>
                           <tr>
                               <td><input type="checkbox" checked /> 	Quittance des Frais d'inscription </br>
                                   <input checked type="checkbox" />	Fiche d'inscription pédagogique </br>                    
               <input checked type="checkbox" />	Quatre (4) photos d’identité récentes </br>
               
              <input checked type="checkbox" />	Relevé de Note du Baccalauréat (Original) +
                Copie légalisée </br>
                 <input checked type="checkbox" />	Extrait d'acte de naissance </br>
               <input checked type="checkbox" />	Copie de CIN ou Equivalent</td></tr>
                          
                      </table> 
                  </td>
                  
                  
                  <td ROWSPAN="2">
                       <table style="font-size:1em;">
                           <tr><td> <U>Signature et Cachet</U></td></tr>
                          
                      </table> 
                  </td>
                  
              </tr>
              <tr>
              <td  colspan="2">
                       <table style="font-size:1em;"> <tr><td>Pour un montant total de</td><td>                    600</br>six cents</td></tr>
                      </table> 
              </td></tr>
            </table></td>
                </tr></table>
         
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
