<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'dependencies.php';
include 'login_status.php';

$connect = db_connect();
$user_id = $_REQUEST['user_id'];
$course_id = $_REQUEST['course_id'];
$sql = "INSERT INTO users_courses (id, user_id, course_id, status, grade) 
                  VALUES (NULL, '$user_id', '$course_id',1 ,NULL)";
//var_dump($sql);die;
$result = $connect->query($sql);
header("Location: ".url()."index.php");
