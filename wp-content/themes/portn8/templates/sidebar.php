<div class="sidebar">
    <?php dynamic_sidebar('sidebar-primary'); ?>
    <div class="sidebar-image">
        <img src="<?php echo get_bloginfo('template_directory') . '/assets/img/sidebar-map.jpg' ?>" />
    </div>
	<?php dynamic_sidebar('sidebar-secondary'); ?>
	<div class="sidebar-footer">
		Have questions or comments? Please email us at <a href="mailto:<?php echo get_option('portnr8_contactemail'); ?>"><?php echo get_option('portnr8_contactemail'); ?></a>
	</div>
</div>