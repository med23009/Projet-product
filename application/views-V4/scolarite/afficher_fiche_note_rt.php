<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>


<link rel="stylesheet" href="<?php echo base_url();?>DataTables-1.10.6/media/css/jquery.dataTables.css" />

	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>DataTables-1.10.6/extensions/TableTools/css/dataTables.tableTools.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>DataTables-1.10.6/examples/resources/syntax/shCore.css"/>
	<!--
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>DataTables-1.10.6/examples/resources/demo.css"/>
	-->
 <style type="text/css" class="init">

	</style>
	<script type="text/javascript" language="javascript" src="<?php echo base_url();?>DataTables-1.10.6/media/js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="<?php echo base_url();?>DataTables-1.10.6/media/js/jquery.dataTables.js"></script>
	<script type="text/javascript" language="javascript" src="<?php echo base_url();?>DataTables-1.10.6/extensions/TableTools/js/dataTables.tableTools.js"></script>
	<script type="text/javascript" language="javascript" src="<?php echo base_url();?>DataTables-1.10.6/examples/resources/syntax/shCore.js"></script>
	<!--
        <script type="text/javascript" language="javascript" src="<?php echo base_url();?>DataTables-1.10.6/examples/resources/demo.js"></script>
-->

<div class="container">
    <div class="col-xs-12 hl-left">  
        <button  onClick="imprimer('printable');" style="float:right; height: 30px; background-color:#cceac4; width: 160px; margin-right:185px; margin-top:50px;"><b> Imprimer </b></button>



            
        
        <?php 
                /*
     * fonction pour convertir le code du semestre par son nom 
     * elle prend en parametre le numero du semestre soit(1,2,3)
     * et elle retourne le nom (Automn,ete,printemps)
     */
        
    function get_session_nom($numeroSemestre)
    {
        if($numeroSemestre == 3)
        {
            return 'Automne';
        }
        elseif($numeroSemestre == 2)
        {
            return 'Été';
        }
        else
        {
            return 'Printemps';
        }
    }
        
   // $titre=$infoModule['titreModule']. ' ('. $sigle.') : '.$infoModule['titreUnite']; 
 //echo heading($titre,'2');
     
     
        ?>

        
        <div class="form">
          <?php //$attributes = array('class' => 'niceform', 'name'=>'form1', 'onSubmit'=>'actualiserNote()');
          ?>
          
          <div id="printable">
<table border="0"  width="100%">
                     <tr>
                         
                         <td> <img src="<?php echo base_url();?>/images/<?php echo $param_generaux[0]['logo']?>" height="70" width="90"></td>

                         
                          <td>République Islamique de Mauritanie<br>
                             Ministère de l'Enseignement Supérieur et de la Recherche Scientifique <br>
                             <?php echo $param_generaux[0]['nom_ins_parent_fr']?><br>
                             <strong><?php echo $param_generaux[0]['nom']?></strong>
                             
                         </td> 
                          <?php
                         if(!empty($groupe))
                if(substr($groupe,strpos ($groupe,'-')+5,strpos ($groupe,'-',2))==3){
                    $annee_univ=substr($groupe,strpos ($groupe,'-')+1,strpos ($groupe,'-',2)).'-'.(substr($groupe,strpos ($groupe,'-')+1,strpos ($groupe,'-',2))+1);
                }else{
                    $annee_univ=(substr($groupe,strpos ($groupe,'-')+1,strpos ($groupe,'-',2))-1).'-'.(substr($groupe,strpos ($groupe,'-')+1,strpos ($groupe,'-',2)));
                }
                         ?>
                         <td>
                             <table >
                                 <tr><td colspan= "1" style="background-color:#E26C09;border-radius: 0px 20px 0px 20px;font-size: 12px">
                                 <strong>&nbsp;Fiche de Notes &nbsp;</strong>    
                                     </td></tr>
                                 <tr><td> <span style="font-size: 7.0pt;font-family: Arial,serif;">Année universitaire: <?=$annee_univ?></span></td></tr>
                                <tr>
                                  <tr><td><span style="font-size: 7.0pt;font-family: Arial,serif;">&nbsp;  Rattrapage &nbsp;</style></td>
                                 </tr>
                             </table>
                         
                         </td>
                                              </tr>
                     
                 </table>                 
 <?php
 

 
 
echo '<table width=80% style="font-size:14px" align="center">';
echo '<tr>';
echo '<td>Filière : <b>'. $infoModule['idDepartement'].'</b></td><td>Semestre :<b> '.$semestre.'</b></td>';
echo '</tr>';

echo '<tr>';
echo'<td colspan="">Elément : ['. $sigle.'] <strong>'. $infoModule['titreModule']. '</strong></td>';
if(!empty($groupe))
echo'<td colspan="" style="text-align:right">Groupe : <strong>'. substr($groupe,strrpos ($groupe,'-')+1).' </strong></td>';

echo '</tr>';

echo '<tr>';
//echo '<td>Elément : ['. $sigle.'] <strong>'. $infoModule['titreModule']. '</strong></td><td></td>';
echo '</tr>';

echo '</table>';

     $nbEtu=sizeof($info);
     $k=0;
 ?>    
     
           <table align="center">
               <?php while ($k<$nbEtu)
               {?>
               <td valign="top">
           <table id="example" border="1" cellspacing="0" width="80%" >
              
				<thead>
                                    <tr>
                  
                                       <th>Code</th>
                          
                                      
                    <th width="80">Note</th>
                </tr>
                                    
                        
				</thead>

				

				<tbody>
                                    
                                     <?php
             
                
                        for($i=$k;$i<($k+20)&&$i<$nbEtu;$i=$i+1)
                //for($i=0;$i<sizeof($info);$i=$i+1)
                {
                    echo '<tr>';
                  if($evaluation=='examen')
                  {
                    if(($tri=="tri par matricule")){
                    echo '<td>'. $info[$i]['matriculeEtudiant'].'</td>';
                      }
                      else
                      {    echo '<td>'. $info[$i]['code_ex'].'</td>';}
                          
                    
                  
                    
                  
                  }
                
                   echo '<td></td>';  
                    
                    echo '</tr>';
                   
                    
                }
                
                
                    
                ?>
                
                                  				</tbody>
			

</table>  
               </td>
               <?php $k+=20;}?>
               </table>
                 
                 <table>
                     
                     <tr> 
                         <td>
                             
</td>

    <br><br>
                   <table style="margin-left: 5.8pt; border-collapse: collapse; border: none;">
<tbody>
<tr style="height: 13.5pt;">
<td style="width: 62.05pt; border: solid #E36C09 1.0pt; background: #F79546; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" width="83">
<p style="margin-top: 0cm;"><span style="font-size: 12.0pt; font-family: 'Times New Roman','serif';">   Attention:</span></p>
</td>
<td style="width: 501.35pt; border: solid #E36C09 1.0pt; border-left: none; background: #FCE9D9; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" width="668">
<p style="margin: 2.05pt 0cm .0001pt 8.95pt;"><span style="font-size: 9.0pt;"> Veuillez, avant de signer, comparer le nombre de copies avec le nombre de notes figurant sur la fiche de notes
              </span></p>
</td>
</tr>
</tbody>
</table>
                 <div id="observations" align="center">
                    <fieldset align="center" style="border:solid 1px black; padding:20px; width:500px; height:100px; color:midnightblue; font-family:verdana;" >
    <legend>Observations:</legend>
                      </fieldset>
<br><br>
<strong> Nom et signature du professeur : </strong> <br>
                 Nouakchott, le : 
                 <br> 
                 </div>
                  
                       
             </div>
         <!--
         Fin Data tables
         <table id="rounded-corner">
         -->
         
                
                        
            </tbody>
             
            </table>
            
    
   
       
        </div>
        
     </div><!-- end of right content-->
            
                    
  </div>   <!--end of center content -->               
     
  <!-- Voir comment supprimer le contenu du filtre de recherche
  <div id="target">
  Click here
</div>
  -->
                    
    
    
    <div class="clear"></div>
    </div> <!--end of main content-->
	
    
  <?php include(APPPATH.'views/include/footer.php');?>
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
newwin.document.write('<TITLE>FicheNoteExamRatt-'+'<?php echo $sigle;?>'+'</TITLE>\n')
//newwin.document.write('<h3>Rattrapage du module : '+'<?php echo $sigle;?>'+'</h3>\n')
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