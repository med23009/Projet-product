<?php
include(APPPATH.'views/include/header.php');
include('include/menu.php');
?>
<head>
    <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>css/jquery.dataTables.min.css" />

    <script>
        $(document).ready(function () {
            var table = $('#example').DataTable({
                "ajax": "<?php echo base_url(); ?>index.php/scolarite/info_plannig_exam",
                "columns": [
                    {"data": "id"},
                    {"data": "planning"}


                ],
                "language": {
                    "sProcessing": "Traitement en cours...",
                    "sSearch": "Rechercher&nbsp;:",
                    "sLengthMenu": "Afficher _MENU_ &eacute;l&eacute;ments",
                    "sInfo": "Affichage de l'&eacute;l&eacute;ment _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                    "sInfoEmpty": "Affichage de l'&eacute;l&eacute;ment 0 &agrave; 0 sur 0 &eacute;l&eacute;ment",
                    "sInfoFiltered": "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                    "sInfoPostFix": "",
                    "sLoadingRecords": "Chargement en cours...",
                    "sZeroRecords": "Aucun &eacute;l&eacute;ment &agrave; afficher",
                    "sEmptyTable": "Aucune donn&eacute;e disponible dans le tableau",
                    "oPaginate": {
                        "sFirst": "Premier",
                        "sPrevious": "Pr&eacute;c&eacute;dent",
                        "sNext": "Suivant",
                        "sLast": "Dernier"
                    },
                    "oAria": {
                        "sSortAscending": ": activer pour trier la colonne par ordre croissant",
                        "sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
                    }
                }

            }
            );

            $('#example tbody').on('click', 'tr', function () {
                if ($(this).hasClass('selected')) {
                    $(this).removeClass('selected');
                } else {
                    table.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');
                }
            });

            $('#delete').click(function () {
                setInterval(function () {
                    table.ajax.reload(null, false);
                }, 5000);
                $('#createEventModal').modal('hide');
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
                        var myObj = JSON.parse(this.responseText);
                        //alert(myObj);
                        var options = "";

                    }
                };
                var data = table.row('.selected').data();
                var matricule = data.matriculeEmploye;
                var sigle = data.sigle;
                var groupe = data.idGroupe;
                var heureD = data.heureD;
                var date = data.date;
                var type = data.type;
                var duree = data.duree;
                var events = "<?php echo base_url(); ?>index.php/agent/delete_heure_enseignement?matricule=" + matricule + "&sigle=" + sigle + "&groupe=" + groupe + "&date=" + date + "&heureD=" + heureD + "&duree=" + duree + "&type=" + type + "";

                xmlhttp.open("GET", events, true);
                xmlhttp.send();

                table.row('.selected').remove().draw(false);
            });

            $('#submitButton').click(function () {
                setInterval(function () {
                    table.ajax.reload(null, false);
                }, 5000);
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
                        var myObj = JSON.parse(this.responseText);
                        //alert(myObj);
                        var options = "";

                    }
                };

                var id = $('#planning').val();
                var sigle = $('#infomodule_element_dropdown').val();
                var journee = $('#journee').val();
                var crenau = $('#crenau').val();

                var events = "<?php echo base_url(); ?>index.php/scolarite/ajouter_planing_exam?planning=" + id + "&sigle=" + sigle + "&journee=" + journee + "&crenau=" + crenau + "";

                xmlhttp.open("GET", events, true);
                xmlhttp.send();

            });
            $('#add').click(function () {
                var data = table.row('.selected').data();
                $('#planning').val(data.id);
                // window.location.href='<?php echo base_url(); ?>index.php/scolarite/form_planing_exam';
                $('#createEventModal1').modal('toggle');
            });
            $('#fiche').click(function () {
                var data = table.row('.selected').data();
                $('#planning').val(data.id);
                var idProgramme = $('#idProgramme').val();

                window.location.href = "<?php echo base_url(); ?>index.php/scolarite/planning_examens?planing=" + data.id + "&idProgramme=" + idProgramme + "";
            });

            $('#update').click(function () {
                $('#createEventModal').modal('toggle');
                var data = table.row('.selected').data();

                //console.log( 'The table has ' + data.length + ' records' );
                //console.log( 'Data', data ); 
                var matriculeEmploye = data.matriculeEmploye;
                // alert(matriculeEmploye);
                $('#matricule').val(data.matriculeEmploye);
                $('#sigle').val(data.sigle);
                $('#groupe').val(data.idGroupe);
                $('#heureD').val(data.heureD);

                $('#date').val(data.date);
                $('#type').val(data.date);
                $('#duree').val(data.duree);
                var selectBox = document.getElementById('type');
                var option = new Array();
                option[0] = "CM"
                var cm = option[0];
                option[1] = "TD"
                var td = option[1];
                option[2] = "TP"
                var tp = option[2];
                var vlue = new Array();
                vlue[0] = "cours"
                var vcm = vlue[0];
                vlue[1] = "td"
                var vtd = vlue[1];
                vlue[2] = "tp"
                var vtp = vlue[2];
                var options = "";
                if ((data.type) == "cours") {
                    selectBox.options.add(new Option(cm, vcm, "cours"));
                    selectBox.options.add(new Option(td, vtd, "td"));
                    selectBox.options.add(new Option(tp, vtp, "tp"));
                }
                if ((data.type) == "td") {
                    selectBox.options.add(new Option(td, vtd, "td"));
                    selectBox.options.add(new Option(cm, vcm, "cours"));
                    selectBox.options.add(new Option(tp, vtp, "tp"));
                }
                if ((data.type) == "tp") {
                    selectBox.options.add(new Option(tp, vtp, "tp"));
                    selectBox.options.add(new Option(cm, vcm, "cours"));
                    selectBox.options.add(new Option(td, vtd, "td"));
                }


            });
        });
    </script></head>
<div class="container">
    <div class="col-xs-12 hl-left">
        <table>
            <tr>
                <td>
                    <!--Alioune Zeyn AZ debut ajout du bouton 'ajouter un planning'-->
                    <a class="btn btn-success btn-sm" href="<?php echo base_url(); ?>index.php/scolarite/ajouter_planning_etape1" id="new_planning"><span class="glyphicon glyphicon-plus"></span>Ajouter un nouveau planning</a>
                    <!--AZ fin d'ajout du bouton -->
                    <button class="btn btn-default btn-sm" id="fiche"><span class="glyphicon glyphicon-file"></span>Planning</button> 
                    
                    <div class="form-group">
                </td>
                <td>
                    <select class="form-control"    name="idProgramme"  id="idProgramme" > 
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
                    </select></td></tr></table>

        <table id="example" class="display" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Planning</th>

                </tr>
            </thead>
            <tfoot>
                <tr>
                <tr>
                    <th>Id</th>
                    <th>Planning</th>

                </tr>
                </tr>
            </tfoot>
        </table>       
    </div>   <!--end of center content -->               
    <div id="createEventModal1" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <input type="hidden" id="planning" name="planning"/>
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




                    <script>
                        function selectModule(type) {
                            var annee = $("#date").val();
                            var semestre = $("#semestre1").val();
                            var idProgramme = $("#idProgramme1").val();
                            var matriculeEmploye = "";
                            if (idProgramme != "-1") {
                                loadData('infomodule_element', idProgramme, annee, semestre, type = 1, matriculeEmploye);
                            }
                        }

                        function loadData(loadType, loadId, annee, semestre, type, matriculeEmploye) {
                            var annee = $("#date").val();
                            var semestre = $("#semestre1").val();
                            var idProgramme = $("#idProgramme1").val();
                            var matriculeEmploye = $("#employe1").val();
                            var dataString = 'loadType=' + loadType + '&loadId=' + loadId + '&annee=' + annee + '&semestre=' + semestre + '&type=' + type + '&matriculeEmploye=' + matriculeEmploye;
                            $("#" + loadType + "_loader").show();
                            $("#" + loadType + "_loader").fadeIn(400).html('En cours... <img src="<?php echo base_url(); ?>images/loading.gif" />');
                            $.ajax({
                                type: "POST",
                                url: "loadData",
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
                                        document.getElementById("alert").innerHTML = "Attention !! cet étudiant " + num_bac + " n'est parmi les admis en Bac RIM " + annee + " ";
                                        $('#num_bac').css("border", "1px solid red");
                                        $('#btn_add').prop('disabled', true);
                                    } else {
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

                                <select  class="form-control"  name="journee" id="journee"  > 
                                    <option value="-1">choisissez un planig journee</option>
                                    <?php
                                    print_r($planningjournee);
                                    echo"gg";
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
                                            echo '<option value="' . $crenau['id'][$i] . '" >' . $crenau['heurD'][$i] . 'h- ' . ($crenau['heurD'][$i] + $crenau['duree'][$i]) . 'h </option>';
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
                <div id="createEventModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Modifier horaire</h4>
                            </div>
                            <div class="modal-body">
                                <div class="control-group">
                                    <label class="control-label" for="inputPatient">Matricule:</label>
                                    <div class="field desc">
                                        <input readonly="yes" value="" class="form-control" id="matricule" name="matricuele" placeholder="Description" type="text" value="">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPatient">sigle:</label>
                                    <div class="field desc">
                                        <input readonly="yes" value="Cours" class="form-control" id="sigle" name="sigle" placeholder="Description" type="text" value="">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPatient">groupe:</label>
                                    <div class="field desc">
                                        <input readonly="yes" value="Cours" class="form-control" id="groupe" name="groupe" placeholder="Description" type="text" value="">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="inputPatient">Date:</label>
                                    <div class="field desc">
                                        <input value="Cours" class="form-control" id="date" name="date" placeholder="Description" type="text" value="">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPatient">Heure début:</label>
                                    <div class="field desc">
                                        <input value="Cours" class="form-control" id="heureD" name="heurD" placeholder="Description" type="text" value="">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPatient">Durée:</label>
                                    <div class="field desc">
                                        <input value="Cours" class="form-control" id="duree" name="duree" placeholder="Description" type="text" value="">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPatient">Type:</label>
                                    <div class="field desc">
                                        <select class="form-control" id="type" name="type">

                                        </select>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button class="btn" data-dismiss="modal" aria-hidden="true">Annuler</button>
                                    <button type="submit" class="btn btn-primary" id="submitButton">Enregistrer</button>
                                </div>
                            </div>

                        </div>
                    </div>         


                </div>  
                <div class="clear"></div>
            </div> <!--end of main content-->


<?php include(APPPATH.'views/include/footer.php'); ?>