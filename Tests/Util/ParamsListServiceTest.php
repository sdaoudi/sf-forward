<?php

/*
 * This file is part of the SF Forward Bundle.
 *
 * (c) DAOUDI Soufian <soufian.daoudi2@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SfForward\Tests\Util;

use SfForward\Util\ParamsListService;
use PHPUnit\Framework\TestCase;

/**
 * Class ParamsListServiceTest.
 */
class ParamsListServiceTest extends TestCase
{
    /**
     * Test getServiceName Method.
     */
    public function testGetServiceName()
    {
        $paramsList = 'service=UM&routeId=_cinema_film_2174';
        $paramsListService = new ParamsListService($paramsList);

        $this->assertEquals('u_m', $paramsListService->getServiceName());
    }

    /**
     * Test getRouteId Method.
     */
    public function testGetRouteId()
    {
        $paramsList = 'service=UM&routeId=_cinema_film_2174';
        $paramsListService = new ParamsListService($paramsList);

        $this->assertEquals('/cinema/film/2174', $paramsListService->getRouteId());
    }
}
