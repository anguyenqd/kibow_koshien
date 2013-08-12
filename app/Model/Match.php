<?php
class Match extends AppModel {
	public $name = 'matchs';

	public function addMatch($data) {
		$this -> create($data);
		$this -> save($data);
		return $this -> getLastInsertID();
	}

	public function getMatchByIdToEdit($id = 0) {
		if ($id != 0) {
			return $this -> find('first', array('conditions' => array('Match.match_id' => $id)));
		}

		return null;
	}

	public function editMatch($id, $data) {
		if ($id != 0 && $data != null) {
			$inputData = array();
			foreach ($data as $column => $value) {
				$inputData = array_merge($inputData, array('Match.' . $column => "'" . $value . "'"));
			}
			$result = $this -> updateAll($inputData, array('Match.match_id = ' => $id));
			return $result;
		}
		return null;
	}

	public function deleteMatch($id) {
		if ($id != 0) {
			return $this -> deleteAll(array('Match.match_id' => $id), false);
		}
	}

	public function getAllMatch() {
		$obj = $this -> find('all');
		return $obj;
	}

	public function getAllMatchWithSchoolName() {
		return $this -> query("SELECT `match_id`,`match_date`,(SELECT  school_name FROM `schools` WHERE school_id = `team_1_id`) AS `team_1_name`,`team_1_odd`,(SELECT  school_name FROM `schools` WHERE school_id = `team_2_id`) AS `team_2_name`,`team_2_odd`,(SELECT  school_name FROM `schools` WHERE school_id = `winning_team_id`) AS `winning_name`,`description_1`,`description_2`,`status` FROM `matchs`");
	}

	public function getMatchsByDay($today = '') {
		if ($today != '') {
			$this -> query("SET time_zone='+00:00';");
			return $this -> query("SELECT 
							`match_id`,`match_date`,
							team_1.school_id,
							team_1.school_name as team_1_name,
							team_1.logo_url as team_1_logo,
							team_1.map_img_url as team_1_map, 
							team_1.background_url as team_1_background, 
							team_1.video_url as team_1_video, 
							team_1.address as team_1_address, 
							`team_1_odd`, 
							team_2.school_id,
							team_2.school_name as team_2_name,
							team_2.logo_url as team_2_logo,
							team_2.map_img_url as team_2_map, 
							team_2.background_url as team_2_background, 
							team_2.video_url as team_2_video, 
							team_2.address as team_2_address,
							`team_2_odd`,`description_1`,`description_2` FROM `matchs` as m, schools as team_1, schools as team_2 WHERE team_1.school_id = m.team_1_id AND team_2.school_id = m.team_2_id AND `status` = 1 AND `match_date` > '" . $today . "' ORDER BY `match_date`;");
		}

		return null;
	}

	public function getMatchById($id = 0) {
		if ($id != 0)
			return $this -> query("SELECT 
							`match_id`,`match_date`,
							team_1.school_id,
							team_1.school_name as team_1_name,
							team_1.logo_url as team_1_logo,
							team_1.map_img_url as team_1_map, 
							team_1.background_url as team_1_background, 
							team_1.video_url as team_1_video, 
							team_1.address as team_1_address, 
							`team_1_odd`, 
							team_2.school_id,
							team_2.school_name as team_2_name,
							team_2.logo_url as team_2_logo,
							team_2.map_img_url as team_2_map, 
							team_2.background_url as team_2_background, 
							team_2.video_url as team_2_video, 
							team_2.address as team_2_address,
							`team_2_odd`,`description_1`,`description_2` FROM `matchs` as m, schools as team_1, schools as team_2 WHERE team_1.school_id = m.team_1_id AND team_2.school_id = m.team_2_id AND `match_id` = " . $id . ";");

		return null;
	}

	public function getSchoolNameIdByMatchID($id = 0) {
		if ($id != 0)
			return $this -> query("SELECT 
							m.winning_team_id,
			                m.team_1_id,
			                m.team_2_id,
							team_1.school_name as team_1_name,
							team_2.school_name as team_2_name FROM `matchs` as m, schools as team_1, schools as team_2 WHERE team_1.school_id = m.team_1_id AND team_2.school_id = m.team_2_id AND `match_id` = " . $id . ";");

		return null;
	}

	public function changeStatus($status = 0, $id = 0) {
		if ($status >= 0 && $id != 0) {
			return $this -> updateAll(array('Match.status' => $status), array('Match.match_id = ' => $id));
		}

		return null;
	}

}
