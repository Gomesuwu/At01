<?php
    require_once "config.inc.php";
    $acao = isset($_POST["acao"]) ? $_POST["acao"] : $_GET["acao"];
    switch ($acao) {
        case 'salvar':
            salvar();
            break;
        
        case 'delete':
            delete();
            break;
        default:
            # code...
            break;
    }
    function salvar(){
        $hobbie = isset($_POST["hobbie"]) ? $_POST["hobbie"] : "";
        $usu = isset($_POST["usu"]) ? $_POST["usu"] : "";
        var_dump($_POST);
        $conexao = new PDO(PERFIL ,USER, PASSWORD);;
        $sql = $conexao->query("insert into amigo_hobbie values ('$usu', '$hobbie');");
        header("location:show.php?id=$usu");
    }
    function delete(){
        $hobbie = isset($_GET["hobbie"]) ? $_GET["hobbie"] : "";
        $usu = isset($_GET["usu"]) ? $_GET["usu"] : "";
        $conexao = new PDO(PERFIL ,USER, PASSWORD);
        $sql = $conexao->prepare("delete from amigo_hobbie where id_hobbie = $hobbie;");
        $sql->execute();
        header("location:show.php?id=$usu");
    }
?>