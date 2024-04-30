<?php
function formatarDataComAno($dataString) {
    $data = DateTime::createFromFormat('d/m/Y', $dataString);
    
    if ($data === false) {
        return "Data inválida";
    }
    
    $meses = array(
        '01' => 'janeiro',
        '02' => 'fevereiro',
        '03' => 'março',
        '04' => 'abril',
        '05' => 'maio',
        '06' => 'junho',
        '07' => 'julho',
        '08' => 'agosto',
        '09' => 'setembro',
        '10' => 'outubro',
        '11' => 'novembro',
        '12' => 'dezembro'
    );
    
    $dia = $data->format('d');
    $mes = $meses[$data->format('m')];
    $ano = $data->format('Y');
    
    return "$dia de $mes de $ano";
}