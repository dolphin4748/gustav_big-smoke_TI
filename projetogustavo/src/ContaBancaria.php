<?php

namespace Unimar\Poo;

use Unimar\Poo\Usuario;

class ContaBancaria
{
    protected Usuario $titular;
    protected float $saldo = 0.0;

    public function __construct(Usuario $titular, float $saldo)
    {
        $this->titular = $titular;
        $this->saldo = $saldo;
    }

    public function retornarDados(): string
    {
        $cpfTitular = $this->titular->getCpf();
        $nomeTitular = $this->titular->getNomeCompleto();

        $dados = "CPF: $cpfTitular\nNome completo: $nomeTitular\n---\nSaldo atual: R$ $this->saldo\n";

        return $dados;
    }

    public function temSaldoDisponivel(float $valor): bool
    {
        return $this->saldo >= $valor;
    }

    protected function debitarValor(float $valor): bool
    {
        if (!$this->temSaldoDisponivel($valor)) {
            return false;
        }

        $this->saldo -= $valor;
        return true;
    }

    protected function creditarValor(float $valor): void
    {
        $this->saldo += $valor;
    }
}
