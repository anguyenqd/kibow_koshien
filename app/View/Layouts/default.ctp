<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('title', 'Kibow Koshien : Admin site');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		//echo $this->Html->css('/admin/css/style');
		//echo $this->Html->css('/admin/css/_reset');
		echo $this->Html->css('koushien');
		echo $this->Html->script('http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js');
		echo $this->Html->script('script');
		echo $this->Html->script('oauthpopup');
		//echo $this->fetch('meta');
		//echo $this->fetch('css');
		//echo $this->fetch('script');
	?>
</head>
<body>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    
    $(document).ready(function(){
    $('#facebook').click(function(e){
        $.oauthpopup({
            path: '<?=BASE_URL?>facebook_cps/login',
			width:600,
			height:300,
            callback: function(){
                window.location.reload();
            }
        });
		e.preventDefault();
    });
});
    </script>
    <div id="main_wrapper">
      <?= $this->element('user_navi');?>
      <header>
        <?= $this->element('header');?>
      </header>
      <div class="wrapper">
        <div class="inner_wrapper">
          <?= $this->element('main_banner');?>
          <?php echo $this->fetch('content'); ?>
          
      </div>
    </div>
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
