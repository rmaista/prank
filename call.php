<?php
function send($phone) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://www.tokocash.com/oauth/otp");
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "msisdn=$phone&accept=call");

    $asw = curl_exec($ch);
    if ($asw === false) {
        echo "Curl Error: " . curl_error($ch) . "\n";
    } else {
        echo "Response: " . $asw . "\n";
    }
    curl_close($ch);
}

echo "COPYRIGHT ; SGBTEAM\n\n";
echo "Nomor Input : ";
$nomor = trim(fgets(STDIN));
$nomor = filter_var($nomor, FILTER_SANITIZE_NUMBER_INT);

$execute = send($nomor);
?>
