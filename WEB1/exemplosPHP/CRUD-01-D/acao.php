<?php
include_once "conf/default.inc.php";
require_once "conf/Conexao.php";

$pdo = Conexao::getInstance();

$acao = isset($_GET['acao']) ? $_GET['acao'] : $_POST['acao'];
//acao vai pegar os dados via get(pelo link <a>) e pelo post(formulario)
if($acao =='excluir'){
    $smt = $pdo->prepare('DELETE FROM MARCA WHERE codigo= :id');
    $smt->bindParam(':id',$id);
    $id = $_GET['id'];
    $smt->execute();
    header('location:index.php');
}
if($acao == 'salvar'){
    $stmt = $pdo->prepare('INSERT INTO marca(descricao) VALUES(:descricao)');
    $stmt->bindParam(':descricao', $descricao, PDO::PARAM_STR);
    $descricao = $_POST['descricao'];
    $stmt->execute();
    header("location:index.php");   
}
?>