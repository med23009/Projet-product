<?php include('include/header.php');?>
    
    <div class="container bg-white " >          
         
            <!-- <div class="jumbotron bg-light text-center">
            </div> -->

            <div class="row">
                <div class="col"></div>
                <div class="col mr-auto mt-5">
                    <div class="card shadow bg-light text-center " style="font-size: 16px" >
         <!--<div class="choix_profil_form mx-auto">-->
            <br/><br/>   
         <?php 
       
      
         echo heading('  Se connecter en tant que: ','2');
         ?>
            <!--<div class="text-center mx-auto navbar-form  p-4 text-center pull-right " style="font-size: 16px">-->
          <table align="center" class="text-center float-center"  >
            <?php
            
        function ordonnancement($profil1, $profil2)
        {
            if($profil1 == 'Administrateur' || $profil1 == 'administrateur')
                return false;
            if($profil2 == 'Administrateur' || $profil2 == 'administrateur')
                return true;
            if($profil1 == 'Service de scolarité'  || $profil1 == 'scolarite')
                return false;
            if($profil2 == 'Service de scolarité'  || $profil2 == 'scolarite')
                return true;
            if($profil1 == 'Chef de département'  || $profil1 == 'chef_departement')
                return false;
            if($profil2 == 'Chef de département' || $profil2 == 'chef_departement')
                return true;
            if($profil1 == 'Enseignant' || $profil1 == 'professeur')
                return false;
            if($profil2 == 'Enseignant' || $profil2 == 'professeur')
                return true;
             if($profil1 == 'Secrétaire' || $profil1 == 'secretaire')
                return false;
            if($profil2 == 'Secrétaire' || $profil2 == 'secretaire')
                return true;
              if($profil1 == 'agent' || $profil1 == 'Agent')
                return false;
            if($profil2 == 'agent' || $profil2 == 'Agent')
                return true;
            if($profil1 == 'directeur_etudes' || $profil1 == 'Directeur des etudes')
                return false; echo "false";
            if($profil2 == 'directeur_etudes' || $profil2 == 'Directeur des etudes')
                return true;
                 
        }
        
  
        if(is_array($idProfil))
        usort($profil, "ordonnancement");
        usort($idProfil, "ordonnancement");
         for($i=0;$i<count($idProfil);$i++)
         {  
             echo "<tr><td><div style='height:50px; width:250px ' >";
             $title = '<strong>'.$profil[$i].'</strong>';
           
             $attributes = 'class="bt_green_profil"';
            echo anchor($idProfil[$i].'/index', $title, $attributes)."</div></td></tr>";
          
         }
      ?>
            </table>
                    <!--</div>-->
     </div>
                </div>
                <div class="col"></div>
            </div>
    </div>

 <?php       include('include/footer.php');?>