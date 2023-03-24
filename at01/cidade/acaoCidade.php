<?php
require_once "../conexao.php";
$acao = "";
switch($_SERVER['REQUEST_METHOD']) {
    case 'GET':  $acao = isset($_GET['acao']) ? $_GET['acao'] : ""; break;
    case 'POST': $acao = isset($_POST['acao']) ? $_POST['acao'] : ""; break;
}

switch($acao){
    case 'excluir': excluir(); break;
    case 'salvar': {
        $codigo = isset($_POST['codigo']) ? $_POST['codigo'] : 0;
        echo $codigo;
        if ($codigo == 0)
            salvar(); 
        else
            editar();
        break;
    }
}

/*function excluir(){    
    $codigo = isset($_GET['codigo']) ? $_GET['codigo']:0;
    $conexao = Conexao::getInstance();
    $stmt = $conexao->prepare("DELETE FROM amigo WHERE id = :codigo");
    $stmt->bindParam('codigo', $codigo, PDO::PARAM_INT);  
    $stmt->execute();
    header("location:tabelaamigo.php");
}

function editar(){
    $dados = FormToArray();
    var_dump($dados);
    $conexao = Conexao::getInstance();
    $conexao = $conexao->query("UPDATE amigo SET nome = '".$dados['nome']."',
                               sobrenome = '".$dados['sobrenome']."', email = '".$dados['email']."', telefone = '".$dados['telefone']."', datanasc = '". $dados['datanasc'] ."', oberservacao = '" . $dados['observacao']."'
                              WHERE id =". $dados['id'].";");
    header("location:cadastroContatos.php");
}
*/
function salvar(){
    $dados = formToArray();
    $conexao = Conexao::getInstance();
    $conexao = $conexao->query("INSERT INTO cidade (nome, estado) VALUES ('".$dados['nome']."', '" . $dados['estado']. "');");
    
    header("location:cadastroCidade.php");

}

function findById($codigo){
    $conexao = Conexao::getInstance();
    $conexao = $conexao->query("SELECT * FROM funcionarios WHERE codigo_func = $codigo;");
    $result = $conexao->fetch(PDO::FETCH_ASSOC);
    return $result; 
}

function formToArray(){
    $codigo = isset($_POST['codigo']) ? $_POST['codigo']: 0;
    $nome = isset($_POST['nome']) ? $_POST['nome']: 0;
    $estado = isset($_POST['estado']) ? $_POST['estado']: 0;




    $dados = array(
    'codigo' => $codigo,
    'nome' => $nome,
    'estado' => $estado
    );

    return $dados;

};

?>