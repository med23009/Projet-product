<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
  <div class="container">
    <div class="col-xs-12 hl-left">

         <?php echo heading($titre,'2');       
           echo form_open('scolarite/inscrire_etudiants_cours_validation');
           if(!is_array($matricule))
           {
                echo '<div class="warning_box">
                    Aucun étudiant n\'est inscrit à ce module
                </div>';
           }
         ?>
        
        <?php 
        if(!isset($desinscrire))
        {
            echo '<div><b>Tous les étudiants sélectionnés seront inscrits avec le type de cours suivant :</b></div><br>';
            echo '<select  name="typeCours" id="">
                        <option value="obligatoire">OBLIGATOIRE</option>
                        <option value="horsProgramme">HORS PROGRAMME</option>
                    </select>';
            
        }
        ?>
        <div style="height: 20px;"></div>
        <div><b>Étudiants (en rouge, étudiant déjà inscrit à ce module)</b></div>
       <p style="font-size: x-large; height: 250px; overflow: auto; border: 5px solid #eee; background: #eee; color: #000; margin-bottom: 1.5em;">
        <?php 
        if($matricule!='')
        {
            for($i=0;$i<count($matricule);$i++)
            {
                if($estInscrit['estInscrit'][$i] == '1')
                {
                    echo '<label style=color:red;"><input type="checkbox" name="items['.$matricule[$i].']]">'.$matricule[$i].'</label>
                    <label>'.$infoEtudiant[$i]['nom'].'</label> <label>'.$infoEtudiant[$i]['prenom'].'</label><br>';
                }
                else
                {
                    echo '<label><input type="checkbox" name="items['.$matricule[$i].']]">'.$matricule[$i].'</label>
                    <label>'.$infoEtudiant[$i]['nom'].'</label> <label>'.$infoEtudiant[$i]['prenom'].'</label><br>';
                }
            }
            echo form_hidden('annee',$annee);
            echo form_hidden('session',$session);
            echo form_hidden('sigle',$sigle);
        }
        
        if(!isset($desinscrire))
        {
            echo '<div><b>Groupes du cours : '.$sigle.' </b></div>
            <p style="font-size: x-large; height: 100px; overflow: auto; border: 5px solid #eee; background: #eee; color: #000; margin-bottom: 1.5em;">';
            
            for($i=0;$i<count($groupe);$i++)
            {
                if(count($groupe) == 1)
                {
                    echo '<label><input type="checkbox" checked="true" name="groupe['.$groupe[$i].']]">'.$groupe[$i].'</label><br>';
                }
                else
                {
                echo '<label><input type="checkbox" name="groupe['.$groupe[$i].']]">'.$groupe[$i].'</label><br>';
                }
            }
            
        }       
        ?>
        <div style="margin-left: 200px; position: relative;">
             <?php 
            if(isset($desinscrire))
            {
                if(is_array($matricule))
                {
                    echo form_hidden('desinscrire',$desinscrire);
                    $pw = array('type' => 'submit', 'name' => 'submit', 'id'=>'submit', 'value'=>'Supprimer');
                    echo form_input($pw);
                 }
                 
            }
            else
            {
                $pw = array('type' => 'submit', 'name' => 'submit', 'id'=>'submit', 'value'=>'Enregistrer');
                echo form_input($pw);
            }?>
        </div>
        <?php echo form_close('</div>');?>
           </div>
           <div class="clear"></div>
    </div> <!--end of main content-->

    <?php
  include(APPPATH.'views/include/footer.php');?>


