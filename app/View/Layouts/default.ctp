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

?>
<!DOCTYPE html>
<html>
	<head>
		
	<script type="text/javascript">
		var fb_param = {};
		fb_param.pixel_id = '6008060814667';
		fb_param.value = '0.00';
		fb_param.currency = 'USD';
		(function(){
		  var fpw = document.createElement('script');
		  fpw.async = true;
		  fpw.src = '//connect.facebook.net/en_US/fp.js';
		  var ref = document.getElementsByTagName('script')[0];
		  ref.parentNode.insertBefore(fpw, ref);
		})();
		</script>
		<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/offsite_event.php?id=6008060814667&amp;value=0&amp;currency=USD" /></noscript>
	<?=$this->element('head_tag');?>
	
		<?php
	echo $this -> Html -> meta('icon');
	//echo $this->Html->css('/admin/css/style');
	//echo $this->Html->css('/admin/css/_reset');
	echo $this -> Html -> css('koushien');
	echo $this -> Html -> script('http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js');
  echo $this -> Html -> script('jquery.carouFredSel-6.2.1-packed');
	echo $this -> Html -> script('script');
	echo $this -> Html -> script('oauthpopup');
	echo $this -> Html -> script('bet');
	//echo $this->fetch('meta');
	//echo $this->fetch('css');
	//echo $this->fetch('script');
			?>
			<!--[if lt IE]>
				document.createElement('header');
			  	document.createElement('section');
			  	document.createElement('article');
			  	document.createElement('aside');
			  	document.createElement('nav');
			  	document.createElement('footer');
			 <![endif]-->
	</head>
	<body class="page<?= ' ' . $this->name; ?><?= ' ' . $this->action; ?>">
		<script>
			$(document).ready(function(){
				$('#facebook_signup').click(function(e){
				$.oauthpopup({
					path: '<?=BASE_URL ?>facebook_cps/login',
							width:600,
							height:300,
							callback: function(){
							//window.location.reload();
							window.location.href = '<?=BASE_URL ?>Users/thank_you';
						}
					});
				e.preventDefault();
				});
				$('#twitter_signup').click(function(e){
				$.oauthpopup({
					path: '<?=BASE_URL ?>Users/auth_login/twitter',
							width:600,
							height:300,
							callback: function(){
							//window.location.reload();
							window.location.href = '<?=BASE_URL ?>Users/thank_you';
						}
					});
				e.preventDefault();
				});
			$('#facebook').click(function(e){
				$.oauthpopup({
					path: '<?=BASE_URL ?>facebook_cps/login',
							width:600,
							height:300,
							callback: function(){
							//window.location.reload();
							if($('#bet-form').length > 0)
							{
								$('#bet-form').submit();
							}
							else
							  window.location.href = '<?=BASE_URL ?>Users';
						}
					});
				e.preventDefault();
				});
			$('#twitter').click(function(e){
				$.oauthpopup({
					path: '<?=BASE_URL ?>Users/auth_login/twitter',
							width:600,
							height:300,
							callback: function(){
							//window.location.reload();
							if($('#bet-form').length > 0)
								$('#bet-form').submit();
							else
							  window.location.href = '<?=BASE_URL ?>Users';
						}
					});
				e.preventDefault();
				});
				
				});

				var _gaq = _gaq || [];
				_gaq.push(['_setAccount', 'UA-42067085-2']);
				_gaq.push(['_trackPageview']);

				(function() {
				var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
				})();
		</script>
		<div id="main_wrapper">
		  <div id="user_menu">
			  <?= $this -> element('user_navi'); ?>
			</div>
			<header>
				<?= $this -> element('header'); ?>
			</header>
			<?php if($this->name == 'Bets' && $this->action == 'index'){?>
			<div id="main_visual">
			  <?= $this -> element('main_banner'); ?>
			</div>
			<?php }?>
			<div class="wrapper">
				<div class="inner_wrapper">
				  <?php 
				    if($this->name == "Users"){
				      //echo $this -> element('main_banner_2');
				    } else if($this->name == "Schools"){
				      echo $this -> element('main_banner_schools');
				    } else if($this->name == 'Informations'){
				      echo $this -> element('main_banner_2');
				    } else if($this->name == 'Bets' && $this->action != 'index'){
				      echo $this -> element('main_banner_2');
				    }
				  ?>
					<?= $this->fetch('breadcrumbs')?>
					<?php echo $this -> fetch('content'); ?>
				</div>
			</div>
			<footer>
				<div class="footer-content">
					<?= $this -> element('footer'); ?>
				</div>
			</footer>
			<?php //echo $this->element('sql_dump'); ?>
	</body>
</html>
