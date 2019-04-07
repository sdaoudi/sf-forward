<?php

/*
 * This file is part of the SF Forward Bundle.
 *
 * (c) DAOUDI Soufian <soufian.daoudi2@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SfForward\Util;

class RequestMethodMapping
{
    const REQUEST_METHOD_GET = 'get';
    const REQUEST_METHOD_POST = 'post';

    const REQUEST_QUERY_GET = 'query';
    const REQUEST_QUERY_POST = 'request';

    const CONTENT_TYPE_GET = 'query';
    const CONTENT_TYPE_POST = 'form_params';

    public static $methodsMapping = [
        self::REQUEST_METHOD_GET => self::REQUEST_QUERY_GET,
        self::REQUEST_METHOD_POST => self::REQUEST_QUERY_POST,
    ];

    public static $contentTypes = [
        self::REQUEST_METHOD_GET => self::CONTENT_TYPE_GET,
        self::REQUEST_METHOD_POST => self::CONTENT_TYPE_POST,
    ];

    /**
     * @param string $method
     *
     * @return bool
     */
    public static function isValidMethod($method)
    {
        return isset(self::$methodsMapping[$method]);
    }
}
