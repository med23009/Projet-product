<head>
 <script type="text/javascript">
 
   if (window.history && window.history.pushState) {
 
    window.history.pushState('forward', null, './#forward');
 
    $(window).on('popstate', function() {
      alert('Back button was pressed.');
    });
   }</script>


     
</head>
 
<body onbeforeunload="return confirmExit()">
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo base_url();?>css/fullcalendar.css" rel="stylesheet"  media="all" />
<link href="<?php echo base_url();?>css/fullcalendar.print.css" rel="stylesheet" media="print"   media="all" />
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>js/moment.min.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>js/fullcalendar.js"></script>
<?php // echo base_url();?>
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>js/script.js"></script>

<script language="javascript" type="text/javascript" src="<?php echo base_url();?>/js/niceforms.js"></script>

<script language="javascript" type="text/javascript" src="<?php echo base_url();?>js/bootstrap.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>js/util.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>js/tablefilter.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>js/jquery-1.11.1.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>js/ui/jquery.ui.core.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>js/ui/jquery.ui.widget.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>js/ui/jquery.ui.datepicker.js"></script>

<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url();?>css/niceforms-default.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url();?>css/filtergrid.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url();?>css/ui-lightness/jquery-ui-1.8.11.custom.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url();?>css/base/jquery.ui.datepicker.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url();?>css/base/jquery.ui.all.css" />

  <script src="<?php echo base_url();?>js/npm.js"></script>
 <link rel="stylesheet" href="<?php echo base_url();?>css/style.css" />
<link rel="stylesheet" href="<?php echo base_url();?>css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>css/style.css" />
  <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
</head>
<body>
<script language="JavaScript">
$(function(){
    /*
     * this swallows backspace keys on any non-input element.
     * stops backspace -> back
     */
    var rx = /INPUT|SELECT|TEXTAREA/i;

    $(document).bind("keydown keypress", function(e){
        if( e.which == 8 ){ // 8 == backspace
            if(!rx.test(e.target.tagName) || e.target.disabled || e.target.readOnly ){
                e.preventDefault();
            }
        }
    });
});
</script>
<?php 
//Debut Cheikh 13/08/

    $adress = $this->lang->line('main_instituteAdresse');
    $application_name = $this->lang->line('main_application_name');
    $welcome = $this->lang->line('main_welcome');
?>

    <script> 

    /* Change the numbers to adjust your resize ratio */
function reSize() {
    var n = $("body").width() / 15;
	$("h1").css('fontSize', n + "pt");
	$("h3").css('fontSize', (n/20) * 4.2 + "pt");
	}
$(window).on("resize", reSize);
$(document).ready(reSize);

(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o), m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');  ga('create', 'UA-70761127-6', 'auto');  ga('send', 'pageview');
</script>
<!--   <div style="height: 40px;"></div>
   <div id="titreMauritanie"><?php echo $adress?></div>
    <div style="height: 20px;"></div>
    <div id="titreSysteme"><?php echo $application_name?></div>-->
<nav class="navbar navbar-default">
    <div class="container-fluid">
        
        <div id="navbar" class="navbar-collapse collapse">
           
          
                        <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-tr"></span>
                           <!--    <select class="form-control" onchange="javascript:window.location.href='<?php echo base_url(); ?>scolarite/switchLang/'+this.value;">
   
                               <option value="french" <?php if($this->session->userdata('site_lang') == 'french') echo 'selected="selected"'; ?>>French</option>
                               <option value="arabic" <?php if($this->session->userdata('site_lang') == 'arabic') echo 'selected="selected"'; ?>>Arabic</option>  
                               <option value="english" <?php if($this->session->userdata('site_lang') == 'english') echo 'selected="selected"'; ?>>English</option>
                         </select-->
               
                </li>

        </div>
    </div>
</nav>
<!----------Parametres generaux------------>



<script type="text/javascript" >
    var nom ;
    //$(document).ready(function(){
    $.ajax({
            url: '<?php echo base_url(); ?>index.php/scolarite/getParametresGenerauxCourants',
            type: 'POST',
            dataType: 'json',
            data: {
               ajax:true,
               async: false,
               //and any other variables you want to pass via POST
                   },
            success: function ( data) {
                  var longueur=data.length;
                if(longueur>0){
                    $('#nom_etablissement').html(data[0].nom);
                
            var logo_src="<?php echo base_url();?>images/"+data[0].logo;
         
    $('#logo_etablissement').attr({"src":logo_src});
                }   
            },
            error: function ( xhr, ajaxOptions, thrownError ) {
                alert(xhr.status);
                console.log(thrownError);
                alert(thrownError);
                alert("erreur ");
        }
        });
       //});
       
</script>

    	<div class="container-fluid">
			<div class="row zsx">
				<div class="col-lg-12 animated lightSpeedIn">
                          <p class="vcenter" style="background: white">
                            <div style='width:100%; height:150' id="somediv" class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                   <img height="150" src="<?php echo base_url();?>images/HEADER_LAUREAT.png" />
                                <!--img width="100%" height="150" src="<?php echo base_url();?>images/HEADER.png" /--> 
                                </div>
                                <div style="padding-top: 25px;" class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <div  class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                        <img  id="logo_etablissement" style='max-width:135px; max-height:135;' src="<?php echo base_url();?>images/trans.png" />
                                    </div>
                                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8" >
                                        <p id="nom_etablissement" style="color: #e26c26;display: inline;font-weight: bold;font-size: 230%;text-transform: uppercase;"></p>
                                    </div>
                                    
                                </div>
                            </div>
			 
		     </p>
				</div>
			</div>
		</div>
