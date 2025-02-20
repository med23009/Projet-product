<?php
session_start();
//include("database.php");
?>
<?php
include(APPPATH.'views/include/header.php');
include('include/menu.php');
?>

<!doctype html>
<html lang="fr"><head>
   <!--     <style>
  .cal{
  margin-left: -53%;
  margin-bottom: 9px;
}

@media print {
    .fc-header-left, .fc-header-right,
    .intercom-launcher-button, .cal, button
    { 
      display: none;
    }
}

.fc-border-separate{
  background: yellowgreen;
}
  
  
.fc-event-start {
    width: 124px;
    height: 107px;
    border-radius: 0;
    background: #fff;
    border: 0;
    color: #000;
    line-height: 100px;
    text-align: center;
}
</style>-->
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
        <style type="text/css">

            img {border-width: 0}
            * {font-family:'Lucida Grande', sans-serif;}
        </style>
    </head>
    <body  >


        <style type="text/css">
            .block a:hover{
                color: silver;
            }
            .block a{
                color: #fff;
            }
            .block {
                position: fixed;
                background: #2184cd;
                padding: 20px;
                z-index: 1;
                top: 240px;
            }
        </style>

        <div>



            <div style="float:left;width:0px">
                <a href="" title="PHPLift feed"></a>
            </div>

            <!-- Place this tag where you want the badge to render. -->



            <br /><br />
            <hr />  

            <script src="<?php echo base_url(); ?>js/jquery.min1.js"></script>

            <script src="<?php echo base_url(); ?>js/bootstrap.min1.js" crossorigin="anonymous"></script>
            <link  href="<?php echo base_url(); ?>css/bootstrap.min1.css" rel="stylesheet" >



            <link href="<?php echo base_url(); ?>css/fullcalendar.css" rel="stylesheet" />
            <link href="<?php echo base_url(); ?>css/fullcalendar.print.css" rel="stylesheet" media="print" />
            <script src="<?php echo base_url(); ?>js/moment.min.js"></script>
            <script src="<?php echo base_url(); ?>js/fullcalendar.min.js"></script>
            <script src="<?php echo base_url(); ?>js/lang-all.js"></script>
            <script src="<?php echo base_url(); ?>js/jspdf.min.js"></script>
            <script src="<?php echo base_url(); ?>js/html2canvas.js"></script>
          <!-- <script src="http://mrrio.github.io/jsPDF/dist/jspdf.debug.js"></script>
           <script src="http://html2canvas.hertzen.com/build/html2canvas.js"></script>
           <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>-->
           <!--   <link rel="stylesheet" href="<?php echo base_url(); ?>print_cal/jquery-ui.min.css">
           <link href="<?php echo base_url(); ?>print_cal/fullcalendar.min.css" rel="stylesheet">
           <link href="<?php echo base_url(); ?>print_cal/fullcalendar.print.min.css" rel="stylesheet" media="print">
           <script src="<?php echo base_url(); ?>print_cal/moment.min.js"></script>
           <script src="<?php echo base_url(); ?>print_cal/jquery.min.js"></script>
           <script src="<?php echo base_url(); ?>print_cal./fullcalendar.min.js"></script>-->
        <!--   <script src="https://github.com/MrRio/jsPDF/blob/master/plugins/autoprint.js"></script>-->
            <script type="<?php echo base_url(); ?>js/transition.js"></script>
            <script type="<?php echo base_url(); ?>js/collapse.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap-datetimepicker.min.js"></script>

            <script type="text/javascript">

function print1() {
    html2canvas($("#target"), {
        onrendered: function (canvas) {
            var imgData = canvas.toDataURL(
                    'image/png');
            //   $('#divhidden').html('<img src="'+imgData+'" alt="">');
            var MyDiv1 = document.getElementById('cours');
            //  var MyDiv2 = document.getElementById('DIV2');
            // MyDiv2.innerHTML = MyDiv1.innerHTML;
            var nom = MyDiv1.innerHTML;
            var doc = new jsPDF('landscape');
            doc.addImage(imgData, 'PNG', 0, 0);
            //doc.save(nom + ".pdf")
          //  doc.output('datauri');
          var nom = doc.output("blob");
          window.open(URL.createObjectURL(nom))

        }
    });
}

/*html2canvas($("#target"), {
 onrendered: function(canvas) {
 var canvasImg = canvas.toDataURL("image/jpg");
 $('#divhidden').html('<img src="'+canvasImg+'" alt="">');
 }
 });*/
html2canvas($("#target"), {
    onrendered: function (canvas) {
        var imgData = canvas.toDataURL(
                'image/png');
        $('#divhidden').html('<img src="' + imgData + '" alt="">');
        var doc = new jsPDF('landscape');
        doc.addImage(imgData, 'PNG', 10, 10);
        doc.save("hh.pdf")
    }
});

function print() {

    var printContent = document.getElementById("divhidden");
    var printWindow = window.open("", "", "left=50,top=50");
    printWindow.document.write(printContent.innerHTML);
    printWindow.document.write("<script src=\'http://code.jquery.com/jquery-1.10.1.min.js\'><\/script>");
    printWindow.document.write("<script>$(window).load(function(){ print(); close(); });<\/script>");
    printWindow.document.close();
}
            </script>


            <div id="divhidden"></div>

            <script type="text/javascript">
                
                var monthFormat = 'ddd';
                var weekFormat = 'dddd d/M';
                var dayFormat = 'dddd';
                function cacher(str) {

                    if (str == "0") {

                        
                          monthFormat = 'ddd';
                        weekFormat = 'ddd d/M';
                        dayFormat = 'dddd';
                    } else {
                      monthFormat = 'ddd';
                        weekFormat = 'dddd';
                        dayFormat = 'dddd';
                    }
                  // alert(str);
                 
                 $('#calendar').fullCalendar({
                        lang: initialLangCode,
                        header: {
                            left: 'prev,next today',
                            center: "",
                            right: 'month,agendaWeek,agendaDay,agendaList'

                        },
                        width: 200,
                        height: 650,
                        nowIndicator :true,
                        defaultView: 'agendaWeek',
                        editable: true,
                        selectable: true,
                        allDaySlot: false,
                        timezone: 'UTC',
                        minTime: "08:00:00",
                        maxTime: "20:00:00",
                        columnFormat: {
                            month: monthFormat,
                            week: weekFormat,
                            day: dayFormat
                        }});
                     $('#calendar').fullCalendar('refresh' );
                }

                $(document).ready(function () {

                    $(".cal").keyup(function ()
                    {

                        var background = $("#background").val();



                        $(".fc-border-separate").css("background-color", background);
                    });


                    var initialLangCode = 'fr-ca';
                    var events1 = $('#startTime').val();
                    var annee = $('#date').val();
                    var idProgramme = $('#infomodule_element_dropdown').val();
                    var semestre = $('#semestre1').val();
                    var chek1 = $('#users').val();
                    var local1 = $('#local1').val();
                    var l1 = $('#users').val();


                    var calendar = $('#calendar').fullCalendar({
                        lang: initialLangCode,
                        header: {
                            left: 'prev,next today',
                            center: 'title',
                            right: 'month,agendaWeek,agendaDay,agendaList'

                        },
                        width: 200,
                        height: 650,
                        nowIndicator :true,
                        defaultView: 'agendaWeek',
                        editable: true,
                        selectable: true,
                        allDaySlot: false,
                        timezone: 'UTC',
                        minTime: "08:00:00",
                        maxTime: "20:00:00",
                        events: "",
                        eventClick: function (event, jsEvent, view) {
                            endtime = $.fullCalendar.moment(event.end).format('h:mm');
                            starttime = $.fullCalendar.moment(event.start).format('dddd, MMMM Do YYYY, h:mm');
                            $("#prof").html("");
                            $("#profD").html("");
                            var options =<?php echo (json_encode($employe['matriculeEmploye'])); ?>;
                            var options1 =<?php echo (json_encode($employe['nom'])); ?>; 
                           var options5 =<?php echo (json_encode($employe['prenom'])); ?>; ////  echo'<option value="' . $loc . '" ';
//alert(event.matricule);
                            var selectBox = document.getElementById('prof');
                            var selectBox5 = document.getElementById('profD');

                            for (var i = 0, l = options.length; i < l; i++) {
                                var option = options[i];
                                var option1 = options1[i];
                                var option5 = options5[i];
                                // selectBox.options.add( new Option(options[i], options1[i], event.matricule) );
                                var opt = document.createElement('option');
                                opt.value = options[i];
                                opt.innerHTML = options5[i]+" "+options1[i];
                                
                                document.getElementById('prof').value = event.matricule;
                                var optE = document.createElement('option');
                                optE.value = options[i];
                                optE.innerHTML = options5[i]+" "+options1[i];
                                document.getElementById('profD').value = event.matricule;
                                selectBox.appendChild(opt);
                                selectBox5.appendChild(optE);
                            }
                            $("#local2").html("");
                            var options2 =<?php echo (json_encode($local)); ?>;   // echo'<option value="' . $loc . '" ';
//alert(options2);
                            var selectBox1 = document.getElementById('local2');
                            var selectBox4 = document.getElementById('local3');

                            for (var j = 0, l1 = options2.length; j < l1; j++) {

                                // selectBox.options.add( new Option(options[i], options1[i], event.matricule) );
                                var opt1 = document.createElement('option');
                                opt1.value = options2[j];
                                opt1.innerHTML = options2[j];
                                document.getElementById('local2').value = event.local;
                                document.getElementById('local3').value = event.local;
                                selectBox4.appendChild(opt1);
                                selectBox1.appendChild(opt1);
                            }
                            $("#typecm").html("");
                            $("#typecmD").html("");
                            // var options2=<?php echo (json_encode($local)); ?>  ;   // echo'<option value="' . $loc . '" ';
//alert(options2);
                            var selectBox2 = document.getElementById('typecm');
                             var selectBox3 = document.getElementById('typecmD');

//for(var k = 0, l2 = options2.length; j < l1; j++){

                            // selectBox.options.add( new Option(options[i], options1[i], event.matricule) );
                            var opt2 = document.createElement('option');
                            var opt3 = document.createElement('option');
                            var opt4 = document.createElement('option');
                            var opt5 = document.createElement('option');
                             var opt2D = document.createElement('option');
                            var opt3D = document.createElement('option');
                            var opt4D = document.createElement('option');
                            var opt5D = document.createElement('option');
                            opt2.value = "CM";
                            opt2.innerHTML = "CM";
                            opt2D.value = "CM";
                            opt2D.innerHTML = "CM";
                            selectBox2.appendChild(opt2);
                            selectBox3.appendChild(opt2D);
                            opt3.value = "TD";
                            opt3.innerHTML = "TD";
                            opt3D.value = "TD";
                            opt3D.innerHTML = "TD";
                            selectBox2.appendChild(opt3);
                            selectBox3.appendChild(opt3D);
                            opt4.value = "TP";
                            opt4.innerHTML = "TP";
                             opt4D.value = "TP";
                            opt4D.innerHTML = "TP";
                            selectBox2.appendChild(opt4);
                            selectBox3.appendChild(opt4D);
                            opt5.value = "Autres";
                            opt5.innerHTML = "Autres";
                            opt5D.value = "Autres";
                            opt5D.innerHTML = "Autres";
                            selectBox2.appendChild(opt5);
                            selectBox3.appendChild(opt5D);
                            document.getElementById('typecm').value = event.type;
                             document.getElementById('typecmD').value = event.type;
                          //  selectBox2.appendChild(opt2);
                          //   selectBox3.appendChild(opt2);
//}
                        
//}

                            var mywhen = starttime + ' - ' + endtime;
                            $('#modalTitle').html(event.title);
                            $('#modalWhen').text(mywhen);
                            $('#eventID_D').val(event.id);
                            $('#titleD').val(event.title);
                            $('#eventIDG_D').val(event.idGroupe);
                            $('#startTimeD').val($.fullCalendar.moment(event.start).format('YYYY-MM-D HH:mm:ss'));
                            $('#endTimeD').val($.fullCalendar.moment(event.end).format('YYYY-MM-D HH:mm:ss'));
                            
                            $('#eventID').val(event.id);
                            $('#titleM').val(event.title);
                            $('#eventIDG').val(event.idGroupe);
                            $('#startTimeM').val($.fullCalendar.moment(event.start).format('YYYY-MM-D HH:mm:ss'));
                            $('#endTimeM').val($.fullCalendar.moment(event.end).format('YYYY-MM-D HH:mm:ss'));
                     
                            $('#calendarModal').modal();
                             $("#eventIDG").html("<option value='"+event.idGroupe +"'>" +  event.idGroupe+ "</option>");
                        },
                        //header and other values
                        select: function (start, end, jsEvent) {
                            endtime = $.fullCalendar.moment(end).format('h:mm');
                            starttime = $.fullCalendar.moment(start).format('dddd, MMMM Do YYYY, h:mm');
                            var mywhen = starttime + ' - ' + endtime;
                            start = moment(start).format('YYYY-MM-D HH:mm:ss');
                            end = moment(end).format('YYYY-MM-D HH:mm:ss');
                            $('#createEventModal #startTime').val(start);
                            $('#startTime').val(start);
                            $('#endTime').val(end);
                            $('#createEventModal #endTime').val(end);
                            $('#createEventModal #when').text(mywhen);
                            $('#createEventModal').modal('toggle');
                        },
                        eventDrop: function (event, delta) {
                            $.ajax({
                                url: '<?php echo base_url(); ?>index.php/directeur_etudes/emplois_du_temps',
                                data: 'action=update&title=' + event.title + '&start=' + moment(event.start).format() + '&end=' + moment(event.end).format() + '&id=' + event.id,
                                type: "POST",
                                success: function (json) {
                                    //alert(json);
                                }
                            });
                        },
                        eventResize: function (event) {
                            $.ajax({
                                url: '<?php echo base_url(); ?>index.php/directeur_etudes/emplois_du_temps',
                                data: 'action=update&title=' + event.title + '&start=' + moment(event.start).format() + '&end=' + moment(event.end).format() + '&id=' + event.id,
                                type: "POST",
                                success: function (json) {
                                    //alert(json);
                                }
                            });
                        },
                        eventRender: function (event, element)
                        {
                             element.find('.fc-title').append(" " + event.titre +" " + event.local + "<br/>" + event.matriculeEmploye+"  Type:"+ event.type);

                        }

                    });
                    var view = $('#calendar').fullCalendar('getView');

                    //var currentDate = $('#calendar').fullCalendar('getDate');
                    //var beginOfWeek = currentDate.startOf('week');
                    //var endOfWeek = currentDate.endOf('week');
                    var st = $.fullCalendar.moment(view.start).format('YYYY-MM-DD');
                    var ed = $.fullCalendar.moment(view.end).format('YYYY-MM-DD');

                    $('#submitButton').on('click', function (e) {
                        // We don't want this to act as a link so cancel the link action
                        e.preventDefault();
                        doSubmit();
                         setTimeout(function(){
                             showUser(1);
                        },1000);
                    });

                    $('#deleteButton').on('click', function (e) {
                        // We don't want this to act as a link so cancel the link action
                        e.preventDefault();
                        doDelete();
                    });

                    function doDelete() {
                        $("#calendarModal").modal('hide');
                        var eventID = $('#eventID').val();
                        var rd = $("input[name='g2']:checked").val();
                        var type = $('#type').val();
                         var typecm = $('#typecm').val();
                          var typecmD = $('#typecmD').val();
                        var prof = $('#prof').val();
                        var local = $('#local2').val();
                        var typeS = $('#typeS').val();
                        var eventIDG = $('#eventIDG').val();
                        var title = $('#titleM').val();
                        var start = $('#startTimeM').val();
                        var end = $('#endTimeM').val();
                        
                        var eventID_D = $('#eventID_D').val();
                        var profD = $('#profD').val();
                        var localD = $('#local3').val();
                        var typeD = $('#typeD').val();
                        var eventIDG_D = $('#eventIDG_D').val();
                        var titleD = $('#titleD').val();
                        var startD = $('#startTimeD').val();
                        var endD = $('#endTimeD').val();


                        $.ajax({
                            url: '<?php echo base_url(); ?>index.php/directeur_etudes/emplois_du_temps',
                           data: 'action=delete&id=' + eventID +' &id_D=' + eventID_D + '&rd=' + rd + '&type=' + type + '&prof=' + prof +'&profD=' + profD + '&local=' + local + '&localD=' + localD + '&eventIDG_D=' + eventIDG_D +'&type1=' + typeS +'&typeD=' + typeD + '&eventIDG=' + eventIDG + '&title=' + title +'&titleD=' + titleD +'&start=' + start + '&end=' + end+'&startD=' + startD + '&endD=' + endD+ '&typecm=' + typecm+'&typecmD=' + typecmD,
                            type: "POST",
                            success: function (json) {
                                if (json == 1)
                                    $("#calendar").fullCalendar('removeEvents', eventID);
                                else
                                    return false;


                            }
                        });
                    }



                    function doSubmit() {
                        $("#createEventModal").modal('hide');
                       /* var chekb = "";
                        $(":checkbox").each(function () {
                            var ischecked = $(this).is(":checked");
                            if (ischecked) {
                                chekb = $('#chek').val();
                            }
                        });*/
                        var title = $('#title').val();
                        var local = $('#local').val();
                        var dfin = $('#dfin').val();
                                       var chekb = "";
                        if( $('#chek').prop('checked') ){
    chekb = $('#chek').val(); //alert(chekb);
} else {
    chekb="0"; //alert(chekb);
}
                     
                      var chk1 = "";
                        if( $('#chk1').prop('checked') ){
    chk1=$('#chk1').val(); //alert(chk1);
} else {
    chk1="0";// alert(chk1);
}

                        var matriculeEmploye = $('#matriculeEmploye').val();
                        var employe = $('#txt1').val();
                        var idProgramme = $('#idProgramme').val();
                        var semestre = $('#semestre').val();
                        var idGroupe = $('#groupe_dropdown').val();
                        var matriculeEmploye = $('#employe_dropdown').val();

                        var startTime = $('#startTime').val();
                        var endTime = $('#endTime').val();
                        var typec = $('#typec').val();


                        $.ajax({
                            url: '<?php echo base_url(); ?>index.php/directeur_etudes/emplois_du_temps',
                            data: 'action=add&title=' + title + '&start=' + startTime + '&end=' + endTime + '&local=' + local + '&idProgramme=' + idProgramme + '&semestre=' + semestre + '&idGroupe=' + idGroupe + '&matriculeEmploye=' + matriculeEmploye + '&chekb=' + chekb + '&dfin=' + dfin + '&employe=' + employe + '&chk1=' + chk1 + '&typec=' + typec,
                            type: "POST",
                            success: function (json) {
                                $("#calendar").fullCalendar('renderEvent',
                                        {
                                            id: json.id,
                                            title: title,
                                            start: startTime,
                                            end: endTime,
                                            local: local,
                                            idProgramme: idProgramme,
                                            semestre: semestre,
                                            idGroupe: idGroupe,
                                            matriculeEmploye: matriculeEmploye,
                                            chekb: chekb,
                                            dfin: dfin,
                                            employe: employe,
                                            chk1: chk1,
                                            typec: typec
                                        },
                                        true);
                            }
                        });

                    }
                    // build the language selector's options
                    $.each($.fullCalendar.langs, function (langCode) {
                        $('#lang-selector').append(
                                $('<option/>')
                                .attr('value', langCode)
                                .prop('selected', langCode == initialLangCode)
                                .text(langCode)
                                );
                    });

                    // when the selected option changes, dynamically change the calendar option
                    $('#lang-selector').on('change', function () {
                        if (this.value) {
                            $('#calendar').fullCalendar('option', 'lang', this.value);
                        }
                    });
                });

            </script>

            <style type="text/css">
                .block a:hover{
                    color: silver;
                }
                .block a{
                    color: #fff;
                }
                .block {
                    position: fixed;
                    background: #2184cd;
                    padding: 20px;
                    z-index: 1;
                    top: 240px;
                }
            </style>

            <div>



                <!-- Place this tag where you want the badge to render. -->

                <style type="text/css">
                    .block a:hover{
                        color: silver;
                    }
                    .block a{
                        color: #fff;
                    }
                    .block {
                        position: fixed;
                        background: #2184cd;
                        padding: 20px;
                        z-index: 1;
                        top: 240px;
                    }
                </style>

                <div>



                    <!-- Place this tag where you want the badge to render. -->







                    <!-- add calander in this div -->
                    <div class="container">
                        <script type="text/javascript">
                            function printPage() {

                                window.print();
                            }
                            /*
                             background color change
                             */
                            $(document).ready(function () {

                                $(".cal").keyup(function ()
                                {

                                    var background = $("#background").val();


                                    $(".fc-border-separate").css("background-color", background);
                                });



                            });</script>





                        <!-- add calander in this div -->
                        <div class="container">
                            <script type="text/javascript">
                                function printPage() {

                                    window.print();
                                }
                                /*
                                 background color change
                                 */
                                $(document).ready(function () {

                                    $(".cal").keyup(function ()
                                    {

                                        var background = $("#background").val();


                                        $(".fc-border-separate").css("background-color", background);
                                    });



                                });</script>
                            <div id="top">
                                <table border="0"><tr><td>

                                            Language:
                                            <select id="lang-selector"><option value="en">en</option><option value="ar-ma">ar-ma</option><option value="ar-sa">ar-sa</option><option value="ar-tn">ar-tn</option><option value="ar">ar</option><option value="bg">bg</option><option value="ca">ca</option><option value="cs">cs</option><option value="da">da</option><option value="de-at">de-at</option><option value="de">de</option><option value="el">el</option><option value="en-au">en-au</option><option value="en-ca">en-ca</option><option value="en-gb">en-gb</option><option value="en-ie">en-ie</option><option value="en-nz">en-nz</option><option value="es">es</option><option value="eu">eu</option><option value="fa">fa</option><option value="fi">fi</option><option value="fr-ca">fr-ca</option><option value="fr-ch">fr-ch</option><option value="fr">fr</option><option value="gl">gl</option><option value="he">he</option><option value="hi">hi</option><option value="hr">hr</option><option value="hu">hu</option><option value="id">id</option><option value="is">is</option><option value="it">it</option><option value="ja">ja</option><option value="ko">ko</option><option value="lb">lb</option><option value="lt">lt</option><option value="lv">lv</option><option value="nb">nb</option><option value="nl">nl</option><option value="nn">nn</option><option value="pl">pl</option><option value="pt-br">pt-br</option><option value="pt">pt</option><option value="ro">ro</option><option value="ru">ru</option><option value="sk">sk</option><option value="sl">sl</option><option value="sr-cyrl">sr-cyrl</option><option value="sr">sr</option><option value="sv">sv</option><option value="th">th</option><option value="tr">tr</option><option value="uk">uk</option><option value="vi">vi</option><option value="zh-cn">zh-cn</option><option value="zh-tw">zh-tw</option></select>



<!--<span id="infomodule_element_loader"></span>-->


                                            </div>
                                            <div class="panel panel-primary">
                                                <div class="panel-heading">Calandrier par:  <input type="radio" checked id="users" name="users" value="1" onclick=(showUser(this.value)) />Classe
                                                    <input type="radio" id="users" name="users" value="2" onclick=(showUser(this.value)) />Enseignant
                                                    <input type="radio" id="users" name="users" value="3" onclick=(showUser(this.value)) />Salle <!--<input type='checkbox' value='0'  onclick=(cacher(this.value)) id='checkboxC'  /> Changer format  --> <button style="margin-left:780px"  color="red" class="glyphicon glyphicon-print" onclick="print1()"></button><span></div>
                                                <div   class="panel-body">
                                                    <table width="100%"><tr><td>
                                                                <div class="panel panel-primary">
                                                                    <div class="panel-heading">Classe:</div>
                                                                    <div class="panel-body"> <?php echo form_label("Année :"); ?>
                                                                        <select   id="date"   name="date">

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
                                                                        <?php echo form_label("Semestre :"); ?> 

                                                                        <?php
                                                                        echo ' <select   name="semestre" id="semestre1"> ';
                                                                        for ($i = 1; $i <= 6; $i++) {
                                                                            echo '<option value="' . $i . '"> S' . $i . '</option>';
                                                                        }
                                                                        echo '</select>';
                                                                        ?>

                                                                        <?php echo form_label("Programme :"); ?>  
                                                                        <select   name="idProgramme"  id="idProgramme1" <!--onchange="selectModule(this.options[this.selectedIndex].value)-->"> 
                                                                        <?php
                                                                        if (is_array($programme['idProgramme'])) {


                                                                            for ($i = 0; $i < count($programme['idProgramme']); $i++) {
                                                                                echo '<option value="' . $programme['idProgramme'][$i] . '" >' . $programme['idProgramme'][$i] . '</option>';
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </select>

                                                                </div>
                                                            </div></td><td>
                                                            <div class="panel panel-primary">
                                                                <div class="panel-heading">Enseignant</div>
                                                                <input type="hidden"  id="ens1"/>
                                                                <div class="panel-body">		<select id="employe1" >

                                                                        <?php
                                                                        for ($i = 0; $i < count($employe['matriculeEmploye']); $i++) {
                                                                            echo'<option value="' . $employe['matriculeEmploye'][$i] . '"> <div id="DIV2">' .
                                                                            $employe['prenom'][$i] . ' ' . $employe['nom'][$i] . '</div></option>';
                                                                        }
                                                                        ?>


                                                                    </select>
                                                                </div>
                                                            </div></td><td>
                                                            <div class="panel panel-primary">
                                                                <div class="panel-heading">Salle:</div>
                                                                <div class="panel-body">  <?php
                                                                    echo '<select   name="local" id="local1">';
                                                                    foreach ($local as $loc) {

                                                                        echo'<option value="' . $loc . '" ';


                                                                        echo '>' . $loc . '</option>';
                                                                    }
                                                                    echo'</select>';
                                                                    ?></div>
                                                            </div></td></tr></table>
                                            </div>
                                            <div class="panel-footer"></div>
                                        </div>


                                        <input type="text" class="cal" id="background">

                                        <!--<button onclick="printPage()">Print this page</button>
                                        
                                       
                                       
                                         <div class="row">
                                          <button class="printBtn hidden-print">Print</button>-->

                                        <script type="text/javascript">
                                            $('.printBtn').on('click', function () {
                                                window.print();
                                            });
                                        </script>
                                        <style>
                                            .cal{
                                                margin-left: -53%;
                                                margin-bottom: 9px;
                                            }

                                            @media print {
                                                .fc-header-left, .fc-header-right,
                                                .intercom-launcher-button, .cal, button
                                                { 
                                                    display: none;
                                                }
                                            }

                                            .fc-border-separate{
                                                background: yellowgreen;
                                            }


                                            .fc-event-start {
                                                width: 124px;
                                                height: 107px;
                                                border-radius: 0;
                                                background: #fff;
                                                border: 0;
                                                color: #000;
                                                line-height: 100px;
                                                text-align: center;

                                            }
                                        </style>
                                        <button class="printBtn hidden-print">Print</button>

                                        <script type="text/javascript">
                                            $('.printBtn').on('click', function () {
                                                window.print();
                                            });
                                        </script>
                                        <script>

                                            function showUser(str) {

                                                var view = $('#calendar').fullCalendar('getView');

                                                //var currentDate = $('#calendar').fullCalendar('getDate');
                                                //var beginOfWeek = currentDate.startOf('week');
                                                //var endOfWeek = currentDate.endOf('week');
                                                var st = $.fullCalendar.moment(view.start).format('YYYY-MM-DD');
                                                var ed = $.fullCalendar.moment(view.end).format('YYYY-MM-DD');
                                                var employe1 = $('#employe1').val();
                                                var ens = $('#ens').val();
                                                var idProgramme1 = $('#idProgramme1').val();
                                                var semestre1 = $('#semestre1').val();
                                                var chek1 = $('#users').val();
                                                var local1 = $('#local1').val();
                                                var ens = $('#ens1').val(ens1);
                                                if (str == "1") {
                                                    $("#local").html("<option value='-1'>Choisissez la salle</option>");
                                                    var options =<?php echo json_encode($local); ?>;                                                                          //  echo'<option value="' . $loc . '" ';
                                                    var selectBox = document.getElementById('local');

                                                    for (var i = 0, l = options.length; i < l; i++) {
                                                        var option = options[i];
                                                        selectBox.options.add(new Option(options[i], options[i], option.selected));
                                                    }

                                                    document.getElementById("cours").innerHTML = "<h2>Emplois du temps du  Semestre" + semestre1 + "  Filiere " + idProgramme1 + " </h1>";
                                                    selectModule(type = 1);
                                                } else if (str == "2") {
                                                    //var node=  document.getElementById("ens");
                                                    // var textContent = node.textContent;
                                                    selectModule(type = 2);
                                                    //  var MyDiv1 = document.getElementById('DIV1');
                                                    //  var MyDiv2 = document.getElementById('DIV2');
                                                    //MyDiv2.innerHTML = MyDiv1.innerHTML;
<?php // foreach ($local as $loc) { ?>
//alert(<?php echo json_encode($local); ?>);
                                                    $("#local").html("<option value='-1'>Choisissez la salle</option>");
                                                    var options =<?php echo json_encode($local); ?>;                                                                          //  echo'<option value="' . $loc . '" ';
                                                    var selectBox = document.getElementById('local');

                                                    for (var i = 0, l = options.length; i < l; i++) {
                                                        var option = options[i];
                                                        selectBox.options.add(new Option(options[i], options[i], option.selected));
                                                    }
                                                    //     $("#local").html("<option value='<?php echo $loc; ?>'><?php echo $loc; ?></option>");
                                                    //     $("#local").append($loc);
<?php //  } ?>

                                                    document.getElementById("cours").innerHTML = "<h2>Emplois du temps du  professeur  <div id='DIV2'></div> ";
                                                } else if (str == "3") {
                                                    selectModule(type = 3);
                                                    var local = $("#local1").val();
                                                    $("#local").html("<option value='" + local + "'>" + local + "</option>");

                                                    document.getElementById("cours").innerHTML = "<h2>Emplois du temps de la salle " + local1+" ";

                                                }
                                                /* var val1='semestre' +semestre1+' Filiere' + idProgramme1;
                                                 if(chek1==1){
                                                 $('#cours').val(val1);
                                                 }elseif(chek1==2){
                                                 $('#cours').val('Professeur' +semestre1);
                                                 }elseif(chek1==3){
                                                 $('#cours').val('salle' +local1);
                                                 }*/

                                                if (str == "") {
                                                    document.getElementById("txtHint").innerHTML = "";
                                                    return;
                                                } else {
                                                    if (window.XMLHttpRequest) {
                                                        // code for IE7+, Firefox, Chrome, Opera, Safari
                                                        xmlhttp = new XMLHttpRequest();
                                                    } else {
                                                        // code for IE6, IE5
                                                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                                                    }
                                                    xmlhttp.onreadystatechange = function () {
                                                        if (this.readyState == 4 && this.status == 200) {
                                                            document.getElementById("txtHint").innerHTML = this.responseText;
                                                        }
                                                    };

                                                    var events = "<?php echo base_url(); ?>index.php/directeur_etudes/emplois_du_temps?view=1&idProgramme=" + idProgramme1 + "&semestre=" + semestre1 + "&chek1=" + str + "&local=" + local1 + "&start=" + st + "&end=" + ed + "&employe1=" + employe1 + "";
                                                    $('#startTime1').val(events);
                                                   // $('#calendar').fullCalendar('destroy');
                                                   $('#calendar').fullCalendar('removeEvents');
                                                    $('#calendar').fullCalendar('addEventSource', "<?php echo base_url(); ?>index.php/directeur_etudes/emplois_du_temps?view=1&idProgramme=" + idProgramme1 + "&semestre=" + semestre1 + "&chek1=" + str + "&local=" + local1 + "&start=" + st + "&end=" + ed + "&employe1=" + employe1 + "");
                                                    
                                                    $('#calendar').fullCalendar('render');
//$('#calendar').fullCalendar( 'removeEvents' );
                                                    //  $('#calendar').fullCalendar({ events: "<?php echo base_url(); ?>index.php/scolarite/emplois_du_temps?view=1&idProgramme=<?php // echo $idProgramme;  ?>&semestre=<?php echo $semestre; ?>&chek1="+str+"&local=<?php // echo $local1;  ?>&start="+st+'&end='+ed+'"',    });
                                                    // $('#calendar').fullCalendar('rerenderEvents' );
                                                    // $('#calendar').fullCalendar( 'refetchEvents' );
                                                    xmlhttp.open("GET", events, true);
                                                    xmlhttp.send();
                                                }

                                            }
                                            $('body').on('click', 'button.fc-prev-button', function () {
                                                var l1 = $("input[name='users']:checked").val();
                                                //setTimeout(function() { showUser(l1); }, 100);
                                                //alert(l1);
                                                //showUser(l1);
                                                //alert(showUser(l1));
                                                 var view = $('#calendar').fullCalendar('getView');

                                                //var currentDate = $('#calendar').fullCalendar('getDate');
                                                //var beginOfWeek = currentDate.startOf('week');
                                                //var endOfWeek = currentDate.endOf('week');
                                                var st = $.fullCalendar.moment(view.start).format('YYYY-MM-DD');
                                                var ed = $.fullCalendar.moment(view.end).format('YYYY-MM-DD');
                                                var employe1 = $('#employe1').val();
                                                var ens = $('#ens').val();
                                                var idProgramme1 = $('#idProgramme1').val();
                                                var semestre1 = $('#semestre1').val();
                                                var chek1 = $('#users').val();
                                                var local1 = $('#local1').val();
                                                var ens = $('#ens1').val(ens1);
                                                if (str == "1") {
                                                    $("#local").html("<option value='-1'>Choisissez la salle</option>");
                                                    var options =<?php echo json_encode($local); ?>;                                                                          //  echo'<option value="' . $loc . '" ';
                                                    var selectBox = document.getElementById('local');

                                                    for (var i = 0, l = options.length; i < l; i++) {
                                                        var option = options[i];
                                                        selectBox.options.add(new Option(options[i], options[i], option.selected));
                                                    }

                                                    document.getElementById("cours").innerHTML = "<h1>Emplois du temps du  Semestre" + semestre1 + "  Filiere " + idProgramme1 + "</h1>";
                                                    selectModule(type = 1);
                                                } else if (str == "2") {
                                                    //var node=  document.getElementById("ens");
                                                    // var textContent = node.textContent;
                                                    selectModule(type = 2);
                                                    //  var MyDiv1 = document.getElementById('DIV1');
                                                    //  var MyDiv2 = document.getElementById('DIV2');
                                                    //MyDiv2.innerHTML = MyDiv1.innerHTML;
<?php // foreach ($local as $loc) { ?>
//alert(<?php echo json_encode($local); ?>);
                                                    $("#local").html("<option value='-1'>Choisissez la salle</option>");
                                                    var options =<?php echo json_encode($local); ?>;                                                                          //  echo'<option value="' . $loc . '" ';
                                                    var selectBox = document.getElementById('local');

                                                    for (var i = 0, l = options.length; i < l; i++) {
                                                        var option = options[i];
                                                        selectBox.options.add(new Option(options[i], options[i], option.selected));
                                                    }
                                                    //     $("#local").html("<option value='<?php echo $loc; ?>'><?php echo $loc; ?></option>");
                                                    //     $("#local").append($loc);
<?php //  } ?>

                                                    document.getElementById("cours").innerHTML = "<h1>Emplois du temps du  professeur <div id='DIV2'></div> ";
                                                } else if (str == "3") {
                                                    selectModule(type = 3);
                                                    var local = $("#local1").val();
                                                    $("#local").html("<option value='" + local + "'>" + local + "</option>");

                                                    document.getElementById("cours").innerHTML = "<h1>Emplois du temps de la salle " + local1;

                                                }
                                                /* var val1='semestre' +semestre1+' Filiere' + idProgramme1;
                                                 if(chek1==1){
                                                 $('#cours').val(val1);
                                                 }elseif(chek1==2){
                                                 $('#cours').val('Professeur' +semestre1);
                                                 }elseif(chek1==3){
                                                 $('#cours').val('salle' +local1);
                                                 }*/

                                                if (str == "") {
                                                    document.getElementById("txtHint").innerHTML = "";
                                                    return;
                                                } else {
                                                    if (window.XMLHttpRequest) {
                                                        // code for IE7+, Firefox, Chrome, Opera, Safari
                                                        xmlhttp = new XMLHttpRequest();
                                                    } else {
                                                        // code for IE6, IE5
                                                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                                                    }
                                                    xmlhttp.onreadystatechange = function () {
                                                        if (this.readyState == 4 && this.status == 200) {
                                                            document.getElementById("txtHint").innerHTML = this.responseText;
                                                        }
                                                    };

                                                    var events = "<?php echo base_url(); ?>index.php/directeur_etudes/emplois_du_temps?view=1&idProgramme=" + idProgramme1 + "&semestre=" + semestre1 + "&chek1=" + str + "&local=" + local1 + "&start=" + st + "&end=" + ed + "&employe1=" + employe1 + "";
                                                    $('#startTime1').val(events);
                                                    $('#calendar').fullCalendar('removeEvents');
                                                    $('#calendar').fullCalendar('addEventSource', "<?php echo base_url(); ?>index.php/directeur_etudes/emplois_du_temps?view=1&idProgramme=" + idProgramme1 + "&semestre=" + semestre1 + "&chek1=" + str + "&local=" + local1 + "&start=" + st + "&end=" + ed + "&employe1=" + employe1 + "");
                                                    //  $('#calendar').fullCalendar({ events: "<?php echo base_url(); ?>index.php/scolarite/emplois_du_temps?view=1&idProgramme=<?php // echo $idProgramme;  ?>&semestre=<?php echo $semestre; ?>&chek1="+str+"&local=<?php // echo $local1;  ?>&start="+st+'&end='+ed+'"',    });
                                                    // $('#calendar').fullCalendar('rerenderEvents' );
                                                    // $('#calendar').fullCalendar( 'refetchEvents' );
                                                    xmlhttp.open("GET", events, true);
                                                    xmlhttp.send();
                                                }
                                            });

                                            $('body').on('click', 'button.fc-next-button', function () {
                                                var l1 = $("input[name='users']:checked").val();
                                                //setTimeout(function() { showUser(l1); }, 100);
                                                //alert(l1);
                                                //showUser(l1);
                                                
                                            });
                                            function showChevauch() {
                                                var startTimeM = $('#startTimeM').val();
                                                var endTimeM = $('#endTimeM').val();
                                                var prof = $('#prof').val();
                                                var local2 = $('#local2').val();
                                                var id = $('#eventID').val();


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

                                                var events = "<?php echo base_url(); ?>index.php/directeur_etudes/chevauchement?local2=" + local2 + "&startTimeM=" + startTimeM + "&endTimeM=" + endTimeM + "&prof=" + prof + "&id=" + id + "";

                                                xmlhttp.open("GET", events, true);
                                                xmlhttp.send();
                                            }

                                            function showCHSALLE(str) {

                                                var startTimeM = $('#startTimeM').val();
                                                var endTimeM = $('#endTimeM').val();
                                                var prof = $('#prof').val();
                                                var local2 = $('#local2').val();
                                                document.getElementById("alert").innerHTML = "";

                                                var id = $('#eventID').val();
                                                /* var val1='semestre' +semestre1+' Filiere' + idProgramme1;
                                                 if(chek1==1){
                                                 $('#cours').val(val1);
                                                 }elseif(chek1==2){
                                                 $('#cours').val('Professeur' +semestre1);
                                                 }elseif(chek1==3){
                                                 $('#cours').val('salle' +local1);
                                                 }*/
                                                if (str == "") {
                                                    document.getElementById("alert").innerHTML = "";
                                                    return;
                                                } else {
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
                                                                document.getElementById("alert").innerHTML = "La salle  est ocuppée pendant cette période";
                                                                // alert(this.responseText);
                                                            }
                                                        }
                                                    };

                                                    var events = "<?php echo base_url(); ?>index.php/directeur_etudes/chevauchement?local2=" + str + "&startTimeM=" + startTimeM + "&endTimeM=" + endTimeM + "&prof=" + prof + "&id=" + id + "";

                                                    xmlhttp.open("GET", events, true);
                                                    xmlhttp.send();
                                                }

                                            }
                                            function showEMP(str) {

                                                var startTimeM = $('#startTimeM').val();
                                                var endTimeM = $('#endTimeM').val();
                                                var prof = $('#prof').val();
                                                var local2 = $('#local2').val();
                                                document.getElementById("alert").innerHTML = "";

                                                var id = $('#eventID').val();
                                                /* var val1='semestre' +semestre1+' Filiere' + idProgramme1;
                                                 if(chek1==1){
                                                 $('#cours').val(val1);
                                                 }elseif(chek1==2){
                                                 $('#cours').val('Professeur' +semestre1);
                                                 }elseif(chek1==3){
                                                 $('#cours').val('salle' +local1);
                                                 }*/
                                                if (str == "") {
                                                    document.getElementById("alert").innerHTML = "";
                                                    return;
                                                } else {
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
                                                                document.getElementById("alert").innerHTML = "Le professeur  est ocuppée pendant cette période";
                                                                //alert(this.responseText);
                                                            }
                                                        }
                                                    };

                                                    var events = "<?php echo base_url(); ?>index.php/directeur_etudes/chevauchement2?local2=" + local2 + "&startTimeM=" + startTimeM + "&endTimeM=" + endTimeM + "&prof=" + str + "&id=" + id + "";

                                                    xmlhttp.open("GET", events, true);
                                                    xmlhttp.send();
                                                }

                                            }
                                            function showChevauchA() {
                                                var startTimeM = $('#startTime').val();
                                                var endTimeM = $('#endTime').val();
                                                var prof = $('#employe_dropdown').val();
                                                var local2 = $('#local').val();


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

                                                var events = "<?php echo base_url(); ?>index.php/directeur_etudes/chevauchement?local2=" + local2 + "&startTimeM=" + startTimeM + "&endTimeM=" + endTimeM + "&prof=" + prof + "&id=0";

                                                xmlhttp.open("GET", events, true);
                                                xmlhttp.send();
                                            }

                                            function showCHSALLEA(str) {

                                                var startTimeM = $('#startTime').val();
                                                var endTimeM = $('#endTime').val();
                                                var prof = $('#employe_dropdown').val();
                                                var local2 = $('#local').val();
                                                document.getElementById("alert").innerHTML = "";

                                                var id = $('#eventID').val();
                                                /* var val1='semestre' +semestre1+' Filiere' + idProgramme1;
                                                 if(chek1==1){
                                                 $('#cours').val(val1);
                                                 }elseif(chek1==2){
                                                 $('#cours').val('Professeur' +semestre1);
                                                 }elseif(chek1==3){
                                                 $('#cours').val('salle' +local1);
                                                 }*/
                                                if (str == "") {
                                                    document.getElementById("alert").innerHTML = "";
                                                    return;
                                                } else {
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
                                                                document.getElementById("alert").innerHTML = "La salle  est ocuppée pendant cette période";
                                                                // alert(this.responseText);
                                                            }
                                                        }
                                                    };

                                                    var events = "<?php echo base_url(); ?>index.php/directeur_etudes/chevauchement?local2=" + str + "&startTimeM=" + startTimeM + "&endTimeM=" + endTimeM + "&prof=" + prof + "&id=0";

                                                    xmlhttp.open("GET", events, true);
                                                    xmlhttp.send();
                                                }

                                            }
                                            function showEMPA(str) {

                                                var startTimeM = $('#startTime').val();
                                                var endTimeM = $('#endTime').val();
                                                var prof = $('#employe_dropdown').val();
                                                var local2 = $('#local').val();
                                                document.getElementById("alert").innerHTML = "";

                                                var id = $('#eventID').val();
                                                /* var val1='semestre' +semestre1+' Filiere' + idProgramme1;
                                                 if(chek1==1){
                                                 $('#cours').val(val1);
                                                 }elseif(chek1==2){
                                                 $('#cours').val('Professeur' +semestre1);
                                                 }elseif(chek1==3){
                                                 $('#cours').val('salle' +local1);
                                                 }*/
                                                if (str == "") {
                                                    document.getElementById("alert").innerHTML = "";
                                                    return;
                                                } else {
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
                                                                document.getElementById("alert").innerHTML = "Le professeur  est ocuppée pendant cette période";
                                                                //alert(this.responseText);
                                                            }
                                                        }
                                                    };

                                                    var events = "<?php echo base_url(); ?>index.php/directeur_etudes/chevauchement2?local2=" + local2 + "&startTimeM=" + startTimeM + "&endTimeM=" + endTimeM + "&prof=" + str + "&id=0";

                                                    xmlhttp.open("GET", events, true);
                                                    xmlhttp.send();
                                                }

                                            }
                                            function showEMPAR(str) {

                                                var startTimeM = $('#startTime').val();
                                                var endTimeM = $('#endTime').val();
                                                var prof = $('#txt1').val();
                                                var local2 = $('#local').val();
                                                document.getElementById("alert").innerHTML = "";

                                                //var id = $('#eventID').val();
                                                /* var val1='semestre' +semestre1+' Filiere' + idProgramme1;
                                                 if(chek1==1){
                                                 $('#cours').val(val1);
                                                 }elseif(chek1==2){
                                                 $('#cours').val('Professeur' +semestre1);
                                                 }elseif(chek1==3){
                                                 $('#cours').val('salle' +local1);
                                                 }*/
                                                if (str == "") {
                                                    document.getElementById("alert").innerHTML = "";
                                                    return;
                                                } else {
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
                                                                document.getElementById("alert").innerHTML = "Le professeur  est ocuppée pendant cette période";
                                                                //alert(this.responseText);
                                                            }
                                                        }
                                                    };

                                                    var events = "<?php echo base_url(); ?>index.php/directeur_etudes/chevauchement2?local2=" + local2 + "&startTimeM=" + startTimeM + "&endTimeM=" + endTimeM + "&prof=" + str + "&id=0";

                                                    xmlhttp.open("GET", events, true);
                                                    xmlhttp.send();
                                                }

                                            }


                                        </script>
                                        </head>
                                <body>

                                    <form>

                                    </form>
                                    <br>

                                    <input  type="hidden" id="startTime1"/> <input  type="hidden" id="startTime1"/><input  type="hidden" id="startTime2"/>
                                    <input  type="hidden" value="" name="endTime" type="hidden" id="endTime"/> <input id="startTim"    type="hidden" /><input id="idProgramme" type="hidden" value="<?php //echo $idProgramme;   ?>"/><?php //echo $semestre .'  '.$idProgramme;   ?> 


                                    <div id="target">
                                        <div   id="cours"></div>
                                        <div id="calendar" >

                                        </div> 
                                    </div>

                                    </div>

                                    <!-- Modal -->
                                    <div id="createEventModal" class="modal fade" role="dialog">
                                        <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Ajouter un créneau</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="control-group">
                                                        <label class="control-label" for="inputPatient">Description:</label>
                                                        <div class="field desc">
                                                            <input class="form-control" id="title" name="title" placeholder="Description" type="text" value="  ">
                                                        </div>
                                                    </div>
                                                    <script>
                                                        $(document).ready(function () {
                                                            $("#dfin").toggle();
                                                            $("#chek").change(function () {
                                                                $("#dfin").toggle();
                                                            });
                                                            $("#txt1").toggle();
                                                            $("#chk1").change(function () {
                                                                $("#txt1").toggle();
                                                            });
                                                            $("#divM").toggle();
                                                            $("#chkM").change(function () {
                                                                $("#divM").toggle();
                                                            });
                                                            $("#divS").toggle();
                                                            $("#chkS").change(function () {
                                                                $("#divS").toggle();
                                                            });
                                                            $("#divD").toggle();
                                                            $("#chkD").change(function () {
                                                                $("#divD").toggle();
                                                            });

                                                        });</script>

                                                    <label>Hebdomadaire</label><input   value="1" type="checkbox" id="chek" />
                                                    <div class="row">
                                                        <div class='col-sm-6'>
                                                            <input  placeholder="Date fin" type='text' value="<?php echo $finCours ?>" class="form-control" id='dfin' />
                                                        </div>
                                                        <script type="text/javascript">
                                                            $(function () {
                                                                $('#dfin').datetimepicker({
                                                                    format: 'YYYY-MM-DD HH:mm:ss'
                                                                });
                                                            });
                                                        </script>
                                                    </div>

                                             <!-- <input class="form-control"  placeholder="Date fin" type="text" id="dfin" />-->
                                                    <br>
                                                    <!-- <label class="control-label" for="inputPatient">Date de début: </label>     
                                                     <input class="form-control" name="startTime" type="text" id="startTime"/>
                                                     <label class="control-label" for="inputPatient">Date de fin: </label> 
                                                     <input  class="form-control" name="endTime" type="text" id="endTime"/>-->
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class='col-sm-6'>
                                                                <input type='text' class="form-control" id='startTime' />
                                                            </div>
                                                            <script type="text/javascript">
                                                                $(function () {
                                                                    $('#startTime').datetimepicker({
                                                                        format: 'YYYY-MM-DD HH:mm:ss'
                                                                    });
                                                                });
                                                            </script>
                                                        </div>
                                                        <label class="control-label" for="inputPatient">Date fin:</label>
                                                        <div class="row">
                                                            <div class='col-sm-6'>
                                                                <input type='text' class="form-control" id='endTime' />
                                                            </div>
                                                            <script type="text/javascript">
                                                                $(function () {
                                                                $('#endTime').datetimepicker({
                                                                format: 'YYYY-MM-DD HH:mm:ss'
                                                                });
                                                            </script>
                                                        </div>
                                                    </div>

                                                    <script type="text/javascript">
                                                                function selectState(sigle) {
                                                                var annee = $("#date").val();
                                                                        var semestre = $("#semestre1").val();
                                                                        if (sigle != "-1") {
                                                                loadData('groupe', sigle, annee, semestre);
                                                                        $("#groupe_dropdown").html("<option value='-1'>choisissez l'élement</option>");
                                                                } else {
                                                                $("#groupe_dropdown").html("<option value='-1'>choisissez l'élement</option>");
                                                                        $("#employe_dropdown").html("<option value='-1'>choisissez le groupe</option>");
                                                                }
                                                                }

                                                        function selectCity(idGroupe) {
                                                        if (idGroupe != "-1") {
                                                        var annee = $("#date").val();
                                                                var semestre = $("#semestre1").val();
                                                                var idProgramme = $("#idProgramme1").val();
                                                                var matriculeEmploye = $("#employe1").val();
                                                                loadData('employe', idGroupe, annee, semestre, type, matriculeEmploye);
                                                                $("#employe_dropdown").html("<option value='-1'>choisissez le professeur</option>");
                                                                ;
                                                        } else {
                                                        $("#employe_dropdown").html("<option value='-1'>choisissez le professeur</option>"); ;
                                                        }
                                                        }
                                                        function selectModule(type) {
                                                        var annee = $("#date").val();
                                                                var semestre = $("#semestre1").val();
                                                                var idProgramme = $("#idProgramme1").val();
                                                                var matriculeEmploye = $("#employe1").val();
                                                                if (idProgramme != "-1") {
                                                        loadData('infomodule_element', idProgramme, annee, semestre, type, matriculeEmploye);
                                                        } else {
                                                        $("#groupe_dropdown").html("<option value='-1'>choisissez l'élement</option>");
                                                                $("#employe_dropdown").html("<option value='-1'>choisissez le groupe</option>");
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
                                                                                
                                                                                $("#eventIDG").html("<option value='-1'>Select " + loadType + "</option>");
                                                                                $("#eventIDG").append(result);
                                                                        }
                                                                });
                                                        }
                                                    </script>
                                                    </head>
                                                    <body>
                                                        <div id="wrapper">
                                                            <div class="wrap_box">

<?php ?>
                                                                <table>
                                                                    <tr>
                                                                        <td>
                                                                            <select class="form-control" id="infomodule_element_dropdown" onchange="selectState(this.options[this.selectedIndex].value)">
                                                                                <option value="-1">choisissez l'element</option>
                                                                            </select>
                                                                            <span id="groupe_loader"></span>
                                                                        </td>

                                                                        <td>
                                                                            <select class="form-control" id="groupe_dropdown" onchange="selectCity(this.options[this.selectedIndex].value)">
                                                                                <option value="-1">choisissez le groupe</option>
                                                                            </select>
                                                                            <span id="employe_loader"></span>
                                                                        </td>

                                                                        <td>
                                                                            <select class="form-control" id="employe_dropdown" onchange=(showEMPA(this.value))>
                                                                                <option value="-1">choisissez le professuer</option>
                                                                            </select>

                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <label>Remplacer</label><input value="1" type="checkbox" id="chk1"  />


                                                                        </td>
                                                                    </tr>
                                                                    <?php
                                                                    if (count($employe['matriculeEmploye']) > 0) {
                                                                        ?>
                                                                        <tr>
                                                                            <td>
                                                                                <select class="form-control" id="txt1" onchange="showEMPAR(this.value)" >
                                                                                    <option value="-1">choisissez le professeur</option>
                                                                                    <?php
                                                                                    for ($i = 0; $i < count($employe['matriculeEmploye']); $i++) {
                                                                                        echo'<option value="' . $employe['matriculeEmploye'][$i] . '">' .
                                                                                        $employe['prenom'][$i] . ' ' . $employe['nom'][$i] . '</option>';
                                                                                    }
                                                                                }
                                                                                ?>


                                                                            </select>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                                <?php
                                                                echo '<select class="form-control" name="local" id="local" onchange="showCHSALLEA(this.value)">';
                                                                foreach ($local as $loc) {

                                                                    echo'<option value="' . $loc . '" ';


                                                                    echo '>' . $loc . '</option>';
                                                                }
                                                                echo'</select>';
                                                                ?>
                                                                <span id="alert" style="color:red;"></span>
                                                                <select class="form-control" id="typec" name="type">
                                                                    <option value="">..........Type...........</option>   
                                                                    <option value="CM">CM</option> 
                                                                    <option value="TD">TD</option> 
                                                                    <option value="TD">TP</option> 
                                                                    <option value="Autres">Autres</option> 
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label" for="when">En:</label>
                                                            <div class="controls controls-row" id="when" style="margin-top:5px;">
                                                            </div>
                                                        </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn" data-dismiss="modal" aria-hidden="true">Annuler</button>
                                                    <button type="submit" class="btn btn-primary" id="submitButton">Enregistrer</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>


                                    <div id="calendarModal" class="modal fade">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Modification ou supression</h4>
                                                </div>
                                                <div id="modalBody" class="modal-body">
                                                    <h4 id="modalTitle" class="modal-title"></h4>
                                                    <div id="modalWhen" style="margin-top:5px;"></div>
                                                </div>
                                                <input type="checkbox" value="1" name="g2" id="chkM" /> <label>Modification</label>
                                                <input type="checkbox" value="2" name="g2" id="chkS" /> <label>Supression</label>
                                                <input type="checkbox" value="3" name="g2" id="chkD" /> <label>Duplication</label>
                                               
                                                <div id="divM">
                                                    <label class="control-label" for="inputPatient">Description:</label>
                                                    <input  class="form-control" type="text" id="titleM"/>
                                                    <label class="control-label" for="inputPatient">Modification de:</label>
                                                    <select class="form-control" id="type" name="type"> 
                                                        <option value="2">Tous les événements ultérieurs </option>
                                                        <option value="1">Uniquement cet événement</option> 
                                                        <option value="3">Tous les événements de la serie</option>
                                                    </select>
                                                    <label class="control-label" for="inputPatient">Date debut:</label>
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class='col-sm-6'>
                                                                <input type='text' class="form-control" id='startTimeM' />
                                                            </div>
                                                            <script type="text/javascript">
                                                                        $(function () {
                                                                        $('#startTimeM').datetimepicker({
                                                                        format: 'YYYY-MM-DD HH:mm:ss'
                                                                        });
                                                                        });
                                                                        $('#startTimeM').on('change', function(){
                                                                var input = $(this);
                                                                        //do your ajax call here
                                                                        showChevauch();
                                                                        input.next('span.info').html(input.val());
                                                                });
                                                                        $('#startTime').on('change', function(){
                                                                var input = $(this);
                                                                        //do your ajax call here
                                                                        showChevauchA();
                                                                        input.next('span.info').html(input.val());
                                                                });
                                                            </script>
                                                        </div>
                                                        <label class="control-label" for="inputPatient">Date fin:</label>
                                                        <div class="row">
                                                            <div class='col-sm-6'>
                                                                <input type='text' class="form-control" id='endTimeM' />
                                                            </div>
                                                            <script type="text/javascript">
                                                                        $(function () {
                                                                        $('#endTimeM').datetimepicker({
                                                                        format: 'YYYY-MM-DD HH:mm:ss'
                                                                        });
                                                                        });
                                                                        $('#endTimeM').on('change', function(){
                                                                var input = $(this);
                                                                        //do your ajax call here
                                                                        showChevauch();
                                                                        input.next('span.info').html(input.val());
                                                                });
                                                                        $('#endTime').on('change', function(){
                                                                var input = $(this);
                                                                        //do your ajax call here
                                                                        showChevauchA();
                                                                        input.next('span.info').html(input.val());
                                                                });
                                                            </script>
                                                        </div>
                                                    </div>
                                                                                             <!--               <input class="form-control" name="startTimeM" type="text" id="startTimeM"/>-->

  <!--<input  class="form-control" name="endTimeM" type="text" id="endTimeM"/>-->
                                                    <input type="hidden" id="eventID"/>
                                                    <input type="hidden" id="eventIDG"/>
                                                    <label class="control-label" for="inputPatient">Enseignant:</label>
                                                    <?php
                                                    echo"<script>$('#prof').val()</script>";
                                                    if (count($employe['matriculeEmploye']) > 0) {
                                                        ?>

                                                        <select onchange=(showEMP(this.value)) class="form-control" id="prof" >
                                                            <?php
                                                            for ($i = 0; $i < count($employe['matriculeEmploye']); $i++) {
                                                                echo'<option value="' . $employe['matriculeEmploye'][$i] . '">' .
                                                                $employe['prenom'][$i] . ' ' . $employe['nom'][$i] . ' </option>';
                                                            }
                                                        }
                                                        ?>


                                                    </select>
                                                    <label class="control-label" for="inputPatient">Salle:</label>

                                                    <?php
                                                    echo '<select onchange="showCHSALLE(this.value)" class="form-control" name="local" id="local2">';
                                                    foreach ($local as $loc) {

                                                        echo'<option value="' . $loc . '" ';


                                                        echo '>' . $loc . '</option>';
                                                    }
                                                    echo'</select>';
                                                    ?><span id="alert" style="color:red;"></span>
                                                    <label class="control-label" for="inputPatient">Type:</label>
                                                    <select class="form-control" name="type" id="typecm">
                                                        <option value="">..........Type...........</option>   
                                                        <option value="CM">CM</option> 
                                                        <option value="TD">TD</option> 
                                                        <option value="TD">TP</option> 
                                                        <option value="Autres">Autres</option> 
                                                    </select></div>
                                                                 <div id="divD">
                                                    <label class="control-label" for="inputPatient">Description:</label>
                                                    <input   class="form-control" type="text" id="titleD"/>
                                                       <label class="control-label" for="inputPatient">Duplication de:</label>
                                                    <select class="form-control" id="typeD" name="type"> 
                                                        <option value="2">Tous les événements ultérieurs </option> 
                                                        <option value="1">Uniquement cet événement</option>
                                                        <option value="3">Tous les événements de la serie</option>
                                                    </select>
                                                    <label class="control-label" for="inputPatient">Date debut:</label>
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class='col-sm-6'>
                                                                <input type='text' class="form-control" id='startTimeD' />
                                                            </div>
                                                            <script type="text/javascript">
                                                                        $(function () {
                                                                        $('#startTimeD').datetimepicker({
                                                                        format: 'YYYY-MM-DD HH:mm:ss'
                                                                        });
                                                                        });
                                                                        $('#startTimeD').on('change', function(){
                                                                var input = $(this);
                                                                        //do your ajax call here
                                                                        showChevauch();
                                                                        input.next('span.info').html(input.val());
                                                                });
                                                                        $('#startTime').on('change', function(){
                                                                var input = $(this);
                                                                        //do your ajax call here
                                                                        showChevauchA();
                                                                        input.next('span.info').html(input.val());
                                                                });
                                                            </script>
                                                        </div>
                                                        <label class="control-label" for="inputPatient">Date fin:</label>
                                                        <div class="row">
                                                            <div class='col-sm-6'>
                                                                <input type='text' class="form-control" id='endTimeD' />
                                                            </div>
                                                            <script type="text/javascript">
                                                                        $(function () {
                                                                        $('#endTimeD').datetimepicker({
                                                                        format: 'YYYY-MM-DD HH:mm:ss'
                                                                        });
                                                                        });
                                                                        $('#endTimeD').on('change', function(){
                                                                var input = $(this);
                                                                        //do your ajax call here
                                                                        showChevauch();
                                                                        input.next('span.info').html(input.val());
                                                                });
                                                                        $('#endTime').on('change', function(){
                                                                var input = $(this);
                                                                        //do your ajax call here
                                                                        showChevauchA();
                                                                        input.next('span.info').html(input.val());
                                                                });
                                                            </script>
                                                        </div>
                                                    </div>
                                                                                             <!--               <input class="form-control" name="startTimeM" type="text" id="startTimeM"/>-->

  <!--<input  class="form-control" name="endTimeM" type="text" id="endTimeM"/>-->
                                                    <input type="hidden" id="eventID_D"/>
                                                    <input type="hidden" id="eventIDG_D"/>
                                                    <label class="control-label" for="inputPatient">Enseignant:</label>
                                                    <?php
                                                    echo"<script>$('#profD').val()</script>";
                                                    if (count($employe['matriculeEmploye']) > 0) {
                                                        ?>

                                                        <select onchange=(showEMP(this.value)) class="form-control" id="profD" >
                                                            <?php
                                                            for ($i = 0; $i < count($employe['matriculeEmploye']); $i++) {
                                                                echo'<option value="' . $employe['matriculeEmploye'][$i] . '">' .
                                                                $employe['prenom'][$i] . ' ' . $employe['nom'][$i] . ' </option>';
                                                            }
                                                        }
                                                        ?>


                                                    </select>
                                                    <label class="control-label" for="inputPatient">Salle:</label>

                                                    <?php
                                                    echo '<select onchange="showCHSALLE(this.value)" class="form-control" name="local" id="local3">';
                                                    foreach ($local as $loc) {

                                                        echo'<option value="' . $loc . '" ';


                                                        echo '>' . $loc . '</option>';
                                                    }
                                                    echo'</select>';
                                                    ?><span id="alert" style="color:red;"></span>
                                                    <label class="control-label" for="inputPatient">Type:</label>
                                                    <select class="form-control" name="type" id="typecmD">
                                                        <option value="">..........Type...........</option>   
                                                        <option value="CM">CM</option> 
                                                        <option value="TD">TD</option> 
                                                        <option value="TD">TP</option> 
                                                        <option value="Autres">Autres</option> 
                                                    </select></div>
                                                <div id="divS">
                                                    <label class="control-label" for="inputPatient">Supression de:</label>
                                                    <select class="form-control" name="type" id="typeS"> 
                                                        
                                                        <option value="3">Tous les événements de la serie</option>
                                                        <option value="2">Tous les événements ultérieurs </option> 
                                                        <option value="1">Uniquement cet événement</option> 
                                                    </select>
                                                </div>
                                        <!--       <label>Evenement suivant</label> <input  name="g1" value="1" type="radio" id="prec"/>
                                               <label>Tous les évenement </label><input name="g1" value="2" type="radio" id="next"/>
                                               <label>Supprimer l'evenement</label><input name="g1" value="3" type="radio" id="del"/>-->
                                                <div class="modal-footer">
                                                    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                                                    <button type="submit" class="btn btn-danger" id="deleteButton">Appliquer</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Modal-->


                                    <div style='margin-left: auto;margin-right: auto;text-align: center;'>
                                    </div>
                                    <script>
                                                (function (i, s, o, g, r, a, m) {
                                                i['GoogleAnalyticsObject'] = r; i[r] = i[r] || function () {
                                                (i[r].q = i[r].q || []).push(arguments)}, i[r].l = 1 * new Date();
                                                        a = s.createElement(o),
                                                        m = s.getElementsByTagName(o)[0];
                                                        a.async = 1;
                                                        a.src = g;
                                                        m.parentNode.insertBefore(a, m)
                                                })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
                                                ga('create', 'UA-21769945-4', 'auto');
                                                ga('send', 'pageview');

                                    </script>

                                </body>
                                </html>

                                </head>
                                <body>
