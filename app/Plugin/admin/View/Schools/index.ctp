<table class="data_list" border=1>
	<tr>
		<td>ID</td>
		<td>School Name</td>
		<td>Uniform</td>
		<td>Map</td>
		<td>Background</td>
		<td>Address</td>
		<td>Description</td>
		<td>Odds</td>
		<td>Delete</td>
	</tr>
<?php 
foreach ($schools as $school) { ?>
	<tr>
		<td><?=$school['School']['school_id'] ?></td>
		<td><?=$this -> Html -> link($school['School']['school_name'], array('controller' => 'Schools', 'action' => 'edit', '?' => array('school_id' => $school['School']['school_id']))); ?></td>
		<td><?=$this->html->image($school['School']['logo_url'], array('width' => 100))?></td>
		<td><?=$this->html->image($school['School']['map_img_url'], array('width' => 100))?></td>
		<td><?=$this->html->image($school['School']['background_url'], array('width' => 100))?></td>
		<td><?=$school['School']['address'] ?></td>
		<td><?=$school['School']['description'] ?></td>
		<td><?=$school['School']['odds'] ?></td>
		<td><?=$this -> Html -> link('Delete', array('controller' => 'Schools', 'action' => 'delete', '?' => array('school_id' => $school['School']['school_id']))); ?></td>

	</tr>
<?} ?>
</table>