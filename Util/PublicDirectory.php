<?php
/**
 * Created by PhpStorm.
 * User: sdaoudi
 * Date: 25/03/18
 * Time: 01:50
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
		$webDir    = "$projectDir/web/";
		$publicDir = "$projectDir/public/";

		if (file_exists($webDir)) {
			return $webDir;
		}

		if (file_exists($publicDir)) {
			return $publicDir;
		}

		return $projectDir;
	}
}