<?php
echo $this -> Form -> create('School', array('type' => 'file'));
echo $this -> Form -> input('school_name');
echo $this->Form->label('logo_url');
echo $this -> Form -> file('logo_url_file');
echo $this -> Form -> hidden('logo_url');
echo $this->Form->label('map_img_url');
echo $this -> Form -> file('map_img_url_file');
echo $this -> Form -> hidden('map_img_url');
echo $this->Form->label('background_url');
echo $this -> Form -> file('background_url_file');
echo $this -> Form -> hidden('background_url');
echo $this -> Form -> input('video_url');
echo $this -> Form -> input('address');
echo $this -> Form -> input('description');
echo $this -> Form -> input('odds');
echo $this -> Form -> end('Update');
?>