<?php
echo $this -> Form -> create('School', array('type' => 'file'));
echo $this -> Form -> input('school_name');
echo $this -> Form -> label('logo_url');
echo $this -> Form -> file('logo_url');
echo $this -> Form -> label('map_img_url');
echo $this -> Form -> file('map_img_url');
echo $this -> Form -> label('background_url');
echo $this -> Form -> file('background_url');
echo $this -> Form -> label('result_img_url');
echo $this -> Form -> file('result_img_url');
echo $this -> Form -> input('video_url');
echo $this -> Form -> input('address');
echo $this -> Form -> input('description');
echo $this -> Form -> input('odds_top8',array('default' => 0));
echo $this -> Form -> input('odds_top4',array('default' => 0));
echo $this -> Form -> input('odds_top1',array('default' => 0));
echo $this -> Form -> end('Update');
?>