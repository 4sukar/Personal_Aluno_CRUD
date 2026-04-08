<?php

require_once "../db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST"){ 
    $conexao = getConexao();
    $nome = $_POST["nome"];

    $query = "INSERT INTO personal (personalName) VALUES('$nome')";

    if (mysqli_query($conexao, $query)) {
        header("Location: list_personal_table.php");
        exit;
    } else {
        echo "Erro ao inserir Personal: " . mysqli_error($conexao);
    }

    mysqli_close($conexao);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Document</title>
</head>
<body>
    <form action="add_personal_form.php" method = "POST">
        <label>Nome:</label>
    <input type="text" name="nome" required><br><br>
     <input type="submit" value="Inserir Nome">  
    </form>
</body>
</html>