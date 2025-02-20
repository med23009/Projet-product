<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
   
 <div class="container">
    <div class="col-xs-12 hl-left">            
        
   <h2>Rediger les notes Classe: mine Groupe:01</h2> 
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
                             <select name="" id="classeNom" width="50">
                            <option value="">mine</option>
                            <option value="">mecatronique</option>
                            </select>
                         </td>
                         <td>
                              <select name="" id="classeNom">
                            <option value="">01</option>
                            <option value="">02</option>
                            </select>
                         </td>
                         <td id="submit"><input type="submit" name="submit" id="submit" value="Valider" /></td>
                     </tr>
                         
       
                 </tbody>
             </table>
             
    <div class="clear"><hr /></div>
    
                  <table id="rounded-corner" summary="classe B01">
    <thead>
    	<tr>
            <th scope="col" class="rounded">Nom</th>
            <th scope="col" class="rounded">Matricule</th>
            <th scope="col" class="rounded">Note</th>
            <th scope="col" class="rounded">Cote</th>
        </tr>
    </thead>
        <tfoot>
    	<tr>
        	<td colspan="6" class="rounded-foot-left"><em>Les notes ne seront pas valide que apres la validation.</em></td>

        </tr>
    </tfoot>
    <tbody>
    	<tr>
            <td>Etudiant 1</td>
            <td>1413231</td>
            <td><input type="text" name="" id="" size="" value="13"/></td>
            <td><input type="text" name="" id="" size="" value="B"/></td>

        </tr>
        
    	<tr>
            <td>Etudiant 1</td>
            <td>4553453423</td>
           <td><input type="text" name="" id="" size="" value="13"/></td>
            <td><input type="text" name="" id="" size="" value="B"/></td>

        </tr> 
        
    	<tr>
            <td>Etudiant 1</td>
            <td>234234324</td>
            <td><input type="text" name="" id="" size="" value="13"/></td>
            <td><input type="text" name="" id="" size="" value="B"/></td>

        </tr>
        
    	<tr>
        	
            <td>Etudiant 1</td>
            <td>23432423</td>
            <td><input type="text" name="" id="" size="" value="13"/></td>
            <td><input type="text" name="" id="" size="" value="B"/></td>
        </tr>  
    	<tr>
        	
            <td>Etudiant 1</td>
            <td>23432423</td>
            <td><input type="text" name="" id="" size="" value="13"/></td>
            <td><input type="text" name="" id="" size="" value="B"/></td>
        </tr>
        
    	<tr>
        	
            <td>Etudiant 1</td>
            <td>23432423</td>
            <td><input type="text" name="" id="" size="" value="13"/></td>
            <td><input type="text" name="" disabled="true" id="" size="" value="B"/></td>

            
        </tr>    
        
    </tbody>
</table>
            
                 <dl class="submit">
                     <dt> <?php $pw = array('type' => 'submit', 'name' => 'submit', 'id'=>'submit', 'value'=>'Valider'); 
                             echo form_input($pw);?>
                     </dt>
                     <dt>
                        <?php $pw = array('type' => 'submit', 'name' => 'submit', 'id'=>'submit', 'value'=>'Generer Cote'); 
                             echo form_input($pw);?>
                     </dt>
                     
              </dl>
             
                
         </form>
         </div>  
      
     
     </div><!-- end of right content-->
            
                    
  </div>   <!--end of center content -->               
                    
                    
    
    
    <div class="clear"></div>
    </div> <!--end of main content-->
	
    
  <?php include(APPPATH.'views/include/footer.php');?>