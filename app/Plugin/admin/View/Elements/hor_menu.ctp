<ul class="hor_menu">
	<li><?=$this -> Html -> link('User', array('controller' => 'Users', 'action' => 'index')); ?></li>
	<li><?=$this -> Html -> link('School list', array('controller' => 'Schools', 'action' => 'index')); ?></li>
	<li><?=$this -> Html -> link('Add School', array('controller' => 'Schools', 'action' => 'add')); ?></li>
</ul>