<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
<head>
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>js/jquery.dataTables.min.js"></script>
 <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url();?>css/jquery.dataTables.min.css" />
  
<script>
   $(document).ready(function() {
   var table=  $('#example').DataTable( {
        "ajax": "<?php echo base_url(); ?>index.php/scolarite/info_plannig_exam",
        "columns": [
            { "data": "id" },
             { "data": "planning" }
           
           
        ],
         "language":{
    "sProcessing":     "Traitement en cours...",
    "sSearch":         "Rechercher&nbsp;:",
    "sLengthMenu":     "Afficher _MENU_ &eacute;l&eacute;ments",
    "sInfo":           "Affichage de l'&eacute;l&eacute;ment _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
    "sInfoEmpty":      "Affichage de l'&eacute;l&eacute;ment 0 &agrave; 0 sur 0 &eacute;l&eacute;ment",
    "sInfoFiltered":   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
    "sInfoPostFix":    "",
    "sLoadingRecords": "Chargement en cours...",
    "sZeroRecords":    "Aucun &eacute;l&eacute;ment &agrave; afficher",
    "sEmptyTable":     "Aucune donn&eacute;e disponible dans le tableau",
    "oPaginate": {
        "sFirst":      "Premier",
        "sPrevious":   "Pr&eacute;c&eacute;dent",
        "sNext":       "Suivant",
        "sLast":       "Dernier"
    },
    "oAria": {
        "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
        "sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
    }
}
                
    }
            );
 
    $('#example tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } );
 
    $('#delete').click( function () {
         setInterval( function () {
table.ajax.reload(null, false);
}, 5000 );
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
                                                           var options="";
                                                         
                                                        }
                                                    };
                                                    var data = table.row('.selected').data();
                                               var matricule=     data.matriculeEmploye;
   var sigle= data.sigle; 
    var groupe=   data.idGroupe;
       var heureD=   data.heureD;
        var date=   data.date;
      var type=data.type;
       var duree=  data.duree;
                                                    var events = "<?php echo base_url(); ?>index.php/agent/delete_heure_enseignement?matricule=" + matricule +"&sigle=" + sigle +"&groupe=" + groupe +"&date=" + date +"&heureD=" + heureD +"&duree=" + duree +"&type=" + type + "";
                                                  
                                                    xmlhttp.open("GET", events, true);
                                                    xmlhttp.send();
                                                                                  
        table.row('.selected').remove().draw( false );
    } );
    
    $('#submitButton').click( function () {
           var data = table.row('.selected').data();
         $('#planning').val(data.planning);
       var   plan=data.planning;
       var p=plan.split(" ");
       var semestre=p[1];
      var annee=p[0];
      var session=p[2];
      var salle=$('#salle').val();
      var sigleMN=$('#infomodule_elementMN_dropdown').val();
      var sigleMF=$('#infomodule_elementMF_dropdown').val();
      var sigleRT=$('#infomodule_elementRT_dropdown').val();
      var sigleLT=$('#infomodule_elementLT_dropdown').val();
        $('#createEventModal1').modal('hide'); 
        window.location.href="<?php echo base_url(); ?>index.php/scolarite/fiche_emarger?planing="+data.id+"&semestre="+semestre+"&annee="+annee+"&session="+session+"&sigleMN="+sigleMN+"&sigleRT="+sigleRT+"&sigleMF="+sigleMF+"&sigleLT="+sigleLT+"&salle="+salle+"";
                                              
     } );
     $('#etu_salle').click( function () {
       //  alert("hhh");
         var data = table.row('.selected').data();
          var   plan=data.planning;
       var p=plan.split(" ");
       var semestre=p[1];
      var annee=p[0];
      var session=p[2];
      var salle=$('#local').val();
      var niveau=$('#niveau').val();
      var programme=$('#idProgramme').val();
        // $('#planning').val(data.id);
        $('#createEventModal2').modal('toggle');
     });
      $('#anonymat_form').click( function () {
       //  alert("hhh");
         var data = table.row('.selected').data();
          var   plan=data.planning;
       var p=plan.split(" ");
       var semestre=p[1];
      var annee=p[0];
      var session=p[2];
      var salle=$('#local').val();
      var niveau=$('#niveau').val();
      var programme=$('#idProgramme').val();
        // $('#planning').val(data.id);
        $('#createEventModal3').modal('toggle');
     });
     
      $('#afficher').click( function () {
       //  alert("hhh");
         var data = table.row('.selected').data();
          var   plan=data.planning;
       var p=plan.split(" ");
       var semestre=p[1];
      var annee=p[0];
      var session=p[2];
      var salle=$('#local').val();
      var niveau=$('#niveau').val();
      var programme=$('#idProgramme').val();
        // $('#planning').val(data.id);
          window.location.href="<?php echo base_url(); ?>index.php/scolarite/liste_et_salle_exam?planing="+data.id+"&semestre="+semestre+"&annee="+annee+"&session="+session+"&niveau="+niveau+"&programme="+programme+"&salle="+salle+"";
     
       /// $('#createEventModal2').modal('toggle');
     });
     
        $('#afficherA').click( function () {
       //  alert("hhh");
         var data = table.row('.selected').data();
          var   plan=data.planning;
       var p=plan.split(" ");
       var semestre=p[1];
      var annee=p[0];
      var session=p[2];
      var niveau=$('#niveauA').val();
      var programme=$('#idProgrammeA').val();
        // $('#planning').val(data.id);
          window.location.href="<?php echo base_url(); ?>index.php/scolarite/get_info_anonymat?planing="+data.id+"&semestre="+semestre+"&annee="+annee+"&session="+session+"&niveau="+niveau+"&programme="+programme+"";
     
       /// $('#createEventModal2').modal('toggle');
     });
     
      $('#fiche').click( function () {
          var data = table.row('.selected').data();
         $('#planning').val(data.planning);
       var   plan=data.planning;
       var p=plan.split(" ");
      // alert(l[2]);
      var semestre=p[1];
      var annee=p[0];
      var session=p[2];
        //  var idProgramme=    $('#idProgramme').val();
       $('#createEventModal1').modal('toggle');
        // window.location.href="<?php echo base_url(); ?>index.php/scolarite/form_fiche_emarger?planing="+data.id+"&semestre="+semestre+"&annee="+annee+"&session="+session+"";
     });
     
     $('#update').click( function () {
         $('#createEventModal').modal('toggle');
 var data = table.row('.selected').data();
     
    //console.log( 'The table has ' + data.length + ' records' );
    //console.log( 'Data', data ); 
    var matriculeEmploye=data.matriculeEmploye;
   // alert(matriculeEmploye);
    $('#matricule').val(data.matriculeEmploye);
    $('#sigle').val(data.sigle); 
       $('#groupe').val(data.idGroupe);
       $('#heureD').val(data.heureD);
       
        $('#date').val(data.date); 
      $('#type').val(data.date); 
        $('#duree').val(data.duree);
          var selectBox = document.getElementById('type');
          var option=new Array();
          option[0]="CM"
          var cm=option[0];
          option[1]="TD"
          var td=option[1];
          option[2]="TP"
          var tp=option[2];
          var vlue=new Array();
          vlue[0]="cours"
          var vcm=vlue[0];
          vlue[1]="td"
          var vtd=vlue[1];
          vlue[2]="tp"
          var vtp=vlue[2];
         var  options="";
             if((data.type)=="cours"){
              selectBox.options.add(new Option(cm, vcm, "cours"));
              selectBox.options.add(new Option(td, vtd, "td"));
              selectBox.options.add(new Option(tp, vtp, "tp"));
          }  if((data.type)=="td"){
             selectBox.options.add(new Option(td, vtd, "td"));
              selectBox.options.add(new Option(cm, vcm, "cours"));
              selectBox.options.add(new Option(tp, vtp, "tp"));
          } if((data.type)=="tp"){
              selectBox.options.add(new Option(tp, vtp, "tp"));
               selectBox.options.add(new Option(cm, vcm, "cours"));
              selectBox.options.add(new Option(td, vtd, "td"));
          }                               
     
 
    } );
} );
</script></head>
  <div class="container">
      <div class="col-xs-12 hl-left"><table><tr><td>
       <!-- <button class="btn btn-default btn-sm" id="add"><span class="glyphicon glyphicon-plus-sign"></span>Supprimer</button><!--<button class="btn btn-default btn-sm" id="delete"><span class="glyphicon glyphicon-trash"></span>Supprimer</button><button class="btn btn-default btn-sm" id="update"><span class="glyphicon glyphicon-edit"></span>Modifier</button>--><button class="btn btn-default btn-sm" id="fiche"><span class="glyphicon glyphicon-file"></span>Fiche</button>  <button class="btn btn-default btn-sm" id="etu_salle"><span class="glyphicon glyphicon-file"></span>Liste des étdiants par salle d'examen</button>   <button class="btn btn-default btn-sm" id="anonymat_form"><span class="glyphicon glyphicon-file"></span>Anonymat</button>             <div class="form-group">
              </td><td></td></tr></table>
            
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
          <?php // print_r($salles);?>
  </div>   <!--end of center content -->               
  <div id="createEventModal2" class="modal fade" role="dialog">
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
                <label for="nom" class="control-label">Salle:</label>
            </div>
            <div class="col-lg-8 col-sm-8"><?php //print_r($salles); ?>
                                                                        <select class="form-control"    name="salle"  id="local" > 
                                                                       <option value="-1">choisissez la salle</option>
                                                                      <?php 
                                                                        if (is_array($salles)) {


                                                                            for ($i = 0; $i < count($salles); $i++) {
                                                                                echo '<option value="' . $salles[$i] . '" >' . $salles[$i] . '</option>';
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
                <label for="nom" class="control-label">Niveau:</label>
            </div>
            <div class="col-lg-8 col-sm-8"><?php //print_r($salles); ?>
                                                                        <select class="form-control"    name="salle"  id="niveau" > 
                                                                       <option value="-1">choisissez le niveau</option>
                                                                      <?php 
                                                             

                                                                            for ($i = 1; $i < 4; $i++) {
                                                                                echo '<option value="' . $i . '" >L' . $i . '</option>';
                                                                            }
                                                                       
                                                                        ?>
                                                                    </select>
            </div>
            </div>
            </div>
            
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
                                                                                     
                                                                                        echo ' >';
                                                                                       echo $programme['idProgramme'][$i] . '</option>';
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </select>
            </div>
            </div>
            </div>
            
                       
                                                   
                                                <div class="modal-footer">
                                                    <button class="btn" data-dismiss="modal" aria-hidden="true">Annuler</button>
                                                    <button type="submit" class="btn btn-primary" id="afficher">Valider</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>         
                    
    
    </div>  
  <div id="createEventModal3" class="modal fade" role="dialog">
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
                <label for="nom" class="control-label">Niveau:</label>
            </div>
            <div class="col-lg-8 col-sm-8"><?php //print_r($salles); ?>
                                                                        <select class="form-control"      id="niveauA" > 
                                                                       <option value="-1">choisissez le niveau</option>
                                                                      <?php 
                                                             

                                                                            for ($i = 1; $i < 4; $i++) {
                                                                                echo '<option value="' . $i . '" >L' . $i . '</option>';
                                                                            }
                                                                       
                                                                        ?>
                                                                    </select>
            </div>
            </div>
            </div>
            
                      <div class="form-group">
            <div class="row colbox">
            <div class="col-lg-4 col-sm-4">
                <label for="nom" class="control-label">Programme:</label>
            </div>
            <div class="col-lg-8 col-sm-8">
                <select class="form-control"   type="hidden"  name="idProgramme"  id="idProgrammeA" > 
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
            </div>
            </div>
            </div>
            
                       
                                                   
                                                <div class="modal-footer">
                                                    <button class="btn" data-dismiss="modal" aria-hidden="true">Annuler</button>
                                                    <button type="submit" class="btn btn-primary" id="afficherA">Valider</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>         
                    
    
    </div>  
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
           




<script>
      function selectModuleRT(semestre){
                                                        var annee = $("#date").val();
                                                               
                                                                if (semestre != "-1") {
                                                        ElementsPlanning('infomodule_elementRT', "RXTEL",semestre);
                                                        } } 
   function selectModuleMF(semestre) {
                                                        var annee = $("#date").val();
                                                                
                                                                if (semestre != "-1") {
                                                        ElementsPlanning('infomodule_elementMF', "MAEF",semestre);
                                                        } } 
                                                       
                                                         function selectModuleMN(semestre) {
                                                        var annee = $("#date").val();
                                                                
                                                                if (semestre != "-1") {
                                                        ElementsPlanning('infomodule_elementMN', "MAN",semestre);
                                                        } 
                                                        }
                                                         function selectModuleLT(semestre){
                                                        var annee = $("#date").val();
                                                               
                                                                if (semestre != "-1") {
                                                        ElementsPlanning('infomodule_elementLT', "LGTR",semestre);
                                                        } }

                                                        function ElementsPlanning(loadType, loadId,semestre) {
                                                                var dataString = 'loadType=' + loadType + '&loadId=' + loadId+'&type=1&semestre='+semestre;
                                                               // alert(dataString)
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
                <label for="nom" class="control-label">Salle:</label>
            </div>
            <div class="col-lg-8 col-sm-8"><?php //print_r($salles); ?>
                                                                        <select class="form-control"    name="salle"  id="salle" > 
                                                                       <option value="-1">choisissez la salle</option>
                                                                      <?php 
                                                                        if (is_array($salles)) {


                                                                            for ($i = 0; $i < count($salles); $i++) {
                                                                                echo '<option value="' . $salles[$i] . '" >' . $salles[$i] . '</option>';
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
                <label for="prenom" class="control-label">MAEF:</label>
            </div>
            <div class="col-lg-8 col-sm-8">
               
                <div class="input-group">
             <select class="form-control" id="semestreMF" name="semestre" onchange="selectModuleMF(this.options[this.selectedIndex].value)">
                                                                                <option value="-1">choisissez le semestre</option>
                                                                                <option value="1">S1</option>
                                                                                <option value="3">S3</option>
                                                                                <option value="5">S5</option>
                                                                                
                                                                            </select>
            <span class="input-group-addon"></span>
             <select class="form-control" id="infomodule_elementMF_dropdown" name="sigle" >
                                                                                <option value="-1">choisissez l'element</option>
                                                                            </select>
        </div>
            </div>
            </div>
            </div>
            
       <div class="form-group">
            <div class="row colbox">
            <div class="col-lg-4 col-sm-4">
                <label for="prenom" class="control-label">RXTEL:</label>
            </div>
            <div class="col-lg-8 col-sm-8">
               
                <div class="input-group">
             <select class="form-control"  onchange="selectModuleRT(this.options[this.selectedIndex].value)" name="sigle" >
                                                                                 <option value="-1">choisissez le semestre</option>
                                                                                <option value="1">S1</option>
                                                                                <option value="3">S3</option>
                                                                                <option value="5">S5</option> </select>
            <span class="input-group-addon"></span>
             <select class="form-control" id="infomodule_elementRT_dropdown" name="sigle" >
                                                                                <option value="-1">choisissez l'element</option>
                                                                            </select>
        </div>
            </div>
            </div>
            </div>
     <div class="form-group">
            <div class="row colbox">
            <div class="col-lg-4 col-sm-4">
                <label for="prenom" class="control-label">LGTR:</label>
            </div>
            <div class="col-lg-8 col-sm-8">
               
                <div class="input-group">
             <select class="form-control" onchange="selectModuleLT(this.options[this.selectedIndex].value)" name="sigle" >
                                                                                <option value="-1">choisissez le semestre</option>
                                                                                <option value="1">S1</option>
                                                                                <option value="3">S3</option>
                                                                                <option value="5">S5</option> </select>
            <span class="input-group-addon"></span>
             <select class="form-control" id="infomodule_elementLT_dropdown" name="sigle" >
                                                                                <option value="-1">choisissez l'element</option>
                                                                            </select>
        </div>
            </div>
            </div>
            </div>
     <div class="form-group">
            <div class="row colbox">
            <div class="col-lg-4 col-sm-4">
                <label for="prenom" class="control-label">MAN:</label>
            </div>
            <div class="col-lg-8 col-sm-8">
               
                <div class="input-group">
             <select class="form-control" onchange="selectModuleMN(this.options[this.selectedIndex].value)"  name="sigle" >
                                                                                <option value="-1">choisissez le semestre</option>
                                                                                <option value="1">S1</option>
                                                                                <option value="3">S3</option>
                                                                                <option value="5">S5</option> </select>
            <span class="input-group-addon"></span>
             <select class="form-control" id="infomodule_elementMN_dropdown" name="sigle" >
                                                                                <option value="-1">choisissez l'element</option>
                                                                            </select>
        </div>
            </div>
            </div>
            </div>
            
            
            <div class="form-group">
            <div class="col-sm-offset-4 col-lg-8 col-sm-8 text-left">
                <input id="submitButton" name="btn_add" type="submit" class="btn btn-primary" value="Valider" />
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
	
    
  <?php include(APPPATH.'views/include/footer.php');?>