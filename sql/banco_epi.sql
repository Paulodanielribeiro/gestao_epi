CREATE DATABASE IF NOT EXISTS gestao_epi CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE gestao_epi;

CREATE TABLE IF NOT EXISTS colaboradores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cpf VARCHAR(14) UNIQUE NOT NULL,
    setor VARCHAR(50),
    funcao VARCHAR(50),
    data_admissao DATE
);

CREATE TABLE IF NOT EXISTS epis (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_epi VARCHAR(100) NOT NULL,
    descricao TEXT,
    validade_meses INT,
    quantidade_estoque INT DEFAULT 0
);

CREATE TABLE IF NOT EXISTS entregas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    colaborador_id INT NOT NULL,
    epi_id INT NOT NULL,
    quantidade INT NOT NULL,
    data_entrega DATE DEFAULT CURRENT_DATE,
    FOREIGN KEY (colaborador_id) REFERENCES colaboradores(id) ON DELETE CASCADE,
    FOREIGN KEY (epi_id) REFERENCES epis(id) ON DELETE CASCADE
);