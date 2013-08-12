<?php
class MatchsController extends AppController {
	public $uses = array('Match', 'School');

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
			$i = 0;
			foreach ($schools as $school) {
				$optionSchoolList[$school['School']['school_id']] = $school['School']['school_name'];
				$i++;
			}
			$this -> set('schools', $optionSchoolList);
		} else {
			//Store
			$data = $this -> request -> data;
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
				$data = $this -> Match -> getMatchByIdToEdit($id);
				$this ->set('status', $data['Match']['status']);
				$this -> request -> data = $data;
			} else {
				$this -> Session -> setFlash('Your change was fail');
				$this -> redirect(array('action' => 'index'));
			}

		} else {
			$data = $this -> request -> data;
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
				$this -> Match -> editMatch($id, $data['Match']);
				$this -> Session -> setFlash('Your change was success');
				$this -> redirect(array('action' => 'index'));
			}
		} else {
			$this -> Session -> setFlash('Unsupported request');
			$this -> redirect(array('action' => 'index'));
		}

	}

}
