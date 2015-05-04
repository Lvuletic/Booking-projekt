<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 21/04/15
 * Time: 10:21
 */

use Phalcon\DI,
    Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter,
    Phalcon\Session\Adapter\Files as SessionAdapter,
    Phalcon\DI\FactoryDefault;


ini_set('display_errors',1);
error_reporting(E_ALL);

define('ROOT_PATH', __DIR__);
define('PATH_CONFIG', __DIR__ . '/../app/config/config.php');
define('PATH_PLUGIN', __DIR__ . '/../app/plugins');
define('PATH_MODELS', __DIR__ . '/../app/models/');
define('PATH_CONTROLLERS', __DIR__ . '/../app/controllers/');
define('PATH_LIBRARY', __DIR__ . '/../app/library/');
define('PATH_SERVICES', __DIR__ . '/../app/services/');
define('PATH_RESOURCES', __DIR__ . '/../app/resources/');

set_include_path(
    ROOT_PATH . PATH_SEPARATOR . get_include_path()
);

// required for phalcon/incubator
include __DIR__ . "/../vendor/autoload.php";

// use the application autoloader to autoload the classes
// autoload the dependencies found in composer
$loader = new \Phalcon\Loader();

$loader->registerDirs(array(
    ROOT_PATH,
    PATH_CONFIG,
    PATH_MODELS,
    PATH_CONTROLLERS,
    PATH_PLUGIN
));

$loader->register();

$config = include PATH_CONFIG;

$di = new FactoryDefault();
DI::reset();
$di->set('db', function () use ($config) {
    return new DbAdapter(array(
        'host' => $config->database->host,
        'username' => $config->database->username,
        'password' => $config->database->password,
        'dbname' => $config->database->dbname,
        "charset" => $config->database->charset
    ));
});

$di->setShared('session', function () {
    $session = new SessionAdapter();
    $session->start();

    return $session;
});

// add any needed services to the DI here

DI::setDefault($di);