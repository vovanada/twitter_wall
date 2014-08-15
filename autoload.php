<?php
/**
 * Created by Volodymyr Rositskyy.
 * Date: 8/15/14
 * Time: 12:11 PM
 */
class ProjectAutoloader {

	public static  $class = [
		'application/models/twitter',
	];

	public static function load() {
		foreach(self::$class as $file){
			self::require_file($file);
		}
	}

	public static function require_file($file) {
		require PROJECT_ROOT.'/'.$file.'.php';
	}
}

