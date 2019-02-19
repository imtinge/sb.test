<?php

namespace Imtinge\Core;

class Request
{
    public function __construct()
    {
        dump($_SERVER['REQUEST_URI']);
        dump($_POST);
    }
}
