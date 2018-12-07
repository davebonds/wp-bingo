<?php
	/**
	 * Template Name: Bingo - Basic
	 * Template Post Type: page
	 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">

		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>
		<title>#WCUS BINGO</title>
		<link rel="dns-prefetch" href="//fonts.googleapis.com">
		<link rel="dns-prefetch" href="//s.w.org">
		<link href="https://fonts.gstatic.com" crossorigin="" rel="preconnect">
		<link rel="canonical" href="https://wcusbingo.com/">
		<link rel="shortlink" href="https://wcusbingo.com/">

		<link rel="icon" href="https://wcusbingo.com/wp-content/uploads/2018/12/cropped-WordPress-logotype-wmark-32x32.png" sizes="32x32">
		<link rel="icon" href="https://wcusbingo.com/wp-content/uploads/2018/12/cropped-WordPress-logotype-wmark-192x192.png" sizes="192x192">
		<link rel="apple-touch-icon-precomposed" href="https://wcusbingo.com/wp-content/uploads/2018/12/cropped-WordPress-logotype-wmark-180x180.png">
		<meta name="msapplication-TileImage" content="https://wcusbingo.com/wp-content/	uploads/2018/12/cropped-WordPress-logotype-wmark-270x270.png">

		<link rel="stylesheet" id="dashicons-css" href="https://wcusbingo.com/wp-includes/css/dashicons.css?ver=5.0" type="text/css" media="all">

		<script>
			window.onload = window.localStorage.clear();
		</script>

		<link rel="stylesheet" href="<?php echo plugin_dir_url( dirname( __FILE__ ) ); ?>css/wp-bingo.min.css">
		<?php
		// @TODO: Use this hook.
		do_action('wb-simple-header') ?>
	</head>
	<body class="wp-bingo layout-simple">
		<div class="wrapper">

			<h1><?php the_title(); ?></h1>

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<div class="description"><?php the_content(); ?></div>
			<?php endwhile; endif; ?>

			<?php echo do_shortcode('[wp_bingo]'); ?>

		</div>

		<script src="<?php echo plugin_dir_url( dirname( __FILE__ ) ); ?>js/wp-bingo.min.js"></script>
		<?php
		// @TODO: Use this hook.
		do_action('wb-simple-footer') ?>

		<div class="wcus-share">
			<a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-size="large" data-text="I won #WCUS BINGO!" data-url="https://wcusbingo.com" data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

			<a class="github-button" href="https://github.com/davebonds/wp-bingo" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star davebonds/wp-bingo on GitHub">Star</a>

			<a class="refresh" value="New Game!" onClick="window.location.reload()" href="#">New Game! <span class="dashicons dashicons-update"></span></a>
		</div>
		
	</body>
	<?php get_footer(); ?>
</html>
