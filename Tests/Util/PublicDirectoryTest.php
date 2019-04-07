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
use SfForward\Util\PublicDirectory;

class PublicDirectoryTest extends TestCase
{
    public function testGetPublicDir()
    {
        $projectDir = '/var/www/sites/sf-forward';
        $this->assertEquals($projectDir, PublicDirectory::getPublicDir($projectDir));
    }
}
