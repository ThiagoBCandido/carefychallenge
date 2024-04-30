<?php
function calcularAnos($data) {
    $dataFormatada = DateTime::createFromFormat('d/m/Y', $data);
    
    if ($dataFormatada === false) {
        return "Data inválida";
    }
    
    $dataAtual = new DateTime();
    
    $anos = $dataFormatada->diff($dataAtual);

    if ($anos->y === 0) {
        return "Menos de 1 ano";
    }

    if ($anos->y === 1) {
        return $anos->y . " ano";
    }
    
    return $anos->y . " anos";
}