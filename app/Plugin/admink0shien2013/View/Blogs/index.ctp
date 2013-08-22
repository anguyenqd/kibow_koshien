<table class="data_list" border="1">
	<tr>
		<td>Num</td>
		<td>ID</td>
		<td>Category</td>
		<td>Blog title</td>
		<td>Blog meta</td>
		<td>Date add</td>
		<td>Delete</td>
	</tr>
<?php 
$i = 1;
foreach ($blogs as $blog) {
	?>
	<tr>
		<td><?=$i?></td>
		<td><?=$blog['blogs']['blog_id']?></td>
		<td><?=$blog['blog_categories']['category_name']?></td>
		<td><?=$this->Html->link($blog['blogs']['blog_title'], array('controller' => 'Blogs', 'action' => 'edit', $blog['blogs']['blog_id']))?></td>
		<td><?=$blog['blogs']['meta_description']?></td>
		<td><?=$blog['blogs']['date_add']?></td>
		<td><?=$this->Html->link('Delete', array('controller' => 'Blogs', 'action' => 'delete', $blog['blogs']['blog_id']))?></td>
	</tr>
<?$i++;}?>
</table>