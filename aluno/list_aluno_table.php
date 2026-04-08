<?php
require_once "../db.php";
$conexao = getConexao();

// JOIN entre aluno e personal
$query = "SELECT aluno.alunoID, aluno.alunoName, personal.personalName
          FROM aluno
          JOIN personal ON aluno.personalAluno = personal.personalID";

$result = mysqli_query($conexao, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista de Alunos</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<h2>Lista de Alunos</h2>
<a href="add_aluno_form.php" class="btn editar">+ Novo Aluno</a>
<table>
    <tr>
        <th>ID</th>
        <th>Aluno</th>
        <th>Personal</th>
        <th>Ações</th>
    </tr>

<?php
while($row = mysqli_fetch_assoc($result)) {
    $id = $row['alunoID'];
    $aluno = $row['alunoName'];
    $personal = $row['personalName'];

    echo "<tr>
        <td>$id</td>
        <td>$aluno</td>
        <td>$personal</td>
        <td>

            <form action='edit_aluno_form.php' method='GET' style='display:inline;'>
                <input type='hidden' name='id' value='$id'>
                <input type='submit' value='Editar'>
            </form>

            <form action='delete_aluno.php' method='POST' style='display:inline;'>
                <input type='hidden' name='id' value='$id'>
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