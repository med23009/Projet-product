<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
<head>
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>js/jquery.dataTables.min.js"></script>
 <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url();?>css/jquery.dataTables.min.css" />
  
<script>
   $(document).ready(function() {
   var table=  $('#example').DataTable( {
        "ajax": "<?php echo base_url(); ?>index.php/agent/heures_enseignement",
        "columns": [
            { "data": "matriculeEmploye" },
            { "data": "prenom" },
            { "data": "nom" },
            { "data": "date" },
            { "data": "heureD" },
            { "data": "duree" },
            { "data": "type" },
            { "data": "sigle" },
            { "data": "idGroupe" }
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
                                               var matricule1=     $('#matricule').val();
   var sigle1= $('#sigle').val(); 
    var groupe1=    $('#groupe').val();
    var heureD1=    $('#heureD').val();
       var heureD=   data.heureD;
        var date=   data.date;
     var date1=   $('#date').val(); 
      var type1=$('#type').val(); 
       var duree1=  $('#duree').val();
                                                    var events = "<?php echo base_url(); ?>index.php/agent/modifier_heure_enseignement?matricule=" + matricule1 +"&sigle=" + sigle1 +"&groupe=" + groupe1 +"&date=" + date1 +"&heureD=" + heureD1 +"&duree=" + duree1 +"&type=" + type1 +"&ancdate=" + date +"&ancheureD=" + heureD + "";
                                                  
                                                    xmlhttp.open("GET", events, true);
                                                    xmlhttp.send();
                                              
     } );
     $('#add').click( function () {
         window.location.href='<?php echo base_url(); ?>index.php/agent/saisir_horaire_enseignement';
     });
      $('#fiche').click( function () {
         window.location.href='<?php echo base_url(); ?>index.php/agent/suivi_ens_etu';
     });
      $('#fiches').click( function () {
         window.location.href='<?php echo base_url(); ?>index.php/agent/form_fiches_suivi';
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
    <div class="col-xs-12 hl-left">
        <button class="btn btn-default btn-sm" id="add"><span class="glyphicon glyphicon-plus-sign"></span>Ajouter</button><button class="btn btn-default btn-sm" id="delete"><span class="glyphicon glyphicon-trash"></span>Supprimer</button><button class="btn btn-default btn-sm" id="update"><span class="glyphicon glyphicon-edit"></span>Modifier</button><button class="btn btn-default btn-sm" id="fiche"><span class="glyphicon glyphicon-file"></span>Fiche</button><button class="btn btn-default btn-sm" id="fiches"><span class="glyphicon glyphicon-file"></span>Fiches</button>
   <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Matricule</th>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Date</th>
                <th>Heure début</th>
                <th>Durée</th>
                <th>Type</th>
                <th>Sigle</th>
                <th>Groupe</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Matricule</th>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Date</th>
                <th>Heure début</th>
                <th>Durée</th>
                <th>Type</th>
                <th>Sigle</th>
                <th>Groupe</th>
            </tr>
        </tfoot>
    </table>       
  </div>   <!--end of center content -->               
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