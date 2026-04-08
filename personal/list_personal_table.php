<?php
require_once "../db.php";
$conexao = getConexao();

$query = "SELECT * FROM personal";
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
 <a href="add_personal_form.php" class="btn editar">+ Novo Personal</a>
<table>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Ações</th>
    </tr>

<?php
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $personalID = $row['personalID'];
        $personalName = $row['personalName'];

        echo "<tr>
        <td>$personalID</td>
        <td>$personalName</td>
        <td>
            <div class='acoes'>

                <form action='edit_personal_form.php' method='GET'>
                    <input type='hidden' name='id' value='$personalID'>
                    <input type='submit' value='Editar' class='btn editar'>
                </form>

                <form action='delete_personal.php' method='POST'>
                    <input type='hidden' name='id' value='$personalID'>
                    <input type='submit' value='Deletar' class='btn deletar'>
                </form>

            </div>
        </td>
        </tr>";
    }
}

mysqli_close($conexao);
?>

</table>

</body>
</html>