<!DOCTYPE html>
<?php include(APPPATH.'views/include/header.php');
include('include/menu.php');?> 


<div class="container">
    <div class="col-xs-12 hl-left">
    <div class="row">
        <div class="col-sm-offset-3 col-lg-6 col-sm-6 well">
        <legend>Afficher Planing examen par filière:</legend>
        <?php 
        $attributes = array("class" => "form-horizontal", "id" => "autorisationform", "name" => "autorisationform");
        echo form_open("scolarite/planning_examens", $attributes);?>
        <?php echo $this->session->flashdata('msg'); ?>
        <fieldset>
            <div class="panel-body"> 
                                                                       

                                                              
            <div class="form-group">
            <div class="row colbox">
          
           
             <div class="form-group">
            <div class="row colbox">
            <div class="col-lg-4 col-sm-4">
                <label for="nom" class="control-label">Programme:</label>
            </div>
            <div class="col-lg-8 col-sm-8">
                                                                        <select class="form-control"    name="idProgramme"  id="idProgramme1" onchange="selectModule(this.options[this.selectedIndex].value)"> 
                                                                       <option value="tous">Tous</option>
                                                                      <?php
                                                                        if (is_array($programme['idProgramme'])) {


                                                                            for ($i = 0; $i < count($programme['idProgramme']); $i++) {
                                                                                echo '<option value="' . $programme['idProgramme'][$i] . '" >' . $programme['idProgramme'][$i] . '</option>';
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </select>
            </div>
            </div>
            </div>
            <div class="form-group">
            <div class="row colbox">
            <div class="col-lg-4 col-sm-4">
                <label for="prenom" class="control-label">Planing :</label>
            </div>
            <div class="col-lg-8 col-sm-8">
                                                                        <select class="form-control"   name="planing"   > 
                                                                       <option value="-1">choisissez un planing</option>
                                                                      <?php
                                                                        if (is_array($planing['id'])) {


                                                                            for ($i = 0; $i < count($planing['id']); $i++) {
                                                                                echo '<option value="' . $planing['id'][$i] . '" >' . $planing['id'][$i] . ' ' . $planing['annee'][$i] . ' ' . $planing['semestre'][$i] . ' ' . $planing['session'][$i] . '</option>';
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </select>
            </div>
            </div>
            </div>
 
            
            <div class="form-group">
            <div class="col-sm-offset-4 col-lg-8 col-sm-8 text-left">
                <input id="btn_add" name="btn_add" type="submit" class="btn btn-primary" value="Valider" />
                    </div>
            </div>
             
            
        </fieldset>
        <?php echo form_close(); ?>
        
        </div>
    </div>
        </div>
    </div>          
</div>
</body>
</html>

    </div>                      
</div>         

<div class="clear"></div>
</div> <!--end of main content-->

<script>
    // $(document).ready(function () {
    /*      $('#num_bac').on('change', function(){
                                                                var input = $(this);
                                                                        //do your ajax call here
                                                                       // alert("hh");
                                                                        showChevauch();
                                                                        input.next('span.info').html(input.val());
                                                                });
                                                              
*/
       //    }
</script>
<?php include(APPPATH.'views/include/footer.php');
?>