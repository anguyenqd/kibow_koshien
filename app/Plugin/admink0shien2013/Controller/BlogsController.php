<?php
class BlogsController extends AppController {
	public $uses = array('Blog', 'BlogCategory');

	public function beforeFilter() {
		if (!$this -> Session -> check('admin')) {
			$this -> redirect(array('controller' => 'pages', 'action' => 'display'));
		}
	}

	public function index() {
		$this -> set('blogs', $this -> Blog -> getAllBlogsWithCategory());
	}

	public function add() {
		if (!empty($this -> request -> data)) {
			$data = $this -> request -> data['Blog'];
			$data['date_add'] = date('Y-m-d H:i:s');
			$this -> Blog -> insertBlog($data);
			$this -> redirect(array('action' => 'index'));
		} else {
			$categories = $this -> BlogCategory -> getAllCategory();
			$optionCategoryList = array();
			foreach ($categories as $category) {
				$optionCategoryList[$category['BlogCategory']['category_id']] = $category['BlogCategory']['category_name'];
			}
			$this -> set('categories', $optionCategoryList);
		}
	}

	public function edit($id = 0) {

		if ($id != 0) {
			$categories = $this -> BlogCategory -> getAllCategory();
			$optionCategoryList = array();
			foreach ($categories as $category) {
				$optionCategoryList[$category['BlogCategory']['category_id']] = $category['BlogCategory']['category_name'];
			}
			$this -> set('categories', $optionCategoryList);
			if (empty($this -> request -> data)) {

				$data = $this -> Blog -> getBlogByID($id);
				$this -> request -> data = $data;
				$this -> set('blog_content', $data['Blog']['blog_content']);
			} else {
				$data = $this -> request -> data;
				$this -> Blog -> editBlog($id, $data['Blog']);
				$this -> set('blog_content', $data['Blog']['blog_content']);
				$this -> Session -> setFlash('Your change was success');
				//$this -> redirect(array('action' => 'index'));
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
