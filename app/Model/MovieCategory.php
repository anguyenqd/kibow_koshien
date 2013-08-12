<?php
class MovieCategory extends AppModel {
	public $name = 'moviecategories';
	public function getAll() {
		$obj = $this -> find('all');
		return $obj;
	}

	public function getMovieCategoryById($id) {
		return $this -> find('first', array('conditions' => array('MovieCategory.id' => $id)));
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
				$inputData = array_merge($inputData, array('MovieCategory.' . $column => "'" . $value . "'"));
			}

			$result = $this -> updateAll($inputData, array('MovieCategory.id = ' => $id));
			return $result;
		}

		return null;
	}

	public function deleteItem($id = 0) {
		return $this -> deleteAll(array('MovieCategory.id' => $id), false);
	}
}
