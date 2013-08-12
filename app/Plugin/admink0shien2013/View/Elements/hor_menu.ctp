<ul class="hor_menu">
	<li><?=$this -> Html -> link('User', array('controller' => 'Users', 'action' => 'index')); ?></li>
	<li><?=$this -> Html -> link('School list', array('controller' => 'Schools', 'action' => 'index')); ?></li>
	<li><?=$this -> Html -> link('Add School', array('controller' => 'Schools', 'action' => 'add')); ?></li>
	<li><?=$this -> Html -> link('Match List', array('controller' => 'Matchs', 'action' => 'index')); ?></li>
	<li><?=$this -> Html -> link('Add Match', array('controller' => 'Matchs', 'action' => 'add')); ?></li>
	<li><?=$this -> Html -> link('Movies', array('controller' => 'Movies', 'action' => 'index')); ?></li>
	<li><?=$this -> Html -> link('Movie Categories', array('controller' => 'Moviecategories', 'action' => 'index')); ?></li>
	<li><?=$this -> Html -> link('Logut', array('controller' => 'Users', 'action' => 'logout')); ?></li>
</ul>