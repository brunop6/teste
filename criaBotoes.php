<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <script>

        function novoItem(){
            //Removendo o botão Inserir Ingrediente
            document.getElementById("add").remove();
            
            //Definição dos novos elementos
            var p = document.createElement("p");
            var input = document.createElement("input");
            var btnAdd = document.createElement("button");

            input.placeholder = "Ingrediente";            
            btnAdd.textContent = "Inserir Ingrediente";
            btnAdd.id = "add";
            btnAdd.addEventListener("click", novoItem);

            //Inserindo o input dentro da tag p
            p.appendChild(input);

            //Inserindo os novos elementos no corpo da página
            document.body.appendChild(p);
            document.body.appendChild(btnAdd);
        }

    </script>
    <header>
        <h1>Teste dos Botões</h1>
    </header>
    <button id="add" onclick="novoItem()">Inserir Ingrediente</button>
</body>
</html>