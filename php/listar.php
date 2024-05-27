<?php 

//Incluir a conexão com banco de dados
include('conexao.php');

//Sql

$sql='SELECT * FROM cursos';

//Executar a consulta
$executar = mysqli_query($conexao, $sql);

//Vetor
$cursos = [];

//Indice
$indice = 0;

//Laço
while($linha = mysqli_fetch_assoc($executar)){
    $cursos[$indice]['idCurso'] = $linha['idCurso'];
    $cursos[$indice]['nomeCurso'] = $linha['nomeCurso'];
    $cursos[$indice]['valorCurso'] = $linha['valorCurso'];

    $indice++;
}

//Json
echo json_encode(['cursos' => $cursos]);

?>