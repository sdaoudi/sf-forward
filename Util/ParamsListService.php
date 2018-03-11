<?php
/**
 * Created by PhpStorm.
 * User: sdaoudi
 * Date: 10/03/18
 * Time: 18:12
 */

namespace SfForward\Util;

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
        return $this->serviceName;
    }

    /**
     * @return string
     */
    public function getRouteId()
    {
        return $this->routeId;
    }




}