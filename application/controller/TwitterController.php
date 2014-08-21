<?php
/**
 * Created by PhpStorm.
 * User: Vovanada
 * Date: 18.08.14
 * Time: 23:46
 */
namespace controller;
class TwitterController extends \Controller{

	public function getTweets(){

		if(!$this->isAjaxRequest()){
			$this->base->get404Error();
		}

		$last_tweet = (isset($_POST['last_tweet'])) ? $_POST['last_tweet'] : '';

		$return_tweets_array = [];
		$count = ($this->base->urlManger->getParam('count') && $this->base->urlManger->getParam('count')<50) ? (int)$this->base->urlManger->getParam('count') : 20;

		$twitter_model = new \models\Twitter();
		$tweets = $twitter_model->getUserTweets($this->base->config['twitter_screen_name'],$count);

		foreach($tweets as $tweet){
			if($last_tweet == $tweet['id']){

				break;
			}
			$return_tweets_array[$tweet['id']] = $this->view->renderPartial('tweet',$tweet);
		}

		$return_tweets_array = array_reverse($return_tweets_array);

		echo json_encode($return_tweets_array);
	}
}