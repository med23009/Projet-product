<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
 <div class="container">
    <div class="col-xs-12 hl-left">

<?php echo heading('Choisissez le semestre de désactivation, soit le <br>
		dernier semestre pendant lequel ce module sera enseigné.','3');          
				echo form_open('scolarite/desactiver_module_valide');
	echo form_hidden('sigle',$sigle);
		  ?>

        <table>
            <tr>
               <th>Année</th>
			   <th></th>
               <th>Semestre</th>
                    
            </tr>
            <tr>
			 <td>
                    <select  name="annee">
                                
                            <option value="2011">2011</option>    
                            <option value="2012">2012</option>
                            <option value="2013">2013</option>
                            <option value="2014">2014</option>
                            <option value="2015">2015</option>
                            <option value="2016">2016</option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>
                            <option value="2027">2027</option>
                            <option value="2028">2028</option>
                            <option value="2029">2029</option>
                            <option value="2030">2030</option>
                            </select> 
                    </td>
                    <td>
                <?php
                
               
                   /*
     * fonction pour convertir le code du semestre par son nom 
     * elle prend en paramètre le numéro du semestre soit(1,2,3)
     * et elle retourne le nom (Automne, été, printemps)
     */
    function get_session_nom($numeroSemestre)
    {
		if($numeroSemestre == 3)
        {
            return 'Automne';
        }
        elseif($numeroSemestre == 2)
        {
            return 'Été';
        }
        else
        {
            return 'Printemps';
        }
    }
                ?>
                </td>
                <td>
                    <select  name="session" id="">
                        <?php 
						  echo '<option value="'.$courante['semestre'][0].'">'.get_session_nom($courante['semestre'][0]).'</option>';
						 if($courante['semestre'][0] == '1')
                         {
							echo '<option value="3">Automne</option>
                              <option value="2">Été</option>';
                         }
                         elseif($courante['semestre'][0] == '2')
                         {
						 echo '<option value="3">Automne</option>
                            <option value="1">Printemps</option>';
                         }
                        else 
                        {
                            echo '<option value="1">Printemps</option>
                            <option value="2">Été</option>';
                        }                            
                        ?>
                    </select>
                </td>
                
            </tr>
            <tr style="height: 20px;"></tr>
            <tr>
                 <td class="submit">
                 <?php $pw = array('type' => 'submit', 'name' => 'submit', 'id'=>'submit', 'value'=>'Désactiver');
                 echo form_input($pw);?>
                 </td>
            </tr>
         </table>
        <?php echo form_close('</div>');?>
           </div>
           <div class="clear"></div>
    </div> <!--end of main content-->

    <?php
  include(APPPATH.'views/include/footer.php');?>