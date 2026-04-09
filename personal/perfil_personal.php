<?php  
require_once "../db.php";
$conexao = getConexao();

$id = $_GET["id"];

// personal
$query = "SELECT * FROM personal WHERE personalID = $id";
$result = mysqli_query($conexao, $query);
$personal = mysqli_fetch_assoc($result);

// alunos
$query_alunos = "SELECT * FROM aluno WHERE personalAluno = $id";
$result_alunos = mysqli_query($conexao, $query_alunos);

$total = 0;
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<div class="card">

<h2><?= $personal['personalName'] ?></h2>

<p><strong>Gênero:</strong> <?= $personal['genero'] ?></p>
<p><strong>Valor por aluno:</strong> R$ <?= $personal['valor'] ?></p>

<hr>

<h3>Alunos:</h3>

<ul>
<?php
while($aluno = mysqli_fetch_assoc($result_alunos)) {
    echo "<li>".$aluno['alunoName']."</li>";
    $total++;
}
?>
</ul>

<hr>

<p><strong>Total de alunos:</strong> <?= $total ?></p>
<p><strong>Ganho mensal:</strong> R$ <?= $total * $personal['valor'] ?></p>

</div>

</body>
</html>

<?php
mysqli_close($conexao);
?>