<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include __DIR__ . '/database.php';
include __DIR__ . '/../config.php';
include __DIR__ . '/../app/baseurl.php';


$connect=db_connect();
$sql="update user set name='".$_REQUEST['name']."' ,description='".$_REQUEST['description']."' ,blood_group='".$_REQUEST['blood_group']."' 
 ,age='".$_REQUEST['age']."' ,gender='".$_REQUEST['gender']."' where id='".$_REQUEST['userid']."' ";
$result = $connect->query($sql);
//echo $sql;die;

//var_dump(url());die;
if($result){
    header("Location: ".url().'index.php');
} else {
    echo 'update failed';
}




