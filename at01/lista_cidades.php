<?php
require_once('config.inc.php');
$conexao = new PDO(PERFIL ,USER, PASSWORD);
if (!$conexao){
    echo 'Erro ao conectar';
    die();   // interrompe a execução do script caso ocorra erro
}else{
    $consulta = 'SELECT * FROM cidade';
    $query = $conexao->prepare($consulta);
    $query->execute();
    $cidades = $query->fetchAll();
    echo json_encode($cidades);
}
?>