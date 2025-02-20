<?php
include(APPPATH.'views/include/header.php');
include('include/menu.php');
?>
<head>
    <meta charset="UTF-8">
</head>
<div class="container">
    <div class="col-xs-12 hl-left">
        <?php
            $parametres = (Array) $parametres;
            //print_r($parametres);
            //echo getDate()['year'].'-'.getDate()['m'].'-'.getDate()['wday'];
            ?>
        <h2>Modifier les Paramètres Généraux
            <br>
            <br>
            <span class="label label-default">date d'activation: <?php echo $parametres['date_d'];?></span>
        </h2> 
        <a>
            
        </a>
        <?php
        if (isset($Error)) {
            ?>
            <div class="<?php if ($Error == 1) echo 'alert alert-danger';
        else echo 'alert alert-success' ?>"><?php if (isset($message)) echo $message; ?></div>
            <?php
        }
        ?>
        <?php echo form_open_multipart('administrateur/modification_parametres_generaux'); ?>
        <?php $input['nom'] = array('class' => 'form-control', 'type' => 'text', 'name' => 'nom', 'value' => $parametres["nom"]); ?>
        <?php $input['nom_ar'] = array('class' => 'form-control', 'type' => 'text', 'name' => 'nom_ar', 'value' => $parametres["nom_ar"]); ?>
        <?php $input['abreviation_nom'] = array('class' => 'form-control', 'type' => 'text', 'name' => 'abreviation_nom', 'value' => $parametres["abreviation_nom"]); ?>
        <?php $input['abreviation_nom_ar'] = array('class' => 'form-control', 'type' => 'text', 'name' => 'abreviation_nom_ar', 'value' => $parametres["abreviation_nom_ar"]); ?>
        <?php $input['pays'] = array('class' => 'form-control', 'type' => 'text', 'name' => 'pays', 'value' => $parametres["pays"]); ?>
        <?php $input['pays_ar'] = array('class' => 'form-control', 'type' => 'text', 'name' => 'pays_ar', 'value' => $parametres["pays_ar"]); ?>
        <?php $input['ville'] = array('class' => 'form-control', 'type' => 'text', 'name' => 'ville', 'value' => $parametres["ville"]); ?>
        <?php $input['ville_ar'] = array('class' => 'form-control', 'type' => 'text', 'name' => 'ville_ar', 'value' => $parametres["ville_ar"]); ?>
        <?php $input['adresse'] = array('class' => 'form-control', 'type' => 'text', 'name' => 'adresse', 'value' => $parametres["adresse"]); ?>
        <?php $input['boite_postale'] = array('class' => 'form-control', 'type' => 'text', 'name' => 'boite_postale', 'value' => $parametres["boite_postale"]); ?>
        <?php $input['email'] = array('class' => 'form-control', 'type' => 'text', 'name' => 'email', 'value' => $parametres["email"]); ?>
        <?php $input['telephone'] = array('class' => 'form-control', 'type' => 'text', 'name' => 'telephone', 'value' => $parametres["telephone"]); ?>
        <?php $input['siteweb'] = array('class' => 'form-control', 'type' => 'text', 'name' => 'siteweb', 'value' => $parametres["siteweb"]); ?>
<?php $input['submit'] = array('class' => 'form-control', 'type' => 'submit', 'name' => 'submit', 'id' => 'submit', 'value' => 'Enregistrer'); ?>
        <!--
        <script>
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = today.getFullYear();
            today = yyyy + '-' +mm  + '-' + dd;
            alert(today);
        </script>-->

        <!-- pour afficher le logo selectionne immediatement apres sa selection -->
        <script type="text/javascript">
            function refresh_image(fileInput) {
                var logo = document.getElementById('logo');
                var files = fileInput.files;
                //logo.src="<?php echo base_url(); ?>/images/"+files[0].name;
            }
        </script>

        <div class="form-group">
            <table class=" table">
                <tr>
                    <td>Logo</td>
                    <td>
                        <img id="logo" class="img-thumbnail" width="150" src="<?php echo base_url(); ?>/images/<?php echo $parametres['logo'] ?>"></img>
                        <br>
                        <br>
                        <input type="file" name="logo" size="20" onchange="refresh_image(this)" value="<?php echo base_url(); ?>/images/<?php echo $parametres['logo'] ?>"/>
                    
                    </td>
                    
                </tr>
                <tr>
                    <td>Nom Français</td>
                    <td>

<?php echo form_input($input['nom'], 'required'); ?>
                    </td>
                </tr>
                <tr>
                    <td>Nom Arabe</td>
                    <td>
<?php echo form_input($input['nom_ar']); ?>
                    </td>
                </tr>
                <tr>
                    <td>Abréviation Français</td>
                    <td>
<?php echo form_input($input['abreviation_nom'], 'required'); ?>
                    </td>
                </tr>
                <tr>
                    <td>Abréviation Arabe</td>
                    <td>
<?php echo form_input($input['abreviation_nom_ar']); ?>
                    </td>
                </tr>
                <tr>
                    <td>Pays Français</td>
                    <td>
<?php echo form_input($input['pays'], 'required'); ?>
                    </td>
                </tr>
                <tr>
                    <td>Pays Arabe</td>
                    <td>
<?php echo form_input($input['pays_ar']); ?>
                    </td>
                </tr>
                <tr>
                    <td>Ville Français</td>
                    <td>
<?php echo form_input($input['ville']); ?>
                    </td>
                </tr>
                <tr>
                    <td>Ville Arabe</td>
                    <td>
<?php echo form_input($input['ville_ar']); ?>
                    </td>
                </tr>
                <tr>
                    <td>Adresse</td>
                    <td>
<?php echo form_input($input['adresse']); ?>
                    </td>
                </tr>
                <tr>
                    <td>Boite Postale</td>
                    <td>
<?php echo form_input($input['boite_postale']); ?>
                    </td>
                </tr>
                <tr>
                    <td>E-mail</td>
                    <td>
<?php echo form_input($input['email']); ?>
                    </td>
                </tr>
                <tr>
                    <td>Téléphone</td>
                    <td>
<?php echo form_input($input['telephone']); ?><span  class="glyphicon glyphicon-plus-sign" style="color: green"></span>
                        
                    </td>
                </tr>
                <tr>
                    <td>Site web</td>
                    <td>
<?php echo form_input($input['siteweb']); ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
<?php echo form_input($input['submit']); ?>
                    </td>
                </tr>
            </table>
            <input type="hidden" name="responsable" value="<?PHP 
                echo $this->session->userdata('matriculeEmploye');  
            ?>"/>
                   <?php echo form_close(); ?>
        </div>
        <!--div class="hystorique_parametres">
            <b>hystorique_parametres</b>
            <table style="width:100%">
                <tr>
                    <th>Logo</th>
                    <th>Nom Français</th>
                    <th>Nom Arabe</th>
                    <th>Abreviation Français</th>
                    <th>Abreviation Arabe</th>
                    <th>Pays Français</th>
                    <th>Pays Arabe</th>
                    <th>Ville Français</th>
                    <th>Ville Arabe</th>
                    <th>Adresse</th>
                    <th>Boite Postale</th>
                    <th>Site web</th>
                    <th>E-mail</th>
                    <th>Telephone</th>
                    <th>Responsable</th>
                    
                </tr>
                <tr>
                    <td>Jill</td>
                    <td>Smith</td> 
                    <td>50</td>
                </tr>
            </table>
        </div-->
    </div>   <!--end of center content -->               

    <div class="clear"></div>
</div> <!--end of main content-->


<?php include(APPPATH.'views/include/footer.php'); ?>