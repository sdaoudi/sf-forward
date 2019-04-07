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

use PHPUnit\Framework\TestCase;
use SfForward\Util\RequestMethodMapping;

class RequestMethodMappingTest extends TestCase
{
    /**
     * isValidMethod test.
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
