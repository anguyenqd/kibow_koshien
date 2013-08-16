<?php
class MoviesController extends AppController {
    
    public $uses = array('Movie', 'MovieCategory');
	
	public function index(){
// 		$videos = array();
// 		$videos = array_merge($videos, array('KOSHIEN STADIUM AUGUST 1986' =>'//www.youtube.com/embed/Kyqnwkp1bWU'));
// 		$videos = array_merge($videos, array('2013.4.20 Japanese Baseball Game in Koshien Stadium 2' =>'//www.youtube.com/embed/OHouzpumOGc'));
// 		$videos = array_merge($videos, array('Crazy Pitcher Shinjo ' =>'//www.youtube.com/embed/WOxP8YQ1NYA'));
// 		$this->set('videos', $videos);

	    
	    $categories = $this -> MovieCategory -> getAll();
	    $movies = $this -> Movie -> getAll();
	    
	    $catid = isset($_GET['moviecategory']) ? $_GET['moviecategory'] : '';
	    if ($catid != '') {
	      $movies =  $this->Movie->find('all', array(
	              'joins' => array(
	                      array(
	                              'table' => 'moviecategories',
	                              'alias' => 'moviecategoriesJoin',
	                              'type' => 'INNER',
	                              'conditions' => array(
	                                      'moviecategoriesJoin.id = Movie.movie_category_id'
	                              )
	                      )
	              ),
	              'conditions' => array(
	                      'Movie.movie_category_id' => $catid
	              ),
	              'fields' => array('moviecategoriesJoin.*', 'Movie.*')
	      ));
	    } else {
	      $movies  = $this->Movie->find('all', array(
	              'joins' => array(
	                      array(
	                              'table' => 'moviecategories',
	                              'alias' => 'moviecategoriesJoin',
	                              'type' => 'INNER',
	                              'conditions' => array(
	                                      'moviecategoriesJoin.id = Movie.movie_category_id'
	                              )
	                      )
	              ),
	              'conditions' => array(),
	              'fields' => array('moviecategoriesJoin.*', 'Movie.*')
	      ));
	    }
	    
	    $this -> set('cur_category', $catid);
	    $this -> set('movies', $movies);
	    $this -> set('categories', $categories);
	}
}