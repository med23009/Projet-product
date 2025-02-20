<?php include(APPPATH.'views/include/header.php');
include('include/menu.php');
?>

<div class="center_content">  
    <div class="right_content">            


        <?php
        echo heading('Consulter les informations personnelles d\'un étudiant ', '1');
        $attributes = array('class' => 'niceform');
        echo form_open('secretaire/trouver_etudiant_a_consulter', $attributes);
        ?>
        <div class="clear"></div>
                <table class="form" id="info_etudiant">
            <tr>
                <td id="titre"><label>Matricule :</label></td>
                <td id="contenu"><label><big><big><b><?php echo $matricule; ?></b></big></big></label></td>
            </tr>
             <tr>
                <td id="titre"><label>Code d'accès :</label></td>
                <td id="contenu"><label><?php echo $username; ?></label></td>
            </tr>
            <tr>
                <td id="titre"><label>Nom :</label></td>
                <td id="contenu"><label><?php echo $nom; ?></label></td>
            </tr>

            <tr>
                <td id="titre"><label>Prénom :</label></td>
                <td id="contenu"><label><?php echo $prenom; ?></label></td>
            </tr>
            <tr>
                <td id="titre"><label>Actif :</label></td>
                <td id="contenu"><label><?php 
                if($actif == '1')
                    echo 'oui';
                else
                    echo 'non';?></label></td>
            </tr>
            
            <tr>
                <td id="titre"><label>Date et raison d'abandon :</label></td>
                <td id="contenu"><label><?php echo $raisonInactif; ?></label></td>
            </tr>

            <tr>
                <td id="titre"><label>Genre :</label></td>
                <td id="contenu"><label><?php echo $sexe; ?></label></td>
            </tr>
            <tr>
                <td id="titre"><label>Date de naissance :</label></td>
                <td id="contenu"><label><?php echo date('d/m/Y',strTotime($dateNaissance)); ?></label></td>
            </tr>

            <tr>
                <td id="titre"><label>Numéro d'identité nationale :</label></td>
                <td id="contenu"><label><?php echo $nin; ?></label></td>
            </tr>

            <tr  style="width: 600px;">
                <td><label>Nationalité :</label></td>
                <td><?php
        $input = array('type' => 'text', 'disabled' => 'disabled', 'size' => '35', 'name' => 'nationalite');
        echo form_input($input, $nationalite, 'required');
        echo form_error('nationalite', '<span class="error">', '</span>');
        ?></td>
            </tr>

            <tr>
                <td id="titre"><label>E-mail :</label></td>
                <td><?php
        $input = array('type' => 'text', 'disabled' => 'disabled', 'size' => '35', 'name' => 'email');
        echo form_input($input, $email, 'required');
        echo form_error('email', '<span class="error">', '</span>');
        ?>
                </td>
            </tr>
            <tr>
                <td><label >Téléphone 1 :</label></td>
                <td><?php
                    $input = array('type' => 'text', 'disabled' => 'disabled', 'size' => '35', 'name' => 'phone1');
                    echo form_input($input, $telephone1, 'required');
                    echo form_error('phone1', '<span class="error">', '</span>');
        ?>
                </td>
            </tr>
            <tr>
                <td><label >Téléphone 2 :</label></td>
                <td><?php
                    $input = array('type' => 'text', 'disabled' => 'disabled', 'size' => '35', 'name' => 'phone2');
                    echo form_input($input, $telephone2, 'required');
                    echo form_error('phone2', '<span class="error">', '</span>');
        ?>
                </td>
            </tr>
        </table>
        <div class="clear"></div>  
        <div><?php echo heading('Adresse :', '3'); ?></div>
        <div class="clear"></div>
        <table class="form" id="info_etudiant">

            <tr   style="width: 600px;">
                <td style="width: 243px;"><label>Ligne 1:</label></td>
                <td><?php
                    $input = array('type' => 'text', 'disabled' => 'disabled', 'size' => '35', 'name' => 'ligne1');
                    echo form_input($input, $ligne1, '');
                    echo form_error('ligne1', '<span class="error">', '</span>');
        ?></td>
            </tr>

            <tr>
                <td style="width: 243px;"><label>Ligne 2:</label></td>
                <td><?php
                    $input = array('type' => 'text', 'disabled' => 'disabled', 'size' => '35', 'name' => 'ligne2');
                    echo form_input($input, $ligne2, '');
                    echo form_error('ligne2', '<span class="error">', '</span>');
        ?></td>
            </tr>

            <tr>
                <td style="width: 243px;"><label>Ville :</label></td>
                <td><?php
                    $input = array('type' => 'text', 'disabled' => 'disabled', 'size' => '35', 'name' => 'ligne3');
                    echo form_input($input, $ligne3, '');
                    echo form_error('ligne3', '<span class="error">', '</span>');
        ?></td>
            </tr>

            <tr>
                <td style="width: 243px;"><label>Pays :</label></td>
                <td><?php
                    $input = array('type' => 'text', 'disabled' => 'disabled', 'size' => '35', 'name' => 'pays');
                    echo form_input($input, $pays, '');
                    echo form_error('pays', '<span class="error">', '</span>');
        ?></td>
            </tr>
        </table>

        <div><?php echo heading('Parents ou responsable légal:', '3'); ?></div>
        <div class="clear"></div>
        <table class="form" id="info_etudiant">

            <tr   >
                <td style="width: 243px;"><label>Ligne 1 :</label></td>
                <td><?php
                    $input = array('type' => 'text', 'disabled' => 'disabled', 'size' => '35', 'name' => 'ligne1');
                    echo form_input($input, $ligne_1, '');
                    echo form_error('ligne1', '<span class="error">', '</span>');
        ?></td>
            </tr>

            <tr>
                <td style="width: 243px;"><label>Ligne 2 :</label></td>
                <td><?php
                    $input = array('type' => 'text', 'disabled' => 'disabled', 'size' => '35', 'name' => 'ligne2');
                    echo form_input($input, $ligne_2, '');
                    echo form_error('ligne2', '<span class="error">', '</span>');
        ?></td>
            </tr>

            <tr>
                <td style="width: 243px;"><label>Ville :</label></td>
                <td><?php
                    $input = array('type' => 'text', 'disabled' => 'disabled', 'size' => '35', 'name' => 'ligne3');
                    echo form_input($input, $ligne_3, '');
                    echo form_error('ligne3', '<span class="error">', '</span>');
        ?></td>
            </tr>

            <tr>
                <td style="width: 243px;"><label>Pays :</label></td>
                <td><?php
                    $input = array('type' => 'text', 'disabled' => 'disabled', 'size' => '35', 'name' => 'pays');
                    echo form_input($input, $paysP, '');
                    echo form_error('pays', '<span class="error">', '</span>');
        ?></td>
            </tr>
            <tr>
                <td><label >Téléphone :</label></td>
                <td><?php
                    $input = array('type' => 'text', 'disabled' => 'disabled', 'size' => '35', 'name' => 'telParent');
                    echo form_input($input, $telephoneParents, 'required');
                    echo form_error('telParent', '<span class="error">', '</span>');
        ?>
                </td>
            </tr>

        </table>

        <div><?php echo heading('Contact d\'urgence:', '3'); ?></div>
        <div class="clear"></div>
        <table class="form" id="info_etudiant">
            <tr>
                <td style="width: 243px;"><label >Nom :</label></td>
                <td><?php
                    $input = array('type' => 'text', 'disabled' => 'disabled', 'size' => '35', 'name' => 'contactUrgence');
                    echo form_input($input, $contactUrgence, 'required');
                    echo form_error('contactUrgence', '<span class="error">', '</span>');
        ?></td>
            </tr>

            <tr>
                <td style="width: 243px;"><label>Lien de parenté :</label></td>
                <td><?php
                    $input = array('type' => 'text', 'disabled' => 'disabled', 'size' => '35', 'name' => 'lienParenteContactUrgence');
                    echo form_input($input, $lienParenteContactUrgence, 'required');
                    echo form_error('lienParenteContactUrgence', '<span class="error">', '</span>');
        ?></td>
            </tr>

            <tr>
                <td><label>Téléphone d'urgence :</label></td>
                <td><?php
                    $input = array('type' => 'text', 'disabled' => 'disabled', 'size' => '35', 'name' => 'telephoneUrgence');
                    echo form_input($input, $telephoneUrgence, 'required');
                    echo form_error('telephoneUrgence', '<span class="error">', '</span>');
        ?></td>
            </tr>
        </table>

        <td></td>
        <div><?php echo heading('Études antérieures  :', '3'); ?></div>
        <div class="clear"></div>
        <table class="form" id="info_etudiant">
            <tr>
                <td style="width: 243px;"><label >Baccalauréat obtenu :</label></td>
                <td><?php
                    $input = array('type' => 'text', 'disabled' => 'disabled', 'size' => '35', 'name' => 'typeDiplome');
                    echo form_input($input, $infoBac, 'required');
        ?></td>
            </tr>

            <tr>
                <td style="width: 243px;"><label>Nom de l'établissement :</label></td>
                <td><?php
                    $input = array('type' => 'text', 'disabled' => 'disabled', 'size' => '35', 'name' => 'nomEtablissement');
                    echo form_input($input, $nomEtablissement, 'required');
                    echo form_error('nom etablissement', '<span class="error">', '</span>');
        ?></td>
            </tr>

            <tr>
                <td style="width: 243px;"><label>Année d'obtention :</label></td>
                <td><?php
                    $input = array('type' => 'text', 'disabled' => 'disabled', 'size' => '35', 'name' => 'dateObtention');
                    echo form_input($input, $anneeObtention, 'required');
                    echo form_error('date d\'obtention', '<span class="error">', '</span>');
        ?></td>    </tr>
            <tr>

                <td style="width: 243px;"><label>Moyenne au baccalauréat :</label></td>
                <td><?php
                    $input = array('type' => 'text', 'disabled' => 'disabled', 'size' => '35', 'name' => 'mention');
                    echo form_input($input, $moyenneBac, 'required');
                    echo form_error('mention', '<span class="error">', '</span>');
        ?></td>
            </tr>
            <tr>
                <td style="width: 243px;"><label>Autre diplôme :</label></td>
                <td><?php
                    $input = array('type' => 'text', 'disabled' => 'disabled', 'size' => '35', 'name' => 'autre diplome');
                    echo form_input($input, $autreDiplome, 'required');
                    echo form_error('autre diplome', '<span class="error">', '</span>');
        ?></td>
            </tr>
        </table>
        
        <div class="clear"></div>
        <table class="form" id="info_etudiant">

            <tr>
                <td style="width: 243px;"><label>Commentaires d'admission :</label></td>
                <td><?php
                    $input = array('type' => 'text', 'disabled' => 'disabled', 'size' => '35', 'name' => 'commentaires');
                    echo form_textarea($input, $commentaireAdmission, 'required');
                    echo form_error('telephoneUrgence', '<span class="error">', '</span>');
        ?></td>
            </tr>
            
            <tr>
                <td><label>Programme  actuel :</label></td>
                <td><?php
                      
    
  if ($programme_etudiant['idProgramme'] !=NULL )
  {
           echo'<ul>
        <li>'.$programme_etudiant['nomProgramme'].'</li>

        </ul>';

  }
  else
  {
         echo'<ul>
        <li>Aucun programme</li>

        </ul>';
  }
        
  
        ?></td>
            </tr>
            <tr>
                <td><label>Grade actuel :</label></td>
                <td><ul><li><?php echo $grade;?></li></ul></td>
            </tr>
            <td></td>
            <td>
<?php $pw = array('type' => 'submit', 'name' => 'consulter_autre', 'id' => 'consulter_autre', 'value' => 'Consulter un autre étudiant');
echo form_input($pw);
?>
            </td>
            
            </tr>
        </table>




    </div><!-- end of right content-->
    <div class="left_content">
        <img style="width: 140px; height: 200px;" src="<?php
        if($urlPhoto!='')
        echo "../../../photos/".$urlPhoto; 
        else
            echo "../../../photos/default.gif";  
        ?>" onerror="this.src='../../../photos/default.gif';"/>
    </div>

</div>   <!--end of center content -->                           



<div class="clear"></div>
</div> <!--end of main content-->


<?php include(APPPATH.'views/include/footer.php'); ?>