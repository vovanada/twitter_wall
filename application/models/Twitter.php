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
	protected $current_tweet = false;

	public function getUserTweets($user,$count) {
		$twitter_conn = new \models\TwitterOAuth();
		$latest_tweets = $twitter_conn->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=" . $user . "&count=" . $count);
		return $this->parseTweets($latest_tweets);
	}

	protected function parseTweets($tweets){
		$return_tweets = [];

		foreach($tweets as $key=>$tweet){
			//print_r($tweet);die;
			$this->current_tweet = $tweet;
			$return_tweets[$key]['text'] = $this->getText();
			$return_tweets[$key]['time'] = $this->getTime();
			$return_tweets[$key]['user'] = $this->getUser();
			$return_tweets[$key]['media'] = $this->getMedia($return_tweets[$key]['text']);
			$this->current_tweet = false;
		}

		return $return_tweets;
	}

	/*
	 * get user. if this tweet is retweet, get owner tweet
	 * @return array
	 */
	protected function getUser(){

		if(isset($this->current_tweet->retweeted_status->user)){
			$user_data =  $this->current_tweet->retweeted_status->user;
		}else{
			$user_data =  $this->current_tweet->user;
		}

		$user['name'] = $user_data->name;
		$user['nickname'] = $user_data->screen_name;
		$user['avatar'] = $user_data->profile_image_url;

		return $user;
	}

	protected function getText(){
		if(isset($this->current_tweet->retweeted_status)){
			$text = $this->current_tweet->retweeted_status->text;
		}else{
			$text =  $this->current_tweet->text;
		}

		$this->humanizeUrl($text);

		return $text;
	}

	protected function humanizeUrl(&$text){
		if(isset($this->current_tweet->entities->urls)){
			foreach($this->current_tweet->entities->urls as $url){
				$text = str_replace($url->url,'<a href="'.$url->expanded_url.'">'.$url->display_url.'</a>',$text);
			}
		}
	}

	protected function getMedia(&$text){
		$return_media = [];
		if(isset($this->current_tweet->extended_entities->media)){
			foreach($this->current_tweet->extended_entities->media as $media){
				$return_media[] = $media->media_url;
				$text = str_replace($media->url,'',$text);
			}
		}
		return $return_media;
	}

	protected function getTime(){
		if(isset($this->current_tweet->retweeted_status)){
			return $this->current_tweet->retweeted_status->created_at;
		}else{
			return $this->current_tweet->created_at;
		}
	}

}