<?php 
require_once "../db.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conexao = getConexao();
    $id = $_POST["id"];

    $query = "DELETE FROM personal WHERE personalID = $id";

    if (mysqli_query($conexao, $query)) {
        header("Location: list_personal_table.php");
        exit;
    } else {
        echo "Erro ao deletar: " . mysqli_error($conexao);
    }

    mysqli_close($conexao);
}
?>