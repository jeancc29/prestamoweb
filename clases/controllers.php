<?php 

abstract class Controller{
	private $request;
	private $action;

	public function __construct($action, $request){
		$this->action = $action;
		$this->request = $request;
	}

	public function executeAction(){
		return $this->{$this->action}();
	}

	public function returnView($viewmodel, $fullview){
		$view = 'views/' . get_class($this) . '/' . $this->action . '.php';
		if($fullview){
			require('views/main.php');
		}else{
			require($view);
		}
	}
}

 ?>