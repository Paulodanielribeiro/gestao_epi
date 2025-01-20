<?php
// Importa a configuração do banco de dados
require_once '../config/db.php';

// Define o cabeçalho como JSON
header('Content-Type: application/json');

// Define o limite para o aviso (em meses)
$limite_vencimento = 1; // Aviso para EPIs com menos de 1 mês de validade

// Consulta EPIs que estão vencidos ou próximos do vencimento
$query = $pdo->prepare("
    SELECT nome_epi, descricao, validade_meses, quantidade_estoque
    FROM epis
    WHERE validade_meses <= :limite
");
$query->execute(['limite' => $limite_vencimento]);

// Verifica se há resultados
$epis_vencendo = $query->fetchAll(PDO::FETCH_ASSOC);

if (count($epis_vencendo) > 0) {
    $response = array(
        'status' => 'warning',
        'message' => 'Existem EPIs vencidos ou próximos do vencimento.',
        'data' => $epis_vencendo
    );
} else {
    $response = array(
        'status' => 'success',
        'message' => 'Todos os EPIs estão dentro do prazo de validade.'
    );
}

// Retorna o JSON com os dados
echo json_encode($response);
?>
