<?php
class BetsController extends AppController {

	public $uses = array('User', 'BetDetail', 'Bet', 'School');

	public function index() {
		//Load all school with votes
		$this -> Set('schools', $this -> School -> getSchoolsListWithBetAmount());

	}

	public function betForm() {
		//Receive data from choose school page
		if (!$this -> Session -> check('User')) {
			$this -> redirect(array('controller' => 'Users', 'action' => 'login'));
		}
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
						if ($schoolID != 0)
							$school8List = array_merge($school8List, array($this -> School -> getSchoolsListWithBetAmountByID($schoolID)));
					}

					$school4List = array();
					foreach ($secondSection as $schoolID) {
						if ($schoolID != 0)
							$school4List = array_merge($school4List, array($this -> School -> getSchoolsListWithBetAmountByID($schoolID)));
					}

					$finalSchool = $this -> School -> getSchoolsListWithBetAmountByID($thirtSection);

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
					if ($school8List != null) {
						foreach ($school8List as $schoolID => $schoolBet) {
							if ($schoolBet > 0 && $schoolBet != '') {
								$type = 3;
								$schoolBetData[$i] = array('id' => $schoolID, 'amount' => $schoolBet, 'type' => $type);
								$i++;
							}
						}
					}

					if ($school4List != null) {
						foreach ($school4List as $schoolID => $schoolBet) {
							if ($schoolBet > 0 && $schoolBet != '') {
								$type = 2;
								$schoolBetData[$i] = array('id' => $schoolID, 'amount' => $schoolBet, 'type' => $type);
								$i++;
							}
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

					$this -> bet($schoolBetData);
				}
			}

		} else {
			$this -> redirect(array('action' => 'index'));
		}

	}

	public function success() {

	}

	public function error() {
		$this -> set('error', $this -> Session -> read('error'));
	}

	private function bet($schoolBetData = null) {
		//Get info from form
		//Check user session
		if ($this -> Session -> check('User')) {
			$userData = $this -> Session -> read('User');
			$betData = array();
			$betData['Bet']['bet_date'] = date('Y-m-d H:i:s');
			$betData['Bet']['user_id'] = $userData['User']['user_id'];

			$betID = $this -> Bet -> insertBet($betData);
			foreach ($schoolBetData as $betDetail) {
				$betDetailData = array();
				$betDetailData['BetDetail']['bet_id'] = $betID;
				$betDetailData['BetDetail']['school_id'] = $betDetail['id'];
				$betDetailData['BetDetail']['bet_type'] = $betDetail['type'];
				$betDetailData['BetDetail']['bet_amount'] = $betDetail['amount'];
				$userData['User']['balance'] -= $betDetail['amount'];
				if ($userData['User']['balance'] >= 0) {
					$this -> BetDetail -> addBetDetail($betDetailData);
				}
			}

			//Update amount for user
			$this -> User -> updateUserBalance($userData['User']['user_id'], $userData['User']['balance']);
			$this -> Session -> write('User', $userData);

			$this -> redirect(array('action' => 'success'));
		} else {
			$this -> redirect(array('action' => 'error'));
		}
	}

	public function history() {
		$sns_account = 'a1provip004';
		//$history = $this -> BetDetail -> getBetDetailByUser($sns_account);
		$this -> set('history', $this -> BetDetail -> getBetDetailByUser($sns_account));
	}

}
