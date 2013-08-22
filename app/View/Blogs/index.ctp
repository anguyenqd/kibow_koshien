<ul>
	<?php foreach ($blogs as $blog) {
		echo "<li>". $this->Html->link($blog['blogs']['blog_title'], array('action' => 'detail',$blog['blogs']['blog_id']))."</li>";
	}?>
</ul>
	