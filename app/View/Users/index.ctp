<?php $this->assign('breadcrumbs', $this->element('breadcrumbs', array('list'=>array(
    'My Page' => array('controller' => 'Users', 'action' => 'index'), 'History' => ''
)))) ?>
<div id="side_navi">
	<ul>
		<li>
			<?=$this -> Html -> Link('History', array('controller' => 'Users', 'action' => 'index')) ?>
		</li>
		<li>
			<?php //$this -> Html -> Link('Ranking', array('controller' => 'Users', 'action' => 'ranking')) ?>
		</li>
	</ul>
</div>
<section id="user_page" class="clearfix">
	<div style="color:red"><?=$this -> Session -> flash(); ?></div>
	<table>
		<thead>
			<tr>
				<td>No.</td>
				<td>Category</td>
				<td>Event</td>
				<td>Section</td>
				<td>Entry</td>
				<td>Odds</td>
				<td>Bet Amount</td>
				<td>Status</td>
				<td>Date</td>
			</tr>
		</thead>
		<tbody>
			<?php
				$i = 1;
				foreach ($history as $bet) {
				$betType = 'Top 8';
				if($bet['bet_details']['bet_type'] == 1)
				{
					$betType = 'outright';
				}else if($bet['bet_details']['bet_type'] == 2)
				{
					$betType = 'Top 4';
				}else if($bet['bet_details']['bet_type'] == 4)
				{
					$betType = $bet[0]['section'];
				}
					
			?>
			<tr <?=($i % 2 == 0) ? 'class="even"' : '' ?> >
				<td><?=$i ?></td>
				<td>Koushien</td>
				<td>Koushien</td>
				<td><?=$betType ?></td>
				<td><?=$bet['schools']['school_name'] ?></td>
				<td><?=$bet['bet_details']['odds'] ?></td>
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
				<td><?=$bet['bets']['bet_date'] ?></td>
			</tr>
			<?$i++;
				}
			?>
		</tbody>
	</table>
</section>