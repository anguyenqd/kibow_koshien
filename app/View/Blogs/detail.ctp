
<div id="blog">
<?php foreach ($blog as $b) {
	$this->assign('breadcrumbs', $this->element('breadcrumbs', array('list'=>array(
    'Blogs' => array('action' => 'index'), $b['blog_title'] => ''
))));
	$this->set('meta_title', $b['blog_title']);
	$this->set('meta_description', $b['meta_description']);	
?>
<div class="blog_title"><?=$b['blog_title'] ?></div>
<div><?=$b['date_add']?></div>
<div class="blog_content"><?=$b['blog_content'] ?></div>
<?} ?>
</div>
