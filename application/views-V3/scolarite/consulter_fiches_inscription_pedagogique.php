<?php include(APPPATH.'views/include/header.php');
include('include/menu.php');
?>


 <div class="container">
    <div class="col-xs-12 hl-left">
            
<button  onClick="imprimer('printable');" style="float:right; height: 30px; background-color:#cceac4; width: 160px; margin-right:185px; margin-top:50px;"><b> Imprimer le PV </b></button>

     
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
             <tr><td colspan="3" style="font-size: 14px" align="center"><b>Fiches d'inscription pédagogique</b></td></tr>
             <!-- <tr><td colspan="3" style="font-size: 14px" align="center"> <? php echo '<b>'.($sess == 1 ?'Session NORMALE':'Session de RATTRAPAGE').'<b/>';?></td></tr> -->
             </table> 
            <table  border="0" width="100%">
              
               <tr>
                   <td style="font-size: 100%" align="left"> <?php echo 'Filière : <b>'.$idProgramme .'<b/>'?></td>
                   <td style="font-size: 100%" align="right"> <?php echo 'Niveau :L <b>'.$niveau.'<b/>'?></td>
                   <td style="font-size: 100%" align="right"> <?php echo 'Année :<b>'.$annee.'<b/>'?></td>
               </tr>
           </table>
           
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
newwin.document.write('<style>@page  { size: auto;  margin-top: 0mm; }   h3{page-break-before: always;} \n }</style>\n')
newwin.document.write('<style>body {-webkit-print-color-adjust: exact;}  </style>\n')
//newwin.document.write('<style> @page { margin: 2cm; 2cm; 2cm; 2cm; }   h3{page-break-before: always;} </style>  \n');
//newwin.document.write('<style> @bottom-center { content: "Copyright My Company 2010" } </style>  \n');

//newwin.document.write('<style>@page { {content: counter(page) ;size: auto;  margin: 0mm;}}  h3{page-break-before: always;} \n }</style>\n')
//newwin.document.write('<style>body {-webkit-print-color-adjust: exact;}  </style>\n')

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