<?php



include_once ('config/config.php');//inclusao do arquivo com funções (inclusive conexao ao banco)
logado();//funcao para checar se o usuário está logado


$id=$_GET['id'];

conecta();

$res2=mysql_query("SELECT * FROM inputurl WHERE id=$id");
$input=mysql_fetch_assoc($res2);

$delete="DELETE FROM inputurl WHERE id=$id";

$res=mysql_query($delete);

if ($res){
	echo "
	<script>
	alert('Produto: {$input['Nome']} do Fornecedor {$input['Marca']} foi  excluido com sucesso');
	window.location='ComparaConcEditar.php';
	</script>
	";
}else{
		echo "<script>";
		echo "alert('Erro ao deletar o registro')";
		echo "history.go(-1)";
		echo "</script>";
}
	

?>
