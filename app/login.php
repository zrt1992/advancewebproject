<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
//include 'dependencies.php';
function isLogin(){
    global $config;
    $connect = db_connect();
//    var_dump(($_COOKIE['PHPSESSID']));die;

    if(isset($_COOKIE['PHPSESSID'])){
        $sql = "SELECT * FROM user WHERE session_id='".$_COOKIE['PHPSESSID']."' and (NOW()- session_created)<".$config['session_max_time'];
        $result = $connect->query($sql);
//        echo $sql;die;
        if ($result->num_rows > 0) {
            $now = new DateTime();
            $now = $now->format('Y-m-d H:i:s');
            $ses = "abc";
            $sql = "UPDATE user SET session_created ='" . $now . "' WHERE session_id='" . $_COOKIE['PHPSESSID'] . "'";
            $connect->query($sql);
            return true;
        } else {
//            session_start();
//            session_destroy();
            return false;
        }
    } else {
        return false;
    }

}
function login($username,$password){
     global $config;
        $connect = db_connect();
        $sql = "SELECT * FROM user WHERE username='$username' and password='$password'";
        $result = $connect->query($sql);
//        var_dump($sql);die;
        if ($result->num_rows > 0) {
//            session_set_cookie_params(1);
            session_set_cookie_params($config['session_max_time']);
            session_start();
            session_regenerate_id(TRUE);
//            var_dump(session_id());die;
            $now = new DateTime();
            $now = $now->format('Y-m-d H:i:s');
             $sql = "UPDATE user SET session_id='".session_id()."',session_created ='" . $now . "' WHERE username='" . $username . "' ";

            $connect->query($sql);
            return true;

        } else {
            return false;
        }




}


