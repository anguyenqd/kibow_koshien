<?php $this->assign('breadcrumbs', $this->element('breadcrumbs', array('list'=>array(
    'User' => array('controller' => 'Users', 'action' => 'index'), 'Sign up' => ''
)))) ?>
<div style="text-align:center">
<p style="font-size:20px;padding:30px 0px 30px 0px">Please Sign up with your SNS account</p>
<p style="padding-bottom: 30px"><?php
echo $this -> Html -> image('facebook_signup.png', array('id' => 'facebook_signup', 'style' => 'cursor:pointer;'));
?></p>
<p><?php
echo $this -> Html -> image('twitter_signup.png', array('id' => 'twitter_signup', 'style' => 'cursor:pointer;'));
?></p>
</div>