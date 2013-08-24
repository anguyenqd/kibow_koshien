<div id="blog">
<div class="blog_list">
<ul>
	<?php foreach ($blogs as $blog) { 
		$indexName = 'blogs';
		if(!isset($blog['blogs']))
		{
			$indexName = 'Blog';
		}
		?>
		<li>
			<div class="blog_title"><?=$this -> Html -> link($blog[$indexName]['blog_title'], array('action' => 'detail', $blog[$indexName]['blog_id'], Inflector::slug($blog[$indexName]['blog_title'], '-'))) ?></div>
			<div class="blog_content"><?=$blog[$indexName]['blog_short_content'] ?></div>
		</li>
		
	<?} ?>
</ul>
</div>
<div class="blog_search">
	<div class="section">
		<div class="blog_search_title"></div>
		
		<div class="blog_search_list">
			<ul>
				<?php foreach ($dateList as $date) {?>
					<li><a href="#"><?=$this->Html->link($date[0]['date'] . "(".$date[0]['post_count'].")", array('action' => 'index', 'date', $date[0]['month'], $date[0]['year']))?></a></li>
				<?php }?>
			</ul>
		</div>
	</div>
	<div class="section">
		<div class="blog_search_title"></div>
		
		<div class="blog_search_list">
			<ul>
				<?php foreach ($categoryList as $category) {?>
					<li><a href="#"><?=$this->Html->link($category['blog_categories']['category_name'] . "(".$category[0]['post_count'].")", array('action' => 'index', 'category', $category['blog_categories']['category_id']))?></a></li>
				<?php }?>
			</ul>
		</div>
	</div>
</div>
</div>

<div class="clearfix"></div>