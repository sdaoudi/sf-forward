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
    protected $projectDir;
    protected $webDir;
    protected $publicDir;

    protected function setUp()
    {
        $this->projectDir = sprintf('%s/../..', __DIR__);
    }

    protected function tearDown()
    {
        $this->projectDir = null;
        $this->webDir = null;
        $this->publicDir = null;
    }

    public function testGetPublicDir()
    {
        $this->assertEquals($this->projectDir.'/', PublicDirectory::getPublicDir($this->projectDir));
    }

    public function testGetWebDirectoryForSf2And3()
    {
        $webDir = sprintf('%s/%s/', $this->projectDir, PublicDirectory::WEB_FOLDER_NAME);

        if (!is_dir($webDir)) {
            mkdir($webDir);
        }

        $this->assertEquals($webDir, PublicDirectory::getPublicDir($this->projectDir));

        if (is_dir($webDir)) {
            rmdir($webDir);
        }
    }

    public function testGetPublicDirectoryForSf4()
    {
        $publicDir = sprintf('%s/%s/', $this->projectDir, PublicDirectory::PUBLIC_FOLDER_NAME);

        if (!is_dir($publicDir)) {
            mkdir($publicDir);
        }

        $this->assertEquals($publicDir, PublicDirectory::getPublicDir($this->projectDir));

        if (is_dir($publicDir)) {
            rmdir($publicDir);
        }
    }
}
