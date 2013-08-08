<?php
class PagesController extends AppController {
	public $helpers = array('Html', 'Session');
	public function beforeFilter() {
		parent::beforeFilter();
		$this -> set('title_for_layout', 'Admin site');
	}

	public function display() {
		if (!empty($this -> request -> data)) {
			$username = $this -> request -> data['username'];
			$password = $this -> request -> data['password'];
			if ($username == 'kibow' && $password == '123456') {
				$admin['username'] = 'kibow';
				$this -> Session -> write('admin', $admin);
				$this -> Session -> setFlash('Your login is success');
			} else {
				$this -> Session -> setFlash('Your information is not correct');
			}
		}
	}

}
