<?php
class BetDetail extends AppModel {
	public $name = 'bet_details';

	public function addBetDetail($data) {
		$this -> create($data);
		$this -> save($data);
		return $this -> getLastInsertID();
	}

	public function updateBetDetail($betDetailId = 0, $data = null) {
		if ($betDetailId != 0 && $data != null) {
			$inputData = array();
			foreach ($data as $column => $value) {
				$inputData = array_merge($inputData, array('BetDetail.' . $column => $value));
			}

			$result = $this -> updateAll($inputData, array('BetDetail.bet_detail_id = ' => $betDetailId));
			return $result;
		}

		return null;
	}

	public function getBetDetailsByBet($betID = 0) {
		if ($betID != 0) {
			return $this -> find('all', array('conditions' => array('BetDetail.bet_id' => $betID), 'fields' => array('bet_detail_id')));
		}

		return null;
	}

	public function deleteBetDetailByBet($bet_id = 0) {
		if ($bet_id != 0) {
			return $this -> deleteAll(array('BetDetail.bet_id' => $bet_id), false);
		}
	}

	public function getBetDetailByUser($user_id = '') {
		if ($user_id != '') {
			return $this -> query("SELECT bet_amount, school_name, odds_top8, odds_top4, 
									odds_top1, bet_date, bet_status, bet_type, 
									(SELECT CONCAT(team_1.school_name,' vs ', team_2.school_name) 
									FROM `matchs`, schools as team_1, schools as team_2, `bets`
									WHERE matchs.team_1_id = team_1.school_id 
									AND matchs.team_2_id = team_2.school_id
									AND matchs.match_id = bets.match_id
									AND bets.bet_id = 70) as 'section'
									FROM bet_details, bets, schools, users
									WHERE bet_details.bet_id = bets.bet_id
									AND bet_details.school_id = schools.school_id
									AND bets.user_id = users.user_id 
									AND users.user_id = '" . $user_id . "' ORDER BY bet_details.bet_id DESC;");
		}

		return null;
	}

}
