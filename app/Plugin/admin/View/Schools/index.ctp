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
		<td><?=$school['School']['school_id']?></td>
		<td><a href="edit?school_id=<?=$school['School']['school_id']?>"><?=$school['School']['school_name']?></a></td>
		<td><img src="../../<?=$school['School']['logo_url']?>" width="100" /></td>
		<td><img src="../../<?=$school['School']['map_img_url']?>" width="100" /></td>
		<td><?=$school['School']['description']?></td>
		<td><?=$school['School']['odds']?></td>
		<td><a href="delete?school_id=<?=$school['School']['school_id']?>">Delete</a></td>
	</tr>
<?}?>
</table>