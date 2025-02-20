<?php include(APPPATH.'views/include/header.php');
include('include/menu.php');
?>


    
 <div class="container">
    <div class="col-xs-12 hl-left">
        <div id="printable">
            
              
              
            
            <br/>
         <div id="contenu">
           <?php if($res==1)      
         echo " Les codes d'anonymats ont étés générés avec succès..";
          
         else
         {  
             echo "Les codes d'anonymats sont déjà générés ..";
         }
           ?>
          
         
        </div>
        </div> <!-- end of right content-->
</div>   <!--end of center content -->               
<div class="clear"></div>
</div> <!--end of main content-->


<?php include(APPPATH.'views/include/footer.php'); ?>
