<?php 

//Incluir a conexão com banco de dados
include('conexao.php');

//Obter os dados
$obterDados = file_get_contents('php://input'); 

//Extraír os dados
$extrair = json_decode($obterDados); 


//Separa os dados do JSON
$idCurso = mysqli_real_escape_string($conexao, $extrair->cursos->idCurso);
$nomeCurso = mysqli_real_escape_string($conexao, $extrair->cursos->nomeCurso);
$valorCurso = mysqli_real_escape_string($conexao, $extrair->cursos->valorCurso);
//Sql
$sql = "UPDATE cursos SET nomeCurso='$nomeCurso', valorCurso='$valorCurso' WHERE idCurso = '$idCurso'";

if (mysqli_query($conexao, $sql)) {
    // A atualização foi bem-sucedida, vamos exportar os dados atualizados
    $curso = [
        'idCurso' => $idCurso,
        'nomeCurso' => $nomeCurso,
        'valorCurso' => $valorCurso
    ];

    // Retornar os dados atualizados em formato JSON
    echo json_encode(['curso' => $curso]);
} else {
    // Ocorreu um erro na atualização
    http_response_code(500); // Internal Server Error
    echo json_encode(['error' => 'Erro ao atualizar curso: ' . mysqli_error($conexao)]);
}

// Fechar a conexão com o banco de dados
mysqli_close($conexao);

?>

// mysqli_query($conexao, $sql);

// //Exportar  os dados cadastrados
// $curso = [
//     'idCurso' => $idCurso,
//     'nomeCurso' => $nomeCurso,
//     'valorCurso' => $valorCurso
// ];

// echo json_encode(['curso' => $curso]);

?>