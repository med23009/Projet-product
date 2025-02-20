<!DOCTYPE html>
<?php
include(APPPATH.'views/include/header.php');
include('include/menu.php');
?> 


<div class="container">
    <div class="col-xs-12 hl-left">
        <div class="">
                <h3>Note éliminatoire - Matière | 
                    <span><?php echo anchor('scolarite/authentification_modification_des_notes/modification/matiere', 'Modifer', 'class="btn btn-success"') ?></span>
                </h3>
              
            
            <table class="table table-bordered">
                <thead class="">
                    <tr>
                        <th scope="col">Note</th>
                        <th scope="col">Cycle</th>
                        <th scope="col">Debut d'application</th>
                        <th scope="col">Fin d'application</th>
                        <th scope="col">responsable</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(count($notes_eliminations_matiere)==0)
                        echo "<tr><td>Aucun resultat trouvé</td></tr>";
                        ?>
                    
                        <?php
                        for ($i = 0; $i < count($notes_eliminations_matiere); $i++) {
                                if($notes_eliminations_matiere[$i]['date_fin']=="")
                                    echo "<tr style='background:#16ff1f'>";
                                else
                                    echo "<tr'>";
                                echo "<td>" . $notes_eliminations_matiere[$i]['note'] . "</td>";
                                
                                if( $notes_eliminations_matiere[$i]['cycle']=="4")
                                    echo "<td>Licence</td>";
                                elseif ($notes_eliminations_matiere[$i]['cycle']=="5")
                                    echo "<td>Master</td>";
                                
                                echo "<td>" . $notes_eliminations_matiere[$i]['date_debut'] . "</td>";
                                echo "<td>" . $notes_eliminations_matiere[$i]['date_fin'] . "</td>";
                                echo "<td>" . $notes_eliminations_matiere[$i]['responsable'] . "</td>";
                            echo "</tr>";     
                        }
                        ?>
                    </tr>
                </tbody>
            </table>
        </div>
        <hr class="hr-primary"><!- liste des notes eliminatoires du module -->
        <div class="">
            <h3>Note éliminatoire - Module | 
                    <span><?php echo anchor('scolarite/authentification_modification_des_notes/modification/module', 'Modifer', 'class="btn btn-success"') ?></span>
            </h3>

            <table class="table  table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Note</th>
                        <th scope="col">Cycle</th>
                        <th scope="col">Debut d'application</th>
                        <th scope="col">Fin d'application</th>
                        <th scope="col">responsable</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(count($notes_eliminations_module)==0)
                        echo "<tr><td>Aucun resultat trouvé</td></tr>";
                        ?>
                        <?php
                        for ($i = 0; $i < count($notes_eliminations_module); $i++) {
                            if($notes_eliminations_module[$i]['date_fin']=="")
                                    echo "<tr style='background:#16ff1f'>";
                                else
                                    echo "<tr'>";
                                echo "<td>" . $notes_eliminations_module[$i]['note'] . "</td>";
                                
                                if( $notes_eliminations_module[$i]['cycle']=="4")
                                    echo "<td>Licence</td>";
                                elseif ($notes_eliminations_module[$i]['cycle']=="5")
                                    echo "<td>Master</td>";
                                
                                echo "<td>" . $notes_eliminations_module[$i]['date_debut'] . "</td>";
                                echo "<td>" . $notes_eliminations_module[$i]['date_fin'] . "</td>";
                                echo "<td>" . $notes_eliminations_module[$i]['responsable'] . "</td>";
                            echo "</tr>"; 
                        }
                        ?>
                </tbody>
            </table>
        </div>
        
        <hr><!- liste des notes eliminatoires du semestre -->
        <div class="">
            <h3>Note éliminatoire - Semestre | 
                    <span><?php echo anchor('scolarite/authentification_modification_des_notes/modification/semestre', 'Modifer', 'class="btn btn-success"') ?></span>
            </h3>

            <table class="table  table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Note</th>
                        <th scope="col">Cycle</th>
                        <th scope="col">Debut d'application</th>
                        <th scope="col">Fin d'application</th>
                        <th scope="col">responsable</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(count($notes_eliminations_semestre)==0)
                        echo "<tr><td>Aucun resultat trouvé</td></tr>";
                        ?>
                    
                        <?php
                        for ($i = 0; $i < count($notes_eliminations_semestre); $i++) {
                            if($notes_eliminations_semestre[$i]['date_fin']=="")
                                    echo "<tr style='background:#16ff1f'>";
                                else
                                    echo "<tr'>";
                            echo"<tr>";
                                echo "<td>" . $notes_eliminations_semestre[$i]['note'] . "</td>";
                                
                                if( $notes_eliminations_semestre[$i]['cycle']=="4")
                                    echo "<td>Licence</td>";
                                elseif ($notes_eliminations_semestre[$i]['cycle']=="5")
                                    echo "<td>Master</td>";
                                
                                echo "<td>" . $notes_eliminations_semestre[$i]['date_debut'] . "</td>";
                                echo "<td>" . $notes_eliminations_semestre[$i]['date_fin'] . "</td>";
                                echo "<td>" . $notes_eliminations_semestre[$i]['responsable'] . "</td>";
                            echo "</tr>"; 
                        }
                        ?>
                    </tr>
                </tbody>
            </table>
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