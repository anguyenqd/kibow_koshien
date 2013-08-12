
<h2>Add movie</h2>
<?php
echo $this -> Form -> create('Movie', array('type' => 'file'));
echo $this -> Form -> select('movie_category_id', $categories);
echo $this -> Form -> input('title',array('default' => ''));
echo $this -> Form -> input('youtube_id', array('type' => 'text'));
echo $this -> Form -> label('Image');
echo $this -> Form -> file('image');
echo $this -> Form -> end('Add');
?>