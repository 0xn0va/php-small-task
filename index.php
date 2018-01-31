<?php

// Model that has a construct and a public variable for message
class Model {
	public $msg;
	public function __construct() {
		$this->msg = 'Hello world!';
	}		
}

// view with construct and public show function
class View {
	private $model;
	public function __construct(Model $model) {
		$this->model = $model;
	}
	
	public function show() {
		$page = '<a href="index.php?action=mouseButtonPressed">' . $this->model->msg . '</a>';
		return $page;
	}
}

// Controller with construct and mouse press function 
class Controller {
	private $model;
	public function __construct(Model $model) {
		$this->model = $model;
	}

	public function mouseButtonPressed() {
		$this->model->msg = 'Updated Hello Word!';
	}
}

// we initiate and feed the view and controller with our new model that is the message and check the action (click
$model = new Model();
$view = new View($model);
$controller = new Controller($model);

if (isset($_GET['action']))
	$controller->{$_GET['action']}();

// in the end we show the message to page
echo $view->show();
?>
