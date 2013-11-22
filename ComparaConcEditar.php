<!DOCTYPE html>
<?php

//inclusao do arquivo com funções (inclusive conexao ao banco)
include ('header.php');
include_once ('config/config.php'); 
logado();

$Produto=$Marca=''; // inicialmente as variáveis $Produto e $Marca têm valor vazio

if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $Produto=$_POST["Produto"];
    $Marca=$_POST["Marca"];
}   


include ('HeaderSubComparaConc.php');

?>

     
        <form class="form-inline" method="POST" 
        action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <fieldset>

        <!-- Formulário de Input das informações sobre notas e provisões-->

        <!-- Text input-->

        <div class="centralizarform">

        <div class="form-group">
        <label class="control-label" for="Produto">Produto</label>
  
        <input id="Produto" name="Produto" type="text" placeholder="Filtrar por Produto" class="form-control">
        </div>
            
        <div class="form-group">
        <label class="control-label" for="Marca">Marca</label>
  
        <input id="Marca" name="Marca" type="text" placeholder="Filtrar por Marca" class="form-control">
        </div>
  
        <br>
        
        <div class="form-group">
        <label class="control-label" for="button1id"></label>
        <div class="controls">
        <button id="button1id" name="button1id" class="btn btn-primary">Filtrar Critérios</button>
        </div>
        </div>
        

</fieldset>
</form>

<?php

echo "<br>";

conecta();
if ($Produto=='' && $Marca=='')
    {
    $res= mysql_query("SELECT * FROM inputurl");
}   
elseif ($Produto==''){ 
$res= mysql_query("SELECT * FROM inputurl WHERE Marca='$Marca'");
}
elseif ($Marca=='') {
$res= mysql_query("SELECT * FROM inputurl WHERE Nome='$Produto'");            
}
else{
    $res= mysql_query("SELECT * FROM inputurl WHERE Nome='$Produto'AND
        Marca='$Marca'");            
}

?>

       
       <br><br><br>
       <br><br><br>
       
        <div class="panel panel-default">
        <div class="panel-heading">Resultado da Busca</div>
            <!-- Table -->
                            <table class="table" style="width:100%;">
                            <thead>
			        <tr>
			            <th>#</th>
			            <th>Produto </th>
			            <th>Marca</th>
			            <th><img src="https://www.centralfit.com.br/skin/frontend/fortis/default/images/logo.png" alt="CentralFit | Suplementos Alimentares Profissionais" height="25" width="100" /></th>
			            <th><img src="http://www.corpoperfeito.com.br/img/icons/LogoCorpoPerfeito.jpg" alt="Corpo Perfeito" height="30" width="100" /></th>
			            <th><img src="http://www.corpoperfeito.com.br/img/icons/LogoCorpoPerfeito.jpg" alt="Corpo Perfeito" height="30" width="100" /></th>
                                    <th><img src="http://2.bp.blogspot.com/-EcMRFSNtY1s/UYk21ivkEkI/AAAAAAAAGEk/ziX_ZJ7iPxA/s1600/natue_logo_blogs_transpbg+%25283%2529.png" alt="Natue" height="35" width="80" /></th>
                                    <th><img src="http://www.saudeja.com.br/skin/frontend/default/drugstore/images/logo.gif" alt="SaudeJa" height="30" width="90" /></th>
                                                                        
			        </tr>
			    </thead>

			    <tbody>
<?php
                            while($input=mysql_fetch_assoc($res)){
                               echo '<tr class="pure-table-odd">';
                               echo "<td>".$input['id']."</td>";
                               echo "<td>".$input['Nome']."</td>";
                               echo "<td>".$input['Marca']."</td>";
                               echo "<td>".$input['URLcfit']."</td>";
			       echo "<td>".$input['URLcorpo']."</td>";
                               echo "<td>".$input['Numprodcorpo']."</td>";
                               echo "<td>".$input['URLnatue']."</td>";
                               echo "<td>".$input['URLsaude']."</td>";
                               echo '<td><a href="ComparaConcAlteracao.php?id='.$input['id'].'">Editar</a> - <a href="ComparaConcExcluir.php?id='.$input['id'].'">Excluir</a></td>';
                               echo "</tr>";
			    	
			    }
                                