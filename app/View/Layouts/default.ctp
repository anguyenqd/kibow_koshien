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
		<title><?php
		echo $title_for_layout;
	?></title><?php
	echo $this -> Html -> meta('icon');
	//echo $this->Html->css('/admin/css/style');
	//echo $this->Html->css('/admin/css/_reset');
	echo $this -> Html -> css('koushien');
	echo $this -> Html -> script('http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js');
	echo $this -> Html -> script('script');
	echo $this -> Html -> script('oauthpopup');
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
	<body>
		<div id="fb-root"></div>
		<script>
			(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
			fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));

			$(document).ready(function(){
			$('#facebook').click(function(e){
			$.oauthpopup({
			path: '<?=BASE_URL ?>
				facebook_cps / login',
				width:600,
				height:300,
				callback: function(){
				//window.location.reload();
				$('#bet-form').submit();
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
			<?= $this -> element('user_navi'); ?>
			<header>
				<?= $this -> element('header'); ?>
			</header>
			<div class="wrapper">
				<div class="inner_wrapper">
					<?= $this -> element('main_banner'); ?>
					<?php echo $this -> fetch('content'); ?>
				</div>
			</div>
			<?php //echo $this->element('sql_dump'); ?>
	</body>
</html>
