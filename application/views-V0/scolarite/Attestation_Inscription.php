<?php include(APPPATH.'views/include/header.php');
include('include/menu.php');
//print_r($info);
//echo $parametres['logo'];
?>
<div class="container">
    <div class="col-xs-12 hl-left">
            
<button  onClick="imprimer('printable');" style="float:right; height: 30px; background-color:#cceac4; width: 160px; margin-right:185px; margin-top:50px;"><b> Imprimer l'attestation </b></button>

<div id="printable">
    <DIV id="id_1">
         <table  border="0" width="100%">
             <tr>

                  
                  <td> 
                      <table width="300" border="0" style="line-height: 20px">
					     <tr>
                              <td align="left" style="font-size: 90%;font-family: Times;color: green;"><b>République Islamique de Mauritanie</b></td>
                          </tr>
                            <tr>
                              <td align="left" style="font-size: 80%;font-family: Times;color: green;;"><b>Ministère de la Défense Nationale</b></td>
                          </tr>
						     <tr>
                              <td align="left" style="font-size: 80%;font-family: Times;color: green;;"><b>Ministère de l'Enseignement Supérieur et de la Recherche Scientifique</b></td>
                          </tr>
                          <tr>
                              <td align="left" style="font-size: 100%;font-family: Times;color: green;;"><b><?=$parametres['nom']?></b></td>
                          </tr>
					
						  
                     <!--   <tr>
                         <td>
                           <table  border="0" style="line-height: 7px">
                                             <tr>
                               <td style="font-size: 50%;border-top: 1px solid black"> </td>
                          </tr>
                          <tr>
                               <td style="font-size: 50%"></td>
                          </tr>
                          </table>
                               </td>
                         <tr/>
                       <tr>
                               <td style="font-size: 50%;border-top: 1px solid black"><?=$param_generaux[0]['adresse']?>T&eacute;léphone :<?=$param_generaux[0]['telephone']?> Mobile :<?=$param_generaux[0]['telephone_2']?> , Email :<?=$param_generaux[0]['email']?> </td>
                           </tr>
                           <tr>
                               <td style="font-size: 50%">Boite Postale : <?=$param_generaux[0]['boite_postale']?>, Siteweb : <?=$param_generaux[0]['siteweb']?>, <?=$param_generaux[0]['ville']?>-<?=$param_generaux[0]['pays']?></td>
                           </tr> -->
                          </table>
                              </td>
							   <td ><img src="../../../../images/<?=$parametres['logo']?>" height="90" width="90" ></td>
							       <td> 
                      <table width="300" border="0" style="line-height: 20px">
					   <tr>
                              <td align="right" style="font-size: 120%;font-family: Times;color: green;"><b>الجمهورية الإسلامية الموريتانية</b></td>
                          </tr>
                              <tr>
                              <td align="right" style="font-size: 80%;font-family: Times;color: green;"><b>وزارة الدفاع الوطني</b></td>
                          </tr>
						     <tr>
                              <td align="right" style="font-size: 80%;font-family: Times;color: green;"><b>وزارة التعليم العالي والبحث العلمي</b></td>
                          </tr>
                          <tr>
                              <td align="right" style="font-size: 100%;font-family: Times;color: green;"><b><?=$parametres['nom_ar']?></b></td>
                          </tr>
						
                          <!-- <tr>
                          <td>
                          <table  border="0" style="line-height: 7px">
                                            <tr>
                              <td style="font-size: 50%;border-top: 1px solid black"> </td>
                          </tr>
                          <tr>
                              <td style="font-size: 50%"></td>
                          </tr>
                          </table>
                              </td>
                          <tr/>
                          <tr>
                              <td style="font-size: 50%;border-top: 1px solid black"><?=$param_generaux[0]['adresse']?>T&eacute;léphone :<?=$param_generaux[0]['telephone']?> Mobile :<?=$param_generaux[0]['telephone_2']?> , Email :<?=$param_generaux[0]['email']?> </td>
                          </tr>
                          <tr>
                              <td style="font-size: 50%">Boite Postale : <?=$param_generaux[0]['boite_postale']?>, Siteweb : <?=$param_generaux[0]['siteweb']?>, <?=$param_generaux[0]['ville']?>-<?=$param_generaux[0]['pays']?></td>
                          </tr>-->
                          </table>
                              </td>
                          <tr/>
                      </table>
     <?php
     //for($i=0;$i<$nombre;$i++){?>
    <table>
       <!-- <tr>
            <td style="width: 219.65pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" colspan="4" width="293">
               Groupe Polytechnique	
           </td><td ></td><td ></td><td ></td><td ></td> 
        </tr><tr>
            <td style="width: 219.65pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" colspan="4" width="293">
               <?php echo $parametres['nom'] ?> 
            </td><td ></td><td width="320"></td><td > <img src="../../../../images/<?php echo $parametres['logo'] ?>" height="100" width="100" ></td><td ></td> 
    </tr><tr>
        <td style="width: 219.65pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" colspan="4" width="293">
             
            </td><td ></td><td ></td><td ></td><td ></td> 
    </tr>--><tr>
        <td style="width: 219.65pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" colspan="4" width="293">
               
            </td><td ></td><td ></td><td ></td><td ></td> 
    </tr><tr>
        <td style="width: 219.65pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" colspan="4" width="293">
            <p ><span style="font-size: 16.0pt; color: black;text-align:right; white-space:nowrap;  "><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        ATTESTATION D'INSCRIPTION</strong></span></p> 
            
    </tr><tr>
         <td style="width: 219.65pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" colspan="4" width="293">
            <p ><span style="font-size: 16.0pt; color: black;text-align:right; white-space:nowrap;  "><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
 &nbsp;&nbsp;&nbsp;&nbsp; <?php echo '    '.$anneeuniv.'-'.($anneeuniv+1); ?></strong></span></p> 
         </td> 
        </tr>
        <tr>
        <td style="width: 219.65pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" colspan="4" width="293">
             
            </td><td ></td><td ></td><td ></td><td ></td> 
    </tr><tr>
        <td style="width: 219.65pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" colspan="4" width="293">
               
            </td><td ></td><td ></td><td ></td><td ></td> 
    </tr>
  <tr>
         <td style="width: 219.65pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" colspan="4" width="293">
            <p >
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Le Directeur de  &nbsp; << <?php echo $parametres['nom'].'>>'; ?>&nbsp;<br></p> 
                       <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Soussigné;atteste que l'étudiant(e):<br>
                      <br>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nom &nbsp;&nbsp; : &nbsp;&nbsp; <?php echo $nom; ?><br>
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Prénom &nbsp;&nbsp;:&nbsp;&nbsp; <?php echo $prenom; ?><br>
                       <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Né(e) le &nbsp;: &nbsp; <?php echo date('d/m/Y',strTotime($dateNaissance)) ; ?> à &nbsp;: &nbsp; <?php echo $info['lieuNaissance']; ?><br>
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Est inscrit(e) en &nbsp;: &nbsp; <?php echo 'L'.$niveau; ?> du <?php echo $nomProg; ?><br>
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;du Diplome De Licence 
                        <br><br>
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;sous le Numéro d'inscription  &nbsp;:&nbsp;<?php echo $matricule;  ?><br>
                      <br><br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; pour l'Année Universitaire en cours &nbsp;:<?php echo '    '.$anneeuniv.'-'.($anneeuniv+1); ?>
         </td>
        </tr> <tr>
        <td style="width: 219.65pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" colspan="4" width="293">
               
        </td><td ></td><td ></td><td ></td><td >
          <br><br><br><br><br><br>  Fait à Nouakchott le&nbsp;:<?php echo date('d/m/Y') ; ?> 
        </td> 
    </tr>
    <tr>
        <td style="width: 219.65pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" colspan="4" width="293">
               
        </td><td ></td><td ></td><td ></td><td >
          <br><br> <b> Le Directeur de l'institut </b>  
          
        </td> </td> 
    </tr>
    <tr>
        <td style="width: 219.65pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" colspan="4" width="293">
            
        </td><td ></td><td ></td><td ></td><td >
          <br> <b> <br> <b><br> <b> </b>  
          
        </td></td> 
    </tr><!-- comment -->
    <tr border='1'>
        <td style="width: 219.65pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.1pt;" colspan='4' width="293">
          
        
            N.B:La présente attestation n'est délivré qu'une seule fois
       <span style="color: black; white-space:nowrap;  "> <hr></span> 
        <span style="color: black; white-space:nowrap;  "> Adresse: <?php echo $parametres['ville'] ?> &nbsp;<?php echo $parametres['adresse'] ?> Email:&nbsp;<?php echo $parametres['email'] ?></span>
        </td> 
       
         <td >  <b>Siteweb : <?=$parametres['siteweb']?></b></td>  <td ></td><td ></td><td >
         <hr>
          
        </td>
    </tr>
    	  <tr>
      
    </table><?php //} ?>
    <div class="clear"></div>
</div></div></div>
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