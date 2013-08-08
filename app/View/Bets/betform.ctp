<?php $this->assign('breadcrumbs', $this->element('breadcrumbs', array('list'=>array(
    'Bet form' => '',
)))) ?>
<form name="bet-form" id="bet-form" method="post" id="form_submit">
	<input name="step" type="hidden" value="2" />
	<?php if($finalSchool != null) {?>
	<section id="champion_place_bet">
		<h2>Your bet</h2>
		<div class="crown">
			<?=$this -> Html -> image('vs.png') ?>
		</div>
		<div class="champion_school">
			<?=$this -> Html -> image('crown_1.png') ?>
			<?=$this -> Html -> image($finalSchool[0]['schools']['logo_url'], array('class' => 'champion_image')) ?>
		</div>
		<div class="school">
			<div class="school_name">
				<?=$finalSchool[0]['schools']['school_name'] ?>
			</div>
			<div class="school_address">
				<?=$finalSchool[0]['schools']['address'] ?>
			</div>
			<div class="odd_vote">
				<?=$this -> Html -> image('odd_vote.png') ?>
				<span class="odd_number"><?=$finalSchool[0]['schools']['odds_top1'] ?></span>
				<span class="vote_number"><?=$finalSchool[0][0]['count_school'] ?></span>
			</div>
			
			<div class="stake">
				Stakes
				<input type="text" value="0" size="3" id="bet_amount" name='data[finalSchool][<?=$finalSchool[0]['schools']['school_id'] ?>]'/>
				z
				<input type="hidden" class="previous_bet" value="0"/>
			</div>
			<div class="return_number_wrap">Return <span class="return_number_each">0</span> Zenny</div>
			<div class="btn_place_bet"><a id="btn_blace_bet" href="javascript:void(0)"><?=$this -> Html -> image('btn_place_bet.png') ?></a></div>
		</div>
	</section>
	<?php } ?>
	<section class="initial_deposit">
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
	<?php 
	if($school4List != null) {?>
	<section id="best_four_scholl" class="clearfix" >
		<h2>Top 4 schools</h2>
		<div class="left_four">
			<?php 
			$i = 1;
			foreach ($school4List as $school) {//list 4 school
			if($school != null && $i < 3){?>
			<div class="school">
				<div class="school_uniform" data-map="<?=BASE_URL . DS . 'img' . DS . $school[0]['schools']['map_img_url'] ?>" >
					<?=$this -> Html -> image($school[0]['schools']['logo_url'], array('width' => 118, 'class' => 'uniform_image')) ?>
					<?=$this -> Html -> image($school[0]['schools']['background_url'], array('width' => 172, 'class' => 'background_uniform')) ?>
				</div>
				<div class="school_name">
					<?=$school[0]['schools']['school_name'] ?>
				</div>
				<div class="school_address">
					<?=$school[0]['schools']['address'] ?>
				</div>
				<div class="odd_vote">
					<?=$this -> Html -> image('odd_vote.png') ?>
					<span class="odd_number"><?=$school[0]['schools']['odds_top4'] ?></span>
					<span class="vote_number"><?=$school[0][0]['count_school'] ?></span>
				</div>
				<div class="stake">
					Stakes
					<input type="text" value="0" size="3" id="bet_amount" name='data[4school][<?=$school[0]['schools']['school_id'] ?>]'/>
					z
					<input type="hidden" class="previous_bet" value="0"/>
				</div>
				<div class="return_number_wrap">Return <span class="return_number_each">0</span> Zenny</div>
				<div class="btn_place_bet"><a id="btn_blace_bet" href="javascript:void(0)"><?=$this -> Html -> image('btn_place_bet.png') ?></a></div>
			</div>
			<?php
			}$i++;}
 ?>
		</div>
		<div class="right_four">
			<?php 
			$i = 1;
			foreach ($school4List as $school) {//list 4 school
			if($school != null && $i > 2){?>
			<div class="school">
				<div class="school_uniform" data-map="<?=BASE_URL . DS . 'img' . DS . $school[0]['schools']['map_img_url'] ?>" >
					<?=$this -> Html -> image($school[0]['schools']['logo_url'], array('width' => 118, 'class' => 'uniform_image')) ?>
					<?=$this -> Html -> image($school[0]['schools']['background_url'], array('width' => 172, 'class' => 'background_uniform')) ?>
				</div>
				<div class="school_name">
					<?=$school[0]['schools']['school_name'] ?>
				</div>
				<div class="school_address">
					<?=$school[0]['schools']['address'] ?>
				</div>
				<div class="odd_vote">
					<?=$this -> Html -> image('odd_vote.png') ?>
					<span class="odd_number"><?=$school[0]['schools']['odds_top4'] ?></span>
					<span class="vote_number"><?=$school[0][0]['count_school'] ?></span>
				</div>
				<div class="stake">
					Stakes
					<input type="text" value="0" size="3" id="bet_amount" name='data[4school][<?=$school[0]['schools']['school_id'] ?>]'/>
					z
					<input type="hidden" class="previous_bet" value="0"/>
				</div>
				<div class="return_number_wrap">Return <span class="return_number_each">0</span> Zenny</div>
				<div class="btn_place_bet"><a id="btn_blace_bet" href="javascript:void(0)"><?=$this -> Html -> image('btn_place_bet.png') ?></a></div>
			</div>
			<?php
			}$i++;}
 ?>
		</div>
	</section>
	<?php
	}
	if($school8List != null) {
?>
	<section id="best_eight_scholl" class="clearfix" >
		<h2>Top 8 schools</h2>
		<div class="left_four">
			<?php 
			$i = 1;
			foreach ($school8List as $school) {//list 4 school
			if($school != null && $i < 5){?>
			<div class="school">
				<div class="school_uniform" data-map="<?=BASE_URL . DS . 'img' . DS . $school[0]['schools']['map_img_url'] ?>" >
					<?=$this -> Html -> image($school[0]['schools']['logo_url'], array('width' => 118, 'class' => 'uniform_image')) ?>
					<?=$this -> Html -> image($school[0]['schools']['background_url'], array('width' => 172, 'class' => 'background_uniform')) ?>
				</div>
				<div class="school_name">
					<?=$school[0]['schools']['school_name'] ?>
				</div>
				<div class="school_address">
					<?=$school[0]['schools']['address'] ?>
				</div>
				<div class="odd_vote">
					<?=$this -> Html -> image('odd_vote.png') ?>
					<span class="odd_number"><?=$school[0]['schools']['odds_top4'] ?></span>
					<span class="vote_number"><?=$school[0][0]['count_school'] ?></span>
				</div>
				<div class="stake">
					Stakes
					<input type="text" value="0" size="3" id="bet_amount" name='data[4school][<?=$school[0]['schools']['school_id'] ?>]'/>
					z
					<input type="hidden" class="previous_bet" value="0"/>
				</div>
				<div class="return_number_wrap">Return <span class="return_number_each">0</span> Zenny</div>
				<div class="btn_place_bet"><a id="btn_blace_bet" href="javascript:void(0)"><?=$this -> Html -> image('btn_place_bet.png') ?></a></div>
			</div>
			<?php
			}$i++;}
 ?>
			
		</div>
		<div class="right_four">
			<?php 
			$i = 1;
			foreach ($school8List as $school) {//list 4 school
			if($school != null && $i > 4){?>
			<div class="school">
				<div class="school_uniform" data-map="<?=BASE_URL . DS . 'img' . DS . $school[0]['schools']['map_img_url'] ?>" >
					<?=$this -> Html -> image($school[0]['schools']['logo_url'], array('width' => 118, 'class' => 'uniform_image')) ?>
					<?=$this -> Html -> image($school[0]['schools']['background_url'], array('width' => 172, 'class' => 'background_uniform')) ?>
				</div>
				<div class="school_name">
					<?=$school[0]['schools']['school_name'] ?>
				</div>
				<div class="school_address">
					<?=$school[0]['schools']['address'] ?>
				</div>
				<div class="odd_vote">
					<?=$this -> Html -> image('odd_vote.png') ?>
					<span class="odd_number"><?=$school[0]['schools']['odds_top4'] ?></span>
					<span class="vote_number"><?=$school[0][0]['count_school'] ?></span>
				</div>
				<div class="stake">
					Stakes
					<input type="text" value="0" size="3" id="bet_amount" name='data[4school][<?=$school[0]['schools']['school_id'] ?>]'/>
					z
					<input type="hidden" class="previous_bet" value="0"/>
				</div>
				<div class="return_number_wrap">Return <span class="return_number_each">0</span> Zenny</div>
				<div class="btn_place_bet"><a id="btn_blace_bet" href="javascript:void(0)"><?=$this -> Html -> image('btn_place_bet.png') ?></a></div>
			</div>
			<?php
			}$i++;}
 ?>
			
		</div>
	</section>
	<?php } ?>
	<?php 
	$btnConfirmText = 'Confirm your bet';
	if(!$this->Session->check('User')){
		$btnConfirmText = 'Sign up with facebook';
		?>
		<div class="confirm_text">If you want to save your bet data, please Sign up with your third-party service accounts.</div>
		<?php } ?>
	<div class="confirm_chosen_school" id="facebook">
		<?=$btnConfirmText?>
	</div>
</form>