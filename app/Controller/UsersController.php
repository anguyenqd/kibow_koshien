<?php
class UsersController extends AppController {
	public $uses = array('BetDetail', 'School');
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
		if (!$this -> Session -> check('User')) {
			$this -> redirect(array('action' => 'login'));
		}
		$user = $this -> Session -> read('User');
		$this->set('userBalance', $user['User']['balance']);
		$this->set('userRank',$this->School->getCurrentRankUser($user['User']['user_id']));
		$this->set('rankList',$this->School->getRankByLimit(5));
	}

}
