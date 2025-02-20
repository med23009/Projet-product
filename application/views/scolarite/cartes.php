
<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
	
   
  <div class="container">
    <div class="col-xs-12 hl-left">
        <?php if(count($infoCarte)!=0){ ?>
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
     while ($i<$nbEtu)
          {//echo'<div style="page-break-after: always;">';
        
   
          echo'<table  border="0"  style="font-size:0.8em; /*margin-left: 218px;margin-top: 390px;*/ ">';
                    for($i=$nb;$i<($nb+$nbEtuParPage)&& $i<$nbEtu;$i=$i+1)
                    {
                        $format_date = date("d/m/Y", strtotime($infoCarte[$i]->dateNaissance));
                        //if (($numPage % 2) == 1)  {
                        if (($i % 2) == 0)  {
           
                            echo'<tr><td  width="700" height="270"><table style="padding-left:10px" width="322px" height="height="208" border="0"><tr><td>'; ?>
                             <img  style="width: 20px; height: 20px;" src="<?php
        
                            if(file_exists(FCPATH."photos/". $infoCarte[$i]->matriculeetudiant.'.GIF'))
                               echo "../../photos/". $infoCarte[$i]->matriculeetudiant.'.GIF';
                                else echo "../../photos/". $infoCarte[$i]->matriculeetudiant.'.jpg'; 
   ?> "onerror="this.src='../../photos/default.gif';"/>
   <?php echo'</td><td colspan="2"><font  face="Arial Black" color="blue" '
   . ' style="font-size:8px"><b>No d\'inscription</b></font></td><b><td colspan="" align='
           . '"center"><font face="Arial Black" size="1"><b>'.$infoCarte[$i]->matriculeetudiant.'</b><'
           . 'font></td><td align="right">'
           . '<img style="width: 30px; height: 30px;" src="../../images/'.$param_genereaux[0]['logo'] .'"></td>
       </tr>
</td></tr>
       
<tr><td colspan="4"><font  color="blue" face="Arial Black" style="font-size:8px"><b>Nom et Prénom de l\'Etudiant(e):</b></font></td>
<td align="right" rowspan="5">'; ?>
            <img class="img-thumbnail" style="width: 80px; height: 90px;" src="<?php
        if(file_exists(FCPATH."photos/". $infoCarte[$i]->matriculeetudiant.'.GIF'))
        echo "../../photos/". $infoCarte[$i]->matriculeetudiant.'.GIF';
        else echo "../../photos/". $infoCarte[$i]->matriculeetudiant.'.jpg'; 
   ?> "onerror="this.src='../../photos/default.gif';"/>
   <?php    echo' </td>
</tr>
<tr><td colspan="4" ><font face="Arial Black" size="1"><b>'.$infoCarte[$i]->prenom.' '.$infoCarte[$i]->nomE.'</b></font></td></tr>
<tr><td colspan="4" height="1"></td></tr>
<tr><td colspan="2" style="border-bottom: 1px solid black;border-top: 1px solid black;border-color:#ccc"><font color="blue"  face="Arial black" style="font-size:8px">Date de Naissance:</font></td><td colspan="2" style="border-bottom: 1px solid black;border-top: 1px solid black;border-color:#ccc"><font face="Arial black"  color="blue"  style="font-size:8px">Lieu de Naissance:</font></td></tr>
<tr><td colspan="2" style="border-bottom: 1px solid black;;border-color:#ccc"><font face="Arial Black" size="0.1"><b>'.$format_date.'</b></font></td><td colspan="2" style="border-bottom: 1px solid black;;border-color:#ccc"><font face="Arial Black"size="0.15"><b>'.$infoCarte[$i]->lieuNaissance.'</b></font></td></tr>
    <tr><td colspan="2" style="border-bottom: 1px solid black;border-color:#ccc"><font face="Arial Black" color="blue" style="font-size:8px"><b>Nationnalité:</b></font></td><td colspan="2" style="border-bottom: 1px solid black;border-color:#ccc"><font face="Arial Black" color="blue"   style="font-size:8px"><b>Baccalauréat:</b></font></td>
    
<tr><td colspan="2" style="border-bottom: 0px solid black;border-color:#ccc"><font face="Arial Black" size="0.15"><b>'.$infoCarte[$i]->nationalite.'</b></font></td><td colspan="" style="border-bottom: 0px solid black;border-color:#ccc"><font face="Arial Black" size="0.15"><b>'.$infoCarte[$i]->infobac.'</b></font></td><td colspan="" style="border-bottom: 0px solid black;border-color:#ccc"><font face="Arial Black" size="0.15"><b>'.$infoCarte[$i]->num_bac.'</b></font></td></tr>
';
    if (($infoCarte[$i]->idProgramme)=='TC'){
echo'<tr><td  style="border-top: 1px solid black;;border-color:#ccc"><font size="0.15">Filière :</font></td><td colspan="3" style="border-top: 1px solid black;border-color:#ccc"><font size="0.15"><b>Maths App à l\'Eco et à la Finance</b></font></td></td></tr>';

    }else{
      echo'<tr><td  style="border-top: 1px solid black;;border-color:#ccc"><font color="blue"  face="Arial Black" style="font-size:8px"><b>Filière :</b></font></td><td colspan="3" style="border-top: 1px solid black;border-color:#ccc"><font face="Arial Black" size="0.15"><b>'.$infoCarte[$i]->nom.'</b></font></td></td></tr>';

    
    }
    
echo'<tr><td colspan="" ><font face="Arial Black"  color="blue"  style="font-size:8px"><b>Niveau :</b></font></td><td colspan="" ><font face="Arial Black" size="0.15"><b>'.$infoCarte[$i]->niveau.'</b></font></td><td colspan="3"</td></tr>';

 ?>
         
   <?php    echo' ';

    
    
echo'';

echo'</table>';
   
            } 
             //}
             //if(($numPage %2)==0){
                   
             // }
            
              }
            
              
                $nb+=$nbEtuParPage;
                 
                    $numPage++;
                echo'<p style="page-break-after:always;"></p>';
        //  if($i!=$nbEtu)
              //echo '<h3></h3>';
          }
            ?>
        </table>
             <?php
        
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
     
                   echo'<tr><td width="700" height="270" style="/*padding-left: 218px;padding-top: 390px;*/"><table width="322" height="208" style="padding-left:5px"  border="0">
                       <tr><td align="center"> 
                       <table style="text-align:center" cellspacing="0"> <tbody> 



<tr style="border-top: 1px solid black;height: 47px;">
<td style="font-size: 12px;text-align: center;/*changed*//*changed #e76229*/background: #c6d9f1;/*changed yellow*/color: black;font-weight: bold;">
<b><font color="blue"  face="Arial Black"> Carte d\'Etudiant </font></b></td> 
<td style="width: 59px;height: 50px;font-size: 12px;border: 0;background: #c6d9f1;/*rien*/font-weight: bold;" rowspan="1"> <div> 
<img src="../../images/'.$param_genereaux[0]['logo'] .'" style="width: 58px;height: 58px;"></div> <div style="border:0px solid black;margin: 12px;"></div> </td> <td style="font-size: 8px;text-align: center;/*changed*//*changed #e76229*/background: #c6d9f1;/*changed yellow*/color: black;"> '
 . '<font color="blue"  face="Arial Black" size="4"><b> بطاقة الطالب </b></font> </td> </tr> <tr> <td style="width: 100px;height: 50px;/*changed #e76229*/background: #c6d9f1;/*rien*/"> '
. '<div style="padding-left: 5px;text-align: right;"> '
 . '<font face="Arial Black"  color="blue" style="font-size:8px"><b> Ann&eacutee universitaire </b></font> </div> 
     </td> <td style="/*changed #e76229*/background: #c6d9f1;/*rien*/"><b> <span  face="Arial Black">'.($annDeb+1).'-</span><span>'.$annDeb.'</span></b></td>  <td style="width: 100px;text-align: right;/*changed #e76229*/background: #c6d9f1;/*rien*/"> <div style="padding-right: 5px;	text-align: left;"> <font  color="blue" face="Arial Black" style="font-size:8px"> <b>السنة الجامعية</b> </font> </div> </td> </tr>




<tr align="left"><td colspan="3"  style="text-align:center"><div>  <font color="blue"  style="font-size: 8px;text-align:center" face="Arial Black">Cette carte est strictement personnelle et doit être <b>obligatoirement</b> présentée lors de chaque évaluation.
 </font></b></div></td></tr><tr align="left"><td colspan="3"></td></tr> </tbody> </table>
       
  
        
       
   </td></tr></table></td>';
         
          }else{  ?> 
              <td width="700" height="270" style="/*padding-left: 218px;padding-top: 390px;*/"><table width="322" height="208" style="padding-left:5px"  border="0">
                       <tr><td align="center"> 
                       <table style="text-align:center" cellspacing="0"> <tbody> 




</font></b></div></td></tr><tr align="left"><td colspan="3"></td></tr> </tbody> </table>
       
  
        
       
    </td></tr></table></td>
   
            
          <?php     }
                   
             
              }
                $nb+=$nbEtuParPage;
                 
                    $numPage++;
                echo'<p style="page-break-after:always;"></p>';
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
  -->

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
newwin.document.write('<style>@page { size: 85mm 55mm;  margin: 0mm; }</style>\n')
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
?>
