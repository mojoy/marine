<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Archive Template
 *
 * @file           archive.php
 */

get_header(); ?>

<div id="content-archive" class="<?php echo esc_attr(implode(' ', responsive_get_content_classes())); ?>">
    <?php
    if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb('
		<p id="breadcrumbs">','</p>
		');
    }
    ?>


    <?php if (have_posts()) : ?>

        <?php get_template_part('loop-header', get_post_type()); ?>

        <?php while (have_posts()) : the_post(); ?>

            <?php responsive_entry_before(); ?>

            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <?php responsive_entry_top(); ?>

                <?php get_template_part('post-meta', get_post_type()); ?>
				<time datetime="<?php echo get_the_date('Y-m-d H:i'); ?>"><?php echo get_the_date('j F Y');?> г.</time>

                <div class="post-entry entry-summary">
                    <div class="post-entry-img">

                        <a href="<?php the_permalink()  ?>" title="<?php the_title(); ?>">
                            <?php
                            $w = 480; $h = 300;
                            if (kama_thumb_src()){
                                echo '<img src="'.kama_thumb_src('w='.$w.'&h='.$h).'" width="'.$w.'" height="'.$h.'" alt="'.get_the_title().'" class="post-img" />';
                            }else{
                                echo '<img src="'.get_stylesheet_directory_uri().'/images/210-131.jpg" width="'.$w.'" height="'.$h.'" alt="">';
                            } ?>
                        </a>

                        <?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>
                            <span class="comments-link">
                                <?php comments_popup_link( __( '<span class="icon-font icon-comment-alt"></span> нет комментариев', 'the-box' ), __( '<span class="icon-font icon-comment"></span> 1 комментарий', 'the-box' ), __( '<span class="icon-font icon-comments-alt"></span> % комментариев', 'the-box' ) ); ?>
                            </span>
                            <span class="sep"></span>
                        <?php endif; ?>

                    </div>
                    <!--noindex--><?php the_excerpt(); ?><!--/noindex-->
                    <?php wp_link_pages(array('before' => '<div class="pagination">' . __('Pages:', 'responsive'), 'after' => '</div>')); ?>
                </div><!-- end of .post-entry -->



                <!-- To resolve the error with updated  -->
                <time datetime="<?php the_time('o-m-d') ?>" class="post-date updated hidden" pubdate><?php the_time(apply_filters('themify_loop_date', 'M j, Y H:i')) ?></time>
                <!-- To solve the error with author  -->
                <span class="vcard author hidden">
                  <span class="fn">marine</span>
                </span>

                <?php responsive_entry_bottom(); ?>
            </div>
            <div style="clear:both;"></div><!-- end of #post-<?php the_ID(); ?> -->
            <?php responsive_entry_after(); ?>

            <?php
        endwhile;

        get_template_part('loop-nav', get_post_type());

    else :

        get_template_part('loop-no-posts', get_post_type());

    endif;
    ?>

</div><!-- end of #content-archive -->

<div class="widgets22">
<!--branding-->
        <div class="fixed-block grid col-300 fit">
            <div id="fixed-block">
			</div>
        </div>
<!--branding-->
    <?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>