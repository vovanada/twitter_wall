<?php

/**
 * Created by Volodymyr Rositskyy.
 * Date: 8/15/14
 * Time: 12:11 PM
 */
class ProjectAutoloader {

	public static $class = [
		'application/helpers/System',
		'application/WallBase',
		'application/WallView',
		'application/WallController',
		'application/base/UrlManager',
		'application/models/*',
		'application/controller/*',
	];

	public static function load() {
		foreach (self::$class as $file) {
			self::parseAndRunRule($file);
		}
	}

	public static function require_file($file) {
		require_once PROJECT_ROOT . '/' . $file . '.php';
	}

	static function parseAndRunRule($class) {
		if (preg_match('/\*$/', $class)) {
			$class = str_replace('*','',$class);
			$files = self::getPhpFileInDirectory($class);
			foreach ($files as $file) {
				self::require_file($class.$file);
			}
		} else {
			self::require_file($class);
		}
	}

	static function getPhpFileInDirectory($class) {
		$phpFiles = [];
		$files = scandir(PROJECT_ROOT . str_replace('*', '', $class));

		foreach ($files as $file) {
			$pathInfo = pathinfo($file);
			if ($pathInfo['extension'] == 'php') {
				$phpFiles[] = $pathInfo['filename'];
			}
		}

		return $phpFiles;
	}
}

