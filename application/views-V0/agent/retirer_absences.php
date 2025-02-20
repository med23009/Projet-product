<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
  <div class="container">
    <div class="col-xs-12 hl-left">

         <?php echo heading($titre,'2');       
           echo form_open('scolarite/retirer_absences_etudiant');
          
         ?>

        <div style="height: 20px;"></div>
        <table id="retrait">
            <tr>
                <td><label><INPUT type= "radio" name="choixFonction" value="retrait">Retrait</input>       
                <td><label><INPUT type= "radio" name="choixFonction" value="motivation">Motivation</input>       
            </tr>
        </table>
        <div style="height: 20px;"></div>
        <table id="retrait">
            <tr>
                <td style="width: 100px;text-align: center;border: 1px solid #000000">
                    <label>Date</label>
                </td>
                <td style="width:70px;text-align: center;border: 1px solid #000000">
                    <label>Matricule</label>
                </td>
                <td style="width:60px;border: 1px solid #000000">
                    <label>Période</label>
                </td>
                <td style="width:100px;border: 1px solid #000000">
                    <label>Durée</label>
                </td>
                <td style="width:220px; border: 1px solid #000000">
                    <label>Groupe</label>
                </td>
            </tr>
        </table>
       <p id="retrait" style="border :1px solid #000000;">
        <?php 
        if($date!='')
        {
            for($i=0;$i<count($date);$i++)
            {
                // modif RM 23 février 2013 : $this->scolarite_modele->corrigerNumGroupe($idGroupe[$i]) au lieu de $idGroupe[$i]
				echo '<label><input type="checkbox" name="items['.$i.']]">'.$date[$i].'&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <label>'.$matriculeEtudiant[$i].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>  <label>'.$periode[$i].
                '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </label> 
                <label> '.number_format($duree[$i],2).'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><label> '. 
                $this->scolarite_modele->corrigerNumGroupe($idGroupe[$i]).'  </label><br>';
            }
        }
        
        echo form_hidden('date',$date);
         echo form_hidden('matriculeEtudiant',$matriculeEtudiant);
          echo form_hidden('duree',$duree);
		   echo form_hidden('idGroupe',$idGroupe);
            echo form_hidden('periode',$periode);
        
        ?>
        <div style="margin-left: 200px; position: relative;">
          <?php
                $pw = array('type' => 'submit', 'name' => 'submit', 'id'=>'submit', 'value'=>'Enregistrer');
                echo form_input($pw);
          ?>
        </div>
        <?php echo form_close('</div>');?>
           </div>
           <div class="clear"></div>
    </div> <!--end of main content-->

    <?php
  include(APPPATH.'views/include/footer.php');?>


