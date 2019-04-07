<?php

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