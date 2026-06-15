CREATE DATABASE biblioteca;
USE biblioteca;

CREATE TABLE caixa(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    email VARCHAR(100),
    senha VARCHAR(255)
);

CREATE TABLE livros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    autor VARCHAR(255) NOT NULL,
    ano_publicacao INT,
    disponivel BOOLEAN DEFAULT TRUE
);

CREATE TABLE usuarios(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    cpf VARCHAR(14),
    telefone VARCHAR(20)
);

CREATE TABLE emprestimos(
    id INT AUTO_INCREMENT PRIMARY KEY,
    livro_id INT,
    usuario_id INT,
    data_emprestimo DATE,
    data_prevista DATE,
    data_devolucao DATE NULL,

    FOREIGN KEY(livro_id)
        REFERENCES livros(id),

    FOREIGN KEY(usuario_id)
        REFERENCES usuarios(id)
);
