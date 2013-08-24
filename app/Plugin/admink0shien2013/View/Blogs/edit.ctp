<?php
echo $this -> Html -> script('ckeditor/ckeditor');
echo $this -> Form -> create('Blog');
echo $this -> Form -> input('blog_title');
echo $this -> Form -> label('category_id');
echo $this -> Form -> select('category_id', $categories);
echo $this -> Form -> input('meta_description');
echo "<br/>";
echo $this -> Form -> label('date_add');
echo $this -> Form -> dateTime('date_add','DMY','24',array('empty' => false, 'minYear' => date('Y'),
                                             'maxYear' => date('Y') + 10,));
echo "<br/>";
echo $this -> Form -> label('Short content');
echo $this -> Form -> textarea('blog_short_content', array('class' => 'ckeditor'));
echo $this -> Form -> label('Full content');
echo "<br/>";
echo $this -> Form -> textarea('blog_content', array('class' => 'ckeditor'));
echo $this -> Form -> end('Update');
?>
<h2>Preview</h2>
<?=$blog_content?>
