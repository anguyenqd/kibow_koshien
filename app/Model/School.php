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
		return $this -> query("SELECT COUNT(schools.school_id) AS 'count_school', 
								schools.school_id, school_name, logo_url,
								map_img_url, description, odds 
								FROM schools, bet_details 
								WHERE schools.school_id = bet_details.school_id 
								GROUP BY schools.school_id");
	}

}
