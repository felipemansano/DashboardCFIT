<?php
include ('header.php');
include_once ('config/config.php'); //inclusao do arquivo com funções (inclusive conexao ao banco)
logado();//funcao para checar se o usuário está logado


if(!isset($_GET['id'])){
	exit('Pagina Restrita');
}

$id=$_GET['id'];
$msg='';


conecta();

if(count($_POST)>0){
	
    $Produto=$_POST["Produto"];
    $Marca=$_POST["Marca"];
    $URLcfit=$_POST["URLcfit"];
    $URLcorpo=$_POST["URLcorpo"];
    $Numprodcorpo=$_POST["Numprodcorpo"];
    $URLnatue=$_POST["URLnatue"];
    $URLsaude=$_POST["URLsaude"]; 


$sql="UPDATE inputurl 
	      SET Nome='$Produto', Marca='$Marca', URLcfit='$URLcfit', URLcorpo='$URLcorpo', Numprodcorpo='$Numprodcorpo', URLnatue='$URLnatue', URLsaude='$URLsaude' WHERE id=$id";

if (mysql_query($sql)){
		$msg="Produto/URL alterado com sucesso!";}
		else{
		$msg="Erro ao alterar registro!";
		}
}

$res=mysql_query("SELECT * FROM inputurl WHERE id=$id");
$user=mysql_fetch_assoc($res);


include ('HeaderSubComparaConc.php');

?>


        <br>
        <form class="form-inline" method="POST" 
        action="">
        <fieldset>

        <!-- Formulário de Input das informações referentes a URLs dos produtos-->


        <div class="centralizarform">
        
        <div class="form-group">
        <label class="control-label" for="Produto">Nome do Produto</label>
  
        <input id="Produto" name="Produto" type="text" placeholder="Nome do Produto" class="form-control" required="" value="<?php echo $user['Nome']; ?>">
        </div>
       
        <div class="form-group">
        <label class="control-label" for="Marca">Marca</label>
        <input id="Marca" name="Marca" type="text" placeholder="Marca" class="form-control" required="" value="<?php echo $user['Marca']; ?>">
        </div>
          
        <table>
        
        <tr>
        <td>
        <br>    
        <div class="form-group">
        <label class="control-label" for="URLcfit"><img src="https://www.centralfit.com.br/skin/frontend/fortis/default/images/logo.png" alt="CentralFit | Suplementos Alimentares Profissionais" height="25" width="100" /></label>
        <input id="URLcfit" name="URLcfit" type="text" placeholder="http://..." class="form-control" value="<?php echo $user['URLcfit']; ?>">
        </div>
        </td>    
        
        <td>
        <br>    
        <div class="form-group">
        <label class="control-label" for="URLcorpo"><img src="http://www.corpoperfeito.com.br/img/icons/LogoCorpoPerfeito.jpg" alt="Corpo Perfeito" height="30" width="100" /></label>
        <input id="URLcorpo" name="URLcorpo" type="text" placeholder="http://..." class="form-control" value="<?php echo $user['URLcorpo']; ?>">
        </div>
        </td>
        </tr>
        
        <td>
        <br>    
        <div class="form-group">
        <label class="control-label" for="Numprodcorpo"><img src="http://www.corpoperfeito.com.br/img/icons/LogoCorpoPerfeito.jpg" alt="Corpo Perfeito" height="30" width="100" /></label>
        <input id="URLcorpo" name="Numprodcorpo" type="text" placeholder="http://..." class="form-control" value="<?php echo $user['Numprodcorpo']; ?>">
        </div>
        </td>
        
        
        <tr>
        <td>
        <br>    
        <div class="form-group">
        <label class="control-label" for="URLnatue"><img src="http://2.bp.blogspot.com/-EcMRFSNtY1s/UYk21ivkEkI/AAAAAAAAGEk/ziX_ZJ7iPxA/s1600/natue_logo_blogs_transpbg+%25283%2529.png" alt="Natue" height="35" width="80" /></label>
        <input id="URLnatue" name="URLnatue" type="text" placeholder="http://..." class="form-control" value="<?php echo $user['URLnatue']; ?>">
        </div>
        </td>
        
        <td>
        <br>    
        <div class="form-group">
        <label class="control-label" for="URLsaude"><img src="http://www.saudeja.com.br/skin/frontend/default/drugstore/images/logo.gif" alt="SaudeJa" height="30" width="90" /></label>
        <input id="URLsaude" name="URLsaude" type="text" placeholder="http://..." class="form-control" value="<?php echo $user['URLsaude']; ?>">
        </div>
        </td>
        </tr>
        </table>    

        <br>   
        <div class="form-group">
        <label class="control-label" for="button1id"></label>
        <div class="controls">
        <button id="button1id" name="button1id" class="btn btn-primary">Gravar Alterações</button>
        </div>
        </div>
        </div>  
        
</fieldset>
</form>

<?php 

echo $msg;

?>

 </body>
</html>