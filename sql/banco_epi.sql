CREATE DATABASE IF NOT EXISTS gestao_epi;
USE gestao_epi;

CREATE TABLE colaboradores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    cpf VARCHAR(14),
    setor VARCHAR(50),
    funcao VARCHAR(50),
    data_admissao DATE
);

CREATE TABLE epis (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_epi VARCHAR(100),
    descricao TEXT,
    validade_meses INT,
    quantidade_estoque INT
);

CREATE TABLE entregas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    colaborador_id INT,
    epi_id INT,
    quantidade INT,
    data_entrega DATE,
    FOREIGN KEY (colaborador_id) REFERENCES colaboradores(id),
    FOREIGN KEY (epi_id) REFERENCES epis(id)
);
