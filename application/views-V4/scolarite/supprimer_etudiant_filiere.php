<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
 <div class="container">
    <div class="col-xs-12 hl-left">

         <?php echo heading($titre,'2');       
           echo form_open('scolarite/desorienter_etudiants_filiere_validation');
         ?>
        <?php echo heading('Liste des étudiants: ','3');?>  
        <div style="height: 30px;"></div>
        
       <p style="font-size: x-large; height: 300px; overflow: auto; border: 5px solid #eee; background: #eee; color: #000; margin-bottom: 1.5em;">
        <?php 
        for($i=0;$i<count($etudiant['matricule']);$i++)
        {
        
            echo '<label><input type="checkbox" name="items['.$etudiant['matricule'][$i].']]">'.$etudiant['matricule'][$i].'</label>
            <label>'.$etudiant['nom'][$i].'</label> <label>'.$etudiant['prenom'][$i].'</label><br>';
        }
        ?>
        </p>
        
        
        <div>
            
        </div>
        <div style="margin-left: 200px; position: relative;">
        </div>
        <br>
        <div class="submit">
                <?php $pw = array('type' => 'submit', 'name' => 'submit', 'id'=>'submit', 'value'=>'Réorienter'); 
                            echo form_input($pw);?>
                    </div>
        <?php echo form_close('</div>');?>
           </div>
           <div class="clear"></div>
    </div> <!--end of main content-->

    <?php
  include(APPPATH.'views/include/footer.php');?>






