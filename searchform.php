<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Search Form Template
 *
 * @file           searchform.php
 */
?>

<form class="form-search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
	<fieldset class="forminner clearfix">
		<input type="search" class="field" name="s" id="s" placeholder="<?php esc_attr_e( 'Search', 'responsive' ); ?>" />
		<button type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Go', 'responsive' ); ?>"></button>
	</fieldset>
</form>
