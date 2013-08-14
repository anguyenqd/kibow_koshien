<?php $this->assign('breadcrumbs', $this->element('breadcrumbs', array('list'=>array(
    'MY PAGE' => array('controller' => 'Users', 'action' => 'index'), 'History' => ''
)))) ?>
<h1>Your ranking</h1>
<span class="currentbalance">Current balance : <?=$userBalance ?> Zenny</span>
<div id="side_navi">
	<ul>
	    <li><?php echo $this -> Html -> Link('My Page', array('controller' => 'Users', 'action' => 'index')); ?></li>
		<li class="item">
			<?php echo $this -> Html -> Link('History', array('controller' => 'Users', 'action' => 'index'), array('class' => 'item')); ?>
		</li>
		<li class="item">
			<?=$this -> Html -> Link('Ranking', array('controller' => 'Users', 'action' => 'ranking'), array('class' => 'item')) ?>
		</li>
	</ul>
</div>
<section id="user_page">
	<div class="user_info">
		<div class="user_img">
			<img src="https://graph.facebook.com/<?=$this -> Session -> read('User-fb-id') ?>/picture" width="100"/>
		</div>
		<div class="info">
			<span class="current_ranking">Currently Ranking #<?php echo $userRank[0][0]['rank']; ?> <span>234</span></span>
			<br/>
		</div>
<!-- 		<div class="sharing"> -->
<!-- 			<div class="social_sharing"> -->
				<?php //echo $this -> Html -> image('twitter-logo-1.jpg', array('width' => 80)) ?>
<!-- 			</div> -->
<!-- 			<div class="info"> -->
<!-- 				Share your score with your friends -->
<!-- 			</div> -->
<!-- 		</div> -->
		
		<div style="clear:both; height: 0px;">&nbsp;</div>
	</div>
	<div class="clearfix"></div>
	<div>
<!-- 	<a href="javascript:void(0)" id="top_ten_rank">Top 10 ranking</a> -->
<!-- 	<a href="javascript:void(0)" id="your_rank">Your ranking</a> -->
	</div>
	<div class="top_rank_list"  style="display:none">
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
				$i = 1;
				foreach ($rankList as $rank) {
				?>
				<tr <?=($rank[0]['rank'] % 2 == 0) ? 'class="even"' : '' ?><?php if ($i%2==0) echo ' class="highlight"'?>>
					<td><?=$rank[0]['rank'] ?></td>
					<td><?=$rank['users']['sns_account'] ?></td>
					<td><?=$rank['users']['bl'] ?></td>
				</tr>
				<?php
				$i++; 
				} ?>
			</tbody>
		</table>
	</div>
	<div class="your_rank_list">
		<table id="your_ranking_table">
			<thead>
				<tr>
					<td>Rank</td>
					<td>Name</td>
					<td>Zenny</td>
				</tr>
			</thead>
			<tbody>
				<?php
				$i = 1;
				foreach ($rankList as $rank) {
				?>
				<tr <?=($rank[0]['rank'] % 2 == 0) ? 'class="even"' : '' ?><?php if ($i%2==0) echo ' class="highlight"'; ?>>
					<td><?=$rank[0]['rank'] ?></td>
					<td><?=$rank['users']['sns_account'] ?></td>
					<td><?=$rank['users']['bl'] ?></td>
				</tr>
				<?php
				$i++; 
				} ?>
			</tbody>
		</table>
	</div>
</section>