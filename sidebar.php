<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Main Widget Template
 *
 * @file           sidebar.php

 */

/*
 * Load the correct sidebar according to the page layout
 */
$layout = responsive_get_layout();
switch ( $layout ) {
	case 'sidebar-content-page':
		get_sidebar( 'left' );
		return;
		break;

	case 'content-sidebar-half-page':
		get_sidebar( 'right-half' );
		return;
		break;

	case 'sidebar-content-half-page':
		get_sidebar( 'left-half' );
		return;
		break;

	case 'full-width-page':
		return;
		break;
}
?>

<?php responsive_widgets_before(); // above widgets container hook ?>

	<div id="widgets" class="<?php echo implode( ' ', responsive_get_sidebar_classes() ); ?>">
		<?php responsive_widgets(); // above widgets hook ?>

		<?php if ( !dynamic_sidebar( 'main-sidebar' ) ) : ?>
			<div class="widget-wrapper">

				<div class="widget-title"><?php _e( 'In Archive', 'responsive' ); ?></div>
				<ul>
					<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
				</ul>

			</div><!-- end of .widget-wrapper -->
		<?php endif; //end of main-sidebar ?>

		<?php responsive_widgets_end(); // after widgets hook ?>
		
	</div><!-- end of #widgets -->
<?php responsive_widgets_after(); // after widgets container hook ?>
