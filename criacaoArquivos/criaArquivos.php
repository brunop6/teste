<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manipulação de Arquivos</title>
</head>
<body>
    <?php
        require __DIR__.'/vendor/autoload.php';

        use Dompdf\Dompdf;

        //Instanciação do objeto dompfd
        $dompdf = new Dompdf();

        $dompdf->loadHtml('
        <h1>PDF gerado com PHP!</h1>
        <ul>
            <li>Top 1</li>
            <li>Top 2</li>
            <li>Top 3</li>
        </ul>
        ');

        //Renderização do arquivo PDF
        $dompdf->render();

        //Imprime o conteudo do pdf na tela
        header('Content-type: application/pdf');
        echo $dompdf->output();
    ?>
    
</body>
</html>