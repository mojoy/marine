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
			<?php while ( have_posts() ) : the_post(); ?>
			<div class="single-content">
				<?php if ( function_exists("has_post_thumbnail") && has_post_thumbnail() ) { the_post_thumbnail(array(300,225), array("class" => "alignleft post_thumbnail")); } ?>

				<?php the_content(); ?>

			</div>
			<?php endwhile; ?>


		</div>
	</section>
</main>


<?php get_footer(); ?>
