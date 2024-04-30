<?php

require_once __DIR__ . '/../api/GoogleSheetsApi.php';

$response = $service->spreadsheets_values->get($spreadsheetId, $range);
$values = $response->getValues();

if (empty($values)) {
    print "Nenhum dado encontrado.\n";
} else {
    array_shift($values);

    $employees = [];
    foreach ($values as $row) {
        $employee = [
            'nome' => $row[0],
            'data_de_nascimento' => $row[1],
            'data_de_entrada' => $row[2],
            'data_de_saida' => isset($row[3]) ? $row[3] : null,
        ];
        $employees[] = $employee;
    }
}