<?php

use Dotenv\Dotenv;
use framework\App;
use framework\Database\Connection;
use framework\Database\Database;
use framework\Route;

require_once 'App.php';
require_once 'Route.php';
require_once 'Database/Database.php';
require_once 'Database/Connection.php';

$routes= require '../routes.php';

$dotenv = Dotenv::createImmutable(__DIR__.'/..');
$dotenv->load();

App::bind('config', require '../config.php');

App::bind('database', new Database(
    Connection::make(App::get('config')['database'])
));
App::bind('router', (new Route())->define($routes));
