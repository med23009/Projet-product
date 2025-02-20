<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
 <div class="container">
    <div class="col-xs-12 hl-left"> 

        
         <?php
         if ($info == 'saisir')
         echo heading('Saisir/modifier les notes','2');
        else 
            echo heading('Valider les notes','2');
        
        //echo heading('Veuillez choisir l\'année et le semestre','3');


           $attributes = array('class' => 'niceform');

          echo form_open('professeur/afficher_cours_exam');
            ?>
        
        <fieldset>
        <div class="form-group">
                <label class="control-label col-sm-2" for="email">Programme :</label>
                      <div class="col-sm-10">
       <?php                if(is_array($programme['idProgramme']))
        {
          
            echo ' <select class="form-control" name="idProgramme" id=""> ';
            
            for($i=0;$i<count($programme['idProgramme']);$i++)
            {
                echo '<option value="'.$programme['idProgramme'][$i].'">'.$programme['nomProgramme'][$i].'</option>';
            }
            echo '</select>';
        }
                ?>
    </div>
  </div>
                        
        <div class="form-group">
                <label class="control-label col-sm-2" for="email">Année:</label>
                      <div class="col-sm-10">
                    
                <?php        
                        echo ' <select class="form-control" name="annee" id=""> ';
                echo '<option value="'.$courante['annee'][0].'">'.$courante['annee'][0].'</option>';
                for($i=0;$i<sizeof($annee['date']);$i++)
                    if($annee['date'][$i]!= $courante['annee'][0])
                    echo '<option value="'.$annee['date'][$i].'">'.$annee['date'][$i].'</option>';

                echo '</select>';
                ?>
                  </div>
  </div>
          <div class="form-group">
                <label class="control-label col-sm-2" for="email">Grade :</label>
                      <div class="col-sm-10">
                   
                    <?php
                        echo ' <select class="form-control" name="grade" id=""> ';
                        for($i=0;$i<count($grade['idGrade']);$i++)
                        {
                                echo '<option value="'.$grade['idGrade'][$i].'">'.$grade['idGrade'][$i].'</option>';
                        }
                        echo '</select>';
                    ?>
                              </div>
  </div>
          <div class="form-group">
                <label class="control-label col-sm-2" for="email">Semestre :</label>
                      <div class="col-sm-10">
              
                    <?php
                        echo ' <select class="form-control" name="semestre" id=""> ';
                        for($i=0;$i<count($semestres);$i++)
                        {
                                echo '<option value="'.$semestres[$i].'"> S'.$semestres[$i].'</option>';
                        }
                        
                        echo '</select>';
                    ?>
                      </div>
  </div>
        <div class="form-group">
                <label class="control-label col-sm-2" for="email">Sans anonymat :</label>
                      <div class="col-sm-10">
              
                      <?php
                    $input = array('type' => 'checkbox', 'name' => 'anonymat', 'value' => '0', 'class' => 'form-control','checked'=>'');
                    echo form_input($input,'','');
                    ?>   </div>
  </div>
                
                 <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
        <?php $pw = array('type' => 'submit', 'name' => 'submit', 'id'=>'submit', 'value'=>'Suivant','class'=>"btn btn-default");
                 echo form_input($pw);?>
    </div>
  </div>
                
     
        </fieldset>
        
        
         <?php
			echo form_hidden('option',$option); ?>
                 
        <?php 
        if(isset($isValid))
        {
            echo form_hidden('valide', 'valide');
        }
            echo form_close('</div>');
        ?>
           </div>
           <div class="clear"></div>
    </div> <!--end of main content-->

    <?php
  include(APPPATH.'views/include/footer.php');?>


