<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include __DIR__.'/login.php';
include 'config.php';

if(isLogin()){

}else {
    header("Location: http://autoload.test/finalproject/Loginstudent.php");
}
