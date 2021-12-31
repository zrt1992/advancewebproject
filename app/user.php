<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

//phpinfo();
//include __DIR__ . '/database.php';
include __DIR__ . '/../config.php';
//include __DIR__.'/login.php';
//var_dump(isLogin());die;
function getuser(){
    global $config;
    $connect = db_connect();
    if(isLogin()){
        $connect = db_connect();
        $sql = "SELECT *, case when u.role_id=1 then 'student' when u.role_id=2 then 'teacher' when 
    u.role_id=3 THEN 'parent' end as roll FROM user as u INNER JOIN role as r on r.id=u.role_id";
        $result = $connect->query($sql);
        return $result->fetch_assoc();

    } else {
        return null;
    }


}





