<?php 

//Incluir a conexão com banco de dados
include('conexao.php');

//Obter os dados
$obterDados = file_get_contents('php://input');   

//Extraír os dados
$extrair = json_decode($obterDados);   

//Separa os dados do JSON
$nomeCurso = $extrair->cursos->nomeCurso;
$valorCurso = $extrair->cursos->valorCurso;

//Sql
$sql = "INSERT INTO cursos (nomeCurso, valorCurso) VALUES ('$nomeCurso', '$valorCurso')";
mysqli_query($conexao, $sql);

//Exportar  os dados cadastrados
$curso = [
    'nomeCurso' => $nomeCurso,
    'valorCurso' => $valorCurso
];

echo json_encode(['curso' => $curso]);

?>