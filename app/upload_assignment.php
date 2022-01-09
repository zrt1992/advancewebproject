<?php

//include __DIR__.'/../app/database.php';
//include __DIR__.'/../config.php';
include __DIR__.'/dependencies.php';

$db_host = $config['database']['host'];
$db_name = $config['database']['name'];
$db_user = $config['database']['username'];
$db_password = $config['database']['password'];
$user_id = $_POST['user_id'];
$course_id = $_POST['course_id'];
$user = getuser();
//var_dump(getuser());die;

//var_dump(basename($_FILES["assignment"]["name"]));die;
$connect = db_connect($db_host,$db_name,$db_user,$db_password);

$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["assignment"]["name"]);
//var_dump($_FILES["assignment"]["tmp_name"]);die;
//var_dump($target_file);die;
//$target_file = 'asdasdasd';
$imageFileType = strtolower(pathinfo($target_dir . basename($_FILES["assignment"]["name"]),PATHINFO_EXTENSION));
$link =time().'.'.$imageFileType;
$target_file='../uploads/'.$link;
//var_dump($target_file);die;
$uploadOk = 1;
//$target_file = strtotime($target_file).".".$imageFileType;
//var_dump($target_file);die;
// Check if image file is a actual image or fake image
//if(isset($_POST["submit"])) {
//    $check = getimagesize($_FILES["assignment"]["tmp_name"]);
//    if($check !== false) {
//        echo "File is an image - " . $check["mime"] . ".";
//        $uploadOk = 1;
//    } else {
//        echo "File is not an image.";
//        $uploadOk = 0;
//    }
//}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["assignment"]["tmp_name"], $target_file)) {
        //echo "The file ". htmlspecialchars( basename( $_FILES["assignment"]["name"])). " has been uploaded.";
    } else {
        //echo "Sorry, there was an error uploading your file.";
    }
}
$link = 'uploads/'.$link;
$sql="insert INTO assignment (`id`, `title`, `course_id`, `path`) VALUES (NULL,'".basename($_FILES["assignment"]["name"])."', $course_id, '$link')";

$result = $connect->query($sql);
$last_inserted_id = $connect->insert_id;
$sql="insert INTO users_assignments (`id`, `user_id`, `assignment_id`, `grade`) VALUES (NULL ,$user_id,$last_inserted_id,NULL)";
//var_dump($sql);die;
$result = $connect->query($sql);
if($user['roll']=="teacher")  header("Location: ".url()."teacher.php");
if($user['roll']=="student")  header("Location: ".url()."index.php");
//die;
//var_dump($sql);die;


?>
