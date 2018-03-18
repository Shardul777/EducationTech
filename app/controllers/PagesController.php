<?php

	class PagesController extends Controller{

		public function __construct(){
			//echo 'Pages Controller is loaded';
		}

		public function indexAction(){

				$this->view('Header');
		}
		public function aboutAction($id){

			echo '<br>'.$id;

		}
	}

?>