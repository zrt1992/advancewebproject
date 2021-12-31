<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include __DIR__ . '/database.php';
include __DIR__ . '/../config.php';
include __DIR__ . '/../app/baseurl.php';

//var_dump($_REQUEST);die;
$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$password = $_REQUEST['password'];
$newpassword = $_REQUEST['confirm_password'];
$role_id = $_REQUEST['role_id'];
if($role_id==1){
    $roll_num = 'S-'.rand(11111,99999);
}
if($role_id==2){
    $roll_num = 'T-'.rand(11111,99999);
}
if($role_id==2){
    $roll_num = 'P-'.rand(11111,99999);
}



$connect = db_connect();
$sql = "INSERT INTO user (id, username, password, session_id, session_created, gender, name, user_id, academic_year, profile_pic, description, age, blood_group, role_id) VALUES (NULL, '$email', '$password', NULL, CURRENT_TIMESTAMP, NULL, '', '$roll_num', NULL, NULL, NULL, NULL, NULL, '$role_id')";
$result = $connect->query($sql);
//var_dump(url());die;
if($result){
    header("Location: ".url());
} else {
    echo 'register failed';
}




