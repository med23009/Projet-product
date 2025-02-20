

<?php 



include(APPPATH.'views/include/header.php');

    include('include/menu.php');?>

<script>


function confirmSupp(a) {
    var y;
     y=document.forms[0].elements[a];
    if(y.checked==false)
    {if (confirm("Voulez-vous vraiment supprimer cette evaluation ?") == false) {
      
       y.checked=true; 
            
    }
    }
    
}
</script>

 <div class="container">
    <div class="col-xs-12 hl-left">
       
        <?php
        $disabled = 'disabled';
           if($notesPasValide=='true')
           $disabled = '';
           
          
        ?>
        
           
         
            
        <table >
                        
            
             
 <?php
 
$n1=$result['n1'];
$n2=$result['n2'];
$n=$n1+$n2;
 $tab=$result['tab'];
 $ponderations=$result['ponderations'];
  echo validation_errors();
       
  echo heading('Evaluations du module :','3');
  if($notesPasValide=='false')
  {
  ?>
       <div class="warning_box">
                <?php 
                
                echo 'Les notes du modules ont déjà été validées';?>
            </div> 
            
            <?php
  }
 
        
  $attributes = array('class' => 'niceform');
        echo form_open('scolarite/confirmation_evaluation_module/'.$annee.'/'.$semestre.'/'.$result['sigle'], $attributes);
        echo form_fieldset();?>
        <table class="form">  
            <tr>
                <th align="left">Type evaluation</th>
                <th></th>
                <th align="left">Ponderation</th>
            </tr>
           <?php
          
           
         echo   form_hidden('nbr', $n);
          for($i=0; $i<$n1; $i++)
          {
              
         $r=$tab[$i];
        $p=$ponderations[$i];
         $ch="";
         echo '<tr><td>'.$r['nomEvaluation'].'</td>';
        //if($r['sigle']!="")
         //   $ch='checked';
           $k=$i+1; 
           echo   form_hidden('case'.$k, $r['idEvaluation']);
           $ev="'ev".$k."'";
         ?>
   
            <td><input type="checkbox" <?php echo $disabled;?> checked name="<?php echo 'ev'.$k;?>" value="<?php echo $r['idEvaluation'];?>" onclick="confirmSupp(<?php echo $ev ?>)"></td>
        <td><input type="number" <?php echo $disabled;?> step="any" size="4" name="<?php echo "pond".$k;?>" value="<?php echo $p['ponderation'];?>" ></td>
        </tr>
 
       
          <?php }
          
          for($j=$i; $j<$n; $j++)
          {
            $k=$j+1;  
         $r=$tab[$j];
        echo   form_hidden('case'.$k, $r['idEvaluation']);
         $ch="";
         echo '<tr><td>'.$r['nomEvaluation'].'</td>';
        //if($r['sigle']!="")
         //   $ch='checked';
            
         ?>
   
        <td><input type="checkbox"  <?php echo $disabled;?> name="<?php echo 'ev'.$k;?>" value="<?php echo $r['idEvaluation'];?>" ></td>
       <!--
        <td><input type="number" step="any" size="4" name="<?php echo "pond".$r['idEvaluation'];?>" value="" ></td>
       -->
        <td><input type="number" <?php echo $disabled;?> step="any" size="4" name="<?php echo "pond".$k;?>" value="" ></td>
        </tr>
 
       
          <?php }?>

        <tr>  
        <td class="submit">
                         <?php $pw = array('type' => 'submit', 'name' => 'enregistrer', 'id'=>'enregistrer', 'value'=>'Enregitrer'); 
                         if($notesPasValide=='true')    
                         echo form_input($pw);?>
         </td>
        </tr>            
                        
        

        </table>
     
        <?php echo form_fieldset_close();
                
                 echo form_close('</div>');?>
        </form>
   </div>  
           <div class="clear"></div>
    </div> <!--end of main content-->
	
    <?php
  include(APPPATH.'views/include/footer.php');?>

       
 