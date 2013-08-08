<?php
echo $this -> Form -> create('User');
echo $this -> Form -> input('sns_account');
echo $this -> Form -> select('sns_type', array('facebook' => 'facebook', 'twitter' => 'twitter'), array('escape' => false));
echo $this -> Form -> input('balance');
echo $this -> Form -> end('Update');
?>