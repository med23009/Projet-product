 <?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
<div class="container">
    <div class="col-xs-12 hl-left">

         <?php
           //$attributes = array('class' => 'niceform');
          
                echo form_open('controller_tcpdf/list_etu_salle_exam');
                //echo '<table class="form" id="tableProf">';
                 //echo form_hidden('matriculeEtudiant', $matriculeEtudiant);
               
          ?>
    <div class="row">
        <div class="col-sm-offset-3 col-lg-6 col-sm-6 well">
        <legend>Liste des étudiants par salle d'examen</legend>
                 <!--
                              <td>Filiere :</td>
                   
                    <td>
                            -->              
           <div class="form-group">
            <div class="row colbox">
            
            <div class="col-lg-4 col-sm-4">
                <label for="num_bac" class="control-label">Filiere :</label>
            </div>
            <div class="col-lg-8 col-sm-8">
                  <?php 
                                   
        if(is_array($programme['idProgramme']))
        {
          
            echo ' <select class="form-control"  name="idProgramme" id=""> ';
             echo '<option value=""></option>';
            for($i=0;$i<count($programme['idProgramme']);$i++)
            {
                echo '<option value="'.$programme['idProgramme'][$i].'">'.$programme['nomProgramme'][$i].'</option>';
            }
            echo '</select>';
        }
                ?>
                     </div>
            </div>
            </div>
                            
                            <div class="form-group">
            <div class="row colbox">
            
            <div class="col-lg-4 col-sm-4">
                <label for="num_bac" class="control-label">Salles :</label>
            </div>
            <div class="col-lg-8 col-sm-8">
                  <?php 
                                   
        if(is_array($salles))
        {
          
            echo ' <select class="form-control"  name="salle" id=""> ';
             echo '<option value=""></option>';
            for($i=0;$i<count($salles);$i++)
            {
                echo '<option value="'.$salles[$i].'">'.$salles[$i].'</option>';
            }
            echo '</select>';
        }
                ?>
                     </div>
            </div>
            </div>
                            
                              <div class="form-group">
            <div class="row colbox">
            
            <div class="col-lg-4 col-sm-4">
                <label for="num_bac" class="control-label">Niveau :</label>
            </div>
            <div class="col-lg-8 col-sm-8">
                  <?php 
                                   
        if(is_array($niveau))
        {
          
            echo ' <select class="form-control"  name="niveau" id=""> ';
           
            for($i=0;$i<count($niveau);$i++)
            {
                echo '<option value="'.$niveau[$i].'">L'.$niveau[$i].'</option>';
            }
            echo '</select>';
        }
                ?>
                     </div>
            </div>
            </div>
                            
                 <td class="submit">
                 <?php $pw = array('type' => 'submit', 'name' => 'submit', 'id'=>'submit', 'value'=>'Valider');
                 echo form_input($pw);?>
                 </td>
            </tr>
         </table>
          <?php
                   
                   echo form_fieldset_close();
        echo form_close('</div>');?>
           </div>
           <div class="clear"></div>
    </div> <!--end of main content-->

    <?php
  include(APPPATH.'views/include/footer.php');?>