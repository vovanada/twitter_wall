<?php
/**
 * Created by PhpStorm.
 * User: Vovanada
 * Date: 18.08.14
 * Time: 23:14
 */

class UrlManager{

	public $controller;
	public $method;
	public $params;

	public function __construct(WallBase &$base){
		$this->base = $base;
		$this->controller = $this->base->config['baseController'];
		$this->method = $this->base->config['baseMethod'];
		$this->parseUrl();
	}

	public function parseUrl(){
		$request_uri = $_SERVER['REQUEST_URI'];
		$params = explode('/',$request_uri);
		$count = 0;
		foreach($params as $param){

			if($param != ''){
				switch ($count){
					case 0:
						$this->controller = ucfirst($param);
						break;
					case 1:
						$this->method = $param;
						break;
					case ($count%2 == 0):
						$this->params[$param] = '';
						break;
					case ($count%2 == 1):
						end($this->params);
						$this->params[key($this->params)] = $param;
				}
				$count++;
			}
		}
	}
	/*
	 * return $_GET param
	 */
	public function getParam($param){
		if(isset($this->params[$param])){
			return $this->params[$param];
		}
		return false;
	}
}