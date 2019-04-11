<?php
define('ABSPATH' , __DIR__ . '/');
define('BASE_URL', substr($_SERVER['SCRIPT_NAME'], 0, strrpos($_SERVER['SCRIPT_NAME'], '/') + 1));

require_once ABSPATH . 'env.php';
require_once ABSPATH . 'classes/index.php';