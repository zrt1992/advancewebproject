<?php

//unset($_COOKIE['PHPSESSID']);
class Session implements SessionHandlerInterface
{

    private $xyz;

    public function open($path, $name)
    {
        $this->xyz = 'open';
        return true;
    }

    public function close()
    {
        $this->xyz = 'close';
        return true;
    }

    public function write($id, $data)
    {
        $this->xyz = 'write';
        return true;
    }

    public function read($id)
    {
        $this->xyz = 'read';
        return "asdasd";
    }

    public function destroy($id)
    {
        $this->xyz = 'destroy';
        return true;
    }

    public function gc($lifetime)
    {
        $this->xyz = 'gc';
        return true;
    }

    public function game()
    {
//        $this->xyz = 'game';
        return $this->xyz;
    }

    public function __construct()
    {
//        var_dump('asd');
//        die;

        session_set_save_handler(
            array(&$this, "open"),
            array(&$this, "close"),
            array(&$this, "read"),
            array(&$this, "write"),
            array(&$this, "destroy"),
            array(&$this, "gc")
        );

        session_start();
    }


}
$handler = new Session();
//session_set_save_handler(
//    array($handler, 'open'),
//    array($handler, 'close'),
//    array($handler, 'read'),
//    array($handler, 'write'),
//    array($handler, 'destroy'),
//    array($handler, 'gc')
//);
//unset($_COOKIE['PHPSESSID']);
//$handler = new Session();
//session_start();
//var_dump($_COOKIE);
//session_set_save_handler($handler, true);
//session_destroy();
echo $handler->game();

