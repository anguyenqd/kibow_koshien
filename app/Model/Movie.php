<?php
class Movie extends AppModel {
	public $name = 'movie';
	public function getAll() {
		$obj = $this -> find('all');
		return $obj;
	}

	public function getMovieById($id) {
		return $this -> find('first', array('conditions' => array('Movie.id' => $id)));
	}
	
	public function addItem($data) {
		$this -> create($data);
		$this -> save($data);
		return $this -> getLastInsertID();
	}

	public function updateItem($id = 0, $data = null) {
		if ($id != 0 && $data != null) {
			$inputData = array();
			foreach ($data as $column => $value) {
				$inputData = array_merge($inputData, array('Movie.' . $column => "'" . $value . "'"));
			}

			$result = $this -> updateAll($inputData, array('Movie.id = ' => $id));
			return $result;
		}

		return null;
	}

	public function deleteItem($id = 0) {
		return $this -> deleteAll(array('Movie.id' => $id), false);
	}
}
