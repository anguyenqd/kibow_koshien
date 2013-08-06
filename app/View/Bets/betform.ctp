<form name="bet-form" method="post" id="form_submit">
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
				<span class="odd_number"><?=$finalSchool[0]['schools']['odds'] ?></span>
				<span class="vote_number"><?=$finalSchool[0][0]['count_school'] ?></span>
			</div>
			<div class="stake">
				Stakes
				<input type="text" value="0" size="3" name='data[finalSchool][<?=$finalSchool[0]['schools']['school_id'] ?>]'/>
				z
			</div>
		</div>
	</section>
	<?php } ?>
	<section class="initial_deposit">
		<h2>Initial Deposit <span class="balance_number">1000</span> zenny</h2>
		<table>
			<tr>
				<td class="left">Balance</td>
				<td class="right"><?=$this->Session->read('User')['User']['balance']?> Zenny</td>
			</tr>
			<tr style="display:none">
				<td class="left">Return</td>
				<td class="right">1000 zenny</td>
			</tr>
		</table>
	</section>
	<?php 
	if($school4List != null) {?>
	<section id="best_four_scholl" class="clearfix" >
		<h2>Best 4 schools</h2>
		<div class="left_four">
			<?php 
			$i = 1;
			foreach ($school4List as $school) {//list 4 school
			if($school != null && $i < 3){?>
			<div class="school">
				<div class="school_uniform" data-map="<?=$_SERVER['REQUEST_URI'] . DS . 'img' . DS . $school[0]['schools']['map_img_url'] ?>" >
					<?=$this -> html -> image($school[0]['schools']['logo_url'], array('width' => 118, 'class' => 'uniform_image')) ?>
					<?=$this -> html -> image($school[0]['schools']['background_url'], array('width' => 172, 'class' => 'background_uniform')) ?>
				</div>
				<div class="school_name">
					<?=$school[0]['schools']['school_name'] ?>
				</div>
				<div class="school_address">
					<?=$school[0]['schools']['address'] ?>
				</div>
				<div class="odd_vote">
					<?=$this -> Html -> image('odd_vote.png') ?>
					<span class="odd_number"><?=$school[0]['schools']['odds'] ?></span>
					<span class="vote_number"><?=$school[0][0]['count_school'] ?></span>
				</div>
				<div class="stake">
					Stakes
					<input type="text" value="0" size="3" name='data[4school][<?=$school[0]['schools']['school_id'] ?>]'/>
					z
				</div>
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
				<div class="school_uniform" data-map="<?=$_SERVER['REQUEST_URI'] . DS . 'img' . DS . $school[0]['schools']['map_img_url'] ?>" >
					<?=$this -> html -> image($school[0]['schools']['logo_url'], array('width' => 118, 'class' => 'uniform_image')) ?>
					<?=$this -> html -> image($school[0]['schools']['background_url'], array('width' => 172, 'class' => 'background_uniform')) ?>
				</div>
				<div class="school_name">
					<?=$school[0]['schools']['school_name'] ?>
				</div>
				<div class="school_address">
					<?=$school[0]['schools']['address'] ?>
				</div>
				<div class="odd_vote">
					<?=$this -> Html -> image('odd_vote.png') ?>
					<span class="odd_number"><?=$school[0]['schools']['odds'] ?></span>
					<span class="vote_number"><?=$school[0][0]['count_school'] ?></span>
				</div>
				<div class="stake">
					Stakes
					<input type="text" value="0" size="3" name='data[4school][<?=$school[0]['schools']['school_id'] ?>]'/>
					z
				</div>
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
		<h2>Best 8 schools</h2>
		<div class="left_four">
			<?php 
			$i = 1;
			foreach ($school8List as $school) {//list 4 school
			if($school != null && $i < 5){?>
			<div class="school">
				<div class="school_uniform" data-map="<?=$_SERVER['REQUEST_URI'] . DS . 'img' . DS . $school[0]['schools']['map_img_url'] ?>" >
					<?=$this -> html -> image($school[0]['schools']['logo_url'], array('width' => 118, 'class' => 'uniform_image')) ?>
					<?=$this -> html -> image($school[0]['schools']['background_url'], array('width' => 172, 'class' => 'background_uniform')) ?>
				</div>
				<div class="school_name">
					<?=$school[0]['schools']['school_name'] ?>
				</div>
				<div class="school_address">
					<?=$school[0]['schools']['address'] ?>
				</div>
				<div class="odd_vote">
					<?=$this -> Html -> image('odd_vote.png') ?>
					<span class="odd_number"><?=$school[0]['schools']['odds'] ?></span>
					<span class="vote_number"><?=$school[0][0]['count_school'] ?></span>
				</div>
				<div class="stake">
					Stakes
					<input type="text" value="0" size="3" name='data[8school][<?=$school[0]['schools']['school_id'] ?>]'/>
					z
				</div>
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
				<div class="school_uniform" data-map="<?=$_SERVER['REQUEST_URI'] . DS . 'img' . DS . $school[0]['schools']['map_img_url'] ?>" >
					<?=$this -> html -> image($school[0]['schools']['logo_url'], array('width' => 118, 'class' => 'uniform_image')) ?>
					<?=$this -> html -> image($school[0]['schools']['background_url'], array('width' => 172, 'class' => 'background_uniform')) ?>
				</div>
				<div class="school_name">
					<?=$school[0]['schools']['school_name'] ?>
				</div>
				<div class="school_address">
					<?=$school[0]['schools']['address'] ?>
				</div>
				<div class="odd_vote">
					<?=$this -> Html -> image('odd_vote.png') ?>
					<span class="odd_number"><?=$school[0]['schools']['odds'] ?></span>
					<span class="vote_number"><?=$school[0][0]['count_school'] ?></span>
				</div>
				<div class="stake">
					Stakes
					<input type="text" value="0" size="3" name='data[8school][<?=$school[0]['schools']['school_id'] ?>]'/>
					z
				</div>
			</div>
			<?php
			}$i++;}
 ?>
			
		</div>
	</section>
	<?php } ?>
	<div class="confirm_chosen_school">
		Confirm The Chosen Schools
	</div>
</form>