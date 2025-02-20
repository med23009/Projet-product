<?php 
include(APPPATH.'views/include/header.php');
include('include/menu.php');
//font-family: "Geeza Pro", "Nadeem", "Al Bayan", "DecoType Naskh", "DejaVu Serif", 
//"STFangsong", "STHeiti", "STKaiti", "STSong", "AB AlBayan", "AB Geeza", "AB Kufi",
// "DecoType Naskh", "Aldhabi", "Andalus", "Sakkal Majalla", "Simplified Arabic", 
// "Traditional Arabic", "Arabic Typesetting", "Urdu Typesetting", "Droid Naskh", 
// "Droid Kufi", "Roboto", "Tahoma", "Times New Roman", "Arial", serif;
?>

        
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/earlyaccess/droidarabickufi.css">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/earlyaccess/droidarabicnaskh.css">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/earlyaccess/amiri.css">
    <link rel="stylesheet" type="text/css" href="(http://fonts.googleapis.com/earlyaccess/lateef.css">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/earlyaccess/scheherazade.css">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/earlyaccess/thabit.css">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/earlyaccess/amiri.css">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/earlyaccess/amiri.css">
    <link rel="stylesheet" type="text/css" href="//www.fontstatic.com/f=shahd-bold" />
    <link rel="stylesheet" type="text/css" href="//www.fontstatic.com/f=rawy-bold" />
    <link rel="stylesheet" type="text/css" href="//www.fontstatic.com/f=rawy-bold,alhurra" />
    <link rel="stylesheet" type="text/css" href="//www.fontstatic.com/f=rawy-bold,alhurra,thuluth-decorated" />
     <link rel="stylesheet" type="text/css" href="//www.fontstatic.com/f=elmessiri" />
    <link rel="stylesheet" type="text/css" href="//www.fontstatic.com/f=elmessiri,fantezy" />
    <link rel="stylesheet" type="text/css" href="//www.fontstatic.com/f=sheba" />
  <link rel="stylesheet" type="text/css" href="//www.fontstatic.com/f=shahd-bold" />  
<link rel="stylesheet" type="text/css" href="//www.fontstatic.com/f=sheba,sukar-black,shahd-bold" />
<link rel="stylesheet" type="text/css" href="//www.fontstatic.com/f=sheba,sukar-black,shahd-bold,elmessiri-bold" />
<link rel="stylesheet" type="text/css" href="//www.fontstatic.com/f=shahd-bold,vip-hakm-bold" />
<link rel="stylesheet" type="text/css" href="//www.fontstatic.com/f=shahd-bold,vip-hakm-bold,zahra-bold" />
<link rel="stylesheet" type="text/css" href="//www.fontstatic.com/f=thuluth-decorated" media="print"/>
<link rel="stylesheet" type="text/css" href="//www.fontstatic.com/f=decotype-thuluth" />
<link rel="stylesheet" type="text/css" href="//www.fontstatic.com/f=arwa" />
<link rel="stylesheet" type="text/css" href="//www.fontstatic.com/f=maghrebi" />
</head>
    
<button  onClick="imprimer('printable');" ><b> Imprimer l'attestation </b></button>
<div class="container">
    <div class="col-xs-12 hl-left">
 
       <div id="printable">
<style>
  
<!-- 
select {font-size:12px;}
A:link {text-decoration: none; color: blue}
A:visited {text-decoration: none; color: purple}
A:active {text-decoration: red}
A:hover {text-decoration: underline; color:red}
-->
</style>
<!--
<script TYPE="text/javascript"> 
<!-- hide 
function killerrors()
{ 
return true; 
} 
window.onerror = killerrors; 
// --> 
</script>
<style type="text/css">
<!--

.ft0{font-style:normal;font-weight:normal;font-size:15px;font-family:Calibri;color:#000000;}
.ft1{font-style:normal;font-weight:normal;font-size:9px;font-family:Times New Roman;color:#000000;}
.ft2{font-style:italic;font-weight:normal;font-size:9px;font-family:Arial;color:#000000;}
.ft3{font-style:normal;font-weight:normal;font-size:12px;font-family:Times New Roman;color:#000000;}
.ft4{font-style:normal;font-weight:normal;font-size:12px;font-family:Sakkal Majalla;color:#000000;}
.ft5{font-style:normal;font-weight:normal;font-size:1px;font-family:Calibri;color:#000000;}
.ft6{font-style:normal;font-weight:normal;font-size:9px;font-family:Calibri;color:#000000;}
.ft7{font-style:normal;font-weight:normal;font-size:12px;font-family:Calibri;color:#000000;}
.ft8{font-style:normal;font-weight:bold;font-size:25px;font-family:Times New Roman;color:#000000;}
.ft9{font-style:normal;font-weight:bold;font-size:17.5px;font-family:Times New Roman;color:#000000;}
.ft10{font-style:italic;font-weight:normal;font-size:18px;font-family:Franklin Gothic Heavy;color:#000000;}
.ft11{font-style:normal;font-weight:normal;font-size:16px;font-family:Times New Roman;color:#000000;}
.ft12{font-style:normal;font-weight:normal;font-size:19px;font-family:Times New Roman;color:#000000;}
.ft13{font-style:normal;font-weight:bold;font-size:19px;font-family:Times New Roman;color:#000000;}
.ft14{font-style:normal;font-weight:bold;font-size:14px;font-family:Times New Roman;color:#000000;}
.ft15{font-style:normal;font-weight:normal;font-size:15px;font-family:Arial;color:#000000;}
.ft16{font-style:normal;font-weight:normal;font-size:15px;font-family:Times New Roman;color:#f2f2f2;}
.ft17{font-style:normal;font-weight:normal;font-size:4px;font-family:Times New Roman;color:#000000;}
.ft18{font-style:normal;font-weight:normal;font-size:1px;font-family:Times New Roman;color:#000000;}
.ft19{font-style:normal;font-weight:bold;font-size:1px;font-family:Arial;color:#000000;}
.ft20{font-style:normal;font-weight:bold;font-size:15px;font-family:Arial;color:#000000;}
.ft21{font-style:normal;font-weight:normal;font-size:5px;font-family:Times New Roman;color:#000000;}
.ft221{font-style:normal;font-weight:bold;font-size:20px;font-family:shahd-bold;color:#000000;}
.ft222{font-style:normal;font-weight:bold;font-size:20px;font-family:rawy-bold;color:#000000;}
.ft22{font-style:normal;font-weight:bold;font-size:18px;font-family:Sakkal Majalla;color:#000000;}
.ft23{font-style:normal;font-weight:normal;font-size:18px;font-family:Times New Roman;color:#bfbfbf;}
.ft2i{font-style:normal;font-size:20px;
font-family: 'arabswell_1';color:#000000;}
.ft2p{font-style:normal;font-size:13px;
font-family: 'arial';color:#000000;}
.ft24{font-style:normal;font-weight:normal;font-size:1px;font-family:Sakkal Majalla;color:#000000;}
.ft25{font-style:normal;font-weight:normal;font-size:15px;font-family:Times New Roman;color:#bfbfbf;}
.ft26{font-style:normal;font-weight:bold;font-size:21px;font-family:Sakkal Majalla;color:#000000;}
.ft26j{font-style:normal;font-weight:bold;font-size:20px;font-family:Sakkal Majalla;color:#000000;}
.ft2e{font-style:normal;font-weight:bold;font-size:26px;font-family:Sakkal Majalla;color:#000000;}
.ft2_{font-style:normal;font-weight:bold;font-size:20px;font-family:Sakkal Majalla;color:#000000;}

.ft2f{font-style:normal;font-weight:normal;font-size:18px;font-family:Sakkal Majalla;color:#000000;}
.ft2g{font-style:normal;font-weight:bold;font-size:23px;font-family:Sakkal Majalla;color:#000000;}
.ft2h{font-style:normal;font-weight:bold;font-size:18px;font-family:Sakkal Majalla;color:#000000;}
.ft27{font-style:normal;font-weight:normal;font-size:15px;font-family:Sakkal Majalla;color:#000000;}
.ft28{font-style:normal;font-weight:bold;font-size:19px;font-family:Sakkal Majalla;color:#000000;}
.ft29{font-style:normal;font-weight:bold;font-size:19px;font-family:Sakkal Majalla;color:#ffffff;}
.ft30{font-style:normal;font-weight:normal;font-size:14px;font-family:Arial;color:#000000;}
.ft31{font-style:normal;font-weight:normal;font-size:14px;font-family:Franklin Gothic Heavy;color:#000000;}
.ft32{font-style:normal;font-weight:normal;font-size:11px;font-family:Times New Roman;color:#000000;}
.ft33{font-style:normal;font-weight:normal;font-size:3px;font-family:Times New Roman;color:#000000;}
.ft34{font-style:normal;font-weight:normal;font-size:39px;font-family:Times New Roman;color:#e36c0a;}
.ft35{font-style:normal;font-weight:bold;font-size:28px;font-family:Arial;color:#e36c0a;}
.ft36{font-style:normal;font-weight:bold;font-size:22px;font-family:Arial;color:#e36c0a;}
.ft37{font-style:italic;font-weight:bold;font-size:29px;font-family:Arial;color:#e36c0a;}
.ft38{font-style:normal;font-weight:bold;font-size:28px;font-family:Arial;color:#000000;}
-->
</style>

<!--
<script TYPE="text/javascript">
var currentpos,timer; 
function initialize() 
{ 
timer=setInterval("scrollwindow()",10);
} 
function sc(){
clearInterval(timer); 
}
function scrollwindow() 
{ 
currentpos=document.body.scrollTop; 
window.scroll(0,++currentpos); 
if (currentpos != document.body.scrollTop) 
sc();
} 
document.onmousedown=sc
document.ondblclick=initialize
</script>
 -->
<table>
 <?php 
 for ($i = 0; $i < count($diplome); ++$i) { 
     ?>     

<div style="position:absolute;top:0;left:0"><img width="1170" height="820" src="<?php echo base_url();?>images/im1.png" ALT=""></div>
<div style="position:absolute;top:51;left:79"><span class="ft0"> </span></div>

<div style="position:absolute;top:45;left:79"><span class="ft8">République Islamique de Mauritanie</span></div>
<div style="position:absolute;top:75;left:79"><span class="ft9">Ministère de l'Enseignement Supérieur et de la Recherche Scientifique</span></div>
<div style="position:absolute;top:65;left:424"><span class="ft8"> </span></div>
<div style="position:absolute;top:96;left:79"><span class="ft9">Université des Sciences, de Technologie et de Médecine</span></div>
<div style="position:absolute;top:96;left:501"><span class="ft9"> </span></div>
<div style="position:absolute;top:116;left:79"><span class="ft10">Institut Universitaire Professionnel</span></div>
<div style="position:absolute;top:116;left:375"><span class="ft10"> </span></div>
<div style="position:absolute;top:69;left:601"><span class="ft11">  </span></div>
<div style="position:absolute;top:45;left:845"><span class="ft2e">الجمهورية الإسلامية الموريتانية</span></div>
<div style="position:absolute;top:70;left:868"><span class="ft26"> وزارة التعليم العالي والبحث العلمي</span></div>
<div style="position:absolute;top:90;left:868"><span size="1" class="ft26">جامعة العلوم والتكنولوجيا والطب</span></div>
<div style="position:absolute;top:105;left:945"><span class="ft2g">المعهد الجامعي المهني</span></div>
<div style="position:absolute;top:168;left:390"><span class="ft15"> Année Universitaire</span></div>
<div style="position:absolute;top:168;left:523"><span class="ft15"> </span></div>
<div style="position:absolute;top:168;left:525"><span class="ft15">:</span></div>
<div style="position:absolute;top:168;left:532"><span class="ft14"> </span></div>
<div style="position:absolute;top:168;left:575"><span class="ft16"><font color="fff"><?php echo $diplome[$i]->Ann_UnivF; ?></font></span></div>
<div style="position:absolute;top:168;left:604"><span class="ft14"> </span></div>
<div style="position:absolute;top:168;left:612"><span class="ft14">/ </span></div>
<div style="position:absolute;top:168;left:616"><span class="ft16"><font color="fff"><?php echo $diplome[$i]->Ann_UnivD; ?></font></span></div>
<div style="position:absolute;top:168;left:685"><span class="ft14"> </span></div>
<div style="position:absolute;top:170;left:693"><span class="ft14"> السنة الجامعية</span></div>
<div style="position:absolute;top:170;left:685"><span class="ft14">:</span></div>
<div style="position:absolute;top:174;left:761"><span class="ft14">  </span></div>
<div style="position:absolute;top:190;left:438"><span class="ft15">N</span></div>
<div style="position:absolute;top:190;left:449"><span class="ft15">°</span></div>
<div style="position:absolute;top:198;left:455"><span class="ft15"> </span></div>
<div style="position:absolute;top:190;left:460"><span class="ft15">du Diplôme</span></div>
<div style="position:absolute;top:198;left:537"><span class="ft15"> </span></div>
<div style="position:absolute;top:190;left:541"><span class="ft15">:</span></div>
<div style="position:absolute;top:198;left:545"><span class="ft15">  </span></div>
<div style="position:absolute;top:198;left:554"><span class="ft14"> </span></div>
<div style="position:absolute;top:192;left:570"><span class="ft16">_________</span></div>
<div style="position:absolute;top:192;left:570"><span class="ft16"><font color="fff"><?php echo $diplome[$i]->No_Dip; ?></font></span></div>
<div style="position:absolute;top:198;left:611"><span class="ft16"></span></div>
<div style="position:absolute;top:198;left:619"><span class="ft16"></span></div>
<div style="position:absolute;top:198;left:645"><span class="ft16">  </span></div>
<div style="position:absolute;top:198;left:641"><span class="ft16"> </span></div>
<div style="position:absolute;top:198;left:649"><span class="ft14">  </span></div>
  <div style="position:absolute;top:202;left:272">       <img style="width: 90px; height: 88px;" src="<?php
        
        echo "../../photos/IUP". $diplome[$i]->No_Dip.'.bmp'; 
   
        ?> "onerror="this.src='../../photos/default.gif';"/></div>
<div style="position:absolute;top:193;left:658"><span class="ft14">  رقم الشهادة</span></div>
<div style="position:absolute;top:193;left:650"><span class="ft14">:</span></div>
<div style="position:absolute;top:198;left:712"><span class="ft14">  </span></div>
<div style="position:absolute;top:220;left:900"><span class="ft14"> </span></div>
<div style="position:absolute;top:220;left:477"><span class="ft14">  </span></div>
<div style="position:absolute;top:254;left:79"><span class="ft14"> </span></div>
<div style="position:absolute;top:254;left:355"><span class="ft14">  </span></div>
<div style="position:absolute;top:289;left:79"><span class="ft17"> </span></div>
<div style="position:absolute;top:306;left:79"><span class="ft17"> </span></div>
<div style="position:absolute;top:309;left:266"><span class="ft18">  </span></div>
<div style="position:absolute;top:328;left:79"><span class="ft19"> </span></div>
<div style="position:absolute;top:328;left:79"><span class="ft19"></span></div>
<div style="position:absolute;top:315;left:79"><span class="ft20">Vu la loi </span></div>
<div style="position:absolute;top:315;left:141"><span class="ft20">N°</span></div>
<div style="position:absolute;top:315;left:158"><span class="ft20"> </span></div>
<div style="position:absolute;top:315;left:163"><span class="ft20">043</span></div>
<div style="position:absolute;top:315;left:188"><span class="ft20"> </span></div>
<div style="position:absolute;top:315;left:193"><span class="ft20">-</span></div>
<div style="position:absolute;top:315;left:198"><span class="ft20"> </span></div>
<div style="position:absolute;top:315;left:202"><span class="ft20">2010 du 21 Juillet 2010</span></div>
<div style="position:absolute;top:315;left:367"><span class="ft20"> </span></div>
<div style="position:absolute;top:315;left:795"><span class="ft2h"> بمقتضى القانون رقم  043-2010 بتاريخ 21 يوليو 2010</span></div>

<div style="position:absolute;top:318;left:739"><span class="ft14"> </span></div>
<div style="position:absolute;top:335;left:79"><span class="ft20">Vu l</span></div>
<div style="position:absolute;top:335;left:107"><span class="ft20">e décret </span></div>
<div style="position:absolute;top:335;left:170"><span class="ft20">N</span></div>
<div style="position:absolute;top:335;left:181"><span class="ft20">°</span></div>
<div style="position:absolute;top:335;left:187"><span class="ft20"> </span></div>
<div style="position:absolute;top:335;left:191"><span class="ft20">201</span></div>
<div style="position:absolute;top:335;left:217"><span class="ft20">6 </span></div>
<div style="position:absolute;top:335;left:230"><span class="ft20">-</span></div>
<div style="position:absolute;top:335;left:"><span class="ft20"> </span></div>
<div style="position:absolute;top:335;left:239"><span class="ft20">04</span></div>
<div style="position:absolute;top:335;left:256"><span class="ft20">4</span></div>
<div style="position:absolute;top:335;left:264"><span class="ft20"> </span></div>
<div style="position:absolute;top:335;left:269"><span class="ft20">du 21 </span></div>
<div style="position:absolute;top:335;left:313"><span class="ft20">Mars</span></div>
<div style="position:absolute;top:335;left:348"><span class="ft20"> </span></div>
<div style="position:absolute;top:335;left:353"><span class="ft20">201</span></div>
<div style="position:absolute;top:335;left:378"><span class="ft20">6</span></div>
<div style="position:absolute;top:335;left:386"><span class="ft20"> </span></div>
<div style="position:absolute;top:335;left:793"><span class="ft2h">بمقتضى المرسوم  رقم 2016-044 بتاريخ 21 مارس 2016</span></div>
<div style="position:absolute;top:343;left:741"><span class="ft14"> </span></div>
<div style="position:absolute;top:354;left:79"><span class="ft20">Vu les procès-verbaux des jurys de délibérations</span></div>
<div style="position:absolute;top:358;left:178"><span class="ft20"></span></div>
<div style="position:absolute;top:354;left:183"><span class="ft20"></span></div>
<div style="position:absolute;top:358;left:434"><span class="ft20"> </span></div>
<div style="position:absolute;top:350;left:905"><span class="ft2h"> بمقتضى محاضر لجان المداولات</span></div>
<div style="position:absolute;top:363;left:874"><span class="ft14"> </span></div>
<div style="position:absolute;top:384;left:79"><span class="ft21"> </span></div>
<div style="position:absolute;top:384;left:418"><span class="ft21">  </span></div>
<div style="position:absolute;top:404;left:79"><span class="ft22">Il est délivré à :</span></div>
 <?php
//echo mb_substr_count("Ceci est un test", " "); // affiche 2
//for($i = 0; $i < count($$diplome[$i]->Nom_Prenom_fr); ++$i) {
//echo $i;
//}
$nom = $diplome[$i]->Nom_Prenom_fr;
$space = " ";
$lastPos = 0;
$positions = 0;

while (($lastPos = strpos($nom, $space, $lastPos))!== false and ($lastPos<22)) {
    $positions = $lastPos;
    $lastPos = $lastPos + strlen($space);
}

// Displays 3 and 10
    echo $positions ."<br />";
  echo  substr($nom, 0,$positions)."58";
  echo  substr($nom,$positions);
?> 

<div style="position:absolute;top:404;left:200"><span class="ft23"> ___________________________________________</span></div>
<div style="position:absolute;top:404;left:245"><span class="ft23"> </span></div>
<div style="position:absolute;top:404;right:220"><span class="ft23">__________________________________</span></div>
<div style="position:absolute;top:396;right:220"><span class="ft2i">      

  <?php echo  $diplome[$i]->Nom_Prenom_ar; ?></span></div>

<div style="position:absolute;top:403;left:538"><span class="ft23"> </span></div>
<div style="position:absolute;top:402;right:98"><span class="ft22">تمّ منح السيد</span></div>
<div style="position:absolute;top:402;right:169"><span class="ft22">: (ة)</span></div>
<div style="position:absolute;top:402;left:894"><span class="ft22"> </span></div>

<?php //if(strlen($nom)>22){ 
    //echo"<div style='position:absolute;top:430;left:254'><span class='ft2p'>".substr($nom,$positions)." </span></div>";
   /// echo"<div style='position:absolute;top:406;left:254'><span class='ft2p'>". substr($nom, 0,$positions)."</span></div>";
    
//}else{
    echo"<div style='position:absolute;top:408;left:200'><span class='ft2p'>".$nom." </span></div>";
//}
?><!--
<div style="position:absolute;top:426;left:82"><span class="ft23">_________________________________________________</span></div>
<div style="position:absolute;top:426;left:73"><span class="ft23"> </span></div>
<div style="position:absolute;top:426;left:546"><span class="ft23"> __________________________________________________</span></div>
<div style="position:absolute;top:426;left:542"><span class="ft23"> </span></div>447-->
<div style="position:absolute;top:426;left:79"><span class="ft22">Né(e) le</span></div>
<div style="position:absolute;top:426;left:137"><span class="ft22"> </span></div>
<div style="position:absolute;top:426;left:142"><span class="ft22">:</span></div>
<div style="position:absolute;top:426;left:147"><span class="ft22"> </span></div>
<div style="position:absolute;top:430;left:200"><span class="ft2p">  <?php echo $diplome[$i]->Date_Naiss; ?></span></div>
<div style="position:absolute;top:426;left:200"><span class="ft23"> ________</span></div>
<div style="position:absolute;top:426;left:344"><span class="ft23"> </span></div>
<div style="position:absolute;top:426;left:300"><span class="ft22"> à :</span></div>
<div style="position:absolute;top:426;left:380"><span class="ft22"> </span></div>
<div style="position:absolute;top:426;left:330"><span class="ft23"> __________________________</span></div>
<div style="position:absolute;top:430;left:330"><span class="ft2p"> <?php echo $diplome[$i]->Lieu_Naiss_fr; ?></span></div>
<div style="position:absolute;top:426;left:398"><span class="ft23"> </span></div>
<div style="position:absolute;top:426;right:340"><span class="ft23"> _______________________</span></div>
<div style="position:absolute;top:416;right:340"><span class="ft2i"> <?php echo $diplome[$i]->Lieu_Naiss_ar; ?></span></div></span></div>
<!--469-->
<div style="position:absolute;top:447;left:534"><span class="ft23"> </span></div>
<div style="position:absolute;top:424;right:300"><span class="ft22"> في</span></div>
<div style="position:absolute;top:424;right:315"><span class="ft22">:</span></div>
<div style="position:absolute;top:445;left:663"><span class="ft22"> </span></div>
<div style="position:absolute;top:430;right:220"><span  class="ft2p"> <?php echo $diplome[$i]->Date_Naiss; ?></span></div>
<div style="position:absolute;top:427;right:220"><span class="ft23"> ________</span></div>
<div style="position:absolute;top:446;left:709"><span class="ft23"> </span></div>
<div style="position:absolute;top:424;right:98"><span class="ft22"> المولود</span></div>
<div style="position:absolute;top:424;right:132"><span class="ft22">)</span></div>
<div style="position:absolute;top:424;right:137"><span class="ft22">ة</span></div>
<div style="position:absolute;top:424;right:142"><span class="ft22">(</span></div>
<div style="position:absolute;top:424;right:150"><span class="ft22"> بتاريخ</span></div>
<div style="position:absolute;top:424;right:185"><span class="ft22">:</span></div>
<div style="position:absolute;top:447;left:79"><span class="ft22">Inscrit(e) sous le </span></div>
<div style="position:absolute;top:447;left:182"><span class="ft22">N°</span></div>
<div style="position:absolute;top:447;left:200"><span class="ft22"> :</span></div>
<div style="position:absolute;top:469;left:233"><span class="ft22"> </span></div>
<div style="position:absolute;top:448;left:528"><span class="ft2p"> <?php echo $diplome[$i]->No_Insc; ?></span></div>
<div style="position:absolute;top:447;left:390"><span class="ft23"> ____________________________________</span></div>
<div style="position:absolute;top:469;left:687"><span class="ft23"> </span></div>
<div style="position:absolute;top:445;right:98"><span class="ft22">المسجل</span></div>
<div style="position:absolute;top:445;right:138"><span class="ft22">)</span></div>
<div style="position:absolute;top:445;right:143"><span class="ft22">ة</span></div>
<div style="position:absolute;top:445;right:148"><span class="ft22">(</span></div>
<div style="position:absolute;top:445;right:158"><span class="ft22"> تحت الرقم</span></div>
<div style="position:absolute;top:445;right:218"><span class="ft22">:</span></div>
<div style="position:absolute;top:468;left:839"><span class="ft22"> </span></div>
<div style="position:absolute;top:492;left:79"><span class="ft22">Domaine</span></div>
<div style="position:absolute;top:492;left:183"><span class="ft22"> </span></div>
<div style="position:absolute;top:492;left:138"><span class="ft22">:</span></div>
<div style="position:absolute;top:492;left:193"><span class="ft22"> </span></div>
<div style="position:absolute;top:469;left:362"><span class="ft9"> Licence</span></div>
<div style="position:absolute;top:492;left:421"><span class="ft9"> </span></div>
<div style="position:absolute;top:492;left:425"><span class="ft9"> </span></div>
<div style="position:absolute;top:469;left:430"><span class="ft9">Appliquée</span></div>
<div style="position:absolute;top:492;left:510"><span class="ft9"> </span></div>
<div style="position:absolute;top:469;left:625"><span class="ft22">  الليصانص  المطبقة</span></div>
<div style="position:absolute;top:490;left:556"><span class="ft22"> </span></div>
<div style="position:absolute;top:469;right:98"><span class="ft22"> شهادة</span></div>
<div style="position:absolute;top:469;right:140"><span class="ft22">:</span></div>
<div style="position:absolute;top:469;left:79"><span class="ft22">Le diplôme de</span></div>
<div style="position:absolute;top:514;left:149"><span class="ft22"> </span></div>
<div style="position:absolute;top:469;left:165"><span class="ft22">:</span></div>
<div style="position:absolute;top:514;left:159"><span class="ft22"> </span></div>
<div style="position:absolute;top:492;left:200"><span class="ft23"> ________________________________________</span></div>
<div style="position:absolute;top:497;left:200"><span class="ft2p"> <?php echo $diplome[$i]->domaine_fr; ?></span></div>

<div style="position:absolute;top:505;left:516"><span class="ft23"> </span></div>
<div style="position:absolute;top:492;right:220"><span class="ft23"> ____________________________________</span></div>
<div style="position:absolute;top:484;right:220"><span class="ft2i"> <?php echo $diplome[$i]->domaine_ar; ?></span></div>

<div style="position:absolute;top:514;left:837"><span class="ft23"> </span></div>
<div style="position:absolute;top:490;right:98"><span class="ft22"> المجال</span></div>
<div style="position:absolute;top:490;right:143"><span class="ft22">:</span></div>
<div style="position:absolute;top:512;left:933"><span class="ft22"> </span></div>
<div style="position:absolute;top:515;left:79"><span class="ft22">Mention</span></div>
<div style="position:absolute;top:537;left:198"><span class="ft22"> </span></div>
<div style="position:absolute;top:515;left:138"><span class="ft22">:</span></div>
<div style="position:absolute;top:537;left:208"><span class="ft22"> </span></div>
<div style="position:absolute;top:515;left:200"><span class="ft23"> ________________________________________</span></div>
<div style="position:absolute;top:520;left:200"><span class="ft2p"> <?php echo $diplome[$i]->mention_fr1; ?></span></div>

<div style="position:absolute;top:537;left:516"><span class="ft23"> </span></div>
<div style="position:absolute;top:515;right:220"><span class="ft23"> ___________________________________</span></div>
<div style="position:absolute;top:506;right:220"><span class="ft2i"> <?php echo $diplome[$i]->mention_ar1; ?></span></div>

<div style="position:absolute;top:537;left:837"><span class="ft23"> </span></div>
<div style="position:absolute;top:560;right:98"><span class="ft22">  بتقدير</span></div>
<div style="position:absolute;top:560;right:140"><span class="ft22">:</span></div>
<div style="position:absolute;top:560;left:79"><span class="ft22">Avec la mention</span></div>
<div style="position:absolute;top:537;left:198"><span class="ft22"> </span></div>
<div style="position:absolute;top:560;left:180"><span class="ft22">:</span></div>
<div style="position:absolute;top:537;left:208"><span class="ft22"> </span></div>
<div style="position:absolute;top:560;left:200"><span class="ft23"> ________________________________________</span></div>
<div style="position:absolute;top:565;left:200"><span class="ft2p"> <?php echo $diplome[$i]->Mention_fr; ?></span></div>

<div style="position:absolute;top:537;left:516"><span class="ft23"> </span></div>
<div style="position:absolute;top:560;right:220"><span class="ft23"> ___________________________________</span></div>
<div style="position:absolute;top:552;right:220"><span class="ft2i"> <?php echo $diplome[$i]->Mention_ar; ?></span></div>

<div style="position:absolute;top:537;left:837"><span class="ft23"> </span></div>
<div style="position:absolute;top:538;right:98"><span class="ft22">  الإختصاص</span></div>
<div style="position:absolute;top:538;right:160"><span class="ft22">:</span></div>
<div style="position:absolute;top:538;left:79"><span class="ft22">Spécialité</span></div>
<div style="position:absolute;top:537;left:198"><span class="ft22"> </span></div>
<div style="position:absolute;top:538;left:140"><span class="ft22">:</span></div>
<div style="position:absolute;top:537;left:208"><span class="ft22"> </span></div>
<div style="position:absolute;top:538;left:200"><span class="ft23"> ________________________________________</span></div>
<div style="position:absolute;top:543;left:200"><span class="ft2p"> <?php echo $diplome[$i]->option_fr; ?></span></div>

<div style="position:absolute;top:537;left:516"><span class="ft23"> </span></div>
<div style="position:absolute;top:538;right:220"><span class="ft23"> ___________________________________</span></div>
<div style="position:absolute;top:530;right:220"><span class="ft2i"> <?php echo $diplome[$i]->option_ar; ?></span></div>

<div style="position:absolute;top:537;left:837"><span class="ft23"> </span></div>
<div style="position:absolute;top:515;right:98"><span class="ft22">  تخصص</span></div>
<div style="position:absolute;top:515;right:150"><span class="ft22">:</span></div>
<div style="position:absolute;top:538;left:937"><span class="ft14"> </span></div>
<div style="position:absolute;top:561;left:79"><span class="ft24"> </span></div>
<div style="position:absolute;top:583;left:298"><span class="ft14"> Fait à Nouakchott, le </span></div>
<div style="position:absolute;top:579;left:430"><span class="ft14"> </span></div>
<div style="position:absolute;top:583;left:495"><span class="ft25"> _________________</span></div>
<div style="position:absolute;top:582;left:520"><span class="ft11"> <?php echo date('d/m/Y');?></span></div>
<div style="position:absolute;top:579;left:625"><span class="ft25"> </span></div>
<div style="position:absolute;top:576;left:806"><span class="ft26">  </span></div>
<div style="position:absolute;top:576;left:806"><span class="ft26"></span></div>
<div style="position:absolute;top:579;left:695"><span class="ft26"> حُرِّر في نواكشوط بتاريخ</span></div>
<div style="position:absolute;top:579;left:688"><span class="ft26">:</span></div>
<div style="position:absolute;top:576;left:688"><span class="ft26"></span></div>
<div style="position:absolute;top:576;left:829"><span class="ft27">  </span></div>
<div style="position:absolute;top:600;left:575"><span class="ft24"> </span></div>
<div style="position:absolute;top:601;left:433"><span class="ft28"></span></div>
<div style="position:absolute;top:601;left:300"><span class="ft2_"> رئيس جامعة العلوم والتكنولوجيا والطب</span></div>
<div style="position:absolute;top:601;left:299"><span class="ft28"> .</span></div>

<div style="position:absolute;top:601;left:750"><span class="ft28"> مدير المعهد الجامعي المهني</span></div>

<div style="position:absolute;top:628;left:159"><span class="ft30">Le Président de l’Université des Sciences, de Technologie et de Médecine</span></div>
<div style="position:absolute;top:628;left:616"><span class="ft30"> </span></div>
<div style="position:absolute;top:628;left:662"><span class="ft30"> Le Directeur de l’Institut Universitaire Professionnel</span></div>
<div style="position:absolute;top:628;left:977"><span class="ft30"> </span></div>
<div style="position:absolute;top:644;left:388"><span class="ft26j"> أحمدو</span></div>
<div style="position:absolute;top:644;left:355"><span class="ft26j">حوبّه</span></div>
<div style="position:absolute;top:645;left:418"><span class="ft26">  </span></div>
<div style="position:absolute;top:666;left:328"><span class="ft31">Ahmedou H</span></div>
<div style="position:absolute;top:666;left:403"><span class="ft31">AOUBA</span></div>
<div style="position:absolute;top:666;left:448"><span class="ft31"> </span></div>
<div style="position:absolute;top:644;left:762"><span class="ft26j"> الشيخ أحمد اعْلِ أحمد</span></div>
<div style="position:absolute;top:645;left:877"><span class="ft26"> </span></div>
<div style="position:absolute;top:666;left:737"><span class="ft31"><b>Cheikh </b></span></div>
<div style="position:absolute;top:666;left:786"><span class="ft31"><b>Ahmed ELY AHMED</b></span></div>
<div style="position:absolute;top:666;left:902"><span class="ft31"> </span></div>
<div style="position:absolute;top:677;left:79"><span class="ft32"> </span></div>
<div style="position:absolute;top:684;left:389"><span class="ft17">  </span></div>
<div style="position:absolute;top:703;left:79"><span class="ft32"> </span></div>
<div style="position:absolute;top:732;left:79"><span class="ft33"> </span></div>
<div style="position:absolute;top:145;left:726"><span class="ft0">  </span></div>
<div style="position:absolute;top:36;left:1083"><span class="ft0">  </span></div>
<div style="position:absolute;top:267;left:788"><span class="ft37"> </span></div>
<div style="position:absolute;top:318;left:375"><span class="ft38"> </span></div>

      <div style="position:absolute;top:802;left:348"><span class="ft1"> N.B</span></div>
<div style="position:absolute;top:795;left:364"><span class="ft1"> </span></div>
<div style="position:absolute;top:802;left:366"><span class="ft2">: Ce diplôme n’est délivré qu’une seule fois.</span></div>
<div style="position:absolute;top:752;left:555"><span class="ft3">  </span></div>
<div style="position:absolute;top:798;left:550"><span class="ft4">  تنبيه: لاتستلم هذه الشهادة إلا مرة واحدة</span></div>
<div style="position:absolute;top:758;left:568"><span class="ft4"> </span></div>
<div style="position:absolute;top:778;left:79"><span class="ft5"> </span></div>
<div style="position:absolute;top:218;left:272"><span class="ft6">  </span></div>
<div style="position:absolute;top:245;left:308"><span class="ft7">  </span></div> 
       

        </div> <!-- end of right content-->
   </div>
</div>   <!--end of center content -->  
<!--end of main content-->
  <?php } ?>

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

