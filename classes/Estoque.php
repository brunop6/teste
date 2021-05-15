<?php
use Estoque as GlobalEstoque;

class Estoque{
        
        public function retornar_itens_em_falta(){
            if(true){
                return 1;
            }
            else{
                return null;
            }
        }

        public function gerar_lista_compras(){
            $estoque = new GlobalEstoque();
            if($estoque->retornar_itens_em_falta() != null){
                header("Location: ./listaCompras/lista_compras.php?opt=2");
            }
        }
    }
?>