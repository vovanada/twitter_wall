<?php

/**
 * Created by PhpStorm.
 * User: Vovanada
 * Date: 15.08.14
 * Time: 23:22
 */
class View {
	function generate($view, $data = null) {

		if (is_array($data)) {
			extract($data);
		}

		include PROJECT_ROOT.'application/views/' . $view . '.php';
	}
}