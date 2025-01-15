<?php
require_once 'config.php';

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$setor = $_POST['setor'];
$funcao = $_POST['funcao'];
$data_admissao = $_POST['data_admissao'];

$sql = "INSERT INTO colaboradores (nome, cpf, setor, funcao, data_admissao) VALUES (?,?,?,?,?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $nome, $cpf, $setor, $funcao, $data_admissao);

if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Colaborador cadastrado com sucesso!"]);
} else {
    echo json_encode(["status" => "error", "message" => "Erro ao cadastrar colaborador."]);
}
?>