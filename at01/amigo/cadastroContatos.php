<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        include_once('../conexao.php');
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Contatos</title>
    <link rel="stylesheet" href="estilo.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abel&family=Red+Hat+Display:wght@300&display=swap" rel="stylesheet">
   <script src="scriptcontatos.js"></script>
</head>
<body>
    <h1>Cadastro de Amigos</h1>
    <div class='row'>
        <div class='col-12'>
            <form action="acao.php" method='post'>
                <div class='row'>
                    <input type= 'hidden' value='0' name='codigo'>
                    <div class='col-2'>
                        <label for="nome">Nome:</label>
                    </div>
                    <div class='col-4'>
                        <input type="text" name='nome' id='nome'>
                    </div>
                    <div class='col-2'>
                        <label for="nome">Sobrenome:</label>
                    </div>
                    <div class='col-4'>
                        <input type="text" name='sobrenome' id='sobrenome'>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-2'>
                        <label for="email">
                            E-mail:
                        </label>
                    </div>
                    <div class='col-4'>
                        <input type="email" name='email' id='email'>
                    </div>
                    <div class='col-2'>
                        <label for="datanasc">
                            Data de Nascimento:
                        </label>
                    </div>
                    <div class='col-4'>
                        <input type="date" name='datanasc' id='datanasc'>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-2'>
                        <label for="telefone">
                            Telefone:
                        </label>
                    </div>
                    <div class='col-4'>
                        <input type="phone" name='telefone' id='telefone'>
                    </div>
                    <div class='col-2'>
                        <label for="cidade">
                            Cidade:
                        </label>
                    </div>
                    <div class='col-4'>
                        <select name="cidade" id="cidade">
                            <?php
                                    $conexao = Conexao::getInstance();
                                    $consulta=$conexao->query("SELECT id, nome FROM at01.cidade;");
                                    while($linha=$consulta->fetch(PDO::FETCH_ASSOC)){
                                        echo " <option value='".$linha['id']."'>".$linha['nome']."</option>";

                                    }
                            ?>
                        </select>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-2'>
                        <label for="observacao">
                            Observações:
                        </label>
                    </div>
                    <div class='col-10'>
                        <textarea name="observacao" id="observacao" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-2'>
                        <label for="vivo">
                            Vivo:
                        </label>
                    </div>
                    <div class='col-10'> 
                        <input type="checkbox" id='vivo' name='vivo' checked>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-12'> 
                        <button name='acao' id='acao' value='salvar' type='submit'>Salvar</button>    
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>