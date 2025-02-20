<?php
include(APPPATH.'views/include/header.php');
include('include/menu.php');
?>
 <div class="container">
    <div class="col-xs-12 hl-left">
   
    <button  onClick="imprimer('printable');" style="float:right; height: 30px; background-color:#cceac4; width: 160px; margin-right:185px; margin-top:50px;"><b> Imprimer la liste </b></button>
    <div class="right_content" id="printable">

        <?php
        
        switch ($semestre) {
            case "3":
                $semestreName = 'Automne ';
                break;
            case "1":
                $semestreName = 'Printemps ';
                break;
            case "2":
                $semestreName = 'Été ';
                break;
        }
        ?>
        <h2><b>Rapport global pour le Conseil de classe 3/3</b></h2>
        <h2>Étudiants inscrits au module<b> <?php echo $sigle; ?> </b>au semestre 
            <b>
                <?php echo $semestreName.' '.$annee;?>
            </b>
        </h2>
         <?php  $attributes = array('class' => 'niceform');
    echo form_open('scolarite/generer_rappor_conseil',$attributes);?>
        <table id="rounded-corner">
            <thead>
                <?php
                echo form_hidden('semestre',$semestre);
                if (is_array($resultas) && count($resultas) > 0) 
                {
                    echo "<tr><th>Matricule</th>";
                    echo form_hidden($resultas);

                    foreach ($resultas as $result)
                        echo"<th>" . $result['sigle'] . "</th>";
                    echo"</tr>";
                    ?>
                </thead>
                <tbody>
                    <?php
                    foreach ($matricules as $matricule) 
                    {
                        echo"<tr><td>" . $matricule . "</td>";
                        foreach ($resultas as $result) 
                        {
                            if ($result['notes'][$matricule] == '-1')
                                echo"<td> * </td>";
                            elseif($result['notes'][$matricule] == 'N/A')
                            {
                                echo"<td> - </td>";
                            }
                            else
                                echo"<td>" . $result['notes'][$matricule] . "</td>";
                        }
                    }
                }
                echo form_hidden('matricules', $matricules);
                
                 echo form_hidden('annee',$annee);
                 echo form_hidden('moduleReference',$sigle);
                ?>
            </tbody>

        </table>
        <table id="excelExport">
        <tr>
            <td>
               <?php
                if(is_array($matricules))
                {
               $pw = array('type' => 'submit', 'name' => 'submit', 'id'=>'', 'value'=>'Exporter la liste en Excel');
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