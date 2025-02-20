<?php
include(APPPATH.'views/include/header.php');
include('include/menu.php');
?>
 <div class="container">
    <div class="col-xs-12 hl-left">


    <button  onClick="imprimer('printable');" style="float:right; height: 30px; background-color:#cceac4; width: 160px; margin-right:185px; margin-top:50px;"><b> Imprimer la liste </b></button>
    <div class="right_content" id="printable">

        <?php
        $codeSemestre=$semestre;
        switch ($semestre) {
            case "3":
                $semestre = 'Automne ';
                break;
            case "1":
                $semestre = 'Printemps ';
                break;
            case "2":
                $semestre = 'Été ';
                break;
        }
        ?>
        <h1>Rapport par module pour le Conseil de classe 3/3.</br></br>
        <span style="font-size: 15px;">Étudiants inscrits au module <?php echo $sigle; ?> au semestre 
            <b>
                <?php echo $semestre.' '.$annee;?>
            </b>
            </span>
        </h1>
        <table id="rounded-corner">
             <?php  $attributes = array('class' => 'niceform');
    echo form_open('scolarite/generer_rappor_note_module',$attributes);?>
            <thead>
                <?php
                if (is_array($resultas) && count($resultas) > 0) 
                {
                    echo "<tr><th>Matricule</th><th>Note</th><th>Cote</th></tr>";
                    ?>
                </thead>
                <tbody>
                    <?php
                    $counter = 0;
                    foreach ($matricules as $matricule) 
                    {
                    
                        echo"<tr><td>" . $matricule . "</td>";
                        if($resultas[$counter]['note'] == -1)
                        {
                            echo "<td>-</td>";
                        }
                        else
                        {
                            echo "<td>".$resultas[$counter]['note']."</td>";
                        }
                        echo "<td>".$resultas[$counter]['cote']."</td>";
                        echo "</tr>";
                        $counter++;
                    }
                }
                echo form_hidden('resultats',$resultas);
                echo form_hidden('matricules',$matricules);
                echo form_hidden('sigle',$sigle);
                echo form_hidden('annee',$annee);
                echo form_hidden('semestre',$semestre);
                 echo form_hidden('codeSemestre',$codeSemestre);
               
                ?>
            </tbody>

        </table>
        <table id="excelExport">
        <tr>
            <td>
               <?php 
               if(is_array($matricules))
               {
                     $pw = array('type' => 'submit', 'name' => 'submit', 'id'=>'', 'value'=>'Exporter les notes partielles en Excel');
                echo form_input($pw);
               }
             ?>
            </td>
        </tr>
        </table>
    </div>
    <div class="clear"></div>
</div> <!--end of main content-->
</div>
<?php include(APPPATH.'views/include/footer.php'); ?>

<script type="text/javascript">
    <!--
    function imprimer(id){
        str=document.getElementById(id).innerHTML
        newwin=window.open('','printwin','left=100,top=100,width=400,height=400')
        newwin.document.write('<HTML>\n <HEAD>\n')
        newwin.document.write('<link rel="stylesheet" href="<?php echo base_url(); ?>css/printable.css" />\n');
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