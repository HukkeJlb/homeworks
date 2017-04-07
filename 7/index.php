<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

define('ROOT', dirname(__FILE__));
require_once(ROOT . '/core/Router.php');
require_once (ROOT . '/config/database.php');
require_once (ROOT . '/vendor/autoload.php');
require_once (ROOT . '/core/model.php');
require_once (ROOT . '/core/controller.php');
require_once (ROOT . '/core/view.php');

(new Router())->run();