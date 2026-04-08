<?php
require_once "../db.php";

$conexao = getConexao();

$id = $_GET["id"];

$query = "SELECT * FROM personal WHERE personalID = $id";
$result = mysqli_query($conexao, $query);
$row = mysqli_fetch_assoc($result);

$nome = $row["personalName"];

mysqli_close($conexao);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Personal</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<div class="container">
    <h2>Editar Personal</h2>

    <form action="update_personal.php" method="POST" class="form-box">
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <label>Nome:</label>
        <input type="text" name="nome" value="<?php echo $nome; ?>" required>

        <div class="botoes">
            <button type="submit" class="btn editar">Salvar</button>
            <a href="list_personal_table.php" class="btn voltar">Voltar</a>
        </div>
    </form>
</div>

</body>
</html>