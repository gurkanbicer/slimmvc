<?php
/**
 * User: zhangshize
 * Date: 2016/12/30
 * Time: 下午 3:34
 */

namespace SlimFacades;


class Response extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'response';
    }
}