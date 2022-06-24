<?php

    include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";

    $codigo = isset($_GET['codigo']) ? $_GET['codigo'] : "0";

    $pdo = Conexao::getInstance();
    $consulta = $pdo->query("DELETE FROM marca WHERE codigo = $codigo");
    include_once "conf/default.inc.php";
     require_once "conf/Conexao.php";
    header('location:index11.php');


?>