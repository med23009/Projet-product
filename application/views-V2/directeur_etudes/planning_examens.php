<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
   <div class="center_content">


 <button  onClick="imprimer('printable');" style="float:right; height: 30px; background-color:#cceac4; width: 160px; margin-right:185px; margin-top:50px;"><b> Imprimer la liste </b></button>
 <div class="form-group">
            <div class="row colbox">
          
        
 
 <div class="container">
    <div class="col-xs-12 hl-left">
           
             <div class="form-group">
            <div class="row colbox">
            <div class="col-lg-4 col-sm-4">
                <label for="nom" class="control-label">Programme:</label>
            </div>
            <div class="col-lg-8 col-sm-8">
                <select class="form-control"   type="hidden"  name="idProgramme"  id="idProgramme" > 
                                                                       <option value="tous">Tous</option>
                                                                      <?php
                                                                        if (is_array($programme['idProgramme'])) {


                                                                            for ($i = 0; $i < count($programme['idProgramme']); $i++) {
                                                                                echo '<option value="' . $programme['idProgramme'][$i] . '"';
                                                                                         if( $programme['idProgramme'][$i]==$idProgramme1){
                                                                                    echo"selected";
                                                                                }
                                                                                        echo ' >';
                                                                                       echo $programme['idProgramme'][$i] . '</option>';
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </select>
            </div>
            </div>
            </div>
      <!--    <button class="btn btn-default btn-sm" id="add"><span class="glyphicon glyphicon-plus-sign"></span>Ajouter</button><!--<button class="btn btn-default btn-sm" id="delete"><span class="glyphicon glyphicon-trash"></span>Supprimer</button>--><button class="btn btn-default btn-sm" id="update"><span class="glyphicon glyphicon-edit"></span>Modifier</button>
 -->
        <div id="createEventModal1" class="modal fade" role="dialog">
       <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                   <!-- <input type="hidden" id="planning" name="planning"/>-->
    <!--  <div class="form-group">
            <div class="row colbox">
            <div class="col-lg-4 col-sm-4">
                <label for="prenom" class="control-label">Planing :</label>
            </div>
            <div class="col-lg-8 col-sm-8">
                                                                        <select class="form-control"   name="planing"   > 
                                                                       <option value="-1">choisissez un planing</option>
                                                                      <?php
                                                                        if (is_array($planing['id'])) {


                                                                            for ($i = 0; $i < count($planing['id']); $i++) {
                                                                                echo '<option value="' . $planing['id'][$i] . '" >' . $planing['id'][$i] . ' ' . $planing['annee'][$i] . ' ' . $planing['semestre'][$i] . ' ' . $planing['session'][$i] . '</option>';
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </select>
            </div>
            </div>
            </div>-->
            <div class="form-group">
            <div class="row colbox">
            
            <div class="col-lg-4 col-sm-4">
                <label for="num_bac" class="control-label">Année :</label>
            </div>
            <div class="col-lg-8 col-sm-8">
                                                                        <select  class="form-control"   id="date"   name="date">

                                                                            echo '> 2011</option>'."\n";
                                                                            ?>
                                                                            <?php
                                                                            echo '<option value="2011"';
                                                                            if ($annee == "2011") {
                                                                                echo ' selected';
                                                                            }
                                                                            echo '> 2011</option>' . "\n";
                                                                            ?>
                                                                            <?php
                                                                            echo '<option value="2012"';
                                                                            if ($annee == "2012") {
                                                                                echo ' selected';
                                                                            }
                                                                            echo '> 2012</option>' . "\n";
                                                                            ?>
                                                                            <?php
                                                                            echo '<option value="2013"';
                                                                            if ($annee == "2013") {
                                                                                echo ' selected';
                                                                            }
                                                                            echo '> 2013</option>' . "\n";
                                                                            ?>
                                                                            <?php
                                                                            echo '<option value="2014"';
                                                                            if ($annee == "2014") {
                                                                                echo ' selected';
                                                                            }
                                                                            echo '> 2014</option>' . "\n";
                                                                            ?>
                                                                            <?php
                                                                            echo '<option value="2015"';
                                                                            if ($annee == "2015") {
                                                                                echo ' selected';
                                                                            }
                                                                            echo '> 2015</option>' . "\n";
                                                                            ?>
                                                                            <?php
                                                                            echo '<option value="2016"';
                                                                            if ($annee == "2016") {
                                                                                echo ' selected';
                                                                            }
                                                                            echo '> 2016</option>' . "\n";
                                                                            ?>
                                                                            <?php
                                                                            echo '<option value="2017"';
                                                                            if ($annee == "2017") {
                                                                                echo ' selected';
                                                                            }
                                                                            echo '> 2017</option>' . "\n";
                                                                            ?>
                                                                            <?php
                                                                            echo '<option value="2018"';
                                                                            if ($annee == "2018") {
                                                                                echo ' selected';
                                                                            }
                                                                            echo '> 2018</option>' . "\n";
                                                                            ?>
                                                                            <?php
                                                                            echo '<option value="2019"';
                                                                            if ($annee == "2019") {
                                                                                echo ' selected';
                                                                            }
                                                                            echo '> 2019</option>' . "\n";
                                                                            ?>
                                                                            <?php
                                                                            echo '<option value="2020"';
                                                                            if ($annee == "2020") {
                                                                                echo ' selected';
                                                                            }
                                                                            echo '> 2020</option>' . "\n";
                                                                            ?>
                                                                            <?php
                                                                            echo '<option value="2021"';

                                                                            if ($annee == "2021") {
                                                                                echo ' selected';
                                                                            }
                                                                            echo '> 2021</option>' . "\n";
                                                                            ?>
                                                                            <?php
                                                                            echo '<option value="2022"';

                                                                            if ($annee == "2022") {
                                                                                echo ' selected';
                                                                            }
                                                                            echo '> 2022</option>' . "\n";
                                                                            ?>
                                                                            <?php
                                                                            echo '<option value="2023"';
                                                                            if ($annee == "2023") {
                                                                                echo ' selected';
                                                                            }
                                                                            echo '> 2023</option>' . "\n";
                                                                            ?>
                                                                            <?php
                                                                            echo '<option value="2024"';
                                                                            if ($annee == "2024") {
                                                                                echo ' selected';
                                                                            }
                                                                            echo '> 2024</option>' . "\n";
                                                                            ?>
                                                                            <?php
                                                                            echo '<option value="2025"';
                                                                            if ($annee == "2025") {
                                                                                echo ' selected';
                                                                            }
                                                                            echo '> 2025</option>' . "\n";
                                                                            ?>
                                                                            <?php
                                                                            echo '<option value="2026"';
                                                                            if ($annee == "2026") {
                                                                                echo ' selected';
                                                                            }
                                                                            echo '> 2026</option>' . "\n";
                                                                            ?>

                                                                            <?php
                                                                            echo '<option value="2027"';
                                                                            if ($annee == "2027") {
                                                                                echo ' selected';
                                                                            }
                                                                            echo '> 2027</option>' . "\n";
                                                                            ?>
                                                                            <?php
                                                                            echo '<option value="2028"';
                                                                            if ($annee == "2028") {
                                                                                echo ' selected';
                                                                            }
                                                                            echo '> 2028</option>' . "\n";
                                                                            ?>

                                                                            <?php
                                                                            echo '<option value="2029"';
                                                                            if ($annee == "2029") {
                                                                                echo ' selected';
                                                                            }
                                                                            echo '> 2029</option>' . "\n";
                                                                            ?>
                                                                            <?php
                                                                            echo '<option value="2030"';
                                                                            if ($annee == "2030") {
                                                                                echo ' selected';
                                                                            }
                                                                            echo '> 2030</option>' . "\n";
                                                                            ?>     
                                                                        </select>
            </div>
            </div>
            </div>





            <div class="form-group">
            <div class="row colbox">
            <div class="col-lg-4 col-sm-4">
                <label  for="annee" class="control-label">Semestre:</label>
            </div>
            <div class="col-lg-8 col-sm-8">
                                                                       
                                                                        <?php
                                                                        echo ' <select class="form-control"   name="semestre" id="semestre1"> ';
                                                                        for ($i = 1; $i <= 6; $i++) {
                                                                            echo '<option value="' . $i . '"> S' . $i . '</option>';
                                                                        }
                                                                        echo '</select>';
                                                                        ?>
                                                                       
             <!--   <input id="annee" name="annee" placeholder="annee" type="text" class="form-control"  value="<?php echo set_value('Année'); ?>" />
                <span class="text-danger"><?php echo form_error('annee'); ?></span>-->
            </div>
            </div>
            </div>
            
          
            
            <div class="form-group">
            <div class="row colbox">
            <div class="col-lg-4 col-sm-4">
                <label for="nom" class="control-label">Programme:</label>
            </div>
            <div class="col-lg-8 col-sm-8">
                                                                        <select class="form-control"    name="idProgramme"  id="idProgramme1" onchange="selectModule(this.options[this.selectedIndex].value)"> 
                                                                       <option value="-1">choisissez un programme</option>
                                                                      <?php
                                                                        if (is_array($programme['idProgramme'])) {


                                                                            for ($i = 0; $i < count($programme['idProgramme']); $i++) {
                                                                                echo '<option value="' . $programme['idProgramme'][$i] . '" >' . $programme['idProgramme'][$i] . '</option>';
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </select>
            </div>
            </div>
            </div>
            <div class="form-group">
            <div class="row colbox">
            <div class="col-lg-4 col-sm-4">
                <label for="prenom" class="control-label">Eléments:</label>
            </div>
            <div class="col-lg-8 col-sm-8">
                <select class="form-control" id="infomodule_element_dropdown" name="sigle" >
                                                                                <option value="-1">choisissez l'element</option>
                                                                            </select>
            </div>
            </div>
            </div>
            
  <div class="form-group">
            <div class="row colbox">
            <div class="col-lg-4 col-sm-4">
                <label for="prenom" class="control-label">Journée :</label>
            </div>
            <div class="col-lg-8 col-sm-8">
                    
                                                                        <select  class="form-control"  name="journee" id="journee"  > 
                                                                       <option value="-1">choisissez un planig journee</option>
                                                                      <?php
                                                                   // print_r($planningjournee); echo"gg";
                                                                        if (is_array($planningjournee['id'])) {


                                                                            for ($i = 0; $i < count($planningjournee['id']); $i++) {
                                                                                echo '<option value="' . $planningjournee['id'][$i] . '" >' . $planningjournee['id'][$i] . ' ' . $planningjournee['date'][$i] . '</option>';
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </select>
            </div>
            </div>
            </div>
             <div class="form-group">
            <div class="row colbox">
            <div class="col-lg-4 col-sm-4">
                <label for="department" class="control-label">Crenau:</label>
            </div>
            <div class="col-lg-8 col-sm-8">
            <select class="form-control"   name="crenau" id="crenau"  > 
                                                                       <option value="-1">choisissez un crenau</option>
                                                                      <?php
                                                                        if (is_array($crenau['id'])) {


                                                                            for ($i = 0; $i < count($crenau['id']); $i++) {
                                                                                echo '<option value="' . $crenau['id'][$i] . '" >'. $crenau['heurD'][$i] . 'h- ' . ($crenau['heurD'][$i]+$crenau['duree'][$i]) .'h </option>';
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </select>
                
                <span class="text-danger"><?php echo form_error('department'); ?></span>
            </div>
            </div>
            </div>
            
            
            <div class="form-group">
            <div class="col-sm-offset-4 col-lg-8 col-sm-8 text-left">
                <input id="submitButton" name="btn_add" type="submit" class="btn btn-primary" value="Ajouter" />
                <input id="btn_cancel" name="btn_cancel" type="reset" class="btn btn-danger" value="Annuler" />
            </div>
            </div>
      
  </div>
                                                </div></div></div>
                                            
            <div class="form-group">
            <div class="row colbox">
            <div class="col-lg-4 col-sm-4">
                <label for="prenom" class="control-label">Planing :</label>
            </div>
            <div class="col-lg-8 col-sm-8">
                                                                        <select  class="form-control"   name="planing" id="planning"   > 
                                                                       <option value="-1">choisissez un planing</option>
                                                                      <?php
                                                                        if (is_array($planing['id'])) {


                                                                            for ($i = 0; $i < count($planing['id']); $i++) {
                                                                                echo '<option value="' . $planing['id'][$i] . '"';
                                                                                      if($planing['id'][$i]==$idPlaning){
                                                                                    echo"selected";
                                                                                }
                                                                                      echo  ' >';
                                                                                            echo $planing['id'][$i] . ' ' . $planing['annee'][$i] . ' ' . $planing['semestre'][$i] . ' ' . $planing['session'][$i] . '</option>';
                                                                                
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </select>
            </div>
            </div>
            </div>
     <div id="printable">
         <style>     
#parallelogram {
	width: 800px;
	height: 80px;
	-webkit-transform: skew(160deg);
	   -moz-transform: skew(20deg);
	     -o-transform: skew(20deg);
	  background: #c5d9f1;
          border: 1px;
          border-color: gray;
        }
         #parallelogram1 {
	width: 80px;
	height: 80px;
        border: 1px;
	-webkit-transform: skew(160deg);
	   -moz-transform: skew(20deg);
	     -o-transform: skew(20deg);
	background: #c5d9f1;
        }</style>
         <style>
p.uppercase {
    text-transform: uppercase;
}

p.lowercase {
    text-transform: lowercase;
}

p.capitalize {
    text-transform: capitalize;
}
.monTexte {
  writing-mode: vertical-rl;
  text-orientation: sideways;
}
</style>

 <table  width="100%" style="width: 721.6pt; margin-left: 3.5pt; border-collapse: collapse;" width="962">
<tbody>
    <tr><td align="center" colspan="16"><div id="parallelogram"><br>Planning des Examens de la Filière <b><?php echo " ".$idProgramme1; ?></b> [Session : SN] du 28/01/2018 au 03/02/2018<br>  
Arrêt des Cours  le 25/01/2018 à 19H - Debit de la Session SN  le 28/01/2018 à 8H 
</div></td><td colspan="5"><div id="parallelogram1"></div></td></tr>
<tr style="height: 19.5pt;">
<td style="height: 19.5pt; border: none;" width="0">&nbsp;</td>
</tr>

</table>
<?php //$idProgramme=array("LGTR","MAN","MAEF","RXTEL");
$heurD=array(8,10,12,15);?>
<?php    $k=0; foreach ($planning as $idJournee => $plan1) {
   // foreach($idProgramme as $programme){
   //print_r($plan1);echo "hhh";
  //  }
    ?>
  <table  width="100%" style="width: 721.6pt; margin-left: 3.5pt; border-collapse: collapse;" width="962">
      <tr style="height: 21.75pt;">
<td style="width: 89.2pt; border: solid #C0504D 1.0pt; background: #D8D8D8; padding: 0cm 3.5pt 0cm 3.5pt; height: 21.75pt;" colspan="4" width="119">
<p style="margin-bottom: .0001pt; text-indent: 36.15pt; line-height: normal;"><strong><span style="font-size: 9.0pt; font-family: 'Cambria','serif'; color: #4f81bd;">Heure &gt;&gt;&gt;</span></strong></p>
</td>
<td style="width: 100.4pt; border: solid #C0504D 1.0pt; border-left: none; padding: 0cm 3.5pt 0cm 3.5pt; height: 21.75pt;" width="200">
<p style="margin-bottom: .0001pt; text-indent: 14.0pt; line-height: normal;"><span style="font-size: 14.0pt; font-family: 'Arial','sans-serif'; color: black;">08h - 10h</span></p>
</td>
<td style="width: 132.0pt; border: solid #C0504D 1.0pt; border-left: none; background: #D8D8D8; padding: 0cm 3.5pt 0cm 3.5pt; height: 21.75pt;" colspan="3" width="176">
<p style="margin-bottom: .0001pt; text-indent: 14.0pt; line-height: normal;"><span style="font-size: 14.0pt; font-family: 'Arial','sans-serif'; color: black;">10h - 12h</span></p>
</td>
<td style="width: 138.0pt; border: solid #C0504D 1.0pt; border-left: none; padding: 0cm 3.5pt 0cm 3.5pt; height: 21.75pt;" colspan="3" width="184">
<p style="margin-bottom: .0001pt; text-indent: 14.0pt; line-height: normal;"><span style="font-size: 14.0pt; font-family: 'Arial','sans-serif'; color: black;">12h - 14h</span></p>
</td>
<td style="width: 132.0pt; border: solid #C0504D 1.0pt; border-left: none; background: #D8D8D8; padding: 0cm 3.5pt 0cm 3.5pt; height: 21.75pt;" colspan="3" width="176">
<p style="margin-bottom: .0001pt; text-indent: 14.0pt; line-height: normal;"><span style="font-size: 14.0pt; font-family: 'Arial','sans-serif'; color: black;">15h - 17h</span></p>
</td>
<td style="width: 138.0pt; border: solid #C0504D 1.0pt; border-left: none; padding: 0cm 3.5pt 0cm 3.5pt; height: 21.75pt;" colspan="3" width="184">
<p style="margin-bottom: .0001pt; text-indent: 14.0pt; line-height: normal;"><span style="font-size: 14.0pt; font-family: 'Arial','sans-serif'; color: black;">17h - 19h</span></p>
</td>

<td style="height: 21.75pt; border: none;" width="0">&nbsp;</td>
</tr>
<tr style="height: 41.25pt;">
<td style="width: 23.8pt; border-top: none; border-left: solid #C0504D 1.0pt; border-bottom: none; border-right: solid #C0504D 1.0pt; background: #D8D8D8; padding: 0cm 3.5pt 0cm 3.5pt; height: 41.25pt;" width="32">
<p class="monTexte" style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><strong><span style="font-size: 9.0pt; font-family: 'Cambria','serif'; color: #4f81bd;">Date &gt;&gt;&gt;</span></strong></p>
</td>
<td style="width: 31.8pt; border-top: none; border-left: none; border-bottom: solid #C0504D 1.0pt; border-right: solid #C0504D 1.0pt; background: white; padding: 0cm 3.5pt 0cm 3.5pt; height: 41.25pt;" width="42">
<p class="monTexte" style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><strong><em><span style="font-size: 9.0pt; font-family: 'Cambria','serif'; color: black;">Fili&egrave;re</span></em></strong></p>
</td>
<td style="width: 13.8pt; border-top: none; border-left: none; border-bottom: solid #C0504D 1.0pt; border-right: solid #C0504D 1.0pt; background: white; padding: 0cm 3.5pt 0cm 3.5pt; height: 41.25pt;" width="18">
<p class="monTexte" style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 8.0pt; font-family: 'Cambria','serif'; color: black;">semestre</span></p>
</td>
<td style="width: 19.8pt; border-top: none; border-left: none; border-bottom: solid #C0504D 1.0pt; border-right: solid #C0504D 1.0pt; background: white; padding: 0cm 3.5pt 0cm 3.5pt; height: 41.25pt;" width="26">
<p class="monTexte" style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-family: 'Cambria','serif'; color: black;">Nbre</span></p>
</td>
<td style="width: 98.4pt; border-top: none; border-left: none; border-bottom: solid #C0504D 1.0pt; border-right: solid #C0504D 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 41.25pt;" width="131">
<p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><em><span style="font-family: 'Cambria','serif'; color: black;">Element de Module</span></em></p>
</td>
<td style="width: 13.8pt; border-top: none; border-left: none; border-bottom: solid #C0504D 1.0pt; border-right: solid #C0504D 1.0pt; background: #C5D9F1; padding: 0cm 3.5pt 0cm 3.5pt; height: 41.25pt;" width="18">
<p class="monTexte" style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 8.0pt; font-family: 'Cambria','serif'; color: black;">semestre</span></p>
</td>
<td style="width: 19.8pt; border-top: none; border-left: none; border-bottom: solid #C0504D 1.0pt; border-right: solid #C0504D 1.0pt; background: #C5D9F1; padding: 0cm 3.5pt 0cm 3.5pt; height: 41.25pt;" width="26">
<p class="monTexte" style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-family: 'Cambria','serif'; color: black;">Nbre</span></p>
</td>
<td style="width: 98.4pt; border-top: none; border-left: none; border-bottom: solid #C0504D 1.0pt; border-right: solid #C0504D 1.0pt; background: #C5D9F1; padding: 0cm 3.5pt 0cm 3.5pt; height: 41.25pt;" width="131">
<p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><em><span style="font-family: 'Cambria','serif'; color: black;">Element de Module</span></em></p>
</td>
<td style="width: 13.8pt; border-top: none; border-left: none; border-bottom: solid #C0504D 1.0pt; border-right: solid #C0504D 1.0pt; background: white; padding: 0cm 3.5pt 0cm 3.5pt; height: 41.25pt;" width="18">
<p class="monTexte" style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 8.0pt; font-family: 'Cambria','serif'; color: black;">semestre</span></p>
</td>
<td style="width: 19.8pt; border-top: none; border-left: none; border-bottom: solid #C0504D 1.0pt; border-right: solid #C0504D 1.0pt; background: white; padding: 0cm 3.5pt 0cm 3.5pt; height: 41.25pt;" width="26">
<p class="monTexte" style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-family: 'Cambria','serif'; color: black;">Nbre</span></p>
</td>
<td style="width: 104.4pt; border-top: none; border-left: none; border-bottom: solid #C0504D 1.0pt; border-right: solid #C0504D 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 41.25pt;" width="139">
<p  style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><em><span style="font-family: 'Cambria','serif'; color: black;">Element de Module</span></em></p>
</td>
<td style="width: 13.8pt; border-top: none; border-left: none; border-bottom: solid #C0504D 1.0pt; border-right: solid #C0504D 1.0pt; background: #C5D9F1; padding: 0cm 3.5pt 0cm 3.5pt; height: 41.25pt;" width="18">
<p class="monTexte" style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 8.0pt; font-family: 'Cambria','serif'; color: black;">semestre</span></p>
</td>
<td style="width: 19.8pt; border-top: none; border-left: none; border-bottom: solid #C0504D 1.0pt; border-right: solid #C0504D 1.0pt; background: #C5D9F1; padding: 0cm 3.5pt 0cm 3.5pt; height: 41.25pt;" width="26">
<p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-family: 'Cambria','serif'; color: black;">Nbre</span></p>
</td>
<td class="monTexte" style="width: 98.4pt; border-top: none; border-left: none; border-bottom: solid #C0504D 1.0pt; border-right: solid #C0504D 1.0pt; background: #C5D9F1; padding: 0cm 3.5pt 0cm 3.5pt; height: 41.25pt;" width="131">
<p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><em><span style="font-family: 'Cambria','serif'; color: black;">Element de Module</span></em></p>
</td>
<td style="width: 13.8pt; border-top: none; border-left: none; border-bottom: solid #C0504D 1.0pt; border-right: solid #C0504D 1.0pt; background: white; padding: 0cm 3.5pt 0cm 3.5pt; height: 41.25pt;" width="18">
<p class="monTexte" style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 8.0pt; font-family: 'Cambria','serif'; color: black;">semestre</span></p>
</td>
<td style="width: 19.8pt; border-top: none; border-left: none; border-bottom: solid #C0504D 1.0pt; border-right: solid #C0504D 1.0pt; background: white; padding: 0cm 3.5pt 0cm 3.5pt; height: 41.25pt;" width="26">
<p class="monTexte" style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-family: 'Cambria','serif'; color: black;">Nbre</span></p>
</td>
<td style="width: 104.4pt; border-top: none; border-left: none; border-bottom: solid #C0504D 1.0pt; border-right: solid #C0504D 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 41.25pt;" width="139">
<p  style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><em><span style="font-family: 'Cambria','serif'; color: black;">Element de Module</span></em></p>
</td>

<td style="height: 41.25pt; border: none;" width="0">&nbsp;</td>
</tr>
<?php
      foreach ($totaux as $idJournee1 => $totale) {
         if($idJournee==$idJournee1){
    $p=0;
//    print_r($plan1["LGTR"]);echo "hhh";
    //foreach($idProgramme as $programme){
    foreach($plan1  as $idProgramme=>$plan2){
   //print_r($plan1["LGTR"]);echo "hhh";
   $p++;
   $i=0;
     ?>

<tr style="height: 45.0pt;">
  <?php  if($p==1){ if($idProgramme1=="tous"){?>
<td style="width: 23.8pt; border: solid #C0504D 1.0pt; border-top: none; background: #D8D8D8; padding: 0cm 3.5pt 0cm 3.5pt; height: 45.0pt;" rowspan="5" width="32">
<p class="monTexte" style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><strong><em><span style="font-size: 10.0pt; font-family: 'Cambria','serif'; color: black;"><?php setlocale(LC_TIME, 'fr_FR.utf8','fra'); echo  date('d/m/Y',strtotime($totale['date'])); ?></span></em></strong></p>
</td>
    <?php }else{?>
      <td style="width: 23.8pt; border: solid #C0504D 1.0pt; border-top: none; background: #D8D8D8; padding: 0cm 3.5pt 0cm 3.5pt; height: 45.0pt;" rowspan="1" width="32">
<p class="monTexte" style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><strong><em><span style="font-size: 10.0pt; font-family: 'Cambria','serif'; color: black;"><?php setlocale(LC_TIME, 'fr_FR.utf8','fra'); echo  date('d/m/Y',strtotime($totale['date'])); ?></span></em></strong></p>
</td>  
   <?php }} ?>
<td style="width: 31.8pt; border-top: none; border-left: none; border-bottom: solid #C0504D 1.0pt; border-right: solid #C0504D 1.0pt; padding: 0cm 3.5pt 0cm 3.5pt; height: 45.0pt;" width="42">
<p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 10.0pt; font-family: 'Cambria','serif'; color: black;"><?php echo $idProgramme; ?></span></p>
</td>
<?php  $c=0; $i=0; /*print_r($plan2['sigle']);*/ for($s=0;$s<count($plan2['sigle']);$s++) { $i++; /*for($j=0;$j<4;$j++){*/if($plan2['sigle'][$s]==NULL){ ?>

<td colspan="3" style="width: 13.8pt; border-top: none; border-left: none; border-bottom: solid #C0504D 1.0pt; border-right: solid #C0504D 1.0pt; background: #D8D8D8; padding: 0cm 3.5pt 0cm 3.5pt; height: 45.0pt;" width="18">
<p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 8.0pt; font-family: 'Cambria','serif'; color: black;"></span></p>
</td>


<?php /*foreach($heurD as $heur){ if(($i==0)){ */
//echo $plan['heurD'][0]."g".$heurD[2];
//print_r($plan);
//if($plan['heurD'][0]==$heurD[2]){?>
<?php   } else{ ?>

    <td style="width: 13.8pt; border-top: none; border-left: none; border-bottom: solid #C0504D 1.0pt; border-right: solid #C0504D 1.0pt; background: white; padding: 0cm 3.5pt 0cm 3.5pt; height: 45.0pt;" width="18">
<p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 8.0pt; font-family: 'Cambria','serif'; color: black;"><?php echo $plan2['semestre'][$s];?></span></p>
</td>
<td style="width: 19.8pt; border-top: none; border-left: none; border-bottom: solid #C0504D 1.0pt; border-right: solid #C0504D 1.0pt; background: white; padding: 0cm 3.5pt 0cm 3.5pt; height: 45.0pt;" width="26">
<p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 8.0pt; font-family: 'Cambria','serif'; color: black;"><?php echo  $plan2['nbre'][$s] ?><b></span></p>
</td>
<td style="width: 98.4pt; border-top: none; border-left: none; border-bottom: solid #C0504D 1.0pt; border-right: solid #C0504D 1.0pt; background: white; padding: 0cm 3.5pt 0cm 3.5pt; height: 45.0pt;" width="131">
<p style="margin-bottom: .0001pt; text-indent: 9.0pt; line-height: normal;"><span style="font-size: 9.0pt; font-family: 'Cambria','serif'; color: black;"><?php echo $plan2['titre'][$s]."<BR></span><span style='font-size: 7.0pt; font-family: Cambria,serif; color: black;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ".$plan2['nom'][$s]."   ".$plan2['telephone'][$s];?></span></p>
</td>
<?php  }


 ?>


<?php  /*}*/ //}


} }?>

<td style="height: 30.0pt; border: none;" width="0">&nbsp;</td>
</tr>
<?php     if($idProgramme1=="tous"){ ?>
<tr style="height: 30.0pt;">
<td style="width: 23.8pt; border: solid #C0504D 1.0pt; border-top: none; background: #D8D8D8; padding: 0cm 3.5pt 0cm 3.5pt; height: 20.0pt;" rowspan="1" width="32">
<p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><strong><em><span style="font-size: 10.0pt; font-family: 'Cambria','serif'; color: black;">Totaux</span></em></strong></p>
</td>

<?php $t=0;  foreach ($totale['totaux'] as $tot) {//echo "hh"; 

     //
           
    // print_r($plan1['totaux']);
   
         ?>

<td style="width: 19.8pt; border-top: none; border-left: none; border-bottom: solid #C0504D 1.0pt; border-right: solid #C0504D 1.0pt; background: #D8D8D8; padding: 0cm 3.5pt 0cm 3.5pt; height: 45.0pt;" colspan="2" width="26">
    <p style="margin-bottom: .0001pt; text-align: center; line-height: normal;"><span style="font-size: 8.0pt; font-family: 'Cambria','serif'; color: black;"><b><?php echo $tot;?></b></span></p>
</td>
<td style="width: 98.4pt; border-top: none; border-left: none; border-bottom: solid #C0504D 1.0pt; border-right: solid #C0504D 1.0pt; background: #D8D8D8; padding: 0cm 3.5pt 0cm 3.5pt; height: 45.0pt;" width="131">
<p style="margin-bottom: .0001pt; text-indent: 9.0pt; line-height: normal;"><span style="font-size: 9.0pt; font-family: 'Cambria','serif'; color: black;"></span></p>
</td>
     <?php  }}}else{} }/*}}*/ ?>
<td style="height: 45.0pt; border: none;" width="0">&nbsp;</td>
</tr>
      <?php ?>
  </table>
<?php $k++;    if($idProgramme1=="tous"){ ?>
<div style="page-break-after: always; page-break-after: always; width: 100%; height: 0px; background-color: gainsboro; border: 0px solid gray; text-align: center">
       
</div><?php }else{ if($k==2 or $k==4 or $k==6){?>
<div style="page-break-after: always; page-break-after: always; width: 100%; height: 0px; background-color: gainsboro; border: 0px solid gray; text-align: center">
       
</div>
<?php }} ?>
<?php } ?>

<tr>
<td style="border: none;" width="32">&nbsp;</td>
<td style="border: none;" width="43">&nbsp;</td>
<td style="border: none;" width="24">&nbsp;</td>
<td style="border: none;" width="29">&nbsp;</td>
<td style="border: none;" width="131">&nbsp;</td>
<td style="border: none;" width="24">&nbsp;</td>
<td style="border: none;" width="29">&nbsp;</td>
<td style="border: none;" width="131">&nbsp;</td>
<td style="border: none;" width="24">&nbsp;</td>
<td style="border: none;" width="29">&nbsp;</td>
<td style="border: none;" width="139">&nbsp;</td>
<td style="border: none;" width="24">&nbsp;</td>
<td style="border: none;" width="29">&nbsp;</td>
<td style="border: none;" width="131">&nbsp;</td>
<td style="border: none;" width="24">&nbsp;</td>
<td style="border: none;" width="29">&nbsp;</td>
<td style="border: none;" width="131">&nbsp;</td>
<td style="border: none;" width="0">
<p>&nbsp;</p>
</td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>


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

<script>
   
     $('#add').click( function () {
       
             /* setInterval( function () {
location.reload();
}, 100 );*/

        // alert("hhh");
       //  var data = table.row('.selected').data();
        // $('#planning').val(data.id);
        // window.location.href='<?php echo base_url(); ?>index.php/scolarite/form_planing_exam';
        $('#createEventModal1').modal('toggle');
     });
       $('#btn_cancel').click( function () {
       
        
        $('#createEventModal1').modal('hide');
     });
       $('#update').click( function () {
         window.location.href='<?php echo base_url(); ?>index.php/scolarite/modifier_planning_exam';
       // $('#createEventModal1').modal('toggle');
     });
     
      $('#submitButton').click( function () {
        
        $('#createEventModal1').modal('hide'); 
         if (window.XMLHttpRequest) {
                                                        // code for IE7+, Firefox, Chrome, Opera, Safari
                                                        xmlhttp = new XMLHttpRequest();
                                                    } else {
                                                        // code for IE6, IE5
                                                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                                                    }
                                                    xmlhttp.onreadystatechange = function () {
                                                        if (this.readyState == 4 && this.status == 200) {
                                                            //document.getElementById("txtHint").innerHTML = this.responseText;
                                                              //var myObj = JSON.parse(this.responseText);
                                                            //alert(myObj);
                                                           var options="";
                                                             location.reload();
                                                         
                                                        }
                                                    };
                                                    
                                               var id=     $('#planning').val();
   var sigle= $('#infomodule_element_dropdown').val(); 
    var journee=    $('#journee').val();
    var crenau=    $('#crenau').val();
      var idProgramme=    $('#idProgramme').val();
                                                    var events = "<?php echo base_url(); ?>index.php/scolarite/ajouter_planing_exam?planning=" + id +"&sigle=" + sigle +"&journee=" + journee +"&crenau=" + crenau +"&idProgramme"+idProgramme+ "";
                                                  
                                                    xmlhttp.open("GET", events, true);
                                                    xmlhttp.send(); 
                                              
     } );
   function selectModule(type) {
                                                        var annee = $("#date").val();
                                                                var semestre = $("#semestre1").val();
                                                                var idProgramme = $("#idProgramme1").val();
                                                                var matriculeEmploye = "";
                                                                if (idProgramme != "-1") {
                                                        ElementsPlanning('infomodule_element', idProgramme, annee, semestre, type=1, matriculeEmploye);
                                                        } 
                                                        }

                                                        function ElementsPlanning(loadType, loadId, annee, semestre, type, matriculeEmploye) {
                                                        var annee = $("#date").val();
                                                                var semestre = $("#semestre1").val();
                                                                var idProgramme = $("#idProgramme1").val();
                                                                var matriculeEmploye = $("#employe1").val();
                                                                var dataString = 'loadType=' + loadType + '&loadId=' + loadId + '&annee=' + annee + '&semestre=' + semestre + '&type=' + type + '&matriculeEmploye=' + matriculeEmploye;
                                                                $("#" + loadType + "_loader").show();
                                                                $("#" + loadType + "_loader").fadeIn(400).html('En cours... <img src="<?php echo base_url(); ?>images/loading.gif" />');
                                                                $.ajax({
                                                                type: "POST",
                                                                        url: "ElementsPlanning",
                                                                        data: dataString,
                                                                        cache: false,
                                                                        success: function (result) {
                                                                        $("#" + loadType + "_loader").hide();
                                                                                $("#" + loadType + "_dropdown").html("<option value='-1'>Select " + loadType + "</option>");
                                                                                $("#" + loadType + "_dropdown").append(result);
                                                                                //pour modification event
                                                                                $("#" + loadType + "_dropdownD").html("<option value='-1'>Select " + loadType + "</option>");
                                                                                $("#" + loadType + "_dropdownD").append(result);
                                                                                
                                                                                $("#eventIDG").html("<option value='-1'> Choisissez le groupe </option>");
                                                                                $("#eventIDG").append(result);
                                                                                
                                                                        }
                                                                });
                                                        }
                          function showChevauch() {
                                                var annee = $('#annee').val();
                                                var num_bac = $('#num_bac').val();


                                       // alert(annee+"ffff "+ num_bac)
                                                document.getElementById("alert").innerHTML = "";


                                                if (window.XMLHttpRequest) {
                                                    // code for IE7+, Firefox, Chrome, Opera, Safari
                                                    xmlhttp = new XMLHttpRequest();
                                                } else {
                                                    // code for IE6, IE5
                                                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                                                }
                                                xmlhttp.onreadystatechange = function () {
                                                    if (this.readyState == 4 && this.status == 200) {
                                                        var myObj = JSON.parse(this.responseText);
                                                        if (myObj == null) {
                                                            document.getElementById("alert").innerHTML = "Attention !! cet étudiant "+ num_bac +" n'est parmi les admis en Bac RIM "+annee+" ";
                                                         $('#num_bac').css("border", "1px solid red");
                                                        $('#btn_add').prop('disabled', true);
            }else{
                                                            $('#btn_add').prop('disabled', false);
                                                             $('#num_bac').css("border", "1px solid green");
                                                          document.getElementById("alert").innerHTML = " ";
                                                         
            }
                                                    }
                                                };

                                                 var events = "<?php echo base_url(); ?>index.php/scolarite/control_autorisation?num_bac=" + num_bac + "&annee=" + annee + ""
                                                xmlhttp.open("GET", events, true);
                                                xmlhttp.send();
                                            }
</script>