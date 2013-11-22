<!DOCTYPE html>
<?php

//inclusao do arquivo com funções (inclusive conexao ao banco)
include ('header.php');
include_once ('config/config.php'); 
logado();

conecta();
$res=mysql_query("SELECT * FROM inputurl ORDER BY id;");



include ('HeaderSubComparaConc.php');

?>

        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>Nome Produto</th>
              <th>Marca</th>
              <th>Curva ABC</th>
              <th><img src="https://www.centralfit.com.br/skin/frontend/fortis/default/images/logo.png" alt="CentralFit | Suplementos Alimentares Profissionais" height="25" width="100" /></th>
              <th><img src="http://www.corpoperfeito.com.br/img/icons/LogoCorpoPerfeito.jpg" alt="Corpo Perfeito" height="30" width="100" /></th>
              <th><img src="http://2.bp.blogspot.com/-EcMRFSNtY1s/UYk21ivkEkI/AAAAAAAAGEk/ziX_ZJ7iPxA/s1600/natue_logo_blogs_transpbg+%25283%2529.png" alt="Natue" height="35" width="80" /></th>
              <th><img src="http://www.saudeja.com.br/skin/frontend/default/drugstore/images/logo.gif" alt="SaudeJa" height="30" width="90" /></th>
            </tr> 
            <?php
            while($input=mysql_fetch_assoc($res)){
                echo "<tr>";
                echo "<td>";
                echo $input['id'];
                echo "</td>";
                echo "<td>";
                echo $input['Nome'];
                echo "</td>";
                echo "<td>";
                echo $input['Marca'];
                echo "</td>";
                echo "<td>";
                echo "To come";
                echo "</td>";
                echo "<td>";
                precocentralfit($input['URLcfit']);
                echo "</td>";
                echo "<td>";
                precocorpoperfeito($input['URLcorpo'], $input['Numprodcorpo']);
                echo "</td>";
                echo "<td>";
                preconatue($input['URLnatue']);
                echo "</td>";
                echo "<td>";
                precosaude($input['URLsaude']);
                echo "</td>";
            }
            
            
            ?>
            
              