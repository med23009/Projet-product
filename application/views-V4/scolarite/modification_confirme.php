 
<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
   
   <div class="container">
    <div class="col-xs-12 hl-left">        
        
       
         
          <div class="<?php echo $typeBox; ?>">
                 <?php echo $informations;?>
            </div>
      
     <?php 
     //$validation='';
     if(isset($validation))
     {
         echo $validation;
     }
        if(isset($retour))
        {
            if($retour == 'retour')
            {
                $title = '<span class="bt_green_lft"></span><strong>Retour à \'Inscrire des étudiants\'</strong><span class="bt_green_r"></span>';
                $attributes = 'class="bt_green"';
                echo anchor('scolarite/inscrire_etudiant_module', $title, $attributes);
            }
            elseif($retour == 'desinscrire')
            {
                $title = '<span class="bt_green_lft"></span><strong>Retour à \'Désinscrire des étudiants\'</strong><span class="bt_green_r"></span>';
                $attributes = 'class="bt_green"';
                echo anchor('scolarite/desinscrire_etudiant_module', $title, $attributes);
            }
            elseif($retour == 'retourProgramme')
            {
                $title = '<span class="bt_green_lft"></span><strong>Retour à \'Inscrire des étudiants à un programme\'</strong><span class="bt_green_r"></span>';
                $attributes = 'class="bt_green"';
                echo anchor('scolarite/orienter_etudiant_filiere', $title, $attributes);
            }
            elseif($retour == 'rattrapage')
            {
                $title = '<span class="bt_green_lft"></span><strong>Retour à \'Entrer note de rattrapage\'</strong><span class="bt_green_r"></span>';
                $attributes = 'class="bt_green"';
                echo anchor('scolarite/rattrapage', $title, $attributes);
            }
            elseif($retour == 'generer_note_cote')
            {
                $title = '<span class="bt_green_lft"></span><strong>Retour à \'Générer les cotes\'</strong><span class="bt_green_r"></span>';
                $attributes = 'class="bt_green"';
                echo anchor('scolarite/generer_cote_view', $title, $attributes);
            }
        }
        if(isset($retourSigle)||isset($retourSigleValide))
        {
             $title = '<span class="bt_green_lft"></span><strong>Retour à \'Ajouter module\'</strong><span class="bt_green_r"></span>';
                $attributes = 'class="bt_green"';
                echo anchor('scolarite/cree_module', $title, $attributes);
        }
        if(isset($decision))
        {
            $title = '<span class="bt_green_lft"></span><strong>Retour à \'Saisir décision\'</strong><span class="bt_green_r"></span>';
                $attributes = 'class="bt_green"';
                echo anchor('scolarite/decision_manuelle', $title, $attributes);
        }
        if(isset($inscrireStudent))
        {
            $title = '<span class="bt_green_lft"></span><strong>Créer un nouvel étudiant.</strong><span class="bt_green_r"></span>';
                $attributes = 'class="bt_green"';
                echo anchor('scolarite/ajouter_etudiant', $title, $attributes);
        }
     ?>
     </div><!-- end of right content-->
            
                   
  </div>   <!--end of center content -->               
                    
                    
    
    
    <div class="clear"></div>
    </div> <!--end of main content-->
	
    
  <?php include(APPPATH.'views/include/footer.php');?>


