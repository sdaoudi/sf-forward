<?php
/**
 * Created by PhpStorm.
 * User: sdaoudi
 * Date: 02/04/18
 * Time: 22:49
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