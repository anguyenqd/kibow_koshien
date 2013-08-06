<div id="side_navi">
	<ul>
		<li>
			<?=$this -> Html -> Link('Ranking', array('controller' => 'Users', 'action' => 'index')) ?>
		</li>
		<li>
			<?=$this -> Html -> Link('Ranking', array('controller' => 'Users', 'action' => 'ranking')) ?>
		</li>
	</ul>
</div>
<section id="user_page" class="clearfix">
	<table>
		<thead>
			<tr>
				<td>No.</td>
				<td>School Name</td>
				<td>Date</td>
				<td>Odds top 8</td>
				<td>Odds top 4</td>
				<td>Odds top 1</td>
				<td>Bet Amount</td>
				<td>Status</td>
			</tr>
		</thead>
		<tbody>
			<?php
				$i = 1;
				foreach ($history as $bet) {
			?>
			<tr <?=($i % 2 == 0) ? 'class="even"' : '' ?> >
				<td><?=$i ?></td>
				<td><?=$bet['schools']['school_name'] ?></td>
				<td><?=$bet['bets']['bet_date'] ?></td>
				<td><?=$bet['schools']['odds_top8'] ?></td>
				<td><?=$bet['schools']['odds_top4'] ?></td>
				<td><?=$bet['schools']['odds_top1'] ?></td>
				<td><?=$bet['bet_details']['bet_amount'] ?></td>
				<td>
					<?
					if ($bet['bet_details']['bet_status'] == 3)
						echo 'Waiting';
					else if ($bet['bet_details']['bet_status'] == 2)
						echo 'Lose';
					else if ($bet['bet_details']['bet_status'] == 1)
						echo 'Win';
				?></td>
			</tr>
			<?$i++;
				}
			?>
		</tbody>
	</table>
</section>