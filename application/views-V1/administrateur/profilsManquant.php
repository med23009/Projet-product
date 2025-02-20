 
<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
   
   <div class="container">
    <div class="col-xs-12 hl-left">         

            <div class="<?php echo $typeBox;?>">
                <?php echo $informations;?>
            </div>

            <div> <?php if(isset($bouttonRetour))
                {
                $title = '<span class="bt_green_lft"></span><strong>Retour à la création d\'un employé</strong><span class="bt_green_r"></span>';
                $attributes = 'class="bt_green"';
                echo anchor('administrateur/creer_employe', $title, $attributes);
                }?>    
            </div>
        </div><!-- end of right content-->

  </div>   <!--end of center content -->               
        
    <div class="clear"></div>
    </div> <!--end of main content-->
	 
  <?php include(APPPATH.'views/include/footer.php');?>

