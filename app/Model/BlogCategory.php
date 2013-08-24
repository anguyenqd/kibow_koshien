<?php
class BlogCategory extends AppModel {
	public $name = 'blog_categories';

	public function getAllCategory() {
		return $this -> find('all');
	}
	
	public function getCategoryWithPostCount()
	{
		return $this->query('SELECT COUNT(blog_id) as post_count, `blog_categories`.category_id, category_name 
							FROM `blog_categories`, `blogs` 
							WHERE `blog_categories`.`category_id` = `blogs`.`category_id` 
							GROUP BY `blog_categories`.category_id, category_name');
	}

	public function insertCategory($data = null) {
		if ($data != null) {
			$this -> create($data);
			$this -> save($data);
			return $this -> getLastInsertID();
		}
		return null;
	}

	public function getCategoryByID($id = 0) {
		if ($id != 0) {
			return $this -> find('first', array('conditions' => array('BlogCategory.category_id' => $id)));
		}

		return null;
	}

	public function editCategory($id = 0, $data = null) {
		if ($id != 0 && $data != null) {
			$inputData = array();
			foreach ($data as $column => $value) {
				$inputData = array_merge($inputData, array('BlogCategory.' . $column => "'" . $value . "'"));
			}

			$result = $this -> updateAll($inputData, array('BlogCategory.category_id = ' => $id));
			return $result;
		}

		return null;
	}

	public function deleteCategory($id = 0) {
		if ($id != 0)
			return $this -> deleteAll(array('BlogCategory.category_id' => $id), false);

		return null;
	}

}
