<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
   
 <div class="container">
    <div class="col-xs-12 hl-left"> 
    
     <div >
            <button  onClick="imprimer('printable');" style="float:right; height: 30px; background-color:#cceac4; width: 160px; margin-right:185px; margin-top:50px;"><b> Imprimer liste </b></button>
            
     </div>
    

            
        <div id="printable">
        <h2>Liste des étudiants</h2> 

        <div >
 
             
         <table id="rounded-corner" summary="cycle">
            <thead>
                <tr>
                    <th id="col" class="rounded">Matricule</th>
                    <th id="col" class="rounded">Nom </th>
                    <th id="col" class="rounded">Prénom </th>
                </tr>
            </thead>
            <tbody id="liste des étudiants">
                <?php
                
                for($i=0;$i<sizeof($table);$i=$i+1)
                {
                echo '<tr>
                    <td>'.$table[$i]["matriculeEtudiant"].'</td>
                        <td>'.$table[$i]["nom"].'</td>
                            <td>'.$table[$i]["prenom"].'</td>

                    
                    </tr>';
                }
                 
                ?>
                        
            </tbody>
        </table>
         </div>   <!-- end of printable div--> 
        </div>
         <?php
        $attributes = array('class' => 'niceform', 'name' => 'choixType');
        echo form_open('professeur/generer_excel', $attributes);
        echo form_hidden('liste',$table);
                  echo form_hidden('idGroupe',$idGroupe);
        ?>
        <table id="excelExport">
            
        <tr>
            <td>
               <?php $pw = array('type' => 'submit', 'name' => 'submit', 'id'=>'', 'value'=>'Exporter la liste en Excel');
                echo form_input($pw);?>
            </td>
        </tr>
        </table>
   <?php  echo form_close();?>
     
     </div><!-- end of right content--> 
                    
  </div>   <!--end of center content -->               
                    
                    
    
    
    <div class="clear"></div>
    </div> <!--end of main content-->
	
    
  <?php include(APPPATH.'views/include/footer.php');?>
<script type="text/javascript">
<!--
function imprimer(id){
str=document.getElementById(id).innerHTML
newwin=window.open('','printwin')
newwin.document.write('<HTML>\n <HEAD>\n')
newwin.document.write('<link rel="stylesheet" href="<?php echo base_url();?>css/printable.css" />\n');
newwin.document.write('<TITLE>Impression de la liste </TITLE>\n')
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
