<?php

use Phalcon\DI\FactoryDefault;
use Phalcon\Mvc\View;
use Phalcon\Mvc\Url as UrlResolver;
use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;
use Phalcon\Mvc\Model\Metadata\Memory as MetaDataAdapter;
use Phalcon\Session\Adapter\Files as SessionAdapter;
use Phalcon\Mvc\Model\Manager as Manager;

/**
 * The FactoryDefault Dependency Injector automatically register the right services providing a full stack framework
 */
$di = new FactoryDefault();

/**
 * The URL component is used to generate all kind of urls in the application
 */
$di->set('url', function () use ($config) {
    $url = new UrlResolver();
    $url->setBaseUri($config->application->baseUri);

    return $url;
}, true);

/**
 * Setting up the view component
 */
$di->set('view', function () use ($config) {

    $view = new View();

    $view->setViewsDir($config->application->viewsDir);

    $view->registerEngines(array(
        '.volt' => function ($view, $di) use ($config) {

            $volt = new VoltEngine($view, $di);

            $volt->setOptions(array(
                'compiledPath' => $config->application->cacheDir,
                'compiledSeparator' => '_'
            ));

            return $volt;
        },
        '.phtml' => 'Phalcon\Mvc\View\Engine\Php'
    ));

    return $view;
}, true);

/**
 * Database connection is created based in the parameters defined in the configuration file
 */
$di->set('db', function () use ($config) {
    return new DbAdapter(array(
        'host' => $config->database->host,
        'username' => $config->database->username,
        'password' => $config->database->password,
        'dbname' => $config->database->dbname,
        "charset" => $config->database->charset
    ));
});

/**
 * If the configuration specify the use of metadata adapter use it or use memory otherwise
 */
$di->set('modelsMetadata', function () {
    return new MetaDataAdapter();
});

/**
 * Start the session the first time some component request the session service
 */
$di->set('session', function () {
    $session = new SessionAdapter();
    $session->start();

    return $session;
});
/*
$di->set('dispatcher', function () use ($di) {
    $eventsManager = $di->getShared('eventsManager');
    $security = new Security();
    $eventsManager->attach('dispatch', $security);
    $dispatcher = new Phalcon\Mvc\Dispatcher();
    $dispatcher->setEventsManager($eventsManager);
    return $dispatcher;
});
*/
$di->set('modelsManager', function () {
    $manager = new Manager;
    return $manager;
});

$di->set("viewSimple", function() use ($config) {
    $newView = new Phalcon\Mvc\View\Simple();
    $newView->setViewsDir($config->application->viewsDir);
    $newView->registerEngines(array(
        '.volt' => function ($view, $di) use ($config) {

            $volt = new VoltEngine($view, $di);

            $volt->setOptions(array(
                'compiledPath' => $config->application->cacheDir,
                'compiledSeparator' => '_'
            ));

            return $volt;
        },
        '.phtml' => 'Phalcon\Mvc\View\Engine\Php'
    ));
    return $newView;
}, true);
/*
$di->set('crypt', function () use ($config) {
    $crypt = new Phalcon\Crypt();
    $crypt->setKey($config->application->encryptKey);
    return $crypt;
});*/

$di->set('elements', function(){
    return new Elements();
});

$di->setShared('transaction', function() {
    $transactionManager = new \Phalcon\Mvc\Model\Transaction\Manager();
    return $transactionManager;
});

$di->set('viewCache', function() {

    $frontCache = new Phalcon\Cache\Frontend\Output(array(
        "lifetime" => 86400
    ));

    $cache = new Phalcon\Cache\Backend\File($frontCache, array(
        "cacheDir" => "../app/cache/"

    ));

    return $cache;
});

$di->set('modelsCache', function() {

    $frontCache = new \Phalcon\Cache\Frontend\Data(array(
        "lifetime" => 86400
    ));

    $cache = new \Phalcon\Cache\Backend\File($frontCache, array(
        "cacheDir" => "../app/cache/"
    ));

    return $cache;
});

$di->setShared('translate', function() use($di) {
    $session = $di->getShared("session");
    $language = $session->get("lang");
    //$language = $this->dispatcher->getParam("language");
    if (!$language)
    {
        //$this->dispatcher->setParam("language", "en");
        $session->set("lang", "en");
        //$language = "en";
    }
    $lang = Language::findFirst("name = '$language'");
    $langWord = new LangWord();
    $words = $langWord->findWords($lang->getCode());
    $messages = array();
    foreach ($words as $word=>$item)
    {
        $messages[$item->name] = $item->value;
    }
    return new Phalcon\Translate\Adapter\NativeArray(array(
        "content" => $messages
    ));
});

$di->set('router', function() use ($config){
    return require __DIR__.'/../../app/config/routes.php';
});

$di->set("forms", function(){
    return new \Phalcon\Forms\Manager();
});