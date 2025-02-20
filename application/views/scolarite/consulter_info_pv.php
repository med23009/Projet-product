<?php include(APPPATH.'views/include/header.php');
include('include/menu.php');
?>
<a href="<?php echo base_url();?>index.php/scolarite/generer_pv_new" class="button button-grey" ><button id="btn" >Retour</button></a>

    
 <div class="container">
    <div class="col-xs-12 hl-left">
            
<button  onClick="imprimer('printable');" style="float:right; height: 30px; background-color:#cceac4; width: 160px; margin-right:185px; margin-top:50px;"><b> Imprimer le PV </b></button>

    
        <div id="printable">
           <table  border="0" width="100%">
             <tr>
                 <td><img src="../../images/<?=$param_generaux[0]['logo']?>" height="70" width="90" ></td>
                  
                  <td> 
                      <table  border="0" style="line-height: 10px">
                          <tr>
                              <td align="center" style="font-size: 120%;font-family: Times;"><b><?=$param_generaux[0]['nom']?></b></td>
                          </tr>
                          <tr>
                          <td>
                          <table  border="0" style="line-height: 7px">
                          <tr>
                              <td style="font-size: 50%;border-top: 1px solid black"><?=$param_generaux[0]['adresse']?>T&eacute;léphone :<?=$param_generaux[0]['telephone']?> Mobile :<?=$param_generaux[0]['telephone_2']?> , Email :<?=$param_generaux[0]['email']?> </td>
                          </tr>
                          <tr>
                              <td style="font-size: 50%">Boite Postale : <?=$param_generaux[0]['boite_postale']?>, Siteweb : <?=$param_generaux[0]['siteweb']?>, <?=$param_generaux[0]['ville']?>-<?=$param_generaux[0]['pays']?></td>
                          </tr>
                          </table>
                              </td>
                          <tr/>
                      </table>
                  </td> 
                   <td><!--<img src="../../images/ustm.png" height="70" width="100">--></td>
             </tr>
             <tr><td colspan="3" style="font-size: 14px" align="center"><b>Procès Verbal des Résultats</b></td></tr>
              <tr><td colspan="3" style="font-size: 14px" align="center"> <?php echo '<b>'.($sess == 1 ?'Session NORMALE':'Session de RATTRAPAGE').'<b/>';?></td></tr>
             </table> 
            <table  border="0" width="100%">
              
               <tr>
                   <td style="font-size: 100%" align="left"> <?php echo 'Filière : <b>'.$idProgramme .'<b/>'?></td>
                   <td style="font-size: 100%" align="right"> <?php echo 'Semestre : <b>'.$semestre.'<b/>'?></td>
               </tr>
           </table>
           
         <?php 
          if($etudiants !=null){
              $nbBreakPage=1;
              $numPage=0;
              $counterEt=0;
           foreach ($etudiants as $matriculeEtudiant=>$etudiant) { 
               
            if(array_key_exists('modules', $etudiant) && count($etudiant['modules'])>0){ //modifier par MedBakar pour negliger les etudiants sans module
               $counterEt++;
               $info =$etudiant['info'];
            $modules = $etudiant['modules'];
            $semestre = $etudiant['semestre'];
          //  $pvCC=null;
            $pvCC=null;
            if(isset($etudiant['pvCC'])){
             $pvCC = $etudiant['pvCC'];
            }
              $pvSN=null;
            if(isset($etudiant['pvSN'])){
             $pvSN = $etudiant['pvSN'];
            }
               $pvSR=null;
            if(isset($etudiant['pvSR'])){
             $pvSR = $etudiant['pvSR'];
            }
               $abCC=null;
            if(isset($etudiant['abCC'])){
             $abCC = $etudiant['abCC'];
            }
              $abSN=null;
            if(isset($etudiant['abSN'])){
             $abSN = $etudiant['abSN'];
            }
              $abSR=null;
            if(isset($etudiant['abSR'])){
             $abSR = $etudiant['abSR'];
            }
              $zeroCC=null;
            if(isset($etudiant['zeroCC'])){
             $zeroCC = $etudiant['zeroCC'];
            }
               $zeroSN=null;
            if(isset($etudiant['zeroSN'])){
             $zeroSN = $etudiant['zeroSN'];
            }
               $zeroSR=null;
            if(isset($etudiant['zeroSR'])){
             $zeroSR = $etudiant['zeroSR'];
            }
               $element_ratt_en_gras=null;
            if(isset($etudiant['element_ratt_en_gras'])){
             $element_ratt_en_gras = $etudiant['element_ratt_en_gras'];
            }
             // print_r($pvCC);
            if(($counterEt%2)==1)
            {echo '<br>'; }
            
            echo '<table  border="0" width="100%" style="font-family:Times; font-size:10px;line-height: 2px;" cellspacing="10">'; 
             
             echo '<tr>';
              echo'<td id="contenu"><label>'; ?> <?php echo 'N°:<strong> '.$info['matriculeEtudiant'].'</strong>' ; ?></label></td>        
               <td id="contenu"><label><?php echo 'Nom : <strong>'.$info['nom'].', '.$info['prenom'].'</strong>'; ?></label></td>
             
               <td id="contenu"><label><?php echo 'Filière : <strong>'.$etudiant['idProgramme'].'</strong>'; ?></label></td> 
           <td id="contenu"><label><?php echo 'Semestre : <strong> S'.$etudiant['numSem'].'</strong>'; ?></label></td>
            
           <td id="contenu"><label><?php echo  'Année : <strong> '.$anneeSc .'</strong>'; ?></label></td>
             </tr>
          </table>
            
            <table border="1"  width="100%" style="border-collapse: collapse;line-height: 12px">
                <tr><td>
                        <table border="0"  width="100%" style="font-family:Times; font-size:10.5px;line-height: 16px ; " cellspacing="0" >
       
                           <?php
                            echo'<tr style="background-color:#E9E3E3">
                            <td style="border-bottom: 1px solid black"><strong>Code</strong></td>
                            <td style="border-bottom: 1px solid black"><strong>Intitulé du Module</strong></td>
                            <td style="border-bottom: 1px solid black"><strong>Credit</strong></td>
                            <td style="border-bottom: 1px solid black"></td>
                            <td style="border-bottom: 1px solid black"></td>
                            <td style="border-bottom: 1px solid black"></td>
                            <td style="border-bottom: 1px solid black"><strong>Credit[coef]</strong></td>                            
                             <td style="border-bottom: 1px solid black"><strong>NCC</strong></td>
                             <td style="border-bottom: 1px solid black"><strong>NSN</strong></td>
                             <td style="border-bottom: 1px solid black"><strong>NSR</strong></td>
                             <td style="border-bottom: 1px solid black"><strong>NFE</strong></td>
                             <td style="border-bottom: 1px solid black"><strong>Capit</strong></td>
                             <td style="border-bottom: 1px solid black"><strong>NM</strong></td>
                             <td style="border-bottom: 1px solid black"><strong>Validation</strong></td>
                             </tr>';
                            
                            ?>  
                           <?php 
                           if($modules !=null){
                           foreach ($modules as $idModule=>$module) {
                              echo '<tr><td >'.$idModule.'</td>' ;
                              echo '<td colspan= "1" >'.$module['titre'].'</td>' ;
                              echo '<td colspan= "1" >'.$module['ects'].'</td>' ;
                              echo '<td colspan= "11" ></td></tr>';                           
                            
                              echo '<tr><td></td>'
                              . '<td style="border-bottom: 1px solid black;">Code</td><td style="border-bottom: 1px solid black;"></td>'
                                      . '<td style="border-bottom: 1px solid black;"></td>'
                                      . '<td style="border-bottom: 1px solid black;"></td> '
                                      . '<td style="border-bottom: 1px solid black;"> Intitulé Elément de Module </td>' ;
                              echo '<td colspan= "9" style="border-bottom: 1px solid black;"></td></tr>';
                              $i=0;
                              foreach ($module['elements'] as $sigle=>$element) {
                                  if($element['capit']=='CI' || $element['capit']=='CE' ){
                                      $element['capit']='C';
                                  }
                                  if($module['decision']=='VE' || $module['decision']=='VC'){
                                      $module['decision']='V';
                                  }
                                   if($i==0){
                                        if ($element['status']=='0') {
                                          echo '<tr><td></td><td>'.$sigle.'  <font color="red"> </font></td>' ;
                                      echo'<td></td>';
                                      }else{
                                          echo '<tr><td></td><td>'.$sigle.'  <font color="red"> ***</font></td>' ;
                                      echo'<td></td>';
                                      }
                                     
                                            echo'<td></td><td></td>';
                                            echo '<td style="border-bottom: 1px solid black;">'.$element['titre'].'</td>';
                                            echo '<td style="border-bottom: 1px solid black;">'.$element['ects'].'[ '.$element['coefficient'].' ]</td>' ;
                                          
                                            
                                          /*    for($q=0;$q<count($pvCC['sigle']);$q++){
                                            if($pvCC['sigle'][$q]==$sigle){
                                            echo '<td style="border-bottom: 1px solid black;">0*</td>' ;;
                                           }else{
                                                echo '<td style="border-bottom: 1px solid black;">'.number_format($element['ncc'],2).'</td>' ;;
                                          
                                          }}
                                              for($q=0;$q<count($pvSN['sigle']);$q++){
                                            if($pvSN['sigle'][$q]==$sigle){
                                            echo '<td style="border-bottom: 1px solid black;">0*</td>' ;;
                                           }else{
                                                echo '<td style="border-bottom: 1px solid black;">'.number_format($element['nsn'],2).'</td>' ;;
                                          
                                          }} */
                                              $siglesPVcc = '';
            for($i=0; $i<count($pvCC['sigle']);++$i)
                $siglesPVcc = $siglesPVcc.$pvCC['sigle'][$i].',';
           $siglesPVcc = $siglesPVcc.$pvCC['sigle'][count($pvCC['sigle'])-1];
                                          
$siglesPVccArr = explode(',', $siglesPVcc);
                                       $siglesABcc = '';
            for($i=0; $i<count($abCC['sigle']);++$i)
                $siglesABcc = $siglesABcc.$abCC['sigle'][$i].',';
           $siglesABcc = $siglesABcc.$abCC['sigle'][count($abCC['sigle'])-1];
                                          
$siglesABccArr = explode(',', $siglesABcc);
          $siglesZRcc = '';
            for($i=0; $i<count($zeroCC['sigle']);++$i)
                $siglesZRcc = $siglesZRcc.$zeroCC['sigle'][$i].',';
           $siglesZRcc = $siglesZRcc.$zeroCC['sigle'][count($zeroCC['sigle'])-1];
                                          
$siglesZRccArr = explode(',', $siglesZRcc);
                                        $siglesPVsn = '';
            for($i=0; $i<count($pvSN['sigle']);++$i)
                $siglesPVsn = $siglesPVsn.$pvSN['sigle'][$i].',';
           $siglesPVsn = $siglesPVsn.$pvSN['sigle'][count($pvSN['sigle'])-1];
                                          
$siglesPVsnArr = explode(',', $siglesPVsn);
$siglesPVsr = '';
            for($i=0; $i<count($pvSR['sigle']);++$i)
                $siglesPVsr = $siglesPVsr.$pvSR['sigle'][$i].',';
           $siglesPVsr = $siglesPVsr.$pvSR['sigle'][count($pvSR['sigle'])-1];
                                          
$siglesPVsrArr = explode(',', $siglesPVsr);
                                       $siglesABsn = '';
            for($i=0; $i<count($abSN['sigle']);++$i)
                $siglesABsn = $siglesABsn.$abSN['sigle'][$i].',';
           $siglesABsn = $siglesABsn.$abSN['sigle'][count($abSN['sigle'])-1];
                                          
$siglesABsnArr = explode(',', $siglesABsn);
         $siglesZRsn = '';
            for($i=0; $i<count($zeroSN['sigle']);++$i)
                $siglesZRsn = $siglesZRsn.$zeroSN['sigle'][$i].',';
           $siglesZRsn = $siglesZRsn.$zeroSN['sigle'][count($zeroSN['sigle'])-1];
                                          
$siglesZRsnArr = explode(',', $siglesZRsn);
$siglesZRsr = '';
            for($i=0; $i<count($zeroSR['sigle']);++$i)
                $siglesZRsr = $siglesZRsr.$zeroSR['sigle'][$i].',';
           $siglesZRsr = $siglesZRsr.$zeroSR['sigle'][count($zeroSR['sigle'])-1];
                                          
$siglesZRsrArr = explode(',', $siglesZRsr);
 $siglesABsr = '';
            for($i=0; $i<count($abSR['sigle']);++$i)
                $siglesABsr = $siglesABsr.$abSR['sigle'][$i].',';
           $siglesABsr = $siglesABsr.$abSR['sigle'][count($abSR['sigle'])-1];
                                          
$siglesABsrArr = explode(',', $siglesABsr);

$sigles_en_gras_sr = '';
            for($i=0; $i<count($element_ratt_en_gras['sigle']);++$i)
                $sigles_en_gras_sr = $sigles_en_gras_sr.$element_ratt_en_gras['sigle'][$i].',';
           $sigles_en_gras_sr = $sigles_en_gras_sr.$element_ratt_en_gras['sigle'][count($element_ratt_en_gras['sigle'])-1];
                                          
$siglesABsrArr = explode(',', $sigles_en_gras_sr);


                                            if (in_array($sigle, $siglesPVccArr)) {
                                                    echo '<td style="border-bottom: 1px solid black;"><font color="red">0*</font></td>' ;;
                                            }elseif(in_array($sigle, $siglesABccArr)){
                                               echo '<td style="border-bottom: 1px solid black;"><font color="red">0**</font></td>' ;;
                                            
                                            }elseif(in_array($sigle, $siglesZRccArr)){
                                               echo '<td style="border-bottom: 1px solid black;">'.number_format(0,2).'</td>' ;;
                                            
                                             }elseif($element['ncc']=="0.00"){
                                               echo '<td style="border-bottom: 1px solid black;"></td>' ;;
                                            
                                            }else{
                                                echo '<td style="border-bottom: 1px solid black;">'.number_format($element['ncc'],2).'</td>' ;;
                                          
                                          }
                                          if (in_array($sigle, $siglesPVsnArr)) {
                                                    echo '<td style="border-bottom: 1px solid black;"><font color="red">0*</font></td>' ;;
                                            }elseif(in_array($sigle, $siglesABsnArr)){
                                               echo '<td style="border-bottom: 1px solid black;"><font color="red">0**</font></td>' ;;
                                            
                                            }elseif(in_array($sigle, $siglesZRsnArr)){
                                               echo '<td style="border-bottom: 1px solid black;">'.number_format(0,2).'</td>' ;;
                                            
                                             }elseif($element['nsn']=="0.00"){
                                               echo '<td style="border-bottom: 1px solid black;"></td>' ;;
                                            
                                            }else{
                                                echo '<td style="border-bottom: 1px solid black;">'.number_format($element['nsn'],2).'</td>' ;;
                                          
                                          }
                                         if (in_array($sigle, $siglesPVsrArr)) {
                                                    echo '<td style="border-bottom: 1px solid black;"><font color="red">0*</font></td>' ;;
                                            }elseif(in_array($sigle, $siglesABsrArr)){
                                               echo '<td style="border-bottom: 1px solid black;"><font color="red">0**</font></td>' ;;
                                            
                                            }elseif(in_array($sigle, $siglesZRsrArr)){
                                               echo '<td style="border-bottom: 1px solid black;">'.number_format(0,2).'</td>' ;;
                                            
                                             }elseif($element['nsr']=="0.00"){
                                               echo '<td style="border-bottom: 1px solid black;"></td>' ;;
                                            
                                            }else{
                                                echo '<td style="border-bottom: 1px solid black;">'.number_format($element['nsr'],2).'</td>' ;;
                                          
                                          }
                                             echo '<td style="border-bottom: 1px solid black;">'.$element['nfe'].'</td>' ;
                                             echo '<td style="border-bottom: 1px solid black;">'.$element['capit'].'</td>' ;
                                             echo '<td rowspan = "'.$module['nb'].'" align="center"><strong>'.$module['nm'].'</strong></td>' ;
                                             echo '<td rowspan = "'.$module['nb'].'" align="center">'.$module['decision'].'</td></tr>' ;
                                 
                                           $i=1;   
                                  }else if($i <$module['nb']-1){
                                            if ($element['status']=='0') {
                                          echo '<tr><td></td><td>'.$sigle.'  <font color="red"> </font></td>' ;
                                     
                                      }else{
                                          echo '<tr><td></td><td>'.$sigle.'  <font color="red"> ***</font></td>' ;
                                      
                                      }
                                          echo'<td></td><td></td><td></td>';
                                           echo '<td style="border-bottom: 1px solid black;">'.$element['titre'].'</td>';                                                  
                                            echo '<td style="border-bottom: 1px solid black;">'.$element['ects'].'[ '.$element['coefficient'].' ]</td>' ;
                                           
                                            /*  for($q=0;$q<count($pvCC['sigle']);$q++){
                                            if($pvCC['sigle'][$q]==$sigle){
                                            echo '<td style="border-bottom: 1px solid black;">0*</td>' ;;
                                           }else{
                                                echo '<td style="border-bottom: 1px solid black;">'.number_format($element['ncc'],2).'</td>' ;;
                                          
                                          }}
                                             for($q=0;$q<count($pvSN['sigle']);$q++){
                                            if($pvSN['sigle'][$q]==$sigle){
                                            echo '<td style="border-bottom: 1px solid black;">0*</td>' ;;
                                           }else{
                                                echo '<td style="border-bottom: 1px solid black;">'.number_format($element['nsn'],2).'</td>' ;;
                                          
                                          }}*/                                                $siglesPVcc = '';
            for($i=0; $i<count($pvCC['sigle']);++$i)
                $siglesPVcc = $siglesPVcc.$pvCC['sigle'][$i].',';
           $siglesPVcc = $siglesPVcc.$pvCC['sigle'][count($pvCC['sigle'])-1];
                                          
$siglesPVccArr = explode(',', $siglesPVcc);
                                       $siglesABcc = '';
            for($i=0; $i<count($abCC['sigle']);++$i)
                $siglesABcc = $siglesABcc.$abCC['sigle'][$i].',';
           $siglesABcc = $siglesABcc.$abCC['sigle'][count($abCC['sigle'])-1];
                                          
$siglesABccArr = explode(',', $siglesABcc);
          $siglesZRcc = '';
            for($i=0; $i<count($zeroCC['sigle']);++$i)
                $siglesZRcc = $siglesZRcc.$zeroCC['sigle'][$i].',';
           $siglesZRcc = $siglesZRcc.$zeroCC['sigle'][count($zeroCC['sigle'])-1];
                                          
$siglesZRccArr = explode(',', $siglesZRcc);
                                        $siglesPVsn = '';
            for($i=0; $i<count($pvSN['sigle']);++$i)
                $siglesPVsn = $siglesPVsn.$pvSN['sigle'][$i].',';
           $siglesPVsn = $siglesPVsn.$pvSN['sigle'][count($pvSN['sigle'])-1];
                                          
$siglesPVsnArr = explode(',', $siglesPVsn);
$siglesPVsr = '';
            for($i=0; $i<count($pvSR['sigle']);++$i)
                $siglesPVsr = $siglesPVsr.$pvSR['sigle'][$i].',';
           $siglesPVsr = $siglesPVsr.$pvSR['sigle'][count($pvSR['sigle'])-1];
                                          
$siglesPVsrArr = explode(',', $siglesPVsr);
                                       $siglesABsn = '';
            for($i=0; $i<count($abSN['sigle']);++$i)
                $siglesABsn = $siglesABsn.$abSN['sigle'][$i].',';
           $siglesABsn = $siglesABsn.$abSN['sigle'][count($abSN['sigle'])-1];
                                          
$siglesABsnArr = explode(',', $siglesABsn);
         $siglesZRsn = '';
            for($i=0; $i<count($zeroSN['sigle']);++$i)
                $siglesZRsn = $siglesZRsn.$zeroSN['sigle'][$i].',';
           $siglesZRsn = $siglesZRsn.$zeroSN['sigle'][count($zeroSN['sigle'])-1];
                                          
$siglesZRsnArr = explode(',', $siglesZRsn);
$siglesZRsr = '';
            for($i=0; $i<count($zeroSR['sigle']);++$i)
                $siglesZRsr = $siglesZRsr.$zeroSR['sigle'][$i].',';
           $siglesZRsr = $siglesZRsr.$zeroSR['sigle'][count($zeroSR['sigle'])-1];
                                          
$siglesZRsrArr = explode(',', $siglesZRsr);
 $siglesABsr = '';
            for($i=0; $i<count($abSR['sigle']);++$i)
                $siglesABsr = $siglesABsr.$abSR['sigle'][$i].',';
           $siglesABsr = $siglesABsr.$abSR['sigle'][count($abSR['sigle'])-1];
                                          
$siglesABsrArr = explode(',', $siglesABsr);
                                            if (in_array($sigle, $siglesPVccArr)) {
                                                    echo '<td style="border-bottom: 1px solid black;"><font color="red">0*</font></td>' ;;
                                            }elseif(in_array($sigle, $siglesABccArr)){
                                               echo '<td style="border-bottom: 1px solid black;"><font color="red">0**</font></td>' ;;
                                            
                                            }elseif(in_array($sigle, $siglesZRccArr)){
                                               echo '<td style="border-bottom: 1px solid black;">'.number_format(0,2).'</td>' ;;
                                            
                                             }elseif($element['ncc']=="0.00"){
                                               echo '<td style="border-bottom: 1px solid black;"></td>' ;;
                                            
                                            }else{
                                                echo '<td style="border-bottom: 1px solid black;">'.number_format($element['ncc'],2).'</td>' ;;
                                          
                                          }
                                          if (in_array($sigle, $siglesPVsnArr)) {
                                                    echo '<td style="border-bottom: 1px solid black;"><font color="red">0*</font></td>' ;;
                                            }elseif(in_array($sigle, $siglesABsnArr)){
                                               echo '<td style="border-bottom: 1px solid black;"><font color="red">0**</font></td>' ;;
                                            
                                            }elseif(in_array($sigle, $siglesZRsnArr)){
                                               echo '<td style="border-bottom: 1px solid black;">'.number_format(0,2).'</td>' ;;
                                            
                                             }elseif($element['nsn']=="0.00"){
                                               echo '<td style="border-bottom: 1px solid black;"></td>' ;;
                                            
                                            }else{
                                                echo '<td style="border-bottom: 1px solid black;">'.number_format($element['nsn'],2).'</td>' ;;
                                          
                                          }
                                         if (in_array($sigle, $siglesPVsrArr)) {
                                                    echo '<td style="border-bottom: 1px solid black;"><font color="red">0*</font></td>' ;;
                                            }elseif(in_array($sigle, $siglesABsrArr)){
                                               echo '<td style="border-bottom: 1px solid black;"><font color="red">0**</font></td>' ;;
                                            
                                            }elseif(in_array($sigle, $siglesZRsrArr)){
                                               echo '<td style="border-bottom: 1px solid black;">'.number_format(0,2).'</td>' ;;
                                            
                                             }elseif($element['nsr']=="0.00"){
                                               echo '<td style="border-bottom: 1px solid black;"></td>' ;;
                                            
                                            }else{
                                                echo '<td style="border-bottom: 1px solid black;">'.number_format($element['nsr'],2).'</td>' ;;
                                          
                                          }
                                             echo '<td style="border-bottom: 1px solid black;">'.$element['nfe'].'</td>' ;
                                             echo '<td style="border-bottom: 1px solid black;">'.$element['capit'].'</td></tr>' ;
                                    $i=$i+1;
                                             
                                  }else{
                                            if ($element['status']=='0') {
                                          echo '<tr><td></td><td>'.$sigle.'  <font color="red"> </font></td>' ;
                                     
                                      }else{
                                          echo '<tr><td></td><td>'.$sigle.'  <font color="red"> ***</font></td>' ;
                                      
                                      }
                                         echo'<td></td>';
                                            echo'<td></td>';
                                            echo'<td></td>';
                                            echo '<td >'.$element['titre'].'</td>';
                                            echo '<td>'.$element['ects'].'[ '.$element['coefficient'].' ]</td>' ;
                                            /*
                                          for($q=0;$q<count($pvCC['sigle']);$q++){
                                            if($pvCC['sigle'][$q]==$sigle){
                                            echo '<td style="border-bottom: 1px solid black;">0*</td>' ;;
                                           }else{
                                                echo '<td style="border-bottom: 1px solid black;">'.number_format($element['ncc'],2).'</td>' ;;
                                          
                                          }}
                                              for($q=0;$q<count($pvSN['sigle']);$q++){
                                            if($pvSN['sigle'][$q]==$sigle){
                                            echo '<td style="border-bottom: 1px solid black;">0*</td>' ;;
                                           }else{
                                                echo '<td style="border-bottom: 1px solid black;">'.number_format($element['nsn'],2).'</td>' ;;
                                          
                                          }} */                                                                                                                $siglesPVcc = '';
            for($i=0; $i<count($pvCC['sigle']);++$i)
                $siglesPVcc = $siglesPVcc.$pvCC['sigle'][$i].',';
           $siglesPVcc = $siglesPVcc.$pvCC['sigle'][count($pvCC['sigle'])-1];
                                          
$siglesPVccArr = explode(',', $siglesPVcc);
                                       $siglesABcc = '';
            for($i=0; $i<count($abCC['sigle']);++$i)
                $siglesABcc = $siglesABcc.$abCC['sigle'][$i].',';
           $siglesABcc = $siglesABcc.$abCC['sigle'][count($abCC['sigle'])-1];
                                          
$siglesABccArr = explode(',', $siglesABcc);
          $siglesZRcc = '';
            for($i=0; $i<count($zeroCC['sigle']);++$i)
                $siglesZRcc = $siglesZRcc.$zeroCC['sigle'][$i].',';
           $siglesZRcc = $siglesZRcc.$zeroCC['sigle'][count($zeroCC['sigle'])-1];
                                          
$siglesZRccArr = explode(',', $siglesZRcc);
                                        $siglesPVsn = '';
            for($i=0; $i<count($pvSN['sigle']);++$i)
                $siglesPVsn = $siglesPVsn.$pvSN['sigle'][$i].',';
           $siglesPVsn = $siglesPVsn.$pvSN['sigle'][count($pvSN['sigle'])-1];
                                          
$siglesPVsnArr = explode(',', $siglesPVsn);
$siglesPVsr = '';
            for($i=0; $i<count($pvSR['sigle']);++$i)
                $siglesPVsr = $siglesPVsr.$pvSR['sigle'][$i].',';
           $siglesPVsr = $siglesPVsr.$pvSR['sigle'][count($pvSR['sigle'])-1];
                                          
$siglesPVsrArr = explode(',', $siglesPVsr);
                                       $siglesABsn = '';
            for($i=0; $i<count($abSN['sigle']);++$i)
                $siglesABsn = $siglesABsn.$abSN['sigle'][$i].',';
           $siglesABsn = $siglesABsn.$abSN['sigle'][count($abSN['sigle'])-1];
                                          
$siglesABsnArr = explode(',', $siglesABsn);
         $siglesZRsn = '';
            for($i=0; $i<count($zeroSN['sigle']);++$i)
                $siglesZRsn = $siglesZRsn.$zeroSN['sigle'][$i].',';
           $siglesZRsn = $siglesZRsn.$zeroSN['sigle'][count($zeroSN['sigle'])-1];
                                          
$siglesZRsnArr = explode(',', $siglesZRsn);
$siglesZRsr = '';
            for($i=0; $i<count($zeroSR['sigle']);++$i)
                $siglesZRsr = $siglesZRsr.$zeroSR['sigle'][$i].',';
           $siglesZRsr = $siglesZRsr.$zeroSR['sigle'][count($zeroSR['sigle'])-1];
                                          
$siglesZRsrArr = explode(',', $siglesZRsr);
 $siglesABsr = '';
            for($i=0; $i<count($abSR['sigle']);++$i)
                $siglesABsr = $siglesABsr.$abSR['sigle'][$i].',';
           $siglesABsr = $siglesABsr.$abSR['sigle'][count($abSR['sigle'])-1];
                                          
$siglesABsrArr = explode(',', $siglesABsr);
                                            if (in_array($sigle, $siglesPVccArr)) {
                                                    echo '<td style="border-bottom: 1px solid black;"><font color="red">0*</font></td>' ;;
                                            }elseif(in_array($sigle, $siglesABccArr)){
                                               echo '<td style="border-bottom: 1px solid black;"><font color="red">0**</font></td>' ;;
                                            
                                            }elseif(in_array($sigle, $siglesZRccArr)){
                                               echo '<td style="border-bottom: 1px solid black;">'.number_format(0,2).'</td>' ;;
                                            
                                             }elseif($element['ncc']=="0.00"){
                                               echo '<td style="border-bottom: 1px solid black;"></td>' ;;
                                            
                                            }else{
                                                echo '<td style="border-bottom: 1px solid black;">'.number_format($element['ncc'],2).'</td>' ;;
                                          
                                          }
                                          if (in_array($sigle, $siglesPVsnArr)) {
                                                    echo '<td style="border-bottom: 1px solid black;"><font color="red">0*</font></td>' ;;
                                            }elseif(in_array($sigle, $siglesABsnArr)){
                                               echo '<td style="border-bottom: 1px solid black;"><font color="red">0**</font></td>' ;;
                                            
                                            }elseif(in_array($sigle, $siglesZRsnArr)){
                                               echo '<td style="border-bottom: 1px solid black;">'.number_format(0,2).'</td>' ;;
                                            
                                             }elseif($element['nsn']=="0.00"){
                                               echo '<td style="border-bottom: 1px solid black;"></td>' ;;
                                            
                                            }else{
                                                echo '<td style="border-bottom: 1px solid black;">'.number_format($element['nsn'],2).'</td>' ;;
                                          
                                          }
                                         if (in_array($sigle, $siglesPVsrArr)) {
                                                    echo '<td style="border-bottom: 1px solid black;"><font color="red">0*</font></td>' ;;
                                            }elseif(in_array($sigle, $siglesABsrArr)){
                                               echo '<td style="border-bottom: 1px solid black;"><font color="red">0**</font></td>' ;;
                                            
                                            }elseif(in_array($sigle, $siglesZRsrArr)){
                                               echo '<td style="border-bottom: 1px solid black;">'.number_format(0,2).'</td>' ;;
                                            
                                             }elseif($element['nsr']=="0.00"){
                                               echo '<td style="border-bottom: 1px solid black;"></td>' ;;
                                            
                                            }else{
                                                echo '<td style="border-bottom: 1px solid black;">'.number_format($element['nsr'],2).'</td>' ;;
                                          
                                          }
                                             echo '<td>'.$element['nfe'].'</td>' ;
                                             echo '<td>'.$element['capit'].'</td></tr>' ;
                                             $i=$i+1;
                                       
                                   }
                              }
                              
                           }}
                          
                       ?>     
                </table></td></tr></table>
          <p></p>
                <table border="0"  width="100%" style="border-radius: 0px 30px 0px 30px;font-family:Times; font-size:10px; border-collapse: collapse;" width="100%">
                    <tr><td>
                    <table border="0" width="100%" style="font-family:Times; font-size:12px;line-height: 15px" cellspacing="0">
                             <?php
                     if(isset($semestre) && $semestre['inscrit']=='OK'){
                             echo '<tr><td > Total Crédits Validés : </td>' ;
                             echo '<td align="center"  ><strong>'.$semestre['ects'].'</strong></td>' ;
                             echo '<td > Validation du Semestre </td>' ;
                             echo '<td align="center" ><strong>'.$semestre['validation']. '</strong></td>' ;
                             echo '<td  > Note semestre : </td>' ;
                             echo '<td align="center" ><strong>'.$semestre['note']. '</strong></td>' ;
                             echo '<td > Décision</td>' ;
                             $decision='Validés';
                             if($semestre['decision']=='Ajourné(e)'){//add by MedBakar 13-03-2020
                                  $decision='Non validés';
                             }
                             echo '<td align="center"  ><strong>'.$decision. '</strong></td>' ;
                              echo '<td > N° Anonymat : </td>' ;
                             echo '<td align="center" ><strong>'.$etudiant['anonymat']. '</strong></td>' ;
                             echo '</tr>' ;
                           }
                                          
                           ?> </td></tr>
                         </table>
                    </table>
          
            <?php 
            if($nbBreakPage==1 && $counterEt!=count($etudiants))
            {//$numPage++;
            //echo '<br><br><br><center><strong>Page '.$numPage.'</strong></center>';
                echo '<h3></h3>';
               
                
            }
            
                $nbBreakPage=1-$nbBreakPage;
            }
                     }}?>
         <br>
         <table   border="1" align="left" width="100%" style="font-family:Times; font-size:12px;" cellspacing="10">
             <tr>
                  <!--<td>Date : <br> Le < ?php echo date('d/m/Y');?></td> -->
                  <td align="left" colspan="2"><b>Nombre d'étudiants </b></td>
                  <td align="left" colspan="2" ><b><?php  echo $statistique["nb_totale"]?> </b></td>
              </tr>
              <tr>
                  <!--<td>Date : <br> Le < ?php echo date('d/m/Y');?></td> -->
                  <td align="left" ><b>Nombre d'admis: </b></td>
                  <td align="left" ><b><?php  echo $statistique["nb_reussite"]?> </b></td>
                  <td align="left" ><b>Taux d'admission</b></td>
                  <td align="left" ><b><?php  echo number_format($statistique["taux_reussite"],2)." %"?> </b></td>
              </tr>
              <tr>
                  <!--<td>Date : <br> Le < ?php echo date('d/m/Y');?></td> -->
                  <td align="left" ><b>Nombre d'ajournés:</b></td>
                  <td align="left" ><b><?php  echo $statistique["nb_ajourne"]?> </b></td>
                  <td align="left" ><b>Taux d'ajournement:</b></td>
                  <td align="left" ><b><?php  echo number_format($statistique["taux_abondon"],2)." %"?> </b></td>
              </tr>
              <tr>
                  <!--<td>Date : <br> Le < ?php echo date('d/m/Y');?></td> -->
                  <td align="left" ><b>Nombre d'abandons:</b></td>
                  <td align="left" ><b><?php  echo $statistique["nb_mg_zero"];?> </b></td>
                  <td align="left" ><b>Taux d'abandons:</b></td>
                  <td align="left" ><b><?php  echo number_format($statistique["taux_nb_mg_zero"],2)." %";?> </b></td>
              </tr>
             </table>
         <br>
         <br>
         <table   border="0" align="left" width="100%" style="font-family:Times; font-size:12px;" cellspacing="10">
             <tr>
                  <!--<td>Date : <br> Le < ?php echo date('d/m/Y');?></td> -->
                  <td align="left" ><b>Le Président du Jury </b></td>
<!--                  <td align="left" ><b>Le Coordinateur </b></td>-->
                  <td align="left" ><b>Les Membres </b></td>
                  <td align="left" ><b>L'Administration</b></td>
              </tr>
             </table>
           </div>
        </div> <!-- end of right content-->
</div>   <!--end of center content -->               
<div class="clear"></div>
</div> <!--end of main content-->


<?php include(APPPATH.'views/include/footer.php'); ?>
<script type="text/javascript">
<!--
function imprimer(id){
str=document.getElementById(id).innerHTML
newwin=window.open('','printwin','left=100,top=100,width=400,height=400')
newwin.document.write('<HTML>\n <HEAD>\n')
// Hafedh
// Supression de l'entete lors de l'impression
newwin.document.write('<style>@page  { size: auto;  margin-top: 0mm; }   h3{page-break-before: always;} \n }</style>\n')
newwin.document.write('<style>body {-webkit-print-color-adjust: exact;}  </style>\n')
//newwin.document.write('<style> @page { margin: 2cm; 2cm; 2cm; 2cm; }   h3{page-break-before: always;} </style>  \n');
//newwin.document.write('<style> @bottom-center { content: "Copyright My Company 2010" } </style>  \n');

//newwin.document.write('<style>@page { {content: counter(page) ;size: auto;  margin: 0mm;}}  h3{page-break-before: always;} \n }</style>\n')
//newwin.document.write('<style>body {-webkit-print-color-adjust: exact;}  </style>\n')

//newwin.document.write('<link rel="stylesheet" href="<?php echo base_url();?>css/printable.css" />\n');
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
</script>