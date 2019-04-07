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

use Nayjest\StrCaseConverter\Str;

/**
 * Class ParamsListService.
 */
class ParamsListService
{
    protected $serviceName;
    protected $routeId;

    /**
     * ParamsListService constructor.
     *
     * @param string $paramsList
     */
    public function __construct($paramsList)
    {
        list($this->serviceName, $this->routeId) = explode('&', $paramsList);
        $this->serviceName = str_replace('service=', '', $this->serviceName);
        $this->routeId = str_replace('routeId=', '', $this->routeId);
        $this->routeId = str_replace('_', '/', $this->routeId);
    }

    /**
     * @return string
     */
    public function getServiceName()
    {
        return Str::toSnakeCase($this->serviceName);
    }

    /**
     * @return string
     */
    public function getRouteId()
    {
        return $this->routeId;
    }
}
