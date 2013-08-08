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

	public function index() {
		//Load bet history
		if (!$this -> Session -> check('User')) {
			$this -> redirect(array('action' => 'login'));
		}
		$user = $this -> Session -> read('User');
		$this -> set('history', $this -> BetDetail -> getBetDetailByUser($user['User']['user_id']));
	}

	public function ranking() {
		$this -> redirect(array('action' => 'index'));
		/*
		 if (!$this -> Session -> check('User')) {
		 $this -> redirect(array('action' => 'login'));
		 }
		 $user = $this -> Session -> read('User');
		 $this->set('userBalance', $user['User']['balance']);
		 $this->set('userRank',$this->User->getCurrentRankUser($user['User']['user_id']));
		 $this->set('rankList',$this->User->getRankByLimit(5));*/
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
		
		var_dump($incomingProfile['username']);
		/*
		// search for profile
		$this -> SocialProfile -> recursive = -1;
		$existingProfile = $this -> SocialProfile -> find('first', array('conditions' => array('oid' => $incomingProfile['oid'])));

		if ($existingProfile) {

			// Existing profile? log the associated user in.
			$user = $this -> User -> find('first', array('conditions' => array('id' => $existingProfile['SocialProfile']['user_id'])));

			$this -> __doAuthLogin($user);
		} else {

			// New profile.
			if ($this -> Auth -> loggedIn()) {

				// user logged in already, attach profile to logged in user.

				// create social profile linked to current user
				$incomingProfile['user_id'] = $this -> Auth -> user('id');
				$this -> SocialProfile -> save($incomingProfile);
				$this -> Session -> setFlash('Your ' . $incomingProfile['provider'] . ' account has been linked.');
				$this -> redirect($this -> Auth -> loginRedirect);

			} else {

				// no-one logged in, must be a registration.
				unset($incomingProfile['id']);
				$user = $this -> User -> register(array('User' => $incomingProfile));

				// create social profile linked to new user
				$incomingProfile['user_id'] = $user['User']['id'];
				$incomingProfile['last_login'] = date('Y-m-d h:i:s');
				$incomingProfile['access_token'] = serialize($accessToken);
				$this -> SocialProfile -> save($incomingProfile);

				// populate user detail fields that can be extracted
				// from social profile
				$profileData = array_intersect_key($incomingProfile, array_flip(array('email', 'given_name', 'family_name', 'picture', 'gender', 'locale', 'birthday', 'raw')));

				$this -> User -> setupDetail();
				$this -> User -> UserDetail -> saveSection($user['User']['id'], array('UserDetail' => $profileData), 'User');

				// log in
				$this -> __doAuthLogin($user);
			}
		}
		 * 
		 */
	}

	private function __doAuthLogin($user) {
		if ($this -> Auth -> login($user['User'])) {
			$user['last_login'] = date('Y-m-d H:i:s');
			$this -> User -> save(array('User' => $user));

			$this -> Session -> setFlash(sprintf(__d('users', '%s you have successfully logged in'), $this -> Auth -> user('username')));
			$this -> redirect($this -> Auth -> loginRedirect);
		}
	}

}
