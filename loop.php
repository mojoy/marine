<div class="posts__item"  itemscope="" itemtype="http://schema.org/Article">
    <div class="posts__item-img"  itemprop="image" itemscope="" itemtype="https://schema.org/ImageObject">
    	<?php
        $w = 480; $h = 300;
    	if ( kama_thumb_src() ) {
    	    echo '<img src="'.kama_thumb_src('w='.$w.'&h='.$h).'" width="'.$w.'" height="'.$h.'" alt="'.get_the_title().'" itemprop="image contentUrl Url" />';
    	} else {
    	    echo '<img src="'.get_stylesheet_directory_uri().'/images/no-photo.jpg" width="'.$w.'" height="'.$h.'" alt="Изображение для публикации не задано">';
    	} ?>
	    <div class="post-info post-info_loop">
	    	<?php
	    	$post_cat = get_the_category(); 
	    	$post_cat = $post_cat[0]->cat_ID;
	    	?>
	    	<div class="post-info__cat">
	    		<a href="<?php echo get_category_link($post_cat) ?>"><?php echo get_cat_name($post_cat); ?></a>
	    	</div>
	    	<?php if ($show_date) { ?>
    			<time class="post-info__time" datetime="<?php the_time('Y-m-d') ?>"><?php the_time('d.m.Y') ?></time>
    		<?php } ?>
	    </div>
    </div>
    <div class="posts__item-title">
		<a href="<?php the_permalink() ?>"><span itemprop="headline"><?php the_title() ?></span></a>
	</div>

    <!-- for seo -->
    <meta content="<?php the_time('Y-m-d H:i'); ?>" itemprop="datePublished">
    <meta content="<?php the_modified_date('Y-m-d H:i'); ?>" itemprop="dateModified">
    <span itemprop="publisher" itemscope="" itemtype="http://schema.org/Organization" class="hidden">
        <meta itemprop="name" content="marine">
        <span itemprop="logo" itemscope="" itemtype="https://schema.org/ImageObject">
            <link itemprop="url" href="<?php echo get_template_directory_uri(); ?>/images/logo.png">
            <link itemprop="contentUrl" href="<?php echo get_template_directory_uri(); ?>/images/logo.png">
            <meta itemprop="width" content="227">
            <meta itemprop="height" content="62">
        </span>
    </span>
    <span itemprop="author" itemscope="" itemtype="http://schema.org/Person" class="hidden">
        <meta itemprop="name" content="anzub">
    </span>
    <meta itemscope itemprop="mainEntityOfPage" itemType="https://schema.org/WebPage" itemid="<?php the_permalink() ?>" content="<?php the_title(); ?>"/>
    <meta itemprop="inLanguage" content="ru" />
    <meta itemprop="name" content="<?php echo get_home_url() ?>">
    <!--// for seo -->
</div>