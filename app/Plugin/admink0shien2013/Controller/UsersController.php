<?php
class UsersController extends AppController {
	public $uses = array('User');
	public function index($param = '') {
		if (!$this -> Session -> check('admin')) {
			$this -> redirect(array('controller' => 'pages', 'action' => 'display'));
		}
		//load all users
		$result = array();
		if($param == '')
			$result = $this -> User -> getAllUser();
		else
			$result = $this -> User -> getAllUserSortByBalance();
		$this -> set('users', $result);
	}

	/*
	 public function edit($username = null) {
	 $username = isset($_GET['sns_account']) ? $_GET['sns_account'] : '';
	 if ($username != '') {
	 if (empty($this -> request -> data)) {
	 $this -> request -> data = $this -> User -> getUserByLogin($username);
	 } else {
	 // Save logic goes here
	 $this->User->
	 }
	 }
	 }*/

	public function delete($sns_acount, $sns_type) {
		if ($sns_acount != null) {
			$this -> User -> deleteUser($sns_acount, $sns_type);
		}
		//$sns_acount = isset($_GET['sns_account']) ? $_GET['sns_account'] : '';

		$this -> redirect('index');
	}

	public function logout() {
		$this -> Session -> delete('admin');
		$_SESSION['KCFINDER']['disabled']=true;
		$this -> Session -> delete('KCFINDER');
		$this -> redirect(array('controller' => 'pages', 'action' => 'display'));
	}

}
