<?php
/**
 * Created by Volodymyr Rositskyy.
 * Date: 8/15/14
 * Time: 3:44 PM
 */

class Controller {
	use \helpers\System;

	public function __construct(){
		$this->view = new \View($this);
	}
} 