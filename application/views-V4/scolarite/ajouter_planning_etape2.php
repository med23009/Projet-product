<?php
include(APPPATH.'views/include/header.php');
include('include/menu.php');
?>
<head>
    <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>css/jquery.dataTables.min.css" />
</head>
<div class="container">
    <?php echo form_open('scolarite/new_planning2'); ?>

    <div class="col-xs-12 hl-left">
        
        <div style="font-size: 200%;background: #e6e6e6;padding: 4px;">Ajouter un planning: <span class="" style="border-bottom: 2px solid #7d7d7d;" >Etape 2 sur 2</span> | choisissez les jours </div>
        <br>
        
        <?php
        if (isset($messageSessionCourante))
            echo '<div class="alert alert-warning">' . $messageSessionCourante . '</div>';
        ?>

        <div class="form">
            <input type="hidden" name="annee" value="<?php if (isset($annee)) echo $annee ?>">
            <input type="hidden" name="semestre" value="<?php if (isset($semestre)) echo $semestre ?>">
            <input type="hidden" name="session" value="<?php if (isset($session)) echo $session ?>">
            <table>
                <tr>
                    <td>
                        Jour 1
                    </td>
                    <td>
                        <input type="date" name="jour[]"> 
                    </td>
                </tr>
                <tr>
                    <td>
                        Jour 2
                    </td>
                    <td>
                        <input type="date" name="jour[]"> 
                    </td>
                </tr>
                <tr>
                    <td>
                        Jour 3
                    </td>
                    <td>
                        <input type="date" name="jour[]"> 
                    </td>
                </tr>
                <tr>
                    <td>
                        Jour 4
                    </td>
                    <td>
                        <input type="date" name="jour[]"> 
                    </td>
                </tr>
                <tr>
                    <td>
                        Jour 5
                    </td>
                    <td>
                        <input type="date" name="jour[]"> 
                    </td>
                </tr>
                <tr>
                    <td>
                        Jour 6
                    </td>
                    <td>
                        <input type="date" name="jour[]"> 
                    </td>
                </tr>
                <tr>
                    <td>
                        Jour 7
                    </td>
                    <td>
                        <input type="date" name="jour[]"> 
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="Créer le planning" class="btn btn-success">
                    </td>
                </tr>
            </table>
        </div>
    </div>
<?php form_close(); ?>
</div>   <!--end of center content -->               


<?php include(APPPATH.'views/include/footer.php'); ?>

