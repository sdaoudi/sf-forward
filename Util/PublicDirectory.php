<?php

/*
 * This file is part of the SF Forward Bundle.
 *
 * (c) DAOUDI Soufian <soufian.daoudi2@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SfForward\Util;

class PublicDirectory
{
    /**
     * @param $projectDir
     *
     * @return string
     */
    public static function getPublicDir($projectDir)
    {
        if (file_exists($webDir = "$projectDir/web/")) {
            return $webDir;
        }

        if (file_exists($publicDir = "$projectDir/public/")) {
            return $publicDir;
        }

        return $projectDir;
    }
}
