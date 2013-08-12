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

$title_for_layout = 'Summer Koushien Betting';
?>
<!DOCTYPE html>
<html>
	<head>
		<?php echo $this -> Html -> charset();
		echo $this -> Html -> meta('keywords', 'Koushien Japanese High School Baseball Championship Betting');
		echo $this -> Html -> meta('description', 'This Summer is hotter with the Koushien Japanese High School Baseball Championship. Who will be the champion this year? Choose your best team and join the betting now! Sign up with your third party account.');
	?>
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
	<meta property="og:title" content="Summer Koshien Betting" />
	<meta property="og:description" content="This Summer is hotter with the Koushien Japanese High School Baseball Championship. Who will be the champion this year? Choose your best team and join the betting now! Sign up with your third party account." />
	<meta property="og:image" content="<?=BASE_URL ?>img/Koshien_OGP_1.png" />
	<meta property="og:type" content="website" /><meta property="og:url" content="<?=BASE_URL ?>" />
	<meta property="og:site_name" content="Koshien" /><meta property="fb:app_id" content="537593262973234" />
	<meta name="twitter:card" content="summary">
	<meta name="twitter:site" content="@BaseballKibow">
	<meta name="twitter:title" content="Summer Koshien Betting">
	<meta name="twitter:description" content="This Summer is hotter with the Koshien Japanese High School Baseball Championship. Who will be the champion this year? Choose your best team and join the betting now! Sign up with your third party account.">
	<meta name="twitter:creator" content="@BaseballKibow">
	<meta name="twitter:image:src" content="http://kibow.info/img/Koshien_OGP_1.png">
	<meta name="twitter:domain" content="kibow.info">
		<title><?php
		echo $title_for_layout;
	?></title><?php
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
	<body class="<?= $this->action; ?>">
		<script>
			$(document).ready(function(){
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
			<div id="main_visual">
			  <?= $this -> element('main_banner'); ?>
			</div>
			<div class="wrapper">
				<div class="inner_wrapper">
				  <?php 
				    if($this->name == "Users"){
				      echo $this -> element('main_banner_2');
				    } else if($this->name == "Schools"){
				      echo $this -> element('main_banner_schools');
				    } else {
				      echo $this -> element('main_banner');
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
