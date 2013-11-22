<!DOCTYPE html>
<?php



include ('header.php');
include_once ('config/config.php');//inclusao do arquivo com funções (inclusive conexao ao banco)
logado();//funcao para checar se o usuário está logado

//$msg="teste"; //definicao da variável que mostra mensagens de sucesso e de erro

$Fornecedor=$GrupoDesp=$NumNota=$DataEmi=$Parcela1=$Parcela2=$ValorPag=$DataPag="";// definicao das variaveis que serão usadas no formulário

if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $Fornecedor=$_POST["Fornecedor"];
    $GrupoDesp=$_POST["GrupoDesp"];
    $NumNota=$_POST["NumNota"];
    $DataEmi=$_POST["DataEmi"];
    $Parcela1=$_POST["Parcela1"];
    $Parcela2=$_POST["Parcela2"];
    $ValorPag=$_POST["ValorPag"];
    $DataPag=$_POST["DataPag"];
    
    
}

?>

        <br>
        <ul class="nav nav-tabs">
        <li><a href="APagar.php">Tela Resumo</a></li>
        <li class="active"><a href="APagarLancamento.php">Lançamento de Nota/Provisão</a></li>
        <li><a href="APagarAlteracao.php">Alteração/Exclusão de Nota/Provisão</a></li>
        </ul>
        <br>
        
        
        <br>
        <form class="form-inline" method="POST" 
        action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<fieldset>

<!-- Formulário de Input das informações sobre notas e provisões-->

<!-- Text input-->

<div class="centralizar">
<div class="row">
<div class="form-group">
  <label class="control-label" for="Fornecedor">Nome do Fornecedor</label>
  
    <input id="Fornecedor" name="Fornecedor" type="text" placeholder="Nome do Fornecedor" class="form-control" required="">
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
  
    <input id="NumNota" name="NumNota" type="text" placeholder="Número da Nota" class="form-control" required="">
    
  
  </div> 
</div>    

<div class="row">
<!-- Text input-->
<div class="form-group">
  <label class="control-label" for="DataEmi">Data Emissão</label>

    <input id="DataEmi" name="DataEmi" type="text" placeholder="AAAAMMDD" class="form-control" required="">
    
  </div>
</div>



<div class="row">
<!-- Select Basic -->
<div class="form-group">
  <label class="control-label" for="Parcela1">Parcela</label>
  
    <select id="Parcela1" name="Parcela1" class="form-control">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
      <option>6</option>
      <option>7</option>
    </select>
  
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="control-label" for="Parcela2">De</label>
  
    <select id="Parcela2" name="Parcela2" class="form-control">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
      <option>6</option>
      <option>7</option>
    </select>
  </div>
  </div>

<!-- Text input-->
<div class="row">
<div class="form-group">
  <label class="control-label" for="ValorPag">Valor a Pagar</label>
  
    <input id="ValorPag" name="ValorPag" type="text" placeholder="(R$)" class="form-control" required="">
    

<!-- Text input-->
<div class="form-group">
  <label class="control-label" for="DataPag">Data Pagamento</label>

    <input id="DataEmi" name="DataPag" type="text" placeholder="AAAAMMDD" class="form-control" required="">
    
  </div>
 
</div>
</div>
<!-- Button (Double) -->
<div class="form-group">
  <label class="control-label" for="button1id"></label>
  <div class="controls">
    <button id="button1id" name="button1id" class="btn btn-primary">Salvar</button>
    <button id="button2id" name="button2id" class="btn btn-default">Limpar</button>
  </div>
</div>



</fieldset>
</form>
</div>
</div>
  
      
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      
      <br>
      <br>
      <br>
      
      
<?php
echo "Valores Inputados";
echo "<br>";
echo $Fornecedor;
echo "<br>";
echo $GrupoDesp;
echo "<br>";
echo $NumNota;
echo "<br>";
echo $DataEmi;
echo "<br>";
echo $Parcela1;
echo "<br>";
echo $Parcela2;
echo "<br>";
echo $ValorPag;
echo "<br>";
echo $DataPag;
echo "<br>";


$sqlinsert="INSERT INTO inputnotas(nome, grupo, numnota, dataemi, parcela1, parcela2,valor,datapag) 
            VALUES ('$Fornecedor','$GrupoDesp','$NumNota',$DataEmi,'$Parcela1','$Parcela2',$ValorPag,
                    $DataPag)";

conecta();

mysql_query($sqlinsert);
mysql_close();

  
?>
      
      
      
  </body>
</html>