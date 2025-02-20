<link rel="stylesheet" href="<?php echo base_url();?>css/.css" />
<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
<!--  form choix maliere et groupe-->
<div class="container">
    <div class="col-xs-12 hl-left">
	<div class="right_content">
            <?php
              echo "<font size=6pt>$titre</font><br><br>";	?>
<div id="matiere">
     <?php       
           echo form_open('scolarite/choix_groupe_list_etuds');
         ?>

    <label><font size=4pt>Choisir la matiere</font></label>
<?php
                       echo ' <select name="matiere"  class="form-control" > ';
                       
                                 for($i=0;$i<count($matiere);$i++)
                        {
                                echo '<option value="'.$matiere[$i].'">'.$matiere[$i].'</option>';
                        }
                      
                        echo '</select>';
                    ?><br>
                      <button type=submit  class="btn btn-primary" >Choisir</button> 
 <?php echo form_close('</div>');?>
</div>

<!--  button pour le choix du ficher-->

        </div>
    </div>
    
<?php include(APPPATH.'views/include/footer.php'); ?>
