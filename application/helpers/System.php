<?php

/**
 * Created by PhpStorm.
 * User: Vovanada
 * Date: 15.08.14
 * Time: 22:42
 */
class System {
	static function p($value) {
		echo "<pre>";
		print_r($value);
		echo "</pre>";
		die;
	}

	static function getTimeAgo($time) {
		$tweet_time = strtotime($time);
		$now_time = time();
		$time_ago = ($now_time - $tweet_time);
		$hours = floor($time_ago / 3600);
		$minutes = floor($time_ago / 60);
		$days = floor($time_ago / 86400);

		if ($minutes < 60) {
			$format_time = self::getDeclension($minutes, 'хвилина', 'хвилини', 'хвилин') . ' тому';
		} else {
			if ($minutes > 60 && $days < 1) {
				$format_time = self::getDeclension($hours, 'година', 'години', 'годин') . ' тому';
			} else {
				$format_time = self::getDeclension($days, 'день', 'дні', 'днів') . ' тому';
			}
		}

		return $format_time;
	}

	public static function getDeclension($int, $im, $rd, $rdm, $justWord = false) {
		//'хвилина','хвилини','хвилин'

		$a = $int % 10;
		$b = $int % 100;

		switch (true) {
			case($a == 0 || $a >= 5 || ($b >= 10 && $b <= 20)):
				$result = $rdm;
				break;
			case($a == 1):
				$result = $im;
				break;
			case($a >= 2 && $a <= 4):
				$result = $rd;
				break;
		}

		if ($justWord) {
			return $result;
		}

		return $int . ' ' . $result;
	}
}