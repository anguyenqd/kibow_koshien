<?php
class Blog extends AppModel {
	public $name = 'blogs';

	public function getAllBlogs() {
		return $this -> find('all', array('order' => array('Blog.date_add DESC')));
	}

	public function getAllBlogsWithCategory() {
		return $this -> query('SELECT `blogs`.blog_id, `blogs`.blog_title, `blogs`.meta_description,`blogs`.blog_short_content, `blogs`.date_add, `blogs`.status, `blog_categories`.category_name FROM `blogs`, `blog_categories` WHERE `blogs`.`category_id` = `blog_categories`.`category_id` ORDER BY date_add DESC');
	}

	public function getDateListWithPostCount() {
		return $this -> query('SELECT DISTINCT(CONCAT(MONTH(date_add), \' \' , YEAR(date_add))) AS date,
							MONTH(date_add) as month,YEAR(date_add) as year,  (SELECT COUNT(*) 
							FROM blogs where MONTH(date_add) = month AND YEAR(date_add) = year) as post_count FROM blogs 
							');
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

	public function getBlogByCategory($id = 0) {
		if ($id != 0)
			return $this -> find('all', array('conditions' => array('Blog.category_id = ' => $id)));

		return null;
	}
	
	public function getBlogByDate($month = 0, $year = 0) {
		if ($month != 0 && $year != 0)
			return $this -> find('all', array('conditions' => array('MONTH(Blog.date_add) = ' => $month, 'YEAR(Blog.date_add) = ' => $year), 'order' => 'Blog.date_add DESC'));

		return null;
	}
}
