<?php
class School extends AppModel {
	public $name = 'schools';
	public function getAllSchools() {
		$obj = $this -> find('all');
		return $obj;
	}

	public function getSchoolById($id) {
		return $this -> find('first', array('conditions' => array('School.school_id' => $id)));
	}

	public function getAllSchoolWithIDAndName() {
		return $this -> find('all', array('fields' => array('School.school_id', 'School.school_name')));
	}

	public function addSchool($data) {
		$this -> create($data);
		$this -> save($data);
		return $this -> getLastInsertID();
	}

	public function updateSchool($school_id = 0, $data = null) {
		if ($school_id != 0 && $data != null) {
			$inputData = array();
			foreach ($data as $column => $value) {
				$inputData = array_merge($inputData, array('School.' . $column => "'" . $value . "'"));
			}

			$result = $this -> updateAll($inputData, array('School.school_id = ' => $school_id));
			return $result;
		}

		return null;
	}

	public function deleteSchool($school_id = 0) {
		return $this -> deleteAll(array('School.school_id' => $school_id), false);
	}

	public function getSchoolsListWithBetAmount() {
		return $this -> query("SELECT schools.school_id AS SI, school_name, logo_url,
								map_img_url,video_url,background_url,address, description, odds_top8, odds_top4, odds_top1, (SELECT COUNT(DISTINCT bet_details.bet_id)
								FROM schools, bet_details, bets
								WHERE schools.school_id = bet_details.school_id 
								
								AND schools.school_id = SI) AS 'count_school' FROM schools");
	}
	
	public function getWinningSchoolsListWithBetAmount() {
		return $this -> query("SELECT schools.school_id AS SI, school_name, logo_url,
								map_img_url,video_url,background_url,address, description, odds_top8, odds_top4, odds_top1, 
								(SELECT COUNT(DISTINCT bet_details.bet_id)
								FROM schools, bet_details, bets
								WHERE schools.school_id = bet_details.school_id 
								AND schools.school_id = SI) AS 'count_school' 
								FROM schools
								WHERE schools.school_status != 5");
	}

	public function getSchoolsListWithBetAmountByID($id = 0) {
		return $this -> query("SELECT schools.school_id, school_name, logo_url,
								map_img_url,video_url,background_url,address, description, odds_top8, odds_top4, odds_top1, (SELECT COUNT(DISTINCT bet_details.bet_id)
								FROM schools, bet_details, bets
								WHERE schools.school_id = bet_details.school_id 
								
								AND schools.school_id = " . $id . ") AS 'count_school' FROM schools WHERE schools.school_id = " . $id);
	}

	public function getAllSchoolsWithStatus() {
		return $this -> query("SELECT  `schools`.`school_id` ,  `schools`.`school_name` ,  `schools`.`logo_url` ,  `schools`.`map_img_url` ,  `schools`.`background_url` ,  `schools`.`address` ,  `schools`.`video_url` ,  `schools`.`description` , `schools`.`odds_top8` ,  `schools`.`odds_top4` ,  `schools`.`odds_top1` ,  `schools`.`school_status` ,  `school_status`.`status_name` ,`result_img_url`
FROM  `schools` ,  `school_status` 
WHERE  `schools`.`school_status` =  `school_status`.`status_id` ORDER BY `schools`.`school_id`;");
	}

	public function getStatusList() {
		return $this -> query("SELECT * FROM `school_status`");
	}

	public function getSchoolStatusByID($id = 0) {
		if ($id != 0) {
			return $this -> find('first', array('conditions' => array('School.school_id' => $id), 'fields' => array('School.school_status')));
		}

		return null;
	}

	public function getBetDetailIDListByBetTypeAndSchoolID($school_id = 0, $bet_type = 0) {
		if ($school_id != 0 && $bet_type != 0) {
			return $this -> query('SELECT `bet_details`.`bet_detail_id` FROM `bet_details` WHERE `school_id` = ' . $school_id . ' AND `bet_type` = ' . $bet_type);
		}

		return null;
	}

	public function getBetDetailIDListBySchoolID($school_id = 0) {
		if ($school_id != 0) {
			return $this -> query('SELECT `bet_details`.`bet_detail_id` FROM `bet_details` WHERE `school_id` = ' . $school_id . ' AND `bet_type` != 4');
		}

		return null;
	}

}
