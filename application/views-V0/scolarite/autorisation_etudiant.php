<!DOCTYPE html>
<?php include(APPPATH.'views/include/header.php');
include('include/menu.php');?> 


<div class="container">
    <div class="col-xs-12 hl-left">
    <div class="row">
        <div class="col-sm-offset-3 col-lg-6 col-sm-6 well">
        <legend>Autorisation d'un etudiant</legend>
        <?php 
        $attributes = array("class" => "form-horizontal", "id" => "autorisationform", "name" => "autorisationform");
        echo form_open("scolarite/autoriser_etudiant", $attributes);?>
        <?php echo $this->session->flashdata('msg'); ?>
        <fieldset>
            
            <div class="form-group">
            <div class="row colbox">
            
            <div class="col-lg-4 col-sm-4">
                <label for="num_bac" class="control-label">Numéro du BAC</label>
            </div>
            <div class="col-lg-8 col-sm-8">
                 <span id="alert" class="text-danger"></span>
                <input oninput="showChevauch()"   id="num_bac" name="num_bac" placeholder="num_bac" type="text" class="form-control"  value="" />
               
            </div>
            </div>
            </div>


<script>
   
 /*$('#num_bac').on('change', function(){
                                                                var input = $(this);
                                                                        //do your ajax call here
                                                                      //  alert(input);
                                                                               var annee = $('#annee').val();
                                                var num_bac = $('#num_bac').val();


                                        alert(annee+"rr "+ num_bac)
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
                                                        if (myObj != null) {
                                                            document.getElementById("alert").innerHTML = "La salle ou le prof est ocuppé(e) pendant cette période";
                                                        }
                                                    }
                                                };

                                                 var events = "<?php echo base_url(); ?>index.php/scolarite/control_autorisation?num_bac=" + num_bac + "&annee=" + annee + ""
                                                xmlhttp.open("GET", events, true);
                                                xmlhttp.send();
                                            }
  function showControl() {
                                              alert("hh");
                                                var annee = $('#annee').val();
                                                var num_bac = $('#num_bac').val();


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
                                                        if (myObj != null) {
                                                            document.getElementById("alert").innerHTML = "Attention !! "+ num_bac +"  n'a pas eu le bac en "+ annee + ";
                                                        }else{
                                                            
                                                        }
                                                    }
                                                };

                                                var events = "<?php echo base_url(); ?>index.php/scolarite/control_autorisation?num_bac=" + num_bac + "&annee=" + annee + "";

                                                xmlhttp.open("GET", events, true);
                                                xmlhttp.send();
                                                                        input.next('span.info').html(input.val());
                                                                });
*/
</script>

<script>

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
                <label  for="annee" class="control-label">Année</label>
            </div>
            <div class="col-lg-8 col-sm-8">
                                                                        <select class="form-control"  id="annee"   name="annee">

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
                                                                       
             <!--   <input id="annee" name="annee" placeholder="annee" type="text" class="form-control"  value="<?php echo set_value('Année'); ?>" />
                <span class="text-danger"><?php echo form_error('annee'); ?></span>-->
            </div>
            </div>
            </div>
            
          
            
            <div class="form-group">
            <div class="row colbox">
            <div class="col-lg-4 col-sm-4">
                <label for="nom" class="control-label">Nom</label>
            </div>
            <div class="col-lg-8 col-sm-8">
                <input id="salary" name="nom" placeholder="nom" type="text" class="form-control" value="<?php echo set_value('nom'); ?>" />
                <span class="text-danger"><?php echo form_error('nom'); ?></span>
            </div>
            </div>
            </div>
            <div class="form-group">
            <div class="row colbox">
            <div class="col-lg-4 col-sm-4">
                <label for="prenom" class="control-label">Prénom</label>
            </div>
            <div class="col-lg-8 col-sm-8">
                <input id="salary" name="prenom" placeholder="prenom" type="text" class="form-control" value="<?php echo set_value('Prénom'); ?>" />
                <span class="text-danger"><?php echo form_error('prenom'); ?></span>
            </div>
            </div>
            </div>
            <div class="form-group">
            <div class="row colbox">
            <div class="col-lg-4 col-sm-4">
                <label for="prenom" class="control-label">Prénom du pére</label>
            </div>
            <div class="col-lg-8 col-sm-8">
                <input id="salary" name="prenomPere" placeholder="prenom du pére" type="text" class="form-control" value="<?php echo set_value('Prénom'); ?>" />
                <span class="text-danger"><?php echo form_error('prenom'); ?></span>
            </div>
            </div>
            </div>
  <div class="form-group">
            <div class="row colbox">
            <div class="col-lg-4 col-sm-4">
                <label for="prenom" class="control-label">Année autorisation</label>
            </div>
            <div class="col-lg-8 col-sm-8">
                <input id="salary" name="anneeAutorisation" placeholder="annee autorisation" type="text" class="form-control" value="<?=$annee?>" />
                <span class="text-danger"><?php echo form_error('annee'); ?></span>
            </div>
            </div>
            </div>
             <div class="form-group">
            <div class="row colbox">
            <div class="col-lg-4 col-sm-4">
                <label for="department" class="control-label">Filiere</label>
            </div>
            <div class="col-lg-8 col-sm-8">
            <?php 
        
                                   
        if(is_array($programme['idProgramme']))
        {
          
            echo ' <select class="form-control" name="idProgramme" id=""> ';
            
            for($i=0;$i<count($programme['idProgramme']);$i++)
            {
                echo '<option value="'.$programme['idProgramme'][$i].'">'.$programme['nomProgramme'][$i].'</option>';
            }
            echo '</select>';
        }
                ?>
                
                <span class="text-danger"><?php echo form_error('department'); ?></span>
            </div>
            </div>
            </div>
             <div class="form-group">
            <div class="row colbox">
            <div class="col-lg-4 col-sm-4">
                <label for="serie" class="control-label">Serie</label>
            </div>
            <div class="col-lg-8 col-sm-8">
                <!--<input id="salary" name="serie" placeholder="serie" type="text" class="form-control" value="<?php echo set_value('serie'); ?>" />-->
                <?php echo'<select  class="form-control" name="serie">';
                                // bloc ci-dessous modifié mai 2013 2.2.1
                                /* echo ' <option value="C">C </option>
                                    <option value="D">D </option>
                                    <option value="T">T </option>
                                    <option value="Autre">Autre </option></select>'; ?> */
								echo ' <option value="Mathématique">Mathématique </option>
                                    <option value="Scientifique">Scientifique </option>
                                    <option value="Technique">Technique </option>
                                    <option value="LM">Lettre modérne </option>
                                    <option value="LO">Lettre originelle </option>
                                    <option value="Autre">Autre </option></select>'; ?>	
                       
                <span class="text-danger"><?php echo form_error('serie'); ?></span>
            </div>
            </div>
            </div>
             <div class="form-group">
            <div class="row colbox">
            <div class="col-lg-4 col-sm-4">
                <label for="prenom" class="control-label">Personne ressource</label>
            </div>
            <div class="col-lg-8 col-sm-8">
                <input id="salary" name="personne_ressource" placeholder="Personne ressource" type="text" class="form-control" value="<?php echo set_value('Personne ressource'); ?>" />
                <span class="text-danger"><?php echo form_error('personne_ressource'); ?></span>
            </div>
            </div>
            </div>
             <div class="form-group">
            <div class="row colbox">
            <div class="col-lg-4 col-sm-4">
                <label for="contacts" class="control-label">Contacts</label>
            </div>
            <div class="col-lg-8 col-sm-8">
                <input id="salary" name="contacts" placeholder="contacts" type="text" class="form-control" value="<?php echo set_value('contacts'); ?>" />
                <span class="text-danger"><?php echo form_error('contacts'); ?></span>
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