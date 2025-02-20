<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
   
    <div class="container">
    <div class="col-xs-12 hl-left">          
        
       
         <?php if($type=="all_sigle"){?>
    
      <div class="alert alert-success">
  <strong>Succes!</strong>  <?php echo $informations;?>
</div>
         <?php }else{?>
             <div class="alert alert-success">
  <strong>Succes!</strong>  <?php echo $informations;?>
</div> 
             
      <?php   } ?>
     </div><!-- end of right content-->
            
                    
  </div>   <!--end of center content -->               
                    
                    
    
    
    <div class="clear"></div>
    </div> <!--end of main content-->
	
    
  <?php include(APPPATH.'views/include/footer.php');?>
