<?php include(APPPATH.'views/include/header.php');
include('include/menu.php');
?>

 <div class="container">
    <div class="col-xs-12 hl-left">  


    <button  onClick="imprimer('printable');" style="float:right; height: 30px; background-color:#cceac4; width: 160px; margin-right:185px; margin-top:50px;"><b> Imprimer la liste </b></button>
    <div class="right_content" id="printable">

        <?php
        switch ($semestre) {
            case "03":
                $semestre = 'Automne ';
                break;
            case "01":
                $semestre = 'Printemps ';
                break;
            case "02":
                $semestre = 'Été ';
                break;
        }
        ?>
        <table>
            <tr>
                <td style="font-weight:bold">Tous les étudiants inscrits au module: </td>
                <td><?php echo $sigle ?></td>
            </tr>
        </table>
        <table>
            <tr>
                <td style="font-weight:bold;">Semestre: </td>
                <td><?php echo $semestre . $annee ?></td>
            </tr>
        </table>
        <table id="rounded-corner">
            <thead>
                <?php
                if (is_array($resultas) && count($resultas) > 0) {
                    echo "<tr><th>Matricule</th>";
                    foreach ($resultas as $result)
                        echo"<th>" . $result['sigle'] . "</th>";
                    echo"</tr>";
                    ?>
                </thead>
                <tbody>
                    <?php
                    foreach ($matricules as $matricule) {
                        echo"<tr><td><b>" . $matricule . "</b></td>";
                        foreach ($resultas as $result) {
                            $note = $result['notes'][$matricule];
                            if($note == -1 )
                                $note = "AV";
                                
                            echo"<td>" . $note . "</td>";
                        }
                    }
                }
                ?>
            </tbody>

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