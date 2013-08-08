<?php $this->assign('breadcrumbs', $this->element('breadcrumbs', array('list'=>array(
    'User' => array('controller' => 'Users', 'action' => 'index'), 'Login' => ''
)))) ?>
<div style="text-align:center">
<p style="font-size:20px;padding:30px 0px 30px 0px">Please login with your SNS account</p>
<p style="padding-bottom: 30px"><?php
echo $this -> Html -> image('facebook_login.png', array('id' => 'facebook', 'style' => 'cursor:pointer;'));
?></p>
<p><?php
echo $this -> Html -> image('twitter_login.png', array('id' => 'twitter', 'style' => 'cursor:pointer;'));
?></p>
</div>