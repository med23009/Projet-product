<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
   
 <div class="container">
    <div class="col-xs-12 hl-left">

    <div class="right_content"id="printable"> 
            
        
        <?php echo heading('Modifier Décision de poursuite des études.','2');?>

        <div class="form">
          <?php        
          echo form_open('scolarite/valider_decision');?>
        
            <table>
                <tr>
                    <td>
                        <label style="font-size: 16px;">
                            Nom et Prénom</label>
                    </td>
                    <td>
                        <?php
							$input = array('type' => 'text', 'disabled'=>'disabled', 'size'=>'90');
							 echo form_input($input,$nom.', '.$prenom,'');
                          ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label style="font-size: 16px;">
                            Matricule</label>
                    </td>
                    <td>
                        <?php
                         $input = array('type' => 'text', 'disabled'=>'disabled');
                             echo form_input($input,$matricule,'');
                          ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label style="font-size: 16px;">
                            Décision 
                        </label>
                    </td>
                 <td>
                    <select  name="decision" id="">
                        <?php 
                         echo '<option value="'.$decisionEtudiant['idDecision'].'">'.
                                 $decisionEtudiant['decisionM'].'</option>';
                         
                         for($i=0 ;$i<count($decision['idDecision']);$i++)
                         {
                             if($decisionEtudiant['idDecision'] != $decision['idDecision'][$i] )
                             {
                                echo '<option value="'.$decision['idDecision'][$i].'">'
                                        .$decision['decisionM'][$i].'</option>';
                             }
                         }
                         echo form_hidden('matricule',$matricule);
                        ?>
                    </select>
                </td>
                </tr>
            </table>
               
            <table style="margin-left: 600px;">
                <tr>
                 <td>
                 <?php $pw = array('type' => 'submit', 'name' => 'submit', 'id'=>'submit', 'value'=>'Enregistrer');
                 echo form_input($pw);?>
                 </td>
            </tr>
            </table>
            </form> 
            
        </div>
     
     </div><!-- end of right content-->
            
                    
  </div>   <!--end of center content -->               
                    
                    
    
    
    <div class="clear"></div>
    </div> <!--end of main content-->
	
    
  <?php include(APPPATH.'views/include/footer.php');?>