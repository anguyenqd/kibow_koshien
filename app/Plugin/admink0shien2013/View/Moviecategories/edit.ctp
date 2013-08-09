

<h2>Edit movie category</h2>
<?php
echo $this -> Form -> create('MovieCategory', array('type' => 'file'));
echo $this -> Form -> input('title');
echo $this -> Form -> end('Update');
?>