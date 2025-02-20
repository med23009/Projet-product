<!DOCTYPE html>
<?php
include(APPPATH.'views/include/header.php');
include('include/menu.php');
?> 
<style>
    .row.vdivide [class*='col-']:not(:last-child):after {
  background: #87f224;
  width: 2px;
  content: "";
  display:block;
  position: absolute;
  top:0;
  bottom: 0;
  right: 0;
  min-height: 70px;
}
</style>

<div class="container">
    
    <div class="col-xs-12 hl-left">

        

        <br>

        <div class="row vdivide">
            
            <h3 class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><?php $operation ?> de la note eliminatoire <?php if($type=="matiere") echo "Matiére"; else echo $type; ?> </h3>
            
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div>
                    <h3 class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Licence</h3>
                </div>
                <?php
                echo form_open('scolarite/modifier_note_eliminatoire/'.$operation.'/' . $type . '/4');
                ?>
                <br>
                <table class="table" >
                    <tr>
                        <th>Note</th>
                        <td>
                            <select name='note'>
                                <?php
                                for ($i = 0; $i <= 20; $i++) {
                                    echo "<option value='$i' ";
                                    if ($i == $note_elimination_licence[0]['note'])
                                        echo " selected ";
                                    echo ">$i</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" class="btn btn-success" name="submit_licence" value="Enregistrer">
                        </td>
                    </tr>

                </table>
                <?php form_close(); ?>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                <div>
                    <h3>Master  </h3>
                </div>
                <?php
                echo form_open('scolarite/modifier_note_eliminatoire/'.$operation.'/' . $type. '/5');
                ?>


                <table class="table">
                    <tr>
                        <th>Note</th>
                        <td>
                            <select name='note'>
                                <?php
                                for ($i = 0; $i <= 20; $i++) {
                                    echo "<option value='$i' ";
                                    if ($i == $note_elimination_master[0]['note'])
                                        echo " selected ";
                                    echo ">$i</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" class="btn btn-success" name="submit_master" value="Enregistrer">
                        </td>
                    </tr>
                    <!--tr>
                        <td>Cycle</td>
                        <td>
                            <select name="cycle" class="mdb-select md-form colorful-select dropdown-primary">
                                <option value="4">Licence</option>
                                <option value="5">Maseter</option>
                            </select>
                            
                        </td>
                        
                    </tr-->
                </table>
                <?php form_close(); ?>
            </div>
        </div>
    </div>          
</div>
</body>
</html>

</div>                      
</div>         

<div class="clear"></div>
</div> <!--end of main content-->

<?php include(APPPATH.'views/include/footer.php');
?>