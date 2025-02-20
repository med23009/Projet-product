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


<div class="container">
    <div class="col-xs-12 hl-left">
        <div class="">
                <h3>Historique des modifications de regles de passage</h3>
              
            <table class="table table-bordered">
                <thead class="">
                    <tr>
                        <th scope="col">cycle</th>
                        <th scope="col">niveau</th>
                        <th scope="col">credit</th>
                        <th scope="col">moyenne</th>
                        <th scope="col">MGL1</th>
                        <th scope="col">ECTSL1</th>
                        <th scope="col">MGL2</th>
                        <th scope="col">ECTSL2</th>
                        <th scope="col">Debut d'application</th>
                        <th scope="col">Fin d'application</th>
                        <th scope="col">responsable</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php if(empty($infos)==0)
                        echo "<tr><td>Il n'ya pas d'infos</td></tr>";
                        ?>
                    
                        <?php
                        $j=0;
                        if(!empty($infos))
                        for ($i = 0; $i < count($infos); $i++) {
                                if($infos[$i]['date_fin']=="")
                                    //echo "<tr style='background:#16ff1f'>";
                                    1;
                                else
                                
                                    echo "<tr'>";
                                
                                echo "<td>" . $infos[$i]['cycle']. "</td>";
                                echo "<td>" . $infos[$i]['niveau']. "</td>";
                                echo "<td>" . $infos[$i]['credit']. "</td>";
                                echo "<td>" . $infos[$i]['moyenne']. "</td>";
                                echo "<td>" . $infos[$i]['MGL1']. "</td>";
                                echo "<td>" . $infos[$i]['ECTSL1']. "</td>";
                                echo "<td>" . $infos[$i]['MGL2']. "</td>";
                                echo "<td>" . $infos[$i]['ECTSL2']. "</td>"; 
                                echo "<td>" . $infos[$i]['date_d']. "</td>";
                                if($infos[$i]['date_fin']=="")
                                    echo "<td  style='background:#16ff1f'>active</td>";
                                else
                                    echo "<td>" . $infos[$i]['date_f']. "</td>";
                                echo "<td>" . $infos[$i]['responsable']. "</td>";
                            echo "</tr>";     
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