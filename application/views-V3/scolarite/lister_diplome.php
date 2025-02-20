<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
 
<div class="container">
    <div class="col-xs-12 hl-left">
    <div class="row">
        <div class="col-sm-offset-3 col-lg-6 col-sm-6 well">
        <legend></legend>
        <?php 
        $attributes = array("class" => "form-horizontal", "id" => "autorisationform", "name" => "autorisationform");
        echo form_open("scolarite/voir_diplome", $attributes);?>
        <?php echo $this->session->flashdata('msg'); ?>
        <fieldset>
            
            <div class="form-group">
            <div class="row colbox">
            
            <div class="col-lg-4 col-sm-4">  
                <label>Matricule étudiant<span style="color:red;font-weight:bold;font-size:14px;">*</span></label>
 </div>
            <div class="col-lg-8 col-sm-8">
 
                
                        <div class="controls form-inline">
                            <?php
                                $input = array('type' => 'text', 'size' => '30', 'name' => 'matriculeE','placeholder' => 'matricule', 'class' => 'form-control');
                                echo form_input($input,'');
                                //echo form_error('year', '<span class="error">', '</span>');
                                ?>
                            <?php
                             //   $input = array('type' => 'text', 'size' => '2', 'name' => 'fin', 'class' => 'form-control');
                             //   echo form_input($input, '');
                               // echo form_error('month', '<span class="error">', '</span>');
                                ?><?php
                               // $input = array('type' => 'checkbox', 'size' => '2','name'=>'all','value'=>'1', 'class' => 'form-control');
                               // echo form_input($input,  '0');
                                //echo form_error('day', '<span class="error">', '</span>');
                                ?>
               </div>
                    </div>
                </div>
                </div>
            
            <div class="form-group">
            <div class="col-sm-offset-4 col-lg-8 col-sm-8 text-left">
                <input id="btn_add" name="btn_add" type="submit" class="btn btn-primary" value="Valider" />
               
            </div>
            </div>
             
            
        </fieldset>
        <?php echo form_close(); ?>
        
        </div>
    </div>
</div>
</body>
</html>

    </div>                      
</div>         

<div class="clear"></div>
</div> <!--end of main content-->


    <?php
  include(APPPATH.'views/include/footer.php');?>


