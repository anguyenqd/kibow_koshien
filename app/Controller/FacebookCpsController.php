<?php
/* -----------------------------------------------------------------------------------------
 IdiotMinds - http://idiotminds.com
 -----------------------------------------------------------------------------------------
 */
App::uses('Controller', 'Controller');
App::import('Vendor', 'Facebook', array('file' => 'Facebook' . DS . 'facebook.php'));

class FacebookCpsController extends AppController {
	public $name = 'FacebookCps';
	public $uses = array('User');

	public function index() {
		$ses_user = $this -> Session -> read('User');
		if ($this -> Session -> check('User') || !empty($ses_user)) {
			$this -> redirect(array('controller' => 'bets', 'action' => 'index'));
		}
	}

	function login() {
		Configure::load('facebook');
		$appId = Configure::read('Facebook.appId');
		$app_secret = Configure::read('Facebook.secret');
		$facebook = new Facebook( array('appId' => $appId, 'secret' => $app_secret, ));
		$loginUrl = $facebook -> getLoginUrl(array('scope' => 'email', 'redirect_uri' => BASE_URL . 'facebook_cps/facebook_connect', 'display' => 'popup'));
		$this -> redirect($loginUrl);
	}

	function facebook_connect() {
		Configure::load('facebook');
		$appId = Configure::read('Facebook.appId');
		$app_secret = Configure::read('Facebook.secret');

		$facebook = new Facebook( array('appId' => $appId, 'secret' => $app_secret, ));

		$user = $facebook -> getUser();

		if ($user) {
			try {
				$user_profile = $facebook -> api('/me');
				$params = array('next' => BASE_URL . 'facebook_cps/facebook_logout');
				$logout = $facebook -> getLogoutUrl($params);
				//$this -> Session -> write('User', $user_profile);
				$this -> Session -> write('logout', $logout);

				//Insert User to database
				//Check user exist
				$userIdList = $this -> User -> isExist($user_profile['email'], 'facebook');
				$userId = $userIdList['User']['user_id'];
				if ($userId == 0 || $userId == null) {
					$userData['User']['sns_account'] = $user_profile['email'];
					$userData['User']['sns_type'] = 'facebook';
					$userData['User']['balance'] = 1000;
					$this -> User -> insertUser($userData);
					
					$this -> Session -> write('User', $userData);
				} else {
					$this -> Session -> write('User', $userIdList);
				}
				$this -> Session -> write('User-fb-id', $user_profile['id']);

			} catch(FacebookApiException $e) {
				error_log($e);
				$user = NULL;
			}
		} else {
			$this -> Session -> setFlash('Sorry.Please try again', 'default', array('class' => 'msg_req'));
			$this -> redirect(array('action' => 'index'));
		}
	}

	function facebook_logout() {

		$this -> Session -> delete('User');
		$this -> Session -> delete('logout');
		$this -> redirect(array('controller' => 'Users', 'action' => 'login'));
	}

}
