<?php

namespace Unimar\Poo;

use Unimar\Poo\Usuario;
use Unimar\Poo\Produto;
use Unimar\Poo\ContaCorrente;

class Cliente extends Usuario
{
    
    protected $carrinho = [];

    public function __construct(string $cpf, string $nome, string $sobrenome, string $email, string $senha){
        $this->cpf = $cpf;
        $this->nome = $nome;
        $this->sobrenome = $sobrenome;
        $this->email = $email;
        $this->senha = $senha;
        $this->conta = new ContaCorrente($this, 0);
    }

    public function adcionarCarrinho(Produto $produto, int $qtd): void{
        echo "item acionado ao carrinho de compras. \n";
        $this->carrinho[] = [
            "produto" => $produto,
            "qtd" => $qtd
        ];
    }

    public function removerCarrinho(int $index) {
        echo "removendo ". $this->carrinho[$index]["produto"]->getNomeJogo(). " do carrinho.\n";
        unset($this->carrinho[$index]);
        $this->carrinho = array_values($this->carrinho);        
    }

    public function comprarCarrinho() {
        $total = array_reduce($this->carrinho, fn($carry, $item) => $carry + $item["produto"]->getPreco() * $item["qtd"], 0.0);

        foreach ($this->carrinho as $item){
            $verificar = $item["produto"]->checarEstoque($item["qtd"]);
            if ($verificar == false){
                break;
            }
        }
        if ($verificar){

            echo "total a ser gasto: R$". number_format($total, 2, ',', '.'). "\n";
            if ($this->conta->temSaldoDisponivel($total)){ //checa se a transferencia deu certo, porem ainda não existe nenhuma conta de pagamento
                foreach ($this->carrinho as $item) {
                    $this->conta->transferir($item["produto"]->vendedor->conta, $item["produto"]->getPreco() * $item["qtd"]);
                    $item["produto"]->atualizarEstoque($item["qtd"]);
                    $this->removerCarrinho(0);
                }
            }
        }else{
            echo "algum dos item pesentes no carrinho não possui estoque para efetuar a compra.\n";
        }
    }

    public function listarCarrinho() {

        if (empty($this->carrinho)){
            echo "\nnão existe nenhum item no carrinho atual.\n";
        }else{
            echo "\nitens do carrinho de compras: \n";
            foreach ($this->carrinho as $item) {
                echo $item["produto"]->exibirDetalhes();
            }
        }

    } 

}



