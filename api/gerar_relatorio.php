<?php
include '../config/db.php';
require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$result = $conn->query("SELECT * FROM producao ORDER BY data_producao DESC");

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet->setCellValue('A1', 'Produto');
$sheet->setCellValue('B1', 'Quantidade');
$sheet->setCellValue('C1', 'Data de Produção');

$row = 2;
while ($data = $result->fetch_assoc()) {
    $sheet->setCellValue('A' . $row, $data['produto']);
    $sheet->setCellValue('B' . $row, $data['quantidade']);
    $sheet->setCellValue('C' . $row, $data['data_producao']);
    $row++;
}

$writer = new Xlsx($spreadsheet);
$filename = 'relatorio_producao.xlsx';

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="' . $filename . '"');
$writer->save("php://output");
exit;
?>