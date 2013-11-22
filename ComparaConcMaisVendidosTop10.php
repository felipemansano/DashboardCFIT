<?php

//inclusao do arquivo com funções (inclusive conexao ao banco)
include ('header.php');
include_once ('config/config.php'); 
logado();

include ('HeaderSubComparaConc.php');

?>

<table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th><img src="http://assets.bodybuilding.com/common/images/skins/rawberry/logo.png" alt="BodyBuilding.com" height="35" width="80" /></th>
              <th><img src="http://2.bp.blogspot.com/-EcMRFSNtY1s/UYk21ivkEkI/AAAAAAAAGEk/ziX_ZJ7iPxA/s1600/natue_logo_blogs_transpbg+%25283%2529.png" alt="Natue" height="35" width="80" /></th>
              <th><img src="http://www.saudeja.com.br/skin/frontend/default/drugstore/images/logo.gif" alt="SaudeJa" height="25" width="80" /> Emagr. </th>  
              <th><img src="http://www.saudeja.com.br/skin/frontend/default/drugstore/images/logo.gif" alt="SaudeJa" height="25" width="80" /> Supl. </th>
              
            </tr>
            </thead>
            <tbody>
            <?php maisvendidostop(10); ?>
            </tbody>
</table>

</body>
</html>
