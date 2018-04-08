<?php

/*
	App core class
	Creates URL and loads core controller
	URL format : /controller/method/params
*/

class Core{

	protected $currentController = 'PagesController';
	protected $currentMethod = 'indexAction';
	protected $params = [];

	public function __construct(){
		//print_r($this->getUrl());
		
		$url = $this->getUrl();

		// look in controllers for first value

		// below path is given considering we are public/index.php

		if(file_exists('../app/controllers/'.ucwords($url[0]).'Controller.php')){

			//If exists, set as current controller

			$this->currentController = ucwords($url[0]).'Controller';

			// Unset 0 index

			unset($url[0]);			
		}

		// Require the controller

		require_once '../app/controllers/'.$this->currentController.'.php';

		// Instantiate the controller

		$this->currentController = new $this->currentController;

		// check for second part of url

		if(isset($url[1])){

			// check to see if method exists in controller

			if(method_exists($this->currentController, $url[1].'Action')){
				$this->currentMethod = $url[1].'Action';

				// unset $url[1]

				unset($url[1]);
			}
		}

		// Get params

		$this->params = $url ? array_values($url):[];

		// Call a callback with array of params

		call_user_func_array([$this->currentController,
							 $this->currentMethod],
							 $this->params
							);


	}

	public function getUrl(){
		
		if(isset($_GET['url'])){
			$url = rtrim($_GET['url'],'/');
			$url = filter_var($url,FILTER_SANITIZE_URL);
			$url = explode('/',$url);

			return $url;

		}
	}


}

?>
