<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
   
 <div class="container">
    <div class="col-xs-12 hl-left"> 
            
        
        <?php echo heading('Valider Note','2');?>

        <div class="form">
          <?php $attributes = array('class' => 'niceform');
         
          echo form_open('professeur/valider_note',$attributes);
          
          echo form_hidden('post',$post);
          ?>
            <input type="submit" name="submit" id="submit" value="Valider" />
             
            </form> 
        </div>
        
     
     </div><!-- end of right content-->
            
                    
  </div>   <!--end of center content -->               
                    
                    
    
    
    <div class="clear"></div>
    </div> <!--end of main content-->
	
    
  <?php include(APPPATH.'views/include/footer.php');?>