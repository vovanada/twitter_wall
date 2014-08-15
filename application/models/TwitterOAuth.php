<?php
/**
 * Created by Volodymyr Rositskyy.
 * Date: 8/15/14
 * Time: 4:18 PM
 */
namespace models;

class TwitterOAuth extends \TwitterOAuth {


	function __construct() {


		$wallBase = new \WallBase();

		$consumer =  $wallBase->config['twitter_consumer_key'];
		$consumer_secret =  $wallBase->config['twitter_consumer_secret'];
		$access_token =  $wallBase->config['twitter_access_token'];
		$access_token_secret =  $wallBase->config['twitter_access_token_secret'];

		parent::__construct($consumer,$consumer_secret,$access_token,$access_token_secret);
	}



}