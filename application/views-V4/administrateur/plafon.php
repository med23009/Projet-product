<?php
include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
<html>
 <head>
  <!-- Font Awesome -->
  <script language="javascript" type="text/javascript" src="<?php echo base_url();?>js/jquery.dataTables.min.js"></script>
 <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url();?>css/jquery.dataTables.min.css" />
  </head>
  <style>

.ergebnis {
    font-size: 2rem;
    font-family: sans-serif;
    padding: 2rem 0 2rem 2rem;
    color: white;
}

.toggle {
    margin:0 0 0 2rem;
    position: relative;
    display: inline-block;
    width: 5.8rem;
    height: 3rem;
}

.toggle input {
    display: none;
}

.roundbutton {
    position: absolute;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    width: 100%;
    background-color: #ccc;
    display: block;
    transition: all 0.3s;
    border-radius: 3.4rem;
    cursor: pointer;
}

.roundbutton:before {
    position: absolute;
    content: "";
    height: 2.1rem;
    width: 2.2rem;
    border-radius: 100%;
    display: block;
    left: 0.5rem;
    bottom: 0.5rem;
    background-color: white;
    transition: all 0.3s;
}

input:checked + .roundbutton {
    background-color: #2196f3;
}

input:checked + .roundbutton:before  {
    transform: translate(2.6rem, 0);
}


#btn2{
    background-color:green;
    right: 30%;
    
  
}
.btn2{
    right: 30%;  
}
</style>
</head>
<body>
 





<div class="container">
          <div class="col-xs-12 hl-left">
    
              <form>
                  
              <h4>Activé/Désactivé Plafon</h4> 
<label class="toggle">
  <input id="toggleswitch" type="checkbox" checked>
  <span class="roundbutton"></span>
</label>
              </form><br>
              
              
          <div id="table"> 
                
              <div> <button id="add" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1">
            Ajouter Plafon
          </button> </div><br>
              <table class="table table-bordered"  id="table1" > <thead > <tr><th>ID</th>
     <th>Note</th>
     <th>Encours</th>
     <th>Annee Activation</th>
     <th>Année Désactivation</th>
     </tr>
                  <?php 
                 
                  $i=0;
                   while(isset($plafon[$i])){
                  echo"

</thead><tbody><form  method=post  id=form1> 
    <tr><th>".$plafon[$i]['id']."</th>
              
  <th>".$plafon[$i]['note']."</th>
              
           <th>
               <input type='radio'  ".$plafon[$i]['encours'] ."> 
           </th>
           
           <th>".$plafon[$i]['annee_activation'] ."</th>
           <th>".$plafon[$i]['annee_desactivation'] ."</th>
    </tr><tbody>" ; $i++;} ?>
    </table>
                   <button id="btn2" class="btn btn-primary">Activé Plafon</button> </form>
          </div>
              
              
              
            <!-- Modal -->
          <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Ajouter</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <!-- Add Records Form -->
                  <form action="" method="post" id="form1">
                  
                    <div class="form-group">
                      <label for="">Note</label>
                      <input type="number"  class="form-control" name="debut">
                    </div>
                   
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                  <button type="submit" class="btn btn-primary" >Ajouter</button> </form>
                </div>
              </div>
            </div>
          </div>
        </div>
               <!-- fin modal -->    
          </div>
     </div>
       
<?php

?>
    <script>
     var input = document.getElementById('toggleswitch');
    var outputtext = document.getElementById('status');

    input.addEventListener('change',function(){
        if(this.checked) {
            //outputtext.innerHTML = "aktiv";
              $('#table').show();
        } else {
            //outputtext.innerHTML = "inaktiv";
            $('#table').hide();
        }
    });
    </script>
 </body>
 </html>
 
 
 
 
 
 
 
 
 
 
 