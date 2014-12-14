
<body>
<?php include "../shared/_Template.php"  ?>
<link rel="stylesheet" href="../../content/css/CSS.css">
<div class = "container-content">
<header>
	
	<div class="container">
		<h1 style = "text-align: center;">Share your stories!</h1>
	</div>
</header>

<div class="container"  ng-app="app" ng-controller='index' >
	<div class = "row">
		<div class = "col-md-8"></div>
		<a class="twitter-timeline" href="https://twitter.com/Healthman_21" data-widget-id="543561576855658496">Tweets by @Healthman_21</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	</div>
	</div>
    <div class = "row">
		<div class = "col-md-8">
			<div class="fb-comments" data-href="<?php the_permalink() ?>" data-num-posts="2" data-width="470" data-colorscheme="light" data-mobile="false"></div>
				<?php echo full_comment_count(); ?>
				<?php
				function full_comment_count() {
				global $post;
				$url = get_permalink($post->ID);
				 
				$filecontent = file_get_contents('https://graph.facebook.com/?ids=' . $url);
				$json = json_decode($filecontent);
				$count = $json->$url->comments;
				$wpCount = get_comments_number();
				$realCount = $count + $wpCount;
				if ($realCount == 0 || !isset($realCount)) {
				    $realCount = 0;
				}
				return $realCount;
				}
				?>
		</div>
	</div>
</div>
			
			
</body>			
	
		<script type="text/javascript">
			
		
		</script>
