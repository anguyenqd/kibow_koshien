<div id="logo">
	<a href="<?=BASE_URL ?>"> <?=$this -> Html -> image('logo.png') ?></a>
</div>
<ul id="main_nav">
	<li>
		<a href="<?=BASE_URL ?>">Home</a>
	</li>
</ul>
<ul id="main_sns">
	<li>
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=537593262973234";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
		<div class="fb-like" data-href="http://kibow.info" data-width="330" data-show-faces="false" data-send="false"></div>
	</li>
	<li>
		<a href="https://twitter.com/share" class="twitter-share-button" data-related="BaseballKibow" data-via="BaseballKibow" data-url="<?=BASE_URL?>">Tweet</a>
		<script>
			! function(d, s, id) {
				var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
				if (!d.getElementById(id)) {
					js = d.createElement(s);
					js.id = id;
					js.src = p + '://platform.twitter.com/widgets.js';
					fjs.parentNode.insertBefore(js, fjs);
				}
			}(document, 'script', 'twitter-wjs');
		</script>
	</li>
	<li>
		<a href="https://twitter.com/baseballkibow" class="twitter-follow-button" data-show-count="false" data-lang="en">Follow</a>
	</li>
</ul>