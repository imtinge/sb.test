<?php

namespace Imtinge\Core;

class Bootstrap
{
    private $requset;
    public function __construct()
    {
        $whoops = new \Whoops\Run;
        $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
        $whoops->register();

        /* $db = new \Medoo\Medoo([ */
        /*     'database_type' => 'mysql', */
        /*     'database_name' => 'imooc', */
        /*     'server' => 'localhost', */
        /*     'username' => 'root', */
        /*     'password' => '123456', */
        /*     'charset' => 'utf8' */
        /* ]); */
    }

    public function run()
    {
    }
}
