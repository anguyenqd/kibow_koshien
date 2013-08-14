<table class="data_list" border=1>
	<tr>
		<td>ID</td>
		<td>School Name</td>
		<td>Uniform</td>
		<td>Map</td>
		<td>Background</td>
		<td>Result</td>
		<td>Address</td>
		<td>Description</td>
		<td>Status</td>
		<td>Odds top 8</td>
		<td>Odds top 4</td>
		<td>Odds top 1</td>
		<td>Delete</td>
	</tr>
<?php 
foreach ($schools as $school) { 
	?>
	<tr>
		<td><?=$school['schools']['school_id'] ?></td>
		<td><?=$this -> Html -> link($school['schools']['school_name'], array('controller' => 'Schools', 'action' => 'edit', '?' => array('school_id' => $school['schools']['school_id']))); ?></td>
		<td><?=$this->html->image($school['schools']['logo_url'], array('width' => 100))?></td>
		<td><?=$this->html->image($school['schools']['map_img_url'], array('width' => 100))?></td>
		<td><?=$this->html->image($school['schools']['background_url'], array('width' => 100))?></td>
		<td><?=$this->html->image($school['schools']['result_img_url'], array('width' => 100))?></td>
		<td><?=$school['schools']['address'] ?></td>
		<td><?=$this -> Html -> link($school['school_status']['status_name'], array('controller' => 'Schools', 'action' => 'change_status', $school['schools']['school_id'])); ?></td>
		<td><?=$school['schools']['description'] ?></td>
		<td><?=$school['schools']['odds_top8'] ?></td>
		<td><?=$school['schools']['odds_top4'] ?></td>
		<td><?=$school['schools']['odds_top1'] ?></td>
		<td><?=$this -> Html -> link('Delete', array('controller' => 'Schools', 'action' => 'delete', '?' => array('school_id' => $school['schools']['school_id']))); ?></td>

	</tr>
<?} ?>
</table>