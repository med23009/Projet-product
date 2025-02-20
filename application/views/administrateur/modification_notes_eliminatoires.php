<!DOCTYPE html>
<?php
include(APPPATH.'views/include/header.php');
include('include/menu.php');
?> 
<script type="text/javascript">
    function setFormValues(id_note,type){
        
        var note_element_form_for_send = document.getElementById("note");
        var type_element_form_for_send = document.getElementById("type");
        note_element_form_for_send.value=document.getElementById(id_note).value;
        type_element_form_for_send.value=type;
        if(note_verification(document.getElementById(id_note)))
            document.getElementById("formulaire").submit();
        else{
            document.getElementById(id_note).focus();
        }
    }
    //pour verifier la valeur de note (0<=note<=20)
    function note_verification(element){
        if(isNaN(element.value) || element.value>20 || element.value<0){
            alert("Erreur. la note doit etre comprise entre 0 et 20");
            element.focus();
            return false;
        }else{
            return true;
        }
        
    }
</script>
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

            <h3 class="col-lg-12 col-md-12 col-sm-12 col-xs-12" onclick="setFormValues('note_matiere','matiere')">Modification de la note eliminatoire  </h3>

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div>
                    <h3 class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Matière</h3>
                </div>
                <?php
                $attributes=array('name'=>'form_matiere');
                echo form_open('administrateur/modification_notes_eliminatoires/' . $cycle,$attributes);
                ?>
                <br>
                <table class="table" >
                    <tr>
                        <th>Note</th>
                    <input type="hidden" name="type" value="matiere" />
                    <td>
                        <input name='note' id="note_matiere" type="text" value="<?php echo $note_elimination_matiere; ?>" onChange="note_verification(this)">
                    </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" class="btn btn-success" name="submit_matiere" value="Enregistrer" onclick="setFormValues('note_matiere','matiere')">
                        </td>
                    </tr>

                </table>
                <?php form_close(); ?>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div>
                    <h3 class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Module</h3>
                </div>
                <?php
                $attributes['name']="form_module";
                echo form_open('administrateur/modification_notes_eliminatoires/' . $cycle,$attributes);
                ?>
                <br>
                <table class="table" >
                    <tr>
                        <th>Note</th>
                    <input type="hidden"  name="type" value="module" />
                    <td>
                        <input name='note' id="note_module" type="text" value="<?php echo $note_elimination_module; ?>" onChange="note_verification(this)">
                    </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" class="btn btn-success" name="submit_module" value="Enregistrer" onclick="setFormValues('note_module','module')">
                        </td>
                    </tr>

                </table>
                <?php form_close(); ?>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div>
                    <h3 class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Semestre</h3>
                </div>
                <?php
                $attributes['name']="form_semestre";
                echo form_open('administrateur/modification_notes_eliminatoires/' . $cycle,$attributes);
                ?>
                <br>
                <table class="table" >
                    <tr>
                        <th>Note</th>
                    <input type="hidden" name="type" value="semestre" />
                    <td>
                        <input name='note' id="note_semestre" type="text" value="<?php echo $note_elimination_semestre; ?>" onChange="note_verification(this)">
                    </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" class="btn btn-success" name="submit_semestre" value="Enregistrer" onclick="setFormValues('note_semestre','semestre')">
                        </td>
                    </tr>

                </table>
                
                <input type="hidden" name="nouvelle_note" id="note" value="note">
                <input type="hidden" name="type_note" id="type" value="note">
                
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