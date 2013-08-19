<?= $this -> element('guide_2'); ?>
<section id="koushien_third_round">
	<h2 id="first">1. Choose the champion team of the tournament.</h2>
	<?php 
	$i = 1;
	foreach ($schools as $school) {?>
	<div class="school">
		<div class="school_uniform" data-desc="<?= $school['schools']['description'] ?>" data-map="<?=BASE_URL . DS . 'img' . DS . $school['schools']['map_img_url'] ?>" >
			<?=$this -> Html -> image($school['schools']['logo_url'], array('width' => 118, 'class' => 'uniform_image')) ?>
			<?=$this -> Html -> image($school['schools']['background_url'], array('width' => 172, 'class' => 'background_uniform')) ?>
			<a class="select_button" 
			onclick="return false;" 
			data-selected="false" 
			data-top-4="<?= $school['schools']['odds_top4'] ?>" 
			data-top-1="<?= $school['schools']['odds_top1'] ?>"
			data-school-id="<?=$school['schools']['SI'] ?>" >
			Select</a>
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
<section id="champion" >
	<div class="champion_selected"></div>
</section>
<div class='clearfix'></div>
<div style="display:none" class="confirm_chosen_school">
	Go to betslip
</div>
</div>
<form id="form_submit" method="post" action="<?=$this -> name . '/betform' ?>">
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
<div id="user_choice_dashboard" style="display:none">
  <h2>Your choice</h2>
  <div class="top-8">
    <!-- <p><span class="title">Top 8:</span> <span class="total_choices_8">0</span>/8 &nbsp&nbsp&nbsp&nbsp <a href="#first">Go to Top 8</a></p> -->
  </div>
  <div style="display:none" class="top-4">
    <p><span class="title">Top 4:</span> <span class="total_choices_4">0</span>/4 &nbsp&nbsp&nbsp&nbsp <a href="#top-8-move">Go to Top 4</a></p>
  </div>
  <div style="display:none" class="top-1">
    <p><span class="title">Top 1:</span> <span class="total_choices_1">0</span>/1 &nbsp&nbsp&nbsp&nbsp <!-- <a href="#top-4-move">Go to Top 1</a> --></p>
  </div>
  <div style="display:none" class="confirm_chosen_school">
  Go to betslip
</div>
</div>
<div class='clearfix'></div>
