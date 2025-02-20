<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');
    
    ?>
<a href="<?php echo base_url();?>index.php/scolarite/" ><button id="btn">Retour</button></a><br>
 <button  onClick="imprimer('printable');" ><b> Imprimer  </b></button>
       <div id="printable">


      
      <!--  <script  src="http://code.jquery.com/jquery-latest.min.js"></script>
-->
<script type="text/javascript" src="jquery-barcode.js"></script>
            <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<HTML>
<HEAD>
<META http-equiv="Content-Type" content="text/html; charset=UTF-8">
<META http-equiv="X-UA-Compatible" content="IE=8">

</HEAD>

<BODY>
   <?php   for($y=0;$y<$nombre;$y++){
               // echo $i ;
                ?> 
  <div class="container">
    <div class="col-xs-12 hl-left">  
<DIV id="page_1">
<div id="p1dimg1">
</div>

<DIV class="dclr"></DIV>
<DIV id="id_1">
     <table  border="0" width="100%">
             <tr>
     <td><img src="../../images/<?=$etudiants[$y]['param_generaux'][0]['logo']?>" height="70" width="90" ></td>
                  
                  <td> 
                      <table  border="0" style="line-height: 10px">
                          <tr>
                              <td align="center" style="font-size: 120%;font-family: Times;"><b><?=$etudiants[$y]['param_generaux'][0]['nom']?></b></td>
                          </tr>
                          <tr>
                          <td>
                          <table  border="0" style="line-height: 7px">
                                            <tr>
                              <td style="font-size: 50%;border-top: 1px solid black"> </td>
                          </tr>
                          <tr>
                              <td style="font-size: 50%"></td>
                          </tr>
                          </table>
                              </td>
                          <tr/>
                        <!--  <tr>
                              <td style="font-size: 50%;border-top: 1px solid black"><?=$etudiants[$y]['param_generaux'][0]['adresse']?>T&eacute;léphone :<?=$etudiants[$y]['param_generaux'][0]['telephone']?> Mobile :<?=$etudiants[$y]['param_generaux'][0]['telephone_2']?> , Email :<?=$etudiants[$y]['param_generaux'][0]['email']?> </td>
                          </tr>
                          <tr>
                              <td style="font-size: 50%">Boite Postale : <?=$etudiants[$y]['param_generaux'][0]['boite_postale']?>, Siteweb : <?=$etudiants[$y]['param_generaux'][0]['siteweb']?>, <?=$etudiants[$y]['param_generaux'][0]['ville']?>-<?=$etudiants[$y]['param_generaux'][0]['pays']?></td>
                          </tr>
                          </table>
                              </td>
                          <tr/>-->
                      </table>
                  </td> 
                  <td><!-- <img id="barcode"/>--><br>
                      <?php 
                      $niveau=($etudiants[$y]['numSem'])/2;
                      //echo $numSem."aa";
                      //  print_r($code);
                     
                      $e=0;
                      $f=0;
                      $rest = substr($etudiants[$y]['info']['matriculeEtudiant'], 0,2);
                     // for($i=0;$i<count($code);$i++){
                     // if()
                          $e=$etudiants[$y]['code'][0]+$etudiants[$y]['code'][1];
                           $f=$etudiants[$y]['code'][0]-$etudiants[$y]['code'][1];
                       //  echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size="0.5px">'.$e.'-'.$f.'-'.$rest.'</font>';
                     // } 
                       
                      ?>
          
         <script type="text/javascript">
       $(document).ready(function(){
$("#barcode").JsBarcode("<?php echo  $etudiants[$y]['info']['matriculeEtudiant'];?>",{
width:0.5,
height:30,
quite: 10,
format:"CODE128",
backgroundColor:"#fff",
lineColor:"#000"
});
});
         
         </script></td>
             </tr>
             </table> 
<TABLE border="0"  cellpadding=0 cellspacing=0 class="t0">
   
         
         <script type="text/javascript" src="<?php echo base_url();?>js/JsBarcode.js"></script>
         <script type="text/javascript" src="<?php echo base_url();?>js/CODE128.js"></script>
         <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url();?>css/bulltin.css" />
         

<TR>
	<TD class="tr0 td0"></TD>
	<TD class="tr4 td1"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr4 td2"><P class="p0 ft4"><!--SESSION--></P></TD>
        <TD colspan=2 class="tr4 td8"><!--<P class="p0 ft5"><?php   if($etudiants[$y]['numSem']%2==1){echo 'Octobre '.($etudiants[$y]['annee']); }else{echo 'Janvier '.($etudiants[$y]['annee']); }?></P>--></TD>
	<TD class="tr4 td5"><P class="p0 ft1">&nbsp;</P></TD>
</TR>
<TR>
	<TD class="tr0 td0"></TD>
<!--	<TD rowspan=2 class="tr5 td1"><P class="p1 ft6">BULLETIN DE NOTES</P></TD>-->
<TD rowspan=2 class="tr5 td1"><P class="p1 ft6">RELEV&Eacute; DE NOTES</P></TD>
	<TD class="tr0 td2"><P class="p0 ft7"><!--DOMAINE--></P></TD>
        <?php $domaine="";
       /* if($etudiants[$y]['info']['idProgramme']=="MAEF"){
            $domaine="Sciences et Technologies";
          }else if($etudiants[$y]['info']['idProgramme']=="MAN"){
            $domaine="Sciences et Technologies";
          }else if($etudiants[$y]['info']['idProgramme']=="LGTR"){
            $domaine="Sciences et Technologies";
          }else{
            $domaine="Sciences et Technologies";
          }*/
          $mension=$etudiants[$y]['info']['programme'];
//        if($info['idProgramme']=="MAEF"){
//            $mension="Mathématiques";
//          }else if($info['idProgramme']=="MAN"){
//            $mension="Management";
//          }else if($info['idProgramme']=="LGTR"){
//            $mension="Logistique et Transports";
//          }else{
//            $mension="Statistqiue";
//          }
//          $option="";
//        if($info['idProgramme']=="MAEF"){
//            $option="Mathématiques Appliquées à l'Economie et à la Fina...";
//          }else if($info['idProgramme']=="MAN"){
//            $option="Management";
//          }else if($info['idProgramme']=="LGTR"){
//            $option="Logistique et Transports";
//          }else{
//            $option="Statistqiue";
//          }
          ?>
	<TD colspan=4 class="tr0 td9"><P class="p0 ft8"><?php //echo $domaine;  ?></P></TD>
</TR>
<TR>
	<TD class="tr6 td0"></TD>
	<TD rowspan=2 class="tr2 td2"><P class="p0 ft4"><!--MENTION--></P></TD>
	<TD colspan=4 rowspan=2 class="tr2 td9"><P class="p0 ft9"></P></TD>
</TR>
<TR>
	<TD class="tr7 td0"></TD>
	<TD class="tr7 td1"><P class="p0 ft10">&nbsp;</P></TD>
</TR>
<TR>
	<TD class="tr0 td0"></TD>
	<TD class="tr0 td1"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr0 td2"><P class="p0 ft7">SPECIALITE</P></TD>
	<TD colspan=4 class="tr0 td9"><P class="p0 ft8"><?php echo $etudiants[$y]['info']['programme'];?></P></TD>
</TR>
<TR>
	<TD class="tr8 td0"></TD>
        <TD class="tr8 td1"><P class="p2 ft11"> ANNÉE ACADÉMIQUE <NOBR><?php if($etudiants[$y]['numSem']%2==1){ echo  $etudiants[$y]['annee'].'-'.($etudiants[$y]['annee']+1);}else{echo ( $etudiants[$y]['annee']-1).'-'.($etudiants[$y]['annee']);}?></NOBR></P></TD>
	<TD class="tr8 td2"><P class="p0 ft7">NIVEAU</P></TD>
     <TD class="tr8 td3"><P class="p0 ft12"><?php  $etudiants[$y]['info']['niveau']=($etudiants[$y]['numSem']+1)/2 +2;  echo substr($etudiants[$y]['info']['niveau'], 0,1) .' <sup>ème</sup> année' ; ?></P></TD>
	<TD class="tr8 td4"><P class="p0 ft7">SEMESTRE</P></TD>
     <TD class="tr8 td5"><P class="p3 ft12"><?php echo $etudiants[$y]['numSem']; ?></P></TD>
	<TD class="tr8 td6"><P class="p0 ft1">&nbsp;</P></TD>
</TR>
</TABLE ><td></tr></table>
</DIV>
<DIV id="id_2">
<DIV id="id_2_1">
<TABLE border="0" cellpadding=0 cellspacing=0 class="t1">
<TR>
	<TD class="tr9 td10"><P class="p0 ft12" >Nom de Famille</P></TD>
	<TD class="tr9 td11"><P class="p4 ft12">:</P></TD>
	<TD class="tr9 td12"><P class="p5 ft13"><font style="up"><?php echo $etudiants[$y]['info']['nom']; ?></P></TD>
</TR>
<TR>
    <TD class="tr9 td10"><P class="p0 ft12" >Pr&eacute;nom du P&egrave;re</P></TD>
	<TD class="tr9 td11"><P class="p4 ft12">:</P></TD>
     <TD class="tr9 td12"><P class="p5 ft13"><font style="up"><?php echo $etudiants[$y]['info']['prenomPere']; ?></P></TD>
</TR>
<TR>
	<TD class="tr10 td10"><P class="p0 ft12">Nom</P></TD>
	<TD class="tr10 td11"><P class="p6 ft12">:</P></TD>
	<TD class="tr10 td12"><P class="p5 ft14"><?php echo $etudiants[$y]['info']['prenom']; ?></P></TD>
</TR>
<TR>
<!--	<TD class="tr11 td10"><P class="p0 ft12">No d'Inscription</P></TD>-->
        <TD class="tr11 td10"><P class="p0 ft12">Matricule</P></TD>
	<TD class="tr11 td11"><P class="p7 ft12">:</P></TD>
	<TD class="tr11 td12"><P class="p5 ft13"><?php echo  $etudiants[$y]['info']['matriculeEtudiant'];?></P></TD>
</TR>
<TR>
    <TD class="tr12 td10"><P class="p0 ft12"><NOBR>N&eacute;-e</NOBR> le</P></TD>
	<TD class="tr12 td11"><P class="p7 ft12">:</P></TD>
	<TD class="tr12 td12"><P class="p5 ft13"><?php echo date('d/m/Y',strTotime($etudiants[$y]['info']['dateNaissance'])); ?></P></TD>
</TR>
<TR>
    <TD class="tr10 td10"><P class="p0 ft12">&Agrave;</P></TD>
	<TD class="tr10 td11"><P class="p8 ft12">:</P></TD>
	<TD class="tr10 td12"><P class="p5 ft14"><?php echo  $etudiants[$y]['info']['lieuNaissance']; ?></P></TD>
</TR>
<TR>
	<TD class="tr12 td10"><P class="p0 ft12">Pays</P></TD>
	<TD class="tr12 td11"><P class="p8 ft12">:</P></TD>
	<TD class="tr12 td12"><P class="p5 ft13">MAURITANIE</P></TD>
</TR>
<TR>
	<TD class="tr12 td10"><P class="p0 ft12">Date d'Inscription</P></TD>
	<TD class="tr12 td11"><P class="p7 ft12">:</P></TD>
	<TD class="tr12 td12"><P class="p5 ft13"><?php echo date("d/m/Y", strtotime($etudiants[$y]['info']['dateInscription'])); ?></P></TD>
</TR>
</TABLE>
</DIV>
<DIV id="id_2_2">
<TABLE  border="0" cellpadding=0 cellspacing=0 class="t2">
<TR>
    <TD colspan=5 class="tr4 td13"><P class="p9 ft15">Num&eacute;ro National d'Identification</P></TD>
	<TD colspan=4 class="tr4 td14"><P class="p10 ft16"><SPAN class="ft15">: </SPAN><?php echo $etudiants[$y]['infoE']['nin']; ?></P></TD>
	<TD class="tr4 td4"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr4 td15"><P class="p9 ft16">Genre</P></TD>
        <TD class="tr4 td4" ><P class="p11 ft17"><?php if($etudiants[$y]['info']['genre']=="M"){echo "MASCULIN";}else{echo"FEMININ";}?></P></TD>
</TR>
<!--<TR>
    <TD colspan=6 class="tr12 td13"><P class="p9 ft15">NoBac - S&eacute;rie - Ann&eacute;e d'obtention :</P></TD>
	<TD colspan=2 class="tr12 td14"><P class="p12 ft16"><?php echo $etudiants[$y]['infoE']['num_bac']; ?></P></TD>
	<TD colspan=2 class="tr12 td16"><P class="p13 ft16"><?php echo $etudiants[$y]['infoE']['infoBac']; ?></P></TD>
	<TD class="tr12 td4"><P class="p14 ft12"><?php echo $etudiants[$y]['infoE']['anneeObtention']; ?></P></TD>
</TR>-->
<TR>    
	<TD  height="5px" width="2px"><P class="p0 ft18">&nbsp;</P></TD>
	<TD ><P class="p0 ft19">&nbsp;</P></TD>
	<TD ><P class="p0 ft18">&nbsp;</P></TD>
	<TD width="5px" ><P class="p0 ft19">&nbsp;</P></TD>
	<TD ><P class="p0 ft18">&nbsp;</P></TD>
	<TD ><P class="p0 ft19">&nbsp;</P></TD>
         <TD ><P class="p0 ft18">&nbsp;</P></TD>
        <TD ><P class="p0 ft18">&nbsp;</P></TD>
	<TD ><P class="p0 ft19">&nbsp;</P></TD>
	<TD class=""><P class="p0 ft18">&nbsp;</P></TD>
</TR>
<TR>   
	<TD style="border-top: #e46d0a 1px solid;border-left: #e46d0a 1px solid;" height="1px" width="1px" ><P class="p0 ft1">&nbsp;</P></TD>
	
        <TD width="40px" style="border-top: #e46d0a 1px solid;" height="2px" class=""><P class="p0 ft18">&nbsp;</P></TD>
        <TD class=""></TD>
	<TD ></TD>
        <TD  ></TD>
	<TD ></TD>
	<TD style="border-left: #e46d0a 1px solid;border-top: #e46d0a 1px solid;"></TD>
         <TD ></TD>
        <TD ></TD>
	<TD ></TD>
	<TD style="border-right: #e46d0a 1px solid;border-top: #e46d0a 1px solid;padding: 0px;margin: 0px;width: 30px;vertical-align: bottom;"><P class="p0 ft1">&nbsp;</P></TD>
	
</TR>

<TR>    
	<TD width="5px" height="5px" class=""><P class="p0 ft18">&nbsp;</P></TD>
        <TD colspan="2" align="center" style=""><P class="p0 ft19">&nbsp;</P>
            <img  style="width: 60px; height: 60px;" src="<?php 
            if(file_exists(FCPATH."photos/". $etudiants[$y]['info']['matriculeEtudiant'].'.GIF'))
     echo "../../photos/".$etudiants[$y]['info']['matriculeEtudiant'].'.GIF';
        else 
            if(file_exists(FCPATH."photos/". $etudiants[$y]['info']['matriculeEtudiant'].'.bmp'))
               echo "../../photos/".$etudiants[$y]['info']['matriculeEtudiant'].'.bmp';
            else 
                if(file_exists(FCPATH."photos/". $etudiants[$y]['info']['matriculeEtudiant'].'.jpg'))
                    echo "../../photos/".$etudiants[$y]['info']['matriculeEtudiant'].'.jpg';
                else 
                    echo "../../photos/". $etudiants[$y]['info']['matriculeEtudiant'].'.png'; 
            
            /*
      if(file_exists("C:\wamp\www\laureat\photos/". $info['matriculeEtudiant'].'.GIF'))
        echo "../../photos/".$info['matriculeEtudiant'].'.GIF';
        else 
            if(file_exists("C:\wamp\www\laureat\photos/". $info['matriculeEtudiant'].'.bmp'))
               echo "../../photos/".$info['matriculeEtudiant'].'.bmp';
            else 
                if(file_exists("C:\wamp\www\laureat\photos/". $info['matriculeEtudiant'].'.jpg'))
                    echo "../../photos/".$info['matriculeEtudiant'].'.jpg';
                else 
                    echo "../../photos/". $info['matriculeEtudiant'].'.png'; */
        ?> "onerror="this.src='../../photos/default.gif';"/></TD>
        <TD ></TD>
        <TD ></TD>
	<TD colspan="8 " class="">
        <P class="p15 ft15"> <?php echo $etudiants[$y]['info']['nom'].' '. $etudiants[$y]['info']['prenom'] ;?></P>
     <P class="p16 ft16"><?php echo $etudiants[$y]['infoE']['ligne1']; ?><NOBR><?php echo $etudiants[$y]['infoE']['ligne2']; ?></NOBR> <?php echo $etudiants[$y]['infoE']['ligne3']; ?></P>
<P class="p17 ft16">T&eacute;l&eacute;phone : <?php echo $etudiants[$y]['infoE']['telephone1']; ?></P>
<P class="p18 ft16">EMAIL : <?php echo $etudiants[$y]['infoE']['email']; ?></P>
        
        </TD>
	
</TR>
<TR>    
	<TD class=""><P class="p0 ft1">&nbsp;</P></TD>
	<TD ><P class="p0 ft1">&nbsp;</P></TD>
        <TD style="border-bottom: #e46d0a 1px solid;"width="40px"><P class="p0 ft1">&nbsp;</P></TD>
        <TD style="border-right: #e46d0a 1px solid;border-bottom: #e46d0a 1px solid;"><P class="p0 ft1">&nbsp;</P></TD>
        <TD ><P class="p0 ft1">&nbsp;</P></TD>
        
        <TD><P class="p0 ft1">&nbsp;</P></TD>
	<TD style="border-left: #e46d0a 1px solid;border-bottom: #e46d0a 1px solid;padding: 0px;margin: 0px;width: 30px;vertical-align: bottom;"><P class="p0 ft1">&nbsp;</P></TD>
	
         <TD ><P class="p0 ft18">&nbsp;</P></TD>
        <TD ><P class="p0 ft18">&nbsp;</P></TD>
	<TD class=""><P class="p0 ft1">&nbsp;</P></TD>
	<TD style="border-right: #e46d0a 1px solid;border-bottom: #e46d0a 1px solid;padding: 0px;margin: 0px;width: 30px;vertical-align: bottom;"><P class="p0 ft1">&nbsp;</P></TD>
	
</TR>

</TABLE>
      

</DIV>
</DIV>
<DIV id="id_3">
   
<TABLE  border="0" cellpadding=0 cellspacing=0 class="t3">
<TR>
	<TD class="tr4 td28"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr4 td29"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr4 td30"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr4 td31"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr4 td32"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr4 td33"><P class="p0 ft1">&nbsp;</P></TD>
        <TD rowspan=2 class="tr11 td38"><P class="p9 ft16" style="text-align: center">Moyenne</P></TD>
<!--	<TD colspan=2 class="tr0 td34"><P class="p19 ft4">CONTROLE CONTINU</P></TD>
<TD colspan=1 rowspan="2" class="tr0 td34" style="text-align: center"><P class="p19 ft4" style="text-align: center;padding-left: 0px">MOYENNE DE<br>COMP&Eacute;TENCES</P></TD>
<!--	<TD colspan=2 class="tr4 td35"><P class="p20 ft20">EXAMEN</P></TD>
<!--<TD colspan=2 class="tr4 td35"><P class="p19 ft4"  >MOYENNE DE CONNAISSANCE&nbsp;</P></TD>-->
        <TD rowspan=2 class="tr11 td36"><P class="p9 ft16" style="text-align: center">Crédit</P></TD>
	<TD class="tr4 td37"><P class="p0 ft1">&nbsp;</P></TD>
	
	<TD rowspan=2 class="tr11 td39"><P class="p11 ft16" style="text-align: center">Moyenne</P></TD>
	<TD rowspan=2 class="tr11 td40"><P class="p11 ft16" style="text-align: center">&Eacute;tat</P></TD>

</TR>
<TR>
	<TD rowspan=2 class="tr2 td41"><P class="p21 ft21">Code</P></TD>
	<TD rowspan=2 class="tr2 td42"><P class="p22 ft21">Année</P></TD>
        <TD rowspan=2 class="tr2 td4"><P class="p22 ft21" style="text-align: center">Crédit<br> [Coef]</P></TD>
	<TD class="tr14 td43"><P class="p0 ft19">&nbsp;</P></TD>
	<TD rowspan=2 class="tr2 td44"><P class="p23 ft21">Module (UE) | Elément de Module (EM)</P></TD>
        <TD rowspan=2 class="tr2 td45"><P class="p24 ft21" style="text-align: center">Crédit<br> [Coef]</P></TD>
<!--	<TD class="tr13 td46"><P class="p0 ft18">&nbsp;</P></TD>
	<TD rowspan=3 class="tr8 td47"><P class="p11 ft15" style="text-align: center">Atome</P></TD>-->
	<!--<TD rowspan=3 class="tr8 td47"><P class="p11 ft15" style="text-align: center">Atome</P></TD>-->
	  
       <!-- <TD rowspan=3 class="tr8 td48"><P class="p11 ft15" style="text-align: center">Session</P></TD>
	<TD rowspan=3 class="tr8 td48"><P class="p11 ft15" style="text-align: center">Session</P></TD>-->
        <TD rowspan=2 class="tr2 td49"><P class="p11 ft21" style="text-align: center">&Eacute;tat</P></TD>
</TR>
<TR>
	<TD class="tr15 td43"><P class="p0 ft22">&nbsp;</P></TD>
      <!--  <TD  colspan="1" rowspan=3 class="tr16 td50" ><P class="p29 ft15">Note</P></TD>
	<TD rowspan=2 class="tr16 td50" ><P class="p29 ft15" >Note</P></TD>-->
      <TD rowspan=2 class="tr16 td52"><P class="p29 ft23" style="text-align: center">EM</P></TD>
	<TD rowspan=2 class="tr16 td51"><P class="p9 ft23" style="text-align: center">Capitalisé</P></TD>
	
	<TD rowspan=2 class="tr16 td53"><P class="p11 ft23" style="text-align: center">Module</P></TD>
	<TD rowspan=2 class="tr16 td54"><P class="p11 ft23" style="text-align: center">Module</P></TD>
</TR>
<TR>
	<TD class="tr13 td41"><P class="p0 ft18">&nbsp;</P></TD>
	<TD class="tr13 td42"><P class="p0 ft18">&nbsp;</P></TD>
	<TD class="tr13 td4"><P class="p0 ft18">&nbsp;</P></TD>
	<TD class="tr13 td43"><P class="p0 ft18">&nbsp;</P></TD>
	<TD class="tr13 td44"><P class="p0 ft18">&nbsp;</P></TD>
	<TD class="tr13 td45"><P class="p0 ft18">&nbsp;</P></TD>
	<TD class="tr13 td49"><P class="p0 ft18">&nbsp;</P></TD>
</TR>
<TR>
	<TD class="tr6 td41"><P class="p0 ft24">&nbsp;</P></TD>
	<TD class="tr6 td42"><P class="p0 ft24">&nbsp;</P></TD>
	<TD class="tr6 td4"><P class="p0 ft24">&nbsp;</P></TD>
	<TD class="tr6 td43"><P class="p0 ft24">&nbsp;</P></TD>
	<TD class="tr6 td44"><P class="p0 ft24">&nbsp;</P></TD>
	<TD class="tr6 td45"><P class="p0 ft24">&nbsp;</P></TD>
	<!--<TD class="tr6 td50" colspan="1"><P class="p0 ft24">&nbsp;</P></TD>-->
<!--	<TD class="tr6 td55"><P class="p11 ft25" style="text-align: center">d'Eval</P></TD>-->
<!--<TD class="tr6 td55"><P class="p11 ft25" style="text-align: center">&nbsp;</P></TD>
	<TD class="tr6 td56"><P class="p11 ft25" style="text-align: center">Normale</P></TD>
	<TD class="tr6 td42"><P class="p11 ft25" style="text-align: center">Rattrapage</P></TD>-->
	<TD class="tr6 td51"><P class="p0 ft24">&nbsp;</P></TD>
	<TD class="tr6 td49"><P class="p0 ft24">&nbsp;</P></TD>
	<TD class="tr6 td52"><P class="p0 ft24">&nbsp;</P></TD>
	<TD class="tr6 td53"><P class="p0 ft24">&nbsp;</P></TD>
	<TD class="tr6 td54"><P class="p0 ft24">&nbsp;</P></TD>
</TR>
<TR>
	<TD class="tr1 td57"><P class="p0 ft2">&nbsp;</P></TD>
	<TD class="tr1 td58"><P class="p0 ft2">&nbsp;</P></TD>
	<TD class="tr1 td59"><P class="p0 ft2">&nbsp;</P></TD>
	<TD class="tr1 td60"><P class="p0 ft2">&nbsp;</P></TD>
	<TD class="tr1 td61" ><P class="p0 ft2">&nbsp;</P></TD>
	<TD class="tr1 td62"><P class="p0 ft2">&nbsp;</P></TD>
	<TD class="tr1 td63" colspan="1"><P class="p0 ft2">&nbsp;</P></TD>
	<!--<TD class="tr1 td64"><P class="p0 ft2">&nbsp;</P></TD>-->
	<TD class="tr1 td65"><P class="p0 ft2">&nbsp;</P></TD>
	<TD class="tr1 td58"><P class="p0 ft2">&nbsp;</P></TD>
	<TD class="tr1 td66"><P class="p0 ft2">&nbsp;</P></TD>
	<TD class="tr1 td67"><P class="p0 ft2">&nbsp;</P></TD>
	<!---<TD class="tr1 td68"><P class="p0 ft2">&nbsp;</P></TD>
	<TD class="tr1 td69"><P class="p0 ft2">&nbsp;</P></TD>
	<TD class="tr1 td70"><P class="p0 ft2">&nbsp;</P></TD>-->
</TR>
   <?php 
                           if(isset($etudiants[$y]['modules'])){
                               $module['decision']='';
                           foreach ($etudiants[$y]['modules'] as $idModule=>$module) {
            
echo'<TR>
	<TD style="border-top: #e46d0a 1px solid;" class="tr12 td41"><P class="p24 ft16">'.$idModule.'</P></TD>
	<TD class="tr12 td42"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr12 td4"><P class=" ft16" style="text-align: center;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;">'.(!empty($module) && !empty($module['ects'])?$module['ects']:0).' ['.(!empty($module) &&!empty($module['coefficient'])?$module['coefficient']:0).']'.'</P></TD>
	<TD class="tr12 td43"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr10 td71"><P class="p23 ft16">'.$module['titre'].'</P></TD>
	<TD class="tr12 td45"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr12 td50" colspan=1><P class="p0 ft1">&nbsp;</P></TD>';
	//<TD class="tr12 td55"><P class="p0 ft1">&nbsp;</P></TD>
	echo'<TD class="tr12 td56"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr12 td42"><P class="p0 ft1">&nbsp;</P></TD>
	
	<TD class="tr10 td72"><P class="p28 ft26">'.$module['nm'].'</P></TD>';
                     if($module['decision']=='VE' || $module['decision']=='VC' || $module['decision']=='V'){
                                      $module['decision']='Validé';
                                  }elseif ($module['decision']=='NV') {
             $module['decision']='Non validé';
        }
	echo'<TD class="tr10 td73"><P class="p11 ft27">'.$module['decision'].'</P></TD>
</TR>';
 $i=0;
                              foreach ($module['elements'] as $sigle=>$element) {
                                  
                                 
                   for($k=0;$k<count($element['annee']);$k++)     {          
                            // if(($element['capit'][$k]!='CI' || $element['capit'][$k]!='CE' )){
                            //     break;
                      $l=$sigle;
                      $l=0;
                                   if(($element['capit'][$k]=='C') or ($element['capit'][$k]=='CI') or ($element['capit'][$k]=='CE') ){
                                       $l=1;
                                   }
                                  
                                  
                                  echo'
<TR>
	<TD class="tr17 td41"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr17 td42"><P class="p29 ft16">'.$element['annee'][$k].'</P></TD>
	<TD class="tr17 td4"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr17 td43"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr11 td32" valign="center"><P class="p23 ft16">'.$sigle.' :'.$element['titre'][$k].'</P></TD>
	<TD class="tr17 td45"><P class=" ft16" style="text-align: center;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;">'.$element['ects'][$k].' ['.$element['coefficient'][$k].']'.'</P></TD>
	<TD class="tr17 td52"><P class="p28 ft16">'.$element['nfe'][$k].'</P></TD>';
                                  
//	<TD class="tr17 td55"><P class="p11 ft16">DS</P></TD>
	//echo'<TD class="tr17 td56"><P class="p28 ft16">'.number_format($element['nsn'][$k],2).'</P></TD>';
                                 /* if(number_format($element['nsr'][$k],2)=="0.00"){
	echo'<TD class="tr17 td56"><P class="p28 ft16"></P></TD>';
                                  }else{
                                      echo'<TD class="tr17 td56"><P class="p28 ft16">'.number_format($element['nsr'][$k],2).'</P></TD>';
        
                                  }*/
	                          if($element['capit'][$k]=='NC'){
                                      
                                    //  $element['capit'][$k]="Ajourn&eacute";
                                      $element['capit'][$k]="Non validé";
                                     echo' <TD class="tr17 td51"><P class="p28 ft16">0</P></TD>';
        
                                  }else{
                                      $element['capit'][$k]="Validé";
                                      echo' <TD class="tr17 td51"><P class="p28 ft16">'.$element['ects'][$k].'</P></TD>';
        
                                  }
                                  
	echo '<TD class="tr17 td49"><P class="p11 ft16">'. $element['capit'][$k].'</P></TD>
	
	<TD class="tr11 td74"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr11 td75"><P class="p0 ft1">&nbsp;</P></TD>
                              </TR>';
                                if(($l==1)){
                                     break;
                                 } 
                                 
                             }   }}}?>

<TR>
	<TD class="tr20 td57"><P class="p0 ft28">&nbsp;</P></TD>
	<TD class="tr20 td58"><P class="p0 ft28">&nbsp;</P></TD>
	<TD class="tr20 td59"><P class="p0 ft28">&nbsp;</P></TD>
	<TD class="tr20 td60"><P class="p0 ft28">&nbsp;</P></TD>
	<TD class="tr20 td61"><P class="p0 ft28">&nbsp;</P></TD>
	<TD class="tr20 td62" ><P class="p0 ft28">&nbsp;</P></TD>
	<TD class="tr20 td63" colspan="1"><P class="p0 ft28">&nbsp;</P></TD>
	
	<TD class="tr20 td65"><P class="p0 ft28">&nbsp;</P></TD>
	<TD class="tr20 td58"><P class="p0 ft28">&nbsp;</P></TD>
	<TD class="tr20 td66"><P class="p0 ft28">&nbsp;</P></TD>
	<TD class="tr20 td67"><P class="p0 ft28">&nbsp;</P></TD>
	<!--<TD class="tr20 td68"><P class="p0 ft28">&nbsp;</P></TD>
	<TD class="tr20 td69"><P class="p0 ft28">&nbsp;</P></TD>
	<TD class="tr20 td70"><P class="p0 ft28">&nbsp;</P></TD>-->
</TR>
<TR>
	<TD class="tr0 td41"><P class="p0 ft1">&nbsp;</P></TD>
	<TD rowspan=2 class="tr19 td42"><P class="p29 ft15">TOTAL</P></TD>
        <TD rowspan=2  class="tr19 td4"><P class="p27 ft16">30</P></TD>
        <TD class="tr0 td43"><P class="p0 ft1">&nbsp;</P></TD>
	<!--<TD class="tr0 td43"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr0 td44"><P class="p0 ft1">&nbsp;</P></TD>-->
        <TD colspan=1 rowspan=2 class="tr19 td76"><P class="p23 ft15">TOTAL CR&Eacute;DIT CAPITALIS&Eacute;</P></TD>
	<TD colspan=1 class="tr0 td77"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr0 td42"><P class="p0 ft1">&nbsp;</P></TD>
        
	<TD rowspan=2 class="tr21 td78"><P class="p28 ft30"><?php echo (!empty($etudiants[$y]['semestre']['ects'])?$etudiants[$y]['semestre']['ects']:0);?></P></TD>
        <TD colspan=2 rowspan="2" class="tr0 td79"><P class="p11 ft15">MOYENNE SEMESTRE</P></TD>
	<TD rowspan=2 class="tr21 td72"><P class="p28 ft31"><?php echo (!empty($etudiants[$y]['semestre']['note'])?$etudiants[$y]['semestre']['note']:0);?></P></TD>
	
</TR>
<TR>
	<TD class="tr4 td41"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr4 td43"><P class="p0 ft1">&nbsp;</P></TD>
	<!--<TD class="tr4 td44"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr4 td77"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr4 td42"><P class="p0 ft1">&nbsp;</P></TD>
<!--	<TD colspan=2 class="tr4 td79"><P class="p11 ft27">Moyenne Générale</P></TD>-->
	<!--<TD class="tr4 td54"><P class="p0 ft1">&nbsp;</P></TD>-->
</TR>

<TR>
	<TD class="tr22 td41"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr22 td80"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr22 td81"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr22 td82"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr22 td44"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr22 td83"><P class="p0 ft1">&nbsp;</P></TD>
<!--	<TD class="tr22 td84"><P class="p0 ft1">&nbsp;</P></TD>-->
	<TD class="tr22 td85"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr22 td86"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr22 td80"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr22 td87"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr22 td88"><P class="p0 ft1">&nbsp;</P></TD>
	<!--<TD class="tr22 td52"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr22 td89"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr22 td54"><P class="p0 ft1">&nbsp;</P></TD>-->
</TR>
<TR>
	<TD class="tr10 td90"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr10 td91"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr10 td4"><P class="p0 ft1">&nbsp;</P></TD>
	<TD colspan=2 class="tr10 td92"><P class="p0 ft16">&Eacute;TAT DE VALIDATION DU SEMESTRE :</P></TD>
        <?php //on modifie la decision vers valide ou non au lieu admis /ajourne add by MedBakar 14-03-2020
        $decision='';
        if(!empty($etudiants[$y]['semestre']['decision'])){
        $decision='Validé';
        if($etudiants[$y]['semestre']['decision']=='Ajourné(e)') $decision='Non validé';}
        ?>
	<TD colspan=2 class="tr10 td93"><P class="p23 ft26"><?php echo $decision?></P></TD>
	<!--<TD class="tr10 td94"><P class="p0 ft1">&nbsp;</P></TD>-->
	<TD class="tr10 td77"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr10 td91"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr10 td95"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr10 td88"><P class="p0 ft1">&nbsp;</P></TD>
	<!--<TD class="tr10 td96"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr10 td97"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr10 td54"><P class="p0 ft1">&nbsp;</P></TD>-->
</TR>
<TR>
	<TD class="tr15 td98"><P class="p0 ft22">&nbsp;</P></TD>
	<TD class="tr15 td99"><P class="p0 ft22">&nbsp;</P></TD>
	<TD class="tr15 td59"><P class="p0 ft22">&nbsp;</P></TD>
	<TD class="tr15 td100"><P class="p0 ft22">&nbsp;</P></TD>
	<TD class="tr15 td101"><P class="p0 ft22">&nbsp;</P></TD>
	<TD class="tr15 td102"><P class="p0 ft22">&nbsp;</P></TD>
<!--	<TD class="tr15 td103"><P class="p0 ft22">&nbsp;</P></TD>-->
	<TD class="tr15 td17"><P class="p0 ft22">&nbsp;</P></TD>
	<TD class="tr15 td104"><P class="p0 ft22">&nbsp;</P></TD>
	<TD class="tr15 td99"><P class="p0 ft22">&nbsp;</P></TD>
	<TD class="tr15 td105"><P class="p0 ft22">&nbsp;</P></TD>
	<TD class="tr15 td106"><P class="p0 ft22">&nbsp;</P></TD>
	<!--<TD class="tr15 td107"><P class="p0 ft22">&nbsp;</P></TD>
	<TD class="tr15 td108"><P class="p0 ft22">&nbsp;</P></TD>
	<TD class="tr15 td70"><P class="p0 ft22">&nbsp;</P></TD>-->
</TR>
</TABLE>
</DIV>
<DIV style="margin-top:10px" id="id_4">
<DIV id="id_4_1">
<TABLE border="0" cellpadding=0 cellspacing=0 >
<TR>
	   <td rowspan="7" style="" >
 
        </td>
        
                 
        	   <td rowspan="10" style="" >
                       <DIV id="id_4_1">
<TABLE width="450" cellpadding=0 cellspacing=0  border="0">
<TR>
	<TD rowspan=3 class="tr23 td109"><!--[if lte IE 7]><P style="margin-left:-16px;margin-top:0px;margin-right:-25px;margin-bottom:0px;" class="p31 ft17"><![endif]--><!--[if gte IE 8]><P style="margin-left:25px;margin-top:0px;margin-right:-66px;margin-bottom:41px;" class="p31 ft17"><![endif]--><![if ! IE]><P style="margin-left:9px;margin-top:21px;margin-right:-50px;margin-bottom:20px;" class="p31 ft17"><![endif]>DECISION</P></TD>
	<TD class="tr5 td110"><P class="p0 ft1">&nbsp;</P></TD>
	<TD colspan=2 class="tr5 td111"><P class="p0 ft17">FAIT A NOUAKCHOTT, LE <?php echo date('d/m/Y');?></P></TD>
	<TD class="tr5 td112"><P class="p0 ft1">&nbsp;</P></TD>
</TR>
<TR>
	<TD class="tr14 td113"><P class="p0 ft19">&nbsp;</P></TD>
	<TD class="tr14 td114"><P class="p0 ft19">&nbsp;</P></TD>
	<TD class="tr14 td115"><P class="p0 ft19">&nbsp;</P></TD>
	<TD class="tr14 td116"><P class="p0 ft19">&nbsp;</P></TD>
</TR>
<TR>
	<TD class="tr19 td117"><P class="p0 ft1">&nbsp;</P></TD>
            <TD colspan=2 rowspan=2 class="tr24 td118"><P class="p11 ft32"><NOBR><?php if(!empty($etudiants[$y]['semestre']['ects'])) if($etudiants[$y]['semestre']['ects']==30){echo 'VALIDATION';}else{ echo 'Non validé'; } ?> </P></TD>
	<TD class="tr19 td119"><P class="p0 ft1">&nbsp;</P></TD>
</TR>
<TR>
	<TD rowspan=2 class="tr11 td109"><!--[if lte IE 7]><P style="margin-left:19px;margin-top:0px;margin-right:-25px;margin-bottom:0px;" class="p32 ft17"><![endif]--><!--[if gte IE 8]><P style="margin-left:25px;margin-top:0px;margin-right:-31px;margin-bottom:6px;" class="p32 ft17"><![endif]--><![if ! IE]><P style="margin-left:22px;margin-top:3px;margin-right:-0px;margin-bottom:3px;" class="p32 ft17"><![endif]>JURY</P></TD>
	<TD class="tr16 td117"><P  class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr16 td119"><P class="p0 ft1">&nbsp;</P></TD>
</TR>
<TR>
	<TD class="tr3 td117"><P class="p0 ft29">&nbsp;</P></TD>
	<TD class="tr3 td120"><P class="p0 ft29">&nbsp;</P></TD>
	<TD class="tr3 td121"><P class="p0 ft29">&nbsp;</P></TD>
	<TD class="tr3 td119"><P class="p0 ft29">&nbsp;</P></TD>
</TR>
<TR>
	<TD class="tr10 td109"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr8 td122"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr8 td123"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr8 td124"><P class="p0 ft1">&nbsp;</P></TD>
	<TD  style="border-bottom:solid #E36C09 1.0pt; border-right:solid #E36C09 1.0pt;"><P class="p0 ft1">&nbsp;</P></TD>
</TR>


</TABLE></div>
           
        </td>
</TR>
<TR>
	
	<TD ><P class="p0 ft19">&nbsp;</P></TD>
</TR>
<TR>
     
</TR>
<TR>
	<TD ><P class="p0 ft29">&nbsp;</P></TD>
</TR>
<TR>
	<TD rowspan=2 style='padding: 0px;margin: 0px;width:37px;height: 0px;vertical-align: bottom;'><!--[if lte IE 7]><P style="margin-left:19px;margin-top:0px;margin-right:-25px;margin-bottom:0px;" class="p32 ft17"><![endif]--><!--[if gte IE 8]><P style="margin-left:25px;margin-top:0px;margin-right:-31px;margin-bottom:6px;" class="p32 ft17"><![endif]--><![if ! IE]><P style="margin-left:22px;margin-top:-25px;margin-right:-28px;margin-bottom:3px;" class="p32 ft17"><![endif]>PASSAGE</P></TD>
	
	
</TR>
<TR>
	<TD class="tr3 td120"><P class="p0 ft29">&nbsp;</P></TD>
</TR>
<TR>
	<TD style="border-left: solid #E36C09 1.0pt;"><P class="p0 ft1">&nbsp;</P></TD>
	<TD ><P class="p0 ft1">&nbsp;</P></TD>
	<TD ><P class="p0 ft1">&nbsp;</P></TD>
</TR>

<TR>
	<TD style=""><P class="p0 ft1">&nbsp;</P></TD>
        <TD style=""><P class="p0 ft1">&nbsp;</P></TD>
</TR>
</TABLE>
</DIV>
<!--    
    <DIV style="margin-top:5px" id="id_4_2">-->

    <DIV style="margin-top:5px" id="" style="text-align: left">
        <table><tr><td valign="top" width="150px" >
<!--corriger par scolarite team 17/04/2023-->
<P class="p33 ft12">P/O DIRECTEUR</P>
<P class="p33 ft12">CHEF SERVICE SCOLARITE</P>
<!--P class="p33 ft12">Date et Signature </P--> <!-- P/O DIRECTEUR-->
<!--P class="p33 ft12">du Directeur des Affaires  Académiques</P-->
                </td></tr>
            <tr>
                <td height="100px">
                    
                </td>
            </tr>
        <tr>
                <td height="">
                    <span style="font-size: 8.0pt;">   FAIT &Agrave; NOUAKCHOTT, LE <?php echo date('d/m/Y');?></span>
                </td>
            </tr></table>
</DIV>
</DIV>
<table style="margin-left: 40.5pt; border-collapse: collapse; border: none;">
<tbody>
<!--<tr style="height: 13.5pt;">
<td style="width: 53.15pt; border: solid #E36C09 1.0pt; background: #F79546; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" width="71">
<p style="margin: 3.35pt 0cm .0001pt 1.3pt;"><span style="font-size: 6.0pt;">ACRONYMES</span></p>
</td>
<td style="width: 475.55pt; border: solid #E36C09 1.0pt; border-left: none; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" width="634">
<p style="margin: 2.85pt 0cm .0001pt 8.85pt;"><span style="font-size: 6.0pt;">DS : DEVOIRS SURVEILLE, PRJ : PROJET, TP : TRAVAUX PRATIQUES, EXP : EXPOSE</span></p>
</td>
</tr>-->
</tbody>
</table>
<DIV id="id_5">
    <TABLE cellpadding=0 cellspacing=0 class="t5" style="margin-bottom: 1px">
<TR>
	<TD class="tr2 td134"><P class="p0 ft17">BULLETIN DE NOTES DE :</P></TD>
     <TD class="tr2 td135"><P class="p0 ft20" style="font-size: 12px"><?php echo $etudiants[$y]['info']['nom'].' '. $etudiants[$y]['info']['prenom'] ;?></P></TD>
</TR>
</TABLE>
   

</DIV>
 <table style="margin-left: 5.8pt; border-collapse: collapse; border: none;">
<tbody>
<tr style="height: 13.5pt;">
<td style="width: 62.05pt; border: solid #E36C09 1.0pt; background: #F79546; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" width="83">
<p style="margin-top: 0cm;"><span style="font-size: 7.0pt; font-family: 'Times New Roman','serif';">&nbsp;</span></p>
</td>
<td style="width: 501.35pt; border: solid #E36C09 1.0pt; border-left: none; background: #FCE9D9; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" width="668">
<p style="margin: 2.05pt 0cm .0001pt 8.95pt;"><span style="font-size: 7.0pt;">NB : CE DOCUMENT N'EST PAS VALABLE SANS SIGNATURE</span></p>
</td>
</tr>
</tbody>
</table>
 <div style="page-break-after: always; page-break-after: always; width: 100%; height: 0px; background-color: gainsboro; border: 0px solid gray; text-align: center">
<DIV id="id_6">
   <!-- <P class="p33 ft7">© TOUS DROITS R&Eacute;SERV&Eacute;S ALFA CONSEIL 2020</P>-->

    
</DIV>

</DIV>

</BODY>
</HTML>
          
 
   </div>
 
</div>   <!--end of center content -->  
          </div>
 
  
   <?php 
} 
                               ?> </div>  
<!--end of main content-->

  <!--button  onClick="imprimer('printable');" ><b> Imprimer  </b></button--> 

<?php include(APPPATH.'views/include/footer.php'); ?>
<script TYPE="text/javascript">
			var currentZoom = parent.ltop.currentZoom;
			if(currentZoom != undefined)
				document.body.style.zoom=currentZoom/100;
			</script>

<script type="text/javascript">
<!--
function imprimer(id){
str=document.getElementById(id).innerHTML
newwin=window.open('','printwin','left=100,top=100,width=400,height=400')
newwin.document.write('<HTML>\n <HEAD>\n')
// Hafedh
// Supression de l'entete lors de l'impression
newwin.document.write('<style>@page { size: auto;  margin: 0mm; }</style>\n')
newwin.document.write('<style>body {-webkit-print-color-adjust: exact;}  </style>\n')


//newwin.document.write('<link rel="stylesheet" href="<?php echo base_url();?>css/printable.css" />\n');
newwin.document.write('<TITLE>Relevés_des_etudiants</TITLE>\n')
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



