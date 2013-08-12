<table class="data_list" border=1>
	<tr>
		<td>ID</td>
		<td>Match Date</td>
		<td>Team 1</td>
		<td>Team 1 odds</td>
		<td>Description for team 1</td>
		<td>Team 2</td>
		<td>Team 2 odds</td>
		<td>Description for team 2</td>
		<td>Winning team</td>
		<td>Status</td>
		<td>Edit</td>
		<td>Delete</td>
	</tr>
<?php 
foreach ($matchs as $match) {
	$status = $this->Html->link('Enable', array('action' => 'enable', $match['matchs']['match_id']));
	if($match['matchs']['status'] == 1)
	{
		$status = $this->Html->link('Disable', array('action' => 'disable', $match['matchs']['match_id']));
	}
	?>
	<tr>
		<td><?=$match['matchs']['match_id'] ?></td>
		<td><?=$match['matchs']['match_date'] ?></td>
		<td><?=$match[0]['team_1_name'] ?></td>
		<td><?=$match['matchs']['team_1_odd'] ?></td>
		<td><?=$match['matchs']['description_1'] ?></td>
		<td><?=$match[0]['team_2_name'] ?></td>
		<td><?=$match['matchs']['team_2_odd'] ?></td>
		<td><?=$match['matchs']['description_2'] ?></td>
		<td><?=($match[0]['winning_name'] != null) ? $match[0]['winning_name'] : 'Waiting' ?></td>
		<td><?=$status?></td>
		<td><?=$this -> Html -> link('Edit', array('controller' => 'Matchs', 'action' => 'edit', $match['matchs']['match_id'])) ?></td>
		<td><?=$this -> Html -> link('Delete', array('controller' => 'Matchs', 'action' => 'delete', $match['matchs']['match_id'])) ?></td>
		
	</tr>
<?} ?>
</table>