<?php
/**
 * The template for displaying the header
 *
 * @package WordPress
 * @subpackage akad
 * @since akad 1.0
 */
?>
<!doctype html>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title('«', true, 'right'); ?> <?php bloginfo('name'); ?></title>
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!-- HEADER  -->
	<header class="main-header">
		<div class="container">
			<div class="logo">
				<a href="/">
					<img src="<?= get_template_directory_uri ();?>/dist/images/logo.png" alt="logo">
				</a>
			</div>
			<div class="menu">
				<!-- desktop navbar -->
				<nav class="desktop-nav">
					<?php wp_nav_menu(array('theme_location' => 'main', 'container' => '', 'menu_id' => 'top-menu', 'menu_class' => 'first-level')); ?>	
				</nav>
				<!-- mobile navbar -->
				<nav class="mobile-nav"></nav>
				<div class="menu-icon">
					<div class="line"></div>
					<div class="line"></div>
					<div class="line"></div>
				</div>
			</div>
		</div>
	</header>