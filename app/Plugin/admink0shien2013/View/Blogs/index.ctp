<table class="data_list">
	<tr>
		<td>Num</td>
		<td>ID</td>
		<td>Blog title</td>
		<td>Date add</td>
		<td>Delete</td>
	</tr>
<?php 
$i = 1;
foreach ($blogs as $blog) {
	?>
	<tr>
		<td><?=$i?></td>
		<td><?=$blog['Blog']['blog_id']?></td>
		<td><?=$this->Html->link($blog['Blog']['blog_title'], array('controller' => 'Blogs', 'action' => 'edit', $blog['Blog']['blog_id']))?></td>
		<td><?=$blog['Blog']['date_add']?></td>
		<td><?=$this->Html->link('Delete', array('controller' => 'Blogs', 'action' => 'delete', $blog['Blog']['blog_id']))?></td>
	</tr>
<?$i++;}?>
</table>