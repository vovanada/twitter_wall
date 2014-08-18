<?php
/**
 * Created by Volodymyr Rositskyy.
 * Date: 8/15/14
 * Time: 12:11 PM
 */
class ProjectAutoloader {

	public static  $class = [
		'application/helpers/System',
		'application/WallBase',
		'application/WallView',
		'application/WallController',
		'application/base/UrlManager',
		'application/models/Instagram',
		'application/models/Twitter',
		'application/models/TwitterOAuth',
		'application/controller/IndexController',
		'application/controller/TwitterController',
	];

	public static function load() {
		foreach(self::$class as $file){
			self::require_file($file);
		}
	}

	public static function require_file($file) {
		require_once PROJECT_ROOT.'/'.$file.'.php';
	}
}

