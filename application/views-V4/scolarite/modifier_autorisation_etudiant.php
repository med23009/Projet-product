<!DOCTYPE html>
<?php include(APPPATH.'views/include/header.php');
include('include/menu.php');?> 

 <div class="container">
    <div class="col-xs-12 hl-left">
    <div class="row">
        <div class="col-sm-offset-3 col-lg-6 col-sm-6 well">
        <legend>Autorisation d un etudiant</legend>
        <?php 
       // print_r($info);
         echo $this->session->flashdata('msg'); 
        $attributes = array("class" => "form-horizontal", "id" => "autorisationform", "name" => "autorisationform");
        echo form_open("scolarite/modifier_autoriser_etudiant", $attributes);?>
        <fieldset>
            
            <div class="form-group">
            <div class="row colbox">
            
            <div class="col-lg-4 col-sm-4">
                <label for="num_bac" class="control-label">Numéro du BAC</label>
            </div>
            <div class="col-lg-8 col-sm-8">
                <input readonly id="numbac" name="num_bac" placeholder="num_bac" type="text" class="form-control"  value="<?php echo $info['num_bac'];?>" />
                <span class="text-danger"><?php echo form_error('num_bac'); ?></span>
            </div>
            </div>
            </div>

            <div class="form-group">
            <div class="row colbox">
            <div class="col-lg-4 col-sm-4">
                <label for="annee" class="control-label">Année</label>
            </div>
            <div class="col-lg-8 col-sm-8">
                <input readonly id="annee" name="annee" placeholder="annee" type="text" class="form-control"  value="<?php echo $info['annee']; ?>" />
                <span class="text-danger"><?php echo form_error('annee'); ?></span>
            </div>
            </div>
            </div>
            
          
            
            <div class="form-group">
            <div class="row colbox">
            <div class="col-lg-4 col-sm-4">
                <label for="nom" class="control-label">Nom</label>
            </div>
            <div class="col-lg-8 col-sm-8">
                <input id="salary" name="nom" placeholder="nom" type="text" class="form-control" value="<?php echo $info['nom']; ?>" />
                <span class="text-danger"><?php echo form_error('nom'); ?></span>
            </div>
            </div>
            </div>
            <div class="form-group">
            <div class="row colbox">
            <div class="col-lg-4 col-sm-4">
                <label for="prenom" class="control-label">Prénom</label>
            </div>
            <div class="col-lg-8 col-sm-8">
                <input id="salary" name="prenom" placeholder="prenom" type="text" class="form-control" value="<?php echo $info['prenom']; ?>" />
                <span class="text-danger"><?php echo form_error('prenom'); ?></span>
            </div>
            </div>
            </div>
            <div class="form-group">
            <div class="row colbox">
            <div class="col-lg-4 col-sm-4">
                <label for="prenom" class="control-label">Prénom du pére</label>
            </div>
            <div class="col-lg-8 col-sm-8">
                <input id="salary" name="prenomPere" placeholder="prenom du pére" type="text" class="form-control" value="<?php echo $info['prenomPere_fr']; ?>" />
                <span class="text-danger"><?php echo form_error('prenom'); ?></span>
            </div>
            </div>
            </div>
             <div class="form-group">
            <div class="row colbox">
            <div class="col-lg-4 col-sm-4">
                <label for="prenom" class="control-label">Année autorisation</label>
            </div>
            <div class="col-lg-8 col-sm-8">
                <input id="salary" name="anneeAutorisation" placeholder="annee autorisation" type="text" class="form-control" value="<?php echo $info['anneeAutorisation']; ?>" />
                <span class="text-danger"><?php echo form_error('prenom'); ?></span>
            </div>
            </div>
            </div>
             <div class="form-group">
            <div class="row colbox">
            <div class="col-lg-4 col-sm-4">
                <label for="department" class="control-label">Filiere</label>
            </div>
            <div class="col-lg-8 col-sm-8">
            <?php 
        
                                   
        if(is_array($programme['idProgramme']))
        {
          
            echo ' <select class="form-control" name="idProgramme" id=""> ';
            for($i=0;$i<count($programme['idProgramme']);$i++)
            { $checked="";
                if($info['idProgramme']==$programme['idProgramme'][$i]){
                 $checked="selected";
            }
                echo '<option '.$checked.' value="'.$programme['idProgramme'][$i].'">'.$programme['nomProgramme'][$i].'</option>';
            }
            echo '</select>';
        }
                ?>
              
                
                <span class="text-danger"><?php echo form_error('department'); ?></span>
            </div>
            </div>
            </div>
             <div class="form-group">
            <div class="row colbox">
            <div class="col-lg-4 col-sm-4">
                <label for="serie" class="control-label">Serie</label>
            </div>
            <div class="col-lg-8 col-sm-8">
                <!--<input id="salary" name="serie" placeholder="serie" type="text" class="form-control" value="<?php echo set_value('serie'); ?>" />-->
                <td><?php echo'<select class="form-control"  name="serie">';
                                // bloc ci-dessous modifié mai 2013 2.2.1
                                /* echo ' <option value="C">C </option>
                                    <option value="D">D </option>
                                    <option value="T">T </option>
                                    <option value="Autre">Autre </option></select>'; ?> */
                $checked="";
                $checked1="";
                $checked2="";
                $checked3="";
                $checked4="";
                $checked5="";
                if($info['serie']=="M"){
                 $checked="selected";
            }if($info['serie']=="SN" OR $info['serie']=="Scientifique"){
                 $checked1="selected";
            }if($info['serie']=="TMGM"){
                 $checked2="selected";
            }if($info['serie']=="LM"){
                 $checked3="selected";
            }if($info['serie']=="LO"){
                 $checked4="selected";
            }if($info['serie']=="Autre"){
                 $checked5="selected";
            }
								echo ' <option '.$checked.'  value="M">M (Mathématique) </option>
                                    <option '.$checked1.' value="SN">SN (Sciences Naturelles) </option>
                                    <option '.$checked2.' value="TMGM">TMGM (Technique) </option>
                                    <option '.$checked3.' value="LM">LM (Lettre modérne) </option>
                                    <option '.$checked4.' value="LO">LO(Lettre originalle) </option>
                                    <option '.$checked5.' value="Autre">Autre </option></select>'; ?>	
                        </td>
                <span class="text-danger"><?php echo form_error('serie'); ?></span>
            </div>
            </div>
            </div>
               <div class="form-group">
            <div class="row colbox">
            <div class="col-lg-4 col-sm-4">
                <label for="prenom" class="control-label">Personne ressource</label>
            </div>
            <div class="col-lg-8 col-sm-8">
                <input id="salary" name="personne_ressource" placeholder="Personne ressource" type="text" class="form-control" value="<?php echo $info['personne_ressource']; ?>" />
                <span class="text-danger"><?php echo form_error('personne_ressource'); ?></span>
            </div>
            </div>
            </div>
             <div class="form-group">
            <div class="row colbox">
            <div class="col-lg-4 col-sm-4">
                <label for="contacts" class="control-label">Contacts</label>
            </div>
            <div class="col-lg-8 col-sm-8">
                <input id="salary" name="contacts" placeholder="contacts" type="text" class="form-control" value="<?php echo $info['contacts']; ?>" />
                <span class="text-danger"><?php echo form_error('contacts'); ?></span>
            </div>
            </div>
            </div>
            <div class="col-lg-8 col-sm-8">
                <input id="salary" name="matriculeE" placeholder="matricule Etudient" type="hidden" hidden='hidden' class="form-control" value="<?php echo $matriculeE['matriculeEtudiant']; ?>" />
                <span class="text-danger"><?php echo form_error('prenom'); ?></span>
            </div>
            <div class="form-group">
            <div class="col-sm-offset-4 col-lg-8 col-sm-8 text-left">
                <input id="btn_add" name="btn_add" type="submit" class="btn btn-primary" value="Modifier" />
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