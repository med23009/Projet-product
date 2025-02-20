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
        "iDisplayLength": 100,
 
            "sSwfPath": "<?php echo base_url();?>DataTables-1.10.6/extensions/TableTools/swf/copy_csv_xls.swf",
        "oTableTools": {
          "aButtons": [
          /*  {'sExtends':'copy',
              "oSelectorOpts": { filter: 'applied', order: 'current' },
              "sButtonText" : "Copier",
            },
            {'sExtends':'xls',
              "oSelectorOpts": { filter: 'applied', order: 'current' },
            },
            {'sExtends':'print',
              "oSelectorOpts": { filter: 'applied', order: 'current' },
              "sButtonText" : "Imprimer",
            }*/
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
function  control_note(note){
//alert(note);
var n=note;
    if(n>20){
       alert("Attention! la note ne doit pas être superieur à 20 ");
    }
     if(n<-1){
       alert("Attention! la note ne doit pas  être inferieur à 0 ");
    }
    }
</script>    


  <div class="container">
    <div class="col-xs-12 hl-left  pl-5 pr-5"> 
        
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
            return 'Impaire';
          //  return 'Automne';
        }
        elseif($numeroSemestre == 2)
        {
            return 'Été';
        }
        else
        {
            return'Paire';
            //return 'Printemps';
        }
    }
        if(isset($valide))
        {
            echo heading('Valider les notes <br> Elément: '.$sigle.'<br> Semestre: '.get_session_nom($session).'-'.$annee,'2');
        }
        else
        {
            echo heading('Saisir les notes <br> Elément: '.$sigle.'<br> Semestre: '.get_session_nom($session).'-'.$annee,'2');
        }
        
        ?>
<?php echo form_open("professeur/verifier_notes_exportees/$annee/$sigle/$session/$idEvaluation/$anonymat"); //2 idEvaluation?>
           
           <td id="submit"><input type="submit" name="submit" id="submit" value="importer les notes "></td>
            </form>
        <div>
            <?php echo heading($info,'3');?>
        </div>
        <?php
        
           $nbevaluation=  count($nomsEvaluations);
          //      echo 'ev1:'. $nomsEvaluation[0]['nomEvaluation'].' '.$nomsEvaluation[0]['nomEvaluation'].'<br>';
         ?>
        <div class="form ">
          <?php //$attributes = array('class' => 'niceform', 'name'=>'form1', 'onSubmit'=>'actualiserNote()');
          $attributes = array( 'name'=>'form1');
          if(isset($valide))
          {
              echo form_open('professeur/valider_note',$attributes);
          }
          else
          {
              echo form_open('professeur/enregistrer_note',$attributes);
          }?>
             <div id="printable">
           <!-- Debut Data tables -->
          
           <table id="example" class=" table-striped" width="100%" >
				<thead>
                                    	
                                    <tr>
                    <th>Code</th>
                    
                    <?php 
                    $evaluationsID=array();
                    $notesApresRT=array();
                    $options=array();
                    $options[]='';$options[]='DS';$options[]='Proj';
           $i=0;
           /* avant on affichait plusieurs evaluations ...*/
                    //for($i=0;$i<$nbevaluation;$i++)
                     $evaluationsID[]=$nomsEvaluations[$i]['idEvaluation'];
                    $x=$nomsEvaluations[$i]['ponderation'];    
                    
                    
                       
                            
                        ?>
                    <th><?php echo $nomsEvaluations[$i]['nomEvaluation']. '<br>'."(".$x."%)";?> </th>
                    

                </tr>
                                    
                        
				</thead>

				

				<tbody>
                                    
                                     <?php
             
                
                      
                for($i=0;$i<sizeof($matricule);$i=$i+1)
                {
                if(!empty($infoEtudiant[$i]["matriculeEtudiant"])){//add by MedBAkar 15-04-2020
                    $totalCoef=0;
                   if($option=='ex') {
                    
                    echo '<tr><td>'.$infoEtudiant[$i]["matriculeEtudiant"].'</td>';
                     
                                      }
                   if($option=='rt') {
                    
                    echo '<tr><td>'.$infoEtudiant[$i]["matriculeEtudiant"].'</td>';
   

                  }
                    
                   $j=0;
                    //for($j=0;$j<$nbevaluation;$j++)
                    { 
                        $noteP=-1;
                    
                  
                  
                  //   if(!isset($noteEtudiant[$i]['note'][$j]['note']) && $nomsEvaluations[$j]['idEvaluation']==4)
                    //         $noteEtudiant[$i]['note'][$j]['note']=0;
                     
                        if(isset($noteEtudiant[$i]['note'][$j]['note']))
                     {
                            
                            
                            $noteP=$noteEtudiant[$i]['note'][$j]['note'];
                     
                    
                     
                     
                     }
                   
                    
                    
                        if((isset($disabled) && $disabled == 'disabled') )
                    $a = array('type' => 'text', 'size' => '4','onblur'=>'control_note(this.value)', 'name'=>'note'.$i.'-'.$j,'readonly'=>'readonly' );
                else {
                    $a = array('type' => 'text', 'size' => '4','onblur'=>'control_note(this.value)', 'name'=>'note'.$i.'-'.$j);
                }
                echo '<td data-order='.$noteP.' align="center">';         
                echo form_input($a,$noteP, '');
                          echo '</td>';
                          
                    }
                    
                    
                    
                    echo '</tr>';
                
                } 
                }
                
                
                    
                ?>
                
                                  				</tbody>
			

</table>  
             </div>
         <!--
         Fin Data tables
         <table id="rounded-corner">
         -->
         
                
         <?php       
       
                echo form_hidden('annee', $annee);
                echo form_hidden('session', $session);
                echo form_hidden('sigle', $sigle);
                echo form_hidden('matricule',$matriculeCrypte);  
                echo form_hidden('evaluationsID',$evaluationsID);
                 echo form_hidden('option', $option);
                    
                ?>
                
                        
            </tbody>
             
            </table>
            <?php  if( (isset($disabled) && $disabled != 'disabled') )
          {?>
            <table>
                <tr class="submit">
                    <td id="submit"><input type="submit" name="submit" id="submit" value="Enregistrer""/></td>
                     </tr>
            </table>
            
<?php } ?>
            
            </form> 
         
            
        
       
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
newwin.document.write('<h3>Rattrapage Elément : '+'<?php echo $sigle;?>'+'</h3>\n')
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
