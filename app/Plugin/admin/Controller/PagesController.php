<?php
class PagesController extends AppController {
	public $helpers = array('Html');
	public function beforeFilter() {
		parent::beforeFilter();
		$this->set('title_for_layout','Admin site');
	}
	
	public function display()
	{
		
	}
}