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
     *      PREÇO: 5,19
     *      QNT..: 2 UNIDADE(S)
     * 
     * LOTE 3: 
     *      PRECO: 5,30
     *      QNT..: 10 UNIDADE(S)
     */

    //Valores simulados do banco
    $quantidadeRec = 4;

    $item = "LEITE CONDENSADO";
    $unidadeMedItem = 'UNIDADE(S)';
    $quantidadeItem = 1;

    $lote = [1, 2, 3];

    $quantidadeEstoque[0] = 1;
    $preco[0] = 4.60;

    $quantidadeEstoque[1] = 2;
    $preco[1] = 5.19;

    $quantidadeEstoque[2] = 10;
    $preco[2] = 5.30;

    $i = 0;                //Índice para utilizar as quantidades de estoque e preços dos respectivos lotes
    $count = 0;            //Contador para controlar a quantidade de vezes que o laço será executado
    $custoTotal = 0;       //Custo final do ingrediente na receita
    $quantUsadaLote = [];  //Variável p/ armazenar as quantidades de estoque utilizadas dos lotes
    $custo = [];           //Variável p/ armazenar os custos dos lotes

    /**
     * Se a quantidade utilizada na receita for superior a disponivel no primeiro lote do item, 
     * é realizado o processo para utilizar dois lotes.
     * Senão,
     * é realizado o cálculo simples.
     */
    if($quantidadeRec > $quantidadeEstoque[0]){
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

                    /**
                     * Se o estoque do lote acabar, ou a quantidade necessária for suprida,
                     * é calculado a quantidade usada deste lote
                     */
                    if($quantidadeEstoque[$i] == 0 || $count == $quantidadeRec){
                        $quantUsadaLote[$i] = $count;
                        /**
                         * Se houver a atribuição da quantidade de mais de um lote,
                         * o valor do lote seguinte é igual a quantidade utilizada na receita menos as quantidades dos lotes anteriores 
                         */
                        if(count($quantUsadaLote) >= 2){
                            for($j = 0; $j < count($quantUsadaLote)-1; $j++){
                                $quantUsadaLote[$i]-=$quantUsadaLote[$j];
                            }
                        }
                        $custo[$i] = (($quantUsadaLote[$i])*$preco[$i])/$quantidadeItem;  
                    }
                }else{
                    break 1;
                }
            }
            $i++;
        }

        echo '<h2>Receita</h2>';
        
        //Custo total = soma dos custos de todos os lotes utilizados
        for($j=0; $j < $i; $j++){
            $custoTotal+=$custo[$j];
        }

        echo "$quantidadeRec $item => R$ $custoTotal<br><br>";
        
        $i = 0;
        foreach($lote as $value){
            echo "LOTE $value: $custo[$i] => $quantUsadaLote[$i] $unidadeMedItem<br>";
            $i++;
        }
    }else{
        $custoTotal = (($quantidadeRec)*$preco[0])/$quantidadeItem;

        echo '<h2>Receita:</h2><br>';
        echo "$quantidadeRec $item => R$ $custoTotal<br><br>";
        echo "PREÇO: R$ $preco[0] => $quantidadeItem $unidadeMedItem";
    }
?>