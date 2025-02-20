<?php
include(APPPATH.'views/include/header.php');
include('include/menu.php');
?>
<head>
    <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>css/jquery.dataTables.min.css" />
</head>
<div class="container">
    <?php echo form_open('scolarite/new_planning1');?>
    <div class="col-xs-12 hl-left">
        
        <?php
            if(isset($messagePlannigExiste)) echo '<div class="alert alert-danger">'.$messagePlannigExiste.'</div>';
            elseif(isset($messagePlannigAjoute)) echo '<div class="alert alert-success">'.$messagePlannigAjoute.'</div>';
            else{
        ?>
        <div style="font-size: 200%;background: #e6e6e6;padding: 4px;">Ajouter un planning : <span class="" style="border-bottom: 2px solid #7d7d7d;" >Etape 1 sur 2 </span></div>
        <br>
        <div class="form">
            <table>
                <tr>
                    <td>Année</td>
                    <td>
                        <select style="width: 150px" name="annee">
                            <?php 
                                
                                for($i=2015;$i<=getDate()['year']+1;$i++)
                                    if($i==getDate()['year']) echo '<option value="'.$i.'" selected>'.$i.'</option>';
                                    else echo '<option value="'.$i.'" >'.$i.'</option>';
                            ?>
                        </select>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>Semestre</td>
                    <td>
                        <select style="width: 150px" name="semestre">
                            <option value="1">Pair</option>
                            <option value="3">Impair</option>
                        </select>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>Session</td>
                    <td>
                        <select style="width: 150px" name="session">
                            <option value="CC">CC</option>
                            <option value="SN">SN</option>
                            <option value="RT">RT</option>
                        </select></td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="Etape suivante" class="btn btn-success">
                    </td>
                </tr>
            </table>
            <?php } ?>
        </div>
    </div>
    <?php form_close(); ?>
    </div>   <!--end of center content -->               
  

<?php include(APPPATH.'views/include/footer.php'); ?>

            