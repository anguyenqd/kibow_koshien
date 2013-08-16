<?php $this->assign('breadcrumbs', $this->element('breadcrumbs', array('list'=>array(
    'Movie' => array()
)))) ?>
<h1 class="heading">Movies</h1>
<section id="movie_page">
  <h1>Find your favorite Koshien video</h1>
  <form id="movie_form" method="get" name="movieform">
    Sorted by: <select name="moviecategory" onchange="this.form.submit()">
      <option value="">All</option>
      <?php
      foreach ($categories as $category)
      {
        $cat = $category['MovieCategory'];
        ?>
        <option value="<?php echo $cat['id']; ?>"<?php if(isset($cur_category) && $cur_category == $cat['id']) echo ' selected="selected"'; ?>><?php echo $cat['title']; ?></option>
        <?php 
      } 
      ?>
    </select>
  </form>
  <div class="background_image">
    <?= $this->Html->image("stadium.png",array("width"=>940)) ?>
  </div>
  <div class="movie_container">
    <?php
      foreach ($movies as $movie)
      {
        $mo = $movie['Movie'];
        ?>
        <div class="movie">
          <div data-video-id="<?php echo $mo['youtube_id']; ?>" data-video-desc="<?php echo $mo['description']; ?>" class="movie_img video_popup">
            <?= $this->Html->image($mo['image'], array("width"=>195)) ?>
          </div>
          <div class="movie_title">
            <?php echo $mo['title']; ?>
          </div>
        </div>
        <?php 
      } 
      ?>
  </div>
</section>