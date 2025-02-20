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
 <script type="text/javascript">
    
$(document).ready(function() {
/*$('.open-popup-link').magnificPopup({
  type:'inline',
  midClick: true // Allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source in href.
});*/

  /* $('#example thead tr#filterrow th').each( function () {
        var title = $('#example thead th').eq( $(this).index() ).text();
        
      //$(this).html( '<input type="text" size="1" placeholder="Search '+title+'" />' );
      
    } );
    */
       
var table = $('#example').DataTable( {
       "dom": 'T<"clear">lfrtip',
      
       
        //"pagingType": "full_numbers",
        //"iDisplayLength": 10,
 
            
        "oTableTools": {
            "sSwfPath": "<?php echo base_url();?>DataTables-1.10.6/extensions/TableTools/swf/copy_csv_xls.swf",
          "aButtons": [
         {'sExtends':'copy',
              "oSelectorOpts": { filter: 'applied', order: 'current' },
              "sButtonText" : "Copier",
              
            },
            {'sExtends':'xls',
              "oSelectorOpts": { filter: 'applied', order: 'current' },
            },
            {'sExtends':'print',
              "oSelectorOpts": { filter: 'applied', order: 'current' },
              "sButtonText" : "Imprimer",
              
            }
          ]
        },
        "language": {
        "url": "<?php echo base_url();?>DataTables-1.10.6/lang/French.json"
        }

     
                        
    });
   
  /* $("#example thead input").on( 'keyup change', function () {
        table
            .column( $(this).parent().index()+':visible' )
            .search( this.value )
            .draw();
    } );
    
$("#example thead select").on( 'keyup change', function () {
        table
            .column( $(this).parent().index()+':visible' )
            .search( this.value )
            .draw();
    } );

 */
 
 /*$( "#target" ).click(function() {

table.fnFilterClear();

    
  
});*/

 
});
</script>    


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
        
    $titre=$infoModule['titreModule']. ' ('. $sigle.') : '.$infoModule['titreUnite']; 
 echo heading($titre,'2');
        
        
        ?>

        
        <div class="form">
          <?php //$attributes = array('class' => 'niceform', 'name'=>'form1', 'onSubmit'=>'actualiserNote()');
          ?>
             <div id="printable">
           <!-- Debut Data tables -->
          
           <table id="example" class="display" cellspacing="0" width="100%">
              
				<thead>
                                    <tr>
                    <th>Code</th>
                    <th>Matricule</th>
                    <th>Nom & prenom</th>
                    
                </tr>
                                    
                        
				</thead>

				

				<tbody>
                                    
                                     <?php
             
                
                        
                for($i=0;$i<sizeof($info);$i=$i+1)
                {
                    echo '<tr>';
                    echo '<td>'. $info[$i]['code_ex'].'</td>';
                    echo '<td>'. $info[$i]['matriculeEtudiant'].'</td>';
                    echo '<td>'. $info[$i]['prenom'].' '.$info[$i]['nom'].'</td>';
                    
                    echo '</tr>';
                   
                    
                }
                
                
                    
                ?>
                
                                  				</tbody>
			

</table>  
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
newwin.document.write('<style>@page { size: auto;  margin: 0mm; }</style>\n')

//newwin.document.write('<link rel="stylesheet" href="<?php echo base_url();?>css/printable.css" />\n');
newwin.document.write('<TITLE>Rattrapage-'+'<?php echo $sigle;?>'+'</TITLE>\n')
newwin.document.write('<h3>Rattrapage du module : '+'<?php echo $sigle;?>'+'</h3>\n')
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