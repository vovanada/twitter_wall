<?php
/**
 * Created by Volodymyr Rositskyy.
 * Date: 8/15/14
 * Time: 3:39 PM
 */

namespace controller;

class OeController extends \Controller{

	public function index(){
		$tweets = [];
		$this->view->render('body',['tweets'=>$tweets]);
	}

}