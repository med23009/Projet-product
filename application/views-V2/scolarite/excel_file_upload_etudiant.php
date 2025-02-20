<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
   
  <div class="container">
    <div class="col-xs-12 hl-left">
<!DOCTYPE html>
<html>
<head>
</head>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<body>

<div class="container">
	<div class="row" >
		<div class="col-md-4 col-md-offset-3">
                    	 <?php
 //le choix du ficher a importer
echo"<form action=# method=post >";

echo"<button type=submit name=F class='btn-success  btn-sm' id=b  ><i class='fa fa-download fa-lg' ></i> telécherger un ficher modèle</button> </form>";

//telcheregement du ficher modele
if(isset($_POST['F'])){
    $url= base_url()."liste_etudiants.xlsx";
   // echo $url;
    header("Location: $url");   
 //header("Location: ../../etudiants.xlsx");   
//header("Location: ../../../Etudiants.xlsx");
}
?>

			
			<?php if(!empty($this->session->flashdata('status'))){ ?>
			<div class="alert alert-info" role="alert"><?= $this->session->flashdata('status'); ?></div>
			<?php } ?>
			<form action="<?= base_url('index.php/scolarite/import_excel'); ?>" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label>Fichier Excel</label>
					<input type="file" name="fileExcel">
				</div>
				<div>
					<button class='btn btn-success' type="submit">
						<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
			    		Import		
					</button>
				</div>
			</form>
		</div>
	
	</div>
</div>
</body>
</html>
  </div>   <!--end of center content -->               
                    
                    
    
    </div>  
    <div class="clear"></div>
    </div> <!--end of main content-->
	
    
  <?php include(APPPATH.'views/include/footer.php');?>