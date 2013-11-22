<?php
include ('header.php');
include_once ('config/config.php'); //inclusao do arquivo com funções (inclusive conexao ao banco)
logado();//funcao para checar se o usuário está logado


if(!isset($_GET['id'])){
	exit('Pagina Restrita');
}

$id=$_GET['id'];


conecta();

$msg=""; //variavel usada para mostrar mensagens de erro


if(count($_POST)>0){
	
        $nome=$_POST['Fornecedor'];
        $grupo=$_POST['GrupoDesp'];
        $numnota=$_POST['NumNota'];
        $dataemi=$_POST['DataEmi'];
        $parcela1=$_POST['Parcela1'];
        $parcela2=$_POST['Parcela2'];
        $valor=$_POST['ValorPag'];
        $datapag=$_POST['DataPag'];
        
        
        $sql="UPDATE inputnotas 
	      SET nome='$nome', grupo='$grupo', numnota='$numnota', dataemi='$dataemi', parcela1='$parcela1', parcela2='$parcela2', valor='$valor', datapag='$datapag' WHERE id=$id";


	if (mysql_query($sql)){
		$msg="Usuario alterado com sucesso!";}
		else{
		$msg="Erro ao alterar usuario!";
		}
}




$res=mysql_query("SELECT * FROM inputnotas WHERE id=$id");
$user=mysql_fetch_assoc($res);



?>



        <br>
        <ul class="nav nav-tabs">
        <li><a href="APagar.php">Tela Resumo</a></li>
        <li><a href="APagarLancamento.php">Lançamento de Nota/Provisão</a></li>
        <li class="active"><a href="APagarAlteracao.php">Alteração/Exclusão de Nota/Provisão</a></li>
        </ul>
        <br>
        
        
        <form class="form-inline" method="POST" 
        action="">
<fieldset>

<!-- Formulário de Input das informações sobre notas e provisões-->

<!-- Text input-->

<div class="centralizar">
<div class="row">
<div class="form-group">
  <label class="control-label" for="Fornecedor">Nome do Fornecedor</label>
  
    <input id="Fornecedor" name="Fornecedor" type="text" placeholder="Nome do Fornecedor" value="<?php echo $user['nome']; ?>" class="form-control" required="">
  </div>
  

<!-- Select Basic -->
<div class="form-group">
  
  <label class="control-label" for="GrupoDesp">Grupo de Despesa</label>
      <select id="selectbasic" name="GrupoDesp" class="form-control" placeholder="Selecione">
      <option disabled selected style='display:none'>Escolha abaixo..</option>
      <option <?php if($user['grupo']=='Administrativo'){echo "selected";} ?>  >Administrativo</option>
      <option <?php if($user['grupo']=='Frete'){echo "selected";} ?> >Frete</option>
      <option <?php if($user['grupo']=='IT'){echo "selected";} ?> >IT</option>
      <option <?php if($user['grupo']=='Marketing'){echo "selected";} ?> >Marketing</option>
      <option <?php if($user['grupo']=='Packing'){echo "selected";} ?> >Packing</option>
      <option <?php if($user['grupo']=='Pessoal'){echo "selected";} ?> >Pessoal</option>
      <option <?php if($user['grupo']=='Produtos para Revenda'){echo "selected";} ?> >Produtos para Revenda</option>
      <option <?php if($user['grupo']=='Provisão'){echo "selected";} ?> >Provisão</option>
      <option <?php if($user['grupo']=='Taxas e Tributos'){echo "selected";} ?> >Taxas e Tributos</option>
    </select>
  
    </div>


<div class="form-group">
  
  <label class="control-label" for="NumNota"># da Nota</label>
  
    <input id="NumNota" name="NumNota" type="text" placeholder="Número da Nota" class="form-control" required="" value="<?php echo $user['numnota']; ?>">
    
  
  </div> 
</div>    

<div class="row">
<!-- Text input-->
<div class="form-group">
  <label class="control-label" for="DataEmi">Data Emissão</label>

    <input id="DataEmi" name="DataEmi" type="text" placeholder="AAAAMMDD" class="form-control" required="" value="<?php echo $user['dataemi']; ?>">
    
  </div>
</div>



<div class="row">
<!-- Select Basic -->
<div class="form-group">
  <label class="control-label" for="Parcela1">Parcela</label>
  
    <select id="Parcela1" name="Parcela1" class="form-control">
      <option <?php if($user['parcela1']==1){echo "selected";} ?> >1</option>
      <option <?php if($user['parcela1']==2){echo "selected";} ?> >2</option>
      <option <?php if($user['parcela1']==3){echo "selected";} ?> >3</option>
      <option <?php if($user['parcela1']==4){echo "selected";} ?> >4</option>
      <option <?php if($user['parcela1']==5){echo "selected";} ?> >5</option>
      <option <?php if($user['parcela1']==6){echo "selected";} ?> >6</option>
      <option <?php if($user['parcela1']==7){echo "selected";} ?> >7</option>
    </select>
  
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="control-label" for="Parcela2">De</label>
  
    <select id="Parcela2" name="Parcela2" class="form-control">
      <option <?php if($user['parcela2']==1){echo "selected";} ?> >1</option>
      <option <?php if($user['parcela2']==2){echo "selected";} ?> >2</option>
      <option <?php if($user['parcela2']==3){echo "selected";} ?> >3</option>
      <option <?php if($user['parcela2']==4){echo "selected";} ?> >4</option>
      <option <?php if($user['parcela2']==5){echo "selected";} ?> >5</option>
      <option <?php if($user['parcela2']==6){echo "selected";} ?> >6</option>
      <option <?php if($user['parcela2']==7){echo "selected";} ?> >7</option>
    </select>
  </div>
  </div>

<!-- Text input-->
<div class="row">
<div class="form-group">
  <label class="control-label" for="ValorPag">Valor a Pagar</label>
  
    <input id="ValorPag" name="ValorPag" type="text" placeholder="(R$)" class="form-control" required="" value="<?php echo $user['valor']; ?>">
    

<!-- Text input-->
<div class="form-group">
  <label class="control-label" for="DataPag">Data Pagamento</label>

    <input id="DataPag" name="DataPag" type="text" placeholder="AAAAMMDD" class="form-control" required="" value="<?php echo $user['datapag']; ?>">
    
  </div>
 
</div>
</div>
<!-- Button (Double) -->
<div class="form-group">
  <label class="control-label" for="button1id"></label>
  <div class="controls">
    <button id="button1id" name="button1id" class="btn btn-primary">Salvar Alteracoes</button>

  </div>
</div>



</fieldset>
</form>
</div>

<?php 

echo $msg;

?>

 </body>
</html>