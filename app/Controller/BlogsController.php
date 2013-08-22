<?php
class BlogsController extends AppController {
	public $uses = array('Blog');

	public function index() {
		$this -> set('blogs', $this -> Blog -> getAllBlogsWithCategory());
	}

	public function detail($id = 0) {
		if ($id != 0) {
			//Load blog detail
			$this -> set('blog', $this -> Blog -> getBlogByID($id));
		} else {
			$this -> redirect(array('action' => 'index'));
		}
	}

}
