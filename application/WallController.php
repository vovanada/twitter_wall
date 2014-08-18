<?php
/**
 * Created by Volodymyr Rositskyy.
 * Date: 8/15/14
 * Time: 3:44 PM
 */

class Controller {

	public function __construct(WallBase &$base){
		$this->view = new \View($this);
		$this->base = $base;
	}

	/*
	 * @return boolean
	 */
	public function isAjaxRequest(){
		if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
			return true;
		}
		return false;
	}
} 