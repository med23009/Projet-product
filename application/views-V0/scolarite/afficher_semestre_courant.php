<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
   
    <div class="container">
    <div class="col-xs-12 hl-left">         
        
   <h2>Détails relatifs au semestre courant</h2> 
		<?php
			function Formatter_date($date)	// même fonction dans bulletin.php
			{
			$elements = explode("-", $date);
				$mois = array(
					'01' => 'janvier', '02' => 'février', '03' => 'mars', '04' => 'avril', '05' => 'mai', '06' => 'juin',
					'07' => 'juillet', '08' => 'août', '09' => 'septembre', '10' => 'octobre', '11' => 'novembre', '12' => 'décembre');
				return $elements[2].' '.$mois[$elements[1]].' '.$elements[0];
			}
		
		$num_semestre = $courant['semestre'][0];
		
		echo "Semestre courant : ";
		if($num_semestre == 3)
        {
            echo '<b>Automne ';
        }
        elseif($num_semestre == 2)
        {
            echo '<b>Été ';
        }
        else
        {
            echo '<b>Printemps ';
        }
		echo $courant['annee'][0]." </b><br><br>" ; 
		
		echo "Date de début des cours : <b>". Formatter_date($courant['debutCours'][0]). " </b><br><br>"; 
		echo "Date de fin des cours : <b>". Formatter_date($courant['finCours'][0]). " </b><br><br>"; 
		?>

  </div>   <!--end of center content -->               
                    
                    
    
    </div>  
    <div class="clear"></div>
    </div> <!--end of main content-->
	
    
  <?php include(APPPATH.'views/include/footer.php');?>