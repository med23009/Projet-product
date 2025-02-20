<!-- Add by team scolarite 20/02/2023-->
<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');
    
    ?>


<div class="container">
    <div class="col-xs-12 hl-left ">



 <?php echo heading($titre,'3');
            $attributes = array('class' => '');
           // echo form_open('scolarite/liste_etudiants_departement_niveau',$attributes);
	   echo form_open('scolarite/etu_prog',$attributes);           
 
	   echo '<table class="form" id="tableProf" >';
          ?>

            <tr>
                <th style="text-align:left;">Departement</th>

<!--                <th style="text-align:left;">Année </th>
--> <th style="text-align:left;">Niveau</th>

            </tr>
            <tr>


               <td>
                    <select     name="idProgramme"  id="idProgramme" class="form-control"  >
                        <option value="tous">Tous</option>
                        <?php
                            if (is_array($programme['idProgramme'])) {
                                 for ($i = 0; $i < count($programme['idProgramme']); $i++) {
                                     echo '<option value="' . $programme['idProgramme'][$i] . '"';
                                            echo ' >';
                                            echo $programme['idProgramme'][$i] . '</option>';
                                }
                            }
                         ?>
                    </select>

                </td>
 
   <!--                 <select     name="annee"  id="idProgramme" class="form-control"  >
                        
                        <?php
                           
                                 for ($i = 2019; $i < 2030; $i++) {

                                     echo '<option value="' . ($i-1). '"';
                                           
 
                if($anneeC==$i-1){
                           echo ' selected>';
                                   }else{
                                               echo ' >';
} 
         echo $i . '</option>';
                                }
                            
                         ?>
                    </select>

                </td>

       -->           <td>
                    <select     name="niveau"  id="niveau" class="form-control" >
                        
                        <?php

                                 for ($i = 4; $i <6; $i++) {
                                     $j=1;
                                     echo '<option value="' . $i . '"';
                                            echo ' >';
                                            echo $i. '<sup>ème</sup> année</option>';
                                $j++;
                            }
                         ?>
                    </select>

                </td>
<td>
<input type=checkbox name=modules> Affichage des éléments de modules 
</td>
            </tr>
            <tr style="height: 20px;"></tr>
            <tr>
                 <td >
                 <?php $pw = array('type' => 'submit', 'class'=>'btn btn-success','name' => 'submit', 'value'=>'Générer la liste en Excel');
                 echo form_input($pw);?>
                 </td>
            </tr>
         </table>
        <?php echo form_close('</div>');?>


<!--
<?php
    if(isset($confirmation)){
?>
        <script type="text/javascript">
    
    function controle()
    {

        return confirm("<?php echo $confirmation ; ?> ");
             }
</script>
<?php }
else
    {
?>
        <script type="text/javascript">
    
    function controle()
{
        return true;
    }
</script>
<?php }
    
?>
-->

<!--end of main content-->
<?php include(APPPATH.'views/include/footer.php'); ?>
