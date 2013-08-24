<?php
class BlogsController extends AppController {
	public $uses = array('Blog', 'BlogCategory');

	public function index($type = '', $param1 = 0, $param2 = 0) {
		$this -> set('categoryList', $this -> BlogCategory -> getCategoryWithPostCount());
		$this -> set('dateList', $this -> Blog -> getDateListWithPostCount());
		if ($type == '' && $param1 == 0 && $param2 == 0) {
			$this -> set('blogs', $this -> Blog -> getAllBlogsWithCategory());

		} else if ($type == 'category') {
			//Search by category
			$this -> set('blogs', $this -> Blog -> getBlogByCategory($param1));
		} else if ($type == 'date' && $param2 != 0) {
			//Search by date
			$this -> set('blogs', $this -> Blog -> getBlogByDate($param1,$param2));
		} else {
			$this -> redirect(array('action' => 'index'));
		}
	}

	public function detail($id = 0) {
		if ($id != 0) {
			//Load blog detail
			$this -> set('blog', $this -> Blog -> getBlogByID($id));
		} else {
			$this -> redirect(array('action' => 'index'));
		}
	}

}
