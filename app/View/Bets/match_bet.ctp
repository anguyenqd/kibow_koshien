<?php 
$this->set('meta_title', __('Matches | Summer Koshien Betting'));
$this->set('meta_description', __('View the matches for the Koshien Japanese High School Baseball Championship Tournament here. Bet on your best teams and win BIG prizes.'));
$this->set('meta_keywords', __('Koshien Japanese High School Baseball Championship Betting, matches'));

$this->assign('breadcrumbs', $this->element('breadcrumbs', array('list'=>array(
    'Matches' => '',
)))) ?>
<h2 style="text-align: center;padding-top:20px;">The next matches</h2>
<div class="description_text">
<p>The game isn’t over yet. Check out the next matches and decide whose side are you on.</p>
<p>Be one of the top 10 players and get a chance to win REAL MONEY in <a href="https://kibow.net/">Kibow.net</a> by the end of the tournament. Players will be ranked based on the zenny earned throughout the Koshien promo. Don’t miss this chance. Bet now!
</p>
</div>
<?php foreach ($matchs as $match) {?>
<form id="form_submit" name="match_bet" method="post" id="bet-form" action="<?=BASE_URL.'match-bet-form'?>">
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
		</div>
		<div id="second_match_school" class="school">
			<div class="school_uniform" data-desc="<?= $match['m']['description_2'] ?>" data-map="<?=BASE_URL . DS . 'img' . DS . $match['team_2']['team_2_map'] ?>" >
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
		</div>
	</div>
	<div class='clearfix'></div>
	<div style="display: none;" class="hover">
		<div class="arrow">
			<img src="img/hover_arrow.png"/>
		</div>
	</div>
	<input type="submit" class="btn_confirm_chosen_school" value="Go to betslip" />
</section>
<input name="match_id" type="hidden" value="<?=$match['m']['match_id'] ?>">
</form>
<?php } ?>

