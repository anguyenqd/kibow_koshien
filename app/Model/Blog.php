<?php
class Blog extends AppModel {
	public $name = 'blogs';

	public function getAllBlogs() {
		return $this -> find('all', array('order' => array('Blog.date_add DESC')));
	}

	public function insertBlog($data = null) {
		if ($data != null) {
			$this -> create($data);
			$this -> save($data);
			return $this -> getLastInsertID();
		}
		return null;
	}

	public function getBlogByID($id = 0) {
		if ($id != 0) {
			return $this -> find('first', array('conditions' => array('Blog.blog_id' => $id)));
		}

		return null;
	}

	public function editBlog($id = 0, $data = null) {
		if ($id != 0 && $data != null) {
			$inputData = array();
			foreach ($data as $column => $value) {
				$inputData = array_merge($inputData, array('Blog.' . $column => "'" . $value . "'"));
			}

			$result = $this -> updateAll($inputData, array('Blog.blog_id = ' => $id));
			return $result;
		}

		return null;
	}

	public function deleteBlog($id = 0) {
		if ($id != 0)
			return $this -> deleteAll(array('Blog.blog_id' => $id), false);

		return null;
	}

}
