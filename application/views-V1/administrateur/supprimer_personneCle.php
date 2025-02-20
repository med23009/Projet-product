
<?php include(APPPATH.'views/include/header.php');
include('include/menu.php');
?> 


 <div class="container">
    <div class="col-xs-12 hl-left">



        <?php
        echo heading('Liste des personnes-clés qui recevront un e-mail lors de tout changement dans le plan d\'études :', '2');
         echo heading('Cocher les e-mails à supprimer de la liste: ', '3');
        $attributes = array('class' => '');
        echo form_open('administrateur/supprimer_personneCle_action', $attributes);
        ?>
        <div style="height: 80px;">
        </div>
        <p style="font-size: x-large; height: 200px;width: 550px; overflow: auto; border: 5px solid #eee; background: #eee; color: #000; margin-bottom: 1.5em;">
            
        
           
                <?php                        
                for($i=0;$i<  count($personneCle)-1;$i=$i+2)
                {
                echo '<label style="font-size:18px;"><input type="checkbox" name="items['.$i.']]">'.$personneCle[$i].'</label><br>';
                }
                ?>
       
        </p>
         
         <?php $pw = array('type' => 'submit', 'name' => 'submit', 'id'=>'submit', 'value'=>'Supprimer'); 
                         
         echo form_input($pw);?>
        </form>
    </div>                      
</div>         

<div class="clear"></div>
</div> <!--end of main content-->


<?php include(APPPATH.'views/include/footer.php');
?>

