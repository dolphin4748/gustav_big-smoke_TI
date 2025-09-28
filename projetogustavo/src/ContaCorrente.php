<?php

namespace Unimar\Poo;

use Unimar\Poo\ContaPagamento;

class ContaCorrente extends ContaPagamento
{
    public function transferir(ContaBancaria $contaDestino, float $valor): bool
    {
        $debito = $this->debitarValor($valor);

        if (!$debito) {
            echo "Transferência não realizada. Saldo insuficiente.\n";
            return false;
        }

        $contaDestino->creditarValor($valor);

        $nomeTitular = $this->titular->getNomeCompleto();
        $nomeTitularDestino = $contaDestino->titular->getNomeCompleto();

        echo "Transferência de $nomeTitular para $nomeTitularDestino no valor de R$ $valor realizada com sucesso!\n";

        return true;
    }
}