<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


function getuser(){
    global $config;
    $connect = db_connect();
    if(isLogin()){
//        var_dump($_COOKIE['PHPSESSID']);die;
        $connect = db_connect();
        $sql = "SELECT *,u.id as userid,  case when u.role_id=1 then 'student' when u.role_id=2 then 'teacher' when 
    u.role_id=3 THEN 'parent' end as roll FROM user as u INNER JOIN role as r on r.id=u.role_id where session_id='".$_COOKIE['PHPSESSID']."'";
//       echo $sql;die;
        $result = $connect->query($sql);
        return $result->fetch_assoc();

    } else {
        return null;
    }


}





