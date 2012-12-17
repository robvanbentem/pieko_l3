<?php
/**
 * @author Rob van Bentem <robvanbentem@gmail.com>
 * @date 12/17/12 9:07 PM
 */
class Helper
{
    public static function match_uri($uri)
    {
        $match = "/" . $uri . "/";
        return preg_match($match, Request::uri()) === 1 ? true : false;
    }

    public static function active_class($uri)
    {
        return self::match_uri($uri) ? 'active' : '';
    }
}
