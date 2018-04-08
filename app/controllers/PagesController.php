<?php

	class PagesController extends Controller{

		public function __construct(){
			//echo 'Pages Controller is loaded';
		}

		public function indexAction(){
				$data = ['title'=>'Welcome'];
				$this->view('Pages/index',$data);
		}
		public function aboutAction($id){

			echo '<br>'.$id;

		}
	}

?>