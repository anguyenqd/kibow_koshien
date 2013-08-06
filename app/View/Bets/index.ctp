<?= $this->element('guide');?>
<section id="koushien_first_round">
	<h2>Choose the best 8 schools</h2>
	<?php foreach ($schools as $school) {?>
	<div class="school">
		<div class="school_uniform" data-map="<?=$_SERVER['REQUEST_URI'].DS.'img'.DS.$school['schools']['map_img_url']?>" >
			<?=$this->html->image($school['schools']['logo_url'], array('width' => 118, 'class' => 'uniform_image'))?>
			<?=$this->html->image($school['schools']['background_url'], array('width' => 172, 'class' => 'background_uniform'))?>
			<a class="select_button" onclick="return false;" data-selected="false" data-school-id="<?=$school['schools']['SI']?>" >Select</a>
			<a data-video-id="<?=$school['schools']['video_url']?>" class="video_button">Watch Video</a>
			<a class="deselect_button" data-school-id="<?=$school['schools']['SI']?>">Deselect</a>
		</div>
		<div class="school_name">
			<?=$school['schools']['school_name']?>
		</div>
		<div class="school_address">
			<?=$school['schools']['address']?>
		</div>
		<div class="odd_vote">
			<img src="img/odd_vote.png" />
			<span class="odd_number"><?=$school['schools']['odds_top8']?></span>
			<span class="vote_number"><?=$school['0']['count_school']?></span>
		</div>
	</div>
	<?php }?>
	<div style="display: none;" class="hover">
		<div class="arrow">
			<img src="img/hover_arrow.png"/>
		</div>
	</div>
</section>

<section style="display:none" id="koushien_second_round" class="clearfix" >
	<h2>Choose the best 4 schools</h2>
	<div class="left_four"></div>
	<div class="right_four"></div>
</section>
<section style="display:none" id="koushien_third_round" class="clearfix" >
	<h2>Choose the champion schools</h2>
	<div class="left_four"></div>
	<div class="right_four"></div>
</section>
<section id="champion" >
	<div class="champion_selected"></div>
</section>
<div style="display:none" class="confirm_chosen_school">
	Confirm The Chosen Schools
</div>
</div>
<form id="form_submit" method="post" action="<?=$this->name.'/betform'?>">
	<input name="first-section[]" class="first_round" type="hidden" value="0" />
	<input name="first-section[]" class="first_round" type="hidden" value="0" />
	<input name="first-section[]" class="first_round" type="hidden" value="0" />
	<input name="first-section[]" class="first_round" type="hidden" value="0" />
	<input name="first-section[]" class="first_round" type="hidden" value="0" />
	<input name="first-section[]" class="first_round" type="hidden" value="0" />
	<input name="first-section[]" class="first_round" type="hidden" value="0" />
	<input name="first-section[]" class="first_round" type="hidden" value="0" />

	<input name="second-section[]" class="second_round" type="hidden" value="0" />
	<input name="second-section[]" class="second_round" type="hidden" value="0" />
	<input name="second-section[]" class="second_round" type="hidden" value="0" />
	<input name="second-section[]" class="second_round" type="hidden" value="0" />

	<input name="thirt-section" class="champion" type="hidden" value="0" />
</form>