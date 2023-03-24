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
            <li><a href='../index.html'> Página Incial</a></li>
        </ul>
    </head>
    <body id="body" class="body">
    <table class="table table-striped" border="1px">
    <thead>
        <tr class='table-titulo'>
            <th>Hobbies</th>
        </tr>
    </thead>
    <tbody>
        </tr>
        <td></td>
<?php
    require_once('../Conexao.php');

    $conexao = Conexao::getInstance();
    $consulta=$conexao->query("SELECT * FROM at01.amigo_hobbie;");
    while($linha=$consulta->fetch(PDO::FETCH_ASSOC)){
        $consulta2=$conexao->query("SELECT hobbies FROM at01.hobbies where idhobbies = ".$linha['id_hobbie'].";");
                 /*
                echo "<tr>
                   <td>{$linha['id_amigo']}</td>
                   <td>{$linha['id_hobbie']}</td>
                   "; 
                */
                while ($coluna=$consulta2->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr><td>".$coluna['hobbies']."</td></tr>";
                }
                }
                echo "teste";

?>
</tbody>
</table>

    </body>
    </html>