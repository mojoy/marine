<?php

/**
 * Search Template
 *
 *
 * @file           search.php

 */

get_header(); ?>

<main class="main" role="main">
	<section class="content">
		<div class="container">
				<?php
				if ( function_exists('yoast_breadcrumb') ) {
					yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
				}
				?>

				<?php if (have_posts()) : ?>

					<div class="h2"><?php _e('Search', 'kubrick'); ?></div>

					<div class="navigation">
						<div class="alignleft"><?php next_posts_link(__('&laquo; Older Entries', 'kubrick')) ?></div>
						<div class="alignright"><?php previous_posts_link(__('Newer Entries &raquo;', 'kubrick')) ?></div>
					</div>

					<div class="search">
						<?php while (have_posts()) : the_post(); ?>

						<div <?php post_class(); ?>>
							<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'kubrick'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h3>
							<small><?php the_time('l, F jS, Y') ?></small>

							<?php echo kama_excerpt( array('maxchar'=>250) ); ?>

							<!--<p class="postmetadata"><?php the_tags(__('Tags:', 'kubrick') . ' ', ', ', '<br />'); ?> <?php printf(__('Posted in %s', 'kubrick'), get_the_category_list(', ')); ?> | <?php edit_post_link(__('Edit', 'kubrick'), '', ' | '); ?>  <?php comments_popup_link(__('No Comments &#187;', 'kubrick'), __('1 Comment &#187;', 'kubrick'), __('% Comments &#187;', 'kubrick'), '', __('Comments Closed', 'kubrick') ); ?></p>
						-->
						</div>

					<?php endwhile; ?>
					</div>

					<div class="navigation">
						<div class="alignleft"><?php next_posts_link(__('&laquo; Older Entries', 'kubrick')) ?></div>
						<div class="alignright"><?php previous_posts_link(__('Newer Entries &raquo;', 'kubrick')) ?></div>
					</div>

				<?php else : ?>

					<div class="h2"><?php _e('Nothing found, probably an error occurred', 'kubrick'); ?></div>
					<?php get_search_form(); ?>

				<?php endif; ?>

		</div>
	</section>
</main>


<?php get_footer(); ?>
