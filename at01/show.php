<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php
        require_once "config.inc.php";
        $id = isset($_GET["id"]) ? $_GET["id"] : "";
        $conexao = new PDO(PERFIL ,USER, PASSWORD);
        $sql = $conexao->query("select * from amigo where amigo.id = '$id';");
        while($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
            echo "<table border=1>";
            echo "<tr><td><b>ID:</b> {$linha["id"]}</td><td><b>NOME:</b> {$linha["nome"]}</td><td><b>SOBRENOME:</b> {$linha["sobrenome"]}</td><td><b>EMAIL:</b> {$linha["email"]}</td><td><b>TELEFONE:</b> {$linha["telefone"]}</td></option>";
            echo "</table>";
        }
        
    ?>
    <h3>HOBBIES:</h3>
    <form action="acao_assoc.php" method="post">
        <input type="hidden" name="usu" id="usu" value="<?= $id; ?>">
        <h4><select name="hobbie" id="hobbie" onchange="clean()"><option id="void">---</option>
            <?php
                
                $pais = isset($_GET["pais"]) ? $_GET["pais"] : "";
                $conexao = new PDO(PERFIL ,USER, PASSWORD);
                $sql = $conexao->query("select * from hobbies;"); 
                while($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='{$linha["idhobbies"]}'>{$linha["hobbies"]}</option>";
                }
            ?>
        </select><button type="submit" name="acao" id="acao" value="salvar" disabled="true">+</button></h4>   
    </form>
    <?php
        
        $id = isset($_GET["id"]) ? $_GET["id"] : "";
        $conexao = new PDO(PERFIL ,USER, PASSWORD);
        $sql = $conexao->query("select hobbies.idhobbies, hobbies.hobbies from amigo, amigo_hobbie, hobbies where amigo.id = amigo_hobbie.id_amigo and amigo_hobbie.id_hobbie = hobbies.idhobbies and '$id' = amigo.id;");
        echo "<table border=1>";
        while($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
            //var_dump($linha);
            echo "
            <tr>
                <td>{$linha["idhobbies"]}</td>
                <td>{$linha["hobbies"]}</td>
                <td><a href='acao_assoc.php?acao=delete&hobbie={$linha["idhobbies"]}&usu=$id'>Delete</a></td>
            </tr>
            ";
        }
        echo "</table>";
        
    ?>
    <script>
        function clean() {
            var node = document.getElementById("void");
            if (node.parentNode) {
                node.parentNode.removeChild(node);
            }    
            var btn = document.getElementById("acao");
            btn.removeAttribute("disabled");
            console.log('oi');
        }
        
    </script>
</body>
</html>