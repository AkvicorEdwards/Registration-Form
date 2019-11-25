<?php

require_once  dirname(__FILE__) . '/Utilities/DataBase.php';
$pdo = new DataBase();
require_once  dirname(__FILE__) . '/Config.php';
$config = new Config();
require_once  dirname(__FILE__) . '/Utilities/Utilities.php';
$utilities = new Utilities();

echo $utilities->encrypt("201909060227", $config->getSALT());

exit();

if(!(isset($_GET['adm']) && $_GET['adm']!=NULL && $_GET['adm']=='lyu1767')) exit();
echo "姓名,学号,手机号,学院,注册时间\n";
$sql = "SELECT * FROM register_form.participants LIMIT 700";
$result = $pdo->query($sql);
if ($result->rowCount() != 0) {
    $result = $result->fetchALL();
    foreach ($result as $item) {
        echo $utilities->decrypt($item['name'], $config->getSALT()), ",", $utilities->decrypt($item['studentId'], $config->getSALT()), ",";
        echo $utilities->decrypt($item['phone'], $config->getSALT()), ",", $item['college'], ",", $item['register_time'], "\n";
    }
}
