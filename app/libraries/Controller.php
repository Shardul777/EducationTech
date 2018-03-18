<?php


	/*
		Base Controller 
		Loads the models and views
	*/

	class Controller{

		// load model
		public function model($model){

			//require model file

			require_once '../app/models/'.$model.'.php';

			//instantiate model

			return new $model();
		}	


		public function view($view, $data = []){

			// Check for the view file

			if(file_exists('../app/views/'.$view.'.phtml')){

				require_once '../app/views/'.$view.'.phtml';
			}else{
				die('View does not exist');
			}
		}
	}

?>