<?php
class BetsController extends AppController {

	public $uses = array('User', 'BetDetail', 'Bet');

	public function index() {
		//Get info from form

		//Fake data
		$schoolBetData = array();
		$schoolBetData[0] = array('id' => 1, 'amount' => 100, 'type' => 1);
		$schoolBetData[1] = array('id' => 2, 'amount' => 200, 'type' => 2);
		$schoolBetData[2] = array('id' => 3, 'amount' => 300, 'type' => 1);
		$schoolBetData[3] = array('id' => 4, 'amount' => 400, 'type' => 3);

		//Insert user first
		$userData = array();
		$userData['User']['sns_account'] = 'a1provip004';
		$userData['User']['sns_type'] = 'facebook';
		$userData['User']['balance'] = 1000;
		$userId = $this -> User -> isExist($userData['User']['sns_account'], $userData['User']['sns_type'])['User']['user_id'];
		if ($userId == 0 || $userId == null) {
			$userId = $this -> User -> insertUser($userData);
		}
		
		if ($userId != 0 && $userId != null) {
			$betData = array();
			$betData['Bet']['bet_date'] = date('Y-m-d H:i:s');
			$betData['Bet']['user_id'] = $userId;

			$betID = $this -> Bet -> insertBet($betData);
			foreach ($schoolBetData as $betDetail) {
				$betDetailData = array();
				$betDetailData['BetDetail']['bet_id'] = $betID;
				$betDetailData['BetDetail']['school_id'] = $betDetail['id'];
				$betDetailData['BetDetail']['bet_type'] = $betDetail['type'];
				$betDetailData['BetDetail']['bet_amount'] = $betDetail['amount'];
				$this -> BetDetail -> addBetDetail($betDetailData);
			}
			
			echo 'Bet success';
		} else {
			echo 'Bet error';
		}
	}
	
	public function history()
	{
		$sns_account = 'a1provip004';
		//$history = $this -> BetDetail -> getBetDetailByUser($sns_account);
		$this->set('history',$this -> BetDetail -> getBetDetailByUser($sns_account));
	}
}
