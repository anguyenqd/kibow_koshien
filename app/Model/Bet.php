<?php
class Bet extends AppModel {
	public $name = 'bets';

	public function getAllBets() {
		$obj = $this -> find('all');
		return $obj;
	}

	public function insertBet($data) {
		$this -> create($data);
		$this -> save($data);
		return $this -> getLastInsertID();
	}

	public function updateBet($betId = 0, $data = null) {
		if ($betId != 0 && $data != null) {
			$inputData = array();
			foreach ($data as $column => $value) {
				$inputData = array_merge($inputData, array('Bet.' . $column => $value));
			}

			$result = $this -> updateAll($inputData, array('Bet.bet_id = ' => $betId));
			return $result;
		}

		return null;
	}

	public function updateBetByUser($user_id = 0, $data = null) {
		if ($user_id != 0 && $data != null) {
			$inputData = array();
			foreach ($data as $column => $value) {
				$inputData = array_merge($inputData, array('Bet.' . $column => "'" . $value . "'"));
			}

			$this -> updateAll($inputData, array('Bet.user_id = ' => $user_id));
			$result = $this -> find('first', array('conditions' => array('Bet.user_id' => $user_id), 'fields' => array('bet_id')));
			return $result;
		}

		return null;
	}

	public function deleteBet($bet_id = 0) {
		if ($bet_id != 0) {
			return $this -> deleteAll(array('Bet.bet_id' => $bet_id), false);
		}
	}

}
