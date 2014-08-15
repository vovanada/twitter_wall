<?php
/**
 * Created by Volodymyr Rositskyy.
 * Date: 8/15/14
 * Time: 3:40 PM
 */

class WallBase{

	public $config;

	public function __construct(){
		$this->config = require_once('../config/main.php');
	}

	public function run(){
		$controller_name = $this->getController();
		$controller = new $controller_name;
		$controller->index();
	}

	protected function getController(){
		return $this->config['baseController'];
	}



}