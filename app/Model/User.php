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

	public function updateUserName($user_id = 0, $username = '') {
		if ($user_id != 0 && $username != '') {
			$this -> updateAll(array('User.username' => "'" . $username . "'"), array('User.user_id' => $user_id));
		}

		return null;
	}

	public function updateUserBalance($user_id, $newBalance) {
		return $this -> updateAll(array('User.balance' => $newBalance), array('User.user_id = ' => $user_id));
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

	public function getCurrentRankUser($user_id = 0) {
		if ($user_id != 0) {
			return $this -> query("SELECT (count(*) + 1) AS 'rank'  from `users` where balance > (SELECT balance FROM `users` where user_id = " . $user_id . ")");
		}
		return null;
	}

	public function getRankByLimit($limit = 5) {
		if ($limit != 0) {
			return $this -> query("SELECT user_id, sns_account,balance as bl, 1 + (SELECT COUNT(*) FROM `users` WHERE balance > bl) AS 'rank', username FROM `users` ORDER BY rank LIMIT " . $limit);
		}
		return null;
	}

	public function getRankListByUser($user_id = 0) {
		if ($user_id != 0) {
			return $this -> query("SELECT user_id, balance AS bl, 1 + (SELECT COUNT(*) FROM `users` WHERE balance > bl) FROM `users` where balance > (SELECT balance FROM `users` where user_id = 3) ORDER BY balance DESC LIMIT 2
UNION ALL
SELECT user_id, balance AS bl, 1 + (SELECT COUNT(*) FROM `users` WHERE balance > bl) FROM `users` where balance < (SELECT balance FROM `users` where user_id = 3) ORDER BY balance DESC LIMIT 2
UNION ALL
SELECT user_id, balance AS bl, 1 + (SELECT COUNT(*) FROM `users` WHERE balance > bl) FROM `users` where balance < (SELECT balance FROM `users` where user_id = 3) ORDER BY balance DESC LIMIT 2");
		}
		return null;
	}

	public function updateUserBalanceByResult($betDetailID = 0, $bet_status = 3) {
		if ($betDetailID != 0) {
			return $this -> query('UPDATE `users`,`bets`,`bet_details` SET `users`.`balance` = (`users`.`balance` + `bet_details`.`odds` * `bet_details`.`bet_amount`),`bet_details`.`bet_status` = ' . $bet_status . ' WHERE `users`.`user_id` = `bets`.`user_id` AND `bets`.`bet_id` = `bet_details`.`bet_id` AND `bet_details`.`bet_detail_id` = ' . $betDetailID);
		}

		return null;
	}

}
