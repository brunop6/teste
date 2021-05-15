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
    <?php
        require_once '../classes/Estoque.php';

        $estoque = new Estoque();

        $itens = $estoque->retornar_itens_em_falta();
        $itens = array('Farinha de trigo', 'Ovos', 'Leite Condensado');

        foreach($itens as $i => $row){
            echo "
                <p>
                    <input type='checkbox' id='item$i'>
                    <label for='item'>$row</label>
                </p>
            ";
        }

        if(!isset($_GET['opt'])){
            $opt = 1;
        }else{
            $opt = $_GET['opt'];
        }

        if($opt == 2){
            header("Location: ./criaPdf.php");
        }
    ?>
</body>
</html>