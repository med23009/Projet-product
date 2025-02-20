

<?php 



include(APPPATH.'views/include/header.php');

    include('include/menu.php');?>
   
     <div class="container">
    <div class="col-xs-12 hl-left">
       
        <table >
                        
            
<?php echo $result['msg'] ; 
$sigle=$result['sigle'];
?>
 


        </table>
  
        <?php
        $attributes = array('class' => 'niceform');
        echo form_open('scolarite/evaluation_module/'.$annee.'/'.$semestre.'/'.$sigle, $attributes); ?>
       <?php echo form_fieldset();?>
           
           <?php $pw = array('type' => 'submit', 'name' => 'evaluation', 'id'=>'evaluation', 'value'=>'Revenir'); 
                             echo form_input($pw);?>
        </form>
        
               
   </div>  
           <div class="clear"></div>
    </div> <!--end of main content-->
	
    <?php
  include(APPPATH.'views/include/footer.php');?>

       
 