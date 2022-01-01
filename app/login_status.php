<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isLogin()){
//    header("Location: ".url()."index.php");
}else {
    header("Location: ".url()."loginstudent.php");
}
