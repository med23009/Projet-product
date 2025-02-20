<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
   <div class="container">
    <div class="col-xs-12 hl-left">

         <?php echo heading('Paramètres : ','2');       
           echo form_open('scolarite/afficher_stat');
         ?>
        <!--<? php echo heading('Inscription automatique des étudiants dans les éléments ','3');?>  
       -->
        <div style="height: 30px;"></div>
        
       
        
        <div>
                       
            <br>
            <table width ="100%" style="background-color:#eee ; color: #000 ">
                           <?php 
        
                                   
        if(is_array($programme['idProgramme']))
        {
          echo '<strong>Programme :</strong>';
            echo '  <select name="idProgramme" id=""> ';
            echo '<option value="tout">Tout</option>';
            for($i=0;$i<count($programme['idProgramme']);$i++)
            {
                echo '<option value="'.$programme['idProgramme'][$i].'">'.$programme['nomProgramme'][$i].'</option>';
            }
            echo '</select>';
        }
      
                ?>
                
                <strong>Année d'étude :</strong>
               
                <select name="annee" id="">
                    <option value="2017">2019-2020</option>  
                    <option value="2017">2018-2019</option>  
                     <option value="2017">2017-2018</option>  
                    <option value="2016">2016-2017</option>
                    <option value="2015">2015-2016</option>
                    <option value="2014">2014-2015</option>
                    <option value="2013">2013-2014</option>
                     <option value="2012">2012-2013</option>
                </select>
                
            </table>

            <br>
            
                  </div>
        
        <div style="margin-left: 200px; position: relative;">
        </div>
        <br>
        <div class="submit">
                        <?php $pw = array('type' => 'submit', 'name' => 'submit', 'id'=>'submit', 'value'=>'Afficher des statistiques'); 
                            echo form_input($pw);?>
                    </div>
        <?php echo form_close('</div>');?>
           </div>
           <div class="clear"></div>
    </div> <!--end of main content-->

    <?php
  include(APPPATH.'views/include/footer.php');?>


