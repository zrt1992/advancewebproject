<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

//phpinfo();
include __DIR__ . '/login.php';
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
if(login($username,$password)){
    header("Location: http://autoload.test/finalproject/index.php");
}else {
    echo 'wrongs credes';
}

