<?php

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"http://localhost/loyalty/api/v1/users");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,"name=John Doe&email=johndoe@stpsworld.com&points=20");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$server_output = curl_exec($ch);
curl_close($ch);
var_dump($server_output);

?>
