<?php
/**
 * Created by PhpStorm.
 * User: Vovanada
 * Date: 17.08.14
 * Time: 12:43
 */
namespace models;

class Instagram {
	static function getDirectUrlByUrl($url) {
		return self::getUrlByShortUrl($url . 'media/?size=l');

	}

	static function getUrlByShortUrl($url) {

		$path_info = pathinfo($url);
		$img_extension = ['jpg', 'jpeg', 'png'];
		if (isset($path_info['extension'])) {
			if (in_array($path_info['extension'], $img_extension)) {
				return $url;
			}
		}

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		$http_data = curl_exec($ch);
		$curl_info = curl_getinfo($ch);
		$headers = substr($http_data, 0, $curl_info["header_size"]);
		preg_match("!\r\n(?:Location|URI): *(.*?) *\r\n!", $headers, $matches);
		if (isset($matches[1])) {
			return $matches[1];
		} else {
			return $url;
		}

	}
}