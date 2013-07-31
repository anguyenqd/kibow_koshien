<?php foreach ($videos as $title => $link) {
?>
<div id="movie_list">
	<div class="movie">
		<div class="title">
			<?=$title?>
		</div>
		<div class="content">
			<iframe width="420" height="315" src="<?=$link?>" frameborder="0" allowfullscreen></iframe>
		</div>
	</div>
</div>
<?} ?>
