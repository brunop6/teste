<?php
    /**
     * EXEMPLO 1:
     * -------RECEITA------
     * 4 LEITE CONDENSADO
     * 
     * ESTOQUE: LEITE CONDENSADO
     * LOTE 1:
     *      PREÇO: 4,60
     *      QNT..: 1 UNIDADE(S)
     * 
     * LOTE 2:
     *      PREÇO: 5,19;
     *      QNT..: 10 UNIDADE(S)
     */

    //Valores simulados do banco
    $quantidadeRec = 4;

    $item = "LEITE CONDENSADO";
    $unidadeMedItem = 'UNIDADE(S)';
    $quantidadeItem = 1;

    $lote = [1, 2];

    $quantidadeEstoque[0] = 1;
    $preco[0] = 4.60;

    $quantidadeEstoque[1] = 10;
    $preco[1] = 5.19;

    $i = 0;                 //Índice para utilizar as quantidades de estoque e preços dos respectivos lotes
    $count = 0;             //Contador para controlar a quantidade de vezes que o laço será executado
    $custo = 0;             //Custo final do ingrediente na receita

    /**
     * Se a quantidade utilizada na receita for superior a disponivel no primeiro lote do item, 
     * é realizado o processo para utilizar dois lotes.
     * Senão,
     * é realizado o cálculo simples.
     */
    if($quantidadeRec > $quantidadeEstoque[0]){
        $quantUsadaLote1 = 0;   //Variável p/ armazenar a quantidade de estoque utilizada do primeiro lote
        $custo1 = 0;            //Variável p/ armazenar o custo do primeiro lote

        foreach($lote as $value){
            while($count < $quantidadeRec){

                /**
                 * Se o lote tiver estoque disponível,
                 *  o contador é incrementado e o estoque do lote é subtraido.
                 * Senão, 
                 * passa para o próximo lote.
                 */
                if($quantidadeEstoque[$i] > 0){
                    $count++;
                    $quantidadeEstoque[$i]--;

                    //Se o estoque do lote acabar, é calculado a quantidade usada deste lote
                    if($quantidadeEstoque[$i] == 0){
                        $custo1+=(($count)*$preco[$i])/$quantidadeItem;
                        $quantUsadaLote1 = $count;
                    }
                }else{
                    break 1;
                }
            }
            $i++;
        }

        $quantUsadaLote2 = $count - $quantUsadaLote1;                          //Quantidade utilizada do estoque do segundo lote
        $custo+=((($quantUsadaLote2)*$preco[$i-1])/$quantidadeItem) + $custo1; //Custo total
        $custo2 = $custo - $custo1;                                            //Custo do segundo lote

        echo '<h2>Receita:</h2><br>';
        echo "$quantidadeRec $item => R$ $custo<br><br>";
        echo "CUSTOS: <br>(LOTE: $lote[0]) $quantUsadaLote1 $unidadeMedItem => R$ $custo1;<br>";
        echo "(LOTE: $lote[1]) $quantUsadaLote2 $unidadeMedItem => R$ $custo2";
    }else{
        $custo = (($quantidadeRec)*$preco[0])/$quantidadeItem;

        echo '<h2>Receita:</h2><br>';
        echo "$quantidadeRec $item => R$ $custo<br><br>";
        echo "PREÇO: R$ $preco[0] => $quantidadeItem $unidadeMedItem";
    }
?>