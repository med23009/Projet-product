 
<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
   
 
 <div class="container">
    <div class="col-xs-12 hl-left">             
        
   <h2><?php echo $titre ?></h2> 
       
         
         <?php echo 
         '<div class="'.$type.'">' 
            .$message.'
         </div>'
         ?>
      
     
     </div><!-- end of right content-->
            
                    
  </div>   <!--end of center content -->               
                    
                    
    
    
    <div class="clear"></div>
    </div> <!--end of main content-->
	
    
  <?php include(APPPATH.'views/include/footer.php');?>


