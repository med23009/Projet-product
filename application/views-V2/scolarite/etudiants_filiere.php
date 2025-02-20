<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include(APPPATH.'views/include/header.php');

    include('include/menu.php');?>
<div class="container">
     <?php 
        $attributes = array("class" => "form-horizontal", "id" => "maxnumform", "name" => "maxnumform");
        echo form_open("scolarite/Max_num", $attributes);?>
        <?php echo $this->session->flashdata('msg'); ?>
    <!--
   <table class="table">
    <thead>
      <tr>
        <th>Groupe d'étudiants</th>
        <th>RXTEL</th>
        <th>MAN</th>
        <th>MAEF</th>
        <th>LGTR</th>
      </tr>
    </thead>
    <tbody>
        <?php //for ($i = 0; $i < count($etudiants); ++$i) {?> 
      <tr>
        <td>(A)Nouveaux inscrits+redoublants</td>
        <?php for ($i = 0; $i < count($etudiants['nombreEtud_nouv&redoubl_s1']); ++$i) { echo"<td><input name='num_A[]' type='text'value='". $etudiants['nombreEtud_nouv&redoubl_s1'][$i]."' class='form-control'/></td>"; }?>
      </tr>
      <tr>
        <td>(B)En s3(modules à rattraper en s1)</td>
      
     <?php for ($i = 0; $i < count($etudiants['nombreEtud_s3_ratt_s1']); ++$i) { echo"<td><input name='num_B[]' type='text'value='". $etudiants['nombreEtud_s3_ratt_s1'][$i]."' class='form-control'/></td>"; }?>
      </tr>
      <tr>
        <td>(C)En s5(rattrape en s1 et pas  s3 )</td>
      <?php for ($i = 0; $i < count($etudiants['nombreEtud_s5_ratt_s1&_no_s3']); ++$i) { echo"<td><input name='num_C[]' type='text'value='". $etudiants['nombreEtud_s5_ratt_s1&_no_s3'][$i]."' class='form-control'/></td>"; }?>
     
      </tr>
      <tr>
        <td>(D)En s5(modules à rattraper en (s1 et s3))</td>
        <?php for ($i = 0; $i < count($etudiants['nombreEtud_s5_ratt_s1&s3']); ++$i) { echo"<td><input name='num_D[]' type='text'value='". $etudiants['nombreEtud_s5_ratt_s1&s3'][$i]."' class='form-control'/></td>"; }?>
     
      </tr>
      <tr>
        <td>(E)En s3(rien à rattraper en s1)</td>
        
         <?php for ($i = 0; $i < count($etudiants['nombreEtud_no_ratt_s1']); ++$i) { echo"<td><input name='num_E[]' type='text'value='". $etudiants['nombreEtud_no_ratt_s1'][$i]."' class='form-control'/></td>"; }?>
     
      </tr>
      <tr>
        <td>(F)En s5(rien à rattraper en (s1 et s3))</td>
         <?php for ($i = 0; $i < count($etudiants['nombreEtud_s5_no_ratt']); ++$i) { echo"<td><input name='num_F[]' type='text'value='". $etudiants['nombreEtud_s5_no_ratt'][$i]."' class='form-control'/></td>"; }?>
     
      </tr>
      <tr>
        <td>(G)En s5(rattrape en s3 et pas  s1 )</td>
      
      <?php for ($i = 0; $i < count($etudiants['nombreEtud_s5_ratt_s3&_no_s1']); ++$i) { echo"<td><input name='num_G[]' type='text'value='". $etudiants['nombreEtud_s5_ratt_s3&_no_s1'][$i]."' class='form-control'/></td>"; }?>
     </tr>
     <tr>
        <td>Nombre de places par table</td>
      
      <?php echo"<td colspan='4'><input name='nb_par_table' type='text'value='' class='form-control'/></td>"; ?>
     
     </tr>
     
        <?php //}?>
      <tr><th colspan="2"> <input id="btn_add" name="btn_add" type="submit" class="btn btn-primary" value="Max Num" /></th></tr>
    </tbody>
  </table>-->
</div>

           <div class="clear"></div>
    </div> <!--end of main content-->
	
    <?php
  include(APPPATH.'views/include/footer.php');?>

       

