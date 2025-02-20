<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');
    $idgoupe='tous';?>


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
                         <td > <img src="<?php echo base_url();?>/images/<?php echo $param_generaux[0]['logo']?>" height="70" width="90" ></td>

                         
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
                                 <strong>&nbsp;Fiche d'émargement &nbsp;</strong>    
                                     </td></tr>
                                 
                                 <tr><td> <span style="font-size: 7.0pt;font-family: Arial,serif;">Année universitaire: <?=$annee_univ?></span></td></tr>
                              <tr><td><span style="font-size: 8.0pt;font-family: Arial,serif;">&nbsp;Moyenne de compétences &nbsp;</style></td>
                                 </tr></table>
                         
                         </td>
                                              </tr>
                     
                 </table>                 
 <?php
 

 
 
echo '<table width=90% style="font-size:14px" align="center">';
echo '<tr>';
echo '<td>Filière : <b>'. $infoModule['idDepartement'].'</b></td><td style="text-align:right">Semestre :<b> '.$semestre.'</b></td>';
echo '</tr>';

echo '<tr>';
echo'<td colspan="" >Elément : ['. $sigle.'] <strong>'. $infoModule['titreModule']. '</strong></td>';
if(!empty($groupe)){
echo'<td colspan="" style="text-align:right">Groupe : <strong>'.substr($groupe,strrpos ($groupe,'-')+1).'</strong></td>';
$idgoupe=substr($groupe,strrpos ($groupe,'-')+1);
}echo '</tr>';

echo '<tr>';
//echo '<td>Elément : ['. $sigle.'] <strong>'. $infoModule['titreModule']. '</strong></td><td></td>';
echo '</tr>';

echo '</table>';
     
     $nbEtu=sizeof($info);
     $k=0;
     $numPage=1;
     $nb=0;
     $i=0;
     $nbEtuParPage=35;
 ?>    
     <?php
          while ($i<$nbEtu)
          {
          ?>   
           <table id="example" border="2" cellspacing="0" width="90%" style="font-size:14px" align="center">
              
				<thead>
                                    <tr>
               
                                       
                    <th>No. Ins.</th>
                    <th align="left;width:200px;">Nom & prénom</th>
                               
                    
                    <th>Emargement présence</th>
                    <th>Emargement remise copie</th>
                    <th style="width:30px">Nb. copies</th>
                </tr>
                                    
                        
				</thead>

				

				<tbody>
                                    
                                     <?php
             
                
                      
                for($i=$nb;$i<($nb+$nbEtuParPage)&& $i<$nbEtu;$i=$i+1)
                {
             
               
                    echo '<tr>';
                
              
                    echo '<td>'. $info[$i]['matriculeEtudiant'].'</td>';
                    echo '<td>'.' &nbsp; '. $info[$i]['prenom'].' '.$info[$i]['nom'].'</td>';
                    
                   echo '<td width="20%"><br></td>';  
                    echo '<td></td>
                    <td ></td>';
                    echo '</tr>';
                   
              
                }
                $nb+=$nbEtuParPage;
                 
                    $numPage++;
                  
                
                
                
                    
                ?>
                
                                  				</tbody>
			

</table>
          
                      
          <?php // 
//          if($i!=$nbEtu)
//              echo '<h3></h3>';
                }?>
                 <br>
<!--                 <br><br>-->
                 <div id="observations" align="center">
                    <fieldset align="center" style="border:solid 1px black; padding:20px; width:500px; height:100px; color:midnightblue; font-family:verdana;" >
    <legend>Observations:</legend>
                      </fieldset>
<!--<br><br>-->
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
//newwin.document.write('<style>@page { size: auto;  margin: 0mm; }</style>\n')
newwin.document.write('<style>@page  { size: auto;  margin-top: 0mm; }   h3{page-break-before: always;} \n }</style>\n')
newwin.document.write('<style>body {-webkit-print-color-adjust: exact;}  </style>\n')
//newwin.document.write('<link rel="stylesheet" href="<?php echo base_url();?>css/printable.css" />\n');
newwin.document.write('<TITLE>Fiche_Emargement_Moyenne_Competences-'+'<?php echo $sigle;?>'+'-G:'+'<?=$idgoupe?>'+'-Annee<?=$annee_univ?></TITLE>\n')
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