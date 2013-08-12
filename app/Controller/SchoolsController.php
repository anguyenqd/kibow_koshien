<?php
class SchoolsController extends AppController {
	public $uses = array('School');
	public function index() {
		$this -> Set('schools', $this -> School -> getSchoolsListWithBetAmount());
	}

}
