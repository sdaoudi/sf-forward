<?php
/**
 * Created by PhpStorm.
 * User: sdaoudi
 * Date: 11/03/18
 * Time: 19:24
 */

namespace SfForward\Tests\Util;

use SfForward\Util\ParamsListService;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;

/**
 * Class ParamsListServiceTest
 */
class ParamsListServiceTest extends TestCase
{
    public function testGetServiceName()
    {
        $paramsList = 'service=UM&routeId=_cinema_film_2174';
        $paramsListService = new ParamsListService($paramsList);

        $this->assertEquals('UM', $paramsListService->getServiceName());
    }

    public function testGetRouteId()
    {
        $paramsList = 'service=UM&routeId=_cinema_film_2174';
        $paramsListService = new ParamsListService($paramsList);

        $this->assertEquals('/cinema/film/2174', $paramsListService->getRouteId());
    }
}