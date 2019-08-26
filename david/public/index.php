<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();


require_once '../vendor/autoload.php';


use Illuminate\Database\Capsule\Manager as Capsule;
use Aura\Router\RouterContainer;
use Zend\Diactoros\ServerRequestFactory;


$dotenv = Dotenv\Dotenv::create(__DIR__ . '/..');
$dotenv->load();

$capsule = new Capsule;

$capsule->addConnection([
    'driver' => 'mysql',
    'host' => getenv('DB_HOST'),
    'port' => getenv('DB_PORT'),
    'database' => getenv('DB_DATABASE'),
    'username' => getenv('DB_USER'),
    'password' => getenv('DB_PASS'),
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => '',
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
$map->get('passswordHash', '/david/passhash', [
    'controller' => 'App\Controllers\AuthController',
    'action' => 'passwordHash'
]);
$map->get('loginForm', '/david/login', [
    'controller' => 'App\Controllers\AuthController',
    'action' => 'getLogin'
]);
$map->get('logout', '/david/logout', [
    'controller' => 'App\Controllers\AuthController',
    'action' => 'getLogout'
]);
$map->post('auth', '/david/auth', [
    'controller' => 'App\Controllers\AuthController',
    'action' => 'postLogin'
]);
$map->get('admin', '/david/admin', [
    'controller' => 'App\Controllers\AdminController',
    'action' => 'getIndex',
    'auth' => true
]);
$map->get('admin.profile.changePassword', '/david/admin/profile/changePassword', [
    'controller' => 'App\Controllers\ProfileController',
    'action' => 'changePassword'
]);
$map->post('admin.profile.savePassword', '/david/admin/profile/savePassword', [
    'controller' => 'App\Controllers\ProfileController',
    'action' => 'savePassword'
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
$needsAuth = $handler['auth'] ?? false;

if ($needsAuth && !isset($_SESSION['userId'])) {
    echo 'Protected route';
    die();
}

$controller = new $controllerName;
$response = $controller->$action($request);

foreach ($response->getHeaders() as $name => $values) {
    foreach ($values as $value) {
        header(sprintf('%s %s', $name, $value), false);
    }
}
http_response_code($response->getStatusCode());

echo $response->getBody();
