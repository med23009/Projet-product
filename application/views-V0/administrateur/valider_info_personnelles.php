 
<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
   
 <div class="container">
    <div class="col-xs-12 hl-left">           
        
   <h2><?php 
   if(isset($sessionCourante))
   {
       echo 'Modification du semestre courant';
   }
   else
   {
      echo 'Modifier informations personnelles';
   }    
   
   ?></h2>  
   
        <div class="<?php echo $typeBox;?>">
                <?php echo $informations;?>
        </div>
   
     </div><!-- end of right content-->                 
  </div>   <!--end of center content -->   
  
<div class="clear"></div>
</div> <!--end of main content-->
	
<?php include(APPPATH.'views/include/footer.php');?>



