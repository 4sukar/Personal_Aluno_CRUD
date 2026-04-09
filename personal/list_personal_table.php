<?php
require_once "../db.php";
$conexao = getConexao();

$busca = $_GET['busca'] ?? '';

$query = "SELECT * FROM personal";

if($busca != '') {
    $query .= " WHERE personalName LIKE '%$busca%'";
}

$result = mysqli_query($conexao, $query);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Personais</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<h2>Lista de Personais</h2>

<form method="GET">
    <input type="text" name="busca" placeholder="Buscar personal" value="<?= $busca ?>">
    <input type="submit" value="Buscar">
</form>

<a href="add_personal_form.php" class="btn editar">+ Novo Personal</a>

<table>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Gênero</th>
        <th>Valor</th>
        <th>Ações</th>
    </tr>

<?php
while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
        <td>{$row['personalID']}</td>
        <td>{$row['personalName']}</td>
        <td>{$row['genero']}</td>
        <td>R$ {$row['valor']}</td>
        <td>

            <form action='perfil_personal.php' method='GET' style='display:inline;'>
                <input type='hidden' name='id' value='{$row['personalID']}'>
                <input type='submit' value='Ver Perfil'>
            </form>

            <form action='edit_personal_form.php' method='GET' style='display:inline;'>
                <input type='hidden' name='id' value='{$row['personalID']}'>
                <input type='submit' value='Editar'>
            </form>

            <form action='delete_personal.php' method='POST' style='display:inline;'>
                <input type='hidden' name='id' value='{$row['personalID']}'>
                <input type='submit' value='Deletar'>
            </form>

        </td>
    </tr>";
}

mysqli_close($conexao);
?>

</table>

</body>
</html>