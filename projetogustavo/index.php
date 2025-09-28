<?php

require_once 'vendor/autoload.php';

use Unimar\Poo\Usuario;
use Unimar\Poo\Cliente;
use Unimar\Poo\Vendedor;
use Unimar\Poo\Produto;

$email = readline('Digite seu e-mail ');
$senha = readline('Digite sua senha ');

$Usuario = new Usuario(); //a variavel usuario foi criada para poder alocar a classe usuario para que assim podemos usa-la. toda vez que usamos o new, estamos alocando na memória uma classe nova, se usarmos o new usuario ele não irá utilizar o mesmo usuário.
$Usuario = $Usuario->login($email, $senha); // essa parte em especifico, é justamente para fazer o a função login funcionar.

$jogos = [];

$jogos[] = new Produto("dying light", 99.99);
$jogos[] = new Produto("resident evil 4", 22.25);
$jogos[] = new Produto("hollow knight", 49.99);
$jogos[] = new Produto("persona 4 golden", 99.99);

foreach ($jogos as $item) {
    $Usuario->adcionarCarrinho($item);
}


$Usuario->listarCarrinho();