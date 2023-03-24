<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cidades</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abel&family=Red+Hat+Display:wght@300&display=swap" rel="stylesheet">
    <script src="../script.js"></script>  
    <script src="../js/excluir.js"></script>
    <nav class="menu">
        <ul>
            <li><a href='cadastroContatos.php'>Cadastro de Amigos</a></li>
        </ul>
    </head>
    <body id="body" class="body">
    <table class="table table-striped">
    <thead>
        <tr class='table-titulo'>
            <th>Código</th>
            <th>Nome</th> 
            <th>Sobrenome</th>
            <th>Email</th>
            <th>Data de Nascimento</th>
            <th>Telefone</th>
            <th>Cidade</th>
            <th>Detalhes</th>
            <th>Editar</th>
            <th>Excluir</th>   
        </tr>
    </thead>
    <tbody>
<?php
    require_once('../Conexao.php');

    $coenxao = Conexao::getInstance();
    $consulta=$coenxao->query("SELECT id, nome, sobrenome, email, telefone, datanasc, cidade FROM at01.amigo;");
    while($linha=$consulta->fetch(PDO::FETCH_ASSOC)){
            echo "<tr>
                   <td>{$linha['id']}</td>
                   <td>{$linha['nome']}</td>
                   <td>{$linha['sobrenome']}</td>
                   <td>{$linha['email']}</td>
                   <td>{$linha['telefone']}</td>
                   <td>{$linha['datanasc']}</td>
                   <td>{$linha['cidade']}</td>"; 
            echo   "  
                <td><a class='btn btn-warning' href='detalhes.php?codigo={$linha['id']}'>Detalhes</a></td>   
                <td><a class='btn btn-warning' href='cadastroContatos.php?acao=editar&codigo={$linha['id']}'>Editar</a></td>
                <td><a class='btn btn-danger' onClick = 'return excluir();' href='acao.php?acao=excluir&codigo={$linha['id']}'>Excluir</a></td>
                </tr>\n";
        }
?>
</tbody>
</table>

    </body>
    </html>