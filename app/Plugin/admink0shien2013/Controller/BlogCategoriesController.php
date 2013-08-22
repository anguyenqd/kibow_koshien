<?php
class BlogCategoriesController extends AppController {
	public $uses = array('BlogCategory');
	
	public function beforeFilter() {
		if (!$this -> Session -> check('admin')) {
			$this -> redirect(array('controller' => 'pages', 'action' => 'display'));
		}
	}

	public function index() {
		$this -> set('categories', $this -> BlogCategory -> getAllCategory());
	}

	public function add() {
		if (!empty($this -> request -> data)) {
			$data = $this -> request -> data['BlogCategory'];
			$this -> BlogCategory -> insertCategory($data);
			$this -> redirect(array('action' => 'index'));
		}
	}

	public function edit($id = 0) {

		if ($id != 0) {
			if (empty($this -> request -> data)) {
				$this -> request -> data = $this -> Blog -> getCategoryByID($id);
			} else {
				$data = $this->request->data;
				$this->BlogCategory->editCategory($id, $data['BlogCategory']);
				$this -> Session -> setFlash('Your change was success');
				$this -> redirect(array('action' => 'index'));
			}
		} else
			$this -> redirect(array('action' => 'index'));

	}

	public function delete($id = 0) {
		if ($id != 0) {
			$this -> BlogCategory -> deleteCategory($id);
			$this -> redirect(array('action' => 'index'));
		}
	}
}