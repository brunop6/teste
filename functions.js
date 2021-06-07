function novoItem(){
    //Removendo o botão Inserir Ingrediente
    document.getElementById("add").remove();
    
    //Definição dos novos elementos
    var p = document.createElement("p");
    var input = document.createElement("input");
    var btnAdd = document.createElement("button");
    var form = document.getElementById("formulario");
    var cadastrar = form.lastChild;

    input.placeholder = "Ingrediente";            
    btnAdd.textContent = "Inserir Ingrediente";
    btnAdd.id = "add";
    btnAdd.addEventListener("click", novoItem);

    form.insertBefore(p, cadastrar);
    //form.appendChild(p);
    //Inserindo o input dentro da tag p
    p.appendChild(input);

    //Inserindo os novos elementos no corpo da página
    document.body.appendChild(p);
    document.body.appendChild(btnAdd);
    
}
