<!DOCTYPE html>
<?php
include(APPPATH.'views/include/header.php');
include('include/menu.php');
?> 


<div class="container">
    <div class="col-xs-12 hl-left">
        <div class="">
                <h3>Note éliminatoire - Matière  </h3>
              
            
            <table class="table table-bordered">
                <thead class="">
                    <tr>
                        <th scope="col">Note</th>
                        <th scope="col">Debut d'application</th>
                        <th scope="col">Fin d'application</th>
                        <th scope="col">responsable</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                     if(empty($notes_eliminations_matiere))
                        echo "<tr><td>Aucun resultat trouvé</td></tr>";
                        ?>
                    
                        <?php
                        if(!empty($notes_eliminations_matiere))
                        for ($i = 0; $i < count($notes_eliminations_matiere); $i++) {
                                if($notes_eliminations_matiere[$i]['date_fin']=="")
                                    echo "<tr style='background:#16ff1f'>";
                                else
                                    echo "<tr'>";
                                echo "<td>" . $notes_eliminations_matiere[$i]['note'] . "</td>";
                                echo "<td>" . $notes_eliminations_matiere[$i]['niceDateDebut'] . "</td>";
                                echo "<td>" . $notes_eliminations_matiere[$i]['niceDateFin'] . "</td>";
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
            <h3>Note éliminatoire - Module </h3>

            <table class="table  table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Note</th>
                        <th scope="col">Debut d'application</th>
                        <th scope="col">Fin d'application</th>
                        <th scope="col">responsable</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if(empty($notes_eliminations_module))
                        echo "<tr><td>Aucun resultat trouvé</td></tr>";
                        ?>
                        <?php
                        if(!empty($notes_eliminations_module))
                        for ($i = 0; $i < count($notes_eliminations_module); $i++) {
                            if($notes_eliminations_module[$i]['date_fin']=="")
                                    echo "<tr style='background:#16ff1f'>";
                                else
                                    echo "<tr'>";
                                echo "<td>" . $notes_eliminations_module[$i]['note'] . "</td>";
                                
                                echo "<td>" . $notes_eliminations_module[$i]['niceDateDebut'] . "</td>";
                                echo "<td>" . $notes_eliminations_module[$i]['niceDateFin'] . "</td>";
                                echo "<td>" . $notes_eliminations_module[$i]['responsable'] . "</td>";
                            echo "</tr>"; 
                        }
                        ?>
                </tbody>
            </table>
        </div>
        
        <hr><!- liste des notes eliminatoires du semestre -->
        <div class="">
            <h3>Note éliminatoire - Semestre </h3>

            <table class="table  table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Note</th>
                        <th scope="col">Debut d'application</th>
                        <th scope="col">Fin d'application</th>
                        <th scope="col">responsable</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if(empty($notes_eliminations_semestre))
                        echo "<tr><td>Aucun resultat trouvé</td></tr>";
                        ?>
                    
                        <?php
                        if(!empty($notes_eliminations_semestre))
                        for ($i = 0; $i < count($notes_eliminations_semestre); $i++) {
                            if($notes_eliminations_semestre[$i]['date_fin']=="")
                                    echo "<tr style='background:#16ff1f'>";
                            else
                                echo "<tr'>";
                            echo "<td>" . $notes_eliminations_semestre[$i]['note'] . "</td>";
                            echo "<td>" . $notes_eliminations_semestre[$i]['niceDateDebut'] . "</td>";
                            echo "<td>" . $notes_eliminations_semestre[$i]['niceDateFin'] . "</td>";
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