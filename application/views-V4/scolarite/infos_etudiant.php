<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
  <div class="container">
    <div class="col-xs-12 hl-left">
    <div class="row">
        <div class="col-sm-offset-3 col-lg-6 col-sm-6 well">         
        <?php          
                 echo heading('Ajouter un étudiant (4/4)','3');
        ?>
          <div class="<?php echo $typeBox; ?>">
                 <?php echo $informations;?>
            </div>
          <?php
          
       

          echo heading('Informations générées','3');
      
           
         
          echo form_open('scolarite/index');
         
             echo form_fieldset();?>
             <div class="form-group">
            <div class="row colbox">
            
            <div class="col-lg-4 col-sm-4"> <?php  echo form_label('Matricule  :', 'code');?>
                    </div>
            <div class="col-lg-8 col-sm-8"><?php $input = array('type' => 'text', 'size' => '25', 'name'=>'code',  "disabled" =>"disabled","style" => "font-size:18px", 'class'=>'form-control'); 
                             echo form_input($input,$code,'required');
                             echo form_error('code','<span class="error">','</span>');?>
            </div> </div> </div>
                        <div class="form-group">
            <div class="row colbox">
            
            <div class="col-lg-4 col-sm-4"> <?php  echo form_label('Code d\'accès :','accessCode');?>
                     </div>
            <div class="col-lg-8 col-sm-8">  
                <?php $input = array('type' => 'text', 'size' => '25', 'name'=>'accessCode',  "disabled" =>"disabled","style" => "font-size:18px", 'class'=>'form-control'); 
                             echo form_input($input,$accessCode,'required');
                             echo form_error('accessCode','<span class="error">','</span>');?>
                 </div> </div> </div>
                       <div class="form-group">
            <div class="row colbox">
            
            <div class="col-lg-4 col-sm-4"> <?php  echo form_label('Mot de passe:','pass');?>
                        </div>
            <div class="col-lg-8 col-sm-8"><?php $input = array('type' => 'text', 'size' => '25', 'name'=>'pass', "disabled" =>"disabled","style" => "font-size:18px", 'class'=>'form-control'); 
                             echo form_input($input,$pass,'required');
                             echo form_error('pass','<span class="error">','</span>');?>
                        </div> </div> </div>
                     
                         <?php $pw = array('type' => 'submit', 'name' => 'submit', 'id'=>'submit', 'value'=>'Terminer','class'=>'btn btn-primary'); 
                             echo form_input($pw);?>
                   
             
               <?php echo form_fieldset_close();
                
       echo form_close('</div>');
?>
           </div>  
           <div class="clear"></div>
    </div> <!--end of main content-->
	
    <?php
  include(APPPATH.'views/include/footer.php');?>

       
 