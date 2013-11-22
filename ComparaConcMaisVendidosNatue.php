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
                
              <th><img src="http://2.bp.blogspot.com/-EcMRFSNtY1s/UYk21ivkEkI/AAAAAAAAGEk/ziX_ZJ7iPxA/s1600/natue_logo_blogs_transpbg+%25283%2529.png" alt="Natue" height="35" width="80" /> Posição </th>
              <th>Nome Produto</th>
            </tr>
            </thead>
            <tbody>
            <?php maisvendidosnatue(); ?>
            </tbody>
</table>

</body>
</html>
            