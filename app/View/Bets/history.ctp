<table class="data_list">
	<tr>
		<td>School Name</td>
		<td>Odds</td>
		<td>Bet Amount</td>
		<td>Bet Date</td>
	</tr>
<?php 

foreach ($history as $bet) { ?>
	<tr>
		<td><?=$bet['schools']['school_name']?></td>
		<td><?=$bet['schools']['odds']?></td>
		<td><?=$bet['bet_details']['bet_amount']?></td>
		<td><?=$bet['bets']['bet_date']?></td>
	</tr>
<?}?>
</table>