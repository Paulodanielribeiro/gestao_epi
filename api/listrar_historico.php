<?php
require '../config/db.php';

$sql = "SELECT c.nome AS colaborador, e.nome_epi, en.quantidade, en.data_entrega
        FROM entregas en
        JOIN colaboradores c ON en.colaborador_id = c.id
        JOIN epis e ON en.epi_id = e.id
        ORDER BY en.data_entrega DESC";

$stmt = $pdo->prepare($sql);
$stmt->execute();
$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($resultado);
?>
