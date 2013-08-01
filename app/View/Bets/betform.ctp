<form name="bet-form" method="post">
	<div>8 school</div>
	<?php foreach ($school8List as $school) { //list 8 school
			if($school != null){
		?>
	<div>School : <?=$school['School']['school_name'] ?></div>
	<input name='data[8school][<?=$school['School']['school_id'] ?>]' value='0' type='text' /><?=$school['School']['odds'] ?>
	<?php }} ?>
	<br/>
	<div>4 school</div>
	<?php foreach ($school4List as $school) {//list 4 school
			if($school != null){
		?>
	<div>School : <?=$school['School']['school_name'] ?></div>
	<input name='data[4school][<?=$school['School']['school_id'] ?>]' value='0' type='text' /><?=$school['School']['odds'] ?>
	<?php }} ?>
	<br/>
	<div>1 school</div>
	<?php if($finalSchool != null) {?>
	<div>School : <?=$finalSchool['School']['school_name'] ?></div>
	<input name='data[finalSchool][<?=$finalSchool['School']['school_id'] ?>]' value='0' type='text' /><?=$finalSchool['School']['odds'] ?>
	<?php } ?>
	<input name="step" type="hidden" value="2" />
	<input name='submitform' value="Place bet" type="submit" />
</form>