<?php
class UsersController extends AppController {
	public $uses = array('BetDetail', 'School', 'User');
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

}
