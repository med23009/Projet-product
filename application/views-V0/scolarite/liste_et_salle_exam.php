

<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
   
  <div class="container">
    <div class="col-xs-12 hl-left">
  <button  onClick="imprimer('printable');" ><b> Imprimer la liste </b></button>
       <div id="printable">
        
           
               
 <?php
 

 
 

       //   print_r($info);
     $nbEtu=sizeof($info);
     $k=0;
     $numPage=1;
     $nb=0;
     $i=0;
     $nbEtuParPage=45;
 ?>    
        
     <?php
          while ($i<$nbEtu)
          {
          ?>   
            
          
            <table>
           <tr style="height: 25.5pt;">
<td style="width: 300.5pt; border: solid windowtext 1.0pt; border-right: none; background: #F2F2F2; padding: 0cm 3.5pt 0cm 3.5pt; height: 25.5pt;" width="97">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="color: black;">Liste des étudiants par salle d'examen</span></p>
</td>
<td style="width: 51.8pt; border-top: solid windowtext 1.0pt; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: none; background: #F2F2F2; padding: 0cm 3.5pt 0cm 3.5pt; height: 25.5pt;" width="69">
<p style="margin-bottom: .0001pt; line-height: normal;"><strong><span style="color: black;"></span></strong></p>
</td>
<td style="width: 300.6pt; border-top: solid windowtext 1.0pt; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: none; background: #F2F2F2; padding: 0cm 3.5pt 0cm 3.5pt; height: 25.5pt;" width="47">
<p style="margin-bottom: .0001pt; line-height: normal;"><strong><span style="font-size: 12.0pt; color: black;"><?php echo "Année ".$annee." ".$semestre; ?></span></strong></p>
</td>
<td style="width: 80.6pt; border-top: solid windowtext 1.0pt; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: none; background: #F2F2F2; padding: 0cm 3.5pt 0cm 3.5pt; height: 25.5pt;" colspan="2" width="107">
<p style="margin-bottom: .0001pt; line-height: normal;"><strong><span style="font-size: 12.0pt; color: black;"><?php  ?> </span></strong></p>
</td>
<td style="width: 224.0pt; border-top: solid windowtext 1.0pt; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: none; background: #F2F2F2; padding: 0cm 3.5pt 0cm 3.5pt; height: 25.5pt;" colspan="2" width="299">
<p style="margin-bottom: .0001pt; text-align: right; line-height: normal;"><span style="color: black;"></span></p>
</td>
<td style="width: 25.8pt; border-top: solid windowtext 1.0pt; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: none; background: #F2F2F2; padding: 0cm 3.5pt 0cm 3.5pt; height: 25.5pt;" width="34">
<p style="margin-bottom: .0001pt; line-height: normal;"><strong><span style="color: black;"><?php echo "Niveau: L".$info[0]["niveau"]; ?></span></strong></p>
</td>
<td style="width: 78.8pt; border-top: solid windowtext 1.0pt; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid black 1.0pt; background: #F2F2F2; padding: 0cm 3.5pt 0cm 3.5pt; height: 25.5pt;" colspan="2" width="105">
<p style="margin-bottom: .0001pt; line-height: normal;"><span style="color: black;">Session :<?php echo $session; ?></span></p>
</td>
           </tr></table>
           <table id="example" border="2" cellspacing="0" width="80%" style="font-size:14px" align="center">
              
				<thead>
                                    <tr>
               
                     <th>Filière</th>    
                     <th>No exam</th> 
                    <th>No. Ins.</th>
                    <th align="left">Nom & prénom</th>
                  
           
                    
                    <th >Salle</th>
                </tr>
                                    
                        
				</thead>

				

				<tbody>
                                    
                                     <?php
             
                
                      
                for($i=$nb;$i<($nb+$nbEtuParPage)&& $i<$nbEtu;$i=$i+1)
                {
             
               
                    echo '<tr>';
                
                    echo '<td>'. $info[$i]['idProgramme'].'</td>';
                    echo '<td>'. $info[$i]['num_exam'].'</td>';
                    echo '<td>IUP'. $info[$i]['matriculeetudiant'].'</td>';
                    echo '<td>'.' &nbsp; '. $info[$i]['nom_c'].'</td>';
                    echo '<td>'.' &nbsp; '. $info[$i]['id_salle'].'</td>';
                    
                   //echo '<td width="20%"><br></td>';  
                    
                    echo '</tr>';
                   
              
                }
                $nb+=$nbEtuParPage;
                 
                    $numPage++;
                    
                
                
                
                    
                ?>
                
                                  				</tbody>
			

</table>
          
                      
          <?php 
          echo'<p style="page-break-after:always;"></p>';
          if($i!=$nbEtu)
              echo '<h3></h3>';
                }?>
                 
         <!--
         Fin Data tables
         <table id="rounded-corner">
         -->
         
                
                        
            </tbody>
             
            </table>
          
               

     </div> <!-- end of right content-->
   </div>
</div>   <!--end of center content -->  
<!--end of main content-->

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
newwin.document.write('<style>@page { size: auto;  margin: 10mm; }</style>\n')
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