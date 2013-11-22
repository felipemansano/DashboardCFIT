<!DOCTYPE html>
<?php

//inclusao do arquivo com funções (inclusive conexao ao banco)
include ('header.php');
include_once ('config/config.php'); 
logado();


$Produto=$Marca=$URLcfit=$URLcorpo=$Numprodcorpo=$URLnatue=$URLsaude="";// definicao das variaveis que serão usadas no formulário

if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $Produto=$_POST["Produto"];
    $Marca=$_POST["Marca"];
    $URLcfit=$_POST["URLcfit"];
    $URLcorpo=$_POST["URLcorpo"];
    $Numprodcorpo=$_POST["Numprodcorpo"];
    $URLnatue=$_POST["URLnatue"];
    $URLsaude=$_POST["URLsaude"];    
}

include ('HeaderSubComparaConc.php');


?>

        
        <br>
        <form class="form-inline" method="POST" 
        action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <fieldset>

        <!-- Formulário de Input das informações referentes a URLs dos produtos-->


        <div class="centralizarform">
        
        <div class="form-group">
        <label class="control-label" for="Produto">Nome do Produto</label>
  
        <input id="Produto" name="Produto" type="text" placeholder="Nome do Produto" class="form-control" required="">
        </div>
       
        <div class="form-group">
        <label class="control-label" for="Marca">Marca</label>
        <input id="Marca" name="Marca" type="text" placeholder="Marca" class="form-control" required="">
        </div>
          
        <table>
        
        <tr>
        <td>
        <br>    
        <div class="form-group">
        <label class="control-label" for="URLcfit"><img src="https://www.centralfit.com.br/skin/frontend/fortis/default/images/logo.png" alt="CentralFit | Suplementos Alimentares Profissionais" height="25" width="100" /></label>
        <input id="URLcfit" name="URLcfit" type="text" placeholder="http://..." class="form-control">
        </div>
        </td>    
        
        <td>
        <br>    
        <div class="form-group">
        <label class="control-label" for="URLcorpo"><img src="http://www.corpoperfeito.com.br/img/icons/LogoCorpoPerfeito.jpg" alt="Corpo Perfeito" height="30" width="100" /></label>
        <input id="URLcorpo" name="URLcorpo" type="text" placeholder="http://..." class="form-control">
        </div>
        </td>
        </tr>
        
        <td>
        <br>    
        <div class="form-group">
        <label class="control-label" for="Numprodcorpo"><img src="http://www.corpoperfeito.com.br/img/icons/LogoCorpoPerfeito.jpg" alt="Corpo Perfeito" height="30" width="100" /></label>
        <input id="Numprodcorpo" name="Numprodcorpo" type="text" placeholder="Número do Produto na Página Destino (1,2..)" class="form-control">
        </div>
        </td>
        </tr>
        
        <tr>
        <td>
        <br>    
        <div class="form-group">
        <label class="control-label" for="URLnatue"><img src="http://2.bp.blogspot.com/-EcMRFSNtY1s/UYk21ivkEkI/AAAAAAAAGEk/ziX_ZJ7iPxA/s1600/natue_logo_blogs_transpbg+%25283%2529.png" alt="Natue" height="35" width="80" /></label>
        <input id="URLnatue" name="URLnatue" type="text" placeholder="http://..." class="form-control">
        </div>
        </td>
        
        <td>
        <br>    
        <div class="form-group">
        <label class="control-label" for="URLsaude"><img src="http://www.saudeja.com.br/skin/frontend/default/drugstore/images/logo.gif" alt="SaudeJa" height="30" width="90" /></label>
        <input id="URLsaude" name="URLsaude" type="text" placeholder="http://..." class="form-control">
        </div>
        </td>
        </tr>
        </table>    

        <div class="form-group">
        <label class="control-label" for="button1id"></label>
        <div class="controls">
        <button id="button1id" name="button1id" class="btn btn-primary">Salvar</button>
        </div>
        </div>
        </div>  
        
</fieldset>
</form>
        
      
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
echo $Produto;
echo "<br>";
echo $Marca;
echo "<br>";
echo $URLcfit;
echo "<br>";
echo $URLcorpo;
echo "<br>";
echo $Numprodcorpo;
echo "<br>";
echo $URLnatue;
echo "<br>";
echo $URLsaude;
echo "<br>";


$sqlinsert="INSERT INTO inputurl(Nome, Marca, URLcfit, URLcorpo, Numprodcorpo, URLnatue, URLsaude) 
            VALUES ('$Produto','$Marca','$URLcfit','$URLcorpo','$Numprodcorpo','$URLnatue','$URLsaude')";

if ($_SERVER["REQUEST_METHOD"]=="POST"){
conecta();

mysql_query($sqlinsert);
mysql_close();
}

  
?>
      
