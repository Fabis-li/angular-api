<?php 

//Variáveis
$url="localhost";
$usuario="root";
$senha="";
$base="api";

//Conexão
$conexao = mysqli_connect($url, $usuario, $senha, $base);

//Verificação
if(!$conexao){
    echo "Erro ao conectar ao banco de dados!";
}

//Arrumar acentuação
mysqli_set_charset($conexao, "utf8");

?>