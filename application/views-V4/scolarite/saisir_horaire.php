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
			echo form_open('scolarite/saisir_horaire_module',$for);
	
        print ('<h2>' . 'Saisir horaire' . '</h2>');	//    
        
       
        ?>

        <table ALIGN="center-" width="100%" class="form" border="0">
            
            <tr>
                    <td> 
                        <?php echo form_label('Enseignant :');?>
                    </td>
                     <td>
                   <?php echo form_label($matriculeEmploye." : ".$nomEmploye);?>
                     </td><td rowspan="10" VALIGN="top"> <select style="height:400px"  name="matricule[]" id="matricule" multiple>
  
                       </select></td>

                </tr>
                
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

                <tr>
                    
                    <td>
                    <?php echo form_label('Heure début :');?>
                </td>
                
                <td>
                    <select class= 'form-control' name="heureD" id="heureD">
                        <option value="8">08h00</option>
                        <option value="8.15">08h15</option>
                        <option value="9">09h00</option>
                         <option value="9.15">09h15</option>
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
               
                <tr>
                    <td> 
                        <?php echo form_label('Durée :');?>
                    </td>
                     <td>
                    <select class= 'form-control' name="duree" id="duree">
                        <option value="1">1h</option>
                        <option value="1.5">1h30</option>
                        <option value="2">2h</option>
                        <option value="3">3h</option>
                       <option value="4">4h</option>
                    </select>
                </td>
                    
                </tr>
                
                <tr>
                    <td> 
                        <?php echo form_label('Type :');?>
                    </td>
                     <td>
                    <select class= 'form-control' name="type" id="type">
                        <option value="cours">CM</option>
                        <option value="td">TD</option>
                        <option value="tp">TP</option>
                      
                    </select>
                </td>

                </tr>
              
                <tr>
                      <td> 
                        <?php echo form_label('Elément :');?>
                    </td>   
                    <td>
                    <select class = 'form-control' name="sigle" id="sigle"   onchange="f1(this);">
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
                      <td> 
                        <?php echo form_label('Autre élément ne figurant pas dans la liste :');?>
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
                        <button onclick="f4()">Voire Groupes</button>
                        
                    
                    </td>
                </tr>
                 <tr>
                      <td> 
                        <?php echo form_label('Groupe :');?>
                    </td>   
                    <td>
                    <select class = 'form-control' name="groupe" id="groupe"   onchange="f3(this);">
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
                
                <tr>
                    <td> 
                        <?php echo form_label('Résumé du cours  :');?>
                    </td>
                     <td>
                    <?php $input = array('class' => 'form-control','type' => 'textarea', 'id' => 'commentaire', 'name' => 'commentaire');
                    echo form_input($input,''); ?>
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

                 echo form_hidden('anneeC', $anneeC);
                echo form_hidden('semestreC', $semestreC);
                echo form_hidden('matriculeEmploye', $matriculeEmploye);
                echo form_hidden('nomEmploye', $nomEmploye);
        echo form_close('</div>');
        ?>
    </div>
    
    <script>
        function f1(str)
{
   // document.getElementById('default').selected = 'selected';

if(document.getElementById('sigle').options[0].selected)
  document.getElementById('autreElement').disabled = false;
  else
  { document.getElementById('autreElement').disabled = true;  
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
                                                   
                                                    var events = "<?php echo base_url(); ?>index.php/scolarite/groupe?sigle=" + sigle + "";
                                                  
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
    //alert(counter.nom);
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
                                                   
                                                    var events = "<?php echo base_url(); ?>index.php/scolarite/afficher_etudiant_groupe_ab?groupe=" + groupe + "";
                                                  
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
                                                   
                                                    var events = "<?php echo base_url(); ?>index.php/scolarite/groupe?sigle=" + sigle + "";
                                                  
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


