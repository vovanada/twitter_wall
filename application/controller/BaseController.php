<?php
/**
 * Created by Volodymyr Rositskyy.
 * Date: 8/15/14
 * Time: 3:44 PM
 */

namespace controller;


class BaseController {
	use \helpers\System;

	public function __construct(){
		$this->view = new \View();
	}
} 