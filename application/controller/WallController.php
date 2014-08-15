<?php
/**
 * Created by Volodymyr Rositskyy.
 * Date: 8/15/14
 * Time: 3:39 PM
 */

namespace controller;

class WallController extends BaseController{

	public function index(){
		$twitter_model = new \models\Twitter();
		$tweets = $twitter_model->getUserTweets('voskova_figura',1);
		$this->p($tweets);

		$this->view->generate('index');

	}

}