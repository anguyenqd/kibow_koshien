<ul id="user_nav">
	<?php
	if(!$this -> Session -> check('User')){
	?>
	<li class="login">
		<?=$this->html->link('Login', array('controller' => 'Users', 'action' => 'login'));?>
	</li>
	<?php }else{ ?>
	<li class="login">
		<a href="#">My Page</a>
	</li>
	<li>
		<a href="<?php echo $this -> Session -> read('logout')?>">Logout</a>
	</li>
	<?php } ?>
</ul>