<?php
/**
 * Created by PhpStorm.
 * User: douadis
 * Date: 13/03/2018
 * Time: 10:37
 */
namespace SfForward\Util;

class RequestMethodMapping
{
    const REQUEST_METHOD_GET    = 'get';
    const REQUEST_METHOD_POST   = 'post';

    const REQUEST_QUERY_GET     = 'query';
    const REQUEST_QUERY_POST    = 'request';

    static public $methodsMapping = [
        self::REQUEST_METHOD_GET    => self::REQUEST_QUERY_GET,
        self::REQUEST_METHOD_POST   => self::REQUEST_QUERY_POST,
    ];

    /**
     * @param string $method
     *
     * @return bool
     */
    public static function isValidMethod($method)
    {
        return isset(self::$methodsMapping[ $method ]);
    }
}