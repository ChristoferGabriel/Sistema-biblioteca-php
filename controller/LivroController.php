<?php
require_once __DIR__ . 'config/conexao.php';
require_once __DIR__ . 'models/Livro.php';

class LivroController {
    private $livroModel;

    public function __construct($pdo) {
        $this->livroModel = new Livro($pdo);
    }
    public function index() {
        $livros = $this->livroModel->listar();
        require_once __DIR__ . '/../views/livros/listar.php';
    }
    public function armazenar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titulo = $_POST['titulo'] ?? '';
            $autor = $_POST['autor'] ?? '';
            $ano = $_POST['ano_publicacao'] ?? null;

            if (!empty($titulo) && !empty($autor)) {
                $this->livroModel->cadastrar($titulo, $autor, $ano);
                header('Location: index.php?classe=livro&acao=index');
                exit;
            }
        }
    }
}