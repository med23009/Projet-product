<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
   
  <div class="container">
    <div class="col-xs-12 hl-left">
  <button  onClick="imprimer('printable');" ><b> Imprimer les cartes </b></button>
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
<DIV id="page_1">
<div id="p1dimg1">
</div>

<DIV class="dclr"></DIV>
<DIV id="id_1">
     <table  border="0" width="100%">
             <tr>
                 <td><img src="../../images/logo_iup_abra.png" height="70" width="90" ></td>
                  
                  <td> 
                      <table  border="0" style="line-height: 10px">
                          <tr>
                              <td align="center" style="font-size: 120%;font-family: Times;"><b>Institut Universitaire Professionnel</b></td>
                          </tr>
                          <tr>
                          <td>
                          <table  border="0" style="line-height: 7px">
                          <tr>
                              <td style="font-size: 50%;border-top: 1px solid black">Cité Cadres - Sebkha, Téléphone : +222 49 00 05 47 Mobile : +222 49 00 05 47, Email : sscolarite@esp.mr</td>
                          </tr>
                          <tr>
                              <td style="font-size: 50%">Boite Postale : 4303, Siteweb : www.esp.mr/isms, Nouakchott-Mauritanie</td>
                          </tr>
                          </table>
                              </td>
                          <tr/>
                      </table>
                  </td> 
                  <td> <img id="barcode"/><br>
                      <?php 
                      $niveau=($numSem)/2;
                      //echo $numSem."aa";
                      //  print_r($code);
                     
                      $e=0;
                      $f=0;
                      $rest = substr($info['matriculeEtudiant'], 0,2);
                     // for($i=0;$i<count($code);$i++){
                     // if()
                          $e=$code[0]+$code[1];
                           $f=$code[0]-$code[1];
                         echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size="0.5px">'.$e.'-'.$f.'-'.$rest.'</font>';
                     // } 
                       
                      ?>
          
         <script type="text/javascript">
       $(document).ready(function(){
$("#barcode").JsBarcode("<?php echo  'IUP'.$info['matriculeEtudiant'];?>",{
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
	<TD class="tr4 td2"><P class="p0 ft4">SESSION</P></TD>
        <TD colspan=2 class="tr4 td8"><P class="p0 ft5"><?php   if($numSem%2==1){echo 'Octobre '.($annee); }else{echo 'Janvier '.($annee); }?></P></TD>
	<TD class="tr4 td5"><P class="p0 ft1">&nbsp;</P></TD>
</TR>
<TR>
	<TD class="tr0 td0"></TD>
	<TD rowspan=2 class="tr5 td1"><P class="p1 ft6">BULLETIN DE NOTES</P></TD>
	<TD class="tr0 td2"><P class="p0 ft7">DOMAINE</P></TD>
        <?php $domaine="";
        if($info['idProgramme']=="MAEF"){
            $domaine="Sciences et Technologies";
          }else if($info['idProgramme']=="MAN"){
            $domaine="Sciences et Technologies";
          }else if($info['idProgramme']=="LGTR"){
            $domaine="Sciences et Technologies";
          }else{
            $domaine="Sciences et Technologies";
          }
          $mension="";
        if($info['idProgramme']=="MAEF"){
            $mension="Mathématiques";
          }else if($info['idProgramme']=="MAN"){
            $mension="Management";
          }else if($info['idProgramme']=="LGTR"){
            $mension="Logistique et Transports";
          }else{
            $mension="Informatique";
          }
          $option="";
        if($info['idProgramme']=="MAEF"){
            $option="Mathématiques Appliquées à l'Economie et à la Fina...";
          }else if($info['idProgramme']=="MAN"){
            $option="Management";
          }else if($info['idProgramme']=="LGTR"){
            $option="Logistique et Transports";
          }else{
            $option="Réseaux et Télécommunications";
          }
          ?>
	<TD colspan=4 class="tr0 td9"><P class="p0 ft8"><?php echo $domaine;  ?></P></TD>
</TR>
<TR>
	<TD class="tr6 td0"></TD>
	<TD rowspan=2 class="tr2 td2"><P class="p0 ft4">MENTION</P></TD>
	<TD colspan=4 rowspan=2 class="tr2 td9"><P class="p0 ft9"><?php  echo $mension;?></P></TD>
</TR>
<TR>
	<TD class="tr7 td0"></TD>
	<TD class="tr7 td1"><P class="p0 ft10">&nbsp;</P></TD>
</TR>
<TR>
	<TD class="tr0 td0"></TD>
	<TD class="tr0 td1"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr0 td2"><P class="p0 ft7">SPECIALITE</P></TD>
	<TD colspan=4 class="tr0 td9"><P class="p0 ft8"><?php echo $option;?></P></TD>
</TR>
<TR>
	<TD class="tr8 td0"></TD>
        <TD class="tr8 td1"><P class="p2 ft11">ANNEE UNIVERSITAIRE <NOBR><?php if($numSem%2==1){ echo  $annee.'-'.($annee+1);}else{echo ( $annee-1).'-'.($annee);}?></NOBR></P></TD>
	<TD class="tr8 td2"><P class="p0 ft7">NIVEAU</P></TD>
        <TD class="tr8 td3"><P class="p0 ft12"><?php  $info['niveau']=($numSem+1)/2;echo 'L'. substr($info['niveau'], 0,1)  ; ?></P></TD>
	<TD class="tr8 td4"><P class="p0 ft7">SEMESTRE</P></TD>
	<TD class="tr8 td5"><P class="p3 ft12"><?php echo $numSem; ?></P></TD>
	<TD class="tr8 td6"><P class="p0 ft1">&nbsp;</P></TD>
</TR>
</TABLE><td></tr></table>
</DIV>
<DIV id="id_2">
<DIV id="id_2_1">
<TABLE border="0" cellpadding=0 cellspacing=0 class="t1">
<TR>
	<TD class="tr9 td10"><P class="p0 ft12" >Nom de Famille</P></TD>
	<TD class="tr9 td11"><P class="p4 ft12">:</P></TD>
	<TD class="tr9 td12"><P class="p5 ft13"><font style="up"><?php echo $info['nom']; ?></P></TD>
</TR>
<TR>
	<TD class="tr9 td10"><P class="p0 ft12" >Prénom du Pére</P></TD>
	<TD class="tr9 td11"><P class="p4 ft12">:</P></TD>
	<TD class="tr9 td12"><P class="p5 ft13"><font style="up"><?php echo $info['prenomPere']; ?></P></TD>
</TR>
<TR>
	<TD class="tr10 td10"><P class="p0 ft12">Nom</P></TD>
	<TD class="tr10 td11"><P class="p6 ft12">:</P></TD>
	<TD class="tr10 td12"><P class="p5 ft14"><?php echo $info['prenom']; ?></P></TD>
</TR>
<TR>
	<TD class="tr11 td10"><P class="p0 ft12">No d'Inscription</P></TD>
	<TD class="tr11 td11"><P class="p7 ft12">:</P></TD>
	<TD class="tr11 td12"><P class="p5 ft13"><?php echo  'IUP'.$info['matriculeEtudiant'];?></P></TD>
</TR>
<TR>
	<TD class="tr12 td10"><P class="p0 ft12"><NOBR>Né-e</NOBR> le</P></TD>
	<TD class="tr12 td11"><P class="p7 ft12">:</P></TD>
	<TD class="tr12 td12"><P class="p5 ft13"><?php echo date('d/m/Y',strTotime($info['dateNaissance'])); ?></P></TD>
</TR>
<TR>
	<TD class="tr10 td10"><P class="p0 ft12">à</P></TD>
	<TD class="tr10 td11"><P class="p8 ft12">:</P></TD>
	<TD class="tr10 td12"><P class="p5 ft14"><?php echo  $info['lieuNaissance']; ?></P></TD>
</TR>
<TR>
	<TD class="tr12 td10"><P class="p0 ft12">Pays</P></TD>
	<TD class="tr12 td11"><P class="p8 ft12">:</P></TD>
	<TD class="tr12 td12"><P class="p5 ft13">MAURITANIE</P></TD>
</TR>
<TR>
	<TD class="tr12 td10"><P class="p0 ft12">Date d'Inscription</P></TD>
	<TD class="tr12 td11"><P class="p7 ft12">:</P></TD>
	<TD class="tr12 td12"><P class="p5 ft13"><?php echo date("d/m/Y", strtotime($info['dateInscription'])); ?></P></TD>
</TR>
</TABLE>
</DIV>
<DIV id="id_2_2">
<TABLE  border="0" cellpadding=0 cellspacing=0 class="t2">
<TR>
	<TD colspan=5 class="tr4 td13"><P class="p9 ft15">Numéro National d'Identification</P></TD>
	<TD colspan=4 class="tr4 td14"><P class="p10 ft16"><SPAN class="ft15">: </SPAN><?php echo $infoE['nin']; ?></P></TD>
	<TD class="tr4 td4"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr4 td15"><P class="p9 ft16">Genre</P></TD>
        <TD class="tr4 td4" ><P class="p11 ft17"><?php if($info['genre']=="M"){echo "MASCULIN";}else{echo"FEMININ";}?></P></TD>
</TR>
<TR>
	<TD colspan=6 class="tr12 td13"><P class="p9 ft15">NoBac - Série - Année d'obtention :</P></TD>
	<TD colspan=2 class="tr12 td14"><P class="p12 ft16"><?php echo $infoE['num_bac']; ?></P></TD>
	<TD colspan=2 class="tr12 td16"><P class="p13 ft16"><?php echo $infoE['infoBac']; ?></P></TD>
	<TD class="tr12 td4"><P class="p14 ft12"><?php echo $infoE['anneeObtention']; ?></P></TD>
</TR>
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
 if(file_exists("C:\wamp\www\laureat\photos\IUP". $info['matriculeEtudiant'].'.GIF'))
        echo "../../photos/IUP".$info['matriculeEtudiant'].'.GIF';
        else echo "../../photos/IUP". $info['matriculeEtudiant'].'.bmp'; 
        ?> "onerror="this.src='../../photos/default.gif';"/></TD>
        <TD ></TD>
        <TD ></TD>
	<TD colspan="8 " class="">
        <P class="p15 ft15"> <?php echo $info['nom'].' '. $info['prenom'] ;?></P>
<P class="p16 ft16"><?php echo $infoE['ligne1']; ?><NOBR><?php echo $infoE['ligne2']; ?></NOBR> <?php echo $infoE['ligne3']; ?></P>
<P class="p17 ft16">Téléphone : <?php echo $infoE['telephone1']; ?></P>
<P class="p18 ft16">EMAIL : <?php echo $infoE['email']; ?></P>
        
        </TD>
	
</TR>
<TR>    
	<TD class=""><P class="p0 ft1">&nbsp;</P></TD>
	<TD ><P class="p0 ft1">&nbsp;</P></TD>
        <TD style="border-bottom: #e46d0a 1px solid;"width="40px"><P class="p0 ft1">&nbsp;</P></TD>
        <TD style="border-right: #e46d0a 1px solid;border-bottom: #e46d0a 1px solid;"><P class="p0 ft1">&nbsp;</P></TD>
        <TD ><P class="p0 ft1">&nbsp;</P></TD>
        
        <TD ><P class="p0 ft1">&nbsp;</P></TD>
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
	<TD colspan=2 class="tr0 td34"><P class="p19 ft4">CONTROLE CONTINU</P></TD>
	<TD colspan=2 class="tr4 td35"><P class="p20 ft20">EXAMEN</P></TD>
	<TD rowspan=2 class="tr11 td36"><P class="p9 ft16">ECTS</P></TD>
	<TD class="tr4 td37"><P class="p0 ft1">&nbsp;</P></TD>
	<TD rowspan=2 class="tr11 td38"><P class="p9 ft16">Note</P></TD>
	<TD rowspan=2 class="tr11 td39"><P class="p11 ft16">Note</P></TD>
	<TD rowspan=2 class="tr11 td40"><P class="p11 ft16">Val.</P></TD>
</TR>
<TR>
	<TD rowspan=2 class="tr2 td41"><P class="p21 ft21">Code</P></TD>
	<TD rowspan=2 class="tr2 td42"><P class="p22 ft21">Année</P></TD>
	<TD rowspan=2 class="tr2 td4"><P class="p22 ft21">ECTS</P></TD>
	<TD class="tr14 td43"><P class="p0 ft19">&nbsp;</P></TD>
	<TD rowspan=2 class="tr2 td44"><P class="p23 ft21">Module (UE) | Elément de Module (EC)</P></TD>
	<TD rowspan=2 class="tr2 td45"><P class="p24 ft21">ECTS</P></TD>
	<TD class="tr13 td46"><P class="p0 ft18">&nbsp;</P></TD>
	<TD rowspan=3 class="tr8 td47"><P class="p11 ft15">Atome</P></TD>
	<TD rowspan=3 class="tr8 td48"><P class="p11 ft15">Session</P></TD>
	<TD rowspan=3 class="tr8 td29"><P class="p11 ft15">Session</P></TD>
	<TD rowspan=2 class="tr2 td49"><P class="p11 ft21">Etat</P></TD>
</TR>
<TR>
	<TD class="tr15 td43"><P class="p0 ft22">&nbsp;</P></TD>
	<TD rowspan=2 class="tr16 td50"><P class="p25 ft15">Note</P></TD>
	<TD rowspan=2 class="tr16 td51"><P class="p9 ft23">Validés</P></TD>
	<TD rowspan=2 class="tr16 td52"><P class="p26 ft23">Final</P></TD>
	<TD rowspan=2 class="tr16 td53"><P class="p11 ft23">Module</P></TD>
	<TD rowspan=2 class="tr16 td54"><P class="p11 ft23">Module</P></TD>
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
	<TD class="tr6 td50"><P class="p0 ft24">&nbsp;</P></TD>
	<TD class="tr6 td55"><P class="p11 ft25">d'Eval</P></TD>
	<TD class="tr6 td56"><P class="p11 ft25">Normale</P></TD>
	<TD class="tr6 td42"><P class="p11 ft25">Rattr.</P></TD>
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
	<TD class="tr1 td61"><P class="p0 ft2">&nbsp;</P></TD>
	<TD class="tr1 td62"><P class="p0 ft2">&nbsp;</P></TD>
	<TD class="tr1 td63"><P class="p0 ft2">&nbsp;</P></TD>
	<TD class="tr1 td64"><P class="p0 ft2">&nbsp;</P></TD>
	<TD class="tr1 td65"><P class="p0 ft2">&nbsp;</P></TD>
	<TD class="tr1 td58"><P class="p0 ft2">&nbsp;</P></TD>
	<TD class="tr1 td66"><P class="p0 ft2">&nbsp;</P></TD>
	<TD class="tr1 td67"><P class="p0 ft2">&nbsp;</P></TD>
	<TD class="tr1 td68"><P class="p0 ft2">&nbsp;</P></TD>
	<TD class="tr1 td69"><P class="p0 ft2">&nbsp;</P></TD>
	<TD class="tr1 td70"><P class="p0 ft2">&nbsp;</P></TD>
</TR>
   <?php 
                           if(isset($modules)){
                               $module['decision']='';
                           foreach ($modules as $idModule=>$module) {
            
echo'<TR>
	<TD style="border-top: #e46d0a 1px solid;" class="tr12 td41"><P class="p24 ft16">'.$idModule.'</P></TD>
	<TD class="tr12 td42"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr12 td4"><P class="p27 ft16">'.$module['ects'].'</P></TD>
	<TD class="tr12 td43"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr10 td71"><P class="p23 ft16">'.$module['titre'].'</P></TD>
	<TD class="tr12 td45"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr12 td50"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr12 td55"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr12 td56"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr12 td42"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr12 td51"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr12 td49"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr12 td52"><P class="p0 ft1">&nbsp;</P></TD>
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
	<TD class="tr17 td45"><P class="p28 ft16">'.$element['ects'][$k].'</P></TD>
	<TD class="tr17 td50"><P class="p28 ft16">'.number_format($element['ncc'][$k],2).'</P></TD>
	<TD class="tr17 td55"><P class="p11 ft16">DS</P></TD>
	<TD class="tr17 td56"><P class="p28 ft16">'.number_format($element['nsn'][$k],2).'</P></TD>';
                                  if(number_format($element['nsr'][$k],2)=="0.00"){
	echo'<TD class="tr17 td56"><P class="p28 ft16"></P></TD>';
                                  }else{
                                      echo'<TD class="tr17 td56"><P class="p28 ft16">'.number_format($element['nsr'][$k],2).'</P></TD>';
        
                                  }
	                          if($element['capit'][$k]=='NC'){
                                      $element['capit'][$k]="Ajourné";
                                     echo' <TD class="tr17 td51"><P class="p28 ft16">0</P></TD>';
        
                                  }ELSE{
                                      $element['capit'][$k]="Capitalisé";
                                      echo' <TD class="tr17 td51"><P class="p28 ft16">'.$element['ects'][$k].'</P></TD>';
        
                                  }
                                  
	echo '<TD class="tr17 td49"><P class="p11 ft16">'. $element['capit'][$k].'</P></TD>
	<TD class="tr17 td52"><P class="p28 ft16">'.$element['nfe'][$k].'</P></TD>
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
	<TD class="tr20 td62"><P class="p0 ft28">&nbsp;</P></TD>
	<TD class="tr20 td63"><P class="p0 ft28">&nbsp;</P></TD>
	<TD class="tr20 td64"><P class="p0 ft28">&nbsp;</P></TD>
	<TD class="tr20 td65"><P class="p0 ft28">&nbsp;</P></TD>
	<TD class="tr20 td58"><P class="p0 ft28">&nbsp;</P></TD>
	<TD class="tr20 td66"><P class="p0 ft28">&nbsp;</P></TD>
	<TD class="tr20 td67"><P class="p0 ft28">&nbsp;</P></TD>
	<TD class="tr20 td68"><P class="p0 ft28">&nbsp;</P></TD>
	<TD class="tr20 td69"><P class="p0 ft28">&nbsp;</P></TD>
	<TD class="tr20 td70"><P class="p0 ft28">&nbsp;</P></TD>
</TR>
<TR>
	<TD class="tr0 td41"><P class="p0 ft1">&nbsp;</P></TD>
	<TD rowspan=2 class="tr19 td42"><P class="p29 ft15">TOTAL</P></TD>
	<TD rowspan=2 class="tr19 td4"><P class="p27 ft16">30</P></TD>
	<TD class="tr0 td43"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr0 td44"><P class="p0 ft1">&nbsp;</P></TD>
	<TD colspan=3 rowspan=2 class="tr19 td76"><P class="p23 ft15">ECTS TOTAL VALIDES</P></TD>
	<TD class="tr0 td77"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr0 td42"><P class="p0 ft1">&nbsp;</P></TD>
	<TD rowspan=2 class="tr21 td78"><P class="p28 ft30"><?php echo $semestre['ects'];?></P></TD>
	<TD colspan=2 class="tr0 td79"><P class="p11 ft15">NOTE SEMESTRE</P></TD>
	<TD rowspan=2 class="tr21 td72"><P class="p28 ft31"><?php echo $semestre['note'];?></P></TD>
	<TD class="tr0 td54"><P class="p0 ft1">&nbsp;</P></TD>
</TR>
<TR>
	<TD class="tr4 td41"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr4 td43"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr4 td44"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr4 td77"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr4 td42"><P class="p0 ft1">&nbsp;</P></TD>
	<TD colspan=2 class="tr4 td79"><P class="p11 ft27">Moyenne Générale</P></TD>
	<TD class="tr4 td54"><P class="p0 ft1">&nbsp;</P></TD>
</TR>
<TR>
	<TD class="tr22 td41"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr22 td80"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr22 td81"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr22 td82"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr22 td44"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr22 td83"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr22 td84"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr22 td85"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr22 td86"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr22 td80"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr22 td87"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr22 td88"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr22 td52"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr22 td89"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr22 td54"><P class="p0 ft1">&nbsp;</P></TD>
</TR>
<TR>
	<TD class="tr10 td90"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr10 td91"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr10 td4"><P class="p0 ft1">&nbsp;</P></TD>
	<TD colspan=2 class="tr10 td92"><P class="p0 ft16">ETAT DE VALIDATION DU SEMESTRE :</P></TD>
	<TD colspan=2 class="tr10 td93"><P class="p23 ft26"><?php echo $semestre['decision'];?></P></TD>
	<TD class="tr10 td94"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr10 td77"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr10 td91"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr10 td95"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr10 td88"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr10 td96"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr10 td97"><P class="p0 ft1">&nbsp;</P></TD>
	<TD class="tr10 td54"><P class="p0 ft1">&nbsp;</P></TD>
</TR>
<TR>
	<TD class="tr15 td98"><P class="p0 ft22">&nbsp;</P></TD>
	<TD class="tr15 td99"><P class="p0 ft22">&nbsp;</P></TD>
	<TD class="tr15 td59"><P class="p0 ft22">&nbsp;</P></TD>
	<TD class="tr15 td100"><P class="p0 ft22">&nbsp;</P></TD>
	<TD class="tr15 td101"><P class="p0 ft22">&nbsp;</P></TD>
	<TD class="tr15 td102"><P class="p0 ft22">&nbsp;</P></TD>
	<TD class="tr15 td103"><P class="p0 ft22">&nbsp;</P></TD>
	<TD class="tr15 td17"><P class="p0 ft22">&nbsp;</P></TD>
	<TD class="tr15 td104"><P class="p0 ft22">&nbsp;</P></TD>
	<TD class="tr15 td99"><P class="p0 ft22">&nbsp;</P></TD>
	<TD class="tr15 td105"><P class="p0 ft22">&nbsp;</P></TD>
	<TD class="tr15 td106"><P class="p0 ft22">&nbsp;</P></TD>
	<TD class="tr15 td107"><P class="p0 ft22">&nbsp;</P></TD>
	<TD class="tr15 td108"><P class="p0 ft22">&nbsp;</P></TD>
	<TD class="tr15 td70"><P class="p0 ft22">&nbsp;</P></TD>
</TR>
</TABLE>
</DIV>
<DIV style="margin-top:10px" id="id_4">
<DIV id="id_4_1">
<TABLE border="0" cellpadding=0 cellspacing=0 >
<TR>
	   <td rowspan="7" style="" >
            <?php if($numSem%2==0){?>
            <table style="border-collapse: collapse; border: none; margin-left: 4.8pt; margin-right: 4.8pt;">
<tbody>
<tr style="height: 13.5pt;">
<td style="width: 177.25pt; border: solid #E36C09 1.0pt; background: #F79546; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" colspan="2" width="236">
<p style="margin: 1.45pt 0cm .0001pt 9.1pt;"><span style="font-size: 8.0pt;"><?php if($niveau==3){ echo "Conditions d'obtention de la Licence";}else{ echo "Conditions de passage en L".($niveau+1);} ?>:</span></p>
</td>
</tr>

<?php if($niveau=="1"){?>
<tr style="height: 13.5pt;">
    
<td style="width: 5.0pt; border: solid #E36C09 1.0pt; border-top: none; border-bottom: none; border-right: none; background: #DBEDF3; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" width="72">
<p style="margin: 1.45pt 0cm .0001pt 1.55pt;"><span style="font-size: 8.0pt;"></span></p>
</td>
<td style="width: 123.25pt; border-top: none; border-left: none;  border-right: solid #E36C09 1.0pt; background: #DBEDF3; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" width="164">
<p style="margin: .9pt 0cm .0001pt 12.0pt;"><span style="font-size: 7.0pt;">TOTAL ects L1(ECTS<sub>s1</sub>+ECTS<sub>s2</sub>)>=<?php $reg=30;  if( $passage['regle']==2){$reg=39;}echo $reg;?></span></p>
</td>
</tr>
<?php }elseif($niveau=="2"){ ?>
<tr style="height: 13.5pt;">
    
<td style="width: 5.0pt; border: solid #E36C09 1.0pt; border-top: none; border-bottom: none; border-right: none; background: #DBEDF3; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" width="72">
<p style="margin: 1.45pt 0cm .0001pt 1.55pt;"><span style="font-size: 8.0pt;"></span></p>
</td>
<td style="width: 123.25pt; border-top: none; border-left: none;  border-right: solid #E36C09 1.0pt; background: #DBEDF3; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" width="164">
<p style="margin: .9pt 0cm .0001pt 12.0pt;"><span style="font-size: 7.0pt;">TOTAL ects L1(ECTS<sub>s1</sub>+ECTS<sub>s2</sub>)=60</span></p>
</td>
</tr>
<tr style="height: 13.5pt;">
    <td style="width: 5.0pt; border: solid #E36C09 1.0pt; border-top: none; border-bottom: none; border-right: none; background: #DBEDF3; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" width="72">
<p style="margin: 1.45pt 0cm .0001pt 1.55pt;"><span style="font-size: 8.0pt;"></span></p>
</td>
<td style="width: 123.25pt; border-top: none; border-left: none;  border-right: solid #E36C09 1.0pt; background: #DBEDF3; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" width="164">
<p style="margin: .9pt 0cm .0001pt 12.0pt;"><span style="font-size: 7.0pt;">TOTAL ects L2(ECTS<sub>s3</sub>+ECTS<sub>s4</sub>)>=<?php if ($passage['regle']==1){ echo "30";}else{echo "39";}?></span></p>
</td>
</tr>
<?php }elseif($niveau=="3"){ ?>
<tr style="height: 13.5pt;">
    
<td style="width: 5.0pt; border: solid #E36C09 1.0pt; border-top: none; border-bottom: none; border-right: none; background: #DBEDF3; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" width="72">
<p style="margin: 1.45pt 0cm .0001pt 1.55pt;"><span style="font-size: 8.0pt;"></span></p>
</td>
<td style="width: 123.25pt; border-top: none; border-left: none;  border-right: solid #E36C09 1.0pt; background: #DBEDF3; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" width="164">
<p style="margin: .9pt 0cm .0001pt 12.0pt;"><span style="font-size: 7.0pt;">TOTAL ects L1(ECTS<sub>s1</sub>+ECTS<sub>s2</sub>)=60</span></p>
</td>
</tr>
<tr style="height: 13.5pt;">
    <td style="width: 5.0pt; border: solid #E36C09 1.0pt; border-top: none; border-bottom: none; border-right: none; background: #DBEDF3; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" width="72">
<p style="margin: 1.45pt 0cm .0001pt 1.55pt;"><span style="font-size: 8.0pt;"></span></p>
</td>
<td style="width: 123.25pt; border-top: none; border-left: none;  border-right: solid #E36C09 1.0pt; background: #DBEDF3; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" width="164">
<p style="margin: .9pt 0cm .0001pt 12.0pt;"><span style="font-size: 7.0pt;">TOTAL ects L2(ECTS<sub>s3</sub>+ECTS<sub>s4</sub>)=60</span></p>
</td>
</tr>
<tr style="height: 13.5pt;">
    <td style="width: 5.0pt; border: solid #E36C09 1.0pt; border-top: none; border-bottom: none; border-right: none; background: #DBEDF3; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" width="72">
<p style="margin: 1.45pt 0cm .0001pt 1.55pt;"><span style="font-size: 8.0pt;"></span></p>
</td>
<td style="width: 123.25pt; border-top: none; border-left: none;  border-right: solid #E36C09 1.0pt; background: #DBEDF3; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" width="164">
<p style="margin: .9pt 0cm .0001pt 12.0pt;"><span style="font-size: 7.0pt;">TOTAL ects L2(ECTS<sub>s5</sub>+ECTS<sub>s6</sub>)>=60</span></p>
</td>
</tr>
<?php }?>



<?php  if($niveau=="1"){?>;
<tr style="height: 26.5pt;">
<td style="width: 5.0pt; border: solid #E36C09 1.0pt; border-top: none;; border-bottom: none; border-right: none;  background: #DBEDF3; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" width="72">
<p style="margin: 1.45pt 0cm .0001pt 1.55pt;"><span style="font-size: 8.0pt;"></span></p>
</td>
<td style="width: 123.25pt; border-top: none;  border-right: solid #E36C09 1.0pt; background: #DBEDF3; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" width="164">
    <p style="margin: .9pt 0cm .0001pt 12.0pt;"><span style="font-size: 7.0pt;">Moyenne L<sub>1</sub>(NS<sub>1</sub>+NS<sub>2</sub>)/2>=10</span></p>
</td>
</tr>
<?php }elseif($niveau=="2"){ ?>
<tr style="height: 13.5pt;">
<td style="width: 5.0pt; border: solid #E36C09 1.0pt; border-top: none;; border-bottom: none; border-right: none;  background: #DBEDF3; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" width="72">
<p style="margin: 1.45pt 0cm .0001pt 1.55pt;"><span style="font-size: 8.0pt;"></span></p>
</td>
<td style="width: 123.25pt; border-top: none;  border-right: solid #E36C09 1.0pt; background: #DBEDF3; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" width="164">
    <p style="margin: .9pt 0cm .0001pt 12.0pt;"><span style="font-size: 7.0pt;">Moyenne L<sub>1</sub>(NS<sub>1</sub>+NS<sub>2</sub>)/2>=10</span></p>
</td>
<tr style="height: 13.5pt;">
<td style="width: 5.0pt; border: solid #E36C09 1.0pt; border-top: none;; border-bottom: none; border-right: none;  background: #DBEDF3; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" width="72">
<p style="margin: 1.45pt 0cm .0001pt 1.55pt;"><span style="font-size: 8.0pt;"></span></p>
</td>
    <td style="width: 123.25pt; border-top: none;  border-right: solid #E36C09 1.0pt; background: #DBEDF3; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" width="164">
    <p style="margin: .9pt 0cm .0001pt 12.0pt;"><span style="font-size: 7.0pt;">Moyenne L<sub>2</sub>(NS<sub>3</sub>+NS<sub>4</sub>)/2>=10</span></p>
</td>
</tr>
<?php }elseif($niveau=="3"){ ?>
<tr style="height: 13.5pt;">
<td style="width: 5.0pt; border: solid #E36C09 1.0pt; border-top: none;; border-bottom: none; border-right: none;  background: #DBEDF3; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" width="72">
<p style="margin: 1.45pt 0cm .0001pt 1.55pt;"><span style="font-size: 8.0pt;"></span></p>
</td>
<td style="width: 123.25pt; border-top: none;  border-right: solid #E36C09 1.0pt; background: #DBEDF3; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" width="164">
    <p style="margin: .9pt 0cm .0001pt 12.0pt;"><span style="font-size: 7.0pt;">Moyenne L<sub>1</sub>(NS<sub>1</sub>+NS<sub>2</sub>)/2>=10</span></p>
</td>
<tr style="height: 13.5pt;">
<td style="width: 5.0pt; border: solid #E36C09 1.0pt; border-top: none;; border-bottom: none; border-right: none;  background: #DBEDF3; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" width="72">
<p style="margin: 1.45pt 0cm .0001pt 1.55pt;"><span style="font-size: 8.0pt;"></span></p>
</td>
    <td style="width: 123.25pt; border-top: none;  border-right: solid #E36C09 1.0pt; background: #DBEDF3; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" width="164">
    <p style="margin: .9pt 0cm .0001pt 12.0pt;"><span style="font-size: 7.0pt;">Moyenne L<sub>2</sub>(NS<sub>3</sub>+NS<sub>4</sub>)/2>=10</span></p>
</td>
</tr>
<tr style="height: 13.5pt;">
<td style="width: 5.0pt; border: solid #E36C09 1.0pt; border-top: none;; border-bottom: none; border-right: none;  background: #DBEDF3; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" width="72">
<p style="margin: 1.45pt 0cm .0001pt 1.55pt;"><span style="font-size: 8.0pt;"></span></p>
</td>
    <td style="width: 123.25pt; border-top: none;  border-right: solid #E36C09 1.0pt; background: #DBEDF3; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" width="164">
    <p style="margin: .9pt 0cm .0001pt 12.0pt;"><span style="font-size: 7.0pt;">Moyenne L<sub>3</sub>(NS<sub>5</sub>+NS<sub>6</sub>)/2>=10</span></p>
</td>
</tr>
<?php }?>

<tr style="height: 13.5pt;">
<td style="width: 5.0pt; border: solid #E36C09 1.0pt; border-top: none; border-right: none; background: #DBEDF3; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" width="72">
<p style="margin: 1.45pt 0cm .0001pt 1.55pt;"><span style="font-size: 8.0pt;"></span></p>
</td>
<td style="width: 123.25pt; border-top: none; border-left: none; border-bottom: solid #E36C09 1.0pt; border-right: solid #E36C09 1.0pt; background: #DBEDF3; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" width="164">
    <p style="margin-top: 0cm;"><span style="font-size: 7.0pt; font-family: 'Times New Roman','serif';"><B></span></p>
</td>
</tr>
</tbody>
</table>
            <?php }?>
        </td>
          <TD rowspan=3 ><P style="margin-left:4px;margin-top:21px;margin-right:-45px;margin-bottom:20px;" class="p31 ft17">SITUATION</P></TD>
	
        	   <td rowspan="7" style="" >
            <?php if($numSem%2==0){?>
            <table style="border-collapse: collapse; border: none; margin-left: 4.8pt; margin-right: 4.8pt;">
<tbody>
<tr style="height: 13.5pt;">
<td style="width: 177.25pt; border: solid #E36C09 1.0pt; background: #F79546; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" colspan="3" width="236">
<p style="margin: 1.45pt 0cm .0001pt 9.1pt;"><span style="font-size: 8.0pt;">RESULTATS</span></p>
</td>
</tr>
<?php if($niveau=="1"){?>
<tr style="height: 13.5pt;">
<td style="width: 54.0pt; border: solid #E36C09 1.0pt; border-top: none; background: #DBEDF3; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" width="72">
<p style="margin: 1.45pt 0cm .0001pt 1.55pt;"><span style="font-size: 8.0pt;">Total ECTS L<?php echo $niveau; ?></span></p>
</td>
<td style="width: 40.25pt; border-top: none; border-left: none; border-bottom: solid #E36C09 1.0pt; border-right: solid #E36C09 1.0pt; background: #DBEDF3; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" width="164">
<p style="margin: .9pt 0cm .0001pt 12.0pt;"><span style="font-size: 9.0pt;"><?php echo $moyenne['ECTSL1']; ?></span></p>
</td>
<td style="width: 20.25pt; border-top: none; border-left: none; border-bottom: solid #E36C09 1.0pt; border-right: solid #E36C09 1.0pt; background: #DBEDF3; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" width="164">
<p style="margin: .9pt 0cm .0001pt 12.0pt;"><span style="font-size: 9.0pt;"><?php $reg=30;  if( $passage['regle']==2){$reg=39;} if( $passage['ects']>=$reg){ echo "V"; }else{ echo "NV";} ?></span></p>
</td>
</tr>
<tr style="height: 13.5pt;">
<td style="width: 54.0pt; border: solid #E36C09 1.0pt; border-top: none; background: #DBEDF3; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" width="72">
<p style="margin: 1.45pt 0cm .0001pt 1.55pt;"><span style="font-size: 8.0pt;">Moyenne L<?php echo $niveau; ?></span></p>
</td>
<td style="width: 40.25pt; border-top: none; border-left: none; border-bottom: solid #E36C09 1.0pt; border-right: solid #E36C09 1.0pt; background: #DBEDF3; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" width="164">
<p style="margin: .9pt 0cm .0001pt 12.0pt;"><span style="font-size: 9.0pt;"><?php echo $passage['MG']; ?></span></p>
</td>
<td style="width: 20.5pt; border-top: none; border-left: none; border-bottom: solid #E36C09 1.0pt; border-right: solid #E36C09 1.0pt; background: #DBEDF3; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" width="164">
<p style="margin: .9pt 0cm .0001pt 12.0pt;"><span style="font-size: 9.0pt;"><?php if( $passage['MG']>=10){ echo "V"; }else{ echo "NV";} ?></span></p>
</td>
</tr>
<?php }elseif($niveau=="2"){ ?>
<tr style="height: 13.5pt;">
<td style="width: 54.0pt; border: solid #E36C09 1.0pt; border-top: none; background: #DBEDF3; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" width="72">
<p style="margin: 1.45pt 0cm .0001pt 1.55pt;"><span style="font-size: 8.0pt;">Total ECTS L<?php  echo $niveau-1; ?></span></p>
</td>
<td style="width: 40.25pt; border-top: none; border-left: none; border-bottom: solid #E36C09 1.0pt; border-right: solid #E36C09 1.0pt; background: #DBEDF3; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" width="164">
<p style="margin: .9pt 0cm .0001pt 12.0pt;"><span style="font-size: 9.0pt;"><?php echo $moyenne['ECTSL1'] ?></span></p>
</td>
<td style="width: 20.25pt; border-top: none; border-left: none; border-bottom: solid #E36C09 1.0pt; border-right: solid #E36C09 1.0pt; background: #DBEDF3; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" width="164">
<p style="margin: .9pt 0cm .0001pt 12.0pt;"><span style="font-size: 9.0pt;"><?php  if( $moyenne['ECTSL1']>=60){ echo "V"; }else{ echo "NV";} ?></span></p>
</td>
</tr>
<tr style="height: 13.5pt;">
<td style="width: 54.0pt; border: solid #E36C09 1.0pt; border-top: none; background: #DBEDF3; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" width="72">
<p style="margin: 1.45pt 0cm .0001pt 1.55pt;"><span style="font-size: 8.0pt;">Moyenne L<?php  echo $niveau-1; ?></span></p>
</td>
<td style="width: 40.25pt; border-top: none; border-left: none; border-bottom: solid #E36C09 1.0pt; border-right: solid #E36C09 1.0pt; background: #DBEDF3; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" width="164">
<p style="margin: .9pt 0cm .0001pt 12.0pt;"><span style="font-size: 9.0pt;"><?php echo $moyenne['MGL1']/2 ?></span></p>
</td>
<td style="width: 20.5pt; border-top: none; border-left: none; border-bottom: solid #E36C09 1.0pt; border-right: solid #E36C09 1.0pt; background: #DBEDF3; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" width="164">
<p style="margin: .9pt 0cm .0001pt 12.0pt;"><span style="font-size: 9.0pt;"><?php if( $moyenne['MGL1']/2>=10){ echo "V"; }else{ echo "NV";} ?></span></p>
</td>
</tr>
<tr style="height: 13.5pt;">
<td style="width: 54.0pt; border: solid #E36C09 1.0pt; border-top: none; background: #DBEDF3; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" width="72">
<p style="margin: 1.45pt 0cm .0001pt 1.55pt;"><span style="font-size: 8.0pt;">Total ECTS L<?php  $info['niveau']=($numSem+1)/2;echo ''. substr($info['niveau'], 0,1)  ; ?></span></p>
</td>
<td style="width: 40.25pt; border-top: none; border-left: none; border-bottom: solid #E36C09 1.0pt; border-right: solid #E36C09 1.0pt; background: #DBEDF3; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" width="164">
<p style="margin: .9pt 0cm .0001pt 12.0pt;"><span style="font-size: 9.0pt;"><?php echo $moyenne['ECTSL2'] ?></span></p>
</td>
<td style="width: 20.25pt; border-top: none; border-left: none; border-bottom: solid #E36C09 1.0pt; border-right: solid #E36C09 1.0pt; background: #DBEDF3; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" width="164">
<p style="margin: .9pt 0cm .0001pt 12.0pt;"><span style="font-size: 9.0pt;"><?php  $reg=30; if($passage['regle']==2){$reg=39;}if( $moyenne['ECTSL2']>=$reg){ echo "V"; }else{ echo "NV";} ?></span></p>
</td>
</tr>
<tr style="height: 13.5pt;">
<td style="width: 54.0pt; border: solid #E36C09 1.0pt; border-top: none; background: #DBEDF3; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" width="72">
<p style="margin: 1.45pt 0cm .0001pt 1.55pt;"><span style="font-size: 8.0pt;">Moyenne L<?php  $info['niveau']=($numSem+1)/2;echo ''. substr($info['niveau'], 0,1)  ; ?></span></p>
</td>
<td style="width: 40.25pt; border-top: none; border-left: none; border-bottom: solid #E36C09 1.0pt; border-right: solid #E36C09 1.0pt; background: #DBEDF3; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" width="164">
<p style="margin: .9pt 0cm .0001pt 12.0pt;"><span style="font-size: 9.0pt;"><?php echo $passage['MG'] ?></span></p>
</td>
<td style="width: 20.5pt; border-top: none; border-left: none; border-bottom: solid #E36C09 1.0pt; border-right: solid #E36C09 1.0pt; background: #DBEDF3; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" width="164">
<p style="margin: .9pt 0cm .0001pt 12.0pt;"><span style="font-size: 9.0pt;"><?php if( $passage['MG']>=10){ echo "V"; }else{ echo "NV";} ?></span></p>
</td>
</tr>
<?php }elseif($niveau=="3"){ ?>
<tr style="height: 13.5pt;">
<td style="width: 54.0pt; border: solid #E36C09 1.0pt; border-top: none; background: #DBEDF3; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" width="72">
<p style="margin: 1.45pt 0cm .0001pt 1.55pt;"><span style="font-size: 8.0pt;">Total ECTS L1</span></p>
</td>
<td style="width: 40.25pt; border-top: none; border-left: none; border-bottom: solid #E36C09 1.0pt; border-right: solid #E36C09 1.0pt; background: #DBEDF3; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" width="164">
<p style="margin: .9pt 0cm .0001pt 12.0pt;"><span style="font-size: 9.0pt;"><?php echo $moyenne['ECTSL1'] ?></span></p>
</td>
<td style="width: 20.25pt; border-top: none; border-left: none; border-bottom: solid #E36C09 1.0pt; border-right: solid #E36C09 1.0pt; background: #DBEDF3; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" width="164">
<p style="margin: .9pt 0cm .0001pt 12.0pt;"><span style="font-size: 9.0pt;"><?php  if( $moyenne['ECTSL1']==60){ echo "V"; }else{ echo "NV";} ?></span></p>
</td>
</tr>
<tr style="height: 13.5pt;">
<td style="width: 54.0pt; border: solid #E36C09 1.0pt; border-top: none; background: #DBEDF3; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" width="72">
<p style="margin: 1.45pt 0cm .0001pt 1.55pt;"><span style="font-size: 8.0pt;">Moyenne L1</span></p>
</td>
<td style="width: 40.25pt; border-top: none; border-left: none; border-bottom: solid #E36C09 1.0pt; border-right: solid #E36C09 1.0pt; background: #DBEDF3; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" width="164">
<p style="margin: .9pt 0cm .0001pt 12.0pt;"><span style="font-size: 9.0pt;"><?php echo $moyenne['MGL1']/2 ?></span></p>
</td>
<td style="width: 20.5pt; border-top: none; border-left: none; border-bottom: solid #E36C09 1.0pt; border-right: solid #E36C09 1.0pt; background: #DBEDF3; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" width="164">
<p style="margin: .9pt 0cm .0001pt 12.0pt;"><span style="font-size: 9.0pt;"><?php if( $moyenne['MGL1']/2>=10){ echo "V"; }else{ echo "NV";} ?></span></p>
</td>
</tr>
<tr style="height: 13.5pt;">
<td style="width: 54.0pt; border: solid #E36C09 1.0pt; border-top: none; background: #DBEDF3; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" width="72">
<p style="margin: 1.45pt 0cm .0001pt 1.55pt;"><span style="font-size: 8.0pt;">Total ECTS L2</span></p>
</td>
<td style="width: 40.25pt; border-top: none; border-left: none; border-bottom: solid #E36C09 1.0pt; border-right: solid #E36C09 1.0pt; background: #DBEDF3; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" width="164">
<p style="margin: .9pt 0cm .0001pt 12.0pt;"><span style="font-size: 9.0pt;"><?php echo $moyenne['ECTSL2'] ?></span></p>
</td>
<td style="width: 20.25pt; border-top: none; border-left: none; border-bottom: solid #E36C09 1.0pt; border-right: solid #E36C09 1.0pt; background: #DBEDF3; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" width="164">
<p style="margin: .9pt 0cm .0001pt 12.0pt;"><span style="font-size: 9.0pt;"><?php  if( $moyenne['ECTSL2']==60){ echo "V"; }else{ echo "NV";} ?></span></p>
</td>
</tr>
<tr style="height: 13.5pt;">
<td style="width: 54.0pt; border: solid #E36C09 1.0pt; border-top: none; background: #DBEDF3; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" width="72">
<p style="margin: 1.45pt 0cm .0001pt 1.55pt;"><span style="font-size: 8.0pt;">Moyenne L2</span></p>
</td>
<td style="width: 40.25pt; border-top: none; border-left: none; border-bottom: solid #E36C09 1.0pt; border-right: solid #E36C09 1.0pt; background: #DBEDF3; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" width="164">
<p style="margin: .9pt 0cm .0001pt 12.0pt;"><span style="font-size: 9.0pt;"><?php echo $moyenne['MGL2']/2 ?></span></p>
</td>
<td style="width: 20.5pt; border-top: none; border-left: none; border-bottom: solid #E36C09 1.0pt; border-right: solid #E36C09 1.0pt; background: #DBEDF3; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" width="164">
<p style="margin: .9pt 0cm .0001pt 12.0pt;"><span style="font-size: 9.0pt;"><?php if( $moyenne['MGL2']/2>=10){ echo "V"; }else{ echo "NV";} ?></span></p>
</td>
</tr>
<td style="width: 54.0pt; border: solid #E36C09 1.0pt; border-top: none; background: #DBEDF3; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" width="72">
<p style="margin: 1.45pt 0cm .0001pt 1.55pt;"><span style="font-size: 8.0pt;">Total ECTS L3</span></p>
</td>
<td style="width: 40.25pt; border-top: none; border-left: none; border-bottom: solid #E36C09 1.0pt; border-right: solid #E36C09 1.0pt; background: #DBEDF3; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" width="164">
<p style="margin: .9pt 0cm .0001pt 12.0pt;"><span style="font-size: 9.0pt;"><?php echo $moyenne['ECTSL3'] ?></span></p>
</td>
<td style="width: 20.25pt; border-top: none; border-left: none; border-bottom: solid #E36C09 1.0pt; border-right: solid #E36C09 1.0pt; background: #DBEDF3; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" width="164">
<p style="margin: .9pt 0cm .0001pt 12.0pt;"><span style="font-size: 9.0pt;"><?php  if( $moyenne['ECTSL3']==60){ echo "V"; }else{ echo "NV";} ?></span></p>
</td>
</tr>
<tr style="height: 13.5pt;">
<td style="width: 54.0pt; border: solid #E36C09 1.0pt; border-top: none; background: #DBEDF3; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" width="72">
<p style="margin: 1.45pt 0cm .0001pt 1.55pt;"><span style="font-size: 8.0pt;">Moyenne L3</span></p>
</td>
<td style="width: 40.25pt; border-top: none; border-left: none; border-bottom: solid #E36C09 1.0pt; border-right: solid #E36C09 1.0pt; background: #DBEDF3; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" width="164">
<p style="margin: .9pt 0cm .0001pt 12.0pt;"><span style="font-size: 9.0pt;"><?php echo $passage['MG'] ?></span></p>
</td>
<td style="width: 20.5pt; border-top: none; border-left: none; border-bottom: solid #E36C09 1.0pt; border-right: solid #E36C09 1.0pt; background: #DBEDF3; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" width="164">
<p style="margin: .9pt 0cm .0001pt 12.0pt;"><span style="font-size: 9.0pt;"><?php if( $passage['MG']>=10){ echo "V"; }else{ echo "NV";} ?></span></p>
</td>
</tr>
<?php }?>
<tr style="height: 13.5pt;">
<td style="width: 54.0pt; border: solid #E36C09 1.0pt; border-top: none; background: #DBEDF3; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" width="72">
<p style="margin: 1.45pt 0cm .0001pt 1.55pt;"><span style="font-size: 8.0pt;">Decision :</span></p>
</td>
<td colspan="2" style="width: 40.25pt; border-top: none; border-left: none; border-bottom: solid #E36C09 1.0pt; border-right: solid #E36C09 1.0pt; background: #DBEDF3; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" width="164">
    <p style="margin-top: 5PX;"><span style="font-size: 7.0pt; font-family: 'Times New Roman','serif';"><B><?php if($passage['niveau']>$niveau){echo "PASSAGE à ".$niveau+1;}else{echo"REDOUBLEMEENT";}?></b></span></p>
</td>

</tr>
</tbody>
</table>
            <?php }?>
        </td>
      
</TR>
<TR>
	
	<TD ><P class="p0 ft19">&nbsp;</P></TD>
</TR>
<TR>
     
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
    
    <DIV style="margin-top:5px" id="id_4_2">
        <table><tr><td valign="top" width="150px" >
<P class="p33 ft12">P/O DIRECTEUR</P>
<P class="p33 ft12">CHEF SERVICE SCOLARITE</P>
                </td></tr>
            <tr>
                <td height="100px">
                    
                </td>
            </tr>
        <tr>
                <td height="">
                    <span style="font-size: 8.0pt;">   FAIT A NOUAKCHOTT, LE <?php echo date('d/m/Y');?></span>
                </td>
            </tr></table>
</DIV>
</DIV>
<table style="margin-left: 40.5pt; border-collapse: collapse; border: none;">
<tbody>
<tr style="height: 13.5pt;">
<td style="width: 53.15pt; border: solid #E36C09 1.0pt; background: #F79546; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" width="71">
<p style="margin: 3.35pt 0cm .0001pt 1.3pt;"><span style="font-size: 6.0pt;">ACRONYMES</span></p>
</td>
<td style="width: 475.55pt; border: solid #E36C09 1.0pt; border-left: none; padding: 0cm 0cm 0cm 0cm; height: 13.5pt;" width="634">
<p style="margin: 2.85pt 0cm .0001pt 8.85pt;"><span style="font-size: 6.0pt;">ECTS : EUROPEEN CREDIT TRENSFERT SYSTEM, DS : DEVOIRS SURVEILLE, PRJ : PROJET, TP : TRAVAUX PRATIQUES, EXP : EXPOSE</span></p>
</td>
</tr>
</tbody>
</table>
<DIV id="id_5">
<TABLE cellpadding=0 cellspacing=0 class="t5">
<TR>
	<TD class="tr2 td134"><P class="p0 ft17">BULLETIN DE NOTES DE :</P></TD>
	<TD class="tr2 td135"><P class="p0 ft20"><?php echo $info['nom'].' '. $info['prenom'] ;?></P></TD>
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
<DIV id="id_6">
<P class="p33 ft7">© TOUS DROITS RESERVES ABRA SCO 2016</P>
</DIV>
</DIV>
</BODY>
</HTML>
          
               

     </div> <!-- end of right content-->
   </div>
</div>   <!--end of center content -->  
<!--end of main content-->
<button  onClick="imprimer('printable');" ><b> Imprimer l'attestation </b></button>
  

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

;?>