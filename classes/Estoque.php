<?php
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
            header('Location: ../listaCompras/lista_compras_pdf.php');
        }
    }
?>