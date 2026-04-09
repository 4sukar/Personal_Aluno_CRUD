<?php

require_once "../db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST"){ 
    $conexao = getConexao();

    $nome = $_POST["nome"];
    $valor = $_POST["valor"];
    $genero = $_POST["genero"];

    $query = "INSERT INTO personal (personalName, valor, genero) 
              VALUES('$nome', $valor, '$genero')";

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
<html>
<head>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<form action="add_personal_form.php" method="POST">

    <label>Nome:</label>
    <input type="text" name="nome" required><br><br>

    <label>Valor mensal:</label>
    <input type="number" name="valor" step="0.01" required><br><br>

    <label>Gênero:</label>
    <select name="genero">
        <option value="male">Masculino</option>
        <option value="female">Feminino</option>
        <option value="other">Outro</option>
    </select>

    <br><br>

    <input type="submit" value="Cadastrar Personal">

</form>

</body>
</html>