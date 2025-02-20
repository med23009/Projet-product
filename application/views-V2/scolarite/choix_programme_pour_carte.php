 <?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
   <div class="container">
    <div class="col-xs-12 hl-left">

         <?php echo heading($titre,'3');
          // $attributes = array('class' => 'niceform');
          
                echo form_open('scolarite/voir_cartes');
               // echo '<table class="form" id="tableProf">';
                 //echo form_hidden('matriculeEtudiant', $matriculeEtudiant);
                //echo form_hidden('matriculeEtudiant', $matriculeEtudiant)
          ?>
        <!--
            <tr>         
                               
            </tr>
            <tr>
                              <td>Annee :</td>
                    <td>
                        
                    
                    </td></tr>
          
            <tr>
                 
                              <td>Filiere :</td>
                   
                    <td>
                                           <?php 
        
                                   
        if(is_array($programme['idProgramme']))
        {
          
            echo ' <select name="idProgramme" id=""> ';
            
            for($i=0;$i<count($programme['idProgramme']);$i++)
            {
                echo '<option value="'.$programme['idProgramme'][$i].'">'.$programme['nomProgramme'][$i].'</option>';
            }
            echo '</select>';
        }
                ?>-->
                
         
         <div class="form-group">
            <div class="row colbox">
            
            
                 
                  
                        
            <div class="col-lg-8 col-sm-8">
 
                
                        <div class="controls form-inline">
                              <?php
                        
                      
                    
                        echo ' <select class="form-control" name="annee" id=""> ';
                        
                        foreach ($annee as $an)
                        {
                                echo '<option value="'.$an.'"> '.$an.'</option>';
                        }
                       
                      
                        echo '</select>';
                   
                    ?>
                            <label>Plage de<span style="color:red;font-weight:bold;font-size:14px;">*</span></label>
         
                             
                            <?php
                                $input = array('type' => 'text', 'size'=>'8', 'name' => 'debut', 'class' => 'form-control');
                                echo form_input($input,'','required');
                                //echo form_error('year', '<span class="error">', '</span>');
                                ?>à
                            <?php
                                $input = array('type' => 'text', 'size'=>'8', 'name' => 'fin', 'class' => 'form-control','required'=>'');
                                echo form_input($input, '');
                               // echo form_error('month', '<span class="error">', '</span>');
                                ?>
                                
 <?php
//                                echo form_label('LGTR');
//                                $input = array('type' => 'checkbox','name'=>'LGTR','value'=>'LGTR', 'class' => 'form-control');
//                                echo form_input($input,  '0');
//                                echo form_label('MAEF');
//                                $input = array('type' => 'checkbox','name'=>'MAEF','value'=>'MAEF', 'class' => 'form-control');
//                                echo form_input($input,  '0');
//                                echo form_label('RXTEL');
//                                $input = array('type' => 'checkbox', 'name'=>'RXTL','value'=>'RXTEL', 'class' => 'form-control');
//                                echo form_input($input,  '0');
//                                echo form_label('MAN');
//                                $input = array('type' => 'checkbox', 'name'=>'MAN','value'=>'MAN', 'class' => 'form-control');
//                                echo form_input($input,  '0');
                                //echo form_error('day', '<span class="error">', '</span>');
                                ?>
                
                  <?php 
        
                                   
                    if(is_array($programme['idProgramme']))
                    {

//                        echo ' <select name="idProgramme" id=""> ';

                        for($i=0;$i<count($programme['idProgramme']);$i++)
                        {
                               echo form_label($programme['idProgramme'][$i]);
                                $input = array('type' => 'checkbox','name'=>$programme['idProgramme'][$i],'value'=>$programme['idProgramme'][$i], 'class' => 'form-control');
                                echo form_input($input,  '0');

//                            
//                            echo '<option value="'.$programme['idProgramme'][$i].'">'.$programme['nomProgramme'][$i].'</option>';
                        }
//                        echo '</select>';
                    }
                ?>               
                                
                                 <?php $pw = array('type' => 'submit', 'name' => 'submit', 'id'=>'submit', 'value'=>'Valider', 'class'=>'fa send');
                 echo form_input($pw);?>
               </div>
                    </div>
                </div>
                </div>
          
             
          <?php
                   
                   echo form_fieldset_close();
        echo form_close('</div>');?>
           </div>
           <div class="clear"></div>
    </div> <!--end of main content-->

    <?php
  include(APPPATH.'views/include/footer.php');?>



