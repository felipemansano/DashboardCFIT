<?php



include_once ('config/config.php');//inclusao do arquivo com funções (inclusive conexao ao banco)
logado();//funcao para checar se o usuário está logado


$id=$_GET['id'];

conecta();

$res2=mysql_query("SELECT * FROM inputnotas WHERE id=$id");
$user=mysql_fetch_assoc($res2);

$delete="DELETE FROM inputnotas WHERE id=$id";

$res=mysql_query($delete);


if ($res){
	echo "
	<script>
	alert('Fornecedor: {$user['nome']} com NotaFiscal: {$user['numnota']} do Grupo de Despesa: {$user['grupo']}  e valor de: {$user['valor']} foi  excluido com sucesso');
	window.location='APagarAlteracao.php';
	</script>
	";
}else{
		echo "<script>";
		echo "alert('Erro ao deletar o registro')";
		echo "history.go(-1)";
		echo "</script>";
}
	

?>


