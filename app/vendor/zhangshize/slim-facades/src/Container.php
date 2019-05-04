<?php
/**
 * User: zhangshize
 * Date: 2016/12/30
 * Time: 下午 3:53
 */

namespace SlimFacades;

/**
 * The facades for Slim\App instance.
 * @package SlimFacades
 */
class Container extends Facade
{
    /**
     * Overriding Facades::self() to set Slim\App instance is in order to tell
     * Facades to proxy it.
     * @return \Interop\Container\ContainerInterface
     */
    public static function self()
    {
        return self::$app->getContainer();
    }
}