<?php
/**
 * User: zhangshize
 * Date: 2016/12/30
 * Time: 下午 3:34
 */

namespace SlimFacades;

/**
 * Class View
 * If you want to use this facades, you should set a 'view' service in the
 * container.
 * @package SlimFacades
 */
class View extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'view';
    }
}