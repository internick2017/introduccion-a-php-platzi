<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';


use Illuminate\Database\Capsule\Manager as Capsule;
use Aura\Router\RouterContainer;
use Zend\Diactoros\ServerRequestFactory;

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'cursophp',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',


]);

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

$request = ServerRequestFactory::fromGlobals(
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES
);

$routerContainer = new RouterContainer();
$map = $routerContainer->getMap();

$map->get('index', '/david/', [
    'controller' => 'App\Controllers\IndexController',
    'action' => 'index'
]);
$map->get('addJobs', '/david/job/add', [
    'controller' => 'App\Controllers\JobController',
    'action' => 'create'
]);
$map->post('storeJobs', '/david/job/store', [
    'controller' => 'App\Controllers\JobController',
    'action' => 'store'
]);

$matcher = $routerContainer->getMatcher();
$route = $matcher->match($request);

if (!$route) {
    echo 'No route';
    die();
}
$handler = $route->handler;
$controllerName = $handler['controller'];
$action = $handler['action'];
$controller = new $controllerName;
$controller->$action($request);
