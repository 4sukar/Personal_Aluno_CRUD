<?php
require_once "../db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $conexao = getConexao();

    $id = $_POST["id"];
    $nome = $_POST["nome"];

    $query = "UPDATE personal 
              SET personalName = '$nome' 
              WHERE personalID = $id";

    if (mysqli_query($conexao, $query)) {
        header("Location: list_personal_table.php?msg=editado");
        exit;
    } else {
        echo "Erro ao atualizar: " . mysqli_error($conexao);
    }

    mysqli_close($conexao);
}
?>