<?php

/**
 * Footer Template
 *
 *
 * @file           footer.php
 * @package
 * @author
 * @copyright
 * @license
 * @version
 * @filesource
 * @link
 * @since
 */

?>

</div>
<footer class="footer" role="contentinfo" >
	<div class="footer-inner" data-lazybg="<?php bloginfo('template_url'); ?>/img/home/map/bg.jpg">
		<div class="container">
			<a  href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>" class="footer-logo">
				<img src="<?php bloginfo('template_url'); ?>/img/logo/logo.svg" alt="<?php bloginfo('name'); ?>" class="footer-logo__img" width="272" height="108">
			</a>
			<?php
			wp_nav_menu( array(
				'theme_location'  => 'footer-nav',
				'menu_class'      => 'footer-nav__list',
				'echo'            => true,
				'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				'depth'           => 0,
				//'walker'          => new WPDocs_Walker_Nav_Menu(),
			) );
			?>
			<div class="copyright">&copy; Marine Duty Free. All rights reserved.</div>
		</div>
	</div>
</footer>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js-dev/vendors/swiper.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/main.js"></script>

<?php wp_footer(); ?>

</body>
</html>