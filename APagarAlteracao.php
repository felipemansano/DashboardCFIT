<!DOCTYPE html>
<?php


include ('header.php');
include_once ('config/config.php');//inclusao do arquivo com funções (inclusive conexao ao banco)
logado();//funcao para checar se o usuário está logado

$Fornecedor=$GrupoDesp=$NumNota="";// definicao das variaveis que serão usadas no formulário



if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $Fornecedor=$_POST["Fornecedor"];
    if (isset($_POST["GrupoDesp"])){
    $GrupoDesp=$_POST["GrupoDesp"];}
    $NumNota=$_POST["NumNota"];
   
}

?>


        <br>
        <ul class="nav nav-tabs">
        <li><a href="APagar.php">Tela Resumo</a></li>
        <li><a href="APagarLancamento.php">Lançamento de Nota/Provisão</a></li>
        <li class="active"><a href="APagarAlteracao.php">Alteração/Exclusão de Nota/Provisão</a></li>
        </ul>
        <br>

        <form class="form-inline" method="POST" 
        action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<fieldset>

<!-- Formulário de Input das informações sobre notas e provisões-->

<!-- Text input-->

<div class="centralizar">

<div class="form-group">
  <label class="control-label" for="Fornecedor">Nome do Fornecedor</label>
  
    <input id="Fornecedor" name="Fornecedor" type="text" placeholder="Nome do Fornecedor" class="form-control">
  </div>
  

<!-- Select Basic -->
<div class="form-group">
  
  <label class="control-label" for="GrupoDesp">Grupo de Despesa</label>
      <select id="selectbasic" name="GrupoDesp" class="form-control" placeholder="Selecione">
      <option disabled selected style='display:none'>Escolha abaixo..</option>
      <option>Administrativo</option>
      <option>Frete</option>
      <option>IT</option>
      <option>Marketing</option>
      <option>Packing</option>
      <option>Pessoal</option>
      <option>Produtos para Revenda</option>
      <option>Provisão</option>
      <option>Taxas e Tributos</option>
    </select>
  
    </div>


<div class="form-group">
  
  <label class="control-label" for="NumNota"># da Nota</label>
  
    <input id="NumNota" name="NumNota" type="text" placeholder="Número da Nota" class="form-control">
    
  
  </div> 

<br>
<br>
     <div class="direita">
     <div class="form-group">
    <label class="control-label" for="button1id"></label>
    <div class="controls">
         <button id="button1id" name="button1id" class="btn btn-primary">Filtrar Critérios</button>
     </div>
     </div>
     </div>

</fieldset>
</form>
        
       <br><br><br>
       <br><br><br>
       <br><br><br>
       <br><br><br>
       <br><br><br>
       
<?php

echo "<br>";

conecta();


if ($Fornecedor=='' && $GrupoDesp=='' && $NumNota=='')
    {
    $res= mysql_query("SELECT * FROM inputnotas");
}   
    elseif($Fornecedor=='' && $GrupoDesp=='' ){
        $res= mysql_query("SELECT * FROM inputnotas WHERE numnota='$NumNota'");
}   elseif($GrupoDesp=='' && $NumNota==''){
        $res= mysql_query("SELECT * FROM inputnotas WHERE nome='$Fornecedor'");
}   elseif($Fornecedor=='' && $NumNota==''){
        $res= mysql_query("SELECT * FROM inputnotas WHERE grupo='$GrupoDesp'");
}   elseif($Fornecedor==''){
        $res= mysql_query("SELECT * FROM inputnotas WHERE grupo='$GrupoDesp'AND
        numnota='$NumNota'");
}   elseif($GrupoDesp==''){
        $res= mysql_query("SELECT * FROM inputnotas WHERE nome='$Fornecedor'AND
        numnota='$NumNota'");
}   elseif($NumNota==''){
        $res= mysql_query("SELECT * FROM inputnotas WHERE nome='$Fornecedor'AND
        grupo='$GrupoDesp'");
}    else{
        $res=  mysql_query("SELECT * FROM inputnotas WHERE nome='$Fornecedor' AND grupo='$GrupoDesp' AND
        numnota='$NumNota'");
}




?>
              
      <div class="panel panel-default">
        <div class="panel-heading">Resultado da Busca</div>
            <!-- Table -->
                            <table class="table">
                            <thead>
			        <tr>
			            <th>#</th>
			            <th>Nome Fornecedor</th>
			            <th>Grupo de Despesa</th>
			            <th>Numero NF</th>
			            <th>Data Emissão</th>
			            <th>Parcela</th>
                                    <th>De</th>
                                    <th>Valor a Pagar (R$)</th>
                                    <th>Data Pagamento</th>
                                    
			        </tr>
			    </thead>

			    <tbody>
<?php 
			    while($input=mysql_fetch_assoc($res)){
                                        echo '<tr class="pure-table-odd">';
                                        echo "<td>".$input['id']."</td>";
					echo "<td>".$input['nome']."</td>";
					echo "<td>".$input['grupo']."</td>";
					echo "<td>".$input['numnota']."</td>";
					echo "<td>".$input['dataemi']."</td>";
                                        echo "<td>".$input['parcela1']."</td>";
                                        echo "<td>".$input['parcela2']."</td>";
                                        echo "<td>".$input['valor']."</td>";
                                        echo "<td>".$input['datapag']."</td>";
                                        echo '<td><a href="APagarEditar.php?id='.$input['id'].'">Editar</a> - <a href="APagarExcluir.php?id='.$input['id'].'">Excluir</a></td>';
                                        echo "</tr>";
			    	
			    }
			    ?>
			        
		
			    </tbody>
			</table>	
		</div>
	</div>
</div>


<?php
/*
echo "<br>";
echo $Fornecedor;
echo "<br>";
echo $GrupoDesp;
echo "<br>";
echo $NumNota;
echo "<br>";
*/
?>
