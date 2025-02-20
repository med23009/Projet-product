

<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
   
  <div class="container">
    <div class="col-xs-12 hl-left"> 
    <?php 
        if(isset($isExiste) and !$isExiste){
            echo heading($titre,'3');
        }else{
    ?>
  <button  onClick="imprimer('printable');" ><b> Imprimer les cartes </b></button>
       
        <div id="printable">
           
            <?php
             $nbEtu=sizeof($infoCarte);
            // echo $nbEtu;
     $k=0;
     $numPage=1;
     $nb=0;
     $i=0;
     $nbEtuParPage=1;
     ?>
             
        <?php
            while ($i<$nbEtu)
                {
        
                    echo'<table  border="0"  style="font-size:0.8em; /*margin-left: 218px;margin-top: 390px;*/ ">';
                    for($i=$nb;$i<($nb+$nbEtuParPage)&& $i<$nbEtu;$i=$i+1)
                    {
                        $format_date = date("d/m/Y", strtotime($infoCarte[$i]->dateNaissance));
                        //if (($numPage % 2) == 1)  {
                        if (($i % 2) == 0)  {
           
                            echo'<tr><td  width="700" height="270"><table style="padding-left:10px" width="320px" height="172" border="0"><tr><td>'; ?>
                             <img  style="width: 20px; height: 20px;" src="<?php
        
                            if(file_exists("C:\wamp\www\laureat\photos/". $infoCarte[$i]->matriculeetudiant.'.GIF'))
                               echo "../../photos/". $infoCarte[$i]->matriculeetudiant.'.GIF';
                                else echo "../../photos/". $infoCarte[$i]->matriculeetudiant.'.bmp'; 
   ?> "onerror="this.src='../../photos/default.gif';"/>
   <?php echo'</td><td colspan="2"><font size="0.1">No d\'inscription</font></td><b><td colspan="" align="center"><font family="arial" size="2">'.$infoCarte[$i]->matriculeetudiant.'<font></td><td align="right"><img style="width: 20px; height: 20px;" src="../../images/'.$param_genereaux[0]['logo'] .'"></td>
       </tr>
</td></tr>
       
<tr><td colspan="4"><font size="0.2">Nom et Prénom de l\'Etudiant(e):</font></td>
<td align="right" rowspan="6">'; ?>
            <img class="img-thumbnail" style="width: 80px; height: 90px;" src="<?php
        if(file_exists("C:\wamp\www\laureat\photos/". $infoCarte[$i]->matriculeetudiant.'.GIF'))
        echo "../../photos/". $infoCarte[$i]->matriculeetudiant.'.GIF';
        else echo "../../photos/". $infoCarte[$i]->matriculeetudiant.'.bmp'; 
   ?> "onerror="this.src='../../photos/default.gif';"/>
   <?php    echo' </td>
</tr>
<tr><td colspan="4" ><font family="arial" size="2"><b>'.$infoCarte[$i]->prenom.'</b></font></td></tr>
<tr>    <td colspan="4" ><font family="arial" size="2"><b> '.$infoCarte[$i]->nomE.' '.$infoCarte[$i]->prenomPere_fr.'</b></font></td></tr>
<tr><td colspan="4" height="10"></td></tr>
<tr><td colspan="2" style="border-bottom: 1px solid black;border-top: 1px solid black;border-color:#ccc"><font family="arial" size="0.2">Date de Naissance:</font></td><td colspan="2" style="border-bottom: 1px solid black;border-top: 1px solid black;border-color:#ccc"><font size="0.5">Lieu de Naissance:</font></td></tr>
<tr><td colspan="2" style="border-bottom: 1px solid black;;border-color:#ccc"><font family="arial" size="0.3"><b>'.$format_date.'</b></font></td><td colspan="2" style="border-bottom: 1px solid black;;border-color:#ccc"><font family="arial"size="0.3"><b>'.$infoCarte[$i]->lieuNaissance.'</b></font></td></tr>
    <tr><td colspan="2" style="border-bottom: 1px solid black;border-color:#ccc"><font size="0.2">Nationnalité:</font></td><td colspan="2" style="border-bottom: 1px solid black;border-color:#ccc"><font size="0.5">Baccalauréat:</font></td>
    <td rowspan="6" align="center"><img src="'.base_url().'/images/sign_catre.png" style="width: 48px;margin: 0px;padding: 0;"></tr>
<tr><td colspan="2" style="border-bottom: 1px solid black;border-color:#ccc"><font family="arial" size="0.3"><b>'.$infoCarte[$i]->nationalite.'</b></font></td><td colspan="" style="border-bottom: 1px solid black;border-color:#ccc"><font family="arial" size="0.3"><b>'.$infoCarte[$i]->infobac.'</b></font></td><td colspan="" style="border-bottom: 1px solid black;border-color:#ccc"><font family="arial" size="0.3"><b>'.$infoCarte[$i]->num_bac.'</b></font></td></tr>
<tr><td colspan="4"></td><td  style="font-size:0.7em;"></td></tr>
<tr><td height="5" colspan="4"></td></tr>';
    if (($infoCarte[$i]->idProgramme)=='MAEF'){
echo'<tr><td  style="border-top: 1px solid black;;border-color:#ccc"><font size="0.5">Filière :</font></td><td colspan="3" style="border-top: 1px solid black;border-color:#ccc"><font size="0.3"><b>Maths App à l\'Eco et à la Finance</b></font></td></td></tr>';

    }else{
      echo'<tr><td  style="border-top: 1px solid black;;border-color:#ccc"><font size="0.5">Filière :</font></td><td colspan="3" style="border-top: 1px solid black;border-color:#ccc"><font size="0.3"><b>'.$infoCarte[$i]->nom.'</b></font></td></td></tr>';

    
    }
    
echo'<tr><td colspan="" ><font size="0.5">Niveau :</font></td><td colspan="" ><font family="arial" size="0.3"><b>'.$infoCarte[$i]->niveau.'</b></font></td><td colspan="3"</td></tr>';

echo'</table></td>';
         
            }else{
            echo'<td  width="700" height="270"><table style="padding-left:10px" width="350" height="172" border="0"><tr><td>'; ?>
            <img  style="width: 20px; height: 20px;" src="<?php
        
        if(file_exists("C:\wamp\www\laureat\photos/". $infoCarte[$i]->matriculeetudiant.'.GIF'))
        echo "../../photos/". $infoCarte[$i]->matriculeetudiant.'.GIF';
        else echo "../../photos/". $infoCarte[$i]->matriculeetudiant.'.bmp'; 
   ?> "onerror="this.src='../../photos/default.gif';"/>
   <?php echo'</td><td colspan="2"><font size="0.1">No d\'inscription</font></td><b><td colspan="" align="center"><font family="arial" size="2">'.$infoCarte[$i]->matriculeetudiant.'<font></td><td align="right"><img style="width: 20px; height: 20px;" src="../../images/logo_iup_abra.png"></td>
       </tr>
</td></tr>
       
<tr><td colspan="4"><font size="0.2">Nom et Prénom de l\'Etudiant(e):</font></td>
<td align="right" rowspan="6">'; ?>
            <img class="img-thumbnail" style="width: 80px; height: 90px;" src="<?php
        
       if(file_exists("C:\wamp\www\laureat\photos/". $infoCarte[$i]->matriculeetudiant.'.GIF'))
        echo "../../photos/". $infoCarte[$i]->matriculeetudiant.'.GIF';
        else echo "../../photos/". $infoCarte[$i]->matriculeetudiant.'.bmp'; 
   ?> "onerror="this.src='../../photos/default.gif';"/>
   <?php    echo' </td>
</tr>
<tr><td colspan="4" ><font family="arial" size="2"><b>'.$infoCarte[$i]->prenom.'</b></font></td></tr>
<tr>    <td colspan="4" ><font family="arial" size="2"><b> '.$infoCarte[$i]->nomE.' '.$infoCarte[$i]->prenomPere_fr.' </b></font></td></tr>
<tr><td colspan="4" height="10"></td></tr>
<tr><td colspan="2" style="border-bottom: 1px solid black;border-top: 1px solid black;border-color:#ccc"><font family="arial" size="0.2">Date de Naissance:</font></td><td colspan="2" style="border-bottom: 1px solid black;border-top: 1px solid black;border-color:#ccc"><font size="0.5">Lieu de Naissance:</font></td></tr>
<tr><td colspan="2" style="border-bottom: 1px solid black;;border-color:#ccc"><font family="arial" size="0.3"><b>'.$format_date.'</b></font></td><td colspan="2" style="border-bottom: 1px solid black;;border-color:#ccc"><font family="arial"size="0.3"><b>'.$infoCarte[$i]->lieuNaissance.'</b></font></td></tr>
    <tr><td colspan="2" style="border-bottom: 1px solid black;border-color:#ccc"><font size="0.2">Nationnalité:</font></td><td colspan="2" style="border-bottom: 1px solid black;border-color:#ccc"><font size="0.5">Baccalauréat:</font></td><td rowspan="2" align="center"><font size="0.3"><b>P/O Directeur <br>Responsable Scolarité</td></b></font></tr>
<tr><td colspan="2" style="border-bottom: 1px solid black;border-color:#ccc"><font family="arial" size="0.3"><b>'.$infoCarte[$i]->nationalite.'</b></font></td><td colspan="" style="border-bottom: 1px solid black;border-color:#ccc"><font family="arial" size="0.3"><b>'.$infoCarte[$i]->infobac.'</b></font></td><td colspan="" style="border-bottom: 1px solid black;border-color:#ccc"><font family="arial" size="0.3"><b>'.$infoCarte[$i]->num_bac.'</b></font></td></tr>
<tr><td colspan="4"></td><td  style="font-size:0.7em;"></td></tr>
<tr><td height="5" colspan="4"></td></tr>';
    if (($infoCarte[$i]->idProgramme)=='MAEF'){
echo'<tr><td  style="border-top: 1px solid black;;border-color:#ccc"><font size="0.5">Filière :</font></td><td colspan="3" style="border-top: 1px solid black;border-color:#ccc"><font size="0.3"><b>Maths App à l\'Eco et à la Finance</b></font></td></td></tr>';

    }else{
      echo'<tr><td  style="border-top: 1px solid black;;border-color:#ccc"><font size="0.5">Filière :</font></td><td colspan="3" style="border-top: 1px solid black;border-color:#ccc"><font size="0.3"><b>'.$infoCarte[$i]->nom.'</b></font></td></td></tr>';

    
    }
    
echo'<tr><td colspan="" ><font size="0.5">Niveau :</font></td><td colspan="" ><font family="arial" size="0.3"><b>'.$infoCarte[$i]->niveau.'</b></font></td><td colspan="3"</td></tr>';

echo'</table></td>';
   
            } 
             //}
             //if(($numPage %2)==0){
                   
             // }
            
              }
            
              
                $nb+=$nbEtuParPage;
                 
                    $numPage++;
                //echo'<p style="page-break-after:always;"></p>';
        //  if($i!=$nbEtu)
              //echo '<h3></h3>';
          }
            ?>
        </table>
       
             <?php
        echo'<p style="page-break-after:always;"></p>';
         $k=0;
     $numPage=1;
     $nb=0;
     $i=0;
     $nbEtuParPage=1;
     while ($i<$nbEtu)
          {echo'<table  border="0"  style="font-size:0.8em; margin-right:30px;margin-top:5 ">';
             for($i=$nb;$i<($nb+$nbEtuParPage)&& $i<$nbEtu;$i=$i+1)
                {
                
                  //if (($numPage % 2) == 1)  {
              if (($i % 2) == 0)  {
           
            /*echo'<tr><td width="700" height="270" style="padding-left: 218px;padding-top: 390px;"><table style="padding-left:5px" width="350"   border="0" >
                       <tr><td align="center"> <img width="300"  height="190" src='.base_url().'/images/carte.png />
        
       
  
        
       
   </td></tr></table></td>';*/
//                  echo'<td width="700" height="270" style="/*padding-left: 218px;padding-top: 390px;*/"><table width="350" style="padding-left:5px"  border="0">
//                       <tr><td align="center"> 
//                       <table style="text-align:center" cellspacing="0"> <tbody> <tr> <td colspan="3" style="text-align: center;"> <img src='.base_url().'/images/entete_carte.png style="width: 290px;height: 58px;"> </td> </tr> <tr style="border-top: 1px solid black;height: 47px;"> <td style="font-size: 14px;text-align: center;/*changed*//*changed #e76229*/background: #bf6843;/*changed yellow*/color: black;font-weight: bold;"> Carte d\'Etudiant </td> <td style="width: 59px;height: 50px;font-size: 21px;border: 0;background: #c6d9f1;/*rien*/font-weight: bold;" rowspan="2"> <div>'.$annDeb.'</div> <div style="border:1px solid black;margin: 12px;"></div> <span>'.($annDeb+1).'</span> </td> <td style="font-size: 19px;text-align: center;/*changed*//*changed #e76229*/background: #bf6843;/*changed yellow*/color: black;"> <font family="arial" size="4"> بطاقة الطالب </font> </td> </tr> <tr> <td style="width: 100px;height: 50px;/*changed #e76229*/background: #c6d9f1;/*rien*/"> <div style="padding-left: 5px;text-align: right;"> <font family="arial" size="2"> Ann&eacutee universitaire </font> </div> </td> <td style="width: 100px;text-align: right;/*changed #e76229*/background: #c6d9f1;/*rien*/"> <div style="padding-right: 5px;	text-align: left;"> <font family="arial" size="4"> السنة الجامعية </font> </div> </td> </tr><tr align="left"><td colspan="3"><div>- Cette carte est strictement personnelle et doit être <b>obligatoirement</b> présentée lors de chaque évaluation
//</b></div></td></tr><tr align="left"><td colspan="3"><div>- Un <b>seul</b> duplicata est possible contre le réglement de 500 MRU</b></b></b></div></td></tr> </tbody> </table>
//       
//  
//        
//       
//   </td></tr></table></td>';
                   echo'<td width="700" height="270" style="/*padding-left: 218px;padding-top: 390px;*/"><table width="350" style="padding-left:5px"  border="0">
                       <tr><td align="center"> 
                       <table style="text-align:center" cellspacing="0"> <tbody> <tr> <td colspan="3" style="text-align: center;"> <img src='.base_url().'/images/entete_carte.png style="width: 290px;height: 58px;"> </td> </tr> <tr style="border-top: 1px solid black;height: 47px;"> <td style="font-size: 14px;text-align: center;/*changed*//*changed #e76229*/background: #bf6843;/*changed yellow*/color: black;font-weight: bold;"> Carte d\'Etudiant </td> <td style="width: 59px;height: 50px;font-size: 21px;border: 0;background: #c6d9f1;/*rien*/font-weight: bold;" rowspan="2"> <div>'.$annDeb.'</div> <div style="border:1px solid black;margin: 12px;"></div> <span>'.($annDeb+1).'</span> </td> <td style="font-size: 19px;text-align: center;/*changed*//*changed #e76229*/background: #bf6843;/*changed yellow*/color: black;"> <font family="arial" size="4"> بطاقة الطالب </font> </td> </tr> <tr> <td style="width: 100px;height: 50px;/*changed #e76229*/background: #c6d9f1;/*rien*/"> <div style="padding-left: 5px;text-align: right;"> <font family="arial" size="2"> Ann&eacutee universitaire </font> </div> </td> <td style="width: 100px;text-align: right;/*changed #e76229*/background: #c6d9f1;/*rien*/"> <div style="padding-right: 5px;	text-align: left;"> <font family="arial" size="4"> السنة الجامعية </font> </div> </td> </tr><tr align="left"><td colspan="3"><div>- Cette carte est strictement personnelle et doit être <b>obligatoirement</b> présentée lors de chaque évaluation
</b></div></td></tr><tr align="left"><td colspan="3"></td></tr> </tbody> </table>
       
  
        
       
   </td></tr></table></td>';
            }else{
            /*echo'<td width="700" height="270" style="padding-left: 218px;padding-top: 390px;"><table width="350" style="padding-left:5px"  border="0">
                       <tr><td align="center"> <img width="300" height="190"  src='.base_url().'/images/carte.png />
        
       
  
        
       
   </td></tr></table></td>';*/
//                echo'<td width="700" height="270" style="/*padding-left: 218px;padding-top: 390px;*/"><table width="350" style="padding-left:5px"  border="0">
//                       <tr><td align="center"> 
//                       <table style="text-align:center" cellspacing="0"> <tbody> <tr> <td colspan="3" style="text-align: center;"> <img src="entete_carte.png" style="width: 290px;height: 58px;"> </td> </tr> <tr style="border-top: 1px solid black;height: 47px;"> <td style="font-size: 14px;text-align: center;/*changed*//*changed #e76229*/background: #bf6843;/*changed yellow*/color: black;font-weight: bold;"> Carte d\'Etudiant </td> <td style="width: 59px;height: 50px;font-size: 21px;border: 0;/*changed #e76229*/background: #c6d9f1;/*rien*/font-weight: bold;" rowspan="2"> <div>2018</div> <div></div> <span>2019</span> </td> <td style="font-size: 19px;text-align: center;/*changed*//*changed #e76229*/background: #bf6843;/*changed yellow*/color: black;"> <font family="arial" size="4"> بطاقة الطالب </font> </td> </tr> <tr> <td style="width: 100px;height: 50px;/*changed #e76229*/background: #c6d9f1;/*rien*/"> <div style="padding-left: 5px;text-align: right;"> <font family="arial" size="2"> Annee universitaire </font> </div> </td> <td style="width: 100px;text-align: right;/*changed #e76229*/background: #c6d9f1;/*rien*/"> <div style="padding-right: 5px;	text-align: left;"> <font family="arial" size="4"> السنة الجامعية </font> </div> </td> </tr><tr><td><div>Cette carte est strictement personnelle et doit être <b>obligatoirement<br> présentée lors de chaque évaluation
//</b></div><div><b>un <b>seul<b> duplicata est possible contre le réglement de 500 MRU</b></b></b></div></td></tr> </tbody> </table>
//       
//  
//        
//       
//   </td></tr></table></td>';
   
                
                echo'<td width="700" height="270" style="/*padding-left: 218px;padding-top: 390px;*/"><table width="350" style="padding-left:5px"  border="0">
                       <tr><td align="center"> 
                       <table style="text-align:center" cellspacing="0"> <tbody> <tr> <td colspan="3" style="text-align: center;"> <img src="entete_carte.png" style="width: 290px;height: 58px;"> </td> </tr> <tr style="border-top: 1px solid black;height: 47px;"> <td style="font-size: 14px;text-align: center;/*changed*//*changed #e76229*/background: #bf6843;/*changed yellow*/color: black;font-weight: bold;"> Carte d\'Etudiant </td> <td style="width: 59px;height: 50px;font-size: 21px;border: 0;/*changed #e76229*/background: #c6d9f1;/*rien*/font-weight: bold;" rowspan="2"> <div>2018</div> <div></div> <span>2019</span> </td> <td style="font-size: 19px;text-align: center;/*changed*//*changed #e76229*/background: #bf6843;/*changed yellow*/color: black;"> <font family="arial" size="4"> بطاقة الطالب </font> </td> </tr> <tr> <td style="width: 100px;height: 50px;/*changed #e76229*/background: #c6d9f1;/*rien*/"> <div style="padding-left: 5px;text-align: right;"> <font family="arial" size="2"> Annee universitaire </font> </div> </td> <td style="width: 100px;text-align: right;/*changed #e76229*/background: #c6d9f1;/*rien*/"> <div style="padding-right: 5px;	text-align: left;"> <font family="arial" size="4"> السنة الجامعية </font> </div> </td> </tr><tr><td><div>Cette carte est strictement personnelle et doit être <b>obligatoirement<br> présentée lors de chaque évaluation
</b></div></td></tr> </tbody> </table>
       
  
        
       
   </td></tr></table></td>';
            } 
             //}
             //if(($numPage %2)==0){
                   
             // }
            
              }
            
              
                $nb+=$nbEtuParPage;
                 
                    $numPage++;
                //echo'<p style="page-break-after:always;"></p>';
        //  if($i!=$nbEtu)
              //echo '<h3></h3>';
          }
            ?>
        
        
        </table>       
     </div> <!-- end of right content-->
   </div>
</div>   <!--end of center content -->  
<!--end of main content-->
<?php }?>
<button  onClick="imprimer('printable');" ><b> Imprimer l'attestation </b></button>
  
        
<?php include(APPPATH.'views/include/footer.php'); ?>
<script TYPE="text/javascript">
			var currentZoom = parent.ltop.currentZoom;
			if(currentZoom != undefined)
				document.body.style.zoom=currentZoom/100;
			</script>

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
