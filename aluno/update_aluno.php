<?php
require_once "../db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $conexao = getConexao();

    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $personal_id = $_POST["personal_id"];
    $genero = $_POST['genero'];

    $query = "UPDATE aluno 
              SET alunoName = '$nome',
                  personalAluno = $personal_id
              WHERE alunoID = $id";

    if (mysqli_query($conexao, $query)) {
        header("Location: list_aluno_table.php");
        exit;
    } else {
        echo "Erro: " . mysqli_error($conexao);
    }

    mysqli_close($conexao);
}
?>