<?php
/**
 * User: zhangshize
 * Date: 2016/12/30
 * Time: 下午 3:34
 */

namespace SlimFacades;

class Route extends Facade
{
    /**
     * Overriding Facades::self() to set Slim\App instance is in order to tell
     * Facades to proxy it.
     * This facades is same to App. Because of the $container['router']
     * (Instance of \Slim\Interfaces\RouterInterface) did not support many
     * function like $app->get() and so on.  So I repeat it and it is named
     * "Route".
     * @return \Slim\App
     */
    public static function self()
    {
        return self::$app;
    }
}