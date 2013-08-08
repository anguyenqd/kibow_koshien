<?=$this -> Session -> flash() ?>
<?php if(!$this->Session->check('admin')){?>
<form name="login" method="post">
	<div>
		<div>
			Admin account
			<input type="text" name="username" value=""/>
		</div>
		<div>
			Admin password
			<input type="text" name="password" value=""/>
		</div>
		<div>
			<input type="submit" value="Login">
		</div>
	</div>
</form>
<?php } ?>