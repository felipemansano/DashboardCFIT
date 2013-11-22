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
                
              <th><img src="http://assets.bodybuilding.com/common/images/skins/rawberry/logo.png" alt="BodyBuilding.com" height="35" width="80" /></th>
              <th>Nome Produto</th>
            </tr>
            </thead>
            <tbody>
            <?php maisvendidosbodyb(); ?>
          </tbody>
        </table>
