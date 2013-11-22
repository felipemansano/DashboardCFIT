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
                
              <th><img src="http://www.saudeja.com.br/skin/frontend/default/drugstore/images/logo.gif" alt="SaudeJa" height="25" width="80" /> Posição </th>
              <th>Nome Produto</th>
            </tr>
            </thead>
            <tbody>
            <?php maisvendidossaudeemagr(); ?>
            </tbody>
</table>

</body>
</html>
