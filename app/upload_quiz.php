<?php

include __DIR__.'/dependencies.php';

$db_host = $config['database']['host'];
$db_name = $config['database']['name'];
$db_user = $config['database']['username'];
$db_password = $config['database']['password'];
$course_id = $_POST['course_id'];
$user_id= $_REQUEST['user_id'];
//var_dump($_POST);die;

//var_dump(basename($_FILES["assignment"]["name"]));die;
$connect = db_connect();

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
$sql="insert INTO quiz (`id`, `title`, `course_id`, `path`) VALUES (NULL,'".basename($_FILES["assignment"]["name"])."', $course_id, '$link')";

$result = $connect->query($sql);
$last_inserted_id = $connect->insert_id;
$sql="insert INTO user_quizzes (`id`, `user_id`, `quiz_id`, `grade`) VALUES (NULL ,$user_id,$last_inserted_id,NULL)";
//echo $sql;die;
$result = $connect->query($sql);
header("Location: ".url());
//die;
//var_dump($sql);die;


?>
