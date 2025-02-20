<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
   

 <div class="container">
    <div class="col-xs-12 hl-left">           
        
   <h2>Accueil Directeur des etudes</h2> 
         <div class="form">
          <?php $attributes = array('class' => 'niceform');
         
          echo form_open('connexion/login',$attributes);?>
         
               
         <?php echo form_close('</div>');?>
      
     
     </div><!-- end of right content-->
            
                    
  </div>   <!--end of center content -->               
                    
                    
    
    
    <div class="clear"></div>
    </div> <!--end of main content-->
	
    
  <?php include(APPPATH.'views/include/footer.php');?>