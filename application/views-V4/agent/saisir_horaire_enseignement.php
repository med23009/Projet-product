<?php
include(APPPATH.'views/include/header.php');
include('include/menu.php');
?>
<script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap-datetimepicker.min.js"></script>

<div class="container">
    <div class="col-xs-12 hl-left">
        <?php

		$attributes = array('class' => 'niceform', 'name' => 'choixType','id'=>'choixType');
       $for=array('id'=>'for');
			echo form_open('agent/saisir_horaire_module',$for);
	
        print ('<h2>' . 'Saisir horaire' . '</h2>');	//    
        
       
        ?>

        
        <table ALIGN="center-" width="100%" class="form-" border="0">
            <tr>
                <td>Saisi uniquement l'absence  des etudiants</td>
                <td><?php 
                $input=array('type'=>'checkbox','id'=>'absenceEtud','name'=>'absenceEtud','value'=>'absenceEtud','onclick'=>"showInput_absence()");
               echo form_input($input);
                // echo form_checkbox('absenceEtud','absenceEtud')  ?></td>
                
            </tr>
            
            <tr class='absenceUnique'>  <td> 
                        <?php echo form_label('Departéments :');?>
                    </td>
                     <td>
                         <select id ="dept" onchange="f5(this)" class="form-control" name="choixDepartement">
             <?php  

                        if(is_array($departements))
                        {
                            for($i=0;$i<count($departements['nomDep']);$i++)
                            {
                                echo'<option value="' . $departements['idDepartement'][$i] .
                                        '">' . $departements['nomDep'][$i] . '</option>';
                            }
                          
                            }?> </select></td></tr>
             <tr>                  
                    <td>
                    <?php echo form_label('Date :');?>
                </td>
                <script>
                    $('#matricule').attr('size', $('#matricule').lenght);
	$(function() {
		$( "#date" ).datepicker({
			showOtherMonths: true,
			selectOtherMonths: true
		});
	});     
                                                        $('#autreElement').on('change', function(){
                                                                var input = $(this);
                                                                        //do your ajax call here
                                                                      // alert("hhhhhh");
                                                                        f2();
                                                                        input.next('span.info').html(input.val());
                                                                });
	
         </script>
                 <td>
                     <script type="text/javascript">
                                                        /*   $(function () {
                                                                $('#date1').datetimepicker({
                                                                    format: 'YYYY-MM-DD'
                                                                });
                                                            });*/
                                                        </script>
                    <?php
                    $input = array('class' => 'form-control','type' => 'date', 'id' => 'date1', 'name' => 'date');
                    echo form_input($input,'','required');
                    ?>
                </td>

          
                </tr>  

                <tr class='absenceUnique'>
                    
                    <td>
                    <?php echo form_label('Heure début :');?>
                </td>
                
                <td>
                    <select class= 'form-control' name="heureD" id="heureD">
                        <option value="08">08h00</option>
                        <option value="08.15">08h15</option>
                        <option value="09">09h00</option>
                         <option value="09.15">09h15</option>
                        <option value="10">10h00</option>
                        <option value="10.15">10h15</option>
                        <option value="11">11h00</option>
                        <option value="11.15">11h15</option>
                        <option value="12">12h00</option>
                         <option value="12.15">12h15</option>
                        <option value="13">13h00</option>
                        <option value="13.15">13h15</option>
                        <option value="14">14h00</option>
                        <option value="14.15">14h15</option>
                        <option value="15">15h00</option>
                        <option value="15.15">15h15</option>
                        <option value="16">16h00</option>
                        <option value="16.15">16h15</option>
                         <option value="17">17h00</option>
                         <option value="17.15">17h15</option>
                         <option value="18">18h00</option>
                         <option value="18.15">18h15</option>
                         <option value="19">19h00</option>
                         <option value="19.15">19h15</option>
                    </select>
                </td>
                
                </tr>
            <tr class='absenceUnique'>
                <td> <?php echo form_label('Enseignant :');?></td>
                <td> <select class="form-control"  name="matriculeEmploye" id="employe"   onchange="f6(this)">
                        <option></option>
                    </select></td>
            </tr>
            
          <tr>
                    <td> 
                        <?php //echo form_label('Enseignant :');?>
                    </td>
                     <td>
                        
                   <?php //echo form_label($matriculeEmploye." : ".$nomEmploye);?>
                     </td>
                     <td rowspan="8" VALIGN="top"> 
                         <select style="height:400px"  name="matricule[]" id="matricule" multiple>
  
                       </select>
                     </td>

                </tr>
                
            
               
                <tr>
                    <td width='400px'> 
                        <?php echo form_label('Durée :');?>
                    </td>
                     <td width='400px'>
                    <select class= 'form-control' name="duree" id="duree">
                         <option value="2">2h</option>
                        <option value="1">1h</option>
                        <option value="1.5">1h30</option>
                        <option value="3">3h</option>
                       <option value="4">4h</option>
                    </select>
                </td>
                    
                </tr>
                
                <tr class='absenceUnique'>
                    <td> 
                        <?php echo form_label('Type :');?>
                    </td>
                     <td>
                          
                    <select class= 'form-control' name="type" id="type">
                        <option value="cours">CM</option>
                        <option value="td">TD</option>
                        <option value="tp">TP</option>
                      
                    </select>
                          <span id="alert" style="color:red;"></span>
                </td>

                </tr>
              
                <tr class='absenceUnique'>
                      <td> 
                        <?php echo form_label('Elément :');?>
                    </td>   
                    <td>
                        <select class = 'form-control' name="sigle" id="sigle"   onchange="f1(this);" required="required">
                        <option></option>
                        <?php 
                       for($i=0; $i<count($modules); $i++)
                       {
                   ?>        
                        <option value="<?php echo $modules[$i]['sigle'];?>"><?php echo $modules[$i]['sigle']." : ".$modules[$i]['titre'];?></option>   
                      <?php }
                       ?>
                      
                    </select>
                    </td>
                </tr>
               
                 <tr>
                     <td class="absenceUnique"> 
                        <?php echo form_label('Autre élément ne figurant pas dans la liste :');?>
                    </td>   
                    <td class="absenceMotive"> 
                        <?php echo form_label('Liste des matiers :');?>
                    </td>   
                    <td>
                  <?php $input = array( 'class' =>'form-control','type' => 'text', 'autocomplete'=>'off', 'list'=>'liste1', 'id' => 'autreElement', 'name' => 'autreElement');
                    echo form_input($input,''); ?>
                   
<datalist   id='liste1' >
    <?php 
    
    for($i=0; $i<count($allModules); $i++)
    {
        echo "<option value='".$allModules[$i]['sigle']."'>";
    }
    ?>
 
</datalist>
                        <button id="bt" onclick="f4()">Voire Groupes</button>
                        
                    
                    </td>
                </tr>
                 <tr>
                      <td> 
                        <?php echo form_label('Groupe :');?>
                    </td>   
                    <td>
                        <select class = 'form-control oblig' name="groupe" id="groupe" required=""  onchange="f3(this);">
                        <option></option>
                    </select>
                    </td>
                </tr>
                
                <tr>
                    
                      <td> 
                        <?php echo form_label('Salle :');?>
                    </td>   
                    <td>
                    <select class= 'form-control' name="idLocal" id="idLocal" required>
                        <option></option>
                        <?php 
                       for($i=0; $i<count($locaux); $i++)
                       {
                   ?>        
                        <option value="<?php echo $locaux[$i]['idLocal'];?>"><?php echo $locaux[$i]['idLocal'];?></option>   
                      <?php }
                       ?>
                      
                    </select>
                    </td>
                </tr>
                
                <tr class='absenceUnique'>
                    <td > 
                        <?php echo form_label('Résumé du cours  :');?>
                    </td>
                     <td>
                         <textarea class="form-control"  name="commentaire" placeholder="Résumé du cours..." ></textarea>
                  
                    
                </td>
            
                </tr>
                <tr class='absenceMotive'>
                    <td > 
                        <?php echo form_label('Motive  :');?>
                    </td>
                     <td>
                         <textarea class="form-control"  name="motive" placeholder="Motive..." ></textarea>
                  
                    
                </td>
            
                </tr>
                

            <tr>  
                <td></td>
                <td class="submit">
                         <?php $pw = array('type' => 'submit', 'name' => 'button', 'id'=>'button', 'value'=>'Enregistrer','onclick'=>"f2()"); 
                             echo form_input($pw);?>
            </td>
            
            </tr>
        </table>

        <?php
        echo form_fieldset_close();

             ///    echo form_hidden('anneeC', $anneeC);
              //  echo form_hidden('semestreC', $semestreC);
              //  echo form_hidden('matriculeEmploye', $matriculeEmploye);
              //  echo form_hidden('nomEmploye', $nomEmploye);
        echo form_close('</div>');
        ?>
    </div>
    
    <script>
        $('.absenceMotive').hide();
        
        function showInput_absence(){
//            $('#dept').toggle();
//            $('#employe').toggle();
//            $('#heureD').toggle();
//            $('#type').toggle();
        $('.absenceMotive').toggle();
           
        $('.absenceUnique').toggle();
//           if($('.absenceUnique').show()){
//               alert('show');
//               
//           }else
//               alert('hide');
//        }
    }
        function f1(str)
{
   // document.getElementById('default').selected = 'selected';

if(document.getElementById('sigle').options[0].selected)
  document.getElementById('autreElement').disabled = false;
 //$('#bt').prop('disabled', false);

  else
  { document.getElementById('autreElement').disabled = true;  
  //  $('#bt').prop('disabled', true);
      document.getElementById('autreElement').value = '';  
  }
        

                                         
                                       
                                          var sigle = str.value;
                                                if (sigle == "") {
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
                                                            //document.getElementById("txtHint").innerHTML = this.responseText;
                                                              var myObj = JSON.parse(this.responseText);
                                                            //alert(myObj);
                                                           var options="";
                                                                 options =myObj;                                                                          //  echo'<option value="' . $loc . '" ';
                                                    var selectBox = document.getElementById('groupe');
                                                    $("#groupe").html("<option value='-1'>choisissez le groupe</option>");
                                                    
                                                     if(options !=""){
                                                    for (var i = 0, l = options.length; i < l; i++) {
                                                        var option = options[i];
                                                        selectBox.options.add(new Option(options[i], options[i], option.selected));
                                                    }}else{
                                                    $("#groupe").html("<option value='-'><span style='font-color='red'>Pas de groupe pour l'annee et semestre courant pour ce module</span></option>");
                                                           
                                                    }
                                                        }
                                                    };
                                                   
                                                    var events = "<?php echo base_url(); ?>index.php/agent/groupe_calender?sigle=" + sigle + "";
                                                  
                                                    xmlhttp.open("GET", events, true);
                                                    xmlhttp.send();
                                                }

                                       
  
}
        function f2()
{
    var form = document.getElementById("for");
    var sigle=document.getElementById("sigle");
    var autreElement=document.getElementById("autreElement");
     var date=document.getElementById("date");
     
   
  if(date.value.length==0)
  {
   alert('Il faut choisir une date')
            return false;
  }
  if(sigle.value.length==0 & autreElement.value.length==0)
      alert('Il faut choisir un élément')
  else 
        form.submit();
      
}
     function f3(str)
{
   // document.getElementById('default').selected = 'selected';



                                         
                                        
                                          var groupe = str.value;
                                           
                                                if (groupe == "") {
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
                                                            //document.getElementById("txtHint").innerHTML = this.responseText;
                                                            var jsonData = JSON.parse(this.responseText);
                                                            var selectBox = document.getElementById('matricule');
                                                            var option="";
                                                            $('#matricule').html('');
                                                            option= jsonData; 
                                           
                                                     if(option !=""){
                                                         for (var i = 0; i < option.etudiant.length; i++) {
                                                    var counter = option.etudiant[i];
                                                    //alert(counter.prenom);
                                                      selectBox.options.add(new Option(counter.matriculeEtudiant+" "+counter.nom+" "+counter.prenom,counter.matriculeEtudiant , option.selected));

                                                }
   $('#matricule').multipleSelect({
             isOpen: true,
            keepOpen: true
                                                     });
                                                        
                                                    for (var i = 0, l = options.length; i < l; i++) {
                                                       }}else{
                                                    $("#div").html("<span style='font-color='red'>Pas de groupe pour l'annee et semestre courant pour ce module</span>");
                                                           
                                                    }
                                                        }
                                                    };
                                                    var employe=$('#employe').val();
                                                  
                                                    var events = "<?php echo base_url(); ?>index.php/agent/afficher_etudiant_groupe_ab?groupe=" + groupe + "&employe=" +employe+ "";
                                                  
                                                    xmlhttp.open("GET", events, true);
                                                    xmlhttp.send();
                                                }

                                       
  
}
 function f4()
{
   // document.getElementById('default').selected = 'selected';

//if(document.getElementById('sigle').options[0].selected)
  document.getElementById('sigle').disabled = true;
  //else
  //{ document.getElementById('autreElement').disabled = true;  
  //    document.getElementById('autreElement').value = '';  
  //}
        

                                         
                                        
                                          var sigle = $('#autreElement').val();
                                                if (sigle == "") {
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
                                                            //document.getElementById("txtHint").innerHTML = this.responseText;
                                                              var myObj = JSON.parse(this.responseText);
                                                            //alert(myObj);
                                                           var options="";
                                                                 options =myObj;                                                                          //  echo'<option value="' . $loc . '" ';
                                                    var selectBox = document.getElementById('groupe');
                                                    $("#groupe").html("<option value='-1'>choisissez le groupe</option>");
                                                    
                                                     if(options !=""){
                                                      for (var i = 0, l = options.length; i < l; i++) {
                                                        var option = options[i];
                                                        selectBox.options.add(new Option(options[i], options[i], option.selected));
                                                    }}else{
                                                    $("#groupe").html("<option value='-'><span style='font-color='red'>Pas de groupe pour l'annee et semestre courant pour ce module</span></option>");
                                                           
                                                    }
                                                        }
                                                    };
                                                   
                                                    var events = "<?php echo base_url(); ?>index.php/agent/groupe?sigle=" + sigle + "";
                                                  
                                                    xmlhttp.open("GET", events, true);
                                                    xmlhttp.send();
                                                }

                                       
  
}
     function f5(str)
{
   // document.getElementById('default').selected = 'selected';



                                         
                                        
                                          var dept = str.value;
                                           
                                                if (dept == "") {
                                                    //document.getElementById("txtHint").innerHTML = "";
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
                                                            //document.getElementById("txtHint").innerHTML = this.responseText;
                                                                                                                    var jsonData = JSON.parse(this.responseText);
var selectBox = document.getElementById('employe');
var option="";
$('#employe').html("<option value='-1'>choisissez l'enseignant</option>");
                                           option= jsonData; 
                                           
                                                     if(option !=""){
                                                         for (var i = 0; i < option.infoEnseignant.matriculeEmploye.length; i++) {
    var counter = option.infoEnseignant.matriculeEmploye[i];
    var prenom = option.infoEnseignant.prenom[i];
     var nom = option.infoEnseignant.nom[i];
    //alert(counter);
     selectBox.options.add(new Option(counter+" "+prenom+" "+nom,counter , option.selected));
                                                   
}

                                                        
                                                   }else{
                                                    $("#div").html("<span style='font-color='red'>Pas de groupe pour l'annee et semestre courant pour ce module</span>");
                                                           
                                                    }
                                                        }
                                                    };
                                                   
                                                    var events = "<?php echo base_url(); ?>index.php/agent/afficher_enseignant_departement_ajax?dept=" + dept + "";
                                                  
                                                    xmlhttp.open("GET", events, true);
                                                    xmlhttp.send();
                                                }

                                       
  
}
       function f6(str)
{
   // document.getElementById('default').selected = 'selected';



                                         
                                        
                                          var employe = str.value;
                                           
                                                if (employe == "") {
                                                    //document.getElementById("txtHint").innerHTML = "";
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
                                                            //document.getElementById("txtHint").innerHTML = this.responseText;
                                                                                                                    var jsonData = JSON.parse(this.responseText);
var selectBox = document.getElementById('sigle');
var option="";
$('#sigle').html("<option value='-1'>choisissez l'element</option>");
$('#type').html("");
                                           option= jsonData; 
                                            var selectBox2 = document.getElementById('type');
                                             var typ1= option.detailEvent;
                                              
                                            //    alert(typ1);
                                                
                                               if(typ1 !=null){
                                                     var typ= option.detailEvent[0].type;
                                                     $("#alert").html("<font color='green'>il ya cours en emplois du temps de type "+typ+"</font>");   
                                                if(typ=="CM"){
                                                 selectBox2.options.add(new Option("CM", "cours",""));
                                                  selectBox2.options.add(new Option("TD", "td",""));
                                                   selectBox2.options.add(new Option("TP", "tp",""));
                                                       
                                                } else if(typ=="TD"){
                                                
                                                  selectBox2.options.add(new Option("TD", "td",""));
                                                   selectBox2.options.add(new Option("CM", "cours",""));
                                                   selectBox2.options.add(new Option("TP", "tp",""));
                                                       
                                                } else if(typ=="TP"){
                                                   selectBox2.options.add(new Option("TP", "tp",""));
                                                    selectBox2.options.add(new Option("CM", "cours",""));
                                                  selectBox2.options.add(new Option("TD", "td",""));
                                                
                                                       
                                                }}else{
                                                    $("#alert").html("il ya pas cours en emplois du temps ");           
                                                    selectBox2.options.add(new Option("CM", "cours",""));
                                                  selectBox2.options.add(new Option("TD", "td",""));
                                                   selectBox2.options.add(new Option("TP", "tp",""));
                                                }
                                                 
                                                        
                                                     if(option !=""){
                                                         for (var i = 0; i < option.modules.length; i++) {
    var counter = option.modules[i];
   // alert(counter.sigle);
     selectBox.options.add(new Option(counter.sigle+" "+counter.titre,counter.sigle , option.selected));
                                                   
}

                                                        
                                                   }else{
                                                    $("#div").html("<span style='font-color='red'>Pas de groupe pour l'annee et semestre courant pour ce module</span>");
                                                           
                                                    }
                                                        }
                                                    };
                                                   var heurD=$("#heureD").val();
                                                   var date=$("#date1").val();
                                                    var events = "<?php echo base_url(); ?>index.php/agent/afficher_enseignant_modules_ajax?matriculeEmploye=" + employe +"&date="+date+"&heureD="+heurD+ "";
                                                  
                                                    xmlhttp.open("GET", events, true);
                                                    xmlhttp.send();
                                                }

                                       
  
}
  
</script>
<script src="<?php echo base_url(); ?>js/multiple-select.js"></script>
    <script>
     
    </script>
    
    <link  href="<?php echo base_url(); ?>css/multiple-select.css" rel="stylesheet" >
    <div class="clear"></div>
</div> <!--end of main content-->

<?php include(APPPATH.'views/include/footer.php'); ?>


