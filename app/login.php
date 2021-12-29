<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

//phpinfo();
include __DIR__ . '/database.php';
include __DIR__ . '/../config.php';
function isLogin(){
    $connect = db_connect();

    if(isset($_COOKIE['PHPSESSID'])){
        $sql = "SELECT * FROM user WHERE session_id='".$_COOKIE['PHPSESSID']."' and (NOW()- session_created)<3600";
        $result = $connect->query($sql);
        if ($result->num_rows > 0) {
            $now = new DateTime();
            $now = $now->format('Y-m-d H:i:s');
            $ses = "abc";
            $sql = "UPDATE user SET session_created ='" . $now . "' WHERE session_id='" . $_COOKIE['PHPSESSID'] . "'";
            $connect->query($sql);
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }

}
function login($username,$password){

        $connect = db_connect();
        $sql = "SELECT * FROM user WHERE username='$username' and password='$password'";
        $result = $connect->query($sql);
        if ($result->num_rows > 0) {
            session_set_cookie_params(60);
            session_start();
            $now = new DateTime();
            $now = $now->format('Y-m-d H:i:s');
            $sql = "UPDATE user SET session_id='".session_id()."',session_created ='" . $now . "' WHERE username='" . $username . "' ";
            $connect->query($sql);
            return true;

        } else {
            return false;
        }




}


