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
    const WEB_FOLDER_NAME = 'web';
    const PUBLIC_FOLDER_NAME = 'public';

    /**
     * @param string $projectDir
     *
     * @return string
     */
    public static function getPublicDir($projectDir)
    {
        $projectDir = rtrim($projectDir, '/');

        if (file_exists($webDir = "$projectDir/".self::WEB_FOLDER_NAME.'/')) {
            return $webDir;
        }

        if (file_exists($publicDir = "$projectDir/".self::PUBLIC_FOLDER_NAME.'/')) {
            return $publicDir;
        }

        return $projectDir.'/';
    }
}
