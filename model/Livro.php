<?php

require_once "conexao.php";

class Livro{

    private $pdo;

    public function __construct(){
        $this->pdo = conectar();
    }

    public function cadastrar($titulo, $autor, $ano, $quantidade){

        $sql = $this->pdo->prepare(
            "INSERT INTO livros
            (titulo, autor, ano, quantidade)
            VALUES
            (:titulo, :autor, :ano, :quantidade)"
        );

        $sql->execute([
            ":titulo" => $titulo,
            ":autor" => $autor,
            ":ano" => $ano,
            ":quantidade" => $quantidade
        ]);
    }

    public function listar(){

        $sql = $this->pdo->query("SELECT * FROM livros");

        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

}
?>