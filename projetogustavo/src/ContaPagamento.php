<?php

namespace Unimar\Poo;

use Unimar\Poo\ContaBancaria;

class ContaPagamento extends ContaBancaria
{
    public function sacar(float $valor): bool
    {
        $debito = $this->debitarValor($valor);

        if (!$debito) {
            echo "Não foi possível sacar R$ $valor. Saldo insuficiente.\n";
            return false;
        }

        echo "Saque de R$ $valor feito com sucesso!\n";
        return true;
    }

    public function depositar(float $valor): void
    {
        $this->creditarValor($valor);
        echo "Depósito no valor de R$ $valor realizado com sucesso!\n";
    }
}
