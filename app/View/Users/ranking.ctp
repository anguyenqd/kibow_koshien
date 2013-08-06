<div id="side_navi">
	<ul>
		<li>
			<?=$this -> Html -> Link('History', array('controller' => 'Users', 'action' => 'index')) ?>
		</li>
		<li>
			<?=$this -> Html -> Link('Ranking', array('controller' => 'Users', 'action' => 'ranking')) ?>
		</li>
	</ul>
</div>
<section id="user_page">
	<div class="user_info">
		<div class="user_img">
			<img src="https://graph.facebook.com/<?=$this->Session->read('User-fb-id')?>/picture" width="100"/>
		</div>
		<div class="info">
			<span class="current_ranking">Currently Ranking #<?=$userRank[0][0]['rank']?></span>
			<br/>
			Lorem Ipsum is simply dummy text of the printing and typesetting industry.
		</div>
		<div class="sharing">
			<div class="social_sharing">
				<?=$this->Html->image('twitter-logo-1.jpg', array('width' => 80))?>
			</div>
			<div class="info">
				Share your score with your friends
			</div>
		</div>
	</div>
	<table id="ranking_table">
		<thead>
			<tr>
				<td>Rank</td>
				<td>Name</td>
				<td>Zenny</td>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach ($rankList as $rank) {
			?>
			<tr <?=($rank[0]['rank'] % 2 == 0) ? 'class="even"' : '' ?>>
				<td><?=$rank[0]['rank']?></td>
				<td><?=$rank['users']['sns_account']?></td>
				<td><?=$rank['users']['bl']?></td>
			</tr>
			<?php }?>
		</tbody>
	</table>
</section>