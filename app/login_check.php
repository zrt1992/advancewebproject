<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'baseurl.php';


//phpinfo();
include __DIR__ . '/login.php';
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
//echo "Location: ".url();die;
if(login($username,$password)){
    header("Location: ".url());
}else {
    echo 'wrongs credes';
}

