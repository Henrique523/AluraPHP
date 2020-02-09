<?php

class Conta {

    //Atributos
    /*Atributos estáticos são aqueles que se referem à classe em si, e não às características
    dos objetos que serão criados a partir dela. */
    private $titular;
    private $saldo;
    private static $numeroDeContas = 0;

    //Construtor
    /*Para acessarmos um atributo estático, temos de chamá-lo da seguinte forma:
        nomeDaClasse::$atributo. Dessa forma, conseguiremos mexer no atributo da classe normalmente. */
    public function __construct(Titular $titular) {
        $this->titular = $titular;
        $this->saldo = 0;
    
        self::$numeroDeContas++;
    }

    //O método destruct irá, sempre que um objeto criado não tiver mais uma variável referenciando a ele, apagar este objeto
    //da memória, evitando assim que mais memória seja usada sem necessidade.
    public function __destruct() {
            self::$numeroDeContas--;
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

    public function recuperaSaldo(): float {
        return $this->saldo;
    }

    public function recuperaNomeTitular(): string {
        return $this->titular->recuperaNome();
    }

    public function recuperaCpfTitular(): string {
        return $this->titular->recuperaCpf();
    }

    public static function recuperaNumeroDeContas(): int {
        return self::$numeroDeContas;
    }
}