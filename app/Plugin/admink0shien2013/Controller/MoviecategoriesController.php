<?php
class MoviecategoriesController extends AppController {
	public $uses = array('MovieCategory');

	public function index() {
		//load all users
		if (!$this -> Session -> check('admin')) {
			$this -> redirect(array('controller'=> 'pages', 'action' => 'display'));
		}
		$result = $this -> MovieCategory -> getAll();
		$this -> set('result', $result);
	}

	public function add() {
		if (!$this -> Session -> check('admin')) {
			$this -> redirect(array('controller'=> 'pages', 'action' => 'display'));
		}
		if (!empty($this -> request -> data)) {
			$data = $this -> request -> data['MovieCategory'];

			$this -> MovieCategory -> addItem($data);
			$this -> redirect(array('action' => 'index'));
		}
	}

	public function edit($id = null) {
		if (!$this -> Session -> check('admin')) {
			$this -> redirect(array('controller'=> 'pages', 'action' => 'display'));
		}
		$id = isset($_GET['id']) ? $_GET['id'] : '';
		if ($id != '') {
			if (empty($this -> request -> data)) {
				$this -> request -> data = $this -> MovieCategory -> getMovieCategoryById($id);
			} else {

				$data = $this -> request -> data['MovieCategory'];
				
				$this -> MovieCategory -> updateItem($id, $data);
				$this -> redirect(array('action' => 'index'));
			}
		}
	}

	public function deleteItem() {
		$id = isset($_GET['id']) ? $_GET['id'] : '';
		$this -> MovieCategory -> deleteItem($id);
		$this -> redirect(array('action' => 'index'));
	}

}
