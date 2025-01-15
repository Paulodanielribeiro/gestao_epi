<?php
require_once 'config.php';

$sql = "SELECT * FROM epis WHERE validade_meses <= 3";
$result = $conn->query($sql);

$avisos = [];
while ($row = $result->fetch_assoc()) {
    $avisos[] = $row;
}

echo json_encode($avisos);
?>