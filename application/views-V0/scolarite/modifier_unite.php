<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
   
   <div class="container">
    <div class="col-xs-12 hl-left">          
        
      <?php  echo validation_errors('<div class="error_box">', '</div>'); 
	   echo heading('Modifier Module','3');

               /*
     * fonction pour convertir le code du semestre par son nom 
     * elle prend en paramètre le numéro du semestre soit(1,2,3)
     * et elle retourne le nom (Automne, été, printemps)


    function get_session_nom($numeroSemestre) 
    {
        if ($numeroSemestre == 3) 
        {
            return 'Automne';
        } 
        elseif ($numeroSemestre == 2) 
        {
            return 'Été';
        } 
        else 
        {
            return 'Printemps';
        }
    }     */
         
           $attributes = array('class' => ''); 
	   echo form_hidden('sigle',$sigle);
		 
         
        ?>
       
        
        <?php

        echo form_close();
        echo form_open('scolarite/mettre_a_jour_unite', $attributes);
        echo form_fieldset();?>
        
        <table class="form">
            
                <tr>
                    <td><?php echo form_label("Code  :") ;?></td>
                    <td><?php $input = array('type' => 'text', 'value' => $sigle, 'size' => '10', 'name'=>'sigle', 'disabled' =>'disabled'); 
                             echo form_input($input,'','required');
                             echo form_error('name','<span class="error">','</span>');
                             echo form_hidden('sigle',$sigle);?>
                    </td>
                </tr>

                <tr>
                <td><?php echo form_label('Intitulé'.'<span style="color:red;font-weight:bold;font-size:14px;">*</span>'); ?></td>
                <td><?php
                    $input = array('type' => 'text', 'size' => '40', 'name' => 'titre','value'=>$titre);
                    echo form_input($input,'','');?>
                </td>
               </tr>
                <tr>
                    <td><?php  echo form_label('Description du module :');?></td>
                    <td><?php
                          $input = array( 'name'=>'description', 'value'=>$description);
                            echo form_textarea($input,'','');
                            echo form_error('comments','<span class="error">','</span>');?>
                    </td>
                </tr>
              
                            
                    <tr>
                        <td><?php echo form_label('Semestre d\'etudes :<span style="color:red;font-weight:bold;font-size:14px;">*</span>
								') ;?></td>
                        <td><?php 
                        echo"<SELECT name='semestre' style='width:239px'>";
                        for($s=1;$s<=6;$s++){//add by MedBakar 15-03-2020
                            echo"<option value='$s'";
                            if($s==$semestre)
                                echo" selected ";
                            echo" >S".$s."</option>";
                        }
                        echo"</select>";
//                             $input = array('type' => 'text', 'value'=>$semestre, 'size' => '35', 'name'=>'semestre'); 
//                             echo form_input($input,'','required');
                             echo form_error('name','<span class="error">','</span>');
                             echo form_hidden('idUnite',$idUnite);?>
                        </td>
                    </tr> 
                    <tr>
                        <td><?php echo form_label('Anneé d\'activation :<span style="color:red;font-weight:bold;font-size:14px;">*</span>
								') ;?></td>
                        <td><?php 
                             $input = array('type' => 'number', 'value'=>$anneeAct, 'size' => '35', 'name'=>'anneeAct','style'=>'width:239px'); 
                             echo form_input($input,'','required');
                             echo form_error('name','<span class="error">','</span>');?>
                        </td>
                    </tr> 
                    <tr>
                        <td><?php echo form_label('Semestre d\'activation :<span style="color:red;font-weight:bold;font-size:14px;">*</span>
								') ;?></td>
                        <td><?php 
                         echo"<SELECT name='semestreAct' style='width:239px'>";
                         $semAct='Paire';
                        for($s=1;$s<=3;$s++){//add by MedBakar 15-03-2020
                            if($s==2){
                                continue;
                            }
                            echo"<option value='$s'";
                            if($s==$semestreAct)
                                echo" selected ";
                            if($s==3){
                                 $semAct='Impaire';
                            }
                            echo" >".$semAct."</option>";
                        }
                        echo"</select>";
//                             $input = array('type' => 'text', 'value'=>$semestreAct, 'size' => '35', 'name'=>'semestreAct'); 
//                             echo form_input($input,'','required');
                             echo form_error('name','<span class="error">','</span>');?>
                        </td>
                    </tr> 
                    <tr>
                        <td><?php echo form_label('Nb de crédits :<span style="color:red;font-weight:bold;font-size:14px;">*</span>
								') ;?></td>
                        <td><?php 
                             $input = array('type' => 'number', 'value'=>$credits, 'size' => '35', 'name'=>'credits','style'=>'width:239px'); 
                             echo form_input($input,'','required');
                             echo form_error('name','<span class="error">','</span>');?>
                        </td>
                    </tr> 
                    <!---------------add by MedBakar 26-02-2020----------------->
                    <tr>
                        <td><?php echo form_label('Coefficient :<span style="color:red;font-weight:bold;font-size:14px;">*</span>
								') ;?></td>
                        <td><?php 
                             $input = array('type' => 'number', 'value'=>$coefficient, 'size' => '35', 'name'=>'coefficient','style'=>'width:239px'); 
                             echo form_input($input,'','required');
                             echo form_error('name','<span class="error">','</span>');?>
                        </td>
                    </tr> 
                    <!---------------FIN----------------->
                     <tr>
                        <td><?php echo form_label('Programme :<span style="color:red;font-weight:bold;font-size:14px;">*</span>') ;?></td>
                        <td>             
                        <?php 
                        
                            echo'<select name="idProgramme" style="width:239px">';

                        $index = 0;
                        foreach($nomProg as $nProg){
                            echo'<option value="'.$idProg[$index].'"';if($idProg[$index] == $idProgramme){echo 'selected="selected"'; } echo '>'.$nProg.'</option>';
                            $index++;
                        }
                        echo'</select>';
                        ?>
                        </td>
                    </tr> 
                    
                 

                     <tr>
                                           
                        <td class="submit">
                         <?php $pw = array('type' => 'submit', 'name' => 'submit', 'id'=>'submit', 'value'=>'Modifier'); 
                             echo form_input($pw);?>
                        </td>
                    </tr>
                </table>
                <?php echo form_fieldset_close();
                 echo form_close('</div>');?>
                
         </form>
        </table>
      
   </div>  
           <div class="clear"></div>

    </div> <!--end of main content-->
	
    <?php
  include(APPPATH.'views/include/footer.php');?>

       
 