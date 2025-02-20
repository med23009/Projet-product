
<link rel="stylesheet" href="<?php echo base_url();?>css/.css" />
<?php
include(APPPATH.'views/include/header.php');
include('include/menu.php');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//echo $semestre,$annee;
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
		  $("#is").empty();
		   $("#btn2").remove();
		  //en cas de changement de ficher pour eviter la reptition du button importer
		  $("#btn1").remove();
                  
	/*	file =$(this).find("input[name=file]").val();
        alert(file);*/
        var  action='';
         var annee=$(this).find("input[name=annee]").val();
       var  sigle=$(this).find("input[name=sigle]").val();
        var semestre=$(this).find("input[name=semestre]").val();
          var id=$(this).find("input[name=idEvaluation]").val();
          var anonymat=$(this).find("input[name=anonymat]").val();
          //alert(anonymat);
        //alert(annee);
        /*
        alert(semestre);
        alert(sigle);
        alert(annee);*/
        if(id==1){
            action="controle_fichier_notes_cc";
        }else{
            if(id==2){
                action="controle_fichier_notes_exam";
            }else {action="controle_fichier_notes_rat";}
            
        }
       /* switch(id){
            case 1: action="controle_fichier_notes";break;
                case 2: action="controle_fichier_notes_exam";break;
                    case 4: action="controle_fichier_notes_rat";break;
                        defautl : alert ("r1");
        }*/
        //alert(id);
        
        $.ajax({ 
          
       url : '<?php echo base_url(); ?>index.php/professeur/'+action,
       type : 'POST', // Le type de la requête HTTP, ici devenu POST
       data : new FormData($('form')[1]),//'file='+file+'&annee='+annee+'&semestre='+semestre+'&sigle='+sigle,// // On fait passer nos variables, exactement comme en GET
       dataType : 'html',
contentType: false,
            cache: false,
            processData:false,
            success : function(result){ 
			// code_html contient le HTML renvoyé
          //  console.log(result);
            //alert("jusqu'a ici");
           
			//console.log(result);
			
			var obj = JSON.parse(result);
            //console.log(obj);
			//l'affichage des erreurs
		if(obj.information){
			nbError=obj.nbError;
		nbInserer=(obj.nbDonnees);
		$("#is").removeClass("valid_box");
			$("#is").addClass("error_box");
		$("#is").html(obj.titre+obj.information+obj.alert);
		}//cas ou les erreurs:0
		if(obj.infocorrect){
			$("#is").removeClass("valid_box");$("#is").removeClass("error_box");
			$("#is").addClass("correct");
			$("#is").html(obj.infocorrect);
            nbError=obj.nbErreur;nbInserer=(obj.nbDonnees);	
		}
        //alert(obj);
		 // le button importer
                  if(obj.donnees!=null){
$('<p id=btn1 ><img class="NFButtonleft" src="http://127.0.0.1:8012/laureat_ing/images/0.png"><button  id=btn1 class=NFButton  >importer</button><img src="http://127.0.0.1/iup/images/0.png" class="NFButtonRight"></p>').appendTo("#btn");}
	  var donnees=JSON.stringify(obj.donnees);
      //console.log(donnees);
      
      
        $("#btn1").click(function(){
		   //l'envoi des donnees a importer
              if(donnees=="[]")  {   
                alert("pas des donnees a importees! verifier le fichier");
           // alert(donnees);
        }
		  $.ajax({
       url : '<?php echo base_url(); ?>index.php/professeur/import_notes_to_table_note_cc_exam',
       type : 'POST', // Le type de la requête HTTP, ici devenu POST
       data : 'donnees='+donnees+'&annee='+annee+'&semestre='+semestre+'&sigle='+sigle+'&idEvaluation='+id+'&anonymat='+anonymat,// On fait passer nos variables, exactement comme en GET
       dataType : 'html',
	   success : function(data){
               
        //       alert(data);
              
	   
 var obj1 = JSON.parse(data);
 
  $("#is").removeClass("error_box");
	 $("#is").addClass("valid_box");
 $("#is").html(obj1.titre+"<br><h3 color=black>lignes importées:"+nbInserer+"<br>Erreur:"+nbError);
 $("#btn1").remove();
  //mettre a jour des donnees ou non
  
    }
       ,error: function(data){
	//console.log(data);	 
    }
    
		   });
                  
	
    
	    });
        },error: function(result){
        //alert(result);
      alert("erreur verifier le ficher"); 
    }
	 
});
return false;
    });  
	  
	
	   
	   
});
	  
	
	   
	   

	    
	  </script><div id='choix_ficher'>
      
	  
                 
       
<?php
 //le choix du ficher a importer
if($idEvaluation==4){ 	
echo form_open_multipart('Professeur/telecharger_rt');
}else{
echo form_open_multipart('Professeur/telecharger');

}
if($anonymat==1){
	//$action='controle_ficher_notes_cc';
echo"<button type=submit name=F class='btn-success  btn-sm' id=b  ><i class='fa fa-download fa-lg' ></i> telécherger un ficher modèle</button> </form>";
}else{
//$action='controle_ficher_notes_cc';
echo"<button type=submit name=f1 class='btn-success  btn-sm'><i class='fa fa-download fa-lg'></i> telécherger un ficher modèle</button> </form>";
}
//telcheregement du ficher modele
if(isset($_POST['F'])){
header("Location: ../../../bac-rim.xlsx");}
if(isset($_POST['f1'])){
header("Location: ../../../autorisation.xlsx");}?>


<form  method=POST  enctype='multipart/form-data'  id='formfile'>
<input type=hidden name='annee'  value=<?php echo $annee;?> >
<input type=hidden name='sigle'  value=<?php echo $sigle;?> >
<input type=hidden name='semestre'  value=<?php echo $semestre;?> >
<input type=hidden name='idEvaluation'  value=<?php echo $idEvaluation;?> >
<input type=hidden name='anonymat'  value=<?php echo $anonymat;?> >
<input type=file  name='file' id=file class="form-control" accept=".xlsx,.xls" required><br>
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
