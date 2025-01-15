<?php
require_once 'config.php';

$sql = "SELECT nome_epi, SUM(quantidade) AS total_entregue FROM entregas 
        JOIN epis ON entregas.epi_id = epis.id GROUP BY epi_id ORDER BY total_entregue DESC";
$result = $conn->query($sql);

$relatorio = [];
while ($row = $result->fetch_assoc()) {
    $relatorio[] = $row;
}

echo json_encode($relatorio);
?>
