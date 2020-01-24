<?php

function CallAPI($method, $url, $data)
{
    $payload = json_encode($data);
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLINFO_HEADER_OUT, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($payload))
    );
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
};

// $url = 'https://us-central1-cloudpoint-cd0b7.cloudfunctions.net/nc/diagramagent?appKey=aipbot&ncUser=mbonfim@gmail.com&agentId=teste4';
// $data->fileContent = $_POST['fileContent'];
// echo CallAPI('POST', $url, $data);


// Exemplo masterdata - ok
// $url = "https://us-central1-cloudpoint-cd0b7.cloudfunctions.net/masterdata?appKey=aipbot&token=teste&dataType=php3";
// $db->nome = "marcio";
// $data->merge = false;
// $data->db = $db;
// echo json_encode($data);
// echo CallAPI('POST', $url, $data);

$str = 'bWFyY2lv';
echo base64_decode($str);