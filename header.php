<?php
/**
 * Header Template
 */
?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php wp_title('&#124;', true, 'right'); ?></title>
	<link href="<?php bloginfo('template_url'); ?>/style.css?ver=2" rel="stylesheet">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_url'); ?>/img/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('template_url'); ?>/img/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo('template_url'); ?>/img/favicon/favicon-16x16.png">
	<link rel="manifest" href="<?php bloginfo('template_url'); ?>/img/favicon/site.webmanifest">
	<link rel="mask-icon" href="<?php bloginfo('template_url'); ?>/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> data-lazybg="<?php bloginfo('template_url'); ?>/img/home/payment/bg.jpg">
<div class="wrapper">
	<header class="header"  data-lazybg="<?php bloginfo('template_url'); ?>/img/home/map/bg.jpg">

		<div class="container header-container">
			<a  href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>" class="header__logo">
				<img src="<?php bloginfo('template_url'); ?>/img/logo/logo.svg" alt="<?php bloginfo('name'); ?>" class="header-top__logo-pc" itemprop="logo" width="272" height="108">
			</a>
			<div class="header-container__cont">
				<?php
				wp_nav_menu( array(
					'theme_location'  => 'main-nav',
					'menu_class'      => 'main-nav__list',
					'echo'            => true,
					'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					'depth'           => 0,
					//'walker'          => new WPDocs_Walker_Nav_Menu(),
				) );
				?>
				<a href="https://eshop.marinedutyfree.com" class="button button--medium">Shop now</a>
			</div>
		</div>
		<?php
		$my_post_obj = get_post(8);
		if( !empty( $my_post_obj ) ) {?>
			<div class="container">
				<div class="header-message">
					<div class="header-message__text">
						<?php echo $my_post_obj->post_content; ?>
					</div>
				</div>
			</div>
		<?php } ?>
		<div class="burger">
			<figure></figure>
		</div>
		<div class="mob-panel">
			<?php // get_search_form(); ?>
			<a  href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>" class="mob-panel__logo">
				<img src="<?php bloginfo('template_url'); ?>/img/logo/logo.svg" alt="<?php bloginfo('name'); ?>" class="mob-panel__logo-img" width="272" height="108">
			</a>
			<?php
			wp_nav_menu( array(
				'theme_location'  => 'main-nav',
				'menu_class'      => 'mobile-nav',
				'echo'            => true,
				'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				'depth'           => 0,
				'walker'          => ''
			) );
			?>
		</div>
	</header>
	<div class="container-page">
