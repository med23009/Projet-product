<?php
 include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
    <div class="container">
        <div class="col-xs-12 hl-left">
            
         <?php echo heading($titre,'3');
            $attributes = array('class' => 'niceform');
            echo form_open('scolarite/liste_sortants',$attributes);
            echo '<table class="form" id="tableProf">';
          ?>
        
            <tr>
                <th style="text-align:left;">Année</th>
                
                <th style="text-align:left;">Filière</th> 
                <!--<th style="text-align:left;">Niveau</th>-->
            </tr>
            <tr>
                <td>
                    <select name="annee">
                        <?php
                            $dattte= getdate();
                            $a_c=$dattte['year'];
                            for($i=$a_c;$i>=2019;$i--){
                                echo "<option value='$i' ";
                                if($i==$a_c) echo "selected='selected'";
                                echo ">$i-".($i+1)." </option>";
                            }
                        ?>
                    </select>
                </td>
          
              <td>
                    <select     name="idProgramme"  id="idProgramme" >
                        <option value="tous">Tous</option>
                        <?php
                            if (is_array($programme['idProgramme'])) {
                                 for ($i = 0; $i < count($programme['idProgramme']); $i++) {
                                     echo '<option value="' . $programme['idProgramme'][$i] . '"';
                                            echo ' >';
                                            echo $programme['idProgramme'][$i] . '</option>';
                                }
                            }
                         ?>
                    </select>
                    
                </td>
             <!--  <td>
                    <select name="niveau">
                        <option value="tous">Tous</option>
                        <option value="1">L1</option>
                        <option value="2">L2</option>
                        <option value="3">L3</option>
                    </select>
                    
                </td>
              -->
            </tr>
            <tr style="height: 20px;"></tr>
            <tr>
                 <td class="submit">
                 <?php $pw = array('type' => 'submit', 'name' => 'submit', 'id'=>'submit', 'value'=>'Générer la liste en Excel');
                 echo form_input($pw);?>
                 </td>
            </tr>
         </table>
        <?php echo form_close('</div>');?>
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
