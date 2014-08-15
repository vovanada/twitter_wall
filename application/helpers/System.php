<?php
/**
 * Created by PhpStorm.
 * User: Vovanada
 * Date: 15.08.14
 * Time: 22:42
 */

namespace helpers;

trait System {
	function p($value){
		echo "<pre>";
		print_r($value);
		echo "</pre>";
		die;
	}
}