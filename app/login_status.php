<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include __DIR__.'/login.php';
include 'config.php';
include 'baseurl.php';

//var_dump(isLogin());die;
if(isLogin()){
//    header("Location: ".url()."index.php");
}else {
    header("Location: ".url()."loginstudent.php");
}
