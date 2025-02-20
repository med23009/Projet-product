<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
<head>
   <!-- <script language="javascript" type="text/javascript" src="<?php echo base_url();?>js/jquery-3.5.1.js"></script>-->
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>js/jquery.dataTables.min.js"></script>
 
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>js/dataTables.editor.min.js"></script>
 <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url();?>css/jquery.dataTables.min.css" />
  
<script>
   $(document).ready(function() {
 
    // Activate an inline edit on click of a table cell
 
  annee=  $("#annee").val();
    semestre=    $("#semestre").val();
    evaluation= $("#evaluation").val();
   var table=  $('#example').DataTable( {
        "ajax": "<?php echo base_url(); ?>index.php/scolarite/info_liste_modification_note/"+annee+"/"+semestre+"/"+evaluation,
        "columns": [
         
             { "data": "matriculeEtudiant" },
               { "data": "sigle" },
                 { "data": "titre" },
                 { "data": "sem" },
                 { "data": "annee" },
                  { "data": "note" },
                   { "data": "semestre" },
                   { "data": "idEvaluation" }
           
           
           
        ],
                 "columnDefs": [
               {
                   "className": 'change-note',
                "targets": [ 5],
              
            },
            {
                "targets": [ 6 ],
                "visible": false
            },
            {
                "targets": [ 7 ],
                "visible": false
            }
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
                
    } );
   
    $('#example tbody').on( 'click', 'tr', function () {
      if ( $(this).hasClass('selected') ) {
          $("#note").val(table.row(this).data().note);
        
        
            $(this).removeClass('selected');
          
        }
        else {
             
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
            $("#note").val(table.row(this).data().note);
        } 
       
     
    }); 
  $(".param").change(function(){
      
     console.log(  table.ajax.url);
   annee=  $("#annee").val();
    semestre=    $("#semestre").val();
    evaluation= $("#evaluation").val();
  
    table.ajax.url("<?php echo base_url(); ?>index.php/scolarite/info_liste_modification_note/"+annee+"/"+semestre+"/"+evaluation).load(null, false);
  });
            $('#note').change( function () {
         $table= table.row('.selected');
         console.log($table);
    });
            $('#modifier').click( function () {
                 var matriculeEtudiant=$table.data().matriculeEtudiant;
       sigle= $table.data().sigle;
      idEvaluation= $table.data().idEvaluation;
   semestre= $table.data().semestre;
  note= $("#note").val();
   annee= $table.data().annee;
  
        var dataString='matriculeEtudiant='+matriculeEtudiant+'& sigle='+sigle+'&idEvaluation='+idEvaluation+'&note='+note+'&semestre='+semestre+'&annee='+annee
    
      
         var data = table.row('.selected').data();
        console.log(data);
        $.ajax({ 
            
       url : '<?php echo base_url(); ?>index.php/scolarite/update_note_afterValide',
       type : 'post', // Le type de la requête HTTP, ici devenu POST
       data :dataString,
           // On fait passer nos variables, exactement comme en GET, au script more_com.php
     success : function(result){  
         table.ajax.reload(null,false);
         console.log(result);
     }
         
    });
         
    });
      
        //$("#matricule").val(matricule);
       // $('#createEventModal1').modal('toggle');
      //alert(note);
    /*   if (window.XMLHttpRequest) {
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
                                                         table.ajax.reload(null, false);
                                                        }
                                                    };
                                                  
   
                                                    var events = "<?php echo base_url(); ?>index.php/scolarite/valider_modification_note?matriculeEtudiant=" + matriculeEtudiant +"&sigle="+sigle+"&semestre="+semestre+"&note="+note+"&idEvaluation="+idEvaluation+"&annee="+annee+ "";
                                                  
                                                    xmlhttp.open("GET", events, true);
                                                    xmlhttp.send();*/
    
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
                                               var id=     data.id;
   
                                                    var events = "<?php echo base_url(); ?>index.php/scolarite/delete_pv_fraudes?id=" + id + "";
                                                  
                                                    xmlhttp.open("GET", events, true);
                                                    xmlhttp.send();
                                                                                  
        table.row('.selected').remove().draw( false );
    } );
    
    $('#submitButton').click( function () {
   /*      setInterval( function () {
table.ajax.reload(null, false);
}, 5000 );*/
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
                                                           var options="";
                                                         
                                                        }
                                                    };
                                                 
                                                     var matriculeetudiant= $('#matricule').val(); 
                                                     var sigle=    $('#etudiant_elements_dropdown').val();
                                                     var semestre=    $('#semestre1').val();
                                                     var session=    $('#session').val();
                                                     var annee=    $('#annee').val();
                                                     var note=    $('#note').val();
                                                             var statu = "";
                      /*  if( $('#statu').prop('checked') ){
    statu = $('#statu').val(); //alert(chekb);
} else {
    statu="0"; //alert(statu);
}*/
   
                                                    var events = "<?php echo base_url(); ?>index.php/directeur_etudes/ajouter_modif_note_temp?matriculeEtudiant=" + matriculeetudiant +"&sigle=" + sigle+"&semestre=" + semestre+"&annee=" + annee+"&note=" + note+"&session=" + session+"";
                                                  
                                                    xmlhttp.open("GET", events, true);
                                                    xmlhttp.send();
                                              
     } );
     $('#add').click( function () {
         // $('#createEventModal1').modal('toggle');
     });
      $('#update').click( function () {
         $('#createEventModal').modal('toggle');
          var data = table.row('.selected').data();
     
    //console.log( 'The table has ' + data.length + ' records' );
    //console.log( 'Data', data ); 
    var session=data.idEvaluation;
     var note=data.note;
     var statuM=data.statu;
   // alert(matriculeEmploye);
   $('#statuM').val(statuM);
    $('#sessionM').val(session);
     $('#noteM').val(note); 
      $('#idM').val(data.id); 
    $("#sessionM").html("");
   // alert(statuM);
    if(statuM=="1"){
         $('#statuM').prop('checked', true);
    }else{
         $('#statuM').prop('checked', false);
    }
                          
                            var selectBox = document.getElementById('sessionM');
                             
                            // selectBox.options.add( new Option(options[i], options1[i], event.matricule) );
                            var opt = document.createElement('option');
                            var opt2 = document.createElement('option');
                            var opt3 = document.createElement('option');
                           // alert(session);
                            if(session==1){
                            opt.value = "1";
                            opt.innerHTML = "CC";
                            opt2.value = "2";
                            opt2.innerHTML = "SN";
                            opt3.value = "4";
                            opt3.innerHTML = "SR";
                            selectBox.appendChild(opt);
                            selectBox.appendChild(opt2);
                            selectBox.appendChild(opt3);
                        }else if(session==2){
                            opt.value = "2";
                            opt.innerHTML = "SN";
                            opt.value = "1";
                            opt.innerHTML = "CC";
                            opt.value = "4";
                            opt.innerHTML = "SR";
                            selectBox.appendChild(opt);
                        }else if(session==4){
                            
                            opt.value = "4";
                            opt.innerHTML = "SR";
                             opt.value = "1";
                            opt.innerHTML = "CC";
                            opt.value = "2";
                            opt.innerHTML = "SN";
                            selectBox.appendChild(opt);
                        }
     });
      $('#liste').click( function () {
         window.location.href='<?php echo base_url(); ?>index.php/directeur_etudes/liste_modif_note';
     });
     /* $('#modifier').click( function () {
      //  $('#createEventModal').modal('hide');
 
       
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
                                                 
                                                     var session1=    $('#sessionM').val();
                                                     var note1=    $('#noteM').val();
                                                     var id=    $('#idM').val();
                                                     var statu1 = "";
                                                      // var ckbox = $('#statuM');
              if( $('input[name=statuM]').is(':checked') ){
   statu1="1";
} else {
    statu1="0";
}
   
                                                    var events = "<?php echo base_url(); ?>index.php/scolarite/modifier_pv_fraudes?id=" + id + "&note=" + note1+"&session=" + session1+"&statu1=" + statu1+ "";
                                                  
                                                    xmlhttp.open("GET", events, true);
                                                    xmlhttp.send();
          
 
    } );
     */

 function selectModule(semestre){
                                                               // var semestre = $("#semestre1").val();
                                                                var matricule = $("#matricule").val();
                                                                var loadId = "";
                                                               //   
                                                                if (semestre!= "-1") {
                                                                 // alert("hh");
                                                     //   ElementsPlanning('infomodule_element', idProgramme, annee, semestre, type=1, matriculeEmploye);
                                                        etudiant_elements('etudiant_elements', loadId, semestre,matricule);
                                                      
                                                        } 
                                                        }
                                                           function selectNote_element(element) {
                                                                var matricule = $("#matricule").val();
                                                                   var loadId = "";
                                                                   var evaluation = $("#session").val();;
                                                                if (element != "-1") {
                                                     //   ElementsPlanning('infomodule_element', idProgramme, annee, semestre, type=1, matriculeEmploye);
                                                        Element_note('note_element',loadId, matricule, evaluation, element);
                                                      
                                                        } 
                                                        }
                                                                     function etudiant_elements(loadType, loadId, semestre,matricule) {
                                                                  var matricule = $("#matricule").val();
                                                                   var loadId = "";
                                                               
                                                                var dataString = 'loadType=' + loadType + '&loadId=' + loadId + '&semestre=' + semestre + '&matricule=' + matricule;
                                                               //alert(dataString)
                                                                $("#" + loadType + "_loader").show();
                                                                $("#" + loadType + "_loader").fadeIn(400).html('En cours... <img src="<?php echo base_url(); ?>images/loading.gif" />');
                                                                $.ajax({
                                                                type: "POST",
                                                                        url: "ElementsModif_note",
                                                                        data: dataString,
                                                                        cache: false,
                                                                        success: function (result) {
                                                                        $("#" + loadType + "_loader").hide();
                                                                             $("#" + loadType + "_dropdown").html("<option value='-1'>Select " + loadType + "</option>");
                                                                                $("#" + loadType + "_dropdown").append(result);
                                                                               
                                                                               // $("#" + loadType + "_dropdown").append(result);
                                                                               
                                                                                
                                                                        }
                                                                });
                                                        }
                                                        function Element_note(loadType, loadId, matricule, evaluation, element) {
                                                                  
                                                               
                                                                var dataString = 'loadType=' + loadType + '&loadId=' + loadId + '&evaluation=' + evaluation + '&matricule=' + matricule+ '&element=' + element;
                                                               //alert(dataString)
                                                                $("#" + loadType + "_loader").show();
                                                                $("#" + loadType + "_loader").fadeIn(400).html('En cours... <img src="<?php echo base_url(); ?>images/loading.gif" />');
                                                                $.ajax({
                                                                type: "POST",
                                                                        url: "Element_note",
                                                                        data: dataString,
                                                                        cache: false,
                                                                        success: function (result) {
                                                                        $("#" + loadType + "_loader").hide();
                                                                                 $("#ht").fadeIn(400).html(result);
                                                                               
                                                                                
                                                                        }
                                                                });
                                                        }
                                                      

</script></head>
  <div class="container">
    <div class="col-xs-12 hl-left">
   <!--  <button class="btn btn-default btn-sm" id="historique"><span class="glyphicon glyphicon-edit"></span>Historique des modification</button><button class="btn btn-default btn-sm" id="liste"><span class="glyphicon glyphicon-edit"></span>Liste des modifications</button>
 -->

   <div class="btn-group  "> <table class="table"><tr>  
               <td style="font-size:15pt;">Année <?php echo'&nbsp'?> <td><td><select id="annee" class="param form-control"><?php for($i=2011;$i<=2028;$i++){
        
                   if($i==$annee){
                       if($semestre==3){
                           $anneeplus=$i+1;
                        echo"   <option value=$i selected> $i-$anneeplus </option>";
                         }else{
                        $anneeM=$i-1;
                             echo"<option value=$i selected>$i-$anneeM</option>";
                            }  
                   }else{
                        if($semestre==3){
                             $anneeplus=$i+1;
                        echo "<option value=$i> $i-$anneeplus </option>";
                         }else{
                              $anneeM=$i-1;
                        echo "<option value=$i> $i-$anneeM </option>";
                            } 
                    }        
               }?>
                   </select><?php echo'&nbsp'?><td style="font-size:15pt;">Semestre 
               <td><select id="semestre" class="param form-control">
                       <?php if($semestre==1){ echo "<option value=1 selected>Paire</option><option value=3>Impaire</option>";} else { echo "<option value=3 selected>Impaire</option><option value=1>Paire</option>"; } ?></select>  <?php echo'&nbsp'?>    
               <td style="font-size:15pt;">Evaluation<td><select id="evaluation" class=" param form-control"><option value=2 >CC</option><option value=1>CP</option><option value=4>SR</option></select>
               <td style="font-size:15pt;" >Note<td> <input class="param form-control" type="text " id="note">
  
<td><td><button class="btn btn-success " id="modifier" >Modifier</button>    </table>
   </div>   <div id="createEventModal1" class="modal fade" role="dialog">
            
            
       <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                   <!-- <input type="hidden" id="planning" name="planning"/>-->
 <INPUT class="form-control" id="matricule"  />
          <!--  <div class="form-group">
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

-->



            <div class="form-group">
            <div class="row colbox">
            <div class="col-lg-4 col-sm-4">
                <label  for="annee" class="control-label">Semestre:</label>
            </div>
            <div class="col-lg-8 col-sm-8">
                                                                       
                                                                        <?php
                                                                        echo ' <select class="form-control"   name="semestre" id="semestre1" onchange="selectModule(this.options[this.selectedIndex].value)"> ';
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
            
          
            <!--
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
            </div>-->
            <div class="form-group">
            <div class="row colbox">
            <div class="col-lg-4 col-sm-4">
                <label for="prenom" class="control-label">session:</label>
            </div>
            <div class="col-lg-8 col-sm-8">
                <select class="form-control" id="session" name="sigle" >
                                                                                <option value="1">CC</option>
                                                                                 <option value="2">SN</option>
                                                                                  <option value="4">SR</option>
                                                                            </select>
            </div>
            </div>
            </div>
                                                    <div class="form-group">
            <div class="row colbox">
            <div class="col-lg-4 col-sm-4">
                <label for="prenom" class="control-label">éléments:</label>
            </div>
            <div class="col-lg-8 col-sm-8">
                <select class="form-control" id="etudiant_elements_dropdown" name="sigle" onchange="selectNote_element(this.options[this.selectedIndex].value)" >
                                                                                <option value="-1">choisissez l'element</option>
                                                                            </select>
            </div>
            </div>
            </div>
           <!-- <div class="form-group">
            <div class="row colbox">
            <div class="col-lg-4 col-sm-4">
                <label for="prenom" class="control-label">Etudiant:</label>
            </div>
            <div class="col-lg-8 col-sm-8">
                <select class="form-control" id="etudiant_element_dropdown" name="sigle" >
                                                                                <option value="-1">choisissez l'element</option>
                                                                            </select>
            </div>
            </div>
            </div>
           -->  
              
                                                         <div class="form-group">
            <div class="row colbox">
            <div class="col-lg-4 col-sm-4">
                <label for="prenom" class="control-label">Note:</label>
            </div>
            <div class="col-lg-8 col-sm-8">
               <!-- <INPUT class="form-control" id="note" name="sigle" />-->
                <span id="ht"></span>                                                 
            </div>
            </div>
            </div><!--
                                                              <div class="form-group">
            <div class="row colbox">
            <div class="col-lg-4 col-sm-4">
                <label for="prenom" class="control-label">Statu:</label>
            </div>
            <div class="col-lg-8 col-sm-8">
                <INPUT class="form-control" id="statu" value="1"  type="checkbox" name="statu" />
                                                                        
            </div>
            </div>
            </div>
            -->
  
            <div class="form-group">
            <div class="col-sm-offset-4 col-lg-8 col-sm-8 text-left">
                <input id="submitButton" name="btn_add" type="submit" class="btn btn-primary" value="Modifier" />
                <input id="btn_cancel" name="btn_cancel" type="reset" class="btn btn-danger" value="Annuler" />
            </div>
            </div>
      
  </div>
                                                </div></div></div>
      <div id="createEventModal" class="modal fade" role="dialog">
       <div class="modal-dialog">
<INPUT  type="hidden" class="form-control" id="idM" name="sigle" />
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                   <!-- <input type="hidden" id="planning" name="planning"/>-->
              <div class="form-group">
            <div class="row colbox">
            <div class="col-lg-4 col-sm-4">
                <label for="prenom" class="control-label">session:</label>
            </div>
            <div class="col-lg-8 col-sm-8">
                <select class="form-control" id="sessionM" name="sigle" >
                                                                                <option value="1">CC</option>
                                                                                 <option value="2">SN</option>
                                                                                  <option value="4">SR</option>
                                                                            </select>
            </div>
            </div>
            </div>
                                                         <div class="form-group">
            <div class="row colbox">
            <div class="col-lg-4 col-sm-4">
                <label for="prenom" class="control-label">Note:</label>
            </div>
            <div class="col-lg-8 col-sm-8">
                <INPUT class="form-control" id="noteM" name="sigle" />
                                                                        
            </div>
            </div>
            </div>
               <div class="form-group">
            <div class="row colbox">
            <div class="col-lg-4 col-sm-4">
                <label for="prenom" class="control-label">Statu:</label>
            </div>
            <div class="col-lg-8 col-sm-8">
                <INPUT class="form-control" value="1" id="statuM"  type="checkbox" name="statuM" />
                                                                        
            </div>
            </div>
            </div>
  
            <div class="form-group">
            <div class="col-sm-offset-4 col-lg-8 col-sm-8 text-left">
                <input id="modifier" name="btn_add" type="submit" class="btn btn-primary" value="Modifier" />
                <input id="btn_cancel" name="btn_cancel" type="reset" class="btn btn-danger" value="Annuler" />
            </div>
            </div>
      
  </div>
                                                </div></div></div>
                                            
       
        <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
              
               <th>MatriculeEtudiant</th>
                <th>Sigle</th>
                <th>Titre</th>
                <th>Semestre</th>
                <th>Année</th>
                <th>Note</th>
                 <th>Semestre</th>
                 <th>Evaluation</th>
                
            </tr>
        </thead>
        <tfoot>
            <tr>
               <th>MatriculleEtudiant</th>
                <th>Sigle</th>
                <th>Titre</th>
                <th>Semestre</th>
                <th>Année</th>
                <th>Note</th>
                <th>Semestre</th>
                <th>Evaluation</th>
            </tr>
        </tfoot>
    </table>       
  </div>   <!--end of center content -->               
                        
                    
    
    </div>  
    <div class="clear"></div>
    </div> <!--end of main content-->
    <script>
        

                                           
    
    </script>
    
  <?php include(APPPATH.'views/include/footer.php');?>