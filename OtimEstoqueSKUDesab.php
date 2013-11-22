<!DOCTYPE html>
<?php

//inclusao do arquivo com funções (inclusive conexao ao banco)
include ('header.php');
include_once ('config/config.php'); 
logado();

include ('HeaderSubOtimEstoque.php');

function chamarAPI($method, $url, $data=false){
    $curl=curl_init();
    switch ($method){
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);
            if ($data){
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            }
            break;
        
        case "PUT":
            curl_setopt($curl, CURLOPT_PUT, 1);
            break;
        
        default:
            if ($data)
                $url=  sprintf ("%s?%s", $url, http_build_query ($data));
            
    }
    var_dump($curl);
    return curl_exec($curl);
}

chamarAPI("POST","http://hom.centralfit.com.br:8080/api/items/?page=1");


?>

	