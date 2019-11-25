<?php

require_once  dirname(__FILE__) . '/../Utilities/DataBase.php';
$pdo = new DataBase();
require_once  dirname(__FILE__) . '/../Config.php';
$config = new Config();
require_once  dirname(__FILE__) . '/../Utilities/Utilities.php';
$utilities = new Utilities();

$salt = $config -> getSALT();

$cl = ['数学与统计学院','文学院','机械与车辆工程学院','商学院',
    '法学院','外国语学院','化学化工学院','生命科学学院',
    '信息科学与工程学院','传媒学院','教育学院','美术学院',
    '音乐学院','体育与健康学院','土木工程与建筑学院','自动化与电气工程学院',
    '物流学院','资源环境学院','马克思主义学院','药学院',
    '教师教育学院','创业学院','历史文化学院','物理与电子工程学院',
    '材料科学与工程学院','农林科学学院'];
$sz = sizeof($cl);

//$cl2 = ['临沂大学', '其他学院或学校'];
//$sz2 = sizeof($cl2);

$code = null; if(isset($_POST['code']) && $_POST['code']!=null) $code = $utilities->encrypt($_POST['code'], $salt); else exit('ERROR 1');
$name = null; if(isset($_POST['name']) && $_POST['name']!=null) $name = $utilities->encrypt($_POST['name'], $salt); else exit('ERROR 2');
$studentId = null; if(isset($_POST['studentId']) && $_POST['studentId']!=null) $studentId = $utilities->encrypt($_POST['studentId'], $salt); else exit('ERROR 3');

//$university = null;
////echo $_POST['options2'], "\n";
//if(isset($_POST['options2']) && $_POST['options2']!=null && $_POST['options2']>=0 && $_POST['options2']<$sz2) {
////    echo $code, ' ', $utilities->decrypt($code, $salt), "\n";
////    echo $name, ' ', $utilities->decrypt($name, $salt), "\n";
////    echo $studentId, ' ', $utilities->decrypt($studentId, $salt), "\n";
////    echo "sdfs\n";
////    print_r($university);exit();
//    $university = $cl2[$_POST['options2']];
//} else {
//    exit('ERROR 4');
//}
$college = null;
if(isset($_POST['options']) && $_POST['options']!=null && $_POST['options']>=0 && $_POST['options']<$sz) {
    $college = $cl[$_POST['options']];
} else {
    exit('ERROR 5');
}

//echo $university, "\n";
//echo $college, "\n";

//$idLast6 = null; if(isset($_POST['idLast6']) && $_POST['idLast6']!=null) $idLast6 = $utilities->encrypt($_POST['idLast6'], $salt); else exit('ERROR 6');
$phone = null; if(isset($_POST['phone']) && $_POST['phone']!=null) $phone = $utilities->encrypt($_POST['phone'], $salt); else exit('ERROR 7');
//$email = null; if(isset($_POST['email']) && $_POST['email']!=null) $email = $utilities->encrypt($_POST['email'], $salt); else exit('ERROR 8');

// Check register code
$sql = "SELECT * FROM register_form.register_code WHERE code = '$code' LIMIT 1";
$result = $pdo -> query($sql);
if($result->rowCount() == 0){
    $utilities->raise_alert("错误的报名码或已经使用，请重新提交", 1);
    $utilities->redirect("https://reg.akvicor.com");
    exit();
}
$result = $result -> fetch();
if ($result['status'] != 1) {
    $utilities->raise_alert("错误的报名码或已经使用，请重新提交", 1);
    $utilities->redirect("https://reg.akvicor.com");
    exit();
}
// Set the availability of the register code
$result_id = $result['id'];
$sql = "UPDATE register_form.register_code SET status = 0 WHERE id = '$result_id' LIMIT 1";
$result = $pdo -> exec($sql);
if($result != 1) {
    $utilities->raise_alert("检索注册码失败，请重新提交", 1);
    $utilities->redirect("https://reg.akvicor.com");
    exit();
}
//exit(print_r($result_id));
// Write participants information
$sql = "INSERT INTO register_form.participants (name, studentId, college, phone, register_time, register_code) 
    VALUES ('$name', '$studentId','$college','$phone', NOW(),'$code')";
//echo $sql;
$result = $pdo -> exec($sql);

if($result != 1){
    $sql = "UPDATE register_form.register_code SET status = 1 WHERE id = '$result_id' LIMIT 1";
    $result = $pdo -> exec($sql);
    $utilities->raise_alert("写入报名信息失败，请检查后重新提交", 1);
    $utilities->redirect("https://reg.akvicor.com");
    exit();
}

$utilities->raise_alert("您已成功报名，稍等片刻即可在报名列表看到您的报名信息。。。", 1);
$utilities->redirect("https://reg.akvicor.com");
exit();
