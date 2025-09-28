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

if ($Usuario != null){
    $jogos = [];

    $jogos[] = new Produto("Red Dead Redemption 2", 10, 250.00);
    $jogos[] = new Produto("Dark Souls III", 15, 180.00);
    $jogos[] = new Produto("God of War", 5, 300.00);
    $jogos[] = new Produto("Hollow Knight", 20, 80.00);
    $jogos[] = new Produto("Cyberpunk 2077", 8, 220.00);
    $jogos[] = new Produto("Sekiro: Shadows Die Twice", 12, 200.00);
    $jogos[] = new Produto("Battlefield 6", 7, 150.00);
    $jogos[] = new Produto("The Witcher 3: Wild Hunt", 9, 190.00);


    foreach ($jogos as $item) {
        $Usuario->adcionarCarrinho($item, 2);
    }


    $Usuario->listarCarrinho();

    $Usuario->comprarCarrinho();

    $Usuario->listarCarrinho();

    foreach ($jogos as $item) {
        echo $item->exibirDetalhes();
    }
}