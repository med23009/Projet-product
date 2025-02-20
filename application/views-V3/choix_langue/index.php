<?php
include(APPPATH.'views/include/header.php');
//include('include/menu.php');
?>
<div class="center_content">



    <div class="right_content">

        <?php
            echo heading ('Modifier la langue <br>','2');
	?>
      
        <table class="form">

            

            <tr>
                <td><?php echo anchor('choix_langue/updateLang/english','English');?></td>
             
            </tr>

            <tr>  
                <td><?php echo anchor('choix_langue/updateLang/french','Français');?></td>
                
            </tr>
        </table>

        
    </div>
    <!-- <div class="clear"></div>-->
</div> <!--end of main content-->

<?php include(APPPATH.'views/include/footer.php'); ?>
