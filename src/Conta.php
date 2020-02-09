<?php

class Conta {

    //Atributos
    /*Atributos estáticos são aqueles que se referem à classe em si, e não às características
    dos objetos que serão criados a partir dela. */
    private $cpfTitular;
    private $nomeTitular;
    private $saldo;
    private static $numeroDeContas = 0;
    private static $codigoDoBanco = 77;

    //Construtor
    /*Para acessarmos um atributo estático, temos de chamá-lo da seguinte forma:
        nomeDaClasse::$atributo. Dessa forma, conseguiremos mexer no atributo da classe normalmente. */
    public function __construct(string $cpfTitular, string $nomeTitular) {
        $this->saldo = 0;
        $this->cpfTitular = $cpfTitular;
        $this->nomeTitular = $nomeTitular;
        $this->validaNomeTitular($nomeTitular);
    
        self::$numeroDeContas++;
    }

    //Métodos
    public function sacar (float $valorASacar): void {
        if($valorASacar > $this->saldo) {
            echo "Saldo indisponível";
            return;
        }
        $this->saldo -= $valorASacar;
    }

    public function depositar (float $valorADepositar): void {
        if($valorADepositar < 0) {
            echo "Valor precisa ser positivo";
            return;
        }
        $this->saldo += $valorADepositar;
    }

    public function transferir(float $valorATransferir, Conta $contaDestino): void {
        if($valorATransferir > $this->saldo) {
            echo "Saldo indisponível";
            return;
        }
        $this->sacar($valorATransferir);
        $contaDestino->depositar($valorATransferir);
    }

    public function defineCpfTitular(string $cpf): void {
        $this->cpfTitular = $cpf;
    }

    public function defineNomeTitular(string $nome): void {
        $this->nomeTitular = $nome;
    }

    public function recuperaSaldo(): float {
        return $this->saldo;
    }

    public function recuperaCpfTitular(): string {
        return $this->cpfTitular;
    }

    public function recuperaNomeTitular(): string {
        return $this->nomeTitular;
    }

    private function validaNomeTitular(string $nomeTitular): void {
        if(strlen($nomeTitular) < 5) {
            echo "Nome precisa de pelo menos 5 caracteres";
            exit();
        }
    }

    public static function recuperaNumeroDeContas(): int {
        return self::$numeroDeContas;
    }
}