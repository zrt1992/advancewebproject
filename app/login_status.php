<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

//var_dump($_COOKIE);die;
if(isLogin()){
//    $role = getuser();
//    var_dump("Location: ".url()."teacher.php");die;
//    echo 'asd';die;
//    if($role['roll']=="teacher") header("Location: ".url()."teacher.php");
//    if($role['roll']=="student") header("Location: ".url()."index.php");
//    header("Location: ".url()."index.php");
}else {
    header("Location: ".url()."loginstudent.php");
}
