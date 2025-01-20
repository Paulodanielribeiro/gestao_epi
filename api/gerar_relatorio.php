<?php
// Importa a configuração do banco de dados
require_once '../config/db.php';

// Define o cabeçalho para exportação em Excel
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=relatorio_epis.xls");

// Consulta os dados dos EPIs no banco de dados
$stmt = $pdo->query("SELECT nome_epi, descricao, validade_meses, quantidade_estoque FROM epis");

// Gera o cabeçalho do relatório
echo "Nome do EPI\tDescrição\tValidade (meses)\tQuantidade\n";

// Gera as linhas de dados
foreach ($stmt as $row) {
    echo "{$row['nome_epi']}\t{$row['descricao']}\t{$row['validade_meses']}\t{$row['quantidade_estoque']}\n";
}
?>
