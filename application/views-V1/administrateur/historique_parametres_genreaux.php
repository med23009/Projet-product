<!-- Ajouter par AZ -->
<!DOCTYPE html>
<?php
include(APPPATH.'views/include/header.php');
include('include/menu.php');
?> 
<style>
    .overflowTest{
        width: 20px;
        height: 13px;
        overflow: hidden;
    }
    </style>


<div class="container-fluid">
    <div class="">
        <div class="">
                <h3>Historique des modifications de paramètres généraux</h3>
              
            <table class="table table-bordered">
                <thead class="">
                    <tr>
                        <th scope="col">Nb</th>
                        <th scope="col">Logo</th>
                        <th scope="col">Nom Français</th>
                        <th scope="col">Nom Arabe</th>
                        <th scope="col">Abrv Fr</th>
                        <th scope="col">Abrv_Fr</th>
                        <th scope="col">Pays Fr</th>
                        <th scope="col">Pays Ar</th>
                        <th scope="col">Ville Fr</th>
                        <th scope="col">Ville Ar</th>
                        <th scope="col">Adresse</th>
                        <th scope="col">Boite Postale</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Téléphone</th>
                        <th scope="col">Site web</th>
                        <th scope="col">Debut d'application</th>
                        <th scope="col">Fin d'application</th>
                        <th scope="col">responsable</th>
                    </tr>
                </thead>
                <tbody class="dropdown">
                    
                    <?php 
                    
                    if(empty($infos))
                        echo "<tr><td>Il n'ya pas d'infos</td></tr>";
                        ?>
                    
                        <?php
                        $j=0;
                        if(!empty($infos))
                        for ($i = 0; $i < count($infos); $i++) {
                                if($i>10){if($infos[$i]['date_fin']=="")
                                    echo "<tr style='background:#16ff1f'>";
                                else
                                    echo "<tr'>";
                                    $j++;
                                    
                                echo '<td>' . ($j). '</td>';
                                
                                echo '<td><a href="#"  data-toggle="popover-hover" data-img="'.base_url().'images/'.$infos[$i]["logo"].'" title="logo" >' . $infos[$i]["logo"]. '</a></td>';
                                
//echo "<td>" . $infos[$i]['logo']. "</td>";
                                echo "<td>" . $infos[$i]['nom']. "</td>";
                                echo "<td>" . $infos[$i]['nom_ar']. "</td>";
                                echo "<td>" . $infos[$i]['abreviation_nom']. "</td>";
                                echo "<td>" . $infos[$i]['abreviation_nom_ar']. "</td>";
                                echo "<td>" . $infos[$i]['pays']. "</td>";
                                echo "<td>" . $infos[$i]['pays_ar']. "</td>";
                                echo "<td>" . $infos[$i]['ville']. "</td>";
                                echo "<td>" . $infos[$i]['ville_ar']. "</td>"; 
                                echo "<td class='overflowTest'>" . $infos[$i]['adresse']. "</td>";
                                echo "<td>" . $infos[$i]['boite_postale']. "</td>";
                               
                                echo "<td>" . $infos[$i]['email']. "</td>";
                                echo "<td class='overflowTest'>" . $infos[$i]['telephone']. "</div></td>";
                                echo "<td ><div class='overflowTest'>" . $infos[$i]['siteweb']. "</td>";
                                echo "<td>" . $infos[$i]['date_d']. "</td>";
                                echo "<td>" . $infos[$i]['date_f']. "</td>";
                                echo "<td>" . $infos[$i]['responsable']. "</td>";
                            echo "</tr>";     
                        }
                        }
                        ?>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <script>
            $('[data-toggle="popover-hover"]').popover({
      html: true,
      trigger: 'hover',
      placement: 'top',
      content: function () { return '<img width=100 height=100 src="' + $(this).data('img') + '" />'; }
    });
        </script>
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