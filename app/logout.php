<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'dependencies.php';
function logout(){
    global $config;
    $connect = db_connect();


    if(isset($_COOKIE['PHPSESSID'])){
        $sql = "SELECT * FROM user WHERE session_id='".$_COOKIE['PHPSESSID']."' and (NOW()- session_created)<".$config['session_max_time'];
        $result = $connect->query($sql);

        if ($result->num_rows > 0) {
            $now = new DateTime();
            $now = $now->format('Y-m-d H:i:s');
            $sql = "UPDATE user SET session_id =' ' WHERE session_id='" . $_COOKIE['PHPSESSID'] . "'";
            $connect->query($sql);
            header("Location: ".url());
        }
    } else {
        header("Location: ".url());
    }
    header("Location: ".url());
}
//var_dump("Location: ".url());die;

logout();



