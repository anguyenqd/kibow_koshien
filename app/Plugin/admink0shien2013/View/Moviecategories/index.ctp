<h2>Movie category</h2>
<?=$this -> Html -> link('Add', array('controller' => 'Moviecategories', 'action' => 'add')); ?>
<table class="data_list" border=1>
	<tr>
		<td>ID</td>
		<td>Title</td>
		<td>Delete</td>
	</tr>
<?php 
foreach ($result as $school) { ?>
	<tr>
		<td><?=$school['MovieCategory']['id'] ?></td>
		<td><?=$this -> Html -> link($school['MovieCategory']['title'], array('controller' => 'Moviecategories', 'action' => 'edit', '?' => array('id' => $school['MovieCategory']['id']))); ?></td>
		<td><?=$this -> Html -> link('Delete', array('controller' => 'Moviecategories', 'action' => 'deleteItem', '?' => array('id' => $school['MovieCategory']['id']))); ?></td>

	</tr>
<?} ?>
</table>