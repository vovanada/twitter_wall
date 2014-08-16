<?php
/**
 * Created by Volodymyr Rositskyy.
 * Date: 8/15/14
 * Time: 3:39 PM
 */

namespace controller;

class IndexController extends \Controller{

	public function index(){
		$twitter_model = new \models\Twitter();
		$tweets = $twitter_model->getUserTweets('voskova_figura',3);
		$this->view->render('body',['tweets'=>$tweets]);
	}

}