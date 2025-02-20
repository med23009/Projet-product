<?php
include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
   

    <div class="container">
    <div class="col-xs-12 hl-left">          
        
      
        <?php echo heading('Créer des nouveaux groupes','3');
		$attributes = array('class' => 'niceform');
		echo form_open('scolarite/creer_groupes');
		echo form_fieldset();?>
        <table class="form">
            <tr>
                    <td><?php echo form_label('Programme <span style="color:red;font-weight:bold;font-size:14px;">*</span>') ;?></td>
                    <td>
                            
               <?php  
               if(is_array($programme['idProgramme']))
        {
          
            echo ' <select class="form-control"  name="programme">';
            
            for($i=0;$i<count($programme['idProgramme']);$i++)
            {
                echo '<option value="'.$programme['idProgramme'][$i].'">'.$programme['nomProgramme'][$i].'</option>';
            }
            echo '</select>';
        }
                ?>

                           
                    </td>
                </tr>    
            <tr>
                    <td><?php echo form_label('Niveau <span style="color:red;font-weight:bold;font-size:14px;">*</span>') ;?></td>
                    <td>
                            <select class="form-control"  name="niveau">
                            <option value="1">L1</option>
                            <option value="3">L2</option>
                            <option value="5">L3</option>
                            </select> 
                    </td>
                </tr>
<!--                <tr>
                    <td><?php echo form_label('Type du groupe <span style="color:red;font-weight:bold;font-size:14px;">*</span>') ;?></td>
                    <td>
                            <select class="form-control"  name="typeGroupe">
                            <option value="Groupe-Theorie">Groupe-Théorie</option>
                            <option value="Groupe-TP">Groupe-TP</option>
                            <option value="Groupe-TD">Groupe-TD</option>
                            <option value="Groupe-Projet">Groupe-Projet</option>
                            <option value="Groupe-Stage">Groupe-Stage</option>
                            </select> 
                    </td>
                </tr>
                <tr>
                    <td><?php echo form_label('Nombre de groupe');?></td>
                    <td><?php $pw = array('class'=>'form-control','type' => 'Number', 'name' => 'nbGroupe', 'id'=>'nbgroupe'); 
                            echo form_input($pw);?> </td>
                </tr>-->
            
                 <tr>
                    <td><?php echo form_label('Nombre de groupe CM');?></td>
                    <td><?php $pw = array('class'=>'form-control','type' => 'Number', 'name' => 'nbGroupeCM', 'id'=>'nbgroupe','placeholder'=>'Groupe-Théorie'); 
                            echo form_input($pw);?> </td>
                </tr>
                 <tr>
                    <td><?php echo form_label('Nombre de groupe TD');?></td>
                    <td><?php $pw = array('class'=>'form-control','type' => 'Number', 'name' => 'nbGroupeTD', 'id'=>'nbgroupe','placeholder'=>'Groupe-TD'); 
                            echo form_input($pw);?> </td>
                </tr>
                 <tr>
                    <td><?php echo form_label('Nombre de groupe TP');?></td>
                    <td><?php $pw = array('class'=>'form-control','type' => 'Number', 'name' => 'nbGroupeTP', 'id'=>'nbgroupe','placeholder'=>'Groupe-TP'); 
                            echo form_input($pw);?> </td>
                </tr>
                
                <tr>

               
                <td><?php echo form_label('Année <span style="color:red;font-weight:bold;font-size:14px;">*</span>'); ?>  </td>
                <td><select class="form-control" name="date">

                        
                        <?php
                        $years=date('Y');
                        for($i=2011;$i<=$years+10;$i++){
                        echo "<option value='".$i."'";
                        if ($annee == $i) {
                            echo ' selected';
                        }
                        echo ">".$i."</option>" . "\n";
                        }
                        ?>           
                
          
                </tr>                    
                <tr>                     
                    <td class="submit">
                        <?php $pw = array('class'=>'btn-success btn-xs-block','type' => 'submit', 'name' => 'submit', 'id'=>'su5bmit', 'value'=>'Créer'); 
                            echo form_input($pw);?>
                    </td>
                </tr>                
                </table>
                <?php echo form_fieldset_close();
                echo form_close('</div>');?>      
    </div>  <!--right content-->
    <div class="clear"></div>
    </div> <!--end of main content-->
	
    <?php
    include(APPPATH.'views/include/footer.php');?>

       
 