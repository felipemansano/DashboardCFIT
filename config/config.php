<?php

// Constantes de informação do banco de dados
session_start();

define ("HOST","localhost");
define ("USER","root");
define ("PASS", "");
define ("DB","centralfit26oct");

include('Libraries/simple_html_dom.php'); 

// Funcao para conectar ao banco

function conecta($host=HOST,$user=USER,$pass=PASS,$db=DB){
    $con=mysql_connect($host,$user,$pass) or die("Erro na Conexao");
    mysql_select_db($db);
}

function semana1(){
    $hoje=strtotime(date("Ymd"));
    $diainicial=strtotime("+1 day", $hoje);
    $diafinal=strtotime("+7 day", $hoje);
    $hoje=date('Ymd',$hoje);
    $diainicial=date('Ymd',$diainicial);
    $diafinal=date('Ymd',$diafinal);
    
    conecta();
    $res=mysql_query("SELECT sum(valor) FROM inputnotas WHERE datapag BETWEEN '$diainicial' AND '$diafinal';");
    $input=mysql_fetch_assoc($res);
    return $input['sum(valor)'];
}

function semana2(){
    $hoje=strtotime(date("Ymd"));
    $diainicial=strtotime("+8 day", $hoje);
    $diafinal=strtotime("+14 day", $hoje);
    $hoje=date('Ymd',$hoje);
    $diainicial=date('Ymd',$diainicial);
    $diafinal=date('Ymd',$diafinal);
    
    conecta();
    $res=mysql_query("SELECT sum(valor) FROM inputnotas WHERE datapag BETWEEN '$diainicial' AND '$diafinal';");
    $input=mysql_fetch_assoc($res);
    return $input['sum(valor)'];
    
}

function semana3(){
    $hoje=strtotime(date("Ymd"));
    $diainicial=strtotime("+15 day", $hoje);
    $diafinal=strtotime("+21 day", $hoje);
    $hoje=date('Ymd',$hoje);
    $diainicial=date('Ymd',$diainicial);
    $diafinal=date('Ymd',$diafinal);
    
    conecta();
    $res=mysql_query("SELECT sum(valor) FROM inputnotas WHERE datapag BETWEEN '$diainicial' AND '$diafinal';");
    $input=mysql_fetch_assoc($res);
    return $input['sum(valor)'];
}

function preenchelinha($nomeforn, $grupoforn){
    conecta();
    $i=0; //contador
    $diaatual=strtotime(date("Ymd"));
    $diaatual=date('Ymd',$diaatual); //define

    $res1=mysql_query("SELECT DISTINCT datapag FROM inputnotas WHERE datapag>='$diaatual' ORDER BY datapag ASC;");
    
    while($input=mysql_fetch_assoc($res1)){
        $datatabela[$i]=$input['datapag'];
        $i=$i+1;
    }
    
    foreach($datatabela as $datainput){
    $res2= mysql_query("SELECT sum(valor) as valor FROM inputnotas WHERE datapag='$datainput' AND nome='$nomeforn' AND grupo='$grupoforn';");    
    
  
    while ($input2=mysql_fetch_assoc($res2)){
        if($input2['valor']){
            echo "<td>";
            echo $input2['valor'];
            echo "</td>";
        }
        else{
            echo "<td>";
            echo 0;
            echo "</td>";
            
    }    
    }
    }
    }
    
function logado(){
	if($_SESSION['logado']!==true){
		header("Location: index.php");
	}
}
    
    
function redireciona(){
    	if(isset($_SESSION['logado']) and $_SESSION['logado']===true){
		header("Location: APagar.php");
	}
}    
    

function precocentralfit($URL){

    if ($URL==''){
    echo "Preço Indisponivel";
    return false;
    }
    
    if (!$fp=fopen($URL,"r")){
        return false;
        }
       
    $fp=fopen($URL,"r");
    
    $conteudo='';
    
    while(!feof($fp)){
        $conteudo.=fgets($fp,1024);
    }
    fclose($fp);

    $padrao="(([0-9][0-9][0-9]|[0-9][0-9])\,[0-9][0-9])";
    
    
preg_match_all($padrao, $conteudo, $precos);

if($precos){
    $precoproduto= "R$".substr($precos[0][2], 0);
    
}
else{
$precoproduto="Preço Indisponivel";}


echo $precoproduto;

  
}



function precocorpoperfeito($URL, $Numprod){
    
    //$URL="http://www.corpoperfeito.com.br/produtojs.ashx?product=74441&shopping=False&selected=0&aliasShopping=";
    
    if ($URL==''){
    echo "Preço Indisponivel";
    return false;
    }
    
    if (!$fp=fopen($URL,"r")){
        return false;
        }
       
    $fp=fopen($URL,"r");
    
    $conteudo='';
    
    while(!feof($fp)){
        $conteudo.=fgets($fp,1024);
    }
    fclose($fp);

$posicao=1;
$padrao="(([0-9][0-9][0-9]|[0-9][0-9])\.[0-9][0-9]\,)";

if ($Numprod==1){
    $posicao=1;
}
elseif ($Numprod==2){
    $posicao=5;
}
elseif ($Numprod==3){
    $posicao=9;
}
    

preg_match_all($padrao, $conteudo, $precos);

if($precos){
    $precoproduto= "R$".substr($precos[0][$posicao], 0);
    
}
else{
$precoproduto="Preço Indisponivel";}


echo $precoproduto;

//var_dump($precos);

}



function preconatue($URL){

      
    if ($URL==''){
    echo "Preço Indisponivel";
    return false;
    }
    
    if (!$fp=fopen($URL,"r")){
        return false;
        }
       
    $fp=fopen($URL,"r");
    
    $conteudo='';
    
    while(!feof($fp)){
        $conteudo.=fgets($fp,1024);
    }
    fclose($fp);

$padrao="([<dd>]*<span itemprop=\"price\">*[R$]*[0-9]*[,]*[,][0-9]{2})";
    
preg_match($padrao, $conteudo, $precos);

if($precos){
    $precoproduto=  substr($precos[0], 0);
    
}
else{
$precoproduto="Preço Indisponivel";}


echo $precoproduto;

}


function precosaude($URL){
    
  if ($URL==''){
    echo "Preço Indisponivel";
    return false;
    }
    
    if (!$fp=fopen($URL,"r")){
        return false;
        }
       
    $fp=fopen($URL,"r");
    
    $conteudo='';
    
    while(!feof($fp)){
        $conteudo.=fgets($fp,1024);
    }
    fclose($fp);

$padrao="(([0-9][0-9][0-9]|[0-9][0-9])\,[0-9][0-9])";
    
    
preg_match_all($padrao, $conteudo, $precos);

if($precos){
    $precoproduto= "R$".substr($precos[0][1], 0);
    
}
else{
$precoproduto="Preço Indisponivel";}


echo $precoproduto;

}


function maisvendidosbodyb(){
        
    $HTML= file_get_html('http://br.bodybuilding.com/store/top50.htm');
    $i=1;
    
    foreach($HTML->find('div.product-details h3') as $produto){
        echo "<tr>";
        echo "<td>";
        echo $i;
        echo "</td>";
        echo "<td>";
        echo $produto;
        echo "</td>";
        echo "<tr>";
        $i= $i+1;
        } 
     
}

function maisvendidosnatue(){
        
    $HTML= file_get_html('http://www.natue.com.br/mais-vendidos/');
    $i=1;
    
    foreach($HTML->find('div.productNameAndDescription') as $produto){
        echo "<tr>";
        echo "<td>";
        echo $i;
        echo "</td>";
        echo "<td>";
        echo $produto;
        echo "</td>";
        echo "<tr>";
        $i= $i+1;
        } 
     
}

function maisvendidossaudeemagr(){
        
    $HTML= file_get_html('http://www.saudeja.com.br/emagrecimento?dir=asc&limit=64&order=bestsellers');
    $i=1;
    
    foreach($HTML->find('h2 a') as $produto){
        echo "<tr>";
        echo "<td>";
        echo $i;
        echo "</td>";
        echo "<td>";
        echo $produto->title;
        echo "</td>";
        echo "<tr>";
        $i= $i+1;
        } 
     
}

function maisvendidossaudesupl(){
        
    $HTML= file_get_html('http://www.saudeja.com.br/suplementos-alimentares?dir=asc&limit=64&order=bestsellers');
    $i=1;
    
    foreach($HTML->find('h2 a') as $produto){
        echo "<tr>";
        echo "<td>";
        echo $i;
        echo "</td>";
        echo "<td>";
        echo $produto->title;
        echo "</td>";
        echo "<tr>";
        $i= $i+1;
        } 
     
}

function maisvendidostop($valor){
        
    $HTML1=file_get_html('http://br.bodybuilding.com/store/top50.htm');
    $HTML2= file_get_html('http://www.natue.com.br/mais-vendidos/');
    $HTML3=file_get_html('http://www.saudeja.com.br/emagrecimento?dir=asc&limit=64&order=bestsellers');             
    $HTML4= file_get_html('http://www.saudeja.com.br/suplementos-alimentares?dir=asc&limit=64&order=bestsellers');
    $i=1;
    
    $topprodutos1=$HTML1->find('div.product-details h3');
    $topprodutos2=$HTML2->find('div.productNameAndDescription');
    $topprodutos3=$HTML3->find('h2 a'); 
    $topprodutos4=$HTML4->find('h2 a');
            
    while($i<=$valor){
        echo "<tr>";
        echo "<td>";
        echo $i;
        echo "</td>";
        echo "<td>";
        echo $topprodutos1[$i-1];
        echo "</td>";
        echo "<td>";
        echo $topprodutos2[$i-1];
        echo "</td>";
        echo "<td>";
        echo $topprodutos3[$i-1]->title;
        echo "</td>";
        echo "<td>";
        echo $topprodutos4[$i-1]->title;
        echo "</td>";
        echo "<tr>";
        $i= $i+1; 
    }
    
       
       
     
}



?>

