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
class Settings extends Facade
{
    /**
     * Overriding Facades::self() to set Slim\App instance is in order to tell
     * Facades to proxy it.
     * @return \Slim\App
     */
    public static function self()
    {
        return self::$app;
    }

    /**
     * Get the settings value.
     * If $key = null, this function returns settings.
     * @param string|null $key
     * @return mixed
     */
    public static function get($key = null)
    {
        if ($key === null) {
            return self::self()->getContainer()['settings'];
        } else {
            return self::self()->getContainer()['settings'][$key];
        }
    }

    /**
     * Set the settings value.
     * When $key is an array, it will be viewed to a list of keys.  <br>
     * For Example:
     * $key = ['a','b']; <br>
     * The function will set the value of $container->settions['a']['b'].
     * @param array|string $key
     * @param mixed $value
     */
    public static function set($key, $value)
    {
        if (is_array($key)) {
            $now = self::self()->getContainer()['settings'];
            foreach ($key as $item) {
                $now = $now[$item];
            }
            $now = $value;
        } else {
            $settings = self::self()->getContainer()['settings'];
            $settings[$key] = $value;
        }
    }
}
