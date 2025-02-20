

<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
   
  <div class="container">
    <div class="col-xs-12 hl-left">
  <button  onClick="imprimer('printable');" ><b> Imprimer les tickets </b></button>
       <div id="printable">
        
           
            <?php
             $nbEtu=$maxfin;
     $k=0;
     $numPage=1;
     $nb=1;
     $i=1;
     $nbEtuParPage=8;
    
     while ($i<=$maxfin)
          {//echo'<div style="page-break-after: always;">';
        
   
         echo'<table width="100%" border="1"  style="font-size:0.1em;margin-top:5px ">';
            $comp = 1;
             for($i=$nb;$i<($nb+$nbEtuParPage)&& $i<=$nbEtu;$i=$i+1)
                {
                //$format_date = date("d/m/Y", strtotime($infoTicket[$i]->dateNaissance));
                 $salle='';
                 for($f=0;$f<count($infoSalle);$f++){
                    if (($i >= $infoSalle[$f]->num_debut && $i <= $infoSalle[$f]->num_fin)){
                        $salle = $infoSalle[$f]->groupe.':'.$infoSalle[$f]->id_salle;
                        break;
                    }
                 }
                if($i%4==1)
                    echo'<tr>';
                
                //foreach($info as $info){ 
                    
              if (($comp <= 4))  {
                if(!isset($infoTicket[$i])|| $infoTicket[$i] == null){
                     echo'<td  ><table width="100%" style="padding-left:10px"  border="0"><tr><td align="center"><font  size="20">PLACE VIDE</font></td></tr></table></td>'; 
           } 
           else{
            echo'<td  valign="top"><table style="padding-left:10px"  border="0">'; 
             echo'<tr><th  colspan="3" align="center"><font align="center" size="20">'.$i.'</font></th></tr>'; 
            echo'<tr><th colspan="">'.$infoTicket[$i][0]['idProgramme'].'</th><th colspan="2">'.$salle.'</th></tr>'; 
           for($j=0;$j<count($infoTicket[$i]);$j++) {
         echo'<tr><td colspan="4"><hr width="200" border=""></td></tr>';
               echo' <tr> '
                       . '<td><font size="0.1">N° inscription</font></td><td><font size="0.1">Niveau</font></td>'
                       . ' <td rowspan=4 > '; ?><img  style="width: 68px; height: 70px;" src="<?php
            if(file_exists("C:\wamp\www\laureat\photos\IUP". $infoTicket[$i][$j]['matriculeEtudiant'].'.bmp'))
              echo "../../photos/IUP". $infoTicket[$i][$j]['matriculeEtudiant'].'.bmp'; 
            else echo "../../photos/IUP". $infoTicket[$i][$j]['matriculeEtudiant'].'.gif';
            ?> "onerror="this.src='../../photos/default.gif';"/></td></tr>
                 
             <?php  echo'<tr> <td valign=middle> <font size="0.3"><b>'. $infoTicket[$i][$j]['matriculeEtudiant'].' </b></font></td><td><font size="0.3"><b>L'.$infoTicket[$i][$j]['niveau'].'</td></b> </tr>';
          echo' <tr><td colspan=""><font size="0.1">Nom Prenom  </font></td></tr>
           <tr><td colspan=""><font size="0.3"><B>'. $infoTicket[$i][$j]['nom'].' '.$infoTicket[$i][$j]["prenom"].'</B></font></td><td></td></tr>';
          
            }?>
           <?php     echo '</table></td>'; }
   
         
            }else{
                 if(!isset($infoTicket[$i])|| $infoTicket[$i] == null){
                     echo'<td  ><table width="100%" style="padding-left:10px"  border="0"><tr><td align="center"><font  size="20">PLACE VIDE</font></td></tr></table></td>'; 
           } 
           else{
            echo'<td valign="top" ><table  style="padding-left:10px"  border="0">'; 
             echo'<tr><th  colspan="3" align="center"><font align="center" size="20">'.$i.'</font></th></tr>'; 
            echo'<tr><th colspan="">'.$infoTicket[$i][0]['idProgramme'].'</th><th colspan="2">'.$salle.'</th></tr>'; 
           for($j=0;$j<count($infoTicket[$i]);$j++) {
         echo'<tr><td colspan="4"><hr width="200" border="1"></td></tr>';
               echo' <tr> '
                       . '<td><font size="0.1">N° inscription</font></td><td><font size="0.1">Niveau</font></td>'
                       . ' <td rowspan=4 > '; ?><img  style="width: 68px; height: 70px;" src="<?php
            if(file_exists("C:\wamp\www\laureat\photos\IUP". $infoTicket[$i][$j]['matriculeEtudiant'].'.bmp'))
              echo "../../photos/IUP". $infoTicket[$i][$j]['matriculeEtudiant'].'.bmp'; 
            else echo "../../photos/IUP". $infoTicket[$i][$j]['matriculeEtudiant'].'.gif';
            ?> "onerror="this.src='../../photos/default.gif';"/></td></tr>
                 
             <?php  echo'<tr> <td valign=middle> <font size="0.3"><b>'. $infoTicket[$i][$j]['matriculeEtudiant'].' </b></font></td><td><font size="0.3"><b>L'.$infoTicket[$i][$j]['niveau'].'</td></b> </tr>';
          echo' <tr><td colspan=""><font size="0.1">Nom Prenom  </font></td></tr>
           <tr><td colspan="2"><font size="0.3"><B>'. $infoTicket[$i][$j]['nom'].' '.$infoTicket[$i][$j]["prenom"].'</B></font></td><td></td></tr>';
         
            }?>
           <?php     echo '</table></td>'; }
   
            } // fin else
             //}
             //if(($numPage %2)==0){
                   
             // }
                 
                $comp++;
                if($i%4==0 || $i==$maxfin)
                    echo '<tr/>';
              }
              //  } // end for j
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

;?>