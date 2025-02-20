<?php
include(APPPATH.'views/include/header.php');
include('include/menu.php');
?>



<div class="container">
    <div class="col-xs-12 hl-left">
        <div id="printable">




            <br/>
            <div id="contenu">
                <?php if (isset($message)){ ?>
                <div class="error_box">
                <?php  echo $message; ?>
                </div>
                <?php } else { ?>
                <div class="valid_box">
                <?php
                
                        echo "Des heures d'enseignement ont été enregistrées..<br>";
                        echo $informations;
                                       
                ?>
                </div>
                <?php } ?>

            </div>
        </div> <!-- end of right content-->
    </div>   <!--end of center content -->               
    <div class="clear"></div>
</div> <!--end of main content-->


<?php include(APPPATH.'views/include/footer.php'); ?>
