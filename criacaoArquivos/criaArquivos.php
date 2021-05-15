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
        use Dompdf\Options;

        //Instanciação do objeto options
        $options = new Options();
        $options->setIsJavascriptEnabled(true);
        //Configuração da root para o diretório atual
        $options->setChroot(__DIR__);

        //Instanciação do objeto dompdf
        $dompdf = new Dompdf($options);

        //Armazenamento das saídas do arquivo em buffer
        ob_start();
        require 'arquivo.php';

        //Envio do valor do buffer para a a classe
        $dompdf->loadHtml(ob_get_clean());

        //Renderização do arquivo PDF
        $dompdf->render();

        //Imprime o conteudo do pdf na tela
        header('Content-type: application/pdf');
        echo $dompdf->output();
    ?>
    
</body>
</html>