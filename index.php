<?php

/**
 * Template Name: home
 * @subpackage marine
 */

get_header(); ?>
<main class="main" role="main">






	<?php
	$args = array(
		'orderby'          => 'post_date',
		'order'            => 'ASC',
		'post_type'        => 'section',
		'post_status'      => 'publish',
	);
	$pc_new = new WP_Query($args);
	if ( $pc_new->have_posts() ) :
		while ($pc_new->have_posts()) : $pc_new->the_post();
			the_content();
		endwhile;
	else: ?>
		<p style="color: #ED1C24;font-size: 25px;">Sorry, there are no posts matching your criteria. </p>
	<?php endif; ?>

	<section class="s-testimonials">
		<div class="s-testimonials-inner"  data-lazybg="<?php bloginfo('template_url'); ?>/img/home/map/bg.jpg">
			<div class="container">
				<div class="h1">TESTIMONIALS</div>

				<div class="testimonials">

					<div class="swiper-container testimonials">
						<div class="swiper-wrapper">
							<?php
							$args = array(
								'orderby'          => 'post_date',
								'order'            => 'ASC',
								'post_type'        => 'testimonials',
								'post_status'      => 'publish',
							);
							$pc_new = new WP_Query($args);
							if ( $pc_new->have_posts() ) :
								while ($pc_new->have_posts()) : $pc_new->the_post();?>
									<div class="swiper-slide">
										<div class="swiper-slide-inner">
											<div class="box testimonials__item">
												<div class="testimonials__photo">
													<?php
													$w = 104; $h = 104;
													if (kama_thumb_src()){
														echo '<img data-lazy="'.kama_thumb_src('w='.$w.'&h='.$h).'" width="'.$w.'" height="'.$h.'" alt="'.get_the_title().'" class="testimonials__ava" />';
													}else{
														echo '<img data-lazy="'.get_stylesheet_directory_uri().'/images/no-photo-104x104.jpg" width="'.$w.'" height="'.$h.'" alt="Изображение для публикации не задано">';
													}
													?>
												</div>
												<div class="testimonials__text"><?php the_content(); ?></div>
												<div class="testimonials__name"><?php the_title() ?></div>
											</div>
										</div>
									</div>
								<?php endwhile;
							else: ?>
								<p style="color: #ED1C24;font-size: 25px;">Sorry, there are no posts matching your criteria. </p>
							<?php endif; ?>
						</div>
					</div>
					<div class="slider-nav slider-nav--fixbtn">
						<div class="slider-arrow slider-arrow--prev testimonials-arrow--prev">
							<span class="i i-left">left</span>
						</div>

						<div class="slider-arrow slider-arrow--next testimonials-arrow--next">
							<span class="i i-right">right</span>
						</div>
					</div>
					<div class="swiper-pagination"></div>
				</div>
			</div>
		</div>
	</section>

</main>
<?php get_footer(); ?>