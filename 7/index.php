<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

define('ROOT', dirname(__FILE__));
require_once(ROOT . '/components/Router.php');
require_once(ROOT . '/components/Db.php');
require_once (ROOT . '/vendor/autoload.php');
require_once 'core/model.php';
require_once 'core/controller.php';
require_once 'core/view.php';

(new Router())->run();