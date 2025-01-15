<?php
require_once 'config.php';

$nome_epi = $_POST['nome_epi'];
$descricao = $_POST['descricao'];
$validade_meses = $_POST['validade_meses'];
$quantidade_estoque = $_POST['quantidade_estoque'];

$sql = "INSERT INTO epis (nome_epi, descricao, validade_meses, quantidade_estoque) VALUES (?,?,?,?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssii", $nome_epi, $descricao, $validade_meses, $quantidade_estoque);

if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "EPI cadastrado com sucesso!"]);
} else {
    echo json_encode(["status" => "error", "message" => "Erro ao cadastrar EPI."]);
}
?>