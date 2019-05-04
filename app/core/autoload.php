<?php
session_start();

use Slim\App as Slim;
use Slim\Container as SlimContainer;
use SlimFacades\Facade;
use SlimFacades\App;
use SlimFacades\Container;
use SlimFacades\Settings;

$configuration = [];

# defines
require_once dirname(__DIR__) . '/config/defines.php';

# configurations
require_once DIR_CONFIG . '/config.php';

# autoloading for installed with composer
require_once DIR_VENDOR . '/autoload.php';

# model core class
require_once DIR_CORE . '/model.php';

# library core class
require_once DIR_CORE . '/library.php';

# helper core class
require_once DIR_CORE . '/helper.php';

# database core class
require_once DIR_CORE . '/database.php';

# autoloading for controllers
function autoloadController($className) {
    $className = str_replace('\\', '/', $className);
    $classAddr = DIR_CONTROLLER . '/' . $className . '.php';
    if (is_readable($classAddr))
        require $classAddr;
}

# autoloading for middlewares
function autoloadMiddleware($className) {
    $className = str_replace('\\', '/', $className);
    $classAddr = DIR_MIDDLEWARE . '/' . $className . '.php';
    if (is_readable($classAddr))
        require $classAddr;
}

# slim and slim container constructor
$container = new SlimContainer($configuration);
$app = new Slim($container);

# initialize facade
Facade::setFacadeApplication($app);

# container
$container = Container::self();

# dependencies
require_once DIR_CORE . '/dependencies.php';

# facades
require_once DIR_CORE . '/facades.php';

# triggering autoloadController function
spl_autoload_register("autoloadController");

# triggering autoloadMiddleware function
spl_autoload_register("autoloadMiddleware");

# routes
require_once DIR_CONFIG . '/routes.php';

# Run
App::run();

/* path: ~app/core/autoload.php */