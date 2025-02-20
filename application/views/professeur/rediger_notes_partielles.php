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
        if(isset($valide))
        {
            echo heading('Valider les notes <br> Elément: '.$sigle.'<br> Semestre: '.get_session_nom($session).'-'.$annee.'<br> Programme : '.$programme,'2');
        }
        else
        {
            echo heading('Saisir les notes <br> Elément: '.$sigle.'<br> Semestre: '.get_session_nom($session).'-'.$annee.'<br> Programme : '.$programme,'2');
        }
        
        ?>

        <div>
            <?php echo heading($info,'3');?>
        </div>
        <?php
        
           $nbevaluation=  count($nomsEvaluations);
          //      echo 'ev1:'. $nomsEvaluation[0]['nomEvaluation'].' '.$nomsEvaluation[0]['nomEvaluation'].'<br>';
         ?>
        <div class="form">
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
          
           <table id="example" class="display" cellspacing="0" width="100%">
				<thead>
                                    	
                                    <tr>
                    <th>Mat.</th>
                    <th>Nom & prenom</th>
                    
                    <?php 
                    $evaluationsID=array();
                    $notesApresRT=array();
                    $options=array();
                    $options[]='';$options[]='DS';$options[]='Proj';
           
                    for($i=0;$i<$nbevaluation;$i++)
                    { $evaluationsID[]=$nomsEvaluations[$i]['idEvaluation'];
                    $x=$nomsEvaluations[$i]['ponderation'];    
                    ?>
                    <?php if($nomsEvaluations[$i]['ponderation']==0 & $nomsEvaluations[$i]['idEvaluation']!=4) {?>
                    <th><font color="red"><?php echo $nomsEvaluations[$i]['nomEvaluation']. '<br>'."(".$x."%)";?> </font></th>
                    <?php }
                    else 
                        {
                        if($nomsEvaluations[$i]['idEvaluation']!=4)
                        {
                            if($nomsEvaluations[$i]['idEvaluation']!=1)
                            {
                        ?>
                    <th><?php echo $nomsEvaluations[$i]['nomEvaluation']. '<br>'."(".$x."%)";?> </th>
                    <?php 
                        
                            }
                            else
                            {?>
           <th><?php
           
           $detail=$nomsEvaluations[$i]['detail'];
          
           ?> 
        
               CC<select name="detail">
        <?php for ($k=0; $k<3; $k++) 
        
        {
            if($options[$k]==$detail)
                echo '<option selected value="'.$detail.'">'.$detail.'</option>';
            else
                echo '<option value="'.$options[$k].'">'.$options[$k].'</option>';
        }
        ?>      
              
</select>
               <?php echo '<br>'."(".$x."%)".'<br>';?>
               
           </th>                     
                            <?php }
                            
                            
                            
                        }
                        
                        else {
                        ?>
                    <th><?php echo $nomsEvaluations[$i]['nomEvaluation'];?> </th>
                    <?php 
                        }
                        
                        
                        }
                    
                    }?>
                    
                    
                    
                    
    <th>Moyenne</th>
                   
                
                </tr>
                                    
                        
				</thead>

				

				<tbody>
                                    
                                     <?php
             
                
                        
                for($i=0;$i<sizeof($matricule);$i=$i+1)
                {
                    $totalCoef=0;
                   // echo $noteEtudiant[$i]['note'][0]['note'];  
                    echo '<tr><td>'.$matricule[$i].'</td><td>'.$infoEtudiant[$i]["nom"].'<br>'.$infoEtudiant[$i]["prenom"].'</td>';
                    
                    $note=0;
                    $noteEam=0;
                    $noteRT=0;
                    $pondExam=0;
                    $indiceRT=-1;
                    for($j=0;$j<$nbevaluation;$j++)
                    { 
                        $noteP=0;
                    
                        
                        
                            
                   // if(!empty($noteEtudiant[$i]['note']))
                    {//teste pour traiter les evaluations qui sont dans moduleevaluation mais pas encore dans notespartielles
                        //echo $noteEtudiant[$i]['note'][$j]['idEvaluation'];
                     
                     if(!isset($noteEtudiant[$i]['note'][$j]['note']) && $nomsEvaluations[$j]['idEvaluation']==4)
                             $noteEtudiant[$i]['note'][$j]['note']=0;
                     
                        if(isset($noteEtudiant[$i]['note'][$j]['note']))
                     {
                            
                            
                            $noteP=$noteEtudiant[$i]['note'][$j]['note'];
                     if($nomsEvaluations[$j]['idEvaluation']==2)
                     { $noteEam=$noteP;
                     $pondExam=$nomsEvaluations[$j]['ponderation'];
                     }
                     
                     if($nomsEvaluations[$j]['idEvaluation']==4)
                     {
                         $noteRT=$noteP;
                     $indiceRT=$j;
                     }
                     
                     
                     }
                    }   $note+=$nomsEvaluations[$j]['ponderation']*$noteP;
                    
                    $totalCoef+=$nomsEvaluations[$j]['ponderation'];
                        if((isset($disabled) && $disabled == 'disabled') )
                    $a = array('type' => 'text', 'size' => '4', 'name'=>'note'.$i.'-'.$j,'readonly'=>'readonly' );
                else {
                    $a = array('type' => 'text', 'size' => '4', 'name'=>'note'.$i.'-'.$j);
                }
                if($nomsEvaluations[$j]['idEvaluation']!=4)
                {
                echo '<td data-order='.$noteP.'>';         
                echo form_input($a,$noteP, '');
                          echo '</td>';
                }
                          //if((isset($disabled) && $disabled == 'disabled') || ($nomsEvaluations[$j]['idEvaluation']==6 and $nbNoteExam==0))
                          
                    }
                    
                    
                    
               
                    $totalNote=$note;
                    if($totalCoef!=0){
                    $note/=$totalCoef;}
                    $noteAvRT=$note;
                     
                    if($note<10 && $nbNoteExam<>0 && !(  ((isset($disabled) && $disabled == 'disabled') )))
                    {
                      $a = array('type' => 'text', 'size' => '4', 'name'=>'note'.$i.'-'.$indiceRT);  
                     echo '<td data-order='.$noteRT. ' data-search=rattrapage>';
                    
                    }
                    else
                    { $a = array('type' => 'text', 'size' => '4', 'name'=>'note'.$i.'-'.$indiceRT,'readonly'=>'readonly' );  
                    echo '<td data-order='.$noteRT.' data-search=principale>';
                    
                    }
                              
                echo form_input($a,$noteRT, '');
                          echo '</td>';
                    
                    if($noteRT>$noteEam)
                    {    $totalNote=$totalNote-$noteEam*$pondExam+$noteRT*$pondExam;
                    $note=$totalNote/$totalCoef;
                    }
                    
                    $notesApresRT[]=$note;
                    
                    $a = array('type' => 'text', 'size' => '4', 'name'=>'note'.$i,'readonly'=>'readonly','style'=>'color:blue' );
                    
                     echo '<td data-order='.$note.'>';
                          echo form_input($a,number_format($note,2),'');
                    
                     echo '</td>';
                          
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
         
                
         <?php       echo form_hidden('annee', $annee);
                echo form_hidden('session', $session);
                echo form_hidden('sigle', $sigle);
                echo form_hidden('matricule',$matricule);  
                echo form_hidden('evaluationsID',$evaluationsID);
                if($evaluationsID==null){
                     echo form_hidden('evaluationsID','');
                }
                
                    
                ?>
                
                        
            </tbody>
             
            </table>
            <?php  if( (isset($disabled) && $disabled != 'disabled') )
          {?>
            <table>
                <tr class="submit">
                    <td id="submit"><input type="submit" name="submit" id="submit" value="Enregistrer" /></td>
                     </tr>
            </table>
            
<?php } ?>
            
            </form> 
         
            <?php 
            if( (isset($disabled) && $disabled != 'disabled') )
          {
              echo form_open('professeur/valider_note',$attributes);
         
            echo form_open('professeur/valider_note',$attributes);?>
           <?php       echo form_hidden('annee', $annee);
                echo form_hidden('session', $session);
                echo form_hidden('sigle', $sigle);
                echo form_hidden('matricule',$matricule);  
                
                echo form_hidden('notesApresRT',$notesApresRT);
                    
                ?>
            <table>
                <tr class="submit">
                         <td id="submit"><input type="submit" name="submit" id="submit" value="Valider" />;</td>
                     </tr>
            </table>
            </form>   
            
             <?php }?>   
        
        
       
        </div>
        <script>
            function suppFiltre()
         {var a=find("input").attr("id", "globalSearchField")
            alert('ok');
         }
            </script>
        
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