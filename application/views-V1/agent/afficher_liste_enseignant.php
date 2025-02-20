<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
   <div class="center_content">


 <button  onClick="imprimer('printable');" style="float:right; height: 30px; background-color:#cceac4; width: 160px; margin-right:185px; margin-top:50px;"><b> Imprimer la liste </b></button>
     <?php
        $attributes = array('class' => 'niceform', 'name' => 'choixType');
        echo form_open('agent/generer_excel_liste_enseingant', $attributes);
        ?>
<div class="container">
    <div class="col-xs-12 hl-left">
     <div id="printable">
        <h3 style="margin-left:50px"><?php echo $titre ?></h3>
       
        <table id="rounded-corner">
            <thead>
                <tr>
                    <th>Matricule</th>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Code d'accès</th>
                </tr>
            </thead>
            
            <tbody>
                <?php
                    /*
     * fonction pour convertir le code du semestre par son nom 
     * elle prend en parametre le numero du semestre soit(1,2,3)
     * et elle retourne le nom (Automn,ete,printemps)
     */

    function get_session_nom($numeroSemestre) {
        if ($numeroSemestre == 3) {
            return 'Automne';
        } elseif ($numeroSemestre == 2) {
            return 'Été';
        } else {
            return 'Printemps';
        }
    }
                    if($infoEnseignant != NULL)
                    for($i=0;$i<count($infoEnseignant['matriculeEmploye']);$i++)
                    {
                        
                        echo "<tr>";
                        echo "<td>".anchor('agent/saisir_horaire/'.$infoEnseignant['matriculeEmploye'][$i], $infoEnseignant['matriculeEmploye'][$i])."</td>
                        <td>".$infoEnseignant['prenom'][$i]."</td>
                        <td>".$infoEnseignant['nom'][$i]."</td>
                        <td>".$infoEnseignant['login'][$i]."</td>
                        </tr>";
                            
                    }
                    echo form_hidden($infoEnseignant);
                    echo form_hidden('departement',$departement);
                ?>
            </tbody>
            
        </table>
        </div>
        <table id="excelExport">
        <tr>
            <td>
               <?php $pw = array('type' => 'submit', 'name' => 'submit', 'id'=>'', 'value'=>'Exporter la liste en Excel');
               // echo form_input($pw);?>
            </td>
        </tr>
        </table>
   <?php  echo form_close();?>
           </div><!--end of right content-->
           <div class="clear">
               
           </div>
    </div> <!--end of main content-->
    </div>
    <?php
  include(APPPATH.'views/include/footer.php');?>

<script type="text/javascript">
<!--
function imprimer(id){
str=document.getElementById(id).innerHTML
newwin=window.open('','printwin','left=100,top=100,width=400,height=400')
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