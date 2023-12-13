<?php
/**
 * Pages Template
 * @subpackage marine
 *
 *
 * @file           page.php

 */

get_header(); ?>
<main class="main" role="main">
	<section class="content">
		<div class="container">

			<?php
			if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb('
				<p id="breadcrumbs">','</p>
				');
			}
			?>


			<div class="heading">
				<h1 class="title"><?php the_title(); ?></h1>
			</div>
			<?php edit_post_link('edit', '<p class="btn-edit">', '</p>'); ?>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="entry">
					<?php the_content(); ?>
				</div>
			<?php endwhile; endif; ?>
			<?php edit_post_link(__('edit.', 'kubrick'), '<p>', '</p>'); ?>

		</div>
	</section>
</main>


<?php get_footer(); ?>
