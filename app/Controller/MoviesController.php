<?php
class MoviesController extends AppController {
	
	public function index(){
		$videos = array();
		$videos = array_merge($videos, array('KOSHIEN STADIUM AUGUST 1986' =>'//www.youtube.com/embed/Kyqnwkp1bWU'));
		$videos = array_merge($videos, array('2013.4.20 Japanese Baseball Game in Koshien Stadium 2' =>'//www.youtube.com/embed/OHouzpumOGc'));
		$videos = array_merge($videos, array('Crazy Pitcher Shinjo ' =>'//www.youtube.com/embed/WOxP8YQ1NYA'));
		$this->set('videos', $videos);
	}
}