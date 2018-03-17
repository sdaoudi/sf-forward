<?php
/**
 * Created by PhpStorm.
 * User: sdaoudi
 * Date: 17/03/18
 * Time: 23:53
 */

namespace SfForward\Tests\Util;

use PHPUnit\Framework\TestCase;
use SfForward\Util\RequestMethodMapping;

class RequestMethodMappingTest extends TestCase
{

    /**
     * isValidMethod test
     */
    public function testIsValidMethod()
    {
        $this->assertTrue(RequestMethodMapping::isValidMethod('post'));
        $this->assertTrue(RequestMethodMapping::isValidMethod('get'));

        $this->assertNotTrue(RequestMethodMapping::isValidMethod('put'));
        $this->assertNotTrue(RequestMethodMapping::isValidMethod('delete'));
        $this->assertNotTrue(RequestMethodMapping::isValidMethod('update'));
    }

}
