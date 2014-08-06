<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>

<!--[if lt IE 10]>
<div class="alert alert-warning">
    <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your
    browser</a> to improve your experience.', 'roots'); ?>
</div>
<![endif]-->

<?php
do_action('get_header');
get_template_part('templates/header-top-navbar');
$isHome = false;
$bgClass = 'internal';
if(is_home() || is_front_page()){
	$isHome = true;
	$bgClass = '';
}
?>

<div id="page-bg">
    <div id="bg-wrapper" class="<?php echo $bgClass; ?>">
	    <div id="main-bg">
	        <img src="<?php echo get_bloginfo('template_directory') . '/assets/img/' . ($isHome? 'home-bg.jpg' : 'internal-bg.jpg') ?>"/>
		    <div id="main-buttons">
			    <?php
		        $description = get_bloginfo('description');
			    if($description != ''){
			    ?>
			    <h2><?php echo $description ?></h2>
			    <?php } ?>
			    <a href="<?php echo get_option('portnr8_bannerlocation'); ?>" class="btn btn-danger">Our Location</a>
			    <a href="<?php echo get_option('portnr8_contactus'); ?>" class="btn btn-default">Contact Us</a>
		    </div>
	    </div>
    </div>
    <div class="wrap container" role="document">
        <div class="row">
	        <div class="content <?php echo roots_main_class(); ?>">
                <?php include roots_template_path(); ?>
	        </div>
            <?php if (roots_display_sidebar()) : ?>
                <aside class="<?php echo roots_sidebar_class(); ?> hidden-xs hidden-sm" role="complementary">
	                <div class="sidebar-image">
			            <img src="<?php echo get_bloginfo('template_directory') . '/assets/img/bg-sidebar.jpg' ?>" />
		            </div>
                    <?php include roots_sidebar_path(); ?>
                </aside>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php get_template_part('templates/footer'); ?>
</body>
</html>
