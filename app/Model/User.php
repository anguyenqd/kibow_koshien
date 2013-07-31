<?php
class User extends AppModel {
	public $name = 'users';

	public function getAllUser() {
		$userObj = $this -> find('all');
		return $userObj;
	}

	public function getUserByLogin($username = '') {
		if ($username != '') {
			$user = $this -> find('first', array('conditions' => array('User.sns_account' => $username)));
			return $user;
		}
		return null;
	}

	public function insertUser($userData) {
		$this -> create($userData);
		$this -> save($userData);
		return $this -> getLastInsertID();
	}

	public function isExist($sns_account) {
		return $this -> find('first', array('conditions' => array('User.sns_account' => $sns_account)));
	}
	
	public function deleteUser($sns_account)
	{
		return $this -> deleteAll(array('User.sns_account' => $sns_account), false);
	}
}
