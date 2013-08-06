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

	public function updateUserBalance($user_id, $newBalance) {
		return $this -> updateAll(array('User.balance' . $column => $newBalance), array('User.user_id = ' => $user_id));
	}

	public function insertUser($userData) {
		$this -> create($userData);
		$this -> save($userData);
		return $this -> getLastInsertID();
	}

	public function isExist($sns_account, $sns_type) {
		return $this -> find('first', array('conditions' => array('User.sns_account' => $sns_account, 'User.sns_type' => $sns_type)));
	}

	public function deleteUser($sns_account, $sns_type) {
		return $this -> deleteAll(array('User.sns_account' => $sns_account, 'User.sns_type' => $sns_type), false);
	}

}
