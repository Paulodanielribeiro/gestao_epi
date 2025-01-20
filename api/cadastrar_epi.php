<?php
// Define o cabeçalho como JSON
header('Content-Type: application/json');

// Simula uma resposta de sucesso
$response = array(
    'status' => 'success',
    'message' => 'EPI cadastrado com sucesso'
);

// Retorna o JSON codificado
echo json_encode($response);
?>
