<table class="data_list">
	<tr>
		<td>ID</td>
		<td>School Name</td>
		<td>Logo</td>
		<td>Map</td>
		<td>Description</td>
		<td>Odds</td>
		<td>Delete</td>
	</tr>
<?php 

foreach ($schools as $school) { ?>
	<tr>
		<td><?=$school['School']['school_id'] ?></td>
		<td><?=$this -> Html -> link($school['School']['school_name'], array('controller' => 'Schools', 'action' => 'edit', '?' => array('school_id' => $school['School']['school_id']))); ?></td>
		<td><img src="../<?=$school['School']['logo_url'] ?>" width="100" /></td>
		<td><img src="../<?=$school['School']['map_img_url'] ?>" width="100" /></td>
		<td><?=$school['School']['description'] ?></td>
		<td><?=$school['School']['odds'] ?></td>
		<td><?=$this -> Html -> link('Delete', array('controller' => 'Schools', 'action' => 'delete', '?' => array('school_id' => $school['School']['school_id']))); ?></td>

	</tr>
<?} ?>
</table>