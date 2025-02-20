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
 <script>
  $(document).ready(function(){
	
	  $("#formfile").submit(function(){
		  $("#is").empty(); $("#btn2").remove();
		  //en cas de changement de ficher pour eviter la reptition du button importer
		  $("#btn1").remove();
		 table=$(this).find("input[name=table]").val();
		
		 if(table=='autorisation_e'){
			 action='controle_ficher_autorisation';
		 }else{
			 action='controle_ficher_bac';
		 }
		$.ajax({ 
       url : '<?php echo base_url(); ?>index.php/scolarite/'+action,
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
$('<p id=btn1 ><img class="NFButtonleft" src="http://127.0.0.1/iup/images/0.png"><button  id=btn1 class=NFButton  >importer</button><img src="http://127.0.0.1/iup/images/0.png" class="NFButtonRight"></p>').appendTo("#btn");}
	  var donnees=JSON.stringify(obj.donnees)
	   $("#btn1").click(function(){
		   //l'envoi des donnees a importer
		  $.ajax({
       url : '<?php echo base_url(); ?>index.php/scolarite/import_to_table',
       type : 'POST', // Le type de la requête HTTP, ici devenu POST
       data : 'donnees='+donnees+'&table='+table,// On fait passer nos variables, exactement comme en GET
       dataType : 'html',
	   success : function(data){
	
 var obj1 = JSON.parse(data);
 //console.log(obj1);
 nbInserer=(obj.nbDonnees);
  var newData=JSON.stringify(obj1.newData);
  var existeData=JSON.stringify(obj1.existeData);
  // le cas ou il existe des lignes
 if(obj1.information!=null){ $("#is").show();
 $("#is").removeClass("error_box");
 
 $("#btn").show(); $("#btn1").remove();
	 $("#is").html(obj1.information);
	 //la case a cocher
$("<div class=check><input name=check type=checkbox class=form-check-input ><font size=2pt color=black>voulez vous modifier les lignes existant<br></div><br>").appendTo("#is");
 $("<p id=btn2><img class='NFButtonleft' src='http://127.0.0.1/iup/images/0.png'><button  id=btn2 class='NFButton'  >importer</button><img src='http://127.0.0.1/iup/images/0.png' class='NFButtonRight'></p>").appendTo("#btn");}
 else{// message importation avec succes 
	
  $("#is").removeClass("error_box");
	 $("#is").addClass("valid_box");
 $("#is").html(obj1.titre+"<br><h3 color=black>lignes importer:"+nbInserer+"<br>Erreur:"+nbError);
 $("#btn1").remove();
 } //mettre a jour des donnees ou non
	  $("#btn2 ").click(function(){
		  		if( $('input[name=check]').is(':checked') ){
    check='oui';
} else {
   check='non';
} $.ajax({
       url : '<?php echo base_url(); ?>index.php/scolarite/mettre_a_jour_lignes_Existe',
       type : 'POST', // Le type de la requête HTTP, ici devenu POST
       data :'existeData='+existeData+'&newData='+newData+'&donnees='+donnees+'&check='+check +'&table='+table,// On fait passer nos variables, exactement comme en GET, au script more_com.php
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
		   });
	   }
	   ,error: function(data){
		 
    }
	   
	    });
	   });
       },error: function(result){
      alert("erreur verifier le ficher"); 
    }
	 
});
return false;
    });  
	  
	
	   
	   
});
	    
	  </script><div id='choix_ficher'>
 
 <?php
 //le choix du ficher a importer
  echo "<font size=6pt>$titre</font><br><br>";	
echo"<form action=# method=post >";
if($table=='bac_mauritania'){
	$action='controle_ficher_bac';
echo"<button type=submit name=F class='btn-success  btn-sm' id=b  ><i class='fa fa-download fa-lg' ></i> telécherger un ficher modèle</button> </form>";
}else{
	$action='controle_ficher_autorisation';
echo"<button type=submit name=f1 class='btn-success  btn-sm'><i class='fa fa-download fa-lg'></i> telécherger un ficher modèle</button> </form>";
}
//telcheregement du ficher modele
if(isset($_POST['F'])){
header("Location: ../../../bac-rim.xlsx");}
if(isset($_POST['f1'])){
header("Location: ../../../autorisation.xlsx");}?>

<!--  button pour le choix du ficher-->

<form  method=post enctype='multipart/form-data'  id=formfile   ><input type=hidden name=table  value=<?php echo $table;?> >
<input type=file  name=file id=file class="form-control" required><br>
<img class="NFButtonleft" src="http://127.0.0.1/iup/images/0.png"><input type=submit value=verifier class="NFButton" ><img src="http://127.0.0.1/iup/images/0.png" class="NFButtonRight">
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
			<?php include(APPPATH.'views/include/footer.php'); ?>

			
	
	
