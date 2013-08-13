<section class="initial_deposit clearfix">
	<h2>Initial Deposit <span>1000</span> zenny</h2>
	<?php if($this->Session->check('User')){?>
	<h2>Your current Balance <span class="balance_number"><?php
				$userData = $this->Session->read('User');
				echo $userData['User']['balance']?></span> zenny</h2>
	<?}else{ ?>
	<h2>Your current blance <span class="balance_number">1000</span> zenny</h2>
	<?} ?>
	
	<h2>Return <span class="return_number">0</span> zenny</h2>
</section>
<form name="bet-form" id="bet-form" method="post" id="form_submit">
<?php foreach ($matchs as $match) {?>
<section id="koushien_match" class="clearfix">
	<div class="stadium">
		<img src="img/stadium.png" width="940" />
	</div>
	<div class="match">
		<div class="vs_img">
			<img src="img/vs.png" />
		</div>
		<div id="first_match_school" class="school">
			<div class="school_uniform" data-desc="<?= $match['m']['description_1'] ?>" data-map="<?=BASE_URL . DS . 'img' . DS . $match['team_1']['team_1_map'] ?>" >
				<?=$this -> Html -> image($match['team_1']['team_1_logo'], array('width' => 118, 'class' => 'uniform_image')) ?>
				<?=$this -> Html -> image($match['team_1']['team_1_background'], array('width' => 172, 'class' => 'background_uniform')) ?>
				<a data-video-id="<?=$match['team_1']['team_1_video'] ?>" 
				  class="video_button">Watch Video</a>
			</div>
			<div class="school_name">
				<?=$match['team_1']['team_1_name'] ?>
			</div>
			<div class="school_address">
				<?=$match['team_1']['team_1_address'] ?>
			</div>
			<div class="odd_vote">
				<span class="odd_number"><?=$match['m']['team_1_odd'] ?></span>
				<span class="vote_number"></span>
			</div>
			<div class="stake">
				Stakes
				<input type="text" value="0" size="3" id="bet_amount" name='data[team_1_amount]'/>/
				<span class="balance_number_each"><?php
					if ($this -> Session -> check('User')) {
						$userData = $this -> Session -> read('User');
						echo $userData['User']['balance'];
					} else {
						echo '1000';
					}
					?></span> z
				<input type="hidden" class="previous_bet" value="0"/>
				<input type="hidden" name="team_1_odds" value="<?=$match['m']['team_1_odd'] ?>"/>
			</div>
			<div class="return_number_wrap">Return <span class="return_number_each">0</span> Zenny</div>
			<div class="btn_place_bet"><a id="btn_blace_bet" href="javascript:void(0)"><?=$this -> Html -> image('btn_place_bet.png') ?></a></div>
		</div>
		<div id="second_match_school" class="school">
			<div class="school_uniform" data-desc="<?= $match['m']['description_1'] ?>" data-map="<?=BASE_URL . DS . 'img' . DS . $match['team_2']['team_2_map'] ?>" >
				<?=$this -> Html -> image($match['team_2']['team_2_logo'], array('width' => 118, 'class' => 'uniform_image')) ?>
				<?=$this -> Html -> image($match['team_2']['team_2_background'], array('width' => 172, 'class' => 'background_uniform')) ?>
				
				<a data-video-id="<?=$match['team_2']['team_2_video'] ?>" 
				  class="video_button">Watch Video</a>
			</div>
			<div class="school_name">
				<?=$match['team_2']['team_2_name'] ?>
			</div>
			<div class="school_address">
				<?=$match['team_2']['team_2_address'] ?>
			</div>
			<div class="odd_vote">
				<span class="odd_number"><?=$match['m']['team_2_odd'] ?></span>
				<span class="vote_number"></span>
			</div>
			<div class="stake">
				Stakes
				<input type="text" value="0" size="3" id="bet_amount" name='data[team_2_amount]'/>/
				<span class="balance_number_each"><?php
					if ($this -> Session -> check('User')) {
						$userData = $this -> Session -> read('User');
						echo $userData['User']['balance'];
					} else {
						echo '1000';
					}
					?></span> z
				<input type="hidden" class="previous_bet" value="0"/>
				<input type="hidden" name="team_2_odds" value="<?=$match['m']['team_2_odd'] ?>"/>
			</div>
			<div class="return_number_wrap">Return <span class="return_number_each">0</span> Zenny</div>
			<div class="btn_place_bet"><a id="btn_blace_bet" href="javascript:void(0)"><?=$this -> Html -> image('btn_place_bet.png') ?></a></div>
		</div>
	</div>
	<?php 
	$btnConfirmText = 'Confirm your bet';
	if(!$this->Session->check('User')){
		$btnConfirmText = 'Sign up with facebook';
		?>
		<div class="confirm_text">If you want to save your bet data, please Sign up with your third-party service accounts.</div>
		<?php }else{  echo '<div class="confirm_text"></div>'; } ?>
	<div class="confirm_chosen_school" id="facebook">
		<?=$btnConfirmText ?>
	</div>
</section>
<input name="match_id" type="hidden" value="<?=$match['m']['match_id'] ?>">
<input name="team_1_id" type="hidden" value="<?=$match['team_1']['school_id'] ?>">
<input name="team_2_id" type="hidden" value="<?=$match['team_2']['school_id'] ?>">
<input name="step" type="hidden" value="2">
<?php } ?>
</form>
