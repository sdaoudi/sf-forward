<?php

namespace SfForward\Util;

use Nayjest\StrCaseConverter\Str;

/**
 * Class ParamsListService
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
        $this->serviceName  = str_replace('service=', '', $this->serviceName);
        $this->routeId      = str_replace('routeId=', '', $this->routeId);
        $this->routeId      = str_replace('_', '/', $this->routeId);
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