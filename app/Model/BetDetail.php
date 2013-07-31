<?php
class BetDetail extends AppModel {
	public $name = 'bet_details';
	
	public function getBetDetailsByBet($betId = 0) {
		if($betId != 0)
		{
			$result = $this -> find('list', array('conditions' => array('BetDetail.bet_id' => $betId)));
			return $result;
		}
		
		return null;
	}
	
	public function addBetDetail($data)
	{
		$this -> create($data);
		$this -> save($data);
		return $this -> getLastInsertID();
	}
	
	public function updateBetDetail($betDetailId = 0, $data = null)
	{
		if($betDetailId != 0 && $data != null)
		{
			$inputData = array();
			foreach ($data as $column => $value) {
				$inputData = array_merge($inputData, array('BetDetail.' . $column => $value));
			}
			
			$result = $this -> updateAll($inputData, array('BetDetail.bet_detail_id = ' => $betDetailId));
			return $result;
		}
		
		return null;
	}
	
	public function deleteBetDetailByBet($bet_id = 0)
	{
		if($bet_id != 0)
		{
			return $this -> deleteAll(array('BetDetail.bet_id' => $bet_id), false);
		}
	}
}