<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'dependencies.php';
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
//echo "Location: ".url();die;
//var_dump(login($username,$password));die;
if(login($username,$password)){

    header("Location: ".url()."index.php");

}else {
    echo 'wrongs credes';
}

