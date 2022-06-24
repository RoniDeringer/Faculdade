<?php
include_once "conf/default.inc.php";
require_once "conf/Conexao.php";

$pdo = Conexao::getInstance();

$stmt = $pdo->prepare('INSERT INTO marca(descricao) VALUES(:descricao)');
$stmt->bindParam(':descricao', $descricao, PDO::PARAM_STR);
$descricao = $_POST['descricao'];
$stmt->execute();
header("location:index.php");
?>