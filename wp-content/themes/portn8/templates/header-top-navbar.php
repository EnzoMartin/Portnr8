<header class="banner navbar navbar-default navbar-static-top" role="banner">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand hidden-sm" href="<?php echo home_url(); ?>/"><img src="<?php bloginfo('template_directory'); ?>/assets/img/logo.png"/></a>
        </div>

        <nav class="collapse navbar-collapse" role="navigation">
            <?php
            if (has_nav_menu('primary_navigation')) :
                wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav'));
            endif;
            ?>
            <ul class="nav navbar-nav navbar-right">
                <li>
	                <a target="_blank" href="<?php echo get_option('portn8_headerfacebook'); ?>">
						<i class="fa fa-facebook"></i>
	                </a>
                </li>
	            <li>
	                <a target="_blank" href="<?php echo get_option('portn8_headergoogleplus'); ?>">
						<i class="fa fa-google-plus"></i>
	                </a>
                </li>
            </ul>
        </nav>
    </div>
</header>