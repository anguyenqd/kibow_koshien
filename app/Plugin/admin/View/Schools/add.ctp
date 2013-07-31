<?php
echo $this -> Form -> create('School', array('type' => 'file'));
echo $this -> Form -> input('school_name');
echo $this->Form->label('logo_url');
echo $this -> Form -> file('logo_url');
echo $this->Form->label('map_img_url');
echo $this -> Form -> file('map_img_url');
echo $this -> Form -> input('description');
echo $this -> Form -> input('odds');
echo $this -> Form -> end('Update');
?>