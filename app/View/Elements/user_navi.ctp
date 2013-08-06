<ul id="user_nav">
	<?php
	if(!$this -> Session -> check('User')){
	?>
	<li class="login">
		<?=$this->html->link('Login', array('controller' => 'Users', 'action' => 'login'));?>
	</li>
	<li>
		<a href="#">Register</a>
	</li>
	<li class="language">
		<a href="#">English</a>
	</li>
	<?php }else{ ?>
	<li class="login">
		<a href="#">My Page</a>
	</li>
	<li>
		<a href="<?php echo $this -> Session -> read('logout')?>">Logout</a>
	</li>
	<li class="language">
		<a href="#">English</a>
	</li>
	<?php } ?>
</ul>