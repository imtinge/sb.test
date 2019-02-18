<?php

define('WEB_ROOT', dirname(__FILE__) . DIRECTORY_SEPARATOR);
define('BASE', dirname(WEB_ROOT) . DIRECTORY_SEPARATOR);
define('APP', BASE . 'app' . DIRECTORY_SEPARATOR);
define('CORE', BASE . 'core' . DIRECTORY_SEPARATOR);

include BASE . 'vendor/autoload.php';

new \SB\Bootstrap();
