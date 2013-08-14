<?php
class MatchsController extends AppController {
	public $uses = array('Match', 'School', 'User');

	private function clean($string) {
		return str_replace("'", "\'", $string);
	}

	public function index() {
		if (!$this -> Session -> check('admin')) {
			$this -> redirect(array('controller' => 'pages', 'action' => 'display'));
		}

		$this -> set('matchs', $this -> Match -> getAllMatchWithSchoolName());
	}

	public function add() {
		if (!$this -> Session -> check('admin')) {
			$this -> redirect(array('controller' => 'pages', 'action' => 'display'));
		}

		if (empty($this -> request -> data)) {
			//Load school list with id
			$schools = $this -> School -> getAllSchoolWithIDAndName();
			$optionSchoolList = array();
			foreach ($schools as $school) {
				$optionSchoolList[$school['School']['school_id']] = $school['School']['school_name'];
			}
			$this -> set('schools', $optionSchoolList);

			//Load match round list
			$matchRoundList = $this -> Match -> getMatchRoundList();
			$optionRoundList = array();
			foreach ($matchRoundList as $round) {
				$optionRoundList[$round['match_rounds']['match_round_id']] = $round['match_rounds']['round_name'];
			}
			$this -> set('rounds', $optionRoundList);
		} else {
			//Store
			$data = $this -> request -> data;
			$data['Match']['description_1'] = $this->clean($data['Match']['description_1']);
			$data['Match']['description_2'] = $this->clean($data['Match']['description_2']);
			$this -> Match -> addMatch($data);
			$this -> redirect(array('action' => 'index'));
		}

	}

	public function edit($id = 0) {
		if (!$this -> Session -> check('admin')) {
			$this -> redirect(array('controller' => 'pages', 'action' => 'display'));
		}

		if (empty($this -> request -> data)) {
			if ($id != 0) {
				$schools = $this -> School -> getAllSchoolWithIDAndName();
				$optionSchoolList = array();
				$i = 0;
				foreach ($schools as $school) {
					$optionSchoolList[$school['School']['school_id']] = $school['School']['school_name'];
					$i++;
				}
				$this -> set('schools', $optionSchoolList);
				//Load match round list
				$matchRoundList = $this -> Match -> getMatchRoundList();
				$optionRoundList = array();
				foreach ($matchRoundList as $round) {
					$optionRoundList[$round['match_rounds']['match_round_id']] = $round['match_rounds']['round_name'];
				}
				$this -> set('rounds', $optionRoundList);
				$data = $this -> Match -> getMatchByIdToEdit($id);
				$this -> set('status', $data['Match']['status']);
				$this -> request -> data = $data;
			} else {
				$this -> Session -> setFlash('Your change was fail');
				$this -> redirect(array('action' => 'index'));
			}

		} else {
			$data = $this -> request -> data;
			$data['Match']['description_1'] = $this->clean($data['Match']['description_1']);
			$data['Match']['description_2'] = $this->clean($data['Match']['description_2']);
			$match_date = $data['Match']['match_date'];
			$data['Match']['match_date'] = $match_date['year'] . "-" . $match_date['month'] . "-" . $match_date['day'] . " " . $match_date['hour'] . ":" . $match_date['min'] . ":00";
			$this -> Match -> editMatch($id, $data['Match']);
			$this -> Session -> setFlash('Your change was success');
			$this -> redirect(array('action' => 'index'));

		}
	}

	public function delete($id = 0) {
		if ($id != 0) {
			$this -> Match -> deleteMatch($id);
			$this -> Session -> setFlash('Your change was success');
			$this -> redirect(array('action' => 'index'));
		}
	}

	public function enable($id = 0) {
		if ($id != 0) {
			$result = $this -> Match -> changeStatus(1, $id);
			if ($result != null)
				$this -> Session -> setFlash('Your change was success');
			else
				$this -> Session -> setFlash('Your change was fail');
		} else
			$this -> Session -> setFlash('Your change was fail');
		$this -> redirect(array('action' => 'index'));
	}

	public function disable($id = 0) {
		if ($id != 0) {
			$result = $this -> Match -> changeStatus(0, $id);
			if ($result != null)
				$this -> Session -> setFlash('Your change was success');
			else
				$this -> Session -> setFlash('Your change was fail');
		} else
			$this -> Session -> setFlash('Your change was fail');
		$this -> redirect(array('action' => 'index'));
	}

	public function change_winner($id = 0) {
		if ($id != 0) {
			if (empty($this -> request -> data)) {
				//Load 2 school name and id
				$data = $this -> Match -> getSchoolNameIdByMatchID($id);
				$this -> set('match_data', $data[0]);
			} else {
				$data = $this -> request -> data;
				$loseTeamID = 0;
				if ($data['Match']['team_1_result'] > $data['Match']['team_2_result']) {
					$data['Match']['winning_team_id'] = $data['Match']['team_1_id'];
					$loseTeamID = $data['Match']['team_2_id'];
				} else if ($data['Match']['team_1_result'] < $data['Match']['team_2_result']) {
					$data['Match']['winning_team_id'] = $data['Match']['team_2_id'];
					$loseTeamID = $data['Match']['team_1_id'];
				} else {
					$data['Match']['winning_team_id'] = null;
				}

				//reflect match result
				$this -> Match -> editMatch($id, $data['Match']);

				if ($data['Match']['winning_team_id'] != null) {
					//reflect user balance
					//get user list in this match
					$betDetailID = $this -> Match -> getBetDetailByMatchId($id, $data['Match']['winning_team_id']);
					//lose bet list
					$lostBetDetailID = $this -> Match -> getBetDetailByMatchId($id, $loseTeamID);
					//Update balance

					foreach ($betDetailID as $bet) {
						$this -> User -> updateUserBalanceByResult($bet['bet_details']['bet_detail_id'], 1);
					}

					foreach ($lostBetDetailID as $bet) {
						$this -> User -> updateUserBalanceByResult($bet['bet_details']['bet_detail_id'], 2);
					}
					$this -> Session -> setFlash('Your change was success');
				} else {
					$this -> Session -> setFlash('Your change was success');
				}

				$this -> redirect(array('action' => 'index'));
			}
		} else {
			$this -> Session -> setFlash('Unsupported request');
			$this -> redirect(array('action' => 'index'));
		}

	}

}
