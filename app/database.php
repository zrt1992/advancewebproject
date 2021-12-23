<?php


function db_connect()
{

    include __DIR__.'/../config.php';


    $db_host = $config['database']['host'];
    $db_name = $config['database']['name'];
    $db_user = $config['database']['username'];
    $db_password = $config['database']['password'];

    try {

        $connect = new mysqli($db_host, $db_user, $db_password, $db_name);
        return $connect;
    } catch (Exception $e) {
        $e->getMessage();
    }
}

//$connection = $this->pdo = new PDO("mysql:host=" . $db_host . ";dbname=" . $db_name, $db_user, $db_password);


?>
