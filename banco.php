<?php

require_once 'src/Conta.php';
require_once 'src/Titular.php';

$henrique = new Titular('123.456.789-10', 'Henrique');
$primeiraConta = new Conta($henrique);
$primeiraConta->depositar(500);
$primeiraConta->sacar(300);

echo $primeiraConta->recuperaSaldo() . PHP_EOL;
echo $primeiraConta->recuperaCpfTitular() . PHP_EOL;
echo $primeiraConta->recuperaNomeTitular() . PHP_EOL;

$gustavo = new Titular('124.634.894-76', 'Gustavo');
$segundaConta = new Conta($gustavo);
var_dump($segundaConta);

$outra = new Conta(new Titular('123', 'Patricia'));
unset($segundaConta);

echo Conta::recuperaNumeroDeContas() . PHP_EOL;
