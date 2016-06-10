<?php
require("MyCrypt.php");

//////
$key = "SUA_CHAVE";
$palavra = "Hello World";

/////
$crypt = new MyCrypt($key);

$encode = $crypt->encrypt($palavra);
echo "Criptografado: " . $encode; //m7i/v8JzqsLFv7c=

echo " | ";

$decode = $crypt->decrypt($encode);
echo "Descriptografado: " . $decode; //hello world