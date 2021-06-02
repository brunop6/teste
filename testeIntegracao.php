<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste PHP e JS</title>
    <script type="text/javascript">
        function rodarPHP(){
            var phpQuery = "<?php
                echo 'rodando PHP';
                for($i=0; $i<=10; $i++){
                    echo '<br>'.$i;
                }
            ?>";
            
            document.write(phpQuery);
        }
        function rodarJS(){
            document.write("rodando JS");
            for(var i=0; i<=10; i++){
                //print() <- esse comando imprime um print da tela
                document.write('<br>'+i);
            }
        }
    </script>
</head>
<body>
    <form onsubmit="teste()">
        <p>
            <input type="text" id="fala">
        </p>
        <p>
            <input type="text" id="fala2">
        </p>
        <p>
            <input type="button" onclick="rodarPHP()" value="PHP">
            <input type="button" onclick="rodarJS()" value="JavaScript">
        </p>
        <!--Teste git-->
    </form>
</body>
</html>