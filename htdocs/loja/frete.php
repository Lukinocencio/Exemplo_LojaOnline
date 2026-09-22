<?php

$cep = isset($_POST["cep"]) ? preg_replace('/[^0-9]/', '', $_POST["cep"]) : '';

if (strlen($cep) != 8) {
    echo "<div class='alert alert-warning' style='margin-top:10px;'><b>CEP inválido.</b> Digite os 8 números do CEP.</div>";
    exit;
}

$url = "https://viacep.com.br/ws/{$cep}/json/";

$opts = [
    "http" => [
        "method" => "GET",
        "timeout" => 4,
        "header" => "User-Agent: LojaOnline/1.0\r\n"
    ],
    "ssl" => [
        "verify_peer" => false,
        "verify_peer_name" => false
    ]
];

$context = stream_context_create($opts);
$json = @file_get_contents($url, false, $context);
$dadosCep = $json ? json_decode($json, true) : null;

$uf = "SP";
$cidade = "";
$bairro = "";
$logradouro = "";

if ($dadosCep && !isset($dadosCep['erro'])) {
    $uf = strtoupper($dadosCep['uf'] ?? 'SP');
    $cidade = $dadosCep['localidade'] ?? '';
    $bairro = $dadosCep['bairro'] ?? '';
    $logradouro = $dadosCep['logradouro'] ?? '';
} else {
    // Estimativa por região baseada na faixa de CEP do Brasil
    $primeiroDigito = substr($cep, 0, 1);
    if (in_array($primeiroDigito, ['0', '1'])) $uf = 'SP';
    elseif ($primeiroDigito == '2') $uf = 'RJ';
    elseif ($primeiroDigito == '3') $uf = 'MG';
    elseif ($primeiroDigito == '4') $uf = 'BA';
    elseif ($primeiroDigito == '5') $uf = 'PE';
    elseif ($primeiroDigito == '6') $uf = 'CE';
    elseif ($primeiroDigito == '7') $uf = 'DF';
    elseif ($primeiroDigito == '8') $uf = 'PR';
    elseif ($primeiroDigito == '9') $uf = 'RS';
}

// Tabela de fretes e prazos por região (Origem: SP)
if ($uf == 'SP') {
    $val_sedex = "22.50";
    $prazo_sedex = "2 Dias";
    $val_pac = "16.80";
    $prazo_pac = "5 Dias";
} elseif (in_array($uf, ['RJ', 'MG', 'ES'])) {
    $val_sedex = "34.90";
    $prazo_sedex = "3 Dias";
    $val_pac = "24.50";
    $prazo_pac = "7 Dias";
} elseif (in_array($uf, ['PR', 'SC', 'RS', 'DF', 'GO', 'MS', 'MT'])) {
    $val_sedex = "45.00";
    $prazo_sedex = "4 Dias";
    $val_pac = "31.20";
    $prazo_pac = "9 Dias";
} elseif (in_array($uf, ['BA', 'PE', 'CE', 'RN', 'PB', 'AL', 'SE', 'PI', 'MA'])) {
    $val_sedex = "59.90";
    $prazo_sedex = "5 Dias";
    $val_pac = "39.80";
    $prazo_pac = "11 Dias";
} else { // Região Norte
    $val_sedex = "79.90";
    $prazo_sedex = "6 Dias";
    $val_pac = "49.50";
    $prazo_pac = "14 Dias";
}

echo "<div style='margin-top:15px; padding:10px; background:#f9f9f9; border:1px solid #ddd; border-radius:4px;'>";

if (!empty($cidade)) {
    echo "<p style='color:#337ab7; margin-bottom:10px;'><b>Destino:</b> {$cidade} - {$uf}</p>";
}

echo "<h3><input type='radio' name='frete' value='SEDEX*{$val_sedex}*{$prazo_sedex}'> SEDEX</h3>";
echo "<p><b>Valor do frete:</b> R$ {$val_sedex}</p>";
echo "<p><b>Prazo de entrega:</b> {$prazo_sedex}</p>";

echo "<hr style='margin:10px 0;'>";

echo "<h3><input checked type='radio' name='frete' value='PAC*{$val_pac}*{$prazo_pac}'> PAC</h3>";
echo "<p><b>Valor do frete:</b> R$ {$val_pac}</p>";
echo "<p><b>Prazo de entrega:</b> {$prazo_pac}</p>";

echo "</div>";

// Script para autopreencher o endereço caso os campos estejam vazios
if (!empty($cidade) || !empty($uf)) {
    echo "<script>
        if ($('input[name=\"cidade\"]').val() == '') $('input[name=\"cidade\"]').val('" . addslashes($cidade) . "');
        if ($('input[name=\"uf\"]').val() == '') $('input[name=\"uf\"]').val('" . addslashes($uf) . "');
        if ($('input[name=\"bairro\"]').val() == '' && '" . addslashes($bairro) . "' != '') $('input[name=\"bairro\"]').val('" . addslashes($bairro) . "');
        if ($('input[name=\"endereco\"]').val() == '' && '" . addslashes($logradouro) . "' != '') $('input[name=\"endereco\"]').val('" . addslashes($logradouro) . "');
    </script>";
}
?>
