<?php
class MoviesController extends AppController {
	public $uses = array('Movie', 'MovieCategory');

	public function index() {
		//load all users
		if (!$this -> Session -> check('admin')) {
			$this -> redirect(array('controller'=> 'pages', 'action' => 'display'));
		}
		$result = $this -> Movie -> getAll();
		$this -> set('result', $result);
	}

	public function add() {
		if (!$this -> Session -> check('admin')) {
			$this -> redirect(array('controller'=> 'pages', 'action' => 'display'));
		}
		if (!empty($this -> request -> data)) {
			$data = $this -> request -> data['Movie'];
			
			$image = '';
			
			if (!empty($data['image']['tmp_name']) && is_uploaded_file($data['image']['tmp_name'])) {
			  // Strip path information
			  $fileName = basename($data['image']['name']);
			  move_uploaded_file($data['image']['tmp_name'], WWW_ROOT . DS . 'img' . DS . 'uploads' . DS . $fileName);
			  $image = 'uploads' . DS . $fileName;
			}
			$data['image'] = $image;
			$this -> Movie -> addItem($data);
			$this -> redirect(array('action' => 'index'));
		}
		
		// Prepare data
		//Load school list with id
		$categories = $this -> MovieCategory -> getAll();
		$categorylList = array();
		$i = 0;
		foreach ($categories as $category) {
		  $categoryList[$category['MovieCategory']['id']] = $category['MovieCategory']['title'];
		  $i++;
		}
		$this -> set('categories', $categoryList);
	}

	public function edit($id = null) {
		if (!$this -> Session -> check('admin')) {
			$this -> redirect(array('controller'=> 'pages', 'action' => 'display'));
		}
		$id = isset($_GET['id']) ? $_GET['id'] : '';
		if ($id != '') {
		    
		  
			if (empty($this -> request -> data)) {
			    $this -> request -> data = $this -> Movie -> getMovieById($id);
				// Prepare data
				//Load school list with id
				$categories = $this -> MovieCategory -> getAll();
				$categorylList = array();
				$i = 0;
				foreach ($categories as $category) {
				  $categoryList[$category['MovieCategory']['id']] = $category['MovieCategory']['title'];
				  $i++;
				}
				$this -> set('categories', $categoryList);
			} else {

				$data = $this -> request -> data['Movie'];
				
				$image = '';
					
				if (!empty($data['image']['tmp_name']) && is_uploaded_file($data['image']['tmp_name'])) {
				  // Strip path information
				  $fileName = basename($data['image']['name']);
				  move_uploaded_file($data['image']['tmp_name'], WWW_ROOT . DS . 'img' . DS . 'uploads' . DS . $fileName);
				  $image = 'uploads' . DS . $fileName;
				  
				  $data['image'] = $image;
				} 
				else {
				  unset($data['image']);
				}
				
				$this -> Movie -> updateItem($id, $data);
				$this -> redirect(array('action' => 'index'));
			}
		}
	}

	public function deleteItem() {
		$id = isset($_GET['id']) ? $_GET['id'] : '';
		$this -> Movie -> deleteItem($id);
		$this -> redirect(array('action' => 'index'));
	}

}
