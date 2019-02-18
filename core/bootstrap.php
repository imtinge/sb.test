<?php

namespace SB;

class Bootstrap
{
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
        spl_autoload_register('\SB\Bootstrap::load');
        new \app\conf\Conf();
    }

    static public function load($name)
    {
        include APP . 'conf/conf.php';
    }
}
