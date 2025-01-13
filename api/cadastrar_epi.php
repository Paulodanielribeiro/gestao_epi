<?php
require '../config/db.php';

$data = json_decode(file_get_contents('php://input'), true);

$colaborador_id = $data['colaborador_id'];
$epi_id = $data['epi_id'];
$quantidade = $data['quantidade'];
$data_entrega = $data['data_entrega'];

$sql = "INSERT INTO entregas (colaborador_id, epi_id, quantidade, data_entrega) VALUES (?, ?, ?, ?)";
$stmt = $pdo->prepare($sql);
if ($stmt->execute([$colaborador_id, $epi_id, $quantidade, $data_entrega])) {
    echo json_encode(['status' => 'sucesso']);
} else {
    echo json_encode(['status' => 'erro']);
}
?>
