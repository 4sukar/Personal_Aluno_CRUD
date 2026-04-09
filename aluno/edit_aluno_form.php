<?php
require_once "../db.php";

$conexao = getConexao();

$id = $_GET["id"];

$query = "SELECT * FROM aluno WHERE alunoID = $id";
$result = mysqli_query($conexao, $query);
$row = mysqli_fetch_assoc($result);

$nome = $row["alunoName"];
$personal_id = $row["personalAluno"];

// pegar personais
$query2 = "SELECT * FROM personal";
$result2 = mysqli_query($conexao, $query2);

mysqli_close($conexao);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Aluno</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<h2>Editar Aluno</h2>

<form action="update_aluno.php" method="POST">

    <input type="hidden" name="id" value="<?php echo $id; ?>">

    <label>Nome:</label>
    <input type="text" name="nome" value="<?php echo $nome; ?>">

    <br><br>

    <label>Personal:</label>
    <select name="personal_id">

        <?php
        while($p = mysqli_fetch_assoc($result2)) {
            $selected = ($p['personalID'] == $personal_id) ? "selected" : "";
            echo "<option value='{$p['personalID']}' $selected>{$p['personalName']}</option>";
        }
        ?>

    </select>

    <br><br>

    <input type="submit" value="Salvar">

    <label>Gênero:</label>
<select name="genero">
    <option value="male" <?= $aluno['genero']=='male'?'selected':'' ?>>Masculino</option>
    <option value="female" <?= $aluno['genero']=='female'?'selected':'' ?>>Feminino</option>
    <option value="other" <?= $aluno['genero']=='other'?'selected':'' ?>>Outro</option>
</select>

</form>

</body>
</html>