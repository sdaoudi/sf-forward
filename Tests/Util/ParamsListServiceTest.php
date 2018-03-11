<?php
/**
 * Created by PhpStorm.
 * User: sdaoudi
 * Date: 11/03/18
 * Time: 19:24
 */

namespace SfForward\Tests\Util;

use SfForward\Util\ParamsListService;
use PHPUnit\Framework\TestCase;

/**
 * Class ParamsListServiceTest
 */
class ParamsListServiceTest extends TestCase
{
    /**
     * Test getServiceName Method
     */
    public function testGetServiceName()
    {
        $paramsList = 'service=UM&routeId=_cinema_film_2174';
        $paramsListService = new ParamsListService($paramsList);

        $this->assertEquals('UM', $paramsListService->getServiceName());
    }

    /**
     * Test getRouteId Method
     */
    public function testGetRouteId()
    {
        $paramsList = 'service=UM&routeId=_cinema_film_2174';
        $paramsListService = new ParamsListService($paramsList);

        $this->assertEquals('/cinema/film/2174', $paramsListService->getRouteId());
    }
}