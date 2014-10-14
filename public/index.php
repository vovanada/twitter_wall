<?php
/**
 * Created by PhpStorm.
 * User: Vovanada
 * Date: 14.08.14
 * Time: 19:48
 */
$webRoot = dirname(__FILE__);
define('PROJECT_ROOT', $webRoot . '/../');
require_once(PROJECT_ROOT . '/vendor/autoload.php');
require_once(PROJECT_ROOT . '/autoload.php');
ProjectAutoloader::load();

$app = new WallBase();
$app->run();

