<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Cidade</title>
    <link rel="stylesheet" href="estilo.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abel&family=Red+Hat+Display:wght@300&display=swap" rel="stylesheet">

</head>
<h1> Cadastro de Hobbies </h1>
<div class='row'>
        <div class='col-12'>
            <form action="acaoHobbies.php" method="post">
                <div class='row'>
                    <div class='col-2'>
                        <label for="hobbie">Insira seu Hobbie:</label>
                    </div>
                    <div class='col-10'>
                        <input type="text" id='hobbies' name='hobbies'>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-12'>
                        <button type='submit' name='acao' id='acao' value='salvar'>Salvar</button>
                    </div>
                    </div>       
            </form>
        </div>
    </div>
</div>    
</body>