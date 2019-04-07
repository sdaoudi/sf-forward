<?php

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
