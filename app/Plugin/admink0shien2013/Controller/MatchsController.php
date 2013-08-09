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
			$date = $data['Match']['year'] . '-' . $data['Match']['month'] . '-' . $data['Match']['day'] . ' ' . $data['Match']['hour'] . ':' . $data['Match']['minute'] . ':00';

			unset($data['Match']['year']);
			unset($data['Match']['month']);
			unset($data['Match']['day']);
			unset($data['Match']['hour']);
			unset($data['Match']['minute']);

			$data['Match']['match_date'] = $date;
			$this -> Match -> addMatch($data);
			$this -> redirect(array('action' => 'index'));
		}

	}

	public function edit() {
		if (!$this -> Session -> check('admin')) {
			$this -> redirect(array('controller' => 'pages', 'action' => 'display'));
		}
	}

	public function delete($id = 0) {
		if ($id != 0) {
			$this -> Match -> deleteMatch($id);
			$this -> redirect(array('action' => 'index'));
		}

	}

}
