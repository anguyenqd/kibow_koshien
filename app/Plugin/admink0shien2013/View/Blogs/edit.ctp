<?php
echo $this -> Html -> script('ckeditor/ckeditor');
echo $this -> Form -> create('Blog');
echo $this -> Form -> input('blog_title');
echo $this -> Form -> textarea('blog_content', array('class' => 'ckeditor'));
echo $this -> Form -> end('Add');
?>
