<div class="main_content">  
    <div class="menu">
        <ul>

            <li>
                <a href="#">Étudiant</a>
                <ul>
                    <li><?php echo anchor('secretaire/selection_semestre/etudiant', 'Consulter Notes') ?></li>
                    <li><?php echo anchor('secretaire/trouver_etudiant_a_consulter', 'Consulter Informations personnelles'); ?></li>
                </ul>
            </li> 
            <li>
                <a href="#">Module</a>
                <ul>
                    <li><?php echo anchor('secretaire/consulter_horaire_cours', 'Consulter Horaire'); ?></li>
                    <li><?php echo anchor('secretaire/selection_semestre/classe', 'Consulter Notes') ?></li>
                </ul>
            </li>
            
             <li>
                <a href="#">Absences</a>
                <ul>
                     <li><?php echo anchor('secretaire/entrer_absences', 'Entrer Absences'); ?></li>
                    <li><?php echo anchor('secretaire/choix_session_absence_consultation', 'Consulter Absences') ?></li>
                </ul>
            </li>
           
            
            <li>
                <a href ="#">Paramètres de compte</a>
                <ul>
                    <li><?php echo anchor('secretaire/mot_de_passe', 'Modifier Mot de passe'); ?></li>
                </ul>
            </li>

        </ul>
    </div> 