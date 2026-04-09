<?php 

function getConexao() {
$sevidor = "localhost:32772";
$usuario = "root";
$senha = "";
$banco = "dbPersonal";
    $conexao =  mysqli_connect($sevidor, $usuario, $senha, $banco);
 
    if (!$conexao) {
        die("Falha na conexão: " . mysqli_connect_error());
    }
 
    return $conexao;
}

?>