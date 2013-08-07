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
		<div class="fb-like" data-href="http://developers.facebook.com/docs/reference/plugins/like" data-send="false" data-width="300" data-show-faces="false"></div>

	</li>
	<li>
		<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://kibow.sakura.ne.jp/koushien/">Tweet</a>
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
</ul>