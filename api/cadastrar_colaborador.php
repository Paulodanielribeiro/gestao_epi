<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $setor = $_POST['setor'];
    $funcao = $_POST['funcao'];
    $data_admissao = $_POST['data_admissao'];

    $sql = "INSERT INTO colaboradores (nome, cpf, setor, funcao, data_admissao) 
            VALUES ('$nome', '$cpf', '$setor', '$funcao', '$data_admissao')";

    if ($conn->query($sql) === TRUE) {
        echo "Colaborador cadastrado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
