<?php

	class PagesController extends Controller{

		public function __construct(){
			$this->postModel = $this->model('Post');
		}

		public function indexAction(){

				$posts = $this->postModel->getPosts();
				$data = [
					'title'=>'Welcome',
					'posts' => $posts
				];
				$this->view('Pages/index',$data);
		}
		public function aboutAction($id){

			echo '<br>'.$id;

		}
	}

?>