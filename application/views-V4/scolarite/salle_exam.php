<!DOCTYPE html>
<?php include(APPPATH.'views/include/header.php');
include('include/menu.php');?> 

<div class="container">
    <div class="col-xs-12 hl-left">
    <div class="row">
        <div class="col-sm-offset-3 col-lg-6 col-sm-6 well">
        <legend>Autorisation d'un etudiant</legend>
        <?php 
        $attributes = array("class" => "form-horizontal", "id" => "autorisationform", "name" => "autorisationform");
        echo form_open("scolarite/salle_exam", $attributes);?>
        <?php echo $this->session->flashdata('msg'); ?>
        <fieldset>
            
            <div class="form-group">
            <div class="row colbox">
            
            <div class="col-lg-4 col-sm-4">
                <label for="num_bac" class="control-label">Code salle</label>
            </div>
            <div class="col-lg-8 col-sm-8">
                <input id="numbac" name="code_salle" placeholder="code salle" type="text" class="form-control"  value="" />
                <span class="text-danger"><?php echo form_error('code_salle'); ?></span>
            </div>
            </div>
            </div>

            <div class="form-group">
            <div class="row colbox">
            <div class="col-lg-4 col-sm-4">
                <label for="annee" class="control-label">Debut/label>
            </div>
            <div class="col-lg-8 col-sm-8">
                <input id="annee" name="debut" placeholder="debut" type="text" class="form-control"  value="" />
                <span class="text-danger"><?php echo form_error('debut'); ?></span>
            </div>
            </div>
            </div>
            
          
            
            <div class="form-group">
            <div class="row colbox">
            <div class="col-lg-4 col-sm-4">
                <label for="nom" class="control-label">Fin</label>
            </div>
            <div class="col-lg-8 col-sm-8">
                <input id="salary" name="fin" placeholder="fin" type="text" class="form-control" value="<?php echo set_value('fin'); ?>" />
                <span class="text-danger"><?php echo form_error('fin'); ?></span>
            </div>
            </div>
            </div>
 
            
            <div class="form-group">
            <div class="col-sm-offset-4 col-lg-8 col-sm-8 text-left">
                <input id="btn_add" name="btn_add" type="submit" class="btn btn-primary" value="Ajouter" />
                <input id="btn_cancel" name="btn_cancel" type="reset" class="btn btn-danger" value="Annuler" />
            </div>
            </div>
             
            
        </fieldset>
        <?php echo form_close(); ?>
        
        </div>
    </div>
</div>
</body>
</html>

    </div>                      
</div>         

<div class="clear"></div>
</div> <!--end of main content-->


<?php include(APPPATH.'views/include/footer.php');
?>