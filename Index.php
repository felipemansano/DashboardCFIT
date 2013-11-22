<!DOCTYPE html>

<?php
include_once ('config/config.php');
redireciona();

$msg=""; //usada para  mostrar mensagens de erro;

if(count($_POST)){
	conecta();
	
	extract($_POST); //transforma os indices da array _POST em variaveis
	
	$sql="SELECT * FROM usuarios WHERE login='$login' AND senha='$senha'";
	
	
	$res=mysql_query($sql);
	$user=mysql_fetch_array($res);


if (mysql_num_rows($res)){
	$_SESSION['logado']=true;
	$_SESSION['id']=$user['id'];
	header('Location:Apagar.php');
}
	else {
		$msg="Login ou Senha inválidos";
	}
}



?>


<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.png">

    <title>Sistema de CMM CentralFit</title>

    <!-- Referência ao arquivo CSS Master (Twitter Bootstrap) -->
    <link href="CSS/bootstrap.css" rel="stylesheet">

    <!-- Referência ao arquivo CSS específico para sign in -->
    <link href="CSS/signin.css" rel="stylesheet">
    
    <!-- Referência ao arquivo CSS feito por Felipe Mansano para outros itens na página -->
    <link href="CSS/FelipeCSS.css" rel="stylesheet">

  </head>

  <body>
      
     <div class="centralizar">
     <a href="http://www.centralfit.com.br/" title="CentralFit | Suplementos Alimentares Profissionais" class="logo"><img src="https://www.centralfit.com.br/skin/frontend/fortis/default/images/logo.png" alt="CentralFit | Suplementos Alimentares Profissionais" /></a>
     </div>
      <br>
      <br>
      <br>
      <br>
      <br>
      
      <div class="container">

      <form class="form-signin" method="POST" action="">
        <h2 class="form-signin-heading">Por favor faça login</h2>
        <input type="text" name="login" class="form-control" placeholder="Login" autofocus>
        <input type="password" name="senha" class="form-control" placeholder="Senha">
        
        <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
        <p style="color:red"><?php echo $msg ?></p>
      </form>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>

