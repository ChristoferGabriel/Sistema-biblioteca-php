<?php

class AuthController
{
    private $usuarioDAO;

    public function __construct()
    {
        $this->usuarioDAO = new UsuarioDAO();
    }

    // Exibe tela de login
    public function login()
    {
        require_once '../app/views/auth/login.php';
    }

    // Processa login
    public function autenticar()
    {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $usuario = $this->usuarioDAO->buscarPorEmail($email);

        if ($usuario && password_verify($senha, $usuario->getSenha())) {

            $_SESSION['usuario_id'] = $usuario->getId();
            $_SESSION['usuario_nome'] = $usuario->getNome();

            header('Location: index.php?rota=dashboard');
            exit;
        }

        $_SESSION['erro'] = "Email ou senha inválidos";
        header('Location: index.php?rota=login');
    }

    // Exibe cadastro
    public function cadastro()
    {
        require_once '../app/views/auth/cadastro.php';
    }

    // Processa cadastro
    public function registrar()
    {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = password_hash(
            $_POST['senha'],
            PASSWORD_DEFAULT
        );

        $usuario = new Usuario(
            null,
            $nome,
            $email,
            $senha
        );

        $this->usuarioDAO->cadastrar($usuario);

        header('Location: index.php?rota=login');
    }

    // Logout
    public function logout()
    {
        session_destroy();

        header('Location: index.php');
        exit;
    }

    public function esqueciSenha()
    {
        require_once
            '../app/views/auth/esqueci-senha.php';
    }

    public function enviarLinkRecuperacao() 
    {   
        $email = $_POST['email'];

        $usuario =
        $this->usuarioDAO->buscarPorEmail($email);

    if (!$usuario) {
        return;
    }

    $token =
        bin2hex(random_bytes(32));

    $this->usuarioDAO
         ->salvarTokenRecuperacao(
             $usuario->getId(),
             $token
         );

    // enviar email
    }

    public function redefinirSenha()
    {
        require_once
            '../app/views/auth/redefinir-senha.php';
    }

    public function salvarNovaSenha()
    {
        $token = $_POST['token'];

        $senha = password_hash(
            $_POST['senha'],
            PASSWORD_DEFAULT
        );

        $this->usuarioDAO
            ->alterarSenhaPorToken(
                 $token,
                 $senha
             );
    }
}