<?php
include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
   

    <div class="container">
        <div class="col-xs-12 hl-left pb-4" style="height:500px">          
        
      
        <?php echo heading('Inscription/Désinscription des groupes de L'.$niveau.'-'.$programme.' '.$date,'3');
		$attributes = array('class' => 'niceform');
		echo form_open("scolarite/administration_groupes_2/$niveau/$programme/$date");
		echo form_fieldset();?>
        <table class="form table">
            <tr>
                <td>Traitement parallèle</td>
                <td><?php echo form_checkbox('traitement_parallele','ok') ?></td>
            </tr>
            <tr>
                <td>Désinscrire seulement de tous les groupes d'un élément</td>
                <td><?php echo form_checkbox('desins','ok') ?></td>
            </tr>
            <tr>
                      <td> 
                        <?php echo form_label('Liste des éléments :');?>
                    </td>   
                    <td>
                  <?php $input = array( 'class' =>'form-control','type' => 'text', 'autocomplete'=>'off', 'list'=>'liste1', 'id' => 'sigle', 'name' => 'sigle','onchange'=>'f4()','required'=>'');
                    echo form_input($input,''); ?>

                    <datalist   id='liste1' >
                        <?php 

                        for($i=0; $i<count($allModules); $i++)
                        {
                            echo "<option value='".$allModules[$i]."'>";
                        }
                        ?>

                    </datalist>
<!--                        <button id="bt" onclick="f4()">Voire Groupes</button>
                        -->
                    
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
                        <?php echo form_label('Etudiants :');?>
                    </td>
                    <td rowspan="5" VALIGN="top" > <select style="height:100px;width:400px"  name="matricule[]" id="matricule" class="form-control" required="" multiple>
  
                       </select>
                    </td>

                </tr>
                <tr><td></td></tr>
                <tr><td></td></tr>
                <tr><td></td></tr>
                <tr><td></td></tr>
                <tr><td></td></tr>
<!--                <tr><td></td></tr>
                <tr><td></td></tr>
                <tr><td></td></tr>
                <tr><td></td></tr>
                <tr><td></td></tr>
                -->
                
                <tr>                     
                    <td class="submit" colspan="2">
                        <?php $pw = array('class'=>'btn-success  ','type' => 'submit', 'name' => 'submit', 'id'=>'subm;it', 'value'=>'OK'); 
                            echo form_input($pw);?>
                    </td>
                </tr>                
                </table>
                <?php echo form_fieldset_close();
                echo form_close('</div>');?>   
        
    </div>  <!--right content-->
 	
   

       
    <script>
        
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
//                                                      selectBox.options.add(new Option('','' , option.selected));
//                                                      selectBox.options.add(new Option('','' , option.selected));
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
                                                    var sigle=$('#sigle').val();
                                                  //alert(sigle);
                                                    var events = "<?php echo base_url(); ?>index.php/scolarite/afficher_etudiant_ins_ds_module?sigle=" + sigle + "&date=" +'<?php echo $date ?>'+ "";
                                                  //alert(55);
                                                    xmlhttp.open("GET", events, true);
                                                    xmlhttp.send();
                                                }

                                       
  
}
        function f4()
{
   // document.getElementById('default').selected = 'selected';

//if(document.getElementById('sigle').options[0].selected)
  //document.getElementById('sigle').disabled = true;
  //else
  //{ document.getElementById('autreElement').disabled = true;  
  //    document.getElementById('autreElement').value = '';  
  //}
        

                                         
                                        
                                          var sigle = $('#sigle').val();
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
 
    </script>

<script src="<?php echo base_url(); ?>js/multiple-select.js"></script>
    <script>
     
    </script>
    
    <link  href="<?php echo base_url(); ?>css/multiple-select.css" rel="stylesheet" >
    <div class="clear"></div>
</div> <!--end of main content-->

<?php include(APPPATH.'views/include/footer.php'); ?>
    