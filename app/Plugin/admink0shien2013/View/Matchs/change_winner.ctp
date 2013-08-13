<?php
echo $this -> Form -> create('Match');
echo $this -> Form -> input('team_1_result', array('default' => $match_data['m']['team_1_result'], 'label' => $match_data['team_1']['team_1_name']));
echo $this -> Form -> input('team_2_result', array('default' => $match_data['m']['team_2_result'], 'label' => $match_data['team_2']['team_2_name']));
echo $this->Form->hidden('team_1_id', array('default' => $match_data['m']['team_1_id']));
echo $this->Form->hidden('team_2_id', array('default' => $match_data['m']['team_2_id']));
echo $this -> Form -> end('Update');
?>