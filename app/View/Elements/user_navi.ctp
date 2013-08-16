<?php
	if(!$this -> Session -> check('User')){
	?>
	<li class="login">
		<?=$this->html->link('Login', array('controller' => 'Users', 'action' => 'login'));?>
	</li>
	<li class="login">
		<?=$this->html->link('Sign up', array('controller' => 'Users', 'action' => 'signup'));?>
	</li>
	<?php }else{ ?>
	<li class="login first">
		<?=$this->html->link('My Page', array('controller' => 'Users', 'action' => 'index'));?>
	</li>
	<li class="logout">
		<a href="<?php echo $this -> Session -> read('logout')?>">Logout</a>
	</li>
	<?php } ?>
</ul>