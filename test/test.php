<?php
header("Content-Type: application/json; charset=UTF-8");
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'localhost/~denshuto/pf_db_api/api/1.0/character?id=1',
    CURLOPT_USERAGENT => 'cURL Request'
));

$resp = curl_exec($curl);

curl_close($curl);

echo $resp . "\n\n";

$hash = password_hash("aaaaaaaa", PASSWORD_DEFAULT);
echo $hash . "\n";
print_r(password_verify('aaaaaaaa', $hash));

echo password_hash('test123', PASSWORD_DEFAULT);

echo "\n" . bin2hex(random_bytes(32));