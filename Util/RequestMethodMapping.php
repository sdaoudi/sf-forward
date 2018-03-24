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

    const CONTENT_TYPE_GET     = 'query';
    const CONTENT_TYPE_POST    = 'form_params';

    static public $methodsMapping = [
        self::REQUEST_METHOD_GET    => self::REQUEST_QUERY_GET,
        self::REQUEST_METHOD_POST   => self::REQUEST_QUERY_POST,
    ];

    static public $contentTypes = [
        self::REQUEST_METHOD_GET    => self::CONTENT_TYPE_GET,
        self::REQUEST_METHOD_POST   => self::CONTENT_TYPE_POST,
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