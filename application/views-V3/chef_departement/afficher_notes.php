<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
   
   
 <div class="container">
    <div class="col-xs-12 hl-left">  
            
        
        <?php echo heading($titre,'2');?>
        <?php echo $soustitre;?>
        <div class="form">
          <?php $attributes = array('class' => 'niceform');
          if(is_array($matricules))
          {
          echo form_open('chef_departement/'.$redirection, $attributes);?>
 
             
         <table id="rounded-corner">
            <thead>
                <tr>
                    <th id="col" class="rounded">Matricule</th>
                    <th id="col" class="rounded">Note </th>
                </tr>
            </thead>
            <tbody id="liste des étudiants">
                <?php 
                $input = array('type' => 'text', 'size' => '10', 'disabled'=>'disabled');

               
                    foreach($matricules as $matricule)
                    {
                        echo 
                        '<tr>
                            <td>'.$matricule.'</td>
                            <td>'.form_input($input, $resultats[$matricule]);
                            '</td>
                        </tr>';
                    }
                
                ?>
                        
            </tbody>
             
            </table>
            <?php echo form_hidden('sigle', $sigle); ?>
            <?php echo form_hidden('annee', $annee); ?>
            <?php echo form_hidden('semestre', $semestre); ?>
            <table>
                <tr class="submit">
                    <td id="submit"><input type="submit" name="submit" id="submit" value="<?php echo $boutton ?>"/></td>
                </tr>
            </table>
            
            </form> 
            <?php
          }
          ?>
        </div>
        
     
     </div><!-- end of right content-->
            
                    
  </div>   <!--end of center content -->               
                    
                    
    
    
    <div class="clear"></div>
    </div> <!--end of main content-->
	
    
  <?php include(APPPATH.'views/include/footer.php');?>