<?php
class UsersController extends AppController {
	public $uses = array('BetDetail', 'School', 'User');
	public $components = array('ExtAuth.ExtAuth');

	public function login() {
		$ses_user = $this -> Session -> read('User');
		if ($this -> Session -> check('User') || !empty($ses_user)) {
			$this -> redirect(array('controller' => 'bets', 'action' => 'index'));
		}
	}

	public function signup() {
		$ses_user = $this -> Session -> read('User');
		if ($this -> Session -> check('User') || !empty($ses_user)) {
			$this -> redirect(array('controller' => 'bets', 'action' => 'index'));
		}
	}

	public function index() {
		//Load bet history
		if (!$this -> Session -> check('User')) {
			$this -> redirect(array('action' => 'login'));
		}
		$user = $this -> Session -> read('User');
		$this->set('userBalance', $user['User']['balance']);
		$this -> set('history', $this -> BetDetail -> getBetDetailByUser($user['User']['user_id']));
	}

	public function ranking() {
		//$this -> redirect(array('action' => 'index'));
		
		 if (!$this -> Session -> check('User')) {
		     $this -> redirect(array('action' => 'login'));
		 }
		 $user = $this -> Session -> read('User');
		 $this->set('userBalance', $user['User']['balance']);
		 $this->set('userRank',$this->User->getCurrentRankUser($user['User']['user_id']));
		 $this->set('rankList',$this->User->getRankByLimit(5));
	}

	public function auth_login($provider) {
		$result = $this -> ExtAuth -> login($provider);
		if ($result['success']) {

			$this -> redirect($result['redirectURL']);

		} else {
			$this -> Session -> setFlash($result['message']);
			//$this -> redirect($this -> Auth -> loginAction);
			echo 'login failt';
		}
	}

	public function auth_callback($provider) {
		$result = $this -> ExtAuth -> loginCallback($provider);
		if ($result['success']) {

			$this -> __successfulExtAuth($result['profile'], $result['accessToken']);

		} else {
			$this -> Session -> setFlash($result['message']);
			//$this -> redirect($this -> Auth -> loginAction);
			echo 'login failt';
		}
	}

	private function __successfulExtAuth($incomingProfile, $accessToken) {

		$logout = BASE_URL . DS . 'Users' . DS . 'logout';
		$this -> Session -> write('logout', $logout);
		
		//Insert User to database
		//Check user exist
		$userIdList = $this -> User -> isExist($incomingProfile['username'], 'twitter');
		$userId = $userIdList['User']['user_id'];
		if ($userId == 0 || $userId == null) {
			$userData['User']['sns_account'] = $incomingProfile['username'];
			$userData['User']['sns_type'] = 'twitter';
			$userData['User']['balance'] = 1000;
			$userData['User']['username'] = $incomingProfile['username'];
			$userID = $this -> User -> insertUser($userData);
			$userData['User']['user_id'] = $userID;
			$this -> Session -> write('User', $userData);
		} else {
			$this->User->updateUserName($userId, $incomingProfile['username']);
			$this -> Session -> write('User', $userIdList);
		}
		$this -> Session -> write('User-twitter-img', $incomingProfile['picture']);

	}

	public function logout() {
		$this -> Session -> delete('User');
		$this -> Session -> delete('logout');
		$this -> redirect(array('controller' => 'Users', 'action' => 'login'));
	}

	private function __doAuthLogin($user) {
		if ($this -> Auth -> login($user['User'])) {
			$user['last_login'] = date('Y-m-d H:i:s');
			$this -> User -> save(array('User' => $user));
			$this -> Session -> setFlash(sprintf(__d('users', '%s you have successfully logged in'), $this -> Auth -> user('username')));
			$this -> redirect($this -> Auth -> loginRedirect);
		}
	}

	public function thank_you() {
		if (!$this -> Session -> check('User')) {
			$this -> redirect(array('action' => 'login'));
		}
	}

}
