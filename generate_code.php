<?php

require_once  dirname(__FILE__) . '/Utilities/DataBase.php';
$pdo = new DataBase();
require_once  dirname(__FILE__) . '/Config.php';
$config = new Config();
require_once  dirname(__FILE__) . '/Utilities/Utilities.php';
$utilities = new Utilities();

$salt = $config -> getSALT();

$code = str_split('abcdefgh123456789');
$len = sizeof($code)-1;

$count = 500;

$vis = array();

for($i = 0; $i < $count; ++$i){
    $co = '';
    for($j = 0; $j < 7; ++$j) {
        $co .= $code[ rand(0, $len) ];
    }
    if(isset($vis[$co])) { --$i; continue; }
    $vis[$co] = 7;
    echo $i+1, ' ', $co, "\n";
    $co = $utilities->encrypt($co, $salt);
    $sql = "INSERT INTO register_form.register_code (code, status) VALUES ('$co', 1)";
    $pdo -> exec($sql);
}