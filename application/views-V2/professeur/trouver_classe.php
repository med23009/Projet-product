<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
   
   <div class="container">
    <div class="col-xs-12 hl-left">          
        
   <h2>Trouver classe</h2> 
         <div class="form">
         <form action="" method="post" class="niceform">
             <table id="classeNom">
                 <tbody>
                     <tr>
                         <td>Nom de Classe</td>
                         <td>Nom de Groupe</td>
                         <td></td>
                     </tr>
                     <tr>
                         <td>
                             <select size="1" name="" id="classeNom" width="50">
                            <option value="">mine</option>
                            <option value="">mecatronique</option>
                            </select>
                         </td>
                         <td>
                              <select size="1" name="" id="classeNom">
                            <option value="">01</option>
                            <option value="">02</option>
                            </select>
                         </td>
                         <td id="submit"><input type="submit" name="submit" id="submit" value="Valider" /></td>
                     </tr>
                         
       
                 </tbody>
             </table>
             
                
         </form>
         </div>  
      
     
     </div><!-- end of right content-->
            
                    
  </div>   <!--end of center content -->               
                    
                    
    
    
    <div class="clear"></div>
    </div> <!--end of main content-->
	
    
  <?php include(APPPATH.'views/include/footer.php');?>