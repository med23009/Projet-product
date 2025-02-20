<?php
include(APPPATH.'views/include/header.php');
include('include/menu.php');
?>
<style>
    .cont_form{
        width:50%;
    }
    
</style>
<head>
    <meta charset="UTF-8">
</head>
<div class="container">
    <div class="col-xs-12 hl-left">
        <h2>Modifier les regles de passage
        </h2> 
        <a>
            <?php
            $parametres = (Array) $parametres;
            //print_r($parametres);
            //echo getDate()['year'].'-'.getDate()['m'].'-'.getDate()['wday'];
            ?>
        </a>
        <?php
        if (isset($Error)) {
            ?>
            <div class="<?php if ($Error == 1) echo 'alert alert-danger';
        else echo 'alert alert-success' ?>"><?php if (isset($message)) echo $message; ?></div>
            <?php
        }
        $parametres=$parametres[0];
        ?>
        <?php echo form_open_multipart('administrateur/modification_regles_passage'); ?>
        <?php //$input['cycle'] = array('class' => 'form-control', 'type' => 'text', 'name' => 'nom', 'value' => $parametres["nom"]); ?>
        <?php //$input['niveau'] = array('class' => 'form-control', 'type' => 'text', 'name' => 'nom_ar', 'value' => $parametres["nom_ar"]); ?>
        <?php $input['moyenne'] = array('class' => 'form-control', 'type' => 'number','step'=>"any" ,'min'=>"0" ,'max'=>"20" , 'name' => 'moyenne', 'value' => $parametres["moyenne"]); ?>
        <?php $input['credit'] = array('class' => 'form-control', 'type' => 'number','step'=>"1" ,'min'=>"0" ,'max'=>"180", 'name' => 'credit', 'value' => $parametres["credit"]); ?>
        <?php $input['MGL1'] = array('class' => 'form-control', 'type' => 'number', 'name' => 'MGL1', 'value' => $parametres["MGL1"]); ?>
        <?php $input['ECTSL1'] = array('class' => 'form-control', 'type' => 'integer', 'name' => 'ECTSL1', 'value' => $parametres["ECTSL1"]); ?>
        <?php $input['MGL2'] = array('class' => 'form-control', 'type' => 'number', 'name' => 'MGL2', 'value' => $parametres["MGL2"]); ?>
        <?php $input['ECTSL2'] = array('class' => 'form-control', 'type' => 'integer', 'name' => 'ECTSL2', 'value' => $parametres["ECTSL2"]); ?>
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
        <div class ="cont_form">
        <div class="form-group">
            
            <table class=" table">
                
                <tr>
                    <td>Cycle</td>
                    <td>
                        <select class="form-control" name="cycle" onchange="maj_option(this)">
                            <option value="4">Licence</option>
                            <option value="5">Master</option>
                        </select>
                    </td>
                </tr>
                <script>


                function maj_option(cycle){
                        var niveau=document.getElementById('option');
                        if(cycle.value==4){
                                niveau.innerHTML='<select class="form-control " name="niveau" id="option" ><option value="1" >L1</option><option value="2" >L2</option><option value="3" >L3</option></select>';
                        }
                        else{
                                niveau.innerHTML='<select class="form-control " name="niveau" id="option" ><option value="1" >M1</option><option value="2" >M2</option></select>';
                       
                        }
                            
                    }
                    
                </script>
                <tr>
                    <td>Niveau</td>
                    <td>
<!--                        <div id="div_niveau">
                            <select class="form-control " name="niveau" id="optionLicence" >
                                <option value="1" class="optionLicence" id="optionLicence">L1</option>
                                <option value="2" class="optionLicence">L2</option>
                                <option value="3" class="optionLicence">L3</option>
                                <option value="1" class="optionMastre" id="optionMastre">M1</option>
                                <option value="2" class="optionMastre">M2</option>
                            </select>
                            <script> $('.optionMastre').hide();</script>
                        </div>-->

                         <div id="div_niveau">
                            <select class="form-control " name="niveau" id="option" >
                                <option value="1" >L1</option>
                                <option value="2" >L2</option>
                                <option value="3" >L3</option>
                                
                            </select>
                            
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Moyenne</td>
                    <td>
<?php echo form_input($input['moyenne'], 'required'); ?>
                    </td>
                </tr>
                <tr>
                    <td>Credits</td>
                    <td>
<?php echo form_input($input['credit'], 'required'); ?>
                    </td>
                </tr>
                <tr>
                    <td>Moy. Gen. L1</td>
                    <td>
<?php echo form_input($input['MGL1']); ?>
                    </td>
                </tr>
                <tr>
                    <td>Credits L1</td>
                    <td>
<?php echo form_input($input['ECTSL1']); ?>
                    </td>
                </tr>
                <tr>
                    <td>Moy. Gen. L2</td>
                    <td>
<?php echo form_input($input['MGL2']); ?>
                    </td>
                </tr>
                <tr>
                    <td>Credits L2</td>
                    <td>
<?php echo form_input($input['ECTSL2']); ?>
                    </td>
                </tr>
                <tr>
                    <td>
<?php echo form_input($input['submit']); ?>
                    </td>
                </tr>
            </table>
            <input type="hidden" name="responsable" value="<?PHP 
                echo $this->session->userdata('matriculeEmploye');  
            ?>"/>
                   <?php echo form_close(); ?>
        </div>
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