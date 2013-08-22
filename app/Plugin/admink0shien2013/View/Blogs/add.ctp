<?php
echo $this -> Html -> script('ckeditor/ckeditor');
echo $this -> Form -> create('Blog');
echo $this -> Form -> input('blog_title');
echo $this -> Form -> label('category_id');
echo $this -> Form -> select('category_id', $categories);
echo $this -> Form -> input('meta_description');
echo $this -> Form -> textarea('blog_content', array('class' => 'ckeditor'));
echo $this -> Form -> end('Add');
?>
