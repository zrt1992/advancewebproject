<?php

//include __DIR__.'/../app/database.php';
//include __DIR__.'/../config.php';
include __DIR__.'/dependencies.php';

$db_host = $config['database']['host'];
$db_name = $config['database']['name'];
$db_user = $config['database']['username'];
$db_password = $config['database']['password'];
$userid = $_POST['userid'];

$user = getuser();

$connect = db_connect();
$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["profile_pic"]["name"]);
$imageFileType = strtolower(pathinfo($target_dir . basename($_FILES["profile_pic"]["name"]),PATHINFO_EXTENSION));
$link =time().'.'.$imageFileType;
$target_file='../uploads/'.$link;

$uploadOk = 1;


// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target_file)) {
        //echo "The file ". htmlspecialchars( basename( $_FILES["assignment"]["name"])). " has been uploaded.";
    } else {
        //echo "Sorry, there was an error uploading your file.";
    }
}
$link = 'uploads/'.$link;
$connect=db_connect();
$sql="update user set profile_pic='".$link."' where id='".$_REQUEST['userid']."' ";
$result = $connect->query($sql);
//var_dump($sql);die;

if($user['roll']=="teacher")  header("Location: ".url()."teacher.php");
if($user['roll']=="student")  header("Location: ".url()."index.php");
//die;
//var_dump($sql);die;


?>
