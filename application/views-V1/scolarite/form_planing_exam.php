<!DOCTYPE html>
<?php include(APPPATH.'views/include/header.php');
include('include/menu.php');?> 


<div class="container">
    <div class="col-xs-12 hl-left">
    <div class="row">
        <div class="col-sm-offset-3 col-lg-6 col-sm-6 well">
        <legend>Planing examen:</legend>
        <?php 
        $attributes = array("class" => "form-horizontal", "id" => "autorisationform", "name" => "autorisationform");
        echo form_open("scolarite/planing_exam", $attributes);?>
        <?php echo $this->session->flashdata('msg'); ?>
        <fieldset>
            <div class="panel-body"> 
                                                                       

                                                                </div>
            <div class="form-group">
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
            </div>
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




<script>
   function selectModule(type) {
                                                        var annee = $("#date").val();
                                                                var semestre = $("#semestre1").val();
                                                                var idProgramme = $("#idProgramme1").val();
                                                                var matriculeEmploye = "";
                                                                if (idProgramme != "-1") {
                                                        loadDataInfo('infomodule_element', idProgramme, annee, semestre, type=1, matriculeEmploye);
                                                        } 
                                                        }

                                                        function loadDataInfo(loadType, loadId, annee, semestre, type, matriculeEmploye) {
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
                <select class="form-control" id="infomodule_element_dropdown" name="sigle" onchange="selectState(this.options[this.selectedIndex].value)">
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
                    
                                                                        <select  class="form-control"  name="journee"   > 
                                                                       <option value="-1">choisissez un planig journee</option>
                                                                      <?php
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
            <select class="form-control"   name="crenau"   > 
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
                <input id="btn_add" name="btn_add" type="submit" class="btn btn-primary" value="Ajouter" />
                <input id="btn_cancel" name="btn_cancel" type="reset" class="btn btn-danger" value="Annuler" />
            </div>
            </div>
             
            
        </fieldset>
        <?php echo form_close(); ?>
        
        </div>
    </div>
</div>
</body>
</html>

    </div>                      
</div>         

<div class="clear"></div>
</div> <!--end of main content-->

<script>
    // $(document).ready(function () {
    /*      $('#num_bac').on('change', function(){
                                                                var input = $(this);
                                                                        //do your ajax call here
                                                                       // alert("hh");
                                                                        showChevauch();
                                                                        input.next('span.info').html(input.val());
                                                                });
                                                              
*/
       //    }
</script>
<?php include(APPPATH.'views/include/footer.php');
?>