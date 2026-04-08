<?php
require_once "../db.php";
$conexao = getConexao();

// pegar todos os personais
$query = "SELECT * FROM personal";
$result = mysqli_query($conexao, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastrar Aluno</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<h2>Cadastrar Aluno</h2>

<form action="add_aluno.php" method="POST">

    <label>Nome:</label>
    <input type="text" name="nome" required>

    <br><br>

    <label>Personal:</label>
    <select name="personal_id" required>
        <option value="">-- Escolha --</option>

        <?php
        while($row = mysqli_fetch_assoc($result)) {
            echo "<option value='{$row['personalID']}'>{$row['personalName']}</option>";
        }
        ?>
    </select>

    <br><br>

    <input type="submit" value="Cadastrar">

</form>

</body>
</html>

<?php mysqli_close($conexao); ?>