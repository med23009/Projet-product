
    <?php
    include(APPPATH.'views/include/header.php');
      include('include/menu.php');?>
   <div class="container">
    <div class="col-xs-12 hl-left">
      <?php 
         if(isset($warning)){ ?>
        <div class="error_box">
            <?php echo $warning;?>
        </div>
    <?php } ?>
              

      <?php
       echo heading('Ajouter un nouveau module : cocher dans quel(s) programme(s) se trouve le module','2');
        $attributes = array('class' => 'niceform');
        echo form_open('scolarite/inserer_module');
        echo form_fieldset();?>
        <table>
           <div class="clear"></div>
       <br><br>
                                            
                       
        <table width ="100%" style="background-color:#CAD1D6 ">
        <?php 
        if(is_array($programme['idProgramme']))
        {
            for($i=0;$i<count($programme['idProgramme']);$i++)
            {
                echo '<tr><td><input type="checkbox" name="progs[]" value="'.$programme['idProgramme'][$i].'"/></td><td><b>'.$programme['nomProgramme'][$i].'</b></td></tr>';
            }
        }
                ?>
        </table>
        <?php
        echo   form_hidden($hidden); 
        ?>
           <div class="clear"></div>
       <br><br>
        <table>
                     <tr>
                                           
                        <td class="submit">
                         <?php $pw = array('type' => 'submit', 'name' => 'submit', 'id'=>'submit', 'value'=>'Ajouter'); 
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
