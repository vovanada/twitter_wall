<?php

/**
 * Created by Volodymyr Rositskyy.
 * Date: 8/15/14
 * Time: 3:40 PM
 */
class WallBase {

	public $config;

	public function __construct() {
		$this->config = require('../config/main.php');
		$this->urlManger = new UrlManager($this);
	}

	public function run() {
		$controller_name = $this->getController();
		$controller = new $controller_name($this);
		if(!method_exists($controller,$this->urlManger->method)){
			$this->get404Error();
		}
		$controller->{$this->urlManger->method}();
	}

	protected function getController() {
		$controller = 'controller\\'.$this->urlManger->controller.'Controller';
		if(!class_exists('controller\\'.$this->urlManger->controller.'Controller')){
			$this->get404Error();
		}
		return $controller;
	}

	public function getConfig($config_name) {
		if (isset($this->config[$config_name])) {
			return $this->config[$config_name];
		}
	}

	public function get404Error(){
		echo 404;
		die;
	}

}