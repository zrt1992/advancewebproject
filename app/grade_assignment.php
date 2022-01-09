<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'dependencies.php';
include 'login_status.php';

$connect = db_connect();

//var_dump($_REQUEST);die;
//var_dump($sql);die;
$assignment_id = $_REQUEST['assignment_id'];
$data= $_REQUEST['data'];
$connect= db_connect();
foreach ($data as $key=>$val){

     $sql = "update users_assignments set grade='".$val."' where user_id='".$key."' AND  assignment_id='".$assignment_id."'";
    $connect->query($sql);
}

//$result = $connect->query($sql);
header("Location: ".url()."index.php");
