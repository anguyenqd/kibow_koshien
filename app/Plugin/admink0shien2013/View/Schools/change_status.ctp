<?php
echo $this -> Form -> create('School');
echo $this -> Form -> select('school_status', $status);
echo $this -> Form -> end('Update');
?>