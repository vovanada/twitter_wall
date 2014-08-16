<?php

/**
 * Created by PhpStorm.
 * User: Vovanada
 * Date: 15.08.14
 * Time: 23:22
 */
class View {

	public $template_file = 'template';

	public function __construct(\Controller &$controller) {
		$this->controller = $controller;
	}

	public function render($view, $data = null) {

		if (is_array($data)) {
			extract($data);
		}
		$content = $this->renderPartial($view, $data);
		include PROJECT_ROOT . 'application/views/' . $this->template_file . '.php';
	}

	public function renderPartial($view, $data = null) {
		if (is_array($data)) {
			extract($data);
		}
		ob_start();
		ob_implicit_flush(false);
		require(PROJECT_ROOT . 'application/views/' . $view . '.php');

		return ob_get_clean();
	}
}