<!DOCTYPE html>

<?php
include ('header.php');
?>

<br>
<br>

      <div class="row">
          <div class="col-lg-4"> 
             <div class="input-group">
                <span class="input-group-addon">Código</span>
                <input type="text" class="form-control" placeholder="Insira para filtrar por código de produto">
            </div>
          </div>
     
      
     
          <div class="col-lg-4">
                <div class="input-group">
                <span class="input-group-addon">Nome</span>
                <input type="text" class="form-control" placeholder="Insira para filtrar por nome de produto">
                </div>
          </div>
     
    
    
          <div class="col-lg-4">
               <div class="input-group">
               <span class="input-group-addon">Marca</span>
               <input type="text" class="form-control" placeholder="Insira para filtrar por marca">
               </div>
          </div>
    </div> 
      <br>
      
     <div class="direita">
      <p><a class="btn btn-primary" href="#">Filtrar Critérios &raquo;</a></p>
     </div>
       <br><br><br>
    
     <div class="bs-example">
      <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Resultados</div>

        <!-- Table -->
        <table class="table">
          <thead>
            <tr>
              <th>Ordem</th>
              <th>Código</th>
              <th>Marca</th>
              <th>Nome</th>
              <th>Preço</th>
              <th>Preço Promo</th>
              <th>Custo</th>
              <th>Markup</th>
              <th>Estoque</th>
              <th>Adicionar/(Remover)</th>
            </tr>
          </thead>
          <tbody>
            
            <?php
            for ($i=0;$i<2;$i++){
                echo "<tr>";
                echo "<td>".$i."</td>";
                echo "<td> LINKAR BANCO CODIGO</td>";
                echo "<td> LINKAR BANCO MARCA</td>";
                echo "<td> LINKAR BANCO NOME</td>";
                echo "<td> LINKAR BANCO PRECO1</td>";
                echo "<td> LINKAR BANCO PRECO2</td>";
                echo "<td> LINKAR BANCO CUSTO</td>";
                echo "<td> FAZER CONTA MARKUP</td>";
                echo "<td> LINKAR BANCO ESTOQUE</td>";
                echo "<td>GRAVAR</td>";
                echo "</tr>";        
            }
            ?>
                      
          </tbody>
        </table>
      </div>
    </div>
      
          
      <div id="push"></div>
    </div>
      
     
    <div id="footer">
      <div class="container">
        <div class="centralizar"> 
          <p class="muted credit">Dashem Ltda. Todos os direitos reservado.</p>
      </div>
    </div>
    </div>
       
  </body>
</html>