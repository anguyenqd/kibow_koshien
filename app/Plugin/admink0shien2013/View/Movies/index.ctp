<h2>Movies</h2>
<?=$this -> Html -> link('Add', array('controller' => 'Movies', 'action' => 'add')); ?>
<table class="data_list" border=1>
	<tr>
		<td>ID</td>
		<td>Title</td>
		<td>Category</td>
		<td>Youtube ID</td>
		<td>Image</td>
		<td>Delete</td>
	</tr>
<?php 
foreach ($result as $school) { ?>
	<tr>
		<td><?=$school['Movie']['id'] ?></td>
		<td><?=$this -> Html -> link($school['Movie']['title'], array('controller' => 'Movies', 'action' => 'edit', '?' => array('id' => $school['Movie']['id']))); ?></td>
		<td><?=$school['Movie']['movie_category_id'] ?></td>
		<td><?=$school['Movie']['youtube_id'] ?></td>
		<td><?=$school['Movie']['image'] ?></td>
		<td><?=$this -> Html -> link('Delete', array('controller' => 'Movies', 'action' => 'deleteItem', '?' => array('id' => $school['Movie']['id']))); ?></td>

	</tr>
<?} ?>
</table>