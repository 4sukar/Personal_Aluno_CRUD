<?php
require_once "../db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $conexao = getConexao();

    $nome = $_POST["nome"];
    $personal_id = $_POST["personal_id"];

    $query = "INSERT INTO aluno (alunoName, personalAluno) 
              VALUES ('$nome', $personal_id)";

    if (mysqli_query($conexao, $query)) {
        header("Location: list_aluno_table.php");
        exit;
    } else {
        echo "Erro: " . mysqli_error($conexao);
    }

    mysqli_close($conexao);
}
?>