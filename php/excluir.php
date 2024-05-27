<?php 

//Incluir a conexão com banco de dados
include('conexao.php');

//Obter os dados
$obterDados = file_get_contents('php://input'); 
if(!$obterDados){
    echo json_encode(["erro" => "Erro ao obter os dados"]);
    exit;
}

//Extraír os dados
$extrair = json_decode($obterDados);   

if(!$extrair || !isset($extrair->cursos->idCurso)){
    echo json_encode(["erro" => "Erro ao extrair os dados"]);
    exit;
}

//Separa os dados do JSON
$idCurso = mysqli_real_escape_string($conexao, $extrair->cursos->idCurso);

//Sql
$sql = "DELETE FROM cursos WHERE idCurso = '$idCurso'";

if (mysqli_query($conexao, $sql)) {
    http_response_code(200); // OK
    echo json_encode(["message" => "Curso excluído com sucesso."]);
} else {
    http_response_code(500); // Internal Server Error
    echo json_encode(["error" => "Erro ao excluir curso: " . mysqli_error($conexao)]);
}

// Fechar a conexão com o banco de dados
mysqli_close($conexao);

?>