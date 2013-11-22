<!DOCTYPE html>
<?php

//inclusao do arquivo com funções (inclusive conexao ao banco)
include ('header.php');
include_once ('config/config.php'); 
logado();

conecta();

$diaatual=strtotime(date("Ymd"));

$diaatual=date('Ymd',$diaatual);

$res1=  mysql_query("SELECT DISTINCT datapag FROM inputnotas WHERE datapag>='$diaatual' ORDER BY datapag ASC;");
$resnome=mysql_query("SELECT DISTINCT nome, grupo FROM inputnotas ORDER BY nome ASC;");


?>



        <br>
        <ul class="nav nav-tabs">
        <li class="active"><a href="APagar.php">Tela Resumo</a></li>
        <li><a href="APagarLancamento.php">Lançamento de Nota/Provisão</a></li>
        <li><a href="APagarAlteracao.php">Alteração/Exclusão de Nota/Provisão</a></li>
        </ul>
        <br>
        
       <?php 
       
        $hoje=strtotime(date("Ymd"));
        $dia1=strtotime("+1 day", $hoje);
        $dia2=strtotime("+7 day", $hoje);
        $dia3=strtotime("+8 day", $hoje);
        $dia4=strtotime("+14 day", $hoje);
        $dia5=strtotime("+15 day", $hoje);
        $dia6=strtotime("+21 day", $hoje);
        $dia1=date('d/m/Y',$dia1);
        $dia2=date('d/m/Y',$dia2);
        $dia3=date('d/m/Y',$dia3);
        $dia4=date('d/m/Y',$dia4);
        $dia5=date('d/m/Y',$dia5);
        $dia6=date('d/m/Y',$dia6);
    
       
       
       echo "<br>";
       echo '<div class="centralizartext">';
       echo "<strong> A pagar próximos 7 dias (de ".$dia1." a ".$dia2.") = R$ ".semana1()."</strong>";
       echo "<br>";
       echo "<strong> A pagar semana seguinte (de ".$dia3." a ".$dia4.") = R$ ".semana2()."</strong>";
       echo "<br>";
       echo "<strong> A pagar semana subsequente (de ".$dia5." a ".$dia6.") = R$ ".semana3()."</strong>";
       echo '</div>';
       ?>
       
        <br>
        <br>
        <br>
        <br>
        <br>
       
        <!-- COMENTADO PQ ESSA PARTE DO CODIGO AINDA NAO ESTA FUNCIONANDO 
        <div class="row">
           
          <div class="col-lg-3"> 
             <div class="input-group">
                <span class="input-group-addon">Fornecedor</span>
                <input type="text" class="form-control" placeholder="Nome Fornecedor">
            </div>
          </div>
     
      
     
          <div class="col-lg-3">
                <div class="input-group">
                <span class="input-group-addon">Grupo de despesa</span>
                <input type="text" class="form-control" placeholder="Grupo de Despesa">
                </div>
          </div>
         
          <div class="col-lg-3">
               <div class="input-group">
               <span class="input-group-addon">Data Inicial</span>
               <input type="text" class="form-control" placeholder="DD/MM/AAAA">
               </div>
          </div>
           
           <div class="col-lg-3">
               <div class="input-group">
               <span class="input-group-addon">Data Final</span>
               <input type="text" class="form-control" placeholder="DD/MM/AAAA">
               </div>
          </div>
           
    </div> 
      <br>
      
     
      <div class="direita">
      <p><a class="btn btn-primary" href="#">Filtrar Critérios &raquo;</a></p>
     </div>
       <br><br><br>
       
       -->
      <div class="bs-example">
      <div class="panel panel-default">
        
        <div class="panel-heading">Resultados</div>

         
        <table class="table">
          <thead>
            <tr>
              <th>Fornecedor</th>
              <th>Grupo</th> 
              <?php 
              
              $i=0;//contador original para nomes
              
              while($inputnome=mysql_fetch_assoc($resnome)){
              $nomefornecedor[$i]=$inputnome['nome'];
              $grupofornecedor[$i]=$inputnome['grupo'];
              $i=$i+1;
              }
              
              $j=0;//contador original para datas
              while($input=mysql_fetch_assoc($res1)){
                echo "<th>";
                echo $input['datapag'];
                echo "</th>";
                $datatabela[$j]=$input['datapag'];
                $j=$j+1;
                }
              
                 
                ?>
              
              
              </tr>
          </thead>
          <tbody>
            
            <?php
                        
              
            $k=0; //contador secundario para nomes
            while ($k<$i){
                $nomeforn=$nomefornecedor[$k];
                $grupoforn=$grupofornecedor[$k];
                $res2= mysql_query("SELECT DISTINCT nome, grupo FROM inputnotas WHERE nome='$nomeforn' AND grupo='$grupoforn';");
                    while ($input2=mysql_fetch_assoc($res2)){
                          
                        echo "<tr>";
                        echo "<td>";
                        echo $input2['nome'];
                        echo "</td>";
                        echo "<td>";
                        echo $input2['grupo'];
                        echo "</td>";
                        preenchelinha($input2['nome'],$input2['grupo']);
                        
                        echo "</tr>";
                        }
            
                            
                $k=$k+1;    
                }
                
                
            
           
            
            
            echo "<td>";
            echo "<strong>Total</strong>";
            echo "</td>";
            echo "<td>";
            echo "";
            echo "</td>";
            foreach ($datatabela as $datainput){
            $res3= mysql_query("SELECT SUM(valor) FROM inputnotas WHERE datapag='$datainput';");    
            while ($input3=  mysql_fetch_assoc($res3)){
            echo "<td>";
            echo "<strong>".$input3['SUM(valor)']."</strong>";
            echo "</td>";
            }
            }
                                    
            
            ?>
                      
          </tbody>
        </table>
      </div>
    </div>

        
        <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>