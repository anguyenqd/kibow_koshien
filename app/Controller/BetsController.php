<?php
class BetsController extends AppController {

	public $uses = array('User', 'BetDetail', 'Bet', 'School', 'Match');

	public function index() {
		//Load all school with votes
		$this -> Set('schools', $this -> School -> getWinningSchoolsListWithBetAmount());

	}

	private function print_pre($data) {
		echo "<pre>";
		print_r($data);
		echo "</pre>";
	}

	public function result() {
		//Load match list
		//Get day list first row
		$dateListFirstRound = $this -> Match -> getDateListFinishMatch(1);//First round
		$dateListSecondRound = $this -> Match -> getDateListFinishMatch(2);//Second round
		$dateListThirdRound = $this -> Match -> getDateListFinishMatch(3);//third round
		$dateListTop8Round = $this -> Match -> getDateListFinishMatch(4);//top 8
		$dateListTop4Round = $this -> Match -> getDateListFinishMatch(5);//top 4
		$dateListFinalRound = $this -> Match -> getDateListFinishMatch(6);//Final
		
		//get match list by date
		//First round
		$matchListFirstRound = array();
		foreach ($dateListFirstRound as $date) {
			$matchListFirstRound[$date[0]['md']] = $this -> Match -> getFinishMatchsByDate($date[0]['md'],1);
		}
		//Second round
		$matchListSecondRound = array();
		foreach ($dateListSecondRound as $date) {
			$matchListSecondRound[$date[0]['md']] = $this -> Match -> getFinishMatchsByDate($date[0]['md'],2);
		}
		//third round
		$matchListThirdRound = array();
		foreach ($dateListThirdRound as $date) {
			$matchListThirdRound[$date[0]['md']] = $this -> Match -> getFinishMatchsByDate($date[0]['md'],3);
		}
		//Top 8 round
		$matchListTop8Round = array();
		foreach ($dateListTop8Round as $date) {
			$matchListTop8Round[$date[0]['md']] = $this -> Match -> getFinishMatchsByDate($date[0]['md'],4);
		}
		//Top 4 round
		$matchListTop4Round = array();
		foreach ($dateListTop4Round as $date) {
			$matchListTop4Round[$date[0]['md']] = $this -> Match -> getFinishMatchsByDate($date[0]['md'],5);
		}
		//Final round
		$matchListFinalRound = array();
		foreach ($dateListFinalRound as $date) {
			$matchListFinalRound[$date[0]['md']] = $this -> Match -> getFinishMatchsByDate($date[0]['md'],6);
		}
		
		$this->set('match_list_first_round', $matchListFirstRound);
		$this->set('match_list_second_round', $matchListSecondRound);
		$this->set('match_list_third_round', $matchListThirdRound);
		$this->set('match_list_top8_round', $matchListTop8Round);
		$this->set('match_list_top4_round', $matchListTop4Round);
		$this->set('match_list_final_round', $matchListFinalRound);
		//$this -> print_pre($matchListFirstRound);
	}

	public function betForm() {
		//Receive data from choose school page
		/*
		 if (!$this -> Session -> check('User')) {
		 $this -> redirect(array('controller' => 'Users', 'action' => 'login'));
		 }*/
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

					$schoolBetData = array();
					$i = 0;
					if ($school8List != null) {
						foreach ($school8List as $school) {
							if ($school['bet_amount'] > 0 && $school['bet_amount'] != '') {
								$type = 3;
								$schoolBetData[$i] = array('id' => $school['school_id'], 'amount' => $school['bet_amount'], 'type' => $type, 'odds' => $school['odds']);
								$i++;
							}
						}
					}

					if ($school4List != null) {
						foreach ($school4List as $school) {
							if ($school['bet_amount'] > 0 && $school['bet_amount'] != '') {
								$type = 2;
								$schoolBetData[$i] = array('id' => $school['school_id'], 'amount' => $school['bet_amount'], 'type' => $type, 'odds' => $school['odds']);
								$i++;
							}
						}
					}
					if ($finalSchool != null) {
						foreach ($finalSchool as $school) {
							if ($school['bet_amount'] > 0 && $school['bet_amount'] != '') {
								$type = 1;
								$schoolBetData[$i] = array('id' => $school['school_id'], 'amount' => $school['bet_amount'], 'type' => $type, 'odds' => $school['odds']);
								$i++;
							}
						}
					}
					$this -> bet($schoolBetData);
				}
			}

		} else {
			if (!$this -> Session -> check('Bet')) {
				$this -> redirect(array('action' => 'index'));
			} else {

			}

		}

	}

	public function success() {

	}

	public function error() {
		$this -> set('error', $this -> Session -> read('error'));
	}

	private function bet($schoolBetData = null, $match_id = 0) {
		//Get info from form
		//Check user session

		if ($this -> Session -> check('User')) {
			$userData = $this -> Session -> read('User');
			$betData = array();
			$betData['Bet']['bet_date'] = date('Y-m-d H:i:s');
			$betData['Bet']['user_id'] = $userData['User']['user_id'];
			$betData['Bet']['match_id'] = $match_id;
			$betID = $this -> Bet -> insertBet($betData);

			$totalBet = 0;
			foreach ($schoolBetData as $betDetail) {
				$totalBet += $betDetail['amount'];
			}

			if ($totalBet - $userData['User']['balance'] <= 0) {
				foreach ($schoolBetData as $betDetail) {
					$betDetailData = array();
					$betDetailData['BetDetail']['bet_id'] = $betID;
					$betDetailData['BetDetail']['school_id'] = $betDetail['id'];
					$betDetailData['BetDetail']['bet_type'] = $betDetail['type'];
					$betDetailData['BetDetail']['bet_amount'] = $betDetail['amount'];
					$betDetailData['BetDetail']['odds'] = $betDetail['odds'];
					$userData['User']['balance'] -= $betDetail['amount'];
					$this -> BetDetail -> addBetDetail($betDetailData);
				}

				//Update amount for user
				$this -> User -> updateUserBalance($userData['User']['user_id'], $userData['User']['balance']);
				$this -> Session -> write('User', $userData);

				//$this -> redirect(array('action' => 'success'));
				$this -> Session -> setFlash('Your bets were confirmed');
				$this -> redirect(array('controller' => 'users', 'action' => 'index'));
			}
			$this -> Session -> setFlash('You don\'t have enough Zenny to bet');
			$this -> redirect(array('action' => 'error'));

		} else {
			$this -> Session -> setFlash('Login error');
			$this -> redirect(array('action' => 'error'));
		}
	}

	public function history() {
		$sns_account = 'a1provip004';
		//$history = $this -> BetDetail -> getBetDetailByUser($sns_account);
		$this -> set('history', $this -> BetDetail -> getBetDetailByUser($sns_account));
	}

	public function matchBet() {
		//Get all match will excuted today
		$today = date('Y-m-d H:i:00');
		$this -> set('matchs', $this -> Match -> getMatchsByDay($today));
	}

	public function matchBetForm() {
		if (empty($this -> request -> data)) {
			$this -> redirect(array('action' => 'matchBet'));
		} else {
			$data = $this -> request -> data;
			if (!isset($data['step']))//step 1
				$this -> set('matchs', $this -> Match -> getMatchById($data['match_id']));
			else if ($data['step'] == '2') {
				$betData = array();
				$i = 0;
				if ($data['team_1_amount'] > 0) {
					$betData[$i]['id'] = $data['team_1_id'];
					$betData[$i]['amount'] = $data['team_1_amount'];
					$betData[$i]['type'] = 4;
					$betData[$i]['odds'] = $data['team_1_odds'];
					$i++;
				}

				if ($data['team_2_amount'] > 0) {
					$betData[$i]['id'] = $data['team_2_id'];
					$betData[$i]['amount'] = $data['team_2_amount'];
					$betData[$i]['type'] = 4;
					$betData[$i]['odds'] = $data['team_2_odds'];
					$i++;
				}

				if ($i == 0) {
					$this -> Session -> setFlash('Your bets were not success');
					$this -> redirect(array('controller' => 'users', 'action' => 'index'));
				}

				$this -> bet($betData, $data['match_id']);
			}

		}
	}

}
