<?php
echo $this -> Form -> create('Match');
$options = array($match_data['m']['team_1_id'] => $match_data['team_1']['team_1_name'], $match_data['m']['team_2_id'] => $match_data['team_2']['team_2_name'], null => 'Waiting');
$attributes = array('legend' => false, 'value' => $match_data['m']['winning_team_id']);
echo $this -> Form -> radio('winning_team_id', $options, $attributes);
echo $this -> Form -> end('Update');
?>