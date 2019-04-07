<?php

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