<!DOCTYPE html>
<?php
include(APPPATH.'views/include/header.php');
include('include/menu.php');
?> 


<div class="container">
    <div class="col-xs-12 hl-left">

        <h3>Authantification pour la modification des paramètres generaux </h3>
        <!--formualire authantification pour la modification des notes-->
        <div class="formualire_authantification_modification_des_notes">
            <?php
            echo form_open('administrateur/authentification_modfication_params_genr/'.$operation);
            ?>

            <table class="table">
                <tr>
                    <th colspan="2">
                        <?php if (isset($message)) echo $message; ?>
                        <div class="<?php if (isset($erreur) ) if($erreur==1) echo "alert alert-danger"; ?>">
                            <?php
                            if (isset($erreur))
                                if($erreur==1)  
                                    echo "Erreur: mot de passe incorrect.<br>Veuillez réessayer une autre fois.";
                            
                            ?>
                        </div>
                    </th>
                </tr>
                <tr>
                    <td>Mot de passe: </td>
                    <td><input type="password" name="password" required="required"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" class="btn btn-success" value="envoyer" ></td>
                </tr>
            </table>

        </div>
        <?php form_close(); ?>

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