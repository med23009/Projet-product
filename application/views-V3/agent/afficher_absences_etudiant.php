<?php include(APPPATH.'views/include/header.php');
    include('include/menu.php');?>
<div class="container">
    <div class="col-xs-12 hl-left">
         <?php echo heading($titre,'3');
           $attributes = array('class' => '');
          
                echo form_open('scolarite/generer_rapport',$attributes);
                echo '<table class="form" id="tableProf">';

           echo form_hidden('infoAbsences', $infoAbsences);
     /*
     * fonction pour convertir le code du semestre par son nom 
     * elle prend en parametre le numero du semestre soit(1,2,3)
     * et elle retourne le nom (Automne,ete,printemps)
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
       
    /*
     * fonction pour changer le groupe plus court enlever groupe et mettre juste les deux lettres
     * significatif pour le type du groupe
     */
	function abreger_nom_groupe($nomGroupe)
    {
        $nomAbrege = '';
        if (strpos($nomGroupe, "01-Groupe") > 0) $nomAbrege = str_replace('01-Groupe', '-P', $nomGroupe);	// P = Printemps
			else
				if (strpos($nomGroupe, "02-Groupe") > 0) $nomAbrege = str_replace('02-Groupe', '-E', $nomGroupe);	// E = Été
			else 
				$nomAbrege = str_replace('03-Groupe', '-A', $nomGroupe);	// A = Automne
		$nomAbrege = str_replace('Theorie', 'Thr', $nomAbrege);
        $nomAbrege = str_replace('Projet', 'Prj', $nomAbrege);
        $nomAbrege = str_replace('Stage', 'Stg', $nomAbrege);
        return $nomAbrege;
    }
	
	   ?>
        <div style ="height: 50px;"></div>
        <table id="rounded-corner" summary="cycle">
            <thead>
                <tr>
                    <th></th>
                    <?php
                    $groupe = array_unique($infoAbsences['idGroupe']);// groupe qui contient des variables de tous les groupes mais distinct
                    for($i=0 ;$i<count($infoAbsences['idGroupe']) ;$i++)
                    {
                        if(isset($groupe[$i]))
                        {          
                            echo '<th id="col" class="rounded">'.abreger_nom_groupe($groupe[$i]).'</th>';
                        }
                    }
                     echo '<th id="col" class="rounded">Total</th>';
                    ?>
                </tr>
            </thead>
            <tbody id="listeClasse">
                <?php                        
            
                for($i=0 ; $i<count($infoAbsences['date']) ; $i++)
                {
                    echo '<tr><td>'.$infoAbsences['date'][$i].'  '.$infoAbsences['periode'][$i].'</td>';
                    $sum = 0;
                    for($j=0 ; $j <count($infoAbsences['idGroupe']) ;$j++)
                    {
                        if(isset($groupe[$j]))
                        {
                            if($groupe[$j] == $infoAbsences['idGroupe'][$i])
                            {
                               echo '<td>'.$infoAbsences['duree'][$i].'</td>';
                               $sum += $infoAbsences['duree'][$i];
                            }
                            else 
                            {
                                echo '<td></td>';
                            }
                        }
                    }
                   
                    echo '<td>'.$sum.'</td>';
                    echo '</tr>';
                    
                }
                ?>
                        
            </tbody>

            <tr style="height: 20px;"></tr>
            </table>
        <table>
            <tr>
                 <td class="submit">
                 <?php $pw = array('type' => 'submit', 'name' => 'submit', 'id'=>'submit', 'value'=>'Générer Rapport Excel');
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


