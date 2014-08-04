<?php
/**
 * Register sidebars and widgets
 */
function roots_widgets_init()
{
    // Sidebars
    register_sidebar(array(
        'name' => __('Sidebar Top', 'roots'),
        'id' => 'sidebar-primary',
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="script sidebar-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => __('Sidebar Bottom', 'roots'),
        'id' => 'sidebar-secondary',
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="script sidebar-title">',
        'after_title' => '</h3>',
    ));
}

add_action('widgets_init', 'roots_widgets_init');