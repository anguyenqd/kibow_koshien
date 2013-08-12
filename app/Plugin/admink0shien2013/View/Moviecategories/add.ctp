
<h2>Add movie category</h2>
<?php
echo $this -> Form -> create('MovieCategory', array('type' => 'file'));
echo $this -> Form -> input('title',array('default' => ''));
echo $this -> Form -> end('Add');
?>