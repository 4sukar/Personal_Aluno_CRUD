<?php
require_once "../db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $conexao = getConexao();

    $id = $_POST["id"];

    $query = "DELETE FROM aluno WHERE alunoID = $id";

    if (mysqli_query($conexao, $query)) {
        header("Location: list_aluno_table.php");
        exit;
    } else {
        echo "Erro: " . mysqli_error($conexao);
    }

    mysqli_close($conexao);
}
?>