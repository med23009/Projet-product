<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
  <div class="container">
    <div class="col-xs-12 hl-left"> 

        
         <?php
         if ($info == 'saisir')
         echo heading('Saisir/modifier les notes','3');
        else 
            echo heading('Valider les notes','1');
        
        //echo heading('Veuillez choisir l\'année et le semestre','3');


           $attributes = array('class' => '');

          echo form_open('professeur/afficher_cours',$attributes);
            ?>
        
        
        <div style="height: 30px;"></div>
        
       
        
        
        <div>
            <table style="width: 400px;">
                <tr>
                    <td style="font-size: large;">Programme: </td>
                    <td>
                        
        <?php                if(is_array($programme['idProgramme']))
        {
          
            echo ' <select name="idProgramme" id="" class=form-control > ';
            
            for($i=0;$i<count($programme['idProgramme']);$i++)
            {
                echo '<option value="'.$programme['idProgramme'][$i].'">'.$programme['nomProgramme'][$i].'</option>';
            }
            echo '</select>';
        }
                ?>
                    </td>
                </tr>
                
                <tr>
                    <td style="font-size: large;">Année :</td>
                    <td> 
                <?php        
                        echo ' <select name="annee" id="" class=form-control> ';
                echo '<option value="'.$courante['annee'][0].'">'.$courante['annee'][0].'</option>';
                for($i=0;$i<sizeof($annee['date']);$i++)
                    if($annee['date'][$i]!= $courante['annee'][0])
                    echo '<option value="'.$annee['date'][$i].'">'.$annee['date'][$i].'</option>';

                echo '</select>';
                ?>
                    </td>
                </tr>
                <tr>
                    <td style="font-size: large;">Grade :</td>
                    <td>
                    <?php
                        echo ' <select name="grade" id="" class=form-control> ';
                        for($i=0;$i<count($grade['idGrade']);$i++)
                        {
                                echo '<option value="'.$grade['idGrade'][$i].'">'.$grade['idGrade'][$i].'</option>';
                        }
                        echo '</select>';
                    ?>
                    </td>
                </tr>
                <tr>
                    <td style="font-size: large;">Semestre :</td>
                    <td>
                    <?php
                        echo ' <select name="semestre" id="" class=form-control> ';
                        for($i=0;$i<count($semestres);$i++)
                        {
                                echo '<option value="'.$semestres[$i].'"> S'.$semestres[$i].'</option>';
                        }
                        
                        echo '</select>';
                    ?>
                    </td>
                </tr>
                 <tr>
                 <td class="submit">
                 <?php $pw = array('type' => 'submit', 'name' => 'submit', 'id'=>'submit', 'value'=>'Suivant');
                 echo form_input($pw);?>
                 </td>
            </tr>
            
             </table>
           </div>
        <div style="margin-left: 200px; position: relative;">
        </div>
        <br>
        
        
        
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


