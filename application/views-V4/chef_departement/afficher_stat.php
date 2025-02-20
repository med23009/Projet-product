<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');
  
   include("pChart/class/pData.class.php");
 include("pChart/class/pDraw.class.php");
 include("pChart/class/pImage.class.php");


 /* Create and populate the pData object */
$MyData = new pData();  
if($idProgramme !='tout')
{$MyData->addPoints(array($idProgramme),"Labels");
  $MyData->addPoints(array($data[0]['nbEtu1']),"L1");
$MyData->addPoints(array($data[0]['nbEtu2']),"L2");
$MyData->addPoints(array($data[0]['nbEtu3']),"L3"); 
}
else
{
   $MyData->addPoints(array("LGTR","MAEF","MAN","RXTEL"),"Labels"); 
   $MyData->addPoints(array($data[0]['nbEtu1'], $data[1]['nbEtu1'], $data[2]['nbEtu1'],$data[3]['nbEtu1']),"L1");
   $MyData->addPoints(array($data[0]['nbEtu2'], $data[1]['nbEtu2'], $data[2]['nbEtu2'],$data[3]['nbEtu2']),"L2");
   $MyData->addPoints(array($data[0]['nbEtu3'], $data[1]['nbEtu3'], $data[2]['nbEtu3'],$data[3]['nbEtu3']),"L3");
}

$MyData->setAxisName(0,"Nbr. étudiants");

$MyData->setSerieDescription("Labels","Filère");
$MyData->setAbscissa("Labels");

/* Create the pChart object */
$myPicture = new pImage(700,230,$MyData);
$myPicture->drawGradientArea(0,0,700,230,DIRECTION_VERTICAL,array("StartR"=>240,"StartG"=>240,"StartB"=>240,"EndR"=>180,"EndG"=>180,"EndB"=>180,"Alpha"=>100));
$myPicture->drawGradientArea(0,0,700,230,DIRECTION_HORIZONTAL,array("StartR"=>240,"StartG"=>240,"StartB"=>240,"EndR"=>180,"EndG"=>180,"EndB"=>180,"Alpha"=>20));

/* Set the default font properties */
$myPicture->setFontProperties(array("FontName"=>"pChart/fonts/Forgotte.ttf","FontSize"=>14));

/* Draw the scale and the chart */
$myPicture->setGraphArea(60,20,680,190);
$myPicture->drawScale(array("DrawSubTicks"=>TRUE,"Mode"=>SCALE_MODE_ADDALL_START0));
$myPicture->setShadow(FALSE);
$myPicture->drawStackedBarChart(array("Surrounding"=>-15,"InnerSurrounding"=>15));

/* Write the chart legend */
$myPicture->drawLegend(480,210,array("Style"=>LEGEND_NOBORDER,"Mode"=>LEGEND_HORIZONTAL));

?>



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
                 <table style="font-size:14px" align="center" >
                     <tr>
                         <td> <img src="<?php echo base_url();?>/images/log_emim_2.png" height="70" width="70"></td>
                         <td></td> <td></td> <td></td> <td></td>
                         
                         <td>République Islamique de Mauritanie<br>
                             Ministère de l'Enseignement Supérieur et de la Recherche Scientifique <br>
                             Université des Sciences, de Technologies et de Médecine <br>
                             <strong>Institut Universiatire Professionnel</strong>
                             
                         </td> 
                                              </tr>
                     
                 </table>
 <?php

 


 $titre="Statistiques : Année ". $annee."-".($annee+1);
 

 echo '<h2><p align=center>'.$titre.'</p></h2>';

 if($idProgramme!='tout')
 {?>
                 <DIV STYLE="font-family: Arial Black; font-size: 16px; color: black">
                Filère : <?php echo $idProgramme; ?><br>     
              
                #Etudiant L3 : <?php echo $data[0]['nbEtu3']; ?><br> 
                    
                #Etudiant L2 : <?php echo $data[0]['nbEtu2']; ?><br> 
                 #Etudiant L1 : <?php echo $data[0]['nbEtu1']; ?><br> 
                 </DIV>


 <?php 
 
 }  else {?>
                  <div STYLE="font-family: Arial Black; font-size: 12px; color: black;" align="center">
                 <table border="1" >
                     <tr>
                         <td></td><td>LGTR</td><td>MAEF</td><td>MAN</td><td>RXTEL</td>
                     </tr>
                     <tr>
                         <td>L3</td><td><?php echo $data[0]['nbEtu3'];?></td><td><?php echo $data[1]['nbEtu3'];?></td><td><?php echo $data[2]['nbEtu3'];?></td><td><?php echo $data[3]['nbEtu3'];?></td>
       
                     </tr>
                     
                       <tr>
                         <td>L2</td><td><?php echo $data[0]['nbEtu2'];?></td><td><?php echo $data[1]['nbEtu2'];?></td><td><?php echo $data[2]['nbEtu2'];?></td><td><?php echo $data[3]['nbEtu2'];?></td>
       
                     </tr>
                     
                     <tr>
                         <td>L1</td><td><?php echo $data[0]['nbEtu1'];?></td><td><?php echo $data[1]['nbEtu1'];?></td><td><?php echo $data[2]['nbEtu1'];?></td><td><?php echo $data[3]['nbEtu1'];?></td>
       
                     </tr>
                     
                 </tr>
                 </table>
                  </div>
                
       

 <?php }
ob_start();
  imagepng($myPicture->Picture);
  $contents = ob_get_contents();
ob_end_clean();
print "<img src='data:image/png;base64,".base64_encode($contents)."' />\n";
?>
<!--
         Fin Data tables
         <table id="rounded-corner">
         -->
         
                
           
    
   
       
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
newwin.document.write('<style>@page { size: auto;  margin: 0mm; }</style>\n')

//newwin.document.write('<link rel="stylesheet" href="<?php echo base_url();?>css/printable.css" />\n');
newwin.document.write('<TITLE>Statistiques</TITLE>\n')

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

