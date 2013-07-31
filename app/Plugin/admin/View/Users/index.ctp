<table class="data_list">
	<tr>
		<td>ID</td>
		<td>SNS ID</td>
		<td>SNS type</td>
		<td>Delete</td>
	</tr>
<?php 

foreach ($users as $user) {?>
	<tr>
		<td><?=$user['User']['user_id']?></td>
		<td><a href="#"><?=$user['User']['sns_account']?></a></td>
		<td><?=$user['User']['sns_type']?></td>
		<td><a href="delete?sns_account=<?=$user['User']['sns_account']?>">Delete</a></td>
	</tr>
<?}?>
</table>