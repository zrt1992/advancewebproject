<?php


include 'database.php';
$db_connect = db_connect();

function getUserCourses($db_connect){
    $sql = "SELECT * FROM user as u INNER JOIN role as r on u.role_id=r.id INNER JOIN users_courses as uc on uc.user_id=u.id INNER JOIN course as c  on c.id=uc.course_id WHERE u.id=1 and r.id=1";
    $result = $db_connect->query($sql);
    var_dump($result);

}
function getUser($db_connect){

}

