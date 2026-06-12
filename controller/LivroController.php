<?php
require_once _DIR_ . 'config/conexao.php';
require_once _DIR_ . 'models/Livro.php';

class LivroController {
    private $livroModel;

    public function __construct($pdo) {
        $this->livroModel = new Livro($pdo);
    }
    public function index() {
        $livros = $this->livroModel->listar();
        require_once _DIR_ . '/../views/livros/listar.php';
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