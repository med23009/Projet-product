<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
<div class="container">
    <div class="col-xs-12 hl-left">

         <?php echo heading($titre,'2');
           $attributes = array('class' => 'niceform');
          echo form_open('scolarite/validation_note_acce',$attributes);
            ?>
                <table class="form">
            <tr>
                <td><?php echo form_label("Mot de passe :"); ?></td>
				<td><?php
                    $input = array('type' => 'password', 'name' => 'pass', 'size' => '20');
                    echo form_input($input, '', 'required');
        ?>
                </td>
            </tr>    
                 <td class="submit">
                 <?php $pw = array('type' => 'submit', 'name' => 'submit', 'id'=>'submit', 'value'=>'Ok');
                 echo form_input($pw);?>
                 </td>
            </tr>
         </table>
           <?PHP
       // echo " ". $this->session->userdata('login'); 
    
    ?>
        <?php  echo form_close('</div>');?>
           </div>
           <div class="clear"></div>
    </div> <!--end of main content-->

    <?php
  include(APPPATH.'views/include/footer.php');?>


