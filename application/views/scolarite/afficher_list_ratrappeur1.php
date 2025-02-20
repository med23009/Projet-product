<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
    <div class="container">
    <div class="col-xs-12 hl-left">

         <?php echo heading('liste des rattrapeurs','2');       
         ?>
        <!--<? php echo heading('Inscription automatique des étudiants dans les éléments ','3');?>  
       -->
        <div style="height: 30px;"></div>
        
       
         <button  onClick="printer();" style="float:right; height: 30px; background-color:#cceac4; width: 160px; margin-right:185px; margin-top:50px;"><b> Imprimer </b></button>
        <div id="imprimer">
            <table style="width: 100%;height:150px">
                <tr><td style='width: 45%;font-size:18px'><?php echo $param_gen[0]['nom_ins_parent_fr']?></td><td rowspan="3" style="width: 10%;height:100%;text-align: center"><img src="../../images/<?=$param_gen[0]['logo']?>" height="70" width="90"  ></td><td style="text-align:right;width: 45%;font-size:18px "><?php echo $param_gen[0]['nom_ins_parent_ar']?></td></tr>
                <tr><td  style="font-size:18px"><?php echo $param_gen[0]['nom']?></td> <td style="text-align:right;font-size:18px "><?php echo $param_gen[0]['nom_ar']?></td></tr>
                <tr><td><b style="font-size:18px">liste des rattrapeurs</b></td> <td><?php// echo $param_gen[0]['email']?></td></tr>
                <tr><td style='text-align: center' colspan="3"><b>Filiére:</b> <?php echo ' '.$departement.' - S'.$semestre.' - Année: ';echo ($semestre%2==0)? ($annee-1).'/'.$annee: $annee.'/'.($annee+1);?></td></tr>
            </table>

<?php
         if(!empty($donnee) || !empty($matricule)){
//echo"<script>alert(958)</script>";
echo"<table border='1' cellspacing='0' cellpadding='0' style='width:100%;text-align: center'>";
echo"<thead >";
echo"<th style='text-align: center' >Matricule</th>";
$cpt=0;
//$debut_matiere=$donnee[0]['sigle']; //on recupere le 1er sigle 
//for($i=0;$i<count($maquette);$i++){
//    if(($donnee[$i]['sigle']==$debut_matiere)&& $cpt>0){  //en cas ou le sigle est retourne une 2eme fois on fait break
//        break;
//    }
//    echo"<th style='text-align: center'>".$donnee[$i]['sigle']."</th>";
//    $cpt++;
//}
foreach($maquette as $sigleUnite=>$sigle){
//    echo"<th style='text-align: center'>".$sigleUnite."</th>";
    foreach($sigle as $key=>$value){
    if($key!='exist')
         echo"<th style='text-align: center'>".$key."</th>";
    }
}
echo"</thead><tbody>";
   
//for($i=0;$i<Count($matricule);$i++){  //on boucle les ligne sur les matricules
foreach($donnee as $matriculeEtud=>$value1){
echo"<tr>";   
 echo"<td>".$matriculeEtud."</td>";
// $j=0;
 
foreach($maquette as $sigleUnite=>$sigle){
//    foreach($value1 as $val_sigleUnie=>$val2){
//    if($val_sigleUnite==$sigleUnite){    
//    foreach($val2 as $sigle_Elem=>$val3){
    foreach($sigle as $key=>$value){
//for($j=0;$j<Count($donnee);$j++){   //on affecte pour chaque matricule tous les sigles avec leur decision
    
//    if($donnee[$j]['matricule']==$matricule[$i]['matricule'])
    if($key!='exist'){
    if(!empty($donnee[$matriculeEtud][$sigleUnite][$key]))
        echo"<td style='align:center'>".$donnee[$matriculeEtud][$sigleUnite][$key]['decision']."</td>";
    else
        echo"<td style='background-color: #E36C09'></td>";

//    $j++;
    }
    }
   
}
echo"</tr>";
}
echo"</tbody></table>";
         }
         else
             echo"<p style='text-align:center;background-color: #E36C09;font-size: 16px'><span style='color: #D9E8FB;font-size: 16px;'>vide...</span></p>";
   ?>



         <?php
//         if(!empty($donnee) || !empty($matricule)){
////echo"<script>alert(958)</script>";
//echo"<table border='1' cellspacing='0' cellpadding='0' style='width:100%;text-align: center'>";
//echo"<thead >";
//echo"<th style='text-align: center'>Matricule</th>";
//$cpt=0;
//$debut_matiere=$donnee[0]['sigle']; //on recupere le 1er sigle 
//for($i=0;$i<11;$i++){
//    if(($donnee[$i]['sigle']==$debut_matiere)&& $cpt>0){  //en cas ou le sigle est retourne une 2eme fois on fait break
//        break;
//    }
//    echo"<th style='text-align: center'>".$donnee[$i]['sigle']."</th>";
//    $cpt++;
//}
//echo"</thead><tbody>";
//for($i=0;$i<Count($matricule);$i++){  //on boucle les ligne sur les matricules
//echo"<tr>";   
// echo"<td>".$matricule[$i]['matricule']."</td>";
//for($j=0;$j<Count($donnee);$j++){   //on affecte pour chaque matricule tous les sigles avec leur decision
//    if($donnee[$j]['matricule']==$matricule[$i]['matricule'])
//    echo"<td style='align:center'>".$donnee[$j]['decision']."</td>";
//}
//   echo"</tr>";
//}
//echo"</tbody></table>";
//         }
//         else
//             echo"<p style='text-align:center;background-color: #E36C09;font-size: 16px'><span style='color: #D9E8FB;font-size: 16px;'>vide...</span></p>";
   ?>
           
              
             <br>
             <span style='text-align:center;background-color: #979797;font-size: 16px;'>Explication des annotations: V: validé, RAT-OP: rattrapage optionnel,RAT-OB: rattrapage obligatoire<br>Les casiers colore ça veut dire que l'étudiant n'est pas inscrit dans ces matières</span>
        </div>
        <div style="margin-left: 200px; position: relative;">
        </div>
        <!--<br>-->
<!--        <div class="submit">
                        <?php $pw = array('type' => 'submit', 'name' => 'submit', 'id'=>'submit', 'value'=>'Générer'); 
                            echo form_input($pw);?>
                    </div>-->
       
   </div>
         <div class="clear"></div>
   </div> <!--end of main content-->

    <?php
  include(APPPATH.'views/include/footer.php');?>


    <script>
          //  alert(590);
//           function print(id){
//               var body = document.body;
//               Consol.log(body);
//               alert(5);
//           }
           function printer(){
               var div =document.getElementById('imprimer');
               var newWin=window.open('','Print-Window');
               newWin.document.open();
               newWin.document.write('<html><head><title>liste des rattrapeurs_'+'<?php echo $departement.' - S'.$semestre.' - Année: ';echo ($semestre%2==0)? ($annee-1).'/'.$annee: $annee.'/'.($annee+1);?>'+'</title></head><body onload="window.print()"><div style="padding:20 20 20 20">'+div.innerHTML+'</div></body></html>');
               newWin.document.close();
               setTimeout(function(){newWin.close();},10);
               
               
           }
        </script> 

       
 <?php
 
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//print_r($sigle[1]['sigle']);
/*echo"<table border='1'>";
$number=$data[0]['matricule']-1;
echo"<th>Maricule</th>";
for($i=0;$i<Count($sigle);$i++){
    echo"<th>".$sigle[$i]['sigle']."</th>";
}
for($i=0;$i<=Count($data);$i++){
     // if($number<$data[$i]['matricule']){
   echo"<tr>";
   echo"<td>".$data[$i]['matricule']."</td>";
    for($j=0;$j<=Count($sigle);$j++){
//    if($data[$i]['matricule'] == $data[$j]['matricule'])
//        {
        if($data[$i]['code'] == $sigle[$j]['sigle'])
        echo"<td>".$data[$i]['decision']."</td>";
        else
            echo"<td></td>";
   //     }
        
        
    }
    echo"</tr>";
    $number=$data[$i]['matricule'];
    
        //}
}
echo'</table>';
echo"<br>********************************";
echo"<table border='1'>";
echo"<thead>";
echo"<th>Maricule</th>";
for($i=0;$i<Count($sigle);$i++){
    echo"<th>".$sigle[$i]['sigle']."</th>";
}
echo"</thead><tbody>";
for($i=0;$i<=Count($data);$i++){
   echo"<tr>";
echo"<td>".$data[$i]['matricule']."</td>";
 for($j=0;$j<Count($sigle);$j++){
     //for($k=0;$k<=5;$k++){
     $k=0;
     $autreEtudiant=false;
     do{
     if(($data[$k]['code']==$sigle[$j]['sigle'])&&($data[$i]['matricule']==$data[$k]['matricule'])){
     echo"<td>".$data[$i]['decision']."</td>";
     $k++;
     }
     else if($data[$i]['matricule']==$data[$k]['matricule'])
         echo"<td></td>";
         else $autreEtudiant=true;
     }while($autreEtudiant);
}
   echo"</tr>";
}
echo"</tbody></table>";
 
 */


//echo"<table border='1'>";
//echo"<thead>";
//echo"<th>Maricule</th>";
//for($i=0;$i<Count($donnee);$i++){
//    echo"<th>".$donnee[$i]['sigle']."</th>";
//}
//echo"</thead><tbody>";
//for($i=0;$i<Count($matricule);$i++){
//echo"<tr>";   
// echo"<td>".$matricule."</td>";
//for($j=0;$j<Count($donnee);$j++){
//    echo"<td>".$donnee[$j]['decision']."</td>";
//}
//   echo"</tr>";
//}
//echo"</tbody></table>";
// 