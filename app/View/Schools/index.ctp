<?php $this->assign('breadcrumbs', $this->element('breadcrumbs', array('list'=>array(
    'Schools' => '',
)))) ?>
<div class="description_text">
<p>Scout your TOP teams from the 49 participating schools by watching their videos and reviewing their game information. 
</p>
<p>Want to play for real? Be one of the top 10 players and get a chance to win REAL MONEY in <a href="https://kibow.net/">Kibow.net</a> by the end of the tournament. Players will be ranked based on the zenny earned throughout the Koshien promo. What are you waiting for? Turn your Innings into Real Winnings! So hot Koshien! Play Now!
</p>
</div>
<section id="koushien_first_round">
	<?php 
	$i = 1;
	foreach ($schools as $school) {?>
	<div class="school">
		<div class="school_uniform" data-desc="<?= $school['schools']['description'] ?>" data-map="<?=BASE_URL . DS . 'img' . DS . $school['schools']['map_img_url'] ?>" >
			<?=$this -> Html -> image($school['schools']['logo_url'], array('width' => 118, 'class' => 'uniform_image')) ?>
			<?=$this -> Html -> image($school['schools']['background_url'], array('width' => 172, 'class' => 'background_uniform')) ?>
			<a data-video-id="<?=$school['schools']['video_url'] ?>" 
			  class="video_button video_popup">Watch Video</a>
			<a class="deselect_button" data-school-id="<?=$school['schools']['SI'] ?>">Deselect</a>
		</div>
		<div class="school_name">
			<?=$school['schools']['school_name'] ?>
		</div>
		<div class="school_address">
			<?=$school['schools']['address'] ?>
		</div>
		<div class="odd_vote">
			<span data-school-id="<?=$school['schools']['SI'] ?>" class="odd_number"><?=$school['schools']['odds_top8'] ?></span>
			<span class="vote_number"><?=$school['0']['count_school'] ?></span>
		</div>
	</div>
	<?php if($i == 2){
    echo $this -> element('sns_bet_index_2');
  } ?>
	<?php if($i == 32){?>
		<div class="school"><div><a href="https://kibow.net/_sb/" target="_blank"><?=$this->Html->image('banner_areyouasportslover.png')?></a></div></div>
	<?php } ?>
	<?php if($i == 8){?>
		<div class="school"><div><a href="https://kibow.net/_sb/" target="_blank"><?=$this->Html->image('banner_maketheinnings.png')?></a></div></div>
	<?php } ?>
	<?php if($i == 9){?>
		<div class="school"><div><a href="https://kibow.net/_sb/" target="_blank"><?=$this->Html->image('banner_tryallsports.png')?></a></div></div>
	<?php } ?>
	<?php $i++;
			}
 ?>
 <div class='clearfix'></div>
	<div style="display: none;" class="hover">
		<div class="arrow">
			<img src="img/hover_arrow.png"/>
		</div>
	</div>
</section>
<div class='clearfix'></div>
<section style="display:none" id="koushien_second_round" class="clearfix" >
	<h2 id="top-8-move">2. Choose the best 4 teams of the tournament.</h2>
	<div class="left_four"></div>
	<?= $this -> element('sns_bet_index'); ?>
	<div class="right_four"></div>
</section>
<section style="display:none" id="koushien_third_round" class="clearfix" >
	<h2 id="top-4-move">3. Choose the champion team of the tournament.</h2>
	<div class="left_four"></div>
	<?= $this -> element('sns_bet_index'); ?>
	<div class="right_four"></div>
</section>
<div class='clearfix'></div>
<section id="champion" >
	<div class="champion_selected"></div>
</section>
<div class='clearfix'></div>
</div>
