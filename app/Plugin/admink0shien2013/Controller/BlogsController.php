<?php
class BlogsController extends AppController {
	public $uses = array('Blog');

	public function beforeFilter() {
		if (!$this -> Session -> check('admin')) {
			$this -> redirect(array('controller' => 'pages', 'action' => 'display'));
		}
	}

	public function index() {
		$this -> set('blogs', $this -> Blog -> getAllBlogs());
	}

	public function add() {
		if (!empty($this -> request -> data)) {
			$data = $this -> request -> data['Blog'];
			$data['date_add'] = date('Y-m-d H:i:s');
			$this -> Blog -> insertBlog($data);
			$this -> redirect(array('action' => 'index'));
		}
	}

	public function edit($id = 0) {

		if ($id != 0) {
			if (empty($this -> request -> data)) {
				$this -> request -> data = $this -> Blog -> getBlogByID($id);
			} else {
				$data = $this->request->data;
				$this->Blog->editBlog($id, $data['Blog']);
				$this -> Session -> setFlash('Your change was success');
				$this -> redirect(array('action' => 'index'));
			}
		} else
			$this -> redirect(array('action' => 'index'));

	}

	public function delete($id = 0) {
		if ($id != 0) {
			$this -> Blog -> deleteBlog($id);
			$this -> redirect(array('action' => 'index'));
		}
	}

}
