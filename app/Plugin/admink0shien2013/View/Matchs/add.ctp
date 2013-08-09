<?php
echo $this -> Form -> create('Match');
echo $this -> Form -> label('team_1_id');
echo $this -> Form -> select('team_1_id', $schools);
echo $this -> Form -> input('team_1_odd', array('default' => 0));
echo $this -> Form -> input('description_1');
echo "<br/>";
echo $this -> Form -> label('team_2_id');
echo $this -> Form -> select('team_2_id', $schools);
echo $this -> Form -> input('team_2_odd', array('default' => 0));
echo $this -> Form -> input('description_2');
echo "<br/>";
echo $this -> Form -> label('match_date');
echo $this -> Form -> input('day');
echo $this -> Form -> input('month');
echo $this -> Form -> input('year');
echo $this -> Form -> input('hour');
echo $this -> Form -> input('minute');

echo $this -> Form -> end('Add');
?>