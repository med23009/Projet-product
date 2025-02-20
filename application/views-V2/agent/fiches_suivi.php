<?php include(APPPATH.'views/include/header.php');
include('include/menu.php');
?>
<div class="container" >
    <div class="col-xs-12 hl-left">

        <script src="<?php echo base_url(); ?>js/moment.min.js"></script>
        <div class="center_content">

       <table width="100%"><tr> <!--<td>Date debut:</td><td><input type="date"  id="dateD"/></td><td>Date fin:</td><td><input type="date"  id="dateF"/></td><td>Statut:</td><td><select class="form-control" onchange="f3(this);" id="statut" >
                       <option value="-1">Choisisser le statut</option>
                    <?php
                    for ($i = 0; $i < count($statut['statut']); $i++) {
                        echo'<option value="' . $statut['statut'][$i] . '"> <div id="DIV2">' .
                        $statut['statut'][$i] . '</div></option>';
                    }
                    ?>


                   </select> </td>--><td align="right"> <button  onClick="imprimer('printable');" ><b> Imprimer l'attestation </b></button></td></tr></table>



            <!-- <?php echo form_label('Groupe :'); ?>
       
         <select  name="groupe" id="groupe"   onchange="f3(this);">
             <option></option>
         </select>
         </div>-->

<?php //print_r($infos);  ?>

            <div id="printable">
<?php foreach ($infos as $idGroupe => $info) {
   // print_r($info['listeH']); $t=0;
    for ($i = 0; $i < count($info['detail']); $i++) { $cm=0;$td=0;$tp=0; ?>
                        <table height="100%" width="100%" align="center" style=" border-collapse: collapse; border: none;">
                            <tbody>
                                <tr>
                                    <td style="width: 63.85pt; padding: 0cm 5.4pt 0cm 5.4pt;" width="85">&nbsp;<img src="../../images/logo_iup_abra.png" height="70" width="90"></td>
                                    <td style="width: 31.35pt; padding: 0cm 5.4pt 0cm 5.4pt;" width="42">
                                        <p style="line-height: normal;"><span style="font-size: 9.0pt; font-family: 'Arial','sans-serif';">Institut Universitaire Professionnel</span></p>
                                    </td>
                                    <td style="width: 402.55pt; padding: 0cm 5.4pt 0cm 5.4pt;" width="537">
                                        <p style="text-align: right; line-height: normal;"><span style="font-size: 22.0pt; font-family: 'Arial','sans-serif';">Fiche enseignement</span></p>
                                        <p style="text-align: right; line-height: normal;"><span style="font-size: 9.0pt; font-family: 'Arial','sans-serif';">Année Universitaire&nbsp;: 2017/2018 </span></p>
                                    </td>
                                </tr>
                                <tr><td align="center" colspan="3"><p><span id="sem" style="font-family: 'Arial','sans-serif';font-size: 16.0pt;"><?php echo $info['semaine'];?></span></p></td></tr>
                            </tbody>
                        </table>

                        <table align="center" style="width: 1000.7pt;  border-collapse: collapse; border: none;" width="100%" height="100%">
                            <tbody>
                                <tr>
                                    <td style="width: 255.2pt; padding: 0cm 5.4pt 0cm 5.4pt;" width="340">
                                        <p style="margin-left: 35.4pt; text-align: justify; line-height: normal;"><strong><span style="font-size: 13.0pt; font-family: 'Arial','sans-serif';">Enseignement&nbsp;: </span></strong><spanb id="infp" style="font-size: 11.0pt; font-family: 'Arial','sans-serif';"><?php echo $info["detail"][$i]["idProgramme"] . " " . $info["detail"][$i]["semestre"] . " " . $info["detail"][$i]["idModule"] . " " . $info["detail"][$i]["module"]; ?></spanb></p>
                            </td>
                            <td style="width: 10.0cm; padding: 0cm 5.4pt 0cm 5.4pt;" width="378">
                                <p style="margin-left: 35.4pt; line-height: normal;"><strong><span style="font-size: 13.0pt; font-family: 'Arial','sans-serif';">Enseignant&nbsp;: </span></strong><span id="nom" style="font-size: 11.0pt; font-family: 'Arial','sans-serif';"><?php echo $info["detail"][$i]["prenom"] . " " . $info["detail"][$i]["nom"]; ?></span></p>
                            </td>
                            </tr>
                            <tr>
                                <td style="width: 255.2pt; padding: 0cm 5.4pt 0cm 5.4pt;" width="340">
                                    <p style="margin-left: 35.4pt; line-height: normal;"><strong><span style="font-size: 13.0pt; font-family: 'Arial','sans-serif';">Elément</span></strong><span id="elt" style="font-size: 13.0pt; font-family: 'Arial','sans-serif';">: <?php echo $info["detail"][$i]["sigle"] . " " . $info["detail"][$i]["titre"]; ?></span></p>
                                </td>
                                <td style="width: 10.0cm; padding: 0cm 5.4pt 0cm 5.4pt;" width="378">
                                    <p style="margin-left: 35.4pt; line-height: normal;"><strong><span style="font-size: 13.0pt; font-family: 'Arial','sans-serif';">Diplôme</span></strong><span id="titreD" style="font-size: 13.0pt; font-family: 'Arial','sans-serif';">:   <?php echo $info["detail"][$i]["dernierDiplome"] . " " . $info["detail"][$i]["paysDiplome"]; ?></span></p>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 255.2pt; padding: 0cm 5.4pt 0cm 5.4pt;" width="340">
                                    <p style="margin-left: 35.4pt; line-height: normal;"><span id="volume" style="font-size: 13.0pt; font-family: 'Arial','sans-serif';">Volume Horaire&nbsp;:<?php ECHO $t=$info["detail"][$i]["hrsCours"] + $info["detail"][$i]["hrsTP"] + $info["detail"][$i]["hrsTD"]; ?><b> Répartition:</b> <?php echo $info["detail"][$i]["hrsCours"] . " CM" . $info["detail"][$i]["hrsTD"] . " TD" . $info["detail"][$i]["hrsTP"] . " TP" ?> </span></p>
                                </td>
                                <td style="width: 10.0cm; padding: 0cm 5.4pt 0cm 5.4pt;" width="378">
                                    <p style="margin-left: 35.4pt; line-height: normal;"><strong><span style="font-size: 13.0pt; font-family: 'Arial','sans-serif';">Statut</span></strong><span id="statut" style="font-size: 13.0pt; font-family: 'Arial','sans-serif';">: <?php if (substr($info["detail"][$i]["grade"], 0) == "V") {
            echo "Vacataire";
        } else {
            echo "Permanent";
        } ?>    <b>Grade:</b><?php echo $info["detail"][$i]["grade"]; ?></span></p>
                                </td>
                            </tr>
                            <!--<tr>
                            <td style="width: 255.2pt; padding: 0cm 5.4pt 0cm 5.4pt;" width="340">
                            <p style="margin-left: 35.4pt; line-height: normal;"><span id="vol" style="font-size: 10.0pt; font-family: 'Arial','sans-serif';">R&eacute;partition&nbsp;: vol CM, vol&nbsp; TD, vol TP</span></p>
                            </td>
                            <td style="width: 10.0cm; padding: 0cm 5.4pt 0cm 5.4pt;" width="378">
                            <p style="margin-left: 35.4pt; line-height: normal;"><strong><span style="font-size: 10.0pt; font-family: 'Arial','sans-serif';">Grade</span></strong><span id="grade" style="font-size: 10.0pt; font-family: 'Arial','sans-serif';">&nbsp;: liste(A1 &agrave; A4, V1 &agrave; V4), Lieu de travail&nbsp;: xxxx</span></p>
                            </td>
                            </tr>-->
                            <tr>
                                <td style="width: 255.2pt; padding: 0cm 5.4pt 0cm 5.4pt;" width="340">
                                    <p style="margin-left: 35.4pt; line-height: normal;"><strong><span style="font-size: 13.0pt; font-family: 'Arial','sans-serif';">Contenu du programme</span></strong><span style="font-size: 13.0pt; font-family: 'Arial','sans-serif';"> (au verso)</span></p>
                                </td>
                                <td style="width: 10.0cm; padding: 0cm 5.4pt 0cm 5.4pt;" width="378">
                                    <p style="margin-left: 35.4pt; line-height: normal;"><strong><span style="font-size: 13.0pt; font-family: 'Arial','sans-serif';">Coord.&nbsp;bancaires</span></strong><span id="bq" style="font-size: 13.0pt; font-family: 'Arial','sans-serif';">: <?php echo $info["detail"][$i]["compteBancaire"]; ?></span></p>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 255.2pt; padding: 0cm 5.4pt 0cm 5.4pt;" width="340">
                                    <p style="margin-left: 35.4pt; line-height: normal;"><strong><span style="font-size: 13.0pt; font-family: 'Arial','sans-serif';">Avancement</span></strong><span id="avanc" style="font-size: 13.0pt; font-family: 'Arial','sans-serif','boled';">:<b> <?php $cm1=0;$td1=0;$tp1=0; for($i=0; $i < count($info['listeH']); $i++) { if($info['listeH'][$i]["type"]=="cours"){ $cm1=$cm1+$info['listeH'][$i]["duree"]; }elseif($info['listeH'][$i]["type"]=="td"){$td1=$td1+$info['listeH'][$i]["duree"];}else{  $tp1=$tp1+$info['listeH'][$i]["duree"];} } $av=($cm1+$td1+$tp1)/$t*100; echo number_format($av, 2); ?> %</b></span></p>
                                </td>
                                <td style="width: 10.0cm; padding: 0cm 5.4pt 0cm 5.4pt;" width="378">
                                    <p style="margin-left: 35.4pt; line-height: normal;"><strong><span style="font-size: 13.0pt; font-family: 'Arial','sans-serif';">Taux horaire</span></strong><span id="taux" style="font-size: 13.0pt; font-family: 'Arial','sans-serif';">:<b> <?php echo $info['taux_horaire']['taux_horaire']; ?></b> </span></p>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 255.2pt; padding: 0cm 5.4pt 0cm 5.4pt;" width="340">
                                    <p style="margin-left: 35.4pt; line-height: normal;"><strong><span style="font-size: 13.0pt; font-family: 'Arial','sans-serif';"></span></strong><span style="font-size: 13.0pt; font-family: 'Arial','sans-serif';"> </span></p>
                                </td>
                                <td style="width: 10.0cm; padding: 0cm 5.4pt 0cm 5.4pt;" width="378">

                                </td>
                            </tr>
                            </tbody>
                        </table>
    <?php } ?>        
                    <!--<p><span style="font-size: 1.0pt; line-height: 75%; font-family: 'Arial','sans-serif';">&nbsp;</span></p>
                    <p><span style="font-family: 'Arial','sans-serif';">&nbsp;</span></p>-->
                    <div id="div2">
                        <table id="etu3" width="100%" height="100%" style=" border-collapse: collapse; border: none;">
                            <tbody>
                                <tr style="height: 10.35pt;">
                                    <td style="width: 50.3pt; border: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 11.35pt;" rowspan="2" width="66"><p style="line-height: normal;"><span style="font-size: 14.0pt; font-family: Arial,sans-serif;">Horaire</span></p></td>
                                    <td style="width: 41.9pt; border: solid #F79646 1.0pt; border-left: none; background: #FABF8F; padding: 0cm 5.4pt 0cm 5.4pt; height: 11.35pt;" rowspan="2" width="200"><p style="line-height: normal;"><span style="font-size: 14.0pt; font-family: Arial,sans-serif;">Date</span></p></td>
                                    <td style="width: 256.15pt; border: solid #F79646 1.0pt; border-left: none; padding: 0cm 5.4pt 0cm 5.4pt; height: 11.35pt;" rowspan="2" width="342"><p style="line-height: normal;"><span style="font-size: 14.0pt; font-family: Arial,sans-serif;">Résumé du cours</span></p></td><td style="width: 92.1pt; border: solid #F79646 1.0pt; border-left: none; background: #FABF8F; padding: 0cm 5.4pt 0cm 5.4pt; height: 11.35pt;" colspan="3" width="123"><p style="line-height: normal;"><span style="font-size: 14.0pt; font-family: " arial","sans-serif";"="">Atome pédagogique.</span></p></td><td style="width: 99.25pt; border: solid #F79646 1.0pt; border-left: none; padding: 0cm 5.4pt 0cm 5.4pt; height: 11.35pt;" rowspan="2" width="132"><p style="line-height: normal;"><span style="font-size: 14.0pt; font-family: " arial","sans-serif";"="">Emargement</span></p></td></tr>
                                
                                <tr style="height: 11.35pt;"><td style="width: 1.0cm; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 11.35pt;" width="38"><p style="text-align: center; line-height: normal;"><span style="font-size: 14.0pt; font-family: " arial","sans-serif";"="">CM</span></p></td><td style="width: 1.0cm; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; background: #FABF8F; padding: 0cm 5.4pt 0cm 5.4pt; height: 11.35pt;" width="38"><p style="text-align: center; line-height: normal;"><span style="font-size: 14.0pt; font-family: " arial","sans-serif";"="">TD</span></p></td><td style="width: 35.4pt; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 11.35pt;" width="47"><p style="text-align: center; line-height: normal;"><span style="font-size: 14.0pt; font-family: " arial","sans-serif";"="">TP</span></p></td></tr>
                                <?php  for ($i = 0; $i < count($info['listeH']); $i++) {
                                    $duree_a_afficher=0;
                                    if($info['listeH'][$i]["duree"]==0) $duree_a_afficher=2;
                                    ?>
                                <tr style="height: 40.85pt;"><td style="width: 49.3pt; border: solid #F79646 1.0pt; border-top: none; padding: 0cm 5.4pt 0cm 5.4pt; height: 15.85pt;" width="66"><p style="line-height: normal;"><span style="font-size: 16.0pt; font-family: " arial","sans-serif";"=""><?php echo $info['listeH'][$i]["heureD"]."h - ".($info['listeH'][$i]["heureD"]+$info['listeH'][$i]["duree"]+$duree_a_afficher)."h";?></span></p></td><td style="width: 60.9pt; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 10.85pt;" width="80"><p style="line-height: normal;"><span style="font-size: 16.0pt; font-family: " arial","sans-serif";"=""><?php echo  date("d/m/Y",  strtotime($info['listeH'][$i]['date']));?></span></p></td><td style="width: 256.15pt; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="342"><p style="line-height: normal;"><span style="font-size: 16.0pt; font-family: " arial","sans-serif";"=""><?php echo $info['listeH'][$i]['commentaire']; ?></span></p></td>
                                    <td style="width: 1.0cm; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="38"><p style="line-height: normal;"><span style="font-size: 16.0pt; font-family: " arial","sans-serif";"=""><?php if($info['listeH'][$i]["type"]=="cours"){ echo $info['listeH'][$i]["duree"]; $cm=$cm+$info['listeH'][$i]["duree"];} ?></span></p></td><td style="width: 1.0cm; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="38"><p style="line-height: normal;"><b><?php if($info['listeH'][$i]["type"]=="td"){ echo $info['listeH'][$i]["duree"]; $td=$td+$info['listeH'][$i]["duree"];} ?><span style="font-size: 16.0pt; font-family: " arial","sans-serif";"=""></span></p></td><td style="width: 35.4pt; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="47"><p style="line-height: normal;"><span style="font-size: 16.0pt; font-family: " arial","sans-serif";"=""><b><?php if($info['listeH'][$i]["type"]=="tp"){ echo $info['listeH'][$i]["duree"]; $tp=$tp+$info['listeH'][$i]["duree"];} ?></b></span></p></td><td style="width: 99.25pt; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="132"><p style="line-height: normal;"><span style="font-size: 16.0pt; font-family: " arial","sans-serif";"="">&nbsp;</span></p></td></tr>
                                <?php } ?>
                                    <tr style="height: 40.85pt;"><td style="width: 49.3pt; border: solid #F79646 1.0pt; border-top: none; padding: 0cm 5.4pt 0cm 5.4pt; height: 15.85pt;" width="66"><p style="line-height: normal;"><span style="font-size: 16.0pt; font-family: " arial","sans-serif";"=""></span></p></td><td style="width: 41.9pt; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 10.85pt;" width="56"><p style="line-height: normal;"><span style="font-size: 16.0pt; font-family: " arial","sans-serif";"=""></span></p></td><td style="width: 256.15pt; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="342"><p style="line-height: normal;"><span style="font-size: 16.0pt; font-family: " arial","sans-serif";"=""></span></p></td><td style="width: 1.0cm; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="38"><p style="line-height: normal;"><span style="font-size: 16.0pt; font-family: " arial","sans-serif";"=""></span></p></td><td style="width: 1.0cm; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="38"><p style="line-height: normal;"><span style="font-size: 6.0pt; font-family: " arial","sans-serif";"=""></span></p></td><td style="width: 35.4pt; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="47"><p style="line-height: normal;"><span style="font-size: 16.0pt; font-family: " arial","sans-serif";"=""></span></p></td><td style="width: 99.25pt; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="132"><p style="line-height: normal;"><span style="font-size: 16.0pt; font-family: " arial","sans-serif";"="">&nbsp;</span></p></td></tr><tr style="height: 40.85pt;"><td style="width: 49.3pt; border: solid #F79646 1.0pt; border-top: none; padding: 0cm 5.4pt 0cm 5.4pt; height: 15.85pt;" width="66"><p style="line-height: normal;"><span style="font-size: 16.0pt; font-family: " arial","sans-serif";"=""></span></p></td><td style="width: 41.9pt; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 10.85pt;" width="56"><p style="line-height: normal;"><span style="font-size: 16.0pt; font-family: " arial","sans-serif";"=""></span></p></td><td style="width: 256.15pt; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="342"><p style="line-height: normal;"><span style="font-size: 16.0pt; font-family: " arial","sans-serif";"=""></span></p></td><td style="width: 1.0cm; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="38"><p style="line-height: normal;"><span style="font-size: 16.0pt; font-family: " arial","sans-serif";"=""></span></p></td><td style="width: 1.0cm; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="38"><p style="line-height: normal;"><span style="font-size: 6.0pt; font-family: " arial","sans-serif";"=""></span></p></td><td style="width: 35.4pt; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="47"><p style="line-height: normal;"><span style="font-size: 16.0pt; font-family: " arial","sans-serif";"=""></span></p></td><td style="width: 99.25pt; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="132"><p style="line-height: normal;"><span style="font-size: 16.0pt; font-family: " arial","sans-serif";"="">&nbsp;</span></p></td></tr><tr style="height: 40.85pt;"><td style="width: 49.3pt; border: solid #F79646 1.0pt; border-top: none; padding: 0cm 5.4pt 0cm 5.4pt; height: 15.85pt;" width="66"><p style="line-height: normal;"><span style="font-size: 16.0pt; font-family: " arial","sans-serif";"=""></span></p></td><td style="width: 41.9pt; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 10.85pt;" width="56"><p style="line-height: normal;"><span style="font-size: 16.0pt; font-family: " arial","sans-serif";"=""></span></p></td><td style="width: 256.15pt; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="342"><p style="line-height: normal;"><span style="font-size: 16.0pt; font-family: " arial","sans-serif";"=""></span></p></td><td style="width: 1.0cm; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="38"><p style="line-height: normal;"><span style="font-size: 16.0pt; font-family: " arial","sans-serif";"=""></span></p></td><td style="width: 1.0cm; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="38"><p style="line-height: normal;"><span style="font-size: 6.0pt; font-family: " arial","sans-serif";"=""></span></p></td><td style="width: 35.4pt; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="47"><p style="line-height: normal;"><span style="font-size: 16.0pt; font-family: " arial","sans-serif";"=""></span></p></td><td style="width: 99.25pt; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="132"><p style="line-height: normal;"><span style="font-size: 16.0pt; font-family: " arial","sans-serif";"="">&nbsp;</span></p></td></tr><tr style="height: 40.85pt;"><td style="width: 49.3pt; border: solid #F79646 1.0pt; border-top: none; padding: 0cm 5.4pt 0cm 5.4pt; height: 15.85pt;" width="66"><p style="line-height: normal;"><span style="font-size: 16.0pt; font-family: " arial","sans-serif";"=""></span></p></td><td style="width: 41.9pt; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 10.85pt;" width="56"><p style="line-height: normal;"><span style="font-size: 16.0pt; font-family: " arial","sans-serif";"=""></span></p></td><td style="width: 256.15pt; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="342"><p style="line-height: normal;"><span style="font-size: 16.0pt; font-family: " arial","sans-serif";"=""></span></p></td><td style="width: 1.0cm; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="38"><p style="line-height: normal;"><span style="font-size: 16.0pt; font-family: " arial","sans-serif";"=""></span></p></td><td style="width: 1.0cm; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="38"><p style="line-height: normal;"><span style="font-size: 6.0pt; font-family: " arial","sans-serif";"=""></span></p></td><td style="width: 35.4pt; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="47"><p style="line-height: normal;"><span style="font-size: 16.0pt; font-family: " arial","sans-serif";"=""></span></p></td><td style="width: 99.25pt; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="132"><p style="line-height: normal;"><span style="font-size: 16.0pt; font-family: " arial","sans-serif";"="">&nbsp;</span></p></td></tr><tr style="height: 40.85pt;"><td style="width: 49.3pt; border: solid #F79646 1.0pt; border-top: none; padding: 0cm 5.4pt 0cm 5.4pt; height: 15.85pt;" width="66"><p style="line-height: normal;"><span style="font-size: 16.0pt; font-family: " arial","sans-serif";"=""></span></p></td><td style="width: 41.9pt; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 10.85pt;" width="56"><p style="line-height: normal;"><span style="font-size: 16.0pt; font-family: " arial","sans-serif";"=""></span></p></td><td style="width: 256.15pt; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="342"><p style="line-height: normal;"><span style="font-size: 16.0pt; font-family: " arial","sans-serif";"=""></span></p></td><td style="width: 1.0cm; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="38"><p style="line-height: normal;"><span style="font-size: 16.0pt; font-family: " arial","sans-serif";"=""></span></p></td><td style="width: 1.0cm; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="38"><p style="line-height: normal;"><span style="font-size: 6.0pt; font-family: " arial","sans-serif";"=""></span></p></td><td style="width: 35.4pt; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="47"><p style="line-height: normal;"><span style="font-size: 16.0pt; font-family: " arial","sans-serif";"=""></span></p></td><td style="width: 99.25pt; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="132"><p style="line-height: normal;"><span style="font-size: 16.0pt; font-family: " arial","sans-serif";"="">&nbsp;</span></p></td></tr><tr style="height: 40.85pt;"><td colspan="3" style="width: 49.3pt; border: solid #F79646 1.0pt; border-top: none; padding: 0cm 5.4pt 0cm 5.4pt; height: 15.85pt;" width="66"><p style="line-height: normal;"><span style="font-size: 16.0pt; font-family: " arial","sans-serif";"=""></span></p></td><td style="width: 1.0cm; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 10.85pt;" width="38"><p style="line-height: normal;"><span style="font-size: 16.0pt; font-family: " arial","sans-serif";"=""><b><?php echo $cm;?></b></span></p></td><td style="width: 1.0cm; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="38"><p style="line-height: normal;"><span style="font-size: 16.0pt; font-family: " arial","sans-serif";"=""><?php echo $td;?></span></p></td><td style="width: 35.4pt; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="47"><p style="line-height: normal;"><span style="font-size: 16.0pt; font-family: " arial","sans-serif";"=""><?php echo $tp;?></span></p></td><td style="width: 99.25pt; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="132"><p style="line-height: normal;"><span style="font-size: 10.0pt; font-family: " arial","sans-serif";"="">&nbsp;</span></p></td></tr><tr style="height: 40.85pt;"><td colspan="3" style="width: 49.3pt; border: solid #F79646 1.0pt; border-top: none; padding: 0cm 5.4pt 0cm 5.4pt; height: 15.85pt;" width="66"><p style="line-height: normal;"><span style="font-size: 16.0pt; font-family: " arial","sans-serif";"="">Heures éffectuées</span></p></td><td align="center" colspan="3" style="width: 1.0cm; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="38"><p style="line-height: normal;"><span style="font-size: 18.0pt; font-family: " arial","sans-serif";"=""><b><?php  $t=$cm +($td*2/3)+($tp*(1/2)); echo number_format($t, 2)?></b></span></p></td><td style="width: 99.25pt; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="132"><p style="line-height: normal;"><span style="font-size: 6.0pt; font-family: " arial","sans-serif";"="">&nbsp;</span></p></td></tr>
                                
                            </tbody>
                        </table>
                        <table id="etu3"></table></div>
                    <p><span style="font-family: 'Arial','sans-serif';">&nbsp;</span></p>
                    <p><span style="font-family: 'Arial','sans-serif';">&nbsp;</span></p>
                    <p><span style="font-family: 'Arial','sans-serif';">&nbsp;</span></p>
                    <p id="ne" style="break-after: page;">&nbsp;</p>

































                    <p>&nbsp;</p><!--
                    <?php for ($i = 0; $i < count($info['detail']); $i++) { ?>
                    <table align="center" style=" border-collapse: collapse; border: none;">
                        <tbody>
                            <tr>
                            <td style="width: 63.85pt; padding: 0cm 5.4pt 0cm 5.4pt;" width="85">&nbsp;<img src="../../images/logo_iup_abra.png" height="70" width="90" ></td>
                                <td style="width: 31.35pt; padding: 0cm 5.4pt 0cm 5.4pt;" width="42">
                                    <p style="line-height: normal;"><span style="font-size: 9.0pt; font-family: 'Arial','sans-serif';">Institut Universitaire Professionnel</span></p>
                                </td>
                                <td style="width: 402.55pt; padding: 0cm 5.4pt 0cm 5.4pt;" width="537">
                                    <p style="text-align: right; line-height: normal;"><span style="font-size: 22.0pt; font-family: 'Arial','sans-serif';">Liste des Etudiants</span></p>
                                    <p style="text-align: right; line-height: normal;"><span style="font-size: 9.0pt; font-family: 'Arial','sans-serif';">Année Universitaire&nbsp;: 2017/2018</span></p>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 255.2pt; padding: 0cm 5.4pt 0cm 5.4pt;" width="340">
                                    <p style="margin-left: 35.4pt; text-align: justify; line-height: normal;"><strong><span style="font-size: 13.0pt; font-family: 'Arial','sans-serif';">Enseignement&nbsp;: </span></strong><spanb id="infp2" style="font-size: 11.0pt; font-family: 'Arial','sans-serif';"><?php echo $info["detail"][$i]["idProgramme"] . " " . $info["detail"][$i]["semestre"] . " " . $info["detail"][$i]["idModule"] . " " . $info["detail"][$i]["module"]; ?></spanb></p>
                        </td>
                        <td style="width: 10.0cm; padding: 0cm 5.4pt 0cm 5.4pt;" width="378">
                            <p style="margin-left: 35.4pt; line-height: normal;"><strong><span style="font-size: 13.0pt; font-family: 'Arial','sans-serif';">Enseignant&nbsp;: </span></strong><span id="nom2" style="font-size: 11.0pt; font-family: 'Arial','sans-serif';"><?php echo  $info["detail"][$i]["prenom"] . " " . $info["detail"][$i]["nom"]; ?></span></p>
                        </td>
                        </tr>
                        <tr>
                            <td style="width: 255.2pt; padding: 0cm 5.4pt 0cm 5.4pt;" width="340">
                                <p style="margin-left: 35.4pt; line-height: normal;"><strong><span style="font-size: 13.0pt; font-family: 'Arial','sans-serif';">Elément</span></strong><span id="elt2" style="font-size: 13.0pt; font-family: 'Arial','sans-serif';"><?php echo $info["detail"][$i]["sigle"] . " " . $info["detail"][$i]["titre"]; ?></span></p>
                            </td>
                            <td style="width: 10.0cm; padding: 0cm 5.4pt 0cm 5.4pt;" width="378">
                                <p style="margin-left: 35.4pt; line-height: normal;"><strong><span style="font-size: 13.0pt; font-family: 'Arial','sans-serif';">Diplôme</span></strong><span id="titreD2" style="font-size: 13.0pt; font-family: 'Arial','sans-serif';">:   <?php echo $info["detail"][$i]["dernierDiplome"] . " " . $info["detail"][$i]["paysDiplome"]; ?></span></p>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <?php }?>

                <p><span style="font-family: 'Arial','sans-serif';">&nbsp;</span></p>
                <div id="div1">
                    <table align="center" style="width: 771.4pt; border-collapse: collapse; border: none;" width="771">
                        <tbody>
                            <tr style="height: 771.9pt;">
                                <td valign="top" style="width: 771.2pt; border: none; border-right: solid #E36C0A 0.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 556.9pt;" width="386">
                                    <p style="line-height: normal;"><span style="font-family: 'Arial','sans-serif';">&nbsp;</span></p>
                                   
                                    <table border="1" id="etu" align="center" style="width: 771.9pt; border-collapse: collapse; border: none;" width="771"><tbody>
                                            <tr>
                                                <td style="width: 10.3pt; border: solid #E36C0A 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 18.5pt;" width="47">No</td><td style="width: 35.3pt; border: solid #E36C0A 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 18.5pt;" width="47">Nom et prénom</td>
                                                <td style="width: 35.3pt; border: solid #E36C0A 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 18.5pt;" width="47">Sc1</td><td style="width: 35.3pt; border: solid #E36C0A 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 18.5pt;" width="47">Sc2</td><td style="width: 35.3pt; border: solid #E36C0A 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 18.5pt;" width="47">Sc3</td><td style="width: 35.3pt; border: solid #E36C0A 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 18.5pt;" width="47">Sc4</td></tr>
                                            <?php for($i=0;$i<count($info['etudiant']);$i++){?>
                                            <tr><td style="width: 10.3pt; border: solid #E36C0A 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 18.5pt;" width="47"><?php echo $info['etudiant'][$i]['matriculeEtudiant']; ?></td><td style="width: 35.3pt; border: solid #E36C0A 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 18.5pt;" width="47"><?php echo $info['etudiant'][$i]['prenom'].' '.$info['etudiant'][$i]['nom'];  ?></td><td style="width: 35.3pt; border: solid #E36C0A 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 18.5pt;" width="47"></td><td style="width: 35.3pt; border: solid #E36C0A 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 18.5pt;" width="47"></td><td style="width: 35.3pt; border: solid #E36C0A 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 18.5pt;" width="47"></td><td style="width: 35.3pt; border: solid #E36C0A 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 18.5pt;" width="47"></td></tr>
                                            <?php }?>
                                        </tbody></table>
                                </td>
                              
                            </tr>
                            <tr><td colspan="6">   <div id="observations" align="center">
                                        <fieldset align="center" style="border:solid 1px black; padding:20px; width:1000px; height:100px; color:midnightblue; font-family:verdana;">
                                            <legend>Contenu:</legend>
                                            <span id="cont">: </span>
                                        </fieldset>
                                        <br><br>
                                        <strong> </strong> <br>

                                        <br> 
                                    </div></td></tr>-->
                        </tbody>
                    </table>
<?php } ?> 
                    <p><span style="font-family: 'Arial','sans-serif';">&nbsp;</span></p>
                    <!--end of right content-->
                    <div class="clear">

                    </div>
                    <table id="etu"></table></div> <!--end of main content-->
            </div>
            <div class="clear">

            </div>
        </div> <!--end of main content-->
    </div></div>
<?php include(APPPATH.'views/include/footer.php'); ?>

<script type="text/javascript">
<!--
    function imprimer(id) {
        str = document.getElementById(id).innerHTML
        newwin = window.open('', 'printwin', 'left=100,top=100,width=400,height=400')
        newwin.document.write('<HTML>\n <HEAD>\n')
// Hafedh
// Supression de l'entete lors de l'impression
        newwin.document.write('<style>@page { size: auto;  margin: 4mm; }</style>\n')
        newwin.document.write('<style>body {-webkit-print-color-adjust: exact;}  </style>\n')


//newwin.document.write('<link rel="stylesheet" href="<?php echo base_url(); ?>css/printable.css" />\n');
        newwin.document.write('<TITLE></TITLE>\n')
        newwin.document.write('<script>\n')
        newwin.document.write('function chkstate(){\n')
        newwin.document.write('if(document.readyState=="complete"){\n')
        newwin.document.write('window.close()\n')
        newwin.document.write('}\n')
        newwin.document.write('else{\n')
        newwin.document.write('setTimeout("chkstate()",2000)\n')
        newwin.document.write('}\n')
        newwin.document.write('}\n')
        newwin.document.write('function print_win(){\n')
        newwin.document.write('window.print();\n')
        newwin.document.write('chkstate();\n')
        newwin.document.write('}\n')
        newwin.document.write('<\/script>\n')
        newwin.document.write('</HEAD>\n')
        newwin.document.write('<BODY onload="print_win()">\n')
        newwin.document.write('<br>' + str)
        newwin.document.write('</BODY>\n')
        newwin.document.write('</HTML>\n')
        newwin.document.close()
    }
//-->
    document.getElementById("ne").style.pageBreakAfter = "always";
    function f1(str)
    {
        // document.getElementById('default').selected = 'selected';




        var matricule = str.value;
        if (matricule == "") {
            document.getElementById("txtHint").innerHTML = "";
            return;
        } else {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    //document.getElementById("txtHint").innerHTML = this.responseText;
                    var myObj = JSON.parse(this.responseText);
                    //alert(myObj);
                    var options = "";
                    options = myObj;                                                                          //  echo'<option value="' . $loc . '" ';
                    var selectBox = document.getElementById('groupe');
                    $("#groupe").html("<option value='-1'>choisissez le groupe</option>");

                    if (options != "") {
                        for (var i = 0, l = options.length; i < l; i++) {
                            var option = options[i];
                            selectBox.options.add(new Option(options[i], options[i], option.selected));
                        }
                    } else {
                        $("#groupe").html("<option value='-'><span style='font-color='red'>Pas de groupe pour l'annee et semestre courant pour ce module</span></option>");

                    }
                }
            };

            var events = "<?php echo base_url(); ?>index.php/scolarite/groupe_d_enseignent?matricule=" + matricule + "";

            xmlhttp.open("GET", events, true);
            xmlhttp.send();
        }



    }
    function f3(str)
    {
        // document.getElementById('default').selected = 'selected';
        var option = "";




        var groupe = str.value;

        if (groupe == "") {
            document.getElementById("txtHint").innerHTML = "";
            return;
        } else {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    //document.getElementById("txtHint").innerHTML = this.responseText;
                    var jsonData = JSON.parse(this.responseText);
//var selectBox = document.getElementById('matricule');
                    option = "";
                    option = jsonData;
                    // var counter3 = option.employe;
                    //alert(option.paiement.E0110['total'])
                    //  for (j = 0, k = counter3.length; j < k; j++) {
                    //     alert(option.employe[j]['matriculeEmploye']) 
                    //  }
                    // var counter = option.detail[0];

                    /*                                                  if(option !=""){
                     for (var i = 0; i < option.etudiant.length; i++) {
                     var counter = option.etudiant[i];
                     alert(counter.nom);
                     selectBox.options.add(new Option(counter.matriculeEtudiant+" "+counter.nom+" "+counter.prenom,counter.matriculeEtudiant , option.selected));
                     alert()                                          
                     }*/        //alert(counter.description) ; 
                    /*
                     $('#cont').html(": "+counter.description);
                     $('#nom').html(counter.prenom+" "+counter.nom);
                     $('#infp').html(""+counter.idProgramme+" "+counter.semestre+ " "+counter.idModule+" "+counter.module);
                     $('#elt').html(": "+counter.sigle+" "+counter.titre);
                     $('#vol').html("R&eacute;partition&nbsp;: "+counter.hrsCours+" CM "+counter.hrsTD+" TD "+counter.hrsTP+" TP ");
                     $('#titreD').html(":  "+counter.dernierDiplome+" "+counter.paysDiplome);
                     var tp=parseInt(counter.hrsTP);
                     var td=parseInt(counter.hrsTD);
                     var cm=parseInt(counter.hrsCours);
                     var v=tp + td + cm;
                     $('#volume').html("Volume Horaire&nbsp;:"+v +"<b> Répartition:</b> "+counter.hrsCours+" CM "+counter.hrsTD+" TD "+counter.hrsTP+" TP ");
                     $('#bq').html(": "+counter.compteBancaire);
                     var stat="";
                     var x = counter.grade;
                     if((x.charAt(0))=="A"){
                     stat="Permanent";
                     }else{
                     stat="Vacataire";
                     }
                     $('#statut').html(": "+stat+"   <b>Grade:</b> "+counter.grade);
                     $('#grade').html(": "+counter.grade);
                     
                     
                     $('#infp1').html("Filière: "+counter.idProgramme+" Semestre: "+counter.semestre);
                     $('#infm').html("Code: "+counter.idModule+" Intitulé (Module): "+counter.module);
                     $('#infrp').html("R&eacute;partition&nbsp;: "+counter.hrsCours+" CM "+counter.hrsTD+" TD "+counter.hrsTP+" TP ");
                     $('#infel').html("Code: "+counter.sigle+" , Intitulé (Elément): "+counter.titre+" , Vol Horaire Total : "+counter.hrsCours+counter.hrsTD+counter.hrsTP);
                     
                     
                     
                     //dernierDiplome
                     // grade paysDiplome
                     
                     var counter1 = option.etudiant;
                     $('#etu2').html(' ');
                     $('#etu').html(' ');
                     $('#etu').html('<tr><td style="width: 10.3pt; border: solid #E36C0A 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 18.5pt;" width="47">No</td><td style="width: 35.3pt; border: solid #E36C0A 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 18.5pt;" width="47">Nom et prénom</td><td style="width: 35.3pt; border: solid #E36C0A 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 18.5pt;" width="47">Sc1</td><td style="width: 35.3pt; border: solid #E36C0A 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 18.5pt;" width="47">Sc2</td><td style="width: 35.3pt; border: solid #E36C0A 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 18.5pt;" width="47">Sc3</td><td style="width: 35.3pt; border: solid #E36C0A 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 18.5pt;" width="47">Sc4</td></tr>');
                     $('#etu2').html('<tr><td style="width: 10.3pt; border: solid #E36C0A 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 18.5pt;" width="47">No</td><td style="width: 35.3pt; border: solid #E36C0A 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 18.5pt;" width="47">Nom et prénom</td><td style="width: 35.3pt; border: solid #E36C0A 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 18.5pt;" width="47">Sc1</td><td style="width: 35.3pt; border: solid #E36C0A 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 18.5pt;" width="47">Sc2</td><td style="width: 35.3pt; border: solid #E36C0A 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 18.5pt;" width="47">Sc3</td><td style="width: 35.3pt;t; border: solid #E36C0A 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 18.5pt;" width="47">Sc4</td</tr>');
                     var tbl=$("<table/>").attr("id","etu");
                     $("#div1").append(tbl);
                     for (var i = 0, l = counter1.length; i < l; i++) {
                     $('#etu').append('<tr><td style="width: 10.3pt; border: solid #E36C0A 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 18.5pt;" width="47">'+counter1[i]["matriculeEtudiant"]+'</td><td style="width: 35.3pt; border: solid #E36C0A 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 18.5pt;" width="47">'+counter1[i]["nom"]+' '+counter1[i]["prenom"]+'</td><td style="width: 35.3pt; border: solid #E36C0A 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 18.5pt;" width="47"></td><td style="width: 35.3pt; border: solid #E36C0A 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 18.5pt;" width="47"></td><td style="width: 35.3pt; border: solid #E36C0A 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 18.5pt;" width="47"></td><td style="width: 35.3pt; border: solid #E36C0A 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 18.5pt;" width="47"></td></tr>')
                     // }
                     
                     }*/

                }
                /*  for(l=0;l<30;l++){
                 $('#etu3').append('<tr style="height: 30.85pt;"><td style="width: 49.3pt; border: solid #F79646 1.0pt; border-top: none; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="66"><p style="line-height: normal;"><span style="font-size: 10.0pt; font-family: "Arial","sans-serif";"></span></p></td><td style="width: 41.9pt; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="56"><p style="line-height: normal;"><span style="font-size: 10.0pt; font-family: "Arial","sans-serif";"></span></p></td><td style="width: 256.15pt; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="342"><p style="line-height: normal;"><span style="font-size: 6.0pt; font-family: "Arial","sans-serif";"></span></p></td><td style="width: 1.0cm; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="38"><p style="line-height: normal;"><span style="font-size: 6.0pt; font-family: "Arial","sans-serif";"></span></p></td><td style="width: 1.0cm; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="38"><p style="line-height: normal;"><span style="font-size: 6.0pt; font-family: "Arial","sans-serif";"></span></p></td><td style="width: 35.4pt; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="47"><p style="line-height: normal;"><span style="font-size: 6.0pt; font-family: "Arial","sans-serif";"></span></p></td><td style="width: 99.25pt; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="132"><p style="line-height: normal;"><span style="font-size: 6.0pt; font-family: "Arial","sans-serif";">&nbsp;</span></p></td></tr>');
                 }*/
                var counter3 = option.employe;
                //alert(option.paiement.E0110['total'])

                //var counter3 = option.data.cm;
                //console.log(counter3);
                var counter4 = option.paiement;
                var counter5 = option.semaine;
                $('#sem').html(counter5);
                // alert(counter3.length);
                // $("#div2").html(' ');
                $('#etu3').html(' ');
                $('#etu3').html('<tr  style="height: 10.35pt;"><td style="width: 50.3pt; border: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 11.35pt;" rowspan="2" width="66"><p style="line-height: normal;"><span style="font-size: 14.0pt; font-family: Arial,sans-serif;">Matricule</span></p></td><td style="width: 200.9pt; border: solid #F79646 1.0pt; border-left: none; background: #FABF8F; padding: 0cm 5.4pt 0cm 5.4pt; height: 11.35pt;" rowspan="2" width="342"><p style="line-height: normal;"><span style="font-size: 14.0pt; font-family: Arial,sans-serif;">Nom et prénom</span></p></td><td style="width: 100.15pt; border: solid #F79646 1.0pt; border-left: none; padding: 0cm 5.4pt 0cm 5.4pt; height: 11.35pt;" rowspan="2" width="100"><p style="line-height: normal;"><span style="font-size: 14.0pt; font-family: Arial,sans-serif;">NNI</span></p></td><td style="width: 92.1pt; border: solid #F79646 1.0pt; border-left: none; background: #FABF8F; padding: 0cm 5.4pt 0cm 5.4pt; height: 11.35pt;" colspan="3" width="123"><p style="line-height: normal;"><span style="font-size: 14.0pt; font-family: "Arial","sans-serif";">Atome p&eacute;dagogique.</span></p></td><td style="width: 99.25pt; border: solid #F79646 1.0pt; border-left: none; padding: 0cm 5.4pt 0cm 5.4pt; height: 11.35pt;" rowspan="2" width="132"><p style="line-height: normal;"><span style="font-size: 14.0pt; font-family: "Arial","sans-serif";">Total</span></p></td><td style="width: 99.25pt; border: solid #F79646 1.0pt; border-left: none; padding: 0cm 5.4pt 0cm 5.4pt; height: 11.35pt;" rowspan="2" width="132"><p style="line-height: normal;"><span style="font-size: 14.0pt; font-family: "Arial","sans-serif";">Taux horaire</span></p></td><td style="width: 99.25pt; border: solid #F79646 1.0pt; border-left: none; padding: 0cm 5.4pt 0cm 5.4pt; height: 11.35pt;" rowspan="2" width="132"><p style="line-height: normal;"><span style="font-size: 14.0pt; font-family: "Arial","sans-serif";">Montant</span></p></td><td style="width: 99.25pt; border: solid #F79646 1.0pt; border-left: none; padding: 0cm 5.4pt 0cm 5.4pt; height: 11.35pt;" rowspan="2" width="132"><p style="line-height: normal;"><span style="font-size: 14.0pt; font-family: "Arial","sans-serif";">Compte bancaire</span></p></td></tr><tr style="height: 11.35pt;"><td style="width: 1.0cm; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 11.35pt;" width="38"><p style="text-align: center; line-height: normal;"><span style="font-size: 14.0pt; font-family: "Arial","sans-serif";">CM</span></p></td><td style="width: 1.0cm; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; background: #FABF8F; padding: 0cm 5.4pt 0cm 5.4pt; height: 11.35pt;" width="38"><p style="text-align: center; line-height: normal;"><span style="font-size: 14.0pt; font-family: "Arial","sans-serif";">TD</span></p></td><td style="width: 35.4pt; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 11.35pt;" width="47"><p style="text-align: center; line-height: normal;"><span style="font-size: 14.0pt; font-family: "Arial","sans-serif";">TP</span></p></td></tr>');
                //  $('#etu3').html('<tr style="height: 11.35pt;"><td style="width: 49.3pt; border: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 11.35pt;" rowspan="2" width="66"><p style="line-height: normal;"><span style="font-size: 8.0pt; font-family: Arial,sans-serif;">Horaire</span></p></td><td style="width: 41.9pt; border: solid #F79646 1.0pt; border-left: none; background: #FABF8F; padding: 0cm 5.4pt 0cm 5.4pt; height: 11.35pt;" rowspan="2" width="56"><p style="line-height: normal;"><span style="font-size: 8.0pt; font-family: Arial,sans-serif;">Date</span></p></td><td style="width: 256.15pt; border: solid #F79646 1.0pt; border-left: none; padding: 0cm 5.4pt 0cm 5.4pt; height: 11.35pt;" rowspan="2" width="342"><p style="line-height: normal;"><span style="font-size: 8.0pt; font-family: Arial,sans-serif;">R&eacute;sum&eacute; du cours</span></p></td><td style="width: 92.1pt; border: solid #F79646 1.0pt; border-left: none; background: #FABF8F; padding: 0cm 5.4pt 0cm 5.4pt; height: 11.35pt;" colspan="3" width="123"><p style="line-height: normal;"><span style="font-size: 8.0pt; font-family: '"Arial"','"sans-serif"';">Atome p&eacute;dag.</span></p></td><td style="width: 99.25pt; border: solid #F79646 1.0pt; border-left: none; padding: 0cm 5.4pt 0cm 5.4pt; height: 11.35pt;" rowspan="2" width="132"><p style="line-height: normal;"><span style="font-size: 8.0pt; font-family: Arial,sans-serif;">Emargement</span></p></td></tr><tr style="height: 11.35pt;"><td style="width: 1.0cm; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 11.35pt;" width="38"><p style="text-align: center; line-height: normal;"><span style="font-size: 7.0pt; font-family: Arial,sans-serif;">CM</span></p></td><td style="width: 1.0cm; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; background: #FABF8F; padding: 0cm 5.4pt 0cm 5.4pt; height: 11.35pt;" width="38"><p style="text-align: center; line-height: normal;"><span style="font-size: 7.0pt; font-family: Arial,sans-serif;">TD</span></p></td><td style="width: 35.4pt; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 11.35pt;" width="47"><p style="text-align: center; line-height: normal;"><span style="font-size: 7.0pt; font-family: Arial,sans-serif;">TP</span></p></td></tr>');
                var tbl2 = $("<table/>").attr("id", "etu3");
                // alert(counter3);
                $("#div2").append(tbl2);
                var hcm = 0;
                var htd = 0;
                var htp = 0;
                var hcm = 0;
                var j = 0;
                for (j = 0, k = counter3.length; j < k; j++) {

                    var emp = option.employe[j]['matriculeEmploye'];
                    var emp = ["E0110", "E0025"];
                    //alert(option.paiement.emp['total']+" "+emp) 
                    // alert(option.paiement.emp[0]) 
                }
                for (j = 0, k = counter3.length; j < k; j++) {
                    //if(parseInt(counter3[j]["heureD"]) == horaire ) horaire+=2;
                    $('#etu3').append('<tr style="height: 40.85pt;"><td style="width: 49.3pt; border: solid #F79646 1.0pt; border-top: none; padding: 0cm 5.4pt 0cm 5.4pt; height: 15.85pt;" width="66"><p style="line-height: normal;"><span style="font-size: 16.0pt; font-family: "Arial","sans-serif";">' + counter3[j]["heureD"] + 'h-' + horaire + 'h</span></p></td><td style="width: 60.9pt; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 10.85pt;" width="80"><p style="line-height: normal;"><span style="font-size: 16.0pt; font-family: "Arial","sans-serif";">' + date + '</span></p></td><td style="width: 256.15pt; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="342"><p style="line-height: normal;"><span style="font-size: 16.0pt; font-family: "Arial","sans-serif";">' + counter3[j]["commentaire"] + '</span></p></td><td style="width: 1.0cm; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="38"><p style="line-height: normal;"><span style="font-size: 16.0pt; font-family: "Arial","sans-serif";">' + cm1 + '</span></p></td><td style="width: 1.0cm; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="38"><p style="line-height: normal;"><span style="font-size: 16.0pt; font-family: "Arial","sans-serif";">' + td1 + '</span></p></td><td style="width: 35.4pt; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="47"><p style="line-height: normal;"><span style="font-size: 16.0pt; font-family: "Arial","sans-serif";">' + tp1 + '</span></p></td><td style="width: 99.25pt; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="132"><p style="line-height: normal;"><span style="font-size: 16.0pt; font-family: "Arial","sans-serif";">&nbsp;</span></p></td></tr>');

                }

                var total = hcm + (htd * (2 / 3)) + (htp * (1 / 2));
                total = total.toFixed(2)
                $('#etu3').append('<tr style="height: 40.85pt;"><td colspan="3" style="width: 49.3pt; border: solid #F79646 1.0pt; border-top: none; padding: 0cm 5.4pt 0cm 5.4pt; height: 15.85pt;" width="66"><p style="line-height: normal;"><span style="font-size: 16.0pt; font-family: "Arial","sans-serif";"></span></p></td><td style="width: 1.0cm; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 10.85pt;" width="38"><p style="line-height: normal;"><span style="font-size: 16.0pt; font-family: "Arial","sans-serif";"><b>' + hcm + '</b></span></p></td><td style="width: 1.0cm; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="38"><p style="line-height: normal;"><span style="font-size: 16.0pt; font-family: "Arial","sans-serif";">' + htd + '</span></p></td><td style="width: 35.4pt; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="47"><p style="line-height: normal;"><span style="font-size: 16.0pt; font-family: "Arial","sans-serif";">' + htp + '</span></p></td><td style="width: 99.25pt; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="132"><p style="line-height: normal;"><span style="font-size: 10.0pt; font-family: "Arial","sans-serif";">&nbsp;</span></p></td></tr>');
                $('#etu3').append('<tr style="height: 40.85pt;"><td colspan="3" style="width: 49.3pt; border: solid #F79646 1.0pt; border-top: none; padding: 0cm 5.4pt 0cm 5.4pt; height: 15.85pt;" width="66"><p style="line-height: normal;"><span style="font-size: 16.0pt; font-family: "Arial","sans-serif";">Heures éffectuées</span></p></td><td align="center" colspan="3" style="width: 1.0cm; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="38"><p style="line-height: normal;"><span style="font-size: 18.0pt; font-family: "Arial","sans-serif";"><b>' + total + '</b></span></p></td><td style="width: 99.25pt; border-top: none; border-left: none; border-bottom: solid #F79646 1.0pt; border-right: solid #F79646 1.0pt; padding: 0cm 5.4pt 0cm 5.4pt; height: 19.85pt;" width="132"><p style="line-height: normal;"><span style="font-size: 6.0pt; font-family: "Arial","sans-serif";">&nbsp;</span></p></td></tr>');
                var avnc = ((hcm + htd + htp) / (cm + td + tp) * 100);
                avnc = avnc.toFixed(2);
                var taux = counter4.taux_horaire;
                //taux=taux.toFixed(2); 
                $('#avanc').html(":<b> " + avnc + " %</b>");
                $('#taux').html(":<b> " + taux + "</b> ");

            };
            var statut = $('#statut').val();
            var start = $('#dateD').val();
            var end = $('#dateF').val();

            //   var start= moment().startOf('isoWeek').format('YYYY-MM-DD'); 
            //  var end=moment().endOf('isoWeek').format('YYYY-MM-DD');

            var events = "<?php echo base_url(); ?>index.php/agent/afficher_paiement_heures?statut=" + statut + "&start=" + start + "&end=" + end + "";

            xmlhttp.open("GET", events, true);
            xmlhttp.send();
        }



    }
</script>