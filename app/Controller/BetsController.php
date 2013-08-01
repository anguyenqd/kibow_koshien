<?php
class BetsController extends AppController {

	public $uses = array('User', 'BetDetail', 'Bet', 'School');

	public function index() {

	}

	public function betForm() {
		//Receive data from choose school page

		//FakeData
		if (!empty($this -> request -> data)) {
			$step = isset($_POST['step']) ? $_POST['step'] : 1;
			if ($step == 1) {
				$firstSection = isset($_POST['first-section']) ? $_POST['first-section'] : null;
				$secondSection = isset($_POST['second-section']) ? $_POST['second-section'] : null;
				$thirtSection = isset($_POST['thirt-section']) ? $_POST['thirt-section'] : null;

				if ($firstSection == null && $secondSection == null && $thirtSection == null) {
					echo 'You must choose at least one section';
				} else {
					//Handle data
					//Get school list from ID
					$school8List = array();
					foreach ($firstSection as $schoolID) {
						$school8List = array_merge($school8List, array($this -> School -> getSchoolById($schoolID)));
					}

					$school4List = array();
					foreach ($secondSection as $schoolID) {
						$school4List = array_merge($school4List, array($this -> School -> getSchoolById($schoolID)));
					}

					$finalSchool = $this -> School -> getSchoolById($thirtSection);

					$this -> set('school8List', $school8List);
					$this -> set('school4List', $school4List);
					$this -> set('finalSchool', $finalSchool);
				}
			} else {
				//Bet submit data
				$school8List = isset($this -> request -> data['8school']) ? $this -> request -> data['8school'] : null;
				$school4List = isset($this -> request -> data['4school']) ? $this -> request -> data['4school'] : null;
				$finalSchool = isset($this -> request -> data['finalSchool']) ? $this -> request -> data['finalSchool'] : null;

				if ($school8List == null && $school4List == null && $finalSchool == null) {
					echo 'bet error';
				} else {
					//Insert bet

					$schoolBetData = array();
					$i = 0;
					foreach ($school8List as $schoolID => $schoolBet) {
						if ($schoolBet > 0 && $schoolBet != '') {
							$type = 3;
							$schoolBetData[$i] = array('id' => $schoolID, 'amount' => $schoolBet, 'type' => $type);
							$i++;
						}
					}

					foreach ($school4List as $schoolID => $schoolBet) {
						if ($schoolBet > 0 && $schoolBet != '') {
							$type = 2;
							$schoolBetData[$i] = array('id' => $schoolID, 'amount' => $schoolBet, 'type' => $type);
							$i++;
						}
					}
					if ($finalSchool != null) {
						foreach ($finalSchool as $schoolID => $schoolBet) {
							if ($schoolBet > 0 && $schoolBet != '') {
								$type = 1;
								$schoolBetData[$i] = array('id' => $schoolID, 'amount' => $schoolBet, 'type' => $type);
								$i++;
							}
						}
					}
					
					$this->bet($schoolBetData);
				}
			}

		} else {
			$this -> redirect(array('action' => 'index'));
		}

	}

	private function bet($schoolBetData = null) {
		//Get info from form

		//Fake data
		/*
		$schoolBetData = array();
		$schoolBetData[0] = array('id' => 1, 'amount' => 100, 'type' => 1);
		$schoolBetData[1] = array('id' => 2, 'amount' => 200, 'type' => 2);
		$schoolBetData[2] = array('id' => 3, 'amount' => 300, 'type' => 1);
		$schoolBetData[3] = array('id' => 4, 'amount' => 400, 'type' => 3);
		 * 
		 */

		//Insert user first
		$userData = array();
		$userData['User']['sns_account'] = 'a1provip004';
		$userData['User']['sns_type'] = 'facebook';
		$userData['User']['balance'] = 1000;
		$userIdList = $this -> User -> isExist($userData['User']['sns_account'], $userData['User']['sns_type']);
		$userId = $userIdList['User']['user_id'];
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

	public function history() {
		$sns_account = 'a1provip004';
		//$history = $this -> BetDetail -> getBetDetailByUser($sns_account);
		$this -> set('history', $this -> BetDetail -> getBetDetailByUser($sns_account));
	}

}
