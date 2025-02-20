<?php
$this->config->set_item('language', 'french');
$this->lang->load('menusLabels', $this->config->item('french'));
$owner = $this->lang->line('main_software_developer');
$version = $this->lang->line('main_software_version');
 ?>﻿  
    <div class="footer_login">
    
    	<div class="left_footer_login"></div>
        <div class="right_footer_login"><?=$owner?>
        </br>
            <span style="padding-left:40px;"><?=$version?></span></div>
    
    </div>

</div>		
</body>
</html>