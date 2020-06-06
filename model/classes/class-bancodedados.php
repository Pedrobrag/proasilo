<?php

class BancoDeDados {
    private $servidor = 'localhost';
    private $usuario = 'root';
    private $senhaDB = 'vertrigo';
    private $dbname = 'asilo';

    /* Chaves super globais */
    public $conn;

    public function __construct() {
        $this->conn = mysqli_connect($this->servidor, $this->usuario, $this->senhaDB, $this->dbname);
        if (mysqli_connect_errno()) {
            echo '<h1>Erro ao conectar com o banco de dados</h1>';
            exit();
        }
    }

    public function conectar(){
        $this->conn = mysqli_connect($this->servidor, $this->usuario, $this->senhaDB, $this->dbname);
    }

    public function encerrar(){
        mysqli_close($this->conn);
    }

    public function proteger($string) {
        $string = strip_tags($string);
        $string = addslashes($string);
        return $string;
    }

    /* Função simplificadora de mysqli_num_rows */
    public function mysqli_exist($query) {
        $numeroLinha = mysqli_num_rows($query);

        return $numeroLinha > 0;
    }

    public function pegarSessao() {
        if (!isset($_SESSION)) {
            session_name('sessao');
            session_set_cookie_params(3600 * 24);
            session_start();
        }
        if (isset($_SESSION['id'])) {
            return [$_SESSION['id'], $_SESSION['tipo'], $_SESSION['nome']];
        }
        return null;
    }

    public function criarSessao($id, $tipo, $nome) {
        if (!isset($_SESSION)) {
            session_name('sessao');
            session_set_cookie_params(3600 * 24);
            session_start();
            $_SESSION['id'] = $id;
            $_SESSION['tipo'] = $tipo;
            $_SESSION['nome'] = $nome;
        }
    }

    public function finalizarSessao() {
        session_name('sessao');
        if (!isset($_SESSION)) {
            session_start();
        }
        session_destroy();
        session_write_close();
    }
}
