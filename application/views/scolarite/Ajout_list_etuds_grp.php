
<link rel="stylesheet" href="<?php echo base_url();?>css/.css" />
<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
<?php



/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<div class="container">
    <div class="col-xs-12 hl-left">
	<div class="right_content">
        <?php
		//affichage des erreurs
 ?>
<div id='choix_ficher'>
 
 <?php
 //le choix du ficher a importer
  echo "<font size=6pt>$titre</font><br><br>";	
echo"<form action=# method=post >";
if($table=='list_matricules'){
	$action='controle_ficher_list_etuds';
echo"<button type=submit name=F class='btn-success  btn-sm' id=b  ><i class='fa fa-download fa-lg' ></i> telécherger un ficher modèle</button> </form>";
}
//telcheregement du ficher modele
if(isset($_POST['F'])){
    $url=base_url();
    
header("Location:".$url."/List_etudiant.xlsx");}
?>
<!--button class="btn btn-warning" id="download-btn">
    <i class="fa fa-download" aria-hidden="true"></i>  Download Demo File
</button-->



<!--  button pour le choix du ficher-->

<form  method=post enctype='multipart/form-data'  id="formfile"   ><input type=hidden name=table  value=<?php echo $table;?> >
    <input type=file  name=file id=file class="form-control" required><br>
      <label><font size=4pt>Choisir le groupe</font></label>
<?php
                        echo ' <select name="groupe"  class="form-control" id="grp"> ';
                       
                                 for($i=0;$i<count($grp);$i++)
                        {
                                echo '<option value="'.$grp[$i].'">'.$grp[$i].'</option>';
                        }
                      
                        echo '</select>';
                    ?><br>
    <input type=submit value=verfier class="btn btn-primary" >
	 </form>
	
</div><div id=is >
</div><div id=btn >
<span></span></div>
<style>

.correct{
	color:green;
}
input[type=file]{
	
	width:50%;
}

</style>
  <script>
  $(document).ready(function(){
	 
	  $("#formfile").submit(function(){
              var e = document.getElementById('grp').value;
             // var grp = e.options[e.selectedIndex].value;
            // var g = document.forms[0].grp.value;
            // alert(g);
		  $("#is").empty(); $("#btn2").remove();
		  //en cas de changement de ficher pour eviter la reptition du button importer
		  $("#btn1").remove();
		 table=$(this).find("input[name=table]").val();
		
			 action='controle_ficher_list_etuds';
		 
		$.ajax({ 
       url : '<?php echo base_url(); ?>index.php/scolarite/'+action+'/'+e,
       type : 'POST', // Le type de la requête HTTP, ici devenu POST
       data : new FormData(this),// On fait passer nos variables, exactement comme en GET
       dataType : 'html',
contentType: false,
            cache: false,
            processData:false,success : function(result){ 
           
			// code_html contient le HTML renvoyé
			//console.log(result);
			var obj = JSON.parse(result);
			//l'affichage des erreurs
		if(obj.information){
			nbError=obj.nbError;
		nbInserer=(obj.nbDonnees);
		$("#is").removeClass("valid_box");
			$("#is").addClass("error_box");
		$("#is").html(obj.titre+obj.information+obj.alert);
		}//cas ou les erreurs :0
		if(obj.infocorrect){
			$("#is").removeClass("valid_box");$("#is").removeClass("error_box");
			$("#is").addClass("correct");
			$("#is").html(obj.infocorrect);nbError=obj.nbErreur;nbInserer=(obj.nbDonnees);	
		}
		 // le button importer
	    if(obj.donnees!=null){
$('<p id=btn1 ><button  id=btn1 class="btn btn-success"  >Enregistrer</button></p>').appendTo("#btn");}
	  var donnees=JSON.stringify(obj.donnees)
	   $("#btn1").click(function(){
                   var e = document.getElementById('grp').value;
                   //alert(donnees);
		   //l'envoi des donnees a importer
		  $.ajax({
       url : '<?php echo base_url(); ?>index.php/scolarite/import_to_table_list_etudiant/'+e,
       type : 'POST', // Le type de la requête HTTP, ici devenu POST
       data : 'donnees='+donnees,// On fait passer nos variables, exactement comme en GET
       dataType : 'html',
	   success : function(data){
            
	//console.log();
 var obj1 = JSON.parse(data);
 //console.log(obj1);
 //=(obj.nbDonnees);
 // var newData=JSON.stringify(obj1.newData);
 // var existeData=JSON.stringify(obj1.existeData);
  // le cas ou il existe des lignes
 if(obj1.information!=null){ /*$("#is").show();
 $("#is").removeClass("error_box");
 
 $("#btn").show(); $("#btn1").remove();
	 $("#is").html(obj1.information);
	 //la case a cocher
$("<div class=check><input name=check type=checkbox class=form-check-input ><font size=2pt color=black>voulez vous modifier les lignes existant<br></div><br>").appendTo("#is");
 $("<p id=btn1 ><button  id=btn1 class='btn btn-success'  >Modifier</button></p>").appendTo("#btn");}
 else{// message importation avec succes 
	*/
        
  $("#is").removeClass("error_box");
	 $("#is").addClass("valid_box");
 $("#is").html(obj1.titre+"<br><h3 color=black>lignes importer:"+nbInserer+"<br>Erreur:"+nbError);
 $("#btn1").remove();
 } //mettre a jour des donnees ou non
	/*  $("#btn2 ").click(function(){
              var e = document.getElementById('grp').value;
		  		if( $('input[name=check]').is(':checked') ){
    check='oui';
} else {
   check='non';
} $.ajax({
       url : '<?php echo base_url(); ?>index.php/scolarite/mettre_a_jour_lignes_listetuds/'+e,
       type : 'POST', // Le type de la requête HTTP, ici devenu POST
       data :'existeData='+existeData+'&newData='+newData+'&donnees='+donnees+'&check='+check,// On fait passer nos variables, exactement comme en GET, au script more_com.php
       dataType : 'html',
	   success : function(data){
		   // message importation avec succes apres la modification ou non
			//console.log(data); 
			var obj2 = JSON.parse(data);
			nbModifier=obj2.nbModifier;
			nbInserer=obj2.nblignes;
			 $("#is").addClass("valid_box");
			 $("#is").html(obj2.info+"<br><h3 color=black>lignes importer:"+nbInserer+"<br>Erreur:"+nbError+"<br>lignes mettre a jour:"+nbModifier);
		      $("#btn2").remove();
	   }
	   ,error: function(data){
		   //console.log(data);
	   }
		  });
		   });*/
	   }
	   ,error: function(data){
		 
    }
	   
	    });
	   });
       },error: function(result){
      alert("erreur verifier le ficher !!"); 
    }
	 
});
return false;
    });  
	  
	
	   
	   
});
	    
	    
	  </script>
			<?php include(APPPATH.'views/include/footer.php'); ?>

			
	
	


