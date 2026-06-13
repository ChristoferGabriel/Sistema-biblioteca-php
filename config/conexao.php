<?php

class Conexao {
    private static $instance = null;

    public static function getConexao() {
        if (self::$instance === null) {
            try {
                $host = 'localhost';
                $dbname = 'seu_banco_de_dados';
                $user = 'root';
                $password = '';
                $options = [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"
                ];

                self::$instance = new PDO(
                    "mysql:host=$host;dbname=$dbname", 
                    $user, 
                    $password, 
                    $options
                );

            } catch (PDOException $e) {
                die("Erro crítico de conexão: " . $e->getMessage());
            }
        }

        return self::$instance;
    }
}
?>