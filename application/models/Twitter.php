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
	public $screen_name = '';
	public $not = 1;

	public function getTweets() {

		$twitter_conn = new \models\TwitterOAuth();
		$latest_tweets = $twitter_conn->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=" . $this->screen_name . "&count=" . $this->not);
		return $latest_tweets;

	}

}