<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Compras</title>
</head>
<body>
    <h1>Itens em Falta no Estoque</h1>
    <hr>
    <ul>
        <?php
            for($i=1;$i<=5;$i++){
                echo "<li>Tópico $i</li>";
            }
        ?>
    </ul>
    
</body>
</html>