<?php
/**
 * Created by Volodymyr Rositskyy.
 * Date: 8/15/14
 * Time: 4:10 PM
 */
namespace models;

class Twitter {
	public $consumer_key = '';
	public $consumer_secret = '';
	public $access_token = '';
	public $access_token_secret = '';

	public function getUserTweets($user,$count) {
		$twitter_conn = new \models\TwitterOAuth();
		$latest_tweets = $twitter_conn->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=" . $user . "&count=" . $count);
		return $this->parseTweets($latest_tweets);
	}

	protected function parseTweets($tweets){
		$return_tweets = [];

		foreach($tweets as $key=>$tweet){
			$return_tweets[$key]['text'] = $tweet->text;
			$return_tweets[$key]['user'] = $this->getUser($tweet);
		}

		return $return_tweets;
	}

	/*
	 * get user. if this tweet is retweet, get owner tweet
	 * @return array
	 */
	protected function getUser($tweet){

		$user_data = [];

		if(isset($tweet->retweeted_status->user)){
			$user_data =  $tweet->retweeted_status->user;
		}else{
			$user_data =  $tweet->user;
		}

		$user['name'] = $user_data->name;
		$user['nickname'] = $user_data->screen_name;
		$user['avatar'] = $user_data->profile_image_url;

		return $user;
	}

}