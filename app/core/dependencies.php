<?php
use Slim\Views\Smarty;
use Slim\Views\SmartyPlugins;
use Monolog\Logger as Logger;
use Monolog\Handler\StreamHandler as LoggerStreamHandler;
use SlimFacades\Settings;
use SlimFacades\Container;
use SlimFacades\Request;

# adding view structure to DI
$container['view'] = function() {
    $view = new Smarty(DIR_VIEW, [
        'compileDir' => DIR_VIEW_C,
        'pluginsDir' => [DIR_VENDOR . '/smarty/smarty/libs/plugins']
    ]);

    $smartyPlugins = new SmartyPlugins(Container::get('router'), Request::getUri());
    $view->registerPlugin('function', 'path_for', [$smartyPlugins, 'pathFor']);
    $view->registerPlugin('function', 'base_url', [$smartyPlugins, 'baseUrl']);

    return $view;
};

# adding model structure to DI
$container['model'] = function($container) {
    $model = new Model($container);
    return $model;
};

# adding library structure to DI
$container['library'] = function($container) {
    $library = new Library($container);
    return $library;
};

# adding helper structure to DI
$container['helper'] = function() {
    $helper = new Helper();
    return $helper;
};

# adding database structure to DI
$container['database'] = function() {
    $database = new Database();
    return $database;
};

# adding monolog to DI
$container['logger'] = function() {
    $logger = new Logger('my_logger');
    $file_handler = new LoggerStreamHandler(DIR_LOG . '/app.log');
    $logger->pushHandler($file_handler);
    return $logger;
};

/* path: ~app/core/dependencies.php */