  
<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
   
 <div class="container">
    <div class="col-xs-12 hl-left">  



        <?php
        echo heading('Classe: ', '3');

        $attributes = array('class' => 'niceform');

        echo form_open('professeur/ajouter_programme_succe', $attributes);
        ?>
             <table id="rounded-corner" summary="cycle">
            <thead>
                <tr>
                    <th id="col" class="rounded">Matricule</th>
                    <th id="col" class="rounded">Nom </th>
                    <th id="col" class="rounded">Prenom </th>
                    <th id="col" class="rounded">Note </th>
                </tr>
            </thead>
            <tbody id="">
              <?php
                   
                     
                    for($i=0;$i<  sizeof($informations);$i++)
                    {
                       echo ' <tr>';
                       echo '<td>'.$informations[$i]['matriculeEtudiant'].'</td>';
                       echo '<td>'.$informations[$i]['nom'].'</td>';
                       echo '<td>'.$informations[$i]['prenom'].'</td>';
                       echo '<td>'.$informations[$i]['prenom'].'</td>';
                       echo '</tr>';
                    }
                    ?>
                 </tbody>
             </table>
             
                
         </form>
                </div>  
      
     
     </div><!-- end of right content-->
            
                    
  </div>   <!--end of center content -->               
                    
                    
    
    
    <div class="clear"></div>
    </div> <!--end of main content-->
	
    
  <?php include(APPPATH.'views/include/footer.php');?>