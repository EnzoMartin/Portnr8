<?php get_template_part('templates/page', 'header'); ?>
<main class="main" role="main">
    <div class="main-bg">
        <?php if(has_post_thumbnail( $post->ID ) ) {
            $image = wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'single-post-thumbnail');?>
	        <img class="post-image" src="<?php echo $image;?>" />
	    <?php } ?>
        <?php get_template_part('templates/content', 'single'); ?>
    </div>
</main>